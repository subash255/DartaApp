<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserdetailController;
use Illuminate\Support\Facades\Route;

//Welcome Page
Route::get('/', [HomepageController::class, 'welcome'])->name('welcome');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Routes
    Route::get('user/index', [HomepageController::class, 'index'])->name('user.index');
    Route::get('user/userdetail/{id?}', [UserdetailController::class, 'userdetail'])->name('user.userdetail');
    Route::get('user/companydetail', [HomepageController::class, 'companydetail'])->name('user.companydetail');
    Route::match(['post', 'patch'], 'userdetail/store/{id?}', [UserdetailController::class, 'store'])->name('userdetail.store');
    Route::post('company/store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('user/userindex', [HomepageController::class, 'viewuser'])->name('user.userindex');
    Route::get('user/edit', [HomepageController::class, 'edit'])->name('user.edit');
    Route::patch('user/update', [HomepageController::class, 'update'])->name('user.update');
});

Route::middleware(['auth', 'admin'])->group(function () {

    //Admin Routes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    //Customer Routes
    Route::get('/admin/customers', [AdminController::class, 'CustomerIndex'])->name('admin.customer.index');
    Route::post('customer/update-toggle/{customerId}', [AdminController::class, 'updateToggleStatus']);
    Route::get('delete/{id}', [AdminController::class, 'delete'])->name('admin.customer.delete');
    Route::get('accepted/{id}', [AdminController::class, 'accepted'])->name('customer.accepted');
    Route::get('rejected/{id}', [AdminController::class, 'rejected'])->name('customer.rejected');

    //Shareholder Routes
    Route::get('admin/shareholders', [AdminController::class, 'shareholderindex'])->name('admin.shareholder.index');
    Route::delete('shareholder/delete/{id}', [AdminController::class, 'shareholderdelete'])->name('admin.shareholder.delete');
    Route::get('shareholder/view/{id}', [AdminController::class, 'viewshareholder'])->name('admin.shareholder.view');

    //Company Routes
    Route::get('admin/companies', [CompanyController::class, 'index'])->name('admin.company.index');
    Route::delete('company/delete/{id}', [CompanyController::class, 'delete'])->name('admin.company.delete');
});

require __DIR__ . '/auth.php';
