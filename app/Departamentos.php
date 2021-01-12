<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Firebase\SyncsWithFirebase;

class Departamentos extends Model
{
    //
   use SyncsWithFirebase;
 protected $table = 'departamentos';

 
  public function zona()
    {
        return $this->hasOne('App\Zonas', 'id', 'idZona');
    } 

    

}