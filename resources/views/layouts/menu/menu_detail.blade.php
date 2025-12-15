@php $hideNavbar = true; @endphp
@extends('layouts.user')

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
        font-size: 20px;
        color: gold;
    }

    /* === ULASAN DIPERKECIL === */
    .ulasan-user {
        display: flex;
        gap: 10px;
        margin-top: 10px;
        padding: 12px 0;
        border-bottom: 1px solid #ececec;
    }

    .ulasan-user-icon {
        font-size: 28px;
    }

    .ulasan-nama {
        font-size: 14px;
        font-weight: 600;
    }

    .ulasan-rating {
        font-size: 14px;
        color: gold;
    }

    .ulasan-komentar {
        font-size: 13px;
        margin-top: 2px;
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

    @foreach ($menu['ulasan'] as $u)
    <div class="ulasan-user">
        <div class="ulasan-user-icon">👤</div>

        <div>
            <div class="ulasan-nama">{{ $u['nama'] }}</div>

            @isset($u['bintang'])
            <div class="ulasan-rating">
                {{ str_repeat('★', $u['bintang']) }}
            </div>
            @endisset

            <div class="ulasan-komentar">
                {{ $u['komentar'] }}
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
