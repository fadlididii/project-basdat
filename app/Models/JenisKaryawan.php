<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKaryawan extends Model
{
    use HasFactory;

    protected $table = 'jenis_karyawan';

    protected $fillable = [
        'nama_jenis',
    ];

    // Jika ada relasi ke tabel karyawan, tambahkan relasi ini
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class, 'jenis_karyawan_id');
    }
}
