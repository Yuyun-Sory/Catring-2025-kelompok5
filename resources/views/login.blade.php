<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Teras Bu Rini</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body, html { 
        height: 100%; 
        font-family: 'Poppins', sans-serif; 
        overflow: hidden; 
        background: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1950&q=80') no-repeat center center/cover; 
        position: relative; 
    }

    /* Overlay gelap */
    body::before {
        content: "";
        position: absolute;
        top:0; left:0; right:0; bottom:0;
        background: rgba(0,0,0,0.5);
        z-index: 0;
    }

    .wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        position: relative;
        z-index: 1;
    }

    /* Login Card */
    .card {
        width: 380px;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(15px);
        border-radius: 25px;
        padding: 40px 35px;
        text-align: center;
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        color: #fff;
        position: relative;
        z-index: 2;
    }

    .logo {
        font-size: 60px;
        font-weight: bold;
        color: #ffd700;
        margin-bottom: 15px;
        transform: rotate(-10deg);
        animation: logoBounce 2s infinite alternate;
    }
    @keyframes logoBounce {
        from { transform: rotate(-10deg) translateY(0); }
        to { transform: rotate(-10deg) translateY(-5px); }
    }

    .welcome-text { font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 600; margin-bottom: 10px; }
    .title { font-family: 'Playfair Display', serif; font-size: 18px; margin-bottom: 25px; opacity: 0.9; }

    label { display: block; font-size: 13px; font-weight: 500; margin-bottom: 5px; text-align: left; color: #fff; }
    input {
        width: 100%;
        padding: 14px 15px;
        border-radius: 12px;
        border: none;
        margin-bottom: 20px;
        font-size: 14px;
        outline: none;
        background: rgba(255,255,255,0.2);
        color: #fff;
    }
    input::placeholder { color: rgba(255,255,255,0.7); }

    .btn {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #ffd700, #ffa500);
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 16px;
        color: #000;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 6px 15px rgba(0,0,0,0.3);
    }
    .btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.4); }

    .forgot { display: inline-block; margin-top: 15px; font-size: 13px; color: #fff; text-decoration: none; transition: color 0.3s; }
    .forgot:hover { color: #ffd700; }

    .error, .success { width: 100%; font-size: 13px; padding: 10px; border-radius: 8px; margin-bottom: 15px; text-align: left; }
    .error { background: rgba(255,0,0,0.3); color: #ff0000; }
    .success { background: rgba(0,255,0,0.3); color: #00ff00; }

    /* ================= ANIMASI MAKANAN ================= */
    .food {
        position: absolute;
        width: 40px;
        height: 40px;
        background-size: cover;
        animation: floatFood linear infinite;
        z-index: 1;
    }

    @keyframes floatFood {
        0% { transform: translateY(0) rotate(0deg); opacity: 0.7; }
        50% { transform: translateY(-150px) rotate(180deg); opacity: 0.9; }
        100% { transform: translateY(0) rotate(360deg); opacity: 0.7; }
    }
</style>
</head>
<body>

<div class="wrapper">
    <div class="card">
        <div class="logo">⊤</div>
        <h2 class="welcome-text">Selamat datang Admin Teras Bu Rini</h2>
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

            <label>Password</label>
            <input type="password" name="password" placeholder="Minimal 6 Karakter" required>

            <button type="submit" class="btn">Masuk</button>

            <a href="#" class="forgot">Forgot Password?</a>
        </form>
    </div>
</div>

<!-- Animasi makanan -->
<div class="food" style="top:80%; left:10%; background-image:url('https://cdn-icons-png.flaticon.com/512/3075/3075977.png'); animation-duration:8s;"></div>
<div class="food" style="top:85%; left:70%; background-image:url('https://cdn-icons-png.flaticon.com/512/3075/3075977.png'); animation-duration:10s;"></div>
<div class="food" style="top:90%; left:50%; background-image:url('https://cdn-icons-png.flaticon.com/512/3075/3075977.png'); animation-duration:12s;"></div>
<div class="food" style="top:75%; left:30%; background-image:url('https://cdn-icons-png.flaticon.com/512/3075/3075977.png'); animation-duration:9s;"></div>

</body>
</html>
