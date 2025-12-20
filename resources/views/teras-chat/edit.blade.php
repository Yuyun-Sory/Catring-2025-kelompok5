@extends('layouts.app')

@section('title', 'Edit Hari Libur')

@section('content')
<link rel="stylesheet" href="{{ asset('css/teras-chat.css') }}">

<div class="form-wrapper">
    <div class="form-card">
        <h3>✏️ Edit Hari Libur</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('libur.update', $libur->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Tanggal Libur</label>
                <input type="date" name="tanggal"
                       class="form-control"
                       value="{{ $libur->tanggal }}"
                       required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan"
                       class="form-control"
                       value="{{ $libur->keterangan }}"
                       required>
            </div>

            <div class="form-actions">
                <a href="{{ route('libur.index') }}" class="btn-cancel">
                    Batal
                </a>
                <button type="submit" class="btn-save">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
