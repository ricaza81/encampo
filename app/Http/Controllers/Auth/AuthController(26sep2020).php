<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\UsuarioConectado;
use App\UsuariosEmpresas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use Socialite;
use Carbon\Carbon;
use App\SocialAccountService;
use Session;
use Storage;
use App\AgriFincas;
use App\AgriAgricultores;
use App\AgriVisitasTecnicas;
use App\AgriVisitasTecnicasProductos;
use App\Prospectos;
use App\ProductoRecomendado;
use App\Productos;
use App\Pais;
use App\Cultivos;
use App\Zonas;
use App\Canales;
use App\Departamentos;
use App\Paises;
use Mail;
use Response;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


//login

      protected function getLogin()
    {
     $msj="";

        return view("login")
        ->with ("msj",$msj);
    }
    
          protected function getLogindemo()
    {
     $msj="";


        return view("logindemo")
        
        //->with ("emailuserdemo",$emailuserdemo)
  
        ->with ("msj",$msj);
    }

        protected function landing()
    {
        $productorecomendado = ProductoRecomendado::where('id','=',2)->latest()->first();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $date = Carbon::now();

        return view('landing')
        ->with("paises",$paises)
        ->with("productorecomendado",$productorecomendado)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("date",$date)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }

         protected function consultaclima()
    {
        $productorecomendado = ProductoRecomendado::where('id','=',2)->latest()->first();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $date = Carbon::now();

        return view('consultaclima')
        ->with("paises",$paises)
        ->with("productorecomendado",$productorecomendado)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("date",$date)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }

           protected function iottempenture()
    {
        $productorecomendado = ProductoRecomendado::where('id','=',2)->latest()->first();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('iottempenture')
        ->with("paises",$paises)
        ->with("productorecomendado",$productorecomendado)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }
    
            protected function calculoareas()
    {
        $productorecomendado = ProductoRecomendado::where('id','=',2)->latest()->first();
        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('calculoareas')
        ->with("paises",$paises)
        ->with("productorecomendado",$productorecomendado)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }
    
                protected function rankingasesores()
    {
        $visitas=AgriVisitasTecnicas::all();
        $paises=Pais::all();
        $usuarios=User::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('rankingasesores')
        ->with("paises",$paises)
        ->with("visitas",$visitas)
        ->with("usuarios",$usuarios)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos);

    }

                 protected function ventainformes()
    {
        $visitas=AgriVisitasTecnicas::all();
        $paises=Pais::all();
        $usuarios=User::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('ventainformes')
        ->with("paises",$paises)
        ->with("visitas",$visitas)
        ->with("usuarios",$usuarios)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos);

    }
    
                   protected function modulosim()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('modulosim')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }
    
         public function productim()
    {
        $producto = ProductoRecomendado::where('id','=',2)->latest()->first();
        
        return \View::make('productim', compact('producto'));

    }
    
                 public function account()
    {
        $producto = ProductoRecomendado::where('id','=',2)->latest()->first();
        return \View::make('account', compact('producto'));

    }
    
                  protected function productos()
     {
        $pagination = 9;
        $recomendaciones=AgriVisitasTecnicas::all();
        $recomendacionestotales=count($recomendaciones);
        $products=Productos::where('mostrarranking','=',1)->get();
            return view('productos')
         ->with("recomendacionestotales",$recomendacionestotales)   
         ->with("products",$products);

     }
     
         public function slugproductoshow($slug)
    {
        $recomendaciones=AgriVisitasTecnicas::all();
        $recomendacionestotales=count($recomendaciones);
        $producto = Productos::where('slug','=', $slug)->firstOrFail();
        return \View::make('product', compact('producto','recomendacionestotales'));
    }
    
                protected function producto()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('producto')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }
    
                    protected function precios()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('precios')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }

                      protected function infointeligencia()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('infointeligencia')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }
    
                        protected function visor()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('visor')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }

    protected function demoalmacenes()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('demoalmacenes')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);
    }

        protected function analiticacultivos()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('analiticacultivos')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);
    }

        protected function demosector()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('demosector')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);
    }
    
                        protected function agricultor()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('agricultor')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }
    
                            protected function pronosticos()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('pronosticos')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }


 public function redirect()
    {
      return Socialite::driver('facebook')->redirect();   
    } 
    
      public function callback(SocialAccountService $service)
    {
      $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

          auth()->login($user); 
           return redirect('reporteproductos'); 
 
    }

            protected function respuesta_landing()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $msj="";

        return view('respuesta-landing')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("msj",$msj)
         ->with("cultivos",$cultivos);

    }

            protected function agregar_lead_landing(Request $request)
    
    {
        $data=$request->all();

   $reglas = array('nombres' => 'required',
                   //   'apellidos' => 'required',
                      'departamento' => 'required|Numeric|min:1',
                //      'pais'=>   'required',
                'pais' => 'required|Numeric|min:1',
                //      'ciudad' => 'required',
                      'email' => 'required|Email|Unique:users',
                      'telefono' => 'required',
                      'hectareas' => 'required|Numeric|min:1',
                //      'ocupacion' => 'required',
                //      'tipousuario' => 'required|Numeric|min:1|max:3',
                      );
        $mensajes= array('nombres.required' =>  'Ingresar Nombres es obligatorio',
                 //      'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                 //      'pais.required' =>  'el pais es obligatorio',
                 //      'ciudad.required' =>  'Ingresar una ciudad es obligatorio',
                 //      'ciudad.alpha' =>  'la ciudad no puede contener numeros en su nombre',
                       'email.required' =>  'Ingresar un email es obligatorio',
                       'email.email' =>  'el email debe tener un formato válido',
                       'email.unique' =>  'El email ya existe',
                       'telefono.required' => 'Debe Ingresar un teléfono',
                       'departamento.required' => 'Por favor selecciona un departamento',
                       'departamento.numeric' =>  'Selecciona un departamento',
                       'pais.required' => 'Por favor selecciona un pais',
                       'pais.numeric' =>  'Selecciona un pais',
                 //   'institucion.required' =>  'Ingresar una institucion es obligatorio',
                 //      'ocupacion.required' =>  'Ingresar la ocupacion es obligatorio',
                       'hectareas.required' => 'Ingresa el número de hectareas',
                       'hectareas.numeric' =>  'Por favor ingresa el número de Hectareas',
                 //  'tipousuario.numeric' =>  'Ingresar un tipo de usuario valido ides entre 1 y 2',
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
        $errores = $validacion->errors() ;

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $msj="";
       
        return view('landing')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos)
        ->with("errors",$errores)
        ->with("msj","Existen errores de validación");  } else {


         $prospecto= new Prospectos;
         $prospecto->nombres  =  $data["nombres"];
         $prospecto->email  =  $data["email"];
         $prospecto->telefono  =  $data["telefono"];
         $prospecto->stage=1;
         $prospecto->idUsuario=18;
         $prospecto->idPais=$data["pais"];
         $prospecto->idCiudad=$data["departamento"];
         $prospecto->idCultivo=$data["cultivo"];
         $prospecto->idFuente=1;
         $prospecto->idZona=$data["zona"];
         $prospecto->interesado=1;
         $prospecto->numero_hectareas=$data["hectareas"];
         $prospecto->observaciones=$data["observaciones"];
         $resul= $prospecto->save(); }

         $contacto=$data["nombres"];


        return redirect("respuesta-landing")
        ->with("msj","".$contacto."");  
    }
       

            protected function newasesoria(Request $request)
    {
        $data=$request->all();

   $reglas = array('nombres' => 'required',
                   //   'apellidos' => 'required',
                      'departamento' => 'required|Numeric|min:1',
                //      'pais'=>   'required',
                'pais' => 'required|Numeric|min:1',
                //      'ciudad' => 'required',
                      'email' => 'required|Email',/*|Unique:prospectos',*/
                      'telefono' => 'required',
                      'hectareas' => 'required|Numeric|min:1',
                //      'ocupacion' => 'required',
                //      'tipousuario' => 'required|Numeric|min:1|max:3',
                      );
        $mensajes= array('nombres.required' =>  'Ingresar Nombres es obligatorio',
                 //      'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                 //      'pais.required' =>  'el pais es obligatorio',
                 //      'ciudad.required' =>  'Ingresar una ciudad es obligatorio',
                 //      'ciudad.alpha' =>  'la ciudad no puede contener numeros en su nombre',
                       'email.required' =>  'Ingresar un email es obligatorio',
                       'email.email' =>  'el email debe tener un formato válido',
                       'email.unique' =>  'El email ya existe',
                       'telefono.required' => 'Debe Ingresar un teléfono',
                       'departamento.required' => 'Por favor selecciona un departamento',
                       'departamento.numeric' =>  'Selecciona un departamento',
                       'pais.required' => 'Por favor selecciona un pais',
                       'pais.numeric' =>  'Selecciona un pais',
                 //   'institucion.required' =>  'Ingresar una institucion es obligatorio',
                 //      'ocupacion.required' =>  'Ingresar la ocupacion es obligatorio',
                       'hectareas.required' => 'Ingresa el número de hectareas',
                       'hectareas.numeric' =>  'Por favor ingresa el número de Hectareas',
                 //  'tipousuario.numeric' =>  'Ingresar un tipo de usuario valido ides entre 1 y 2',
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
        $errores = $validacion->errors();

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $msj="";
       
        return view('agricultor')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos)
        ->with("errors",$errores)
        ->with("msj","Existen errores de validación"); }

    $foto = $request->file('foto');
    $input  = array('image' => $foto) ;
    $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:9000');
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
        }
        else
        {
        $id= str_random(3);
        $nombre_original=$foto->getClientOriginalName();
        $extension=$foto->getClientOriginalExtension();
        $nuevo_nombre="fotoasesoria-".$id.".".$extension;
        $r1=Storage::disk('asesoria')->put($nuevo_nombre,  \File::get($foto) );
        $rutadelaimagen="../storage/asesoria/".$nuevo_nombre;
        }
         $prospecto= new Prospectos;
         $prospecto->nombres  =  $data["nombres"];
         $prospecto->email  =  $data["email"];
         $prospecto->telefono  =  $data["telefono"];
         $prospecto->stage=1;
         $prospecto->idUsuario=18;
         $prospecto->idPais=$data["pais"];
         $prospecto->idCiudad=$data["departamento"];
         $prospecto->idCultivo=$data["cultivo"];
         $prospecto->idFuente=1;
       //  $prospecto->idZona=$data["zona"];
         $prospecto->interesado=1;
         $prospecto->numero_hectareas=$data["hectareas"];
         $prospecto->imgagri=$rutadelaimagen;
         $prospecto->observaciones=$data["observaciones"];
         $resul= $prospecto->save();

         $contacto=$data["nombres"];
           $prospectos= Prospectos::paginate(30);
  


        return view("landings.cosmo_r.replyasesoria")
        ->with("prospectos",$prospectos)
        ->with("msj","".$contacto."");  
    }


  /**
     * Display the password reset view for the given token.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */


        public function departamentos_landing($id)
    {
       
      $zona=Departamentos::where("id_pais","=",$id)->get();
    //  $zona=Departamentos::all();
        return response ()->json($zona);
      
          }


  /**
     * Display the password reset view for the given token.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */

            public function datos_departamento_landing($id)
    {
       
       $zona=Departamentos::where("id","=",$id)->get();
      //$prospecto=User::all();
        return response ()->json($zona);
      
          }

