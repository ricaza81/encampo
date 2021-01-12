<?php 

namespace App\Http\Controllers;

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
use App\TipoStatus;
use App\Visitas;
use App\AgriVisitasTecnicas;
use App\Http\Requests;
use App\Eventos;
use App\Interes;
use App\Cultivos;
use App\Zonas;
use App\Canales;
use App\Departamentos;
use DB;
use Carbon\Carbon;
use Mail;








class UsuariosController extends Controller {

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
    Carbon::setLocale('es');
	}




   public function form_nuevo_usuario()
	{
          $fecha=date('Y-m-d');
          $idusuario=\Auth::user()->id;
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $usuarioactual=\Auth::user();
          $tiposusuario=TipoUsuario::all();
          $zonas=Zonas::all();

	
		return view('formularios.form_nuevo_usuario')
		->with("tiposusuario",$tiposusuario)
		->with("usuario",  $usuarioactual)
		->with("events_day",$events_day)
   	->with("zonas",$zonas)
        ->with("fecha",$fecha);   
	}
	

	public function events_prospectos($id){
        $idusuario=\Auth::user()->id;
       $events= Eventos::leftjoin('prospectos', 'prospectos.id', '=', 'events.idProspecto')->selectRaw('events.id as id,events.idUsuario as idUsuario,events.idProspecto as idProspecto,events.title as title,events.name as name,events.description as description,events.start as start,events.end as end,events.created_at as created_at,events.updated_at as updated_at,start as f_inicio, end as f_fin,CONCAT (prospectos.nombres," ",prospectos.apellidos) as nombreprospecto')->where("events.idUsuario","=",$idusuario)->get();
       //$events= Prospectos::rightjoin('events', 'events.idProspecto', '=', 'prospectos.id')->selectRaw('events.id as id,events.idUsuario as idUsuario,events.idProspecto as idProspecto,events.title as title,events.name as name,events.description as description,events.start as start,events.end as end,events.created_at as created_at,events.updated_at as updated_at,start as f_inicio, end as f_fin,CONCAT (prospectos.nombres," ",prospectos.apellidos) as nombreprospecto')->where("events.idUsuario","=",$idusuario)->get();
       //$events=Eventos::selectRaw('events.id as id,events.idUsuario as idUsuario,events.idProspecto as idProspecto,events.title as title,events.name as name,events.description as description,events.start as start,events.end as end,events.created_at as created_at,events.updated_at as updated_at,start as f_inicio, end as f_fin')->where("events.idUsuario","=",$idusuario)->where("idUsuario","=",$idusuario)->get();
       // $events=Eventos::get();
       // $usuarios= Prospectos::where("idUsuario","=",$idusuario)->get();
        return $events->toJson();
        return view('formularios.form_calendario')
       // return view('listados.listado_mis_eventos')
        ->with("events",$events);
       }

/*	public function events_prospectos_admin($id){
        
      //  $events= Eventos::where("idUsuario","=",$id)->get();
       $events= Eventos::leftjoin('prospectos', 'prospectos.id', '=', 'events.idProspecto')->selectRaw('events.id as id,events.idUsuario as idUsuario,events.idProspecto as idProspecto,events.title as title,events.name as name,events.description as description,events.start as start,events.end as end,events.created_at as created_at,events.updated_at as updated_at,start as f_inicio, end as f_fin,CONCAT (prospectos.nombres," ",prospectos.apellidos) as nombreprospecto')->where("events.idUsuario","=",$id)->get();
       // $events=Eventos::get();
        return $events->toJson();
       }

    	public function prospectos_asesor($id)
    {
       
    //  $prospecto=Prospectos::where("idUsuario","=",$id)->get();
      $prospecto=Prospectos::all();
        return response ()->json($prospecto);
      
         	}

    	public function getprospectos(Request $request, $id){

    		if ($request->ajax()) {
    			$prospectos=Prospectos::prospectos($id);
    			return response()->json($prospectos);
    		}
       
   }   */
   
	public function events_prospectos_admin($id){
        
      //  $events= Eventos::where("idUsuario","=",$id)->get();
    $fecha=date('Y-m-d');
       $events= AgriVisitasTecnicas::leftjoin('agri_agricultores', 'agri_agricultores.id', '=', 'visitastecnicas.id_agricultor')->selectRaw('visitastecnicas.id as id,visitastecnicas.id_usuario as idUsuario,visitastecnicas.id_agricultor as idProspecto,agri_agricultores.agricultor as title,visitastecnicas.id_agricultor as name,visitastecnicas.id_empresa as description,visitastecnicas.proxima_visita as start,visitastecnicas.proxima_visita as end,visitastecnicas.created_at as created_at,visitastecnicas.updated_at as updated_at,CONCAT (agri_agricultores.agricultor," ",agri_agricultores.agricultor) as nombreprospecto')->where("visitastecnicas.id_usuario","=",$id)->where('proxima_visita','>=',$fecha)->get();
       // $events=Eventos::get();
        return $events->toJson();
       }


