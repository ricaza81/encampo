<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProspectosAsignacion extends Model
{
    protected $table = 'prospectos_asignacion';



          public function user()
    {
        return $this->belongsTo('App\User', 'id', 'idUsuario');
    }

       public function compartidocon()
      {
        return $this->belongsTo('App\User', 'idrtcasignado', 'id');
      }

       public function asignadopor()
      {
        return $this->belongsTo('App\User', 'idasignador', 'id');
      }


}
