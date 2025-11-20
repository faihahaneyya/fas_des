<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 🧭 Halaman daftar user
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    // ➕ Form tambah user
    public function create()
    {
        return view('users.create');
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
        return view('users.edit', compact('user'));
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
