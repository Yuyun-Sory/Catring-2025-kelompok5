<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Teras Dashboard Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    <!-- SIDEBAR -->
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

    <!-- TOPBAR -->
    <div class="topbar">
        <a href="{{ route('admin.akun') }}" style="text-decoration: none; color: #000; font-weight: bold;">👤 Admin</a>
    </div>

    <!-- CONTENT -->
    <div class="content-wrapper p-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
