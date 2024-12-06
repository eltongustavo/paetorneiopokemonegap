<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    // Mostra o formulário de registro
    public function create() {
        return view('site.registrar');
    }

    // Pega os dados do formulário do registro e faz a validação, como termino manda para o banco
    public function store(Request $request) {
        $validator = $this->validator($request); 
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $usuario = new Usuario();
            $usuario->nome = $request->nome;
            $usuario->telefone = $request->telefone;
            $usuario->senha = $request->senha;
            $usuario->save();
            return redirect()->route('login.create');
        }
    }
    
    // Valida todos os dados e suas regras 
    private function validator($request) {
        return Validator::make($request->all(), [
            'nome' => 'required|string|min:2|max:100|unique:usuarios',
            'telefone' => 'required|string|min:15|max:15',
            'senha' => 'required|min:8',
            'confirmacaosenha' => 'required|min:8|same:senha'
        ], [
            'nome.required' => 'O campo (Nome) é obrigatório',
            'nome.min' => 'O campo (Nome) deve conter no mínimo :min caracteres',
            'nome.max' => 'O campo (Nome) deve conter no máximo :max caracteres',
            'nome.unique' => 'Este nome já foi cadastrado no Banco',

            'telefone.required' => 'O campo (Telefone) é obrigatório',
            'telefone.integer' => 'O campo (Telefone) deve conter somente números',
            'telefone.min' => 'O campo (Telefone) deve conter exatamente 15 caracteres',
            'telefone.max' => 'O campo (Telefone) deve conter exatamente 20 caracteres',

            'senha.required' => 'O campo (Senha) é obrigatório',
            'senha.min' => 'O campo (Senha) deve conter no mínimo :min caracteres',

            'confirmacaosenha.required' => 'O campo (Confirmar Senha) é obrigatório',
            'confirmacaosenha.min' => 'O campo (Confirmar Senha) deve conter no mínimo :min caracteres',
            'confirmacaosenha.same' => 'O campo (Confirmar Senha) é diferente do campo (Senha)'
        ]);
    }
}
