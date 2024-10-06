<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemenKaryawan;
use App\Models\PenilaianKinerja;
use Illuminate\Support\Facades\DB;

class HRDPerformanceController extends Controller
{
    // Fungsi untuk menampilkan form penilaian
    public function createPenilaian()
    {
        $karyawan = ManajemenKaryawan::all();
        // Kirim data karyawan ke view
        return view('hrd.penilaian_kinerja', compact('karyawan'));
    }

    // Fungsi untuk menyimpan penilaian karyawan
    public function storePenilaian(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'id_karyawan' => 'required|exists:karyawan,id', // Validasi ID karyawan harus ada di tabel karyawan
            'nilai' => 'required|array|size:10', // Pastikan nilai dikirim sebagai array
            'nilai.*' => 'required|integer|between:1,5', // Pastikan setiap aspek memiliki nilai yang valid (1 sampai 5)
            'komentar_hard' => 'nullable|string',
        ]);

        // Simpan data penilaian ke tabel penilaian
        PenilaianKinerja::create([
            'id_karyawan' => $request->id_karyawan,
            'penilaian' => json_encode($request->nilai), // Menyimpan nilai dalam bentuk JSON
            'komentar_hard' => $request->komentar_hard,
            'tanggal_penilaian' => now(),
        ]);

        return redirect()->back()->with('success', 'Penilaian berhasil disimpan!');
    }

    public function showPenilaian()
    {
        // Ambil penilaian berdasarkan id_karyawan
        $penilaian = PenilaianKinerja::where('id_karyawan', auth()->user()->id)
                                      ->latest('created_at')
                                      ->first();
    
        // Kirim data penilaian ke view
        return view('karyawan.penilaian')->with('penilaian', $penilaian);
    }
    
    
    
}
