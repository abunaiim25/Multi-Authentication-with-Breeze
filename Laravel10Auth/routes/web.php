<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\CustomerPanel\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendorPanel\VendorController;


//--------------
// Route::get('/', function () {//aff 12
//     return view('welcome');
// });
//step 12 
Route::get('/', function () { //off step 11
    return view('customer.index');
})->name('customer.index');
//--------------


//--------------
//STEP 7
// Route::get('/dashboard', function () { //off step 11
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//step 11
Route::get('/dashboard',[CustomerController::class,'redirect'])->middleware('auth','verified')->name('dashboard');
//-------------


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';



//STEP 6
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth','role:vendor'])->group(function () {
    Route::get('vendor/dashboard',[VendorController::class, 'index'])->name('vendor.dashboard');
});
