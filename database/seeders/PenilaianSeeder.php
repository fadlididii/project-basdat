<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    public function run()
    {
        // Loop untuk memasukkan data penilaian
        for ($i = 1; $i <= 60; $i++) {
            // Generate nilai acak dalam bentuk array
            $penilaianArray = [];
            for ($j = 1; $j <= 10; $j++) {
                $penilaianArray[] = rand(1, 5); // Nilai acak antara 3 dan 5
            }

            // Menghitung total nilai sebagai penjumlahan dari array penilaian
            $totalNilai = array_sum($penilaianArray);

            // Menyisipkan data ke tabel penilaian
            DB::table('penilaian')->insert([
                'id_karyawan' => rand(1, 15), // ID karyawan acak
                'penilaian' => json_encode($penilaianArray), // Mengonversi array menjadi string JSON
                'total_nilai' => $totalNilai, // Total nilai dari penilaian
                'komentar_hard' => "Komentar hard skill $i", // Komentar acak
                'tanggal_penilaian' => now()->subDays(rand(1, 365)), // Tanggal penilaian acak
                'created_at' => now(), // Tanggal pembuatan
                'updated_at' => now(), // Tanggal pembaruan
            ]);
        }
    }
}
