<?php

namespace Database\Seeders;

use App\Models\Medico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicoTableSeeder extends Seeder
{
    public function run(): void
    {
        /**
     * Insere 10 medicos aleatórios de medico e paciente e um vinculo com os ids da collection
     */
        Medico::factory(9)->create();
        Medico::factory()->create([
            'cidade_id' => 1
        ]);
    }
}
