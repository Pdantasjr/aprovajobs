<?php

use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\JobCategoriesController;
use App\Http\Controllers\Front;
use Illuminate\Support\Facades\Route;

//FRONTEND
Route::get('/', [Front::class, 'index'])->name('front.index');

//BACKEND
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::name('admin.jobs.')->group(function () {
                Route::get('/dashboard', [JobsController::class, 'index'])->name('dashboard');
                Route::get('/novo-job', [JobsController::class, 'create'])->name('create');
                Route::post('/novo-job', [JobsController::class, 'store'])->name('store');
                Route::get('/job/{slug}', [JobsController::class, 'show'])->name('show');
            });
        });

        Route::name('admin.')->group(function () {
            Route::resource('categories', JobCategoriesController::class);
        });
        
    });
});
