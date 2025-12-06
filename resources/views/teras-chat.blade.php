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
        <button id="prevMonthBtn" style="cursor:pointer;">&lt;</button>
        <span id="monthLabel">Loading...</span>
        <button id="nextMonthBtn" style="cursor:pointer;">&gt;</button>
    </div>

    <!-- Nama Hari -->
    <div class="calendar-grid" style="font-weight:bold;">
        <div>Min</div><div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
    </div>

    <!-- GRID KALENDER -->
    <div id="calendarBody" class="calendar-grid"></div>

    <!-- Legend -->
    <div class="legend">
        <span><div class="dot" style="background:#8df59b;"></div> Tersedia</span>
        <span><div class="dot" style="background:#f57b7b;"></div> Sudah dipesan</span>
        <span><div class="dot" style="background:#3056ff;"></div> Pilihan Anda</span>
    </div>

</div>

<script>
/* ================================
   DATA KONDISI TANGGAL
   Bisa Anda ganti dari database
================================ */
let tanggalTaken = ["2025-11-12", "2025-11-18", "2025-11-20", "2025-11-21", "2025-11-25"];
let selectedDate = "2025-11-15"; // contoh tanggal pilihan user

/* ================================
   VARIABEL BULAN DINAMIS
================================ */
let currentYear = new Date().getFullYear();
let currentMonth = new Date().getMonth();

const monthNames = [
    "Januari","Februari","Maret","April","Mei","Juni",
    "Juli","Agustus","September","Oktober","November","Desember"
];

function renderCalendar() {
    const monthLabel = document.getElementById("monthLabel");
    const calendarBody = document.getElementById("calendarBody");

    monthLabel.textContent = `${monthNames[currentMonth]} ${currentYear}`;
    calendarBody.innerHTML = "";

    let firstDay = new Date(currentYear, currentMonth, 1).getDay();
    let lastDate = new Date(currentYear, currentMonth + 1, 0).getDate();

    // Tambahkan grid kosong sebelum tanggal 1
    for (let i = 0; i < firstDay; i++) {
        calendarBody.innerHTML += `<div></div>`;
    }

    // Generate tanggal dalam bulan
    for (let d = 1; d <= lastDate; d++) {
        let formatted =
            currentYear + "-" +
            String(currentMonth + 1).padStart(2, "0") + "-" +
            String(d).padStart(2, "0");

        let className = "ava"; // default tersedia

        if (tanggalTaken.includes(formatted)) {
            className = "taken";
        }
        if (formatted === selectedDate) {
            className = "selected";
        }

        calendarBody.innerHTML += `
            <div class="date-box ${className}">${d}</div>
        `;
    }
}

/* ================================
   EVENT TOMBOL NEXT / PREV
================================ */
document.getElementById("prevMonthBtn").onclick = () => {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    renderCalendar();
};

document.getElementById("nextMonthBtn").onclick = () => {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    renderCalendar();
};

/* ================================
   MULAI RENDER
================================ */
renderCalendar();
</script>

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

</div>



@endsection
