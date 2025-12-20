<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Produksi - Jadwal Semua</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .active-menu { background-color: #94e9a9 !important; font-weight: bold; }
        .tab-active { background-color: #94e9a9 !important; border: 1px solid #4ade80; font-weight: bold; }
        .tab-inactive { background-color: #d1d5db !important; color: #4b5563; }
        .modal-overlay { background-color: rgba(0, 0, 0, 0.5); z-index: 50; }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-[#58a46c] text-black flex flex-col p-4 space-y-4 shadow-xl">
            <div class="flex justify-center mb-6 text-4xl font-bold">T</div>
            <nav class="space-y-2">
                <button class="w-full flex items-center p-2 hover:bg-green-600 rounded text-left"><i class="fas fa-home mr-3 w-5"></i> Dashboard</button>
                <button class="w-full flex items-center p-2 hover:bg-green-600 rounded text-left"><i class="fas fa-box-open mr-3 w-5"></i> Pemesanan Masuk</button>
                <button class="w-full flex items-center p-2 hover:bg-green-600 rounded text-left"><i class="fas fa-chart-bar mr-3 w-5"></i> Status Pesanan</button>
                <button class="w-full flex items-center p-2 hover:bg-green-600 rounded text-left"><i class="fas fa-archive mr-3 w-5"></i> Stok Bahan</button>
                <button class="w-full flex items-center p-2 rounded text-left active-menu shadow-md"><i class="fas fa-calendar-alt mr-3 w-5"></i> Jadwal Produksi</button>
                <button class="w-full flex items-center p-2 hover:bg-green-600 rounded text-left"><i class="fas fa-file-alt mr-3 w-5"></i> Laporan</button>
                <button class="w-full flex items-center p-2 hover:bg-green-600 rounded text-left"><i class="fas fa-robot mr-3 w-5"></i> TerasChat</button>
                <button class="w-full flex items-center p-2 hover:bg-green-600 rounded mt-10 text-left"><i class="fas fa-power-off mr-3 w-5"></i> Logout</button>
            </nav>
        </aside>

        <main class="flex-1 flex flex-col">
            <header class="bg-[#94e9a9] p-6 flex justify-between items-center shadow-sm">
                <h1 class="text-4xl font-serif font-bold">Jadwal Produksi</h1>
                <button onclick="toggleModal(true)" class="bg-[#c2f3cc] border border-black px-4 py-2 rounded-lg font-bold text-sm hover:bg-green-200 transition">
                    + Tambah Jadwal
                </button>
            </header>

            <div class="p-8 space-y-8">
                <div class="bg-white border border-gray-400 p-8 rounded shadow-sm max-w-3xl mx-auto text-center">
                    <div class="flex justify-center items-center space-x-12 mb-8 font-bold text-xl">
                        <i class="fas fa-arrow-left cursor-pointer"></i> 
                        <span>November</span> 
                        <i class="fas fa-arrow-right cursor-pointer"></i>
                    </div>
                    <div class="flex justify-center space-x-4">
                        <button onclick="filterJadwal('semua')" id="btn-semua" class="px-8 py-2 tab-active rounded shadow">Semua</button>
                        <button onclick="filterJadwal('menunggu')" id="btn-menunggu" class="px-8 py-2 tab-inactive rounded shadow">Menunggu</button>
                        <button onclick="filterJadwal('proses')" id="btn-proses" class="px-8 py-2 tab-inactive rounded shadow">Dalam Proses</button>
                        <button onclick="filterJadwal('selesai')" id="btn-selesai" class="px-8 py-2 tab-inactive rounded shadow">Selesai</button>
                    </div>
                </div>

                <div class="grid grid-cols-5 gap-4">
                    <div class="bg-blue-600 text-white p-4 rounded-lg shadow"><p class="text-xs font-bold">Total Jadwal</p><p class="text-2xl font-bold">5</p></div>
                    <div class="bg-blue-500 text-white p-4 rounded-lg shadow opacity-90"><p class="text-xs font-bold">Semua</p><p class="text-2xl font-bold">2</p></div>
                    <div class="bg-blue-500 text-white p-4 rounded-lg shadow opacity-90"><p class="text-xs font-bold">Menunggu</p><p class="text-2xl font-bold">1</p></div>
                    <div class="bg-blue-500 text-white p-4 rounded-lg shadow opacity-90"><p class="text-xs font-bold">Proses</p><p class="text-2xl font-bold">1</p></div>
                    <div class="bg-blue-500 text-white p-4 rounded-lg shadow opacity-90"><p class="text-xs font-bold">Selesai</p><p class="text-2xl font-bold">1</p></div>
                </div>

                <div class="bg-white border border-gray-400 p-6 rounded shadow-sm">
                    <div class="grid grid-cols-2 font-bold border-b-2 border-gray-100 pb-3 mb-4 px-4">
                        <span>Menu Dipesan</span> 
                        <span class="text-right pr-10">Status</span>
                    </div>
                    <div id="jadwal-list" class="space-y-4 px-4 text-lg">
                        </div>
                </div>
            </div>
        </main>
    </div>

    <div id="modal-jadwal" class="fixed inset-0 modal-overlay hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-2xl w-full max-w-2xl overflow-hidden border border-gray-300">
            <div class="p-8 space-y-5">
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-bold mb-1">Menu *</label><input type="text" placeholder="Nama menu" class="w-full border border-gray-400 p-3 rounded"></div>
                    <div><label class="block text-sm font-bold mb-1">Jumlah Porsi *</label><input type="number" value="0" class="w-full border border-gray-400 p-3 rounded font-bold"></div>
                </div>
                <p class="font-bold text-sm text-gray-700">Informasi Pesanan</p>
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-xs text-gray-500">No. Pesanan</label><input type="text" placeholder="ORD-XXXX" class="w-full border border-gray-400 p-3 rounded text-sm"></div>
                    <div><label class="block text-xs text-gray-500">Nama Customer</label><input type="text" placeholder="Nama Pemesan" class="w-full border border-gray-400 p-3 rounded text-sm"></div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-bold mb-1">Tim Produksi</label><input type="text" value="Tim A" class="w-full border border-gray-400 p-3 rounded"></div>
                    <div><label class="block text-sm font-bold mb-1">Penanggung Jawab</label><select class="w-full border border-gray-400 p-3 rounded bg-white"><option>Pilih Chef</option></select></div>
                </div>
                <div><label class="block text-sm font-bold mb-1">Status</label><input type="text" value="Panding" class="w-full border border-gray-400 p-3 rounded"></div>
                <div><label class="block text-sm font-bold mb-1">Catatan</label><textarea placeholder="Catatan Khusus untuk produksi" class="w-full border border-gray-400 p-3 rounded h-24"></textarea></div>
                <div class="flex space-x-6 pt-4">
                    <button class="flex-1 bg-[#94e9a9] py-3 rounded font-bold border border-green-600 hover:bg-green-400 transition">Simpan</button>
                    <button onclick="toggleModal(false)" class="flex-1 bg-white border border-gray-400 py-3 rounded font-bold hover:bg-gray-100 transition">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data Jadwal Berdasarkan Filter
        const dataJadwal = {
            semua: [
                { menu: "Sayur Sop", status: "Semua" },
                { menu: "Sate Ayam", status: "Semua" }
            ],
            menunggu: [
                { menu: "Nasi Ayam Goreng", status: "Menunggu" }
            ],
            proses: [
                { menu: "Nasi Pecel", status: "Proses" }
            ],
            selesai: [
                { menu: "Soto Ayam", status: "Selesai" }
            ]
        };

        function filterJadwal(filter) {
            const listContainer = document.getElementById('jadwal-list');
            const buttons = ['btn-semua', 'btn-menunggu', 'btn-proses', 'btn-selesai'];
            
            // Reset Button Styles
            buttons.forEach(btnId => {
                const btn = document.getElementById(btnId);
                btn.className = (btnId === 'btn-' + filter) ? 'px-8 py-2 tab-active rounded shadow' : 'px-8 py-2 tab-inactive rounded shadow';
            });

            // Update List Content
            const items = dataJadwal[filter];
            listContainer.innerHTML = items.map(item => `
                <div class="grid grid-cols-2 items-center py-1">
                    <span>${item.menu}</span> 
                    <span class="text-right pr-10">${item.status}</span>
                </div>
            `).join('');
        }

        function toggleModal(show) {
            const modal = document.getElementById('modal-jadwal');
            modal.classList.toggle('hidden', !show);
        }

        // Jalankan filter 'semua' sebagai tampilan default
        window.onload = () => filterJadwal('semua');
    </script>
</body>
</html>