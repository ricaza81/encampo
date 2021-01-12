<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoUsuario;
use App\TipoIntereses;
use App\Prospectos;
use App\Publicaciones;
use App\Eventos;
use App\User;

class AgroCensoDane extends Model
{
    //
 protected $table = 'dane_censo';

  public function user()
    {
        return $this->belongsTo('App\Prospectos', 'idUsuario', 'id');
    }

     public function autor()
    {
        return $this->belongsTo('App\User', 'idComercial', 'id');
    } 

}