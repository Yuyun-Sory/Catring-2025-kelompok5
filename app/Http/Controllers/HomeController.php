<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
class HomeController extends Controller
{
  public function index()
{
    $menuPopuler = Menu::select(
            'menu.id_menu',
            'menu.nama_menu',
            'menu.harga',
            'menu.foto',
            'menu.kategori',
            DB::raw('COUNT(pesanans.id) as total_dibeli')
        )
        ->join('pesanans', 'menu.id_menu', '=', 'pesanans.id_menu')
        ->where('pesanans.status', '!=', 'batal')
        ->groupBy(
            'menu.id_menu',
            'menu.nama_menu',
            'menu.harga',
            'menu.foto',
            'menu.kategori'
        )
        ->orderByDesc('total_dibeli')
        ->limit(3)
        ->get();

    return view('layouts.home', compact('menuPopuler'));
}

}
