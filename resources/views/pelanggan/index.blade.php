@extends('layouts.app')

@section('title', 'Data Pelanggan')
@section('pelanggan_active', 'active')

@section('content')
<link rel="stylesheet" href="{{ asset('css/pelanggan.css') }}">
<div class="pelanggan-index">

    <div class="title-box" style="display:flex; justify-content:space-between; align-items:center;">
        <div>
            Dashboard > Data Pelanggan
            <span class="breadcrumb">⚙ / Pelanggan</span>
        </div>
        <a href="{{ route('pelanggan.create') }}" class="add-btn">+ Tambah Pelanggan</a>
    </div>

    <div class="table-container">
        <h2>Daftar Pelanggan</h2>
        <table>
            <thead>
                <tr>
                    <th style="width:5%;">No</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th style="width:15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pelanggans as $pelanggan)
                <tr>
                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                    <td><b>{{ $pelanggan->nama }}</b></td>
                    <td>{{ $pelanggan->telepon }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td style="text-align:center;">
                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="action-btn edit-btn">Edit</a>
                        <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Tidak ada data pelanggan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
