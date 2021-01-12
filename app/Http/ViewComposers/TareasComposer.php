<?php namespace App\Http\ViewComposers;

use illuminate\Contracts\View\View;
use App\User;
use App\Prospectos;
use App\Visitas;
use App\Eventos;

class TareasComposer {

	public function compose (View $view)
{

          $msj="";
          $asesor=User::all();
          $prospectos=Prospectos::all();
          $seguimientos=Visitas::all();
          $finalizados=Prospectos::where("stage","=",11)->get();
          $cant_proyectos=count($prospectos);
          $cant_seguimientos=count($seguimientos);
          $cant_finalizados=count($finalizados);
          $asesor=User::all();
          $usuarioactual=\Auth::user();
          /*Variables notificacion tareas/seguimientos del dia*/
          $fecha=date('Y-m-d');
          $idusuario=\Auth::user()->id;
      //    $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
          $events= Eventos::where('idUsuario','=',$idusuario)->get();
          $events_day=count($events);

      //    $fecha=date('Y-m-d g:ia');
          $usuarioactual=\Auth::user();   
          $idusuario=\Auth::user()->id;
          $seguimientos= Visitas::where("idOwner","=",$idusuario)->where('estado', 'like', '%No%')->get();
     //     $contador=count($seguimientos);
        //  $msj="";

          $view
          ->with("msj",$msj)
          ->with("prospectos",$prospectos)
          ->with("cant_proyectos",$cant_proyectos)
          ->with("cant_seguimientos",$cant_seguimientos)
          ->with("cant_finalizados",$cant_finalizados)
          ->with("asesor",$asesor)
          ->with("usuarioactual", $usuarioactual )
        //  ->with("usuario", $usuario )
     	->with("events",$events)
      //    ->with("contador",$contador)
          ->with("events_day",$events_day)
       //   ->with("fecha",$fecha);
      //    ->with("fecha", $fecha )
          ->with("seguimientos", $seguimientos );
      //    ->with("msj",$msj)
       //   ->with("usuario", $usuarioactual );


}

}
