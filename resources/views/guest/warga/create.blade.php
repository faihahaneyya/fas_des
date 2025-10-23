@extends('layouts.app')

@section('title', 'Tambah Data Warga')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background: #f5fff5;">
    <div class="card shadow-lg border-0 rounded-4 p-4" style="max-width: 700px; width: 100%; background: #ffffff;">
        <h2 class="text-center mb-4" style="color:#2e7d32; font-weight:600;">🧾 Tambah Data Warga</h2>

        <form action="{{ route('warga.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="no_ktp" class="form-label">Nomor KTP</label>
                <input type="text" name="no_ktp" id="no_ktp" class="form-control" placeholder="Masukkan nomor KTP" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama warga" required>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="agama" class="form-label">Agama</label>
                    <select name="agama" id="agama" class="form-select" required>
                        <option value="">-- Pilih Agama --</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukkan pekerjaan warga" required>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telp" class="form-label">No. Telepon</label>
                    <input type="text" name="telp" id="telp" class="form-control" placeholder="Masukkan nomor telepon" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="contoh: warga@gmail.com" required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-3 px-4">← Kembali</a>
                <button type="submit" class="btn btn-success rounded-3 px-4">💾 Simpan</button>
            </div>
        </form>
    </div>
</div>

<style>
    .form-control, .form-select {
        border: 1px solid #c8e6c9;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        border-radius: 10px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #43a047;
        box-shadow: 0 0 0 0.2rem rgba(67, 160, 71, 0.25);
    }

    .btn-success {
        background-color: #43a047;
        border: none;
    }

    .btn-success:hover {
        background-color: #2e7d32;
    }

    label {
        color: #2e7d32;
        font-weight: 500;
    }

    .card {
        border-radius: 20px;
        background: #fff;
    }
</style>
@endsection
