<?php

namespace Database\Factories;

use App\Models\Numero;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class NumeroFactory extends Factory
{
    protected $model = Numero::class;

    public function definition(): array
    {
        return [
            'numero' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
