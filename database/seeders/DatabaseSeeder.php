<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategoriaSeed;
use Database\Seeders\UbicacionSeeder;
use Database\Seeders\ExperienciaSeeder;
use Database\Seeders\SalarioSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CategoriaSeed::class);
        $this->call(ExperienciaSeeder::class);
        $this->call(UsuarioSeed::class);
        $this->call(UbicacionSeeder::class);
        $this->call(SalarioSeeder::class);
    }
}
