<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AgriFincas;
use App\CultivosNutrientesRequerimiento;

class Cultivos extends Model
{
    //
 protected $table = 'listado_cultivos';

              public function cultivo()
      {
        return $this->hasOne('App\AgriFincas', 'id', 'id_cultivo');
      }

                  public function cultivo_nutrientes()
      {
        return $this->hasOne('App\CultivosNutrientesRequerimiento', 'id', 'idCultivo');
      }
 
}