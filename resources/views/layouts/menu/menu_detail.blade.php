@extends('layouts.app')

@section('content')
<style>
    .detail-container {
        max-width: 950px;
        margin: auto;
        padding: 20px;
    }

    .detail-title {
        font-weight: 700;
        font-size: 32px;
    }

    .detail-sub {
        color: gray;
    }

    .detail-image {
        width: 100%;
        border-radius: 12px;
    }

    .detail-price {
        text-align: center;
        font-weight: bold;
        margin-top: 10px;
        font-size: 18px;
    }

    .rating-stars {
        font-size: 22px;
        color: gold;
    }

    .btn-pax {
        border: 1px solid black;
        background: white;
        padding: 6px 15px;
        border-radius: 6px;
        margin-right: 10px;
    }

    .btn-pilihan {
        background: #37a000;
        color: white;
        padding: 6px 18px;
        border-radius: 6px;
        text-decoration: none;
    }

    .ulasan-user {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .ulasan-user-icon {
        font-size: 40px;
    }
</style>

<div class="detail-container">

    <h1 class="detail-title">{{ $menu['nama'] }}</h1>

    <p class="detail-sub">
        Minimal Order : {{ $menu['minimal'] }} Pax | Pemesanan minimal dilakukan 1 hari sebelum acara
    </p>

    <div class="row mt-4">
        <div class="col-md-4">
            <img src="{{ asset($menu['gambar']) }}" class="detail-image">

            <p class="detail-price">
                {{ $menu['nama'] }} <br>
                Rp {{ number_format($menu['harga']) }}
            </p>
        </div>

        <div class="col-md-8">
            <div class="rating-stars mb-2">
                ★★★★★ <strong style="color:black;">{{ $menu['rating'] }}</strong>
            </div>

            <p style="text-align: justify;">
                {{ $menu['deskripsi'] }}
            </p>
        </div>
    </div>

    <hr class="my-4">

    <h3 class="fw-bold">Ulasan</h3>

    {{-- LOOP UNTUK ULASAN --}}
    @foreach ($menu['ulasan'] as $u)
    <div class="ulasan-user">
        <div class="ulasan-user-icon">👤</div>
        <div>
            <strong>{{ $u['nama'] }}</strong> <br>
            {{-- Kalau ada bintang, bisa ditambahkan, kalau tidak abaikan --}}
            @isset($u['bintang'])
            <span class="rating-stars">
                {{ str_repeat('★', $u['bintang']) }}
            </span>
            @endisset
            <p>{{ $u['komentar'] }}</p>
        </div>
    </div>
    @endforeach

</div>
@endsection
