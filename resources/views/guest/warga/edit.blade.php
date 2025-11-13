@extends('layouts.app')

@section('content')
<!-- Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        background: linear-gradient(to bottom, #e6f3e6, #f9fff9);
    }

    .form-container {
        min-height: 85vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-card {
        background: #ffffff;
        width: 100%;
        max-width: 520px;
        padding: 40px 45px;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .form-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .form-card h2 {
        color: #2e7d32;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 18px;
    }

    .form-label {
        font-weight: 600;
        color: #2e7d32;
        width: 140px;
        text-align: right;
        margin-bottom: 0;
    }

    .form-control, .form-select {
        flex: 1;
        border: 1px solid #c5e1c5;
        border-radius: 8px;
        padding: 10px;
        transition: 0.3s;
        font-size: 14px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #81c784;
        box-shadow: 0 0 5px rgba(129, 199, 132, 0.5);
        outline: none;
    }

    .btn-custom {
        border: none;
        border-radius: 8px;
        font-weight: 600;
        padding: 10px 22px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .btn-warning-custom {
        background-color: #ffb300;
        color: #fff;
    }

    .btn-warning-custom:hover {
        background-color: #ffa000;
        transform: scale(1.03);
    }

    .btn-secondary-custom {
        background-color: #9e9e9e;
        color: #fff;
        text-decoration: none;
        display: inline-block;
        padding: 10px 22px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: 14px;
        text-align: center;
    }

    .btn-secondary-custom:hover {
        background-color: #7e7e7e;
        transform: scale(1.03);
        text-decoration: none;
        color: #fff;
    }

    .btn-group {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
    }
</style>

<section class="form-container">
    <div class="form-card">
        <h2><i class="fa-solid fa-pen-to-square"></i> Edit Data Warga</h2>

        <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nomor KTP</label>
                <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp', $warga->no_ktp) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $warga->nama) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Agama</label>
                <select name="agama" class="form-select" required>
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam" {{ old('agama', $warga->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama', $warga->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama', $warga->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama', $warga->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('agama', $warga->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('agama', $warga->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $warga->pekerjaan) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="telp" class="form-control" value="{{ old('telp', $warga->telp) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $warga->email) }}" required>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-custom btn-warning-custom">
                    <i class="fa-solid fa-rotate"></i> Update
                </button>

                <a href="{{ route('warga.index') }}" class="btn-secondary-custom">
                    <i class="fa-solid fa-arrow-left"></i> Batal
                </a>
            </div>
        </form>
    </div>
</section>
@endsection
