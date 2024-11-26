<?php

use Illuminate\Http\Request;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\CaminhaoController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TransportadoraController;

Route::get('/transportadoras', [TransportadoraController::class, 'getAll']);
Route::get('/transportadoras/{id}', [TransportadoraController::class, 'show']);
Route::post('/transportadoras', [TransportadoraController::class, 'store']);
Route::put('/transportadoras/{id}', [TransportadoraController::class, 'update']);
Route::delete('/transportadoras/{id}', [TransportadoraController::class, 'destroy']);

Route::get('/motoristas', [MotoristaController::class, 'getAll']);
Route::get('/motoristas/{id}', [MotoristaController::class, 'show']);
Route::post('/motoristas', [MotoristaController::class, 'store']);
Route::put('/motoristas/{id}', [MotoristaController::class, 'update']);
Route::delete('/motoristas/{id}', [MotoristaController::class, 'destroy']);

Route::get('/caminhoes', [CaminhaoController::class, 'getAll']);
Route::get('/caminhoes/{id}', [CaminhaoController::class, 'show']);
Route::post('/caminhoes', [CaminhaoController::class, 'store']);
Route::put('/caminhoes/{id}', [CaminhaoController::class, 'update']);
Route::delete('/caminhoes/{id}', [CaminhaoController::class, 'destroy']);



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
;


