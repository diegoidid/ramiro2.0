<?php

use App\Http\Controllers\PlanetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/planet', [PlanetController::class, 'store']);

