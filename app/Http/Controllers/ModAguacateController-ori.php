<?php

namespace App\Http\Controllers;

require '/home/agroniel/public_html/encampo/vendor/autoload.php';

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;
use Storage;
use App\User;
use App\UsuariosEmpresas;
use App\Pais;
use App\TipoUsuario;
use App\Educacion;
use App\TipoEducacion;
use App\Publicaciones;
use App\TipoPublicaciones;
use App\Proyectos;
use App\Prospectos;
use App\AgriFincas;
use App\ModAguacateFincas;
use App\ModAguacateFincasArboles;
use App\ModAguacateFincasClientes;
use App\ModAguacateFincasContactos;
use App\ModAguacateFincasVisitas;
use App\ModAguacateVisitasempnd;
use App\ModAguacateVisitasemcosecha;
use App\ModAguacateVisitaarbolespnd;
use App\ModAguacateSemanas;
use App\AgriAgricultores;
use App\AgriVisitasTecnicas;
use App\AgroCensoDane;
use App\ProductoRecomendado;
use App\Productos;
use App\ProductosLineas;
use App\ProductosTipo;
use App\AgriVisitasTecnicasProductos;
use App\Ciudades;
use App\TipoIntereses;
use App\TipoStatus;
use App\Visitas;
use App\Eventos;
use App\Interes;
use App\Cultivos;
use App\Zonas;
use App\Canales;
use App\Departamentos;
use Carbon\Carbon;
use Mail;
use Response;
//use gRPC;

use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Storage\StorageClient;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;



class ModAguacateController extends Controller {
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


function initialize()
{
    // Create the Cloud Firestore client
    $db = new FirestoreClient();
    printf('Created Cloud Firestore client with default project ID.' . PHP_EOL);
}
public function index()
{
   $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/appagronielsen-firebase-adminsdk-gsxm2-3cea636f33.json');
$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();
    $database = $firebase->getDatabase();
}

function add_data($projectId)
{
    // Create the Cloud Firestore client
    $db = new FirestoreClient([
        'projectId' => $projectId,
    ]);
    # [START fs_add_data_1]
    $docRef = $db->collection('test')->document('test');
    $docRef->set([
        'displayName' => 'Ada',
        'email' => 'email@email.com',
       
    ]);
    printf('Added data to the lovelace document in the users collection.' . PHP_EOL);
    # [END fs_add_data_1]
   
} 

            public function id_ciudad_agri($id)
    {
       
       $id_ciudad=AgriAgricultores::where("id","=",$id)->get();
      //$prospecto=User::all();
        return response ()->json($id_ciudad);
      
          }


                public function id_fincas_agri($id)
    {
       
       $id_fincas_agri=Agrifincas::where("id_agricultor","=",$id)->get();
      //$prospecto=User::all();
        return response ()->json($id_fincas_agri);
      
          }

              public function agregar_nuevo_agricultor(Request $request)
  {   $data=$request->all();


        $reglas = array(  'nombres' => 'required',
                           'canal' => 'required|Numeric|min:1',
                           'pais' => 'required|Numeric|min:1',
                           'departamento' => 'required|Numeric|min:1',
                           'cultivo' => 'required|Numeric|min:1',
                           'hectareas' => 'required|Numeric|min:1',                           
                           
                                 );
        $mensajes= array('nombres.required' =>  'El nombre es requerido',
                        'canal.numeric' =>  'Selecciona un origen',
                        'pais.numeric' =>  'Falta el pais',
                        'departamento.numeric' =>  'Falta el departamento',
                        'cultivo.numeric' =>  'Selecciona un cultivo',
                        'hectareas.required' =>  'Falta el # Hectareas',
                        'hectareas.numeric' =>  'Falta el # Hectareas',
                        
                        

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

    $prospecto= new AgriAgricultores;
    $prospecto->agricultor  =  $data["nombres"];
    $idUsuario=\Auth::user()->id;
    $prospecto->idUsuario=$idUsuario;
    $prospecto->id_ciudad=$data["departamento"];
    $prospecto->email=$data["email"];
    $prospecto->telefono_cont=$data["telefono"];
    $prospecto->perfil=$data["observaciones"];
    $prospecto->distribuidor=$data["distribuidor"];
    //json_decode($data->latlnt, true);
    $resul= $prospecto->save();

        $agricultor = DB::table('agri_agricultores')->latest()->first();
        $id = $agricultor->id;
        $agricultor=AgriAgricultores::find($id);

       return redirect('form_nueva_finca_agricultor/'.$agricultor->id)
        ->with("id",  $id)
        ->with("agricultor",  $agricultor);

}

function listado_todos_prospectos_comercial()
    { 
          $msj="";
          $usuarioactual=\Auth::user();
          $idusuario=\Auth::user()->id;
          $asesor=User::all();
          $prospectos=Prospectos::all();
          $agricultores=AgriAgricultores::where('idUsuario','=',$idusuario)->get();
          $fincas=Agrifincas::where('idUsuario','=',$idusuario)->get();
          $visitastecnicas=AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->get();
          $cant_visitas=count($visitastecnicas);
          $cant_fincas=count($fincas);
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_agricultores=count($agricultores);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();


          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();
    

       
          return view("listados.listado_todos_prospectos_comercial")

          ->with("msj",$msj)
          ->with("prospectos",$prospectos)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("agricultores",$agricultores)
          ->with("cant_agricultores",$cant_agricultores)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
          ->with("asesor",$asesor)
          ->with("date",$date)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("events_day",$events_day)
          ->with("fecha",$fecha);
 
    }

    public function form_nueva_finca_agricultor($id)
     
        {
         
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $agricultor=AgriAgricultores::find($id);
        $departamentos=Departamentos::all();
        
        
        return view('formularios.agricultor.form_nueva_finca_agricultor')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
        ->with("id",  $id)
        ->with('agricultor',$agricultor)
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

/**MODULO-AGUACATE**/

            public function ciudades($id)
    {
       
       $ciudades=Ciudades::where("id_departamento","=",$id)->get();
      //$prospecto=User::all();
        return response ()->json($ciudades);
      
          }

        public function form_nueva_finca_aguacate()
     
        {
         
                 $usuarioactual=\Auth::user();
        $msj=""; 
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::where('id_pais','=',1)->get();
           
        
    return view('mod_aguacate.forms.form_nueva_finca_aguacate')
    ->with("usuario",  $usuarioactual)
    ->with("prospectos",$prospectos)
    ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("msj",$msj)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos); 

    }

       public function agregar_nueva_finca_aguacate(Request $request)
    {
        $projectId = 'appagronielsen';
        $storage = new StorageClient([
    'projectId' => $projectId
]);
        $data=$request->all();

           $reglas = array('nombre_finca' => 'required',
                           'hectareas' => 'required|Numeric|min:1',
                           'departamento' => 'required|Numeric|min:1',
                           'ciudad' => 'required|Numeric|min:1',
                                 );
        $mensajes= array('nombre_finca.required' =>  'Por favor ingresa un nombre de finca',
                         'hectareas.required' =>  'Falta el # Hectareas',
                        'hectareas.numeric' =>  'Falta el # Hectareas',
                        'departamento.numeric' =>  'Seelecciona un departamento',
                        'ciudad.numeric' =>  'Seelecciona un municipio',
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
       $errores = $validacion->errors();

        $usuarioactual=\Auth::user();
        $msj=""; 
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
       $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $errors="";
    
     $db = new FirestoreClient([
        'projectId' => $projectId,
    ]);
    # [START fs_add_data_1]
    $docRef = $db->collection('test')->document('test');
    $docRef->set([
        'displayName' => 'Ada',
        'email' => 'email@email.com',
       
    ]);
    printf('Added data to the lovelace document in the users collection.' . PHP_EOL);
    # [END fs_add_data_1]
        
    return view('mod_aguacate.forms.form_nueva_finca_aguacate')
    ->with("usuario",  $usuarioactual)
    ->with("prospectos",$prospectos)
    ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("msj","Existen errores de validación")
        ->with("errors",$errores)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

     }
        else
        {

 
        $finca= new ModAguacateFincas;
        $finca->id_empresa  =  \Auth::user()->idEmpresa;
        $finca->id_usuario  =  \Auth::user()->id;
        $finca->id_depto  =  $data["departamento"];
        $finca->id_ciudad  =  $data["ciudad"];
        $finca->finca  =  $data["nombre_finca"];
        $finca->id_cultivo  =  1;
        $finca->uid= str_random(10);
        $finca->vereda= $data["vereda"];
        $finca->hectareas=$data["hectareas"];
        $finca->cantarboles=$data["cantarboles"];
        $finca->asnm=$data["asnm"];
        $finca->regica=$data["regica"];
        $finca->regglobal=$data["regglobal"];
        $finca->lat_lnt=$data["coords"];
        $resul= $finca->save();
        $finca = DB::table('mod_agcte_fincas')->latest()->first();
        $id = $finca->id;
      //  $fincaarray=AgriFincas::find($id);
       $recomendaciones="";
        
        
       return redirect('form_editar_finca_aguacate/'.$finca->id)
    //  ->with("recomendaciones",  $recomendaciones)
        ->with("id",  $id);
        } }

  public function form_editar_finca_aguacate($id)

{
        $finca=ModAguacateFincas::find($id);
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        //$productos=Productos::all();
        $productos=Productos::where('idEmpresa','=',$usuarioactual->idEmpresa)->get();
        $arboles=ModAguacateFincasArboles::where("id_finca","=",$id)->get();
        $clientes=ModAguacateFincasClientes::where("id_finca","=",$id)->get();
        $contactos=ModAguacateFincasContactos::where("id_finca","=",$id)->get();
        $msj='';
        
        
        return view('mod_aguacate.forms.form_editar_finca_aguacate')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
        ->with("arboles",$arboles)
        ->with("clientes",$clientes)
        ->with("contactos",$contactos)
        ->with("prospectos",$prospectos)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("id",$id)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("finca",$finca)
        ->with("msj",$msj)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos)
        ->with("productos",$productos);

}

