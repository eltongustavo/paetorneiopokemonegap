<?php

namespace Database\Seeders;

use App\Models\Equipe;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::factory(10)->create()->each(function ($usuario) {
            Equipe::factory(1)->create([
                'nome_usuario' => $usuario->nome,
            ]);
        });
    }
}
