<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumeroRequest;
use App\Http\Resources\NumeroResource;
use App\Models\Numero;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class NumeroController extends Controller
{
    public function index()
    {
        return NumeroResource::collection(Numero::all());
    }

    public function crear(Request $request)
    {
        $numero =Numero::create([
            'numero'=>$request->numero
        ]);
        $n = $numero->numero + 1;
        Http::withOptions(["verify"=>false])->post('https://waterworn-contentiously-gilberto.ngrok-free.dev/api/numero', [

            'numero'=> $n,
        ]);}


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