      public function agregar_nuevo_arboles_finca_aguacate(Request $request)
    {

        $data=$request->all();

           $reglas = array(//'producto' => 'required|Numeric|min:1',
                     // 'hectareas' => 'required|Numeric|min:1',
                     // 'departamento' => 'required|Numeric|min:1',
                     // 'email' => 'required|Email|Unique:prospectos',
                     // 'cultivo' => 'required',
                      );
        $mensajes= array(//'producto.required' =>  'Selecciona un producto',
                       // 'producto.numeric' =>  'Selecciona un producto',
                      // 'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                     //  'email.required' =>  'Ingresar un email es obligatorio',
                      // 'email.email' =>  'el email debe tener un formato válido',
                    //   'email.unique' =>  'El email ya existe',
                    //   'telefono.required' => 'Debe Ingresar un teléfono',
                    //   'departamento.required' => 'Por favor selecciona un departamento',
                     //    'departamento.numeric' =>  'Selecciona un departamento'
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
       $errores = $validacion->errors(); 

        $finca = DB::table('mod_agcte_fincas')->latest()->first();
        $id_finca=$finca->id;
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $arboles=ModAguacateFincasArboles::where("id_finca","=",$id_finca)->get();
       // $prospectos=Prospectos::all();
       // $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
      //  $prospectos= Prospectos::where("idUsuarioAsignado","=",$idusuario_agri)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $msj="";
        $departamentos=Departamentos::all();
        $productos=Productos::all();
   
       
    return view('mod_aguacate.forms.form_editar_finca_aguacate')
         ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
      //  ->with("prospectos",$prospectos)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("visita",$visita)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos)
         ->with("arboles",$arboles)
    //      ->with("productos",$productos)
    ->with("errors",$errores)
    ->with("msj","Existen errores de validación");

     }

        $arboles_finca= new ModAguacateFincasArboles;
        $arboles_finca->id_finca  =  $data["idfinca"];
        $arboles_finca->numarboles  =  $data["numarboles"];
        $arboles_finca->edad  =  $data["edad"];
        $arboles_finca->observaciones  =  $data["observaciones"];
        $resul= $arboles_finca->save();
    if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Registro Guardado Correctamente");   
        }
    else
    {
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

     }
    
}

      public function agregar_nuevo_cliente_finca_aguacate(Request $request)
    {

        $data=$request->all();

           $reglas = array(//'producto' => 'required|Numeric|min:1',
                     // 'hectareas' => 'required|Numeric|min:1',
                     // 'departamento' => 'required|Numeric|min:1',
                     // 'email' => 'required|Email|Unique:prospectos',
                     // 'cultivo' => 'required',
                      );
        $mensajes= array(//'producto.required' =>  'Selecciona un producto',
                       // 'producto.numeric' =>  'Selecciona un producto',
                      // 'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                     //  'email.required' =>  'Ingresar un email es obligatorio',
                      // 'email.email' =>  'el email debe tener un formato válido',
                    //   'email.unique' =>  'El email ya existe',
                    //   'telefono.required' => 'Debe Ingresar un teléfono',
                    //   'departamento.required' => 'Por favor selecciona un departamento',
                     //    'departamento.numeric' =>  'Selecciona un departamento'
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
       $errores = $validacion->errors(); 

        $finca = DB::table('mod_agcte_fincas')->latest()->first();
        $id_finca=$finca->id;
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $arboles=ModAguacateFincasArboles::where("id_finca","=",$id_finca)->get();
       // $prospectos=Prospectos::all();
       // $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
      //  $prospectos= Prospectos::where("idUsuarioAsignado","=",$idusuario_agri)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $msj="";
        $departamentos=Departamentos::all();
        $productos=Productos::all();
   
       
    return view('mod_aguacate.forms.form_editar_finca_aguacate')
         ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
      //  ->with("prospectos",$prospectos)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("visita",$visita)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos)
         ->with("arboles",$arboles)
    //      ->with("productos",$productos)
    ->with("errors",$errores)
    ->with("msj","Existen errores de validación");

     }

        $cliente_finca= new ModAguacateFincasClientes;
        $cliente_finca->id_finca  =  $data["idfincacliente"];
        $cliente_finca->cliente  =  $data["cliente"];
        $cliente_finca->telefono  =  $data["telefonocliente"];
        $cliente_finca->email  =  $data["emailcliente"];
        $resul= $cliente_finca->save();
    if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Cliente Guardado Correctamente");   
        }
    else
    {
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

     }
    
}

      public function agregar_nuevo_contacto_finca_aguacate(Request $request)
    {

        $data=$request->all();

           $reglas = array(//'producto' => 'required|Numeric|min:1',
                     // 'hectareas' => 'required|Numeric|min:1',
                     // 'departamento' => 'required|Numeric|min:1',
                     // 'email' => 'required|Email|Unique:prospectos',
                     // 'cultivo' => 'required',
                      );
        $mensajes= array(//'producto.required' =>  'Selecciona un producto',
                       // 'producto.numeric' =>  'Selecciona un producto',
                      // 'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                     //  'email.required' =>  'Ingresar un email es obligatorio',
                      // 'email.email' =>  'el email debe tener un formato válido',
                    //   'email.unique' =>  'El email ya existe',
                    //   'telefono.required' => 'Debe Ingresar un teléfono',
                    //   'departamento.required' => 'Por favor selecciona un departamento',
                     //    'departamento.numeric' =>  'Selecciona un departamento'
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
       $errores = $validacion->errors(); 

        $finca = DB::table('mod_agcte_fincas')->latest()->first();
        $id_finca=$finca->id;
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $arboles=ModAguacateFincasArboles::where("id_finca","=",$id_finca)->get();
       // $prospectos=Prospectos::all();
       // $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
      //  $prospectos= Prospectos::where("idUsuarioAsignado","=",$idusuario_agri)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $msj="";
        $departamentos=Departamentos::all();
        $productos=Productos::all();
   
       
    return view('mod_aguacate.forms.form_editar_finca_aguacate')
         ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
      //  ->with("prospectos",$prospectos)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("visita",$visita)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos)
         ->with("arboles",$arboles)
    //      ->with("productos",$productos)
    ->with("errors",$errores)
    ->with("msj","Existen errores de validación");

     }

        $contacto_finca= new ModAguacateFincasContactos;
        $contacto_finca->id_finca  =  $data["idfincacontacto"];
        $contacto_finca->nombres  =  $data["nombrescontacto"];
        $contacto_finca->apellidos  =  $data["apellidoscontacto"];
        $contacto_finca->telefono  =  $data["telcontacto"];
        $contacto_finca->email  =  $data["emailcontacto"];
        $resul= $contacto_finca->save();
    if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Contacto Guardado Correctamente");   
        }
    else
    {
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

     }
    
}

  /*Formularioparanuevavisitaenaguacate*/
      public function form_nueva_visita_finca_aguacate()
        
         
              {
         
                     $usuarioactual=\Auth::user();
        $msj=""; 
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $fincas= ModAguacateFincas::where("id_usuario","=",$idusuario)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();       
        
        return view('mod_aguacate.forms.form_nueva_visita_finca_aguacate')
     ->with("usuario",  $usuarioactual)
    ->with("fincas",$fincas)
    ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("msj",$msj)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos); 
    }

