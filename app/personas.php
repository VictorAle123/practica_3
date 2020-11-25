<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personas extends Model
{
    //
    protected $fillable = ['usuario', 'contrasena'];
    protected $table='personas';
    function comentario()
    {
        return $$this->hasMany('app\Modelos\comentariosmodelo','personas');
    }

}
