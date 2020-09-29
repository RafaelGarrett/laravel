@extends('layout')

@section('title')
    Tarefas do dia - LifeMasters
@endsection

@section('cabecalho')
    Tarefas do dia.
@endsection

@section('conteudo')
    <form method="post" action="/avaliacao/{{$avalId}}/tarefa">
        @csrf
        <div>
            <label class="mr-2" for="dia_hora">Data e hora (que acordou):</label>
            <input type="datetime-local" class="form-control" name="dia_hora" />

            <label for="energia_inicio" class="mr-2">Energia início:</label>
            <input type="number" min="1" max="4" class="form-control" name="energia_inicio" />

            <label class="mr-2" for="objetivo_meta">Objetivo do dia para atingir sua Meta:</label>
            <input type="text" class="form-control" name="objetivo_meta" maxlength="250"/>

            <label class="mr-2" for="objetivo_habito_bom">Objetivo do dia para atingir manter/melhorar seu hábito bom: </label>
            <input type="text" class="form-control" name="objetivo_habito_bom" maxlength="250"/>

            <label class="mr-2" for="objetivo_habito_ruim">Objetivo do dia para atingir erradicar seu hábito ruim: </label>
            <input type="text" class="form-control" name="objetivo_habito_ruim" maxlength="250"/>

            <label class="mr-2" for="objetivo_habilidade">Objetivo do dia para atingir criar/manter/melhorar sua habilidade: </label>
            <input type="text" class="form-control" name="objetivo_habilidade" maxlength="250"/>

        </div>
        <button class="btn btn-primary mt-2">Enviar</button>
    </form>
@endsection