/*CrearVisita*/
      public function agregar_nueva_visitatecnica_finca_aguacate(Request $request)
    {

        $data=$request->all();

           $reglas = array(//'nombre_finca' => 'required',
                     // 'hectareas' => 'required|Numeric|min:1',
                     // 'departamento' => 'required|Numeric|min:1',
                     // 'email' => 'required|Email|Unique:prospectos',
                     // 'cultivo' => 'required',
                      );
        $mensajes= array(//'nombre_finca.required' =>  'El nombre es obligatorio',
                      // 'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                     //  'email.required' =>  'Ingresar un email es obligatorio',
                      // 'email.email' =>  'el email debe tener un formato válido',
                    //   'email.unique' =>  'El email ya existe',
                    //   'telefono.required' => 'Debe Ingresar un teléfono',
                    //   'departamento.required' => 'Por favor selecciona un departamento',
                     //    'departamento.numeric' =>  'Selecciona un departamento'
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails()){
        $errores = $validacion->errors(); 
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $cultivos=Cultivos::all();
        $msj="";
        $paises=Pais::all();
        $departamentos=Departamentos::all();
   
       
    return view('mod_aguacate.forms.form_nueva_visita_finca_aguacate')
    ->with("usuario",  $usuarioactual)
    ->with("events",$events)
    ->with("paises",$paises)
    ->with("canales",$canales)
    ->with("events_day",$events_day)
    ->with("fecha",$fecha)
    ->with("errors",$errores)
    ->with("departamentos",$departamentos)
    ->with("msj","Existen errores de validación");

                                  }
     /*   $foto1 = $request->file('foto1');
        $input  = array('file' => $foto1) ;
        $reglas = array('file' => 'required|mimes:jpeg,jpg,pdf,png|max:15000000'); 
       // $foto2 = $request->file('foto2');
        $carpeta=$request->input("id_agricultor");
        $ruta=$carpeta."/".$request->input("id_agricultor")."_".$foto1->getClientOriginalName();
           $r1=Storage::disk('/archivos')->put($ruta,  \File::get($foto1) );*/
        
        $foto1 = $request->file('foto1');
        $foto2 = $request->file('foto2');
        $input  = array('image' => $foto1) ;
        $input  = array('image' => $foto2) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,pdf,gif|max:15000000');
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
        }
        else
        {
        $id=$data['id'];
        $nombre_original=$foto1->getClientOriginalName();
        $extension=$foto1->getClientOriginalExtension();
        $nuevo_nombre="foto1visita-".$id.".".$extension;
        $r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($foto1) );
        $rutadelaimagen="../storage/fotografias/".$nuevo_nombre;

        $nombre_original=$foto2->getClientOriginalName();
        $extension=$foto2->getClientOriginalExtension();
        $nuevo_nombre="foto2visita-".$id.".".$extension;
        $r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($foto2) );
        $rutadelaimagen2="../storage/fotografias/".$nuevo_nombre;
      
      }
           
 
        $visita= new ModAguacateFincasVisitas;
        $visita->imagen1=$rutadelaimagen;
        $visita->imagen2=$rutadelaimagen2;
        $visita->id_empresa  =  \Auth::user()->idEmpresa;
        $visita->id_usuario  =  \Auth::user()->id;
        $visita->id_finca  =  $data["nombre_finca"];
        $visita->id_tipo_cultivo  =  1;
        
        
        
        
        
        //$visita->objetivo=$data["objetivo"];
        $visita->lat_lnt=$data["coords"];
        $visita->altitud= 0;
        $visita->longitud=0;
        $visita->latitud=0;
        $visita->residualidad=$data["residualidad"];
        $visita->matseca=$data["matseca"];
        $visita->porcent_nal=$data["porcent_nal"];
        $visita->causas_nal=$data["causas_nal"];
        $visita->proxima_visita=$data["fecha_proxima_visita"];
       
        $resul= $visita->save();
        $visita = DB::table('mod_agcte_fincas_visitas')->latest()->first();
        $id = $visita->id;
        $visita=ModAguacateFincasVisitas::find($id);
        $recomendaciones="";
        
        
       return redirect('form_editar_visita_finca_aguacate/'.$visita->id)
       ->with("recomendaciones",  $recomendaciones)
        ->with("id",  $id);
        } 

  public function form_editar_visita_finca_aguacate($id)

