@extends('layouts.app')

@section('title', 'Dashboard')
@section('dashboard_active', 'active')

@push('styles')
<style>
.cards {
    display: flex;
    flex-wrap: wrap;
    gap: 25px;
    margin-top: 15px;
}

.card-link {
    text-decoration: none;
    color: inherit;
    flex: 1 1 220px;
}

.card {
    background: linear-gradient(135deg, #667eea, #764ba2);
    padding: 25px 20px;
    border-radius: 15px;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* pastikan konten tidak melebihi */
    align-items: flex-start;
    height: 150px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
    overflow: hidden; /* mencegah konten keluar */
}

.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 25px rgba(0,0,0,0.15);
}

.card .icon {
    font-size: 40px;
}

.card .title {
    font-size: 18px;
    font-weight: 600;
    margin-top: 10px;
}

.card .count {
    font-size: 22px; /* lebih kecil agar muat */
    font-weight: bold;
    margin-top: auto; /* push ke bawah card */
    align-self: flex-end; /* letakkan angka di kanan bawah */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Gradien warna */
.green { background: linear-gradient(135deg, #42e695, #3bb2b8); }
.blue { background: linear-gradient(135deg, #36d1dc, #5b86e5); }
.orange { background: linear-gradient(135deg, #f7971e, #ffd200); }
.purple { background: linear-gradient(135deg, #8e2de2, #4a00e0); }
</style>

@endpush

@section('content')

<div class="p-4">
<div class="title-box">
    Dashboard
    <span class="breadcrumb">⚙ / Overview</span>
</div>

<div class="cards">
    <!-- Pelanggan Card -->
    <a class="card-link" href="{{ route('pelanggan.index') }}">
        <div class="card green">
            <div class="icon">👤</div>
            <div class="title">Pelanggan</div>
            <div class="count">{{ $totalPelanggan ?? 0 }}</div>
        </div>
    </a>

    <!-- Kategori Card -->
    <a class="card-link" href="{{ route('kategori.index') }}">
        <div class="card blue">
            <div class="icon">📂</div>
            <div class="title">Kategori</div>
            <div class="count">{{ $totalKategori ?? 0 }}</div>
        </div>
    </a>

    <!-- Pesanan Card -->
    <a class="card-link" href="{{ route('pesanan.baru') }}">
        <div class="card orange">
            <div class="icon">🛒</div>
            <div class="title">Pesanan Baru</div>
            <div class="count">{{ $totalPesanan ?? 0 }}</div>
        </div>
    </a>

    <!-- Total Pendapatan Card -->
    <a class="card-link" href="{{ route('total-pesanan.index') }}">
        <div class="card purple">
            <div class="icon">📊</div>
            <div class="title">Total Pesanan</div>
            <div class="count">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</div>
        </div>
    </a>
</div>



</div>

@endsection
