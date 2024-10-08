<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'id_karyawan',
        'status_absensi',
        'foto_absensi',
        'foto_keluar',
        'jam_masuk',
        'jam_keluar',
    ];

    public function karyawan()
    {
        return $this->belongsTo(ManajemenKaryawan::class, 'id_karyawan');
    }
}
