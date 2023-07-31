<?php

namespace Database\Seeders;

use App\Models\Cidades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Cidades::factory(50)->create();
    }
}