public function listado_mis_eventos(){
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $usuarioactual=\Auth::user();

        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        return view('listados.listado_mis_eventos')
       
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("usuario",  $usuarioactual)
        ->with("fecha",$fecha);
  /*     $events= Eventos::
       leftjoin('prospectos', 'prospectos.id', '=', 'events.idProspecto')
       ->selectRaw('events.id as id,events.idUsuario as idUsuario,events.idProspecto as idProspecto,events.idStatus as idStatus,events.title as title,events.name as name,events.description as description,events.start as start,events.end as end,events.created_at as created_at,events.updated_at as updated_at,start as f_inicio, end as f_fin,CONCAT (prospectos.nombres," ",prospectos.apellidos) as nombreprospecto')
       ->where("events.idUsuario","=",$idusuario)
       
       ->leftjoin('users', 'users.id', '=', 'events.idAsignacion')
        ->selectRaw('CONCAT(users.nombres," ",users.apellidos) as por ')
       ->where("events.idUsuario","=",$idusuario)     
       ->get();

        return view('listados.listado_mis_eventos')
       
        ->with("events",$events)
        ->with("fecha",$fecha); */



       }


  //  }   

	public function form_nuevo_prospecto()
		{
         
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
		
        
		return view('formularios.form_nuevo_prospecto')
		->with("usuario",  $usuarioactual)
		->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

	}
	
	    public function agricultor_existe()
    {
         
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
    
        
    return view('formularios.agricultor')
    ->with("usuario",  $usuarioactual)
    ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

  }

		public function datepicker()
		{
        

        //$usuarioactual=\Auth::user();
		return view('formularios.datepicker');
	}




	public function listado_usuarios()
    {
        $msj="";
        $usuario_actual=\Auth::user();
        $usuario_empresa=$usuario_actual->idEmpresa;
        //$usuarios=User::all();
        $usuarios=User::where('idEmpresa','=',$usuario_empresa)->get();
        $paises=Pais::all();
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);


        return view('listados.listado_usuarios')
        ->with("paises", $paises )
        ->with("usuarios", $usuarios )
        ->with("usuario", $usuarioactual )
      	->with("usuario_actual",  $usuario_actual)
	    	->with("events",$events)
        ->with("events_day",$events_day)
        ->with("fecha",$fecha)
        ->with("msj",$msj);
	}

	public function listado_comercial()
    {
        $usuarioactual=\Auth::user();
        $idusuario=$usuarioactual->id;
        $usuarios= User::find($idusuario);  
        $paises=Pais::all();
                  $fecha=date('Y-m-d');
          $idusuario=\Auth::user()->id;
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
		

        return view('comercial.listado_usuario_comercial')
        ->with("paises", $paises )
        ->with("usuario", $usuarios )
        ->with("usuario_actual", $usuarioactual )
        	//	->with("events",$events)
        ->with("events_day",$events_day)
        ->with("fecha",$fecha); 
	}

        public function departamentos($id)
    {
       
       $zona=Departamentos::where("id_pais","=",$id)->get();
      //$prospecto=User::all();
        return response ()->json($zona);
      
          }

            public function datos_departamento($id)
    {
       
       $zona=Departamentos::where("id","=",$id)->get();
      //$prospecto=User::all();
        return response ()->json($zona);
      
          }


           public function email_jz($id)
    {
       $email_jz=Zonas::where("id","=",$id)->get();
      //$prospecto=User::all();
        return response ()->json($email_jz);

      
          }     

        public function pais_departamentos($id)
    {
       
       $departamentos=Departamentos::where("id","=",$id)->get();
      //$prospecto=User::all();
        return response ()->json($departamentos);
      
          }


