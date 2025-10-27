<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bahia;
use App\Models\Vehiculo;
use App\Models\Cliente;
use App\Models\Registro;

class RegistroFactory extends Factory

{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bahias_id' => Bahia::inRandomOrder()->first()->id,
            'vehiculos_id' => Vehiculo::inRandomOrder()->first()->id,
            'clientes_id' => Cliente::inRandomOrder()->first()->id,
            'fecha_ingreso' => fake()->dateTimeBetween('-1 month', 'now'),
            'fecha_salida' => null,
            'estado' => '1',
            'registradoPor' => '1',
        ];
    }
}
