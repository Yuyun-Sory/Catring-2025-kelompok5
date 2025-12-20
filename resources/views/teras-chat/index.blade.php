@extends('layouts.app')

@section('title', 'Integrasi Chatbot & Kalender Operasional')

@section('content')
<link rel="stylesheet" href="{{ asset('css/teras-chat.css') }}">

{{-- TOAST --}}
@if(session('success'))
<div class="toast show">
    {{ session('success') }}
</div>
@endif

{{-- DATA LIBUR --}}
<input type="hidden" id="liburData" value='@json($liburs)'>

<h2 class="page-title">🤖 Integrasi Chatbot & Kalender Operasional</h2>

{{-- ================= STAT BOX ================= --}}
<div style="display:flex; gap:20px; margin-bottom:25px;">
    <div class="stat-box">
        <div class="stat-title">Total Pesanan</div>
        <div class="stat-value">3</div>
        <div class="stat-percent">+5%</div>
    </div>

    <div class="stat-box">
        <div class="stat-title">Tanggal Pesanan</div>
        <div class="stat-value">12</div>
        <div class="stat-percent">+1%</div>
    </div>
</div>

{{-- ================= KALENDER + ADMIN ================= --}}
<div class="calendar-admin-wrapper">

    {{-- KALENDER --}}
    <div class="calendar-box">
        <div class="calendar-header">
            <button onclick="prevMonth()">‹</button>
            <span id="monthLabel"></span>
            <button onclick="nextMonth()">›</button>
        </div>

        <div class="calendar-grid header">
            <div>Min</div><div>Sen</div><div>Sel</div>
            <div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
        </div>

        <div id="calendarBody" class="calendar-grid"></div>

        {{-- LEGEND --}}
        <div class="legend">
            <span><div class="dot ava"></div> Tersedia</span>
            <span><div class="dot taken"></div> Hari Libur</span>
            <span><div class="dot selected"></div> Dipilih</span>
        </div>
    </div>

    {{-- ADMIN --}}
    <div class="admin-box">
        <div class="admin-header">
            <h3>Hari Libur</h3>
            <button class="btn-add" onclick="openCreateModal()">+ Tambah</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="liburTable">
            @foreach ($liburs as $i => $item)
                <tr data-tanggal="{{ $item->tanggal }}">
                    <td>{{ $i + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td class="aksi">
                        <button class="btn-edit"
                            onclick="openEditModal(
                                '{{ $item->id }}',
                                '{{ $item->tanggal }}',
                                '{{ $item->keterangan }}'
                            )">Edit</button>

                        <form action="{{ route('libur.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete"
                                onclick="return confirm('Hapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- ================= MODAL CREATE ================= --}}
<div class="modal-overlay" id="createModal">
    <div class="modal-card fancy">
        <h3>➕ Tambah Hari Libur</h3>
        <form action="{{ route('libur.store') }}" method="POST">
            @csrf

            <label>Tanggal</label>
            <input type="date" name="tanggal" required>

            <label>Keterangan</label>
            <input type="text" name="keterangan" placeholder="Contoh: Libur Nasional" required>

            <div class="modal-actions">
                <button type="button" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-save">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL EDIT ================= --}}
<div class="modal-overlay" id="editModal">
    <div class="modal-card fancy">
        <h3>✏️ Edit Hari Libur</h3>
        <form method="POST" id="editForm">
            @csrf
            @method('PUT')

            <label>Tanggal</label>
            <input type="date" name="tanggal" id="editTanggal" required>

            <label>Keterangan</label>
            <input type="text" name="keterangan" id="editKeterangan" required>

            <div class="modal-actions">
                <button type="button" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-save">Update</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= CHATBOT LOG ================= --}}
<div class="admin-box" style="margin-top:30px;">
    <h3 style="margin-bottom:12px;">📨 Chatbot Log</h3>

    <table>
        <thead>
            <tr>
                <th>Waktu</th>
                <th>Pelanggan</th>
                <th>Pertanyaan</th>
                <th>Respon Chatbot</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>10.10</td>
                <td>Ahmad Rizki</td>
                <td>Menu Paket A Berapa?</td>
                <td>Paket A: Rp 20.000/porsi</td>
                <td>✔️</td>
            </tr>
            <tr>
                <td>10.25</td>
                <td>Budi Santoso</td>
                <td>Apakah bisa delivery besok?</td>
                <td>Bisa, silahkan isi form pemesanan</td>
                <td>📨</td>
            </tr>
            <tr>
                <td>11.40</td>
                <td>Siti Nurhalizah</td>
                <td>Berapa minimal catering?</td>
                <td>Minimal 55 porsi ya kak</td>
                <td>👌</td>
            </tr>
        </tbody>
    </table>
</div>

<script src="{{ asset('js/teras-chat.js') }}"></script>
@endsection
