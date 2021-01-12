<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Publicaciones;
use App\TipoPublicaciones;
use App\Pais;
use App\Prospectos;
use App\AgriAgricultores;
use App\AgriVisitasTecnicas;
use App\Eventos;


class GraficasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getUltimoDiaMes($elAnio,$elMes) {
     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }



    public function registros_mes($anio,$mes)
    {
        $primer_dia=1;
        $usuarioactual=\Auth::user()->id;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $usuarios=AgriAgricultores::where('idUsuario','=',$usuarioactual)->whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($usuarios);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($usuarios as $usuario){
        $diasel=intval(date("d",strtotime($usuario->created_at) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }


    public function total_publicaciones(){
        $tipospublicacion=AgriVisitasTecnicas::all();
        $ctp=count($tipospublicacion);
        $publicaciones=Publicaciones::all();
        $ct =count($publicaciones);
        
        for($i=0;$i<=$ctp-1;$i++){
         $idTP=$tipospublicacion[$i]->id;
         $numerodepubli[$idTP]=0;
        }

        for($i=0;$i<=$ct-1;$i++){
         $idTP=$publicaciones[$i]->idTipopublicacion;
         $numerodepubli[$idTP]++;           
        }

        $data=array("totaltipos"=>$ctp,"tipos"=>$tipospublicacion, "numerodepubli"=>$numerodepubli);
        return json_encode($data);
    }


    public function index()
    {
        $anio=date("Y");
        $mes=date("m");

                $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);

        return view("listados.listado_graficas")
               ->with("anio",$anio)
               ->with("mes",$mes)
               ->with("usuario",  $usuarioactual)
               ->with("events",$events)
               ->with("events_day",$events_day)
               ->with("fecha",$fecha);
    }

        public function index_asesor()
    {
        $anio=date("Y");
        $mes=date("m");

                $usuarioactual=\Auth::user();
        $fecha=date('Y-m-d');
        $idusuario=\Auth::user()->id;
        $events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
        $events_day=count($events);

        return view("listados.listado_graficas_asesor")
               ->with("anio",$anio)
               ->with("mes",$mes)
               ->with("usuario",  $usuarioactual)
               ->with("events",$events)
               ->with("events_day",$events_day)
               ->with("fecha",$fecha);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
