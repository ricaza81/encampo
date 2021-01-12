<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\Proyectos;
use App\User;

class ProyectosController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form_proyectos_usuario($id)
    {
       //presenta el formulario para agregar y los datos de los proyectos
       $usuario=User::find($id);
       $proyectos= $usuario->proyectos();
       $rutaarchivos= "../storage/archivos/";

       return view("formularios.form_proyectos_usuario")
       ->with("usuario",$usuario)
       ->with("proyectos",$proyectos) 
       ->with("rutaarchivos",$rutaarchivos);


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

    
}
