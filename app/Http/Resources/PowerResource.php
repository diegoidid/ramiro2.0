<?php

namespace App\Http\Resources;

use App\Models\Power;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Power */
class PowerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'power' => $this->power,
            'power_level' => $this->power_level,


        ];
    }
}
