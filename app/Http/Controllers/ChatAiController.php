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
        $msg = strtolower($request->message);

        /* =======================================================
         |   FITUR INFORMASI GLOBAL — TIDAK MEMPENGARUHI PEMESANAN
         ========================================================*/

        // 1. CEK MENU
        if (str_contains($msg, 'menu') || str_contains($msg, 'daftar menu')) {

            $menus = Menu::all();
            if ($menus->count() === 0) {
                return response()->json(['reply' => "Menu belum tersedia."]);
            }

            $list = "";
            foreach ($menus as $m) {
                $list .= "- {$m->nama_menu} (Rp" . number_format($m->harga, 0, ',', '.') . ")\n";
            }

            return response()->json([
                'reply' => "Berikut daftar menu kami:\n\n$list\n\nKetik pesan untuk mulai melakukan pemesanan."
            ]);
        }

        // 2. HARGA CATERING
        if (
            str_contains($msg, 'harga catering') ||
            str_contains($msg, 'harga paket') ||
            str_contains($msg, 'berapa harga')
        ) {
            return response()->json([
                'reply' =>
                "Harga catering bervariasi sesuai menu yang dipilih.\n" .
                    "Silakan ketik menu untuk melihat daftar harga lengkap."
            ]);
        }

        // 3. CARA PESAN
        if (
            str_contains($msg, 'cara pesan') ||
            str_contains($msg, 'gimana pesan') ||
            str_contains($msg, 'pemesanan gimana')
        ) {
            return response()->json([
                'reply' =>
                "Cara pemesanan sangat mudah 😊:\n\n" .
                    "1. Ketik pesan\n" .
                    "2. Pilih menu\n" .
                    "3. Masukkan jumlah porsi\n" .
                    "4. Tentukan tanggal\n" .
                    "5. Isi data pemesan\n" .
                    "6. Konfirmasi\n\n" .
                    "Coba ketik pesan untuk memulai."
            ]);
        }

        // 4. LOKASI
        if (str_contains($msg, 'lokasi') || str_contains($msg, 'alamat')) {
            return response()->json([
                'reply' =>
                "Lokasi kami:\n*Teras Bu Rini Catering *\n" .
                    "📍 995J+P62 Wono Kerto, Kabupaten Sleman, Daerah Istimewa Yogyakarta\n" .
                    "Melayani pemesanan area sekitar."
            ]);
        }

        // 5. RESET jika user mengetik reset
        if ($msg === 'reset') {
            ChatState::reset();
            return response()->json([
                'reply' => "Sesi chatbot direset. Mau lihat menu atau melakukan pemesanan?"
            ]);
        }


        /* =======================================================
         |   LOGIKA PEMESANAN (menggunakan state)
         ========================================================*/

        // --- STEP 1: MULAI PEMESANAN ---
        if ($state['step'] === 'start') {

            if (str_contains($msg, 'pesan') || str_contains($msg, 'order')) {

                $menus = Menu::all();
                $list = "";

                foreach ($menus as $m) {
                    $list .= "- {$m->nama_menu} (Rp{$m->harga})\n";
                }

                $state['step'] = 'choose_menu';
                ChatState::save($state);

                return response()->json([
                    'reply' => "Baik, silakan pilih menu:\n\n$list\n\nKetik nama menu yang ingin dipesan."
                ]);
            }

            return response()->json([
                'reply' => "Halo! Mau lihat menu, harga catering, cara pesan, lokasi, atau ingin langsung pesan?"
            ]);
        }

        // --- STEP 2: PILIH MENU ---
        if ($state['step'] === 'choose_menu') {

            $menu = Menu::where('nama_menu', 'like', "%$msg%")->first();

            if (!$menu) {
                return response()->json([
                    'reply' => "Menu tidak ditemukan. Coba ketik nama menu lain."
                ]);
            }

            $state['data']['menu'] = $menu;
            $state['step'] = 'choose_qty';
            ChatState::save($state);

            return response()->json([
                'reply' => "Baik, kamu memilih {$menu->nama_menu}.\nBerapa porsi yang ingin dipesan?"
            ]);
        }

        // --- STEP 3: JUMLAH ---
        if ($state['step'] === 'choose_qty') {

            if (!is_numeric($msg)) {
                return response()->json([
                    'reply' => "Jumlah harus berupa angka. Coba lagi."
                ]);
            }

            $state['data']['jumlah'] = (int)$msg;
            $state['step'] = 'choose_date';
            ChatState::save($state);

            return response()->json([
                'reply' => "Untuk tanggal berapa pesanannya?"
            ]);
        }

        // --- STEP 4: TANGGAL ---
        if ($state['step'] === 'choose_date') {

            $state['data']['tanggal'] = $msg;
            $state['step'] = 'customer_name';
            ChatState::save($state);

            return response()->json([
                'reply' => "Siapa nama pemesannya?"
            ]);
        }

        // --- STEP 5: NAMA PEMESAN ---
        if ($state['step'] === 'customer_name') {

            $state['data']['nama'] = $msg;
            $state['step'] = 'customer_phone';
            ChatState::save($state);

            return response()->json([
                'reply' => "Nomor telepon pemesan?"
            ]);
        }

        // --- STEP 6: TELEPON ---
        if ($state['step'] === 'customer_phone') {

            $state['data']['telepon'] = $msg;
            $state['step'] = 'confirm_order';
            ChatState::save($state);

            $d = $state['data'];
            $total = $d['menu']->harga * $d['jumlah'];

            return response()->json([
                'reply' =>
                "Berikut detail pesananmu:\n\n" .
                    "Menu: {$d['menu']->nama_menu}\n" .
                    "Jumlah: {$d['jumlah']} porsi\n" .
                    "Tanggal: {$d['tanggal']}\n" .
                    "Nama: {$d['nama']}\n" .
                    "Telepon: {$d['telepon']}\n" .
                    "Total: Rp" . number_format($total, 0, ',', '.') . "\n\n" .
                    "Ketik ya untuk konfirmasi atau batal."
            ]);
        }

        // --- STEP 7: SIMPAN KE DATABASE ---
        if ($state['step'] === 'confirm_order') {

            if ($msg !== 'ya') {
                ChatState::reset();
                return response()->json([
                    'reply' => "Pesanan dibatalkan. Ketik pesan untuk memulai lagi."
                ]);
            }

            $d = $state['data'];

            Pelanggans::create([
                'nama' => $d['nama'],
                'telepon' => $d['telepon']
            ]);

            $no_order = "ORD-" . strtoupper(Str::random(8));

            Pesanans::create([
                'no_order' => $no_order,
                'nama_pelanggan' => $d['nama'],
                'total_item' => $d['jumlah'],
                'total_harga' => $d['menu']->harga * $d['jumlah']
            ]);

            ChatState::reset();

            return response()->json([
                'reply' => "✅ Pesanan berhasil dibuat!\nNomor order kamu: $no_order\nAdmin akan segera menghubungi ya!"
            ]);
        }

        return response()->json([
            'reply' => "Maaf, saya tidak memahami. Ketik menu, harga catering, cara pesan, lokasi, atau pesan."
        ]);
    }
}