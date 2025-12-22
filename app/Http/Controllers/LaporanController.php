<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Periode
        $bulan = $request->bulan ?? now()->month;
        $tahun = $request->tahun ?? now()->year;

        // PESANAN SELESAI SAJA
        $pesanan = Pesanan::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->where('status_order', 'selesai');

        // TOTAL PENDAPATAN
        $totalPendapatan = $pesanan->sum('total_harga');

        // STATUS PESANAN
        $statusPesanan = Pesanan::select('status_order', DB::raw('count(*) as total'))
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->groupBy('status_order')
            ->pluck('total', 'status_order');

        // TRANSAKSI PER HARI
        $perHari = Pesanan::select(
                DB::raw('DAYNAME(created_at) as hari'),
                DB::raw('count(*) as total')
            )
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->groupBy('hari')
            ->orderByDesc('total')
            ->get();

        $hariTersibuk = $perHari->first();

        // PENJUALAN PER MENU
        $penjualanMenu = Pesanan::join('menu','menu.id_menu','=','pesanans.id_menu')
            ->select('menu.nama_menu', DB::raw('SUM(total_item) as total'))
            ->whereMonth('pesanans.created_at', $bulan)
            ->whereYear('pesanans.created_at', $tahun)
            ->groupBy('menu.nama_menu')
            ->get();

        return view('laporan', compact(
            'totalPendapatan',
            'statusPesanan',
            'hariTersibuk',
            'penjualanMenu',
            'bulan',
            'tahun'
        ));
    }
}
