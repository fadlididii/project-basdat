<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    // Menampilkan form pengajuan cuti untuk karyawan
    public function create()
    {
        return view('karyawan.pengajuan-cuti');
    }

    // Memproses pengajuan cuti
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_cuti' => 'required',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data pengajuan cuti ke database
        Cuti::create([
            'id_karyawan' => Auth::id(),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'jenis_cuti' => $request->jenis_cuti,
            'keterangan' => $request->keterangan,
            'status' => 'Menunggu', // Default status
        ]);

        return redirect()->back()->with('success', 'Pengajuan cuti berhasil diajukan.');
    }

    // Menampilkan daftar pengajuan cuti untuk HRD
    public function indexHRD()
    {
        $cuti = Cuti::with('karyawan')->get(); // Mengambil semua pengajuan cuti

        return view('hrd.persetujuan-cuti', compact('cuti'));
    }

    // Memproses persetujuan cuti oleh HRD
    public function update(Request $request, $id)
    {
        $cuti = Cuti::findOrFail($id);

        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
        ]);

        // Update status cuti
        $cuti->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status cuti berhasil diperbarui.');
    }

    public function showPengajuanCuti()
    {
        // Ambil riwayat pengajuan cuti berdasarkan karyawan yang sedang login
        $cutiHistory = Cuti::where('id_karyawan', auth()->user()->id)->get();
    
        return view('karyawan.pengajuan-cuti', compact('cutiHistory'));
    }
}
