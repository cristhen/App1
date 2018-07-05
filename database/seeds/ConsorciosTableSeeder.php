<?php

use Illuminate\Database\Seeder;

class ConsorciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consorcios')->insert([
            'name' => 'Consorcio 1',
        ]);
        DB::table('consorcios')->insert([
            'name' => 'Consorcio 2',
        ]);
        DB::table('consorcios')->insert([
            'name' => 'Consorcio 3',
        ]);
        DB::table('consorcios')->insert([
            'name' => 'Consorcio 4',
        ]);
        DB::table('consorcios')->insert([
            'name' => 'Consorcio 5',
        ]);
    }
}
