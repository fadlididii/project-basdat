<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

Route::get('/hrd/manajemen-karyawan', function () {
    return view('hrd.manajemen_karyawan');
})->name('hrd.manajemen_karyawan');

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