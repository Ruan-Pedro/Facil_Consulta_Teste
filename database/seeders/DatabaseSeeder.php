<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CidadesTableSeeder;
use Database\Seeders\MedicoTableSeeder;
use Database\Seeders\PacienteTableSeeder;
use Database\Seeders\MedicosPacienteTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //Roda todos os seeders para popular o banco
        
        \App\Models\User::factory()->create([
            'name' => 'Christian Ramires',
            'email' => 'christian.ramires@example.com',
        ]);
        $this->call(CidadesTableSeeder::class);
        $this->call(MedicoTableSeeder::class);
        $this->call(PacienteTableSeeder::class);
        $this->call(MedicosPacienteTableSeeder::class);
    }
}
