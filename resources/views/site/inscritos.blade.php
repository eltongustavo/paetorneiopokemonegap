@extends('site.header')
@section('registered')
    @php
        $page = 'Inscritos';
        $hasDataBase = session('Team');
    @endphp
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Inicial</title>
    </head>
    <body style="background-color: #dcdcdc;">
        <div class="p-3 container-fluid" style="min-height: 100vh;">
            <div class="d-flex">
                <h1 style="color:#fff; border-radius: 5px;" class="m-3 bg-success rtext p-2 mx-auto">Equipes Aprovadas</h1>
            </div>
            
            <div class="row">

                {{-- Recebe os dados e atribui as variáveis --}}
                @foreach ($dados as $item)
                    @if ($item['validacao_time'] == true)
                        @php
                            $numberOfCharacters = strlen($item['nome_usuario']);
                            $pathImage = $item['avatar'];
                        @endphp

                        {{-- Div que mostra o nome e o avatar escolhido pelo usuário --}}
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 py-3 d-flex justify-content-center">
                            <div style="width: 90%" class="card mb-3" style="box-sizing: border-box;">
                                <div class="card-body pb-0 mb-3 bg-success" style="border-radius: 5px 5px 0 0;">
                                    <h3 style="font-family: font-site;" class="card-title text-center text-light">
                                        {{-- verificação do tamanho do nome do usuário --}}
                                        @if ($numberOfCharacters > 15)
                                            {{ (substr($item['nome_usuario'], 0, 15). '...') }}
                                        @else
                                            {{ substr($item['nome_usuario'], 0, 15) }}
                                        @endif
                                    </h3>

                                </div>
                                <img style="width: 80%" class="card-img-top mx-auto" src="{{ asset("assets/personagens/$pathImage.png")}}" alt="Card image cap">

                                {{-- Div que mostra cada pokémon com sua imagem --}}
                                <div class="row p-3">
                                    <a class="col-6 col-sm-6 col-md-4" target = "_black" style="cursor:pointer" href="https://bulbapedia.bulbagarden.net/wiki/{{$item['pokemon1']}}_(Pokemonok%C3%A9mon)">
                                        <img style="width: 100%;" src="https://d1r7q4bq3q8y2z.cloudfront.net/{{$item['pokemon1']}}.png" alt="{{$item['pokemon1']}}">
                                    </a>

                                    <a class="col-6 col-sm-6 col-md-4" target = "_black" style="cursor:pointer" href="https://bulbapedia.bulbagarden.net/wiki/{{$item['pokemon2']}}_(Pok%C3%A9mon)">
                                        <img style="width: 100%;" src="https://d1r7q4bq3q8y2z.cloudfront.net/{{$item['pokemon2']}}.png" alt="{{$item['pokemon2']}}">
                                    </a>

                                    <a class="col-6 col-sm-6 col-md-4" target = "_black" style="cursor:pointer" href="https://bulbapedia.bulbagarden.net/wiki/{{$item['pokemon3']}}_(Pok%C3%A9mon)">
                                        <img style="width: 100%;" src="https://d1r7q4bq3q8y2z.cloudfront.net/{{$item['pokemon3']}}.png" alt="{{$item['pokemon3']}}">
                                    </a>

                                    <a class="col-6 col-sm-6 col-md-4" target = "_black" style="cursor:pointer" href="https://bulbapedia.bulbagarden.net/wiki/{{$item['pokemon4']}}_(Pok%C3%A9mon)">
                                        <img style="width: 100%;" src="https://d1r7q4bq3q8y2z.cloudfront.net/{{$item['pokemon4']}}.png" alt="{{$item['pokemon4']}}">
                                    </a>

                                    <a class="col-6 col-sm-6 col-md-4" target = "_black" style="cursor:pointer" href="https://bulbapedia.bulbagarden.net/wiki/{{$item['pokemon5']}}_(Pok%C3%A9mon)">
                                        <img style="width: 100%;" src="https://d1r7q4bq3q8y2z.cloudfront.net/{{$item['pokemon5']}}.png" alt="{{$item['pokemon5']}}">
                                    </a>

                                    <a class="col-6 col-sm-6 col-md-4" target = "_black" style="cursor:pointer" href="https://bulbapedia.bulbagarden.net/wiki/{{$item['pokemon6']}}_(Pok%C3%A9mon)">
                                        <img style="width: 100%;" src="https://d1r7q4bq3q8y2z.cloudfront.net/{{$item['pokemon6']}}.png" alt="{{$item['pokemon6']}}">
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </body>
    </html>
@endsection