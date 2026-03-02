<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ApiLoginRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'exists:users,email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        
        return [
            'email.required' => 'Por favor llene el campo correo electrónico.',
            'email.string' => 'El correo electrónico debe contener texto.',
            'email.email' => 'Por favor ingrese un correo electrónico válido.',
            'email.exists' => 'No encontramos un usuario con esta dirección de correo electrónico.',

            'password.required' => 'Por favor llene el campo contraseña.',
            'password.string' => 'La contraseña debe contener texto.',
        ];
        
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            
            $seconds = RateLimiter::availableIn($this->throttleKey());
    
            $minutes = ceil($seconds / 60);
    
            throw ValidationException::withMessages([
                'email' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => $minutes,
                ]),
            ]);

        }        
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')).'|'.$this->ip();
    }
}
