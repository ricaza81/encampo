<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prospectos;
use App\User;
use App\Eventos;
use App\EventosStatus;

class Eventos extends Model
{
    //
 protected $table = 'events';

// protected $fillable = ['idUsuario', 'idProspecto','title','name','description','start','end','created_at','update_at'];




  public function asignado()
    {
        return $this->hasOne('App\User', 'id', 'idAsignacion');
    }   

 public function all_prospects()

 {
	return $this->belongsTo('App\Prospectos', 'idProspecto', 'id');
 }

 public function asesor()
    {
        return $this->hasOne('App\User', 'id', 'idUsuario');
    }

    public function status()
      {
        return $this->belongsTo('App\EventosStatus', 'idStatus', 'id');
      }


}