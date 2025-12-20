<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Ulasan;
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
            $msg   = strtolower(trim($request->message));

            /* ================= MENU ================= */
            if (str_contains($msg, 'menu')) {
                $menus = Menu::all();
                $text = "📋 Daftar Menu:\n";
                foreach ($menus as $m) {
                    $text .= "- {$m->nama_menu} (Rp" . number_format($m->harga) . ")\n";
                }
                return response()->json(['reply' => $text]);
            }

                            /* ================= LOKASI ================= */
                if (str_contains($msg, 'lokasi') || str_contains($msg, 'alamat')) {
                    return response()->json([
                        'reply' => "📍 *Lokasi Kami*\nJl. Contoh No. 123, Yogyakarta\n\n📌 Google Maps:\nhttps://maps.google.com/?q=Jl+Contoh+No+123"
                    ]);
                }

                /* ================= CARA PESAN ================= */
                if (str_contains($msg, 'cara pesan') || str_contains($msg, 'cara order')) {
                    return response()->json([
                        'reply' => "🛒 *Cara Pemesanan*\n".
                                "1️⃣ Ketik *menu* untuk melihat daftar menu\n".
                                "2️⃣ Ketik *pesan*\n".
                                "3️⃣ Isi form pemesanan\n".
                                "4️⃣ Klik tombol *Bayar*\n".
                                "5️⃣ Lakukan pembayaran\n".
                                "6️⃣ Setelah bayar, berikan rating & ulasan ⭐"
                    ]);
                }


            /* ================= PESAN → TAMPILKAN FORM ================= */
            if ($msg === 'pesan') {

                $menus = Menu::select('id','nama_menu','harga')->get();

                ChatState::set(['step' => 'form']);

                return response()->json([
                    'reply' => "📝 Silakan isi form pemesanan di bawah 👇",
                    'show_form' => true,
                    'menus' => $menus
                ]);
            }

            /* ================= SIMPAN PESANAN DARI FORM ================= */
            if ($request->has('form_order')) {

                DB::beginTransaction();

                $menu = Menu::findOrFail($request->menu_id);
                $total = $menu->harga * $request->jumlah;
                $noOrder = 'ORD-' . strtoupper(Str::random(8));

                Pelanggan::create([
                    'nama' => $request->nama,
                    'telepon' => $request->telepon,
                    'alamat' => $request->alamat
                ]);

                Pesanan::create([
                    'no_order' => $noOrder,
                    'nama_pelanggan' => $request->nama,
                    'total_item' => $request->jumlah,
                    'total_harga' => $total,
                    'status' => 'pending'
                ]);

                ChatState::set([
                    'step' => 'waiting_payment',
                    'last_customer' => $request->nama
                ]);

                Config::$serverKey = config('services.midtrans.server_key');
                Config::$isProduction = false;
                Config::$isSanitized = true;
                Config::$is3ds = true;

                $snapToken = Snap::getSnapToken([
                    'transaction_details' => [
                        'order_id' => $noOrder,
                        'gross_amount' => (int) $total
                    ]
                ]);

                DB::commit();

                return response()->json([
                'reply' => "✅ Pesanan berhasil! Silakan lanjutkan pembayaran 👇",
                'snap_token' => $snapToken,
                'order_detail' => [
                    'no_order' => $noOrder,
                    'nama' => $request->nama,
                    'menu' => $menu->nama_menu,
                    'jumlah' => $request->jumlah,
                    'harga_satuan' => $menu->harga,
                    'total_harga' => $total,
                    'alamat' => $request->alamat
                ]
            ]);

            }

            /* ================= RATING ================= */
            if (($state['step'] ?? null) === 'rating') {

                ChatState::set([
                    'step' => 'review',
                    'rating' => (int) $msg,
                    'last_customer' => $state['last_customer']
                ]);

                return response()->json([
                    'reply' => "Terima kasih ⭐{$msg}\nSilakan tulis ulasan Anda 📝"
                ]);
            }

            /* ================= ULASAN ================= */
            if (($state['step'] ?? null) === 'review') {

                Ulasan::create([
                    'nama_pelanggan' => $state['last_customer'],
                    'rating' => $state['rating'],
                    'komentar' => $request->message
                ]);

                ChatState::reset();

                return response()->json([
                    'reply' => "🙏 Terima kasih atas ulasan Anda!"
                ]);
            }

            return response()->json(['reply' => "Ketik *menu* atau *pesan* 😊"]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['reply' => 'ERROR: ' . $e->getMessage()], 500);
        }
    }

    public function setReview()
    {
        $state = ChatState::get();
        ChatState::set([
            'step' => 'rating',
            'last_customer' => $state['last_customer']
        ]);

        return response()->json(['status' => 'ok']);
    }
}