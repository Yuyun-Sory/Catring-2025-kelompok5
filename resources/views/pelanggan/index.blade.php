@extends('layouts.app')

@section('title', 'Data Pelanggan')

{{-- Menandai link sidebar 'Pelanggan' sebagai aktif.
     Asumsi: Anda menambahkan item 'Pelanggan' di sidebar utama. --}}
@section('pelanggan_active', 'active') 

@push('styles')
<style>
    /* ====================================================================== */
    /* CSS SPESIFIK PELANGGAN (Tabel dan Tombol) */
    /* ====================================================================== */

    /* Mengganti .breadcrumb-box dengan .title-box yang konsisten di layout */
    .breadcrumb-box {
        /* Jika Anda menggunakan .title-box dari master layout, Anda tidak perlu CSS ini */
    }

    /* ADD BUTTON */
    .add-btn {
        background: #6be38b;
        color: black;
        padding: 7px 12px;
        border-radius: 6px;
        font-size: 14px;
        border: 1px solid #3d9a56;
        float: right;
        margin-bottom: 10px;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.3s;
    }

    .add-btn:hover {
        background: #5ad27b;
    }
    
    /* TABLE */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        font-size: 17px;
        background-color: white; /* Tambahkan background agar lebih rapi */
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    table, th, td {
        border: 1px solid #ddd; /* Gunakan warna border yang lebih halus */
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background: #f0f0f0;
        text-align: center;
        font-weight: bold;
        color: #333;
    }
    
    /* Style untuk nama yang dibold di tabel */
    td b {
        font-weight: 600;
        color: #222;
    }
    
</style>
@endpush

@section('content')

    <div class="title-box">
      Dashboard > Data Pelanggan
      <span class="breadcrumb">⚙ / Pelanggan</span>
    </div>

    <div style="overflow: auto;">
        <a href="#" class="add-btn">+ Tambah Pelanggan</a>
        <h2>Data Pelanggan</h2>

        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Alamat</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td style="text-align:center;">1</td>
              <td><b>Budi Santoso</b></td>
              <td>0812-3456-7890</td>
              <td>Jl. Seturan No. 05 Yogyakarta</td>
            </tr>

            <tr>
              <td style="text-align:center;">2</td>
              <td><b>Siti Nurlizah</b></td>
              <td>0856-7890-1234</td>
              <td>Jl. Babarsari No. 15 Yogyakarta</td>
            </tr>

            <tr>
              <td style="text-align:center;">3</td>
              <td><b>Ahmad Rizky</b></td>
              <td>0898-1234-5678</td>
              <td>Jl. Mawar No. 15 Yogyakarta</td>
            </tr>
          </tbody>
        </table>
    </div>
@endsection