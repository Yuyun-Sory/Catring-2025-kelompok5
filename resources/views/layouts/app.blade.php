<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title', 'Teras Dashboard Admin')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

    <style>
        /* ====================================================================== */
        /* GLOBAL & LAYOUT CSS */
        /* ====================================================================== */
        body {
            margin: 0;
            background: #f7f7f7; 
            font-family: "Georgia", serif;
            display: flex; 
        }

        /* SIDEBAR */
        .sidebar {
            width: 230px; 
            height: 100vh;
            background: linear-gradient(#9af7a6, #5da770);
            position: fixed;
            left: 0;
            top: 0;
            color: black; 
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
            margin: 5px 10px;
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

        /* TOPBAR */
        .topbar {
            height: 65px; 
            background: #7aef8d; 
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 25px;
            font-size: 17px;
            font-weight: bold;
            
            position: fixed;
            top: 0;
            left: 230px;
            width: calc(100% - 230px);
            z-index: 500;
        }

        /* CONTENT WRAPPER */
        .content-wrapper {
            margin-left: 230px;
            padding: 95px 35px 35px 35px; 
            width: calc(100% - 230px);
        }

        /* UTILITY CSS - Umum untuk Semua Halaman */
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
            margin-bottom: 25px; 
        }

        .breadcrumb {
            font-size: 14px;
            color: #333;
        }
    </style>
    @stack('styles') {{-- Tempat CSS Dashboard akan di-push --}}
</head>
<body>

    <div class="sidebar">
        <div class="logo">T</div>
        <ul>
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
            <li>
                <a href="{{ route('logout') }}">⏻ Logout</a>
            </li>
        </ul>
    </div>

    <div class="topbar">👤 Admin</div>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts') 

</body>
</html>