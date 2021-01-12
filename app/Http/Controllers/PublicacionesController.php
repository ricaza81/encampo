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



class PublicacionesController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth');
    }

    
            //leccion 11

    public function form_publicaciones_usuario($id){

       $usuario=Prospectos::find($id);
       $tipopublicaciones=TipoPublicaciones::all();
       $publicaciones= $usuario->publicaciones();
      // $nombre_documento=Publicaciones::nombre_documento();
       $rutaarchivos= "../storage/archivos/";

       return view("formularios.form_publicaciones_usuario")
       ->with("usuario",$usuario)
       ->with("tipopublicaciones", $tipopublicaciones)
       ->with("publicaciones",$publicaciones) 
       ->with("rutaarchivos",$rutaarchivos);
       //->with("nombre_documento",$nombre_documento);

    }

 
    public function agregar_publicacion(Request $request ){
         //funcion para agregar la publicacion de cada usuario

    	$archivo = $request->file('file');
    	$input  = array('file' => $archivo) ;
        $reglas = array('file' => 'required|mimes:jpeg,jpg,pdf,png|max:15000000');  //recordar que para activar mimes se debe descomentar la linea de codigo  'extension=php_fileinfo.dll' del php.ini
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es un pdf o es demasiado Grande para subirlo");
        }
        else
        {
	         $publicacion= new Publicaciones;
	         $publicacion->idUsuario= $request->input("id_usuario");
	         $publicacion->idTipopublicacion= $request->input("tipo_publicacion");
           $publicacion->nombre_documento= $request->input("nombre_documento");
        
	      
      /*     $publicacion->titulo=$request->input("titulo_publicacion");
	         $publicacion->autores=$request->input("autores_publicacion");
	         $publicacion->universidad=$request->input("universidad_publicacion");
	         $publicacion->anio=$request->input("anio_publicacion");
	         $publicacion->pais=$request->input("pais_publicacion");
	         $publicacion->revista=$request->input("revista_publicacion");
	         $publicacion->volumen=$request->input("volumen_publicacion");
	         $publicacion->numero=$request->input("numero_publicacion");
	         $publicacion->pageI=$request->input("pageI_publicacion");
	         $publicacion->pageF=$request->input("pageF_publicacion");
	         $publicacion->volumenL=$request->input("vlibro_publicacion");
	         $publicacion->numeroL=$request->input("nlibro_publicacion");
	         $publicacion->ciudad=$request->input("ISBN_publicacion");
	         $publicacion->edicion=$request->input("edicion_publicacion");
	         $publicacion->editorial=$request->input("editorial_publicacion"); */
            
           $carpeta=$request->input("tipo_publicacion");
	         $ruta=$carpeta."/".$request->input("id_usuario")."_".$archivo->getClientOriginalName();
		       $r1=Storage::disk('archivos')->put($ruta,  \File::get($archivo) );
           $publicacion->ruta=$ruta;
           $resul= $publicacion->save();

	        if($resul){            
	            return view("mensajes.msj_correcto")->with("msj","Publicacion Agregada Correctamente");   
	        }
	        else
	        {            
	             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
	        }

         }
    }

    public function borrar_publicacion($id){

       $publicacion=Publicaciones::find($id);
       $resul=$publicacion->delete();
        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Borrado correctamente");   
        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }

    }


       public function listado_publicaciones($id){

         $publicaciones=Publicaciones::paginate(25);
         $rutaarchivos= "../storage/archivos/";
         return view("listados.listado_publicaciones")
         ->with("publicaciones", $publicaciones)
         ->with("rutaarchivos", $rutaarchivos);      
       }

       public function descargar_publicacion($id){

         $publicacion=Publicaciones::find($id);
         $rutaarchivo= "../storage/archivos/".$publicacion->ruta;
         return response()->download($rutaarchivo);

       }


}