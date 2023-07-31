<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CidadesTableSeeder;
use Database\Seeders\MedicoTableSeeder;
use Database\Seeders\PacienteTableSeeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Christian Ramires',
            'email' => 'christian.ramires@example.com',
        ]);

        // $this->call(CidadesTableSeeder::class);
        // $this->call(MedicoTableSeeder::class);
        // $this->call(PacienteTableSeeder::class);
    }
}
