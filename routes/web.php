<?php

use App\Http\Controllers\Admin\DemandsController;
use App\Http\Controllers\Front;
use Illuminate\Support\Facades\Route;

//FRONTEND
Route::get('/', [Front::class, 'index'])->name('front.index');

//BACKEND
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('demanda', DemandsController::class);
//        Route::namespace('Admin')->group(function () {
//            Route::name('admin.jobs.')->group(function () {
//                Route::get('/dashboard', [JobsController::class, 'index'])->name('dashboard');
//                Route::get('/nova-demanda', [JobsController::class, 'create'])->name('create');
//                Route::post('/nova-demanda', [JobsController::class, 'store'])->name('store');
//            });

//                Route::resource('demandas', DemandsController::class);

//        });
    });
});
