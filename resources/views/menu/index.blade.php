@extends('layouts.app')

@section('title', 'Menu')
@section('menu_active', 'active')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<style>
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
}
</style>
@endpush

@section('content')

<div class="p-4">

{{-- HEADER --}}
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
    <h1 class="page-title">Menu</h1>
   
</div>

{{-- FILTER --}}
<div class="filter-container">
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
@endsection
