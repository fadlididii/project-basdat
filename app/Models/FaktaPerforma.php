<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaktaPerforma extends Model
{
    use HasFactory;

    protected $table = 'fakta_performa'; // Nama tabel di database
    protected $primaryKey = 'sk_gaji'; // Primary key tabel
    public $timestamps = false; // Nonaktifkan created_at dan updated_at

    // Kolom yang dapat diisi
    protected $fillable = [
        'sk_gaji',
        'sk_karyawan',
        'sk_waktu',
        'total_nilai',
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
