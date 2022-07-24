<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobsController;
use App\Http\Controllers\Admin\JobCategoriesController;
use App\Http\Controllers\Front;
use Illuminate\Support\Facades\Route;

//FRONTEND
Route::get('/', [Front::class, 'index'])->name('front.index');

//BACKEND
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::name('admin.dashboard.')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
        });

        Route::namespace('Admin')->group(function () {
            Route::name('admin.jobs.')->group(function () {
                Route::get('/jobs', [JobsController::class, 'index'])->name('index');
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