function listado_prospectos_comercial()
    { 
          $idusuario=\Auth::user()->id;
          $prospectos= Prospectos::where("idUsuario","=",$idusuario)->get();
          $msj="";
          $asesor=User::all();
          $seguimientos=Visitas::where("idComercial","=",$idusuario)->get();
          $finalizados=Prospectos::where("idUsuario","=",$idusuario)->where("stage","=",11)->get();
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');
          $idusuario=\Auth::user()->id;
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          
          return view("listados.listado_prospectos_comercial")
          ->with("msj",$msj)
          ->with("prospectos",$prospectos)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
          ->with("asesor",$asesor)
          ->with("usuario", $usuarioactual )
     //	  ->with("events",$events)
          ->with("events_day",$events_day)
          ->with("fecha",$fecha);
    }

function listado_prospectos_zona()
    { 
          $idUsuario=\Auth::user()->id;
          $idZona=\Auth::user()->idZona;
          $prospectos= Prospectos::where("idZona","=",$idZona)->get();
          $msj="";
          $asesor=User::all();
    //      $seguimientos=Visitas::where("idComercial","=",$idusuario)->get();
    //      $finalizados=Prospectos::where("idUsuario","=",$idusuario)->where("stage","=",11)->get();
    //      $cant_proyectos=count($prospectos);
    //      $cant_seguimientos=count($seguimientos);
    //      $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');
          $idusuario=\Auth::user()->id;
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          
          return view("listados.listado_prospectos_zona")
          ->with("msj",$msj)
          ->with("prospectos",$prospectos)
    //      ->with("cant_proyectos",$cant_proyectos)
    //      ->with("cant_seguimientos",$cant_seguimientos)
    //      ->with("cant_finalizados",$cant_finalizados)
          ->with("asesor",$asesor)
          ->with("usuario", $usuarioactual )
     //   ->with("events",$events)
          ->with("events_day",$events_day)
          ->with("fecha",$fecha);
    }


function listado_todos_prospectos_comercial()
    { 
          //$idusuario=\Auth::user()->id;
          $msj="";
          $asesor=User::all();
          $prospectos=Prospectos::all();
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
      //    $areas=Prospectos::sum($numero_hectareas);
          $areas = DB::table('prospectos')->sum('numero_hectareas');
      //    $total_areas=$areas->sum;

          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');
          $idusuario=\Auth::user()->id;
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
        //  $fecha_insercion=$prospectos->created_at;
       //   $howOldAmI = Carbon::createFromDate($fecha_insercion)->age;
          $officialDate = Carbon::now()->toRfc2822String();
		

       
          return view("listados.listado_todos_prospectos_comercial")

          ->with("msj",$msj)
          ->with("prospectos",$prospectos)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
          ->with("asesor",$asesor)
          ->with("date",$date)
        //  ->with("howOldAmI",$howOldAmI)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
     //	  ->with("events",$events)
          ->with("events_day",$events_day)
       // ->with("total_areas",$total_areas)
          ->with("areas",$areas)
          ->with("fecha",$fecha);
 
    }



	//presenta el formulario para nuevo usuario
	public function agregar_nuevo_usuario(Request $request)
	{

		$data=$request->all();

           $reglas = array('nombres' => 'required',
        	            'apellidos' => 'required',
        	            'pais'=>   'required',
        	            'ciudad' => 'required',
        	            'email' => 'required|Email|Unique:users',
        	           // 'empresa' => 'required',
        	            'ocupacion' => 'required',
        	            'tipousuario' => 'required|Numeric|min:1|max:3',
        	            );
        $mensajes= array('nombres.required' =>  'Ingresar Nombres es obligatorio',
        	             'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
        	             'pais.required' =>  'el pais es obligatorio',
        	             'ciudad.required' =>  'Ingresar una ciudad es obligatorio',
        	             'ciudad.alpha' =>  'la ciudad no puede contener numeros en su nombre',
        	             'email.required' =>  'Ingresar un email es obligatorio',
        	             'email.email' =>  'el email debe tener un formato válido',
        	             'email.unique' =>  'el email debe ser unico en la base de datos',
        	          //   'institucion.required' =>  'Ingresar una institucion es obligatorio',
        	             'ocupacion.required' =>  'Ingresar la ocupacion es obligatorio',
        	             'tipousuario.numeric' =>  'Ingresar un tipo de usuario valido ides entre 1 y 2',
        	             );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
        	 {
			 $errores = $validacion->errors(); 

          $fecha=date('Y-m-d');
          $idusuario=\Auth::user()->id;
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $usuarioactual=\Auth::user();
          $tiposusuario=TipoUsuario::all();
          $msj=""; 
          $paises=Pais::all();
          $zonas=Zonas::all();
  
 
	
		return view('formularios.form_nuevo_usuario')
		->with("tiposusuario",$tiposusuario)
		->with("usuario",  $usuarioactual)
		->with("events_day",$events_day)
   //	->with("events",$events)
		->with("msj","Existen errores de validación")
    ->with("errors",$errores)
    ->with("fecha",$fecha)
    ->with("zonas",$zonas)
    ->with("paises",$paises);


    }


   	$usuario= new User;
		$usuario->nombres  =  $data["nombres"];
		$usuario->apellidos=$data["apellidos"];
		$usuario->pais=$data["pais"];
		$usuario->ciudad=$data["ciudad"];
		$usuario->email=$data["email"];
		$usuario->institucion=$data["institucion"];
		$usuario->ocupacion=$data["ocupacion"];
    $usuario->idZona=$data["zona"];
    $usuario->idEmpresa=\Auth::user()->idEmpresa;
    $usuario->idSuscriptor=18;
		$usuario->tipoUsuario=$data["tipousuario"];
		$usuario->password=bcrypt($data["password"]);

		$resul= $usuario->save();

		$usuarioactual=\Auth::user();
    //$usuarios= User::paginate(25);
        $usuario_empresa=$usuarioactual->idEmpresa;
        //$usuarios=User::all();
        $usuarios=User::where('idEmpresa','=',$usuario_empresa)->get();
    $paises=Pais::all();
    //$usuarioactual=\Auth::user();
    //$documentos=Conocimiento::all();
    //$cant_documentos=count($documentos);
    $nombre=$data["nombres"];
    $apellido=$data["apellidos"];
    $fecha=date('Y-m-d');
    $idusuario=\Auth::user()->id;
    $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
    $events_day=count($events);
		
  

    return view('listados.listado_usuarios')
    ->with("paises", $paises )
    ->with("usuarios", $usuarios )
    ->with("usuario_actual", $usuarioactual )
    ->with("msj","El Usuario " .$nombre." ".$apellido." se registro correctamente")
    //->with("cant_documentos",$cant_documentos)
    ->with("usuario",  $usuarioactual)
  	->with("events",$events)
    ->with("events_day",$events_day)
    ->with("fecha",$fecha);



	/*	if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Usuario Registrado Correctamente");   
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}*/
	}


            public function agregar_lead_landing(Request $request)
    {
        $data=$request->all();
          $prospecto= new Prospectos;
        $prospecto->nombres  =  $data["name"];
         $prospecto->email  =  $data["email"];
         $resul= $prospecto->save();


        return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
    }


