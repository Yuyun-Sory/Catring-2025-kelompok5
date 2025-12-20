<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Status Pesanan Lengkap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .tab-active { background-color: #94e9a9 !important; border: 1px solid #4ade80; font-weight: bold; }
        .tab-inactive { background-color: #d1d5db !important; color: #4b5563; }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-[#58a46c] text-black flex flex-col p-4 space-y-4">
            <div class="flex justify-center mb-6 text-4xl font-bold">T</div>
            <nav class="space-y-2">
                <a href="#" class="flex items-center p-2 hover:bg-green-600 rounded"><i class="fas fa-home mr-3 w-5"></i> Dashboard</a>
                <a href="#" class="flex items-center p-2 hover:bg-green-600 rounded"><i class="fas fa-box-open mr-3 w-5"></i> Pemesanan Masuk</a>
                <a href="#" class="flex items-center p-2 bg-[#94e9a9] rounded font-bold"><i class="fas fa-chart-bar mr-3 w-5"></i> Status Pesanan</a>
                <a href="#" class="flex items-center p-2 hover:bg-green-600 rounded"><i class="fas fa-archive mr-3 w-5"></i> Stok Bahan</a>
                <a href="#" class="flex items-center p-2 hover:bg-green-600 rounded"><i class="fas fa-calendar-alt mr-3 w-5"></i> Jadwal Produksi</a>
                <a href="#" class="flex items-center p-2 hover:bg-green-600 rounded"><i class="fas fa-file-alt mr-3 w-5"></i> Laporan</a>
                <a href="#" class="flex items-center p-2 hover:bg-green-600 rounded"><i class="fas fa-robot mr-3 w-5"></i> TerasChat</a>
                <a href="#" class="flex items-center p-2 hover:bg-green-600 rounded mt-10"><i class="fas fa-power-off mr-3 w-5"></i> Logout</a>
            </nav>
        </aside>

        <main class="flex-1">
            <header class="bg-[#94e9a9] p-6">
                <h1 class="text-3xl font-serif font-bold text-gray-800">Satatus Pesanan</h1>
            </header>

            <div class="p-8 space-y-6">
                <div class="grid grid-cols-5 gap-4">
                    <div class="bg-blue-600 text-white p-4 rounded-lg flex justify-between items-center shadow">
                        <span class="text-sm"><i class="far fa-clock mr-2"></i> Menunggu</span> <span class="text-2xl font-bold">1</span>
                    </div>
                    <div class="bg-blue-600 text-white p-4 rounded-lg flex justify-between items-center opacity-90">
                        <span class="text-sm">Diproses</span> <span class="text-2xl font-bold">1</span>
                    </div>
                    <div class="bg-blue-600 text-white p-4 rounded-lg flex justify-between items-center opacity-90">
                        <span class="text-sm">Dikirim</span> <span class="text-2xl font-bold">1</span>
                    </div>
                    <div class="bg-blue-600 text-white p-4 rounded-lg flex justify-between items-center opacity-90">
                        <span class="text-sm"><i class="fas fa-check-circle mr-2"></i> Selesai</span> <span class="text-2xl font-bold">1</span>
                    </div>
                    <div class="bg-blue-600 text-white p-4 rounded-lg flex justify-between items-center opacity-90">
                        <span class="text-sm">Dibatalkan</span> <span class="text-2xl font-bold">1</span>
                    </div>
                </div>

                <div class="flex space-x-2">
                    <button class="px-4 py-2 tab-inactive rounded shadow text-sm">Semua</button>
                    <button id="btn-menunggu" onclick="switchTab('menunggu')" class="px-4 py-2 tab-active rounded shadow text-sm">Menunggu</button>
                    <button id="btn-diproses" onclick="switchTab('diproses')" class="px-4 py-2 tab-inactive rounded shadow text-sm">Diproses</button>
                    <button id="btn-perjalanan" onclick="switchTab('perjalanan')" class="px-4 py-2 tab-inactive rounded shadow text-sm">Dalam Perjalan</button>
                    <button id="btn-selesai" onclick="switchTab('selesai')" class="px-4 py-2 tab-inactive rounded shadow text-sm">Selesai</button>
                    <button id="btn-dibatalkan" onclick="switchTab('dibatalkan')" class="px-4 py-2 tab-inactive rounded shadow text-sm">Dibatalkan</button>
                </div>

                <div class="relative max-w-2xl">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3"><i class="fas fa-search text-gray-400"></i></span>
                    <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-400 rounded-md bg-[#e5e7eb]" placeholder="Cari Pesanan (No. Pesanan, Nama, Menu)...">
                </div>

                <div id="content-container">
                    
                    <div id="view-menunggu" class="bg-white border border-gray-400 rounded-sm max-w-2xl shadow-sm">
                        <div class="p-4 border-b border-gray-200">
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="fas fa-archive"></i> <span class="font-bold">2025-002</span>
                                <span class="bg-[#94e9a9] text-xs px-2 py-1 rounded flex items-center font-bold">Menunggu</span>
                            </div>
                            <h2 class="text-xl font-bold ml-6">Soto Ayam</h2>
                        </div>
                        <div class="p-4 grid grid-cols-2 gap-y-4 text-sm">
                            <div class="flex items-center"><i class="fas fa-user mr-2"></i> Budi Santoso</div>
                            <div class="flex items-center"><i class="fas fa-phone mr-2"></i> 0812-3456-7890</div>
                            <div><p class="text-gray-500 text-xs">Tanggal Pesan</p><p>10/11/2025</p></div>
                            <div><p class="text-gray-500 text-xs">Tanggal Pengantaran</p><p>20/11/2025</p></div>
                            <div class="text-center"><p class="text-gray-500 text-xs">Jumlah</p><p class="font-bold">60 Orang</p></div>
                            <div class="text-center"><p class="text-gray-500 text-xs">Total</p><p class="font-bold">720.000</p></div>
                        </div>
                        <div class="p-3 border-t border-gray-400 flex items-center space-x-4">
                            <span class="text-sm">Update Status :</span>
                            <button class="bg-[#c2f3cc] px-6 py-1 rounded text-sm border border-gray-400">Proses</button>
                            <button class="bg-red-600 text-white px-6 py-1 rounded text-sm">Batalkan</button>
                        </div>
                    </div>

                    <div id="view-diproses" class="hidden bg-white border border-gray-400 rounded-sm max-w-2xl shadow-sm">
                        <div class="p-4 border-b border-gray-200">
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="fas fa-archive"></i> <span class="font-bold">2025-002</span>
                                <span class="bg-[#94e9a9] text-xs px-2 py-1 rounded flex items-center font-bold"><i class="fas fa-hat-chef mr-1"></i> Diproses</span>
                            </div>
                            <h2 class="text-xl font-bold ml-6">Soto Ayam</h2>
                        </div>
                        <div class="p-4 grid grid-cols-2 gap-y-4 text-sm">
                            <div class="flex items-center"><i class="fas fa-user mr-2"></i> Siti Nurhaliza</div>
                            <div class="flex items-center"><i class="fas fa-phone mr-2"></i> 0856-7890-1234</div>
                            <div><p class="text-gray-500 text-xs">Tanggal Pesan</p><p>15/11/2025</p></div>
                            <div><p class="text-gray-500 text-xs">Tanggal Pengantaran</p><p>18/11/2025</p></div>
                            <div class="text-center"><p class="text-gray-500 text-xs">Jumlah</p><p class="font-bold">50 Orang</p></div>
                            <div class="text-center"><p class="text-gray-500 text-xs">Total</p><p class="font-bold">750.000</p></div>
                        </div>
                        <div class="p-3 border-t border-gray-400 flex items-center space-x-4">
                            <span class="text-sm">Update Status :</span>
                            <button class="bg-[#c2f3cc] px-6 py-1 rounded text-sm border border-gray-400">Kirim</button>
                            <button class="bg-red-600 text-white px-6 py-1 rounded text-sm">Batalkan</button>
                        </div>
                    </div>

                    <div id="view-perjalanan" class="hidden bg-white border border-gray-400 rounded-sm max-w-2xl shadow-sm">
                        <div class="p-4 border-b border-gray-200">
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="fas fa-archive"></i> <span class="font-bold">2025-002</span>
                                <span class="bg-[#94e9a9] text-xs px-2 py-1 rounded flex items-center font-bold">Dalam Perjalanan</span>
                            </div>
                            <h2 class="text-xl font-bold ml-6">Soto Ayam</h2>
                        </div>
                        <div class="p-4 grid grid-cols-2 gap-y-4 text-sm">
                            <div class="flex items-center"><i class="fas fa-user mr-2"></i> Siti Nurhaliza</div>
                            <div class="flex items-center"><i class="fas fa-phone mr-2"></i> 0856-7890-1234</div>
                            <div><p class="text-gray-500 text-xs">Tanggal Pesan</p><p>15/11/2025</p></div>
                            <div><p class="text-gray-500 text-xs">Tanggal Pengantaran</p><p>18/11/2025</p></div>
                            <div class="text-center"><p class="text-gray-500 text-xs">Jumlah</p><p class="font-bold">50 Orang</p></div>
                            <div class="text-center"><p class="text-gray-500 text-xs">Total</p><p class="font-bold">750.000</p></div>
                        </div>
                        <div class="p-3 border-t border-gray-400 flex items-center space-x-4">
                            <span class="text-sm">Update Status :</span>
                            <button class="bg-[#c2f3cc] px-6 py-1 rounded text-sm border border-gray-400">Selesai</button>
                            <button class="bg-red-600 text-white px-6 py-1 rounded text-sm">Batalkan</button>
                        </div>
                    </div>

                    <div id="view-selesai" class="hidden bg-white border border-gray-400 rounded-sm max-w-2xl shadow-sm">
                        <div class="p-4 border-b border-gray-200">
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="fas fa-archive"></i> <span class="font-bold">2025-003</span>
                                <span class="bg-[#94e9a9] text-xs px-2 py-1 rounded flex items-center font-bold">Selesai</span>
                            </div>
                            <h2 class="text-xl font-bold ml-6">Nasi Ayam Goreng Lalapan</h2>
                        </div>
                        <div class="p-4 grid grid-cols-2 gap-y-4 text-sm">
                            <div class="flex items-center"><i class="fas fa-user mr-2"></i> Ahmad Rizki</div>
                            <div class="flex items-center"><i class="fas fa-phone mr-2"></i> 0898-1234-5678</div>
                            <div><p class="text-gray-500 text-xs">Tanggal Pesan</p><p>10/11/2025</p></div>
                            <div><p class="text-gray-500 text-xs">Tanggal Pengantaran</p><p>15/11/2025</p></div>
                            <div class="text-center"><p class="text-gray-500 text-xs">Jumlah</p><p class="font-bold">70 Orang</p></div>
                            <div class="text-center"><p class="text-gray-500 text-xs">Total</p><p class="font-bold">1.400.000</p></div>
                        </div>
                    </div>

                    <div id="view-dibatalkan" class="hidden bg-white border border-gray-400 rounded-sm max-w-2xl shadow-sm">
                        <div class="p-4 border-b border-gray-200">
                            <div class="flex items-center space-x-2 mb-2">
                                <i class="fas fa-archive"></i> <span class="font-bold">2025-002</span>
                                <span class="bg-[#94e9a9] text-xs px-2 py-1 rounded flex items-center font-bold text-black">
                                    <i class="fas fa-times mr-1"></i> Dibatalkan
                                </span>
                            </div>
                            <h2 class="text-xl font-bold ml-6">Soto Ayam</h2>
                        </div>
                        <div class="p-4 grid grid-cols-2 gap-y-4 text-sm">
                            <div class="flex items-center"><i class="fas fa-user mr-2"></i> Budi Santoso</div>
                            <div class="flex items-center"><i class="fas fa-phone mr-2"></i> 0812-3456-7890</div>
                            <div><p class="text-gray-500 text-xs">Tanggal Pesan</p><p>10/11/2025</p></div>
                            <div><p class="text-gray-500 text-xs">Tanggal Pengantaran</p><p>20/11/2025</p></div>
                            <div class="text-center"><p class="text-gray-500 text-xs">Jumlah</p><p class="font-bold">60 Orang</p></div>
                            <div class="text-center"><p class="text-gray-500 text-xs">Total</p><p class="font-bold">720.000</p></div>
                        </div>
                        </div>

                </div>
            </div>
        </main>
    </div>

    <script>
        function switchTab(tab) {
            const views = ['view-menunggu', 'view-diproses', 'view-perjalanan', 'view-selesai', 'view-dibatalkan'];
            const buttons = ['btn-menunggu', 'btn-diproses', 'btn-perjalanan', 'btn-selesai', 'btn-dibatalkan'];

            // Sembunyikan semua konten dan matikan status aktif tombol
            views.forEach(v => document.getElementById(v).classList.add('hidden'));
            buttons.forEach(b => {
                const btn = document.getElementById(b);
                btn.classList.remove('tab-active');
                btn.classList.add('tab-inactive');
            });

            // Tampilkan yang dipilih berdasarkan ID
            document.getElementById('view-' + tab).classList.remove('hidden');
            const activeBtn = document.getElementById('btn-' + tab);
            activeBtn.classList.remove('tab-inactive');
            activeBtn.classList.add('tab-active');
        }
    </script>
</body>
</html>
=======
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

