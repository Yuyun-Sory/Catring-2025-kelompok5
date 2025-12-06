<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan</title>

  <style>
    body {
      margin: 0;
      font-family: "Georgia", serif;
      background: #ffffff;
    }

    /* SIDEBAR */
    .sidebar {
      width: 230px;
      height: 100vh;
      background: linear-gradient(#9af7a6, #5da770);
      position: fixed;
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
      gap: 10px;
      font-size: 17px;
    }

    .sidebar a {
      text-decoration: none;
      color: black;
      display: flex;
      width: 100%;
      gap: 10px;
    }

    .sidebar li:hover, .active {
      background: rgba(255,255,255,0.35);
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
      padding: 25px;
    }

    .title-box {
      background: white;
      border: 1px solid #ccc;
      padding: 18px 20px;
      border-radius: 6px;
      font-size: 28px;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .breadcrumb {
      font-size: 14px;
      color: #333;
    }

    h3 {
      margin-top: 35px;
      font-size: 22px;
    }

    /* BUTTON */
    .btn-add {
      background: #7aef8d;
      padding: 7px 14px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 13px;
      font-weight: bold;
      float: right;
      margin-top: -35px;
    }

    /* TABLE */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    table th, table td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
      font-size: 15px;
    }

    table th {
      background: #e8e8e8;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="logo">T</div>

    <ul>
      <li><a href="{{ route('dashboard') }}">🏠 Dashboard</a></li>
      <li><a href="{{ route('pemesanan.masuk') }}">📥 Pemesanan Masuk</a></li>
      <li class="active"><a href="{{ route('pesanan.index') }}">📊 Status Pesanan</a></li>
      <li><a href="{{ route('stok.bahan') }}">📦 Jumlah Stok Bahan</a></li>
      <li><a href="{{ route('jadwal.produksi') }}">📅 Jadwal Produksi</a></li>
      <li><a href="{{ route('laporan') }}">📄 Laporan</a></li>
      <li><a href="{{ route('teras.chat') }}">💬 TerasChat</a></li>
      <li><a href="{{ route('logout') }}">⏻ Logout</a></li>
    </ul>
  </div>

  <!-- TOPBAR -->
  <div class="topbar">👤 Admin</div>

  <!-- CONTENT -->
  <div class="content">

    <!-- Title -->
    <div class="title-box">
      Dashboard > Pesanan
      <span class="breadcrumb">⚙ / Pesanan</span>
    </div>

    <h3>Data Pesanan Baru</h3>

    <!-- Button -->
    <button class="btn-add">+ Tambah Pesanan</button>

    <!-- TABLE -->
    <table>
      <tr>
        <th>No Order</th>
        <th>Nama</th>
        <th>Menu</th>
        <th>Tanggal</th>
        <th>Total Pesan</th>
        <th>Total</th>
      </tr>

      <tr>
        <td>ORD001</td>
        <td>Budi Santoso</td>
        <td>Soto Ayam</td>
        <td>7 Nov 2025</td>
        <td>50 Porsi</td>
        <td>Rp 750.000</td>
      </tr>

      <tr>
        <td>ORD002</td>
        <td>Siti Nurlizah</td>
        <td>Sate Ayam</td>
        <td>10 Nov 2025</td>
        <td>55 Porsi</td>
        <td>Rp 550.000</td>
      </tr>

    </table>

  </div>

</body>
</html>
