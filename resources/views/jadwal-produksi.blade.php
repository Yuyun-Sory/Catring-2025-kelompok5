@extends('layouts.app')

@section('title', 'Jadwal Produksi')

@section('content')

<style>
/* ===================== GLOBAL ===================== */
.container-full {
    width: 100%;
    max-width: 100%;
    font-family: 'Inter', sans-serif;
    padding: 20px;
    background: #f5f6fa;
}

h1 {
    font-weight: 700;
    font-size: 32px;
}

/* ===================== BUTTONS ===================== */
.add-btn {
    padding: 10px 18px;
    background: #4b7bec;
    color: white;
    font-weight: 600;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.add-btn:hover {
    background: #3867d6;
    transform: translateY(-2px);
}

.filter-container {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
    margin-top: 15px;
}

.filter-btn {
    padding: 10px 22px;
    border-radius: 20px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    background: #e0e0e0;
    transition: all 0.3s;
}

.filter-btn:hover {
    background: #d0d0d0;
}

.filter-active {
    background: #4b7bec !important;
    color: white !important;
}

/* ===================== MONTH SELECTOR ===================== */
.month-selector {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    font-size: 20px;
    margin-bottom: 20px;
}

.month-btn {
    cursor: pointer;
    font-size: 22px;
    user-select: none;
    transition: 0.3s;
}

.month-btn:hover {
    color: #3867d6;
}

/* ===================== SUMMARY BOX ===================== */
.summary-container {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 25px;
    justify-content: center;
}

.summary-box {
    background: linear-gradient(135deg,#4b7bec,#3867d6);
    color: white;
    padding: 18px 25px;
    border-radius: 12px;
    width: 140px;
    text-align: center;
    font-weight: 600;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.summary-box:hover {
    transform: translateY(-3px);
}

.summary-box div:first-child {
    font-size: 22px;
    font-weight: bold;
}

/* ===================== TABLE ===================== */
.table-box {
    width: 100%;
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}

.sidebar-table {
    width: 100%;
    border-collapse: collapse;
}

.sidebar-table th, .sidebar-table td {
    padding: 14px;
    text-align: left;
    font-size: 16px;
}

.sidebar-table th {
    background: #f7f7f7;
    font-weight: 600;
}

.sidebar-table tr:hover {
    background: #f0f4ff;
    transition: background 0.3s;
}

/* ===================== STATUS BADGE ===================== */
.status-box {
    padding: 6px 12px;
    border-radius: 14px;
    text-align: center;
    font-weight: 600;
    display: inline-block;
    width: 100px;
    transition: all 0.3s;
}

.status-pending { background: #ffe29c; }
.status-proses { background: #9ac1ff; }
.status-selesai { background: #8ef08e; }

/* ===================== POPUP ===================== */
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
    z-index: 9999;
}

#popupBox {
    width: 60%;
    background: white;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 6px 25px rgba(0,0,0,0.2);
}

.input-box {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #cfcfcf;
    margin-bottom: 15px;
    transition: all 0.3s;
}

.input-box:focus {
    border-color: #4b7bec;
    box-shadow: 0 0 8px rgba(75,123,236,0.3);
    outline: none;
}

.form-row {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
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
    transition: all 0.3s;
}

.btn-green:hover {
    background: #4bd66e;
}

.btn-red {
    padding: 12px 25px;
    background: white;
    border: 1px solid black;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-red:hover {
    background: #f0f0f0;
}
</style>

<div class="container-full">

    <!-- HEADER -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; flex-wrap:wrap;">
        <h1>Jadwal Produksi</h1>
        <button class="add-btn" onclick="openPopup()">+ Tambah Jadwal</button>
    </div>

    <!-- MONTH SELECTOR -->
    <div style="border:1px solid #ccc; padding:25px; border-radius:12px; margin-bottom:25px; background:white;">
        <div class="month-selector">
            <span class="month-btn" onclick="changeMonth(-1)">←</span>
            <strong id="monthLabel">November 2025</strong>
            <span class="month-btn" onclick="changeMonth(1)">→</span>
        </div>

        <!-- FILTER BUTTONS -->
        <div class="filter-container">
            <button class="filter-btn filter-active" onclick="setFilter('Semua', this)">Semua</button>
            <button class="filter-btn" onclick="setFilter('Menunggu', this)">Menunggu</button>
            <button class="filter-btn" onclick="setFilter('Proses', this)">Dalam Proses</button>
            <button class="filter-btn" onclick="setFilter('Selesai', this)">Selesai</button>
        </div>
    </div>

    <!-- SUMMARY -->
<div class="summary-container" style="display:flex; gap:15px; margin-bottom:30px;">
    <div class="summary-box" style="flex:1; background:#e74c3c;">
        <div id="sumTotal">5</div>
        <div>Total Jadwal</div>
    </div>
    <div class="summary-box" style="flex:1; background:#3498db;">
        <div id="sumSemua">5</div>
        <div>Semua</div>
    </div>
    <div class="summary-box" style="flex:1; background:#f1c40f; color:#333;">
        <div id="sumMenunggu">1</div>
        <div>Menunggu</div>
    </div>
    <div class="summary-box" style="flex:1; background:#9b59b6;">
        <div id="sumProses">1</div>
        <div>Proses</div>
    </div>
    <div class="summary-box" style="flex:1; background:#2ecc71;">
        <div id="sumSelesai">2</div>
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

</div>

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
    const monthNames = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    let currentMonth = 10;
    let currentYear = 2025;

    renderTable();
    updateSummary();

    function changeMonth(step) {
        currentMonth += step;
        if(currentMonth < 0){ currentMonth = 11; currentYear--; }
        if(currentMonth > 11){ currentMonth = 0; currentYear++; }
        document.getElementById("monthLabel").innerText = monthNames[currentMonth] + " " + currentYear;
    }

    function setFilter(filter, btn) {
        currentFilter = filter;
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('filter-active'));
        btn.classList.add('filter-active');
        renderTable();
        updateSummary();
    }

    function renderTable() {
        const body = document.getElementById("tableBody");
        body.innerHTML = "";
        const filtered = data.filter(d => currentFilter === "Semua" || d.status === currentFilter);
        filtered.forEach(d => {
            let statusClass = d.status === "Menunggu" ? "status-pending" : d.status === "Proses" ? "status-proses" : "status-selesai";
            body.innerHTML += `<tr>
                <td>${d.menu}</td>
                <td><span class="status-box ${statusClass}">${d.status}</span></td>
            </tr>`;
        });
    }

    function updateSummary() {
        document.getElementById("sumTotal").innerText = data.length;
        document.getElementById("sumSemua").innerText = data.length;
        document.getElementById("sumMenunggu").innerText = data.filter(d => d.status === "Menunggu").length;
        document.getElementById("sumProses").innerText = data.filter(d => d.status === "Proses").length;
        document.getElementById("sumSelesai").innerText = data.filter(d => d.status === "Selesai").length;
    }

    function openPopup() { document.getElementById("popupOverlay").style.display = "flex"; }
    function closePopup() { document.getElementById("popupOverlay").style.display = "none"; }
</script>

@endsection
