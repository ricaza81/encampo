<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Educacion;
use App\TipoEducacion;


class EducacionController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth');
    }

    
            //leccion 10

    public function form_educacion_usuario($id){

       $usuario=User::find($id);
       $tiposeducacion=TipoEducacion::all();
       $educacion= $usuario->educacion();

       return view("formularios.form_educacion_usuario")
       ->with("usuario",$usuario)
       ->with("tiposeducacion",$tiposeducacion)
       ->with("educacion",$educacion) ;

    }

 
    public function agregar_educacion(Request $request ){
         //funcion para agregar la educacion de cada usuario
         $educacion= new Educacion;
         $educacion->idUsuario= $request->input("id_usuario");
         $educacion->idTipoeducacion= $request->input("tipo_educacion");
         $educacion->titulo=$request->input("titulo_educacion");
         $educacion->institucion=$request->input("ins_educacion");
         $educacion->anio=$request->input("anio_educacion");
         $resul= $educacion->save();

        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Agregado Correctamente");   
        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }

        
    }

    public function borrar_educacion($id){

       $educacion=Educacion::find($id);
       $resul=$educacion->delete();

        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Borrado correctamente");   
        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }



    }

}
