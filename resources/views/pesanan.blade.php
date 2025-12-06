<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>2 Pesanan Baru</title>

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
        font-size: 26px;
        text-align: center;
        border: 1px solid #4da85b;
    }

    .sub-title {
        font-size: 20px;
        margin-top: 25px;
        font-weight: bold;
    }

    .order-card {
        background: #d3ffdc;
        border-radius: 12px;
        padding: 18px 20px;
        border: 1px solid #77c586;
        margin-top: 15px;
    }

    .order-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
        font-size: 18px;
    }

    .order-label {
        font-weight: bold;
    }

    .btn-detail {
        margin-top: 10px;
        background: #6be38b;
        padding: 7px 14px;
        border-radius: 8px;
        border: 1px solid #3b8e4c;
        font-size: 15px;
        text-decoration: none;
        color: black;
    }

    .btn-detail:hover {
        background: #5cd27b;
    }
</style>

</head>
<body>

<div class="container">

    <div class="header-box">
        2 Pesanan Baru
    </div>

    <div class="sub-title">Daftar Pesanan:</div>

    <!-- PESANAN 1 -->
    <div class="order-card">
        <div class="order-row">
            <span class="order-label">Nama Pelanggan:</span>
            <span>Andi Saputra</span>
        </div>

        <div class="order-row">
            <span class="order-label">Menu:</span>
            <span>Ayam Geprek</span>
        </div>

        <div class="order-row">
            <span class="order-label">Jumlah:</span>
            <span>2</span>
        </div>

        <div class="order-row">
            <span class="order-label">Total Harga:</span>
            <span>Rp 28.000</span>
        </div>

        <a href="#" class="btn-detail">Lihat Detail</a>
    </div>

    <!-- PESANAN 2 -->
    <div class="order-card">
        <div class="order-row">
            <span class="order-label">Nama Pelanggan:</span>
            <span>Rina Lestari</span>
        </div>

        <div class="order-row">
            <span class="order-label">Menu:</span>
            <span>Nasi Goreng</span>
        </div>

        <div class="order-row">
            <span class="order-label">Jumlah:</span>
            <span>1</span>
        </div>

        <div class="order-row">
            <span class="order-label">Total Harga:</span>
            <span>Rp 15.000</span>
        </div>

        <a href="#" class="btn-detail">Lihat Detail</a>
    </div>

</div>

</body>
</html>
