<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\AdminController;

// Halaman utama
Route::get('/', function () {
    return view('layouts.home');
});

// Halaman menu
Route::get('/menu', function () {
    return view('layouts.menu');
})->name('menu');

// Pencarian menu
Route::get('/menu/search', function (Request $request) {
    $query = $request->input('query');
    return view('layouts.menu', ['query' => $query]);
})->name('menu.search');

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

// (Opsional) API Ulasan kalau nanti mau
Route::get('/menu/{slug}/ulasan', [MenuController::class, 'getUlasan'])->name('menu.ulasan');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/admin/pemesanan/masuk', [MenuController::class, 'pesananMasuk'])
     ->name('pemesanan.masuk');
Route::get('/pemesanan-masuk', function () {
    return view('pemesanan-masuk');
})->name('pemesanan.masuk');

Route::get('/status_pesanan', function () {
    return view('status_pesanan');
})->name('status.pesanan');

// Stok Bahan
Route::get('/stok-bahan', function () {
    return view('stok-bahan');
})->name('stok.bahan');

// Jadwal Produksi
Route::get('/jadwal-produksi', function () {
    return view('jadwal-produksi');
})->name('jadwal.produksi');

// Laporan
Route::get('/laporan', function () {
    return view('laporan');
})->name('laporan');

// Teras Chat
Route::get('/teras-chat', function () {
    return view('teras-chat');
})->name('teras.chat');

// Logout (halaman logout tampilan)
Route::get('/logout', function () {
    return view('logout');
})->name('logout');

Route::get('/pelanggan', function () {
    return view('pelanggan');
})->name('pelanggan.index');

Route::get('/pesanan', function () {
    return view('pesanan');
})->name('pesanan.index');

Route::get('/kategori', function () {
    return view('kategori');
})->name('kategori.index');

Route::get('/total-pesanan', function () {
    return view('total-pesanan');
})->name('total-pesanan.index');

Route::get('/admin/daftar-akun', [AdminController::class, 'daftarAkun'])->name('admin.daftar');



