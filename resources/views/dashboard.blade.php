@extends('layouts.app')

@section('title', 'Dashboard - Teras')

@section('content')

    <div class="title-box">
        Dashboard
        <span class="breadcrumb">⚙ / Dashboard</span>
    </div>

    <div class="cards">
        <a class="card-link" href="{{ route('pelanggan.index') }}">
            <div class="card blue">👥 3 Pelanggan</div>
        </a>

        <a class="card-link" href="{{ route('kategori.index') }}">
            <div class="card blue">📂 Kategori</div>
        </a>
        
        <a class="card-link" href="{{ route('pesanan.index') }}">
            <div class="card blue">🛒 2 Pesanan Baru</div>
        </a>

        <a class="card-link" href="{{ route('total-pesanan.index') }}">
            <div class="card blue">🛒 5 Total Pesanan</div>
        </a>
    </div>
    
@endsection