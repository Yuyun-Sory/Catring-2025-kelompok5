@extends('layouts.app')

@section('title', 'Laporan')

@section('content')

<style>
    .laporan-container {
        width: 100%;
    }

    .summary-container {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .summary-box {
        background: white;
        border: 1px solid #dcdcdc;
        padding: 18px 20px;
        border-radius: 10px;
        width: 200px;
    }

    .summary-title {
        font-size: 15px;
        margin-bottom: 5px;
    }

    .summary-value {
        font-size: 20px;
        font-weight: bold;
    }

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
        min-height: 200x;
    }

    .chart-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 15px;
    }

</style>


<div class="laporan-container">

    <h1 style="font-size:32px; font-weight:700; margin-bottom:0;">Laporan</h1>
    <p style="margin-top:4px; color:#333;">
        Analisis performa bisnis dan pengambilan keputusan
    </p>

    <!-- SUMMARY -->
    <div class="summary-container">
        <div class="summary-box">
            <div class="summary-title">💰 Total Pendapatan</div>
            <div class="summary-value">Rp 501.00 JT</div>
            <div style="font-size:13px; color:green; margin-top:4px;">⬆ 12%</div>
        </div>

        <div class="summary-box">
            <div class="summary-title">📈 Total Profit</div>
            <div class="summary-value">Rp 26.05 JT</div>
            <div style="font-size:13px; color:green; margin-top:4px;">⬆ 12%</div>
        </div>

        <div class="summary-box">
            <div class="summary-title">📊 Status Pesanan</div>
            <div class="summary-value">750</div>
            <div style="font-size:13px; color:green; margin-top:4px;">⬆ 12%</div>
        </div>

        <div class="summary-box">
            <div class="summary-title">📅 Hari Tersibuk</div>
            <div class="summary-value">Jumat</div>
            <div style="font-size:13px; color:green; margin-top:4px;">Sabtu</div>
        </div>
    </div>


    <!-- ROW 1 -->
    <div class="grid-2">

        <!-- BAR HORIZONTAL -->
        <div class="chart-box">
            <div class="chart-title">Penjualan per Item</div>
            <canvas id="itemChart"></canvas>
        </div>

        <!-- PIE CHART -->
        <div class="chart-box">
            <div class="chart-title">Distribusi Penjualan</div>
            <canvas id="pieChart"></canvas>
        </div>

    </div>


    <!-- ROW 2 -->
    <div class="grid-2">

        <!-- LINE CHART -->
        <div class="chart-box">
            <div class="chart-title">Trend Penjualan per Hari</div>
            <canvas id="lineChart"></canvas>
        </div>

        <!-- BAR CHART -->
        <div class="chart-box">
            <div class="chart-title">Pendapatan Vs Profit</div>
            <canvas id="barChart"></canvas>
        </div>

    </div>

</div>


{{-- CHART.JS SCRIPT --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // ---------- 1. BAR HORIZONTAL ----------
    new Chart(document.getElementById('itemChart'), {
        type: 'bar',
        data: {
            labels: ['Nasi Ayam Goreng', 'Nasi Pecel', 'Sate Ayam'],
            datasets: [{
                label: 'Jumlah Terjual',
                data: [85, 65, 40],
                backgroundColor: ['#b15cd1', '#0066ff', '#7de99f'],
                borderRadius: 8
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            scales: {
                x: {beginAtZero: true}
            }
        }
    });

    // ---------- 2. PIE CHART ----------
    new Chart(document.getElementById('pieChart'), {
        type: 'doughnut',
        data: {
            labels: ['Nasi Ayam Goreng', 'Nasi Pecel', 'Sate Ayam'],
            datasets: [{
                data: [35, 28, 20],
                backgroundColor: ['#b15cd1', '#0066ff', '#7de99f']
            }]
        },
        options: {
            cutout: '55%',
            responsive: true
        }
    });

    // ---------- 3. LINE CHART ----------
    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            datasets: [{
                label: 'Penjualan',
                data: [10, 25, 40, 60, 85, 80],
                borderWidth: 2,
                borderColor: '#0066ff',
                fill: false,
                tension: 0.4
            }]
        },
        options: {
            responsive: true
        }
    });

    // ---------- 4. BAR CHART ----------
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            datasets: [
                {
                    label: 'Pendapatan',
                    data: [10, 20, 35, 40, 55, 45],
                    backgroundColor: '#0066ff'
                },
                {
                    label: 'Profit',
                    data: [5, 10, 18, 25, 30, 20],
                    backgroundColor: '#7de99f'
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {beginAtZero: true}
            }
        }
    });
</script>

@endsection
