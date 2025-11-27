@extends('layouts.app')

@section('content')

<style>
    .title-page {
        font-size: 48px;
        font-weight: bold;
        font-family: Georgia, serif;
        margin-bottom: 20px;
    }

    /* STAT BOX */
    .stat-box {
        padding: 15px 25px;
        background: #0066ff;
        color: white;
        border-radius: 8px;
        font-weight: bold;
        font-size: 18px;
        text-align: center;
        min-width: 150px;
    }
    .stat-number {
        background: white;
        color: #0066ff;
        padding: 5px 14px;
        border-radius: 6px;
        font-size: 24px;
        margin-left: 8px;
    }

    /* FILTER BUTTONS */
    .filter-btn {
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
        background: #dcdcdc;
        cursor: pointer;
        font-size: 16px;
        font-family: Georgia;
    }
    .filter-active {
        background: #7beb8b !important;
    }

    /* SEARCH */
    .search-box {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 1px solid #999;
        margin-top: 15px;
        font-size: 16px;
    }

    /* TABLE */
    .table-wrapper {
        margin-top: 25px;
        background: white;
        border-radius: 10px;
        padding: 10px 20px 20px 20px;
        border: 1px solid #dcdcdc;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
        font-family: Georgia, serif;
    }
    thead tr {
        background: #f4f4f4;
        font-weight: bold;
        font-size: 17px;
    }
    th, td {
        padding: 14px;
        border-bottom: 1px solid #ddd;
        vertical-align: top;
    }

    /* STATUS BADGES */
    .badge {
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 14px;
        color: white;
        font-weight: bold;
    }
    .badge-wait { background: #ffb347; }       /* Menunggu */
    .badge-process { background: #4aa3ff; }    /* Diproses */
    .badge-done { background: #4caf50; }       /* Selesai */
    .badge-cancel { background: #ff6f6f; }     /* Dibatalkan */

    /* Aksi */
    .btn-aksi {
        padding: 6px 10px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        color: black;
        font-size: 14px;
    }
    .btn-view { background: #dcdcdc; }
    .btn-approve { background: #7beb8b; }
    .btn-reject { background: #ff6f6f; }

    /* PAGINATION */
    .pagination-area {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 20px;
    }
    .page-btn {
        padding: 8px 14px;
        border: 1px solid #999;
        background: white;
        border-radius: 6px;
        cursor: pointer;
    }
    .page-active {
        background: #7beb8b;
        border-color: #7beb8b;
    }
</style>

{{-- TITLE --}}
<h1 class="title-page">Pesanan Masuk</h1>

{{-- STATISTICS --}}
<div style="display:flex; gap:20px; margin-top:20px;">
    <div class="stat-box">Total Pesanan <span class="stat-number">5</span></div>
    <div class="stat-box">Menunggu <span class="stat-number">2</span></div>
    <div class="stat-box">Diproses <span class="stat-number">1</span></div>
    <div class="stat-box">Selesai <span class="stat-number">1</span></div>
    <div class="stat-box">Dibatalkan <span class="stat-number">1</span></div>
</div>

{{-- FILTER --}}
<div style="display:flex; gap:12px; margin:25px 0 15px 0;">
    <button class="filter-btn filter-active">Semua</button>
    <button class="filter-btn">Menunggu</button>
    <button class="filter-btn">Diproses</button>
    <button class="filter-btn">Selesai</button>
    <button class="filter-btn">Dibatalkan</button>
</div>

{{-- SEARCH --}}
<input type="text" class="search-box" placeholder="🔍  Cari Pesanan Pelanggan">

{{-- TABLE --}}
<div class="table-wrapper">
<table>
    <thead>
        <tr>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Menu Dipesan</th>
            <th>Harga</th>
            <th>Tanggal Pengiriman</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>ORD-2024-001</td>
            <td>Budi Santoso<br>0812-3456-7890</td>
            <td>Nasi Ayam Goreng Lalapan</td>
            <td>Rp20.000</td>
            <td>2025-11-15 12:20</td>
            <td><span class="badge badge-wait">Menunggu</span></td>
            <td>
                <button class="btn-view">👁</button>
                <button class="btn-approve">✔ Terima</button>
                <button class="btn-reject">✖ Tolak</button>
            </td>
        </tr>

        <tr>
            <td>ORD-2024-002</td>
            <td>Siti Nurhaliza<br>0856-7890-1234</td>
            <td>Soto Ayam</td>
            <td>Rp20.000</td>
            <td>2025-11-15 12:20</td>
            <td><span class="badge badge-process">Diproses</span></td>
            <td>
                <button class="btn-view">👁</button>
                <button class="btn-approve">✔</button>
                <button class="btn-reject">✖</button>
            </td>
        </tr>

        <tr>
            <td>ORD-2024-003</td>
            <td>Ahmad Rizki<br>0895-1234-5875</td>
            <td>Nasi Pecel</td>
            <td>Rp20.000</td>
            <td>2025-11-15 12:20</td>
            <td><span class="badge badge-done">Selesai</span></td>
            <td>
                <button class="btn-view">👁</button>
            </td>
        </tr>

        <tr>
            <td>ORD-2024-004</td>
            <td>Dewi Lestari<br>0821-5678-9012</td>
            <td>Sayur Sop</td>
            <td>Rp20.000</td>
            <td>2025-11-15 12:20</td>
            <td><span class="badge badge-cancel">Dibatalkan</span></td>
            <td>
                <button class="btn-view">👁</button>
            </td>
        </tr>
    </tbody>
</table>
</div>

{{-- PAGINATION --}}
<div class="pagination-area">
    <button class="page-btn">Sebelumnya</button>
    <button class="page-btn page-active">1</button>
    <button class="page-btn">2</button>
    <button class="page-btn">Selanjutnya</button>
</div>

@endsection
