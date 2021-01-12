<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoRecomendado extends Model
{
     protected $table = 'agroniel_directofinca.productos';


         public function users()
      {
        return $this->hasMany('App\User', 'pais', 'id');
      }
}
