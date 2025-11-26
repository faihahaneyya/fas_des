<?php
namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
 public function create()
{
    // Pastikan menggunakan DB facade atau Model
    $fasilitas = DB::table('fasilitas')->where('status', 'tersedia')->get();
        return view('layouts.guest.BalaiDesa.form-peminjaman', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'          => 'required|string|max:255',
            'nip'           => 'nullable|string|max:50',
            'telepon'       => 'required|string|max:15',
            'email'         => 'required|email|max:255',
            'fasilitas_id'  => 'required|exists:fasilitas,id',
            'tujuan'        => 'required|string|max:255',
            'keterangan'    => 'nullable|string',
            'tanggal'       => 'required|date|after_or_equal:today',
            'waktu_mulai'   => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
        ], [
            'tanggal.after_or_equal' => 'Tanggal peminjaman tidak boleh di masa lalu',
            'waktu_selesai.after'    => 'Waktu selesai harus setelah waktu mulai',
            'fasilitas_id.exists'    => 'Fasilitas yang dipilih tidak valid',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            // 1. Cek atau buat data warga berdasarkan email
            $warga = Warga::where('email', $request->email)->first();

            if (!$warga) {
                // Buat data warga baru dengan warga_id auto increment
                $warga = Warga::create([
                    'no_ktp' => 'TEMP_' . time(), // KTP temporary
                    'nama' => $request->nama,
                    'jenis_kelamin' => 'L', // Default
                    'agama' => 'Islam', // Default
                    'pekerjaan' => $request->keterangan ?? 'Tidak disebutkan',
                    'telp' => $request->telepon,
                    'email' => $request->email,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // 2. Simpan data peminjaman
            $peminjaman = Peminjaman::create([
                'fasilitas_id'    => $request->fasilitas_id,
                'warga_id'        => $warga->warga_id, // Pastikan pakai warga_id
                'tanggal_mulai'   => $request->tanggal . ' ' . $request->waktu_mulai,
                'tanggal_selesai' => $request->tanggal . ' ' . $request->waktu_selesai,
                'tujuan'          => $request->tujuan,
                'status'          => 'pending',
                'total_biaya'     => 0, // Perbaiki typo: total_blaya -> total_biaya
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);

            DB::commit();

            // 3. Redirect ke success
            return redirect()->route('peminjaman.success')
                ->with('success', 'Peminjaman berhasil diajukan!')
                ->with('nama', $request->nama);

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->withErrors(['error' => 'Terjadi kesalahan sistem: ' . $e->getMessage()])
                ->withInput();
        }
    }
public function success()
{
    return view('layouts.guest.BalaiDesa.success');
}
    // ... method lainnya tetap sama
}
