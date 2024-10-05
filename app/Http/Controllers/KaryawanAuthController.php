<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ManajemenKaryawan;

class KaryawanAuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.karyawan-login');
    }

    // Fungsi login untuk HRD dan Karyawan
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
    
        if (Auth::guard('karyawan')->attempt($credentials)) {
            $role = Auth::guard('karyawan')->user()->role;
            \Log::info("User logged in as: " . $role);  
    
            if ($role == 'HRD') {
                return redirect()->route('hrd.dashboard');
            } else {
                return redirect()->route('karyawan.dashboard');
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Username atau Password salah']);
        }
    }
    

    // Fungsi logout dengan penghapusan sesi yang aman
    public function logout(Request $request)
    {
        Auth::guard('karyawan')->logout();
        $request->session()->invalidate();  
        $request->session()->regenerateToken();  
        return redirect('/');  // Redirect ke halaman beranda setelah logout
    }
}
