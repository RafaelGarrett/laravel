<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaFormRequest extends FormRequest
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
            'dia_hora' => 'required',
            'energia_inicio' => 'required|max:4|min:1',
            'objetivo_meta' => 'required|min:10',
            'objetivo_habito_bom' => 'required|min:10',
            'objetivo_habito_ruim' => 'required|min:10',
            'objetivo_habilidade' => 'required|min:3',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute é obrigatório!',
            'energia_inicio.max' => 'O campo "energia no ínicio" não pode ser maior que 4.',
            'energia_inicio.min' => 'O campo "energia no ínicio" não pode ser menor que 1.',
            'objetivo_meta.min' => 'O campo "meta" deve descrever qual é a sua meta ao final dos 21 dias.',
            'objetivo_habito_bom.min' => 'O campo "objetivo hábito bom" deve descrever um objetivo a fim de manter o hábito bom .',
            'objetivo_habito_ruim.min' => 'O campo "objetivo hábito ruim" deve descrever um objetivo a fim de minimizar/erradicar o hábito ruim.',
            'objetivo_habilidade.min' => 'O campo "objetivo habilidade" deve descrever um objetivo a fim de manter sua habilidade.'
        ];
    }

}
