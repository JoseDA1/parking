<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos_Vehiculo extends Model
{
    //
    use HasFactory;
    protected $table = 'tipos_vehiculos';
    protected $primaryKey='id';
    protected $fillable = [
        'nombre',
        'tarifas_id',
        'estado',
        'registradoPor',
    ];
    public function tarifas(){
        return $this->hasOne(Tarifa::class);
    }
    public function vehiculos(){
        return $this->hasMany(Vehiculo::class, 'tipos_vehiculos_id');
    }
}
