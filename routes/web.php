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



Route::get('/stok-bahan', [BahanController::class, 'index'])->name('stok.bahan');

Route::get('/stok-bahan/create', [BahanController::class, 'create'])->name('stok.bahan.create');
Route::post('/stok-bahan', [BahanController::class, 'store'])->name('stok.bahan.store');

Route::get('/stok-bahan/{bahan}/edit', [BahanController::class, 'edit'])->name('stok.bahan.edit');
Route::put('/stok-bahan/{bahan}', [BahanController::class, 'update'])->name('stok.bahan.update');

Route::delete('/stok-bahan/{bahan}', [BahanController::class, 'destroy'])->name('stok.bahan.destroy');
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


// CRUD Pesanan
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');

// CRUD Total Pesanan
Route::resource('total-pesanan', App\Http\Controllers\TotalPesananController::class);



