@extends('layouts.app')

@section('title', 'Edit Bahan: ' . $bahan->nama)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/stok-bahan.css') }}">
@endpush

@section('content')

{{-- Modal Edit Bahan --}}
<div class="modal-overlay">
    <div class="modal-content">
        <h3 class="modal-title">✍️ Edit Bahan: {{ $bahan->nama }}</h3>
        <form action="{{ route('stok.bahan.update', $bahan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group">
                    <label for="nama">Nama Bahan:</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $bahan->nama) }}" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        @foreach(['Bahan Pokok','Protein','Sayuran','Bumbu','Lainnya'] as $kat)
                            <option value="{{ $kat }}" {{ old('kategori', $bahan->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="stok_saat_ini">Stok Saat Ini:</label>
                    <input type="number" name="stok_saat_ini" id="stok_saat_ini" class="form-control" value="{{ old('stok_saat_ini', $bahan->stok_saat_ini) }}" required>
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan:</label>
                    <input type="text" name="satuan" id="satuan" class="form-control" value="{{ old('satuan', $bahan->satuan) }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="minimal_stok">Minimal Stok (Batas Menipis):</label>
                    <input type="number" name="minimal_stok" id="minimal_stok" class="form-control" value="{{ old('minimal_stok', $bahan->minimal_stok) }}" required>
                </div>
                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan (Rp):</label>
                    <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" value="{{ old('harga_satuan', $bahan->harga_satuan) }}" step="0.01" required>
                </div>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi Penyimpanan:</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $bahan->lokasi) }}">
            </div>

            <div class="form-actions">
                <a href="{{ route('stok.bahan') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit btn-update">Perbarui Bahan</button>
            </div>
        </form>
    </div>
</div>

@endsection
