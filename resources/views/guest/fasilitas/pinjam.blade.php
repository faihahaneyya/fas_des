<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Fasilitas - {{ $fasilitas->nama_fasilitas }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .main-content {
            max-width: 800px;
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
        .form-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            display: block;
            font-weight: bold;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            font-size: 1rem;
        }
        .form-input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }
        .btn-submit {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .btn-submit:hover {
            background: #2c7744;
        }
        .btn-back {
            background: #6b7280;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-right: 1rem;
        }
        .btn-back:hover {
            background: #4b5563;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-green-600 to-green-800 text-white p-6 text-center">
        <h1 class="text-3xl font-bold">Form Peminjaman Fasilitas</h1>
        <p class="text-lg mt-2">Isi form untuk meminjam {{ $fasilitas->nama_fasilitas }}</p>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <h2 class="section-title">Form Peminjaman</h2>

        <div class="form-container">
            <!-- Info Fasilitas -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <h3 class="font-bold text-green-800 text-lg mb-2">Anda akan meminjam:</h3>
                <p class="text-green-700"><strong>{{ $fasilitas->nama_fasilitas }}</strong></p>
                <p class="text-green-700">Kapasitas: {{ $fasilitas->kapasitas }} orang</p>
                <p class="text-green-700">Lokasi: {{ $fasilitas->lokasi }}</p>
            </div>

            <form action="{{ route('pinjam.store', $fasilitas->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_peminjam" class="form-label">Nama Lengkap *</label>
                    <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-input"
                           value="{{ old('nama_peminjam') }}" required>
                    @error('nama_peminjam')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" name="email" id="email" class="form-input"
                           value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_telepon" class="form-label">No. Telepon *</label>
                    <input type="tel" name="no_telepon" id="no_telepon" class="form-input"
                           value="{{ old('no_telepon') }}" required>
                    @error('no_telepon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="form-group">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam *</label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-input"
                               value="{{ old('tanggal_pinjam') }}" min="{{ date('Y-m-d') }}" required>
                        @error('tanggal_pinjam')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="waktu_mulai" class="form-label">Waktu Mulai *</label>
                        <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-input"
                               value="{{ old('waktu_mulai') }}" required>
                        @error('waktu_mulai')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="waktu_selesai" class="form-label">Waktu Selesai *</label>
                        <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-input"
                               value="{{ old('waktu_selesai') }}" required>
                        @error('waktu_selesai')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="jumlah_orang" class="form-label">Jumlah Orang *</label>
                    <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-input"
                           value="{{ old('jumlah_orang') }}" min="1" max="{{ $fasilitas->kapasitas }}" required>
                    <p class="text-sm text-gray-600 mt-1">Maksimal: {{ $fasilitas->kapasitas }} orang</p>
                    @error('jumlah_orang')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keperluan" class="form-label">Keperluan *</label>
                    <textarea name="keperluan" id="keperluan" rows="4" class="form-input"
                              placeholder="Jelaskan keperluan peminjaman..." required>{{ old('keperluan') }}</textarea>
                    @error('keperluan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between items-center mt-8">
                    <a href="{{ route('fasilitas.guest') }}" class="btn-back">Kembali</a>
                    <button type="submit" class="btn-submit">Ajukan Peminjaman</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
