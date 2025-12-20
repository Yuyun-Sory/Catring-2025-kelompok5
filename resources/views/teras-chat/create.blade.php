@extends('layouts.app')

@section('title', 'Tambah Hari Libur')

@section('content')
<link rel="stylesheet" href="{{ asset('css/teras-chat.css') }}">

<div class="form-wrapper">
    <div class="form-card">
        <h3>➕ Tambah Hari Libur</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('libur.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Tanggal Libur</label>
                <input type="date" name="tanggal"
                       class="form-control"
                       value="{{ old('tanggal') }}"
                       required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan"
                       class="form-control"
                       placeholder="Contoh: Libur Natal"
                       value="{{ old('keterangan') }}"
                       required>
            </div>

            <div class="form-actions">
                <a href="{{ route('libur.index') }}" class="btn-cancel">
                    Batal
                </a>
                <button type="submit" class="btn-save">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
