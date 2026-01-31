<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'planet' => 'required',
            'color' => 'required',
            'planet_url' => 'required',
            'hero_id' => 'required'
        ];
    }
    
    
    public function authorize(): bool
    {
        return true;
    }
}
