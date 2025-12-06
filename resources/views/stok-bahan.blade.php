@extends('layouts.app')

@section('title', 'Stok Bahan')

@section('content')

<style>
    /* ---------------------------------------------------------------------- */
    /* CUSTOM STYLES UNTUK HALAMAN INI */
    /* ---------------------------------------------------------------------- */
    .filter-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        background: #e5e5e5;
    }
    .filter-active {
        background: #7beb8b !important; /* Warna hijau aktif */
        font-weight: bold;
    }
    .search-input {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #aaa;
        margin-bottom: 20px;
        font-size: 16px;
    }
    table th {
        font-weight: bold;
        font-size: 16px;
    }
    table td {
        border-bottom: 1px solid #eee;
    }
    /* STYLING BADGE STATUS */
    .badge {
        padding: 4px 10px;
        border-radius: 4px;
        color: white;
        font-weight: bold;
        font-size: 13px;
    }
    .badge-tipis { background: #ff6f6f; } /* Merah */
    .badge-aman { background: #4caf50; }  /* Hijau */
    .action-icon {
        cursor: pointer;
        font-size: 18px;
        margin: 0 5px;
    }
</style>

<h1 style="font-size:32px; font-weight:bold; margin-bottom:20px;">
    Stok Bahan
</h1>

<div style="display:flex; gap:20px; margin-bottom:25px;">

    <div style="padding:20px; background:#0066ff; color:white; border-radius:10px; width:180px; text-align:center;">
        <div style="font-size:24px; font-weight:bold;">8</div>
        <div>Total Bahan</div>
    </div>

    <div style="padding:20px; background:#ffc107; color:black; border-radius:10px; width:180px; text-align:center;">
        <div style="font-size:24px; font-weight:bold;">3</div>
        <div>Stok Menipis</div>
    </div>

    <div style="padding:20px; background:#0077ff; color:white; border-radius:10px; width:220px; text-align:center;">
        <div style="font-size:18px; font-weight:bold;">Rp 4.211.000</div>
        <div>Total Nilai Stok</div>
    </div>

    <button style="margin-left:auto; padding:10px 18px; background:#007bff; color:white; border:none; border-radius:8px;">
        + Tambah Bahan
    </button>

</div>

<div style="display:flex; gap:10px; margin-bottom:10px;">
    {{-- Tambahkan data-filter untuk status dan kategori --}}
    <button class="filter-btn filter-active" data-filter="Semua" data-type="all">Semua</button>
    <button class="filter-btn" data-filter="Menipis" data-type="status">Menipis</button>
    <button class="filter-btn" data-filter="Aman" data-type="status">Aman</button>
    <button class="filter-btn" data-filter="Bahan Pokok" data-type="category">Bahan Pokok</button>
    <button class="filter-btn" data-filter="Protein" data-type="category">Protein</button>
</div>

<div style="display:flex; gap:10px; margin-bottom:20px;">
    <button class="filter-btn" data-filter="Sayuran" data-type="category">Sayuran</button>
    <button class="filter-btn" data-filter="Bumbu" data-type="category">Bumbu</button>
    <button class="filter-btn" data-filter="Lainnya" data-type="category">Lainnya</button>
</div>

<input type="text" id="search-input" placeholder="Cari bahan (Nama, Lokasi, Kategori)" class="search-input">

<div style="background:white; padding:20px; border-radius:12px;">
    <table style="width:100%; border-collapse:collapse;">

        <thead>
            <tr style="background:#f0f0f0;">
                <th style="padding:12px; border-bottom:1px solid #ddd;">Nama Bahan</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Kategori</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Stok Saat Ini</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Status</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Harga / Satuan</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Lokasi</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Aksi</th>
            </tr>
        </thead>

        <tbody id="stok-table-body">
            {{-- Tambahkan data-kategori dan data-status pada setiap TR --}}
            
            {{-- AMAN --}}
            <tr data-kategori="Bahan Pokok" data-status="Aman" data-keywords="Beras Premium 50 Kg 20 Kg Gudang A">
                <td style="padding:12px;">Beras Premium</td>
                <td style="padding:12px;">Bahan Pokok</td>
                <td style="padding:12px;">50 Kg</td>
                <td style="padding:12px;"><span class="badge badge-aman">Aman</span></td>
                <td style="padding:12px;">Rp 15.000</td>
                <td style="padding:12px;">Gudang A</td>
                <td style="padding:12px;">
                    <span class="action-icon">✏️</span>
                    <span class="action-icon">🗑️</span>
                </td>
            </tr>

            {{-- MENIPIS: 8 Kg < 10 Kg --}}
            <tr data-kategori="Protein" data-status="Menipis" data-keywords="Ayam Potong 8 Kg 10 Kg Freezer 1">
                <td style="padding:12px;">Ayam Potong</td>
                <td style="padding:12px;">Protein</td>
                <td style="padding:12px;">8 Kg</td>
                <td style="padding:12px;"><span class="badge badge-tipis">Menipis</span></td>
                <td style="padding:12px;">Rp 35.000</td>
                <td style="padding:12px;">Freezer 1</td>
                <td style="padding:12px;">
                    <span class="action-icon">✏️</span>
                    <span class="action-icon">🗑️</span>
                </td>
            </tr>

            {{-- MENIPIS: 5 Kg <= 5 Kg (Asumsi kurang dari atau sama dengan dianggap menipis) --}}
            <tr data-kategori="Sayuran" data-status="Menipis" data-keywords="Cabai Merah 5 Kg 5 Kg Kulkas">
                <td style="padding:12px;">Cabai Merah</td>
                <td style="padding:12px;">Sayuran</td>
                <td style="padding:12px;">5 Kg</td>
                <td style="padding:12px;"><span class="badge badge-tipis">Menipis</span></td>
                <td style="padding:12px;">Rp 45.000</td>
                <td style="padding:12px;">Kulkas</td>
                <td style="padding:12px;">
                    <span class="action-icon">✏️</span>
                    <span class="action-icon">🗑️</span>
                </td>
            </tr>

            {{-- AMAN --}}
            <tr data-kategori="Bahan Pokok" data-status="Aman" data-keywords="Minyak Goreng 25 Liter 15 Liter Gudang A">
                <td style="padding:12px;">Minyak Goreng</td>
                <td style="padding:12px;">Bahan Pokok</td>
                <td style="padding:12px;">25 Liter</td>
                <td style="padding:12px;"><span class="badge badge-aman">Aman</span></td>
                <td style="padding:12px;">Rp 15.000</td>
                <td style="padding:12px;">Gudang A</td>
                <td style="padding:12px;">
                    <span class="action-icon">✏️</span>
                    <span class="action-icon">🗑️</span>
                </td>
            </tr>

            {{-- AMAN --}}
            <tr data-kategori="Protein" data-status="Aman" data-keywords="Telur Ayam 100 butir 50 butir Kulkas">
                <td style="padding:12px;">Telur Ayam</td>
                <td style="padding:12px;">Protein</td>
                <td style="padding:12px;">100 butir</td>
                <td style="padding:12px;"><span class="badge badge-aman">Aman</span></td>
                <td style="padding:12px;">Rp 2.500</td>
                <td style="padding:12px;">Kulkas</td>
                <td style="padding:12px;">
                    <span class="action-icon">✏️</span>
                    <span class="action-icon">🗑️</span>
                </td>
            </tr>

            {{-- AMAN --}}
            <tr data-kategori="Bumbu" data-status="Aman" data-keywords="Bawang Merah 12 Kg 6 Kg Gudang B">
                <td style="padding:12px;">Bawang Merah</td>
                <td style="padding:12px;">Bumbu</td>
                <td style="padding:12px;">12 Kg</td>
                <td style="padding:12px;"><span class="badge badge-aman">Aman</span></td>
                <td style="padding:12px;">Rp 30.500</td>
                <td style="padding:12px;">Gudang B</td>
                <td style="padding:12px;">
                    <span class="action-icon">✏️</span>
                    <span class="action-icon">🗑️</span>
                </td>
            </tr>

            {{-- MENIPIS: 3 Kg < 5 Kg --}}
            <tr data-kategori="Sayuran" data-status="Menipis" data-keywords="Tomat 3 Kg 5 Kg Kulkas">
                <td style="padding:12px;">Tomat</td>
                <td style="padding:12px;">Sayuran</td>
                <td style="padding:12px;">3 Kg</td>
                <td style="padding:12px;"><span class="badge badge-tipis">Menipis</span></td>
                <td style="padding:12px;">Rp 12.000</td>
                <td style="padding:12px;">Kulkas</td>
                <td style="padding:12px;">
                    <span class="action-icon">✏️</span>
                    <span class="action-icon">🗑️</span>
                </td>
            </tr>

            {{-- AMAN --}}
            <tr data-kategori="Protein" data-status="Aman" data-keywords="Daging Sapi 15 Kg 10 Kg Freezer 2">
                <td style="padding:12px;">Daging Sapi</td>
                <td style="padding:12px;">Protein</td>
                <td style="padding:12px;">15 Kg</td>
                <td style="padding:12px;"><span class="badge badge-aman">Aman</span></td>
                <td style="padding:12px;">Rp 120.000</td>
                <td style="padding:12px;">Freezer 2</td>
                <td style="padding:12px;">
                    <span class="action-icon">✏️</span>
                    <span class="action-icon">🗑️</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection

{{-- JAVASCRIPT UNTUK FILTER DAN SEARCH --}}
@push('scripts')
<script>
    $(document).ready(function() {
        // Objek untuk melacak filter yang aktif (bisa status, bisa kategori)
        var activeFilters = {
            status: 'Semua', // Default: Semua
            category: 'Semua' // Default: Semua
        };

        // --- FUNGSI UTAMA UNTUK FILTER DAN SEARCH ---
        function applyFilterAndSearch() {
            var searchText = $('#search-input').val().toLowerCase().trim();
            var statusFilter = activeFilters.status;
            var categoryFilter = activeFilters.category;
            
            $('#stok-table-body tr').each(function() {
                var $row = $(this);
                var rowStatus = $row.data('status'); // Aman atau Menipis
                var rowCategory = $row.data('kategori'); // Bahan Pokok, Protein, dll
                var rowKeywords = $row.data('keywords').toLowerCase(); // Nama, lokasi, dll.
                
                // 1. Cek Status (Menipis/Aman)
                var statusMatch = (statusFilter === 'Semua' || rowStatus === statusFilter);
                
                // 2. Cek Kategori (Bahan Pokok, Protein, dll)
                var categoryMatch = (categoryFilter === 'Semua' || rowCategory === categoryFilter);

                // 3. Cek Search (Pencarian teks)
                var searchMatch = true;
                if (searchText.length > 0) {
                    searchMatch = (rowKeywords.indexOf(searchText) > -1);
                }

                // Tampilkan baris jika semua kriteria cocok
                if (statusMatch && categoryMatch && searchMatch) {
                    $row.show();
                } else {
                    $row.hide();
                }
            });
        }

        // --- 1. HANDLE FILTER BUTTONS ---
        $('.filter-btn').on('click', function() {
            var filterValue = $(this).data('filter');
            var filterType = $(this).data('type'); // 'status', 'category', atau 'all'

            // Reset semua tombol menjadi tidak aktif
            $('.filter-btn').removeClass('filter-active');
            
            // Logika Multi-Filter
            if (filterType === 'all') {
                activeFilters.status = 'Semua';
                activeFilters.category = 'Semua';
            } else if (filterType === 'status') {
                activeFilters.status = filterValue;
                // Pastikan filter kategori reset ke 'Semua' jika filter status ditekan
                if (activeFilters.category !== 'Semua') {
                    activeFilters.category = 'Semua';
                    // De-activate tombol kategori yang aktif (kecuali Semua)
                    $('.filter-btn[data-type="category"]').removeClass('filter-active');
                }
            } else if (filterType === 'category') {
                activeFilters.category = filterValue;
                 // Pastikan filter status reset ke 'Semua' jika filter kategori ditekan
                 if (activeFilters.status !== 'Semua') {
                    activeFilters.status = 'Semua';
                    // De-activate tombol status yang aktif (kecuali Semua)
                    $('.filter-btn[data-type="status"]').removeClass('filter-active');
                }
            }
            
            // Atur tombol 'Semua' menjadi aktif jika kedua filter di reset
            if (activeFilters.status === 'Semua' && activeFilters.category === 'Semua') {
                 $('.filter-btn[data-filter="Semua"]').addClass('filter-active');
            } 
            
            // Atau aktifkan tombol yang diklik (jika bukan tombol "Semua")
            if (filterValue !== 'Semua') {
                 $(this).addClass('filter-active');
            } else {
                 $('.filter-btn[data-filter="Semua"]').addClass('filter-active');
            }


            applyFilterAndSearch();
        });

        // --- 2. HANDLE SEARCH INPUT ---
        $('#search-input').on('keyup', function() {
            applyFilterAndSearch();
        });
        
        // Inisialisasi: Terapkan filter saat halaman dimuat
        applyFilterAndSearch();
    });
</script>
@endpush