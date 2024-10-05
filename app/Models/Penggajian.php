<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;

    protected $table = 'penggajian';
    
    protected $fillable = [
        'id_karyawan',
        'gaji_pokok',
        'gaji_bonus',
        'total_gaji',
        'bulan',
        'gaji_dikirim',
    ];

    public function karyawan()
    {
        return $this->belongsTo(ManajemenKaryawan::class, 'id_karyawan');
    }
}
