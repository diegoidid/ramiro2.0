<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hero;
use App\Models\Image;
use App\Http\Requests\HeroRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;


class HeroController extends Controller
{

public function store(HeroRequest $request) {
    $hero = Hero::create($request->validated());

    $hero->images()->create(['url' => $request->image_url]);

    Http::post('ngrokdepelon', [
      'name' => 'initial power',
      'powerable_id' => $hero->id,
    'powerable_type' => 'hero'
    ]); 

    return response()->json(['message' => 'Hero created successfully', 'hero' => $hero], 201);
}



}
