<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    // Busca todas as equipes do banco para o ADM
    public function show() {
        $time_dados = Equipe::all();
        return view('site.dashboard', compact('time_dados'));
    }

    //atualiza a validacao_time para true ou false
    public function update($id, $validacao_time) {
        if($validacao_time == false) {
            Equipe::where('nome_usuario', $id)->update([
                'validacao_time' => true
            ]);
        } 
        // else {
        //     Equipe::where('nome_usuario', $id)->update([
        //         'validacao_time' => false
        //     ]);
        // }
        return redirect()->route('dashboard.show');
    }

    // Deleta a equipe pelo ADM
    public function destroy($id) {
        Equipe::where('nome_usuario', $id)->delete();
        return redirect()->route('dashboard.show');
    }

    // Faz o download do arquivo.txt dos usuários
    public function download($id) {
        $path = "uploads/". $id . '.txt';
        if(Storage::exists($path)) {
            return Storage::download($path);
        }
        return redirect()->route('dashboard.show');
    }
}
