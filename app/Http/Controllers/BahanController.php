<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;
use Illuminate\Validation\Rule;

class BahanController extends Controller
{
    /**
     * READ: Menampilkan daftar bahan dan statistik.
     */
    public function index()
    {
        $bahans = Bahan::orderBy('nama')->get();

        $total_bahan = $bahans->count();
        $stok_menipis = $bahans->where('status', 'Menipis')->count();

        $total_nilai_stok = $bahans->sum(function ($bahan) {
            return (float)$bahan->stok_saat_ini * (float)$bahan->harga_satuan;
        });

        return view('stok-bahan.index', compact(
            'bahans',
            'total_bahan',
            'stok_menipis',
            'total_nilai_stok'
        ));
    }

    /**
     * CREATE: Menampilkan form tambah bahan.
     */
    public function create()
    {
        // tampilkan view create
        return view('stok-bahan.create');
    }

    /**
     * CREATE: Menyimpan data bahan baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'stok_saat_ini' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'minimal_stok' => 'required|integer|min:0',
            'harga_satuan' => 'required|numeric|min:0',
            'lokasi' => 'nullable|string|max:255'
        ]);

        Bahan::create($validatedData);

        return redirect()->route('stok.bahan')
            ->with('success', 'Bahan "' . $validatedData['nama'] . '" berhasil ditambahkan!');
    }

    /**
     * READ DETAIL (opsional)
     */
    public function show(Bahan $bahan)
    {
        return view('stok-bahan.detail', compact('bahan'));
    }

    /**
     * UPDATE: Menampilkan form edit bahan.
     */
    public function edit(Bahan $bahan)
    {
        return view('stok-bahan.edit', compact('bahan'));
    }

    /**
     * UPDATE: Proses update data.
     */
    public function update(Request $request, Bahan $bahan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'stok_saat_ini' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'minimal_stok' => 'required|integer|min:0',
            'harga_satuan' => 'required|numeric|min:0',
            'lokasi' => 'nullable|string|max:255'
        ]);

        $bahan->update($validatedData);

        return redirect()->route('stok.bahan')
            ->with('success', 'Bahan "' . $bahan->nama . '" berhasil diperbarui!');
    }

    /**
     * DELETE: Menghapus data bahan.
     */
    public function destroy(Bahan $bahan)
    {
        $namaBahan = $bahan->nama;

        $bahan->delete();

        return redirect()->route('stok.bahan')
            ->with('success', 'Bahan "' . $namaBahan . '" berhasil dihapus.');
    }
}
