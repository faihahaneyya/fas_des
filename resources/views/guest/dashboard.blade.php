<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Peminjaman Ruangan Desa</title>
    <style>
        @include('layouts.css')
    </style>
</head>
<body>

    {{-- start header --}}
    <!-- HEADER -->
    <header class="header">
        <nav class="nav-container">
            <div class="logo">Sistem Desa</div>

            <ul class="nav-menu">
                <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li><a href="{{ route('tentang') }}">Tentang</a></li>
                <li><a href="{{ route('kontak') }}">Kontak</a></li>
                <li><a href="{{ route('users.index') }}">User</a></li>
            </ul>

            <div class="nav-actions">
                <div class="user-info">
                    <span>👤</span>
                    <span>Selamat datang, <strong>Faiha</strong></span>
                </div>
                <a href="{{ route('auth.logout') }}" class="btn-logout">Keluar</a>
            </div>
        </nav>
    </header>
    {{-- end header --}}

    <!-- HERO -->
    <section class="hero">
        <h1>Kelola Fasilitas Desa Dengan Mudah</h1>
        <p>Sistem peminjaman ruangan terpadu untuk kemajuan desa kita</p>
        <a href="#ruangan" class="btn-explore">Jelajahi Fasilitas</a>
    </section>

    <!-- STATISTIK -->
    <div class="dashboard-stats">
        <div class="stat-card">
            <div class="stat-icon">🏠</div>
            <div class="stat-number">12</div>
            <div class="stat-label">Ruangan Tersedia</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">📅</div>
            <div class="stat-number">8</div>
            <div class="stat-label">Peminjaman Aktif</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">✅</div>
            <div class="stat-number">45</div>
            <div class="stat-label">Total Selesai</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">⭐</div>
            <div class="stat-number">4.8</div>
            <div class="stat-label">Rating Pengguna</div>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="main-content">
        <div style="text-align: center; margin-bottom: 30px;">
            <a href="{{ route('warga.create') }}">
                <button class="btn-pinjam" style="max-width: 250px;">➕ Tambah Data Warga</button>
            </a>
        </div>

        <h2 class="section-title" id="ruangan">Fasilitas Ruangan Desa</h2>
        <div class="ruangan-grid">
            <div class="ruangan-card">
                <div class="ruangan-image">🏛️</div>
                <div class="ruangan-content">
                    <h3 class="ruangan-title">Portal Pinjam Ruang Desa</h3>
                    <p class="ruangan-info">Kapasitas: 100 orang • Free</p>
                    <a href="{{ route('BalaiDesa.form-peminjaman') }}">
                        <button class="btn-pinjam">Pinjam Sekarang</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Sistem Desa</h3>
                <p>Platform terpadu untuk pengelolaan fasilitas dan ruangan desa.</p>
            </div>
            <div class="footer-section">
                <h3>Menu Cepat</h3>
                <a href="#">Beranda</a>
                <a href="#">Ruangan</a>
                <a href="#">Peminjaman</a>
                <a href="#">Kontak</a>
            </div>
            <div class="footer-section">
                <h3>Kontak</h3>
                <a href="#">📞 +62 812-3456-7890</a>
                <a href="#">✉️ desa@email.com</a>
                <a href="#">📍 Jl. Desa No. 123</a>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Sistem Peminjaman Ruangan Desa. All rights reserved.
        </div>
    </footer>
</body>
</html>
