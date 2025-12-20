@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">

    <div class="row justify-content-center">
        <div class="col-lg-7 col-xl-6">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">

                    <h4 class="text-center fw-bold mb-4">
                        Edit Akun Admin
                    </h4>

                    <form action="{{ route('admin.akun.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name"
                                   class="form-control form-control-lg"
                                   value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                                   class="form-control form-control-lg"
                                   value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="phone"
                                   class="form-control form-control-lg"
                                   value="{{ old('phone', $user->phone) }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select form-select-lg">
                                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>
                                    Admin
                                </option>
                                <option value="Karyawan" {{ $user->role == 'Karyawan' ? 'selected' : '' }}>
                                    Karyawan
                                </option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.akun') }}" class="btn btn-secondary px-4">
                                Kembali
                            </a>

                            <button class="btn btn-primary px-5">
                                Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
