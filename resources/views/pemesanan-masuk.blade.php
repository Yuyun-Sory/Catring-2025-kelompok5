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
/* =================== MODAL =================== */
.modal {
  display: none; 
  position: fixed; 
  z-index: 1000; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgba(0,0,0,0.5); 
}
.modal-content {
  background-color: #fff;
  margin: 10% auto; 
  padding: 20px;
  border-radius: 12px;
  width: 500px; 
  max-width: 90%;
  position: relative;
}
.close {
  color: #aaa;
  position: absolute;
  top: 10px;
  right: 16px;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}
.close:hover { color: black; }
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

<div class="p-4">
<h1 class="title-page">Pemesanan Masuk</h1>

{{-- ================= CARD ================= --}}
<div class="stat-wrapper">
    <div class="stat-box total">
        <div class="stat-title">Total Pesanan</div>
        <div class="stat-number">{{ $total }}</div>
    </div>
    <div class="stat-box menunggu">
        <div class="stat-title">Menunggu</div>
        <div class="stat-number">{{ $menunggu }}</div>
    </div>
    <div class="stat-box diproses">
        <div class="stat-title">Diproses</div>
        <div class="stat-number">{{ $diproses }}</div>
    </div>
    <div class="stat-box selesai">
        <div class="stat-title">Selesai</div>
        <div class="stat-number">{{ $selesai }}</div>
    </div>
    <div class="stat-box dibatalkan">
        <div class="stat-title">Dibatalkan</div>
        <div class="stat-number">{{ $dibatalkan }}</div>
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
@foreach($pesanan as $item)
<tr data-status="{{ ucfirst($item->status_order) }}">
    <td>{{ $item->no_order }}</td>
    <td>{{ $item->nama_pelanggan }}</td>
    <td>{{ optional($item->menu)->nama_menu }}</td>
    <td>Rp {{ number_format($item->total_harga,0,',','.') }}</td>
    <td>{{ $item->tanggal_pengiriman }}</td>

    {{-- STATUS ORDER --}}
    <td>
        <form action="{{ route('pesanan.updateStatus',$item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="status_order" onchange="this.form.submit()">
                <option value="menunggu" {{ $item->status_order=='menunggu'?'selected':'' }}>Menunggu</option>
                <option value="diproses" {{ $item->status_order=='diproses'?'selected':'' }}>Diproses</option>
                <option value="selesai" {{ $item->status_order=='selesai'?'selected':'' }}>Selesai</option>
                <option value="dibatalkan" {{ $item->status_order=='dibatalkan'?'selected':'' }}>Dibatalkan</option>
            </select>
        </form>
    </td>

   {{-- DETAIL BUTTON --}}
    <td>
        <button class="detail-btn" 
            data-no_order="{{ $item->no_order }}"
            data-nama="{{ $item->nama_pelanggan }}"
            data-menu="{{ optional($item->menu)->nama_menu }}"
            data-harga="{{ number_format($item->total_harga,0,',','.') }}"
            data-jumlah="{{ $item->total_item }}"
              data-alamat="{{ $item->pelanggan->alamat ?? '-' }}"
            data-tanggal="{{ $item->tanggal_pengiriman }}">
            Detail
        </button>
    </td>
</tr>
@endforeach
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

</div>

{{-- MODAL POP-UP --}}
<div id="detailModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Detail Pesanan</h3>
        <p><strong>No Order:</strong> <span id="modalNoOrder"></span></p>
        <p><strong>Nama Pelanggan:</strong> <span id="modalNama"></span></p>
        <p><strong>Menu:</strong> <span id="modalMenu"></span></p>
        <p><strong>Jumlah:</strong> <span id="modalJumlah"></span></p>
        <p><strong>Harga:</strong> Rp <span id="modalHarga"></span></p>
        <p><strong>Alamat:</strong> <span id="modalAlamat"></span></p>
        <p><strong>Tanggal Pengiriman:</strong> <span id="modalTanggal"></span></p>
    </div>
</div>

{{-- SCRIPT --}}
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

// MODAL DETAIL
const modal = document.getElementById("detailModal");
const spanClose = document.querySelector(".close");

document.querySelectorAll('.detail-btn').forEach(btn => {
    btn.addEventListener('click', function(){
        document.getElementById('modalNoOrder').innerText = this.dataset.no_order;
        document.getElementById('modalNama').innerText = this.dataset.nama;
        document.getElementById('modalMenu').innerText = this.dataset.menu;
        document.getElementById('modalJumlah').innerText = this.dataset.jumlah;
        document.getElementById('modalHarga').innerText = this.dataset.harga;
        document.getElementById('modalAlamat').innerText = this.dataset.alamat;
        document.getElementById('modalTanggal').innerText = this.dataset.tanggal;
        modal.style.display = "block";
    });
});

// CLOSE MODAL
spanClose.onclick = function() { modal.style.display = "none"; }
window.onclick = function(event) { if(event.target == modal) modal.style.display = "none"; }
</script>



@endsection
