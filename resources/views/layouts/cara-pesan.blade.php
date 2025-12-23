@extends('layouts.main')
@section('title', 'Cara Pesan')

@section('content')
<style>
    .hero {
        background-image: url('{{ asset("images/bg carapesan.png") }}');
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 540px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero h1 {
        font-size: 40px;
        text-align: center;
        color: #000;
        font-weight: 500;
        line-height: 1.4;
        background: rgba(255, 255, 255, 0);
    }

    .steps {
        padding: 40px;
    }

    .step {
        margin-bottom: 50px;
        text-align: center;
    }

    .step h2 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .step span {
        color: #2e8b57;
    }

    .step img {
        width: 70%;
        max-width: 500px;
    }

    .step-images img {
        width: 300px;
        margin: 10px;
    }

    /* ================= ANIMASI ================= */
.animate {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease;
}

.animate.show {
    opacity: 1;
    transform: translateY(0);
}

    /* Lokasi Section */
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
</style>

<!-- HERO -->
<section class="hero">
    <h1>
      Cara Melakukan Order di Teras Bu Rini<br>
      Catering Homemade
    </h1>
</section>

<!-- LANGKAH -->
<section class="steps">
    <div class="step">
      <h2>1. Langkah Pertama – <span>Pemesanan Melalui Chatbot</span></h2>
      <img class="animate" src="{{ asset('images/carapesan1.png') }}">
    </div>

    <div class="step">
      <h2>2. Langkah Dua – <span>Pilih Menu Yang Diinginkan</span></h2>
      <img class="animate" src="{{ asset('images/carapesan2.png') }}">
    </div>
    </div>

    <div class="step">
      <h2>3. Langkah Tiga – <span>Tentukan Jumlah & Tanggal</span></h2>
      <div class="step-images">
        <img class="animate" src="{{ asset('images/carapesan3.png') }}">
            <img class="animate" src="{{ asset('images/carapesan32.png') }}">
      </div>
    </div>

    <div class="step">
      <h2>4. Langkah Empat – <span>Masukkan Data Pemesan</span></h2>
      <img class="animate" src="{{ asset('images/carapesan4.png') }}">

    </div>

    <div class="step">
      <h2>5. Langkah Lima – <span>Konfirmasi Pesanan</span></h2>
      <img class="animate" src="{{ asset('images/carapesan5.png') }}">
    </div>
</section>
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
         <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3954.3938287499977!2d110.37794107500343!3d-7.6407279923751865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMzgnMjYuNiJTIDExMMKwMjInNDkuOSJF!5e0!3m2!1sid!2sid!4v1766393362387!5m2!1sid!2sid" width="520" height="350" style="border:0; border-radius: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
</div>

<!-- ================= SCRIPT ANIMASI ================= -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const animatedItems = document.querySelectorAll(".animate");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            }
        });
    }, {
        threshold: 0.2
    });

    animatedItems.forEach(item => observer.observe(item));
});
</script>

@endsection

