<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        return view('dashboard');
    }

    // Daftar Akun
    public function daftarAkun()
    {
        $users = Admin::all();
        return view('daftar-akun', compact('users'));
    }

    // Form Tambah Akun
    public function tambahAkun()
    {
        return view('tambah-akun');
    }

    // Simpan Akun Baru
    public function storeAkun(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string',
            'role' => 'required|string',
            'status' => 'nullable|string',
        ]);

        Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'] ?? null,
            'role' => $validated['role'],
            'status' => $validated['status'] ?? 'Aktif',
        ]);

        return redirect()->route('admin.akun')->with('success', 'Akun berhasil ditambahkan!');
    }

    // Form Edit Akun
    public function editAkun($id)
    {
        $user = Admin::findOrFail($id);
        return view('edit-akun', compact('user'));
    }

    // Update Akun
    public function updateAkun(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string',
            'role' => 'required|string',
            'status' => 'nullable|string',
        ]);

        $user = Admin::findOrFail($id);
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'role' => $validated['role'],
            'status' => $validated['status'] ?? $user->status,
        ]);

        return redirect()->route('admin.akun')->with('success', 'Akun berhasil diperbarui!');
    }

    // Hapus Akun
    public function hapusAkun($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('admin.akun')->with('success', 'Akun berhasil dihapus!');
    }
}
