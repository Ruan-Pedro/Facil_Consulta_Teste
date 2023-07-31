<?php

namespace Database\Factories;

use App\Models\Cidades;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    protected $model = Medico::class;
    
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'especialidade' => $this->faker->randomElement(['Neurologista', 'Cardiologista', 'Dermatologista', 'Pediatra', 'Ortopedista']),
            'cidade_id' => function () {
                return Cidades::factory()->create()->id;
            },
        ];
    }
}