//presenta form para nuevo prospecto
		public function agregar_nuevo_prospecto(Request $request)
	{

		$data=$request->all();

           $reglas = array('nombres' => 'required',
                      'apellidos' => 'required',
                      'departamento' => 'required|Numeric|min:1',
                      'email' => 'required|Email|Unique:prospectos',
                      'telefono' => 'required',
                      );
        $mensajes= array('nombres.required' =>  'Ingresar Nombres es obligatorio',
                       'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                       'email.required' =>  'Ingresar un email es obligatorio',
                       'email.email' =>  'el email debe tener un formato válido',
                       'email.unique' =>  'El email ya existe',
                       'telefono.required' => 'Debe Ingresar un teléfono',
                       'departamento.required' => 'Por favor selecciona un departamento',
                         'departamento.numeric' =>  'Selecciona un departamento'
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
       $errores = $validacion->errors(); 

        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $msj="";
        $paises=Pais::all();
        $departamentos=Departamentos::all();
   
       
    return view('formularios.form_nuevo_prospecto')
    ->with("usuario",  $usuarioactual)
    ->with("events",$events)
    ->with("paises",$paises)
    ->with("zonas",$zonas)
    ->with("canales",$canales)
    ->with("cultivos",$cultivos)
    ->with("events_day",$events_day)
    ->with("tipointeres",$tipointeres)
    ->with("fecha",$fecha)
    ->with("errors",$errores)
    ->with("status",$status)
     ->with("departamentos",$departamentos)
    ->with("msj","Existen errores de validación");

     }

 
    $prospecto= new Prospectos;
		$prospecto->nombres  =  $data["nombres"];
		$prospecto->apellidos=$data["apellidos"];
		$prospecto->email=$data["email"];
		$prospecto->telefono=$data["telefono"];
		$prospecto->interesado=$data["interesado"];
		$prospecto->stage=$data["stage"];
    $prospecto->idPais=$data["pais"];
    $prospecto->idCiudad=$data["departamento"];
    $prospecto->idCultivo=$data["cultivo"];
    $prospecto->idFuente=$data["canal"];
    $prospecto->idZona=$data["zona"];
		$prospecto->nombres_secundario=$data["nombres_secundario"];
		$prospecto->apellidos_secundario=$data["apellidos_secundario"];
		$prospecto->email_secundario=$data["email_secundario"];
		$prospecto->phone_secundario=$data["phone_secundario"];
		$prospecto->observaciones=$data["observaciones"];
    $prospecto->numero_hectareas=$data["hectareas"];
		$idUsuario=\Auth::user()->id;
		$prospecto->idUsuario=$idUsuario;
		$resul= $prospecto->save();

  //Variables para email 
  
/*  $asunto="LEAD Asignado automaticamente";
  $idZona=$data["zona"];
  //$usuario=Zonas::find($idZona);
  $usuario=Zonas::where("id","=",$idZona)->get()->first();
  $email_usuario=$usuario->mail_jz;
  //$proyecto=Prospectos::find($id_proyecto);
  $nombre_prospecto=$data["nombres"];
  $destinatario=$usuario->mail_jz;
 
   $data = array('email_usuario' => $email_usuario,'nombre_prospecto' => $nombre_prospecto,'prospecto' => $prospecto);
    Mail::send('correo.plantilla_autoemail', $data, function ($message) use ($asunto,$destinatario) {
        $message->from('mercadeo@cosmoagro.com', 'LEADS Cosmoagro');
        $message->to($destinatario)
        ->cc('ricardo.zambrano@cosmoagro.com','andres.parra@cosmoagro.com')->subject($asunto);
          });
*/



$usuarioactual=\Auth::user();
		
if ($usuarioactual->tipoUsuario==1) {

	        $prospectos=Prospectos::all();          
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $msj="";
          $usuarioactual=\Auth::user();
          $fecha=date('Y-m-d');
          $idusuario=\Auth::user()->id;
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $areas = DB::table('prospectos')->sum('numero_hectareas');

          return redirect("listado_todos_prospectos_comercial")
          ->with("msj","Prospecto guardado correctamente")
          ->with("prospectos",$prospectos)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
          ->with("asesor",$asesor)
          ->with("usuario",  $usuarioactual)
		      ->with("events",$events)
          ->with("areas",$areas)
          ->with("events_day",$events_day)
          ->with("fecha",$fecha); 

        } 

          else 

            {

 $idusuario=\Auth::user()->id;
          $prospectos= Prospectos::where("idUsuario","=",$idusuario)->get();
          $msj="";
          $asesor=User::all();
          $seguimientos=Visitas::where("idComercial","=",$idusuario)->get();
          $finalizados=Prospectos::where("idUsuario","=",$idusuario)->where("stage","=",11)->get();
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');
          $idusuario=\Auth::user()->id;
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          
          return view("listados.listado_prospectos_comercial")
          ->with("msj","Lead Saved")
          ->with("prospectos",$prospectos)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
          ->with("asesor",$asesor)
          ->with("usuario", $usuarioactual )
          ->with("events_day",$events_day)
          ->with("fecha",$fecha);

        }
	
	}

