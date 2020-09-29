<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $fillable = [
        'nota_inicio', 
        'nota_fim', 
        'meta', 
        'habito_bom', 
        'habito_ruim', 
        'habilidade', 
        'status', 
        'area', 
        'objetivo_total', 
        'data_criacao',
    ];
    public $timestamps = false;

    public function usuario(){
        return $this->belongsToMany(User::class);
    }

    public function tarefas() {
        return $this->hasMany(Tarefa::class);
    }
}
