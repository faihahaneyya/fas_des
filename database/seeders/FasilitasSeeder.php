<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $fasilitasList = [
            'Balai Desa',
            'Aula Serbaguna',
            'Perpustakaan',
            'Pajjam Sekarama'
        ];

        $lokasiList = [
            'Gedung Utama Balai Desa',
            'Lantai 1 Aula Serbaguna',
            'Sayap Barat Perpustakaan',
            'Area Pajjam Sekarama'
        ];

        foreach ($fasilitasList as $index => $fasilitas) {
            DB::table('fasilitas')->insert([
                'nama_fasilitas' => $fasilitas,
                'kapasitas' => $faker->numberBetween(20, 150),
                'lokasi' => $lokasiList[$index],
                'status' => 'tersedia',
                'deskripsi' => $this->generateDeskripsi($fasilitas),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateDeskripsi($fasilitas): string
    {
        $deskripsi = [
            'Balai Desa' => 'Fasilitas utama untuk pertemuan dan acara resmi desa',
            'Aula Serbaguna' => 'Ruang serbaguna untuk berbagai acara dan kegiatan',
            'Perpustakaan' => 'Tempat baca dan belajar dengan koleksi buku lengkap',
            'Pajjam Sekarama' => 'Area khusus untuk acara budaya dan kesenian'
        ];

        return $deskripsi[$fasilitas] ?? 'Fasilitas umum untuk kegiatan masyarakat';
    }
}
