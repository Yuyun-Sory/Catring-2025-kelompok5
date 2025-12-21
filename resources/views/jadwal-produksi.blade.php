@extends('layouts.app')

@section('title', 'Semua Jadwal Produksi')

@section('content')
<div class="container-fluid">

    <h2 class="fw-bold mb-1">Semua Jadwal Produksi</h2>
    <p class="text-muted mb-4">Diurutkan berdasarkan tanggal terdekat</p>

    {{-- TABEL --}}
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Status Waktu</th>
                        <th>Jam Produksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>15/11/2025</td>
                        <td><b>Hari ini</b></td>
                        <td>08.00</td>
                        <td>Ahmad Rizki</td>
                        <td>Nasi Pecal</td>
                        <td>70 Porsi</td>
                        <td>
                            <button class="btn btn-success btn-sm"
                                onclick="openInputModal()">Input Bahan</button>
                            <button class="btn btn-outline-secondary btn-sm"
                                onclick="openDetailModal()">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ================= MODAL INPUT BAHAN ================= --}}
<div class="modal fade" id="modalInput" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Tambah Bahan Produksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p><b>Tanggal Produksi:</b> 15/11/2025</p>
                <p><b>Nama Pelanggan:</b> Ahmad Rizki</p>
                <p><b>Menu:</b> Nasi Pecal</p>
                <p><b>Jumlah Porsi:</b> 70 Porsi</p>

                <table class="table table-bordered mt-3 align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Nama Bahan</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $bahan = [
                            'Beras','Bayam','Kacang Panjang','Tauge','Daun Singkong',
                            'Kacang Tanah','Gula Merah','Cabe Rawit','Cabe Merah'
                        ];
                        @endphp

                        @foreach($bahan as $item)
                        <tr>
                            <td><input type="text" class="form-control" value="{{ $item }}"></td>
                            <td><input type="text" class="form-control text-center" value="1"></td>
                            <td>
                                <select class="form-select">
                                    <option selected>kg</option>
                                    <option>gram</option>
                                    <option>pcs</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>

{{-- ================= MODAL DETAIL ================= --}}
<div class="modal fade" id="modalDetail" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Detail Jadwal Produksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p><b>Tanggal Produksi:</b> 15/11/2025</p>
                <p><b>Nama Pelanggan:</b> Ahmad Rizki</p>
                <p><b>Menu:</b> Nasi Pecal</p>
                <p><b>Jumlah Porsi:</b> 70 Porsi</p>

                <table class="table table-bordered mt-3 align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Nama Bahan</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bahan as $item)
                        <tr>
                            <td><input type="text" class="form-control" value="{{ $item }}" disabled></td>
                            <td><input type="text" class="form-control text-center" value="1" disabled></td>
                            <td>
                                <select class="form-select" disabled>
                                    <option selected>kg</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <p class="mt-3"><b>Dibuat Pada:</b> 15/11/2025</p>
                <p><b>Terakhir Diubah:</b> 16/11/2025</p>
                <p><b>Status Bahan:</b> <span class="fw-bold text-success">Bahan Lengkap</span></p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openInputModal() {
        new bootstrap.Modal(document.getElementById('modalInput')).show();
    }

    function openDetailModal() {
        new bootstrap.Modal(document.getElementById('modalDetail')).show();
    }
</script>
@endpush
