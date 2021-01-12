<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prospectos;
use App\User;

class Publicaciones extends Model
{
    //
 protected $table = 'publicaciones';

  public function user()
    {
        return $this->belongsTo('App\Prospectos', 'idUsuario', 'id');
    }

    public function publicado_por()
    {
        return $this->belongsTo('App\User', 'idUserUpload', 'id');
    }

}