<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Services\ChatState;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;

class ChatAIController extends Controller
{
    public function ask(Request $request)
    {
        try {

            $state = ChatState::get();
            $msg = strtolower(trim($request->message));

            /* ================= INFO MENU ================= */

            if (str_contains($msg, 'menu')) {
                $menus = Menu::all();
                $text = "📋 Daftar Menu:\n";
                foreach ($menus as $m) {
                    $text .= "- {$m->nama_menu} (Rp" . number_format($m->harga) . ")\n";
                }
                $text .= "\nKetik *pesan* untuk order.";
                return response()->json(['reply' => $text]);
            }

            /* ================= START ORDER ================= */

            if ($state['step'] === 'start' && $msg === 'pesan') {

                $menus = Menu::all();
                $list = "";
                foreach ($menus as $m) {
                    $list .= "- {$m->nama_menu}\n";
                }

                $state['step'] = 'choose_menu';
                ChatState::save($state);

                return response()->json([
                    'reply' => "Pilih menu:\n$list"
                ]);
            }

            /* ================= PILIH MENU ================= */

            if ($state['step'] === 'choose_menu') {

                $menu = Menu::where('nama_menu', 'like', "%$msg%")->first();

                if (!$menu) {
                    return response()->json([
                        'reply' => "❌ Menu tidak ditemukan. Ketik ulang nama menu."
                    ]);
                }

                $state['data'] = [
                    'menu_nama'  => $menu->nama_menu,
                    'menu_harga'=> $menu->harga,
                ];

                $state['step'] = 'choose_qty';
                ChatState::save($state);

                return response()->json(['reply' => "Berapa porsi?"]);
            }

            /* ================= JUMLAH ================= */

            if ($state['step'] === 'choose_qty') {

                if (!is_numeric($msg)) {
                    return response()->json(['reply' => "Masukkan angka jumlah porsi."]);
                }

                $state['data']['jumlah'] = (int)$msg;
                $state['step'] = 'customer_name';
                ChatState::save($state);

                return response()->json(['reply' => "Nama pemesan?"]);
            }

            /* ================= NAMA ================= */

            if ($state['step'] === 'customer_name') {

                $state['data']['nama'] = $msg;
                $state['step'] = 'customer_phone';
                ChatState::save($state);

                return response()->json(['reply' => "Nomor telepon?"]);
            }

            /* ================= TELEPON ================= */

            if ($state['step'] === 'customer_phone') {

                $state['data']['telepon'] = $msg;
                $state['step'] = 'customer_address';
                ChatState::save($state);

                return response()->json(['reply' => "Alamat lengkap?"]);
            }

            /* ================= ALAMAT ================= */

            if ($state['step'] === 'customer_address') {

                $state['data']['alamat'] = $msg;
                $state['step'] = 'confirm_order';
                ChatState::save($state);

                $d = $state['data'];
                $total = $d['menu_harga'] * $d['jumlah'];

                return response()->json([
                    'reply' =>
                        "📦 *Konfirmasi Pesanan*\n" .
                        "Menu: {$d['menu_nama']}\n" .
                        "Jumlah: {$d['jumlah']} porsi\n" .
                        "Nama: {$d['nama']}\n" .
                        "Telepon: {$d['telepon']}\n" .
                        "Alamat: {$d['alamat']}\n" .
                        "Total: Rp" . number_format($total) . "\n\n" .
                        "Ketik *ya* untuk konfirmasi atau *batal*."
                ]);
            }

            /* ================= SIMPAN PESANAN + MIDTRANS ================= */

            if ($state['step'] === 'confirm_order') {

                if ($msg !== 'ya') {
                    ChatState::reset();
                    return response()->json([
                        'reply' => "❌ Pesanan dibatalkan. Ketik *pesan* untuk memulai kembali."
                    ]);
                }

                DB::beginTransaction();

                $d = $state['data'];
                $total = $d['menu_harga'] * $d['jumlah'];
                $noOrder = 'ORD-' . strtoupper(Str::random(8));

                // Simpan pelanggan
                Pelanggan::create([
                    'nama'    => $d['nama'],
                    'telepon' => $d['telepon'],
                    'alamat'  => $d['alamat'],
                ]);

                // Simpan pesanan
                Pesanan::create([
                    'no_order'        => $noOrder,
                    'nama_pelanggan'  => $d['nama'],
                    'total_item'      => $d['jumlah'],
                    'total_harga'     => $total,
                    'status'          => 'pending',
                ]);

                /* ===== MIDTRANS CONFIG ===== */
                Config::$serverKey = config('services.midtrans.server_key');
                Config::$isProduction = config('services.midtrans.is_production');
                Config::$isSanitized = true;
                Config::$is3ds = true;
                try {
                   $snapToken = Snap::getSnapToken([
                    'transaction_details' => [
                        'order_id' => $noOrder,
                        'gross_amount' => (int) $total,
                    ],
                    'item_details' => [
                        [
                            'id' => 'MENU-1',
                            'price' => (int) $d['menu_harga'],
                            'quantity' => (int) $d['jumlah'],
                            'name' => $d['menu_nama'],
                        ]
                    ],
                    'customer_details' => [
                        'first_name' => $d['nama'],
                        'phone' => $d['telepon'],
                        'address' => $d['alamat'],
                    ],
                ]);

                } catch (\Exception $e) {
                    DB::rollBack();
                    \Log::error('MIDTRANS ERROR: ' . $e->getMessage());

                    return response()->json([
                        'reply' => '❌ Gagal membuat pembayaran. Silakan coba lagi.'
                    ], 500);
                }

                DB::commit();
                ChatState::reset();

                return response()->json([
                    'reply' =>
                        "✅ *Pesanan berhasil disimpan!*\n" .
                        "Total: Rp" . number_format($total) . "\n\n" .
                        "Silakan lanjutkan pembayaran 👇",
                    'snap_token' => $snapToken
                ]);
            }

            return response()->json(['reply' => "Ketik *menu* atau *pesan*"]);

        } catch (\Throwable $e) {

    DB::rollBack();

    return response()->json([
        'reply' => 'SERVER ERROR: ' . $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
    ], 500);
}
    }
}