<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('guest.formlogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3|regex:/[A-Z]/',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 3 karakter.',
            'password.regex'    => 'Password harus mengandung huruf kapital.',
        ]);

        if ($request->username && $request->password) {
            // Simpan username di session
            session(['username' => $request->username]);
            return redirect()->route('dashboard')->with('pesan', 'Login berhasil! Selamat datang, ' . $request->username);
        }

        return back()->with('pesan', 'Login gagal! Periksa kembali username dan password.');
    }

    public function logout()
    {
        session()->forget('username');
        return redirect('/guest/formlogin')->with('pesan', 'Anda telah logout.');
    }

    // ... method lainnya tetap sama
}
