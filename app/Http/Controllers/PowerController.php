<?php

namespace App\Http\Controllers;

use App\apiResponse;
use App\Http\Requests\PowerRequest;
use App\Http\Resources\PowerResource;
use App\Models\Power;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\returnSelf;
use Illuminate\Support\Facades\DB;

class PowerController extends Controller
{

    use apiResponse;

    public function store(Request $request)
    {
        $power = Power::create([
            'power' => $request->power,
            'power_level' => $request->power_level,
            'hero_id' => $request->hero_id
        ]);
        $power->images()->create([
            'image_url' => $request->power_image_url,
        ]);


      $planetResponse=Http::post('https://waterworn-contentiously-gilberto.ngrok-free.dev/api/planet', [
            'planet'=>$request->planet,
            'color'=>$request->color,
            'hero_id'=>$request->hero_id,
            'planet_url'=>$request->planet_url

    ]);


        $planet = $planetResponse->json();

return $this->apiResponse([
    'power' => new PowerResource($power),
    'planet' => $planet
], "exitoso w", 201);
    }

    public function show(int $hero_id)
    {
        return $this->apiResponse(PowerResource::collection(Power::where('hero_id',$hero_id)->get()),
            "exitoso w",
            201,
            null);

    }

    public function update(PowerRequest $request, Power $power)
    {
        $power->update($request->validated());

        return new PowerResource($power);
    }

    public function destroy(Power $power)
    {
        $power->delete();

        return response()->json();
    }
}
