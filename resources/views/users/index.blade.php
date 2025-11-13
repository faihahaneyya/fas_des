@extends('layouts.app')

@section('content')
<!-- Tambahkan link Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<section class="user-section" style="padding: 120px 40px 80px; background: linear-gradient(to bottom, #f7fff8, #e6f3e6); min-height: 100vh;">
    <div class="container">
        <h2 style="color: #295f2d; font-size: 2.2rem; font-weight: 700; margin-bottom: 20px; text-align: center;">
            <i class="fa-solid fa-users"></i> Daftar User
        </h2>

        <div style="text-align: right; margin-bottom: 20px;">
            <a href="{{ url('/users/create') }}"
               style="background-color: #4caf50; color: #fff; padding: 8px 14px; border-radius: 8px; text-decoration: none; font-weight: 600;">
               <i class="fa-solid fa-user-plus"></i> Tambah User
            </a>
        </div>

        <div class="user-table" style="background-color: #ffffff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow-x: auto; padding: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #c8e6c9; color: #2e7d32; text-align: left;">
                        <th style="padding: 12px;"><i class="fa-solid fa-id-badge"></i> Nama</th>
                        <th style="padding: 12px;"><i class="fa-solid fa-envelope"></i> Email</th>
                        <th style="padding: 12px;"><i class="fa-solid fa-gear"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px;">{{ $user->name }}</td>
                        <td style="padding: 12px;">{{ $user->email }}</td>
                        <td style="padding: 12px;">
                            <a href="{{ url('/users/' . $user->id . '/edit') }}"
                               style="background-color: #81c784; color: #fff; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-weight: 600; margin-right: 6px;">
                               <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ url('/users/' . $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')"
                                        style="background-color: #e57373; color: #fff; padding: 6px 12px; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($users->isEmpty())
                <p style="text-align: center; color: #777; margin-top: 20px;">Belum ada user terdaftar.</p>
            @endif
        </div>
    </div>
</section>
@endsection
