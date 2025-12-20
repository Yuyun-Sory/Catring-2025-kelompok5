@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center mt-4">
    <div class="card shadow" style="width:90%; max-width:1200px;">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0"><b>Daftar Admin</b></h4>
                <a href="{{ route('admin.akun.tambah') }}" class="btn btn-success">
                    + Tambah Admin
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($users as $i => $user)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <span class="badge bg-success">{{ $user->status }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.akun.edit', $user->id) }}"
                               class="btn btn-sm btn-primary">
                                Edit
                            </a>

                            <button class="btn btn-sm btn-danger"
                                onclick="bukaModal({{ $user->id }})">
                                Hapus
                            </button>

                            <form id="hapus-{{ $user->id }}"
                                  action="{{ route('admin.akun.delete', $user->id) }}"
                                  method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

{{-- MODAL KONFIRMASI HAPUS --}}
<div id="modalHapus" class="modal-custom">
    <div class="modal-box">
        <h5 class="mb-3">Konfirmasi</h5>
        <p>Apakah Anda yakin menghapus akun admin ini?</p>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <button id="btnYa" class="btn btn-danger px-4">
                Ya
            </button>
            <button onclick="tutupModal()" class="btn btn-success px-4">
                Tidak
            </button>
        </div>
    </div>
</div>

{{-- STYLE MODAL --}}
<style>
.modal-custom {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-box {
    background: white;
    padding: 25px 30px;
    border-radius: 10px;
    width: 350px;
    text-align: center;
}
</style>

{{-- SCRIPT --}}
<script>
let idHapus = null;

function bukaModal(id) {
    idHapus = id;
    document.getElementById('modalHapus').style.display = 'flex';
}

function tutupModal() {
    document.getElementById('modalHapus').style.display = 'none';
    idHapus = null;
}

document.getElementById('btnYa').addEventListener('click', function () {
    if (idHapus) {
        document.getElementById('hapus-' + idHapus).submit();
    }
});
</script>
@endsection
