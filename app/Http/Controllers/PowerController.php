<?php

namespace App\Http\Controllers;

use App\Http\Requests\PowerRequest;
use App\Http\Resources\PowerResource;
use App\Models\Power;

class PowerController extends Controller
{
    public function index()
    {
        return PowerResource::collection(Power::all());
    }

    public function store(PowerRequest $request)
    {
        return new PowerResource(Power::create($request->validated()));
    }

    public function show(Power $power)
    {
        return new PowerResource($power);
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
