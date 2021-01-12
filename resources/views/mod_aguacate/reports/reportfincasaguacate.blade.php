
@extends('layouts.appaguacate')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')
 
<body>



  <?php
 if ($msj==!"") { ?>
           <div ><label style='background-color: #E9FCFA;
border: 1px dashed #006600;
padding: 8px;
margin-bottom: 10px; font-family: Arial; font-size:12px; width:100%'><?php  echo $msj; ?>  </label>  </div>
<?php } ?>
<div class="col-md-12">
    <div class="box box-info" style="background:#4267b2 !important">
        <div class="box-header with-border" >
             <div class="col-md-4" >
                      <h3 class="box box-info"><td><span class="label label-info" style="font-size:15px"><img class="aligncenter size-full wp-image-2701" src="https://www.agronielsen.com/encampo/public/imagenes/gif-icons/animat-piechart-color.gif" alt="dato de mercado" width="80" height="80">Dato de Mercado</span></td></h3>
                </div>
       
        <div class="col-md-8 text-left" style="color:#fff">
            <div class="row docs-premium-template">  
                
                          <div class="info-box-text" style="color:#fff"><br/>Según el censo agrícola las areas<br/>sembradas de <?=$nombrecultivo;?> en <?=$nombredepto->departamento;?>
                          
                          <span class="info-box-number">son: <?php echo number_format($areas_totales_sembradas, 0, ',', '.')." ".'(Hectareas)';?>
                          </span>
                         
                            <a class="btn btn-default btn-sm" href="{{asset('mapping')}}" target="_blank" style="border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255)">Ver Censo
                            </a>
                         </div>
                </div>
            </div>
             </div>
        </div>
              
</div>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="info-box bg-green">
            <span class="info-box-icon"><i class="glyphicon glyphicon-scale"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Hectareas Fincas Total</span>
               <span class="info-box-number"><?php echo number_format($areas, 0, ',', '.');?> (Hectareas)</span>
                 <div class="progress">
                <div class="progress-bar" style="width: <?= ($areas/2500)*100; ?>%"></div>
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
           <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-ok"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Número de<br/>Fincas</span>
              <span class="info-box-number"><?=$cant_fincas;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Número de <br/> Visitas</span>
              <span class="info-box-number"><?=$cant_visitas;?></span>
            
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

     
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-refresh"></i></span>

            <div class="info-box-content">
              <br/>
              
                 <button type="button" class="btn btn-block btn-primary btn-flat" onclick="window.location.href='reportfincasaguacate'">Actualizar</button>
            </div>

        </div>
        <!-- /.col -->
   </div>
   </div>




<div class="box box-primary">



    <div class="callout callout-info"><h3 class="box-title">Reporte Consolidado de Fincas Cultivo de Aguacate </h3>
        

    
               
          </div>
              


     <div class="box-body">              
       <table id="lista_prospectos" class="display responsive no-wrap" cellspacing="0" width="100%">
     
        <thead>
            <tr>
               
                <!--0--><th style="width:10px">Finca</th>
                <!--1--><th style="width:10px">Departamento</th>
                <!--2--><th style="width:10px">Municipio</th>
                <!--3--><th style="width:10px"># Visitas</th>
                <!--4--><th style="width:10px">Hectareas</th>
                <!--5--><th>Total Arboles</th>
                <!--6--><th>Kg Estimados</th>
                <!--7--><th>Reg. ICA</th>
                <!--8--><th>Reg. GLOBAL</th>
                <!--9--><th>Detalles</th>
                <!--10--><th>Creada el:</th>
                <!--11--><th style="width:10px">ASNM</th>
               
            </tr>
        </thead>
            <?php
                 $subtotal_numero_hectareas=0;
                     foreach($fincas as $finca){  
                     $subtotal_numero_hectareas+=($finca->hectareas); ?>
                <tr role="row" class="odd"  >
                      <!--0--NombreAgricultor-->
                        <td><?=$finca->finca; ?></td>
                        <!--1--Departamento-->
                        <td><?=$finca->departamento->departamento; ?></td>
                        <!--2--NombreFinca-->
                        <td><?=$finca->ciudad->ciudad; ?></td>
                      <!--3--CultivoFinca-->
                        <td><a target="_blank" href="reportfincaaguacate/{{$finca->id}}" style="display:block"><span class="label label-success"><?=$finca->suma_acumulada_visitas($finca->id); ?></span></a></td>
                      <!--4--CultivoFinca-->
                        <td><?=$finca->hectareas; ?></td>
                   
                      <!--5--Ingresado-Por-->
                        <td><?=$finca->cantarboles; ?></td>
                      <!--6--Fecha_Creacion-->
                      <td><a target="_blank" href="reportfincaaguacate/{{$finca->id}}" style="display:block"><span class="label label-info"><?php echo number_format($finca->suma_acumulada_pdn_arboles($finca->id), 0, ',', '.');?></span></a></td>
                      <!--7--Fecha_Creacion-->
                      <td><?=$finca->regica ?></td>
                       <!--8-Id-->
                       <td><?=$finca->regglobal; ?></td>
            <td><a href="form_editar_finca_aguacate/{{$finca->id}}" style="display:block"><h4><span class="label label-warning" >Detalles</span></h4></a></td> 
                          <!--10-Id-->
                       <td><?=$finca->created_at; ?></td>
                          <!--11--NoHectareas-->
                        <td><?=$finca->asnm; ?></td>
                       
               </tr>

          <?php } ?>      
       
      </table>
      </div>

<br/>

    <div class="box box-primary">
      <div class="box-body col-xs-12">

        <h3>Total Hectareas: <?php echo number_format($subtotal_numero_hectareas, 0, ',', '.');?></h3>
           
       </div>   
    </div>

</div>
</body>


@endsection




@section('scripts')

<script>
$(document).ready(function() {
    $('#lista_prospectos').DataTable( {
        "order": [[ 10, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
                                   } );
    //     responsive: {
    //    details: true
    //} 
                          } );
</script>

<style>
    .color-box {
    margin: 15px 0;
    padding-left: 20px;
}

.break {
    margin-bottom: 15px!important;
}

.shadow {
    background: #F7F8F9;
    padding: 3px;
    margin: 10px 0;
}

.note-icon {
    background: #47ADE0;
}

.info-tab {
    width: 40px;
    height: 40px;
    display: inline-block;
    position: relative;
    top: 8px;
    float: left;
    margin-left: -23px;
}


    
</style>
     
@endsection
