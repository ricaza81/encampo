<?php namespace App\Http\Controllers;

use App\User;


class ListadoController extends Controller {

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


	//presenta el formulario para nuevo usuario
		public function listado_usuarios()
   {

   	
       
     
        $usuarios= User::paginate(25);
        
        return view('listados.listado_usuarios')->with("usuarios", $usuarios );
        
    


       
     
	}

			public function listado_prospectos_comercial()
   {

   	
       
     
        $usuarios= User::paginate(25);
        
        return view('listados.listado_prospectos_comercial')->with("usuarios", $usuarios );
        
    


       
     
	}


}