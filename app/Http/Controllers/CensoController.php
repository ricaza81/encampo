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
use App\Canales;
use App\Departamentos;
use Carbon\Carbon;
use Mail;
use Response;



class CensoController extends Controller {
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


  

 

    public function censodane()
     
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
        
        
        
        return view('formularios.censodane.censodane')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
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
    
          public function sectorventas()
     
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
        
        
        return view('formularios.censodane.sectorventas')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
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
    
        public function mapping()
     
          
    {
         
        $usuarioactual=\Auth::user();
        $idempresa=\Auth::user()->idEmpresa;
        $empresa=UsuariosEmpresas::find($idempresa);
        $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
        $cantidadusuarios=count($usuariosempresa);
        $estadoempresa=$empresa->estadoempresa;

        if ($estadoempresa==1) {

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
        
        
        return view('formularios.censodane.mapping')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cantidadusuarios",$cantidadusuarios)
        ->with("empresa",$empresa)
         ->with("cultivos",$cultivos);

    }

            if ($estadoempresa==0)         {
         
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
               $idempresa=\Auth::user()->idEmpresa;
        $empresa=UsuariosEmpresas::find($idempresa);
        $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
        $cantidadusuarios=count($usuariosempresa);
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
      //  $agricultor=AgriAgricultores::find($id);
        $departamentos=Departamentos::all();
        
        
        return view('formularios.pago.form-pago')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
     //   ->with("id",  $id)
      ->with("empresa",$empresa)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cantidadusuarios",$cantidadusuarios)
         ->with("cultivos",$cultivos);

    }

  }

        public function censodanefull()
     
        {
         
        $usuarioactual=\Auth::user();
        $idempresa=\Auth::user()->idEmpresa;
        $empresa=UsuariosEmpresas::find($idempresa);
        $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
        $cantidadusuarios=count($usuariosempresa);
        $estadoempresa=$empresa->estadoempresa;

        if ($estadoempresa==1) {

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
        
        
        return view('formularios.censodane.censodanefull')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cantidadusuarios",$cantidadusuarios)
        ->with("empresa",$empresa)
         ->with("cultivos",$cultivos);

    }

            if ($estadoempresa==0)         {
         
        $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario_agri=\Auth::user()->id;
        $idusuario=\Auth::user()->id;
               $idempresa=\Auth::user()->idEmpresa;
        $empresa=UsuariosEmpresas::find($idempresa);
        $usuariosempresa=User::where('idEmpresa','=',$idempresa)->get();
        $cantidadusuarios=count($usuariosempresa);
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);
        $tipointeres=Interes::all();
        $status=TipoStatus::all();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
      //  $agricultor=AgriAgricultores::find($id);
        $departamentos=Departamentos::all();
        
        
        return view('formularios.pago.form-pago')
        ->with("usuario",  $usuarioactual)
        ->with("idusuario",  $idusuario)
     //   ->with("id",  $id)
      ->with("empresa",$empresa)
        ->with("events",$events)
        ->with("events_day",$events_day)
        ->with("tipointeres",$tipointeres)
        ->with("status",$status)
        ->with("fecha",$fecha)
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cantidadusuarios",$cantidadusuarios)
         ->with("cultivos",$cultivos);

    }

  }

   
}
