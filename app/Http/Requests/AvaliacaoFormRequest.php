<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvaliacaoFormRequest extends FormRequest
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
            'area' => 'required',
            'nota_inicio' => 'required',
            'meta' => 'required|min:10',
            'habito_bom' => 'required|min:10',
            'habito_ruim' => 'required|min:10',
            'habilidade' => 'required|min:3',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute é obrigatório!',
            'meta.min' => 'O campo "meta" deve descrever qual é a sua meta ao final dos 21 dias.',
            'habito_bom.min' => 'O campo "hábito bom" deve descrever um hábito bom que gostaria ou tem e considera bom.',
            'habito_ruim.min' => 'O campo "hábito ruim" deve descrever um hábito ruim que quer evitar ou tem e quer melhorar.',
            'habilidade.min' => 'O campo "habilidade" deve descrever uma habilidade que tem ou gostaria de ter.'
        ];
    }
}
