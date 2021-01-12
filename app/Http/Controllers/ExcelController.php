<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\user;
use Excel;
use App\Pais;
use App\Prospectos;
//use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pdf.listado_reportes");
    }


      public function crearPDF($datos,$vistaurl,$tipo)
    {

         Excel::create('Prospectos_VLF', function($excel) {
 
            $excel->sheet('Prospectos', function($sheet) {
 
                $products = Prospectos::all();
 
                $sheet->fromArray($products);
 
            });
        })->export('xls');
 
    
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }


    public function crear_reporte_porpais($tipo){

     $vistaurl="pdf.reporte_por_pais";
     $paises=Prospectos::all();
     
     return $this->crearPDF($paises, $vistaurl,$tipo);


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