{
        $visita=ModAguacateFincasVisitas::find($id);
        $semanas=ModAguacateSemanas::all();
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $semanaspdn=ModAguacateVisitasempnd::where('id_visita','=',$visita->id)->get();
        $semanascosecha=ModAguacateVisitasemcosecha::where('id_visita','=',$visita->id)->get();
        $arbolespdn=ModAguacateVisitaarbolespnd::where('id_visita','=',$visita->id)->get();
    
        $msj='';
        
        
        return view('mod_aguacate.forms.form_editar_visita_finca_aguacate')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
        ->with("semanas",  $semanas)
        ->with("semanaspdn",$semanaspdn)
        ->with("semanascosecha",$semanascosecha)
        ->with("arbolespdn",$arbolespdn)        
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("fecha",$fecha)
        ->with("id",$id)
        ->with("visita",$visita)
        ->with("msj",$msj);
    

}


     public function agregar_visita_nueva_semana_pdn(Request $request)
    {

        $data=$request->all();

           $reglas = array(//'producto' => 'required|Numeric|min:1',
                     // 'hectareas' => 'required|Numeric|min:1',
                     // 'departamento' => 'required|Numeric|min:1',
                     // 'email' => 'required|Email|Unique:prospectos',
                     // 'cultivo' => 'required',
                      );
        $mensajes= array(//'producto.required' =>  'Selecciona un producto',
                       // 'producto.numeric' =>  'Selecciona un producto',
                      // 'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                     //  'email.required' =>  'Ingresar un email es obligatorio',
                      // 'email.email' =>  'el email debe tener un formato válido',
                    //   'email.unique' =>  'El email ya existe',
                    //   'telefono.required' => 'Debe Ingresar un teléfono',
                    //   'departamento.required' => 'Por favor selecciona un departamento',
                     //    'departamento.numeric' =>  'Selecciona un departamento'
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
       $errores = $validacion->errors(); 

        $finca = DB::table('mod_agcte_fincas')->latest()->first();
        $id_finca=$finca->id;
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $arboles=ModAguacateFincasArboles::where("id_finca","=",$id_finca)->get();
       // $prospectos=Prospectos::all();
       // $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
      //  $prospectos= Prospectos::where("idUsuarioAsignado","=",$idusuario_agri)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $msj="";
        $departamentos=Departamentos::all();
        $productos=Productos::all();
   
       
    return view('mod_aguacate.forms.form_editar_visita_finca_aguacate')
         ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
      //  ->with("prospectos",$prospectos)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("visita",$visita)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos)
         ->with("arboles",$arboles)
    //      ->with("productos",$productos)
    ->with("errors",$errores)
    ->with("msj","Existen errores de validación");

     }

        $visita_sempdn= new ModAguacateVisitasempnd;
        $visita_sempdn->id_visita  =  $data["idvisita"];
        $visita_sempdn->id_semana  =  $data["sempdn"];
        $visita_sempdn->desde  =  $data["sempdndesde"];
        $visita_sempdn->hasta  =  $data["sempdnhasta"];
        $visita_sempdn->vol_pdn  =  $data["sempdnvol_pdn"];
        $resul= $visita_sempdn->save();
    if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Semana Guardada Correctamente");   
        }
    else
    {
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

     }
    
}

    public function agregar_visita_nueva_semana_cosecha(Request $request)
    {

        $data=$request->all();

           $reglas = array(//'producto' => 'required|Numeric|min:1',
                     // 'hectareas' => 'required|Numeric|min:1',
                     // 'departamento' => 'required|Numeric|min:1',
                     // 'email' => 'required|Email|Unique:prospectos',
                     // 'cultivo' => 'required',
                      );
        $mensajes= array(//'producto.required' =>  'Selecciona un producto',
                       // 'producto.numeric' =>  'Selecciona un producto',
                      // 'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                     //  'email.required' =>  'Ingresar un email es obligatorio',
                      // 'email.email' =>  'el email debe tener un formato válido',
                    //   'email.unique' =>  'El email ya existe',
                    //   'telefono.required' => 'Debe Ingresar un teléfono',
                    //   'departamento.required' => 'Por favor selecciona un departamento',
                     //    'departamento.numeric' =>  'Selecciona un departamento'
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
       $errores = $validacion->errors(); 

        $finca = DB::table('mod_agcte_fincas')->latest()->first();
        $id_finca=$finca->id;
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $arboles=ModAguacateFincasArboles::where("id_finca","=",$id_finca)->get();
       // $prospectos=Prospectos::all();
       // $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
      //  $prospectos= Prospectos::where("idUsuarioAsignado","=",$idusuario_agri)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $msj="";
        $departamentos=Departamentos::all();
        $productos=Productos::all();
   
       
    return view('mod_aguacate.forms.form_editar_visita_finca_aguacate')
         ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
      //  ->with("prospectos",$prospectos)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("visita",$visita)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos)
         ->with("arboles",$arboles)
    //      ->with("productos",$productos)
    ->with("errors",$errores)
    ->with("msj","Existen errores de validación");

     }

        $visita_semcosecha= new ModAguacateVisitasemcosecha;
        $visita_semcosecha->id_visita  =  $data["idvisitacosecha"];
        $visita_semcosecha->id_semana  =  $data["semcosecha"];
        $visita_semcosecha->desde  =  $data["semcosechadesde"];
        $visita_semcosecha->hasta  =  $data["semcosechahasta"];
        $visita_semcosecha->tipo  =  $data["semcosechatipo"];
        $visita_semcosecha->vol_cosecha_kg  =  $data["semcosecha_kg"];
        $resul= $visita_semcosecha->save();
    if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Semana Guardada Correctamente");   
        }
    else
    {
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

     }
    
}

   public function agregar_visita_nuevo_pdn_arboles(Request $request)
    {

        $data=$request->all();

           $reglas = array(//'producto' => 'required|Numeric|min:1',
                     // 'hectareas' => 'required|Numeric|min:1',
                     // 'departamento' => 'required|Numeric|min:1',
                     // 'email' => 'required|Email|Unique:prospectos',
                     // 'cultivo' => 'required',
                      );
        $mensajes= array(//'producto.required' =>  'Selecciona un producto',
                       // 'producto.numeric' =>  'Selecciona un producto',
                      // 'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                     //  'email.required' =>  'Ingresar un email es obligatorio',
                      // 'email.email' =>  'el email debe tener un formato válido',
                    //   'email.unique' =>  'El email ya existe',
                    //   'telefono.required' => 'Debe Ingresar un teléfono',
                    //   'departamento.required' => 'Por favor selecciona un departamento',
                     //    'departamento.numeric' =>  'Selecciona un departamento'
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
       $errores = $validacion->errors(); 

        $finca = DB::table('mod_agcte_fincas')->latest()->first();
        $id_finca=$finca->id;
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $arboles=ModAguacateFincasArboles::where("id_finca","=",$id_finca)->get();
       // $prospectos=Prospectos::all();
       // $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
      //  $prospectos= Prospectos::where("idUsuarioAsignado","=",$idusuario_agri)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $msj="";
        $departamentos=Departamentos::all();
        $productos=Productos::all();
   
       
    return view('mod_aguacate.forms.form_editar_visita_finca_aguacate')
         ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
      //  ->with("prospectos",$prospectos)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("visita",$visita)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos)
         ->with("arboles",$arboles)
    //      ->with("productos",$productos)
    ->with("errors",$errores)
    ->with("msj","Existen errores de validación");

     }

        $visita_pdn_arbol= new ModAguacateVisitaarbolespnd;
        $visita_pdn_arbol->id_visita  =  $data["idvisitaarboles"];
        $visita_pdn_arbol->id_finca  =  $data["idfinca"];
        $visita_pdn_arbol->numarboles  =  $data["numarboles"];
        $visita_pdn_arbol->edad  =  $data["edad"];
        $visita_pdn_arbol->kg_arbol  =  $data["kg_arbol"];
        $visita_pdn_arbol->kg_total  =  $data["numarboles"]*$data["kg_arbol"];
        $resul= $visita_pdn_arbol->save();

    if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Guardado Correctamente");   
        }
    else
    {
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

     }
    
}

/*ReporteFincasAguacate*/
function reportfincasaguacate()
    { 
          $msj="";
          $idusuario=\Auth::user()->id;
          $asesor=User::all();
          $fincas= ModAguacateFincas::where('id_usuario','=',$idusuario)->get();
          $departamento= ModAguacateFincas::where('id_usuario','=',$idusuario)->select('id_depto')->get()->first();
          $cultivo= ModAguacateFincas::where('id_usuario','=',$idusuario)->select('id_cultivo')->get()->first();
          $areas_sembradas= AgroCensoDane::where('id_depto','=',$departamento)->get();
          $areas_totales_sembradas=DB::table('dane_censo')->where('id_depto','=',$departamento)->where('id_cultivo','=',$cultivo->id_cultivo)->sum('AREA_SEMBRADA(SUM)');
          $nombrecultivo='Aguacate';
          $nombredepto=$departamento->departamento;

          $visitastecnicas=ModAguacateFincasVisitas::where('id_usuario','=',$idusuario)->get();
          $cant_visitas=count($visitastecnicas);
          $cant_fincas=count($fincas);
          $usuarioactual=\Auth::user();
          $areas = DB::table('mod_agcte_fincas')->where('id_usuario','=',$idusuario)->sum('hectareas');

          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');
          
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
        //  $fecha_insercion=$prospectos->created_at;
       //   $howOldAmI = Carbon::createFromDate($fecha_insercion)->age;
          $officialDate = Carbon::now()->toRfc2822String();
    

       
          return view("mod_aguacate.reports.reportfincasaguacate")

          ->with("msj",$msj)
          ->with("fincas",$fincas)
          ->with("areas_totales_sembradas",$areas_totales_sembradas)
          ->with("nombrecultivo",$nombrecultivo)
          ->with("nombredepto",$nombredepto)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("date",$date)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("events_day",$events_day)
          ->with("areas",$areas)
          ->with("fecha",$fecha);
 
    }

