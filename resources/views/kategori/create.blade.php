<style>
    /* ====================================================================== */
    /* CSS MODAL (POP-UP) STYLING */
    /* ====================================================================== */

    /* Modal Backdrop */
    .modal {
        display: none; /* Sembunyikan secara default */
        position: fixed;
        z-index: 1000; /* Pastikan di atas semua elemen */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.6); /* Background gelap transparan */
        padding-top: 50px;
    }

    /* Modal Content Container */
    .modal-content {
        background-color: #ffffff;
        margin: 5% auto; /* Jarak dari atas */
        padding: 30px;
        border: none;
        width: 90%; 
        max-width: 550px; /* Lebar yang nyaman */
        border-radius: 15px; /* Sudut lebih membulat */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); /* Shadow yang menawan */
        position: relative;
        animation: slideDown 0.4s ease-out; /* Animasi pop-up */
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-50px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Close Button (X) */
    .close {
        color: #555;
        float: right;
        font-size: 36px;
        font-weight: 300;
        line-height: 1;
        position: absolute;
        top: 10px;
        right: 20px;
        transition: color 0.2s;
    }
    .close:hover,
    .close:focus {
        color: #dc3545; /* Merah saat hover */
        text-decoration: none;
        cursor: pointer;
    }

    /* Header & Form Styling */
    .modal-content h3 {
        margin-top: 0;
        margin-bottom: 25px;
        color: #1a1a1a;
        border-bottom: 3px solid #5da770; /* Garis pemisah tebal dan elegan */
        padding-bottom: 10px;
        font-size: 26px;
        font-weight: 700;
    }

    .modal-content label {
        display: block;
        margin-top: 18px;
        margin-bottom: 6px;
        font-weight: 600;
        color: #333;
        font-size: 16px;
    }

    .modal-content input[type="text"],
    .modal-content input[type="number"],
    .modal-content select {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 8px; /* Sudut input yang lebih halus */
        box-sizing: border-box; 
        font-size: 16px;
        transition: border-color 0.3s;
    }
    
    .modal-content input:focus, .modal-content select:focus {
        border-color: #5da770;
        outline: none;
        box-shadow: 0 0 0 4px rgba(93, 167, 112, 0.2); /* Efek fokus hijau */
    }

    /* File input styling (dipercantik) */
    .modal-content input[type="file"] {
        padding: 10px 15px;
        border: 2px dashed #5da770; /* Border putus-putus */
        background-color: #f8fff9;
        color: #5da770;
        cursor: pointer;
    }

    /* Submit Button */
    .btn-submit {
        background-color: #5da770; /* Hijau yang konsisten */
        color: white;
        padding: 14px 20px;
        margin-top: 30px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.1s;
    }
    .btn-submit:hover {
        background-color: #4a8c5b;
        transform: translateY(-2px); /* Efek tekan */
    }
</style>

<div id="createModal" class="modal" style="display:none;">
    <div class="modal-content">
        {{-- Tombol close (X) --}}
        <span class="close" onclick="closeCreateModal()">&times;</span>
        
        <h3>Tambahkan Menu Baru 🍽️</h3>

        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="nama_menu">Nama Menu</label>
            <input type="text" id="nama_menu" name="nama_menu" placeholder="Contoh: Nasi Goreng Spesial" required>

            <label for="harga">Harga (Angka saja)</label>
            <input type="number" id="harga" name="harga" placeholder="Contoh: 25000" required>

            <label for="nama_menu">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsi" placeholder="Contoh: Nasi Goreng Spesial adalah nasi" required>

            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" required>
                <option value="" disabled selected>Pilih Kategori Menu</option>
                <option value="makanan">Makanan</option>
                <option value="minuman">Paket Minuman</option>
                <option value="cemilan">Cemilan</option>
                <option value="oleh-oleh">Oleh-Oleh</option>
            </select>

            <label for="foto">Foto Menu</label>
            <input type="file" id="foto" name="foto" accept="image/*" required> 

            <button type="submit" class="btn-submit">Simpan dan Publikasikan Menu</button>
        </form>
    </div>
</div>