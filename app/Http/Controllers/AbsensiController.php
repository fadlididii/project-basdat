<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\ManajemenKaryawan; // Pastikan model yang dipakai adalah ManajemenKaryawan
use Auth;

class AbsensiController extends Controller
{
    // Tampilkan halaman absensi
    public function showAbsensiForm()
    {
        return view('karyawan.absensi');
    }

    // Simpan data absensi
    public function storeAbsensi(Request $request)
    {
        $request->validate([
            'jam_masuk' => 'required',
            'tanggal_absensi' => 'required|date',
            'status_absensi' => 'required',
        ]);
    
        // Ambil data karyawan yang sedang login
        $karyawan = Auth::user(); // Mengambil data karyawan dari user yang login
    
        Absensi::create([
            'id_karyawan' => $karyawan->id, // ID Karyawan diambil dari user yang login
            'nama_karyawan' => $karyawan->nama, // Mengambil nama dari data karyawan yang login
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => null, //
            'status_absensi' => $request->status_absensi, 
            'tanggal_absensi' => $request->tanggal_absensi,
        ]);
    
        return redirect()->back()->with('success', 'Absensi berhasil disimpan!');
    }
    

    public function indexHRD()
    {
        // Mengambil absensi dengan relasi ke tabel karyawan melalui model ManajemenKaryawan
        $absensi = Absensi::with('karyawan')->get();

        return view('hrd.absensi.index', compact('absensi'));
    }
}
