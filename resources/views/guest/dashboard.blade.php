<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Peminjaman Ruangan Desa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(240, 247, 240, 0.85), rgba(232, 244, 232, 0.85)),
                        url('https://images.unsplash.com/photo-1560493676-04071c5f467b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #2d5015;
            line-height: 1.6;
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, rgba(168, 213, 168, 0.95) 0%, rgba(139, 195, 139, 0.95) 100%);
            color: #2d5015;
            padding: 15px 0;
            box-shadow: 0 2px 15px rgba(139, 195, 139, 0.2);
            animation: slideDown 0.8s ease-out;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #2d5015;
            animation: fadeInLeft 0.8s ease-out;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-menu li {
            animation: fadeInDown 0.6s ease-out both;
        }

        .nav-menu li:nth-child(1) { animation-delay: 0.1s; }
        .nav-menu li:nth-child(2) { animation-delay: 0.2s; }
        .nav-menu li:nth-child(3) { animation-delay: 0.3s; }
        .nav-menu li:nth-child(4) { animation-delay: 0.4s; }
        .nav-menu li:nth-child(5) { animation-delay: 0.5s; }
        .nav-menu li:nth-child(6) { animation-delay: 0.6s; }

        .nav-menu a {
            color: #2d5015;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #2d5015;
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .nav-menu a:hover {
            color: #4a6b4a;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 15px;
            animation: fadeInRight 0.8s ease-out;
        }

        .btn-quote {
            background: white;
            color: #7ab87a;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid #d4e8d4;
        }

        .btn-quote:hover {
            background: #f8fcf8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 195, 139, 0.2);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #2d5015;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(168, 213, 168, 0.85), rgba(94, 142, 94, 0.85));
            color: #2d5015;
            padding: 100px 0;
            text-align: center;
            animation: fadeIn 1s ease-out 0.5s both;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            animation: slideUp 0.8s ease-out 0.7s both;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0.9;
            animation: slideUp 0.8s ease-out 0.9s both;
        }

        .btn-explore {
            background: white;
            color: #7ab87a;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-block;
            border: 2px solid #d4e8d4;
            animation: fadeInUp 0.8s ease-out 1.1s both;
        }

        .btn-explore:hover {
            background: #f8fcf8;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(139, 195, 139, 0.2);
        }

        /* Dashboard Stats */
        .dashboard-stats {
            max-width: 1200px;
            margin: -50px auto 50px;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(139, 195, 139, 0.1);
            text-align: center;
            border: 2px solid #d4e8d4;
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease-out both;
            opacity: 0;
        }

        .stat-card:nth-child(1) { animation-delay: 1.2s; }
        .stat-card:nth-child(2) { animation-delay: 1.4s; }
        .stat-card:nth-child(3) { animation-delay: 1.6s; }
        .stat-card:nth-child(4) { animation-delay: 1.8s; }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(139, 195, 139, 0.15);
        }

        .stat-icon {
            font-size: 40px;
            margin-bottom: 15px;
            animation: bounce 2s ease-in-out infinite;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: #7ab87a;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #7a9c7a;
            font-weight: 500;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #2d5015;
            text-align: center;
            animation: fadeIn 0.8s ease-out 2s both;
        }

        /* Ruangan Grid */
        .ruangan-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .ruangan-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(139, 195, 139, 0.1);
            transition: all 0.3s ease;
            border: 2px solid #d4e8d4;
            animation: slideInUp 0.6s ease-out both;
            opacity: 0;
        }

        .ruangan-card:nth-child(1) { animation-delay: 2.2s; }
        .ruangan-card:nth-child(2) { animation-delay: 2.4s; }
        .ruangan-card:nth-child(3) { animation-delay: 2.6s; }

        .ruangan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(139, 195, 139, 0.15);
        }

        .ruangan-image {
            height: 200px;
            background: linear-gradient(135deg, #a8d5a8, #8bc38b);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2d5015;
            font-size: 48px;
            transition: all 0.3s ease;
        }

        .ruangan-card:hover .ruangan-image {
            transform: scale(1.05);
        }

        .ruangan-content {
            padding: 20px;
        }

        .ruangan-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #2d5015;
        }

        .ruangan-info {
            color: #7a9c7a;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .btn-pinjam {
            background: linear-gradient(135deg, #8bc38b, #7ab87a);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .btn-pinjam::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-pinjam:hover {
            background: linear-gradient(135deg, #7ab87a, #8bc38b);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 195, 139, 0.3);
        }

        .btn-pinjam:hover::before {
            left: 100%;
        }

        /* Recent Activities */
        .activities {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(139, 195, 139, 0.1);
            border: 2px solid #d4e8d4;
            animation: fadeIn 0.8s ease-out 2.8s both;
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #e8f4e8;
            display: flex;
            align-items: center;
            gap: 15px;
            animation: slideInRight 0.5s ease-out both;
        }

        .activity-item:nth-child(1) { animation-delay: 3s; }
        .activity-item:nth-child(2) { animation-delay: 3.2s; }
        .activity-item:nth-child(3) { animation-delay: 3.4s; }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            font-size: 20px;
            color: #7ab87a;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: #2d5015;
        }

        .activity-time {
            color: #7a9c7a;
            font-size: 12px;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, rgba(139, 195, 139, 0.95) 0%, rgba(122, 184, 122, 0.95) 100%);
            color: #2d5015;
            padding: 40px 0;
            margin-top: 50px;
            animation: fadeIn 0.8s ease-out 3.6s both;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-section h3 {
            margin-bottom: 20px;
            font-size: 18px;
            color: #2d5015;
        }

        .footer-section a {
            color: #4a6b4a;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #2d5015;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(45, 80, 21, 0.1);
            color: #4a6b4a;
        }

        /* Animation Keyframes */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                gap: 15px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            .dashboard-stats {
                margin-top: -30px;
            }
        }

        @media (max-width: 480px) {
            .nav-menu {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .hero h1 {
                font-size: 28px;
            }

            .stat-number {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Navigation -->
    <header class="header">
        <nav class="nav-container">
            <div class="logo">Sistem Desa</div>
            <ul class="nav-menu">
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Tentang</a></li>
                <li><a href="#">Layanan</a></li>
                <li><a href="#">Proyek</a></li>
                <li><a href="#">Halaman ▼</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
            <div class="nav-actions">
                <div class="user-info">
                    <span>👤</span>
                    <span>Selamat datang, Faiha</span>
                </div>
                <a href="{{ route('auth.logout') }}" class="btn-quote" method="POST">Keluar</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Kelola Fasilitas Desa Dengan Mudah</h1>
            <p>Sistem peminjaman ruangan terpadu untuk kemajuan desa kita</p>
            <a href="#ruangan" class="btn-explore">Jelajahi Fasilitas</a>
        </div>
    </section>

    <!-- Dashboard Statistics -->
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

    <!-- Main Content -->
    <div class="main-content">
        <div style="text-align: center; margin-bottom: 30px;">
        <a href="{{ route('warga.create') }}">
            <button class="btn-pinjam" style="max-width: 250px;">
                ➕ Tambah Data Warga
            </button>
        </a>
    </div>

        <!-- Ruangan Section -->
        <h2 class="section-title" id="ruangan">Fasilitas Ruangan Desa</h2>
        <div class="ruangan-grid">
            <div class="ruangan-card">
                <div class="ruangan-image">🏛️</div>
                <div class="ruangan-content">
                    <h3 class="ruangan-title">Balai Desa</h3>
                    <p class="ruangan-info">Kapasitas: 100 orang • Free</p>
                    <a href="{{ route('BalaiDesa.form-peminjaman') }}">
    <button class="btn-pinjam">Pinjam Sekarang</button>
</a>
                </div>
            </div>
            <div class="ruangan-card">
                <div class="ruangan-image">🎭</div>
                <div class="ruangan-content">
                    <h3 class="ruangan-title">Aula Serbaguna</h3>
                    <p class="ruangan-info">Kapasitas: 50 orang • Free</p>
                    <button class="btn-pinjam">Pinjam Sekarang</button>
                </div>
            </div>
            <div class="ruangan-card">
                <div class="ruangan-image">📚</div>
                <div class="ruangan-content">
                    <h3 class="ruangan-title">Perpustakaan</h3>
                    <p class="ruangan-info">Kapasitas: 30 orang • Free</p>
                    <button class="btn-pinjam">Pinjam Sekarang</button>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <h2 class="section-title">Aktivitas Terkini</h2>
        <div class="activities">
            <ul class="activity-list">
                <li class="activity-item">
                    <div class="activity-icon">📅</div>
                    <div class="activity-content">
                        <div class="activity-title">Peminjaman Balai Desa disetujui</div>
                        <div class="activity-time">2 jam yang lalu</div>
                    </div>
                </li>
                <li class="activity-item">
                    <div class="activity-icon">✅</div>
                    <div class="activity-content">
                        <div class="activity-title">Peminjaman Aula selesai</div>
                        <div class="activity-time">1 hari yang lalu</div>
                    </div>
                </li>
                <li class="activity-item">
                    <div class="activity-icon">🆕</div>
                    <div class="activity-content">
                        <div class="activity-title">Ruangan baru ditambahkan</div>
                        <div class="activity-time">2 hari yang lalu</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
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
