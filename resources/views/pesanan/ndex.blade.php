@extends('layouts.app')

@section('title', 'Pesanan Baru')

{{-- Menandai link sidebar 'Pemesanan Masuk' sebagai aktif --}}
@section('pemesanan_active', 'active') 
{{-- Catatan: Logika active class di app.blade.php sudah menggunakan request()->routeIs('pemesanan.masuk') --}}

@push('styles')
<style>
    /* ====================================================================== */
    /* CSS SPESIFIK PESANAN BARU (Tabel dan Aksi) */
    /* ====================================================================== */

    /* Sub-Heading */
    h2 {
        margin-top: 30px;
        color: #333;
    }
    
    /* TABLE */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        font-size: 15px;
        background-color: white; 
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 12px 15px;
        text-align: left;
    }

    th {
        background: #f0f0f0;
        text-align: center;
        font-weight: bold;
        color: #333;
    }
    
    /* Status Badge */
    .status-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: bold;
        font-size: 13px;
    }
    .status-baru { background-color: #ffe0b2; color: #e65100; border: 1px solid #ff9800; }
    
    /* Action Buttons dalam Tabel */
    .action-group button {
        padding: 6px 10px;
        border: none;
        border-radius: 4px;
        margin-right: 5px;
        cursor: pointer;
        color: white;
        font-size: 13px;
        transition: background 0.2s;
    }
    .process-btn { background: #007bff; }
    .detail-btn { background: #28a745; }
    
    .process-btn:hover { background: #0056b3; }
    .detail-btn:hover { background: #1e7e34; }
</style>
@endpush

@section('content')

    <div class="title-box">
      Pemesanan Masuk
      <span class="breadcrumb">⚙ / Pemesanan Masuk</span>
    </div>

    <div style="overflow: auto;">
        <h2>Daftar Pesanan Baru (Belum Diproses)</h2>

        <table>
          <thead>
            <tr>
              <th>No Order</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal Order</th>
              <th>Total Item</th>
              <th>Status</th>
              <th style="text-align:center;">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>ORD006</td>
              <td>Dani Permana</td>
              <td>20 Des 2025, 10:00</td>
              <td>3 Item</td>
              <td style="text-align:center;">
                  <span class="status-badge status-baru">Baru</span>
              </td>
              <td class="action-group" style="text-align:center;">
                <button class="process-btn">Proses</button>
                <button class="detail-btn">Detail</button>
              </td>
            </tr>

            <tr>
              <td>ORD007</td>
              <td>Rina Dewi</td>
              <td>20 Des 2025, 11:30</td>
              <td>5 Item</td>
              <td style="text-align:center;">
                  <span class="status-badge status-baru">Baru</span>
              </td>
              <td class="action-group" style="text-align:center;">
                <button class="process-btn">Proses</button>
                <button class="detail-btn">Detail</button>
              </td>
            </tr>
            
            {{-- Tambahkan lebih banyak baris data sesuai kebutuhan --}}
            
          </tbody>
        </table>
    </div>
@endsection