<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'karyawan';

    // Primary key, jika bukan 'id'
    protected $primaryKey = 'id'; // Ubah sesuai kebutuhan

    // Atribut yang bisa diisi
    protected $fillable = [
        'nama',
        'telepon',
        'alamat',
        'tanggal_lahir',
        'role',
        // Tambahkan atribut lain yang sesuai dengan kolom di tabel
    ];

    // Jika Anda menggunakan timestamps
    public $timestamps = true;

    // Definisikan relasi jika ada
    // Contoh: jika Karyawan memiliki banyak Absensi
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
