@extends('layouts.app')

@section('content')

<h1 style="display:flex; align-items:center; gap:10px; font-size:32px; font-weight:bold;">
    📥 Pesanan Masuk
</h1>

<div style="display:flex; gap:15px; margin:20px 0;">
    <div style="padding:12px 25px; background:#007bff; color:white; border-radius:8px; font-weight:bold;">
        Total Pesanan <span style="background:white; color:#007bff; padding:3px 8px; border-radius:5px;">5</span>
    </div>
    <div style="padding:12px 25px; background:#007bff; color:white; border-radius:8px; font-weight:bold;">
        Menunggu <span style="background:white; color:#007bff; padding:3px 8px; border-radius:5px;">2</span>
    </div>
    <div style="padding:12px 25px; background:#007bff; color:white; border-radius:8px; font-weight:bold;">
        Diproses <span style="background:white; color:#007bff; padding:3px 8px; border-radius:5px;">1</span>
    </div>
    <div style="padding:12px 25px; background:#007bff; color:white; border-radius:8px; font-weight:bold;">
        Selesai <span style="background:white; color:#007bff; padding:3px 8px; border-radius:5px;">1</span>
    </div>
    <div style="padding:12px 25px; background:#007bff; color:white; border-radius:8px; font-weight:bold;">
        Dibatalkan <span style="background:white; color:#007bff; padding:3px 8px; border-radius:5px;">1</span>
    </div>
</div>

<!-- Filter Buttons -->
<div style="display:flex; gap:10px; margin:10px 0;">
    <button style="padding:10px 20px; background:#7beb8b; border:none; border-radius:20px; cursor:pointer;">Semua</button>
    <button style="padding:10px 20px; border:none; border-radius:20px; cursor:pointer;">Menunggu</button>
    <button style="padding:10px 20px; border:none; border-radius:20px; cursor:pointer;">Diproses</button>
    <button style="padding:10px 20px; border:none; border-radius:20px; cursor:pointer;">Selesai</button>
    <button style="padding:10px 20px; border:none; border-radius:20px; cursor:pointer;">Dibatalkan</button>
</div>

<!-- Search -->
<div>
    <input type="text" placeholder="Cari Pesanan Pelanggan"
           style="width:100%; padding:12px; border-radius:30px; border:1px solid #cfcfcf;">
</div>

<!-- Table -->
<div style="margin-top:20px; background:white; border-radius:10px; padding:20px;">
<table style="width:100%; border-collapse:collapse;">
    <thead>
        <tr style="background:#f0f0f0;">
            <th style="padding:12px; border-bottom:1px solid #ddd;">ID Pelanggan</th>
            <th style="padding:12px; border-bottom:1px solid #ddd;">Nama Pelanggan</th>
            <th style="padding:12px; border-bottom:1px solid #ddd;">Menu Dipesan</th>
            <th style="padding:12px; border-bottom:1px solid #ddd;">Harga</th>
            <th style="padding:12px; border-bottom:1px solid #ddd;">Tanggal Pengiriman</th>
            <th style="padding:12px; border-bottom:1px solid #ddd;">Status</th>
            <th style="padding:12px; border-bottom:1px solid #ddd;">Aksi</th>
        </tr>
    </thead>
    <tbody>

        <!-- ROW 1 -->
        <tr>
            <td style="padding:12px;">ORD-2024-001</td>
            <td style="padding:12px;">Budi Santoso<br>0812-3456-7890</td>
            <td style="padding:12px;">Nasi Ayam Goreng Lalapan</td>
            <td style="padding:12px;">Rp20.000</td>
            <td style="padding:12px;">2025-11-15 12:20</td>
            <td style="padding:12px;">
                <span style="background:gray; color:white; padding:5px 10px; border-radius:12px;">Menunggu</span>
            </td>
            <td style="padding:12px;">
                <button style="background:#7beb8b; border:none; padding:5px 8px; border-radius:5px;">✔</button>
                <button style="background:#ff6f6f; border:none; padding:5px 8px; border-radius:5px;">✖</button>
            </td>
        </tr>

        <!-- ROW 2 -->
        <tr>
            <td style="padding:12px;">ORD-2024-002</td>
            <td style="padding:12px;">Siti Nurhaliza<br>0856-7890-1234</td>
            <td style="padding:12px;">Soto Ayam</td>
            <td style="padding:12px;">Rp20.000</td>
            <td style="padding:12px;">2025-11-15 12:20</td>
            <td style="padding:12px;">
                <span style="background:#007bff; color:white; padding:5px 10px; border-radius:12px;">Diproses</span>
            </td>
            <td style="padding:12px;">
                <button style="background:#7beb8b; border:none; padding:5px 8px; border-radius:5px;">✔</button>
                <button style="background:#ff6f6f; border:none; padding:5px 8px; border-radius:5px;">✖</button>
            </td>
        </tr>

        <!-- ROW 3 -->
        <tr>
            <td style="padding:12px;">ORD-2024-003</td>
            <td style="padding:12px;">Ahmad Rizki<br>0895-1234-5875</td>
            <td style="padding:12px;">Nasi Pecel</td>
            <td style="padding:12px;">Rp20.000</td>
            <td style="padding:12px;">2025-11-15 12:20</td>
            <td style="padding:12px;">
                <span style="background:gray; color:white; padding:5px 10px; border-radius:12px;">Menunggu</span>
            </td>
            <td style="padding:12px;">
                <button style="background:#7beb8b; border:none; padding:5px 8px; border-radius:5px;">✔</button>
                <button style="background:#ff6f6f; border:none; padding:5px 8px; border-radius:5px;">✖</button>
            </td>
        </tr>

        <!-- ROW 4 -->
        <tr>
            <td style="padding:12px;">ORD-2024-004</td>
            <td style="padding:12px;">Dewi Lestari<br>0821-5675-9012</td>
            <td style="padding:12px;">Sayur Sop</td>
            <td style="padding:12px;">Rp20.000</td>
            <td style="padding:12px;">2025-11-15 12:20</td>
            <td style="padding:12px;">
                <span style="background:green; color:white; padding:5px 10px; border-radius:12px;">Selesai</span>
            </td>
            <td style="padding:12px;">
                <button style="background:#7beb8b; border:none; padding:5px 8px; border-radius:5px;">✔</button>
                <button style="background:#ff6f6f; border:none; padding:5px 8px; border-radius:5px;">✖</button>
            </td>
        </tr>

        <!-- ROW 5 -->
        <tr>
            <td style="padding:12px;">ORD-2024-005</td>
            <td style="padding:12px;">Eko Prasetyo<br>0577-3456-7890</td>
            <td style="padding:12px;">Sate Ayam</td>
            <td style="padding:12px;">Rp20.000</td>
            <td style="padding:12px;">2025-11-15 12:20</td>
            <td style="padding:12px;">
                <span style="background:red; color:white; padding:5px 10px; border-radius:12px;">Dibatalkan</span>
            </td>
            <td style="padding:12px;">
                <button style="background:#7beb8b; border:none; padding:5px 8px; border-radius:5px;">✔</button>
                <button style="background:#ff6f6f; border:none; padding:5px 8px; border-radius:5px;">✖</button>
            </td>
        </tr>

    </tbody>
</table>
</div>

<!-- Pagination -->
<div style="display:flex; justify-content:flex-end; margin-top:15px; gap:10px;">
    <button style="padding:8px 14px; border:none; border-radius:6px;">⬅ Sebelumnya</button>
    <button style="padding:8px 14px; border:none; border-radius:6px;">Selanjutnya ➡</button>
</div>

@endsection