/*inicio postlogin*/
public function postLogin(Request $request)
   {
    $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
      //  'confirmed' => '1'
    ]);
    $credentials = $request->only('email', 'password');
    $remember=$request->input('remember');
    if ($this->auth->attempt($credentials, $remember))
            {
                    $user=\Auth::user()->tipoUsuario;
                    $idempresa=\Auth::user()->idEmpresa;
                    $empresa=UsuariosEmpresas::find($idempresa);
                    $log = new UsuarioConectado; 
                    $log->idUsuario = \Auth::user()->id;
                    $log->save();
                    $user=\Auth::user()->tipoUsuario;
        /*Redirecciones por condiciones*/
                  $productos=Productos::where('idEmpresa','=', \Auth::user()->idEmpresa)->get();
                  $prdtossinprecio=Productos::where('idEmpresa','=', \Auth::user()->idEmpresa)->where('precio','<=', 0)->get();
                  $cantpdtos=count($productos);
                  $cantpdtossinprecio=count($prdtossinprecio);
                    /*condicion 1: la empresa no tiene productos creados. No importa ninguna otra variable*/
                    if ($cantpdtos>0) {return redirect('form_nueva_finca_agricultor_nativo');}
                    if ($cantpdtos==0) {return redirect('formnuevoproductoempresa');}
                    /*condicion 2: la empresa tiene productos creados pero al menos hay uno que no tiene precio*/
                    if ($cantpdtos>0 && $cantpdtossinprecio>0) {return redirect('reporteproductos');}
                    /*condicion 3: la empresa tiene productos creados. No importa ninguna otra variable*/
                    if ($cantpdtos>0 && $cantpdtossinprecio=0) {return redirect('form_nuevo_prospecto'); }
             }
                    return view("login")->with("msj","Credenciales Incorrectas, por favor verifica");
    }/*fin postlogin*/
    
    /*inicio postlogindemo*/
