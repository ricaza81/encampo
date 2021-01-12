<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoUsuario;
use App\TipoIntereses;
use App\Prospectos;
use App\Publicaciones;
use App\Eventos;
use App\User;

class Visitas extends Model
{
    //
 protected $table = 'visitas';

  public function user()
    {
        return $this->belongsTo('App\Prospectos', 'idUsuario', 'id');
    }

     public function autor()
    {
        return $this->belongsTo('App\User', 'idComercial', 'id');
    } 

}