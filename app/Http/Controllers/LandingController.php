<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prospectos;
use App\Pais;
use App\Cultivos;
use App\Zonas;
use App\Canales;
use App\Departamentos;
use App\Paises;
use Response;
use Validator;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function paisesJson()
    {
        $paises = Pais::all();
        return response ()->json($paises);
        
    }

    public function departamentosJson($id)
    {
       $departamentos=Departamentos::where("id_pais","=",$id)->get();
       return response()->json($departamentos);
    }

    public function dataDepartamentoJson($id)
    {
      $departamento = Departamentos::where('id',$id)->get();
      return response()->json($departamento);
    }


    public function cultivosJson()
    {
        $cultivos=Cultivos::all();
        return response ()->json($cultivos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
  {
    $data=$request->all();
    $reglas = array(
            'nombres'       => 'required',
            'departamento'  => 'required|Numeric|min:1',
            'pais'          => 'required|Numeric|min:1',
            'cultivo'       => 'required|Numeric|min:1',
            'email'         => 'required|Email|Unique:users',
            'telefono'      => 'required',
            'hectareas'     => 'required|Numeric|min:1',
            );
    $mensajes= array( 
            'nombres.required'  =>  'Ingresar Nombres es obligatorio',
            'email.required'    =>  'Ingresar un email es obligatorio',
            'email.email'       =>  'el email debe tener un formato válido',
            'email.unique' =>  'El email ya existe', 
            'telefono.required' => 'Debe Ingresar un teléfono',
            'departamento.required' => 'Por favor selecciona un departamento',
            'departamento.numeric' =>  'Selecciona un departamento',
            'pais.required' => 'Por favor selecciona un pais',
            'pais.numeric' =>  'Selecciona un pais',
            'cultivo.required' => 'Por favor selecciona un cultivo',
            'cultivo.numeric' =>  'Selecciona un cultivo',
            'hectareas.required' => 'Ingresa el número de hectareas',
            'hectareas.numeric' =>  'Por favor ingresa el número de Hectareas',
            );
    $validacion = Validator::make($data, $reglas, $mensajes);
    $response = array('valido'=>'true');
    if ($validacion->fails()){
        $response['valido'] = 'false';
        return response()->json($response);
    }


    $prospecto= new Prospectos;
    $prospecto->nombres           =   $data["nombres"];
    $prospecto->apellidos         =   $data["apellidos"];
    $prospecto->email             =   $data["email"];
    $prospecto->telefono          =   $data["telefono"];
    $prospecto->stage             =   1;
    $prospecto->idUsuario         =   18;
    $prospecto->idPais            =   $data["pais"];
    $prospecto->idCiudad          =   $data["departamento"];
    $prospecto->idCultivo         =   $data["cultivo"];
    $prospecto->idFuente          =   1;
    $prospecto->idZona            =   $data["zona"];
    $prospecto->interesado        =   1;
    $prospecto->numero_hectareas  =   $data["hectareas"];
    $prospecto->observaciones     =   $data["observaciones"];
    $resul= $prospecto->save();

    return response()->json($response);
    
  }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
