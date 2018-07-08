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
            'question' => 'Que le parece el sistema web?',
        ]);

        DB::table('questions')->insert([
            'question' => 'Le gusta el diseño?',
        ]);

        DB::table('questions')->insert([
            'question' => 'Recomendaria usarlo?',
        ]);
    }
}
