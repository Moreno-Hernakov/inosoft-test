<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\transaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    // auth
    Route::get('/data', [AuthController::class, 'data']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/refresh', [AuthController::class, 'refresh']);

    Route::prefix('kendaraan')->group(function () {
        Route::get('/index', [KendaraanController::class, 'index']);
        Route::post('/store', [KendaraanController::class, 'store']);
        Route::get('/show/{id}', [KendaraanController::class, 'show']);
        Route::put('/update', [KendaraanController::class, 'update']);
        Route::delete('/destroy/{id}', [KendaraanController::class, 'destroy']);
    });

    Route::prefix('mobil')->group(function () {
        Route::get('/index', [MobilController::class, 'index']);
        Route::post('/store', [MobilController::class, 'store']);
        Route::get('/show/{id}', [MobilController::class, 'show']);
        Route::put('/update', [MobilController::class, 'update']);
        Route::delete('/destroy/{id}', [MobilController::class, 'destroy']);
    });

    Route::prefix('motor')->group(function () {
        Route::get('/index', [MotorController::class, 'index']);
        Route::post('/store', [MotorController::class, 'store']);
        Route::get('/show/{id}', [MotorController::class, 'show']);
        Route::put('/update', [MotorController::class, 'update']);
        Route::delete('/destroy/{id}', [MotorController::class, 'destroy']);
    });

    Route::prefix('trans')->group(function () {
        Route::get('/index', [TransaksiController::class, 'index']);
        Route::post('/store', [TransaksiController::class, 'store']);
        Route::get('/show/{id}', [TransaksiController::class, 'show']);
        Route::put('/update', [TransaksiController::class, 'update']);
        Route::delete('/destroy/{id}', [TransaksiController::class, 'destroy']);
    });
});
