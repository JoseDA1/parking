<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BahiaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{
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
                'numero_bahia' => 'required|unique:bahias|string|max:255|regex:/^-?\d+$/',
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        } elseif(request()->isMethod('put') || request()->isMethod('patch')){
            return[
                'numero_bahia' => 'sometimes|required|string|max:255',
                'estado' => 'required',
                'registradoPor' => 'required',
            ];
        }
    }
}
