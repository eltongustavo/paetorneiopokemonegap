<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EquipeController extends Controller
{
    // Tela de inicio para decidir adicionar equipe ou fazer logoff
    public function index() {
        return view('site.equipe.index');
    }

    // Formulaŕio para cadastrar equipe
    public function create() {
        return view('site.equipe.addequipe');
    }

    // Mostrar todos os times aprovados
    public function show() {
        $dados = Equipe::all();
        return view('site.inscritos', compact('dados'));
    }

    // Adiciona equipe no banco
    public function store(Request $request) {
        // Dados que vão para o banco
        $equipe_dados = new Equipe();
        $equipe_dados->nome_usuario = session('Name');
        $equipe_dados->avatar = $request->sexo;
        $equipe_dados->pokemon1 = $request->p1;
        $equipe_dados->pokemon2 = $request->p2;
        $equipe_dados->pokemon3 = $request->p3;
        $equipe_dados->pokemon4 = $request->p4;
        $equipe_dados->pokemon5 = $request->p5;
        $equipe_dados->pokemon6 = $request->p6;
        $equipe_dados->save();

        // Salvando arquivo txt no store
        $request->file('file')->storeAs('uploads',  session('Name').'.txt');

        Session::put('Team', true);
        return redirect()->route('equipe.validator');
    }

    //função que valida os dados
    public function validator() {
        $equipe_dados = Equipe::find(session('Name'));
        $nome = $equipe_dados['nome_usuario'];
        $sexo = $equipe_dados['avatar'];
        $array_pokemon = [
            'pokemon1' => $equipe_dados['pokemon1'],
            'pokemon2' => $equipe_dados['pokemon2'],
            'pokemon3' => $equipe_dados['pokemon3'],
            'pokemon4' => $equipe_dados['pokemon4'],
            'pokemon5' => $equipe_dados['pokemon5'],
            'pokemon6' => $equipe_dados['pokemon6'],
        ];

        // Retorna se o time está validado no banco ou não
        $validacao_time = Equipe::where('nome_usuario', session('Name'))->value('validacao_time');

        return view('site.equipe.validacao', compact('nome', 'sexo', 'array_pokemon', 'validacao_time'));
    }
}
