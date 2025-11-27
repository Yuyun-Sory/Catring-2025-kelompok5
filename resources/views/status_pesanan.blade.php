@extends('layouts.app')

@section('title', 'Status Pesanan')

@section('content')

<h1 style="display:flex; align-items:center; gap:10px; font-size:32px; font-weight:bold;">
    📊 Status Pesanan
</h1>

<!-- Summary Counter -->
<div style="display:flex; gap:10px; margin-top:20px; flex-wrap:wrap;">
    <button style="padding:10px 20px; border-radius:20px; background:#7beb8b; border:none;">Menunggu 1</button>
    <button style="padding:10px 20px; border-radius:20px; background:#7beb8b; border:none;">Diproses 1</button>
    <button style="padding:10px 20px; border-radius:20px; background:#7beb8b; border:none;">Dikirim 1</button>
    <button style="padding:10px 20px; border-radius:20px; background:#7beb8b; border:none;">Selesai 1</button>
    <button style="padding:10px 20px; border-radius:20px; background:#7beb8b; border:none;">Dibatalkan 1</button>
</div>

<!-- Filter Buttons -->
<div style="display:flex; gap:10px; margin:25px 0;">
    <button style="padding:10px 22px; background:#7beb8b; border:none; border-radius:20px;">Semua</button>
    <button style="padding:10px 22px; border:none; border-radius:20px;">Menunggu</button>
    <button style="padding:10px 22px; border:none; border-radius:20px;">Diproses</button>
    <button style="padding:10px 22px; border:none; border-radius:20px;">Dalam Perjalanan</button>
    <button style="padding:10px 22px; border:none; border-radius:20px;">Selesai</button>
    <button style="padding:10px 22px; border:none; border-radius:20px;">Dibatalkan</button>
</div>

<!-- Search -->
<div style="margin-bottom:20px;">
    <input type="text" placeholder="Cari Pesanan (No Pesanan, Nama/Menu...)"
        style="width:100%; padding:12px; border-radius:10px; border:1px solid #ccc;">
</div>

<!-- CARD LIST ORDER -->

<!-- ORDER 1 -->
<div style="background:white; padding:20px; border-radius:10px; margin-bottom:20px; border:1px solid #ddd;">

    <div style="display:flex; justify-content:space-between;">
        <div style="font-weight:bold;">2025-0015</div>
        <span style="background:green; color:white; padding:4px 10px; border-radius:12px;">Selesai</span>
    </div>

    <p style="font-weight:bold; margin-top:10px;">Nasi Ayam Goreng Lalapan</p>

    <p>Ahmad Rizki <br> 0855-1234-5678</p>

    <div style="display:flex; gap:30px;">
        <div>
            <b>Tanggal Pesan</b><br> 10/11/2025
        </div>
        <div>
            <b>Tanggal Pengiriman</b><br> 11/11/2025
        </div>
        <div>
            <b>Jumlah</b><br> 20 Orang
        </div>
        <div>
            <b>Total</b><br> 1.000.000
        </div>
    </div>
</div>

<!-- ORDER 2 -->
<div style="background:white; padding:20px; border-radius:10px; margin-bottom:20px; border:1px solid #ddd;">

    <div style="display:flex; justify-content:space-between;">
        <div style="font-weight:bold;">2025-0022</div>
        <span style="background:gray; color:white; padding:4px 10px; border-radius:12px;">Menunggu</span>
    </div>

    <p style="font-weight:bold; margin-top:10px;">Soto Ayam</p>

    <p>Budi Santoso <br> 0812-3469-7850</p>

    <div style="display:flex; gap:30px;">
        <div>
            <b>Tanggal Pesan</b><br> 10/11/2025
        </div>
        <div>
            <b>Tanggal Pengiriman</b><br> 12/11/2025
        </div>
        <div>
            <b>Jumlah</b><br> 70 Orang
        </div>
        <div>
            <b>Total</b><br> 700.000
        </div>
    </div>

    <div style="margin-top:15px;">
        <button style="background:#7beb8b; padding:6px 12px; border:none; border-radius:5px;">Proses</button>
        <button style="background:#ff6f6f; padding:6px 12px; border:none; border-radius:5px;">Batalkan</button>
    </div>
</div>

<!-- ORDER 3 -->
<div style="background:white; padding:20px; border-radius:10px; margin-bottom:20px; border:1px solid #ddd;">

    <div style="display:flex; justify-content:space-between;">
        <div style="font-weight:bold;">2025-0032</div>
        <span style="background:#007bff; color:white; padding:4px 10px; border-radius:12px;">Diproses</span>
    </div>

    <p style="font-weight:bold; margin-top:10px;">Soto Ayam</p>

    <p>Siti Nurhaliza <br> 0856-7890-1234</p>

    <div style="display:flex; gap:30px;">
        <div>
            <b>Tanggal Pesan</b><br> 15/11/2025
        </div>
        <div>
            <b>Tanggal Pengiriman</b><br> 15/11/2025
        </div>
        <div>
            <b>Jumlah</b><br> 30 Orang
        </div>
        <div>
            <b>Total</b><br> 750.000
        </div>
    </div>

    <div style="margin-top:15px;">
        <button style="background:#7beb8b; padding:6px 12px; border:none; border-radius:5px;">Kirim</button>
        <button style="background:#ff6f6f; padding:6px 12px; border:none; border-radius:5px;">Batalkan</button>
    </div>
</div>

@endsection
