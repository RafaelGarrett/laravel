@extends('layout')

@section('title')
    Tarefas diárias - LifeMasters.
@endsection

@section('cabecalho')
    Tarefas diárias - LifeMasters.
@endsection

@section('conteudo')

    @if ($status != 'finalizado')
        <a href="/avaliacao/{{$avalId}}/tarefa/create" class="btn btn-dark mb-2">Criar Novo {{ config('habito') }}</a>
    @endif

    <ul class="list-group">
        @foreach($tarefas as $tarefa)
            <li class="list-group-item d-flex justify-content-between">
                <div>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><b>Data:</b> {{ $tarefa->dia_hora }}</li>
                        <li class="list-group-item list-group-item-success"><b>Energia início:</b> {{ $tarefa->energia_inicio }}</li>
                        <li class="list-group-item list-group-item-primary">
                            <b>Objetivos do dia:</b>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-light"><b>Meta:</b> {{ $tarefa->objetivo_meta }}</li>
                                <li class="list-group-item list-group-item-light"><b>Hábito bom:</b> {{ $tarefa->objetivo_habito_bom }}</li>
                                <li class="list-group-item list-group-item-light"><b>Hábito ruim:</b> {{ $tarefa->objetivo_habito_ruim }}</li>
                                <li class="list-group-item list-group-item-light"><b>Habilidade:</b> {{ $tarefa->objetivo_habilidade }}</li>
                            </ul>
                        </li>
                        <li class="list-group-item list-group-item-success"><b>Energia término:</b> {{ $tarefa->energia_fim }}</li>
                        <li class="list-group-item list-group-item-warning"><b>Objetivos alcançados:</b> {{ $tarefa->objetivos_obtidos }}/4</li>
                    </ul>
                </div>
                @if ($tarefa->energia_fim == 0)
                    <span class="d-flex align-items-center">
                        <a href="/avaliacao/{{$avalId}}/tarefa/{{$tarefa->id}}/edit" class="btn btn-warning btn-sm mr-2">Editar</a>
                    </span>
                @endif
            </li>
        @endforeach
    </ul>
@endsection