<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisKaryawan;

class JenisKaryawanSeeder extends Seeder
{
    public function run(): void
    {
        JenisKaryawan::insert([
            ['nama_jenis' => 'Tetap'],
            ['nama_jenis' => 'Magang'],
        ]);
    }
}
