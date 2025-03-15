<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsensiSeeder extends Seeder
{
    public function run()
    {
        // Status absensi yang dapat dipilih
        $statusAbsensi = ['Hadir', 'Izin', 'Sakit'];

        // Loop untuk memasukkan 3900 data absensi
        for ($i = 1; $i <= 3900; $i++) {
            DB::table('absensi')->insert([
                'id_karyawan' => rand(1, 15), // ID karyawan acak
                'status_absensi' => $statusAbsensi[array_rand($statusAbsensi)], // Memilih status absensi secara acak
                'foto_absensi' => "foto_$i.jpg", // Foto absensi
                'foto_keluar' => "foto_keluar_$i.jpg", // Foto keluar
                'jam_masuk' => now()->subHours(rand(1, 8)), // Jam masuk acak
                'jam_keluar' => now()->addHours(rand(1, 8)), // Jam keluar acak
                'created_at' => now(), // Tanggal pembuatan
                'updated_at' => now(), // Tanggal pembaruan
            ]);
        }
    }
}
