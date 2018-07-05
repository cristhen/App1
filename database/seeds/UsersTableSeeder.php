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
            'name' => 'usuario general',
            'email' => 'user@mail.com',
            'password' => bcrypt('123456'),
            //'change' => 0,
            //'role' => 0,
            'consorcio_id' => 1,
            'avatar' => 'user.png',
            'uf_number' => '001'
            //'active' => 0
        ]);

     	DB::table('users')->insert([
            'name' => 'administrador',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
            //'change' => 0,
            'role' => 1,
            'consorcio_id' => 0,
            'avatar' => 'admin.png',
            'uf_number' => '001-admin'
            //'active' => 0
        ]);
    }
}
