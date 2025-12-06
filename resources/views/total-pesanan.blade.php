<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard > Total Pesanan</title>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f4f4f4;
    }
    .sidebar {
        width: 220px;
        height: 100vh;
        background: #7ecf97;
        padding-top: 20px;
        position: fixed;
    }
    .sidebar h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
    }
    .sidebar ul li {
        padding: 12px 20px;
        cursor: pointer;
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
    .sidebar ul li:hover {
        background: #6bc588;
    }
    .content {
        margin-left: 240px;
        padding: 20px;
    }
    .title-box {
        background: #fff;
        padding: 12px 20px;
        border-radius: 6px;
        font-size: 24px;
        font-weight: bold;
        border: 1px solid #ccc;
        width: fit-content;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: #fff;
        border-radius: 6px;
        overflow: hidden;
    }
    table th, table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    table th {
        background: #e5e5e5;
        font-weight: bold;
    }
</style>
</head>
<body>

<div class="sidebar">
    <h2>TT</h2>
    <ul>
        <li>Dashboard</li>
        <li>Pemesanan Masuk</li>
        <li>Status Pesanan</li>
        <li>Jumlah Stok Bahan</li>
        <li>Jadwal Produksi</li>
        <li>Laporan</li>
        <li>TerasChat</li>
        <li>Logout</li>
    </ul>
</div>

<div class="content">
    <div class="title-box">Dashboard > Total Pesanan</div>

    <h3>Data Total Pesanan</h3>

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
        <tr>
            <td>ORD003</td>
            <td>Ahmad Rizki</td>
            <td>Nasi Pecal</td>
            <td>20 Nov 2025</td>
            <td>55 Porsi</td>
            <td>Rp 660.000</td>
        </tr>
        <tr>
            <td>ORD004</td>
            <td>Ahmad Rizki</td>
            <td>Nasi Ayam Goreng</td>
            <td>25 Nov 2025</td>
            <td>55 Porsi</td>
            <td>Rp 1.100.000</td>
        </tr>
        <tr>
            <td>ORD005</td>
            <td>Ahmad Rizki</td>
            <td>Sayur Sop</td>
            <td>20 Nov 2025</td>
            <td>55 Porsi</td>
            <td>Rp 660.000</td>
        </tr>
    </table>
</div>

</body>
</html>
