<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// REGISTER PAGE
Route::get('/register', function () {
    return view('register');
});

// LOGIN PAGE
Route::get('/login', function () {
    return view('login');
});

// DASHBOARD PAGE
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');