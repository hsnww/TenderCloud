<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\VendorsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomePageController::class, 'index'])->name('home');

// مسار الإداريين
Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

// مسار أعضاء الشركات
Route::middleware(['auth', 'role:company_member'])->group(function () {
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
});

// مسار أعضاء مزودي الخدمات
Route::middleware(['auth', 'role:vendor_member'])->group(function () {
    Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
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
