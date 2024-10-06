<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\ManajemenKaryawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    public function showAbsensiMasukForm()
    {
        // Cek apakah karyawan sudah absen hari ini
        $absen = Absensi::where('id_karyawan', Auth::id())
                        ->whereDate('created_at', today()) // Cek absensi hari ini
                        ->exists(); // Gunakan exists untuk mendapatkan hasil boolean
        
        // Kembalikan view dengan variabel $absen
        return view('karyawan.absensi_masuk', ['absen' => $absen]);
    }
    

    public function storeJamMasuk(Request $request)
    {
        // Cek apakah sudah ada absensi hari ini
        $absenHariIni = Absensi::where('id_karyawan', Auth::id())
                               ->whereDate('created_at', today()) // Cek absensi hari ini
                               ->first();
    
        if ($absenHariIni) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi hari ini.');
        }
    
        // Validasi input
        $request->validate([
            'image' => 'nullable|string', // Foto hanya diperlukan jika statusnya Hadir
            'status_absensi' => 'required|string',
        ]);
    
        $foto_absensi = null; // Default null untuk foto_absensi
    
        // Jika statusnya "Hadir" dan ada image, simpan gambar
        if ($request->input('status_absensi') === 'Hadir' && $request->input('image')) {
            // Decode base64 menjadi file gambar
            list($type, $imageData) = explode(';', $request->input('image'));
            list(, $imageData) = explode(',', $imageData);
            $imageData = base64_decode($imageData);
    
            // Tentukan nama file dan path penyimpanan
            $fileName = 'absensi_masuk_' . Auth::id() . '_' . time() . '.png';
            $filePath = 'uploads/absensi/' . $fileName;
    
            // Simpan gambar ke disk di folder 'storage/app/uploads/absensi'
            Storage::put($filePath, $imageData);
    
            // Simpan path gambar ke database
            $foto_absensi = $filePath;
        }
    
        // Simpan absensi ke database
        Absensi::create([
            'id_karyawan' => Auth::id(),
            'status_absensi' => $request->input('status_absensi'),
            'foto_absensi' => $foto_absensi, // Menyimpan path gambar jika ada
            'jam_masuk' => now(),
        ]);

        // Simpan status_absensi ke session
        $status_absensi = $request->input('status_absensi'); // Ambil status dari form absensi masuk
        session(['status_absensi' => $status_absensi]);
    
        return redirect()->back()->with('success', 'Absensi berhasil disimpan!');
    }

    public function showAbsenKeluarForm($id)
    {
        $today = Carbon::today()->toDateString();
        $absensi = Absensi::where('id_karyawan', $id)
                          ->whereDate('created_at', $today)
                          ->first();
    
        $status_absensi = $absensi ? $absensi->status_absensi : null;
    
        return view('karyawan.absen_keluar', compact('status_absensi'));
    }
    
    public function storeJamKeluar(Request $request)
    {
        // Validasi input
        $request->validate([
            'image' => 'required|string', // Foto harus ada
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
