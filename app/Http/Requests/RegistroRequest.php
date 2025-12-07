<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
        'bahia' => 'required|numeric|exists:bahias,id', 
        'vehiculo' => 'required|numeric|exists:vehiculos,id', 
        'cliente' => 'required|numeric|exists:clientes,id', 
        'estado' => 'required',
        'registradoPor' => 'required',
    ];
    }
}