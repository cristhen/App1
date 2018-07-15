<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Daniela Guzman',
            'email' => 'daniela@mail.com',
            'password' => bcrypt('123456'),
            'consortiums_id' => 1,
            'avatar' => 'user.png',
            'uf_number' => '001-U1'
        ]);
        
        DB::table('users')->insert([
            'name' => 'Alejandra Gonzales',
            'email' => 'alejandra@mail.com',
            'password' => bcrypt('123456'),
            'consortiums_id' => 2,
            'avatar' => 'user.png',
            'uf_number' => '001-U2'
        ]);

        DB::table('users')->insert([
            'name' => 'Rafael Ramirez',
            'email' => 'rafahenra@mail.com',
            'password' => bcrypt('123456'),
            'consortiums_id' => 1,
            'avatar' => 'user.png',
            'uf_number' => '002-U1'
        ]);

     	DB::table('users')->insert([
            'name' => 'Cristiam Henriquez',
            'email' => 'cristhen@mail.com',
            'password' => bcrypt('123456'),
            'role' => 1,
            'consortiums_id' => 1,
            'avatar' => 'admin.png',
            'uf_number' => '001-A1'
        ]);

        DB::table('users')->insert([
            'name' => 'Orlando Henriquez',
            'email' => 'orlando@mail.com',
            'password' => bcrypt('123456'),
            'role' => 1,
            'consortiums_id' => 2,
            'avatar' => 'admin.png',
            'uf_number' => '001-A2'
        ]);
    }
}
