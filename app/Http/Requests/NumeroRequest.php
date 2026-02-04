<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NumeroRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'numero' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
