<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosLineas extends Model
{
     protected $table = 'productoslinea';


         public function users()
      {
        return $this->hasMany('App\User', 'pais', 'id');
      }
}
