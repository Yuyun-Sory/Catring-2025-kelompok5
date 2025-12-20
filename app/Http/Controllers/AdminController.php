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

    // =====================
    // DAFTAR ADMIN
    // =====================
    public function daftarAkun()
    {
        $users = Admin::orderBy('id', 'desc')->get();
        return view('daftar-akun', compact('users'));
    }

    // =====================
    // FORM TAMBAH ADMIN
    // =====================
    public function tambahAkun()
    {
        return view('tambah-akun');
    }

    // =====================
    // SIMPAN ADMIN BARU
    // =====================
    public function storeAkun(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone'    => 'nullable|string',
            'role'     => 'required',
        ]);

        Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'phone'    => $request->phone,
            'role'     => $request->role,
            'status'   => 'Aktif',
        ]);

        // 🔥 INI KUNCINYA
        return redirect()
            ->route('admin.akun')
            ->with('success', 'Admin berhasil ditambahkan!');
    }

    // =====================
    // FORM EDIT ADMIN
    // =====================
    public function editAkun($id)
    {
        $user = Admin::findOrFail($id);
        return view('edit-akun', compact('user'));
    }

    // =====================
    // UPDATE ADMIN
    // =====================
    public function updateAkun(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string',
            'role'  => 'required',
        ]);

        $user = Admin::findOrFail($id);
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role'  => $request->role,
        ]);

        return redirect()
            ->route('admin.akun')
            ->with('success', 'Admin berhasil diperbarui!');
    }

    // =====================
    // HAPUS ADMIN
    // =====================
    public function hapusAkun($id)
    {
        Admin::findOrFail($id)->delete();

        return redirect()
            ->route('admin.akun')
            ->with('success', 'Admin berhasil dihapus!');
    }
}
