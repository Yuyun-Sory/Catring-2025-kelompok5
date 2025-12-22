@extends('layouts.app')

@section('title', 'Tambah Jadwal Produksi')

@section('content')
<div class="container-fluid">
    <h2 class="fw-bold mb-3">Tambah Jadwal Produksi</h2>

    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
            <input type="date" class="form-control" name="tanggal_produksi" required>
        </div>
        <div class="mb-3">
            <label for="jam_produksi" class="form-label">Jam Produksi</label>
            <input type="time" class="form-control" name="jam_produksi" required>
        </div>
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" name="nama_pelanggan" required>
        </div>
        <div class="mb-3">
            <label for="id_menu" class="form-label">Menu</label>
            <select class="form-select" name="id_menu" required>
                <option value="">-- Pilih Menu --</option>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id_menu }}">{{ $menu->nama_menu }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah_porsi" class="form-label">Jumlah Porsi</label>
            <input type="number" class="form-control" name="jumlah_porsi" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jadwal.produksi') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
