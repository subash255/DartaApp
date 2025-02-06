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
    
    // User Routes
    Route::get('user/index', [HomepageController::class, 'index'])->name('user.index');
    Route::get('user/userdetail/{id?}', [UserdetailController::class, 'userdetail'])->name('user.userdetail');
    Route::get('user/companydetail', [HomepageController::class, 'companydetail'])->name('user.companydetail');

    Route::match(['post', 'patch'], 'userdetail/store/{id?}', [UserdetailController::class, 'store'])->name('userdetail.store');
    Route::post('company/stores', [CompanyController::class, 'stores'])->name('company.stores');
    Route::get('user/userindex', [HomepageController::class, 'viewuser'])->name('user.userindex');
    Route::get('user/edit', [HomepageController::class, 'edit'])->name('user.edit');
    Route::patch('user/update', [HomepageController::class, 'update'])->name('user.update');
    Route::get('company/step1', [CompanyController::class, 'step1'])->name('user.company.step1');
    Route::get('company/step2', [CompanyController::class, 'step2'])->name('user.company.step2');
    Route::get('company/step3', [CompanyController::class, 'step3'])->name('user.company.step3');
    Route::get('company/step4', [CompanyController::class, 'step4'])->name('user.company.step4');
    Route::get('company/step5', [CompanyController::class, 'step5'])->name('user.company.step5');

    Route::get('shareholder/step1/{id?}', [UserdetailController::class, 'step1'])->name('user.shareholder.step1');
    Route::get('shareholder/step2', [UserdetailController::class, 'step2'])->name('user.shareholder.step2');
    Route::get('shareholder/step3', [UserdetailController::class, 'step3'])->name('user.shareholder.step3');
    Route::get('shareholder/step4', [UserdetailController::class, 'step4'])->name('user.shareholder.step4');
    Route::get('shareholder/step5', [UserdetailController::class, 'step5'])->name('user.shareholder.step5');
    Route::get('shareholder/step6', [UserdetailController::class, 'step6'])->name('user.shareholder.step6');
    Route::post('shareholder/stores', [UserdetailController::class, 'stores'])->name('shareholder.stores');

    Route::delete('user/delete/{id}', [UserdetailController::class, 'delete'])->name('user.delete');




});

Route::middleware(['auth', 'admin'])->group(function () {

    //Admin Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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
