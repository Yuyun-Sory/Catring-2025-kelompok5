<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    // Tampilkan semua menu berdasarkan kategori
    public function index()
    {
        return view('kategori.index', [
            'makanans' => Kategori::where('kategori', 'makanan')->get(),
            'minumans' => Kategori::where('kategori', 'minuman')->get(),
            'cemilans' => Kategori::where('kategori', 'cemilan')->get(),
            'oleholeh' => Kategori::where('kategori', 'oleh-oleh')->get(),
        ]);
    }

    // Simpan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $file = $request->foto->store('kategoris', 'public');

        Kategori::create([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'foto' => $file,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    // Update menu
    public function update(Request $request, $id)
    {
        $menu = Kategori::findOrFail($id);

        $request->validate([
            'nama_menu' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $file = $menu->foto;
        if ($request->hasFile('foto')) {
            // hapus foto lama jika ingin
            // Storage::disk('public')->delete($menu->foto);
            $file = $request->foto->store('kategoris', 'public');
        }

        $menu->update([
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'foto' => $file,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Menu berhasil diupdate!');
    }

    // Hapus menu
    public function destroy($id)
    {
        $menu = Kategori::findOrFail($id);
        // hapus file foto dari storage (opsional)
        // Storage::disk('public')->delete($menu->foto);

        $menu->delete();

        return redirect()->route('kategori.index')->with('success', 'Menu berhasil dihapus!');
    }
}
