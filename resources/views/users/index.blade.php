@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="mb-3">Daftar User</h2>

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah User</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus user?')">
                                    Hapus
                                </button>
                            </form>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
