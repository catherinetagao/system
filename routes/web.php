<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contacts', [ContactController::class, 'index']);

// Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/crud', [CrudController::class, 'index'])->name('crud');

Route::get('/products', [ProductController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/store', [StoreController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);






