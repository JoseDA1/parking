<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tipos_Documento;
use App\Models\Cliente;
// use App\Models\Metodos_Pago;
use App\Models\Tarifa;
use App\Models\Marca;
use App\Models\Vehiculo;
use App\Models\Registro;
use App\Models\Pago;
use App\Models\Tipos_Vehiculo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Pago::factory(2)->create();


        // Pago::factory()->create(['registros_id' => 1, 'valor_total' => 10000, 'metodos_pago_id' => 1]);
        // Tipos_Vehiculo::factory()->create(['nombre' => 'Moto', 'tarifas_id' => 1]);
    }
}
