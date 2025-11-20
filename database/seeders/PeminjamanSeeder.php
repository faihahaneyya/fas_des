<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Ambil semua warga_id dan fasilitas_id yang ada
        $wargaIds = DB::table('warga')->pluck('warga_id')->toArray();
        $fasilitasIds = DB::table('fasilitas')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            // Pastikan tanggal mulai lebih dulu dari tanggal selesai
            $tanggalMulai = $faker->dateTimeBetween('now', '+1 month');
            // Tanggal selesai HARUS setelah tanggal mulai
            $tanggalSelesai = $faker->dateTimeBetween($tanggalMulai->format('Y-m-d') . ' +1 day', $tanggalMulai->format('Y-m-d') . ' +1 week');

            // Hitung selisih hari untuk total biaya
            $selisihHari = $tanggalMulai->diff($tanggalSelesai)->days;

            DB::table('peminjaman')->insert([
                'fasilitas_id' => $faker->randomElement($fasilitasIds),
                'warga_id' => $faker->randomElement($wargaIds),
                'tanggal_mulai' => $tanggalMulai->format('Y-m-d'),
                'tanggal_selesai' => $tanggalSelesai->format('Y-m-d'),
                'tujuan' => $faker->randomElement([
                    'Seminar',
                    'Pelatihan',
                    'Rapat',
                    'Ujian',
                    'Pernikahan',
                    'Hajatan',
                    'Lainnya'
                ]),
                'status' => $faker->randomElement(['pending', 'disetujui', 'ditolak', 'selesai']),
                'total_biaya' => $faker->numberBetween(50000, 500000) * $selisihHari,
            ]);
        }
    }
}
