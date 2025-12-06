@extends('layouts.app')

@section('title', 'Jadwal Produksi')

@section('content')

<style>
    /* ===================== GLOBAL ====================== */
    .container-full {
        width: 100%;
        max-width: 100%;
    }

    .filter-btn {
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        background: #e6e6e6;
        border: none;
        font-weight: 600;
    }
    .filter-active {
        background: #007bff !important;
        color: white;
    }

    .month-btn {
        cursor: pointer;
        font-size: 22px;
        padding: 0 15px;
        user-select: none;
    }

    .summary-box {
        background: #0066ff;
        color: white;
        padding: 15px 25px;
        border-radius: 10px;
        width: 140px;
        text-align: center;
    }

    .table-box {
        width: 100%;
        background: white;
        padding: 20px;
        border-radius: 12px;
        margin-top: 20px;
    }

    .sidebar-table {
        width: 100%;
        border-collapse: collapse;
    }
    .sidebar-table th, .sidebar-table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        font-size: 16px;
    }

    /* ===================== POPUP ====================== */
    #popupOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,0.6);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 99999;
    }

    #popupBox {
        width: 60%;
        background: white;
        padding: 30px;
        border-radius: 12px;
    }

    .input-box {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #cfcfcf;
        margin-bottom: 15px;
    }

    .form-row {
        display: flex;
        gap: 20px;
    }
    .form-col {
        flex: 1;
    }

    .btn-green {
        background: #63f285;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-red {
        padding: 12px 25px;
        background: white;
        border: 1px solid black;
        border-radius: 8px;
        cursor: pointer;
    }

    /* STATUS STYLE */
    .status-box {
        padding: 6px 10px;
        border-radius: 6px;
        text-align: center;
        font-weight: 600;
        display: inline-block;
        width: 100px;
    }

    .status-pending { background: #ffe9b3; }
    .status-proses { background: #b3c7ff; }
    .status-selesai { background: #b6ffb6; }

</style>

<div class="container-full">

    <!-- HEADER -->
    <div style="display:flex; justify-content:space-between; margin-bottom:30px;">
        <h1 style="font-size:32px; font-weight:700;">Jadwal Produksi</h1>

        <button onclick="openPopup()" style="padding:10px 18px; background:white; border:1px solid black; border-radius:8px;">
            + Tambah Jadwal
        </button>
    </div>

    <!-- MONTH SELECTOR -->
    <div style="border:1px solid #ccc; padding:25px; border-radius:10px; margin-bottom:25px; width:100%;">
        <div style="text-align:center; margin-bottom:20px; font-size:20px; display:flex; justify-content:center; align-items:center;">
            <span class="month-btn" onclick="changeMonth(-1)">←</span>
            <strong id="monthLabel" style="margin:0 25px;">November 2025</strong>
            <span class="month-btn" onclick="changeMonth(1)">→</span>
        </div>

        <!-- FILTER BUTTONS -->
        <div style="display:flex; justify-content:center; gap:15px;">
            <button class="filter-btn filter-active" onclick="setFilter('Semua', this)">Semua</button>
            <button class="filter-btn" onclick="setFilter('Menunggu', this)">Menunggu</button>
            <button class="filter-btn" onclick="setFilter('Proses', this)">Dalam Proses</button>
            <button class="filter-btn" onclick="setFilter('Selesai', this)">Selesai</button>
        </div>
    </div>

    <!-- SUMMARY -->
    <div style="display:flex; gap:15px; margin-bottom:25px; flex-wrap:wrap;">
        <div class="summary-box">
            <div style="font-size:22px; font-weight:bold;" id="sumTotal">5</div>
            <div>Total Jadwal</div>
        </div>

        <div class="summary-box">
            <div style="font-size:22px; font-weight:bold;" id="sumSemua">5</div>
            <div>Semua</div>
        </div>

        <div class="summary-box">
            <div style="font-size:22px; font-weight:bold;" id="sumMenunggu">1</div>
            <div>Menunggu</div>
        </div>

        <div class="summary-box">
            <div style="font-size:22px; font-weight:bold;" id="sumProses">1</div>
            <div>Proses</div>
        </div>

        <div class="summary-box">
            <div style="font-size:22px; font-weight:bold;" id="sumSelesai">2</div>
            <div>Selesai</div>
        </div>
    </div>


    <!-- TABLE -->
    <div class="table-box">
        <table class="sidebar-table">
            <thead>
                <tr style="background:#f0f0f0;">
                    <th>Menu Dipesan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="tableBody"></tbody>
        </table>
    </div>

</div> <!-- END FULL -->



<!-- POPUP -->
<div id="popupOverlay">
    <div id="popupBox">

        <h2 style="text-align:center; margin-bottom:20px; font-weight:600;">Tambah Jadwal Produksi</h2>

        <form>

            <div class="form-row">
                <div class="form-col">
                    <label>Menu *</label>
                    <input type="text" class="input-box" placeholder="Nama menu">
                </div>
                <div class="form-col">
                    <label>Jumlah Porsi *</label>
                    <input type="number" class="input-box" value="0">
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <label>No.Pesanan</label>
                    <input type="text" class="input-box" placeholder="ORD-XXXX">
                </div>

                <div class="form-col">
                    <label>Nama Customer</label>
                    <input type="text" class="input-box" placeholder="Nama pemesan">
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                    <label>Tim Produksi</label>
                    <input type="text" class="input-box" placeholder="Tim A">
                </div>

                <div class="form-col">
                    <label>Penanggung Jawab</label>
                    <input type="text" class="input-box" placeholder="Chef">
                </div>
            </div>

            <label>Status</label>
            <input type="text" class="input-box" placeholder="Pending">

            <label>Catatan</label>
            <textarea class="input-box" rows="3"></textarea>

            <div style="display:flex; justify-content:space-between; margin-top:20px;">
                <button type="button" class="btn-red" onclick="closePopup()">Batal</button>
                <button type="submit" class="btn-green">Simpan</button>
            </div>

        </form>

    </div>
</div>


<script>
    // ==== SAMPLE DATA ====
    const data = [
        { menu: "Soto Ayam", status: "Selesai" },
        { menu: "Nasi Ayam Goreng", status: "Menunggu" },
        { menu: "Nasi Pecel", status: "Selesai" },
        { menu: "Sayur Sop", status: "Proses" },
        { menu: "Sate Ayam", status: "Proses" }
    ];

    let currentFilter = "Semua";

    const monthNames = [
        "Januari","Februari","Maret","April","Mei","Juni",
        "Juli","Agustus","September","Oktober","November","Desember"
    ];

    let currentMonth = 10;
    let currentYear = 2025;

    renderTable();
    updateSummary();

    function changeMonth(step) {
        currentMonth += step;
        if (currentMonth < 0) { currentMonth = 11; currentYear--; }
        if (currentMonth > 11) { currentMonth = 0; currentYear++; }
        document.getElementById("monthLabel").innerText =
            monthNames[currentMonth] + " " + currentYear;
    }

    function setFilter(filter, btn) {
        currentFilter = filter;

        document.querySelectorAll('.filter-btn')
            .forEach(b => b.classList.remove('filter-active'));

        btn.classList.add('filter-active');

        renderTable();
        updateSummary();
    }

    function renderTable() {
        const body = document.getElementById("tableBody");
        body.innerHTML = "";

        const filtered = data.filter(d =>
            currentFilter === "Semua" || d.status === currentFilter
        );

        filtered.forEach(d => {
            body.innerHTML += `
                <tr>
                    <td>${d.menu}</td>
                    <td>${d.status}</td>
                </tr>
            `;
        });
    }

    function updateSummary() {
        document.getElementById("sumTotal").innerText = data.length;
        document.getElementById("sumSemua").innerText = data.length;
        document.getElementById("sumMenunggu").innerText =
            data.filter(d => d.status === "Menunggu").length;
        document.getElementById("sumProses").innerText =
            data.filter(d => d.status === "Proses").length;
        document.getElementById("sumSelesai").innerText =
            data.filter(d => d.status === "Selesai").length;
    }

    function openPopup() {
        document.getElementById("popupOverlay").style.display = "flex";
    }

    function closePopup() {
        document.getElementById("popupOverlay").style.display = "none";
    }
</script>

@endsection
