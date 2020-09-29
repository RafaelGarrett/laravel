<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|min:11',
            'password' => 'required|min:6'
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute é obrigatório!',
            'name.min' => 'Favor inserir o nome completo.',
            'email.min' => 'E-mail inválido!',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres.'
        ];
    }
}
