<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/koleksi', function () {
    return view('koleksi');
});

// Routes that require admin authentication
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Motor routes
    Route::resource('motors', MotorController::class);
    Route::delete('/motors/{motor}/images', [MotorController::class, 'deleteImage'])->name('motors.delete-image');
    
    // Customer routes
    Route::resource('customers', CustomerController::class);
    
    // Sale routes
    Route::resource('sales', SaleController::class);
    Route::get('/api/motors/{motor}/price', [SaleController::class, 'getMotorPrice'])->name('motors.price');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';