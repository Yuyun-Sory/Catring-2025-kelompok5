<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        /* ===== TOP HEADER ===== */
        .topbar {
            width: 100%;
            background: #6EEB83;
            padding: 15px 40px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            font-size: 18px;
            height: 55px;
        }

        .topbar i {
            margin-right: 8px;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: linear-gradient(#6EEB83, #5BBF6F);
            padding-top: 20px;
            position: fixed;
        }

        .sidebar .logo {
            text-align: center;
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li a {
            display: flex;
            align-items: center;
            padding: 14px 25px;
            color: #0f3a16;
            font-size: 17px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background: rgba(255, 255, 255, 0.4);
            border-radius: 8px;
        }

        .sidebar ul li i {
            width: 28px;
            margin-right: 10px;
        }

        /* ===== CONTENT ===== */
        .content {
            margin-left: 260px;
            padding: 30px;
        }

        .title-page {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        /* ===== CARDS ===== */
        .card-box {
            display: flex;
            gap: 20px;
        }

        .card {
            padding: 25px;
            border-radius: 12px;
            color: white;
            font-size: 18px;
            min-width: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .blue { background: #2979FF; }
        .green { background: #6EEB83; color: black; }
        .orange { background: #FF8533; }
        .light-orange { background: #FFAA66; }
    </style>
</head>
<body>

    <!-- TOP HEADER -->
    <div class="topbar">
        <i class="fa-solid fa-user"></i> Admin
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">T</div>

        <ul>
            <li><a href="#" class="active"><i class="fa-solid fa-house"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa-solid fa-list-check"></i> Pemesanan Masuk</a></li>
            <li><a href="#"><i class="fa-solid fa-chart-bar"></i> Status Pesanan</a></li>
            <li><a href="#"><i class="fa-solid fa-boxes-stacked"></i> Jumlah Stok Bahan</a></li>
            <li><a href="#"><i class="fa-solid fa-calendar"></i> Jadwal Produksi</a></li>
            <li><a href="#"><i class="fa-solid fa-file-alt"></i> Laporan</a></li>
            <li><a href="#"><i class="fa-solid fa-comments"></i> TerasChat</a></li>
            <li><a href="/logout" onclick="return confirm('Yakin ingin logout?')">
                <i class="fa-solid fa-power-off"></i> Logout
            </a></li>
        </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="content">

        <div class="title-page">Dashboard</div>

        <div class="card-box">
            <div class="card blue">3 Pelanggan</div>
            <div class="card green">Kategori</div>
            <div class="card orange">2 Pesanan Baru</div>
            <div class="card light-orange">5 Total Pesanan</div>
        </div>

    </div>

</body>
</html>
