<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tipos_DocumentoRequest extends FormRequest
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
    public function rules(): array{
        //  
        if(request()->isMethod('post')){
            return[
                'nombre' => 'required|unique:tipos_documentos|string|max:255|regex:/^[\pL\s]+$/u',
                'abreviatura' => 'required|unique:tipos_documentos|string|max:255|alpha',
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        } elseif(request()->isMethod('put') || request()->isMethod('patch')){
            return[
                'nombre' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
                'abreviatura' => 'required|string|max:255|alpha',
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        }
    }
}
