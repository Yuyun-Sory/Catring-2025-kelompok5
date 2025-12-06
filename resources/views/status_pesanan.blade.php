@extends('layouts.app')

@section('title', 'Status Pesanan')

@section('content')

<style>
/* MODAL */
.modal-overlay {
    position: fixed; top:0; left:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.5);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:9999;
}
.modal-box {
    background:white;
    width:90%; max-width:600px;
    border-radius:12px;
    padding:20px;
    box-shadow:0 0 15px rgba(0,0,0,0.35);
}

/* STATISTIK */
.stat-box {
    background:#f5f5f5;
    padding:12px 18px;
    border-radius:8px;
    font-weight:bold;
    border:1px solid #0066ff;
}
.stat-number {
    display:block;
    font-size:22px;
    color:#0050ff;
    text-align:center;
}

/* BADGE & CARD */
.badge-blue { background:#0050ff; color:white; padding:6px 14px; border-radius:10px; display:flex; gap:6px;}
.badge-gray, .badge-green {
    padding:8px 18px; border-radius:20px; border:none; cursor:pointer; font-weight:bold;
}
.badge-gray{background:#e9e9e9;}
.badge-green{background:#7beb8b;}

.card-order {
    background:white;
    padding:18px;
    border:1px solid #cfcfcf;
    border-radius:10px;
    margin-bottom:18px;
}

.status-pill {padding:4px 10px; border-radius:12px; color:white; font-size:12px;}
.pill-selesai{background:#3FBF3F;}
.pill-menunggu{background:#757575;}
.pill-diproses{background:#1976ff;}
.pill-dikirim{background:#df9d00;}
.pill-batal{background:#d83131;}

.update-btn {padding:6px 12px; border:none; border-radius:6px; cursor:pointer;}
.btn-proses{background:#7beb8b;}
.btn-kirim{background:#82C0FF;}
.btn-batalkan{background:#ff6f6f;}

.filter-btn.active {background:#0050ff !important; color:white;}
</style>


<h1 style="font-size:32px; font-weight:bold; margin-bottom:10px;">Status Pesanan</h1>

{{-- STATISTICS --}}
<div id="statsBar" style="display:flex; gap:15px; margin-top:15px; flex-wrap:wrap;">
    <div class="stat-box">Total Pesanan <span class="stat-number total-count">5</span></div>
    <div class="stat-box">Menunggu <span class="stat-number menunggu-count">1</span></div>
    <div class="stat-box">Diproses <span class="stat-number diproses-count">1</span></div>
    <div class="stat-box">Dalam Perjalanan <span class="stat-number dikirim-count">1</span></div>
    <div class="stat-box">Selesai <span class="stat-number selesai-count">1</span></div>
    <div class="stat-box">Dibatalkan <span class="stat-number batal-count">1</span></div>
</div>

<!-- FILTER BUTTON -->
<div style="margin-top:20px; display:flex; gap:10px; flex-wrap:wrap;">
    <button class="filter-btn active" data-filter="all">Semua</button>
    <button class="filter-btn" data-filter="menunggu">Menunggu</button>
    <button class="filter-btn" data-filter="diproses">Diproses</button>
    <button class="filter-btn" data-filter="dikirim">Dalam Perjalanan</button>
    <button class="filter-btn" data-filter="selesai">Selesai</button>
    <button class="filter-btn" data-filter="batal">Dibatalkan</button>
</div>

<!-- SEARCH BAR -->
<input type="text" placeholder="🔍 Cari Pesanan (No Pesanan, Nama/Menu...)"
    style="width:100%; padding:12px; border-radius:10px; border:1px solid #ccc; margin:20px 0;">


{{-- ================= CARD LIST ================= --}}

<!-- SELESAI -->
<div class="card-order card-item selesai">
    <div style="display:flex; justify-content:space-between;">
        <b onclick="openModal(detail_1)" style="color:#0050ff; cursor:pointer;">2025-0015</b>
        <span class="status-pill pill-selesai">Selesai</span>
    </div>

    <p style="font-weight:bold;">Nasi Ayam Goreng Lalapan</p>
    <p>Ahmad Rizki<br><span style="opacity:0.7;">0855-1234-5678</span></p>
</div>

<!-- MENUNGGU -->
<div class="card-order card-item menunggu">
    <div style="display:flex; justify-content:space-between;">
        <b onclick="openModal(detail_2)" style="cursor:pointer; color:#0050ff;">2025-0021</b>
        <span class="status-pill pill-menunggu">Menunggu</span>
    </div>

    <p style="font-weight:bold;">Soto Ayam Special</p>
    <p>Budi Santoso<br><span style="opacity:0.7;">0812-3469-7850</span></p>

    <div style="margin-top:12px; display:flex; gap:10px;">
        <button class="update-btn btn-proses" onclick="updateStatus(this,'diproses')">Proses</button>
        <button class="update-btn btn-batalkan" onclick="updateStatus(this,'batal')">Batalkan</button>
    </div>
</div>

<!-- DIPROSES -->
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

<!-- DIKIRIM -->
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

<!-- BATAL -->
<div class="card-order card-item batal">
    <div style="display:flex; justify-content:space-between;">
        <b onclick="openModal(detail_5)" style="cursor:pointer; color:#0050ff;">2025-0044</b>
        <span class="status-pill pill-batal">Dibatalkan</span>
    </div>

    <p style="font-weight:bold;">Nasi Box Komplit</p>
    <p>Dina Purnama<br><span style="opacity:0.7;">0831-7788-2211</span></p>
</div>


{{-- ========== MODAL DETAIL ========= --}}
<div id="detailModal" class="modal-overlay">
    <div class="modal-box">
        <h3 style="font-size:20px; font-weight:bold; margin-bottom:15px;">Detail Pesanan</h3>
        <div id="modalContent"></div>
        <button onclick="closeModal()" style="margin-top:15px; background:red; color:white; border:none; padding:8px 12px; border-radius:6px;">Tutup</button>
    </div>
</div>

<script>
// DETAIL DATA (SEBAGAI CONTOH)
const detail_1 = `
<b>No Pesanan:</b> 2025-0015<br>
<b>Status:</b> <span class='status-pill pill-selesai'>Selesai</span><br>
<b>Menu:</b> Nasi Ayam Goreng Lalapan<br>
<b>Nama:</b> Ahmad Rizki<br>
<b>Telp:</b> 0855-1234-5678<br>
<b>Tanggal Pesan:</b> 10/11/2025<br>
<b>Tanggal Kirim:</b> 11/11/2025<br>
<b>Total:</b> Rp 1.000.000
`;

const detail_2 = `
<b>No Pesanan:</b> 2025-0021<br>
<b>Status:</b> <span class='status-pill pill-menunggu'>Menunggu</span><br>
<b>Menu:</b> Soto Ayam Special<br>
<b>Nama:</b> Budi Santoso<br>
<b>Telp:</b> 0812-3469-7850<br>
<b>Tanggal Pesan:</b> 13/11/2025<br>
<b>Total:</b> Rp 700.000
`;

const detail_3 = `
<b>No Pesanan:</b> 2025-0032<br>
<b>Status:</b> <span class='status-pill pill-diproses'>Diproses</span><br>
<b>Menu:</b> Sate Ayam Madura<br>
<b>Nama:</b> Siti Nurhaliza<br>
<b>Telp:</b> 0856-7890-1234<br>
<b>Total:</b> Rp 750.000
`;

const detail_4 = `
<b>No Pesanan:</b> 2025-0040<br>
<b>Status:</b> <span class='status-pill pill-dikirim'>Dalam Perjalanan</span><br>
<b>Menu:</b> Bakso Super<br>
<b>Nama:</b> Rico Hidayat<br>
<b>Telp:</b> 0821-2233-5522<br>
<b>Total:</b> Rp 900.000
`;

const detail_5 = `
<b>No Pesanan:</b> 2025-0044<br>
<b>Status:</b> <span class='status-pill pill-batal'>Dibatalkan</span><br>
<b>Menu:</b> Nasi Box Komplit<br>
<b>Nama:</b> Dina Purnama<br>
<b>Telp:</b> 0831-7788-2211<br>
<b>Total:</b> Rp 600.000
`;

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

// REALTIME UPDATE STATUS
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
