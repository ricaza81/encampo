<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosTipo extends Model
{
     protected $table = 'productostipo';


         public function users()
      {
        return $this->hasMany('App\User', 'pais', 'id');
      }
}
