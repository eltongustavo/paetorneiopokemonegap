@extends('site.header')
@section('validacao')

    @php
        $page = 'Inscrição';
        $hasDataBase = session('Team');
    @endphp

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tela de Logoff</title>
    </head>

    <body style="background-color: #cdcdcd">

    <div class="container bg-white mt-sm-5 p-3">
        
        {{-- Div que exibe dependendo da validacao_time, se o time está aprovado ou aguardando avaliação --}}
        <div style="margin: -1rem;" class="bg-dark text-light text-center p-2 mb-3">{{$nome}} 
            @if($validacao_time) 
                <p>Aprovado</p>
            @else
                <p>Aguardando Avaliação...</p>
            @endif
        </div>

            <div class="row d-flex justify-content-center px-3">
                
                {{-- Mostra o avatar escolhido pelo usuário --}}
                <div class="col-12 col-sm-6 d-flex align-items-center justify-content-center">
                    <img style="width:75%;" class="card-img-top m-0 rounded-0" src="{{ asset("assets/personagens/$sexo.png") }}" alt="Card image cap">
                </div>

                {{-- Mostra os 6 pokémons escolhidos pelo usuário --}}
                <div class="col-12 col-sm-6 row m-0">
                    @foreach ($array_pokemon as $pokemon)                        
                        <div class="col-4 p-0 d-flex align-items-center justify-content-center">
                            <img style="width:75%;" class="card-img-top m-0 rounded-0" src="https://d1r7q4bq3q8y2z.cloudfront.net/{{$pokemon}}.png" alt="Card image cap">
                        </div>
                    @endforeach
                </div>

                {{-- Botão de Sair(encerrar sessão) --}}
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <a href="{{ route('login.logoff') }}" name='end' class="btn btn-danger mx-2" type="submit">Sair</a>  
            </div>
        </div>
    </div>
    </body>
    </html>
@endsection