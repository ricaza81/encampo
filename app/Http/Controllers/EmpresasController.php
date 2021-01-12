<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\UsuariosEmpresas;
use App\Prospectos;
use App\AgriFincas;
use App\AgriAgricultores;
use App\AgriVisitasTecnicas;
use App\Productos;
use App\ProductosLineas;
use App\ProductosTipo;
use App\AgriVisitasTecnicasProductos;
use App\Ciudades;
use App\TipoIntereses;
use App\TipoStatus;
use App\TipoUsuario;
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




class EmpresasController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth');
    }

    
            //leccion 11

       public function detalle_empresa(){

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
          $idEmpresaUsuario=$usuarioactual->idEmpresa;
         // $empresa=UsuariosEmpresas::where('id','=',$idEmpresaUsuario)->get();
          $empresa=UsuariosEmpresas::find($idEmpresaUsuario);
          
          $fecha=date('Y-m-d');
          $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events_day=count($events);
          $date = Carbon::now();
          $officialDate = Carbon::now()->toRfc2822String();
    
         return view("listados.empresas.detalle_empresa")
         ->with("empresa", $empresa)
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
               protected function rankingproductos()
     {
        $pagination = 9;
        $recomendaciones=AgriVisitasTecnicas::all();
        $recomendacionestotales=count($recomendaciones);
        $products=Productos::where('mostrarranking','=',1)->get();
            return view('listados.productos.rankingproductos')
         ->with("recomendacionestotales",$recomendacionestotales)   
         ->with("products",$products);

     }
     
              public function slugproductoshow($slug)
    {
        $recomendaciones=AgriVisitasTecnicas::all();
        $recomendacionestotales=count($recomendaciones);
        $producto = Productos::where('slug','=', $slug)->firstOrFail();
        return \View::make('listados.productos.detallepdt', compact('producto','recomendacionestotales'));
    }

}