<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\comentarios;
use Faker\Generator as Faker;

$factory->define(comentarios::class, function (Faker $faker) {
    
        //

        $comentario=$faker->word;
        $persona=$faker->numberBetween(1,12);
        $producto=$faker->numberBetween(1,12);
        return [
            //Campo         Variable
            'comentario'=>$comentario,
            'persona'=>$persona,
            'producto'=>$producto,
            //
        ];


    
});
