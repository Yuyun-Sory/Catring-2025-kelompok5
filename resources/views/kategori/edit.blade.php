<style>
    /* ====================================================================== */
    /* CSS MODAL (POP-UP) STYLING - (Sama dengan Modal Create untuk konsistensi) */
    /* ====================================================================== */

    /* Modal Backdrop */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.6);
        padding-top: 50px;
    }

    /* Modal Content Container */
    .modal-content {
        background-color: #ffffff;
        margin: 5% auto;
        padding: 30px;
        border: none;
        width: 90%;
        max-width: 550px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        position: relative;
        animation: slideDown 0.4s ease-out;
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
        color: #dc3545;
        text-decoration: none;
        cursor: pointer;
    }

    /* Header & Form Styling */
    .modal-content h3 {
        margin-top: 0;
        margin-bottom: 25px;
        color: #1a1a1a;
        border-bottom: 3px solid #f9a825; /* Menggunakan warna kuning/oranye untuk Edit */
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
        border-radius: 8px;
        box-sizing: border-box; 
        font-size: 16px;
        transition: border-color 0.3s;
    }
    
    .modal-content input:focus, .modal-content select:focus {
        border-color: #f9a825; /* Efek fokus oranye */
        outline: none;
        box-shadow: 0 0 0 4px rgba(249, 168, 37, 0.2);
    }

    /* File input styling */
    .modal-content input[type="file"] {
        padding: 10px 15px;
        border: 2px dashed #f9a825; /* Border putus-putus oranye */
        background-color: #fffaf4;
        color: #f9a825;
        cursor: pointer;
    }
    
    /* Foto Saat Ini */
    #current-photo {
        text-align: center;
        margin: 15px 0 25px 0 !important;
        padding: 10px;
        border: 1px solid #eee;
        border-radius: 8px;
        background: #fcfcfc;
    }
    #current-photo img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #f9a825;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Submit Button (Update) */
    .btn-submit {
        background-color: #f9a825; /* Oranye yang dominan untuk Update */
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
        background-color: #e69519;
        transform: translateY(-2px);
    }
</style>

<div id="editModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        
        <h3>Edit Menu ✏️</h3>

        <form id="editForm" method="POST" enctype="multipart/form-data">
            {{-- Form action akan diisi oleh JavaScript saat openEditModal dipanggil --}}
            @csrf
            @method('PUT')

            {{-- Input hidden ini sebenarnya tidak digunakan untuk PUT/PATCH, 
                 karena ID sudah di handle oleh form action yang diisi JS, 
                 tapi dipertahankan jika Anda ingin menggunakannya untuk AJAX/validasi. --}}
            <input type="hidden" id="edit-id" name="id"> 

            <label for="edit-nama">Nama Menu</label>
            <input type="text" id="edit-nama" name="nama_menu" required>

            <label for="edit-harga">Harga (Angka saja)</label>
            <input type="number" id="edit-harga" name="harga" required>

            <label for="edit-nama">Deskripsi</label>
            <input type="text" id="edit-deskripsi" name="deskripsi" required>

            <label for="edit-kategori">Kategori</label>
            {{-- Value akan diatur oleh JavaScript --}}
            <select id="edit-kategori" name="kategori" required>
                <option value="makanan">Makanan</option>
                <option value="minuman">Paket Minuman</option>
                <option value="cemilan">Cemilan</option>
                <option value="oleh-oleh">Oleh-Oleh</option>
            </select>

            <label>Foto Saat Ini</label>
            <div id="current-photo">
                {{-- Foto saat ini akan diisi oleh JavaScript --}}
                <img src="" width="100" alt="Foto Menu">
            </div>

            <label for="edit-foto">Ubah Foto (Opsional)</label>
            <input type="file" id="edit-foto" name="foto" accept="image/*">

            <button type="submit" class="btn-submit">Update Menu</button>
        </form>
    </div>
</div>