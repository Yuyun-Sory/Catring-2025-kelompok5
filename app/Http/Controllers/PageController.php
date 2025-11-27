<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // ===========================
    // HALAMAN DASHBOARD
    // ===========================
    public function dashboard()
    {
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    // ===========================
    // HALAMAN PEMESANAN MASUK
    // ===========================
    public function pemesananMasuk()
    {
        return view('pemesanan-masuk', [
            'title' => 'Pemesanan Masuk'
        ]);
    }
}
