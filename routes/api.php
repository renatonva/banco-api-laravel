<?php

use App\Http\Controllers\API\BancosController;
use App\Http\Controllers\API\ContaBancariaController;
use App\Http\Controllers\API\TransferenciaController;
use App\Http\Controllers\API\TipoTransferenciaController;

use Illuminate\Support\Facades\Route;

Route::prefix('contas')->group(function () {
    Route::get('/', [ContaBancariaController::class, 'index']);
    Route::post('/', [ContaBancariaController::class, 'store']);
    Route::get('/{conta}', [ContaBancariaController::class, 'show']);
});

Route::prefix('transferencias')->group(function () {
    Route::get('/', [TransferenciaController::class, 'index']);
    Route::post('/', [TransferenciaController::class, 'store']);
});

Route::prefix('tipo_transferencia')->group(function (){
    Route::get('/', [TipoTransferenciaController::class, 'index']);
    Route::post('/', [TipoTransferenciaController::class, 'store']);
});

Route::prefix('bancos')->group(function () {
    Route::get('/', [BancosController::class, 'index']);
    Route::post('/', [BancosController::class, 'store']);
});