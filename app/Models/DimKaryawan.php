<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimKaryawan extends Model
{
    use HasFactory;

    protected $table = 'dim_karyawan'; // Nama tabel di database
    protected $primaryKey = 'sk_karyawan'; // Primary key tabel
    public $timestamps = false; // Nonaktifkan created_at dan updated_at

    // Kolom yang dapat diisi
    protected $fillable = [
        'sk_karyawan',
        'nama',
        'nama_jenis',
        'id_1',
    ];

    // Relasi ke FaktaCuti
    public function faktaCuti()
{
    return $this->hasMany(FaktaCuti::class, 'sk_karyawan', 'sk_karyawan');
}

public function faktaGaji()
{
    return $this->hasMany(FaktaGaji::class, 'sk_karyawan', 'sk_karyawan');
}

public function faktaPerforma()
{
    return $this->hasMany(FaktaPerforma::class, 'sk_karyawan', 'sk_karyawan');
}
}
