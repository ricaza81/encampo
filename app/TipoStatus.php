<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prospectos;

class TipoStatus extends Model
{
    protected $table = 'tipo_status';

         public function users()
      {
        return $this->hasMany('App\Prospectos', 'nombre', 'id');
      }

}