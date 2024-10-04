<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ManajemenKaryawanController;


Route::middleware('auth')->group(function () {
    Route::get('/absensi', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
});

Route::resource('manajemenkaryawan', ManajemenKaryawanController::class);

Route::get('/', function () {
    return view('beranda.beranda');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// LOGIN PAGE
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route untuk dashboard HRD
Route::get('/hrd/dashboard', function () {
    return view('hrd.dashboard');
})->name('hrd.dashboard');

// Route untuk dashboard Karyawan
Route::get('/karyawan/dashboard', function () {
    return view('karyawan.dashboard'); //
})->name('karyawan.dashboard');

// Route untuk dashboard Karyawan
Route::get('/karyawan/absensi', function () {
    return view('karyawan.absensi'); //
})->name('karyawan.absensi');

// Route untuk halaman penggajian karyawan
Route::get('/hrd/penggajian', function () {
    return view('hrd.penggajian');
})->name('hrd.penggajian');

// Route untuk halaman penilaian kinerja
Route::get('/hrd/penilaian-kinerja', function () {
    return view('hrd.penilaian_kinerja');
})->name('hrd.penilaian_kinerja');


Route::get('/hrd/persetujuan-cuti', function () {
    return view('hrd.persetujuan-cuti');
})->name('hrd.persetujuan-cuti');

// Route untuk halaman hrd absensi
Route::get('/hrd/absensi', function () {
    return view('hrd.absensi');
})->name('hrd.absensi');

// Route untuk halaman profil karyawan
Route::get('/karyawan/profil', function () {
    return view('karyawan.profil');
})->name('karyawan.profil');

// Route untuk halaman karyawan pengajuan cuti
Route::get('/karyawan/pengajuan-cuti', function () {
    return view('karyawan.pengajuan-cuti');
})->name('karyawan.pengajuan-cuti');

// Route untuk halaman karyawan pengajuan cuti
Route::get('/karyawan/gaji', function () {
    return view('karyawan.gaji');
})->name('karyawan.gaji');

// Route untuk halaman karyawan pengajuan cuti
Route::get('/karyawan/nilai', function () {
    return view('karyawan.penilaian');
})->name('karyawan.penilaian');

// Route untuk halaman profil karyawan
Route::get('/hrd/profil', function () {
    return view('hrd.profil');
})->name('hrd.profil');





