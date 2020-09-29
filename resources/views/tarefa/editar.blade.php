@extends('layout')

@section('title')
    Tarefas do dia - LifeMasters
@endsection

@section('cabecalho')
    Tarefas no fim do dia - LifeMasters.
@endsection

@section('conteudo')
    <form method="post" action="/avaliacao/{{$avalId}}/tarefa/{{$tarefa->id}}">
        @csrf
        @method('PUT')
        <div>
            <label for="energia_fim" class="mr-2">Energia no fim do dia:</label>
            <input type="number" min="1" max="4" class="form-control" name="energia_fim" />

            <label class="mr-2" for="objetivo_meta">Ajustar objetivo do dia para atingir sua Meta:</label>
            <input type="text" class="form-control" name="objetivo_meta" maxlength="250" value="{{$tarefa->objetivo_meta}}"/>

            <label class="mr-2" for="objetivo_habito_bom">Ajustar objetivo do dia para manter/melhorar seu hábito bom: </label>
            <input type="text" class="form-control" name="objetivo_habito_bom" maxlength="250" value="{{$tarefa->objetivo_habito_bom}}"/>

            <label class="mr-2" for="objetivo_habito_ruim">Ajustar objetivo do dia para erradicar seu hábito ruim: </label>
            <input type="text" class="form-control" name="objetivo_habito_ruim" maxlength="250" value="{{$tarefa->objetivo_habito_ruim}}"/>

            <label class="mr-2" for="objetivo_habilidade">Ajustar objetivo do dia para criar/manter/melhorar sua habilidade: </label>
            <input type="text" class="form-control" name="objetivo_habilidade" maxlength="250" value="{{$tarefa->objetivo_habilidade}}"/>

            <label for="objetivos_obtidos" class="mr-2">Dos objetivos (4), quantos conseguiu atingir?</label>
            <input type="number" min="0" max="4" class="form-control" name="objetivos_obtidos" />

        </div>
        <button class="btn btn-primary mt-2">Enviar</button>
    </form>
@endsection