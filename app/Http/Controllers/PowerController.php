<?php

namespace App\Http\Controllers;

use App\apiResponse;
use App\Http\Requests\PowerRequest;
use App\Http\Resources\PowerResource;
use App\Models\Power;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class PowerController extends Controller
{

    use apiResponse;


    public function store(PowerRequest $request)
    {
        $power = Power::create([
            'power' => $request->power,
            'power_level' => $request->power_level,
            'hero_id' => $request->hero_id
        ]);
        $power->images()->create([
            'image_url' => $request->power_image_url,
        ]);
        $autresponse = Http::withoutVerifying()->post(
            'https://waterworn-contentiously-gilberto.ngrok-free.dev/api/login',
            [
                'email' => 'diego@example.com',
                'password' => 'password123'
            ]
        );
        if (!$autresponse->successful()) {
            return $this->errorResponse("Authentication failed", 401);
        }
        $heroToken = $autresponse->json('data.token');
        $planetResponse = Http::withoutVerifying()
            ->withToken($heroToken)
            ->withHeaders(['Accept' => 'application/json'])
            ->post(
                'https://waterworn-contentiously-gilberto.ngrok-free.dev/api/planet',
                [
                    'planet' => $request->planet,
                    'color' => $request->color,
                    'hero_id' => $request->hero_id,
                    'planet_url' => $request->planet_url
                ]
            );
        $planet = $planetResponse->json();
        return $this->apiResponse([
            'power' => new PowerResource($power),
            'planet' => $planet
        ], "exitoso w", 201);
    }

    public function search(int $hero_id)
    {
        $power = Power::with('images')->where('hero_id', $hero_id)->first();
        if (!$power) {
            return response()->json([
                'message' => 'Hero not found'
            ], 404);
        }
        $planetresponse = Http::get("https://waterworn-contentiously-gilberto.ngrok-free.dev/api/planet/$power->hero_id");
        $planetsuccesful = $planetresponse->successful()
            ? $planetresponse->json()['data'] ?? null
            : null;
        return $this->apiResponse([
            'power' => new PowerResource($power),
            'planet' => $planetsuccesful
        ],
            "exitoso w",
            200,
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
