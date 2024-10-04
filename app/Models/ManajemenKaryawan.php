<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManajemenKaryawan extends Model
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

    // If you want to hide the password when retrieving the model
    protected $hidden = ['password'];
}