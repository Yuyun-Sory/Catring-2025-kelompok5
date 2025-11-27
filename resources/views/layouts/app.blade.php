<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Teras')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f7f7f7;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            height: 100vh;
            background: linear-gradient(#7adf8c, #4d8f5c);
            color: white;
            padding-top: 30px;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 9999;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 12px 20px;
            margin: 5px 0;
            border-radius: 6px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li.active {
            background: rgba(255,255,255,0.3);
        }

        /* Topbar */
        .topbar {
            height: 60px;
            background: #7beb8b;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 20px;
            font-weight: bold;

            position: fixed;
            top: 0;
            left: 220px;
            width: calc(100% - 220px);
            z-index: 500;
        }

        /* Content */
        .content {
            margin-left: 220px;
            padding: 100px 25px 25px 25px;
            width: calc(100% - 220px);
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
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

            <li class="{{ request()->routeIs('logout') ? 'active' : '' }}">
                <a href="{{ route('logout') }}">⏻ Logout</a>
            </li>

        </ul>
    </div>

    <!-- TOPBAR -->
    <div class="topbar">
        👤 Admin
    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
