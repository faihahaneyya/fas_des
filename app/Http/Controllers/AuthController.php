<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Halaman Login
     */
    public function index()
    {
        // Jika sudah login, langsung ke dashboard
        if (session()->has('email')) {
            return redirect()->route('dashboard');
        }
        return view('guest.formlogin');
    }

    /**
     * Proses Login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:3|regex:/[A-Z]/',
        ], [
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 3 karakter.',
            'password.regex'     => 'Password harus mengandung huruf kapital.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Ambil pengguna tersimpan di session
        $users = session('users', []);

        $email = $request->email;
        $password = $request->password;

        // Cek kecocokan
        if (array_key_exists($email, $users) && $users[$email] === $password) {
            session(['email' => $email]);
            return redirect()->route('dashboard')->with('pesan', 'Login berhasil!');
        }

        return back()->with('pesan', 'Email atau password salah!')->withInput();
    }

    /**
     * Halaman Register
     */
    public function register()
    {
        if (session()->has('email')) {
            return redirect()->route('dashboard');
        }
        return view('guest.formregister');
    }

    /**
     * Proses Register
     */
    public function storeRegister(Request $request)
    {
        // Ambil data user session
        $users = session('users', []);

        $validator = Validator::make($request->all(), [
            'name'      => 'required|min:3',
            'email'     => 'required|email',
            'password'  => [
                'required',
                'min:3',
                'regex:/[A-Z]/',
                'confirmed'
            ],
        ], [
            'name.required'         => 'Nama wajib diisi.',
            'name.min'              => 'Nama minimal 3 karakter.',
            'email.required'        => 'Email wajib diisi.',
            'email.email'           => 'Format email tidak valid.',
            'password.required'     => 'Password wajib diisi.',
            'password.min'          => 'Password minimal 3 karakter.',
            'password.regex'        => 'Password harus mengandung huruf kapital.',
            'password.confirmed'    => 'Konfirmasi password tidak sama.',
        ]);

        // Lanjut kalau valid
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Cek email sudah terdaftar
        if (array_key_exists($request->email, $users)) {
            return back()->with('pesan', 'Email sudah terdaftar!')->withInput();
        }

        // Simpan user
        $users[$request->email] = $request->password;
        session(['users' => $users]);

        return redirect()->route('login')->with('pesan', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Logout
     */
    public function logout()
    {
        session()->forget('email');
        return redirect()->route('login')->with('pesan', 'Anda telah logout.');
    }

    public function update(Request $request, $id)
{
    // Validasi data
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);

    // Ambil data dari session
    $users = session('users', []);

    // Update data user berdasarkan id
    if (isset($users[$id])) {
        unset($users[$id]); // hapus key lama
        $users[$request->email] = $request->password; // simpan dengan key baru
        session(['users' => $users]);
    }

    // ✅ Redirect ke halaman index dengan pesan sukses
    return redirect()->route('users.index')->with('pesan', 'Data user berhasil diperbarui!');
}

}
