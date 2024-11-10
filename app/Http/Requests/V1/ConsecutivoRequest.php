<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class ConsecutivoRequest extends FormRequest
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
            'prefijo' => 'required|string|max:10|unique:consecutivo_models,prefijo',
            'descripcion' => 'required|string|max:100',
            'valor_inicial' => 'required|integer',
            'valor_final' => 'required|integer',
            'valor_actual' => 'required|integer',
            'ref1' => 'nullable|string|max:100',
            'ref2' => 'nullable|string|max:100',
            'ref3' => 'nullable|string|max:100',
            'ref4' => 'nullable|string|max:100',
        ];
    }

    public function messages() 
    {
        return [
            'prefijo.required' => 'El prefijo es requerido',
            'prefijo.string' => 'El prefijo debe ser una cadena de texto',
            'prefijo.max' => 'El prefijo no puede ser mayor a 10 caracteres',
            'prefijo.unique' => 'El prefijo ya se encuentra registrado',
            'descripcion.required' => 'La descripción es requerida',
            'descripcion.string' => 'La descripción debe ser una cadena de texto',
            'descripcion.max' => 'La descripción no puede ser mayor a 100 caracteres',
            'valor_inicial.required' => 'El valor inicial es requerido',
            'valor_inicial.integer' => 'El valor inicial debe ser un número entero',
            'valor_final.required' => 'El valor final es requerido',
            'valor_final.integer' => 'El valor final debe ser un número entero',
            'valor_actual.required' => 'El valor actual es requerido',
            'valor_actual.integer' => 'El valor actual debe ser un número entero',
            'ref1.string' => 'La referencia 1 debe ser una cadena de texto',
            'ref1.max' => 'La referencia 1 no puede ser mayor a 100 caracteres',
            'ref2.string' => 'La referencia 2 debe ser una cadena de texto',
            'ref2.max' => 'La referencia 2 no puede ser mayor a 100 caracteres',
            'ref3.string' => 'La referencia 3 debe ser una cadena de texto',
            'ref3.max' => 'La referencia 3 no puede ser mayor a 100 caracteres',
            'ref4.string' => 'La referencia 4 debe ser una cadena de texto',
            'ref4.max' => 'La referencia 4 no puede ser mayor a 100 caracteres',
        ];
    }
}
