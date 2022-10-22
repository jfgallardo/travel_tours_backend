<?php

use App\Http\Controllers\AeroportoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MoblixController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('verify-email', [AuthController::class, 'verifyEmail']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);

    Route::prefix('moblix')->group(function () {
        Route::post('query', [MoblixController::class, 'queryFlight']);
    });

    Route::get('search-keyword/{keyword}', [AeroportoController::class, 'searchByIatabyCityAndAirport']);
});
