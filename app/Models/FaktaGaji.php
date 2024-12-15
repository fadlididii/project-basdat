<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaktaGaji extends Model
{
    use HasFactory;

    protected $table = 'fakta_gaji'; // Nama tabel di database
    public $incrementing = false; // Nonaktifkan auto increment
    protected $primaryKey = null; // Primary key tabel
    public $timestamps = false; // Nonaktifkan created_at dan updated_at

    // Kolom yang dapat diisi
    protected $fillable = [
        'sk_gaji',
        'sk_karyawan',
        'sk_waktu',
        'total_gaji',
        'gaji_bonus',
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
