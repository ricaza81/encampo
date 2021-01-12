<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Publicaciones;
use App\TipoPublicaciones;
use App\Prospectos;
use App\Visitas;



class VisitasController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth');
    }

    
            //leccion 11

    public function form_observaciones_usuario($id){

       
      $usuario=Prospectos::find($id);
      //$observaciones= Visitas::join('users', 'users.id', '=', 'visitas.idComercial')->selectRaw('visitas.id as id,visitas.idUsuario as idUsuario,visitas.idComercial as idComercial,visitas.observacion as observacion,visitas.created_at as created_at,visitas.updated_at as update_at,CONCAT (users.nombres," ",users.apellidos) as asignado')->where("visitas.idUsuario","=",$usuario)->get();
      $observaciones= Visitas::join('users', 'users.id', '=', 'visitas.idComercial')
      ->selectRaw('visitas.id as id,visitas.idUsuario as idUsuario,visitas.idComercial as idComercial,visitas.observacion as observacion,visitas.created_at as created_at,visitas.updated_at as update_at,visitas.estado as estado,
        CONCAT (users.nombres," ",users.apellidos) as asignado')
      ->where("visitas.idUsuario","=",$id)->get();
      // $comerciales=User::all();
       //$observaciones= $usuario->observaciones();

       //$observaciones=Visitas::find($id);
       //$comercial=$comerciales->observacion_autor();
      
       return view("formularios.form_observaciones_prospecto")
       ->with("usuario",$usuario)
       ->with("observaciones",$observaciones);
     //  ->with("comerciales",$comerciales);
       //->with("comercial",$comercial);
       
    }

 
  public function agregar_observacion_prospecto(Request $request ){
         //funcion para agregar las observaciones de seguimiento de cada prospecto

           $data=$request->all();
           $observacion= new Visitas;
           $observacion->idUsuario= $data["id_usuario"];
           $observacion->idComercial= \Auth::user()->id;
           $observacion->observacion= $data["observacion"];
           $observacion->estado= $data["avance"];
           
           $resul= $observacion->save();
           
           if($resul)
           {
             return view("mensajes.msj_correcto")->with("msj","Observacion añadida correctamente");
               }
            else
        {
	         
           return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
    }
    }

    public function borrar_observacion($id){

       $observacion=Visitas::find($id);
       $resul=$observacion->delete();
        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Borrado correctamente");   
        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }

    }


       public function listado_publicaciones($id){

         $publicaciones=Publicaciones::paginate(25);
         $rutaarchivos= "../storage/archivos/";
         return view("listados.listado_publicaciones")
         ->with("publicaciones", $publicaciones)
         ->with("rutaarchivos", $rutaarchivos);      
       }

       public function descargar_publicacion($id){

         $publicacion=Publicaciones::find($id);
         $rutaarchivo= "../storage/archivos/".$publicacion->ruta;
         return response()->download($rutaarchivo);

       }

       public function users()
      {
        return $this->hasMany('App\User', 'idComercial', 'id');
      }

}