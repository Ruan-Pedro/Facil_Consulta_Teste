<?php

namespace Database\Seeders;

use App\Models\MedicoPaciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicosPacienteTableSeeder extends Seeder
{
    /**
     * Insere 10 vinculos aleatórios de medico e paciente e um vinculo com os ids da collection
     */
    public function run(): void
    {
        MedicoPaciente::factory(9)->create();
        MedicoPaciente::factory()->create([
            'medico_id' => 1,
            'paciente_id' => 103
        ]);
    }
}
