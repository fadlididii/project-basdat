<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            DB::table('karyawan')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'role' => $faker->randomElement(['Staff', 'HRD']),
                'tanggal_lahir' => $faker->date('Y-m-d', '2000-01-01'),
                'username' => $faker->userName,
                'password' => bcrypt('password123'),
                'jenis_karyawan_id' => $faker->numberBetween(1, 2), // Tetap atau Magang
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

