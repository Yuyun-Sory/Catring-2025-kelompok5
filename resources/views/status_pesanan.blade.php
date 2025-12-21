@extends('layouts.app')

@section('title', 'Status Pesanan')

@section('content')

<style>
/* ================= JUDUL ================= */
.status-title{
    font-size:24px;
    font-weight:bold;
    margin-bottom:15px;
    display:flex;
    align-items:center;
    gap:8px;
}

/* ================= SUMMARY ================= */
.summary{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
    margin-bottom:15px;
}
.summary-item{
    background:#1f6cff;
    color:white;
    padding:6px 14px;
    border-radius:6px;
    font-size:13px;
    display:flex;
    align-items:center;
    gap:6px;
}

/* ================= SEARCH ================= */
.search-box{
    width:100%;
    border:1px solid #999;
    border-radius:6px;
    padding:8px 12px;
    margin-bottom:15px;
}

/* ================= CARD ================= */
.order-card{
    border:1px solid #333;
    padding:12px;
    margin-bottom:15px;
    background:#fff;
}

/* HEADER CARD */
.card-top{
    display:flex;
    align-items:center;
    gap:10px;
    font-size:13px;
}

/* ================= BADGE STATUS ================= */
.badge-status{
    padding:4px 10px;
    border-radius:12px;
    font-size:12px;
    font-weight:bold;
}
.badge-selesai{background:#9cffb0}
.badge-menunggu{background:#c7ffd1}
.badge-diproses{background:#bbd4ff}
.badge-perjalanan{background:#ffe08a}
.badge-dibatalkan{background:#ffb3b3}

.order-title{
    font-weight:bold;
    margin:6px 0;
}

.order-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:8px;
    font-size:13px;
}
.order-grid small{color:#555}
</style>

<!-- ================= JUDUL ================= -->
<div class="status-title">
    📊 Status Pesanan
</div>

<!-- ================= SUMMARY ================= -->
<div class="summary">
    <div class="summary-item">🕒 Menunggu 1</div>
    <div class="summary-item">⚙️ Diproses 1</div>
    <div class="summary-item">🚚 Dalam Perjalanan 1</div>
    <div class="summary-item">✔️ Selesai 1</div>
    <div class="summary-item">❌ Dibatalkan 1</div>
</div>

<!-- ================= SEARCH ================= -->
<input type="text" id="searchInput" class="search-box"
       placeholder="Cari Pesanan (No, Nama, Menu, Status)">

<!-- ================= PESANAN ================= -->

<div class="order-card searchable">
    <div class="card-top">
        📄 <b>2025-003</b>
        <span class="badge-status badge-selesai">Selesai</span>
    </div>
    <div class="order-title">Nasi Ayam Goreng Lalapan</div>
    <div class="order-grid">
        <div><small>Nama</small><br>Ahmad Rizki</div>
        <div><small>No HP</small><br>0898-1234-5678</div>
        <div><small>Tanggal Pesan</small><br>10/11/2025</div>
        <div><small>Tanggal Antar</small><br>15/11/2025</div>
        <div><small>Jumlah</small><br>70 Orang</div>
        <div><small>Total</small><br>1.400.000</div>
    </div>
</div>

<div class="order-card searchable">
    <div class="card-top">
        📄 <b>2025-002</b>
        <span class="badge-status badge-menunggu">Menunggu</span>
    </div>
    <div class="order-title">Soto Ayam</div>
    <div class="order-grid">
        <div><small>Nama</small><br>Budi Santoso</div>
        <div><small>No HP</small><br>0812-3456-7890</div>
        <div><small>Tanggal Pesan</small><br>10/11/2025</div>
        <div><small>Tanggal Antar</small><br>20/11/2025</div>
        <div><small>Jumlah</small><br>60 Orang</div>
        <div><small>Total</small><br>720.000</div>
    </div>
</div>

<div class="order-card searchable">
    <div class="card-top">
        📄 <b>2025-004</b>
        <span class="badge-status badge-diproses">Diproses</span>
    </div>
    <div class="order-title">Ayam Geprek</div>
    <div class="order-grid">
        <div><small>Nama</small><br>Siti Nurhaliza</div>
        <div><small>No HP</small><br>0856-7890-1234</div>
        <div><small>Tanggal Pesan</small><br>14/11/2025</div>
        <div><small>Tanggal Antar</small><br>18/11/2025</div>
        <div><small>Jumlah</small><br>50 Orang</div>
        <div><small>Total</small><br>750.000</div>
    </div>
</div>

<div class="order-card searchable">
    <div class="card-top">
        📄 <b>2025-005</b>
        <span class="badge-status badge-perjalanan">Dalam Perjalanan</span>
    </div>
    <div class="order-title">Nasi Box Komplit</div>
    <div class="order-grid">
        <div><small>Nama</small><br>Dewi Lestari</div>
        <div><small>No HP</small><br>0821-7788-9900</div>
        <div><small>Tanggal Pesan</small><br>16/11/2025</div>
        <div><small>Tanggal Antar</small><br>17/11/2025</div>
        <div><small>Jumlah</small><br>40 Orang</div>
        <div><small>Total</small><br>600.000</div>
    </div>
</div>

<div class="order-card searchable">
    <div class="card-top">
        📄 <b>2025-006</b>
        <span class="badge-status badge-dibatalkan">Dibatalkan</span>
    </div>
    <div class="order-title">Soto Ayam</div>
    <div class="order-grid">
        <div><small>Nama</small><br>Rizky</div>
        <div><small>No HP</small><br>0813-2222-9999</div>
        <div><small>Tanggal Pesan</small><br>12/11/2025</div>
        <div><small>Tanggal Antar</small><br>13/11/2025</div>
        <div><small>Jumlah</small><br>30 Orang</div>
        <div><small>Total</small><br>360.000</div>
    </div>
</div>

<!-- ================= SEARCH SCRIPT ================= -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function(){
    let keyword = this.value.toLowerCase();
    document.querySelectorAll('.searchable').forEach(card=>{
        card.style.display = card.innerText.toLowerCase().includes(keyword)
            ? 'block'
            : 'none';
    });
});
</script>

@endsection



