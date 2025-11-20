<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah user sudah login
        // if (!session('username')) {
        //     return redirect('/auth')->with('pesan', 'Silakan login terlebih dahulu.');
        // }

        return view('layouts.guest.dashboard');
    }
}
