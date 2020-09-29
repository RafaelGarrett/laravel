<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [
        'dia_hora',
        'energia_inicio',
        'energia_fim',
        'objetivo_meta',
        'objetivo_habito_bom',
        'objetivo_habito_ruim',
        'objetivo_habilidade',
        'objetivos_obtidos',
        'data_criacao'
    ];
    public $timestamps = false;

    public function avaliacao(){
        return $this->belongsToMany(Avaliacao::class);
    }

}
