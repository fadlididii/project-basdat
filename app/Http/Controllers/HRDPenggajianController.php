<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggajian;
use App\Models\ManajemenKaryawan;
use App\Models\Absensi;

class HRDPenggajianController extends Controller
{
    public function index()
    {
        // Ambil semua karyawan
        $karyawan = ManajemenKaryawan::all();
        
        // Hitung gaji setiap karyawan
        $dataPenggajian = $karyawan->map(function ($karyawan) {
            $gajiPokok = $karyawan->role == 'HRD' ? 8000000 : 5000000; // Gaji pokok sesuai dengan role
            $totalJamKerja = $this->hitungTotalJamKerja($karyawan->id);
            $gajiBonus = $this->hitungGajiBonus($totalJamKerja);
            $totalGaji = $gajiPokok + $gajiBonus;

            return [
                'id_karyawan' => $karyawan->id,
                'nama' => $karyawan->nama,
                'gaji_pokok' => $gajiPokok,
                'gaji_bonus' => $gajiBonus,
                'total_gaji' => $totalGaji,
                'bulan' => now()->format('F Y'), // Bulan saat ini
                'gaji_dikirim' => false, // Default false jika belum dikirim
                'id_penggajian' => $karyawan->id // Untuk keperluan pengiriman gaji
            ];
        });

        // Kirim data penggajian ke view
        return view('hrd.penggajian', ['dataPenggajian' => $dataPenggajian]);
    }

    // Fungsi menghitung total jam kerja
    private function hitungTotalJamKerja($id_karyawan)
    {
        // Menggunakan kolom created_at sebagai pengganti tanggal_absensi
        $absensi = Absensi::where('id_karyawan', $id_karyawan)
                          ->whereMonth('created_at', date('m')) // Menggunakan created_at untuk bulan
                          ->whereYear('created_at', date('Y'))  // Menggunakan created_at untuk tahun
                          ->whereNotNull('jam_keluar')
                          ->get();
        
        $totalJamKerja = 0;
        foreach ($absensi as $record) {
            // Menggunakan timestamp dari created_at dan updated_at
            $jamMasuk = new \DateTime($record->created_at);
            $jamKeluar = new \DateTime($record->updated_at);
    
            // Hitung selisih waktu kerja
            $selisih = $jamKeluar->diff($jamMasuk);
    
            // Tambahkan jam kerja ke total jam kerja
            $totalJamKerja += $selisih->h + ($selisih->i / 60);
        }
    
        return $totalJamKerja;
    }

    // Fungsi menghitung gaji bonus
    private function hitungGajiBonus($totalJamKerja)
    {
        $jamNormal = 240; // Jumlah jam kerja normal dalam satu bulan (misalnya, 30 hari x 8 jam)
        $gajiPerJam = 50000; // Rp 50.000 per jam lembur
        if ($totalJamKerja > $jamNormal) {
            return ($totalJamKerja - $jamNormal) * $gajiPerJam;
        }
        return 0;
    }

    public function kirimGaji(Request $request)
    {
        // Ambil semua karyawan
        $karyawan = ManajemenKaryawan::all();
    
        // Lakukan update atau insert penggajian
        foreach ($karyawan as $kar) {
            // Hitung gaji pokok dan gaji bonus
            $gajiPokok = $kar->role == 'HRD' ? 8000000 : 5000000;
            $totalJamKerja = $this->hitungTotalJamKerja($kar->id);
            $gajiBonus = $this->hitungGajiBonus($totalJamKerja);
            $totalGaji = $gajiPokok + $gajiBonus;
    
            // Simpan data penggajian
            Penggajian::updateOrCreate(
                ['id_karyawan' => $kar->id, 'bulan' => now()->format('F Y')],
                [
                    'gaji_pokok' => $gajiPokok, 
                    'gaji_bonus' => $gajiBonus, 
                    'total_gaji' => $totalGaji,
                    'gaji_dikirim' => true // Tetap gunakan kolom ini
                ]
            );            
        }
    
        return redirect()->route('hrd.penggajian')->with('success', 'Informasi gaji telah dikirim.');
    }

    public function showGaji()
    {
        $id_karyawan = auth()->user()->id;
    
        $penggajian = Penggajian::where('id_karyawan', $id_karyawan)
                                ->where('gaji_dikirim', true)
                                ->where('bulan', now()->format('F Y'))
                                ->first();
        
        if (!$penggajian) {
            return view('karyawan.gaji', ['error' => 'Gaji untuk bulan ini belum dikirim oleh HRD.']);
        }
    
        return view('karyawan.gaji', [
            'gaji_pokok' => $penggajian->gaji_pokok,
            'gaji_bonus' => $penggajian->gaji_bonus,
            'total_gaji' => $penggajian->total_gaji,
            'bulan' => $penggajian->bulan,
        ]);
    }     
}
