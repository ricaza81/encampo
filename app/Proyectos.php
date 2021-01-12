<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    //
 protected $table = 'proyectos';

  public function user()
    {
        return $this->belongsTo('App\User', 'idUsuario', 'id');
    }


    

}