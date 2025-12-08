@extends('layouts.app')

@section('title', 'Laporan')

@section('content')

<style>
/* =================== BASE LAYOUT & SUMMARY =================== */
.laporan-container { width: 100%; padding: 0 20px; }
.summary-container { display: flex; gap: 15px; margin-top: 20px; flex-wrap: wrap; }
.summary-box {
    background: white;
    border: 1px solid #dcdcdc;
    padding: 18px 20px;
    border-radius: 10px;
    width: 200px;
}
.summary-title { font-size: 15px; margin-bottom: 5px; color: #555; }
.summary-value { font-size: 20px; font-weight: bold; }
.summary-sub { font-size: 13px; color: #2ecc71; margin-top: 4px; font-weight: 600; }
.summary-sub .sabtu { color: #888; margin-left: 5px; font-weight: normal; }

.grid-2 {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    margin-top: 20px;
    width: 100%;
}

.chart-box {
    background: white;
    border: 1px solid #dcdcdc;
    border-radius: 12px;
    padding: 20px;
    min-height: 200px;
}
.chart-title { font-size: 18px; font-weight: bold; margin-bottom: 15px; }

/* DROPDOWN BULAN */
.month-selector { position:relative; display:inline-block; cursor:pointer; margin-bottom:10px; }
.current-month { padding:8px 12px; background-color:white; border:1px solid #dcdcdc; border-radius:6px; font-weight:bold; color:#333; padding-right:25px; position:relative; font-size:14px; }
.current-month::after { content:"\25BC"; position:absolute; top:50%; right:10px; transform:translateY(-50%); font-size:0.7em; color:#888; transition:transform 0.3s; }
.month-selector.open .current-month::after { transform:translateY(-50%) rotate(180deg); }
.month-dropdown-menu { position:absolute; top:100%; left:0; z-index:100; background:white; border:1px solid #ccc; box-shadow:0 4px 8px rgba(0,0,0,0.1); border-radius:4px; min-width:150px; display:none; padding:5px 0; max-height:250px; overflow-y:auto; }
.month-dropdown-menu a { display:block; padding:8px 15px; text-decoration:none; color:#333; font-size:14px; }
.month-dropdown-menu a:hover { background-color:#f0f0f0; }
.month-dropdown-menu a.active { background-color:#e6f7ff; font-weight:bold; color:#0066ff; }

</style>

<div class="laporan-container">
    <h1 style="font-size:32px; font-weight:700; margin-bottom:0;">Laporan</h1>
    <p style="margin-top:4px; color:#333;">Analisis performa bisnis dan pengambilan keputusan</p>

    <div class="summary-container">

        {{-- Total Pendapatan --}}
        <div class="summary-box">
            <div class="summary-title">💰 Total Pendapatan</div>
            <div class="summary-value">Rp 501.00 JT</div>
            <div class="summary-sub">⬆ 12%</div>
            <div class="month-selector">
                <div class="current-month">Januari 2025</div>
                <div class="month-dropdown-menu">
                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November'] as $month)
                        <a href="#" class="{{ $month=='Januari'?'active':'' }}">{{ $month }} 2025</a>
                    @endforeach
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailPendapatanModal">
                Lihat Detail
            </button>
        </div>

        {{-- Total Profit --}}
        <div class="summary-box">
            <div class="summary-title">📈 Total Profit</div>
            <div class="summary-value">Rp 26.05 JT</div>
            <div class="summary-sub">⬆ 12%</div>
            <div class="month-selector">
                <div class="current-month">Januari 2025</div>
                <div class="month-dropdown-menu">
                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November'] as $month)
                        <a href="#" class="{{ $month=='Januari'?'active':'' }}">{{ $month }} 2025</a>
                    @endforeach
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailProfitModal">
                Lihat Detail
            </button>
        </div>

        {{-- Status Pesanan --}}
        <div class="summary-box">
            <div class="summary-title">📊 Status Pesanan</div>
            <div class="summary-value">750</div>
            <div class="summary-sub">⬆ 12%</div>
            <div class="month-selector">
                <div class="current-month">Januari 2025</div>
                <div class="month-dropdown-menu">
                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November'] as $month)
                        <a href="#" class="{{ $month=='Januari'?'active':'' }}">{{ $month }} 2025</a>
                    @endforeach
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailStatusModal">
                Lihat Detail
            </button>
        </div>

        {{-- Hari Tersibuk --}}
        <div class="summary-box">
            <div class="summary-title">📅 Hari Tersibuk</div>
            <div class="summary-value">Jumat</div>
            <div class="summary-sub">Sabtu</div>
            <div class="month-selector">
                <div class="current-month">Januari 2025</div>
                <div class="month-dropdown-menu">
                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November'] as $month)
                        <a href="#" class="{{ $month=='Januari'?'active':'' }}">{{ $month }} 2025</a>
                    @endforeach
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailHariModal">
                Lihat Detail
            </button>
        </div>
    </div>

    {{-- Chart Grid --}}
    <div class="grid-2">
        <div class="chart-box">
            <div class="chart-title">Penjualan per Item</div>
            <canvas id="itemChart"></canvas>
        </div>
        <div class="chart-box">
            <div class="chart-title">Distribusi Penjualan</div>
            <canvas id="pieChart"></canvas>
        </div>
    </div>
    <div class="grid-2">
        <div class="chart-box">
            <div class="chart-title">Trend Penjualan per Hari</div>
            <canvas id="lineChart"></canvas>
        </div>
        <div class="chart-box">
            <div class="chart-title">Pendapatan Vs Profit</div>
            <canvas id="barChart"></canvas>
        </div>
    </div>
</div>

{{-- MODAL DETAIL --}}

{{-- Pendapatan --}}
<div class="modal fade" id="detailPendapatanModal" tabindex="-1" aria-labelledby="detailPendapatanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Total Pendapatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-2"><div class="col-8">Penjualan Online</div><div class="col-4 text-end fw-bold">Rp 300.00 Jt</div></div>
        <div class="row mb-2"><div class="col-8">Penjualan Offline</div><div class="col-4 text-end fw-bold">Rp 150.00 Jt</div></div>
        <div class="row mb-2"><div class="col-8">Catering</div><div class="col-4 text-end fw-bold">Rp 51.00 Jt</div></div>
        <hr>
        <div class="row"><div class="col-8 h6">Total Keseluruhan</div><div class="col-4 text-end h6">Rp 501.00 Jt</div></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

{{-- Profit --}}
<div class="modal fade" id="detailProfitModal" tabindex="-1" aria-labelledby="detailProfitModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Total Profit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-2"><div class="col-8">Profit Kotor</div><div class="col-4 text-end fw-bold">Rp 50.00 Jt</div></div>
        <div class="row mb-2"><div class="col-8">Biaya Operasional</div><div class="col-4 text-end fw-bold">Rp 15.00 Jt</div></div>
        <div class="row mb-2"><div class="col-8">Biaya Bahan Baku</div><div class="col-4 text-end fw-bold">Rp 8.95 Jt</div></div>
        <div class="row mb-2"><div class="col-8">Profit Bersih</div><div class="col-4 text-end fw-bold">Rp 26.05 Jt</div></div>
        <hr>
        <div class="row"><div class="col-8 h6">Total Profit</div><div class="col-4 text-end h6">Rp 26.05 Jt</div></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

{{-- Status Pesanan --}}
<div class="modal fade" id="detailStatusModal" tabindex="-1" aria-labelledby="detailStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Status Pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-2"><div class="col-8">Pesanan Selesai</div><div class="col-4 text-end fw-bold">450</div></div>
        <div class="row mb-2"><div class="col-8">Dalam Proses</div><div class="col-4 text-end fw-bold text-bold">180</div></div>
        <div class="row mb-2"><div class="col-8">Pending</div><div class="col-4 text-end fw-bold">50</div></div>
        <div class="row mb-2"><div class="col-8">Dibatalkan</div><div class="col-4 text-end fw-bold">25</div></div>
        <hr>
        <div class="row"><div class="col-8 h6">Total Pesanan</div><div class="col-4 text-end h6">750</div></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

{{-- Hari Tersibuk --}}
<div class="modal fade" id="detailHariModal" tabindex="-1" aria-labelledby="detailHariModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Transaksi per Hari</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-2"><div class="col-8">Senin</div><div class="col-4 text-end fw-bold">85</div></div>
        <div class="row mb-2"><div class="col-8">Selasa</div><div class="col-4 text-end fw-bold">95</div></div>
        <div class="row mb-2"><div class="col-8">Rabu</div><div class="col-4 text-end fw-bold">78</div></div>
        <div class="row mb-2"><div class="col-8">Kamis</div><div class="col-4 text-end fw-bold">105</div></div>
        <div class="row mb-2"><div class="col-8">Jumat</div><div class="col-4 text-end fw-bold">145</div></div>
        <div class="row mb-2"><div class="col-8">Sabtu</div><div class="col-4 text-end fw-bold">120</div></div>
        <div class="row mb-2"><div class="col-8">Minggu</div><div class="col-4 text-end fw-bold">80</div></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

{{-- CHART.JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// DROPDOWN BULAN
document.querySelectorAll('.month-selector').forEach(selector=>{
    const current = selector.querySelector('.current-month');
    const menu = selector.querySelector('.month-dropdown-menu');

    current.addEventListener('click', ()=> {
        menu.style.display = (menu.style.display==='block')?'none':'block';
        selector.classList.toggle('open');
    });

    menu.querySelectorAll('a').forEach(link=>{
        link.addEventListener('click', e=>{
            e.preventDefault();
            current.textContent = link.textContent;
            menu.querySelectorAll('a').forEach(a=>a.classList.remove('active'));
            link.classList.add('active');
            menu.style.display='none';
            selector.classList.remove('open');
            // TODO: refresh data laporan
        });
    });
});

// CHART.JS IMPLEMENTATION
new Chart(document.getElementById('itemChart'), { type: 'bar', data: { labels: ['Nasi Ayam Goreng','Nasi Pecel','Sate Ayam'], datasets:[{label:'Jumlah Terjual',data:[85,65,40],backgroundColor:['#b15cd1','#0066ff','#7de99f'],borderRadius:8}]}, options:{indexAxis:'y',responsive:true, scales:{x:{beginAtZero:true}},plugins:{legend:{display:false}}} });

new Chart(document.getElementById('pieChart'), { type:'doughnut', data:{labels:['Nasi Ayam Goreng','Nasi Pecel','Sate Ayam'], datasets:[{data:[35,28,20],backgroundColor:['#b15cd1','#0066ff','#7de99f']}]}, options:{cutout:'55%',responsive:true} });

new Chart(document.getElementById('lineChart'), { type:'line', data:{labels:['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],datasets:[{label:'Penjualan',data:[10,25,40,60,85,80],borderWidth:2,borderColor:'#0066ff',fill:false,tension:0.4,pointRadius:5,pointHoverRadius:8}]}, options:{responsive:true, scales:{y:{beginAtZero:true}}} });

new Chart(document.getElementById('barChart'), { type:'bar', data:{labels:['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],datasets:[{label:'Pendapatan',data:[10,20,35,40,55,45],backgroundColor:'#0066ff'},{label:'Profit',data:[5,10,18,25,30,20],backgroundColor:'#7de99f'}]}, options:{responsive:true, scales:{y:{beginAtZero:true}}} });
</script>

@endsection
