@extends('layouts.app')

@section('title', 'Tambah Data Warga')

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
        padding: 20px;
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

    .btn-success-custom {
        background-color: #4caf50;
        color: #fff;
    }

    .btn-success-custom:hover {
        background-color: #45a049;
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
        gap: 15px;
    }

    /* Responsive design */
    @media (max-width: 576px) {
        .form-card {
            padding: 30px 25px;
        }

        .form-group {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .form-label {
            width: 100%;
            text-align: left;
        }

        .form-control, .form-select {
            width: 100%;
        }

        .btn-group {
            flex-direction: column;
        }
    }
</style>

<section class="form-container">
    <div class="form-card">
        <h2><i class="fa-solid fa-user-plus"></i> Tambah Data Warga</h2>

        <form action="{{ route('warga.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label">Nomor KTP</label>
                <input type="text" name="no_ktp" class="form-control" placeholder="Masukkan nomor KTP" required>
            </div>

            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Agama</label>
                <select name="agama" class="form-select" required>
                    <option value="">-- Pilih Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan pekerjaan" required>
            </div>

            <div class="form-group">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="telp" class="form-control" placeholder="Masukkan nomor telepon" required>
            </div>

            <div class="form-group">
                <label class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control" placeholder="contoh: warga@gmail.com" required>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-custom btn-success-custom">
                    <i class="fa-solid fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('warga.index') }}" class="btn-secondary-custom">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</section>
@endsection
