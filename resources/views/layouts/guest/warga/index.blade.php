<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #DFF2D8;
        }
        .card-custom {
            background-color: #E9F5E6;
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }
        .card-custom:hover {
            transform: translateY(-5px);
        }
        .emoji {
            font-size: 45px;
        }
        .btn-dashboard {
            background: linear-gradient(135deg, #8bc38b 0%, #7ab87a 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .btn-dashboard:hover {
            background: linear-gradient(135deg, #7ab87a 0%, #8bc38b 100%);
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">📋 Data Warga</h2>

        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-dashboard me-2">
                🏠 Kembali ke Dashboard
            </a>
            <a href="{{ route('warga.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-person-plus-fill me-2"></i>Tambah Data Warga
            </a>
        </div>
    </div>

    <div class="row">
        @forelse ($warga as $item)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card card-custom text-center p-4">

                    <!-- Emoji jenis kelamin otomatis -->
                    <div class="emoji">
                        @if(strtolower($item->jenis_kelamin) == 'laki-laki')
                            👨
                        @elseif(strtolower($item->jenis_kelamin) == 'perempuan')
                            👩
                        @else
                            🙂 <!-- jika gender tidak diisi -->
                        @endif
                    </div>

                    <h4 class="fw-bold text-success mt-3">{{ $item->nama }}</h4>
                    <p class="text-muted small mb-2">{{ $item->pekerjaan }} • {{ $item->agama }}</p>

                    <div class="text-secondary small">
                        📞 {{ $item->telp }} <br>
                        ✉️ {{ $item->email }}
                    </div>

                    <div class="d-flex justify-content-between px-3 mt-4">
                        <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-warning btn-sm">
                            ✏️ Edit
                        </a>

                        <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 text-muted">
                <p class="fs-4">Belum ada data warga 😢</p>
            </div>
        @endforelse
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
