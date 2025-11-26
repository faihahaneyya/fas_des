<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Generate 10 user random
        foreach (range(1, 10) as $index) {
            User::firstOrCreate(
                ['email' => $faker->unique()->safeEmail],
                [
                    'name' => $faker->name,
                    'password' => Hash::make('password'),
                    'email_verified_at' => $faker->optional(0.7)->dateTimeBetween('-1 year', 'now'),
                    'remember_token' => \Illuminate\Support\Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // Tambahkan user khusus untuk testing - gunakan firstOrCreate
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
