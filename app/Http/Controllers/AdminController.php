<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard'); 
        // ini halaman dashboard kamu
    }

    public function daftarAkun()
    {
        return view('daftar-akun');
        // ini menuju halaman daftar akun
    }
}
