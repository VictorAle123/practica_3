<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(comentariosmodelo::class,12)->create();
        //
        DB::table('comentarios')->insert([

         ///Campo                
            'comentario'=>'buen producto',

            'persona'=>'1',
            'producto'=>'1',

            ]);
    }
}
