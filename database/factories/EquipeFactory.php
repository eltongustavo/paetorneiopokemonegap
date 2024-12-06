<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipe>
 */
class EquipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        

        return [
            'nome_usuario' => null,
            'avatar' => $this->faker->randomElement(['masculino1', 'masculino2', 'masculino3', 'feminina1', 'feminina2', 'feminina3']),
            'validacao_time' => $this->faker->boolean(70),
            'pokemon1' => $this->pokemons(),
            'pokemon2' => $this->pokemons(),
            'pokemon3' => $this->pokemons(),
            'pokemon4' => $this->pokemons(),
            'pokemon5' => $this->pokemons(),
            'pokemon6' => $this->pokemons(),
        ];
    }

    private $pokemons = [
        'pikachu', 'bulbasaur', 'charmander', 'squirtle', 'jigglypuff',
        'meowth', 'eevee', 'snorlax', 'mewtwo', 'charizard',
        'sandslash', 'psyduck', 'electrode', 'golem', 'machop',
        'onix', 'vaporeon', 'flareon', 'jolteon', 'lapras', 'gengar',
    ];

    private function pokemons() {
        $p = $this->faker->randomElement($this->pokemons);
        $index = array_search($p, $this->pokemons);
        unset($this->pokemons[$index]);
        return $p;
    }
}
