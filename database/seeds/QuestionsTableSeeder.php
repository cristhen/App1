<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
        DB::table('questions')->insert([
            'elections_id' => 1,
            'question' => 'Te gusta el sistema?',
        ]);

        DB::table('questions')->insert([
            'elections_id' => 1,
            'question' => 'Que tal te parece el diseño?',
        ]);

        DB::table('questions')->insert([
            'elections_id' => 1,
            'question' => 'Recomendarias el sistema?',
        ]);
    }
}
