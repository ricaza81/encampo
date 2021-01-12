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
use App\ProspectosAsignacion;
use App\Prospectos;
use App\TipoIntereses;
use App\TipoStatus;
use App\Visitas;
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








class RTCController extends Controller {

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


public function form_asignar_rtc($id)
  {
    //funcion para mostrar formulario para asignar prospecto a RTC
    
    $usuarioactual=\Auth::user();
    $prospecto=Prospectos::find($id);
   // $usuarios=User::where('tipoUsuario','=',2)->get();
    $usuarios=User::all();
    $contador=count($prospecto);
    $msj="";

    
    $compartircon=ProspectosAsignacion::where("idProspecto","=",$id)->get();


    if($contador>0){          
            return view("formularios.asignar.form_asignar_rtc")
                   ->with("prospecto",$prospecto)
                   ->with("usuarios",$usuarios)
                   ->with("msj",$msj)
                   ->with("compartircon",$compartircon);
 
    }
    else
    {            
            return view("mensajes.msj_rechazado")->with("msj","el prospecto con ese id no existe o fue borrado");  
    }
  }



public function asignar_prospecto(Request $request)
{

$data=$request->all();
$id_usuario=$data['comercial'];
$id_proyecto=$data['id_prospecto'];
$verificar_duplicado=ProspectosAsignacion::where("idrtcasignado","=",$id_usuario)
                                          ->where("idProspecto","=",$id_proyecto)->get();
$enviar_email=$request->input('enviar_email');
$cuenta_enviar_email=count($enviar_email);


if (count ( $verificar_duplicado ) > 0) {

   return view('mensajes.msj_rechazado')
        ->with("msj","Este LEAD ya fue compartido con este usuario");} else {


//if (isset($_POST['enviar_email']))  
if (!$request->has('enviar_email'))
 {
  //ACTUALIZACIÓN ESTADO COMPARTIDO(ASIGNADO) DEL LEAD
  $id=$data["id_prospecto"];
  $prospecto=Prospectos::find($id);
  $prospecto->compartido="1";
  $resul= $prospecto->save();


  //INSERCIÓN EN TABLA ASIGNACIÓN PROSPECTO
  $prospecto_compartido= new ProspectosAsignacion;
  $prospecto_compartido->idProspecto  =  $data["id_prospecto"];
  $prospecto_compartido->idasignador  =  \Auth::user()->id;
  $prospecto_compartido->idrtcasignado =  $data["comercial"];

  //Variables para email 
  
  $asunto="Tienes un nuevo LEAD Asignado";
  $usuario=User::find($id_usuario);
  $email_usuario=$usuario->email;
  //$proyecto=Prospectos::find($id_proyecto);
  $nombre_prospecto=$prospecto->nombres;
  $destinatario=$usuario->email;
  $seguimientos=Visitas::where("idUsuario","=",$id_proyecto)->get();

  $data = array('email_usuario' => $email_usuario,'nombre_prospecto' => $nombre_prospecto,'prospecto' => $prospecto,'seguimientos' => $seguimientos);
    Mail::send('correo.plantilla_lead_asignado', $data, function ($message) use ($asunto,$destinatario) {
        $message->from('mercadeo@cosmoagro.com', 'LEADS Cosmoagro');
        $message->to($destinatario)->cc('ricardo.zambrano@cosmoagro.com','andres.parra@cosmoagro.com')->subject($asunto);  });

 

  $resul= $prospecto_compartido->save();
} else {
  $id=$data["id_prospecto"];
  $prospecto=Prospectos::find($id);
  $prospecto->compartido="1";
  $resul= $prospecto->save();


  //INSERCIÓN EN TABLA ASIGNACIÓN PROSPECTO
  $prospecto_compartido= new ProspectosAsignacion;
  $prospecto_compartido->idProspecto  =  $data["id_prospecto"];
  $prospecto_compartido->idasignador  =  \Auth::user()->id;
  $prospecto_compartido->idrtcasignado =  $data["comercial"];
  

  $resul= $prospecto_compartido->save();
}




    return view("mensajes.msj_correcto")->with("msj","Prospecto Compartido Correctamente");
}

}  


}