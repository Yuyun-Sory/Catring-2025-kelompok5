@extends('layouts.app')

@section('title', 'Stok Bahan')
@section('stok_bahan_active', 'active')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/stok-bahan.css') }}">
@endpush

@section('content')
<div class="p-4">


<h1 class="page-title">Stok Bahan </h1>

{{-- STATISTICS CARDS --}}
<div class="stats-container">
    <div class="stats-card blue">
        <div class="stats-value">{{ $total_bahan }}</div>
        <div class="stats-label">Total Bahan</div>
    </div>

    <div class="stats-card yellow">
        <div class="stats-value">{{ $stok_menipis }}</div>
        <div class="stats-label">Stok Menipis</div>
    </div>

    <div class="stats-card green">
        <div class="stats-value">Rp {{ number_format($total_nilai_stok, 0, ',', '.') }}</div>
        <div class="stats-label">Total Nilai Stok</div>
    </div>

    <a href="{{ route('stok.bahan.create') }}" class="add-button">+ Tambah Bahan</a>
</div>

{{-- FILTER BUTTONS --}}
<div class="filter-container">
    <button class="filter-btn filter-active" data-filter="Semua" data-type="all">Semua</button>
    <button class="filter-btn" data-filter="Menipis" data-type="status">Menipis</button>
    <button class="filter-btn" data-filter="Aman" data-type="status">Aman</button>
    <button class="filter-btn" data-filter="Bahan Pokok" data-type="category">Bahan Pokok</button>
    <button class="filter-btn" data-filter="Protein" data-type="category">Protein</button>
    <button class="filter-btn" data-filter="Sayuran" data-type="category">Sayuran</button>
    <button class="filter-btn" data-filter="Bumbu" data-type="category">Bumbu</button>
    <button class="filter-btn" data-filter="Lainnya" data-type="category">Lainnya</button>
</div>

{{-- SEARCH --}}
<input type="text" id="search-input" placeholder="Cari bahan (Nama, Lokasi, Kategori)" class="search-box">

{{-- TABLE --}}
<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Nama Bahan</th>
                <th>Kategori</th>
                <th>Stok Saat Ini</th>
                <th>Status</th>
                <th>Harga / Satuan</th>
                <th>Lokasi</th>
                <th style="text-align:center; width:80px;">Aksi</th>
            </tr>
        </thead>
        <tbody id="stok-table-body">
            @forelse ($bahans as $bahan)
            <tr 
                data-kategori="{{ $bahan->kategori }}"
                data-status="{{ $bahan->status }}"
                data-keywords="{{ strtolower($bahan->nama.' '.$bahan->lokasi.' '.$bahan->kategori) }}"
            >
                <td>{{ $bahan->nama }}</td>
                <td>{{ $bahan->kategori }}</td>
                <td>{{ $bahan->stok_saat_ini }} {{ $bahan->satuan }}</td>
                <td>
                    <span class="badge badge-{{ $bahan->status == 'Menipis' ? 'tipis' : 'aman' }}">
                        {{ $bahan->status }}
                    </span>
                </td>
                <td>Rp {{ number_format($bahan->harga_satuan, 0, ',', '.') }}</td>
                <td>{{ $bahan->lokasi }}</td>
                <td style="text-align:center;">
                    <a href="{{ route('stok.bahan.edit', $bahan->id) }}" class="action-icon">✏️</a>
                    <form action="{{ route('stok.bahan.destroy', $bahan->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus bahan {{ $bahan->nama }}?')">🗑️</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="no-data">Tidak ada data.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
</div>
@push('scripts')
<script>
$(document).ready(function() {

    function applyFilter(filterType, filterValue) {
        $('#stok-table-body tr').each(function() {
            var row = $(this);
            var status = row.data('status');
            var kategori = row.data('kategori');

            if(filterType === 'status') {
                if(filterValue === 'Semua' || status === filterValue) row.show();
                else row.hide();
            } 
            else if(filterType === 'category') {
                if(filterValue === 'Semua' || kategori === filterValue) row.show();
                else row.hide();
            }
            else if(filterType === 'all') {
                row.show();
            }
        });
    }

    // Filter button click
    $('.filter-btn').click(function() {
        var type = $(this).data('type');
        var value = $(this).data('filter');

        // Hapus kelas aktif dari grup tombol yang sama
        $('.filter-btn').filter('[data-type="'+type+'"]').removeClass('filter-active');
        $(this).addClass('filter-active');

        applyFilter(type, value);

        // Reset search ketika filter diganti
        $('#search-input').val('');
    });

    // Search input
    $('#search-input').on('keyup', function() {
        var search = $(this).val().toLowerCase();
        $('#stok-table-body tr:visible').each(function() {
            var row = $(this);
            var keywords = row.data('keywords');
            if(keywords.includes(search)) row.show();
            else row.hide();
        });
    });

});
</script>
@endpush
