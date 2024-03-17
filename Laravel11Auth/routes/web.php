<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\VendorPanel\VendorController;
use App\Http\Controllers\CustomerPanel\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


// STEP 5: for check
// Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
// Route::get('vendor/dashboard',[VendorController::class, 'index'])->name('vendor.dashboard');


# STEP 6:
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard',[AdminController::class, 'index']);
});


Route::middleware(['auth','role:vendor'])->group(function () {
    Route::get('vendor/dashboard',[VendorController::class, 'index']);
});