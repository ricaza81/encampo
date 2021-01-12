<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Model;
use App\AgriAgricultores;
use App\AgriFincas;
use App\AgriVisitasTecnicasProductos;
use App\Cultivos;
use App\Productos;
use App\User;


class AgriVisitasTecnicas extends Model
{
    //
 protected $table = 'visitastecnicas';


        public function agricultor()
      {
        return $this->hasOne('App\AgriAgricultores', 'id', 'id_agricultor');
      }


        public function usuario()
      {
        return $this->hasOne('App\User', 'id', 'id_usuario');
      }

       public function finca()
      {
        return $this->hasOne('App\AgriFincas', 'id', 'id_finca');
      }

       public function cultivo()
      {
        return $this->hasOne('App\Cultivos', 'id', 'id_tipo_cultivo');
      }

      public function productos()
      {
        return $this->hasMany('App\Productos', 'id_producto', 'id');
      }
      
      
              public function suma_valorizacion_visita($idvt)
        {
              $result=AgriVisitasTecnicasProductos::where("id_vt","=",$idvt)->get();
        if(isset($result)){

             $subtotal_valorizacion_visita=0;

             foreach($result as $resul){
              $subtotal_valorizacion_visita+=($resul->precio);  }

         return ($subtotal_valorizacion_visita);
        }
        else
        {
          return "sin definir";
        }
        }



        }