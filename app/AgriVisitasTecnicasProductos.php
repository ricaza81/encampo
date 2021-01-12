<?php

namespace App;


use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Model;

use App\Productos;
//use App\AgriAgricultores;
use App\AgriVisitasTecnicas;

class AgriVisitasTecnicasProductos extends Model
{
    //
 protected $table = 'visitastec_productos';


         public function producto()
      {
        return $this->belongsTo('App\Productos', 'id_producto', 'id');
      }

       public function visita()
      {
        return $this->belongsTo('App\AgriVisitasTecnicas', 'id_vt', 'id');
      }

         public function valorizacion_producto($idpdto)
         {
              $result=AgriVisitasTecnicasProductos::where("id_producto","=",$idpdto)->get();
        if(isset($result)){

             $subtotal_valorizacion_pdto_visita=0;

             foreach($result as $resul){
              $subtotal_valorizacion_pdto_visita+=($resul->precio);  }

         return ($subtotal_valorizacion_pdto_visita);
        }
        else
        {
          return "sin definir";
        }
        }



        }