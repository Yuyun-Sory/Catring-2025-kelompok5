@extends('layouts.app')

@section('title', 'Tambah Menu')

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
.btn-submit{
    background:#16a34a;
    color:white;
    padding:12px;
    width:100%;
    border-radius:12px;
    border:none;
    font-weight:600;
}
</style>

<div class="form-container">
<h2 class="form-title">➕ Tambah Menu</h2>

<form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
@csrf

<div class="form-group">
    <label>Nama Menu</label>
    <input type="text" name="nama_menu" required>
</div>

<div class="form-group">
    <label>Harga</label>
    <input type="number" name="harga" required>
</div>

<div class="form-group">
    <label>Kategori</label>
    <select name="kategori" required>
        <option value="">-- Pilih --</option>
        <option value="Makanan">Makanan</option>
        <option value="Minuman">Minuman</option>
    </select>
</div>

<div class="form-group">
    <label>Foto</label>
    <input type="file" name="foto" required>
</div>

<button class="btn-submit">💾 Simpan Menu</button>

</form>
</div>
@endsection
