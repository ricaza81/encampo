<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eventos;
use App\User;
use App\Visitas;
use App\TipoStatus;
use App\ProspectosAsignacion;
use App\Cultivos;
use App\Pais;
use App\Departamentos;


class Prospectos extends Model
{
    //
 protected $table = 'prospectos';
 //$timestamp=false;

 

         public function users()
      {
        return $this->hasMany('App\Interes', 'interesado', 'id');
      }

          public function interested()
      {
        return $this->hasOne('App\Interes', 'id', 'interesado');
      }

                public function status()
      {
        return $this->hasOne('App\TipoStatus', 'id', 'stage');
      }

      public function delasesor()
      {
        return $this->hasOne('App\User', 'id', 'idUsuario');
            }


       public function delcomercial()
      {
        return $this->belongsTo('App\User', 'id', 'idUsuario');
      }

       public function departamento()
      {
        return $this->belongsTo('App\Departamentos', 'idCiudad', 'id');
      }


            public function prospectos($id)
      {
        return Prospectos::where('idUsuario','=',$id)->get();
      }


           public function scopeBusquedad($query,$dato="")
           

            //if($pais==0)
            { 
            $resultado= $query->where('nombres','like','%'.$dato.'%')
                              ->orWhere('apellidos','like', '%'.$dato.'%')
                               ->orWhere('email','like', '%'.$dato.'%');
            
            //else{
               
               //select * from users where pais = $pais  and (nombres like %$dato% or apellidos like %$dato%  or email like  %$dato% )
              //$resultado= $query->where("pais","=",$pais)
                //                  ->Where(function($q) use ($pais,$dato)  {
                //                    $q->where('nombres','like','%'.$dato.'%')
                //                      ->orWhere('apellidos','like', '%'.$dato.'%')
                //                      ->orWhere('email','like', '%'.$dato.'%');       
                //                   });

                                  
        
        return  $resultado;
     }

        public function publicaciones()
      {
        return $this->hasMany('App\Publicaciones', 'idUsuario', 'id');
      }

    public function observaciones()
      {
        return $this->hasMany('App\Visitas', 'idUsuario', 'id');
      //  return $this->hasMany('App\Visitas', 'idComercial', 'id');
      }
    public function eventos()
      {
        return $this->hasMany('App\Eventos', 'idUsuario', 'id');
      }

  public function comercial()
  {
        

        $usuario=User::all();
    return view('formularios.form_observaciones_prospecto')->with("usuario",$usuario);
  }

  public function asignado($idComercial)
      {
        $resul=User::find($idComercial);
        if(isset($resul)){
         return $resul->nombres;
        }
        else
        {
          return "sin definir";
        }
        
      }

     public function autor()
    {
        return $this->hasMany('App\User', 'idComercial', 'id');
    } 

      public function tipointeres($idtipo)
      {
        $resul=Interes::find($idtipo);
        if(isset($resul)){
         return $resul->nombre;
        }
        else
        {
          return "sin definir";
        }
        
      }

      public function tipostatus($idstatus)
      {
        $resul=TipoStatus::find($idstatus);
        if(isset($resul)){
         return $resul->nombre;
        }
        else
        {
          return "sin definir";
        }
        
      }


//ZONAS DE USUARIOS
        public function zona()
      {
        return $this->hasOne('App\Zonas', 'id', 'idZona');
      }


//CULTIVOS PROSPECTOS
        public function cultivo()
      {
        return $this->hasOne('App\Cultivos', 'id', 'idCultivo');
      }
      
  /*           public function cultivo()
      {
        return $this->belongsTo('App\Cultivos', 'id', 'idCultivo');
      }*/

        public function pais()
      {
        return $this->hasOne('App\Pais', 'id', 'idPais');
      }


              public function seguimientos($idproyecto)
      {
        $resul=Visitas::where("idUsuario","=",$idproyecto)->where("estado","=",'No')->get();
        if(isset($resul)){
         return count($resul);
        }
        else
        {
          return "sin definir";
        }
        }


                    public function fechalastseguimiento($idproyecto)
      {
     
         $result=Visitas::where("idUsuario","=",$idproyecto)->orderBy('id', 'DESC')->first();
         $proyecto=Prospectos::find($idproyecto);
         $estado=$proyecto->stage;
         $contador=count($result);


if($estado==7)  {

   return  "Finalizado"; } 

if ($estado!=7 AND $contador>0)  {

   return $result->created_at->diffForHumans(); }

if ($estado!=7 AND $contador==0)  {

   return  "Sin Seguimiento"; } 




        
      }

       public function rtc_asignado($idproyecto)
      {
         $resul=ProspectosAsignacion::where("idProspecto","=",$idproyecto)->get()->first();
         $proyecto=Prospectos::find($idproyecto);
         $estado=$proyecto->stage;
         $contador=count($resul);
          if(isset($resul)){
         return $resul->compartidocon->nombres." ".$resul->compartidocon->apellidos;
        }
        else
        {
          return "Aún sin asignación";
        }
        }

       }



//}




