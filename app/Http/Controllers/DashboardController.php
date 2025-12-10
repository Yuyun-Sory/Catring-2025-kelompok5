<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Kategori;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    /**
     * Display dashboard dengan semua data.
     */
    public function index()
    {
        // Total card
        $totals = [
            'pelanggan' => Pelanggan::count(),
            'kategori' => Kategori::count(),
            'pesanan' => Pesanan::count(),
            'total_pendapatan' => Pesanan::where('status', 'Selesai')->sum('total_harga'),
            'total_profit' => Pesanan::where('status', 'Selesai')->sum('total_harga') * 0.4, // misal profit 40%
        ];

        // Status Pesanan
        $statusPesanan = [
            'selesai' => Pesanan::where('status','Selesai')->count(),
            'diproses' => Pesanan::where('status','Diproses')->count(),
            'pending' => Pesanan::where('status','Pending')->count(),
            'batal' => Pesanan::where('status','Batal')->count(),
        ];

        // Hari tersibuk
        $hariTersibuk = Pesanan::selectRaw('DAYNAME(created_at) as hari, COUNT(*) as total')
            ->groupBy('hari')
            ->orderByDesc('total')
            ->first()->hari ?? '-';

        // Chart pendapatan bulanan
        $chartLabels = ['Jan','Feb','Mar','Apr','Mei','Jun'];
        $chartData = [];
        foreach ($chartLabels as $bulan) {
            $chartData[] = Pesanan::where('status','Selesai')
                ->whereMonth('created_at', date('m', strtotime($bulan)))
                ->sum('total_harga');
        }

        // Menu paling laris
        $menuLaris = Pesanan::select('menu', \DB::raw('COUNT(*) as total'))
            ->groupBy('menu')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        // Detail pendapatan untuk modal
        $pendapatanList = Pesanan::where('status','Selesai')->get();

        return view('dashboard', compact(
            'totals','statusPesanan','hariTersibuk','chartLabels','chartData','menuLaris','pendapatanList'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
