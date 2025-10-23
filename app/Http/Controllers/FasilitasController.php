<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('guest.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'nama_fasilitas' => 'required|string|max:100',
            'kapasitas' => 'required|integer|min:1',
            'lokasi' => 'required|string|max:100',
            'status' => 'required|in:tersedia,dipinjam,perbaikan',
            'deskripsi' => 'nullable|string'
        ]);

        try {
            Fasilitas::create($request->all());

            Session::flash('success', 'Data fasilitas berhasil ditambahkan!');
            return redirect()->route('fasilitas.index');

        } catch (\Exception $e) {
            Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasilitas $fasilitas)
    {
        return view('fasilitas.show', compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasilitas $fasilitas)
    {
        return view('fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        // Validation
        $request->validate([
            'nama_fasilitas' => 'required|string|max:100',
            'kapasitas' => 'required|integer|min:1',
            'lokasi' => 'required|string|max:100',
            'status' => 'required|in:tersedia,dipinjam,perbaikan',
            'deskripsi' => 'nullable|string'
        ]);

        try {
            $fasilitas->update($request->all());

            Session::flash('success', 'Data fasilitas berhasil diupdate!');
            return redirect()->route('fasilitas.index');

        } catch (\Exception $e) {
            Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasilitas $fasilitas)
    {
        try {
            $fasilitas->delete();

            Session::flash('success', 'Data fasilitas berhasil dihapus!');
            return redirect()->route('fasilitas.index');

        } catch (\Exception $e) {
            Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display guest view for facilities
     */
    public function guestIndex()
    {
          $fasilitas = Fasilitas::all();
    return view('guest.fasilitas', compact('fasilitas'));
    }
}
