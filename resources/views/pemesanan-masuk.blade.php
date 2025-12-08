@extends('layouts.app')

@section('content')

<style>
/* ===========================
   UMUM & JUDUL
   =========================== */
.title-page {
    font-size: 48px;
    font-weight: bold;
    font-family: Georgia, serif;
    margin-bottom: 25px;
    color: #222;
}

/* ===========================
   STATISTICS CARDS
   =========================== */
.stat-box {
    padding: 25px 30px;
    border-radius: 12px;
    font-weight: bold;
    font-size: 20px;
    text-align: center;
    min-width: 150px;
    color: white;
    position: relative;
    overflow: hidden;
    cursor: default;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.stat-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Warna per status */
.stat-box.total { background: #4b7bec; }       /* Biru */
.stat-box.menunggu { background: #ffb347; }    /* Kuning-Orange */
.stat-box.diproses { background: #4aa3ff; }    /* Biru Muda */
.stat-box.selesai { background: #2ecc71; }     /* Hijau */
.stat-box.dibatalkan { background: #ff6f6f; }  /* Merah */

/* ===========================
   FILTER & SEARCH
   =========================== */
.filter-btn {
    padding: 10px 25px;
    border-radius: 12px;
    border: none;
    background: #e0e0e0;
    cursor: pointer;
    font-size: 16px;
    font-family: Georgia;
    transition: 0.3s;
}
.filter-btn:hover {
    background: #d0d0d0;
}
.filter-active {
    background: #6fcf97 !important;
    color: white;
    font-weight: bold;
}
.search-box {
    width: 100%;
    padding: 14px 18px;
    border-radius: 12px;
    border: 1px solid #ccc;
    font-size: 16px;
    margin-top: 15px;
    box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
    transition: border 0.3s;
}
.search-box:focus {
    outline: none;
    border-color: #6fcf97;
}

/* ===========================
   TABLE
   =========================== */
.table-wrapper {
    margin-top: 25px;
    background: white;
    border-radius: 12px;
    padding: 15px 20px 25px 20px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}
table {
    width: 100%;
    border-collapse: collapse;
    font-size: 16px;
    font-family: Georgia, serif;
}
thead tr {
    background: #f7f7f7;
    font-weight: bold;
    font-size: 17px;
}
th, td {
    padding: 14px 12px;
    border-bottom: 1px solid #eee;
    vertical-align: top;
}
tbody tr:hover {
    background: #f0f8ff;
}

/* ===========================
   STATUS BADGES
   =========================== */
.badge {
    padding: 6px 14px;
    border-radius: 12px;
    font-size: 14px;
    color: white;
    font-weight: bold;
}
.badge-wait { background: #ffb347; }       /* Menunggu */
.badge-process { background: #4aa3ff; }    /* Diproses */
.badge-done { background: #2ecc71; }       /* Selesai */
.badge-cancel { background: #ff6f6f; }     /* Dibatalkan */

/* ===========================
   BUTTON AKSI
   =========================== */
.btn-aksi {
    padding: 6px 10px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.3s;
}
.btn-view { background: #dcdcdc; }
.btn-view:hover { background: #c8c8c8; }
.btn-approve { background: #6fcf97; color:white; }
.btn-approve:hover { background: #57b874; }
.btn-reject { background: #ff6f6f; color:white; }
.btn-reject:hover { background: #e45c5c; }

/* ===========================
   PAGINATION
   =========================== */
.pagination-area {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 25px;
}
.page-btn {
    padding: 8px 14px;
    border: 1px solid #ccc;
    background: white;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}
.page-btn:hover { background: #f0f0f0; }
.page-active {
    background: #6fcf97;
    border-color: #6fcf97;
    color: white;
}

/* ===========================
   MODAL DETAIL PESANAN
   =========================== */
.modal-content-custom {
    border-radius: 16px;
}
.modal-body-custom .detail-row {
    display: flex;
    justify-content: space-between;
    font-size: 15px;
    padding: 6px 0;
    border-bottom: 1px dashed #eee;
}
.detail-label {
    font-weight: 500;
    color: #555;
}
.detail-value {
    font-weight: bold;
    text-align: right;
}
.sisa-pembayaran-text {
    font-size: 24px;
    font-weight: bold;
    color: #ff6f6f;
    text-align: right;
    margin-top: 10px;
}
</style>

{{-- TITLE --}}
<h1 class="title-page">Pesanan Masuk</h1>

{{-- STATISTICS --}}
<div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:20px;">
    <div class="stat-box total" style="flex:1; min-width:0;">
        <div>Total Pesanan</div>
        <div style="font-size: 28px; margin-top:8px;">5</div>
    </div>
    <div class="stat-box menunggu" style="flex:1; min-width:0;">
        <div>Menunggu</div>
        <div style="font-size: 28px; margin-top:8px;">2</div>
    </div>
    <div class="stat-box diproses" style="flex:1; min-width:0;">
        <div>Diproses</div>
        <div style="font-size: 28px; margin-top:8px;">1</div>
    </div>
    <div class="stat-box selesai" style="flex:1; min-width:0;">
        <div>Selesai</div>
        <div style="font-size: 28px; margin-top:8px;">1</div>
    </div>
    <div class="stat-box dibatalkan" style="flex:1; min-width:0;">
        <div>Dibatalkan</div>
        <div style="font-size: 28px; margin-top:8px;">1</div>
    </div>
</div>


{{-- FILTER --}}
<div style="display:flex; flex-wrap:wrap; gap:12px; margin:25px 0 15px 0;">
    <button class="filter-btn filter-active" data-status="Semua">Semua</button>
    <button class="filter-btn" data-status="Menunggu">Menunggu</button>
    <button class="filter-btn" data-status="Diproses">Diproses</button>
    <button class="filter-btn" data-status="Selesai">Selesai</button>
    <button class="filter-btn" data-status="Dibatalkan">Dibatalkan</button>
</div>

{{-- SEARCH --}}
<input type="text" id="search-input" class="search-box" placeholder="🔍  Cari Pesanan Pelanggan (ID, Nama, Menu)">

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
    <tbody id="order-table-body">
        {{-- BARIS DATA DITERUSKAN DARI KODE ASLI --}}
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

{{-- MODAL DETAIL PESANAN --}}
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-custom">
            <div class="modal-header modal-header-custom">
                <h5 class="modal-title" id="detailModalLabel">Detail Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body-custom">
                {{-- Detail rows diteruskan dari kode asli --}}
            </div>
            <div class="modal-footer modal-footer-custom">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection
