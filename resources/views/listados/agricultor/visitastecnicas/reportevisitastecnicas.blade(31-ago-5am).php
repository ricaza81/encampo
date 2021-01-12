
@extends('layouts.app')

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


<div class="row">
  <div class="col-lg-3 col-xs-6">
          <div class="info-box bg-green">
                             <span class="info-box-icon">Ha</span>

             <div class="info-box-content">
                            <span class="info-box-text">Total Hectareas Agricultores</span>
                            <span class="info-box-number"><?php echo number_format($areas, 0, ',', '.');?></span>
                        <div class="progress">
                          <div class="progress-bar" style="width: <?= ($areas/2500)*100; ?>%"></div>
                        </div>
              </div>
          </div>
 </div>
  <div class="col-lg-3 col-xs-6">
          <div class="info-box bg-green">
                             <span class="info-box-icon"><i class="glyphicon glyphicon-leaf"></i></span>

             <div class="info-box-content">
                            <span class="info-box-text">Total Fincas</span>
                            <span class="info-box-number"><?=count( $fincas);?></span>
                        <div class="progress">
                          <div class="progress-bar" style="width: <?= ($areas/2500)*100; ?>%"></div>
                        </div>
              </div>
          </div>
 </div>
   <div class="col-lg-3 col-xs-6">
          <div class="info-box bg-green">
                             <span class="info-box-icon"><i class="glyphicon glyphicon-map-marker"></i></span>

             <div class="info-box-content">
                            <span class="info-box-text">Total Visitas Técnicas</span>
                            <span class="info-box-number"><?=count($visitastecnicasusuario);?></span>
                        <div class="progress">
                        <!--  <div class="progress-bar" style="width: <?= ($areas/2500)*100; ?>%"></div>-->
                        </div>
              </div>
          </div>
 </div>

    <div class="col-lg-3 col-xs-6">
          <div class="info-box bg-green">
                             <span class="info-box-icon"><i class="glyphicon glyphicon-screenshot"></i></span>

             <div class="info-box-content">
                            <span class="info-box-text"># Visitas(promedio)/Finca</span>
                            <span class="info-box-number">
                                <?php  if (count($fincas)==0){ ?>
                                          0
                                  <?php } else {   ?>
                                        <?php echo number_format(count($visitastecnicasusuario)/count( $fincas));?>
                                <?php } ?>
                              </span>
                        <div class="progress">
                          <div class="progress-bar" style="width: <?= ($areas/2500)*100; ?>%"></div>
                        </div>
              </div>
          </div>
 </div>

</div>


<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                              <?php
                 $subtotal_valorizacion1=0;
                     foreach($visitastecnicasusuario as $visitatecnicausuario){  
                     $subtotal_valorizacion1+=$visitatecnicausuario->suma_valorizacion_visita($visitatecnicausuario->id); 
                     ?>
                   <?php } ?>

              <h3>$<?php echo number_format($subtotal_valorizacion1, 0, ',', '.');?></h3>

              <p>Valorización Total</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="{{asset('reporteproductos')}}" class="small-box-footer">
              Más Info<i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                              <?php
                 $subtotal_ha_recomendadas=0;
                     foreach($visitastecnicasusuario as $visitatecnicausuario){  
                     $subtotal_ha_recomendadas+=$visitatecnicausuario->hectareas; 
                     ?>
                   <?php } ?>

              <h3><?php echo number_format($subtotal_ha_recomendadas, 0, ',', '.');?></h3>

              <p># Ha bajo recomendación</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{asset('mapa-visitastecnicas')}}" class="small-box-footer">
              Más Info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$cant_agricultores;?></h3>

              <p>Agricultores en total</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{asset('listado_todos_prospectos_comercial')}}" class="small-box-footer">
              Más Info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php  if (count($fincas)==0){ ?>
                                          <h3>$0</h3>
                        <?php } else {   ?>
                                        <h3>$<?php echo number_format(($subtotal_valorizacion1), 0, ',', '.');?></h3>
              <?php } ?>
              <p>$ recomendados/Ha</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{asset('geo-marketing')}}" class="small-box-footer">
              Más Info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>


<div class="box box-primary">
    <div class="callout callout-info"><h3 class="box-title">Reporte Consolidado de Visitas Técnicas Ejecutadas en Campo para la Empresa: </h3>
        

             <div class="bg-yellow2">
              <div class="widget-user-image">
                <img class="img-circle" src="<?=$empresa->imglogo?>" alt="<?=$empresa->nombreempresa?>">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?=$empresa->nombreempresa?></h3>
              <h5 class="widget-user-desc">Cantidad Usuarios: <?=count($usuariosempresa)?></h5>
            </div>
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
       <table id="lista_prospectos" class="display responsive no-wrap" cellspacing="0" width="100%">
     
          <thead>
            <tr>
               
                
                <!--1--><th style="width:10px">Agricultor</th>
                <!--2--><th style="width:10px">Finca</th>
                <!--3--><th style="width:10px">Cultivo</th>
                <!--4--><th style="width:10px"># Ha(recomendadas)</th>
                        <th style="width:10px">Valorización($)</th>
                <!--5--><th>Realizada por</th>
                <!--6--><th>Fecha</th>
                        <th>Detalles</th>
                <!--1--><th style="width:10px">idvisita</th>

               
            </tr>
        </thead>
             @foreach($usuariosempresa as $usuario)
               @foreach($usuario->visitatecnica as $visitatecnica)
                      <tr role="row" class="odd"  >
                      <td><?=$visitatecnica->agricultor->agricultor; ?></td>
                      <td><?=$visitatecnica->finca->finca; ?></td>
                      <td><?=$visitatecnica->cultivo->cultivo; ?></td>
                      <td><?=$visitatecnica->hectareas; ?></td>
                      <td>$<?=number_format($visitatecnica->suma_valorizacion_visita($visitatecnica->id), 0, ',', '.'); ?></td>
                      <td><?=$visitatecnica->usuario->nombres; ?></td>
                      <td><?=$visitatecnica->created_at; ?></td>
                      <td><a href="javascript:void(0);"onclick="mostrarvisita(<?= $visitatecnica->id; ?>);" style="display:block"><h4><span class="label label-warning" >Detalles</span></h4></a>          
                      </td>
                      <td><?=$visitatecnica->id; ?></td>
                      </tr>
                                            
              @endforeach 
      
      @endforeach
      </table> 
      </div>


<br/>

    <div class="box box-primary">
 
    </div>

</div>
</body>


<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->




@section('scripts')

<script>
$(document).ready(function() {
    $('#lista_prospectos').DataTable( {
        "order": [[ 8, "desc" ]],
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



@stop

     
@endsection
