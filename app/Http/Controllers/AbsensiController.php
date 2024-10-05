<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
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

        Absensi::create([
            'id_karyawan' => Auth::user()->id, // ID Karyawan diambil dari user yang login
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => null, // Inisialisasi jam keluar dengan null
            'status_absensi' => $request->status_absensi,  // Status absensi dari form
            'tanggal_absensi' => $request->tanggal_absensi,
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil disimpan!');
    }

    public function indexHRD()
    {
        $absensi = Absensi::with('karyawan')->get();

        return view('hrd.absensi.index', compact('absensi'));
    }

}
