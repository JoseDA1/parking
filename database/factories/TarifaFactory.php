<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarifa>
 */
class TarifaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'valor_hora' => fake()->randomFloat(2, 1000, 10000),
            'valor_parcial' => fake()->randomFloat(2, 1000, 10000),
            'valor_dia' => fake()->randomFloat(2, 1000, 10000),
            'valor_mensuales' => fake()->randomFloat(2, 1000, 10000),
            'estado' => '1',
            'registradoPor' => '1',
        ];
    }
}
