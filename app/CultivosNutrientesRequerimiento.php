<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CultivosNutrientesRequerimiento extends Model
{
    //
 protected $table = 'cult_nutr_req_valor';

  		public function nutrientes()

		      {
		        return $this->hasMany('App\CultivosNutrientes', 'id','idNutriente');
		      }

		public function cultivo()

		      {
		        return $this->hasMany('App\Cultivos', 'id','idCultivo');
		      }

}