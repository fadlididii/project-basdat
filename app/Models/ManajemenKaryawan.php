<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManajemenKaryawan extends Model
{
    protected $table = 'karyawan';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'role',
    ];
}