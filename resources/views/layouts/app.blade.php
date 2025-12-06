<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Menggunakan yield untuk Judul Halaman spesifik --}}
    <title>@yield('title', 'Teras Dashboard')</title>

    {{-- Bootstrap CSS (Dari App 1) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- jQuery (Dari App 1, Penting untuk Interaksi Dinamis) --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

    <style>
        body {
            margin: 0;
            /* Menggunakan background dari App 1 dan font dari App 2 */
            background: #f7f7f7; 
            font-family: "Georgia", serif;
            display: flex; /* Memungkinkan Sidebar dan Konten berdampingan */
        }

        /* ---------------------------------------------------------------------- */
        /* SIDEBAR (Menggunakan struktur dan warna App 2) */
        /* ---------------------------------------------------------------------- */
        .sidebar {
            width: 230px; /* Lebar dari App 2 */
            height: 100vh;
            background: linear-gradient(#9af7a6, #5da770);
            position: fixed;
            left: 0;
            top: 0;
            color: black; /* Warna Teks dari App 2 */
            padding-top: 20px;
            z-index: 9999;
        }

        .logo {
            text-align: center;
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 25px;
            color: black;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            padding: 12px 20px;
            margin: 5px 10px; /* Tambahkan margin horizontal agar active class ada jarak */
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 17px;
            cursor: pointer;
        }

        .sidebar a {
            text-decoration: none;
            color: black;
            display: flex;
            width: 100%;
            align-items: center;
            gap: 12px;
        }

        .sidebar li:hover,
        .sidebar li.active {
            background-color: rgba(255,255,255,0.35);
            border-radius: 8px;
        }

        /* ---------------------------------------------------------------------- */
        /* TOPBAR (Menggunakan posisi fixed App 1, lebar konten App 1, dan style App 2) */
        /* ---------------------------------------------------------------------- */
        .topbar {
            height: 65px; /* Tinggi dari App 2 */
            background: #7aef8d; /* Warna dari App 2 */
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 25px;
            font-size: 17px;
            font-weight: bold;
            
            position: fixed;
            top: 0;
            left: 230px; /* Sesuaikan dengan lebar sidebar App 2 (230px) */
            width: calc(100% - 230px);
            z-index: 500;
        }

        /* ---------------------------------------------------------------------- */
        /* CONTENT (Menggunakan margin dan padding yang disesuaikan) */
        /* ---------------------------------------------------------------------- */
        .content {
            margin-left: 230px; /* Sesuaikan dengan lebar sidebar (230px) */
            /* Padding disesuaikan agar tidak tertutup Topbar */
            padding: 95px 35px 35px 35px; 
            width: calc(100% - 230px);
        }

        /* ---------------------------------------------------------------------- */
        /* UTILITY CSS (Dari App 2 untuk konsistensi child view) */
        /* ---------------------------------------------------------------------- */
        .title-box {
            background: white;
            border: 1px solid #ccc;
            padding: 18px 20px;
            border-radius: 6px;
            font-size: 34px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px; /* Tambahkan jarak */
        }

        .breadcrumb {
            font-size: 14px;
            color: #333;
        }

        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            padding: 20px 25px;
            font-size: 16px;
            color: white;
            border-radius: 8px;
            font-weight: bold;
            width: 180px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .blue { background: #0066ff; }
        .green { background: #65f28f; color: black; }
        .orange { background: #ff8c29; }
        .orange2 { background: #e67d45; }

        .card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo">T</div>

        <ul>
            {{-- Logika active class dari App 2 --}}
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
            </li>

            <li class="{{ request()->routeIs('pemesanan.masuk') ? 'active' : '' }}">
                <a href="{{ route('pemesanan.masuk') }}">📥 Pemesanan Masuk</a>
            </li>

            <li class="{{ request()->routeIs('status.pesanan') ? 'active' : '' }}">
                <a href="{{ route('status.pesanan') }}">📊 Status Pesanan</a>
            </li>

            <li class="{{ request()->routeIs('stok.bahan') ? 'active' : '' }}">
                <a href="{{ route('stok.bahan') }}">📦 Stok Bahan</a>
            </li>

            <li class="{{ request()->routeIs('jadwal.produksi') ? 'active' : '' }}">
                <a href="{{ route('jadwal.produksi') }}">📅 Jadwal Produksi</a>
            </li>

            <li class="{{ request()->routeIs('laporan') ? 'active' : '' }}">
                <a href="{{ route('laporan') }}">📄 Laporan</a>
            </li>

            <li class="{{ request()->routeIs('teras.chat') ? 'active' : '' }}">
                <a href="{{ route('teras.chat') }}">💬 TerasChat</a>
            </li>

            <li class="{{ request()->routeIs('logout') ? 'active' : '' }}">
                <a href="{{ route('logout') }}">⏻ Logout</a>
            </li>
        </ul>
    </div>

    <div class="topbar">
        👤 Admin
    </div>

    <div class="content">
        @yield('content')
    </div>

    {{-- Bootstrap JS (Dari App 1) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Stack Scripts (Dari App 1, Penting untuk Child View) --}}
    @stack('scripts') 

</body>
</html>