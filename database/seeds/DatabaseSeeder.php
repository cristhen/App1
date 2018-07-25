<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ConsortiumsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        //$this->call(ElectionsTableSeeder::class);
        //$this->call(QuestionsTableSeeder::class);
        //$this->call(VotesTableSeeder::class);

    }
}
