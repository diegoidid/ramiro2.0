<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'image_url' => 'required|url',
            'power' => 'required|string|max:255',
            'power_level' => 'sometimes|integer|min:0',
            'power_image_url' => 'sometimes|url',
            'planet' => 'sometimes|string|max:255',
            'color' => 'sometimes|string|max:255',
            'planet_url' => 'sometimes|url',
        ];
    }

    public function messages(): array
    {
        return [ 
            'name.required' => 'The name is required',
            'age.required' => 'The age is required',
            'image_url.required' => 'The image URL is required',
            'image_url.url' => 'The image URL must be a valid URL'

        ];
    }
}
