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
Route::get('/karyawan/coba', function () {
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