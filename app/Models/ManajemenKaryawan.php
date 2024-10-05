<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ManajemenKaryawan extends Authenticatable
{
    protected $table = 'karyawan';
    public $timestamps = true;

    protected $fillable = [
        'role',
        'nama',
        'alamat',
        'telepon',
        'username',
        'password',
        'tanggal_lahir',
    ];

    protected $hidden = [
        'password',
    ];

        public function absensis()
    {
        return $this->hasMany(Absensi::class, 'id');
    }
}
