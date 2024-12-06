<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Mostra o formulário de login
    public function create() {
        return view('site.login');
    }

    public function validatorLogin(Request $request) {

        // Validando se o login é feito pelo ADM
        $admName = DB::table('adms')->where('nome', '=', $request->nome)->first();
        $admSenha = DB::table('adms')->where('senha', '=', $request->senha)->first();

        if($admName && $admSenha) {
            Session::put('Adm', true);

            // Session::forget(['Name', 'Login', 'Adm']);
            Session::put('Name', $request->nome);
            Session::put('Login', true);
            
            // Validando equipe se foi registrada no banco
            $team_data = Equipe::find(session('Name'));
            if(isset($team_data)) {
                Session::put('Team', true);
            } else {
                Session::put('Team', false);
            }

            return redirect()->route('home.index');
        }

        // Usa os dados do login para verificar se usuário existe no banco
        $dadosUsuario = DB::table('usuarios')->where('nome', '=', $request->nome)->first();
        
        //faz a validação do login comparando nome e senha do usuário no banco
        if(!$dadosUsuario || Hash::check($dadosUsuario->senha, $request->senha)) {
            return redirect()->back()->withErrors(['error' => 'Nome ou Senha inválidos'])->withInput();
        } else {
            
            Session::put('Name', $request->nome);
            Session::put('Login', true);
            
            // Validando equipe se foi registrada no banco
            $team_data = Equipe::find(session('Name'));
            if(isset($team_data)) {
                Session::put('Team', true);
            } else {
                Session::put('Team', false);
            }
        }

        return redirect()->route('home.index');
    }

    // Limpa as variaveis de sessão
    public function logoff() {
        Session::forget(['Name', 'Login', 'Team', 'Adm']);
        return redirect()->route('home.index');
    }
}
