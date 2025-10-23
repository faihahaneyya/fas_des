<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    // Menampilkan daftar warga
    public function index()
    {
        $warga = Warga::all();
        return view('guest.warga.index', compact('warga'));
    }

    // Menampilkan form tambah warga
    public function create()
    {
        return view('guest.warga.create');
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
        return view('guest.warga.edit', compact('warga'));
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
