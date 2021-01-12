<?php

namespace App\Http\Controllers;

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
use App\AgriAgricultores;
use App\AgriVisitasTecnicas;
use App\AgroCensoDane;
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
use App\Order;
use App\Canales;
use App\Departamentos;
use Carbon\Carbon;
use Mail;
use Response;



class PagoController extends Controller {
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


  



    public function form_pago()
     
        {
         $idusuario=\Auth::user()->id;
        $fecha=date('Y-m-d');
        $idempresa=\Auth::user()->idEmpresa;
          $empresa=UsuariosEmpresas::find($idempresa);
       
          $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
          $cantidadusuarios=count($usuariosempresa);
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
          $usuarioactual=\Auth::user();
    
        
        
        return view('formularios.pago.form-pago')
        
        ->with("idempresa",$idempresa)
        ->with("idusuario",  $idusuario)
        ->with("empresa",$empresa)
        ->with("fecha",$fecha)
        ->with("cantidadusuarios",$cantidadusuarios)
         ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("usuario",  $usuarioactual);

    }
    
        public function respuestapago()
     
        {
            
        $extra1 = $_REQUEST['extra1'];
        $extra2 = $_REQUEST['extra2'];
        $ingreso_total=$_REQUEST['TX_VALUE'];
        $orden= new Order;
        $orden->idEmpresa=$extra1;
        $orden->idUsuario=$extra2;
        $orden->ingreso_total=$ingreso_total;
        $resul= $orden->save();
        
        $empresa=UsuariosEmpresas::find($extra1);
        $empresa->estadoempresa=1;
        $resul= $empresa->save();
            
         $idusuario=\Auth::user()->id;
        $fecha=date('Y-m-d');
        $idempresa=\Auth::user()->idEmpresa;
          $empresa=UsuariosEmpresas::find($idempresa);
       
          $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
          $cantidadusuarios=count($usuariosempresa);
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
          $usuarioactual=\Auth::user();
    
        
        
        return view('formularios.pago.respuestapago')
        
        ->with("idempresa",$idempresa)
        ->with("idusuario",  $idusuario)
        ->with("empresa",$empresa)
        ->with("fecha",$fecha)
        ->with("cantidadusuarios",$cantidadusuarios)
         ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("usuario",  $usuarioactual);

    }

        public function form_nueva_finca_agricultor_nativo()
     
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
           
        
    return view('formularios.agricultor.form_nueva_finca_agricultor_nativo')
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



        public function agregar_nueva_finca_agricultor(Request $request)
    {

        $data=$request->all();

           $reglas = array('agricultor' => 'required|Numeric|min:1',
                          'nombre_finca' => 'required',
                           'cultivo' => 'required|Numeric|min:1',
                           'hectareas' => 'required|Numeric|min:1',
                           'pais' => 'required|Numeric|min:1',
                           'departamento' => 'required|Numeric|min:1',
                                 );
        $mensajes= array('agricultor.numeric' =>  'Selecciona un agricultor',
                        'nombre_finca.required' =>  'Debe ingresar un nombre finca',
                        'cultivo.numeric' =>  'Selecciona un cultivo',
                        'hectareas.required' =>  'Falta el # Hectareas',
                        'hectareas.numeric' =>  'Falta el # Hectareas',
                        'pais.numeric' =>  'Falta el pais',
                        'departamento.numeric' =>  'Falta el departamento',

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
    
        
    return view('formularios.agricultor.form_nueva_finca_agricultor_nativo')
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

 
        $finca= new AgriFincas;
        $finca->id_agricultor  =  $data["agricultor"];
        $finca->finca  =  $data["nombre_finca"];
        $finca->id_ciudad  =  $data["departamento"];
        $finca->idUsuario  =  \Auth::user()->id;
        $finca->idCultivo  =  $data["cultivo"];
        $finca->uid= str_random(10);
        $finca->vereda= 'en desarrollo';
        $finca->hectareas=$data["hectareas"];
        $finca->lat_lnt=$data["coords"];
        $resul= $finca->save();
        $finca = DB::table('agri_fincas')->latest()->first();
        $id = $finca->id;
      //  $fincaarray=AgriFincas::find($id);
       $recomendaciones="";
        
        
       return redirect('form_nueva_visita_finca_agricultor/'.$finca->id)
      ->with("recomendaciones",  $recomendaciones)
        ->with("id",  $id);
        } }
 


function listado_fincas_agricultores()
    { 
          $msj="";
          $idusuario=\Auth::user()->id;
          $asesor=User::all();
          $fincas= AgriFincas::where('idUsuario','=',$idusuario)->get();
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
          ->with("fincas",$fincas)
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
        $reglas = array('file' => 'required|mimes:pdf|max:50000');  //recordar que para activar mimes se debe descomentar la linea de codigo  'extension=php_fileinfo.dll' del php.ini
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
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:900');
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
        }
        else
        {

        $nombre_original=$foto1->getClientOriginalName();
        $extension=$foto1->getClientOriginalExtension();
        $nuevo_nombre="foto1visita-".'nielsen'.".".$extension;
        $r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($foto1) );
        $rutadelaimagen="../storage/fotografias/".$nuevo_nombre;

