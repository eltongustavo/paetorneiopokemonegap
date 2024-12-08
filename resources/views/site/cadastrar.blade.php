@extends('site.header')
@section('registration')

    @php
        $page = 'Inscrição';
        $hasDataBase = session('Team');
    @endphp

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="font.css">
    </head>

        <body style="background-color: #dcdcdc">
            <div class="container mt-sm-5 bg-light p-3 rounded">
                {{-- Selecionar Login ou Cadastrar --}}
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-success" id="tab-login" data-mdb-pill-init href="{{ route('login.create') }}" role="tab"
                        aria-controls="pills-login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active bg-success" id="tab-register" data-mdb-pill-init href="#" role="tab"
                        aria-controls="pills-register" aria-selected="false">Cadastrar</a>
                    </li>
                </ul>

                <div class="tab-content p-3">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="m-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('registration.store') }}" method="post" id="formulario">
                            @csrf
                            <!-- nome input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="loginName">Nome (*)</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}"/>
                            </div>

                            <!-- telefone input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="telefone">Telefone (*)</label>
                                <input type="text"  name="telefone" id="telefone" class="form-control" placeholder="(00) 00000-0000" value="{{ old('telefone') }}">
                            </div>

                            <!-- Senha input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="loginPassword">Senha (*)</label>
                                <input type="password" name="senha" id="senha" class="form-control" minlength="8"/>
                            </div>

                            <!-- Senha input -->

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="loginPassword">Confirmar Senha (*)</label>
                                <input type="password" name="confirmacaosenha" id="confirmarSenha" class="form-control" minlength="8"/>
                            </div>

                            <!-- Botão Submit -->
                            <button id="submitBtn" type="submit" class="btn btn-success btn-block mb-4">Cadastrar-se</button>
                        </form>
                        <div id="mensagem" class="mt-3"></div>

                    </div>
                </div>
                </div>
                <!-- Pills content -->
            </div>
            {{-- Validação em js depois comferir --}}
        <script src="register-script.js"></script>
        <script src="{{asset('/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('/jquery/jquery-mask.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('#telefone').mask('(00) 00000-0000', {
                    placeholder: "(__) _____-____",
                    clearIfNotMatch: false // Mantém a máscara visível enquanto o usuário digita
                });
            });
        </script>
        </body>
    </html>
@endsection
