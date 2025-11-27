@extends('layouts.app')

@section('title', 'Laporan')

@section('content')

<!-- HEADER -->
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px;">
    <h1 style="font-size:32px; font-weight:700;">Laporan</h1>

    <button style="padding:10px 18px; background:white; border:1px solid black; border-radius:8px;">
        + Export Laporan
    </button>
</div>

<!-- FILTER -->
<div style="
    background:white;
    padding:20px;
    border-radius:12px;
    margin-bottom:25px;
    border:1px solid #e0e0e0;
    width:70%;
">
    <h3 style="margin-bottom:15px; font-size:20px;">Filter Laporan</h3>

    <div style="display:flex; gap:15px; align-items:center;">
        <div>
            <label>Dari Tanggal</label><br>
            <input type="date" style="padding:8px; width:180px; border-radius:6px; border:1px solid #ccc;">
        </div>

        <div>
            <label>Sampai Tanggal</label><br>
            <input type="date" style="padding:8px; width:180px; border-radius:6px; border:1px solid #ccc;">
        </div>

        <button style="
            margin-top:22px;
            background:#0066ff; 
            color:white; 
            padding:8px 16px; 
            border:none;
            border-radius:6px;
        ">
            Tampilkan
        </button>
    </div>
</div>

<!-- SUMMARY BOX -->
<div style="display:flex; gap:15px; margin-bottom:25px;">

    <div style="padding:15px 25px; background:#0066ff; color:white; border-radius:10px;">
        <div style="font-size:20px; font-weight:bold;">25</div>
        <div>Total Pesanan</div>
    </div>

    <div style="padding:15px 25px; background:#0066ff; color:white; border-radius:10px;">
        <div style="font-size:20px; font-weight:bold;">Rp 12.500.000</div>
        <div>Total Pendapatan</div>
    </div>

    <div style="padding:15px 25px; background:#0066ff; color:white; border-radius:10px;">
        <div style="font-size:20px; font-weight:bold;">Nasi Ayam</div>
        <div>Menu Terlaris</div>
    </div>

</div>

<!-- TABLE -->
<div style="background:white; padding:20px; border-radius:12px; width:90%;">

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f0f0f0;">
                <th style="padding:12px; border-bottom:1px solid #ddd; text-align:left;">Tanggal</th>
                <th style="padding:12px; border-bottom:1px solid #ddd; text-align:left;">Nama Pelanggan</th>
                <th style="padding:12px; border-bottom:1px solid #ddd; text-align:left;">Menu</th>
                <th style="padding:12px; border-bottom:1px solid #ddd; text-align:left;">Jumlah</th>
                <th style="padding:12px; border-bottom:1px solid #ddd; text-align:left;">Total Harga</th>
                <th style="padding:12px; border-bottom:1px solid #ddd; text-align:left;">Status</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td style="padding:12px;">02/11/2025</td>
                <td style="padding:12px;">Afnan Rizki</td>
                <td style="padding:12px;">Nasi Ayam Goreng</td>
                <td style="padding:12px;">20 box</td>
                <td style="padding:12px;">Rp 1.000.000</td>
                <td style="padding:12px;">Selesai</td>
            </tr>

            <tr>
                <td style="padding:12px;">05/11/2025</td>
                <td style="padding:12px;">Budi Santoso</td>
                <td style="padding:12px;">Soto Ayam</td>
                <td style="padding:12px;">10 box</td>
                <td style="padding:12px;">Rp 750.000</td>
                <td style="padding:12px;">Selesai</td>
            </tr>

            <tr>
                <td style="padding:12px;">08/11/2025</td>
                <td style="padding:12px;">Sri Nurholis</td>
                <td style="padding:12px;">Nasi Pecel</td>
                <td style="padding:12px;">15 box</td>
                <td style="padding:12px;">Rp 600.000</td>
                <td style="padding:12px;">Menunggu</td>
            </tr>

        </tbody>
    </table>

</div>

@endsection
