<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Marca;
use App\Models\Tipos_Vehiculo;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculo>
 */
class VehiculoFactory extends Factory
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
            'placa' => strtoupper(fake()->bothify('???-###')),
            'modelo' => fake()->year(),
            'marca_id' => Marca::inRandomOrder()->first()->id,
            'tipos_vehiculos_id' => Tipos_Vehiculo::inRandomOrder()->first()->id,
            'estado' => '1',
            'registradoPor' => '1',
        ];
    }
}
