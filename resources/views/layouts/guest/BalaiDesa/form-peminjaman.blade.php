<!-- Partial View: Form Peminjaman Balai Desa Start -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Fasilitas Balai Desa</title>
    <style>
        /* 🌿 Tema hijau pastel lembut dengan animasi */
        * {
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e8f9f0, #d3f7e3, #c0f0cf);
            margin: 0;
            padding: 20px;
            color: #355e3b;
            animation: fadeInBody 1s ease-in-out;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(100, 180, 120, 0.15);
            animation: slideUp 1s ease-out;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: translateY(-3px);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #6ccf94;
            padding-bottom: 15px;
        }

        .header h1 {
            color: #2d7a50;
            margin-bottom: 5px;
            animation: fadeDown 1s ease-in;
        }

        .header .subtitle {
            color: #5a9c79;
            font-size: 1.1rem;
        }

        .section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px dashed #b9e3c9;
        }

        .section-title {
            font-size: 1.2rem;
            color: #4dbb83;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #a5e6b5;
        }

        .form-group {
            margin-bottom: 15px;
            animation: fadeUp 0.8s ease both;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #c9e8d3;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f9fdfb;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #74d39c;
            outline: none;
            box-shadow: 0 0 0 3px rgba(91, 209, 138, 0.25);
        }

        .btn-submit {
            background-color: #81e6a6;
            color: #205f3a;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            display: block;
            margin: 25px auto 0;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(130, 220, 150, 0.3);
        }

        .btn-submit:hover {
            background-color: #6fd99a;
            transform: translateY(-3px);
            box-shadow: 0 6px 14px rgba(100, 200, 120, 0.4);
        }

        .note {
            font-size: 0.85rem;
            color: #6c9b7d;
        }

        .required {
            color: #e74c3c;
        }

        .alert-success {
            background-color: #5b7c64;
            border: 1px solid #bbdbc5;
            color: #1d703a;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 15px;
            animation: fadeInBody 0.8s ease;
        }

        .alert-danger {
            background-color: #fbe6e6;
            border: 1px solid #f5c6cb;
            color: #7c1c24;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 15px;
        }

        .error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        @keyframes fadeInBody {
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
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
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

        .row {
            display: flex;
            gap: 15px;
        }

        .col {
            flex: 1;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Container Start -->
    <div class="container">
        <!-- Header Start -->
        <div class="header">
            <h1>Form Peminjaman Fasilitas</h1>
            <div class="subtitle">Balai Desa</div>
        </div>
        <!-- Header End -->

        <!-- Alert Messages Start -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Alert Messages End -->

        <!-- Form Start -->
        <form action="{{ route('peminjaman.store') }}" method="POST" id="peminjamanForm">
            @csrf

            <!-- Section 1: Data Peminjam Start -->
            <div class="section">
                <h2 class="section-title">1. Data Peminjam</h2>

                <div class="form-group">
                    <label for="nama">Nama Peminjam <span class="required">*</span></label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
                    <div class="note">(Nama lengkap orang atau instansi yang meminjam)</div>
                </div>

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" value="{{ old('nip') }}">
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="telepon">No. Telepon / HP <span class="required">*</span></label>
                            <input type="tel" id="telepon" name="telepon" value="{{ old('telepon') }}" required>
                            <div class="note">(Untuk konfirmasi)</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section 1: Data Peminjam End -->

            <!-- Section 2: Data Fasilitas Start -->
            <!-- Section 2: Data Fasilitas Start -->
            <div class="section">
                <h2 class="section-title">2. Data Fasilitas yang Dipinjam</h2>

                <div class="form-group">
                    <label for="fasilitas_id">Nama Fasilitas <span class="required">*</span></label>
                    <select id="fasilitas_id" name="fasilitas_id" required>
                        <option value="">-- Pilih Fasilitas --</option>
                        @if (isset($fasilitas) && $fasilitas->count() > 0)
                            @foreach ($fasilitas as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('fasilitas_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_fasilitas }} - {{ $item->lokasi }}
                                    (Kapasitas: {{ $item->kapasitas }} orang)
                                </option>
                            @endforeach
                        @else
                            <!-- Fallback jika data tidak ada -->
                            <option value="1">Balai Desa - Gedung Utama Balai Desa</option>
                            <option value="2">Aula Serbaguna - Lantai 1 Aula Serbaguna</option>
                            <option value="3">Perpustakaan - Sayap Barat Perpustakaan</option>
                            <option value="4">Pajjam Sekarama - Area Pajjam Sekarama</option>
                        @endif
                    </select>
                    @error('fasilitas_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tujuan">Tujuan Peminjaman / Kegiatan <span class="required">*</span></label>
                    <select id="tujuan" name="tujuan" required>
                        <option value="">-- Pilih Tujuan --</option>
                        <option value="Seminar" {{ old('tujuan') == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                        <option value="Pelatihan" {{ old('tujuan') == 'Pelatihan' ? 'selected' : '' }}>Pelatihan
                        </option>
                        <option value="Rapat" {{ old('tujuan') == 'Rapat' ? 'selected' : '' }}>Rapat</option>
                        <option value="Ujian" {{ old('tujuan') == 'Ujian' ? 'selected' : '' }}>Ujian</option>
                        <option value="Pernikahan" {{ old('tujuan') == 'Pernikahan' ? 'selected' : '' }}>Pernikahan
                        </option>
                        <option value="Hajatan" {{ old('tujuan') == 'Hajatan' ? 'selected' : '' }}>Hajatan</option>
                        <option value="Lainnya" {{ old('tujuan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan Kegiatan</label>
                    <textarea id="keterangan" name="keterangan" rows="3" placeholder="Deskripsi singkat kegiatan...">{{ old('keterangan') }}</textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="tanggal">Tanggal Peminjaman <span class="required">*</span></label>
                            <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="waktu_mulai">Waktu Mulai <span class="required">*</span></label>
                            <input type="time" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai') }}"
                                required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="waktu_selesai">Waktu Selesai <span class="required">*</span></label>
                            <input type="time" id="waktu_selesai" name="waktu_selesai"
                                value="{{ old('waktu_selesai') }}" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Ajukan Peminjaman Balai Desa</button>
            </div>
            <!-- Section 2: Data Fasilitas End -->
        </form>
        <!-- Form End -->
    </div>
    <!-- Container End -->
</body>

</html>
<!-- Partial View: Form Peminjaman Balai Desa End -->
