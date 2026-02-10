<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PowerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'power' => ['required'],
            'power_level' => ['required', 'integer'],
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
