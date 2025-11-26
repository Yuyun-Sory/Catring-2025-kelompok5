<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Teras Bu Rini</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        /* HEADER */
        .header {
            background-color: #A8F4A1;
            padding: 20px 40px;
            font-size: 22px;
            font-weight: bold;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* CONTENT */
        .container {
            padding: 40px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            margin-bottom: 25px;
        }

        .btn-logout {
            padding: 10px 18px;
            background-color: #ff6b6b;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-logout:hover {
            background-color: #e85a5a;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">
        Dashboard
        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button class="btn-logout">Logout</button>
        </form>
    </div>

    <!-- MAIN CONTENT -->
    <div class="container">
        <h2>Selamat Datang di Dashboard Teras Bu Rini!</h2>

        <div class="card">
            <h3>Informasi Pengguna</h3>
            <p>Email login: <strong>teras@gmail.com</strong></p>
        </div>

        <div class="card">
            <h3>Menu Dashboard</h3>
            <ul>
                <li>Kelola Pesanan</li>
                <li>Kelola Menu Makanan</li>
                <li>Kelola Pelanggan</li>
                <li>Laporan Penjualan</li>
            </ul>
        </div>
    </div>

</body>
</html>
