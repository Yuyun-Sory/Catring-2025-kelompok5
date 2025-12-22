@extends('layouts.main')
@section('title', 'Home')

@section('content')
<style>
/* ================= MENU CARD ANIMATION ================= */
.menu-card {
    width: 250px;
    text-align: center;
    background: #ffffff;
    border-radius: 12px;
    padding: 10px;
    transition: transform 0.35s ease, box-shadow 0.35s ease;
}

.menu-card img {
    width: 100%;
    border-radius: 10px;
    transition: transform 0.35s ease;
}

.menu-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.18);
}

.menu-card:hover img {
    transform: scale(1.08);
}

/* === HERO SECTION === */
.hero-section {
    position: relative;
    width: 100%;
    height: 540px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

/* === BACKGROUND === */
.hero-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.hero-bg::before,
.hero-bg::after {
    content: "";
    position: absolute;
    top: 0;
    width: 52%;
    height: 100%;
    background-size: cover;
    background-position: center;
}

.hero-bg::before {
    left: 0;
    background-image: url('{{ asset('images/produk1.jpg') }}');
    clip-path: path("M0,0 L85%,0 C87%,40% 88%,60% 85%,100% L0,100% Z");
}

.hero-bg::after {
    right: 0;
    background-image: url('{{ asset('images/produk2.jpg') }}');
    clip-path: path("M15%,0 C18%,40% 17%,60% 15%,100% L100%,100% L100%,0 Z");
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: rgba(255,255,255,0.25);
    z-index: 2;
}
 
.hero-inner {
    position: relative;
    z-index: 3;
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* === GAMBAR BULAT (SEBELAH KIRI TENGAH) === */
.collage {
    position: absolute;
    left: 20%;
    /* pindah ke kiri */
    top: 50%;
    transform: translate(-50%, -50%);
}

.collage .circle {
    position: absolute;
    border-radius: 50%;
    background-size: cover;
    background-position: center;
    box-shadow: 0 6px 25px rgba(0,0,0,0.25);
    border:none;
}

/* posisi tumpukan */
.circle.one {
    width: 250px;
    height: 300px;
    left: 20px;
    bottom:-9rem;
    z-index: 1;
    border:17px solid #e4e4e4ff
}

.circle.two {
    width: 180px;
    height: 210px;
    left: 180px;
    top: -7rem;
    z-index: 2;
}

.circle.three {
    width: 150px;
    height: 180px;
    left: 130px;
    top: 0;
    z-index: 3;
    border : none;
}

/* === POSISI HERO TEXT === */
.hero-text {
    width: 45%;
    margin-left: auto;
    text-align: left;
    color: #ffffff;
    position: relative;
    z-index: 10;
    padding-right: 40px;
}

/* === TEKS HERO (GAYA BAYANGAN TEBAL) === */
.hero-text h1 {
    font-size: 42px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 6px;
    text-shadow:
        3px 3px 0 rgba(0,0,0,0.45),
        6px 6px 10px rgba(0,0,0,0.55),
        0 0 25px rgba(0,0,0,0.9);
}

.hero-text h2 {
    font-size: 24px;
    font-weight: 700;
    color: #d7ffd8;
    margin-bottom: 14px;
    text-shadow:
        2px 2px 0 rgba(0,0,0,0.45),
        5px 5px 12px rgba(0,0,0,0.55),
        0 0 20px rgba(0,0,0,0.8);
}

.hero-text p {
    font-size: 16px;
    line-height: 1.6;
    color: #ffffff;
    max-width: 450px;
    text-shadow:
        2px 2px 0 rgba(0,0,0,0.45),
        4px 4px 12px rgba(0,0,0,0.55),
        0 0 18px rgba(0,0,0,0.8);
}



.welcome-banner {
            background-color: #f2f2f2;
    text-align: center;
    padding: 60px 20px;
    margin: 0;
}

/* === HURUF WELCOME BANNER (GAYA PREMIUM + GLOW) === */
/* === HURUF WELCOME BANNER (GAYA HITAM TEBAL ESTETIK) === */
.welcome-banner h1 {
    font-size: 40px;
    font-weight: 900;
    letter-spacing: 1px;
    color: #1a1a1a; /* hitam elegan */

    text-shadow:
        1px 1px 0 rgba(255,255,255,0.8), /* garis putih tipis */
        3px 3px 6px rgba(0,0,0,0.25);   /* bayangan lembut */
}

.welcome-banner span {
    font-size: 26px;
    font-weight: 700;
    letter-spacing: 0.5px;
    color: #2f7f3a; /* hijau branding */

    text-shadow:
        1px 1px 0 rgba(255,255,255,0.8),
        2px 2px 5px rgba(0,0,0,0.25);
=======
    background-color: #f2f2f2;
    text-align: center;
    padding: 60px 20px;
}

.welcome-banner h2 {
    font-family: "Allura", cursive;
    font-size: 55px;
    font-weight: 400;
    color: #2b4d2b; /* hijau gelap elegan */
    letter-spacing: 1px;
    font-style: italic;          /* miring bawaan */
    transform: skewX(-10deg);    /* tambah miring biar lebih kreatif */
    margin: 0;
}

        .img-1{
            width: 20%;
            height: 40%;
            object-fit: cover;
            border-radius :30%
        }
.location-section {
        background-color: #d1fae5;
        padding: 60px 80px;
        border-radius: 20px 20px 0 0;
        margin-top: 60px;
    }

    .location-content {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        justify-content: space-between;
        align-items: flex-start;
    }

    .location-left {
        flex: 1;
        min-width: 320px;
    }

    .location-left img {
        width: 70px;
        margin-bottom: 15px;
    }

    .location-left p {
        color: #333;
        line-height: 1.7;
    }


    .ulasan-card {
    background: #fff;
    border-radius: 12px;
    padding: 18px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    height: 100%;
}

.ulasan-card strong {
    color: #2f7f3a;
    font-size: 15px;
}

.ulasan-card p {
    font-size: 14px;
    margin: 8px 0 0;
    color: #444;
}



/* RESPONSIVE */
@media (max-width: 992px) {
    .hero-inner {
        flex-direction: column;
        text-align: center;
    }

    .hero-text {
        width: 100%;
        text-align: center;
    }

    .collage {
        position: static;
        transform: none;
        margin: 20px auto;
    }

    .collage .circle {
        position: relative;
        margin: 10px;
    }
}
</style>
<section class="welcome-banner">
        <h1>Selamat Datang di</h1>
        <span>Catering Teras Bu Rini</span>
    </section>

<!-- === HERO SECTION === -->
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>
    <div class="hero-inner">
        {{-- Gambar bulat bertumpuk di kiri tengah --}}
        <div class="collage">
            <div class="circle one" style="background-image: url('{{ asset('images/Produk3.png') }}');"></div>
            <div class="circle two" style="background-image: url('{{ asset('images/Produk4.png') }}');"></div>
            <div class="circle three" style="background-image: url('{{ asset('images/Produk5.png') }}');"></div>
        </div>

        {{-- Teks di kanan --}}
        <div class="hero-text">
            <h1>Teras Bu Rini</h1>
            <h2>Catering Homemade</h2>
            <p>
                Nikmati kelezatan makanan homemade berkualitas tinggi dari dapur kami di Turi. Setiap hidangan dibuat
                dengan cinta dan bahan-bahan segar pilihan untuk acara spesial Anda.
            </p>
        </div>
    </div>
</section>

<!-- Section Citarasa Prima -->
<section class="text-center py-5" style="background-color: #ffffff;">
    <div class="container">
        <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; color: #333;">
            CITARASA PRIMA, KUALITAS UTAMA
        </h2>
        <p class="mt-3"
            style="max-width: 800px; margin: 0 auto; font-size: 16px; color: #555; line-height: 1.8;">
            Teras Bu Rini melayani jasa boga berkualitas dan bercitarasa prima dengan tampilan yang lebih eksklusif dan
            lebih terpercaya dalam memberikan jamuan bagi tamu-tamu penting anda. Beragam menu masakan dan menjadikan
            Teras Bu Rini sebagai jasa catering yang inovatif dengan lebih dari 200 koleksi menu lezat yang siap
            dihidangkan.
        </p>
    </div>
</section>

<!-- ====== MENU POPULER ====== -->
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Menu Populer</h2>

        <div class="d-flex justify-content-center gap-4 flex-wrap">
            @forelse ($menuPopuler as $menu)
                <div class="menu-card text-center">
                    <img 
                        src="{{ asset('storage/' . $menu->foto) }}"
                        alt="{{ $menu->nama_menu }}"
                        style="width:200px;height:150px;object-fit:cover"
                    >
                    <h5 class="mt-2">{{ $menu->nama_menu }}</h5>
                    <p>Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                    <small class="text-muted">
                        🔥 Dibeli {{ $menu->total_dibeli }} kali
                    </small>
                </div>
            @empty
                <p class="text-muted">Belum ada menu populer</p>
            @endforelse
        </div>
    </div>
</section>


<!-- ====== OLEH-OLEH POPULER ====== -->
<section class="py-5" style="background:#f9f9f9;">
    <div class="container">
        <h2 class="fw-bold mb-4">Oleh-Oleh Populer</h2>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <div class="menu-card">
                <img src="{{ asset('images/Produk5.png') }}">
                <h5 class="mt-2">Jahe Merah Instan</h5>
                <p>Rp 15.000</p>
            </div>
            <div class="menu-card">
                <img src="{{ asset('images/Produk4.png') }}">
                <h5 class="mt-2">Bolu Kukus Pandan Keju</h5>
                <p>Rp 30.000</p>
            </div>
            <div class="menu-card">
                <img src="{{ asset('images/Telur asin.png') }}">
                <h5 class="mt-2">Telur Asin</h5>
                <p>Rp 15.000</p>
            </div>
        </div>
    </div>
</section>

<!-- ====== MINUMAN SEHAT ====== -->
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Minuman Sehat</h2>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <div class="menu-card">
                <img src="{{ asset('images/wedang jahe merah.png') }}">
                <h5 class="mt-2">Wedang Jahe Merah</h5>
                <p>Rp 5.000</p>
            </div>
            <div class="menu-card">
                <img src="{{ asset('images/wedang susu jahe.png') }}">
                <h5 class="mt-2">Wedang Susu Jahe</h5>
                <p>Rp 5.000</p>
            </div>
        </div>
    </div>
</section>

<!-- ====== ULASAN PELANGGAN ====== -->
<section class="py-5" style="background-color:#f9f9f9">
    <div class="container">
        <h2 style="font-family:'Poppins',sans-serif;font-weight:700;font-size:30px;color:#000;margin-bottom:30px">
            Ulasan Pelanggan
        </h2>

        <div id="ulasanList" class="row g-3">
            <!-- Ulasan muncul otomatis di sini -->
        </div>
    </div>
</section>


<!-- === BAGIAN LOKASI & FOOTER === -->
<section class="location-section">
    <div class="location-content">
        <div class="location-left">
            <img src="{{ asset('images/bg teras.png') }}" alt="Logo Teras Bu Rini">
            <p>
                Catering Teras Bu Rini adalah penyedia jasa catering di Yogyakarta yang siap memenuhi berbagai kebutuhan konsumsi,
                mulai dari menu harian hingga acara seperti rapat, seminar, dan workshop. 
                Kami menghadirkan hidangan lezat, bergizi,
                dan terjamin dengan cita rasa terbaik untuk setiap momen Anda.
            </p>
            <div class="social-icons mt-3">
                <a href="https://wa.me/+6285727120836" target="_blank" title="WhatsApp">
                    <img src="{{ asset('images/logo wa.png') }}" alt="WhatsApp">
                </a>
            </div>
        </div>

        <div class="location-right">
            <h4 class="fw-bold">Lokasi</h4>
            <p>📍 Garongan Kembang RT 02 RW 18, Wonokerto, Turi, Sleman 55551</p>
            <<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3954.3938287499977!2d110.37794107500343!3d-7.6407279923751865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMzgnMjYuNiJTIDExMMKwMjInNDkuOSJF!5e0!3m2!1sid!2sid!4v1766393362387!5m2!1sid!2sid" width="520" height="350" style="border:0; border-radius: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
</div>

<script>
function renderStars(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
        stars += i <= rating ? '⭐' : '☆';
    }
    return stars;
}

function loadUlasan() {
    fetch('/ulasan/list')
        .then(res => res.json())
        .then(data => {
            let html = '';

            if (data.length === 0) {
                html = '<p>Belum ada ulasan pelanggan.</p>';
            } else {
                data.forEach(u => {
                    html += `
                        <div class="col-md-4">
                            <div class="p-3 bg-white shadow-sm rounded">
                                <strong>${u.nama_pelanggan}</strong><br>
                                <div style="color:#f5b301;font-size:18px">
                                    ${renderStars(u.rating)}
                                </div>
                                <p class="mt-2">"${u.komentar}"</p>
                            </div>
                        </div>
                    `;
                });
            }

            document.getElementById('ulasanList').innerHTML = html;
        });
}

// load pertama
loadUlasan();

// auto refresh
setInterval(loadUlasan, 5000);
</script>


@endsection