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

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 style="font-size:32px;font-weight:700;">Laporan</h1>
            <p class="text-muted">Analisis performa bisnis dan pengambilan keputusan</p>
        </div>

        {{-- FILTER BULAN --}}
        <div class="month-selector">
            <form method="GET" action="{{ route('laporan') }}">
                <select name="bulan" onchange="this.form.submit()" class="form-select">
                    @foreach(range(1,12) as $m)
                        <option value="{{ $m }}" {{ $bulan==$m?'selected':'' }}>
                            {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }} {{ $tahun }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    {{-- SUMMARY --}}
    <div class="summary-container">

        {{-- TOTAL PENDAPATAN --}}
        <div class="summary-box">
            <div class="summary-title">💰 Total Pendapatan</div>
            <div class="summary-value">
                Rp {{ number_format($totalPendapatan,0,',','.') }}
            </div>
            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#pendapatanModal">
                Lihat Detail
            </button>
        </div>

        {{-- PROFIT (dummy hitung sederhana) --}}
        <div class="summary-box">
            <div class="summary-title">📈 Total Profit</div>
            <div class="summary-value">
                Rp {{ number_format($totalPendapatan * 0.2,0,',','.') }}
            </div>
            <small class="text-muted">Estimasi 20%</small>
        </div>

        {{-- STATUS PESANAN --}}
        <div class="summary-box">
            <div class="summary-title">📊 Status Pesanan</div>
            <div class="summary-value">
                {{ $statusPesanan->sum() }}
            </div>
            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#statusModal">
                Lihat Detail
            </button>
        </div>

        {{-- HARI TERSIBUK --}}
        <div class="summary-box">
            <div class="summary-title">📅 Hari Tersibuk</div>
            <div class="summary-value">
                {{ $hariTersibuk->hari ?? '-' }}
            </div>
            <small>{{ $hariTersibuk->total ?? 0 }} transaksi</small>
        </div>

    </div>

    {{-- CHART --}}
    <div class="grid-2 mt-4">
        <div class="chart-box">
            <div class="chart-title">Penjualan per Item</div>
            <canvas id="itemChart"></canvas>
        </div>

        <div class="chart-box">
            <div class="chart-title">Distribusi Penjualan</div>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

</div>

{{-- MODAL STATUS --}}
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Status Pesanan</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @foreach($statusPesanan as $status => $jumlah)
                    <p>{{ ucfirst($status) }}
                        <strong class="float-end">{{ $jumlah }}</strong>
                    </p>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- MODAL PENDAPATAN --}}
<div class="modal fade" id="pendapatanModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Total Pendapatan</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="fw-bold">
                    Total
                    <span class="float-end">
                        Rp {{ number_format($totalPendapatan,0,',','.') }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const menuLabels = @json($penjualanMenu->pluck('nama_menu'));
const menuData   = @json($penjualanMenu->pluck('total'));

new Chart(document.getElementById('itemChart'), {
    type: 'bar',
    data: {
        labels: menuLabels,
        datasets: [{
            label: 'Jumlah Terjual',
            data: menuData
        }]
    },
    options: { indexAxis: 'y' }
});

new Chart(document.getElementById('pieChart'), {
    type: 'doughnut',
    data: {
        labels: menuLabels,
        datasets: [{
            data: menuData
        }]
    }
});
</script>
@endsection
