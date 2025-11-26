<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Login manual (tidak pakai database)
        if ($request->email === 'teras@gmail.com' && $request->password === '12345678') {

            // Simpan sesi login
            session(['logged_in' => true]);

            return redirect('/dashboard')->with('success', 'Berhasil login!');
        }

        // Jika gagal
        return back()->with('error', 'Email atau password salah!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}