public function postLogindemo(Request $request)
   {
    $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
      //  'confirmed' => '1'
    ]);
    $credentials = $request->only('email', 'password');
    $remember=$request->input('remember');
    if ($this->auth->attempt($credentials, $remember))
            {
                    $user=\Auth::user()->tipoUsuario;
                    $log = new UsuarioConectado; 
                    $log->idUsuario = \Auth::user()->id;
                    $log->save();
                    $user=\Auth::user()->tipoUsuario;
        /*Redirecciones por condiciones*/
                  $productos=Productos::where('idEmpresa','=', \Auth::user()->idEmpresa)->get();
                  $prdtossinprecio=Productos::where('idEmpresa','=', \Auth::user()->idEmpresa)->where('precio','<=', 0)->get();
                  $cantpdtos=count($productos);
                  $cantpdtossinprecio=count($prdtossinprecio);
                    /*condicion 1: la empresa no tiene productos creados. No importa ninguna otra variable*/
                    if ($cantpdtos>0) {return redirect('form_nueva_finca_agricultor_nativo');}
                    if ($cantpdtos==0) {return redirect('formnuevoproductoempresa');}
                    /*condicion 2: la empresa tiene productos creados pero al menos hay uno que no tiene precio*/
                    if ($cantpdtos>0 && $cantpdtossinprecio>0) {return redirect('reporteproductos');}
                    /*condicion 3: la empresa tiene productos creados. No importa ninguna otra variable*/
                    if ($cantpdtos>0 && $cantpdtossinprecio=0) {return redirect('form_nuevo_prospecto'); }
             }
                    return view("logindemo")->with("msj","Credenciales Incorrectas, por favor verifica");
    }/*fin postlogin*/


        protected function getRegister()
    {
            $msj="";
        return view("registro")
      ->with('msj',$msj);
    }


        

        protected function postRegister(Request $request)

   {


    $data=$request->all();

            $reglas = array('name' => 'required',
                        'email' => 'required|Email|Unique:users',
                        'password' => 'required|min:6|same:cpassword',
                        'cpassword' => 'required|min:6',

                                                 );
        $mensajes= array('name.required' =>  'Por favor ingresa tu nombre',
                         'email.required' =>  'Por favor ingresa un email válido',
                         'email.email' =>  'Email debe tener un formato válido',
                         'email.unique' =>  'El Email ya ha sido usado',
                         'password.required' => 'Ingresa una contraseña.',
                         'password.numeric' =>  'La contraseña debe tener mínimo 6 caracteres',
                         'cpassword.required' => 'El campo confirmar contraseña es obligatorio.',
                         'cpassword.min'      => 'El campo confirmar contraseña debe tener 6 caracteres',
                         'password.same'      => 'El password y el password confirmado no son iguales.'
                         );
            $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
        {
             $errores = $validacion->errors(); 
            // return new JsonResponse($errores, 422); }
             return view("registro")->with("msj","Existen errores de validación")
                                            ->with("errors",$errores); }

  

    $empresa = new UsuariosEmpresas;
    $empresa->nombreempresa='Empresa Temporal'." ".$data['name'];
    $empresa->save();

    $empresa->id;

    $user=new User;
    $user->nombres=$data['name'];
    $user->email=$data['email'];
    $user->idZona='Z0';
    $user->idEmpresa=$empresa->id;
    $user->idSuscriptor=18;
    $user->tipoUsuario=1;
    $user->pais=1;
    $user->password=bcrypt($data['password']);
   


    if($user->save()) {

        $asunto="Registro de Nuevo Usuario";
        $id_usuario=$user->id;
        $email_usuario=$data['email'];
        $nombre=$data['name'];
        $idZona=$user->idZona;
        $idEmpresa=$user->idEmpresa;
        $idSuscriptor=$user->idSuscriptor;
        $tipoUsuario= $user->tipoUsuario;

         
        $data = array(
         'id_usuario' => $id_usuario,
         'email_usuario' =>  $email_usuario,
         'nombre' => $nombre,
         'idZona'=>$idZona,
         'idEmpresa'=>$idEmpresa,
         'idSuscriptor'=>$idSuscriptor,
         'tipoUsuario'=>$tipoUsuario,
            );

    Mail::send('correo.plantilla_registro_usuario', $data, function ($message) use ($asunto,$id_usuario,$nombre,$idZona,$idEmpresa,$idSuscriptor,$tipoUsuario,$email_usuario) {
        $message->from('ricaza81@gmail.com', 'Agronielsen en Campo');
        $message->to('ricaza81@gmail.com')
        ->cc('ricaza81@gmail.com')
        ->subject($asunto);});


                        }

                        return view("mensajes.msj_correcto_registro")
                        ->with("msj","Usuario Registrado Correctamente");
                        



                           


  }




   



