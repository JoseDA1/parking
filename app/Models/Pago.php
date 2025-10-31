<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Metodos_Pago;
use App\Models\Registro;

class Pago extends Model
{
    //
    use HasFactory;
    protected $table = 'pagos';
    protected $primaryKey='id';
    protected $fillable = [
        'registros_id',
        'valor_total',
        'metodos_pago_id',
        'estado',
        'registradoPor'
    ];
    public function metodo_pago(){
        return $this->belongsTo(Metodos_Pago::class);
    }
    public function registros(){
        return $this->hasOne(Registro::class);
    }
}
