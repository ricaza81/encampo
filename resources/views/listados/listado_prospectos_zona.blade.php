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

  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Número <br/>de Leads</span>
              <span class="info-box-number"></small></span>
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
              <span class="info-box-text">Leads <br/>Cerrados</span>
              <span class="info-box-number"></span>
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
              <span class="info-box-text">Seguimientos</span>
              <span class="info-box-number"></span>
            
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
<table id="lista_prospectos_zonas" class="display table table-hover" cellspacing="0" width="100%">
     
        <thead>
            <tr>
                <th style="width:10px">Nombres</th>                 
                <th>Ingresado Por</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Zona</th>
                <th>Interesado en:</th>
                <th>Añadido el</th>
                <th>Etapa</th>
                <th>Status</th>
                <th>%</th>
                
            </tr>
        </thead>
 


  <?php 
 foreach($prospectos as $prospecto){  ?>

 <tr role="row" class="odd"  >
    <?php  if($prospecto->apellidos_secundario==""){   ?>      
    <td width="10px" class="mailbox-messages mailbox-name" style="width:10px"><a href="javascript:void(0);" onclick="mostrarprospecto(<?= $prospecto->id; ?>);"  style="display:block"><h4><span class="label label-primary"><?= ucwords($prospecto->apellidos." ".$prospecto->nombres);  ?></span></h4></td>
                    <?php } ?>
 <?php  if($prospecto->apellidos_secundario!=""){   ?>      
     <td WIDTH="50" style="width:10px"><a href="javascript:void(0);" onclick="mostrarprospecto(<?= $prospecto->id; ?>);"  style="display:block"><h4><span class="label label-warning" ><?= ucwords($prospecto->apellidos." ".$prospecto->apellidos_secundario);  ?></span></h4></td>
                    <?php } ?>
    <td WIDTH="50"><?= $prospecto->delasesor->nombres." ".$prospecto->delasesor->apellidos;  ?></td>
    <td style="width:10px"><a href="mailto:<?= $prospecto->email;?>?subject=Contact%20VLF"   style="display:block"><h5><span class="" ><?= $prospecto->email;  ?></span></h5></td></td>
    <td><a href="tel://+1<?= $prospecto->telefono;?>"   style="display:block"><?= $prospecto->telefono;  ?></td>
    <td><?= $prospecto->zona->zona ?></td>
    <td><?= $prospecto->interested->nombre ?></td>
    <td><?=$prospecto->created_at->toFormattedDateString(); ?></td>
    <td><span class="label label-warning"><b><?= ucwords($prospecto->status->nombre) ?></span></td>
    <td><div class="progress progress-xs">
       <?php  if($prospecto->status->valor>=80){   ?>      
     <span class="progress-bar progress-bar-success" style="width: <?= $prospecto->status->valor; ?>%"></span>
          
        <?php } else if ($prospecto->status->valor>=50){   ?>      
     <span class="progress-bar progress-bar-yellow" style="width: <?= $prospecto->status->valor; ?>%"></span>
        <?php } else if ($prospecto->status->valor>=0){   ?>      
     <span class="progress-bar progress-bar-danger" style="width: <?= $prospecto->status->valor; ?>%"></span>
        <?php } ?>



                    
                    </div></td>
 <td>
  
<?php  if($prospecto->status->valor>=80){   ?>      
     <span class="badge bg-green"><?= $prospecto->status->valor; ?>%</span>
          
        <?php } else if ($prospecto->status->valor>=50){   ?>      
     <span class="badge bg-blue"><?= $prospecto->status->valor; ?>%</span>
        <?php } else if ($prospecto->status->valor>=0){   ?>      
     <span class="badge bg-red"><?= $prospecto->status->valor; ?>%</span>
        <?php } ?>
 


</td>

</tr>



<?php } ?>      
       
</table>
</div>
</body>


<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->




@section('scripts')

<script>
$(document).ready(function() {
    $('#lista_prospectos_zonas').DataTable( {
        "order": [[ 6, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
                                   } );
                          } );
</script>
@stop

     
@endsection
