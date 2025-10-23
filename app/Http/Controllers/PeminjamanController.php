<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    // Menampilkan form peminjaman
    public function create()
    {
        return view('guest.BalaiDesa.form-peminjaman');
    }

    // Menyimpan data peminjaman
  public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama' => 'required|string|max:255',
        'nip' => 'nullable|string|max:50',
        'telepon' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'fasilitas' => 'required|string|max:255',
        'tujuan' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
        'tanggal' => 'required|date|after_or_equal:today',
        'waktu_mulai' => 'required',
        'waktu_selesai' => 'required|after:waktu_mulai',
    ], [
        'tanggal.after_or_equal' => 'Tanggal peminjaman tidak boleh di masa lalu',
        'waktu_selesai.after' => 'Waktu selesai harus setelah waktu mulai',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Simpan data
    $peminjaman = Peminjaman::create([
        'fasilitas_id' => 1,
        'warga_id' => 1,
        'tanggal_mulai' => $request->tanggal . ' ' . $request->waktu_mulai,
        'tanggal_selesai' => $request->tanggal . ' ' . $request->waktu_selesai,
        'tujuan' => $request->tujuan,
        'status' => 'pending', // Ganti jadi 'pending'
        'total_biaya' => 0,
    ]);

    return redirect()->route('peminjaman.success')->with('nama', $request->nama);
}
    // Menampilkan halaman sukses
    public function success()
    {
        return view('guest.BalaiDesa.success');
    }

    // Menampilkan daftar peminjaman (untuk admin)
    public function index()
    {
        $peminjaman = Peminjaman::orderBy('created_at', 'desc')->get();
        return view('admin.peminjaman_index', compact('peminjaman'));
    }

    // Mengupdate status peminjaman (untuk admin)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,disetujui,ditolak',
            'catatan_admin' => 'nullable|string'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin
        ]);

        return redirect()->back()->with('success', 'Status peminjaman berhasil diupdate!');
    }
    public function show($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    return view('guest.BalaiDesa.detail-peminjaman', compact('peminjaman'));
}

    }

