@extends('layout')

@section('title')
    Área escolhida - LifeMasters
@endsection

@section('cabecalho')
    Iniciar Trabalhos.
@endsection

@section('conteudo')
    <form method="post" action="/avaliacao">
        @csrf
        <div>
            <label class="ml-2 mr-2" for="area">Área escolhida?</label>
            <select name="area" class="form-control">
                <option value="Corpo e Mente">Corpo e Mente</option>
                <option value="Espiritual e Valores">Espiritual e Valores</option>
                <option value="Relacionamentos">Relacionamentos</option>
                <option value="Carreiras">Carreiras</option>
                <option value="Finanças">Finanças</option>
            </select>

            <label for="nota_inicio" class="ml-2 mr-2">Nota de 0 a 10:</label>
            <input type="number" min="0" max="10" class="form-control" name="nota_inicio" />

            <label class="ml-2 mr-2" for="meta">Meta:</label>
            <input type="text" class="form-control" name="meta" maxlength="250"/>

            <label class="ml-2 mr-2" for="habito_bom">Hábito bom: </label>
            <input type="text" class="form-control" name="habito_bom" maxlength="250"/>

            <label class="ml-2 mr-2" for="habito_ruim">Hábito ruim: </label>
            <input type="text" class="form-control" name="habito_ruim" maxlength="250"/>

            <label class="ml-2 mr-2" for="habilidade">Habilidade: </label>
            <input type="text" class="form-control" name="habilidade" maxlength="250"/>

        </div>
        <button class="btn btn-primary mt-2">Enviar</button>
    </form>
@endsection