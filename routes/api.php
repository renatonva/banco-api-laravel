<?php

use App\Http\Controllers\API\ContaBancariaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ContaController;
use App\Http\Controllers\Api\TransferenciaController;

Route::prefix('contas')->group(function () {
    Route::get('/', [ContaBancariaController::class, 'index']);
    Route::post('/', [ContaBancariaController::class, 'store']);
    Route::get('/{conta}', [ContaBancariaController::class, 'show']);
});

Route::prefix('transferencias')->group(function () {
    Route::get('/', [TransferenciaController::class, 'index']);
    Route::post('/', [TransferenciaController::class, 'store']);
});