function reportfincaaguacate($idfinca)
    { 
          $productorecomendado=ProductoRecomendado::latest()->first();
          $idusuario=\Auth::user()->id;
          $finca=ModAguacateFincas::find($idfinca);
          $fincas= ModAguacateFincasVisitas::where('id_finca','=',$idfinca)->get();
          $visitastecnicasusuario=ModAguacateFincasVisitas::where('id_usuario','=',$idusuario)->get();
          $msj="";
          $idempresa=\Auth::user()->idEmpresa;
          $empresa=UsuariosEmpresas::find($idempresa);
          $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
          $visitastecnicasimg=AgriVisitasTecnicas::where('id_usuario','=',$usuariosempresa)->get();
          $agricultores=AgriAgricultores::where('idUsuario','=',$idusuario)->get();
          $cant_visitas=count($visitastecnicasusuario);
          $prospectos=Prospectos::all();
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_fincas=count($fincas);
          $cant_agricultores=count($agricultores);
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
          $areas = DB::table('agri_fincas')->where('idUsuario','=',$idusuario)->sum('hectareas');

          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');          
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();
    
          return view("mod_aguacate.reports.reportvisitasfincaaguacate")

          ->with("msj",$msj)
          ->with("productorecomendado",$productorecomendado)
          ->with("prospectos",$prospectos)
          ->with("agricultores",$agricultores)
          ->with("visitastecnicasusuario",$visitastecnicasusuario)
          ->with("visitastecnicasimg",$visitastecnicasimg)
          ->with("finca",$finca)
          ->with("fincas",$fincas)
          ->with("idempresa",$idempresa)
          ->with("empresa",$empresa)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_agricultores",$cant_agricultores)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
         ->with("usuariosempresa",$usuariosempresa)
          ->with("date",$date)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("events_day",$events_day)
          ->with("areas",$areas)
          ->with("fecha",$fecha); 
    }


    function reportvisitasfincasaguacate()
    { 
          $productorecomendado=ProductoRecomendado::latest()->first();
          $idusuario=\Auth::user()->id;
          $fincas= ModAguacateFincas::where('id_usuario','=',$idusuario)->get();
          $visitastecnicasusuario=ModAguacateFincasVisitas::where('id_usuario','=',$idusuario)->get();
          $msj="";
          $idempresa=\Auth::user()->idEmpresa;
          $empresa=UsuariosEmpresas::find($idempresa);
          $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
          $visitastecnicasimg=AgriVisitasTecnicas::where('id_usuario','=',$usuariosempresa)->get();
          $agricultores=AgriAgricultores::where('idUsuario','=',$idusuario)->get();
          $cant_visitas=count($visitastecnicasusuario);
          $prospectos=Prospectos::all();
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_fincas=count($fincas);
          $cant_agricultores=count($agricultores);
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
          $areas = DB::table('agri_fincas')->where('idUsuario','=',$idusuario)->sum('hectareas');

          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');          
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();
    
          return view("mod_aguacate.reports.reportvisitasfincasaguacate")

          ->with("msj",$msj)
          ->with("productorecomendado",$productorecomendado)
          ->with("prospectos",$prospectos)
          ->with("agricultores",$agricultores)
          ->with("visitastecnicasusuario",$visitastecnicasusuario)
          ->with("visitastecnicasimg",$visitastecnicasimg)
          ->with("fincas",$fincas)
          ->with("idempresa",$idempresa)
          ->with("empresa",$empresa)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_agricultores",$cant_agricultores)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
         ->with("usuariosempresa",$usuariosempresa)
          ->with("date",$date)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("events_day",$events_day)
          ->with("areas",$areas)
          ->with("fecha",$fecha); 
    }

    /*GeoposicionFincas*/

        public function mapagctfincas()
  {
    $user = \Auth::user();

    $fecha=date('Y-m-d');

    $events= Eventos::where('idUsuario','=',$user->id)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $idusuario=\Auth::user()->id;
        $agricultores=AgriAgricultores::where('idUsuario','=',$idusuario)->get();
        $cant_agricultores=count($agricultores);
    $fincas=Agrifincas::where('idUsuario','=',$idusuario)->get();
    $visitastecnicas=AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->get();
    $cant_visitas=count($visitastecnicas);
    $cant_fincas=count($fincas);
    $cant_agricultores=count($agricultores);
    return view('mod_aguacate.mapas.map_aguac_fincas', [
      'usuario' => $user,
      'events_day' => $events_day,
      'agricultores' =>$agricultores,
      'cant_agricultores' => $cant_agricultores,
      'cant_visitas' =>$cant_visitas,
      'cant_fincas' =>$cant_fincas,
      'cant_agricultores' =>$cant_agricultores,
    ]);
  }

     public function modmediaagcat() {


        $msj="";
        
        $usuario_actual=\Auth::user();
        $idusuario=\Auth::user()->id;
        
        $departamento= AgriFincas::where('idUsuario','=',$idusuario)->select('id_ciudad')->get()->last();
          $ndepto=Departamentos::find($departamento->id_ciudad);
          $nombredepto=$ndepto->departamento;
          $cultivo= AgriFincas::where('idUsuario','=',$idusuario)->select('idCultivo')->get()->last();
          $ncultivo=Cultivos::find($cultivo->idCultivo);
          $nombrecultivo=$ncultivo->cultivo;
          $areas_sembradas= AgroCensoDane::where('id_depto','=',$departamento)->get();
          $areas_totales_sembradas=DB::table('dane_censo')->where('id_depto','=',$departamento->id_ciudad)->where('id_cultivo','=',$cultivo->idCultivo)->sum('AREA_SEMBRADA(SUM)');
        
        
        $idEmpresa=$usuario_actual->idEmpresa;
        $empresa=UsuariosEmpresas::find($idEmpresa);
        $usuariosempresa=User::where('idEmpresa','=', $idEmpresa)->orderBy('created_at', 'desc')->get();

          $idusuario=\Auth::user()->id;
          $msj="";
          $usuarioactual=\Auth::user();
          $usuario=\Auth::user();
          $agricultores=AgriAgricultores::where('idUsuario','=',$idusuario)->get();
          $cant_agricultores=count($agricultores);
          $fincas=Agrifincas::where('idUsuario','=',$idusuario)->get();
          $visitastecnicas=AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->get();
          $cant_visitas=count($visitastecnicas);
          $cant_fincas=count($fincas);
       

          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');          
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();
    
          return view("mod_aguacate.fotos.modmediaagcat")

          ->with("msj",$msj)
          ->with("empresa",$empresa)
          ->with("usuariosempresa",$usuariosempresa)
           ->with("departamento",$departamento)
          ->with("cultivo",$cultivo)
          ->with("nombrecultivo",$nombrecultivo)
          ->with("nombredepto",$nombredepto)
          ->with("areas_totales_sembradas",$areas_totales_sembradas)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("agricultores",$agricultores)
          ->with("cant_agricultores",$cant_agricultores)
          ->with("date",$date)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("usuario", $usuario )
          ->with("events_day",$events_day)
          ->with("events",$events)
          ->with("fecha",$fecha);
    }

 public function form_editar_finca_aguacate_js($id)

{
        $finca=ModAguacateFincas::find($id);
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $cultivos=Cultivos::all();
        $departamentos=Departamentos::all();
        $msj='';
        
        
        return view('mod_aguacate.forms.form_editar_finca_aguacate_js')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("fecha",$fecha)
        ->with("id",$id)
        ->with("finca",$finca)
        ->with("msj",$msj)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos);
        


}

/**MODULOAGUACATE**/

 
 


