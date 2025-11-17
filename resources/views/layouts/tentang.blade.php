@extends('layouts.main')

@section('title', 'Tentang Kami')

@section('content')
<style>
    .about-section {
        position: relative;
        background-image: url('{{ asset('images/about-bg.jpg') }}');
        background-size: cover;
        background-position: center;
        height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding-left: 80px;
        color: #000;
    }

    .about-section::after {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(255, 255, 255, 0.5);
    }

    .about-content {
        position: relative;
        z-index: 2;
    }

    .about-content h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .about-content h2 {
        font-size: 36px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .about-content p {
        font-size: 20px;
        font-weight: 400;
    }

    .story-section {
        padding: 60px 100px;
        background-color: #fff;
        font-size: 17px;
        line-height: 1.8;
        color: #333;
        text-align: justify;
    }

    .why-section {
        background-color: #f6f6f6;
        padding: 60px 40px;
        text-align: center;
    }

    .why-section h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 40px;
        color: #222;
    }

    .why-icons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 60px;
    }

    .why-item {
        flex: 1;
        max-width: 280px;
        text-align: center;
    }

    .why-item img {
        width: 60px;
        height: 60px;
        margin-bottom: 15px;
    }

    .why-item h4 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .why-item p {
        font-size: 15px;
        color: #555;
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

<!-- Bagian Header Tentang Kami -->
<section class="about-section">
    <div class="about-content">
        <h1>Tentang Kami</h1>
        <h2>Teras Bu Rini Catering Homemade</h2>
        <p>Cerita di Balik Rasa Rumahan Kami</p>
    </div>
</section>

<!-- Bagian Cerita -->
<section class="story-section">
<p>
    Di sebuah rumah sederhana di pinggiran kota, aroma masakan hangat selalu menyambut
siapa pun yang datang. 
Dari teras itulah kisah Catering Teras Bu Rini bermula.
Berawal dari hobi memasak untuk keluarga dan tetangga, Bu Rini mulai menerima
pesanan kecil — nasi kotak untuk sebuah acara, dan oleh-oleh untuk pertemuan.
Siapa sangka, dari dapur rumahan yang penuh cinta itu lahirlah usaha katering yang kini
dipercaya banyak orang. 
Kini, Teras Bu Rini bukan sekadar tempat memesan makanan.
Ia telah menjadi simbol rasa hangat, masakan rumahan yang jujur, dan pelayanan yang
tulus. 
Setiap hidangan disiapkan dengan bahan segar, resep keluarga, dan sentuhan
khas yang membuat siapa pun merasa “pulang.” Baik untuk acara kantor, kegiatan
organisasi, maupun perayaan keluarga, Catering Teras Bu Rini selalu punya satu
resep yang tak pernah berubah — masak dengan hati, layani dengan senyum.
</p>
</section>

<!-- Bagian Mengapa Memilih Kami -->
<section class="why-section">
    <h2>Mengapa Catering Teras Bu Rini?</h2>
    <div class="why-icons">
        <div class="why-item">
            <img src="{{ asset('images/bg rumahan.png') }}" alt="Rasa Rumahan">
            <h4>Rasa Rumahan Asli</h4>
            <p>Setiap masakan dibuat dengan resep keluarga dan cita rasa autentik rumahan.</p>
        </div>
        <div class="why-item">
            <img src="{{ asset('images/bg segar.png') }}" alt="Bahan Segar">
            <h4>Bahan Segar Setiap Hari</h4>
            <p>Kami menggunakan bahan-bahan segar pilihan dari petani lokal untuk kualitas terbaik.</p>
        </div>
        <div class="why-item">
            <img src="{{ asset('images/bg pelayanan.png') }}" alt="Pelayanan Hati">
            <h4>Pelayanan Dengan Hati</h4>
            <p>Setiap pesanan kami layani dengan penuh perhatian dan senyum tulus dari tim kami.</p>
        </div>
    </div>
</section>

<!-- Bagian Lokasi -->
<section class="location-section">
    <div class="location-content">
        <div class="location-left">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Teras Bu Rini">
            <p>
                Catering Teras Bu Rini adalah penyedia jasa catering di Yogyakarta yang siap memenuhi berbagai kebutuhan konsumsi,
                mulai dari menu harian hingga acara seperti rapat, seminar, dan workshop. Kami menghadirkan hidangan lezat, bergizi,
                dan terjamin dengan cita rasa terbaik untuk setiap momen Anda.
            </p>
            <div class="social-icons mt-3">
                <a href="https://wa.me/6281234567890" target="_blank" title="WhatsApp">
                    <img src="{{ asset('icons/wa.png') }}" alt="WhatsApp">
                </a>
                <a href="https://www.instagram.com/terasburini" target="_blank" title="Instagram">
                    <img src="{{ asset('icons/ig.png') }}" alt="Instagram">
                </a>
                <a href="https://www.facebook.com/terasburini" target="_blank" title="Facebook">
                    <img src="{{ asset('icons/fb.png') }}" alt="Facebook">
                </a>
            </div>
        </div>

        <div class="location-right">
            <h4 class="fw-bold">Lokasi</h4>
            <p>📍 Garongan Kembang RT 02 RW 18, Wonokerto, Turi, Sleman 55551</p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.583459911582!2d110.378!3d-7.678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDAnNDIuOCJTIDExMMKwMjInNDEuOCJF!5e0!3m2!1sen!2sid!4v1630000000000"
                width="100%" height="230" style="border:0; border-radius:10px;" allowfullscreen=""
                loading="lazy"></iframe>
        </div>
    </div>
@endsection
