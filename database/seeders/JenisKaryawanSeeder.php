<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisKaryawan;

class JenisKaryawanSeeder extends Seeder
{
    public function run(): void
    {JenisKaryawan::firstOrCreate(['nama_jenis' => 'Tetap'], [
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    JenisKaryawan::firstOrCreate(['nama_jenis' => 'Magang'], [
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    }
}