function listado_fincas_agricultores()
    { 
          $msj="";
          $idusuario=\Auth::user()->id;
          $asesor=User::all();
          $fincas= AgriFincas::where('idUsuario','=',$idusuario)->get();
          $departamento= AgriFincas::where('idUsuario','=',$idusuario)->select('id_ciudad')->get()->first();
          $ndepto=Departamentos::find($departamento->id_ciudad);
          $nombredepto=$ndepto->departamento;
          $cultivo= AgriFincas::where('idUsuario','=',$idusuario)->select('idCultivo')->get()->first();
          $ncultivo=Cultivos::find($cultivo->idCultivo);
          $nombrecultivo=$ncultivo->cultivo;
          $areas_sembradas= AgroCensoDane::where('id_depto','=',$departamento)->get();
          $areas_totales_sembradas=DB::table('dane_censo')->where('id_depto','=',$departamento->id_ciudad)->where('id_cultivo','=',$cultivo->idCultivo)->sum('AREA_SEMBRADA(SUM)');
          $agricultores1= array('$fincas->delagricultor;');
          $agricultores=AgriAgricultores::where('idUsuario','=',$idusuario)->get();
          $visitastecnicas=AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->get();
          $cant_visitas=count($visitastecnicas);
          $prospectos=Prospectos::all();
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_fincas=count($fincas);
          $cant_agricultores=count($agricultores);
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
          $areas = DB::table('agri_fincas')->where('idUsuario','=',$idusuario)->sum('hectareas');

          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');
          
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
        //  $fecha_insercion=$prospectos->created_at;
       //   $howOldAmI = Carbon::createFromDate($fecha_insercion)->age;
          $officialDate = Carbon::now()->toRfc2822String();
    

       
          return view("listados.agricultor.listado_fincas_agricultores")

          ->with("msj",$msj)
          ->with("prospectos",$prospectos)
          ->with("agricultores",$agricultores)
          ->with("departamento",$departamento)
          ->with("cultivo",$cultivo)
          ->with("nombrecultivo",$nombrecultivo)
          ->with("nombredepto",$nombredepto)
          ->with("fincas",$fincas)
           ->with("areas_totales_sembradas",$areas_totales_sembradas)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_agricultores",$cant_agricultores)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
          ->with("asesor",$asesor)
          ->with("date",$date)
        //  ->with("howOldAmI",$howOldAmI)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
     //   ->with("events",$events)
          ->with("events_day",$events_day)
       // ->with("total_areas",$total_areas)
          ->with("areas",$areas)
          ->with("fecha",$fecha);
 
    }




        public function agregar_proyectos_usuario(Request $request)
    {
       //presenta el formulario para agregar y los datos de los proyectos

        $archivo = $request->file('file');
        $input  = array('file' => $archivo) ;
        $reglas = array('file' => 'required|mimes:pdf|max:10000');  //recordar que para activar mimes se debe descomentar la linea de codigo  'extension=php_fileinfo.dll' del php.ini
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es un pdf o es demasiado Grande para subirlo");
        }
        else
        {
             $proyecto= new Proyectos; 
             $proyecto->idUsuario=$request->input('id_usuario');
             $proyecto->titulo=$request->input('titulo_proyecto');
             $proyecto->integrantes=$request->input('integrantes_proyecto');
             $proyecto->descripcion=$request->input('descripcion_proyecto');
             $proyecto->objetivo=$request->input('objetivo_proyecto');
             $proyecto->estado=$request->input('estado_proyecto');
             $proyecto->fecha=$request->input('fecha_proyecto');
             $proyecto->pais=$request->input('pais_proyecto');
             $proyecto->financiamiento=$request->input('financiamiento_proyecto');
             $proyecto->pclave=$request->input('pclave_proyecto');
             $carpeta="proyectos";
             $ruta=$carpeta."/".$request->input("id_usuario")."_".$archivo->getClientOriginalName();
             $r1=Storage::disk('archivos')->put($ruta,  \File::get($archivo) );
             $proyecto->ruta=$ruta;
             $resul= $proyecto->save();
            if($resul){            
                    return view("mensajes.msj_correcto")->with("msj","Proyecto Agregado Correctamente");   
            }
            else
            {            
                     return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
            }
        }

    }


        public function borrar_proyecto($id){

       $proyecto=Proyectos::find($id);
       $resul=$proyecto->delete();
        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Proyecto Borrado correctamente");   
        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }

    }

  public function form_nueva_visita_finca_agricultor($id)
        
         
              {
         
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
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
        $productos=Productos::all();
        $finca=AgriFincas::find($id);
        $agricultor=$finca->delagricultor;        
        
        return view('formularios.agricultor.visitatecnica.form_nueva_visita_finca_agricultor')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
        ->with("id",$id)
        ->with("agricultor",$agricultor)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
         ->with("finca",  $finca)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos)
        ->with("productos",$productos);

    }  


        public function agregar_nueva_visitatecnica_agricultor(Request $request)
    {

        $data=$request->all();

           $reglas = array(//'nombre_finca' => 'required',
                     // 'hectareas' => 'required|Numeric|min:1',
                     // 'departamento' => 'required|Numeric|min:1',
                     // 'email' => 'required|Email|Unique:prospectos',
                     // 'cultivo' => 'required',
                      );
        $mensajes= array(//'nombre_finca.required' =>  'El nombre es obligatorio',
                      // 'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                     //  'email.required' =>  'Ingresar un email es obligatorio',
                      // 'email.email' =>  'el email debe tener un formato válido',
                    //   'email.unique' =>  'El email ya existe',
                    //   'telefono.required' => 'Debe Ingresar un teléfono',
                    //   'departamento.required' => 'Por favor selecciona un departamento',
                     //    'departamento.numeric' =>  'Selecciona un departamento'
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails()){
        $errores = $validacion->errors(); 
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $cultivos=Cultivos::all();
        $msj="";
        $paises=Pais::all();
        $departamentos=Departamentos::all();
   
       
    return view('formularios.agricultor.form_nueva_visita_finca_agricultor')
    ->with("usuario",  $usuarioactual)
    ->with("events",$events)
    ->with("paises",$paises)
    ->with("canales",$canales)
    ->with("events_day",$events_day)
    ->with("fecha",$fecha)
    ->with("errors",$errores)
    ->with("departamentos",$departamentos)
    ->with("msj","Existen errores de validación");

                                  }
     /*   $foto1 = $request->file('foto1');
        $input  = array('file' => $foto1) ;
        $reglas = array('file' => 'required|mimes:jpeg,jpg,pdf,png|max:15000000'); 
       // $foto2 = $request->file('foto2');
        $carpeta=$request->input("id_agricultor");
        $ruta=$carpeta."/".$request->input("id_agricultor")."_".$foto1->getClientOriginalName();
           $r1=Storage::disk('/archivos')->put($ruta,  \File::get($foto1) );*/
        
        $foto1 = $request->file('foto1');
        $foto2 = $request->file('foto2');
        $input  = array('image' => $foto1) ;
        $input  = array('image' => $foto2) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:15000000');
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
        }
        else
        {
        $id=$data['id'];
        $nombre_original=$foto1->getClientOriginalName();
        $extension=$foto1->getClientOriginalExtension();
        $nuevo_nombre="foto1visita-".$id.".".$extension;
        $r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($foto1) );
        $rutadelaimagen="../storage/fotografias/".$nuevo_nombre;

        $nombre_original=$foto2->getClientOriginalName();
        $extension=$foto2->getClientOriginalExtension();
        $nuevo_nombre="foto2visita-".$id.".".$extension;
        $r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($foto2) );
        $rutadelaimagen2="../storage/fotografias/".$nuevo_nombre;
      
      }
           
 
        $visita= new AgriVisitasTecnicas;
         $visita->imagen1=$rutadelaimagen;
         $visita->imagen2=$rutadelaimagen2;
        $visita->id_agricultor  = $data["agricultor"];
        $visita->id_finca  =  $data["nombre_finca"];
        $visita->id_tipo_cultivo  =   $data["cultivo"];
        $visita->id_usuario  =  \Auth::user()->id;
        $visita->id_empresa  =  \Auth::user()->idEmpresa;
        //$visita->objetivo=$data["objetivo"];
        $visita->lat_lnt=$data["coords"];
        $visita->altitud= 0;
        $visita->longitud=0;
        $visita->latitud=0;
        $visita->hectareas=$data["hectareas"];
        $visita->aplicaciones=$data["aplicaciones"];
        $visita->frecuencia=$data["frecuencia"];
        $visita->proxima_visita=$data["fecha_proxima_visita"];
       
        $resul= $visita->save();
        $finca = DB::table('visitastecnicas')->latest()->first();
        $id = $finca->id;
        $finca=AgriVisitasTecnicas::find($id);
        $recomendaciones="";
        
        
       return redirect('form_editar_visita_finca_agricultor/'.$finca->id)
       ->with("recomendaciones",  $recomendaciones)
        ->with("id",  $id);
        } 



  public function form_nuevo_producto_visitatecnica_agricultor()

