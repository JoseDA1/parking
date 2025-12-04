<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalidaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // El campo 'fecha_salida' es generado en el controlador, por lo que no se requiere aquí.
        // Solo validamos el ID del registro al que corresponde la salida.
        return [
            'registro' => 'required|numeric|exists:registros,id', 
            'estado' => 'required', 
            'registradoPor' => 'required',
        ];
    }
}