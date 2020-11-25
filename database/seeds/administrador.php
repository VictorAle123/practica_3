<?php

use Illuminate\Database\Seeder;

class administrador extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //}


        DB::table('users')->insert([
            'name' => 'Victor',
            'age' => 19,
            'email' => 'vescobedomorales@yahoo.com',
            'password' => Hash::make('victor1'),
            'role' => 'admin',
            'image' => "",
            'confirmed' => 1
        ]);

    }
}
