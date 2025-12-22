@extends('layouts.app')

@section('title', 'Semua Jadwal Produksi')

@section('content')
<div class="container-fluid">

    <h2 class="fw-bold mb-1">Semua Jadwal Produksi </h2>
    <p class="text-muted mb-4">Diurutkan berdasarkan tanggal terdekat</p>
<a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal Produksi</a>

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
                        <th>Status Bahan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal as $j)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($j->tanggal_produksi)->format('d/m/Y') }}</td>
                        <td>
                            @if($j->tanggal_produksi == date('Y-m-d'))
                                <b>Hari ini</b>
                            @elseif($j->tanggal_produksi < date('Y-m-d'))
                                <b>Lalu</b>
                            @else
                                <b>Mendatang</b>
                            @endif
                        </td>
                        <td>{{ $j->jam_produksi }}</td>
                        <td>{{ $j->nama_pelanggan }}</td>
                        <td>{{ $j->menu->nama_menu ?? '-' }}</td>
                        <td>{{ $j->status_bahan }}</td>
                        <td>{{ $j->jumlah_porsi }} Porsi</td>
                        <td>
                            <button class="btn btn-success btn-sm"
                                onclick="openInputModal({{ $j->id }})">Input Bahan</button>
                            <button class="btn btn-outline-secondary btn-sm"
                                onclick="openDetailModal({{ $j->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
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
                <p><b>Tanggal Produksi:</b> <span id="inputTanggal"></span></p>
                <p><b>Nama Pelanggan:</b> <span id="inputPelanggan"></span></p>
                <p><b>Menu:</b> <span id="inputMenu"></span></p>
                <p><b>Jumlah Porsi:</b> <span id="inputJumlah"></span></p>

               <form action="" method="POST" id="formInputBahan">
    @csrf
    <table class="table table-bordered mt-3 align-middle">
        <thead class="table-light text-center">
            <tr>
                <th>Nama Bahan</th>
                <th>Jumlah</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bahans as $bahan)
            <tr>
                <td>{{ $bahan->nama }}
                    <input type="hidden" name="bahan_id[]" value="{{ $bahan->id }}">
                </td>
                <td><input type="number" class="form-control text-center" name="jumlah[]" value="1" min="0"></td>
                <td>
                    <select class="form-select" name="satuan[]">
                        <option selected>{{ $bahan->satuan }}</option>
                        <option>kg</option>
                        <option>gram</option>
                        <option>pcs</option>
                    </select>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>
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
                <p><b>Tanggal Produksi:</b> <span id="detailTanggal"></span></p>
                <p><b>Nama Pelanggan:</b> <span id="detailPelanggan"></span></p>
                <p><b>Menu:</b> <span id="detailMenu"></span></p>
                <p><b>Jumlah Porsi:</b> <span id="detailJumlah"></span></p>

                <table class="table table-bordered mt-3 align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Nama Bahan</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody id="detailBahanBody">
                        <!-- Akan diisi via JS -->
                    </tbody>
                </table>

                <p class="mt-3"><b>Dibuat Pada:</b> <span id="detailDibuat"></span></p>
                <p><b>Terakhir Diubah:</b> <span id="detailDiubah"></span></p>
                <p><b>Status Bahan:</b> <span class="fw-bold text-success" id="detailStatus"></span></p>
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
    // Data jadwal dari Blade untuk JS
    const jadwalData = @json($jadwal);

    function openInputModal(id) {
        const jadwal = jadwalData.find(j => j.id === id);
        document.getElementById('inputTanggal').textContent = jadwal.tanggal_produksi;
        document.getElementById('inputPelanggan').textContent = jadwal.nama_pelanggan;
        document.getElementById('inputMenu').textContent = jadwal.menu?.nama ?? '-';
        document.getElementById('inputJumlah').textContent = jadwal.jumlah_porsi;

        new bootstrap.Modal(document.getElementById('modalInput')).show();
    }

    function openDetailModal(id) {
        const jadwal = jadwalData.find(j => j.id === id);
        document.getElementById('detailTanggal').textContent = jadwal.tanggal_produksi;
        document.getElementById('detailPelanggan').textContent = jadwal.nama_pelanggan;
        document.getElementById('detailMenu').textContent = jadwal.menu?.nama ?? '-';
        document.getElementById('detailJumlah').textContent = jadwal.jumlah_porsi;

        const tbody = document.getElementById('detailBahanBody');
        tbody.innerHTML = '';
        jadwal.produksi.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.bahan?.nama ?? '-'}</td>
                <td>${item.jumlah}</td>
                <td>${item.satuan}</td>
            `;
            tbody.appendChild(row);
        });

        // Contoh tanggal dibuat & diubah (kamu bisa ganti sesuai data)
        document.getElementById('detailDibuat').textContent = jadwal.created_at;
        document.getElementById('detailDiubah').textContent = jadwal.updated_at;
        document.getElementById('detailStatus').textContent = jadwal.status_bahan;

        new bootstrap.Modal(document.getElementById('modalDetail')).show();
    }
</script>
@endpush
