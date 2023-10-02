<?php

use App\Http\Controllers\AsaasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ExternalApiController;
use App\Http\Controllers\Moblix\GravarController;
use App\Http\Controllers\Moblix\ListarController;
use App\Http\Controllers\Moblix\MoblixController;
use App\Http\Controllers\Moblix\PessoaFisicaController;
use App\Http\Controllers\Moblix\SearchFlightController;
use App\Http\Controllers\PagarmeController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\VooController;
use App\Http\Controllers\Wooba\DetalhesdeFamiliaController;
use App\Http\Controllers\Wooba\DisponibilidadeController;
use App\Http\Controllers\Wooba\DisponibilidadeMultiplaController;
use App\Http\Controllers\Wooba\RegraDaTarifaController;
use App\Http\Controllers\Wooba\ReservarController;
use App\Http\Controllers\Wooba\TarifarController;
use App\Http\Controllers\ZapsignController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('verify-email', [AuthController::class, 'verifyEmail']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::prefix('passengers')->group(function () {
        Route::apiResource('/', PassengerController::class)->except(['show', 'update', 'destroy']);
        Route::post('edit/{id}', [PassengerController::class, 'updatePassenger']);
        Route::post('delete/{id}', [PassengerController::class, 'deletePassenger']);
        Route::get('list-by-user', [PassengerController::class, 'getByIdUser']);
    });

    Route::prefix('voo')->group(function () {
        Route::post('round-trip', [VooController::class, 'roundTrip']);
        Route::post('one-way');
    });

    Route::prefix('moblix')->group(function () {
        Route::post('gravar', [GravarController::class, 'gravar'])->middleware('auth');
        Route::post('listar', [ListarController::class, 'listar']);
        Route::post('gravar-pessoa', [PessoaFisicaController::class, 'gravar'])->middleware('auth');
        Route::post('get-pessoa', [PessoaFisicaController::class, 'getPessoa']);
        Route::get('detalhes-pedido/{order}', [GravarController::class, 'detalhesPedido'])->middleware('auth');
    });

    Route::prefix('payment')->group(function () {
        Route::post('assas/{type}', [AsaasController::class, 'newCharge'])->middleware('auth');

        Route::prefix('pagarme')->group(function () {
            Route::post('transaction', [PagarmeController::class, 'transaction'])->middleware('auth');
            Route::get('transactions', [PagarmeController::class, 'allTransactions'])->middleware('auth');
        });
    });

    Route::prefix('booking')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->middleware('auth');
    });

    Route::prefix('zapsign')->group(function () {
        Route::post('batch', [ZapsignController::class, 'batchSignAPI']);
    });

    Route::prefix('email')->group(function () {
        Route::post('transfer', [SendEmailController::class, 'transfer'])->middleware('auth');
    });

    Route::prefix('external')->group(function () {
        Route::get('widget/{cep}', [ExternalApiController::class, 'getDataWidget']);
    });

    /*  Route::prefix('moblix')->group(function () {
        Route::post('query', [SearchFlightController::class, 'queryFlight']);
        Route::post('search-hotel', [MoblixController::class, 'hotelAutoComplete']);
        Route::post('hotel-available', [MoblixController::class, 'hotelAvailable']);
        Route::post('hotel-information', [MoblixController::class, 'hotelInformation']);
    });
 */
    /*  Route::prefix('wooba')->group(function () {
        Route::post('query', [DisponibilidadeController::class, 'disponibilidade']);
        Route::post('multiplos-trechos', [DisponibilidadeMultiplaController::class, 'disponibilidadeMultipla']);
        Route::post('family-details', [DetalhesdeFamiliaController::class, 'detalhesDeFamilia']);
        Route::post('tarifar', [TarifarController::class, 'tarifar']);
        Route::post('obter-regra-tarifa', [RegraDaTarifaController::class, 'obterRegraDaTarifa']);
        Route::post('reservar', [ReservarController::class, 'reservar']);
    });
 */
    Route::get('search-keyword/{keyword}', [MoblixController::class, 'searchByIatabyCityAndAirport']);
    Route::get('find-travel/{Id}', [DisponibilidadeController::class, 'findViagenRedis']);
});
