@extends('layouts.app')

@section('title', 'Status Pesanan')

@section('content')

<style>
/* =========================== MODAL =========================== */
.modal-overlay {
    position: fixed;
    top:0; left:0;
    width:100%; height:100%;
    background: rgba(0,0,0,0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}
.modal-box {
    background: #fff;
    width: 90%; max-width: 600px;
    border-radius: 16px;
    padding: 25px 30px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    animation: modalIn 0.3s ease-out;
}
@keyframes modalIn {
    from {transform: scale(0.8); opacity:0;}
    to {transform: scale(1); opacity:1;}
}

/* =========================== STATISTICS =========================== */
#statsBar {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 15px;
}
.stat-box {
    flex: 1 1 150px;
    padding: 20px 18px;
    border-radius: 16px;
    font-weight: 600;
    color: #fff;
    text-align: center;
    box-shadow: 0 6px 15px rgba(0,0,0,0.12);
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: default;
}
.stat-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}
.stat-box.total { background: linear-gradient(135deg, #4b7bec, #3867d6); }
.stat-box.menunggu { background: linear-gradient(135deg, #ffb347, #ffcc33); }
.stat-box.diproses { background: linear-gradient(135deg, #4aa3ff, #70c1ff); }
.stat-box.dikirim { background: linear-gradient(135deg, #df9d00, #f3c623); }
.stat-box.selesai { background: linear-gradient(135deg, #2ecc71, #27ae60); }
.stat-box.batal { background: linear-gradient(135deg, #ff6f6f, #e74c3c); }

.stat-number {
    display: block;
    font-size: 28px;
    margin-top: 8px;
}

/* =========================== FILTER BUTTONS =========================== */
.filter-btn {
    padding: 10px 20px;
    border-radius: 22px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s;
    background: #e0e0e0;
}
.filter-btn.active,
.filter-btn:hover {
    background: #4f46e5;
    color: white;
}

/* =========================== SEARCH BAR =========================== */
input[type="text"] {
    width: 100%;
    padding: 14px 18px;
    border-radius: 12px;
    border: 1px solid #ccc;
    font-size: 15px;
    margin: 20px 0;
    box-shadow: inset 0 2px 5px rgba(0,0,0,0.05);
    transition: 0.3s;
}
input[type="text"]:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 12px rgba(79,70,229,0.3);
    outline: none;
}

/* =========================== CARD ORDER =========================== */
.card-order {
    background:#fff;
    padding:20px 22px;
    border-radius:16px;
    border:1px solid #e0e0e0;
    margin-bottom:20px;
    box-shadow:0 6px 15px rgba(0,0,0,0.08);
    transition: transform 0.3s, box-shadow 0.3s;
}
.card-order:hover {
    transform: translateY(-4px);
    box-shadow:0 10px 25px rgba(0,0,0,0.12);
}
.card-order b {
    font-size: 18px;
}
.card-order p {
    margin:6px 0;
}

/* =========================== STATUS PILLS =========================== */
.status-pill {
    padding:6px 16px;
    border-radius:20px;
    color:#fff;
    font-size:13px;
    font-weight:600;
    transition: background 0.3s;
}
.pill-selesai { background:#27ae60; }
.pill-menunggu { background:#757575; }
.pill-diproses { background:#1976ff; }
.pill-dikirim { background:#df9d00; }
.pill-batal { background:#d83131; }

/* =========================== ACTION BUTTONS =========================== */
.update-btn {
    padding:8px 16px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
    transition: all 0.3s;
}
.btn-proses { background:#7beb8b; color:#fff; }
.btn-kirim { background:#82c0ff; color:#fff; }
.btn-batalkan { background:#ff6f6f; color:#fff; }
.update-btn:hover {
    opacity:0.9;
    transform: translateY(-2px);
}

/* =========================== RESPONSIVE =========================== */
@media(max-width:768px){
    #statsBar { flex-direction: column; }
    .filter-btn { flex:1 1 45%; margin-bottom:10px; }
    .card-order { padding:16px; }
}
</style>

<!-- ================= HTML ================= -->
<h1 class="title-page"><b>Pesanan Masuk</b></h1>

<!-- STATISTICS -->
<div id="statsBar">
    <div class="stat-box total">
        Total Pesanan
        <span class="stat-number total-count">5</span>
    </div>
    <div class="stat-box menunggu">
        Menunggu
        <span class="stat-number menunggu-count">1</span>
    </div>
    <div class="stat-box diproses">
        Diproses
        <span class="stat-number diproses-count">1</span>
    </div>
    <div class="stat-box dikirim">
        Dalam Perjalanan
        <span class="stat-number dikirim-count">1</span>
    </div>
    <div class="stat-box selesai">
        Selesai
        <span class="stat-number selesai-count">1</span>
    </div>
    <div class="stat-box batal">
        Dibatalkan
        <span class="stat-number batal-count">1</span>
    </div>
</div>

<!-- FILTER -->
<div style="margin-top:20px; display:flex; gap:10px; flex-wrap:wrap;">
    <button class="filter-btn active" data-filter="all">Semua</button>
    <button class="filter-btn" data-filter="menunggu">Menunggu</button>
    <button class="filter-btn" data-filter="diproses">Diproses</button>
    <button class="filter-btn" data-filter="dikirim">Dalam Perjalanan</button>
    <button class="filter-btn" data-filter="selesai">Selesai</button>
    <button class="filter-btn" data-filter="batal">Dibatalkan</button>
</div>

<!-- SEARCH BAR -->
<input type="text" id="searchBar" placeholder="🔍 Cari Pesanan (No Pesanan, Nama/Menu...)">

<!-- CARD LIST -->
<div class="card-order card-item selesai">
    <div style="display:flex; justify-content:space-between;">
        <b onclick="openModal(detail_1)" style="color:#0050ff; cursor:pointer;">2025-0015</b>
        <span class="status-pill pill-selesai">Selesai</span>
    </div>
    <p style="font-weight:bold;">Nasi Ayam Goreng Lalapan</p>
    <p>Ahmad Rizki<br><span style="opacity:0.7;">0855-1234-5678</span></p>
</div>

<div class="card-order card-item menunggu">
    <div style="display:flex; justify-content:space-between;">
        <b onclick="openModal(detail_2)" style="cursor:pointer; color:#0050ff;">2025-0021</b>
        <span class="status-pill pill-menunggu">Menunggu</span>
    </div>
    <p style="font-weight:bold;">Soto Ayam Special</p>
    <p>Budi Santoso<br><span style="opacity:0.7;">0812-3469-7850</span></p>

</div>

<div class="card-order card-item diproses">
    <div style="display:flex; justify-content:space-between;">
        <b onclick="openModal(detail_3)" style="cursor:pointer; color:#0050ff;">2025-0032</b>
        <span class="status-pill pill-diproses">Diproses</span>
    </div>
    <p style="font-weight:bold;">Sate Ayam Madura</p>
    <p>Siti Nurhaliza<br><span style="opacity:0.7;">0856-7890-1234</span></p>
    <div style="margin-top:12px; display:flex; gap:10px;">
        <button class="update-btn btn-kirim" onclick="updateStatus(this,'dikirim')">Kirim</button>
        <button class="update-btn btn-batalkan" onclick="updateStatus(this,'batal')">Batalkan</button>
    </div>
</div>

<div class="card-order card-item dikirim">
    <div style="display:flex; justify-content:space-between;">
        <b onclick="openModal(detail_4)" style="cursor:pointer; color:#0050ff;">2025-0040</b>
        <span class="status-pill pill-dikirim">Dalam Perjalanan</span>
    </div>
    <p style="font-weight:bold;">Bakso Super</p>
    <p>Rico Hidayat<br><span style="opacity:0.7;">0821-2233-5522</span></p>
    <div style="margin-top:12px; display:flex; gap:10px;">
        <button class="update-btn btn-proses" onclick="updateStatus(this,'selesai')">Selesai</button>
    </div>
</div>

<div class="card-order card-item batal">
    <div style="display:flex; justify-content:space-between;">
        <b onclick="openModal(detail_5)" style="cursor:pointer; color:#0050ff;">2025-0044</b>
        <span class="status-pill pill-batal">Dibatalkan</span>
    </div>
    <p style="font-weight:bold;">Nasi Box Komplit</p>
    <p>Dina Purnama<br><span style="opacity:0.7;">0831-7788-2211</span></p>
</div>

<!-- MODAL DETAIL -->
<div id="detailModal" class="modal-overlay">
    <div class="modal-box">
        <h3 style="font-size:20px; font-weight:bold; margin-bottom:15px;">Detail Pesanan</h3>
        <div id="modalContent"></div>
        <button onclick="closeModal()" style="margin-top:15px; background:red; color:white; border:none; padding:8px 12px; border-radius:6px;">Tutup</button>
    </div>
</div>

<script>
// DETAIL DATA
const detail_1 = `<b>No Pesanan:</b> 2025-0015<br><b>Status:</b> <span class='status-pill pill-selesai'>Selesai</span><br><b>Menu:</b> Nasi Ayam Goreng Lalapan<br><b>Nama:</b> Ahmad Rizki<br><b>Telp:</b> 0855-1234-5678<br><b>Tanggal Pesan:</b> 10/11/2025<br><b>Tanggal Kirim:</b> 11/11/2025<br><b>Total:</b> Rp 1.000.000`;
const detail_2 = `<b>No Pesanan:</b> 2025-0021<br><b>Status:</b> <span class='status-pill pill-menunggu'>Menunggu</span><br><b>Menu:</b> Soto Ayam Special<br><b>Nama:</b> Budi Santoso<br><b>Telp:</b> 0812-3469-7850<br><b>Tanggal Pesan:</b> 13/11/2025<br><b>Total:</b> Rp 700.000`;
const detail_3 = `<b>No Pesanan:</b> 2025-0032<br><b>Status:</b> <span class='status-pill pill-diproses'>Diproses</span><br><b>Menu:</b> Sate Ayam Madura<br><b>Nama:</b> Siti Nurhaliza<br><b>Telp:</b> 0856-7890-1234<br><b>Total:</b> Rp 750.000`;
const detail_4 = `<b>No Pesanan:</b> 2025-0040<br><b>Status:</b> <span class='status-pill pill-dikirim'>Dalam Perjalanan</span><br><b>Menu:</b> Bakso Super<br><b>Nama:</b> Rico Hidayat<br><b>Telp:</b> 0821-2233-5522<br><b>Total:</b> Rp 900.000`;
const detail_5 = `<b>No Pesanan:</b> 2025-0044<br><b>Status:</b> <span class='status-pill pill-batal'>Dibatalkan</span><br><b>Menu:</b> Nasi Box Komplit<br><b>Nama:</b> Dina Purnama<br><b>Telp:</b> 0831-7788-2211<br><b>Total:</b> Rp 600.000`;

// MODAL
function openModal(data){
    document.getElementById("modalContent").innerHTML = data;
    document.getElementById("detailModal").style.display="flex";
}
function closeModal(){
    document.getElementById("detailModal").style.display="none";
}

// FILTER
const filterButtons=document.querySelectorAll(".filter-btn");
const items=document.querySelectorAll(".card-item");

filterButtons.forEach(btn=>{
    btn.addEventListener("click", ()=>{
        filterButtons.forEach(b=>b.classList.remove("active"));
        btn.classList.add("active");
        let filter=btn.getAttribute("data-filter");

        items.forEach(card=>{
            card.style.display = (filter==="all" || card.classList.contains(filter)) ? "block":"none";
        });
    });
});

// UPDATE STATUS
function updateStatus(button,newStatus){
    const card=button.closest(".card-item");
    const oldStatus=[...card.classList].find(c=>["menunggu","diproses","dikirim","selesai","batal"].includes(c));

    card.classList.remove("menunggu","diproses","dikirim","selesai","batal");
    card.classList.add(newStatus);

    const statusMap={
        menunggu:"Menunggu|pill-menunggu",
        diproses:"Diproses|pill-diproses",
        dikirim:"Dalam Perjalanan|pill-dikirim",
        selesai:"Selesai|pill-selesai",
        batal:"Dibatalkan|pill-batal"
    };

    let [txt,cls]=statusMap[newStatus].split("|");
    card.querySelector(".status-pill").innerText=txt;
    card.querySelector(".status-pill").className="status-pill "+cls;

    button.parentElement.querySelectorAll(".update-btn").forEach(b=>b.style.display="none");

    updateStats(oldStatus,newStatus);
}

function updateStats(oldS,newS){
    document.querySelector(`.${oldS}-count`).innerText =
        parseInt(document.querySelector(`.${oldS}-count`).innerText)-1;

    document.querySelector(`.${newS}-count`).innerText =
        parseInt(document.querySelector(`.${newS}-count`).innerText)+1;
}
</script>

@endsection
