<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori</title>

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
      padding-top: 20px;
    }

    .logo {
      text-align: center;
      font-size: 48px;
      margin-bottom: 25px;
      font-weight: bold;
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

    .sidebar li:hover,
    .active {
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

    /* TABLE SECTION */
    h2 {
      margin-top: 40px;
      font-size: 24px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      margin-bottom: 25px;
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

    .btn-add {
      background: #7aef8d;
      border: none;
      padding: 8px 14px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
      font-weight: bold;
    }

    .btn-action {
      padding: 5px 12px;
      border-radius: 5px;
      font-size: 12px;
      cursor: pointer;
      border: none;
      background: #7aef8d;
    }

    .thumb {
      width: 35px;
      height: 35px;
      border-radius: 4px;
      object-fit: cover;
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
      <li><a href="{{ route('stok.bahan') }}">📦 Stok Bahan</a></li>
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

    <!-- TITLE -->
    <div class="title-box">
      Dashboard > Kategori
      <span class="breadcrumb">⚙ / Kategori</span>
    </div>


    <!-- KATEGORI: MAKANAN -->
    <h2>Makanan</h2>
    <button class="btn-add">+ Tambah Menu</button>

    <table>
      <tr>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>

      <tr>
        <td>Soto Ayam</td>
        <td>Rp 15.000</td>
        <td><img class="thumb" src="https://via.placeholder.com/50"></td>
        <td>
          <button class="btn-action">Edit</button>
          <button class="btn-action">Hapus</button>
        </td>
      </tr>

      <tr>
        <td>Nasi Ayam Goreng</td>
        <td>Rp 20.000</td>
        <td><img class="thumb" src="https://via.placeholder.com/50"></td>
        <td>
          <button class="btn-action">Edit</button>
          <button class="btn-action">Hapus</button>
        </td>
      </tr>

    </table>


    <!-- KATEGORI: PAKET MINUMAN -->
    <h2>Paket Minuman</h2>

    <table>
      <tr>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>

      <tr>
        <td>Teh</td>
        <td>Rp 5.000</td>
        <td><img class="thumb" src="https://via.placeholder.com/50"></td>
        <td>
          <button class="btn-action">Edit</button>
          <button class="btn-action">Hapus</button>
        </td>
      </tr>

      <tr>
        <td>Kopi Hitam</td>
        <td>Rp 8.000</td>
        <td><img class="thumb" src="https://via.placeholder.com/50"></td>
        <td>
          <button class="btn-action">Edit</button>
          <button class="btn-action">Hapus</button>
        </td>
      </tr>
    </table>


    <!-- KATEGORI: CEMILAN -->
    <h2>Cemilan</h2>

    <table>
      <tr>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>

      <tr>
        <td>Tempe Mendoan</td>
        <td>Rp 9.000</td>
        <td><img class="thumb" src="https://via.placeholder.com/50"></td>
        <td>
          <button class="btn-action">Edit</button>
          <button class="btn-action">Hapus</button>
        </td>
      </tr>

      <tr>
        <td>Bakwuan</td>
        <td>Rp 9.000</td>
        <td><img class="thumb" src="https://via.placeholder.com/50"></td>
        <td>
          <button class="btn-action">Edit</button>
          <button class="btn-action">Hapus</button>
        </td>
      </tr>
    </table>


    <!-- KATEGORI: OLEH-OLEH -->
    <h2>Oleh–Oleh</h2>

    <table>
      <tr>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>

      <tr>
        <td>Bolu Kukus Original</td>
        <td>Rp 25.000</td>
        <td><img class="thumb" src="https://via.placeholder.com/50"></td>
        <td>
          <button class="btn-action">Edit</button>
          <button class="btn-action">Hapus</button>
        </td>
      </tr>

      <tr>
        <td>Roti Kukus Keju</td>
        <td>Rp 20.000</td>
        <td><img class="thumb" src="https://via.placeholder.com/50"></td>
        <td>
          <button class="btn-action">Edit</button>
          <button class="btn-action">Hapus</button>
        </td>
      </tr>

    </table>

  </div>

</body>
</html>
