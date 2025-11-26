<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Ambil warga_id dan fasilitas_id
        $wargaIds = DB::table('warga')->pluck('warga_id')->toArray();
        $fasilitasIds = DB::table('fasilitas')->pluck('id')->toArray();

        // Debug info
        $this->command->info('🔍 Jumlah data warga: ' . count($wargaIds));
        $this->command->info('🔍 Jumlah data fasilitas: ' . count($fasilitasIds));

        // ✅ UBAH INI: dari 20 menjadi 100
        foreach (range(1, 100) as $index) {
            $tanggalMulai = $faker->dateTimeBetween('-6 months', '+6 months');
            $tanggalSelesai = $faker->dateTimeBetween(
                $tanggalMulai->format('Y-m-d') . ' +1 day',
                $tanggalMulai->format('Y-m-d') . ' +7 days'
            );

            $selisihHari = $tanggalMulai->diff($tanggalSelesai)->days;

            DB::table('peminjaman')->insert([
                'fasilitas_id' => $faker->randomElement($fasilitasIds),
                'warga_id' => $faker->randomElement($wargaIds),
                'tanggal_mulai' => $tanggalMulai->format('Y-m-d H:i:s'),
                'tanggal_selesai' => $tanggalSelesai->format('Y-m-d H:i:s'),
                'tujuan' => $faker->randomElement([
                    'Seminar', 'Pelatihan', 'Rapat', 'Ujian', 'Pernikahan', 'Hajatan', 'Acara Keluarga'
                ]),
                'status' => $faker->randomElement(['pending', 'disetujui', 'ditolak', 'selesai']),
                'total_biaya' => $faker->numberBetween(50000, 300000) * max(1, $selisihHari),
                'created_at' => $tanggalMulai, // Sesuaikan dengan tanggal mulai
                'updated_at' => $tanggalMulai,
            ]);

            // Progress indicator untuk data banyak
            if ($index % 20 === 0) {
                $this->command->info("📊 Progress: {$index}/100 data created...");
            }
        }

        $this->command->info('✅ Berhasil menambahkan 100 data peminjaman!');
    }
}
