<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
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
use App\Productos;
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



class ProductosController extends Controller {
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

    function reporteproductos()
    { 
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
    
                    public function precio_producto($id)
    {
       
       $id_producto=Productos::where("id","=",$id)->get();
      //$prospecto=User::all();
        return response ()->json($id_producto);
      
          }

}