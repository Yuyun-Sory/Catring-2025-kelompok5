<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PesananController extends Controller
{
    public function index()
    {
        // Ambil pesanan status baru
        $pesananBaru = Pemesanan::where('status', 'Baru')
            ->orderBy('created_at', 'DESC')
            ->get();

        // Hitung jumlah untuk summary box
        $totalBaru = Pemesanan::where('status', 'Baru')->count();
        $totalProses = Pemesanan::where('status', 'Proses')->count();
        $totalSelesai = Pemesanan::where('status', 'Selesai')->count();

        return view('pemesanan-masuk', [
            'pesananBaru'   => $pesananBaru,
            'totalBaru'     => $totalBaru,
            'totalProses'   => $totalProses,
            'totalSelesai'  => $totalSelesai,
        ]);
    }
}