{
        $visita = DB::table('visitastecnicas')->latest()->first();
        $id_visita=$visita->id;
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $recomendaciones=AgriVisitasTecnicasProductos::where("id_vt","=",$id_visita)->get();
       // $prospectos=Prospectos::all();
       // $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
      //  $prospectos= Prospectos::where("idUsuarioAsignado","=",$idusuario_agri)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $productos=Productos::all();
        
        
        return view('formularios.agricultor.visitatecnica.form_nuevo_producto_visitatecnica_agricultor')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
      //  ->with("prospectos",$prospectos)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("visita",$visita)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos)
         ->with("recomendaciones",$recomendaciones)
          ->with("productos",$productos);


}




 


      public function agregar_nuevo_producto_visitatecnica_agricultor_ajax($id)
    {
      $data=$request->all();
        $visita=AgriVisitasTecnicas::find($id);
        
        $visita_producto= new AgriVisitasTecnicasProductos;
        $visita_producto->id_vt  =  $visita->id;
        $visita_producto->id_producto  =  $data["producto"];
        $visita_producto->cantidad  =  $data["dosis"];
        $visita_producto->um  =  $data["un_medida"];
        $resul= $visita_producto->save();
    /*if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Cotización Creada Correctamente");   
        }
    else
    {
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

    }*/
    
}




  public function form_editar_visita_finca_agricultor_js($id)

{
        $visita=AgriVisitasTecnicas::find($id);
       // $id_agricultor2=$$visita->id_agricultor;
        $recomendaciones=AgriVisitasTecnicasProductos::where("id_vt","=",$visita->id)->get();
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $productos=Productos::all();
        $msj='';
        
        
        return view('formularios.agricultor.visitatecnica.form_editar_visita_finca_agricultor_js')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
        ->with("prospectos",$prospectos)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("id",$id)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("visita",$visita)
        ->with("msj",$msj)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos)
        ->with("recomendaciones",$recomendaciones)
        ->with("productos",$productos);


}

public function enviar_informe_visitatecnica(Request $request)
{ 

$data=$request->all();

//Variables para email 
  $id_visita=$data["id_visita"];
  $visita=AgriVisitasTecnicas::find($id_visita);
  $idempresa=$data["idempresa"];
  $empresa=UsuariosEmpresas::find($idempresa);
  $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
  $destinatario=$data["email_agricultor"];
  $email_asesor=$data["email_asesor"];


   foreach ($usuariosempresa as $usuario) {

  $emailusuario = $usuario->email;

  $fecha_visita=$data["fecha_visita"];
  $asunto="Registro de Nueva Visita Técnica";
 
  
  $recomendaciones=$data["recomendaciones"];
  $nombre_asesor= $data["nombre_asesor"];
  $nombre_agricultor=$data["nombre_agricultor"];
  $numero_hectareas=$data["numero_hectareas"];
  $nombre_finca=$data["nombre_finca"];
  $cultivo_finca=$data["cultivo_finca"];
  $recomendaciones=AgriVisitasTecnicasProductos::where("id_vt","=",$id_visita)->get();
 
   $data = array(
    'destinatario' => $destinatario,
    'email_asesor'=>$email_asesor,
    'empresa'=> $empresa,
     'visita' => $visita,
  //  'emailusuario' => $usuario->email,
    'nombre_asesor'=> $nombre_asesor,
    'numero_hectareas'=> $numero_hectareas,
    'recomendaciones' => $recomendaciones,
    'nombre_agricultor' => $nombre_agricultor,
    'nombre_finca' =>$nombre_finca,
    'cultivo_finca' =>$cultivo_finca,
    'fecha_visita'=>$fecha_visita,
  
  );
         // if (Input::get('check')) {
         
         if ($destinatario==NULL) {
                         Mail::send('correo.plantilla_reporte_visita_tecnica', $data, function ($message) use ($asunto,$destinatario,$empresa,$visita,$email_asesor, $recomendaciones,$nombre_agricultor,$nombre_finca,$cultivo_finca,$fecha_visita) {
                  $message->from('info@agronielsen.com', 'Agronielsen en Campo');
                  $message->to($email_asesor)
                  ->cc('ricaza81@gmail.com')->subject($asunto);});
                      }  else {
             Mail::send('correo.plantilla_reporte_visita_tecnica', $data, function ($message) use ($asunto,$visita,$empresa, $recomendaciones,$email_asesor,$destinatario,$nombre_agricultor,$nombre_finca,$cultivo_finca,$fecha_visita) {
                  $message->from('info@agronielsen.com', 'Agronielsen en Campo');
                  $message->to($destinatario)
                  ->cc($email_asesor)->bcc('ricaza81@gmail.com')->subject($asunto);});
                                      } }

          $msj='Notificación: Reporte de Visita Técnica Enviado';
          $idusuario=\Auth::user()->id;
          $fincas= AgriFincas::where('idUsuario','=',$idusuario)->get();
          $visitastecnicasusuario=AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->get();
          $idempresa=\Auth::user()->idEmpresa;
          $empresa=UsuariosEmpresas::find($idempresa);
          $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
          $agricultores=AgriAgricultores::where('idUsuario','=',$idusuario)->get();
          $cant_visitas=count($visitastecnicasusuario);
          $prospectos=Prospectos::all();
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_fincas=count($fincas);
          $cant_agricultores=count($agricultores);
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
          $areas = DB::table('agri_fincas')->where('idUsuario','=',$idusuario)->sum('hectareas');

          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');          
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();
          $productorecomendado=ProductoRecomendado::latest()->first();
    
          return view("listados.agricultor.visitastecnicas.reportevisitastecnicas")

          ->with("msj",$msj)
          ->with("productorecomendado",$productorecomendado)
          ->with("prospectos",$prospectos)
          ->with("agricultores",$agricultores)
          ->with("visitastecnicasusuario",$visitastecnicasusuario)
          ->with("fincas",$fincas)
          ->with("idempresa",$idempresa)
          ->with("empresa",$empresa)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_agricultores",$cant_agricultores)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
         ->with("usuariosempresa",$usuariosempresa)
          ->with("date",$date)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("events_day",$events_day)
          ->with("areas",$areas)
          ->with("fecha",$fecha); 
}

      public function fotovisitastecnicas() {


        $msj="";
        
        $usuario_actual=\Auth::user();
        $idusuario=\Auth::user()->id;
        
        $departamento= AgriFincas::where('idUsuario','=',$idusuario)->select('id_ciudad')->get()->last();
          $ndepto=Departamentos::find($departamento->id_ciudad);
          $nombredepto=$ndepto->departamento;
          $cultivo= AgriFincas::where('idUsuario','=',$idusuario)->select('idCultivo')->get()->last();
          $ncultivo=Cultivos::find($cultivo->idCultivo);
          $nombrecultivo=$ncultivo->cultivo;
          $areas_sembradas= AgroCensoDane::where('id_depto','=',$departamento)->get();
          $areas_totales_sembradas=DB::table('dane_censo')->where('id_depto','=',$departamento->id_ciudad)->where('id_cultivo','=',$cultivo->idCultivo)->sum('AREA_SEMBRADA(SUM)');
        
        
        $idEmpresa=$usuario_actual->idEmpresa;
        $empresa=UsuariosEmpresas::find($idEmpresa);
        $usuariosempresa=User::where('idEmpresa','=', $idEmpresa)->orderBy('created_at', 'desc')->get();

          $idusuario=\Auth::user()->id;
          $msj="";
          $usuarioactual=\Auth::user();
          $usuario=\Auth::user();
          $agricultores=AgriAgricultores::where('idUsuario','=',$idusuario)->get();
          $cant_agricultores=count($agricultores);
          $fincas=Agrifincas::where('idUsuario','=',$idusuario)->get();
          $visitastecnicas=AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->get();
          $cant_visitas=count($visitastecnicas);
          $cant_fincas=count($fincas);
       

          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');          
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();
    
          return view("listados.agricultor.visitastecnicas.fotovisitastecnicas")

          ->with("msj",$msj)
          ->with("empresa",$empresa)
          ->with("usuariosempresa",$usuariosempresa)
           ->with("departamento",$departamento)
          ->with("cultivo",$cultivo)
          ->with("nombrecultivo",$nombrecultivo)
          ->with("nombredepto",$nombredepto)
          ->with("areas_totales_sembradas",$areas_totales_sembradas)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("agricultores",$agricultores)
          ->with("cant_agricultores",$cant_agricultores)
          ->with("date",$date)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("usuario", $usuario )
          ->with("events_day",$events_day)
          ->with("events",$events)
          ->with("fecha",$fecha);
    }
    
    
