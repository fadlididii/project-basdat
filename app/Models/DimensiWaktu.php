<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimensiWaktu extends Model
{
    use HasFactory;

    protected $table = 'dimensi_waktu'; // Nama tabel di database
    protected $primaryKey = 'sk_waktu'; // Primary key tabel
    public $timestamps = false; // Nonaktifkan timestamps

    protected $fillable = [
        'sk_waktu',
        'tanggal',
        'bulan',
        'tahun',
        'kuartal',
        'hari'
        
    ];

    // Relasi ke FaktaCuti
    public function faktaCuti()
{
    return $this->hasMany(FaktaCuti::class, 'sk_waktu', 'sk_waktu');
}

public function faktaGaji()
{
    return $this->hasMany(FaktaGaji::class, 'sk_waktu', 'sk_waktu');
}

public function faktaPerforma()
{
    return $this->hasMany(FaktaPerforma::class, 'sk_waktu', 'sk_waktu');
}

}
