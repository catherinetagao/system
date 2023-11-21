<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getProducts', [ApiController::class, 'getProducts']);

Route::post('/product/create',[ApiController::class, 'createProduct']);

Route::get('/product/delete/{id}',[ApiController::class, 'deleteProduct']);

Route::get('/getProduct/{id}', [ApiController::class, 'getProduct']);

Route::post('/product/update/{id}',[ApiController::class, 'updateProduct']);

Route::post('/login',[LoginController::class, 'login']);

Route::post('/logout',[LoginController::class, 'logout']);

Route::post('/register',[LoginController::class, 'register']);