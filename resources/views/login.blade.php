<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Teras Bu Rini</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #e0e0e0;
        }
        .wrapper {
            text-align: center;
            padding-top: 50px;
        }
        .welcome-text {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 600;
            color: #3F704D;
            margin-bottom: 20px;
        }
        .card {
            width: 500px;
            background: white;
            margin: auto;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0px 10px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 65px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .title {
            font-size: 20px;
            font-family: 'Playfair Display', serif;
            margin-bottom: 35px;
        }

        label {
            font-size: 13px;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #cecece;
            border-radius: 4px;
            margin-top: 5px;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #8ae596;
            border: none;
            margin-top: 25px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        .btn:hover {
            background: #7ed48b;
        }

        .forgot {
            margin-top: 18px;
            font-size: 12px;
            color: #666;
            text-decoration: none;
        }
        .error, .success {
            width: 100%;
            font-size: 13px;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .error { background: #ffd6d6; color: #b30000; }
        .success { background: #d7ffd7; color: #065f08; }

    </style>
</head>
<body>

<div class="wrapper">

    <h2 class="welcome-text">Selamat datang Admin Teras Bu Rini</h2>

    <div class="card">

        <div class="logo">⊤</div>

        <div class="title">Catering Teras Bu Rini</div>

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            
            <label>Email</label>
            <input type="email" name="email" placeholder="example@gmail.com" required>

            <label style="margin-top: 15px;">Password</label>
            <input type="password" name="password" placeholder="Minimal 6 Karakter" required>

            <button type="submit" class="btn">Masuk</button>

            <a href="#" class="forgot">Forgot Password?</a>
        </form>
    </div>
</div>

</body>
</html>