//leccion 7
		public function form_editar_usuario($id)
	{
		//funcion para cargar los datos de cada usuario en la ficha
		
		$usuario=User::find($id);
		$contador=count($usuario);
		$tiposusuario=TipoUsuario::all();
		
		if($contador>0){          
            return view("formularios.form_editar_usuario")
                   ->with("usuario",$usuario)
                   ->with("tiposusuario",$tiposusuario);   
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
		}
	}

			public function form_editar_prospecto($id)
	{
		//funcion para cargar los datos de cada usuario en la ficha
		$usuarioactual=\Auth::user();
    $usuario=Prospectos::find($id);
		$contador=count($usuario);
		//$asesor=$usuario->idUsuario;
		$tipointeres=Interes::all();
    $paises=Pais::all();
    $cultivos=Cultivos::all();
    $status=TipoStatus::all();
		//$tiposusuario=TipoUsuario::all();
		
		if($contador>0){          
            return view("formularios.form_editar_prospecto")
                   ->with("usuario",$usuario)
                   ->with("paises",$paises)
                   ->with("cultivos",$cultivos)
                   ->with("status",$status)
                    ->with("usuarioactual",$usuarioactual)
                   ->with("tipointeres",$tipointeres);
          //         ->with("asesor",$asesor);   
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
		}
	}




		public function editar_usuario(Request $request)
	{

		$data=$request->all();
		$idUsuario=$data["id_usuario"];
		$usuario=User::find($idUsuario);
        $usuario->nombres  =  $data["nombres"];
		$usuario->apellidos=$data["apellidos"];
		$usuario->pais=$data["pais"];
		$usuario->ciudad=$data["ciudad"];
		$usuario->email=$data["email"];
		$usuario->institucion=$data["institucion"];
		$usuario->ocupacion=$data["ocupacion"];
		$usuario->tipoUsuario=$data["tipousuario"];
		$resul= $usuario->save();

		if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Datos actualizados Correctamente");   
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
		}
	}

		public function editar_prospecto(Request $request)
	{
		$data=$request->all();
		$id=$data["id_prospecto"];
		$prospecto=Prospectos::find($id);
		$prospecto->nombres  =  $data["nombres"];
		$prospecto->apellidos=$data["apellidos"];
		$prospecto->ciudad=$data["ciudad"];
		$prospecto->email=$data["email"];
		$prospecto->telefono=$data["telefono"];
		$prospecto->interesado=$data["interesado"];
    $prospecto->numero_hectareas=$data["hectareas"];
		$prospecto->stage=$data["stage"];
		//$prospecto->fecha_proxima_visita=$data["fechaproximavisita"];
		$prospecto->nombres_secundario=$data["nombres_secundario"];
		$prospecto->apellidos_secundario=$data["apellidos_secundario"];
		$prospecto->email_secundario=$data["email_secundario"];
		$prospecto->phone_secundario=$data["phone_secundario"];
		$prospecto->observaciones=$data["observaciones"];
		//$idUsuario=\Auth::user()->id;
		$prospecto->idUsuario=$data["id_usuario"];
		$resul= $prospecto->save();

		if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Prospecto Registrado Correctamente");   
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}
	}





