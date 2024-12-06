<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Torneio VGC EGAP</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-4.0.0-dist/css/bootstrap.min.css') }}"> {{-- importando o CSS (bootstrap) da pasta public --}}
    <link rel="shortcut icon" href="{{ asset('assets/favicon/pikachu.png')}}" type="image/x-icon">
</head>

{{-- Criação dos botões de navegação --}}
<div style="overflow: hidden;" class="container-fluid p-3 bg-success text-center" style="min-height: 10vh;">
    @if (session()->has('Login'))
        {{-- Gerenciamento de rotas  na área de inscritos, se não estiver logado, mostra o login, se estiver, mostra a tela de cadastro de nova equipe--}}
        @foreach (get_menu_itens_login() as $item)
            @if (session()->has('Adm') && $item['route'] == "/equipe")
                @continue
            @endif
            
            @if($hasDataBase && $item['route'] == "/equipe")
                <a class="btn-frame btn btn-sm {{$page == $item['name'] ? 'bg-light text-dark' : 'bg-sucess text-light'}}" href="{{'/equipe-validação'}}">{{$item['name']}}</a>    
            @else
                <a class="btn-frame btn btn-sm {{$page == $item['name'] ? 'bg-light text-dark' : 'bg-sucess text-light'}}" href="{{$item['route']}}">{{$item['name']}}</a>
            @endif
        @endforeach
        
        {{-- testa se a sessão é de ADM --}}
        @if (session()->has('Adm'))
            <a class="btn-frame btn btn-sm {{$page == "Dashboard" ? 'bg-light text-dark' : 'bg-sucess text-light'}}" href="{{'/dashboard'}}">Dashboard</a>
        @endif 
    @else
        {{-- Caso nao esteja logado, esse é o gerenciamento de rotas --}}
        @foreach (get_menu_itens_offlogin() as $item)
            <a class="btn-frame btn btn-sm {{$page == $item['name'] ? 'bg-light text-dark' : 'bg-sucess text-light'}}" href="{{$item['route']}}">{{$item['name']}}</a>
        @endforeach
    @endif
</div>

{{-- Controle de rotas e nomes dos botões de navegação --}}
@php
    function get_menu_itens_offlogin() :array {
        return [
            'home' => [
                'name' => 'Inicio',
                'route' => '/',
            ],
            'inscribe' => [
                'name' => 'Inscritos',
                'route' => '/inscritos',
            ],
            'tutorial' => [
                'name' => 'Tutorial',
                'route' => '/tutorial',
            ],
            'registration' => [
                'name' => 'Inscrição',
                'route' => '/login',
            ],
        ];
    }

    function get_menu_itens_login() :array {
        return [
            'home' => [
                'name' => 'Inicio',
                'route' => '/',
            ],
            'inscribe' => [
                'name' => 'Inscritos',
                'route' => '/inscritos',
            ],
            'tutorial' => [
                'name' => 'Tutorial',
                'route' => '/tutorial',
            ],
            'addteam' => [
                'name' => 'Inscrição',
                'route' => '/equipe'
            ],
        ];
    }
@endphp
<script src="{{ asset('bootstrap-4.0.0-dist/js/bootstrap.bundle.min.js') }}"></script> {{-- importando o js (bootstrap) da pasta public --}}

{{-- Componentes --}}
@yield('home')
@yield('registration')
@yield('login')
@yield('team')
@yield('addteam')
@yield('validacao')
@yield('dashboard')
@yield('registered')
@yield('tutorial')