<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\NormalPanel\NormalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { 
    return view('normal.index');
});


// Route::get('/dashboard', function () {//role3
//     return view('normal.index');
// })->middleware(['auth', 'verified', 'normal'])->name('dashboard');

// Route::get('/admin', function () {//role2
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified', 'admin'])->name('admin');

// Route::get('/superadmin', function () {//role1
//     return view('superadmin.dashboard');
// })->middleware(['auth', 'verified', 'superadmin'])->name('superadmin');

Route::get('/home',[NormalController::class,'index'])->middleware('auth','verified', 'normal')->name('dashboard'); //role3
Route::get('/admin',[AdminController::class,'index'])->middleware('auth','verified', 'admin')->name('admin'); //role2
Route::get('/superadmin',[SuperAdminController::class,'index'])->middleware('auth','verified', 'superadmin')->name('superadmin'); //role1



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


Route::middleware('auth', 'verified', 'admin')->group(function () {
    Route::get('/admin/about', [AdminController::class, 'about'])->name('admin.about');
});
