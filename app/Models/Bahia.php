<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Registro;

class Bahia extends Model
{
    //
    use HasFactory;
    protected $table = 'bahias';
    protected $primaryKey='id';
    protected $fillable = [
        'numero_bahia',
        'estado',
        'registrado_por',
    ];
    public function registros(){
        return $this->hasMany(Registro::class, 'bahias_id');
    }
}
