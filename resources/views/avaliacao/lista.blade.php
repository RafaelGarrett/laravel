@extends('layout')

@section('title')
    Áreas trabalhadas - LifeMasters
@endsection

@section('cabecalho')
    Áreas trabalhadas - LifeMasters.
@endsection

@if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
@endif

@section('conteudo')
    <a href="/avaliacao/create" class="btn btn-dark mb-2">Criar Novo</a>

    <ul class="list-group">
        @foreach($avaliacoes as $avaliacao)
            <li class="list-group-item justify-content-between">
                <div>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-info"><b>Área:</b> {{ $avaliacao->area }}</li>
                        <li class="list-group-item list-group-item-secondary"><b>Meta:</b> {{ $avaliacao->meta }}</li>
                        @if ($avaliacao->nota_fim != '')
                            <li class="list-group-item list-group-item-light"><b>Nota no início:</b> {{ $avaliacao->nota_inicio }}</li>
                            <li class="list-group-item list-group-item-light"><b>Nota no término:</b> {{ $avaliacao->nota_fim }}</li>
                        @endif
                        @if ($avaliacao->objetivo_total != '')
                            <li class="list-group-item list-group-item-light"><b>Total de objetivos:</b> {{ $avaliacao->objetivo_total }}/84</li>
                        @endif
                        <li class="list-group-item list-group-item-info"><b>Status:</b> {{ $avaliacao->status }}</li>
                    </ul>
                </div>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item list-group-item-primary"><b>meta:</b> {{ $avaliacao->meta }}</li>
                    <li class="list-group-item list-group-item-success"><b>Hábito bom:</b> {{ $avaliacao->habito_bom }}</li>
                    <li class="list-group-item list-group-item-danger"><b>Hábito ruim:</b> {{ $avaliacao->habito_ruim }}</li>
                    <li class="list-group-item list-group-item-warning"><b>Habilidade:</b> {{ $avaliacao->habilidade }}</li>
                </ul>
                @if ($avaliacao->nota_fim != '')
                    <span class="d-flex align-items-center">
                        <a href="/avaliacao/{{$avaliacao->id}}/tarefas" class="btn btn-primary btn-sm">Tarefas</a>
                    </span>
                @else
                    <span class="d-flex align-items-center">
                        <a href="/avaliacao/{{$avaliacao->id}}/edit" class="btn btn-warning btn-sm mr-2">Editar</a>
                        <a href="/avaliacao/{{$avaliacao->id}}/tarefas" class="btn btn-primary btn-sm">Tarefas</a>
                    </span>
                @endif
            </li>
        @endforeach
    </ul>
@endsection