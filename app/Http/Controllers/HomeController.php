<?php namespace App\Http\Controllers;

use App\User;
use App\Eventos;
use App\AgriAgricultores;
use App\AgriFincas;
use App\AgriVisitasTecnicas;
use Auth;



class HomeController extends Controller {

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
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

    /*  $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);

		return view('home')
		->with("usuario",  $usuarioactual)
		->with("events",$events)
        ->with("events_day",$events_day)
        ->with("fecha",$fecha); */
        $user=\Auth::user()->tipoUsuario;

               if ($user==1) {

         return redirect('listado_todos_prospectos_comercial'); }

       if ($user==2) {

         return redirect('listado_prospectos_comercial'); }
	

       if ($user==3) {

         return redirect('listado_prospectos_zona'); }
	}

		public function listMap()
	{
		$user = Auth::user();

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
		return view('map', [
			'usuario' => $user,
			'events_day' => $events_day,
			'agricultores' =>$agricultores,
			'cant_agricultores' => $cant_agricultores,
			'cant_visitas' =>$cant_visitas,
			'cant_fincas' =>$cant_fincas,
			'cant_agricultores' =>$cant_agricultores,
		]);
	}
	
	/*ORI		public function listMapvisitas()
	{
		$user = Auth::user();

		$fecha=date('Y-m-d');

		$events= Eventos::where('idUsuario','=',$user->id)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);

		return view('mapavisitastecnicas', [
			'usuario' => $user,
			'events_day' => $events_day
		]);
	}*/
	
			public function listMapvisitas()
	{
		$user = Auth::user();

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
		return view('mapavisitastecnicas', [
			'usuario' => $user,
			'events_day' => $events_day,
			'agricultores' =>$agricultores,
			'cant_agricultores' => $cant_agricultores,
			'cant_visitas' =>$cant_visitas,
			'cant_fincas' =>$cant_fincas,
			'cant_agricultores' =>$cant_agricultores,
		]);
	}

}