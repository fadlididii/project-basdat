<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaktaGaji;
use App\Models\FaktaCuti;
use App\Models\DimKaryawan;
use App\Models\DimensiWaktu;

class OLAPController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tahun dari request atau default ke 2024
        $selectedYear = $request->input('tahun', 2024);

        // Ambil kuartal dari request, default 'all'
        $selectedQuarter = $request->input('kuartal', 'all');

        // Query dasar dimensi waktu berdasarkan kuartal
        $timeFilter = [];
        if ($selectedQuarter != 'all') {
            $timeFilter = match ($selectedQuarter) {
                'Q1' => [1, 2, 3],
                'Q2' => [4, 5, 6],
                'Q3' => [7, 8, 9],
                'Q4' => [10, 11, 12],
                default => []
            };
        }

        // Informasi Tetap
        $totalHariCuti = \DB::table('fakta_cuti2')->sum('total_hari');
        $totalKaryawan = DimKaryawan::count();
        $totalGaji = FaktaGaji::join('dimensi_waktu', 'fakta_gaji.sk_waktu', '=', 'dimensi_waktu.sk_waktu')
            ->where('dimensi_waktu.tahun', $selectedYear)
            ->sum('fakta_gaji.total_gaji_1');

        // Data Gaji Bulanan
        $gajiBulanan = FaktaGaji::join('dimensi_waktu', 'fakta_gaji.sk_waktu', '=', 'dimensi_waktu.sk_waktu')
            ->where('dimensi_waktu.tahun', $selectedYear)
            ->select('dimensi_waktu.bulan', \DB::raw('SUM(fakta_gaji.total_gaji_1) as total_gaji'))
            ->groupBy('dimensi_waktu.bulan')
            ->orderBy('dimensi_waktu.bulan')
            ->get();
        
        // Total Gaji Berdasarkan Jenis Karyawan
        $totalGajiPerJenis = FaktaGaji::join('dim_karyawan', 'fakta_gaji.sk_karyawan', '=', 'dim_karyawan.sk_karyawan')
            ->join('dimensi_waktu', 'fakta_gaji.sk_waktu', '=', 'dimensi_waktu.sk_waktu')
            ->where('dimensi_waktu.tahun', $selectedYear)
            ->select('dim_karyawan.nama_jenis', \DB::raw('SUM(fakta_gaji.total_gaji_1) as total_gaji'))
            ->groupBy('dim_karyawan.nama_jenis')
            ->get();

        // Data Gaji Per Kuartal
        $gajiPerKuartal = FaktaGaji::join('dimensi_waktu', 'fakta_gaji.sk_waktu', '=', 'dimensi_waktu.sk_waktu')
            ->where('dimensi_waktu.tahun', $selectedYear)
            ->selectRaw('
                CASE
                    WHEN dimensi_waktu.bulan IN (1, 2, 3) THEN "Q1"
                    WHEN dimensi_waktu.bulan IN (4, 5, 6) THEN "Q2"
                    WHEN dimensi_waktu.bulan IN (7, 8, 9) THEN "Q3"
                    WHEN dimensi_waktu.bulan IN (10, 11, 12) THEN "Q4"
                END as kuartal,
                SUM(fakta_gaji.total_gaji_1) as total_gaji
            ')
            ->groupByRaw('
                CASE
                    WHEN dimensi_waktu.bulan IN (1, 2, 3) THEN "Q1"
                    WHEN dimensi_waktu.bulan IN (4, 5, 6) THEN "Q2"
                    WHEN dimensi_waktu.bulan IN (7, 8, 9) THEN "Q3"
                    WHEN dimensi_waktu.bulan IN (10, 11, 12) THEN "Q4"
                END
            ')
            ->orderByRaw('FIELD(kuartal, "Q1", "Q2", "Q3", "Q4")')
            ->get();

        // Data Hari Cuti per Kuartal
        $cutiPerKuartal = \DB::table('fakta_cuti2')
            ->join('dimensi_waktu', 'fakta_cuti2.sk_waktu', '=', 'dimensi_waktu.sk_waktu')
            ->where('dimensi_waktu.tahun', $selectedYear)
            ->selectRaw('
                CASE
                    WHEN dimensi_waktu.bulan IN (1, 2, 3) THEN "Q1"
                    WHEN dimensi_waktu.bulan IN (4, 5, 6) THEN "Q2"
                    WHEN dimensi_waktu.bulan IN (7, 8, 9) THEN "Q3"
                    WHEN dimensi_waktu.bulan IN (10, 11, 12) THEN "Q4"
                END as kuartal,
                SUM(fakta_cuti2.total_hari) as total_hari
            ')
            ->groupByRaw('
                CASE
                    WHEN dimensi_waktu.bulan IN (1, 2, 3) THEN "Q1"
                    WHEN dimensi_waktu.bulan IN (4, 5, 6) THEN "Q2"
                    WHEN dimensi_waktu.bulan IN (7, 8, 9) THEN "Q3"
                    WHEN dimensi_waktu.bulan IN (10, 11, 12) THEN "Q4"
                END
            ')
            ->orderByRaw('FIELD(kuartal, "Q1", "Q2", "Q3", "Q4")')
            ->get();

        // Total Gaji Berdasarkan Jenis Karyawan
        $gajiPerJenis = \DB::table('fakta_performa')
        ->join('dim_karyawan', 'fakta_performa.sk_karyawan', '=', 'dim_karyawan.sk_karyawan')
        ->select('dim_karyawan.nama_jenis', \DB::raw('SUM(fakta_performa.gaji_bonus) as total_gaji'))
        ->groupBy('dim_karyawan.nama_jenis')
        ->get();

        // Total Hari Cuti Berdasarkan Jenis Karyawan
        $cutiPerJenis = \DB::table('fakta_cuti2')
        ->join('dim_karyawan', 'fakta_cuti2.sk_karyawan', '=', 'dim_karyawan.sk_karyawan')
        ->select('dim_karyawan.nama_jenis', \DB::raw('SUM(fakta_cuti2.total_hari) as total_cuti'))
        ->groupBy('dim_karyawan.nama_jenis')
        ->get();

        // Top 5 Penilaian Kinerja
        $top5Performa = \DB::table('fakta_performa')
            ->join('dim_karyawan', 'fakta_performa.sk_karyawan', '=', 'dim_karyawan.sk_karyawan')
            ->join('dimensi_waktu', 'fakta_performa.sk_waktu', '=', 'dimensi_waktu.sk_waktu')
            ->select('dim_karyawan.nama as nama_karyawan', \DB::raw('SUM(fakta_performa.total_nilai) as total_nilai'))
            ->where('dimensi_waktu.tahun', $selectedYear)
            ->when($selectedQuarter != 'all', function ($query) use ($timeFilter) {
                return $query->whereIn('dimensi_waktu.bulan', $timeFilter);
            })
            ->groupBy('dim_karyawan.nama')
            ->orderBy('total_nilai', 'DESC')
            ->limit(5)
            ->get();

        // Top 5 Gaji Bonus
        $top5Bonus = \DB::table('fakta_performa')
            ->join('dim_karyawan', 'fakta_performa.sk_karyawan', '=', 'dim_karyawan.sk_karyawan')
            ->join('dimensi_waktu', 'fakta_performa.sk_waktu', '=', 'dimensi_waktu.sk_waktu')
            ->select('dim_karyawan.nama as nama_karyawan', \DB::raw('SUM(fakta_performa.gaji_bonus) as total_bonus'))
            ->where('dimensi_waktu.tahun', $selectedYear)
            ->when($selectedQuarter != 'all', function ($query) use ($timeFilter) {
                return $query->whereIn('dimensi_waktu.bulan', $timeFilter);
            })
            ->groupBy('dim_karyawan.nama')
            ->orderBy('total_bonus', 'DESC')
            ->limit(5)
            ->get();


        // Kirimkan data ke view
        return view('hrd.dashboard', compact(
            'totalHariCuti',
            'totalKaryawan',
            'gajiBulanan',
            'gajiPerKuartal',
            'selectedYear',
            'selectedQuarter',
            'totalGaji',
            'totalGajiPerJenis',
            'gajiPerJenis',
            'cutiPerJenis',
            'cutiPerKuartal',
            'top5Performa',
            'top5Bonus'
        ));
    }
}
