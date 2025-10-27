<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodos_Pago extends Model
{
    //
    use HasFactory;
    protected $table = 'metodos_pagos';
    protected $primaryKey='id';
    protected $fillable = [
        'nombre',
        'estado',
        'registradoPor',
    ];
    public function pagos(){
        return $this->hasMany(Pago::class, 'metodos_pago_id');
    }
}
