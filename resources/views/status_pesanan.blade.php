@extends('layouts.app')

@section('title', 'Status Pesanan')

@section('content')

<style>
    .badge-blue {
        background:#0050ff; 
        color:white; 
        padding:6px 14px; 
        border-radius:10px; 
        font-size:14px;
        display:flex;
        align-items:center;
        gap:6px;
    }
    .badge-gray {
        background:#e9e9e9; 
        padding:8px 18px; 
        border-radius:20px; 
        border:none;
        cursor:pointer;
    }
    .badge-green {
        background:#7beb8b; 
        padding:8px 18px; 
        border-radius:20px; 
        border:none;
        cursor:pointer;
    }
    .card-order {
        background:white; 
        padding:20px; 
        border:1px solid #cfcfcf; 
        border-radius:10px; 
        margin-bottom:18px;
    }
    .status-pill {
        padding:4px 10px;
        border-radius:12px;
        color:white;
        font-size:12px;
    }
    .pill-selesai { background:#3FBF3F; }
    .pill-menunggu { background:#757575; }
    .pill-diproses { background:#1976ff; }
    .pill-dikirim { background:#df9d00; }
    .pill-batal { background:#d83131; }
    .update-btn {
        padding:6px 12px; 
        border-radius:6px; 
        border:none;
        cursor:pointer;
        font-size:13px;
    }
    .btn-proses { background:#7beb8b; }
    .btn-batalkan { background:#ff6f6f; }
    .btn-kirim { background:#82C0FF; }
</style>

<h1 style="
    font-size:32px;
    font-weight:bold;
    margin-bottom:20px;
">
    Status Pesanan
</h1>

<!-- SUMMARY BUTTON BAR -->
<div style="display:flex; gap:12px; flex-wrap:wrap;">
    <div class="badge-blue">📦 Menunggu <b>1</b></div>
    <div class="badge-blue">⚙️ Diproses <b>1</b></div>
    <div class="badge-blue">📤 Dikirim <b>1</b></div>
    <div class="badge-blue">✔️ Selesai <b>1</b></div>
    <div class="badge-blue">❌ Dibatalkan <b>1</b></div>
</div>

<!-- FILTER BUTTONS -->
<div style="display:flex; gap:10px; margin:20px 0;">
    <button class="badge-green">Semua</button>
    <button class="badge-gray">Menunggu</button>
    <button class="badge-gray">Diproses</button>
    <button class="badge-gray">Dalam Perjalanan</button>
    <button class="badge-gray">Selesai</button>
    <button class="badge-gray">Dibatalkan</button>
</div>

<!-- SEARCH BAR -->
<input type="text" placeholder="🔍 Cari Pesanan (No Pesanan, Nama/Menu...)"
    style="
        width:100%; 
        padding:12px; 
        border-radius:10px; 
        border:1px solid #ccc;
        margin-bottom:20px;
    ">

<!-- CARD 1 -->
<div class="card-order">

    <div style="display:flex; justify-content:space-between;">
        <div><b>2025-0015</b></div>
        <span class="status-pill pill-selesai">Selesai</span>
    </div>

    <p style="font-weight:bold; margin-top:10px;">Nasi Ayam Goreng Lalapan</p>

    <p>
        Ahmad Rizki<br>
        <span style="opacity:0.7;">0855-1234-5678</span>
    </p>

    <div style="display:flex; gap:40px;">
        <div><b>Tanggal Pesan</b><br>10/11/2025</div>
        <div><b>Tanggal Pengiriman</b><br>11/11/2025</div>
        <div><b>Jumlah</b><br>20 Orang</div>
        <div><b>Total</b><br>1.000.000</div>
    </div>

</div>

<!-- CARD 2 -->
<div class="card-order">

    <div style="display:flex; justify-content:space-between;">
        <div><b>2025-0022</b></div>
        <span class="status-pill pill-menunggu">Menunggu</span>
    </div>

    <p style="font-weight:bold; margin-top:10px;">Soto Ayam</p>

    <p>Budi Santoso<br><span style="opacity:0.7;">0812-3469-7850</span></p>

    <div style="display:flex; gap:40px;">
        <div><b>Tanggal Pesan</b><br>10/11/2025</div>
        <div><b>Tanggal Pengiriman</b><br>12/11/2025</div>
        <div><b>Jumlah</b><br>70 Orang</div>
        <div><b>Total</b><br>700.000</div>
    </div>

    <div style="margin-top:15px; display:flex; gap:10px;">
        <button class="update-btn btn-proses">Proses</button>
        <button class="update-btn btn-batalkan">Batalkan</button>
    </div>

</div>

<!-- CARD 3 -->
<div class="card-order">

    <div style="display:flex; justify-content:space-between;">
        <div><b>2025-0032</b></div>
        <span class="status-pill pill-diproses">Diproses</span>
    </div>

    <p style="font-weight:bold; margin-top:10px;">Soto Ayam</p>

    <p>Siti Nurhaliza<br><span style="opacity:0.7;">0856-7890-1234</span></p>

    <div style="display:flex; gap:40px;">
        <div><b>Tanggal Pesan</b><br>15/11/2025</div>
        <div><b>Tanggal Pengiriman</b><br>15/11/2025</div>
        <div><b>Jumlah</b><br>30 Orang</div>
        <div><b>Total</b><br>750.000</div>
    </div>

    <div style="margin-top:15px; display:flex; gap:10px;">
        <button class="update-btn btn-kirim">Kirim</button>
        <button class="update-btn btn-batalkan">Batalkan</button>
    </div>

</div>

@endsection
