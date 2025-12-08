@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Edit Akun Admin</h3>
    <hr>

    <form action="{{ route('admin.akun.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nama</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email', $user->email) }}" required>
            </div>
        </div>

        <div class="row mb-3">

            <div class="col-md-6">
                <label>Telepon</label>
                <input type="text" name="phone" class="form-control"
                       value="{{ old('phone', $user->phone) }}" required>
            </div>

            <div class="col-md-6">
                <label>Role</label>
                <select name="role" class="form-select" required>
                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Karyawan" {{ $user->role == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                </select>
            </div>

        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.akun') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </form>

</div>
@endsection
