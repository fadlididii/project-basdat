<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianKinerja extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'id_karyawan',
        'penilaian',
        'komentar_hard',
        'tanggal_penilaian',
        'total_nilai', // Tambahkan kolom total_nilai
    ];

    protected $casts = [
        'penilaian' => 'array', // Ubah JSON ke array saat diakses
    ];

    public function karyawan()
    {
        return $this->belongsTo(ManajemenKaryawan::class, 'id_karyawan');
    }

    // Fungsi untuk menghitung total nilai
    public function calculateTotalPenilaian()
    {
        return array_sum($this->penilaian);
    }
}
