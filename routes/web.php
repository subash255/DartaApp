<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodolistController;
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
    
    Route::get('user/userindex', [HomepageController::class, 'viewuser'])->name('user.userindex');
    Route::get('user/edit', [HomepageController::class, 'edit'])->name('user.edit');
    Route::patch('user/update', [HomepageController::class, 'update'])->name('user.update');
    Route::get('company/step1/{id?}', [CompanyController::class, 'step1'])->name('user.company.step1');
    Route::post('company/step1/store', [CompanyController::class, 'step1Store'])->name('user.company.step1.store');
    Route::put('company/step1/update/{id}', [CompanyController::class, 'step1Update'])->name('user.company.step1.update');
    Route::get('company/step2/{id?}', [CompanyController::class, 'step2'])->name('user.company.step2');
    Route::put('company/step2/update/{id}', [CompanyController::class, 'step2Update'])->name('user.company.step2.update');
    Route::get('company/step3/{id?}', [CompanyController::class, 'step3'])->name('user.company.step3');
    Route::put('company/step3/update/{id}', [CompanyController::class, 'step3Update'])->name('user.company.step3.update');
    Route::get('company/step4/{id?}', [CompanyController::class, 'step4'])->name('user.company.step4');
    Route::put('company/step4/update/{id}', [CompanyController::class, 'step4Update'])->name('user.company.step4.update');
    Route::get('company/step5/{id?}', [CompanyController::class, 'step5'])->name('user.company.step5');
    Route::put('company/step5/update/{id}', [CompanyController::class, 'step5Update'])->name('user.company.step5.update');


    Route::get('shareholder/step1/{id?}', [UserdetailController::class, 'step1'])->name('user.shareholder.step1');
    Route::post('/shareholder/step1/store', [UserdetailController::class, 'step1Store'])->name('user.shareholder.step1.store');
    Route::put('/shareholder/step1/update/{id}', [UserdetailController::class, 'step1Update'])->name('user.shareholder.step1.update');
    Route::get('shareholder/step2/{id}', [UserdetailController::class, 'step2'])->name('user.shareholder.step2');
    Route::put('/shareholder/step2/update/{id}', [UserdetailController::class, 'step2Update'])->name('user.shareholder.step2.update');
    Route::get('shareholder/step3/{id}', [UserdetailController::class, 'step3'])->name('user.shareholder.step3');
    Route::put('/shareholder/step3/update/{id}', [UserdetailController::class, 'step3Update'])->name('user.shareholder.step3.update');
    Route::get('shareholder/step4/{id}', [UserdetailController::class, 'step4'])->name('user.shareholder.step4');
    Route::put('/shareholder/step4/update/{id}', [UserdetailController::class, 'step4Update'])->name('user.shareholder.step4.update');
    Route::get('shareholder/step5/{id}', [UserdetailController::class, 'step5'])->name('user.shareholder.step5');
    Route::put('/shareholder/step5/update/{id}', [UserdetailController::class, 'step5Update'])->name('user.shareholder.step5.update');
    Route::get('shareholder/step6/{id}', [UserdetailController::class, 'step6'])->name('user.shareholder.step6');
    Route::put('/shareholder/step6/update/{id}', [UserdetailController::class, 'step6Update'])->name('user.shareholder.step6.update');

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
    Route::get('approved/{id}', [CompanyController::class, 'approved'])->name('company.approved');
    Route::get('company/rejected/{id}', [CompanyController::class, 'rejected'])->name('company.rejected');

    //company register route
    Route::get('admin/company/step1/{id?}', [CompanyController::class, 'step1'])->name('admin.company.step1');
    Route::post('admin/company/step1/store', [CompanyController::class, 'step1Store'])->name('admin.company.step1.store');
    Route::put('admin/company/step1/update/{id}', [CompanyController::class, 'step1Update'])->name('admin.company.step1.update');
    Route::get('admin/company/step2/{id?}', [CompanyController::class, 'step2'])->name('admin.company.step2');
    Route::put('admin/company/step2/update/{id}', [CompanyController::class, 'step2Update'])->name('admin.company.step2.update');
    Route::get('admin/company/step3/{id?}', [CompanyController::class, 'step3'])->name('admin.company.step3');
    Route::put('admin/company/step3/update/{id}', [CompanyController::class, 'step3Update'])->name('admin.company.step3.update');
    Route::get('admin/company/step4/{id?}', [CompanyController::class, 'step4'])->name('admin.company.step4');
    Route::put('admin/company/step4/update/{id}', [CompanyController::class, 'step4Update'])->name('admin.company.step4.update');
    Route::get('admin/company/step5/{id?}', [CompanyController::class, 'step5'])->name('admin.company.step5');
    Route::put('admin/company/step5/update/{id}', [CompanyController::class, 'step5Update'])->name('admin.company.step5.update');

    //category Routes
    Route::get('admin/category',[CategoryController::class,'index'])->name('admin.category.index');
    Route::post('admin/category/store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::delete('admin/category/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
    Route::patch('admin/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');

    //TodoList Routes
    Route::get('admin/company/todo/{id}',[TodolistController::class,'index'])->name('admin.company.todo');
    Route::post('admin/todo/store/{id}',[TodolistController::class,'store'])->name('admin.todo.store');
    Route::delete('admin/todo/{id}',[TodolistController::class,'delete'])->name('admin.todo.delete');

});

require __DIR__ . '/auth.php';
