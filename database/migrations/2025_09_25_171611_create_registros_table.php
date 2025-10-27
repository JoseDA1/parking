<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bahias_id')->constrained();
            $table->foreignId('vehiculos_id')->constrained();
            $table->foreignId('clientes_id')->constrained();
            $table->datetime('fecha_ingreso');
            $table->datetime('fecha_salida')->nullable();
            $table->string('estado');
            $table->string('registradoPor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
