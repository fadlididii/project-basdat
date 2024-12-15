<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaktaCuti extends Model
{
    use HasFactory;

    protected $table = 'fakta_cuti2'; // Nama tabel di database
    protected $primaryKey = null; // Primary key tabel
    public $timestamps = false; // Nonaktifkan created_at dan updated_at
    public $incrementing = false;

    // Kolom yang dapat diisi
    protected $fillable = [
        'sk_cuti',
        'sk_karyawan',
        'sk_waktu',
        'total_hari',
    ];

    // Relasi dengan dimensi waktu
    public function dimensiWaktu()
    {
        return $this->belongsTo(DimensiWaktu::class, 'sk_waktu', 'sk_waktu');
    }

    // Relasi dengan dimensi karyawan
    public function dimensiKaryawan()
    {
        return $this->belongsTo(DimKaryawan::class, 'sk_karyawan', 'sk_karyawan');
    }
}
