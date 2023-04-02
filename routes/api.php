<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MoblixController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\Wooba\DetalhesdeFamiliaController;
use App\Http\Controllers\Wooba\DisponibilidadeController;
use App\Http\Controllers\Wooba\DisponibilidadeMultiplaController;
use App\Http\Controllers\Wooba\RegraDaTarifaController;
use App\Http\Controllers\Wooba\ReservarController;
use App\Http\Controllers\Wooba\TarifarController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('verify-email', [AuthController::class, 'verifyEmail']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);


    Route::prefix('passengers')->group(function () {
        Route::apiResource('/', PassengerController::class)->except(['show', 'update', 'destroy']);
        Route::post('edit/{id}', [PassengerController::class, 'updatePassenger']);
        Route::post('delete/{id}', [PassengerController::class, 'deletePassenger']);
        Route::get('list-by-user', [PassengerController::class, 'getByIdUser']);
    });

    Route::prefix('moblix')->group(function () {
        Route::post('query', [MoblixController::class, 'queryFlight']);
        Route::post('search-hotel', [MoblixController::class, 'hotelAutoComplete']);
        Route::post('hotel-available', [MoblixController::class, 'hotelAvailable']);
        Route::post('hotel-information', [MoblixController::class, 'hotelInformation']);
    });

    Route::prefix('wooba')->group(function () {
        Route::post('query', [DisponibilidadeController::class, 'disponibilidade']);
        Route::post('multiplos-trechos', [DisponibilidadeMultiplaController::class, 'disponibilidadeMultipla']);
        Route::post('family-details', [DetalhesdeFamiliaController::class, 'detalhesDeFamilia']);
        Route::post('tarifar', [TarifarController::class, 'tarifar']);
        Route::post('obter-regra-tarifa', [RegraDaTarifaController::class, 'obterRegraDaTarifa']);
        Route::post('reservar', [ReservarController::class, 'reservar']);
    });

    Route::get('search-keyword/{keyword}', [MoblixController::class, 'searchByIatabyCityAndAirport']);
    Route::get('find-travel/{Id}', [DisponibilidadeController::class, 'findViagenRedis']);
});
