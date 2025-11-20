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
        'image',
    ];
    public function marcas(){
        return $this->belongTo(Marca::class);
    }
    public function tipos_vehiculos(){
        return $this->belongsTo(Tipos_Vehiculo::class, 'tipos_vehiculos_id', 'id');
    }
    public function registros(){
        return $this->hasMany(Ingreso::class, 'vehiculos_id');
    }
}
