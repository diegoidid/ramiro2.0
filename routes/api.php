<?php

use App\Http\Controllers\NumeroController;
use App\Http\Controllers\PowerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::apiResource('/power', PowerController::class);
route::get('power/show/{hero_id}',[PowerController::class,'search']);
route::apiresource('/numero',NumeroController::class);
