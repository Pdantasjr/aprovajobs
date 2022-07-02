<?php

use App\Http\Controllers\Front;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [Front::class, 'index'])->name('front.index');
Route::get('/login', [Front::class, 'login'])->name('login');
Route::get('/register', [Front::class, 'register'])->name('register');
Route::get('/logout', [Front::class, 'index'])->name('logout');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
