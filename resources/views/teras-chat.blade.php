@extends('layouts.app')

@section('title', 'Integrasi Chatbot')

@section('content')

<style>
    .stat-box {
        background: white;
        border-radius: 10px;
        padding: 15px 20px;
        border: 1px solid #e0e0e0;
        width: 180px;
        text-align: center;
    }
    .stat-title {
        font-size: 14px;
        opacity: .7;
        margin-bottom: 3px;
    }
    .stat-value {
        font-size: 20px;
        font-weight: bold;
    }
    .stat-percent {
        font-size: 12px;
        color: green;
    }

    .calendar-box {
        background: white;
        border-radius: 12px;
        padding: 20px;
        border: 1px solid #e0e0e0;
        margin-top: 20px;
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-weight: bold;
        font-size: 18px;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
        text-align: center;
        margin-top: 15px;
    }

    .date-box {
        padding: 8px 0;
        border-radius: 8px;
        font-weight: bold;
    }

    .ava {
        background: #8df59b;
    }
    .taken {
        background: #f57b7b;
        color: white;
    }
    .selected {
        background: #3056ff;
        color: white;
    }

    .legend {
        display: flex;
        gap: 20px;
        margin-top: 15px;
        font-size: 14px;
    }

    .legend span {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .dot {
        width: 14px;
        height: 14px;
        border-radius: 4px;
        display: inline-block;
    }

    .table-box {
        background: white;
        border-radius: 12px;
        border: 1px solid #e0e0e0;
        padding: 20px;
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    table th, table td {
        border: 1px solid #dcdcdc;
        padding: 10px;
        font-size: 14px;
    }
    table th {
        background: #f4f4f4;
    }
</style>

<h1 style="font-size:32px; font-weight:bold; margin-bottom:10px;">
    Integrasi Chatbot
</h1>

<!-- STAT BOX -->
<div style="display:flex; gap:20px; margin-bottom:20px;">
    <div class="stat-box">
        <div class="stat-title">Total Pesanan</div>
        <div class="stat-value">3</div>
        <div class="stat-percent">+5%</div>
    </div>

    <div class="stat-box">
        <div class="stat-title">Tanggal Pesanan</div>
        <div class="stat-value">12</div>
        <div class="stat-percent">+1%</div>
    </div>
</div>

<!-- KALENDER -->
<div class="calendar-box">

    <div class="calendar-header">
        <span>Kalendar Rekomendasi</span>
        <span>&lt; November 2025 &gt;</span>
    </div>

    <!-- Nama Hari -->
    <div class="calendar-grid" style="font-weight:bold;">
        <div>Min</div><div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
    </div>

    <!-- GRID KALENDER -->
    <div class="calendar-grid">

        <!-- Minggu 1 -->
        <div></div><div></div><div></div><div></div>
        <div class="date-box taken">6</div>
        <div class="date-box taken">7</div>
        <div class="date-box ava">1</div>

        <!-- Minggu 2 -->
        <div class="date-box ava">2</div>
        <div class="date-box ava">3</div>
        <div class="date-box ava">4</div>
        <div class="date-box ava">5</div>
        <div class="date-box taken">6</div>
        <div class="date-box taken">7</div>
        <div class="date-box ava">8</div>

        <!-- Minggu 3 -->
        <div class="date-box ava">9</div>
        <div class="date-box ava">10</div>
        <div class="date-box ava">11</div>
        <div class="date-box taken">12</div>
        <div class="date-box taken">13</div>
        <div class="date-box taken">14</div>
        <div class="date-box selected">15</div>

        <!-- Minggu 4 -->
        <div class="date-box ava">16</div>
        <div class="date-box ava">17</div>
        <div class="date-box ava">18</div>
        <div class="date-box ava">19</div>
        <div class="date-box taken">20</div>
        <div class="date-box taken">21</div>
        <div class="date-box ava">22</div>

        <!-- Minggu 5 -->
        <div class="date-box ava">23</div>
        <div class="date-box ava">24</div>
        <div class="date-box taken">25</div>
        <div class="date-box ava">26</div>
        <div class="date-box ava">27</div>
        <div class="date-box taken">28</div>
        <div class="date-box ava">29</div>

        <!-- Minggu 6 -->
        <div class="date-box ava">30</div>
    </div>

    <!-- Legend -->
    <div class="legend">
        <span><div class="dot" style="background:#8df59b;"></div> Tersedia</span>
        <span><div class="dot" style="background:#f57b7b;"></div> Sudah dipesan</span>
        <span><div class="dot" style="background:#3056ff;"></div> Pilihan Anda</span>
    </div>

</div>

<!-- CHATBOT LOG -->
<div class="table-box">
    <h3 style="margin-bottom:10px; font-weight:bold;">Chatbot Log</h3>

    <table>
        <tr>
            <th>Waktu</th>
            <th>Pelanggan</th>
            <th>Pertanyaan</th>
            <th>Respon Chatbot</th>
            <th>Status</th>
        </tr>

        <tr>
            <td>10.10</td>
            <td>Ahmad Rizki</td>
            <td>Menu Paket A Berapa?</td>
            <td>Paket A: Rp 20.000/porsi</td>
            <td>✔️</td>
        </tr>

        <tr>
            <td>10.25</td>
            <td>Budi Santoso</td>
            <td>Apakah bisa delivery besok?</td>
            <td>Bisa, silahkan isi form pemesanan</td>
            <td>📨</td>
        </tr>

        <tr>
            <td>11.40</td>
            <td>Siti Nurhalizah</td>
            <td>Berapa minimal catering?</td>
            <td>Minimal 55 porsi ya kak</td>
            <td>👌</td>
        </tr>
    </table>
</div>

@endsection
