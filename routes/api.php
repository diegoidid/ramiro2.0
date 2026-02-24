<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NumeroController;
use App\Http\Controllers\PowerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Login SIN autenticación
Route::post('/login', [AuthController::class, 'login']);
Route::post('/numero',[ NumeroController::class,'crear']);

// Rutas protegidas con token
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/power', PowerController::class);
    Route::get('power/show/{hero_id}', [PowerController::class, 'search']);


});
