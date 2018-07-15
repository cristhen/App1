<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->insert([
            'elections_id' => 1,
            'questions_id' => 1,
            'users_id' => 1,
            'vote' => 'A'
        ]);

     	DB::table('votes')->insert([
            'elections_id' => 1,
            'questions_id' => 2,
            'users_id' => 1,
            'vote' => 'E'
        ]);

        DB::table('votes')->insert([
            'elections_id' => 1,
            'questions_id' => 3,
            'users_id' => 1,
            'vote' => 'N'
        ]);


        DB::table('votes')->insert([
            'elections_id' => 1,
            'questions_id' => 1,
            'users_id' => 2,
            'vote' => 'E'
        ]);

     	DB::table('votes')->insert([
            'elections_id' => 1,
            'questions_id' => 2,
            'users_id' => 2,
            'vote' => 'A'
        ]);

        DB::table('votes')->insert([
            'elections_id' => 1,
            'questions_id' => 3,
            'users_id' => 2,
            'vote' => 'N'
        ]);

        
    }
}
