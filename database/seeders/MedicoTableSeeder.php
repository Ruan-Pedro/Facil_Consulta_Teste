<?php

namespace Database\Seeders;

use App\Models\Medico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicoTableSeeder extends Seeder
{
    public function run(): void
    {
        Medico::factory(10)->create();
    }
}
