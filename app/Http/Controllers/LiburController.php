<?php

namespace App\Http\Controllers;

use App\Models\Libur;
use Illuminate\Http\Request;

class LiburController extends Controller
{
    public function index()
    {
        // JAMAK karena banyak data
        $liburs = Libur::orderBy('tanggal')->get();

        return view('teras-chat.index', compact('liburs'));
    }

    public function create()
    {
        return view('teras-chat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal'    => 'required|date|unique:liburs,tanggal',
            'keterangan' => 'required|string|max:255'
        ]);

        Libur::create([
            'tanggal'    => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        return redirect()
            ->route('libur.index')
            ->with('success', 'Hari libur berhasil ditambahkan');
    }

    public function edit($id)
    {
        // TUNGGAL
        $libur = Libur::findOrFail($id);

        return view('teras-chat.edit', compact('libur'));
    }

    public function update(Request $request, $id)
    {
        $libur = Libur::findOrFail($id);

        $request->validate([
            'tanggal'    => 'required|date|unique:liburs,tanggal,' . $libur->id,
            'keterangan' => 'required|string|max:255'
        ]);

        $libur->update([
            'tanggal'    => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        return redirect()
            ->route('libur.index')
            ->with('success', 'Hari libur berhasil diperbarui');
    }

    public function destroy($id)
    {
        Libur::findOrFail($id)->delete();

        return redirect()
            ->route('libur.index')
            ->with('success', 'Hari libur berhasil dihapus');
    }
}
