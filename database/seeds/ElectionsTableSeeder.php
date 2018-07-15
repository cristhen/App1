<?php

use Illuminate\Database\Seeder;

class ElectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('elections')->insert([
            'name' => 'Eleccion 1',
            'description' => 'Primera Eleccion del año',
            'consortiums_id' => 1,
        ]);
    }
}
