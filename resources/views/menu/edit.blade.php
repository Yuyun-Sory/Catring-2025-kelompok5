@extends('layouts.app')

@section('title', 'Edit Menu')
@section('menu_active', 'active')

<<<<<<< HEAD
@push('styles')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endpush

@section('content')
<style>
    .form-container {
    max-width: 500px;
    background: #fff;
    padding: 24px;
    margin: 20px auto;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,.1);
}

.form-title {
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

.preview-image img {
    width: 120px;
    border-radius: 10px;
    margin-bottom: 10px;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.btn-submit {
    background: #2563eb;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
}

.btn-cancel {
    background: #e5e7eb;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    color: #000;
}

</style>
<div class="form-container">

    <h2 class="form-title">Edit Menu</h2>

    <form method="POST"
          action="{{ route('menu.update', $menu->id_menu) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Menu</label>
            <input type="text" name="nama_menu"
                   value="{{ old('nama_menu', $menu->nama_menu) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga"
                   value="{{ old('harga', $menu->harga) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Makanan" {{ $menu->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="Minuman" {{ $menu->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
            </select>
        </div>

        <div class="form-group">
            <label>Foto Menu</label>

            @if($menu->foto)
                <div class="preview-image">
                    <img src="{{ asset('storage/'.$menu->foto) }}" alt="Foto Menu">
                </div>
            @endif

            <input type="file" name="foto" accept="image/*">
            <small>Kosongkan jika tidak ingin mengganti foto</small>
        </div>

        <div class="form-actions">
            <a href="{{ route('menu') }}" class="btn-cancel">Batal</a>
            <button type="submit" class="btn-submit">Update</button>
        </div>

    </form>

</div>

=======
@section('content')
<style>
.form-container{
    max-width:520px;
    margin:40px auto;
    background:#fff;
    padding:30px;
    border-radius:16px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}
.form-title{
    font-size:22px;
    font-weight:700;
    margin-bottom:24px;
}
.form-group{
    margin-bottom:16px;
}
label{
    font-weight:600;
    margin-bottom:6px;
    display:block;
}
input,select{
    width:100%;
    padding:10px 14px;
    border-radius:10px;
    border:1px solid #ddd;
}
.preview-image img{
    width:120px;
    border-radius:12px;
    margin-bottom:10px;
}
.form-actions{
    display:flex;
    justify-content:space-between;
    margin-top:24px;
}
.btn-submit{
    background:#2563eb;
    color:white;
    padding:10px 22px;
    border-radius:10px;
    border:none;
}
.btn-cancel{
    background:#e5e7eb;
    padding:10px 22px;
    border-radius:10px;
    text-decoration:none;
    color:#000;
}
</style>

<div class="form-container">
<h2 class="form-title">✏️ Edit Menu</h2>

<form method="POST" action="{{ route('menu.update',$menu->id_menu) }}" enctype="multipart/form-data">
@csrf @method('PUT')

<div class="form-group">
    <label>Nama Menu</label>
    <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}" required>
</div>

<div class="form-group">
    <label>Harga</label>
    <input type="number" name="harga" value="{{ $menu->harga }}" required>
</div>

<div class="form-group">
    <label>Kategori</label>
    <select name="kategori" required>
        <option value="Makanan" {{ $menu->kategori=='Makanan'?'selected':'' }}>Makanan</option>
        <option value="Minuman" {{ $menu->kategori=='Minuman'?'selected':'' }}>Minuman</option>
    </select>
</div>

<div class="form-group">
    <label>Foto</label>
    <div class="preview-image">
        <img src="{{ asset('storage/'.$menu->foto) }}">
    </div>
    <input type="file" name="foto">
</div>

<div class="form-actions">
    <a href="{{ route('menu') }}" class="btn-cancel">Batal</a>
    <button class="btn-submit">Update</button>
</div>

</form>
</div>
>>>>>>> 2154e4b68bba9b697e3b2dc0bd83434d3cd78766
@endsection
