<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Publicaciones;
use App\TipoPublicaciones;
use App\Prospectos;
use App\Visitas;
use App\Eventos;
use App\Order;
use App\OrderDetails;
use App\Conocimiento;
use App\UsuarioConectado;
use Mail;
use Carbon\Carbon;

class UsuarioConectadoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function listado_usuarios()
    {


        //$logs = UsuarioConectado::where('fecha', '>=', '(NOW(), INTERVAL 1 DAY)')->orderBy('fecha', 'DESC')->get();
        //$logs = UsuarioConectado::where('fecha', '>=', 'DATE( NOW() )')->get();
        
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $usuarioactual=\Auth::user();
        $logs = UsuarioConectado::all();
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);

       

        return view('listados.listado_usuarios_conectados')
        ->with("usuario", $usuarioactual )
         ->with("events_day",$events_day)
        ->with("logs", $logs );
        
	}

}