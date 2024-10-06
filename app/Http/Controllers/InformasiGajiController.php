<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiGaji;
use Carbon\Carbon; // Untuk mengambil bulan dan tahun

class InformasiGajiController extends Controller
{
    public function index(Request $request)
    {
        $id_karyawan = auth()->user()->id; // Ambil id karyawan dari session atau auth
        $month = $request->input('month', Carbon::now()->month); // Default bulan ini
        $year = $request->input('year', Carbon::now()->year); // Default tahun ini

        // Ambil gaji berdasarkan bulan dan tahun
        $gaji = InformasiGaji::getGajiByMonth($id_karyawan, $month, $year);

        return view('karyawan.informasigaji', compact('gaji', 'month', 'year'));
    }
}
