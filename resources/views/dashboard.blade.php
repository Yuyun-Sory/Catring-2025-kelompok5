<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <style>
    body {
      margin: 0;
      font-family: "Georgia", serif;
      background-color: #ffffff;
    }

    /* SIDEBAR */
    .sidebar {
      width: 230px;
      height: 100vh;
      background: linear-gradient(#9af7a6, #5da770);
      position: fixed;
      color: black;
      padding-top: 20px;
    }

    .logo {
      text-align: center;
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 25px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar li {
      padding: 12px 20px;
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
    .active {
      background-color: rgba(255,255,255,0.35);
      border-radius: 8px;
    }

    /* TOPBAR */
    .topbar {
      margin-left: 230px;
      height: 65px;
      background: #7aef8d;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      padding: 0 25px;
      font-size: 17px;
      font-weight: bold;
    }

    /* CONTENT */
    .content {
      margin-left: 250px;
      padding: 35px;
    }

    /* TITLE BOX */
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
    }

    .breadcrumb {
      font-size: 14px;
      color: #333;
    }

    /* CARDS */
    .cards {
      display: flex;
      gap: 20px;
      margin-top: 25px;
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

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="logo">T</div>

    <ul>
      <li class="active">
        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
      </li>

      <li><a href="{{ route('pemesanan.masuk') }}">📥 Pemesanan Masuk</a></li>
      <li><a href="{{ route('status.pesanan') }}">📊 Status Pesanan</a></li>
      <li><a href="{{ route('stok.bahan') }}">📦 Jumlah Stok Bahan</a></li>
      <li><a href="{{ route('jadwal.produksi') }}">📅 Jadwal Produksi</a></li>
      <li><a href="{{ route('laporan') }}">📄 Laporan</a></li>
      <li><a href="{{ route('teras.chat') }}">💬 TerasChat</a></li>
      <li><a href="{{ route('logout') }}">⏻ Logout</a></li>
    </ul>
  </div>

  <!-- TOPBAR -->
  <div class="topbar">
    <a href="{{ route('admin.daftar') }}" style="text-decoration:none; color:black;">
        👤 Admin
    </a>
</div>

  <!-- CONTENT -->
  <div class="content">

    <div class="title-box">
      Dashboard
      <span class="breadcrumb">⚙ / Dashboard</span>
    </div>

    <!-- CARDS -->
    <div class="cards">
      <a class="card-link" href="{{ route('pelanggan.index') }}">
        <div class="card blue">👥 3 Pelanggan</div>
      </a>

      <a class="card-link" href="{{ route('kategori.index') }}">
        <div class="card green">📂 Kategori</div>
      </a>

      <a class="card-link" href="{{ route('pesanan.index') }}">
        <div class="card orange">🛒 2 Pesanan Baru</div>
      </a>

      <a class="card-link" href="{{ route('total-pesanan.index') }}">
        <div class="card orange2">🛒 5 Total Pesanan</div>
      </a>
    </div>

  </div>

</body>
</html>