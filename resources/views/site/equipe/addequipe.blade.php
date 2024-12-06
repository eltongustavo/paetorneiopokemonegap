@extends('site.header')
@section('addteam')
    @php
        $page = 'Inscrição';
        $hasDataBase = session('Team');
    @endphp
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        {{-- CSS separado --}}
        <style>
            label.opc-treinador {
                filter: saturate(20%);
            }
            label.opc-treinador:hover {
                filter: none;
                transform: scale(100%);
            }
            label.opc-treinador.selecionado {
                filter: none;
                transform: scale(110%);
                border-radius: 5%;
                img {
                    border-bottom: 3px solid green;
                }
            }
        </style>
    </head>
    <body style="background-color: #dcdcdc;">
        <div class="container p-3 mt-sm-5 bg-light rounded">
            <form action="{{ route('equipe.store') }}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                <div class="bg-success text-center text-light p-2 mb-3" style="margin: -1em;">{{ session('Name') }}</div>
                
                {{-- Mostra todas as opções de avatares disponíveis --}}
                <div id="treinadores" class="row mx-0 my-3 pb-3 rounded" style="box-sizing: border-box; background-color: white; border: 1px solid #ddd">
                    
                    {{-- Personagens masculinos --}}
                    <label class="opc-treinador selecionado col-6 col-md-4 col-lg-2 px-4 m-0" style="box-sizing: border-box;">
                        <input class="d-none mt-3" type="radio" name="sexo" value="masculino1" checked>    
                        <img src="{{ asset('assets/personagens/masculino1.png') }}" alt="personagem 1" style="width: 100%; padding-top: 15px;">
                    </label>
                    <label class="opc-treinador col-6 col-md-4 col-lg-2 px-4 m-0" style="box-sizing: border-box;">
                        <input class="d-none mt-3" type="radio" name="sexo" value="masculino2">    
                        <img src="{{ asset('assets/personagens/masculino2.png')}} " alt="personagem 2" style="width: 100%; padding-top: 15px;">
                    </label>
                    <label class="opc-treinador col-6 col-md-4 col-lg-2 px-4 m-0" style="box-sizing: border-box;">
                        <input class="d-none mt-3" type="radio" name="sexo" value="masculino3">    
                        <img src="{{ asset('assets/personagens/masculino3.png')}} " alt="personagem 3" style="width: 100%; padding-top: 15px;">
                    </label>

                    {{-- Personagens Feminimos --}}
                    <label class="opc-treinador col-6 col-md-4 col-lg-2 px-4 m-0" style="box-sizing: border-box;">
                        <input class="d-none mt-3" type="radio" name="sexo" value="feminina1">
                        <img src="{{ asset('assets/personagens/feminina1.png')}} " alt="personagem 4" style="width: 100%; padding-top: 15px;">
                    </label>
                    <label class="opc-treinador col-6 col-md-4 col-lg-2 px-4 m-0" style="box-sizing: border-box;">
                        <input class="d-none mt-3" type="radio" name="sexo" value="feminina2">
                        <img src="{{ asset('assets/personagens/feminina2.png')}} " alt="personagem 5" style="width: 100%; padding-top: 15px;">
                    </label>
                    <label class="opc-treinador col-6 col-md-4 col-lg-2 px-4 m-0" style="box-sizing: border-box;">
                        <input class="d-none mt-3" type="radio" name="sexo" value="feminina3">
                        <img src="{{ asset('assets/personagens/feminina3.png') }}" alt="personagem 6" style="width: 100%; padding-top: 15px;">
                    </label>
                </div>

                {{-- Label para receber arquivo TXT --}}
                <label class="mt-3" for="txt-showdown">txt do time:</label>
                <input class="form-control mt-1" required type="file" accept=".txt" name="file" id="txt">
                
                <div id="container" class="row mx-0 my-3 rounded" style="box-sizing: border-box; background-color: white; border: 1px solid #ddd"></div>
                
                {{-- Botão de submite --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </form>
        </div>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
    </html>    
@endsection