<?php

namespace App\Http\Controllers;

use App\User;
use Storage;
use Illuminate\Http\Request;
//use App\Http\Requests;
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
use App\AgriFincas;
use App\AgriAgricultores;
use App\AgriVisitasTecnicas;
use App\Productos;
use App\AgriVisitasTecnicasProductos;
use App\Ciudades;
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
use Illuminate\Http\JsonResponse;

class AgricultorController extends Controller {
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

    $prospecto= new AgriAgricultores;
    $prospecto->agricultor  =  $data["nombres"];
    $idUsuario=\Auth::user()->id;
    $prospecto->idUsuario=$idUsuario;
    $prospecto->id_ciudad=$data["departamento"];
    $prospecto->email=$data["email"];
    $prospecto->telefono_cont=$data["telefono"];
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
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_proyectos=count($prospectos);
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
          ->with("agricultores",$agricultores)
          ->with("cant_proyectos",$cant_proyectos)
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
        $departamentos=Departamentos::all();
        
        
        return view('formularios.agricultor.form_nueva_finca_agricultor')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
        ->with("id",  $id)
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

        
        
        return view('formularios.agricultor.visitatecnica.form_nueva_visita_finca_agricultor')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
        ->with("id",$id)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos)
        ->with("productos",$productos);

    }  

        public function agregar_nueva_finca_agricultor(Request $request)
    {

        $data=$request->all();

           $reglas = array('nombre_finca' => 'required',
                      'hectareas' => 'required|Numeric|min:1',
                     // 'departamento' => 'required|Numeric|min:1',
                     // 'email' => 'required|Email|Unique:prospectos',
                     // 'cultivo' => 'required',
                      );
        $mensajes= array('nombre_finca.required' =>  'El nombre es obligatorio',
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
   
       
    return view('formularios.agricultor.form_nueva_finca_agricultor')
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

 
        $finca= new AgriFincas;
        $finca->id_agricultor  =  $data["agricultor"];
        $finca->finca  =  $data["nombre_finca"];
        $finca->id_ciudad  =  $data["id_ciudad"];
        $finca->idUsuario  =  \Auth::user()->id;
        $finca->idCultivo  =  $data["cultivo"];
        $finca->uid= str_random(10);
        $finca->vereda= 'prueba';
        $finca->altitud= 0;
        $finca->longitud=0;
        $finca->latitud=0;
        $finca->hectareas=$data["hectareas"];
        $resul= $finca->save();
        $finca = DB::table('agri_fincas')->latest()->first();
        $id = $finca->id;
      //  $fincaarray=AgriFincas::find($id);
       $recomendaciones="";
        
        
       return redirect('form_nueva_visita_finca_agricultor/'.$finca->id)
      ->with("recomendaciones",  $recomendaciones)
        ->with("id",  $id);
        } 
 


function listado_fincas_agricultores()
    { 
          //$idusuario=\Auth::user()->id;
          $msj="";
          $idusuario=\Auth::user()->id;
        //  $idusuario=\Auth::user()->$id;
          $asesor=User::all();
        //  $prospectos= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
        //  $agricultores= AgriAgricultores::where("idUsuario","=",$idusuario)->get();
          $fincas= AgriFincas::where('idUsuario','=',$idusuario)->get();
          $agricultores= array('$fincas->delagricultor;');
        //  $fincas=$agricultores->fincas;
          $prospectos=Prospectos::all();
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",3)->get();
          $cant_agricultores=count($agricultores);
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
      //    $areas=Prospectos::sum($numero_hectareas);
          $areas = DB::table('agri_fincas')->where('idUsuario','=',$idusuario)->sum('hectareas');
      //    $total_areas=$areas->sum;

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
        //  ->with("agricultores",$agricultores)
          ->with("fincas",$fincas)
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

     //  return redirect('form_editar_visita_finca_agricultor/'.$id)
     //  return redirect('form_editar_visita_finca_agricultor/45113')
     //  ->with("id",  $id);

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

 
        $visita= new AgriVisitasTecnicas;
        $visita->id_agricultor  =  34657;
        $visita->id_finca  =  45113;
        $visita->id_tipo_cultivo  =  1;
        $visita->id_usuario  =  \Auth::user()->id;
        $visita->objetivo=$data["objetivo"];
        $visita->altitud= 0;
        $visita->longitud=0;
        $visita->latitud=0;
        $visita->hectareas=$data["hectareas"];
        $visita->aplicaciones=$data["aplicaciones"];
        $visita->frecuencia=$data["frecuencia"];
        $resul= $visita->save();
        $finca = DB::table('visitastecnicas')->latest()->first();
        $id = $finca->id;
        $finca=AgriVisitasTecnicas::find($id);
        $recomendaciones="";
        
        
       return redirect('form_editar_visita_finca_agricultor/'.$finca->id)
       ->with("recomendaciones",  $recomendaciones)
        ->with("id",  $id);
        } 


  public function form_editar_visita_finca_agricultor($id)

{
        $visita=AgriVisitasTecnicas::find($id);
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
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos)
        ->with("recomendaciones",$recomendaciones)
        ->with("productos",$productos);


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
/*
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
        if ($validacion->fails())
           {
       $errores = $validacion->errors(); 

        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
     //   $tipointeres=Interes::all();
     //   $status=TipoStatus::all();
        $cultivos=Cultivos::all();
      //  $zonas=Zonas::all();
      //  $canales=Canales::all();
        $msj="";
        $paises=Pais::all();
        $departamentos=Departamentos::all();
   
       
    return view('formularios.agricultor.form_nueva_finca_agricultor')
    ->with("usuario",  $usuarioactual)
    ->with("events",$events)
    ->with("paises",$paises)
  //  ->with("zonas",$zonas)
    ->with("canales",$canales)
  //  ->with("cultivos",$cultivos)
    ->with("events_day",$events_day)
  //  ->with("tipointeres",$tipointeres)
    ->with("fecha",$fecha)
    ->with("errors",$errores)
  //  ->with("status",$status)
     ->with("departamentos",$departamentos)
    ->with("msj","Existen errores de validación");

     }
*/
 
        $visita_producto= new AgriVisitasTecnicasProductos;
        $visita_producto->id_vt  =  $data["id_visita"];
        $visita_producto->id_producto  =  $data["producto"];
        $visita_producto->cantidad  =  $data["dosis"];
        $visita_producto->um  =  $data["un_medida"];
        $resul= $visita_producto->save();
    if($resul){
            
            return view("mensajes.msj_correcto")->with("msj","Cotización Creada Correctamente");   
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
}
