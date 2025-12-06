<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pelanggan</title>

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
      gap: 10px;
      align-items: center;
    }

    .sidebar li:hover,
    .active {
      background-color: rgba(255, 255, 255, 0.35);
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
      padding: 25px 35px;
    }

    /* TITLE BOX */
    .breadcrumb-box {
      background: white;
      border: 1px solid #ccc;
      padding: 15px 20px;
      border-radius: 6px;
      font-size: 30px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    /* TABLE */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
      font-size: 17px;
    }

    table, th, td {
      border: 1px solid #999;
    }

    th, td {
      padding: 12px;
      text-align: left;
    }

    th {
      background: #f3f3f3;
      text-align: center;
    }

    /* ADD BUTTON */
    .add-btn {
      background: #6be38b;
      color: black;
      padding: 7px 12px;
      border-radius: 6px;
      font-size: 14px;
      border: 1px solid #3d9a56;
      float: right;
      margin-bottom: 10px;
      cursor: pointer;
      text-decoration: none;
    }

    .add-btn:hover {
      background: #5ad27b;
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
      <li><a href="{{ route('status.pesanan') }}">📊 Status Pesanan</a></li>
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

    <!-- BREADCRUMB HEADER -->
    <div class="breadcrumb-box">
      Dashboard > Pelanggan
    </div>

    <h2>Data Pelanggan</h2>

    <a href="#" class="add-btn">+ Tambah Pelanggan</a>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Telepon</th>
          <th>Alamat</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td style="text-align:center;">1</td>
          <td><b>Budi Santoso</b></td>
          <td>0812-3456-7890</td>
          <td>Jl. Seturan No. 05 Yogyakarta</td>
        </tr>

        <tr>
          <td style="text-align:center;">2</td>
          <td><b>Siti Nurlizah</b></td>
          <td>0856-7890-1234</td>
          <td>Jl. Babarsari No. 15 Yogyakarta</td>
        </tr>

        <tr>
          <td style="text-align:center;">3</td>
          <td><b>Ahmad Rizky</b></td>
          <td>0898-1234-5678</td>
          <td>Jl. Mawar No. 15 Yogyakarta</td>
        </tr>
      </tbody>
    </table>

  </div>

</body>
</html>
