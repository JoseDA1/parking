<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipos_Vehiculo;

class Tarifa extends Model
{
    //
    use HasFactory;
    protected $table = 'tarifas';
    protected $primaryKey='id';
    protected $fillable = [
        'valor_hora',
        'valor_parcial',
        'valor_dia',
        'valor_mensuales',
        'estado',
        'registrado_por',
    ];
    public function tipos_vehiculos(){
        return $this->hasMany(Tarifa::class, 'tipos_vehiculos_id', 'id');
    }
}
