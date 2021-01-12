<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;
use App\AgriAgricultores;
use App\Cultivos;
use App\User;
use App\Departamentos;

class ModAguacateFincasVisitas extends Model
{
    //
 use SyncsWithFirebase;
 protected $table = 'mod_agcte_fincas_visitas';

    /*   public function delagricultor()
      {
        return $this->belongsTo('App\AgriAgricultores', 'id_agricultor', 'id');
      }*/
      
        public function delagricultor()
      {
        return $this->hasOne('App\AgriAgricultores', 'id', 'id_agricultor');
      }

              public function usuario()
      {
        return $this->hasOne('App\User', 'id', 'id_usuario');
      }

              public function cultivo_finca()
      {
        return $this->hasOne('App\Cultivos', 'id', 'idCultivo');
      }

              public function departamento()
      {
        return $this->hasOne('App\Departamentos', 'id', 'id_ciudad');
      }

       public function finca()
      {
        return $this->hasOne('App\ModAguacateFincas', 'id', 'id_finca');
      }

               public function ingresado_por()
      {
        return $this->hasOne('App\User', 'id', 'id_usuario');
      }

                public function suma_acumulada_arboles($idvt)
        {
              $result=ModAguacateVisitaarbolespnd::where("id_visita","=",$idvt)->get();
        if(isset($result)){

             $subtotal_arboles=0;

             foreach($result as $resul){
              $subtotal_arboles+=($resul->numarboles);  }

         return ($subtotal_arboles);
        }
        else
        {
          return "sin definir";
        }
        }
}