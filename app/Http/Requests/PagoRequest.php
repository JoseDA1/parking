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
            'metodos_pagos_id' => 'required|numeric|exists:metodos_pago,id',
            'clientes_id' => 'required|numeric|exists:clientes,id',
            'estado' => 'required',
            'registradoPor' => 'required',
        ];
    }
}