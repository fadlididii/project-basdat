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