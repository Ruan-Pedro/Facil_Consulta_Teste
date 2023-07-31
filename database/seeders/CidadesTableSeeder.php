<?php

namespace Database\Seeders;

use App\Models\Cidades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CidadesTableSeeder extends Seeder
{
    /**
     * Insere 50 Cidades aleatórias no banco
     */
    public function run()
    {
        Cidades::factory(10)->create();
    }
}
