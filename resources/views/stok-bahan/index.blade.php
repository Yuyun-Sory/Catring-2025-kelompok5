@extends('layouts.app')

@section('title', 'Stok Bahan')
@section('stok_bahan_active', 'active')

@section('content')

<style>
/* ===================  GLOBAL  =================== */
body {
    font-family: 'Inter', sans-serif;
}

/* ===================  STATISTICS CARDS  =================== */
.stats-card {
    padding: 20px;
    background: #0071f7;
    color: white;
    border-radius: 14px;
    width: 180px;
    text-align: center;
    box-shadow: 0 3px 8px rgba(0,0,0,0.12);
}

.stats-card.yellow {
    background: #00baff;
}

.stats-card.green {
    background: #006bff;
}

.stats-value {
    font-size: 26px;
    font-weight: 700;
}

.stats-label {
    font-size: 14px;
    margin-top: 6px;
}

/* ===================  TAMBAH BAHAN BUTTON  =================== */
.add-button {
    padding: 10px 18px;
    background: #31d078;
    color: white;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    transition: .2s;
}

.add-button:hover {
    background: #28b969;
}

/* ===================  FILTER BUTTONS  =================== */
.filter-btn {
    padding: 8px 18px;
    border-radius: 12px;
    background: #e6e6e6;
    border: none;
    cursor: pointer;
    font-size: 15px;
    transition: 0.2s;
}

.filter-btn:hover {
    background: #d5d5d5;
}

.filter-active {
    background: #baf1c3 !important;
    font-weight: bold;
    color: #127a38 !important;
}

/* ===================  SEARCH BAR  =================== */
.search-box {
    width: 100%;
    padding: 12px 45px;
    border-radius: 10px;
    border: 1px solid #c7c7c7;
    font-size: 16px;
    background: url('https://cdn-icons-png.flaticon.com/512/622/622669.png') no-repeat 14px center;
    background-size: 18px;
}

/* ===================  TABLE STYLE  =================== */
.table-wrapper {
    background: white;
    padding: 20px;
    border-radius: 14px;
    margin-top: 15px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.08);
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th {
    background: #f7f7f7;
    padding: 14px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    font-size: 15px;
    font-weight: 700;
}

table td {
    padding: 13px;
    border-bottom: 1px solid #eee;
    font-size: 15px;
}

/* ===================  BADGE STATUS  =================== */
.badge {
    padding: 5px 12px;
    border-radius: 6px;
    font-weight: 600;
    color: white;
    font-size: 13px;
}

.badge-tipis {
    background: #ff5454;
}

.badge-aman {
    background: #27c160;
}

/* ===================  ACTION ICONS  =================== */
.action-icon {
    font-size: 20px;
    text-decoration: none;
    margin-right: 8px;
    cursor: pointer;
}

.action-icon:hover {
    opacity: 0.7;
}

.delete-form button {
    border: none;
    background: none;
    cursor: pointer;
    font-size: 20px;
}
</style>

<h1 style="font-size:32px; font-weight:bold; margin-bottom:20px;">📦 Stok Bahan</h1>

{{-- STATISTIC CARDS --}}
<div style="display:flex; gap:20px; margin-bottom:25px; align-items: center;">

    <div class="stats-card">
        <div class="stats-value">{{ $total_bahan }}</div>
        <div class="stats-label">Total Bahan</div>
    </div>

    <div class="stats-card yellow">
        <div class="stats-value">{{ $stok_menipis }}</div>
        <div class="stats-label">Stok Menipis</div>
    </div>

    <div class="stats-card green" style="width:220px;">
        <div class="stats-value">Rp {{ number_format($total_nilai_stok, 0, ',', '.') }}</div>
        <div class="stats-label">Total Nilai Stok</div>
    </div>

    <a href="{{ route('stok.bahan.create') }}" class="add-button" style="margin-left:auto;">
        + Tambah Bahan
    </a>

</div>

{{-- FILTER BUTTONS --}}
<div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:20px;">
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

                    <form action="{{ route('stok.bahan.destroy', $bahan->id) }}" method="POST" class="delete-form" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus bahan {{ $bahan->nama }}?')">🗑️</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align:center; padding:20px;">Tidak ada data.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {

    var activeFilters = { status: 'Semua', category: 'Semua' };

    function applyFilter() {
        var search = $('#search-input').val().toLowerCase();

        $('#stok-table-body tr').each(function() {
            var row = $(this);
            var rowStatus = row.data('status');
            var rowCat = row.data('kategori');
            var keywords = row.data('keywords');

            var matchStatus = (activeFilters.status === 'Semua' || rowStatus === activeFilters.status);
            var matchCat    = (activeFilters.category === 'Semua' || rowCat === activeFilters.category);
            var matchSearch = keywords.includes(search);

            if (matchStatus && matchCat && matchSearch) row.show();
            else row.hide();
        });
    }

    $('.filter-btn').click(function() {
        var type = $(this).data('type');
        var value = $(this).data('filter');

        if (type === "all") {
            activeFilters.status = "Semua";
            activeFilters.category = "Semua";
        }
        if (type === "status") {
            activeFilters.status = value;
            activeFilters.category = "Semua";
        }
        if (type === "category") {
            activeFilters.category = value;
            activeFilters.status = "Semua";
        }

        $('.filter-btn').removeClass('filter-active');
        $(this).addClass('filter-active');

        applyFilter();
    });

    $('#search-input').keyup(function() {
        applyFilter();
    });

    applyFilter();
});
</script>
@endpush
