@extends('layouts.app')

@section('content')

<style>
/* ===================
   TITLE
=================== */
.title-page{
    font-size:32px;
    font-weight:700;
    margin-bottom:16px;
}

/* ===================
   STAT CARD
=================== */
.stat-wrapper{
    display:flex;
    gap:16px;
    margin-bottom:14px;
}
.stat-box{
    height:90px;
    min-width:180px;
    border-radius:12px;
    color:#fff;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}
.stat-title{font-size:14px;font-weight:600;}
.stat-number{font-size:26px;font-weight:700;}

.total{background:#4e73df;}
.menunggu{background:#f6b23e;}
.diproses{background:#36b9cc;}
.selesai{background:#1cc88a;}
.dibatalkan{background:#e74a3b;}

/* ===================
   FILTER BUTTON
=================== */
.filter-wrapper{
    display:flex;
    gap:10px;
    margin-bottom:12px;
}
.filter-btn{
    padding:6px 14px;
    border-radius:8px;
    background:#e9ecef;
    font-size:13px;
    cursor:pointer;
}
.filter-btn.active{
    background:#1cc88a;
    color:#fff;
}

/* ===================
   SEARCH
=================== */
.search-box{
    margin-bottom:16px;
}
.search-box input{
    width:100%;
    padding:10px 14px;
    border-radius:8px;
    border:1px solid #ddd;
}

/* ===================
   TABLE
=================== */
.table-wrapper{
    background:#fff;
    padding:16px;
    border-radius:12px;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
}
table{
    width:100%;
    border-collapse:collapse;
}
th,td{
    padding:12px;
    font-size:14px;
    border-bottom:1px solid #eee;
}
thead{background:#f7f7f7;}

/* ===================
   PAGINATION
=================== */
.pagination-wrapper{
    display:flex;
    justify-content:center;
    margin-top:16px;
}
.pagination{
    display:flex;
    gap:6px;
}
.pagination span,
.pagination a{
    padding:6px 12px;
    font-size:13px;
    border-radius:6px;
    background:#e9ecef;
    color:#333;
    text-decoration:none;
}
.pagination .active{
    background:#1cc88a;
    color:#fff;
}
.pagination .disabled{
    opacity:0.5;
    pointer-events:none;
}
</style>

<h1 class="title-page">Pemesanan Masuk</h1>

{{-- ================= CARD ================= --}}
<div class="stat-wrapper">
    <div class="stat-box total">
        <div class="stat-title">Total Pesanan</div>
        <div class="stat-number">5</div>
    </div>
    <div class="stat-box menunggu">
        <div class="stat-title">Menunggu</div>
        <div class="stat-number">2</div>
    </div>
    <div class="stat-box diproses">
        <div class="stat-title">Diproses</div>
        <div class="stat-number">1</div>
    </div>
    <div class="stat-box selesai">
        <div class="stat-title">Selesai</div>
        <div class="stat-number">1</div>
    </div>
    <div class="stat-box dibatalkan">
        <div class="stat-title">Dibatalkan</div>
        <div class="stat-number">1</div>
    </div>
</div>

{{-- ================= FILTER ================= --}}
<div class="filter-wrapper">
    <div class="filter-btn active" data-filter="Semua">Semua</div>
    <div class="filter-btn" data-filter="Menunggu">Menunggu</div>
    <div class="filter-btn" data-filter="Diproses">Diproses</div>
    <div class="filter-btn" data-filter="Selesai">Selesai</div>
    <div class="filter-btn" data-filter="Dibatalkan">Dibatalkan</div>
</div>

{{-- ================= SEARCH ================= --}}
<div class="search-box">
    <input type="text" id="searchInput" placeholder="Cari Pesanan Pelanggan (ID, Nama, Menu)">
</div>

{{-- ================= TABLE ================= --}}
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

    <tbody id="orderTable">
        <tr data-status="Menunggu">
            <td>PLG001</td>
            <td>Andi</td>
            <td>Nasi Box</td>
            <td>Rp 25.000</td>
            <td>20-12-2025</td>
            <td>Menunggu</td>
            <td>Detail</td>
        </tr>
        <tr data-status="Diproses">
            <td>PLG002</td>
            <td>Budi</td>
            <td>Snack Box</td>
            <td>Rp 15.000</td>
            <td>21-12-2025</td>
            <td>Diproses</td>
            <td>Detail</td>
        </tr>
        <tr data-status="Selesai">
            <td>PLG003</td>
            <td>Sinta</td>
            <td>Nasi Tumpeng</td>
            <td>Rp 300.000</td>
            <td>22-12-2025</td>
            <td>Selesai</td>
            <td>Detail</td>
        </tr>
        <tr data-status="Dibatalkan">
            <td>PLG004</td>
            <td>Dewi</td>
            <td>Nasi Kotak</td>
            <td>Rp 20.000</td>
            <td>23-12-2025</td>
            <td>Dibatalkan</td>
            <td>Detail</td>
        </tr>
    </tbody>
</table>

{{-- ================= PAGINATION ================= --}}
<div class="pagination-wrapper">
    <div class="pagination">
        <span class="disabled">Sebelumnya</span>
        <span class="active">1</span>
        <a href="#">2</a>
        <a href="#">Selanjutnya</a>
    </div>
</div>
</div>

{{-- ================= SCRIPT FILTER & SEARCH ================= --}}
<script>
// FILTER
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function(){
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        const filter = this.dataset.filter;
        document.querySelectorAll('#orderTable tr').forEach(row => {
            const status = row.dataset.status;
            row.style.display = (filter === 'Semua' || status === filter) ? '' : 'none';
        });
    });
});

// SEARCH
document.getElementById('searchInput').addEventListener('keyup', function(){
    const value = this.value.toLowerCase();
    document.querySelectorAll('#orderTable tr').forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
    });
});
</script>

@endsection
