<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    // Menampilkan daftar warga dengan pagination, search, dan filter
    public function index(Request $request)
    {
        $query = Warga::query();

        // SEARCH - berdasarkan nama, email, atau telp
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('telp', 'like', "%{$search}%")
                  ->orWhere('no_ktp', 'like', "%{$search}%");
            });
        }

        // FILTER - berdasarkan jenis kelamin
        if ($request->has('jenis_kelamin') && !empty($request->jenis_kelamin)) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // FILTER - berdasarkan agama
        if ($request->has('agama') && !empty($request->agama)) {
            $query->where('agama', $request->agama);
        }

        // FILTER - berdasarkan pekerjaan
        if ($request->has('pekerjaan') && !empty($request->pekerjaan)) {
            $query->where('pekerjaan', 'like', "%{$request->pekerjaan}%");
        }

        // PAGINATION - 12 data per halaman
        $warga = $query->orderBy('created_at', 'desc')->paginate(12);

        // Data untuk dropdown filter
        $jenisKelaminOptions = ['Laki-laki', 'Perempuan'];
        $agamaOptions = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];

        // Ambil daftar pekerjaan unik untuk filter
        $pekerjaanOptions = Warga::select('pekerjaan')->distinct()->pluck('pekerjaan');

        return view('layouts.guest.warga.index', compact(
            'warga',
            'jenisKelaminOptions',
            'agamaOptions',
            'pekerjaanOptions'
        ));
    }

    // Menampilkan form tambah warga
    public function create()
    {
        return view('layouts.guest.warga.create');
    }

    // Menyimpan data warga baru
    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'telp' => 'required',
            'email' => 'required|email',
        ]);

        Warga::create($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan!');
    }

    // Menampilkan detail/edit warga
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('layouts.guest.warga.edit', compact('warga'));
    }

    // Update data warga
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
    'no_ktp' => 'required|unique:warga,no_ktp,' . $warga->warga_id . ',warga_id',
    'nama' => 'required',
    'jenis_kelamin' => 'required',
    'agama' => 'required',
    'pekerjaan' => 'required',
    'telp' => 'required',
    'email' => 'required|email',
]);

        $warga->update($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    // Hapus warga
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus!');
    }
}
