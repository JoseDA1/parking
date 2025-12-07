<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
        'valor_total' => 'required|numeric|min:0',
        'salidas_id' => 'required|numeric|exists:salidas,id',
        'metodospagos' => 'required|numeric|exists:metodos_pagos,id', 
        'estado' => 'required',
        'registradoPor' => 'required',
    ];
    }
}