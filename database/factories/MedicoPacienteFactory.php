<?php

namespace Database\Factories;

use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicoPaciente>
 */
class MedicoPacienteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'medico_id' => function () {
                return Medico::factory()->create()->id;
            },
            'paciente_id' => function () {
                return Paciente::factory()->create()->id;
            },
        ];
    }
}
