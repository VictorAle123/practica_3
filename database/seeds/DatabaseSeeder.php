<?php

use Illuminate\Database\Seeder;
use App\comentarios;
use App\personas;
use App\productos;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        
        //$this->call(administrador::class);
   
   
        $this->call(PersonaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ComentarioSeeder::class);


    }

}
