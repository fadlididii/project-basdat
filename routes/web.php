<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ManajemenKaryawanController;
use App\Http\Controllers\KaryawanAuthController;
use App\Http\Controllers\KaryawanDashboardController;
use App\Http\Controllers\HRDDashboardController;

// Route untuk manajemen karyawan
Route::resource('manajemenkaryawan', ManajemenKaryawanController::class);

// Route untuk beranda
Route::get('/', function () {
    return view('beranda.beranda');
})->name('home');

// Route untuk login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route untuk login dan logout karyawan
Route::get('karyawan/login', [KaryawanAuthController::class, 'showLoginForm'])->name('karyawan.login');
Route::post('karyawan/login', [KaryawanAuthController::class, 'login'])->name('karyawan.login');
Route::post('karyawan/logout', [KaryawanAuthController::class, 'logout'])->name('karyawan.logout');

// Route untuk Karyawan
Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('karyawan/dashboard', function () {
        if (auth()->user()->role != 'Karyawan') {
            return redirect()->route('hrd.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai Karyawan']);
        }
        return view('karyawan.dashboard');
    })->name('karyawan.dashboard');

    Route::get('/karyawan/absensi', function () {
        if (auth()->user()->role != 'Karyawan') {
            return redirect()->route('hrd.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai Karyawan']);
        }
        return view('karyawan.absensi');
    })->name('karyawan.absensi');

    Route::get('/karyawan/profil', function () {
        if (auth()->user()->role != 'Karyawan') {
            return redirect()->route('hrd.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai Karyawan']);
        }
        return view('karyawan.profil');
    })->name('karyawan.profil');

    Route::get('/karyawan/pengajuan-cuti', function () {
        if (auth()->user()->role != 'Karyawan') {
            return redirect()->route('hrd.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai Karyawan']);
        }
        return view('karyawan.pengajuan-cuti');
    })->name('karyawan.pengajuan-cuti');

    Route::get('/karyawan/gaji', function () {
        if (auth()->user()->role != 'Karyawan') {
            return redirect()->route('hrd.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai Karyawan']);
        }
        return view('karyawan.gaji');
    })->name('karyawan.gaji');

    Route::get('/karyawan/nilai', function () {
        if (auth()->user()->role != 'Karyawan') {
            return redirect()->route('hrd.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai Karyawan']);
        }
        return view('karyawan.penilaian');
    })->name('karyawan.penilaian');
});


// Route untuk HRD
Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('hrd/dashboard', function () {
        if (auth()->user()->role != 'HRD') {
            return redirect()->route('karyawan.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai HRD']);
        }
        return view('hrd.dashboard');
    })->name('hrd.dashboard');

    Route::get('/hrd/absensi', function () {
        if (auth()->user()->role != 'HRD') {
            return redirect()->route('karyawan.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai HRD']);
        }
        return view('hrd.absensi');
    })->name('hrd.absensi');

    Route::get('/hrd/persetujuan-cuti', function () {
        if (auth()->user()->role != 'HRD') {
            return redirect()->route('karyawan.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai HRD']);
        }
        return view('hrd.persetujuan-cuti');
    })->name('hrd.persetujuan-cuti');

    Route::get('/hrd/penggajian', function () {
        if (auth()->user()->role != 'HRD') {
            return redirect()->route('karyawan.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai HRD']);
        }
        return view('hrd.penggajian');
    })->name('hrd.penggajian');

    Route::get('/hrd/penilaian-kinerja', function () {
        if (auth()->user()->role != 'HRD') {
            return redirect()->route('karyawan.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai HRD']);
        }
        return view('hrd.penilaian_kinerja');
    })->name('hrd.penilaian_kinerja');

    Route::get('/hrd/profil', function () {
        if (auth()->user()->role != 'HRD') {
            return redirect()->route('karyawan.dashboard')->withErrors(['error' => 'Anda tidak memiliki akses sebagai HRD']);
        }
        return view('hrd.profil');
    })->name('hrd.profil');
});

// Route untuk manajemen karyawan
Route::middleware(['auth:karyawan'])->group(function () {
    Route::resource('manajemenkaryawan', ManajemenKaryawanController::class);
});

// Route default jika user mengakses URL yang tidak valid
Route::fallback(function () {
    return redirect()->route('login');
});
