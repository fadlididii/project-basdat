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
    // Validasi data
    $validated = $request->validate([
        'id_karyawan' => 'required|exists:karyawan,id',
        'nilai' => 'required|array|size:10',
        'nilai.*' => 'required|integer|between:1,5',
        'komentar_hard' => 'nullable|string',
    ]);

    $penilaian = array_map('intval', $validated['nilai']);
    $totalNilai = array_sum($penilaian);

    // Simpan data penilaian ke tabel
    PenilaianKinerja::create([
        'id_karyawan' => $validated['id_karyawan'],
        'penilaian' => json_encode($penilaian), // Simpan sebagai JSON
        'total_nilai' => $totalNilai, // Simpan total nilai
        'komentar_hard' => $validated['komentar_hard'],
        'tanggal_penilaian' => now(),
    ]);

    return redirect()->back()->with('success', 'Penilaian berhasil disimpan!');
}

    
    public function calculateTotalPenilaian()
{
    // Ambil semua data penilaian
    $penilaianData = PenilaianKinerja::all();

    $result = [];
    foreach ($penilaianData as $data) {
        $result[] = [
            'id_penilaian' => $data->id,
            'id_karyawan' => $data->id_karyawan,
            'total_penilaian' => $data->calculateTotalPenilaian(), // Panggil fungsi dari model
        ];
    }

    // Kirimkan ke view
    return view('hrd.total_penilaian', compact('result'));

}
public function showDashboard()
{
    // Ambil semua data penilaian
    $penilaianData = PenilaianKinerja::with('karyawan')->get();

    // Hitung total nilai untuk setiap penilaian
    $data = $penilaianData->map(function ($item) {
        return [
            'id_penilaian' => $item->id,
            'id_karyawan' => $item->id_karyawan,
            'nama_karyawan' => $item->karyawan->nama ?? 'Tidak Diketahui',
            'total_penilaian' => $item->calculateTotalPenilaian(),
            'tanggal_penilaian' => $item->tanggal_penilaian,
        ];
    });

    // Kirimkan data ke view dashboard
    return view('hrd.dashboard', ['penilaian' => $data]);
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
