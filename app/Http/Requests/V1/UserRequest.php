<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'identificacion' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El campo nombre debe tener al menos 6 caracteres',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email debe ser un email válido',
            'email.unique' => 'El email ya se encuentra registrado',
            'password.required' => 'El campo password es requerido',
            'password.min' => 'El campo password debe tener al menos 6 caracteres',
        ];
    }
}
