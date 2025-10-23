@extends('layouts.app')

@section('title', 'Data Warga')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">📋 Data Warga</h2>
        <a href="{{ route('warga.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-person-plus-fill me-2"></i>Tambah Data Warga
        </a>
    </div>

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>No KTP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($warga as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->no_ktp }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>{{ $item->telp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route('warga.edit', $item->warga_id) }}"
                                   class="btn btn-warning btn-sm me-1 shadow-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash3-fill"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-muted py-4">
                                <i class="bi bi-emoji-frown"></i> Belum ada data warga.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
