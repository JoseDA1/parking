<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pago;
use App\Models\Registro;

class Salida extends Model
{
    /** @use HasFactory<\Database\Factories\SalidaFactory> */
    use HasFactory;
    protected $table = 'salidas';
    protected $primaryKey='id';
    protected $fillable = [
        'registros_id',
        'fecha_salida',
        'estado',
        'registradoPor',
    ];
    
    public function pago(){
        return $this->hasOne(Pago::class, 'salidas_id');
    }
    public function registro(){
        return $this->belongsTo(Registro::class, 'registros_id', 'id');
    }
}
