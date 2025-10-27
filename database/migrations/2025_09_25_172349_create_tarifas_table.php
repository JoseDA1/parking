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
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();
            $table->double('valor_hora', 8, 0); 
            $table->double('valor_parcial', 8, 0); 
            $table->double('valor_dia', 8, 0); 
            $table->double('valor_mensuales', 8, 0); 
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
        Schema::dropIfExists('tarifas');
    }
};
