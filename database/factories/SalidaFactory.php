<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Registro;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalidaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registros_id' => Registro::inRandomOrder()->first()->id,
            'fecha_salida' => fake()->dateTimeBetween('-1 month', 'now'),
            'estado' => '1',
            'registradoPor' => '1',
        ];
    }
}