//registro

protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect('landing');
    }



//LANDINGS
//COSMO-R
        protected function landing_cosmo_r()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('landings.cosmo_r.landing_cosmo_r')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }

            protected function replyasesoria()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
          $prospectos= Prospectos::paginate(30);
  
        $msj="";

        return view('landings.cosmo_r.replyasesoria')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("prospectos",$prospectos)
        ->with("msj",$msj)
         ->with("cultivos",$cultivos);

    }

//LANDING COSMO-IN D

        protected function landing_cosmo_in_d()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('landings.cosmo_in_d.landing_cosmo_in_d')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }


                protected function agregar_lead_landing_cosmo_in_d(Request $request)
    {
        $data=$request->all();

   $reglas = array('nombres' => 'required',
                   //   'apellidos' => 'required',
                      'departamento' => 'required|Numeric|min:1',
                //      'pais'=>   'required',
                'pais' => 'required|Numeric|min:1',
                //      'ciudad' => 'required',
                      'email' => 'required|Email|Unique:users',
                      'telefono' => 'required',
                      'hectareas' => 'required|Numeric|min:1',
                //      'ocupacion' => 'required',
                //      'tipousuario' => 'required|Numeric|min:1|max:3',
                      );
        $mensajes= array('nombres.required' =>  'Ingresar Nombres es obligatorio',
                 //      'apellidos.required' =>  'Ingresar Apellidos es obligatorio',
                 //      'pais.required' =>  'el pais es obligatorio',
                 //      'ciudad.required' =>  'Ingresar una ciudad es obligatorio',
                 //      'ciudad.alpha' =>  'la ciudad no puede contener numeros en su nombre',
                       'email.required' =>  'Ingresar un email es obligatorio',
                       'email.email' =>  'el email debe tener un formato válido',
                       'email.unique' =>  'El email ya existe',
                       'telefono.required' => 'Debe Ingresar un teléfono',
                       'departamento.required' => 'Por favor selecciona un departamento',
                       'departamento.numeric' =>  'Selecciona un departamento',
                       'pais.required' => 'Por favor selecciona un pais',
                       'pais.numeric' =>  'Selecciona un pais',
                 //   'institucion.required' =>  'Ingresar una institucion es obligatorio',
                 //      'ocupacion.required' =>  'Ingresar la ocupacion es obligatorio',
                       'hectareas.required' => 'Ingresa el número de hectareas',
                       'hectareas.numeric' =>  'Por favor ingresa el número de Hectareas',
                 //  'tipousuario.numeric' =>  'Ingresar un tipo de usuario valido ides entre 1 y 2',
                       );
        

        $validacion = Validator::make($data, $reglas, $mensajes);
        if ($validacion->fails())
           {
        $errores = $validacion->errors();

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $msj="";
       
        return view('landing')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("cultivos",$cultivos)
        ->with("errors",$errores)
        ->with("msj","Existen errores de validación"); }


         $prospecto= new Prospectos;
         $prospecto->nombres  =  $data["nombres"];
         $prospecto->email  =  $data["email"];
         $prospecto->telefono  =  $data["telefono"];
         $prospecto->stage=1;
         $prospecto->idUsuario=18;
         $prospecto->idPais=$data["pais"];
         $prospecto->idCiudad=$data["departamento"];
         $prospecto->idCultivo=$data["cultivo"];
         $prospecto->idFuente=1;
         $prospecto->idZona=$data["zona"];
         $prospecto->interesado=1;
         $prospecto->numero_hectareas=$data["hectareas"];
         $prospecto->observaciones=$data["observaciones"];
         $resul= $prospecto->save();

         $contacto=$data["nombres"];


        return view("landings.cosmo_in_d.respuesta-landing_cosmo_in_d")->with("msj","".$contacto."");  
    }

            protected function respuesta_landing_cosmo_in_d()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $msj="";

        return view('landings.cosmo_in_d.respuesta-landing_cosmo_in_d')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("msj",$msj)
         ->with("cultivos",$cultivos);

    }


//LANDINGS
//CORPORATIVA COSMOAGRO landing_cosmoagro
        protected function landing_cosmoagro()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('landings.corporativa.landing_cosmoagro')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }

    //CORPORATIVA COSMOAGRO landing_cosmoagro_2017
        protected function landing_cosmoagro_2017()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();

        return view('landings.corporativa.landing_cosmoagro_2017')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
         ->with("cultivos",$cultivos);

    }

            protected function respuesta_landing_cosmoagro()
    {

        $paises=Pais::all();
        $cultivos=Cultivos::all();
        $zonas=Zonas::all();
        $canales=Canales::all();
        $departamentos=Departamentos::all();
        $msj="";

        return view('landings.corporativa.respuesta-landing_cosmoagro')
        ->with("paises",$paises)
        ->with("zonas",$zonas)
        ->with("canales",$canales)
        ->with("departamentos",$departamentos)
        ->with("msj",$msj)
         ->with("cultivos",$cultivos);

    }


}
