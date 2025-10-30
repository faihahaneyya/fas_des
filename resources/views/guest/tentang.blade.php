<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang - Sistem Desa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(rgba(240, 247, 240, 0.85), rgba(232, 244, 232, 0.85));
            color: #2d5015;
            line-height: 1.6;
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
            overflow-x: hidden;
        }

        /* ANIMASI */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
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

        /* HEADER / NAVBAR */
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

        .nav-menu li:nth-child(1) {
            animation-delay: 0.1s;
        }

        .nav-menu li:nth-child(2) {
            animation-delay: 0.2s;
        }

        .nav-menu li:nth-child(3) {
            animation-delay: 0.3s;
        }

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

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #2d5015;
            font-weight: 500;
        }

        .btn-quote {
            background: white;
            color: #7ab87a;
            padding: 8px 18px;
            border-radius: 25px;
            font-weight: 600;
            border: 2px solid #d4e8d4;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-quote:hover {
            background: #f8fcf8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 195, 139, 0.25);
        }

        /* CONTENT */
        section {
            text-align: center;
            padding: 100px 20px 60px;
            animation: fadeInUp 1.2s ease-out both;
        }

        h2 {
            font-size: 42px;
            font-weight: 700;
            color: #2d5015;
            margin-bottom: 25px;
        }

        p {
            max-width: 850px;
            margin: 0 auto 30px;
            font-size: 17px;
            color: #4a6b4a;
            line-height: 1.7;
        }

        .overview {
            background-color: white;
            border: 2px solid #d4e8d4;
            border-radius: 15px;
            padding: 40px;
            width: 80%;
            margin: 30px auto;
            box-shadow: 0 5px 15px rgba(139, 195, 139, 0.1);
            transition: all 0.3s ease;
        }

        .overview:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(139, 195, 139, 0.15);
        }

        .overview h3 {
            font-size: 22px;
            color: #2d5015;
            margin-bottom: 15px;
        }

        /* FOOTER */
        footer {
            background: linear-gradient(135deg, rgba(139, 195, 139, 0.95) 0%, rgba(122, 184, 122, 0.95) 100%);
            color: #2d5015;
            text-align: center;
            padding: 40px 20px;
            margin-top: 60px;
            box-shadow: 0 -2px 10px rgba(139, 195, 139, 0.2);
            animation: fadeIn 0.8s ease-out 0.5s both;
        }

        footer p {
            font-size: 14px;
            color: #4a6b4a;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .overview {
                width: 90%;
            }
        }

        /* Animasi tambahan */
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
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <nav class="nav-container">
            <div class="logo">Sistem Desa</div>

            <ul class="nav-menu">
                <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li><a href="{{ route('tentang') }}" style="font-weight:600;">Tentang</a></li>
                <li><a href="{{ route('kontak') }}">Kontak</a></li>
                <li><a href="{{ route('users.index') }}">User</a></li>
            </ul>

            <div class="nav-actions">
                <div class="user-info">
                    <span>👤 Selamat datang, <strong>Faiha</strong></span>

                    <!-- Logout pakai GET sesuai route -->
                    <a href="{{ route('auth.logout') }}" class="btn-quote">Keluar</a>
                </div>
            </div>
        </nav>
    </header>


    <!-- CONTENT -->
    <section>
        <h2>Tentang Sistem Peminjaman Ruangan Desa</h2>
        <p>
            <strong>Sistem Desa</strong> adalah platform digital terpadu yang dirancang untuk membantu masyarakat
            dan perangkat desa dalam mengelola, memantau, serta meminjam fasilitas desa dengan mudah, efisien, dan
            transparan.
        </p>

        <div class="overview">
            <h3>🌿 Tujuan Kami</h3>
            <p>
                Mewujudkan tata kelola desa yang modern dan berkeadilan melalui sistem digital.
                Kami berkomitmen untuk mempermudah warga dalam mengakses dan memanfaatkan fasilitas desa
                serta membantu perangkat desa dalam pemantauan kegiatan dan peminjaman.
            </p>
        </div>

        <div class="overview">
            <h3>💡 Manfaat Sistem</h3>
            <p>
                ✅ Proses peminjaman lebih cepat dan praktis <br>
                ✅ Meningkatkan transparansi pengelolaan fasilitas <br>
                ✅ Mendorong partisipasi masyarakat dalam kegiatan desa <br>
                ✅ Memperkuat komunikasi antara warga dan pemerintah desa
            </p>
        </div>

        <div class="overview">
            <h3>🤝 Visi Kami</h3>
            <p>
                Menjadikan teknologi digital sebagai sarana penggerak pembangunan desa yang inklusif,
                berdaya saing, dan berkelanjutan.
            </p>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2025 Sistem Peminjaman Ruangan Desa. Semua hak dilindungi.</p>
    </footer>

</body>

</html>
