<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // ⚠️ HAPUS SEMUA DATA SEBELUMNYA
        DB::table('users')->truncate();
        $this->command->info('🗑️  Data users sebelumnya telah dihapus');

        // Lanjutkan dengan membuat 100 user baru...
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for ($i = 1; $i <= 99; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'email_verified_at' => $faker->optional(0.8)->dateTimeBetween('-2 years', 'now'),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ]);

            if ($i % 20 === 0) {
                $this->command->info("✓ Created {$i} users...");
            }
        }

        $this->command->info('🎉 Successfully created 100 new users!');
    }
}
