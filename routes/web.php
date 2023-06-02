<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
Route::get('/search', [App\Http\Controllers\User\DashboardController::class, 'search'])->middleware('blockDirectAccess')->name('search');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class);

    Route::get('/export-pdf', [App\Http\Controllers\Admin\ApplicationController::class, 'export_pdf'])->name('export-pdf');
    Route::resource('/application', App\Http\Controllers\Admin\ApplicationController::class);

    Route::resource('/agency', App\Http\Controllers\Admin\AgencyController::class);

    // Profile 
    Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
});
