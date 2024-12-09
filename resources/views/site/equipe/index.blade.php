@extends('site.header')
@section('team')

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
            <div style="margin: -1rem;" class="bg-dark text-light text-center p-2 mb-3">Inscreva sua Equipe!</div>
                <div class="row d-flex justify-content-center px-3">
                   
                    {{-- Mostra o ícone de usuário desconhecido --}}
                    <div class="col-12 col-sm-6 d-flex align-items-center justify-content-center">
                        <img style="width:75%;" class="card-img-top m-0 rounded-0" src="{{ asset('assets/equipe/usuario-desconhecido.png') }}" alt="Card image cap">
                    </div>

                    {{-- Mostra os 6 ícones de pokémon desconhecido --}}
                    <div class="col-12 col-sm-6 row m-0">
                        <?php foreach (range(1, 6) as $i): ?>
                            <div class="col-4 p-0 d-flex align-items-center justify-content-center">
                                <img style="width:75%;" class="card-img-top m-0 rounded-0" src="{{ asset('assets/equipe/pokemon-desconhecido.jpg') }}" alt="Card image cap">
                            </div>
                        <?php endforeach; ?>
                    </div>

                    {{-- Os botões de Sair (encerrar sessão) e Criar Time --}}
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <a href="{{ route('login.logoff') }}" name='end' class="btn btn-danger mx-2">Sair</a>  
                        <a href="{{ route('equipe.create') }}" name='end' class="btn btn-success">Criar Equipe</a>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection