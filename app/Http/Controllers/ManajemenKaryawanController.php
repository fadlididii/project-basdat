<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemenKaryawan;
use Illuminate\Support\Facades\Auth;

class ManajemenKaryawanController extends Controller
{
    // Menampilkan daftar karyawan dengan pagination
    public function index()
    {
        $karyawans = ManajemenKaryawan::paginate(10);
        $user = Auth::user();
        return view('hrd.manajemen_karyawan.index', compact('karyawans', 'user'));
    }

    // Menampilkan form untuk menambah karyawan baru
    public function create()
    {
        return view('hrd.manajemen_karyawan.create');
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:255',
            'role' => 'required|in:HRD,Karyawan',
            'tanggal_lahir' => 'required|date',
            'username' => 'required|string|max:255|unique:karyawan',
            'password' => 'required|string|min:8',
        ]);

        // Mengambil semua data kecuali password
        $data = $request->except('password');

        // Hashing password sebelum disimpan ke database
        $data['password'] = Hash::make($request->password);

        // Membuat karyawan baru
        ManajemenKaryawan::create($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('manajemenkaryawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    // Menampilkan form edit data karyawan
    public function edit($id)
    {
        $karyawan = ManajemenKaryawan::findOrFail($id);
        return view('hrd.manajemen_karyawan.edit', compact('karyawan'));
    }

    // Mengupdate data karyawan yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:255',
            'role' => 'required|in:HRD,Karyawan',
            'tanggal_lahir' => 'required|date',
            'username' => 'required|string|max:255|unique:karyawan,username,'.$id, 
            'password' => 'nullable|string|min:8', 
        ]);

        // Mencari data karyawan berdasarkan ID
        $karyawan = ManajemenKaryawan::findOrFail($id);
        
        // Ambil semua input form
        $data = $request->all();

        // Hash password sebelum disimpan ke database
        $data['password'] = Hash::make($data['password']);

        // Simpan data ke database
        ManajemenKaryawan::create($data);

        // Redirect ke halaman daftar karyawan dengan pesan sukses
        return redirect()->route('manajemenkaryawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    // Menghapus karyawan
    public function destroy($id)
    {
        // Mencari dan menghapus karyawan
        $karyawan = ManajemenKaryawan::findOrFail($id);
        $karyawan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('manajemenkaryawan.index')->with('success', 'Karyawan berhasil dihapus!');
    }


}
