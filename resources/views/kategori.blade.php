<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kategori</title>

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

    .add-btn {
      background: #6be38b;
      color: black;
      padding: 8px 13px;
      border-radius: 8px;
      font-size: 15px;
      border: 1px solid #3d9a56;
      text-decoration: none;
      float: right;
      margin-bottom: 10px;
    }

    .add-btn:hover {
      background: #58d17c;
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

    .action-btn {
      padding: 6px 10px;
      font-size: 14px;
      text-decoration: none;
      border-radius: 5px;
    }

    .edit {
      background: #7de3ff;
      border: 1px solid #4bb5d1;
    }

    .delete {
      background: #ff8a8a;
      border: 1px solid #d66;
    }
  </style>
</head>
<body>

<div class="container">

  <div class="header-box">Data Kategori</div>

  <h2>Daftar Kategori Menu</h2>

  <a href="#" class="add-btn">+ Tambah Kategori</a>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td style="text-align:center;">1</td>
        <td><b>Makanan</b></td>
        <td>Aneka makanan berat & ringan</td>
        <td>
          <a href="#" class="action-btn edit">Edit</a>
          <a href="#" class="action-btn delete">Hapus</a>
        </td>
      </tr>

      <tr>
        <td style="text-align:center;">2</td>
        <td><b>Minuman</b></td>
        <td>Aneka minuman dingin & panas</td>
        <td>
          <a href="#" class="action-btn edit">Edit</a>
          <a href="#" class="action-btn delete">Hapus</a>
        </td>
      </tr>

      <tr>
        <td style="text-align:center;">3</td>
        <td><b>Cemilan</b></td>
        <td>Cemilan cepat saji</td>
        <td>
          <a href="#" class="action-btn edit">Edit</a>
          <a href="#" class="action-btn delete">Hapus</a>
        </td>
      </tr>
    </tbody>
  </table>

</div>

</body>
</html>
