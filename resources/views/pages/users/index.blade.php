<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
        .filter-section {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .search-box {
            border-radius: 10px;
            border: 2px solid #8bc38b;
            padding: 10px 15px;
        }
        .filter-select {
            border-radius: 10px;
            border: 2px solid #8bc38b;
        }
        .pagination-custom .page-link {
            color: #8bc38b;
            border: 1px solid #8bc38b;
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
        }
        .pagination-custom .page-item.active .page-link {
            background-color: #8bc38b;
            border-color: #8bc38b;
            color: white;
        }
        .pagination-custom .page-item.disabled .page-link {
            color: #6c757d;
            border-color: #dee2e6;
        }
        .result-info {
            font-size: 0.875rem;
        }
        .verified-badge {
            background-color: #4caf50;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
        }
        .unverified-badge {
            background-color: #ff9800;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark"><i class="fa-solid fa-users me-2"></i>Data User</h2>

        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-dashboard me-2">
                🏠 Kembali ke Dashboard
            </a>
            <a href="{{ route('users.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-person-plus-fill me-2"></i>Tambah Data User
            </a>
        </div>
    </div>

    <!-- SEARCH & FILTER SECTION -->
    <div class="filter-section">
        <form action="{{ route('users.index') }}" method="GET">
            <div class="row g-3">
                <!-- Search Input -->
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-success text-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text"
                               name="search"
                               class="form-control search-box"
                               placeholder="Cari nama atau email..."
                               value="{{ request('search') }}">
                    </div>
                </div>

                <!-- Filter Status Verifikasi -->
                <div class="col-md-3">
                    <select name="email_verified" class="form-select filter-select">
                        <option value="">Semua Status</option>
                        <option value="verified" {{ request('email_verified') == 'verified' ? 'selected' : '' }}>
                            Terverifikasi
                        </option>
                        <option value="unverified" {{ request('email_verified') == 'unverified' ? 'selected' : '' }}>
                            Belum Verifikasi
                        </option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="col-md-2">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success flex-fill">
                            <i class="bi bi-funnel-fill me-1"></i>Filter
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>

        <!-- Result Info -->
        @if(request()->hasAny(['search', 'email_verified']))
            <div class="mt-3 p-2 bg-light rounded">
                <small class="text-muted result-info">
                    <i class="bi bi-info-circle me-1"></i>
                    Menampilkan {{ $users->total() }} hasil
                    @if(request('search')) untuk pencarian "{{ request('search') }}" @endif
                    @if(request('email_verified') == 'verified') • Status: Terverifikasi @endif
                    @if(request('email_verified') == 'unverified') • Status: Belum Verifikasi @endif
                    <a href="{{ route('users.index') }}" class="text-danger text-decoration-none ms-2">
                        <i class="bi bi-x-circle"></i> Hapus filter
                    </a>
                </small>
            </div>
        @endif
    </div>

    <!-- DATA CARDS -->
    <div class="row">
        @forelse ($users as $user)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card card-custom text-center p-4">

                    <!-- Emoji user -->
                    <div class="emoji">
                        @if($user->email_verified_at)
                            ✅
                        @else
                            ⏳
                        @endif
                    </div>

                    <h4 class="fw-bold text-success mt-3">{{ $user->name }}</h4>
                    <p class="text-muted small mb-2">
                        @if($user->email_verified_at)
                            <span class="verified-badge">Terverifikasi</span>
                        @else
                            <span class="unverified-badge">Belum Verifikasi</span>
                        @endif
                    </p>

                    <div class="text-secondary small">
                        ✉️ {{ $user->email }} <br>
                        📅 {{ $user->created_at->format('d/m/Y') }}
                    </div>

                    <div class="d-flex justify-content-between px-3 mt-4">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                            ✏️ Edit
                        </a>

                        @if(auth()->id() != $user->id)
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus user ini?')">
                                🗑️ Hapus
                            </button>
                        </form>
                        @else
                        <span class="btn btn-secondary btn-sm disabled">Akun Sendiri</span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 text-muted">
                <p class="fs-4">Belum ada data user 😢</p>
                @if(request()->hasAny(['search', 'email_verified']))
                    <p class="text-muted">Coba ubah filter pencarian Anda</p>
                    <a href="{{ route('users.index') }}" class="btn btn-success">Tampilkan Semua Data</a>
                @else
                    <a href="{{ route('users.create') }}" class="btn btn-success">Tambah Data User Pertama</a>
                @endif
            </div>
        @endforelse
    </div>

    <!-- PAGINATION -->
    @if($users->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted small">
                Menampilkan <strong>{{ $users->firstItem() }}-{{ $users->lastItem() }}</strong>
                dari <strong>{{ $users->total() }}</strong> user
            </div>
            <nav>
                <ul class="pagination pagination-custom pagination-sm mb-0">
                    {{-- Previous Page Link --}}
                    @if($users->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">‹ Prev</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev">‹ Prev</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @php
                        $current = $users->currentPage();
                        $last = $users->lastPage();
                        $start = max(1, $current - 2);
                        $end = min($last, $current + 2);
                    @endphp

                    @if($start > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->url(1) }}">1</a>
                        </li>
                        @if($start > 2)
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                    @endif

                    @for($page = $start; $page <= $end; $page++)
                        @if($page == $users->currentPage())
                            <li class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->url($page) }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endfor

                    @if($end < $last)
                        @if($end < $last - 1)
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->url($last) }}">{{ $last }}</a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if($users->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next">Next ›</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next ›</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    @else
        @if($users->total() > 0)
            <div class="text-center text-muted small mt-3">
                Menampilkan semua <strong>{{ $users->total() }}</strong> user
            </div>
        @endif
    @endif

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto Submit Filter on Change -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto submit when filter selects change
        const filterSelects = document.querySelectorAll('select[name="email_verified"]');

        filterSelects.forEach(select => {
            select.addEventListener('change', function() {
                this.form.submit();
            });
        });

        // Debounce search input
        let searchTimeout;
        const searchInput = document.querySelector('input[name="search"]');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    this.form.submit();
                }, 500);
            });
        }
    });
</script>

</body>
</html>
