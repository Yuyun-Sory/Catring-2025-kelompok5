<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan; // Model Pesanan

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesananBaru = Pesanan::where('status', 'Baru')->get();

        $totalBaru = Pesanan::where('status', 'Baru')->count();
        $totalProses = Pesanan::where('status', 'Proses')->count();
        $totalSelesai = Pesanan::where('status', 'Selesai')->count();

        return view('pesanan.index', compact('pesananBaru', 'totalBaru', 'totalProses', 'totalSelesai'));
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
