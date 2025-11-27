<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;

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

Route::get('/pemesanan-masuk', function () {
    return view('pemesanan-masuk');
})->name('pemesanan.masuk');
