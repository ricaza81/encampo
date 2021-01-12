<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interes extends Model
{
     protected $table = 'tipo_intereses';


         public function users()
      {
        return $this->hasMany('App\Prospectos', 'nombre', 'id');
      }
}