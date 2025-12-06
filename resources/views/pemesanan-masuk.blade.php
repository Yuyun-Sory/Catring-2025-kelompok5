@extends('layouts.app')

@section('content')

<style>
    /* ---------------------------------------------------------------------- */
    /* UMUM & STATS */
    /* ---------------------------------------------------------------------- */
    .title-page {
        font-size: 48px;
        font-weight: bold;
        font-family: Georgia, serif;
        margin-bottom: 20px;
    }

    .stat-box {
        padding: 15px 25px;
        background: #0066ff;
        color: white;
        border-radius: 8px;
        font-weight: bold;
        font-size: 18px;
        text-align: center;
        min-width: 150px;
    }
    .stat-number {
        background: white;
        color: #0066ff;
        padding: 5px 14px;
        border-radius: 6px;
        font-size: 24px;
        margin-left: 8px;
    }

    /* ---------------------------------------------------------------------- */
    /* FILTER & SEARCH */
    /* ---------------------------------------------------------------------- */
    .filter-btn {
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
        background: #dcdcdc;
        cursor: pointer;
        font-size: 16px;
        font-family: Georgia;
    }
    .filter-active {
        background: #7beb8b !important;
    }
    .search-box {
        width: 100%;
        padding: 14px;
        border-radius: 8px;
        border: 1px solid #999;
        margin-top: 15px;
        font-size: 16px;
    }

    /* ---------------------------------------------------------------------- */
    /* TABLE */
    /* ---------------------------------------------------------------------- */
    .table-wrapper {
        margin-top: 25px;
        background: white;
        border-radius: 10px;
        padding: 10px 20px 20px 20px;
        border: 1px solid #dcdcdc;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
        font-family: Georgia, serif;
    }
    thead tr {
        background: #f4f4f4;
        font-weight: bold;
        font-size: 17px;
    }
    th, td {
        padding: 14px;
        border-bottom: 1px solid #ddd;
        vertical-align: top;
    }

    /* ---------------------------------------------------------------------- */
    /* STATUS BADGES & AKSI */
    /* ---------------------------------------------------------------------- */
    .badge {
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 14px;
        color: white;
        font-weight: bold;
    }
    .badge-wait { background: #ffb347; }       /* Menunggu */
    .badge-process { background: #4aa3ff; }    /* Diproses */
    .badge-done { background: #4caf50; }       /* Selesai */
    .badge-cancel { background: #ff6f6f; }     /* Dibatalkan */
    .btn-aksi {
        padding: 6px 10px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        color: black;
        font-size: 14px;
    }
    .btn-view { background: #dcdcdc; }
    .btn-approve { background: #7beb8b; }
    .btn-reject { background: #ff6f6f; }

    /* ---------------------------------------------------------------------- */
    /* PAGINATION */
    /* ---------------------------------------------------------------------- */
    .pagination-area {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 20px;
    }
    .page-btn {
        padding: 8px 14px;
        border: 1px solid #999;
        background: white;
        border-radius: 6px;
        cursor: pointer;
    }
    .page-active {
        background: #7beb8b;
        border-color: #7beb8b;
    }

    /* ---------------------------------------------------------------------- */
    /* MODAL CUSTOM STYLE (BARU) */
    /* ---------------------------------------------------------------------- */
    .modal-content-custom {
        border-radius: 12px;
    }
    .modal-body-custom div {
        margin-bottom: 8px;
        padding-bottom: 3px;
    }
    .modal-body-custom .detail-row {
        display: flex;
        justify-content: space-between;
        font-size: 15px;
        padding: 5px 0;
        border-bottom: 1px dashed #eee;
    }
    .modal-body-custom .detail-label {
        font-weight: normal;
        color: #555;
        width: 40%;
    }
    .modal-body-custom .detail-value {
        font-weight: bold;
        text-align: right;
        width: 60%;
    }
    .sisa-pembayaran-text {
        font-size: 24px;
        font-weight: bold;
        color: #000;
        text-align: right;
        margin-top: 15px;
        margin-bottom: 5px;
        display: block;
    }
</style>

{{-- TITLE --}}
<h1 class="title-page">Pesanan Masuk</h1>


{{-- STATISTICS --}}
<div style="display:flex; gap:20px; margin-top:20px;">
    <div class="stat-box">Total Pesanan <span class="stat-number">5</span></div>
    <div class="stat-box">Menunggu <span class="stat-number">2</span></div>
    <div class="stat-box">Diproses <span class="stat-number">1</span></div>
    <div class="stat-box">Selesai <span class="stat-number">1</span></div>
    <div class="stat-box">Dibatalkan <span class="stat-number">1</span></div>
</div>


{{-- FILTER --}}
<div style="display:flex; gap:12px; margin:25px 0 15px 0;">
    <button class="filter-btn filter-active" data-status="Semua">Semua</button>
    <button class="filter-btn" data-status="Menunggu">Menunggu</button>
    <button class="filter-btn" data-status="Diproses">Diproses</button>
    <button class="filter-btn" data-status="Selesai">Selesai</button>
    <button class="filter-btn" data-status="Dibatalkan">Dibatalkan</button>
</div>

{{-- SEARCH --}}
<input type="text" id="search-input" class="search-box" placeholder="🔍  Cari Pesanan Pelanggan (ID, Nama, Menu)">


{{-- TABLE --}}
<div class="table-wrapper">
<table>
    <thead>
        <tr>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Menu Dipesan</th>
            <th>Harga</th>
            <th>Tanggal Pengiriman</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody id="order-table-body">
        
        {{-- BARIS 1: Menunggu --}}
        <tr 
            data-status="Menunggu" 
            data-keywords="ORD-2024-001 Budi Santoso 0812-3456-7890 Nasi Ayam Goreng Lalapan Rp20.000 Menunggu"
            data-order-id="ORD-2024-001"
            data-waktu="2025-11-15 12:20"
            data-nama="Budi Santoso"
            data-telp="0812-3456-7890"
            data-alamat="JL. Seturan Raya No. 5 Yogyakarta"
            data-paket="Nasi Ayam Goreng Lalapan"
            data-harga-porsi="Rp20.000"
            data-total-pesanan="70 Porsi"
            data-total-bayar="Rp1.400.000"
            data-dp-bayar="Rp250.000"
            data-sisa-bayar="Rp1.150.000"
            data-catatan="Tambahkan sambal terasi."
            data-badge-class="badge-wait"
        >
            <td>ORD-2024-001</td>
            <td>Budi Santoso<br>0812-3456-7890</td>
            <td>Nasi Ayam Goreng Lalapan</td>
            <td>Rp20.000</td>
            <td>2025-11-15 12:20</td>
            <td><span class="badge badge-wait">Menunggu</span></td>
            <td>
                {{-- Tombol View dengan toggle Modal --}}
                <button class="btn-view" data-bs-toggle="modal" data-bs-target="#detailModal">👁</button>
                <button class="btn-approve">✔ Terima</button>
                <button class="btn-reject">✖ Tolak</button>
            </td>
        </tr>

        {{-- BARIS 2: Diproses --}}
        <tr 
            data-status="Diproses" 
            data-keywords="ORD-2024-002 Siti Nurhaliza 0856-7890-1234 Soto Ayam Rp20.000 Diproses"
            data-order-id="ORD-2024-002"
            data-waktu="2025-11-16 10:00"
            data-nama="Siti Nurhaliza"
            data-telp="0856-7890-1234"
            data-alamat="Jalan Solo KM 10, No 20, Sleman"
            data-paket="Soto Ayam"
            data-harga-porsi="Rp15.000"
            data-total-pesanan="50 Porsi"
            data-total-bayar="Rp750.000"
            data-dp-bayar="Rp750.000"
            data-sisa-bayar="Rp0"
            data-catatan="Bayar lunas di awal."
            data-badge-class="badge-process"
        >
            <td>ORD-2024-002</td>
            <td>Siti Nurhaliza<br>0856-7890-1234</td>
            <td>Soto Ayam</td>
            <td>Rp20.000</td>
            <td>2025-11-15 12:20</td>
            <td><span class="badge badge-process">Diproses</span></td>
            <td>
                <button class="btn-view" data-bs-toggle="modal" data-bs-target="#detailModal">👁</button>
                <button class="btn-approve">✔</button>
                <button class="btn-reject">✖</button>
            </td>
        </tr>

        {{-- BARIS 3: Selesai --}}
        <tr 
            data-status="Selesai" 
            data-keywords="ORD-2024-003 Ahmad Rizki 0895-1234-5875 Nasi Pecel Rp20.000 Selesai"
            data-order-id="ORD-2024-003"
            data-waktu="2025-11-14 11:30"
            data-nama="Ahmad Rizki"
            data-telp="0895-1234-5875"
            data-alamat="Perumahan Indah Blok C1, Bantul"
            data-paket="Nasi Pecel"
            data-harga-porsi="Rp18.000"
            data-total-pesanan="30 Porsi"
            data-total-bayar="Rp540.000"
            data-dp-bayar="Rp540.000"
            data-sisa-bayar="Rp0"
            data-catatan="Pengiriman sudah sukses."
            data-badge-class="badge-done"
        >
            <td>ORD-2024-003</td>
            <td>Ahmad Rizki<br>0895-1234-5875</td>
            <td>Nasi Pecel</td>
            <td>Rp20.000</td>
            <td>2025-11-15 12:20</td>
            <td><span class="badge badge-done">Selesai</span></td>
            <td>
                <button class="btn-view" data-bs-toggle="modal" data-bs-target="#detailModal">👁</button>
            </td>
        </tr>

        {{-- BARIS 4: Dibatalkan --}}
        <tr 
            data-status="Dibatalkan" 
            data-keywords="ORD-2024-004 Dewi Lestari 0821-5678-9012 Sayur Sop Rp20.000 Dibatalkan"
            data-order-id="ORD-2024-004"
            data-waktu="2025-11-15 08:00"
            data-nama="Dewi Lestari"
            data-telp="0821-5678-9012"
            data-alamat="Jalan Gajah Mada No 45, Kota Yogyakarta"
            data-paket="Sayur Sop"
            data-harga-porsi="Rp12.000"
            data-total-pesanan="20 Porsi"
            data-total-bayar="Rp240.000"
            data-dp-bayar="Rp0"
            data-sisa-bayar="Rp0"
            data-catatan="Pesanan dibatalkan oleh pelanggan."
            data-badge-class="badge-cancel"
        >
            <td>ORD-2024-004</td>
            <td>Dewi Lestari<br>0821-5678-9012</td>
            <td>Sayur Sop</td>
            <td>Rp20.000</td>
            <td>2025-11-15 12:20</td>
            <td><span class="badge badge-cancel">Dibatalkan</span></td>
            <td>
                <button class="btn-view" data-bs-toggle="modal" data-bs-target="#detailModal">👁</button>
            </td>
        </tr>
    </tbody>
</table>
</div>


{{-- PAGINATION --}}
<div class="pagination-area">
    <button class="page-btn">Sebelumnya</button>
    <button class="page-btn page-active">1</button>
    <button class="page-btn">2</button>
    <button class="page-btn">Selanjutnya</button>
</div>

{{-- STRUKTUR MODAL DETAIL PESANAN --}}
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-custom">
            <div class="modal-header modal-header-custom">
                <h5 class="modal-title" id="detailModalLabel">Detail Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body-custom">
                
                <div class="detail-row">
                    <span class="detail-label">ID Pelanggan</span>
                    <span class="detail-value" id="modal-id-pelanggan"></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Waktu Pesanan</span>
                    <span class="detail-value" id="modal-waktu-pesanan"></span>
                </div>
                
                <hr style="border-style: solid; color: #ccc; margin: 5px 0;">

                <div class="detail-row">
                    <span class="detail-label">Pelanggan</span>
                    <span class="detail-value" id="modal-nama-pelanggan"></span>
                </div>
                 <div class="detail-row">
                    <span class="detail-label">Nomor Telepon</span>
                    <span class="detail-value" id="modal-telepon"></span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Alamat Pengiriman</span>
                    <span class="detail-value" id="modal-alamat" style="max-width: 60%; text-align: right;"></span>
                </div>
                
                <hr style="border-style: solid; color: #ccc; margin: 5px 0;">

                <div class="detail-row">
                    <span class="detail-label">Paket</span>
                    <span class="detail-value" id="modal-paket"></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Harga per Porsi</span>
                    <span class="detail-value" id="modal-harga-porsi"></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Total Pesanan</span>
                    <span class="detail-value" id="modal-total-pesanan"></span>
                </div>

                <hr style="border-style: solid; color: #ccc; margin: 5px 0;">

                <div class="detail-row">
                    <span class="detail-label">Total Pembayaran (Penuh)</span>
                    <span class="detail-value" id="modal-total-bayar"></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">DP Dibayar</span>
                    <span class="detail-value" id="modal-dp-bayar"></span>
                </div>

                <div style="border-top: 1px solid #000; margin-top: 15px; padding-top: 15px;">
                    <span style="font-size: 18px; font-weight: bold; color: #0066ff;">Sisa Pembayaran</span>
                    <span class="sisa-pembayaran-text" id="modal-sisa-bayar"></span>
                </div>

                <hr style="border-style: solid; color: #ccc; margin: 5px 0;">

                <div class="detail-row">
                    <span class="detail-label">Catatan</span>
                    <span class="detail-value" id="modal-catatan" style="max-width: 60%; text-align: right; font-style: italic; font-weight: normal;"></span>
                </div>
                
                <div class="detail-row">
                    <span class="detail-label">Status Saat Ini</span>
                    <span class="detail-value" id="modal-status"></span>
                </div>

            </div>
            <div class="modal-footer modal-footer-custom">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
{{-- AKHIR STRUKTUR MODAL --}}

@endsection

{{-- JAVASCRIPT UNTUK FILTER, SEARCH, DAN MODAL --}}
@push('scripts')
<script>
    $(document).ready(function() {
        // Variabel untuk menyimpan status filter aktif saat ini
        var currentFilterStatus = 'Semua';

        // --- FUNGSI UTAMA UNTUK FILTER DAN SEARCH ---
        function applyFilterAndSearch() {
            var searchText = $('#search-input').val().toLowerCase().trim();
            
            $('#order-table-body tr').each(function() {
                var $row = $(this);
                var rowStatus = $row.data('status');
                var rowKeywords = $row.data('keywords').toLowerCase();
                
                var statusMatch = (currentFilterStatus === 'Semua' || rowStatus === currentFilterStatus);
                
                var searchMatch = true;
                if (searchText.length > 0) {
                    searchMatch = (rowKeywords.indexOf(searchText) > -1);
                }

                if (statusMatch && searchMatch) {
                    $row.show();
                } else {
                    $row.hide();
                }
            });
        }

        // --- 1. HANDLE FILTER BUTTONS ---
        $('.filter-btn').on('click', function() {
            currentFilterStatus = $(this).data('status');
            $('.filter-btn').removeClass('filter-active');
            $(this).addClass('filter-active');
            applyFilterAndSearch();
        });

        // --- 2. HANDLE SEARCH INPUT ---
        $('#search-input').on('keyup', function() {
            applyFilterAndSearch();
        });
        
        // Inisialisasi: Terapkan filter saat halaman dimuat
        applyFilterAndSearch();


        // --- 3. LOGIKA MODAL DETAIL PESANAN ---
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Tombol yang memicu modal
            var row = button.closest('tr');     // Baris <tr> induk
            
            // Ambil data dari atribut data-* di baris <tr>
            var orderId = row.data('order-id');
            var waktu = row.data('waktu');
            var nama = row.data('nama');
            var telp = row.data('telp');
            var alamat = row.data('alamat');
            var paket = row.data('paket');
            var hargaPorsi = row.data('harga-porsi');
            var totalPesanan = row.data('total-pesanan');
            var totalBayar = row.data('total-bayar');
            var dpBayar = row.data('dp-bayar');
            var sisaBayar = row.data('sisa-bayar');
            var catatan = row.data('catatan');
            var statusText = row.find('.badge').text(); 
            var badgeClass = row.data('badge-class');

            // Update elemen-elemen di Modal
            $('#modal-id-pelanggan').text(orderId);
            $('#modal-waktu-pesanan').text(waktu);
            $('#modal-nama-pelanggan').text(nama);
            $('#modal-telepon').text(telp);
            // Tambahkan ikon di depan data Pelanggan, Telp, Alamat, dll.
            $('#modal-id-pelanggan').prepend('<span>🗓️ &nbsp;</span>');
            $('#modal-nama-pelanggan').prepend('<span>👤 &nbsp;</span>');
            $('#modal-telepon').prepend('<span>📞 &nbsp;</span>');
            $('#modal-alamat').prepend('<span>📍 &nbsp;</span>');
            $('#modal-paket').prepend('<span>🍚 &nbsp;</span>');
            $('#modal-harga-porsi').prepend('<span>💲 &nbsp;</span>');
            $('#modal-total-bayar').prepend('<span>💵 &nbsp;</span>');
            $('#modal-dp-bayar').prepend('<span>💸 &nbsp;</span>');

            $('#modal-alamat').text(alamat); // Hapus prepend karena alamat panjang
            $('#modal-paket').text(paket);
            $('#modal-harga-porsi').text(hargaPorsi);
            $('#modal-total-pesanan').text(totalPesanan);
            $('#modal-total-bayar').text(totalBayar);
            $('#modal-dp-bayar').text(dpBayar);
            $('#modal-sisa-bayar').text(sisaBayar);
            $('#modal-catatan').text(catatan || '-'); 

            // Update Status Badge di Modal
            var statusElement = $('#modal-status');
            statusElement.empty(); 
            statusElement.append($('<span>').addClass('badge').addClass(badgeClass).text(statusText));
        });
    });
</script>
@endpush