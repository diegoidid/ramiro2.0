<?php

namespace Database\Factories;

use App\Models\Power;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PowerFactory extends Factory
{
    protected $model = Power::class;

    public function definition(): array
    {
        return [
            'power' => $this->faker->word(),
            'power_level' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
