<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 🧭 Halaman daftar user dengan pagination, search, dan filter
    public function index(Request $request)
    {
        $query = User::query();

        // SEARCH - berdasarkan nama atau email
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // FILTER - berdasarkan status verifikasi email
        if ($request->has('email_verified') && $request->email_verified !== '') {
            if ($request->email_verified == 'verified') {
                $query->whereNotNull('email_verified_at');
            } elseif ($request->email_verified == 'unverified') {
                $query->whereNull('email_verified_at');
            }
        }

        // FILTER - berdasarkan tanggal dibuat
        if ($request->has('sort') && !empty($request->sort)) {
            if ($request->sort == 'newest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort == 'oldest') {
                $query->orderBy('created_at', 'asc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // PAGINATION - 15 data per halaman
        $users = $query->paginate(15);

        return view('pages.users.index', compact('users'));
    }

     public function create()
    {
        return view('pages.users.create');
    }

    // 💾 Simpan data user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    // ✏️ Form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.edit', compact('user'));
    }

    // 🔄 Update user
    // 🔄 Update user
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6',
    ]);

    // ✅ Kalau password kosong jangan ikut diupdate
    if (!$request->filled('password')) {
        unset($validated['password']);
    }

    // ✅ Cek apakah email berubah
    if ($request->email !== $user->email) {
        // Anggap email tetap terverifikasi setelah diubah
        $validated['email_verified_at'] = $user->email_verified_at ?? now();
    }

    $user->update($validated);

    return redirect()->route('users.index')->with('success', 'User berhasil diperbarui!');
}

public function destroy($id)
{
    // Cari user berdasarkan ID, kalau tidak ada, lempar 404
    $user = \App\Models\User::findOrFail($id);

    // Cegah hapus diri sendiri (opsional, tapi disarankan)
    if (auth()->id() == $id) {
        return redirect()->route('users.index')->with('error', 'Tidak bisa menghapus akun sendiri!');
    }

    // Hapus user
    $user->delete();

    // Kembali ke halaman index dengan flash message sukses
    return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
}


}
