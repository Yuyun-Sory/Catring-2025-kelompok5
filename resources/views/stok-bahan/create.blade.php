{{-- resources/views/stok-bahan/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Bahan Baru')

@section('content')

    {{-- Header Halaman --}}
 

    {{-- Tombol Pemicu Modal (Opsional, tapi biasanya digunakan untuk modal) --}}
    {{-- Karena ini halaman "create", saya akan langsung menampilkan modal secara default --}}

    {{-- Modal Pop-up untuk Form Tambah Bahan --}}
    <div id="modalTambahBahan" style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Overlay */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    ">
        {{-- Konten Modal --}}
        <div style="
            background: white;
            padding: 30px;
            border-radius: 12px;
            max-width: 600px;
            width: 90%; /* Agar responsif */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            position: relative;
            animation: fadeIn 0.3s ease-out; /* Efek Animasi */
        ">
            
            {{-- Header Form di dalam Modal --}}
            <h3 style="margin-top: 0; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px; color: #333;">
                📝 Formulir Tambah Bahan Baru
            </h3>

            {{-- Form Tambah Bahan --}}
            <form action="{{ route('stok.bahan.store') }}" method="POST">
                @csrf

                {{-- Baris 1: Nama Bahan & Kategori --}}
                <div style="display: flex; gap: 20px; margin-bottom: 15px;">
                    <div style="flex: 2;">
                        <label for="nama" style="font-weight: bold; display: block; margin-bottom: 5px;">Nama Bahan:</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" placeholder="Contoh: Tepung Terigu" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="kategori" style="font-weight: bold; display: block; margin-bottom: 5px;">Kategori:</label>
                        <select name="kategori" id="kategori" class="form-control" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">Pilih Kategori</option>
                            <option value="Bahan Pokok" {{ old('kategori') == 'Bahan Pokok' ? 'selected' : '' }}>Bahan Pokok</option>
                            <option value="Protein" {{ old('kategori') == 'Protein' ? 'selected' : '' }}>Protein</option>
                            <option value="Sayuran" {{ old('kategori') == 'Sayuran' ? 'selected' : '' }}>Sayuran</option>
                            <option value="Bumbu" {{ old('kategori') == 'Bumbu' ? 'selected' : '' }}>Bumbu</option>
                            <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                </div>
                
                {{-- Baris 2: Stok Saat Ini & Satuan --}}
                <div style="display: flex; gap: 20px; margin-bottom: 15px;">
                    <div style="flex: 2;">
                        <label for="stok_saat_ini" style="font-weight: bold; display: block; margin-bottom: 5px;">Stok Saat Ini:</label>
                        <input type="number" name="stok_saat_ini" id="stok_saat_ini" class="form-control" value="{{ old('stok_saat_ini') }}" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="satuan" style="font-weight: bold; display: block; margin-bottom: 5px;">Satuan:</label>
                        <input type="text" name="satuan" id="satuan" class="form-control" value="{{ old('satuan') }}" placeholder="Kg/Liter/Butir" required>
                    </div>
                </div>
                
                {{-- Baris 3: Minimal Stok & Harga Satuan --}}
                <div style="display: flex; gap: 20px; margin-bottom: 15px;">
                    <div style="flex: 1;">
                        <label for="minimal_stok" style="font-weight: bold; display: block; margin-bottom: 5px;">Minimal Stok (Batas Menipis):</label>
                        <input type="number" name="minimal_stok" id="minimal_stok" class="form-control" value="{{ old('minimal_stok') }}" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="harga_satuan" style="font-weight: bold; display: block; margin-bottom: 5px;">Harga Satuan (Rp):</label>
                        <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" step="0.01" value="{{ old('harga_satuan') }}" required>
                    </div>
                </div>
                
                {{-- Baris 4: Lokasi Penyimpanan --}}
                <div style="margin-bottom: 25px;">
                    <label for="lokasi" style="font-weight: bold; display: block; margin-bottom: 5px;">Lokasi Penyimpanan:</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi') }}" placeholder="Contoh: Rak B-1 / Freezer">
                </div>

                {{-- Tombol Aksi --}}
                <div style="text-align: right; border-top: 1px solid #eee; padding-top: 15px;">
                    <a href="{{ route('stok.bahan') }}" style="
                        margin-right: 10px;
                        color: #6c757d;
                        text-decoration: none;
                        padding: 10px 20px;
                        border: 1px solid #ccc;
                        border-radius: 8px;
                        transition: all 0.3s;
                    ">
                        Batal
                    </a>
                    <button type="submit" style="
                        padding: 10px 20px;
                        background: #28a745;
                        color: white;
                        border: none;
                        border-radius: 8px;
                        cursor: pointer;
                        transition: background 0.3s;
                    ">
                        Simpan Bahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Styling untuk Form Control (Diasumsikan form-control belum terdefinisi di app.css) --}}
    <style>
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        /* Animasi Pop-up */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
@endsection