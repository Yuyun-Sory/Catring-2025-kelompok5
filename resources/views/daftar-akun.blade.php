<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>

    <style>
        body {
            margin: 0;
            background: #ffffff;
            font-family: "Georgia", serif;
        }

        .container {
            padding: 40px;
            width: 400px;
            margin-left: 260px;
        }

        /* Logo bulat */
        .logo {
            width: 70px;
            height: 70px;
            background: #70e681;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            font-weight: bold;
            color: black;
            margin-bottom: 10px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-top: -5px;
            margin-bottom: 25px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
        }

        .input {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1px solid #999;
            font-size: 15px;
        }

        select.input {
            cursor: pointer;
        }

        .btn-simpan {
            width: 100%;
            padding: 14px;
            background: #5dd46d;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-simpan:hover {
            background: #4ec15d;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Logo -->
    <div class="logo">T</div>

    <!-- Judul -->
    <div class="title">Catering Teras Bu Rini</div>

    <!-- Form -->
    <form action="#" method="POST">
        @csrf

        <label>Nama Lengkap</label>
        <input type="text" class="input" name="nama" placeholder="Masukkan Nama Lengkap">

        <label>Email</label>
        <input type="email" class="input" name="email" placeholder="Masukkan Email">

        <label>Password</label>
        <input type="password" class="input" name="password" placeholder="Masukkan Password">

        <label>Nomor Telepon</label>
        <input type="text" class="input" name="telepon" placeholder="Masukkan Nomor Telepon">

        <label>Role</label>
        <select class="input" name="role">
            <option value="admin utama">Admin Utama</option>
            <option value="karyawan">Karyawan</option>
        </select>

        <button type="submit" class="btn-simpan">Simpan</button>

    </form>

</div>

</body>
</html>
