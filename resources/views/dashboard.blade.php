<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }
    .sidebar {
      width: 220px;
      height: 100vh;
      background: linear-gradient(#7adf8c, #4d8f5c);
      padding-top: 20px;
      position: fixed;
      color: white;
    }
    .sidebar .logo {
      text-align: center;
      font-size: 40px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .sidebar ul {
      list-style: none;
      padding: 0;
    }
    .sidebar ul li {
      padding: 12px 20px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .sidebar ul li:hover,
    .active {
      background-color: rgba(255,255,255,0.2);
      border-radius: 5px;
    }

    /* Agar link memenuhi li */
    .sidebar a {
      text-decoration: none;
      color: white;
      display: block;
      width: 100%;
    }

    .topbar {
      margin-left: 220px;
      height: 60px;
      background: #7beb8b;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      padding: 0 20px;
      font-weight: bold;
    }
    .content {
      margin-left: 240px;
      padding: 20px;
    }
    .cards {
      display: flex;
      gap: 20px;
      margin-top: 20px;
    }
    .card {
      padding: 20px;
      color: white;
      width: 160px;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
    .blue { background: #0066ff; }
    .green { background: #7fe8a0; color: #064d1f; }
    .orange { background: #ff8c3a; }
    .orange2 { background: #e77d45; }

    /* Biar kartu bisa diklik  */
    .card-link {
      text-decoration: none;
      color: inherit;
      display: block;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <div class="logo">T</div>
    <ul>
      <li class="active">
        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
      </li>

      <li>
        <a href="{{ route('pemesanan.masuk') }}">📥 Pemesanan Masuk</a>
      </li>

      <li>
        <a href="{{ route('status.pesanan') }}">📊 Status Pesanan</a>
      </li>

       <li>
        <a href="{{ route('stok.bahan') }}">📦 Stok Bahan</a>
      </li>

      <li>
        <a href="{{ route('jadwal.produksi') }}">📅 Jadwal Produksi</a>
      </li>

       <li>
        <a href="{{ route('laporan') }}">📄 Laporan</a>
      </li>

      <li>
        <a href="{{ route('teras.chat') }}">💬 TerasChat</a>
      </li>

      <li>
        <a href="{{ route('logout') }}">⏻ Logout</a>
      </li>
    </ul>
  </div>

  <div class="topbar">👤 Admin</div>

  <div class="content">
    <h1 style="display:flex; align-items:center; gap:10px; font-size:32px; font-weight:bold;">
      Dashboard
    </h1>

    <div class="cards">

      <!-- CARD: PEMESANAN MASUK -->
      <a href="{{ route('pemesanan.masuk') }}" class="card-link">
        <div class="card orange">🛒 2 Pesanan Baru</div>
      </a>

      <div class="card blue">👥 3 Pelanggan</div>
      <div class="card green">📂 Kategori</div>
      <div class="card orange2">🛒 5 Total Pesanan</div>
    </div>
  </div>

</body>
</html>