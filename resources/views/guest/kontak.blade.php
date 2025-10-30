<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Sistem Peminjaman Ruangan Desa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(240, 247, 240, 0.85), rgba(232, 244, 232, 0.85));
            color: #2d5015;
            line-height: 1.6;
            overflow-x: hidden;
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
        }

        /* NAVBAR / HEADER */
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
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #2d5015;
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

        /* SECTION KONTAK */
        .kontak {
            text-align: center;
            padding: 100px 20px;
            max-width: 1000px;
            margin: auto;
        }

        .kontak h1 {
            font-size: 42px;
            color: #2d5015;
            margin-bottom: 20px;
        }

        .kontak p {
            font-size: 18px;
            color: #4a6b4a;
            margin-bottom: 50px;
        }

        .contact-cards {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 40px;
        }

        .card {
            background: white;
            border: 2px solid #d4e8d4;
            border-radius: 15px;
            padding: 30px;
            width: 250px;
            box-shadow: 0 5px 15px rgba(139, 195, 139, 0.1);
            transition: 0.3s;
            animation: fadeUp 0.8s ease-in-out;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(139, 195, 139, 0.15);
        }

        .card h3 {
            color: #2d5015;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .card p {
            color: #4a6b4a;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .card a {
            background: linear-gradient(135deg, #8bc38b, #7ab87a);
            color: white;
            text-decoration: none;
            border-radius: 20px;
            padding: 8px 14px;
            font-size: 13px;
            transition: 0.3s;
            display: inline-block;
        }

        .card a:hover {
            background: linear-gradient(135deg, #7ab87a, #8bc38b);
            transform: scale(1.05);
        }

        /* FOOTER */
        .footer {
            background: linear-gradient(135deg, rgba(139, 195, 139, 0.95) 0%, rgba(122, 184, 122, 0.95) 100%);
            color: #2d5015;
            padding: 40px 0;
            margin-top: 70px;
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

        /* ANIMASI */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                gap: 15px;
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
            <li><a href="{{ route('tentang') }}">Tentang</a></li>
            <li><a href="{{ route('kontak') }}" style="font-weight:600;">Kontak</a></li>
            <li><a href="{{ route('users.index') }}">User</a></li> <!-- ✅ Ditambahkan -->
        </ul>

        <div class="nav-actions">
            <div class="user-info">
                <span>👤</span>
                <span>Selamat datang, Faiha</span>
            </div>
            <a href="{{ route('auth.logout') }}" class="btn-quote">Keluar</a>
        </div>
    </nav>
</header>


    <!-- KONTEN -->
    <section class="kontak">
        <h1>Hubungi Kami</h1>
        <p>Tim Sistem Desa siap membantu Anda untuk segala kebutuhan dan pertanyaan.</p>

        <div class="contact-cards">
            <div class="card">
                <h3>📞 Telepon</h3>
                <p>Hubungi kami langsung untuk informasi cepat.</p>
                <a href="tel:+621234567890">+62 123 456 7890</a>
            </div>

            <div class="card">
                <h3>💬 WhatsApp</h3>
                <p>Chat dengan kami untuk respon lebih cepat.</p>
                <a href="https://wa.me/6281234567890" target="_blank">Chat Sekarang</a>
            </div>

            <div class="card">
                <h3>✉ Email</h3>
                <p>Kirim pesan detail via email.</p>
                <a href="mailto:sistemdesa@gmail.com">sistemdesa@gmail.com</a>
            </div>

            <div class="card">
                <h3>📍 Alamat</h3>
                <p>Kunjungi kantor kami di Balai Desa.</p>
                <a href="https://maps.google.com" target="_blank">Lihat Peta</a>
            </div>
        </div>
    </section>

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
                <a href="#">✉ desa@email.com</a>
                <a href="#">📍 Jl. Desa No. 123</a>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2025 Sistem Peminjaman Ruangan Desa. All rights reserved.
        </div>
    </footer>

</body>

</html>
