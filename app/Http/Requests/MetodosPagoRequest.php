<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MetodosPagoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $metodoId = $this->route('metodospago'); 

        if (request()->isMethod('post')) {
            return [
                'nombre' => 'required|unique:metodos_pago|string|max:100',
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        } elseif (request()->isMethod('put') || request()->isMethod('patch')) {
            return [
                'nombre' => [
                    'sometimes', 
                    'required', 
                    'string', 
                    'max:100',
                    Rule::unique('metodos_pago', 'nombre')->ignore($metodoId),
                ],
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        }
        return [];
    }
}