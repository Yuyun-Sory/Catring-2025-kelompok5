@extends('layouts.app')

@section('title', 'Jadwal Produksi')

@section('content')

<!-- HEADER -->
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h1 style="font-size:32px; font-weight:700;">Jadwal Produksi</h1>

    <button style="padding:10px 18px; background:white; border:1px solid black; border-radius:8px;">
        + Tambah Bahan
    </button>
</div>

<!-- MONTH SELECTOR + FILTER -->
<div style="border:1px solid #ccc; padding:25px; border-radius:10px; margin-bottom:25px; width:70%;">

    <div style="text-align:center; margin-bottom:20px; font-size:18px;">
        ← <strong style="margin:0 25px;">November</strong> →
    </div>

    <div style="display:flex; justify-content:center; gap:15px;">
        <button style="padding:10px 20px; background:#7beb8b; border:none; border-radius:8px;">Semua</button>
        <button style="padding:10px 20px; background:#e6e6e6; border:none; border-radius:8px;">Menunggu</button>
        <button style="padding:10px 20px; background:#e6e6e6; border:none; border-radius:8px;">Dalam Proses</button>
        <button style="padding:10px 20px; background:#e6e6e6; border:none; border-radius:8px;">Selesai</button>
    </div>

</div>

<!-- SUMMARY CARDS -->
<div style="display:flex; gap:15px; margin-bottom:25px;">

    <div style="padding:15px 25px; background:#0066ff; color:white; border-radius:10px;">
        <div style="font-size:20px; font-weight:bold;">5</div>
        <div>Total Jadwal</div>
    </div>

    <div style="padding:15px 25px; background:#0066ff; color:white; border-radius:10px;">
        <div style="font-size:20px; font-weight:bold;">2</div>
        <div>Semua</div>
    </div>

    <div style="padding:15px 25px; background:#0066ff; color:white; border-radius:10px;">
        <div style="font-size:20px; font-weight:bold;">1</div>
        <div>Menunggu</div>
    </div>

    <div style="padding:15px 25px; background:#0066ff; color:white; border-radius:10px;">
        <div style="font-size:20px; font-weight:bold;">1</div>
        <div>Proses</div>
    </div>

    <div style="padding:15px 25px; background:#0066ff; color:white; border-radius:10px;">
        <div style="font-size:20px; font-weight:bold;">1</div>
        <div>Selesai</div>
    </div>

</div>

<!-- TABLE -->
<div style="background:white; padding:20px; border-radius:12px; width:70%;">
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f0f0f0;">
                <th style="padding:12px; text-align:left; border-bottom:1px solid #ddd;">Menu Dipesan</th>
                <th style="padding:12px; text-align:left; border-bottom:1px solid #ddd;">Status</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td style="padding:12px;">Soto Ayam</td>
                <td style="padding:12px;">Selesai</td>
            </tr>

            <tr>
                <td style="padding:12px;">Nasi Ayam Goreng</td>
                <td style="padding:12px;">Menunggu</td>
            </tr>

            <tr>
                <td style="padding:12px;">Nasi Pecel</td>
                <td style="padding:12px;">Selesai</td>
            </tr>

            <tr>
                <td style="padding:12px;">Sayur Sop</td>
                <td style="padding:12px;">Semua</td>
            </tr>

            <tr>
                <td style="padding:12px;">Sate Ayam</td>
                <td style="padding:12px;">Semua</td>
            </tr>

        </tbody>
    </table>
</div>

@endsection
