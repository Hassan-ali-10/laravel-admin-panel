<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\BuyerController;

use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\LoginController;

Route::get('/', function () {
    return view('welcome');
});





Route::prefix('admin')->name('admin.')->group(function() {
    
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    
    Route::middleware('auth.admin')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
        Route::resource('sellers', SellerController::class);
        Route::resource('purchases', PurchaseController::class);
        Route::resource('sales', SaleController::class);
        Route::resource('buyers', BuyerController::class);

    });
});

