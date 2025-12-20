@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">

    <div class="card shadow-lg p-5" style="width: 520px; border-radius: 12px;">

        {{-- LOGO --}}
        <div class="text-center mb-3">
            <h1 style="font-weight:800; font-size:48px;">T</h1>
            <h5 class="mb-4">Catering Teras Bu Rini</h5>
        </div>

        <form action="{{ route('admin.akun.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap Anda" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
            </div>

            <div class="mb-3">
                <label>Telepon</label>
                <input type="text" name="phone" class="form-control" placeholder="08xxxxxxxx">
            </div>

            <div class="mb-4">
                <label>Role</label>
                <select name="role" class="form-select">
                    <option value="Admin">Admin Utama</option>
                    <option value="Karyawan">Karyawan</option>
                </select>
            </div>

            <button class="btn btn-success w-100 py-2">Simpan</button>

            <a href="{{ route('admin.akun') }}" class="btn btn-light w-100 mt-2">
                Kembali
            </a>
        </form>

    </div>
</div>
@endsection
