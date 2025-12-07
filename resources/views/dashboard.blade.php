@extends('layouts.app')

@section('title', 'Dashboard')
@section('dashboard_active', 'active')

@push('styles')
<style>
    .cards {
        display: flex;
        gap: 20px;
        margin-top: 25px;
        flex-wrap: wrap;
    }

    .card-link {
        text-decoration: none;
        color: inherit;
        flex-grow: 1;
        flex-basis: 0;
        min-width: 150px;
    }

    .card {
        padding: 20px 25px;
        font-size: 16px;
        color: white;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        height: 100%;
        transition: .2s;
    }

    .card:hover {
        transform: translateY(-4px);
        opacity: 0.95;
    }

    .blue { background: #0066ff; }
    .green { background: #65f28f; color: black; }
    .orange { background: #ff8c29; }
    .purple { background: #8a60ff; }
</style>
@endpush

@section('content')

<div class="title-box">
    Dashboard
    <span class="breadcrumb">⚙ / Dashboard</span>
</div>

<div class="cards">
    <a class="card-link" href="{{ route('pelanggan.index') }}">
        <div class="card green">👤 Pelanggan</div>
    </a>

    <a class="card-link" href="{{ route('kategori.index') }}">
        <div class="card blue">📂 Kategori</div>
    </a>

    <a class="card-link" href="{{ route('pesanan.index') }}">
        <div class="card orange">🛒 Pesanan</div>
    </a>

    <a class="card-link" href="{{ route('total-pesanan.index') }}">
        <div class="card purple">📊 Total Pesanan</div>
    </a>
</div>

@endsection
