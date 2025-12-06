<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Admin</title>

    <style>
        body {
            margin: 0;
            font-family: "Georgia", serif;
            background-color: #ffffff;
        }

        /* Container ikut layout dashboard */
        .wrapper {
            margin-left: 230px; /* mengikuti sidebar */
            padding: 40px;
        }

        .title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .subtitle {
            font-size: 18px;
            margin-bottom: 25px;
        }

        /* BOX HIJAU BESAR (sesuai mockup) */
        .box {
            width: 550px;
            background: #7aef8d;
            padding: 35px;
            border-radius: 12px;
        }

        .box h2 {
            margin: 0;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .box p {
            font-size: 16px;
            margin-bottom: 25px;
        }

        /* Tombol sesuai mockup */
        .btn {
            width: 100%;
            background: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn + .btn {
            margin-top: 12px;
        }

        .arrow {
            font-size: 22px;
        }

        .btn-link {
            text-decoration: none;
            color: black;
        }
    </style>

</head>
<body>

<div class="wrapper">

    <!-- TITLE SAMA PERSIS MOCKUP -->
    <div class="title">Admin</div>
    <div class="subtitle">Daftar Masuk</div>

    <!-- BOX HIJAU -->
    <div class="box">
        <h2>Daftar Masuk</h2>
        <p>Silakan pilih untuk melanjutkan</p>

        <!-- Tombol login -->
        <a href="{{ route('login') }}" class="btn-link">
            <button class="btn">
                Masuk
                <span class="arrow">→</span>
            </button>
        </a>

        <!-- Tombol register -->
        <a href="#" class="btn-link">
            <button class="btn">
                Buat Akun
                <span class="arrow">→</span>
            </button>
        </a>

    </div>

</div>

</body>
</html>
