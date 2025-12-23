<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Ulasan;
use App\Models\JadwalProduksi;
use App\Models\Libur;
use App\Services\ChatState;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;

class ChatAIController extends Controller
{
 public function index()
{
    $jadwals   = JadwalProduksi::with('menu')->orderBy('tanggal_produksi')->orderBy('jam_produksi')->get();
    $liburs    = Libur::orderBy('tanggal')->get();
    $pesanans  = JadwalProduksi::with('menu')->orderBy('tanggal_produksi')->orderBy('jam_produksi')->get();
    $chatLogs  = Ulasan::orderBy('created_at','desc')->get();

    return view('chatbot.index', compact('jadwals','liburs','pesanans','chatLogs'));
}



    public function ask(Request $request)
    {
        try {
            $state = ChatState::get();
            $msg   = strtolower(trim($request->message));

            /* MENU */
            if(str_contains($msg,'menu')){
                $menus = Menu::all();
                $text = "📋 Daftar Menu:\n";
                foreach($menus as $m){
                    $text .= "- {$m->nama_menu} (Rp" . number_format($m->harga) . ")\n";
                }
                return response()->json(['reply'=>$text]);
            }

            /* LOKASI */
            if(str_contains($msg,'lokasi') || str_contains($msg,'alamat')){
                return response()->json([
                    'reply' => "📍 Lokasi Kami\nJl. Contoh No.123, Yogyakarta\nhttps://maps.google.com/?q=Jl+Contoh+No+123"
                ]);
            }

            /* CARA PESAN */
            if(str_contains($msg,'cara pesan') || str_contains($msg,'cara order')){
                return response()->json([
                    'reply' => "🛒 Cara Pemesanan:\n1. Ketik *menu* untuk lihat menu\n2. Ketik *pesan*\n3. Isi form pemesanan\n4. Klik tombol *Bayar*\n5. Bayar\n6. Beri rating & ulasan ⭐"
                ]);
            }

            /* CEK TANGGAL + LIBUR */
            if(str_contains($msg,'cek tanggal')){
                $jadwals = JadwalProduksi::with('menu')->orderBy('tanggal_produksi')->orderBy('jam_produksi')->get();
                $liburs = Libur::pluck('keterangan','tanggal')->toArray();

                $dates = [];
                foreach($jadwals as $j){
                    $tgl = $j->tanggal_produksi;
                    $status = $liburs[$tgl] ?? ($j->status_bahan ?? 'Kosong');

                    if(!isset($dates[$tgl])){
                        $dates[$tgl] = [
                            'status' => $status,
                            'items' => []
                        ];
                    }

                    $dates[$tgl]['items'][] = [
                        'jam' => $j->jam_produksi,
                        'menu' => $j->menu->nama_menu ?? '-'
                    ];
                }

                // tambahkan libur yang tidak ada jadwal
                foreach($liburs as $tgl=>$keterangan){
                    if(!isset($dates[$tgl])){
                        $dates[$tgl] = [
                            'status' => $keterangan,
                            'items' => []
                        ];
                    }
                }

                return response()->json([
                    'reply' => "📅 Jadwal Teras:",
                    'available_dates' => $dates
                ]);
            }

            /* TAMPILKAN FORM PESANAN */
<<<<<<< HEAD
           if($msg==='pesan'){
            $menus = Menu::select('id_menu','nama_menu','harga')->get();
            $blockedDates = $this->getBlockedDates();

            ChatState::set(['step'=>'form']);

            return response()->json([
                'reply'=>"📝 Silakan isi form pemesanan di bawah 👇\n📅 Pilih tanggal produksi yang tersedia",
                'show_form'=>true,
                'menus'=>$menus,
                'blocked_dates'=>$blockedDates
            ]);
        }

=======
            if($msg==='pesan'){
                $menus = Menu::select('id_menu','nama_menu','harga')->get();
                ChatState::set(['step'=>'form']);
                return response()->json([
                    'reply'=>"📝 Silakan isi form pemesanan di bawah 👇",
                    'show_form'=>true,
                    'menus'=>$menus
                ]);
            }
>>>>>>> 2154e4b68bba9b697e3b2dc0bd83434d3cd78766

            /* SIMPAN FORM PESANAN */
            if($request->has('form_order')){
                DB::beginTransaction();

                $menu = Menu::findOrFail($request->id_menu);
                $total = $menu->harga * $request->jumlah;
                $noOrder = 'ORD-'.strtoupper(Str::random(8));

                Pelanggan::create([
                    'nama' => $request->nama,
                    'telepon' => $request->telepon,
                    'alamat' => $request->alamat
                ]);

                $request->validate([
                'id_menu' => 'required|exists:menu,id_menu',
                'nama' => 'required|string|max:200',
                'telepon' => 'required|string|max:20',
                'alamat' => 'required|string|max:255',
                'jumlah' => 'required|integer|min:1',
<<<<<<< HEAD
                 'tanggal_produksi' => 'required|date',
            ]);
            $blockedDates = $this->getBlockedDates();
            if (in_array($request->tanggal_produksi, $blockedDates)) {
                DB::rollBack();

                return response()->json([
                    'reply' =>
                        "🚫 Tanggal produksi *{$request->tanggal_produksi}* tidak tersedia.\n".
                        "📅 Silakan pilih tanggal produksi lain yang masih kosong ya 😊",
                    'show_form' => true,
                    'menus' => Menu::select('id_menu','nama_menu','harga')->get(),
                    'blocked_dates' => $blockedDates
                ]);
            }
=======
            ]);
>>>>>>> 2154e4b68bba9b697e3b2dc0bd83434d3cd78766

                Pesanan::create([
                    'id_menu' => $menu->id_menu,
                    'no_order' => $noOrder,
                    'nama_pelanggan' => $request->nama,
                    'total_item' => $request->jumlah,
                    'total_harga' => $total,
                    'tanggal_produksi' => $request->tanggal_produksi,
                    'status' => 'pending'
                ]);

                ChatState::set([
                    'step'=>'waiting_payment',
                    'last_customer'=>$request->nama,
                     'id_menu' => $menu->id_menu 
                ]);

                Config::$serverKey = config('services.midtrans.server_key');
                Config::$isProduction = false;
                Config::$isSanitized = true;
                Config::$is3ds = true;

                $snapToken = Snap::getSnapToken([
                    'transaction_details'=>[
                        'order_id'=>$noOrder,
                        'gross_amount'=>(int)$total
                    ]
                ]);

                DB::commit();

                return response()->json([
                    'reply'=>"✅ Pesanan berhasil! Silakan lanjutkan pembayaran 👇",
                    'snap_token'=>$snapToken,
                    'order_detail'=>[
                        'no_order'=>$noOrder,
                        'nama'=>$request->nama,
                        'menu'=>$menu->nama_menu,
<<<<<<< HEAD
                            'tanggal_produksi'=>$request->tanggal_produksi,
=======
>>>>>>> 2154e4b68bba9b697e3b2dc0bd83434d3cd78766
                        'jumlah'=>$request->jumlah,
                        'harga_satuan'=>$menu->harga,
                        'total_harga'=>$total,
                        'alamat'=>$request->alamat
                    ]
                ]);
            }

