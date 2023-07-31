<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteTableSeeder extends Seeder
{
    public function run(): void
    {
        /**
     * Insere 10 pacientes aleatórios de medico e paciente e um vinculo com os ids da collection
     */
        Paciente::factory(9)->create();
        Paciente::factory()->create([
            'id' => 103,
        ]);
    }
}
