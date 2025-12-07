<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TiposVehiculoRequest extends FormRequest
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
        $tipoId = $this->route('tipos_vehiculo');

        if (request()->isMethod('post')) {
            return [
                'nombre' => 'required|unique:tipos_vehiculos|string|max:255',
                'tarifa' => 'required|numeric|exists:tarifas,id',
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        } elseif (request()->isMethod('put') || request()->isMethod('patch')) {
            return [
                'nombre' => [
                    'sometimes', 
                    'required', 
                    'string', 
                    'max:255',
                    Rule::unique('tipos_vehiculos', 'nombre')->ignore($tipoId), 
                ],
                'tarifas_id' => 'sometimes|required|numeric|exists:tarifas,id',
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        }
        return [];
    }
}