<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenggajianSeeder extends Seeder
{
    public function run()
    {
        // Inisialisasi Faker
        $faker = Faker::create();

        // Loop untuk memasukkan data penggajian
        for ($i = 1; $i <= 50; $i++) {
            $gajiPokok = $faker->randomFloat(2, 3000000, 8000000); // Gaji pokok acak
            $gajiBonus = $faker->randomFloat(2, 0, 2000000); // Bonus acak
            $totalGaji = $gajiPokok + $gajiBonus; // Hitung total gaji

            DB::table('penggajian')->insert([
                'id_karyawan' => rand(1, 15), // ID karyawan acak
                'bulan' => $faker->dateTimeBetween('-2 years', 'now'), // Bulan acak dalam 2 tahun terakhir
                'gaji_pokok' => $gajiPokok,
                'gaji_bonus' => $gajiBonus,
                'total_gaji' => $totalGaji,
                'gaji_dikirim' => $faker->boolean(), // Status pengiriman gaji
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
