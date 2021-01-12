<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AgriAgricultores;
use App\Cultivos;
use App\User;
use App\Departamentos;

class ModAguacateVisitasempnd extends Model
{
    //
 protected $table = 'mod_agcte_fincas_visitas_sem_pdn';

    /*   public function delagricultor()
      {
        return $this->belongsTo('App\AgriAgricultores', 'id_agricultor', 'id');
      }*/
      
        public function delagricultor()
      {
        return $this->hasOne('App\AgriAgricultores', 'id', 'id_agricultor');
      }

              public function cultivo_finca()
      {
        return $this->hasOne('App\Cultivos', 'id', 'idCultivo');
      }

              public function departamento()
      {
        return $this->hasOne('App\Departamentos', 'id', 'id_ciudad');
      }

               public function ingresado_por()
      {
        return $this->hasOne('App\User', 'id', 'idUsuario');
      }

 
}