function reportevisitastecnicas()
    { 
          $productorecomendado=ProductoRecomendado::latest()->first();
          $idusuario=\Auth::user()->id;
          $fincas= AgriFincas::where('idUsuario','=',$idusuario)->get();
          $visitastecnicasusuario=AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->get();
          $msj="";
          $idempresa=\Auth::user()->idEmpresa;
          $empresa=UsuariosEmpresas::find($idempresa);
          $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
          $visitastecnicasimg=AgriVisitasTecnicas::where('id_usuario','=',$usuariosempresa)->get();
          $agricultores=AgriAgricultores::where('idUsuario','=',$idusuario)->get();
          $cant_visitas=count($visitastecnicasusuario);
          $prospectos=Prospectos::all();
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_fincas=count($fincas);
          $cant_agricultores=count($agricultores);
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
          $areas = DB::table('agri_fincas')->where('idUsuario','=',$idusuario)->sum('hectareas');

          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');          
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();
    
          return view("listados.agricultor.visitastecnicas.reportevisitastecnicas")

          ->with("msj",$msj)
          ->with("productorecomendado",$productorecomendado)
          ->with("prospectos",$prospectos)
          ->with("agricultores",$agricultores)
          ->with("visitastecnicasusuario",$visitastecnicasusuario)
          ->with("visitastecnicasimg",$visitastecnicasimg)
          ->with("fincas",$fincas)
          ->with("idempresa",$idempresa)
          ->with("empresa",$empresa)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_agricultores",$cant_agricultores)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
         ->with("usuariosempresa",$usuariosempresa)
          ->with("date",$date)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("events_day",$events_day)
          ->with("areas",$areas)
          ->with("fecha",$fecha); 
    }
    
    
    
      /*Creación de visita a agricultor y fincas creadas*/
      public function form_nueva_visita_agricultor_creado()
        
         
              {
         
                     $usuarioactual=\Auth::user();
        $msj=""; 
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();       
        
        return view('formularios.agricultor.visitatecnica.creado.form_nueva_visita_agricultor_creado')
     ->with("usuario",  $usuarioactual)
    ->with("prospectos",$prospectos)
    ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("msj",$msj)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos); 



    }  
    
        public function ubicacion_fincas_aguacate()
    {
        $usuario=\Auth::user();
        $idusuario=$usuario->id;
        $fincas = ModAguacateFincas::where('lat_lnt', '!=', '')->where('id_usuario','=',$idusuario)->get();
       // $fincas = AgriFincas::where('lat_lnt', '!=', '')->get();

        $lat_lnt = [];
       // $finca = [];

        foreach ($fincas as $finca) {
            $lat_lnt[] = json_decode($finca->lat_lnt, $finca->finca);
           // $nombre[] = json_decode($finca->finca);
        }

        return Response::json($lat_lnt);
      //  return Response::json($finca);

    }
    
            public function ubicacion_visitas()
    {
        $usuario=\Auth::user();
        $idusuario=$usuario->id;
       // $visitas = AgriVisitasTecnicas::where('lat_lnt', '!=', '')->where('id_usuario','=',$idusuario)->get();
        $visitas = AgriVisitasTecnicas::where('lat_lnt', '!=', '')->where('id_usuario','=',$idusuario)->get();

        $lat_lnt = [];

        foreach ($visitas as $visita) {
            $lat_lnt[] = json_decode($visita->lat_lnt);
        }

        return Response::json($lat_lnt);
    }
    
          public function formnuevoproductoempresa(Request $request)
        {
         
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $idEmpresa=$usuarioactual->idEmpresa;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $productos=Productos::where('idEmpresa','=',$idEmpresa)->get();
        $productoslineas=ProductosLineas::all();
        $productostipo=ProductosTipo::all();
        $departamentos=Departamentos::all();
        
        
        return view('formularios.empresa.productos.formnuevoproductoempresa')
        ->with("usuario",  $usuarioactual)
        ->with("idEmpresa",  $idEmpresa)
        ->with("idusuario",  $idusuario)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("productos",$productos)
        ->with("productoslineas",$productoslineas)
        ->with("productostipo",$productostipo)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }
    
      public function agregarproductoempresa(Request $request)
        {

          $data=$request->all();

          $reglas = array( 'marca_producto' => 'required',
                           'productolinea' => 'required|Numeric|min:1',
                           'precio' => 'required|Numeric|min:1',
                           'productotipo' => 'required|Numeric|min:1',                           
                                 );
        $mensajes= array('marca_producto.required' =>  'Ingresa una marca del producto',
                        'productolinea.numeric' =>  'Selecciona una línea',
                        'precio.required' => 'Ingresa el precio',
                        'precio.numeric' =>  'El precio debe ser mayor a 1',
                        'productotipo.numeric' =>  'Producto Líquido, Sólido?',
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
          $errores = $validacion->errors();

        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
        $idEmpresa=$usuarioactual->idEmpresa;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $productos=Productos::where('idEmpresa','=',$idEmpresa)->get();
        $cantpdtos=count($productos);
        $productoslineas=ProductosLineas::all();
        $productostipo=ProductosTipo::all();
        $departamentos=Departamentos::all();

        
        return view('formularios.empresa.productos.formnuevoproductoempresa')
        ->with("usuario",  $usuarioactual)
        ->with("idEmpresa",  $idEmpresa)
        ->with("idusuario",  $idusuario)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("productos",$productos)
        ->with("cantpdtos",$cantpdtos)
        ->with("productoslineas",$productoslineas)
        ->with("productostipo",$productostipo)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("errors",$errores)
        ->with("msj","Existen errores de validación")
        ->with("cultivos",$cultivos); }

        $data=$request->all();
        $empresa_producto= new Productos;
        $empresa_producto->idEmpresa  =  $data["idEmpresa"];
        $empresa_producto->precio  =  $data["precio"];
        $empresa_producto->producto  =  $data["marca_producto"];
        $empresa_producto->marca  =  $data["marca_producto"];
        $empresa_producto->linea  =  $data["productolinea"];
        $empresa_producto->tipo  =  $data["productotipo"];
        $empresa_producto->activo  =  1;
        $resul= $empresa_producto->save();

        $msj="";
          $usuarioactual=\Auth::user();
          $idusuario=\Auth::user()->id;
          $prospectos=Prospectos::all();
          $agricultores=AgriAgricultores::where('idUsuario','=',$idusuario)->get();
          $fincas=Agrifincas::where('idUsuario','=',$idusuario)->get();
          $visitastecnicas=AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->get();
          $cant_visitas=count($visitastecnicas);
          $cant_fincas=count($fincas);
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_agricultores=count($agricultores);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
          $productos=Productos::where('idEmpresa','=', \Auth::user()->idEmpresa)->get();
                  /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();

          return view("listados.productos.reporteproductos")
          ->with("msj",$msj)
          ->with("productos",$productos)
          ->with("prospectos",$prospectos)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("agricultores",$agricultores)
          ->with("cant_agricultores",$cant_agricultores)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
          ->with("asesor",$asesor)
          ->with("date",$date)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("events_day",$events_day)
          ->with("fecha",$fecha);
 
    
}

      public function visitas_pendientes()
      {
          $idusuario=\Auth::user()->id;
          $usuarioactual=\Auth::user();
          $fecha=date('Y-m-d');
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();
          $msj="";          
         $visitas= AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->where('proxima_visita','>=',$fecha)->get();
       //   $visitas= AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->get();

          return view("listados.empresas.seguimientovisitasplaneadas")

          ->with("date",$date)
          ->with("msj",$msj)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("events_day",$events_day)
          ->with("visitas",$visitas)
          ->with("fecha",$fecha);
      }

}
