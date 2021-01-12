
@extends('layouts.appaguacate')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')
 
<body>



  <?php
 if ($msj==!"") { ?>
           <div ><label style='background-color: #cce5ff !important;
    border: 1px solid #004085;
    padding: 8px;
    margin-bottom: 10px;
    font-family: Arial;
    font-size: 18px;
    width: 100%;
    color: #004085;
    border-radius: 4px 4px 4px 4px;
    padding: 20px 20px 20px 20px;
    font-weight: 300;'><?php  echo $msj; ?>  </label>  </div>
<?php } ?>



<div class="row docs-premium-template">
   <div class="col-md-8">
<div class="box box-primary">

    <div class="callout callout-info">
      <h3 class="box-title">Reporte Consolidado de Visitas en la finca: <?=$finca->finca?></h3>
        
          </div>

    <style>
    .img-circle {
    width: 215px;
    height: auto;
    float: left;
    padding:10px;
                }

    .bg-yellow2 {
    padding: 20px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}

.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #4267b2 !important;
}
</style>


</div>
     <div class="box-body">              
       <table id="lista_visitas" class="display responsive no-wrap" cellspacing="0" width="100%">
     
          <thead>
            <tr>
               
                
                <!--1--><th style="width:10px">Finca</th>
                <!--2--><th style="width:10px">Residualidad</th>
                <!--3--><th style="width:10px">Mat.Seca</th>
                <!--4--><th style="width:10px">%Nal</th>
                        <th style="width:10px">Creada por:</th>
                <!--5--><th>Fecha:</th>
             
                        <th>Detalles</th>
                <!--1--><th style="width:10px">idvisita</th>

               
            </tr>
        </thead>
             @foreach($fincas as $finca)
              
                      <tr role="row" class="odd"  >
                      <td><?=$finca->finca->finca; ?></td>
                     <td><?=$finca->residualidad; ?></td>
                      <td><?=$finca->matseca; ?></td>
                       <td><?=$finca->porcent_nal; ?></td>
                    <td><?=$finca->usuario->nombres." ".$finca->usuario->apellidos; ?></td>
                         <td><?=$finca->created_at; ?></td>
                   
          <td><a href="/encampo/public/form_editar_visita_finca_aguacate/{{$finca->id}}" style="display:block"><h4><span class="label label-warning" >Detalles</span></h4></a> 
                            <td><?=$finca->id; ?></td>
                      </tr>
                                            
              @endforeach 
      
 
      </table> 
      </div>


<br/>



</div>


   <div class="col-md-4">
    <div class="callout callout-info-gris">
                <h4 style="color:#333">Visitas Recientes</h4>
         <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">                                  
                  
                </div>
            </div>
            
                                                                 <style>


.img-responsive:hover {
    transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
      </div>


          <div class="callout-info-gris">
               <a href="modmediaagcat" class="nbtn-two">Ver Banco de Fotos</a>
          </div>  
    </div>
</body>


<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->


     
@endsection

@section('scripts')

<script>
$(document).ready(function() {
    $('#lista_visitas').DataTable( {
        "order": [[ 7, "desc" ]],
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
    .h4, h4 {
    font-size: 23px;
    letter-spacing: -2px;
}

    .nbtn-two {
    background: #3224af;
    border-radius: 6px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #fff;
    font-weight: 600;
    font-size: 20px;
    padding: 9px 28px;
  
    
}
</style>

<style>

     .callout-info-gris {
    background-color: #eee !important;
    text-decoration: none;
}

.callout a {
    color: #fff;
    text-decoration: none;
}
</style>



@endsection


