<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Se asume true para permitir la validación
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // Se obtiene el ID del vehículo en la ruta para ignorarlo en la validación unique al actualizar
        $vehiculoId = $this->route('vehiculo') ? $this->route('vehiculo')->id : null;

        
        if(request()->isMethod('post')){
            return [
            'placa' => 'required|string|max:10|unique:vehiculos,placa,' . $vehiculoId,
            'marca' => 'required|exists:marcas,id',
            'tipo_vehiculo' => 'required|exists:tipos_vehiculos,id',
            'estado' => 'required',
            'registradoPor' => 'required',
            'modelo' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        } elseif(request()->isMethod('put') || request()->isMethod('patch')){
            return [
                'placa' => 'required|string|max:10|unique:vehiculos,placa,' . $vehiculoId,
                'marca' => '',
                'tipo_vehiculo' => '',
                'estado' => 'required',
                'registradoPor' => 'required',
                'modelo' => 'nullable|string|max:20',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'placa.required' => 'La placa es obligatoria.',
            'placa.unique' => 'La placa ingresada ya existe en el sistema.',
            'placa.max' => 'La placa no debe exceder los 10 caracteres.',
            
            'marca.required' => 'La marca es obligatoria.',
            'marca.exists' => 'La marca seleccionada no es válida.',

            'tipo_vehiculo.required' => 'El tipo de vehículo es obligatorio.',
            'tipo_vehiculo.exists' => 'El tipo de vehículo seleccionado no es válido.',
            
            'estado.required' => 'El estado es obligatorio.',
            'registradoPor.required' => 'El campo registrado por es obligatorio.',

            'modelo.max' => 'El modelo no debe exceder los 20 caracteres.',

            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, svg.',
            'image.max' => 'La imagen no debe pesar más de 2MB.',
        ];
    }
}