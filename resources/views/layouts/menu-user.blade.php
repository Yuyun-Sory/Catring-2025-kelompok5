@extends('layouts.main')

@section('title', 'Menu')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .hero-section {
        position: relative;
        width: 100%;
        height: 300px;
        background: url('{{ asset('images/bg menu.png') }}') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }
.hero-section h1 {
    font-size: 46px;
    font-weight: 800;
    color: #ffffff;

    /* Biar teksnya muncul jelas di atas background */
    text-shadow:
        0 0 6px rgba(0, 0, 0, 0.9),
        0 0 12px rgba(0, 0, 0, 0.9),
        0 0 20px rgba(0, 0, 0, 0.8),
        0 0 35px rgba(0, 0, 0, 0.7);

    letter-spacing: 1.5px;
    padding: 8px 20px;
    border-radius: 8px;
}
 

    }

    .menu-section {
        padding: 50px 100px;
        background-color: #fff;
    }

    .menu-section h2 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #222;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .menu-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #eee;
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 16px rgba(0, 0, 0, 0.15);
    }

    .menu-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .menu-info {
        background: linear-gradient(to top, #f9f9f9, #ffffff);
        padding: 10px 15px 15px;
        position: relative;
    }

    .menu-info h4 {
        font-size: 15px;
        font-weight: 600;
        color: #222;
        margin-bottom: 5px;
    }

    .menu-info p {
        font-size: 13px;
        color: #666;
        margin-bottom: 10px;
    }

    .menu-btn {
        background-color: #22c55e;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 3px 10px;
        font-size: 13px;
        position: absolute;
        right: 15px;
        top: 10px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .menu-btn:hover {
        background-color: #16a34a;
    }

    .menu-rating {
        font-size: 14px;
        color: #f59e0b;
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .menu-rating span {
        color: #555;
        font-weight: 500;
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

    .social-icons a img {
        width: 32px;
        margin-right: 12px;
        transition: transform 0.2s ease;
    }

    .social-icons a img:hover {
        transform: scale(1.1);
    }

    .location-right {
        flex: 1;
        min-width: 320px;
    }

    footer {
        text-align: center;
        font-size: 14px;
        color: #333;
        margin-top: 20px;
    }
</style>

<section class="hero-section">
    <h1>Daftar Menu Yang Tersedia</h1>
</section>


@foreach($kategori as $key => $items)
<section class="menu-section">
    <h2>{{ $key }}</h2>
    <div class="menu-grid">
        @foreach($items as $item)
        <div class="menu-card">
            <img src="{{ $item->foto ? asset('storage/'.$item->foto) : asset('images/default.png') }}" alt="{{ $item->nama_menu }}">
            <div class="menu-info">
                <h4>{{ $item->nama_menu }} Rp {{ number_format($item->harga,0,',','.') }}</h4>
                <p>Minimal Rp {{ number_format($item->harga,0,',','.') }}</p>
                <a href="{{ route('menuUser', ['id' => $item->id_menu]) }}" class="menu-btn">Lihat</a>


                <div class="menu-rating">⭐ <span>{{ $item->rating ?? '5.0' }}</span></div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endforeach



<!-- <section class="menu-section">
    <h2>Makanan</h2>

    <div class="menu-grid">
        <div class="menu-card">
            <img src="{{ asset('images/Soto ayam.png') }}" alt="Soto Ayam">
            <div class="menu-info">
                <h4>Soto Ayam Rp 15.000</h4>
                <p>Minimal Rp 15.000</p>
                <a href="{{ route('menu.detail', 'soto-ayam') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>5.0</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/Nasi ayam goreng.png') }}" alt="Nasi Ayam Goreng">
            <div class="menu-info">
                <h4>Nasi Ayam Goreng Rp 20.000</h4>
                <p>Minimal Rp 20.000</p>
                <a href="{{ route('menu.detail', 'Nasi-Ayam-Goreng') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.8</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/Nasi pecal.png') }}" alt="Nasi Pecel">
            <div class="menu-info">
                <h4>Nasi Pecel Rp 12.000</h4>
                <p>Minimal Rp 12.000</p>
                <a href="{{ route('menu.detail', 'nasi-pecal') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.9</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/Sate ayam.png') }}" alt="Sate Ayam">
            <div class="menu-info">
                <h4>Sate Ayam Rp 10.000</h4>
                <p>Minimal Rp 10.000</p>
                <a href="{{ route('menu.detail', 'sate-ayam') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.7</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/sayur sop.png') }}" alt="Sayur Sop">
            <div class="menu-info">
                <h4>Sayur Sop Rp 10.000</h4>
                <p>Minimal Rp 10.000</p>
                <a href="{{ route('menu.detail', 'sop-sayur') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.5</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/mie goreng.png') }}" alt="Mie Goreng Telur">
            <div class="menu-info">
                <h4>Mie Goreng Telur Rp 8.000</h4>
                <p>Minimal Rp 8.000</p>
                <a href="{{ route('menu.detail', 'mie-goreng-telur') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.7</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/mie rebus.png') }}" alt="Mie Rebus Telur">
            <div class="menu-info">
                <h4>Mie Rebus Telur Rp 7.000</h4>
                <p>Minimal Rp 7.000</p>
                <a href="{{ route('menu.detail', 'mie-rebus-telur') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.7</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/bakwan kawi.png') }}" alt="Bakwan Kawi Bakso">
            <div class="menu-info">
                <h4>Bakwan Kawi Bakso Rp 6.000</h4>
                <p>Minimal Rp 6.000</p>
                <a href="{{ route('menu.detail', 'bakwan-kawi-bakso') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.2</span></div>
            </div>
        </div>
    </div>
</section>
<section class="menu-section">
    <h2>Paket Minuman</h2>

    <div class="menu-grid">
        <div class="menu-card">
            <img src="{{ asset('images/teh manis.png') }}" alt="Teh Manis Dingin">
            <div class="menu-info">
                <h4>Teh Manis Dingin Rp 5.000</h4>
                <p>Minimal Rp 5.000</p>
                <a href="{{ route('menu.detail', 'Teh') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.6</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/wedang susu jahe.png') }}" alt="Wedang Jahe Merah Susu">
            <div class="menu-info">
                <h4>Wedang Jahe Merah Susu Rp 8.000</h4>
                <p>Minimal Rp 8.000</p>
                <a href="{{ route('menu.detail', 'wedang-jahe-merah-susu') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.9</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/kopi hitam.png') }}" alt="Kopi Hitam">
            <div class="menu-info">
                <h4>Kopi Hitam Rp 5.000</h4>
                <p>Minimal Rp 5.000</p>
                <a href="{{ route('menu.detail', 'kopi-hitam') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.7</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/wedang jahe merah.png') }}" alt="Wedang Jahe Merah">
            <div class="menu-info">
                <h4>Wedang Jahe Merah Rp 9.000</h4>
                <p>Minimal Rp 9.000</p>
                <a href="{{ route('menu.detail', 'wedang-jahe-merah') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.8</span></div>
            </div>
        </div>
    </div>
</section>
<section class="menu-section">
    <h2>Paket Cemilan</h2>

    <div class="menu-grid">
        <div class="menu-card">
            <img src="{{ asset('images/tempe mendoan.png') }}" alt="Tempe Mendoan">
            <div class="menu-info">
                <h4>Tempe Mendoan Rp 6.000</h4>
                <p>Minimal Rp 6.000</p>
                <a href="{{ route('menu.detail', 'tempe-mendoan') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.8</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/Bakwan.png') }}" alt="Bakwan">
            <div class="menu-info">
                <h4>Bakwan Rp 5.000</h4>
                <p>Minimal Rp 5.000</p>
                <a href="{{ route('menu.detail', 'bakwan') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.7</span></div>
            </div>
        </div>
    </div>
</section>
<section class="menu-section">
    <h2>Paket Oleh-Oleh</h2>

    <div class="menu-grid">
        <div class="menu-card">
            <img src="{{ asset('images/bolu kukus pandan.png') }}" alt="Bolu Kukus Pandan Original">
            <div class="menu-info">
                <h4>Bolu Kukus Pandan Original Rp 25.000 Ukuran 22 x 10 x 5 cm</h4>
                <p>Minimal Rp 15.000</p>
                <a href="{{ route('menu.detail', 'bolu-kukus-pandan-original') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.8</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/bolu kukus pandan keju.png') }}" alt="Bolu Kukus Pandan Keju">
            <div class="menu-info">
                <h4>Bolu Kukus Pandan Keju Rp 30.000 Ukuran 22 x 10 x 5 cm</h4>
                <p>Minimal Rp 10.000</p>
                <a href="{{ route('menu.detail', 'bolu-kukus-pandan-keju') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.6</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/boluu kukus pandan keju.png') }}" alt="Bolu Kukus Pandan Keju">
            <div class="menu-info">
                <h4>Bolu Kukus Pandan Keju Rp 25.000 Ukuran 15 x 10 x 5 cm</h4>
                <p>Minimal Rp 12.000</p>
                <a href="{{ route('menu.detail', 'bolu-kukus-pandan-keju 15 x 10 x 5 cm') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.9</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/produk5.png') }}" alt="Produk 5">
            <div class="menu-info">
                <h4>Jahe Merah Instan Rp 13.000</h4>
                <p>Minimal Rp 18.000</p>
                <a href="{{ route('menu.detail', 'jahe-merah') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.7</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/Bolu kukus original.png') }}" alt="Bolu Kukus Original">
            <div class="menu-info">
                <h4>Bolu Kukus Pandan Original Rp 17.000 Ukuran 15 x 10 x 5 cm</h4>
                <p>Minimal Rp 20.000</p>
                <a href="{{ route('menu.detail', 'bolu-kukus-pandan-original ukuran 15 x 10 x 5 cm') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.8</span></div>
            </div>
        </div>

        <div class="menu-card">
            <img src="{{ asset('images/Telur asin.png') }}" alt="Telur Asin">
            <div class="menu-info">
                <h4>Telur Asin Rp 3.500</h4>
                <p>Minimal Rp 15.000</p>
                <a href="{{ route('menu.detail', 'telur-asin') }}" class="menu-btn">Lihat</a>
                <div class="menu-rating">⭐ <span>4.9</span></div>
            </div>
        </div>
    </div>
</section> -->



<div style="text-align: center; margin: 60px 0;">
    Nikmati hidangan lezat dan berkualitas dari kami! <br>
    Semua menu dibuat dengan bahan segar dan cita rasa terbaik. <br>
    Pesan sekarang untuk acara spesial Anda mulai dari Makanan, Oleh-oleh, hingga menu rumahan favorit!
</div>
<!-- Bagian Lokasi -->
<section class="location-section">
    <div class="location-content">
        <div class="location-left">
            <img src="{{ asset('images/bg teras.png') }}" alt="Logo Teras Bu Rini">
            <p>
                Catering Teras Bu Rini adalah penyedia jasa catering di Yogyakarta yang siap memenuhi berbagai kebutuhan konsumsi,
                mulai dari menu harian hingga acara seperti rapat, seminar, dan workshop. Kami menghadirkan hidangan lezat, bergizi,
                dan terjamin dengan cita rasa terbaik untuk setiap momen Anda.
            </p>
            <div class="social-icons mt-3">
                <a href="https://wa.me/+6285727120836" target="_blank" title="WhatsApp">
                    <img src="{{ asset('icons/wa.png') }}" alt="WhatsApp">
                </a>
            </div>
        </div>

        <div class="location-right">
            <h4 class="fw-bold">Lokasi</h4>
            <p>📍 Garongan Kembang RT 02 RW 18, Wonokerto, Turi, Sleman 55551</p>
            <iframe
                src="https://maps.app.goo.gl/qjhLBcUozy9fDnH38?g_st=ic"
                width="100%" height="230" style="border:0; border-radius:10px;" allowfullscreen=""
                loading="lazy"></iframe>
        </div>
</div>
@endsection