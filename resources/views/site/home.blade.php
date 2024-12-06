@extends('site.header')
@section('home')
    @php
        $page = 'Inicio';
        $hasDataBase = session('Team');
    @endphp
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Regras</title>
            <link rel="stylesheet" href="font.css">
        </head>
        <body style="background-color: #dcdcdc;">

            <div class="container d-flex flex-column align-items-center bg-light">
                {{-- Tela inicial com imagens e textos --}}
                <h1 style="color:#FFF; border-radius: 5px;" class="m-3 bg-danger rtext p-2">Regras do Torneio</h1>

                <h2 style="font-size: clamp(1.5em, 1.8em, 2.5em); border-radius: 5px;" class="p-2 text-light text-center bg-danger backrule">Esse torneio será realizado dentro dos jogos Pokémon Ultra Sun/Ultra Moon</h2>

                <img class="m-4" style="margin: 5px; width: 80%;" src="{{ asset('assets/home/pokemonusum.jpg') }}" alt="pokemon USUM">

                <h2 style="font-size: clamp(1.5em, 1.8em, 2.5em); border-radius: 5px;" class="p-2 text-light bg-danger backrule rtext text-center m-3">O modelo das batalhas será VGC/Doubles no modelo do mundial de 2018</h2>

                <img class="m-4" style="margin: 5px; width: 100%;" src="{{ asset('assets/home/pokemonblast.jpg') }}" alt="imagem de batalha em dupla">

                <div style="width: 100%;">
                    <h1 style="border-radius: 5px;" class="text-light ltext bg-danger backrule text-center">A equipe obrigatoriamente deve conter 6 pokemons</h1>
                    <h1 style="border-radius: 5px;" class="text-light ltext bg-danger backrule text-center">Não pode haver pokémons repetidos na equipe</h1>
                    <h1 style="border-radius: 5px;" class="text-light ltext bg-danger backrule text-center">Não podem haver items repetidos</h1>
                    <h1 style="border-radius: 5px;" class="text-light ltext bg-primary backrule text-center mb-5 ">ABAIXO TODOS OS POKÉMON BANIDOS</h1>
                </div>


                <div class="row">
                    {{-- define a lista de todos os pokémons banidos --}}
                    @php
                        define('BANIDOS', array("kangaskhan-mega","heracross-mega","metagross-mega","greninja-ash","mewtwo", "mew", "lugia", "ho-oh", "celebi", "kyogre", "groudon", "rayquaza", "jirachi", "deoxys", "dialga", "palkia", "giratina", "phione", "manaphy", "darkrai", "shaymin", "arceus", "victini", "reshiram", "zekrom", "kyurem", "keldeo", "meloetta", "genesect", "xerneas", "yveltal", "zygarde", "diancie", "hoopa", "volcanion", "cosmog", "cosmoem", "solgaleo", "lunala", "necrozma", "magearna", "marshadow"));
                    @endphp

                    {{-- Aqui será mostrado todos os pokémons banidos--}}
                    @foreach (BANIDOS as $pokemon)
                        <div class="col-6 col-md-4 col-lg-3 d-flex flex-column justify-content-center align-items-center">
                            <img class="m-3" src="https://d1r7q4bq3q8y2z.cloudfront.net/<?=$pokemon?>.png" alt="pikomon" style="width: 50%;">
                            <p class="text-dark my-auto"><?= ucfirst($pokemon) ?></p>
                        </div>
                    @endforeach
                </div>
                <div class="mb-5"></div>
            </div>

        </body>
    </html>
@endsection
