<?php

namespace Database\Factories;

use App\Models\Cidades;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cidade>
 */
class CidadesFactory extends Factory
{
    protected $model = Cidades::class;
    
    public function definition()
    {
        return [
            'nome' => $this->faker->city,
            'estado' => $this->faker->state,
        ];
    }
}
