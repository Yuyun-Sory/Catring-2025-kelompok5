<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
class PesananController extends Controller
{

public function index()
{
    $pesanan = Pesanan::with(['menu', 'pelanggan'])->get();

    return view('pemesanan-masuk', [
        'pesanan' => $pesanan,
        'total' => $pesanan->count(),
        'menunggu' => $pesanan->where('status_order','menunggu')->count(),
        'diproses' => $pesanan->where('status_order','diproses')->count(),
        'selesai' => $pesanan->where('status_order','selesai')->count(),
        'dibatalkan' => $pesanan->where('status_order','dibatalkan')->count(),
    ]);
}


    public function pesananBaru()
    {
        $pesanan = Pesanan::where('status', 'Baru')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pesanan.pesanan-baru', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
{
    Pesanan::where('id', $id)->update([
        'status_order' => $request->status_order
    ]);

    return back()->with('success','Status pesanan diperbarui');
}

public function statusPesanan()
{
    $pesanan = Pesanan::with('menu')
        ->orderBy('created_at','desc')
        ->get();

    return view('status_pesanan', [
        'pesanan' => $pesanan,
        'menunggu' => $pesanan->where('status_order','menunggu')->count(),
        'diproses' => $pesanan->where('status_order','diproses')->count(),
        'selesai' => $pesanan->where('status_order','selesai')->count(),
        'dibatalkan' => $pesanan->where('status_order','dibatalkan')->count(),
    ]);
}


}
