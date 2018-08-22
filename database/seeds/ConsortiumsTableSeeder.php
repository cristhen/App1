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
                'name' => 'ALL',
        ]);
    }
}
