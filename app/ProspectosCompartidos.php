<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eventos;
use App\User;
use App\Visitas;
use App\TipoStatus;
use App\Prospectos;



class ProspectosCompartidos extends Model
{
    //
 protected $table = 'prospectos_asignacion';
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
        return $this->hasOne('App\User', 'id', 'idUsuarioCompartido');
            }

            public function proyecto()
      {
        return $this->hasOne('App\Prospectos', 'id', 'idProspectoCompartido');
            }


       public function delcomercial()
      {
        return $this->belongsTo('App\User', 'idUsuario', 'id');
      }

       public function compartidocon()
      {
        return $this->belongsTo('App\User', 'idrtcasignado', 'id');
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
        return $this->hasMany('App\Eventos', 'idProspecto', 'id');
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

      public function tipostatus($idtipo)
      {
        $resul=TipoStatus::find($idtipo);
        if(isset($resul)){
         return $resul->nombre;
        }
        else
        {
          return "sin definir";
        }
        
      }

      public function orden()
      {
        return $this->hasOne('App\Order', 'idProyecto', 'id');
            }

      public function cliente()
      {
        return $this->hasOne('App\User', 'id', 'idUsuario');
            }


 public function empresa_administradora()
      {
        return $this->belongsTo('App\Empresa', 'id', 'idEmpresaPropietaria');
      }

  public function empresa_proyecto()
      {
        return $this->hasOne('App\Empresa', 'id', 'idEmpresa');
      }     


}





