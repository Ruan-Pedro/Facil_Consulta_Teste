<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteTableSeeder extends Seeder
{
    public function run(): void
    {
        Paciente::factory(10)->create();
    }
}
