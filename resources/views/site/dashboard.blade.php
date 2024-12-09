@extends('site.header') {{-- Extende o header para aparecer no site --}}
@section('dashboard') {{-- Indica qual página está aberta --}}

    @php
        $page = 'Dashboard'; // Define a página atual
        $hasDataBase = session('Team'); //testa se existe um time no banco de dados ou não
    @endphp

    {{-- LAYOUT --}}
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="font.css">
    </head>
    <body>
        <div class="bg-dark text-light text-center mb-3">Dashboard</div>
        
        <div class="d-flex justify-content-center align-items-center mb-3"><a href="{{ route('login.logoff') }}" name='end' class="btn btn-sm btn-danger mx-2">Encerrar Sessão</a></div>
        {{-- As colunas do dashboard --}}
        <div class="container" style="min-height: 100vh;">
            <table class="table table-dark text-center text-light">
                <tr class="bg-success text-center text-light">
                    <td>Usuário</td>
                    <td>Pokémon 1</td>
                    <td>Pokémon 2</td>
                    <td>Pokémon 3</td>
                    <td>Pokémon 4</td>
                    <td>Pokémon 5</td>
                    <td>Pokémon 6</td>
                    <td colspan="3">Ação</td>
                </tr>
                
                {{-- Seleciona todos os pokémons de cada usuário e mostra o nome na tela --}}
                @foreach ($time_dados as $item) 
                    <tr>
                        @php
                            $id = $item['nome_usuario'];
                            $validacao_time = $item['validacao_time'];
                            $numberOfCharacters = strlen($item['nome_usuario']);
                        @endphp

                        {{-- Impõe limitação de caracteres na exibição do nome do usuário --}}
                        <td>
                            @if ($numberOfCharacters > 15)
                                {{ (substr($item['nome_usuario'], 0, 15). '...') }}
                            @else
                                {{ substr($item['nome_usuario'], 0, 15) }}
                            @endif
                        </td>

                        {{-- Exibe o nome de cada pokémon em um TD --}}
                        <td>{{$item['pokemon1']}}</td>
                        <td>{{$item['pokemon2']}}</td>
                        <td>{{$item['pokemon3']}}</td>
                        <td>{{$item['pokemon4']}}</td>
                        <td>{{$item['pokemon5']}}</td>
                        <td>{{$item['pokemon6']}}</td>

                        {{-- Botões de aprovar/desaprovar, excluir e download --}}

                        <td><a href="{{route('dasboard.update', [$id, $validacao_time])}}" class="text-decoration-none btn-frame btn btn-sm {{$item['validacao_time'] == true ? 'bg-success text-light': 'bg-danger text-light'}}" onclick="redirecionarEDesabilitar(event, this);">{{$item['validacao_time'] == true ? 'Aprovado' : 'Não Aprovado'}}</a></td>
                        <td><a class="btn-frame btn btn-sm bg-primary text-light" onclick="return confirmarAcao()" href="{{ route('dashboard.destroy', $id) }}">Deletar</a></td>
                        <td><a class="btn-frame btn btn-sm bg-secondary text-light" href="{{ route('dashboard.download', $id) }}">Download</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <script>
            function confirmarAcao() {
                return confirm('Tem certeza que deseja deletar essa equipe?');
            }

            function redirecionarEDesabilitar(event, link) {
                // Impede o comportamento padrão (navegação do link)
                event.preventDefault();

                // Desabilita o clique futuro
                link.style.pointerEvents = 'none'; // Desabilita os cliques
                link.style.opacity = '0.5';        // Reduz a opacidade para indicar que está desabilitado

                // Redireciona o usuário manualmente
                window.location.href = link.href;
            }
        </script>
    </body>
    </html>
@endsection