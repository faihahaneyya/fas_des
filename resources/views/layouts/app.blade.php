<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Desa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #a8d5a2, #8fc88b);
            color: #234d20;
        }

        .navbar {
            background-color: #a8d5a2;
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: #2d6028 !important;
        }

        .nav-link {
            color: #2d6028 !important;
            font-weight: 500;
            margin: 0 10px;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        .btn-keluar {
            background: white;
            border-radius: 30px;
            padding: 6px 20px;
            color: #2d6028;
            font-weight: 600;
            border: 2px solid #2d6028;
        }

        .btn-keluar:hover {
            background: #2d6028;
            color: white;
        }

        footer {
            background-color: #a8d5a2;
            text-align: center;
            padding: 10px;
            margin-top: 50px;
            font-size: 14px;
            color: #234d20;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Sistem Desa</a>
            <div class="collapse navbar-collapse justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="{{ route('tentang') }}" class="nav-link">Tentang</a></li>
                    <li class="nav-item"><a href="{{ route('kontak') }}" class="nav-link">Kontak</a></li>
                    <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">User</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <span class="me-2"><i class="bi bi-person-fill"></i> Selamat datang, <b>Faiha</b></span>
                <a href="#" class="btn btn-keluar">Keluar</a>
            </div>
        </div>
    </nav>

    <div style="height: 80px"></div> <!-- spasi navbar -->

    <!-- Konten -->
    <div class="container py-4">
        @yield('content')
    </div>

    <footer>
        <p>© 2025 Sistem Peminjaman Ruangan Desa</p>
    </footer>

</body>

</html>
