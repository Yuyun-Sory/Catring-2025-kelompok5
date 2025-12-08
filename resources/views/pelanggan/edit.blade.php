@extends('layouts.app')

@section('title', 'Edit Pelanggan')
@section('pelanggan_active', 'active')

@section('content')
<link rel="stylesheet" href="{{ asset('css/pelanggan.css') }}">
<div class="pelanggan-edit">
    <div class="modal" id="editModal">
        <div class="modal-content">
            <h2 style="margin-bottom:15px;">Edit Data Pelanggan</h2>
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label>Nama Pelanggan</label>
                <input type="text" name="nama" value="{{ $pelanggan->nama }}" required>
                <label>Nomor Telepon</label>
                <input type="text" name="telepon" value="{{ $pelanggan->telepon }}" required>
                <label>Alamat</label>
                <textarea name="alamat" rows="3" required>{{ $pelanggan->alamat }}</textarea>
                <div class="modal-buttons">
                    <a href="{{ route('pelanggan.index') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-save">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
