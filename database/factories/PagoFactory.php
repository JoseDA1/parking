<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pago;
use App\Models\Registro;
use App\Models\Metodos_Pago;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pago>
 */
class PagoFactory extends Factory
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
            // 'registros_id' => Registro::inRandomOrder()->first()->id,
            'valor_total' => fake()->randomFloat(2, 1000, 999999999),
            'metodos_pago_id' => Metodos_Pago::inRandomOrder()->first()->id,
            'estado' => '1',
            'registradoPor' => '1',
        ];
    }
}
