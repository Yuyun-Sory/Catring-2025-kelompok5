@extends('layouts.app')

@section('title', 'Tambah Menu')

@section('content')
<div class="p-4">

<h2>Tambah Menu</h2>

<form method="POST"
      action="{{ route('menu.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div>
        <label>Nama Menu</label><br>
        <input type="text" name="nama_menu" required>
    </div>

    <div>
        <label>Harga</label><br>
        <input type="number" name="harga" required>
    </div>

    <div>
        <label>Kategori</label><br>
        <select name="kategori" required>
            <option value="">-- Pilih --</option>
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
        </select>
    </div>

    <div>
        <label>Foto</label><br>
        <input type="file" name="foto" required>
    </div>

    <br>
    <button type="submit">💾 Simpan</button>

</form>

</div>
@endsection
