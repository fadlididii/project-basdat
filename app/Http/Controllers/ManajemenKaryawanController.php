<?php

namespace App\Http\Controllers;

use App\Models\ManajemenKaryawan;
use Illuminate\Http\Request;

class ManajemenKaryawanController extends Controller
{
    public function index()
    {
        $karyawans = ManajemenKaryawan::paginate(10);
        return view('hrd.manajemen_karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('hrd.manajemen_karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'role' => 'required|string|max:50',
        ]);

        ManajemenKaryawan::create($request->all());
        return redirect()->route('manajemenkaryawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $karyawan = ManajemenKaryawan::findOrFail($id);
        return view('hrd.manajemen_karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'role' => 'required|string|max:50',
        ]);

        $karyawan = ManajemenKaryawan::findOrFail($id);
        $karyawan->update($request->all());
        return redirect()->route('manajemenkaryawan.index')->with('success', 'Karyawan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $karyawan = ManajemenKaryawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('manajemenkaryawan.index')->with('success', 'Karyawan berhasil dihapus!');
    }
}