<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarifaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'valor_hora' => 'required|numeric|min:0',
            'valor_parcial' => 'required|numeric|min:0',
            'valor_dia' => 'required|numeric|min:0',
            'valor_mensuales' => 'required|numeric|min:0',
            'estado' => 'required',
            'registradoPor' => 'required',
        ];
    }
}
