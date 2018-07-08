<?php

use Illuminate\Database\Seeder;

class ConsortiumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consortiums')->insert([
            'name' => 'Consorcio 1',
        ]);
        DB::table('consortiums')->insert([
            'name' => 'Consorcio 2',
        ]);
        DB::table('consortiums')->insert([
            'name' => 'Consorcio 3',
        ]);
        DB::table('consortiums')->insert([
            'name' => 'Consorcio 4',
        ]);
        DB::table('consortiums')->insert([
            'name' => 'Consorcio 5',
        ]);
    }
}
