<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @auth
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
            <a class="navbar navbar-expand-lg" href="{{ route('listar_avaliacao') }}">Home</a>
            <a href="/logout" class="text-danger">Sair</a>
            <form method="post" class="navbar" action="/user/{{Auth::id()}}"
                onsubmit="return confirm('Tem certeza que deseja remover sua conta?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm btn-sm mr-2">Excluir conta</button>
            </form>
        </nav>
    @endauth
    <div class="container">
        <div class="jumbotron">
            <h1>@yield('cabecalho')</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('conteudo')
    </div>
    <footer style="margin-top:30px">
        <div class="container">
            <p class="jumbotron">
                Autor: Alexandre Arcari - Empreendedor
                <a href="https://www.instagram.com/alexandre.arcari/" target="_blank" alt="Alexandre Arcari (@alexandre.arcari) • Fotos e vídeos do Instagram" title="Alexandre Arcari (@alexandre.arcari) • Fotos e vídeos do Instagram">@alexandre.arcari</a>
            </p>
        </div>
    </footer>
</body>
</html>