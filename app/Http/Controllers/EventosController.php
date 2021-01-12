<?php namespace App\Http\Controllers;

use App\User;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Excel;
use App\Pais;
use App\TipoUsuario;
use App\Educacion;
use App\TipoEducacion;
use App\Publicaciones;
use App\TipoPublicaciones;
use App\Proyectos;
use App\Prospectos;
use App\TipoIntereses;
use App\Visitas;
use App\Http\Requests;
use App\Eventos;


class EventosController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
   public function __construct()
	{
		$this->middleware('auth');
	}


	   public function form_calendario()
	{
        

        $tiposusuario=TipoUsuario::all();
        $idusuario=\Auth::user()->id;
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
   
     	
        return view('formularios.form_calendario')
        ->with("tiposusuario",$tiposusuario)
        ->with("idusuario",$idusuario)
        ->with("usuario",  $usuarioactual)
       // ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("fecha",$fecha);
	 
	}

public function agregar_nuevo_evento_prospecto(Request $request)
	{

		$data=$request->all();
    $usuario= new Eventos;
		$usuario->name  =  $data["titulo"];
		$usuario->description=$data["descripcion"];
		$usuario->start=$data["fechainicio"];
		$usuario->end=$data["fechafin"];
		$idUsuario=\Auth::user()->id;
        $idProspecto=$pais()->id;
		$resul= $usuario->save();

		if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Evento Registrado Correctamente");   
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}
	}

   public function borrar_evento($id){

       $evento=Eventos::find($id);
       $resul=$evento->delete();
        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Borrado correctamente");   
        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }
    }

  public function prospecto_eventos($id){

       //$prospecto=Prospectos::where("idUsuario","=",$id)->get();
       
       $fecha=date('Y-m-d g:ia');
       $usuario=Prospectos::find($id);
       $tipopublicaciones=Eventos::where("idProspecto","=",$id)->get();
     //  $publicaciones= $usuario->eventos();
    //   $nombre_documento=Publicaciones::nombre_documento();
      // $rutaarchivos= "../storage/archivos/";

       return view("formularios.form_eventos_prospecto")
       ->with("usuario",$usuario)
       ->with("tipopublicaciones", $tipopublicaciones)
    //   ->with("publicaciones",$publicaciones)
       ->with("fecha",$fecha);
       //->with("rutaarchivos",$rutaarchivos)
      // ->with("nombre_documento",$nombre_documento);
    	
           }
 
public function prospecto_eventos_list($id){

       $fecha=date('Y-m-d g:ia');
       $usuario=Prospectos::find($id);
       $tipopublicaciones= Eventos::leftjoin('prospectos', 'prospectos.id', '=', 'events.idProspecto')
       ->selectRaw('events.id as id,events.idUsuario as idUsuario,events.idProspecto as idProspecto,events.idAsignacion as idAsignacion,events.title as title,events.name as name,events.description as description,events.start as start,events.end as end,events.created_at as created_at,events.updated_at as updated_at,start as f_inicio, end as f_fin,CONCAT (prospectos.nombres," ",prospectos.apellidos) as nombreprospecto')
       ->where("events.idProspecto","=",$id)
       ->leftjoin('users', 'users.id', '=', 'events.idUsuario')
        ->selectRaw('users.nombres as nombresasesor ')
       ->where("events.idProspecto","=",$id)

       // ->leftjoin('users', 'users.id', '=', 'events.idUsuario')
       // ->selectRaw('users.nombres as nombresasignado ')
       //->where("events.idProspecto","=",$id)

       ->get();
return view("formularios.form_eventos_prospecto")
->with("usuario",$usuario)
->with("tipopublicaciones", $tipopublicaciones)
->with("fecha",$fecha);

    }       

    public function form_editar_evento($id)
  {
    //funcion para cargar los datos de cada usuario en la ficha
    
    $usuarios=User::all();
    $usuario=Eventos::find($id);
    $contador=count($usuario);
    $asesor=$usuario->idUsuario;
    //$tiposusuario=TipoUsuario::all();
    
    if($contador>0){          
            return view("formularios.form_editar_evento")
                   ->with("usuario",$usuario)
                     ->with("usuarios",$usuarios)
                   ->with("asesor",$asesor);   
    }
    else
    {            
            return view("mensajes.msj_rechazado")->with("msj","el evento con ese id no existe o fue borrado");  
    }
  }

public function form_editar_eventos($id){
        $fecha=date('Y-m-d g:ia');
      //  $idusuario=\Auth::user()->id;
       $usuario=Eventos::find($id);
       $contador=count($usuario);
       $usuarios=User::all();
       $events= Eventos::
       leftjoin('prospectos', 'prospectos.id', '=', 'events.idProspecto')
       ->selectRaw('events.id as id,events.idUsuario as idUsuario,events.idProspecto as idProspecto,events.title as title,events.name as name,events.description as description,events.start as start,events.end as end,events.created_at as created_at,events.updated_at as updated_at,start as f_inicio, end as f_fin,CONCAT (prospectos.nombres," ",prospectos.apellidos) as nombreprospecto')
       ->where("events.id","=",$id)
       
       ->leftjoin('users', 'users.id', '=', 'events.idAsignacion')
        ->selectRaw('CONCAT(users.nombres," ",users.apellidos) as por ')
       ->where("events.id","=",$id)
       ->get();

 //      ->leftjoin('users', 'users.id', '=', 'events.idAsignacion')
 //       ->selectRaw('CONCAT(users.nombres," ",users.apellidos) as nombresasesor ')
 //      ->where("events.idUsuario","=",$idusuario)


  if($contador>0){          
            return view("formularios.form_editar_evento")
                   ->with("usuario",$usuario)
                     ->with("usuarios",$usuarios)
                     ->with("fecha",$fecha)
                   //->with("tipopublicaciones",$tipopublicaciones);
                   ->with("events",$events);   
    }
    else
    {            
            return view("mensajes.msj_rechazado")->with("msj","el evento con ese id no existe o fue borrado");  
    }
  }
       
public function calendario_usuario_respuesta () {

        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $msj="";


return view('formularios.calendario_usuario_respuesta')
    ->with("usuario",  $usuarioactual)
    ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("msj",$msj)
        ->with("fecha",$fecha);

  }

}