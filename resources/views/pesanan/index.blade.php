@extends('layouts.app')

@section('title', 'Pesanan Baru')
@section('pemesanan_active', 'active') 
@push('styles')
<style>
/* ======================= GLOBAL ======================= */
body { font-family: 'Poppins', sans-serif; color:#333; background:#f5f6fa; margin:0; padding:0; }

/* TITLE & BREADCRUMB */
.title-box {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 25px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.breadcrumb {
    font-size: 14px;
    color: #999;
}

/* ======================= SUMMARY BOX ======================= */
.summary-container {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

.summary-box {
    flex: 1;
    min-width: 220px;
    padding: 35px 20px;
    border-radius: 14px;
    text-align: center;
    font-weight: 700;
    font-size: 18px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: default;
}

/* Warna summary */
.summary-box:nth-child(1) { background: #ffecb3; color: #ff6f00; } /* Baru */
.summary-box:nth-child(2) { background: #bbdefb; color: #1565c0; } /* Proses */
.summary-box:nth-child(3) { background: #c8e6c9; color: #2e7d32; } /* Selesai */

.summary-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

/* ======================= TABLE ======================= */
table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
    background:white;
    border-radius: 12px;
    overflow:hidden;
    box-shadow: 0 4px 25px rgba(0,0,0,0.08);
}

thead th {
    background: #f5f5f5;
    font-weight: 600;
    text-align: center;
    padding: 12px 10px;
    border-bottom: 1px solid #ddd;
}

tbody td {
    padding: 12px 10px;
    vertical-align: middle;
}

tr:nth-child(even) { background: #fafafa; }
tr:hover { background: #f0f4ff; transition: 0.3s; }

/* ======================= STATUS BADGE ======================= */
.status-badge {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
    text-align:center;
    min-width: 80px;
}

/* Warna status */
.status-baru { background: #ffe0b2; color: #e65100; }
.status-proses { background: #b3e5fc; color: #0277bd; }
.status-selesai { background: #c8e6c9; color: #2e7d32; }

/* ======================= ACTION BUTTON ======================= */
.action-group button {
    padding: 6px 14px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    margin-right: 5px;
    transition: all 0.3s;
}

.process-btn { background: #1565c0; color:white; }
.detail-btn { background: #2e7d32; color:white; }
.invoice-btn { background: #ff9800; color:white; }

.action-group button:hover {
    opacity:0.85;
    transform: translateY(-1px);
}

/* ======================= RESPONSIVE TABLE ======================= */
@media(max-width:768px){
    .summary-container { flex-direction: column; }
    table, thead, tbody, th, td, tr { display:block; }
    tr { margin-bottom: 15px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.05); }
    th { text-align:left; padding-left:50%; position:relative; background:#f5f5f5; }
    td { text-align:left; padding-left:50%; position:relative; }
    td::before { 
        content: attr(data-label);
        position:absolute; 
        left:10px; 
        font-weight:600; 
        color:#555;
    }
}
</style>
@endpush

@section('content')

<div class="title-box">
    Pemesanan Masuk
    <span class="breadcrumb">⚙ / Pemesanan Masuk</span>
</div>

<div class="summary-container">
    <div class="summary-box">Total Pesanan Baru: {{ $totalBaru }}</div>
    <div class="summary-box">Dalam Proses: {{ $totalProses }}</div>
    <div class="summary-box">Selesai: {{ $totalSelesai }}</div>
</div>

<table>
    <thead>
        <tr>
            <th>No Order</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Total Item</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pesananBaru as $p)
        <tr>
            <td data-label="No Order">{{ $p->no_order }}</td>
            <td data-label="Nama Pelanggan">{{ $p->nama_pelanggan }}</td>
            <td data-label="Tanggal">{{ $p->created_at->format('d M Y, H:i') }}</td>
            <td data-label="Total Item">{{ $p->total_item }}</td>
            <td data-label="Total Harga">Rp{{ number_format($p->total_harga,0,',','.') }}</td>
            <td data-label="Status" style="text-align:center;">
                @if($p->status == 'Baru')
                    <span class="status-badge status-baru">{{ $p->status }}</span>
                @elseif($p->status == 'Proses')
                    <span class="status-badge status-proses">{{ $p->status }}</span>
                @else
                    <span class="status-badge status-selesai">{{ $p->status }}</span>
                @endif
            </td>
            <td class="action-group" style="text-align:center;">
                <button class="process-btn" title="Proses Pesanan">Proses</button>
                <button class="detail-btn" title="Lihat Detail">Detail</button>
                <button class="invoice-btn" title="Cetak Invoice">Invoice</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
