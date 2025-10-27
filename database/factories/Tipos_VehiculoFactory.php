<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tarifa;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tipos_Vehiculo>
 */
class Tipos_VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre' => fake()->name(),
            'tarifas_id' => Tarifa::inRandomOrder()->first()->id,
            'estado' => "1",
            'registradoPor' => "1",
        ];
    }
}
