@extends('layouts.app')

@section('title', 'Total Pesanan')

{{-- Menandai link sidebar 'Total Pesanan' (Total Pesanan = total-pesanan.index) sebagai aktif --}}
@section('total_pesanan_active', 'active') 
{{-- Catatan: Rute ini mungkin berbeda dari rute di Sidebar lama Anda.
     Jika Anda menggunakan logika request()->routeIs('nama.rute') di app.blade.php,
     Anda tidak perlu menggunakan @section. --}}

@push('styles')
<style>
    /* ====================================================================== */
    /* CSS SPESIFIK TOTAL PESANAN */
    /* ====================================================================== */
    
    /* Box Judul (Sesuai dengan style App sebelumnya, namun di override jika perlu) */
    .title-box {
        /* Menggunakan style layout, hanya memodifikasi teks */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Tabel Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: #fff;
        border-radius: 6px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    
    table th, table td {
        border: 1px solid #e0e0e0;
        padding: 12px 15px;
        text-align: left;
        font-size: 15px;
    }
    
    table th {
        background: #f0f0f0;
        font-weight: bold;
        color: #333;
    }
    
    /* Tambahkan sedikit style untuk judul sub-halaman */
    h3 {
        margin-top: 30px;
        font-size: 22px;
        color: #444;
    }
</style>
@endpush

@section('content')

    <div class="title-box">
        Dashboard > Total Pesanan
        <span class="breadcrumb">⚙ / Total Pesanan</span>
    </div>

    <h3>Data Total Pesanan</h3>

    <table>
        <thead>
            <tr>
                <th>No Order</th>
                <th>Nama</th>
                <th>Menu</th>
                <th>Tanggal</th>
                <th>Total Pesan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ORD001</td>
                <td>Budi Santoso</td>
                <td>Soto Ayam</td>
                <td>7 Nov 2025</td>
                <td>50 Porsi</td>
                <td>Rp 750.000</td>
            </tr>
            <tr>
                <td>ORD002</td>
                <td>Siti Nurlizah</td>
                <td>Sate Ayam</td>
                <td>10 Nov 2025</td>
                <td>55 Porsi</td>
                <td>Rp 550.000</td>
            </tr>
            <tr>
                <td>ORD003</td>
                <td>Ahmad Rizki</td>
                <td>Nasi Pecal</td>
                <td>20 Nov 2025</td>
                <td>55 Porsi</td>
                <td>Rp 660.000</td>
            </tr>
            <tr>
                <td>ORD004</td>
                <td>Ahmad Rizki</td>
                <td>Nasi Ayam Goreng</td>
                <td>25 Nov 2025</td>
                <td>55 Porsi</td>
                <td>Rp 1.100.000</td>
            </tr>
            <tr>
                <td>ORD005</td>
                <td>Ahmad Rizki</td>
                <td>Sayur Sop</td>
                <td>20 Nov 2025</td>
                <td>55 Porsi</td>
                <td>Rp 660.000</td>
            </tr>
        </tbody>
    </table>

@endsection