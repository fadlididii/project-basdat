<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $primaryKey = 'id_absensi'; // Ganti ini jika kolom primary key bukan 'id'
    
    public $incrementing = true; // Pastikan ini true jika menggunakan auto-increment

    protected $fillable = [
        'id_karyawan',
        'nama_karyawan',
        'jam_masuk',
        'jam_keluar',
        'status_absensi',
        'tanggal_absensi'
    ];

    public function karyawan()
    {
        return $this->belongsTo(ManajemenKaryawan::class, 'id', 'id_karyawan');
    }    
}
