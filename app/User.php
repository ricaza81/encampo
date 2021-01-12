<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\TipoUsuario;
use App\TipoIntereses;
use App\Prospectos;
use App\Pais;
use App\Zonas;
use App\Publicaciones;
use App\Eventos;
use App\UsuariosEmpresas;
use App\AgriVisitasTecnicas;
use App\UsuarioConectado;
use DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $fillable = ['nombres', 'email', 'password','id','confirmed','idEmpresa','idSuscriptor','tipoUsuario','pais'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


        public function educacion()
      {
        return $this->hasMany('App\Educacion', 'idUsuario', 'id');
      }

              public function prospectos_relacion()
      {
        return $this->hasMany('App\Prospectos', 'idUsuario', 'id');
      }

  

      public function eventos()
      {
        return $this->hasMany('App\Eventos', 'idUsuario', 'id');
      }


 //       public function publicaciones()
 //     {
 //       return $this->hasMany('App\Publicaciones', 'idUsuario', 'id');
 //     }


        public function proyectos()
      {
        return $this->hasMany('App\Proyectos', 'idUsuario', 'id');
      }
      
      
            public function visitatecnica()
      {
        return $this->hasMany('App\AgriVisitasTecnicas', 'id_usuario', 'id');
      }

           public function vtaguacate()
      {
        return $this->hasMany('App\ModAguacateFincasVisitas', 'id_usuario', 'id');
      }
      
                 public function fincas()
      {
        return $this->hasMany('App\AgriFincas', 'idUsuario', 'id');
      }

                  public function cantcultivos($idusuario)
      {
        $resul=DB::table('agri_fincas')->where('idUsuario','=',$idusuario)->distinct('idCultivo')->count('idCultivo');
        if(isset($resul)){
         return ($resul);
        }
        else
        {
          return "sin definir";
        }
        }

                          public function cultivoprincipal($idusuario)
      {
        $resul1=DB::table('agri_fincas')->where('idUsuario','=',$idusuario)->latest()->first();
       
        if(isset($resul1)){

         $resul= $resul1->idCultivo;
         $cultivo=Cultivos::find($resul);
         return ($cultivo->cultivo);
        }
        else
        {
          return "sin definir";
        }
        }
      
            public function eventos_recordatorio()
      {
        $desde = date('Y-m-d H:m:s');
        $hasta = date('Y-m-d' . ' 23:59:59');        
        return $this->hasMany('App\Eventos', 'idUsuario', 'id')->where('idStatus', '<>', '3')->whereBetween('start',array($desde,$hasta));
      }
      
        /*(ORI)        public function visitas_recordatorio()
      {
        $desde = date('Y-m-d');
        $hasta = date('Y-m-d');        
       // return $this->hasMany('App\AgriVisitasTecnicas', 'idUsuario', 'id')->where('idStatus', '<>', '3')->whereBetween('start',array($desde,$hasta));
        return $this->hasMany('App\AgriVisitasTecnicas', 'id_usuario', 'id')->whereBetween('proxima_visita',array($desde,$hasta));
      }*/
      
                      public function visitas_recordatorio()
      {
        
        $desde = date('Y-m-d', strtotime('-2 day'));
        //$desde->modify('-10 day');
        $hasta = date('Y-m-d',strtotime('+20 day'));
        //$hasta->modify('+10 day');
       // return $this->hasMany('App\AgriVisitasTecnicas', 'idUsuario', 'id')->where('idStatus', '<>', '3')->whereBetween('start',array($desde,$hasta));
        return $this->hasMany('App\AgriVisitasTecnicas', 'id_usuario', 'id')->whereBetween('proxima_visita',array($desde,$hasta));
      }



          public function delpais()
      {
        return $this->hasOne('App\Pais', 'id', 'pais');
      }

          public function observacion_autor()
      {
        return $this->hasMany('App\Observaciones', 'idComercial', 'id');
      }




      public function scopeBusqueda($query,$pais,$dato="")
     {

            if($pais==0){ 
            $resultado= $query->where('nombres','like','%'.$dato.'%')
                              ->orWhere('apellidos','like', '%'.$dato.'%')
                               ->orWhere('email','like', '%'.$dato.'%');
            }
            else{
               
               //select * from users where pais = $pais  and (nombres like %$dato% or apellidos like %$dato%  or email like  %$dato% )
              $resultado= $query->where("pais","=",$pais)
                                  ->Where(function($q) use ($pais,$dato)  {
                                    $q->where('nombres','like','%'.$dato.'%')
                                      ->orWhere('apellidos','like', '%'.$dato.'%')
                                      ->orWhere('email','like', '%'.$dato.'%');       
                                   });

             }                     
        
        return  $resultado;
     }



     
      public function tipo($idtipo)
      {
        $resul=TipoUsuario::find($idtipo);
        if(isset($resul)){
         return $resul->nombre;
        }
        else
        {
          return "sin definir";
        }
        
      }

            public function interes($idinteres)
      {
        $resul=TipoIntereses::find($idinteres);
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

                public function empresa()
      {
        return $this->hasOne('App\UsuariosEmpresas', 'id', 'idEmpresa');
      }


}
