@extends('layouts.app')

@section('title', 'Integrasi Chatbot & Kalender Operasional')

@section('content')
<link rel="stylesheet" href="{{ asset('css/teras-chat.css') }}">

@if(session('success'))
<div class="toast show">
    {{ session('success') }}
</div>
@endif

{{-- DATA LIBUR DAN PEMESANAN --}}
<input type="hidden" id="liburData" value='@json($liburs)'>
<input type="hidden" id="pesananData" value='@json($pesanans)'>

<h2 class="page-title">🤖 Integrasi Chatbot & Kalender Operasional</h2>

{{-- STAT BOX --}}
<div style="display:flex; gap:20px; margin-bottom:25px;">
    <div class="stat-box">
        <div class="stat-title">Total Pesanan</div>
        <div class="stat-value">{{ $pesanans->count() }}</div>
        <div class="stat-percent">+5%</div>
    </div>

    <div class="stat-box">
        <div class="stat-title">Tanggal Pesanan</div>
        <div class="stat-value">{{ $pesanans->count() }}</div>
        <div class="stat-percent">+1%</div>
    </div>
</div>

{{-- CALENDAR + ADMIN --}}
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
            <span><div class="dot booked"></div> Sudah Dipesan</span>
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
                            onclick="openEditModal('{{ $item->id }}','{{ $item->tanggal }}','{{ $item->keterangan }}')">Edit</button>
                        <form action="{{ route('libur.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- MODAL CREATE --}}
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

{{-- MODAL EDIT --}}
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

{{-- ================= ULASAN / CHATBOT LOG ================= --}}
<div class="admin-box" style="margin-top:30px;">
    <h3 style="margin-bottom:12px;">📨 Ulasan Pelanggan</h3>

    <table>
        <thead>
            <tr>
                <th>Waktu</th>
                <th>Nama Pelanggan</th>
                <th>Komentar</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($chatLogs as $log)
            <tr>
                <td>{{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i') }}</td>
                <td>{{ $log->nama_pelanggan }}</td>
                <td>{{ $log->komentar }}</td>
                <td>{{ $log->rating }}/5</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align:center;">Belum ada ulasan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>


<script>
const liburData = JSON.parse(document.getElementById('liburData').value);
const pesananData = JSON.parse(document.getElementById('pesananData').value);

let currentDate = new Date();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

function renderCalendar(year, month) {
    const calendarBody = document.getElementById('calendarBody');
    calendarBody.innerHTML = '';

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    for(let i = 0; i < firstDay; i++){
        const blank = document.createElement('div');
        calendarBody.appendChild(blank);
    }

    for(let day = 1; day <= daysInMonth; day++){
        const cell = document.createElement('div');
        const cellDate = new Date(year, month, day).toISOString().split('T')[0];

        if(liburData.some(l => l.tanggal === cellDate)){
            cell.classList.add('taken');
        } else if(pesananData.some(p => p.tanggal_pemesanan === cellDate)){
            cell.classList.add('booked');
        } else {
            cell.classList.add('ava');
        }

        cell.textContent = day;
        calendarBody.appendChild(cell);
    }

    document.getElementById('monthLabel').textContent =
        new Date(year, month).toLocaleString('default', { month: 'long', year: 'numeric' });
}

function prevMonth(){
    currentMonth--;
    if(currentMonth < 0){
        currentMonth = 11;
        currentYear--;
    }
    renderCalendar(currentYear, currentMonth);
}

function nextMonth(){
    currentMonth++;
    if(currentMonth > 11){
        currentMonth = 0;
        currentYear++;
    }
    renderCalendar(currentYear, currentMonth);
}

renderCalendar(currentYear, currentMonth);

function openCreateModal(){
    document.getElementById('createModal').style.display = 'flex';
}

function openEditModal(id, tanggal, keterangan){
    document.getElementById('editModal').style.display = 'flex';
    document.getElementById('editTanggal').value = tanggal;
    document.getElementById('editKeterangan').value = keterangan;
    document.getElementById('editForm').action = `/libur/${id}`;
}

function closeModal(){
    document.getElementById('createModal').style.display = 'none';
    document.getElementById('editModal').style.display = 'none';
}
</script>
@endsection
