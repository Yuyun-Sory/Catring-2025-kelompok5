@extends('layouts.app')

@section('title', 'Menu')
@section('menu_active', 'active')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<style>
<<<<<<< HEAD
/* RAPIN TABLE */
.table-wrapper table th,
.table-wrapper table td {
    vertical-align: middle;
    padding: 12px 14px;
}

.table-wrapper th {
    text-align: left;
    white-space: nowrap;
}

.table-wrapper td img {
    display: block;
    margin: auto;
}

.price {
    text-align: right;
    font-weight: 600;
}

.action-cell {
    display: flex;
    justify-content: center;
    gap: 8px;
}

.add-menu-btn {
    background: #1cc88a;
    color: #fff;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;

}

.add-menu-btn:hover {
    opacity: .9;
=======
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}
.add-menu-btn{
    background:#16a34a;
    color:#fff;
    padding:10px 18px;
    border-radius:10px;
    font-weight:600;
    text-decoration:none;
}
.add-menu-btn:hover{opacity:.9}

.filter-container{
    display:flex;
    gap:10px;
    margin-bottom:16px;
}
.filter-btn{
    padding:8px 16px;
    border-radius:999px;
    border:1px solid #ddd;
    cursor:pointer;
    background:#f9fafb;
}
.filter-active{
    background:#2563eb;
    color:#fff;
    border-color:#2563eb;
}

.search-box{
    width:100%;
    padding:10px 14px;
    border-radius:10px;
    border:1px solid #ddd;
    margin-bottom:20px;
}

.table-wrapper{
    background:#fff;
    border-radius:14px;
    box-shadow:0 8px 24px rgba(0,0,0,.05);
    overflow:hidden;
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#f1f5f9;
}

th,td{
    padding:14px;
    vertical-align:middle;
}

.price{
    text-align:right;
    font-weight:600;
}

.action-cell{
    display:flex;
    justify-content:center;
    gap:10px;
}

.action-cell a,
.action-cell button{
    background:#f1f5f9;
    border:none;
    padding:8px 10px;
    border-radius:8px;
    cursor:pointer;
}

.action-cell a:hover,
.action-cell button:hover{
    background:#e2e8f0;
}

.no-data{
    text-align:center;
    padding:30px;
    color:#6b7280;
>>>>>>> 2154e4b68bba9b697e3b2dc0bd83434d3cd78766
}
</style>
@endpush

@section('content')
<<<<<<< HEAD

<div class="p-4">

{{-- HEADER --}}
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
    <h1 class="page-title">Menu</h1>
   
=======
<div class="p-4">

{{-- HEADER --}}
<div class="page-header">
    <h1 class="page-title">📋 Daftar Menu</h1>
    <a href="{{ route('menu.create') }}" class="add-menu-btn">+ Tambah Menu</a>
>>>>>>> 2154e4b68bba9b697e3b2dc0bd83434d3cd78766
</div>

{{-- FILTER --}}
<div class="filter-container">
<<<<<<< HEAD
    <button class="filter-btn filter-active" data-filter="Semua" data-type="all">Semua</button>
    <button class="filter-btn" data-filter="Makanan" data-type="kategori">Makanan</button>
    <button class="filter-btn" data-filter="Minuman" data-type="kategori">Minuman</button>
</div>

{{-- SEARCH --}}
<input type="text" id="search-input "
       placeholder="Cari menu (Nama, Kategori)"
       class="search-box" style="margin-top: 2rem; margin-bottom: 1rem;">
 <a href="{{ route('menu.create') }}" class="add-menu-btn">+ Tambah Menu</a>
{{-- TABLE --}}
<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th style="width:90px; text-align:center;">Foto</th>
                <th>Nama Menu</th>
                <th style="width:120px;">Kategori</th>
                <th style="width:140px; text-align:right;">Harga</th>
                <th style="width:120px; text-align:center;">Aksi</th>
            </tr>
        </thead>

        <tbody id="menu-table-body">
        @forelse($menus as $menu)
            <tr
                data-kategori="{{ $menu->kategori }}"
                data-keywords="{{ strtolower($menu->nama_menu.' '.$menu->kategori) }}"
            >
                <td style="text-align:center;">
                    <img src="{{ asset('storage/'.$menu->foto) }}"
                         width="60" height="60"
                         style="object-fit:cover; border-radius:8px;">
                </td>

                <td>{{ $menu->nama_menu }}</td>

                <td>{{ $menu->kategori }}</td>

                <td class="price">
                    Rp {{ number_format($menu->harga,0,',','.') }}
                </td>

                <td>
                    <div class="action-cell">
                        <a href="{{ route('menu.edit', $menu->id_menu) }}"
                           title="Edit">✏️</a>

                        <form action="{{ route('menu.destroy', $menu->id_menu) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                title="Hapus"
                                onclick="return confirm('Hapus menu {{ $menu->nama_menu }}?')">
                                🗑️
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="no-data">Tidak ada data menu.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

</div>
=======
    <button class="filter-btn filter-active">Semua</button>
    <button class="filter-btn">Makanan</button>
    <button class="filter-btn">Minuman</button>
</div>

{{-- SEARCH --}}
<input type="text" class="search-box" placeholder="🔍 Cari menu...">

{{-- TABLE --}}
<div class="table-wrapper">
<table>
<thead>
<tr>
    <th style="width:90px;text-align:center;">Foto</th>
    <th>Nama Menu</th>
    <th>Kategori</th>
    <th class="price">Harga</th>
    <th style="text-align:center;">Aksi</th>
</tr>
</thead>

<tbody id="menu-table-body">
@forelse($menus as $menu)
<tr data-kategori="{{ $menu->kategori }}">
    <td style="text-align:center">
        <img src="{{ asset('storage/'.$menu->foto) }}"
             width="60" height="60"
             style="object-fit:cover;border-radius:10px">
    </td>
    <td>{{ $menu->nama_menu }}</td>
    <td>{{ $menu->kategori }}</td>
    <td class="price">Rp {{ number_format($menu->harga,0,',','.') }}</td>
    <td>
        <div class="action-cell">
            <a href="{{ route('menu.edit',$menu->id_menu) }}">✏️</a>
            <form action="{{ route('menu.destroy',$menu->id_menu) }}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus menu ini?')">🗑️</button>
            </form>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="no-data">Tidak ada data menu</td>
</tr>
@endforelse
</tbody>
</table>
</div>

</div>

{{-- ================= FILTER & SEARCH JS ================= --}}
<script>
document.addEventListener("DOMContentLoaded", () => {

    const filterButtons = document.querySelectorAll(".filter-btn");
    const rows = document.querySelectorAll("#menu-table-body tr");
    const searchInput = document.querySelector(".search-box");

    let activeFilter = "Semua";

    filterButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            filterButtons.forEach(b => b.classList.remove("filter-active"));
            btn.classList.add("filter-active");
            activeFilter = btn.textContent.trim();
            applyFilter();
        });
    });

    searchInput.addEventListener("keyup", applyFilter);

    function applyFilter() {
        const keyword = searchInput.value.toLowerCase();

        rows.forEach(row => {
            const kategori = row.dataset.kategori;
            const text = row.innerText.toLowerCase();

            const matchKategori =
                activeFilter === "Semua" || kategori === activeFilter;

            const matchSearch = text.includes(keyword);

            row.style.display =
                matchKategori && matchSearch ? "" : "none";
        });
    }

});
</script>
>>>>>>> 2154e4b68bba9b697e3b2dc0bd83434d3cd78766
@endsection
