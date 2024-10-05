<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\ManajemenKaryawan;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    // Menyimpan absensi jam masuk
    public function storeJamMasuk(Request $request) 
    {
        $request->validate([
            'jam_masuk' => 'required|date_format:H:i',
            'tanggal_absensi' => 'required|date_format:Y-m-d', // pastikan formatnya Y-m-d
            'status_absensi' => 'required',
        ]);

        // Cek apakah sudah ada absen untuk tanggal tersebut
        $existingAbsensi = Absensi::where('id_karyawan', Auth::id())
                                  ->where('tanggal_absensi', $request->tanggal_absensi)
                                  ->first();

        // Jika sudah ada absensi hari ini
        if ($existingAbsensi) {
            return redirect()->back()->with('error', 'Anda sudah mengisi absensi jam masuk untuk hari ini.');
        }

        // Ambil data karyawan
        $karyawan = ManajemenKaryawan::find(Auth::id());

        // Simpan absensi jam masuk
        Absensi::create([
            'id_karyawan' => Auth::user()->id,
            'nama_karyawan' => $karyawan->nama,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => null, // Jam keluar belum diisi
            'status_absensi' => $request->status_absensi,
            'tanggal_absensi' => $request->tanggal_absensi,
        ]);

        return redirect()->back()->with('success', 'Absensi jam masuk berhasil disimpan!');
    }

    // Menyimpan absensi jam keluar
    public function storeJamKeluar(Request $request)
    {
        $request->validate([
            'jam_keluar' => 'required|date_format:H:i',
        ]);

        // Cari data absensi hari ini berdasarkan id_karyawan dan tanggal_absensi
        $absensi = Absensi::where('id_karyawan', Auth::id())
                        ->where('tanggal_absensi', date('Y-m-d')) // Pastikan format Y-m-d
                        ->first();

        // Jika absensi tidak ditemukan (artinya belum absen jam masuk)
        if (!$absensi) {
            return redirect()->back()->with('error', 'Anda belum absen jam masuk hari ini.');
        }

        // Cek jika absensi sudah memiliki jam keluar
        if ($absensi->jam_keluar) {
            return redirect()->back()->with('error', 'Anda sudah mengisi absensi jam keluar.');
        }

        // Update jam keluar
        $absensi->update([
            'jam_keluar' => $request->jam_keluar,
        ]);

        return redirect()->back()->with('success', 'Absensi jam keluar berhasil disimpan!');
    }

    // Menampilkan daftar absensi untuk HRD
    public function indexHRD()
    {
        // Mengambil semua data absensi beserta data karyawan terkait
        $absensi = Absensi::with('karyawan')->get();

        return view('hrd.absensi.index', compact('absensi'));
    }
}