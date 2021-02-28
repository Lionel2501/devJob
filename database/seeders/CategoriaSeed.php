<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias')->insert([
            'nombre' => 'Front End',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);DB::table('categorias')->insert([
            'nombre' => 'Back End',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);DB::table('categorias')->insert([
            'nombre' => 'Full Stack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);DB::table('categorias')->insert([
            'nombre' => 'Java',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);DB::table('categorias')->insert([
            'nombre' => 'JavaScript',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);DB::table('categorias')->insert([
            'nombre' => 'Php',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);DB::table('categorias')->insert([
            'nombre' => 'Phyton End',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);DB::table('categorias')->insert([
            'nombre' => 'Laravel',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
