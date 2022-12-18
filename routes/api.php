<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MoblixController;
use App\Http\Controllers\WobbaController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('verify-email', [AuthController::class, 'verifyEmail']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);

    Route::prefix('moblix')->group(function () {
        Route::post('query', [MoblixController::class, 'queryFlight']);
        Route::post('search-hotel', [MoblixController::class, 'hotelAutoComplete']);
        Route::post('hotel-available', [MoblixController::class, 'hotelAvailable']);
        Route::post('hotel-information', [MoblixController::class, 'hotelInformation']);

    });

    Route::prefix('wooba')->group(function () {
        Route::post('query', [WobbaController::class, 'disponibilidade']);
    });

    Route::get('search-keyword/{keyword}', [MoblixController::class, 'searchByIatabyCityAndAirport']);
    Route::get('find-travel/{Id}', [WobbaController::class, 'findViagenRedis']);
});
