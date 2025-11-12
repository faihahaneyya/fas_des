{{-- Layout Container Start --}}

<!DOCTYPE html>
<html lang="id">
<head>

      {{-- Head Section --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas Ruangan Desa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background: linear-gradient(135deg, #2c7744, #4CAF50);
            color: white;
            padding: 30px 0;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 1.8rem;
            margin: 25px 0 15px;
            color: #2c7744;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 8px;
        }

        .facilities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .facility-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .facility-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
        }

        .facility-card h3 {
            color: #2c7744;
            margin-bottom: 10px;
            font-size: 1.4rem;
        }

        .capacity {
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
            text-align: center;
        }

        .btn:hover {
            background: #2c7744;
        }

        .recent-activities {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .activity-list {
            list-style-type: none;
        }

        .activity-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-list li:last-child {
            border-bottom: none;
        }

        .activity-time {
            color: #777;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            color: #777;
            border-top: 1px solid #eee;
        }

        @media (max-width: 768px) {
            .facilities-grid {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

     {{-- Page Wrapper Start --}}

    <div class="container">

          {{-- Head Section --}}
        <header>
            <h1>Fasilitas Ruangan Desa</h1>
            <p>Pinjam ruangan untuk acara dan kegiatan Anda</p>
        </header>

              {{-- Fasilitas Section --}}
        <section>
            <h2>Daftar Fasilitas</h2>
            <div class="facilities-grid">

                  {{-- Kartu Fasilitas --}}
    <div class="facility-card">
        <h3>Balai Desa</h3>
        <p class="capacity">Kapasitas: 100 orang - Free</p>
        <a href="{{ route('BalaiDesa.form-peminjaman') }}" class="btn">Pinjam Sekarang</a>
    </div>

    <div class="facility-card">
        <h3>Aula Serbaguna</h3>
        <p class="capacity">Kapasitas: 50 orang - Free</p>
        <a href="{{ route('AulaSerbaguna.form-peminjaman') }}" class="btn">Pinjam Sekarang</a>
    </div>

    <div class="facility-card">
        <h3>Perpustakaan</h3>
        <p class="capacity">Kapasitas: 30 orang - Free</p>
        <a href="{{ route('Perpustakaan.form-peminjaman') }}" class="btn">Pinjam Sekarang</a>
    </div>

    <div class="facility-card">
        <h3>Pajjam Sekarama</h3>
        <p>Informasi lebih lanjut</p>
        <a href="{{ route('PajjamSekarama.form-peminjaman') }}" class="btn">Pinjam Sekarang</a>
    </div>
</div>
        </section>

        {{-- Aktivitas Terkini Section --}}

        <section class="recent-activities">
            <h2>Aktivitas Terkini</h2>
            <ul class="activity-list">
                <li>
                    <strong>Peminjaman Balai Desa disetujui</strong>
                    <p class="activity-time">2 jam yang lalu</p>
                </li>
                <li>
                    <strong>Peminjaman Aula selesai</strong>
                    <p class="activity-time">1 hari yang lalu</p>
                </li>
                <li>
                    <strong>Ruangan baru ditambahkan</strong>
                    <p class="activity-time">2 hari yang lalu</p>
                </li>
            </ul>
        </section>


         {{-- Footer Section --}}
        <footer>
            <p>&copy; 2023 Desa - Sistem Peminjaman Fasilitas</p>
        </footer>
    </div>
    {{-- Page Wrapper End --}}

</body>
</html>
