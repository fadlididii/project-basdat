<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PenilaianKinerja;

class PenilaianKinerja extends Model
{
    use HasFactory;

    // Pastikan model ini mengacu pada tabel 'penilaian'
    protected $table = 'penilaian';

    protected $fillable = [
        'id_karyawan',
        'penilaian',
        'komentar_hard',
        'tanggal_penilaian',
    ];

    public function karyawan()
    {
        return $this->belongsTo(ManajemenKaryawan::class, 'id_karyawan');
    }
}

