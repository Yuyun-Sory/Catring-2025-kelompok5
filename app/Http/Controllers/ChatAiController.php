<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanans;
use App\Models\Pelanggans;
use App\Services\ChatState;
use Illuminate\Support\Str;

class ChatAIController extends Controller
{
    public function ask(Request $request)
    {
        $state = ChatState::get();
        $message = strtolower($request->message);

        // --- STEP 1: MULAI PESANAN ---
        if ($state['step'] === 'start') {
            if (str_contains($message, 'pesan') || str_contains($message, 'order')) {

                $menus = Menu::all();
                $list = "";

                foreach ($menus as $m) {
                    $list .= "- {$m->nama_menu} (Rp{$m->harga})\n";
                }

                // Pindah ke langkah memilih menu
                $state['step'] = 'choose_menu';
                ChatState::save($state);

                return response()->json([
                    'reply' => "Baik, silakan pilih menu:\n\n$list\n\nKetik nama menu yang ingin dipesan."
                ]);
            }

            return response()->json([
                'reply' => "Halo! Mau lihat menu atau melakukan pemesanan?"
            ]);
        }

        // --- STEP 2: PILIH MENU ---
        if ($state['step'] === 'choose_menu') {
            $menu = Menu::where('nama_menu', 'like', "%$message%")->first();

            if (!$menu) {
                return response()->json([
                    'reply' => "Menu tidak ditemukan. Silakan ketik nama menu lain."
                ]);
            }

            $state['data']['menu'] = $menu;
            $state['step'] = 'choose_qty';
            ChatState::save($state);

            return response()->json([
                'reply' => "Baik, kamu memilih {$menu->nama_menu}.\nBerapa porsi yang ingin dipesan?"
            ]);
        }

        // --- STEP 3: JUMLAH PORSI ---
        if ($state['step'] === 'choose_qty') {
            if (!is_numeric($message)) {
                return response()->json([
                    'reply' => "Jumlah harus berupa angka. Coba lagi."
                ]);
            }

            $state['data']['jumlah'] = (int)$message;
            $state['step'] = 'choose_date';
            ChatState::save($state);

            return response()->json([
                'reply' => "Untuk tanggal berapa pesanannya?"
            ]);
        }

        // --- STEP 4: PILIH TANGGAL ---
        if ($state['step'] === 'choose_date') {
            $state['data']['tanggal'] = $message;
            $state['step'] = 'customer_name';
            ChatState::save($state);

            return response()->json([
                'reply' => "Siapa nama pemesannya?"
            ]);
        }

        // --- STEP 5: NAMA PEMESAN ---
        if ($state['step'] === 'customer_name') {
            $state['data']['nama'] = $message;
            $state['step'] = 'customer_phone';
            ChatState::save($state);

            return response()->json([
                'reply' => "Nomor telepon pemesan?"
            ]);
        }

        // --- STEP 6: NOMOR TELEPON ---
        if ($state['step'] === 'customer_phone') {
            $state['data']['telepon'] = $message;
            $state['step'] = 'confirm_order';
            ChatState::save($state);

            $d = $state['data'];
            $total = $d['menu']->harga * $d['jumlah'];

            return response()->json([
                'reply' => "Berikut detail pesananmu:\n\n" .
                    "Menu: {$d['menu']->nama_menu}\n" .
                    "Jumlah: {$d['jumlah']} porsi\n" .
                    "Tanggal: {$d['tanggal']}\n" .
                    "Nama pemesan: {$d['nama']}\n" .
                    "Telepon: {$d['telepon']}\n" .
                    "Total harga: Rp" . number_format($total, 0, ',', '.') . "\n\n" .
                    "Ketik ya untuk konfirmasi atau batal untuk membatalkan."
            ]);
        }

        // --- STEP 7: KONFIRMASI & SIMPAN DB ---
        if ($state['step'] === 'confirm_order') {
            if ($message !== 'ya') {
                ChatState::reset();
                return response()->json([
                    'reply' => "Pesanan dibatalkan. Ketik 'pesan' jika ingin memulai lagi."
                ]);
            }

            $d = $state['data'];

            // Simpan pelanggan
            $pelanggan = Pelanggans::create([
                'nama' => $d['nama'],
                'telepon' => $d['telepon']
            ]);

            // Generate order number
            $no_order = "ORD-" . strtoupper(Str::random(8));

            // Simpan pesanan
            Pesanans::create([
                'no_order' => $no_order,
                'nama_pelanggan' => $d['nama'],
                'total_item' => $d['jumlah'],
                'total_harga' => $d['menu']->harga * $d['jumlah']
            ]);

            ChatState::reset();

            return response()->json([
                'reply' => "✅ Pesanan berhasil dibuat!\nNomor Order: $no_order\nAdmin akan segera menghubungi Anda."
            ]);
        }

        return response()->json([
            'reply' => "Terjadi kesalahan state. Ketik 'reset'."
        ]);
    }
}