<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //
    use HasFactory;
    protected $table = 'vehiculos';
    protected $primaryKey='id';
    protected $fillable = [
        'placa',
        'modelo',
        'marca_id',
        'tipos_vehiculos_id',
        'estado',
        'registradoPor',
    ];
    public function marcas(){
        return $this->belongTo(Marca::class);
    }
    public function tipos_vehiculos(){
        return $this->belongTo(tipos_vehiculos::class);
    }
    public function registros(){
        return $this->hasMany(Ingreso::class, 'vehiculos_id');
    }
}
