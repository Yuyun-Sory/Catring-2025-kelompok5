@extends('layouts.app')

@section('title', 'Manajemen Kategori')
@section('kategori_active', 'active')

@push('styles')
<style>
    /* ====================================================================== */
    /* CSS KATEGORI (Modern & Bersih) */
    /* ====================================================================== */

    /* Container untuk memastikan tombol global dan judul sejajar */
    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    /* Tombol Global Tambah Menu Baru */
    .btn-add-global {
        background: #007bff; /* Warna biru modern */
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: background 0.3s, transform 0.1s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .btn-add-global:hover {
        background: #0056b3;
        transform: translateY(-1px);
    }

    /* Judul Kategori (H2) */
    h2 {
        font-size: 26px;
        font-weight: bold;
        color: #333;
        padding-top: 15px;
        margin-top: 30px; /* Jarak antara kategori */
        border-bottom: 2px solid #5da770; /* Garis pemisah yang elegan */
        padding-bottom: 5px;
    }

    /* Table Container (untuk responsivitas dan shadow) */
    .table-container {
        overflow-x: auto;
        margin-top: 15px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Shadow yang lebih lembut */
    }

    table {
        width: 100%;
        border-collapse: separate; /* Menggunakan separate untuk border-radius */
        border-spacing: 0;
    }

    table th, table td {
        padding: 15px 20px; /* Padding lebih besar */
        border: none; /* Hilangkan border individual */
        border-bottom: 1px solid #eee; /* Garis horizontal halus */
        font-size: 15px;
    }

    table th {
        background: #f8f9fa; /* Header terang */
        color: #495057;
        font-weight: 700;
        text-align: left;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    /* Sudut border untuk header */
    table thead tr:first-child th:first-child { border-top-left-radius: 10px; }
    table thead tr:first-child th:last-child { border-top-right-radius: 10px; }

    /* Baris hover */
    table tbody tr:hover {
        background-color: #f1f1f1;
        transition: background-color 0.2s;
    }

    /* Thumbnails */
    .thumb {
        width: 55px;
        height: 55px;
        border-radius: 50%; /* Membuat lingkaran */
        object-fit: cover;
        border: 2px solid #ddd;
    }

    /* Action Buttons */
    .btn-action {
        padding: 6px 14px;
        border-radius: 5px;
        font-size: 13px;
        cursor: pointer;
        border: none;
        margin-right: 5px;
        font-weight: 500;
        transition: opacity 0.2s;
        background: #28a745; /* Default Edit color (Hijau Muda) */
        color: white;
    }
    
    .btn-action:hover {
        opacity: 0.85;
    }

    /* Style spesifik Hapus */
    .btn-action.danger { 
        background: #dc3545; /* Merah */
        color: white;
    }
    
    /* No Data Row */
    .nodata {
        text-align: center;
        padding: 20px !important;
        font-style: italic;
        color: #6c757d;
    }
</style>
@endpush

@section('content')

<div class="title-box">
    Dashboard > Kategori
    <span class="breadcrumb">⚙ / Kategori</span>
</div>

{{-- Memisahkan Judul Halaman dan Tombol Global --}}
<div class="header-content">
    <h1>Daftar Menu Berdasarkan Kategori</h1>
    <button class="btn-add-global" onclick="openCreateModal()">+ Tambah Menu Baru</button>
</div>

@include('kategori.create') {{-- Popup Create (Pastikan file ini ada) --}}
@include('kategori.edit')   {{-- Popup Edit (Pastikan file ini ada) --}}

{{-- ============================= --}}
{{-- TABEL DATA MAKANAN --}}
{{-- ============================= --}}
<h2>Makanan</h2>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th style="width: 15%; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($makanans as $menu)
            <tr data-kategori="{{ $menu->kategori }}">
                <td>{{ $menu->nama_menu }}</td>
                <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                <td><img class="thumb" src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}"></td>
                <td style="text-align: center;">
                    <button class="btn-action" onclick="openEditModal({{ $menu->id }})">Edit</button>

                    <form action="{{ route('kategori.destroy', $menu->id) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu {{ $menu->nama_menu }}?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-action danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="nodata">Tidak ada data Makanan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- ============================= --}}
{{-- TABEL DATA MINUMAN --}}
{{-- ============================= --}}
<h2>Paket Minuman</h2>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th style="width: 15%; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($minumans as $menu)
            <tr data-kategori="{{ $menu->kategori }}">
                <td>{{ $menu->nama_menu }}</td>
                <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                <td><img class="thumb" src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}"></td>
                <td style="text-align: center;">
                    <button class="btn-action" onclick="openEditModal({{ $menu->id }})">Edit</button>

                    <form action="{{ route('kategori.destroy', $menu->id) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu {{ $menu->nama_menu }}?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-action danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="nodata">Tidak ada data Minuman.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>


{{-- ============================= --}}
{{-- TABEL DATA CEMILAN --}}
{{-- ============================= --}}
<h2>Cemilan</h2>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th style="width: 15%; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cemilans as $menu)
            <tr data-kategori="{{ $menu->kategori }}">
                <td>{{ $menu->nama_menu }}</td>
                <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                <td><img class="thumb" src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}"></td>
                <td style="text-align: center;">
                    <button class="btn-action" onclick="openEditModal({{ $menu->id }})">Edit</button>

                    <form action="{{ route('kategori.destroy', $menu->id) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu {{ $menu->nama_menu }}?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-action danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="nodata">Tidak ada data Cemilan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>


{{-- ============================= --}}
{{-- TABEL DATA OLEH-OLEH --}}
{{-- ============================= --}}
<h2>Oleh-Oleh</h2>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th style="width: 15%; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($oleholeh as $menu)
            <tr data-kategori="{{ $menu->kategori }}">
                <td>{{ $menu->nama_menu }}</td>
                <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                <td><img class="thumb" src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}"></td>
                <td style="text-align: center;">
                    <button class="btn-action" onclick="openEditModal({{ $menu->id }})">Edit</button>

                    <form action="{{ route('kategori.destroy', $menu->id) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu {{ $menu->nama_menu }}?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-action danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="nodata">Tidak ada data Oleh-Oleh.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- ============================= --}}
{{-- SCRIPT MODAL CREATE & EDIT --}}
{{-- ============================= --}}
<script>
    // === MODAL CREATE ===
    function openCreateModal() {
        document.getElementById('createModal').style.display = 'block';
    }
    function closeCreateModal() {
        document.getElementById('createModal').style.display = 'none';
    }

    // === MODAL EDIT ===
    function openEditModal(id) {
        let row = event.target.closest('tr');
        let nama = row.children[0].innerText;
        // Menghapus format Rupiah (Rp, titik) sebelum dimasukkan ke input harga
        let harga = row.children[1].innerText.replace('Rp ', '').replace(/\./g,''); 
        let fotoSrc = row.children[2].querySelector('img').src;
        let kategori = row.dataset.kategori;

        document.getElementById('edit-id').value = id;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-harga').value = harga;
        document.getElementById('edit-kategori').value = kategori;
        document.getElementById('current-photo').innerHTML = '<img src="'+fotoSrc+'" width="100">';
        
        // Mengarahkan form edit ke URL update yang benar
        document.getElementById('editForm').action = '{{ url('kategori') }}/' + id; 

        document.getElementById('editModal').style.display = 'block';
    }
    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    // Klik di luar modal → tutup
    window.onclick = function(event) {
        let createModal = document.getElementById('createModal');
        let editModal = document.getElementById('editModal');
        if (event.target == createModal) closeCreateModal();
        if (event.target == editModal) closeEditModal();
    }
</script>

@endsection