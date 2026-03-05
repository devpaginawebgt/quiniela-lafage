<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_type_id' => ['required', 'integer', 'exists:user_types,id'],
            'identity'     => ['required', 'string', 'min:2', 'max:20'],
            'password'     => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'user_type_id.required' => 'El tipo de usuario es incorrecto.',
            'user_type_id.integer'  => 'El tipo de usuario es incorrecto.',
            'user_type_id.exists'   => 'No se encontró el tipo de usuario.',

            'identity.required' => 'Ingrese su número de documento o colegiado.',
            'identity.string'   => 'El número de documento o colegiado no es válido.',
            'identity.min'      => 'El número de documento o colegiado debe contener como mínimo 2 caracteres.',
            'identity.max'      => 'El número de documento o colegiado debe contener como máximo 20 caracteres.',

            'password.required' => 'Por favor llene el campo contraseña.',
            'password.string'   => 'La contraseña debe contener texto.',
        ];   
    }
}
