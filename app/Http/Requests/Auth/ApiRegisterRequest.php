<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ApiRegisterRequest extends FormRequest
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
            'nombres'          => ['required', 'string', 'max:60'],
            'apellidos'        => ['required', 'string', 'max:60'],
            'numero_documento' => ['required', 'integer', 'digits:13', 'unique:users,numero_documento'],
            'email'            => ['required', 'email', 'max:255', 'unique:users'],
            'pais_id'          => ['required', 'integer', 'exists:countries,id'],
            'line_id'          => ['required', 'integer', 'exists:lines,id'],

            'password'         => ['required', 'confirmed', Password::defaults()],

            // 'codigo_id'        => ['required', 'string', 'exists:codigos,name'],
            // 'telefono'         => ['required', 'string', 'max:20'],
            // 'direccion'        => ['required', 'string', 'max:255'],
            // 'company_id'       => ['required', 'integer', 'exists:companies,id'],
            // 'branch_id'        => ['required', 'integer', 'exists:branches,id'],
        ];
    }

    public function messages(): array
    {
        return [
            // NOMBRES
            'nombres.required' => 'Por favor, ingrese su nombre.',
            'nombres.string'   => 'El campo nombres debe contener texto.',
            'nombres.max'      => 'El campo nombres no debe superar los 60 caracteres.',

            // APELLIDOS
            'apellidos.required' => 'Por favor, ingrese su apellido.',
            'apellidos.string'   => 'El campo apellidos debe contener texto.',
            'apellidos.max'      => 'El campo apellidos no debe superar los 60 caracteres.',

            // NUMERO DOCUMENTO
            'numero_documento.required' => 'Por favor, ingrese su Número de Documento.',
            'numero_documento.integer'  => 'El campo número de documento solo debe contener números.',
            'numero_documento.digits'   => 'El número de documento debe contener 13 dígitos.',
            'numero_documento.unique'   => 'Ya existe un usuario registrado con este Número de Documento.',

            // EMAIL
            'email.required' => 'Por favor, ingrese su correo electrónico.',
            'email.email'    => 'Por favor ingrese un correo electrónico válido.',
            'email.max'      => 'El correo electrónico no debe superar los 255 caracteres.',
            'email.unique'   => 'Ya existe un usuario registrado con este correo electrónico.',

            // PAIS
            'pais_id.required' => 'Por favor seleccione su país.',
            'pais_id.integer'  => 'El país seleccionado no es válido.',
            'pais_id.exists'   => 'El país seleccionado no existe en nuestros registros.',

            // LINEA
            'line_id.required' => 'Por favor seleccione la línea de medicamentos en la que participará.',
            'line_id.integer'  => 'La línea seleccionada no es válida.',
            'line_id.exists'   => 'La línea seleccionada no existe en nuestros registros.',


            // TELEFONO
            // 'telefono.required' => 'Por favor, ingrese su número de teléfono.',
            // 'telefono.string'   => 'El teléfono debe contener texto.',
            // 'telefono.max'      => 'El teléfono no debe superar los 20 caracteres.',
            // DIRECCION
            // 'direccion.required' => 'Por favor, ingrese su dirección.',
            // 'direccion.string'   => 'La dirección debe contener texto.',
            // 'direccion.max'      => 'La dirección no debe superar los 255 caracteres.',
            // COMPANY
            // 'company_id.required' => 'Por favor, seleccione la empresa en la cuál labora.',
            // 'company_id.integer'  => 'La empresa seleccionada no es válida.',
            // 'company_id.exists'   => 'La empresa seleccionada no existe en nuestros registros.',
            // BRANCH
            // 'branch_id.required' => 'Por favor, seleccione la sucursal en la cuál labora.',
            // 'branch_id.integer'  => 'La sucursal seleccionada no es válida.',
            // 'branch_id.exists'   => 'La sucursal seleccionada no existe en nuestros registros.',
        ];
    }
}
