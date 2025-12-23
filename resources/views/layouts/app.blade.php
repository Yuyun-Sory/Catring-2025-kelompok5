<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Teras Dashboard Admin')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f6fa;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            height: 100vh;
            background: linear-gradient(180deg, #7CFF9B, #63D471);
            padding-top: 15px;
            box-shadow: 2px 0 8px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #0f5132;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            color: #0f5132;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .sidebar ul li a:hover {
            background: rgba(255,255,255,0.6);
        }

        .sidebar ul li.active a {
            background: #ffffff;
            font-weight: 600;
            border-left: 4px solid #2f8f46;
        }

        .sidebar ul li:last-child {
            margin-top: 20px;
        }

        /* ===== TOPBAR ===== */
        .topbar {
            position: fixed;
            top: 0;
            left: 220px;
            right: 0;
            height: 60px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            z-index: 10;
        }

        .topbar a {
            text-decoration: none;
            color: #000;
            font-weight: 600;
        }

        /* ===== CONTENT ===== */
        .content-wrapper {
            margin-left: 220px;
            margin-top: 60px;
            padding: 25px;
        }
    </style>

    @stack('styles')
</head>
<body>
<<<<<<< HEAD
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">T</div>
        <ul>
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
            </li>
            <li class="{{ request()->routeIs('menu') ? 'active' : '' }}">
                <a href="{{ route('menu') }}">🍔 Menu</a>
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
            <li class="{{ request()->routeIs('libur.*') ? 'active' : '' }}">
                <a href="{{ route('libur.index') }}">💬 TerasChat</a>
            </li>
=======
>>>>>>> 2154e4b68bba9b697e3b2dc0bd83434d3cd78766

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="logo">T</div>
    <ul>
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
        </li>
        <li class="{{ request()->routeIs('menu') ? 'active' : '' }}">
            <a href="{{ route('menu') }}">🍔 Menu</a>
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
        <li class="{{ request()->routeIs('libur.*') ? 'active' : '' }}">
            <a href="{{ route('libur.index') }}">💬 TerasChat</a>
        </li>
        <li>
            <a href="{{ route('logout') }}">⏻ Logout</a>
        </li>
    </ul>
</div>

<!-- TOPBAR -->
<div class="topbar">
    <a href="{{ route('admin.akun') }}">👤 Admin</a>
</div>

<!-- CONTENT -->
<div class="content-wrapper">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
