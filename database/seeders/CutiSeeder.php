<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CutiSeeder extends Seeder
{
    public function run()
    {
        // Inisialisasi Faker
        $faker = Faker::create();
        
        // Jenis cuti yang dapat dipilih
        $jenisCuti = [
            'Cuti Tahunan',
            'Cuti Sakit',
            'Cuti Melahirkan',
            'Cuti Lainnya'
        ];
        
        // Status untuk cuti
        $statuses = ['Menunggu', 'Disetujui', 'Ditolak'];
        
        // Loop untuk memasukkan data cuti
        for ($i = 1; $i <= 60; $i++) {
            $idKaryawan = rand(1, 15); // ID karyawan acak
            $tanggalMulai = now()->subDays(rand(1, 365))->startOfDay(); // Tanggal mulai acak

            // Cek apakah karyawan sudah memiliki cuti pada tanggal tertentu
            $existingCuti = DB::table('cuti1')
                ->where('id_karyawan', $idKaryawan)
                ->whereDate('tanggal_mulai', $tanggalMulai)
                ->exists();

            // Jika belum ada cuti pada tanggal tersebut, tambahkan data baru
            if (!$existingCuti) {
                DB::table('cuti1')->insert([
                    'id_karyawan' => $idKaryawan,
                    'tanggal_mulai' => $tanggalMulai,
                    'tanggal_selesai' => $tanggalMulai->copy()->addDays(rand(1, 5)), // Durasi cuti antara 1-5 hari
                    'jenis_cuti' => $jenisCuti[array_rand($jenisCuti)], // Memilih jenis cuti secara acak
                    'keterangan' => $faker->sentence(), // Keterangan acak
                    'status' => $statuses[array_rand($statuses)], // Status cuti acak
                    'created_at' => now(), // Tanggal pembuatan
                    'updated_at' => now(), // Tanggal pembaruan
                ]);
            }
        }
    }
}
