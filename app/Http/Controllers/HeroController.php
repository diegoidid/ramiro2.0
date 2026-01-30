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


    $data = Http::post('https://untabulable-incomparable-lean.ngrok-free.dev/api/power', [
      'power' => $request->power,
      'hero_id' => $hero->id,
      'power_image_url' => $request->power_image_url ?? null,
      'power_level' => $request->power_level ?? null,
      'planet' => $request->planet ?? null,
      'color' => $request->color ?? null,
      'planet_url' => $request->planet_url ?? null,
    ]); 

  
    return response()->json(['message' => 'Hero created successfully', 'hero' => $hero, 'response' => $data->json()]);
}



}
