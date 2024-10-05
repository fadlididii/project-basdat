<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HRDDashboardController extends Controller
{
    public function index()
    {
        return view('hrd.dashboard');
    }
}