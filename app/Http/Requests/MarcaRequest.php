<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MarcaRequest extends FormRequest
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
        $marcaId = $this->route('marca');

        if(request()->isMethod('post')){
            return[
                'nombre' => 'required|unique:marcas|string|max:255|regex:/^[\pL\s]+$/u',
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        } elseif(request()->isMethod('put') || request()->isMethod('patch')){
            return[
                'nombre' => [
                    'sometimes', 
                    'required', 
                    'string', 
                    'max:255',
                    'regex:/^[\pL\s]+$/u',
                    Rule::unique('marcas', 'nombre')->ignore($marcaId),
                ],
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        }
        return [];
    }
}