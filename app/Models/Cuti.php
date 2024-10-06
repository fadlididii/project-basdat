<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti1';

    // Kolom yang dapat diisi melalui form atau input
    protected $fillable = [
        'id_karyawan',
        'tanggal_mulai',
        'tanggal_selesai',
        'jenis_cuti',
        'keterangan',
        'status',
    ];

    // Relasi dengan model Karyawan (Setiap pengajuan cuti dimiliki oleh satu karyawan)
    public function karyawan()
    {
        return $this->belongsTo(ManajemenKaryawan::class, 'id_karyawan', 'id');
    }
}
