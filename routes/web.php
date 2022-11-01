<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(WelcomeController::class)->group(function() {
    Route::get('/', 'showWelcomePage')->name('welcome');
});

Route::controller(ProductController::class)->group(function() {
    Route::get('products/{title}-{id}', 'showProduct')->name('products.show');
});

// Auth::routes(['register' => false, 'reset' => false , 'verify' => false]);

Route::auth([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

