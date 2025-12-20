@extends('layouts.app')

@section('title', 'Laporan')

@section('content')

<style>
.laporan-container { width:100%; padding:0 20px; }
.summary-container { display:flex; gap:15px; margin-top:20px; flex-wrap:wrap; }
.summary-box {
    background:#fff; border:1px solid #dcdcdc;
    padding:18px 20px; border-radius:10px; width:200px;
}
.summary-title { font-size:15px; margin-bottom:5px; color:#555; }
.summary-value { font-size:20px; font-weight:bold; }
.summary-sub { font-size:13px; color:#2ecc71; margin-top:4px; font-weight:600; }

.grid-2 {
    display:grid; grid-template-columns:repeat(2,1fr);
    gap:15px; margin-top:20px;
}
.chart-box {
    background:white; border:1px solid #dcdcdc;
    border-radius:12px; padding:20px;
}
.chart-title { font-size:18px; font-weight:bold; margin-bottom:15px; }

/* DROPDOWN GLOBAL */
.month-selector { position:relative; cursor:pointer; }
.current-month {
    padding:8px 12px; background:#fff; border:1px solid #dcdcdc;
    border-radius:6px; font-weight:bold; padding-right:25px;
}
.current-month::after {
    content:"▼"; position:absolute; right:10px; top:50%;
    transform:translateY(-50%); font-size:10px;
}
.month-dropdown-menu {
    display:none; position:absolute; right:0; top:110%;
    background:white; border:1px solid #ccc;
    border-radius:6px; min-width:160px; z-index:100;
}
.month-dropdown-menu a {
    display:block; padding:8px 12px; color:#333; text-decoration:none;
}
.month-dropdown-menu a:hover { background:#f2f2f2; }
.month-dropdown-menu a.active { font-weight:bold; color:#0066ff; }
</style>

<div class="laporan-container">

    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 style="font-size:32px; font-weight:700;">Laporan</h1>
            <p style="margin-top:4px;">Analisis performa bisnis dan pengambilan keputusan</p>
        </div>

        {{-- PERIODE GLOBAL --}}
        <div class="month-selector" id="periodeGlobal">
            <div class="current-month" id="currentPeriode">Januari 2025</div>
            <div class="month-dropdown-menu">
                @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November'] as $m)
                    <a href="#" class="{{ $m=='Januari'?'active':'' }}" data-value="{{ $m }} 2025">
                        {{ $m }} 2025
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- SUMMARY --}}
    <div class="summary-container">

        <div class="summary-box">
            <div class="summary-title">💰 Total Pendapatan</div>
            <div class="summary-value">Rp 501.00 JT</div>
            <div class="summary-sub">⬆ 12%</div>
            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#pendapatanModal">
                Lihat Detail
            </button>
        </div>

        <div class="summary-box">
            <div class="summary-title">📈 Total Profit</div>
            <div class="summary-value">Rp 26.05 JT</div>
            <div class="summary-sub">⬆ 12%</div>
            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#profitModal">
                Lihat Detail
            </button>
        </div>

        <div class="summary-box">
            <div class="summary-title">📊 Status Pesanan</div>
            <div class="summary-value">750</div>
            <div class="summary-sub">⬆ 12%</div>
            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#statusModal">
                Lihat Detail
            </button>
        </div>

        <div class="summary-box">
            <div class="summary-title">📅 Hari Tersibuk</div>
            <div class="summary-value">Jumat</div>
            <div class="summary-sub">Sabtu</div>
            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#hariModal">
                Lihat Detail
            </button>
        </div>
    </div>

    {{-- CHART --}}
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
            <div class="chart-title">Trend Penjualan</div>
            <canvas id="lineChart"></canvas>
        </div>
        <div class="chart-box">
            <div class="chart-title">Pendapatan vs Profit</div>
            <canvas id="barChart"></canvas>
        </div>
    </div>
</div>

{{-- MODAL PENDAPATAN --}}
<div class="modal fade" id="pendapatanModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Total Pendapatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Penjualan Online <strong class="float-end">Rp 300 JT</strong></p>
        <p>Penjualan Offline <strong class="float-end">Rp 150 JT</strong></p>
        <p>Catering <strong class="float-end">Rp 51 JT</strong></p>
        <hr>
        <p class="fw-bold">Total <span class="float-end">Rp 501 JT</span></p>
      </div>
    </div>
  </div>
</div>

{{-- MODAL PROFIT --}}
<div class="modal fade" id="profitModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Total Profit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Profit Bersih <strong class="float-end">Rp 26.05 JT</strong></p>
      </div>
    </div>
  </div>
</div>

{{-- MODAL STATUS --}}
<div class="modal fade" id="statusModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Status Pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Selesai <strong class="float-end">450</strong></p>
        <p>Proses <strong class="float-end">180</strong></p>
        <p>Pending <strong class="float-end">50</strong></p>
      </div>
    </div>
  </div>
</div>

{{-- MODAL HARI --}}
<div class="modal fade" id="hariModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Transaksi per Hari</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Jumat <strong class="float-end">145</strong></p>
        <p>Sabtu <strong class="float-end">120</strong></p>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const selector = document.getElementById('periodeGlobal');
const current = document.getElementById('currentPeriode');
const menu = selector.querySelector('.month-dropdown-menu');

current.onclick = () => {
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
};

menu.querySelectorAll('a').forEach(a=>{
    a.onclick = e=>{
        e.preventDefault();
        current.textContent = a.dataset.value;
        menu.querySelectorAll('a').forEach(x=>x.classList.remove('active'));
        a.classList.add('active');
        menu.style.display='none';
    };
});

new Chart(itemChart,{type:'bar',data:{labels:['Nasi Ayam','Nasi Pecel','Sate Ayam'],datasets:[{data:[85,65,40]}]},options:{indexAxis:'y'}});
new Chart(pieChart,{type:'doughnut',data:{labels:['Ayam','Pecel','Sate'],datasets:[{data:[35,28,20]}]}});
new Chart(lineChart,{type:'line',data:{labels:['Sen','Sel','Rab','Kam','Jum'],datasets:[{data:[10,25,40,60,85]}]}});
new Chart(barChart,{type:'bar',data:{labels:['Sen','Sel','Rab','Kam','Jum'],datasets:[{label:'Pendapatan',data:[10,20,35,40,55]},{label:'Profit',data:[5,10,18,25,30]}]}});
</script>

@endsection
