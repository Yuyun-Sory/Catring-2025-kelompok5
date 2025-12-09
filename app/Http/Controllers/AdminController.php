<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // DASHBOARD
    public function dashboard()
    {
        return view('dashboard');
    }

    // TAMPILKAN DAFTAR AKUN
    public function daftarAkun()
    {
        $users = User::all();
        return view('daftar-akun', compact('users'));
    }

    // FORM TAMBAH AKUN
    public function tambahAkun()
    {
        return view('tambah-akun');
    }

    // SIMPAN AKUN BARU
    public function storeAkun(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string',
            'role' => 'required|string',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'],
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.akun')->with('success', 'Akun berhasil ditambahkan!');
    }

    // FORM EDIT AKUN
    public function editAkun($id)
    {
        $user = User::findOrFail($id);
        return view('edit-akun', compact('user'));
    }

    // UPDATE AKUN
    public function updateAkun(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string',
            'role' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('admin.akun')->with('success', 'Akun berhasil diperbarui!');
    }

    // HAPUS AKUN
    public function hapusAkun($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.akun')->with('success', 'Akun berhasil dihapus!');
    }
}
