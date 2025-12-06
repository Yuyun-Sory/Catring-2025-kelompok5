@extends('layouts.app')

@section('title', 'Dashboard')

{{-- Menandai link sidebar 'Dashboard' sebagai aktif --}}
{{-- Catatan: Logika active class di app.blade.php sudah menggunakan request()->routeIs, 
     sehingga baris ini opsional, namun tetap dipertahankan jika Anda ingin override. --}}
@section('dashboard_active', 'active') 

@push('styles')
<style>
    /* ====================================================================== */
    /* CSS SPESIFIK DASHBOARD */
    /* ====================================================================== */
    .cards {
        display: flex;
        gap: 20px;
        margin-top: 25px;
        flex-wrap: wrap; 
    }

    .card-link {
        text-decoration: none;
        color: inherit;
        /* Kunci untuk membuat card sama besar dan memenuhi ruang */
        flex-grow: 1; 
        flex-basis: 0; 
        min-width: 150px; 
    }

    .card {
        padding: 20px 25px;
        font-size: 16px;
        color: white;
        border-radius: 8px;
        font-weight: bold;
        /* Hapus width: 180px; yang membatasi lebar card */
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        height: 100%; /* Pastikan div card mengisi tinggi a.card-link */
    }

    /* Warna Card */
    .blue { background: #0066ff; }
    .green { background: #65f28f; color: black; }
    .orange { background: #ff8c29; }
    .orange2 { background: #e67d45; }
</style>
@endpush

@section('content')

    <div class="title-box">
        Dashboard
        <span class="breadcrumb">⚙ / Dashboard</span>
    </div>

    <div class="cards">
        {{-- Menambahkan class 'card-link' ke <a> --}}
        <a class="card-link" href="{{ route('pelanggan.index') }}">
            <div class="card blue">👥 3 Pelanggan</div>
        </a>

        <a class="card-link" href="{{ route('kategori.index') }}">
            <div class="card green">📂 5 Kategori</div>
        </a>

        <a class="card-link" href="{{ route('pesanan.index') }}">
            <div class="card orange">🛒 2 Pesanan Baru</div>
        </a>

        <a class="card-link" href="{{ route('total-pesanan.index') }}">
            <div class="card orange2">🛒 5 Total Pesanan</div>
        </a>
    </div>

@endsection