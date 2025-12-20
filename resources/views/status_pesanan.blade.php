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