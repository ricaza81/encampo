<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educacion extends Model
{
    protected $table = 'educacion';



          public function user()
    {
        return $this->belongsTo('App\User', 'id', 'idUsuario');
    }

}
