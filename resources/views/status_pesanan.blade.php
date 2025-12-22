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


<div class="p-4">


<!-- ================= JUDUL ================= -->
<div class="status-title">
    📊 Status Pesanan 
</div>

<!-- ================= SUMMARY ================= -->
<div class="summary">
    <div class="summary-item">🕒 Menunggu {{ $menunggu }}</div>
    <div class="summary-item">⚙️ Diproses {{ $diproses }}</div>
    <div class="summary-item">✔️ Selesai {{ $selesai }}</div>
    <div class="summary-item">❌ Dibatalkan {{ $dibatalkan }}</div>
</div>


<!-- ================= SEARCH ================= -->
<input type="text" id="searchInput" class="search-box"
       placeholder="Cari Pesanan (No, Nama, Menu, Status)">

<!-- ================= PESANAN ================= -->

@foreach($pesanan as $item)
<div class="order-card searchable">
    <div class="card-top">
        📄 <b>{{ $item->no_order }}</b>

        <span class="badge-status badge-{{ $item->status_order }}">
            {{ ucfirst($item->status_order) }}
        </span>
    </div>

    <div class="order-title">
        {{ optional($item->menu)->nama_menu }}
    </div>

    <div class="order-grid">
        <div>
            <small>Nama</small><br>
            {{ $item->nama_pelanggan }}
        </div>

        <div>
            <small>No HP</small><br>
            {{ $item->no_hp ?? '-' }}
        </div>

        <div>
            <small>Tanggal Pesan</small><br>
            {{ $item->created_at->format('d/m/Y') }}
        </div>

        <div>
            <small>Tanggal Antar</small><br>
            {{ $item->tanggal_pengiriman }}
        </div>

        <div>
            <small>Jumlah</small><br>
            {{ $item->total_item }} Porsi
        </div>

        <div>
            <small>Total</small><br>
            Rp {{ number_format($item->total_harga,0,',','.') }}
        </div>
    </div>
</div>
@endforeach

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



