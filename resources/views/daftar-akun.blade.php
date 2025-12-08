@extends('layouts.app')
@section('title', 'Daftar Admin')

@push('styles')
<style>
    .admin-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
    }
    .admin-table th, .admin-table td {
        border: 1px solid #d6d6d6;
        padding: 8px;
        text-align: center;
    }
    .admin-table th {
        background: #f4f4f4;
        font-weight: bold;
    }
    .btn-edit {
        background: #4cd964;
        color: white;
        padding: 4px 12px;
        border-radius: 5px;
        border: none;
        text-decoration: none;
    }
    .btn-delete {
        background: #ff3b30;
        color: white;
        padding: 4px 12px;
        border-radius: 5px;
        border: none;
    }
</style>
@endpush

@section('content')
<div class="content-wrapper p-4">
    
    <h4><b>Daftar Admin</b></h4>

    {{-- FORM TAMBAH ADMIN --}}
    <form action="{{ route('admin.akun.store') }}" method="POST" class="mb-4">
        @csrf

        <div class="row mb-3">
            <div class="col-md-4">
                <label>Nama Admin</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">

            <div class="col-md-4">
                <label>Role</label>
                <select name="role" class="form-select" required>
                    <option value="Admin">Admin</option>
                    <option value="Karyawan">Karyawan</option>
                </select>
            </div>

            <div class="col-md-4">
                <label>Telepon</label>
                <input type="text" name="phone" class="form-control" placeholder="08xxxxxxxx" required>
            </div>

        </div>

        <button class="btn btn-success px-4">Simpan</button>
    </form>

    {{-- TABEL DATA ADMIN --}}
    <table class="admin-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}.</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->status ?? 'Aktif' }}</td>

                <td>

                    {{-- TOMBOL EDIT --}}
                    <a href="{{ route('admin.akun.edit', $user->id) }}" class="btn-edit">
                        Edit
                    </a>

                    {{-- TOMBOL HAPUS --}}
                    <form action="{{ route('admin.akun.delete', $user->id) }}" 
                          method="POST" 
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                                onclick="return confirm('Yakin mau hapus akun ini?')">
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
