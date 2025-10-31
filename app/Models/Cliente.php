<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipos_Documento;


class Cliente extends Model
{
    //
    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey='id';
    protected $fillable = [
        'tipos_documentos_id',
        'nombre',
        'documento',
        'direccion',
        'telefono',
        'email',
        'estado',
        'registradoPor',
    ];
    public function tipos_documentos(){
        return $this->belongsTo(Tipos_Documento::class);
    }
}
