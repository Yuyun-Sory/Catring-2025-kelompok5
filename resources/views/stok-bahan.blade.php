@extends('layouts.app')

@section('title', 'Stok Bahan')

@section('content')

<h1 style="font-size:32px; font-weight:bold; margin-bottom:20px;">
    Stok Bahan
</h1>

<!-- CARDS SUMMARY -->
<div style="display:flex; gap:20px; margin-bottom:25px;">

    <div style="padding:20px; background:#0066ff; color:white; border-radius:10px; width:180px; text-align:center;">
        <div style="font-size:24px; font-weight:bold;">8</div>
        <div>Total Bahan</div>
    </div>

    <div style="padding:20px; background:#0050cc; color:white; border-radius:10px; width:180px; text-align:center;">
        <div style="font-size:24px; font-weight:bold;">3</div>
        <div>Stok Menipis</div>
    </div>

    <div style="padding:20px; background:#0077ff; color:white; border-radius:10px; width:220px; text-align:center;">
        <div style="font-size:18px; font-weight:bold;">Rp 4.211.000</div>
        <div>Total Nilai Stok</div>
    </div>

    <button style="margin-left:auto; padding:10px 18px; background:white; border:1px solid black; border-radius:8px;">
        + Tambah Bahan
    </button>

</div>

<!-- FILTER BUTTONS 1 -->
<div style="display:flex; gap:10px; margin-bottom:10px;">
    <button style="padding:10px 20px; background:#7beb8b; border:none; border-radius:8px;">Semua</button>
    <button style="padding:10px 20px; background:#e5e5e5; border:none; border-radius:8px;">Menipis</button>
    <button style="padding:10px 20px; background:#e5e5e5; border:none; border-radius:8px;">Aman</button>
    <button style="padding:10px 20px; background:#e5e5e5; border:none; border-radius:8px;">Bahan Pokok</button>
    <button style="padding:10px 20px; background:#e5e5e5; border:none; border-radius:8px;">Protein</button>
</div>

<!-- FILTER BUTTONS 2 -->
<div style="display:flex; gap:10px; margin-bottom:20px;">
    <button style="padding:10px 20px; background:#e5e5e5; border:none; border-radius:8px;">Sayuran</button>
    <button style="padding:10px 20px; background:#e5e5e5; border:none; border-radius:8px;">Bumbu</button>
    <button style="padding:10px 20px; background:#e5e5e5; border:none; border-radius:8px;">Lainnya</button>
</div>

<!-- SEARCH -->
<input type="text" placeholder="Cari bahan"
       style="width:100%; padding:10px; border-radius:8px; border:1px solid #aaa; margin-bottom:20px;">

<!-- TABLE -->
<div style="background:white; padding:20px; border-radius:12px;">
    <table style="width:100%; border-collapse:collapse;">

        <thead>
            <tr style="background:#f0f0f0;">
                <th style="padding:12px; border-bottom:1px solid #ddd;">Nama Bahan</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Kategori</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Stok</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Min Stok</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Harga / satuan</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Lokasi</th>
                <th style="padding:12px; border-bottom:1px solid #ddd;">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td style="padding:12px;">Beras Premium</td>
                <td style="padding:12px;">Bahan Pokok</td>
                <td style="padding:12px;">50 Kg</td>
                <td style="padding:12px;">20 Kg</td>
                <td style="padding:12px;">Rp 15.000</td>
                <td style="padding:12px;">Gudang A</td>
                <td style="padding:12px;">
                    ✏️ 🗑️
                </td>
            </tr>

            <tr>
                <td style="padding:12px;">Ayam Potong</td>
                <td style="padding:12px;">Protein</td>
                <td style="padding:12px;">8 Kg</td>
                <td style="padding:12px;">10 Kg</td>
                <td style="padding:12px;">Rp 35.000</td>
                <td style="padding:12px;">Freezer 1</td>
                <td style="padding:12px;">✏️ 🗑️</td>
            </tr>

            <tr>
                <td style="padding:12px;">Cabai Merah</td>
                <td style="padding:12px;">Sayuran</td>
                <td style="padding:12px;">5 Kg</td>
                <td style="padding:12px;">5 Kg</td>
                <td style="padding:12px;">Rp 45.000</td>
                <td style="padding:12px;">Kulkas</td>
                <td style="padding:12px;">✏️ 🗑️</td>
            </tr>

            <tr>
                <td style="padding:12px;">Minyak Goreng</td>
                <td style="padding:12px;">Bahan Pokok</td>
                <td style="padding:12px;">25 Liter</td>
                <td style="padding:12px;">15 Liter</td>
                <td style="padding:12px;">Rp 15.000</td>
                <td style="padding:12px;">Gudang A</td>
                <td style="padding:12px;">✏️ 🗑️</td>
            </tr>

            <tr>
                <td style="padding:12px;">Telur Ayam</td>
                <td style="padding:12px;">Protein</td>
                <td style="padding:12px;">100 butir</td>
                <td style="padding:12px;">50 butir</td>
                <td style="padding:12px;">Rp 2.500</td>
                <td style="padding:12px;">Kulkas</td>
                <td style="padding:12px;">✏️ 🗑️</td>
            </tr>

            <tr>
                <td style="padding:12px;">Bawang Merah</td>
                <td style="padding:12px;">Bumbu</td>
                <td style="padding:12px;">12 Kg</td>
                <td style="padding:12px;">6 Kg</td>
                <td style="padding:12px;">Rp 30.500</td>
                <td style="padding:12px;">Gudang B</td>
                <td style="padding:12px;">✏️ 🗑️</td>
            </tr>

            <tr>
                <td style="padding:12px;">Tomat</td>
                <td style="padding:12px;">Sayuran</td>
                <td style="padding:12px;">3 Kg</td>
                <td style="padding:12px;">5 Kg</td>
                <td style="padding:12px;">Rp 12.000</td>
                <td style="padding:12px;">Kulkas</td>
                <td style="padding:12px;">✏️ 🗑️</td>
            </tr>

            <tr>
                <td style="padding:12px;">Daging Sapi</td>
                <td style="padding:12px;">Protein</td>
                <td style="padding:12px;">15 Kg</td>
                <td style="padding:12px;">10 Kg</td>
                <td style="padding:12px;">Rp 120.000</td>
                <td style="padding:12px;">Freezer 2</td>
                <td style="padding:12px;">✏️ 🗑️</td>
            </tr>

        </tbody>
    </table>
</div>

@endsection
