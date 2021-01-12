<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AgriVisitasTecnicasProductos;
use App\UsuariosEmpresas;

class Productos extends Model
{
     protected $table = 'productos';


         public function users()
      {
        return $this->hasMany('App\User', 'pais', 'id');
      }
      
               public function cantrecomendaciones($idproducto)
      {
        $resul=AgriVisitasTecnicasProductos::where("id_producto","=",$idproducto)->get();
        if(isset($resul)){
         return count($resul);
        }
        else
        {
          return "sin definir";
        }
        }
        
                    public function empresa()
      {
        return $this->belongsTo('App\UsuariosEmpresas', 'idEmpresa', 'id');
      }
}
