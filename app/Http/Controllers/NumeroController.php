<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumeroRequest;
use App\Http\Resources\NumeroResource;
use App\Models\Numero;
use Illuminate\Support\Facades\Http;

class NumeroController extends Controller
{
    public function index()
    {
        return NumeroResource::collection(Numero::all());
    }

    public function store(NumeroRequest $request)
    {
        $numero = Numero::create([
            'numero' => $request->numero
        ]);
        sleep(1);
        $n = $numero->numero + 1;
        Http::post('https://oma-filterable-atomistically.ngrok-free.dev/api/number', [
            'number' => $n
        ]);
    }

    public function show(Numero $numero)
    {
        return new NumeroResource($numero);
    }

    public function update(NumeroRequest $request, Numero $numero)
    {
        $numero->update($request->validated());

        return new NumeroResource($numero);
    }

    public function destroy(Numero $numero)
    {
        $numero->delete();

        return response()->json();
    }
}
