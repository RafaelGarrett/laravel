@extends('layout')

@section('title')
    Ajustes - Área escolhida - LifeMasters
@endsection

@section('cabecalho')
    Alinhar objetivos - LifeMasters.
@endsection

@section('conteudo')
    <form method="post" action="/avaliacao/{{ $avaliacao->id }}">
        @csrf
        @method('PUT')
        <div>
            <label class="ml-2 mr-2" for="meta">Deseja ajustar sua Meta?</label>
            <input type="text" class="form-control" name="meta" maxlength="250" value="{{ $avaliacao->meta }}"/>

            <label class="ml-2 mr-2" for="habito_bom">Hábito bom: </label>
            <input type="text" class="form-control" name="habito_bom" maxlength="250" value="{{ $avaliacao->habito_bom }}"/>

            <label class="ml-2 mr-2" for="habito_ruim">Hábito ruim: </label>
            <input type="text" class="form-control" name="habito_ruim" maxlength="250" value="{{ $avaliacao->habito_ruim }}"/>

            <label class="ml-2 mr-2" for="habilidade">Habilidade: </label>
            <input type="text" class="form-control" name="habilidade" maxlength="250" value="{{ $avaliacao->habilidade }}"/>

            <label for="nota_fim" class="mr-2">Nota de 0 a 10:</label>
            <input type="number" min="0" max="10" class="form-control" name="nota_fim" />

        </div>
        <button class="btn btn-primary mt-2">Enviar</button>
    </form>
@endsection