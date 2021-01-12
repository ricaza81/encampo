<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AgriVisitasTecnicas;

class UsuariosEmpresas extends Model
{
    //
 protected $table = 'w00_empresas';

      public function usuariosempresa()

      {
        return $this->hasMany('App\User', 'id','idEmpresa');
      }
 
 public function visitastecnicasconsolidado()
      {
        return $this->hasMany('App\AgriVisitasTecnicas', 'id_empresa','id');
      }
      
 public function visitastecnicasenterprise()
        {
          $idempresa=\Auth::user()->idEmpresa;
          $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
          $visitastecnicas=AgriVisitasTecnicas::where('id_usuario','=',$usuariosempresa)->get();
          //    return ($visitastecnicas);
                                          }
 public function fincasgctempresa()
      {
        return $this->hasMany('App\ModAguacateFincas', 'id_empresa','id');
      }

 public function visitasagctempresa()
      {
        return $this->hasMany('App\ModAguacateFincasVisitas', 'id_empresa','id');
      }
    

}