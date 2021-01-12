<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;
use App\AgriAgricultores;
use App\Cultivos;
use App\User;
use App\Departamentos;
use DB;

class ModAguacateFincas extends Model
{
    //
 use SyncsWithFirebase;
 protected $table = 'mod_agcte_fincas';

    /*   public function delagricultor()
      {
        return $this->belongsTo('App\AgriAgricultores', 'id_agricultor', 'id');
      }*/
      
      function initialize()
{
    // Create the Cloud Firestore client
    $db = new FirestoreClient();
    printf('Created Cloud Firestore client with default project ID.' . PHP_EOL);
}
      
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
        return $this->hasOne('App\Departamentos', 'id', 'id_depto');
      }

                 public function ciudad()
      {
        return $this->hasOne('App\Ciudades', 'id', 'id_ciudad');
      }

               public function ingresado_por()
      {
        return $this->hasOne('App\User', 'id', 'idUsuario');
      }

                  public function visitas()
      {
        return $this->hasOne('App\ModAguacateFincasVisitas', 'id', 'id_finca');
      }


                public function suma_acumulada_visitas($idfinca)
        {
              $result=ModAguacateFincasVisitas::where("id_finca","=",$idfinca)->get();
      
             $subtotal_visitas=count($result);

         
         return ($subtotal_visitas);
        }
      
                   public function suma_acumulada_pdn_arboles($idfinca)
        {

       // $idvt=visitas($idfinca);
       // $visita=ModAguacateFincasVisitas::where("id_finca","=",$idfinca)->get()->last();
       // $visita=ModAguacateFincasVisitas::where("id_finca","=",$idfinca)->get()->last();
       // $idvt=$visita->id;

      
        $result=ModAguacateVisitaarbolespnd::where("id_finca","=",$idfinca)->get();
     if(isset($result)){

             $subtotal_pdn_arboles=0;

             foreach($result as $resul){
              $subtotal_pdn_arboles+=($resul->numarboles*$resul->kg_arbol);  }

         return ($subtotal_pdn_arboles);
        }
        else
        {
          return "sin definir";
        }
        }

  /*                         public function suma_acumulada_pdn_arboles($idfinca)
        {

        //$idvt=ModAguacateFincasVisitas::where("id_finca","=",$idfinca)->get();
        $result=ModAguacateFincas::where("id","=",$idfinca)->get();
        if(isset($result)){

             $subtotal_pdn_arboles=0;

             foreach($result as $resul){
              $subtotal_pdn_arboles+=($resul->cantarboles);  }

         return ($subtotal_pdn_arboles);
        }
        else
        {
          return "sin definir";
        }
        }*/
       
 
}