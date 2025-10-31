<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cliente;


class Tipos_Documento extends Model
{
    //
    use HasFactory;
    protected $table = 'tipos_documentos';
    protected $primaryKey='id';
    protected $fillable = [
        'nombre',
        'abreviatura',
        'estado',
        'registradoPor',
    ];
    public function cliente(){
        return $this->hasMany(Cliente::class, 'tipo_documento_id');
    }
}