            /* RATING */
            if(($state['step'] ?? null)==='rating'){
                ChatState::set([
                    'step'=>'review',
                    'rating'=>(int)$msg,
                    'last_customer'=>$state['last_customer']
                ]);
                return response()->json(['reply'=>"Terima kasih ⭐{$msg}\nSilakan tulis ulasan Anda 📝"]);
            }

            /* ULASAN */
            if(($state['step'] ?? null)==='review'){
                // pastikan id_menu ada di state
                $idMenu = $state['id_menu'] ?? null;

                if(!$idMenu){
                    throw new \Exception("Menu untuk ulasan tidak ditemukan");
                }

                Ulasan::create([
                    'id_menu' => $idMenu,
                    'nama_pelanggan' => $state['last_customer'],
                    'rating' => $state['rating'],
                    'komentar' => $request->message
                ]);

                ChatState::reset();
                return response()->json(['reply'=>"🙏 Terima kasih atas ulasan Anda!"]);
            }


            return response()->json(['reply'=>"Ketik *menu* atau *pesan* 😊"]);

        } catch (\Throwable $e){
            DB::rollBack();
            return response()->json(['reply'=>"ERROR: ".$e->getMessage()],500);
        }
    }

    public function setReview()
    {
        $state = ChatState::get();
        ChatState::set([
            'step'=>'rating',
            'last_customer'=>$state['last_customer']
        ]);
        return response()->json(['status'=>'ok']);
    }
<<<<<<< HEAD

            private function getBlockedDates()
        {
            $libur = Libur::pluck('tanggal')->toArray();

            $jadwalProduksi = JadwalProduksi::pluck('tanggal_produksi')->toArray();

            $pesanan = Pesanan::whereNotNull('tanggal_produksi')
                ->pluck('tanggal_produksi')
                ->toArray();

            return array_unique(array_merge($libur, $jadwalProduksi, $pesanan));
        }

=======
>>>>>>> 2154e4b68bba9b697e3b2dc0bd83434d3cd78766
}