//leccion 8
		public function subir_imagen_usuario(Request $request)
	{

	    $id=$request->input('id_usuario_foto');
		$archivo = $request->file('archivo');
        $input  = array('image' => $archivo) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:900');
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
        }
        else
        {

	        $nombre_original=$archivo->getClientOriginalName();
			$extension=$archivo->getClientOriginalExtension();
			$nuevo_nombre="userimagen-".$id.".".$extension;
		    $r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($archivo) );
		    $rutadelaimagen="../storage/fotografias/".$nuevo_nombre;
	    
		    if ($r1){

			    $usuario=User::find($id);
			    $usuario->imagenurl=$rutadelaimagen;
			    $r2=$usuario->save();
		        return view("mensajes.msj_correcto")->with("msj","Imagen agregada correctamente");
		    }
		    else
		    {
		    	return view("mensajes.msj_rechazado")->with("msj","no se cargo la imagen");
		    }

        }	

	}


	public function cambiar_password(Request $request){

		$id=$request->input("id_usuario_password");
		$email=$request->input("email_usuario");
		$password=$request->input("password_usuario");
		$usuario=User::find($id);
	    $usuario->email=$email;
	    $usuario->password=bcrypt($password);
	    $r=$usuario->save();

	    if($r){
           return view("mensajes.msj_correcto")->with("msj","password actualizado");
	    }
	    else
	    {
	    	return view("mensajes.msj_rechazado")->with("msj","Error al actualizar el password");
	    }
	}

	//leccion 09

	public function form_cargar_datos_usuarios(){
       return view("formularios.form_cargar_datos_usuarios");
	}


	public function dato_buscado(){
       return view("listado.listado_todos_prospectos_comercial");
	}

    public function cargar_datos_usuarios(Request $request)
	{
       $archivo = $request->file('archivo');
       $nombre_original=$archivo->getClientOriginalName();
	   $extension=$archivo->getClientOriginalExtension();
       $r1=Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );
       $ruta  =  storage_path('archivos') ."/". $nombre_original;
       
       if($r1){
       	    $ct=0;
            Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) {
		        
		        $hoja->each(function($fila) {
			        $usersemails=User::where("email","=",$fila->email)->first();
			        if(count( $usersemails)==0){
				      	$usuario=new User;
				        $usuario->nombres= $fila->nombres;
				        $usuario->apellidos= $fila->apellidos;
				        $usuario->email= $fila->email;
				        $usuario->telefono= $fila->telefono; //este campo llamado telefono se debe agregar en la base de datos c
				        $usuario->pais= $fila->pais;
				        $usuario->ciudad= $fila->ciudad;
				        $usuario->institucion= $fila->institucion;
		                $usuario->ocupacion= $fila->ocupacion;
		                $usuario->password= bcrypt($fila->password);
		                $usuario->save();
	                }
		     
		        });

            });

            return view("mensajes.msj_correcto")->with("msj"," Usuarios Cargados Correctamente");
    	
       }
       else
       {
       	    return view("mensajes.msj_rechazado")->with("msj","Error al subir el archivo");
       }

	}


		//leccion 10

	public function form_educacion_usuario(){
       return view("formularios.form_educacion_usuario");
	}

		public function buscar_todos_prospectos(){
       return view("listados.listado_todos_prospectos_comercial");
	}


        //leccion 12
		public function buscar_usuarios($pais,$dato="")
    {
        
        $usuarioactual=\Auth::user();
        $usuarios= User::Busqueda($pais,$dato)->paginate(25);  
        $paises=Pais::all();
        $paissel=$paises->find($pais);
        return view('listados.listado_usuarios')
        ->with("paises", $paises )
        ->with("paissel", $paissel )
        ->with("usuarios", $usuarios )
        ->with("usuario_actual", $usuarioactual );       
	}


			public function buscar_prospecto($dato="")
    {
        
        
        $usuarioactual=\Auth::user();
        $usuarios= Prospectos::Busquedad($dato)->paginate(25);  
        //$paises=Pais::all();
        //$paissel=$paises->find($pais);
        return view('listados.listado_todos_prospectos_comercial')
       // ->with("paises", $paises )
       // ->with("paissel", $paissel )
        ->with("usuarios", $usuarios )
        ->with("usuario_actual", $usuarioactual );       
	}


     //leccion 16


      	public function info_datos_usuario($id)
	{
		//funcion para cargar los datos de cada usuario en la ficha
		$usuario=User::find($id);
		$contador=count($usuario);
		$tiposusuario=TipoUsuario::all();
        $tiposeducacion=TipoEducacion::all();
        $educacion= $usuario->educacion();
        $tipopublicaciones=TipoPublicaciones::all();
        $publicaciones= $usuario->publicaciones();
        $rutaarchivos= "../storage/archivos/";
        $proyectos= $usuario->proyectos();
        $rutaarchivos2= "../storage/archivos/";
		
		if($contador>0){          
            return view("standard.info_datos_usuario")
                   ->with("usuario",$usuario)
                   ->with("tiposusuario",$tiposusuario)
                    ->with("tiposeducacion",$tiposeducacion)
                   ->with("educacion",$educacion)
                    ->with("tipopublicaciones", $tipopublicaciones)
                    ->with("publicaciones",$publicaciones) 
                    ->with("rutaarchivos",$rutaarchivos)
                    ->with("proyectos",$proyectos) 
                    ->with("rutaarchivos2",$rutaarchivos2); 
		}
		else
		{            
            return view("mensajes.msj_rechazado")->with("msj","el usuario con ese id no existe o fue borrado");  
		}
	}


    public function borrar_prospecto($id){

       $usuario=Prospectos::find($id);
       $resul=$usuario->delete();
        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Borrado correctamente");   
        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }

    }

    function showDate(Request $request)
    {
 
       dd($request->date);
    }



  public function form_calendario()
	{
        
        $tiposusuario=TipoUsuario::all();
        $idusuario=\Auth::user()->id;
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
		$paises=Prospectos::where("idUsuario","=",$idusuario)->get();
     

        return view('formularios.form_calendario')
        ->with("tiposusuario",$tiposusuario)
        ->with("idusuario",$idusuario)
	    ->with("paises", $paises )
	    ->with("usuario",  $usuarioactual)
     // ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("fecha",$fecha);

	}

	
    public function vista_evento()
{
       $idevento=Eventos::find($id);

}

	  public function form_calendario_admin()
	{
        
        $idusuario=\Auth::user()->id;
        $idempresa=\Auth::user()->idEmpresa;
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $usuarios=User::where('idEmpresa','=',$idempresa)->get();
        $tiposusuario=TipoUsuario::all();
        $prospectos=Prospectos::all();
	
        return view('formularios.form_calendario_admin')
        ->with("tiposusuario",$tiposusuario)
        ->with("usuarios",$usuarios)
        ->with("prospectos",$prospectos)
        ->with("usuario",  $usuarioactual)
        ->with("events_day",$events_day)
        ->with("fecha",$fecha);
	 
	}


