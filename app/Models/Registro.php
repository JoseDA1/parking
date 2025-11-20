<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bahia;
use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Salida;


class Registro extends Model
{
    //
    use HasFactory;
    protected $table = 'registros';
    protected $primaryKey='id';
    protected $fillable = [
        'bahias_id',
        'vehiculos_id',
        'clientes_id',
        'fecha_ingreso',
        'estado',
        'registradoPor',
    ];
    public function bahias(){
        return $this->belongsTo(Bahia::class);
    }
    public function clientes(){
        return $this->belongsTo(Cliente::class);
    }
    public function vehiculos(){
        return $this->belongsTo(Vehiculo::class);
    }
    public function salida(){
        return $this->hasOne(Salida::class, 'registros_id');
    }

}
