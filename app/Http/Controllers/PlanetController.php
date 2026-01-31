<?php

namespace App\Http\Controllers;

use App\PlanetResponse;
use App\Http\Requests\PlanetRequest;
use App\Models\Planet;
use App\Models\Image;
use Illuminate\Http\Request;

class PlanetController extends Controller
{
    use PlanetResponse;

    public function store(PlanetRequest $request)
    {
        $planet = Planet::create([
            'planet' => $request->planet,
            'color' => $request->color,
            'hero_id' => $request->hero_id,
        ]);
        

        $planet->images()->create([
            'planet_url' => $request->planet_url
        ]);

        return $this->planetResponse(
            $planet,
            'Se ha agregado el planeta y la imagen',
            201
        );
        
    }

    public function index()
    {
        return response()->json([
            'message' => 'Endpoint activo, pero usa POST para crear planetas'
        ], 200);
    }
    

}
