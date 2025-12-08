@extends('layouts.app')

@section('title', 'Logout')

@section('content')

<style>
    body {
        background: #f5f6fa;
        font-family: 'Inter', sans-serif;
    }

    .logout-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 70vh;
    }

    .logout-card {
        background: white;
        padding: 40px 50px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        text-align: center;
        max-width: 500px;
        width: 90%;
        transition: transform 0.3s;
    }

    .logout-card:hover {
        transform: translateY(-5px);
    }

    .logout-card h1 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #333;
    }

    .logout-card h3 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #555;
    }

    .logout-card p {
        color: #777;
        font-size: 15px;
        margin-bottom: 30px;
    }

    .btn-logout {
        background: linear-gradient(135deg, #e74c3c, #ff6b6b);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        margin-right: 15px;
    }

    .btn-logout:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(231,76,60,0.4);
    }

    .btn-cancel {
        background: linear-gradient(135deg, #7beb8b, #32c76c);
        color: white;
        padding: 12px 30px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-cancel:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(50,199,108,0.4);
    }

</style>

<div class="logout-container">
    <div class="logout-card">
        <h1>Logout</h1>
        <h3>Apakah Anda yakin ingin logout?</h3>
        <p>Anda akan keluar dari dashboard dan kembali ke halaman login.</p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Ya, Logout</button>
            <a href="{{ route('dashboard') }}" class="btn-cancel">Batal</a>
        </form>
    </div>
</div>

@endsection
