<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;

class PesananController extends Controller
{
    /**
     * =========================
     * PEMESANAN MASUK (SEMUA)
     * =========================
     */
    public function index()
    {
        $pesanan = Pesanan::orderBy('created_at', 'DESC')->get();

        $totalPesanan = Pesanan::count();
        $menunggu     = Pesanan::where('status', 'Baru')->count();
        $diproses     = Pesanan::where('status', 'Proses')->count();
        $selesai      = Pesanan::where('status', 'Selesai')->count();
        $dibatalkan   = Pesanan::where('status', 'Dibatalkan')->count();

        return view('pemesanan-masuk', compact(
            'pesanan',
            'totalPesanan',
            'menunggu',
            'diproses',
            'selesai',
            'dibatalkan'
        ));
    }

    /**
     * =========================
     * PESANAN BARU (STATUS BARU)
     * =========================
     */
    public function pesananBaru()
    {
        $pesanan = Pesanan::where('status', 'Baru')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pesanan.pesanan-baru', compact('pesanan'));
    }
}
