<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fasilitas')->insert([
            'id' => 1, // Pastikan ID ini ada
            'nama_fasilitas' => 'Ruang Rapat Utama',
            'kapasitas' => 50,
            'lokasi' => 'bukit kapur',
            'status' => 'tersedia',
            'deskripsi' => 'kerenn',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
