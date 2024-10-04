<?php

namespace App\Http\Controllers;

use App\Models\ManajemenKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'telepon' => 'required|string|max:255',
            'role' => 'required|in:HRD,Karyawan',
            'tanggal_lahir' => 'required|date',
            'username' => 'required|string|max:225|unique:karyawan',
            'password' => 'required|string|min:8',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        ManajemenKaryawan::create($data);
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
            'telepon' => 'required|string|max:255',
            'role' => 'required|in:HRD,Karyawan',
            'tanggal_lahir' => 'required|date',
            'username' => 'required|string|max:225|unique:karyawan,username,'.$id,
            'password' => 'nullable|string|min:8',
        ]);

        $karyawan = ManajemenKaryawan::findOrFail($id);
        $data = $request->except('password');
        
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $karyawan->update($data);
        return redirect()->route('manajemenkaryawan.index')->with('success', 'Karyawan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $karyawan = ManajemenKaryawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('manajemenkaryawan.index')->with('success', 'Karyawan berhasil dihapus!');
    }
}