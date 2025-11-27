@extends('layouts.app')

@section('title', 'TerasChat')

@section('content')

<h1 style="font-size:32px; font-weight:bold; margin-bottom:20px;">
    TerasChat
</h1>

<div style="
    display:flex;
    gap:20px;
    height:75vh;
">

    <!-- SIDEBAR CHAT LIST -->
    <div style="
        width:30%;
        background:white;
        border-radius:12px;
        border:1px solid #e0e0e0;
        overflow-y:auto;
    ">
        <h4 style="padding:15px; font-weight:bold;">Daftar Chat</h4>

        <!-- CHAT ITEM -->
        <div style="
            padding:15px;
            border-bottom:1px solid #f0f0f0;
            cursor:pointer;
        ">
            <b>Afnan Rizki</b><br>
            <small style="opacity:0.6;">Pesanan saya kapan ya?</small>
        </div>

        <div style="
            padding:15px;
            border-bottom:1px solid #f0f0f0;
            cursor:pointer;
        ">
            <b>Budi Santoso</b><br>
            <small style="opacity:0.6;">Bisa tambah 5 porsi?</small>
        </div>

        <div style="
            padding:15px;
            border-bottom:1px solid #f0f0f0;
            cursor:pointer;
        ">
            <b>Sri Nurholis</b><br>
            <small style="opacity:0.6;">Terima kasih pesanan sudah sampai!</small>
        </div>

    </div>

    <!-- CHAT WINDOW -->
    <div style="
        flex:1;
        background:white;
        border-radius:12px;
        border:1px solid #e0e0e0;
        display:flex;
        flex-direction:column;
        justify-content:space-between;
        padding:20px;
    ">

        <!-- CHAT HEADER -->
        <div style="font-size:18px; font-weight:bold; margin-bottom:10px;">
            Afnan Rizki
        </div>

        <!-- CHAT CONTENT -->
        <div style="
            flex:1;
            overflow-y:auto;
            padding-right:10px;
        ">

            <!-- BUBBLE - USER -->
            <div style="
                background:#e8e8e8;
                padding:10px 15px;
                border-radius:10px;
                margin-bottom:10px;
                width:max-content;
                max-width:60%;
            ">
                Kak pesanan saya kapan ya?
            </div>

            <!-- BUBBLE - ADMIN -->
            <div style="
                background:#7beb8b;
                padding:10px 15px;
                border-radius:10px;
                margin-bottom:10px;
                width:max-content;
                max-width:60%;
                margin-left:auto;
            ">
                Halo kak, pesanan sedang diproses ya 🙏
            </div>

        </div>

        <!-- CHAT INPUT -->
        <div style="display:flex; gap:10px; margin-top:15px;">
            <input 
                type="text"
                placeholder="Ketik pesan..."
                style="
                    flex:1;
                    padding:10px;
                    border-radius:8px;
                    border:1px solid #ccc;
                "
            >
            <button style="
                background:#0066ff;
                color:white;
                padding:10px 20px;
                border:none;
                border-radius:8px;
            ">
                Kirim
            </button>
        </div>

    </div>
</div>

@endsection
