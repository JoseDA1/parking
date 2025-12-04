<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
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
        $clienteId = $this->route('cliente');

        if (request()->isMethod('post')) {
            return [
                'nombre' => 'required|string|max:255|regex:/^[\pL\s]+$/u', 
                'documento' => 'required|digits_between:5,50|unique:clientes,documento', 
                'tipos_documentos' => 'required|numeric|exists:tipos_documentos,id', 
                'telefono' => 'required|string|digits_between:5,50', 
                'email' => 'required|string', 
                'direccion' => 'string|max:255', 
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        } elseif (request()->isMethod('put') || request()->isMethod('patch')) {
            return [
                'nombre' => 'sometimes|required|string|max:255|regex:/^[\pL\s]+$/u',
                'documento' => [
                    'required', 
                    'digits_between:5,50',
                    Rule::unique('clientes', 'documento')->ignore($clienteId),
                ],
                'tipos_documentos' => 'sometimes|required|numeric|exists:tipos_documentos,id',
                'telefono' => 'required|string|digits_between:5,50', 
                'email' => 'required|string', 
                'direccion' => 'string|max:255', 
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        }
        return [];
    }
}