<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// In routes/web.php
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('user/index',[HomepageController::class,'index'])->name('user.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
