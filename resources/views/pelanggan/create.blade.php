@extends('layouts.app')

@section('title', 'Tambah Pelanggan')
@section('pelanggan_active', 'active')

@section('content')
<link rel="stylesheet" href="{{ asset('css/pelanggan.css') }}">
<div class="pelanggan-create">
    <div id="pelangganModal" class="modal">
        <div class="modal-content">
            <h2 style="margin-bottom:15px;">Tambah Pelanggan</h2>
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf
                <label>Nama Pelanggan</label>
                <input type="text" name="nama" required>
                <label>Nomor Telepon</label>
                <input type="text" name="telepon" required>
                <label>Alamat</label>
                <textarea name="alamat" rows="3" required></textarea>
                <div class="modal-buttons">
                    <a href="{{ route('pelanggan.index') }}" class="close-btn">Batal</a>
                    <button type="submit" class="save-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
