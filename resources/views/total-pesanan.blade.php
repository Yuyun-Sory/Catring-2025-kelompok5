<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Total Pesanan</title>

  <style>
    body {
      margin: 0;
      padding: 0;
      background: #e9ffe9;
      font-family: "Georgia", serif;
    }

    .container {
      width: 85%;
      margin: 40px auto;
      background: white;
      border-radius: 12px;
      padding: 25px 30px;
      box-shadow: 0 0 12px rgba(0,0,0,0.15);
    }

    .header-box {
      width: 100%;
      padding: 18px 22px;
      border-radius: 10px;
      background: #7af28c;
      font-weight: bold;
      font-size: 28px;
      text-align: center;
      border: 1px solid #4da85b;
    }

    h2 {
      margin-top: 25px;
      font-size: 22px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
      font-size: 17px;
    }

    th, td {
      border: 1px solid #999;
      padding: 12px;
      text-align: left;
    }

    th {
      background: #f2f2f2;
      text-align: center;
    }

    .status {
      padding: 6px 10px;
      border-radius: 6px;
      color: black;
      font-weight: bold;
      font-size: 14px;
    }

    .baru { background: #ffe076; }
    .proses { background: #8fd3ff; }
    .selesai { background: #86ff9f; }

    .action-btn {
      padding: 6px 10px;
      font-size: 14px;
      text-decoration: none;
      border-radius: 5px;
    }

    .detail {
      background: #b9ffb9;
      border: 1px solid #4ca454;
    }

  </style>
</head>
<body>

<div class="container">

  <div class="header-box">Total Pesanan</div>

  <h2>Daftar Semua Pesanan</h2>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Pesanan</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>

      <tr>
        <td style="text-align:center;">1</td>
        <td><b>Budi Santoso</b></td>
        <td>Nasi Goreng</td>
        <td>2</td>
        <td>Rp 35.000</td>
        <td><span class="status baru">Pesanan Baru</span></td>
        <td><a href="#" class="action-btn detail">Detail</a></td>
      </tr>

      <tr>
        <td style="text-align:center;">2</td>
        <td><b>Siti Nurlizah</b></td>
        <td>Ayam Bakar</td>
        <td>1</td>
        <td>Rp 25.000</td>
        <td><span class="status proses">Diproses</span></td>
        <td><a href="#" class="action-btn detail">Detail</a></td>
      </tr>

      <tr>
        <td style="text-align:center;">3</td>
        <td><b>Ahmad Rizky</b></td>
        <td>Es Teh</td>
        <td>3</td>
        <td>Rp 12.000</td>
        <td><span class="status selesai">Selesai</span></td>
        <td><a href="#" class="action-btn detail">Detail</a></td>
      </tr>

      <tr>
        <td style="text-align:center;">4</td>
        <td><b>Dewi Yuliani</b></td>
        <td>Mie Ayam</td>
        <td>1</td>
        <td>Rp 15.000</td>
        <td><span class="status proses">Diproses</span></td>
        <td><a href="#" class="action-btn detail">Detail</a></td>
      </tr>

      <tr>
        <td style="text-align:center;">5</td>
        <td><b>Hendra Wijaya</b></td>
        <td>Bakso</td>
        <td>1</td>
        <td>Rp 18.000</td>
        <td><span class="status selesai">Selesai</span></td>
        <td><a href="#" class="action-btn detail">Detail</a></td>
      </tr>

    </tbody>
  </table>

</div>

</body>
</html>
