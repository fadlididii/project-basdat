<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiGaji extends Model
{
    use HasFactory;

    protected $table = 'gaji'; // Nama tabel tetap 'gaji'
    protected $fillable = ['id_karyawan', 'gaji_pokok', 'bonus', 'tanggal_gaji'];

    // Relasi ke model Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    // Method untuk mengambil gaji berdasarkan bulan
    public static function getGajiByMonth($id_karyawan, $month, $year)
    {
        return self::where('id_karyawan', $id_karyawan)
                    ->whereMonth('tanggal_gaji', $month)
                    ->whereYear('tanggal_gaji', $year)
                    ->first();
    }
}
