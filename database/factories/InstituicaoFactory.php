<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instituicao;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instituicao>
 */
class InstituicaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->unique()->name(),
            'cnpj' => fake()->unique()->text(),
            'data_fundacao' => fake()->date(),
            'descricao' => fake()->text(),
            'responsavel' => fake()->name(),
            'endereco' => fake()->address(),
        ];
    }
}
