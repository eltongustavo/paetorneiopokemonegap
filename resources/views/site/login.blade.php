@extends('site.header')
@section('login')

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
        </head>

        <body style="background-color: #dcdcdc">
            @yield('header')
            <div class="container mt-sm-5 bg-light p-3 rounded">
                <!-- Escolher entre Login e Registrar -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    {{-- LOGIN --}}
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active bg-success" id="tab-login" data-mdb-pill-init href="#" role="tab"
                        aria-controls="pills-login" aria-selected="true">Login</a>
                    </li>

                    {{-- REGISTRAR --}}
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-success" id="tab-register" data-mdb-pill-init href="{{ route('registration.create') }}" role="tab"
                        aria-controls="pills-register" aria-selected="false">Registrar</a>
                    </li>

                </ul>

                <!-- Div que armazena o formulário -->
                <div class="tab-content p-3">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                       {{-- Mostra na tela se tiver algum erro --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="m-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        {{-- Formulário de Login --}}
                        <form method="post" id="formulario_login" action="{{ route('login.validatorLogin') }}">
                            @csrf
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="loginName">Nome (*)</label>
                                <input type="text" id="loginName" class="form-control" name="nome" value="{{ old('nome') }}"/>
                            </div>

                            <!-- Senha input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="loginPassword">Senha (*)</label>
                                <input type="password" id="loginPassword" class="form-control" name="senha"/>
                            </div>

                            <!-- Botão Submit -->
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block mb-4">Fazer Login</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </body>
    </html>
@endsection