@extends('layouts.app')
@section('content')

<!-- Tambahkan link Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- HERO -->
<section class="hero text-center">
    <h1>Kelola Fasilitas Desa Dengan Mudah</h1>
    <p>Sistem peminjaman ruangan terpadu untuk kemajuan desa kita</p>
    <a href="#ruangan" class="btn-explore">Jelajahi Fasilitas</a>
</section>

<!-- STATISTIK -->
<div class="dashboard-stats">
    <div class="stat-card">
        <div class="stat-icon"><i class="fa-solid fa-house"></i></div>
        <div class="stat-number">12</div>
        <div class="stat-label">Ruangan Tersedia</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fa-solid fa-calendar-days"></i></div>
        <div class="stat-number">8</div>
        <div class="stat-label">Peminjaman Aktif</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
        <div class="stat-number">45</div>
        <div class="stat-label">Total Selesai</div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fa-solid fa-star"></i></div>
        <div class="stat-number">4.8</div>
        <div class="stat-label">Rating Pengguna</div>
    </div>
</div>

<!-- KONTEN UTAMA -->
<div class="main-content">
    <div style="text-align: center; margin-bottom: 30px;">
        <a href="{{ route('warga.create') }}">
            <button class="btn-pinjam" style="max-width: 250px;">
                <i class="fa-solid fa-user-plus"></i> Tambah Data Warga
            </button>
        </a>
    </div>

    <h2 class="section-title" id="ruangan">Fasilitas Ruangan Desa</h2>
    <div class="ruangan-grid">
        <div class="ruangan-card">
            <div class="ruangan-image">
                <i class="fa-solid fa-landmark fa-3x"></i>
            </div>
            <div class="ruangan-content">
                <h3 class="ruangan-title">Portal Pinjam Ruang Desa</h3>
                <p class="ruangan-info"><i class="fa-solid fa-users"></i> Kapasitas: 100 orang • Free</p>
                <a href="{{ route('BalaiDesa.form-peminjaman') }}">
                    <button class="btn-pinjam">
                        <i class="fa-solid fa-handshake"></i> Pinjam Sekarang
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
