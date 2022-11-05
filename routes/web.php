<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;


Route::controller(WelcomeController::class)->group(function() {
    Route::get('/', 'showWelcomePage')->name('welcome');
});

Route::controller(LoginController::class)->group(function() {
    Route::get('authorization', 'authorization')->name('authorization');
});

Route::controller(ProductController::class)->group(function() {
    Route::get('products/{title}-{id}', 'showProduct')->name('products.show');
    Route::get('products/{title}-{id}/purchase', 'purchaseProduct')->name('products.purchase');
    Route::get('products/publish', 'showPublishProductForm')->name('products.publish');
    Route::post('products/publish', 'publishProduct');
});    

Route::controller(CategoryProductController::class)->group(function() {
    Route::get('categories/{title}-{id}/products', 'showProducts')->name('categories.products.show');
});


Route::auth([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::controller(HomeController::class)->group(function() {  
    Route::get('/home', 'index')->name('home');
    Route::get('/home/purchases', 'showPurchases')->name('purchases');
    Route::get('/home/products', 'showProducts')->name('products');
});