public function agregar_nuevo_evento_prospecto(Request $request)
	{

		$data=$request->all();
   	$usuario= new Eventos;
	//	$usuario->name = $data["name"];
		$usuario->title = $data["titulo"];
		$usuario->description=$data["descripcion"];
		
		    $data["horaini"] = strtotime ($data["horaini"]);
        $data["horaini"] = date ( 'H:i:s', $data["horaini"]);

        $data["horafin"] = strtotime ($data["horafin"]);
        $data["horafin"] = date ( 'H:i:s', $data["horafin"]);

		$usuario->hora_inicio=$data["horaini"];
		$usuario->fecha_inicio=$data["fechainicio"];
		$usuario->start=$data["fechainicio"]." ".$data["horaini"];
		//$usuario->start=$data["fechainicio"];
		$usuario->hora_final=$data["horafin"];
		$usuario->end=$data["fechafin"]." ".$data["horafin"];
		//$usuario->end=$data["fechafin"];
		$idUsuario=\Auth::user()->id;
		$usuario->idUsuario=$idUsuario;
    $usuario->idProspecto=$data["prospecto"];
    $usuario->idAsignacion=$idUsuario;
    $usuario->idStatus=1;
	  $resul= $usuario->save();

		if($resul){
            
           // return view("mensajes.msj_correcto")->with("msj","Evento Registrado Correctamente .".$data["horaini"]);
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
        ->with("fecha",$fecha)
        ->with("msj","Event saved.");
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}
	}

 public function editar_evento(Request $request)
	{

		$data=$request->all();

        $idUsuario=$data["id_evento"];
		$usuario=Eventos::find($idUsuario);      	
		$usuario->name = $data["nombre"];
		$usuario->title = $data["title"];
		$usuario->description=$data["description"];

	//	$data["horaini"] = strtotime ($data["horaini"]);
    //    $data["horaini"] = date ( 'H:i:s', $data["horaini"]);

    //    $data["horafin"] = strtotime ($data["horafin"]);
    //    $data["horafin"] = date ( 'H:i:s', $data["horafin"]);

		$usuario->hora_inicio=$data["horaini"];
		$usuario->start=$data["start"]." ".$data["horaini"];
		$usuario->hora_final=$data["horafin"];
		$usuario->end=$data["end"]." ".$data["horafin"];
		$usuario->idUsuario=$data["id_usuario"];
        $usuario->idProspecto=$data["id_prospecto"];
        $usuario->idAsignacion=$data["id_asignacion"];
        $usuario->idStatus=$data["status"];
  
	  	$resul= $usuario->save();

		if($resul){
            
           // return view("mensajes.msj_correcto")->with("msj","Evento Registrado Correctamente .".$data["horaini"]);
              return view("mensajes.msj_correcto")->with("msj","Evento Actualizado Correctamente.");      
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}
	} 	

 public function borrar_evento($id){

       //$evento=Eventos::find($id);
       $id = $_POST['id'];
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
 public function borrar_evento_list($id){

       //$evento=Eventos::find($id);
      // $id = $_POST['id'];
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
public function agregar_nuevo_evento_prospecto_admin(Request $request)
	{

		$data=$request->all();
      	$usuario= new Eventos;
		$usuario->name = $data["name"];
		$usuario->title = $data["titulo"];
		$usuario->description=$data["descripcion"];

        $data["horaini"] = strtotime ($data["horaini"]);
        $data["horaini"] = date ( 'H:i:s', $data["horaini"]);

        $data["horafin"] = strtotime ($data["horafin"]);
        $data["horafin"] = date ( 'H:i:s', $data["horafin"]);

		$usuario->start=$data["fechainicio"]." ".$data["horaini"];
		$usuario->fecha_inicio=$data["fechainicio"];
		$usuario->end=$data["fechafin"]." ".$data["horafin"];
	//	$usuario->end=$data["fechafin"];
		$usuario->idUsuario=$data["comercial"];
        $usuario->idProspecto=$data["prospecto"];
        $usuarioactual=\Auth::user()->id;
        $usuario->idAsignacion=$usuarioactual;
        $usuario->idStatus=1;
	  	$resul= $usuario->save();

		if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Evento Registrado Correctamente");   
		}
		else
		{
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

		}
	}	


}