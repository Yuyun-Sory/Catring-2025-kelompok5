<?php

namespace App\Http\Controllers;

use App\Models\JadwalProduksi;
use App\Models\Bahan;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Produksi;

class JadwalProduksiController extends Controller
{
    public function index()
    {
            $jadwal = JadwalProduksi::with(['menu', 'produksi.bahan'])
            ->orderBy('tanggal_produksi', 'asc')
            ->get();

        $bahans = Bahan::orderBy('nama')->get();

        return view('jadwal-produksi', compact('jadwal', 
        'bahans'));
    }

    public function create()
{
    $menus = Menu::orderBy('nama_menu')->get(); // daftar menu
    return view('jadwal_produksi_create', compact('menus'));
}

public function store(Request $request)
{
    $request->validate([
        'tanggal_produksi' => 'required|date',
        'jam_produksi' => 'required',
        'nama_pelanggan' => 'required|string|max:255',
        'id_menu' => 'required|exists:menu,id_menu',
        'jumlah_porsi' => 'required|integer|min:1',
    ]);

    JadwalProduksi::create($request->all());

   return redirect()->route('jadwal.produksi')->with('success', 'Jadwal produksi berhasil ditambahkan!');

}

public function storeBahan(Request $request, JadwalProduksi $jadwal)
{
    $request->validate([
        'bahan_id.*' => 'required|exists:bahans,id',
        'jumlah.*' => 'required|numeric|min:0',
        'satuan.*' => 'required|string',
    ]);

    foreach ($request->bahan_id as $index => $bahan_id) {
        Produksi::create([
            'jadwal_produksi_id' => $jadwal->id,
            'bahan_id' => $bahan_id,
            'jumlah' => $request->jumlah[$index],
            'satuan' => $request->satuan[$index],
        ]);
    }

    return redirect()->route('jadwal.produksi')->with('success', 'Bahan produksi berhasil ditambahkan!');
}


}
