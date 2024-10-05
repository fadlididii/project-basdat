<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\ManajemenKaryawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    public function storeJamMasuk(Request $request)
    {
        // Validasi bahwa ada gambar yang dikirim
        $request->validate([
            'image' => 'required|string',
            'status_absensi' => 'required|string',
        ]);

        // Dapatkan data base64 image dari request
        $imageData = $request->input('image');

        // Decode base64 menjadi file gambar
        list($type, $imageData) = explode(';', $imageData);
        list(, $imageData) = explode(',', $imageData);
        $imageData = base64_decode($imageData);

        // Tentukan nama file dan path penyimpanan
        $fileName = 'absen_masuk_' . Auth::id() . '_' . time() . '.png';
        $filePath = 'uploads/absensi/' . $fileName;

        // Simpan gambar ke disk
        Storage::put($filePath, $imageData);

        // Simpan data absensi ke database
        Absensi::create([
            'id_karyawan' => Auth::id(),
            'status_absensi' => $request->input('status_absensi'),
            'foto_absensi' => $filePath, // Simpan path gambar
            'jam_masuk' => now(), // Set jam masuk sebagai waktu saat ini
        ]);

        return redirect()->back()->with('success', 'Absensi jam masuk berhasil disimpan!');
    }

    public function storeJamKeluar(Request $request)
    {
        // Validasi bahwa ada gambar yang dikirim
        $request->validate([
            'image' => 'required|string',
        ]);

        // Dapatkan data base64 image dari request
        $imageData = $request->input('image');

        // Decode base64 menjadi file gambar
        list($type, $imageData) = explode(';', $imageData);
        list(, $imageData) = explode(',', $imageData);
        $imageData = base64_decode($imageData);

        // Tentukan nama file dan path penyimpanan
        $fileName = 'absen_keluar_' . Auth::id() . '_' . time() . '.png';
        $filePath = 'uploads/absensi/' . $fileName;

        // Simpan gambar ke disk
        Storage::put($filePath, $imageData);

        // Update data absensi untuk menambahkan jam keluar
        $absensi = Absensi::where('id_karyawan', Auth::id())
                          ->whereNull('jam_keluar') // Cari absensi yang belum ada jam keluar
                          ->first();

        if ($absensi) {
            $absensi->update([
                'jam_keluar' => now(), // Set jam keluar sebagai waktu saat ini
                'foto_keluar' => $filePath, // Simpan path gambar jam keluar
            ]);
        }

        return redirect()->back()->with('success', 'Absensi jam keluar berhasil disimpan!');
    }

    public function indexHRD()
    {
        // Mengambil semua data absensi beserta data karyawan terkait
        $absensi = Absensi::with('karyawan')->get(); // Pastikan 'karyawan' adalah relasi yang benar

        return view('hrd.absensi', compact('absensi'));
    }
}
