<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('salarios')->insert([
            'nombre' => '0 - 500 $',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre' => '500 - 1000 $',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre' => '1000 - 1500 $',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre' => '1500 - 2000 $',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('salarios')->insert([
            'nombre' => 'salario > 2000 $ ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