        $nombre_original=$foto2->getClientOriginalName();
        $extension=$foto2->getClientOriginalExtension();
        $nuevo_nombre="foto2visita-".'nielsen'.".".$extension;
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




        public function agregar_nuevo_producto_visitatecnica_agricultor(Request $request)
    {

        $data=$request->all();

           $reglas = array('producto' => 'required',
                     // 'hectareas' => 'required|Numeric|min:1',
                     // 'departamento' => 'required|Numeric|min:1',
                     // 'email' => 'required|Email|Unique:prospectos',
                     // 'cultivo' => 'required',
                      );
        $mensajes= array('producto.required' =>  'Selecciona un producto',
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

        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $cultivos=Cultivos::all();
        $msj="";
        $paises=Pais::all();
        $departamentos=Departamentos::all();
   
       
    return view('formularios.agricultor.visitatecnica.form_nuevo_producto_visitatecnica_agricultor')
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

        $valorizacion= (($data["precio"]/1000)*$data["dosis"]*$data["hectareas"])*$data["aplicaciones"];
        $visita_producto= new AgriVisitasTecnicasProductos;
        $visita_producto->id_vt  =  $data["id_visita"];
        $visita_producto->id_producto  =  $data["producto"];
        $visita_producto->cantidad  =  $data["dosis"];
        $visita_producto->um  =  $data["un_medida"];
        $visita_producto->precio  =  $valorizacion;  
        $resul= $visita_producto->save();
    if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Producto Guardado Correctamente");   
        }
    else
    {
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

     }
    
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


  public function form_editar_visita_finca_agricultor($id)

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
        //$productos=Productos::all();
         $productos=Productos::where('idEmpresa','=',$usuarioactual->idEmpresa)->get();
        $msj='';
        
        
        return view('formularios.agricultor.visitatecnica.form_editar_visita_finca_agricultor')
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

  public function subir_foto_vt(Request $request)
  {

      $id=$request->input('id_foto1_vt');
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


public function enviar_informe_visitatecnica(Request $request)
{ 

$data=$request->all();

//Variables para email 
  $id_visita=$data["id_visita"];
 $visita=AgriVisitasTecnicas::find($id_visita);
  $idempresa=$data["idempresa"];
  $empresa=UsuariosEmpresas::find($idempresa);
  $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
 // $email_agricultor=  $data["email_agricultor"];


   foreach ($usuariosempresa as $usuario) {

  $emailusuario = $usuario->email;

  $fecha_visita=$data["fecha_visita"];
  $asunto="Registro de Nueva Visita Técnica";
 
//  $email_asesor=$data["email_asesor"];
  $recomendaciones=$data["recomendaciones"];
  $destinatario=$data["email_agricultor"];
 // $asesor=$email_asesor;
  $nombre_asesor= $data["nombre_asesor"];
  $nombre_agricultor=$data["nombre_agricultor"];
  $numero_hectareas=$data["numero_hectareas"];
  $nombre_finca=$data["nombre_finca"];
  $cultivo_finca=$data["cultivo_finca"];
  $recomendaciones=AgriVisitasTecnicasProductos::where("id_vt","=",$id_visita)->get();
 
   $data = array(
    'destinatario' => $destinatario,
    'visita' => $visita,
    'empresa'=> $empresa,
    'emailusuario' => $usuario->email,
    'nombre_asesor'=> $nombre_asesor,
    'numero_hectareas'=> $numero_hectareas,
    'recomendaciones' => $recomendaciones,
    'nombre_agricultor' => $nombre_agricultor,
    'nombre_finca' =>$nombre_finca,
    'cultivo_finca' =>$cultivo_finca,
    'fecha_visita'=>$fecha_visita,
  
  );
          if (Input::get('check')) {
                         Mail::send('correo.plantilla_reporte_visita_tecnica', $data, function ($message) use ($asunto,$destinatario,$empresa,$emailusuario, $emailusuario, $recomendaciones,$nombre_agricultor,$nombre_finca,$cultivo_finca,$fecha_visita) {
                  $message->from('ricaza81@gmail.com', 'Agronielsen en Campo');
                  $message->to($emailusuario)
                  ->cc('ricaza81@gmail.com',$destinatario)->subject($asunto);});
                      }  else {
             Mail::send('correo.plantilla_reporte_visita_tecnica', $data, function ($message) use ($asunto,$destinatario,$empresa,$emailusuario, $recomendaciones,$nombre_agricultor,$nombre_finca,$cultivo_finca,$fecha_visita) {
                  $message->from('ricaza81@gmail.com', 'Agronielsen en Campo');
                  $message->to($emailusuario)
                  ->cc('ricaza81@gmail.com')->subject($asunto);});
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
    
          return view("listados.agricultor.visitastecnicas.reportevisitastecnicas")

          ->with("msj",$msj)
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

/*(ORIGINAL-1-USUARIO)function reportevisitastecnicas()
    { 
          $msj="";
          $idusuario=\Auth::user()->id;
          $asesor=User::all();
          $fincas= AgriFincas::where('idUsuario','=',$idusuario)->get();
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

          Variables notificacion tareas/seguimientos del dia
          $fecha=date('Y-m-d');          
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();
    

       
          return view("listados.agricultor.visitastecnicas.reportevisitastecnicas")

          ->with("msj",$msj)
          ->with("prospectos",$prospectos)
          ->with("agricultores",$agricultores)
          ->with("fincas",$fincas)
          ->with("cant_fincas",$cant_fincas)
          ->with("cant_visitas",$cant_visitas)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_agricultores",$cant_agricultores)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
          ->with("asesor",$asesor)
          ->with("date",$date)
          ->with("officialDate",$officialDate)
          ->with("usuario", $usuarioactual )
          ->with("events_day",$events_day)
          ->with("visitastecnicas",$visitastecnicas)
          ->with("areas",$areas)
          ->with("fecha",$fecha);
 
    }*/
    



 public function visitastecnicasempresa()
        {
          //$idusuario=
          $idempresa=\Auth::user()->idEmpresa;
          $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
        //  $visitastecnicas=AgriVisitasTecnicas::where("id_usuario","=",$usuariosempresa)->get();

            
              return ($usuariosempresa);
                                          }


function reportevisitastecnicas()
    { 
          $idusuario=\Auth::user()->id;
          $usuario=User::find($idusuario);
          $fincas= AgriFincas::where('idUsuario','=',$idusuario)->get();
          $visitastecnicasusuario=AgriVisitasTecnicas::where('id_usuario','=',$idusuario)->get();
          $msj="";
          $idempresa=\Auth::user()->idEmpresa;
          $empresa=UsuariosEmpresas::find($idempresa);
          $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
          $usuariosempresaid=User::where('idEmpresa','=',$idempresa)->select('id')->get();
          $visitastecnicas=AgriVisitasTecnicas::where("id_usuario","=",$usuariosempresaid)->get();

        function   visitastecnicasempresaimg()
        {
          //$idusuario=
          $idempresa=\Auth::user()->idEmpresa;
          $usuariosempresa=User::where('idEmpresa','=',$idempresa)->select('id')->get();
          $visitastecnicaimg=AgriVisitasTecnicas::where("id_usuario","=",$usuariosempresa)->get();
               foreach($usuariosempresa as $usuariovisita){
                 foreach($usuariovisita->visitatecnicaimg as $visitatecnicaimg)            
                         return ($visitatecnicaimg);

                                          }
                          $visitatecnicaimg=$visitatecnicaimg;
        }

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
          ->with("usuario",$usuario)
          ->with("prospectos",$prospectos)
          ->with("agricultores",$agricultores)
        //  ->with("visitatecnicaimg",$visitatecnicaimg)
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
        $idEmpresa=$usuario_actual->idEmpresa;
        $empresa=UsuariosEmpresas::find($idEmpresa);
        $usuariosempresa=User::where('idEmpresa','=', $idEmpresa)->get();

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
    
        public function ubicacion_fincas_agri()
    {
        $usuario=\Auth::user();
        $idusuario=$usuario->id;
        $fincas = AgriFincas::where('lat_lnt', '!=', '')->where('idUsuario','=',$idusuario)->get();
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
        $visitas = AgriVisitasTecnicas::where('lat_lnt', '!=', '')->get();

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
    //json_decode($data->latlnt, true);
    $resul= $prospecto->save();

        $agricultor = DB::table('agri_agricultores')->latest()->first();
        $id = $agricultor->id;
        $agricultor=AgriAgricultores::find($id);

       return redirect('form_nueva_finca_agricultor/'.$agricultor->id)
        ->with("id",  $id)
        ->with("agricultor",  $agricultor);

}


public function agregarproductoempresa(Request $request)
        {

          $data=$request->all();

     /*     $reglas = array( 'marca_producto' => 'required',
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
        $msj="";
        $zonas=Zonas::all();
        $canales=Canales::all();
        $productos=Productos::where('idEmpresa','=',$idEmpresa)->get();
        $productoslineas=ProductosLineas::all();
        $productostipo=ProductosTipo::all();
        $departamentos=Departamentos::all();
        
        return view("formularios.empresa.productos.formnuevoproductoempresa")
        ->with("usuario",  $usuarioactual)
        ->with("idEmpresa",  $idEmpresa)
        ->with("idusuario",  $idusuario)
        ->with("events",$events)
        ->with("errors",$errores)
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
        ->with("msj","Existen errores de validación")
         ->with("cultivos",$cultivos);*/

        // } */
             
     /*   $usuarioactual=\Auth::user();
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
        ->with("cultivos",$cultivos); } */

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

    /*   $msj="";
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
     /*     $fecha=date('Y-m-d');
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
          ->with("fecha",$fecha);*/

          if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Producto Guardado Correctamente");   
        }
    else
    {
             
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  

     }
    

 
    
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
