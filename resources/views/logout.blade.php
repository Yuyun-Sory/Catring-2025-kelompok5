@extends('layouts.app')

@section('title', 'Logout')

@section('content')

<h1 style="font-size:32px; font-weight:bold; margin-bottom:20px;">
    Logout
</h1>

<div style="
    background:white;
    padding:30px;
    border-radius:12px;
    border:1px solid #e0e0e0;
    width:60%;
    text-align:center;
    margin-top:40px;
">

    <h3 style="margin-bottom:15px;">Apakah Anda yakin ingin logout?</h3>
    <p style="opacity:0.7; margin-bottom:25px;">
        Anda akan keluar dari dashboard dan kembali ke halaman login.
    </p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit" style="
            background:#e74c3c;
            color:white;
            padding:12px 25px;
            border:none;
            border-radius:8px;
            font-size:16px;
            margin-right:10px;
        ">
            Ya, Logout
        </button>

        <a href="{{ route('dashboard') }}" style="
            background:#7beb8b;
            padding:12px 25px;
            text-decoration:none;
            border-radius:8px;
            color:black;
            font-weight:bold;
        ">
            Batal
        </a>
    </form>

</div>

@endsection
