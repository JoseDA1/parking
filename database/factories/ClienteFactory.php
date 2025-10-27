<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;
use App\Models\Tipos_Documento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipos_documentos_id' => Tipos_Documento::inRandomOrder()->first()->id,
            'nombre' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'documento' => fake()->unique()->numberBetween(1000000,9999999999),
            'telefono' => fake()->phoneNumber(),
            'direccion' => fake()->address(),
            'estado' => '1',
            'registradoPor' => '1',
        ];
    }
}
