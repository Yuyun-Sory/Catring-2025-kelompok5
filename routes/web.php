<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TotalPesananController;
use App\Http\Controllers\ChatAiController;
use App\Models\Ulasan;
use App\Http\Controllers\LiburController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\JadwalProduksiController;
use App\Models\JadwalProduksi;
use App\Models\Libur;



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/tes-view', function () {
    dd(view()->exists('pesanan-baru'));
});  

Route::post('/chatbot/send', [ChatAiController::class, 'ask'])->name('chatbot.send');
Route::get('/chatbot', [ChatAIController::class, 'index'])->name('chatbot.index');

// Halaman menu user
// Route::get('/menu-user', function () {
//     return view('layouts.menu-user');
// })->name('menu-user');

Route::get('/menu-user', [MenuController::class, 'menuUser'])->name('menu-user');
Route::get('/menu/{id}', [MenuController::class, 'detailMenuUser'])->name('menuUser');


// Halaman cara pesan
Route::get('/cara-pesan', function () {
    return view('layouts.cara-pesan');
});

// Halaman tentang
Route::get('/tentang', function () {
    return view('layouts.tentang');
});

// Detail Menu + Tampilkan Ulasan
Route::get('/menu/{slug}', [MenuController::class, 'detail'])->name('menu.detail');

Route::get('/menu/{slug}/ulasan', [MenuController::class, 'getUlasan'])->name('menu.ulasan');



Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::post('/chatbot/review', [ChatAIController::class, 'setReview']);


Route::get('/ulasan/list', function () {
    return Ulasan::latest()->take(6)->get();
});




// admin routes

Route::middleware(['auth'])->group(function () {

        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');

        Route::get('/admin/akun', [AdminController::class, 'daftarAkun'])
            ->name('admin.akun');

        Route::get('/admin/akun/tambah', [AdminController::class, 'tambahAkun'])
            ->name('admin.akun.tambah');

        Route::post('/admin/akun/simpan', [AdminController::class, 'storeAkun'])
            ->name('admin.akun.store');

        Route::get('/admin/akun/{id}/edit', [AdminController::class, 'editAkun'])->name('admin.akun.edit');

        Route::put('/admin/akun/{id}', [AdminController::class, 'updateAkun'])->name('admin.akun.update');

        Route::delete('/admin/akun/{id}', [AdminController::class, 'hapusAkun'])->name('admin.akun.delete');
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

       Route::get('/status_pesanan', [PesananController::class,'statusPesanan'])
    ->name('status.pesanan');



        //  TOTAL PESANAN (CRUD)
        Route::resource('total-pesanan', TotalPesananController::class);

        //  PEMESANAN MASUK (SEMUA)
        Route::get('/pemesanan/masuk', [PesananController::class, 'index'])
            ->name('pemesanan.masuk');

        //  PESANAN BARU (STATUS = MENUNGGU)
        Route::get('/pesanan/baru', [PesananController::class, 'pesananBaru'])
            ->name('pesanan.baru');

        //  UPDATE STATUS PESANAN
       Route::put('/pesanan/{id}/status-order', [PesananController::class, 'updateStatus'])
    ->name('pesanan.updateStatus');

        Route::get('/stok-bahan', [BahanController::class, 'index'])->name('stok.bahan');

        Route::get('/stok-bahan/create', [BahanController::class, 'create'])->name('stok.bahan.create');
        Route::post('/stok-bahan', [BahanController::class, 'store'])->name('stok.bahan.store');

        Route::get('/stok-bahan/{bahan}/edit', [BahanController::class, 'edit'])->name('stok.bahan.edit');
        Route::put('/stok-bahan/{bahan}', [BahanController::class, 'update'])->name('stok.bahan.update');

        Route::delete('/stok-bahan/{bahan}', [BahanController::class, 'destroy'])->name('stok.bahan.destroy');

    //  Jadwal Produksi
        Route::get('/jadwal-produksi', [JadwalProduksiController::class, 'index'])
            ->name('jadwal.produksi');

            Route::get('/jadwal-produksi/create', [JadwalProduksiController::class, 'create'])->name('jadwal.create');
            Route::post('/jadwal-produksi', [JadwalProduksiController::class, 'store'])->name('jadwal.store');

            Route::post('/jadwal-produksi/{jadwal}/bahan', [JadwalProduksiController::class, 'storeBahan'])->name('jadwal.bahan.store');



        // Laporan
      Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');


        // Logout (halaman logout tampilan)
        Route::get('/logout', function () {
            return view('logout');
        })->name('logout');


        // CRUD Pelanggan
        Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
        Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);

        // CRUD Kategori
        Route::resource('kategori', KategoriController::class);
        Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/{id}/delete', [KategoriController::class, 'destroy'])->name('kategori.delete');

        // Pastikan rute Anda memiliki nama menggunakan method ->name()
        Route::get('/admin/list', [AdminController::class, 'daftar'])->name('admin.daftar');

        // Rute Detail Pendapatan
        Route::get('/pendapatan-detail', [LaporanController::class, 'pendapatanDetail'])->name('pendapatan.detail');

        // Rute Detail Profit
        Route::get('/profit-detail', [LaporanController::class, 'profitDetail'])->name('profit.detail');

        Route::resource('libur', LiburController::class);

        // crud menu
        Route::get('/menu', [MenuController::class, 'index'])->name('menu');
        Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/', [MenuController::class, 'store'])->name('menu.store');
        // Pencarian menu
        Route::get('/menu/search', function (Request $request) {
            $query = $request->input('query');
            return view('layouts.menu', ['query' => $query]);
        })->name('menu.search');

          Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
         Route::put('/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
   

});

