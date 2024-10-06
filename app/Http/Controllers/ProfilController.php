<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function showProfil()
    {
        // Mendapatkan ID karyawan yang sedang login
        $id_karyawan = Auth::id(); // Menggunakan Auth::id()

        // Mendapatkan informasi karyawan dari tabel Karyawan
        $karyawan = Karyawan::where('id', $id_karyawan)->first();

        // Jika data karyawan tidak ditemukan
        if (!$karyawan) {
            return view('karyawan.profil', ['error' => 'Data profil karyawan tidak ditemukan.']);
        }

        // Kirim data ke view
        return view('karyawan.profil', [
            'nama' => $karyawan->nama,
            'telepon' => $karyawan->telepon,
            'alamat' => $karyawan->alamat,
            'tanggal_lahir' => $karyawan->tanggal_lahir,
            'role' => $karyawan->role,
        ]);
    }
}
