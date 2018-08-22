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
            'name' => 'Administrador Master',
            'email' => 'admin@master.com',
            'password' => bcrypt('123456'),
            'role' => 0,
            //'consortiums_id' => ,
            'avatar' => 'admin.jpeg',
            'uf_number' => 'ALL'
        ]);

    }
}
