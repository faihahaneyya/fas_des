<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas Desa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .section-title {
            font-size: 2rem;
            font-weight: bold;
            color: #2c7744;
            margin-bottom: 2rem;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 0.5rem;
        }
        .ruangan-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        .ruangan-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .ruangan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }
        .ruangan-image {
            background: linear-gradient(135deg, #4CAF50, #2c7744);
            color: white;
            font-size: 3rem;
            text-align: center;
            padding: 2rem;
        }
        .ruangan-content {
            padding: 1.5rem;
        }
        .ruangan-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c7744;
            margin-bottom: 0.5rem;
        }
        .ruangan-info {
            color: #666;
            margin-bottom: 1rem;
            font-size: 1rem;
        }
        .btn-pinjam {
            width: 100%;
            background: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .btn-pinjam:hover {
            background: #2c7744;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-green-600 to-green-800 text-white p-8 text-center">
        <h1 class="text-4xl font-bold mb-4">Fasilitas Ruangan Desa</h1>
        <p class="text-xl mb-4">Pinjam ruangan untuk acara dan kegiatan Anda</p>
        <a href="{{ route('login') }}" class="inline-block bg-white text-green-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
            Admin Login
        </a>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Ruangan Section -->
        <h2 class="section-title" id="ruangan">Fasilitas Ruangan Desa</h2>
        <div class="ruangan-grid">
            @foreach($fasilitas as $item)
            <div class="ruangan-card">
                <div class="ruangan-image">
                    @if(str_contains(strtolower($item->nama_fasilitas), 'balai'))
                    🏛️
                    @elseif(str_contains(strtolower($item->nama_fasilitas), 'aula'))
                    🎭
                    @elseif(str_contains(strtolower($item->nama_fasilitas), 'perpustakaan'))
                    📚
                    @else
                    🏢
                    @endif
                </div>
                <div class="ruangan-content">
                    <h3 class="ruangan-title">{{ $item->nama_fasilitas }}</h3>
                    <p class="ruangan-info">Kapasitas: {{ $item->kapasitas }} orang • Free</p>
                    <p class="ruangan-info">Status:
                        <span class="font-semibold
                            @if($item->status == 'tersedia') text-green-600
                            @elseif($item->status == 'dipinjam') text-orange-600
                            @else text-red-600 @endif">
                            {{ ucfirst($item->status) }}
                        </span>
                    </p>
                    <p class="ruangan-info">Lokasi: {{ $item->lokasi }}</p>

                   @if($item->status == 'tersedia')
    <a href="{{ route('pinjam.form', $item->id) }}" class="btn-pinjam" style="display: block; text-decoration: none; text-align: center;">
        Pinjam Sekarang
    </a>
@else
    <button class="btn-pinjam" disabled style="background: #ccc; cursor: not-allowed;">
        Tidak Tersedia
    </button>
@endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Aktivitas Terkini -->
        <section class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-3xl font-bold text-green-800 mb-6 border-b-2 border-green-600 pb-2">Aktivitas Terkini</h2>

            <ul class="space-y-4">
                <li class="border-b border-gray-200 pb-3">
                    <strong class="text-gray-800">Peminjaman Balai Desa disetujui</strong>
                    <p class="text-gray-600 text-sm">2 jam yang lalu</p>
                </li>
                <li class="border-b border-gray-200 pb-3">
                    <strong class="text-gray-800">Peminjaman Aula selesai</strong>
                    <p class="text-gray-600 text-sm">1 hari yang lalu</p>
                </li>
                <li>
                    <strong class="text-gray-800">Ruangan baru ditambahkan</strong>
                    <p class="text-gray-600 text-sm">2 hari yang lalu</p>
                </li>
            </ul>
        </section>

        <!-- Footer -->
        <footer class="text-center mt-12 text-gray-600">
            <p>&copy; 2024 Desa - Sistem Peminjaman Fasilitas</p>
        </footer>
    </div>
</body>
</html>
