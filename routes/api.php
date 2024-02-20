<?php

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
Route::prefix('car')->group(function (){
    Route::get('/', [\App\Http\Controllers\CarController::class, 'index']);
    Route::post('/store', [\App\Http\Controllers\CarController::class, 'store']);
});
Route::prefix('booking')->group(function (){
    Route::get('/', [\App\Http\Controllers\BookingController::class, 'index']);
    Route::post('/store', [\App\Http\Controllers\BookingController::class, 'store']);
});
