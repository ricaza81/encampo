
@extends('layouts.app')

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

   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<div class="info-box bg-green">
            <span class="info-box-icon"><i class="glyphicon glyphicon-scale"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Hectareas Posibles Prospectos</span>
              <span class="info-box-number"><?php echo number_format($areas, 0, ',', '.');?> (<?= (($areas/2500)*100); ?>%)</span>

              <div class="progress">
                <div class="progress-bar" style="width: <?= ($areas/2500)*100; ?>%"></div>
              </div>
                  <span class="progress-description">
                    Meta: 2500 Ha en el Trimestre <br/>
                    Fecha Inicio: Miércoles 1 Feb 2017 <br/>
                    Fecha Cierre: Lunes 1 Mayo 2017
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>

  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Número de <br/>prospectos</span>
              <span class="info-box-number"><?=$cant_proyectos;?></small></span>
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
              <span class="info-box-text">Prospectos<br/>Gestionados</span>
              <span class="info-box-number"><?=$cant_finalizados;?></span>
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
              <span class="info-box-text">Número de <br/> Seguimientos</span>
              <span class="info-box-number"><?=$cant_seguimientos;?></span>
            
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
              
                 <button type="button" class="btn btn-block btn-primary btn-flat" onclick="window.location.href='home'">Actualizar</button>
            </div>

        </div>
        <!-- /.col -->
   </div>
   </div>




<div class="box box-primary">
<div class="box-body">              
<table id="lista_prospectos" class="display responsive no-wrap" cellspacing="0" width="100%">
     
        <thead>
            <tr>
               
                <th style="width:10px">Agricultor</th>
                <th>Añadido el</th>
                <th>Pend.<span width="100px" data-toggle="tooltip" title="" class="badge bg-yellow" data-placement="top" title="Número de seguimientos pendientes" data-original-title="Esta columna indica el número de seguimientos pendientes por cerrar del proyecto.">?</span><i class="material-icons"></i></span></th>
                <th>Ult. Seg.<span data-toggle="tooltip" title="" class="badge bg-yellow" data-placement="top" title="Hace cuánto tiempo se hizo el último seguimiento" data-original-title="Hace cuánto tiempo se hizo el último seguimiento.">?</span><i class="material-icons"></i></span></th>
                <th style="width:10px">Pais</th>
                <th style="width:10px">Departamento</th>
                <th># Ha</th>                   
                <th>Status</th>
                <th>RTC Asignado</th>
                <th>Email</th>
                <th>Teléfono</th>  
                <th>Cultivo</th>                
                <th>Interesado en:</th>      
                <th>%</th>
                <th>Ingresado por:</th>
                <th>Id:</th>
                
                
                
            </tr>
        </thead>
 


  <?php
$subtotal_numero_hectareas=0;


 foreach($prospectos as $prospecto){  
  $subtotal_numero_hectareas+=($prospecto->numero_hectareas); ?>

 <tr role="row" class="odd"  >

  <!--1-->

  


  <!--2-->

    <?php  if($prospecto->apellidos_secundario==""){   ?>      
    <td width="10px" class="mailbox-messages mailbox-name" style="width:10px"><a href="javascript:void(0);" onclick="mostrarprospecto(<?= $prospecto->id; ?>);"  style="display:block"><h4><span class="label label-primary"><?= ucwords($prospecto->nombres." ".$prospecto->apellidos);  ?></span></h4></td>
                    <?php } ?>
    <?php  if($prospecto->apellidos_secundario!=""){   ?>      
     <td WIDTH="50" style="width:10px"><a href="javascript:void(0);" onclick="mostrarprospecto(<?= $prospecto->id; ?>);"  style="display:block"><h4><span class="label label-warning" ><?= ucwords($prospecto->apellidos." ".$prospecto->apellidos_secundario);  ?></span></h4></td>
                    <?php } ?>

   <!--3-->

    <td><?=$prospecto->created_at->diffForHumans(); ?></td>
   <td><?= $prospecto->seguimientos($prospecto->id);?></td>
    <td><?= $prospecto->fechalastseguimiento($prospecto->id);?></td>

   <!--cuatro-->    
    <td WIDTH="50"><?= $prospecto->pais->nombre;  ?></td>
    <td WIDTH="50"><?= $prospecto->departamento->departamento;  ?></td> 
    
   <!--5-->
    <td><?= $prospecto->numero_hectareas ?></td>

 
    <!--6.STATUS-->


<?php  if($prospecto->stage==1){   ?>
<td><span class="label label-danger"><b><?= ucwords($prospecto->status->nombre) ?></span></td>
<?php } ?>

<?php  if($prospecto->stage!=1){   ?>
<td><span class="label label-success"><b><?= ucwords($prospecto->status->nombre) ?></span></td>
<?php } ?>


     <td><?= $prospecto->rtc_asignado($prospecto->id);?></td>
   
<!--7-->

    <td style="width:10px"><a href="mailto:<?= $prospecto->email;?>?subject=Contacto%20Cosmoagro"   style="display:block"><h5><span class="" ><?= $prospecto->email;  ?></span></h5></td></td>

<!--8-->

    <td><a href="tel://+1<?= $prospecto->telefono;?>"   style="display:block"><?= $prospecto->telefono;  ?></td>
  
<!--9-->

    <td><?= $prospecto->cultivo->cultivo;  ?></td>


<!--10-->
    
    <td><?= $prospecto->interested->nombre ?></td>


<!--11-->    
    
          

 <td>
  
<?php  if($prospecto->status->valor>=80){   ?>      
     <span class="badge bg-green"><?= $prospecto->status->valor; ?>%</span>
          
        <?php } else if ($prospecto->status->valor>=50){   ?>      
     <span class="badge bg-blue"><?= $prospecto->status->valor; ?>%</span>
        <?php } else if ($prospecto->status->valor>=0){   ?>      
     <span class="badge bg-red"><?= $prospecto->status->valor; ?>%</span>
        <?php } ?>
 

<td><?= $prospecto->delasesor->nombres." ".$prospecto->delasesor->apellidos;  ?></td>


</td> 


<td WIDTH="50"><?= $prospecto->id;  ?></td>

    
    
 
    
 

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


<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->




@section('scripts')

<script>
$(document).ready(function() {
    $('#lista_prospectos').DataTable( {
        "order": [[ 15, "desc" ]],
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
