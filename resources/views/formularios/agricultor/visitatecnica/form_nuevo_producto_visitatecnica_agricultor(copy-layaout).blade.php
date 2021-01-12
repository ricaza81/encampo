@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')
 
   
 

<div class="row docs-premium-template">

<div class="col-md-3">
       <div class="box box-primary col-xs-12">
                      <div class="box-header">
                         <h3 class="box-title">Productos Recomendados</h3>
                      </div><!-- /.box-header -->

                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            INGRESA LOS PRODUCTOS RECOMENDADOS
                        </h4>

                       <div id="notificacion_resul_fanu"></div>

<form  id="form_nuevo_producto_visitatecnica_agricultor"  method="post"  action="agregar_nuevo_producto_visitatecnica_agricultor" class="form-horizontal form_entrada" >
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

    <input type="text" class="form-control" id="id_visita" name="id_visita" value="<?= $visita->id; ?>">
                   
                      <div class="form-group">
                         <label for="agricultor">Producto:</label>
                         <select name="producto" class="form-control" id="producto" >
                            <option> Selecciona un Producto </option>
                            <?php  for($i=0;$i<=count($productos)-1;$i++){  if($productos[$i]->id !=$i){ ?>
                            <option value="<?= $productos[$i]->id  ?>" ><?= $productos[$i]->producto; ?></option>
                            <?php   }} ?>
                         </select>      
                     </div>

                      <div class="form-group">
                                            <label for="hectareas">Dosis</label>
                                            <input type="text" class="form-control" id="dosis" name="dosis" placeholder="Dosis" >
                      </div>
                      <div class="form-group">
                                            <label for="hectareas">Unidad de Medida</label>
                                            <input type="text" class="form-control" id="un_medida" name="un_medida" placeholder="Unidad de Medida" >
                      </div>

                      <div class="box-footer col-xs-12">
                                        <button  type="submit" class="btn btn-primary">Agregar Producto</button>

                       </div>

          </form>


                </div>
                         </div>         </div>
                          </div>    








 <div class="col-md-8">
       <div class="box box-primary col-xs-12">

<div class="col-md-4"> </div>
<div class="col-md-4"> </div>
                  <div class="col-md-4">
              <br/>
              
                 <button type="button" class="btn btn-block btn-primary btn-flat" onclick="window.location.href='form_nuevo_producto_visitatecnica_agricultor'">Actualizar</button> <br/> <br/>
            </div>    

<br/>
<table id="lista_productos" class="display responsive no-wrap" cellspacing="0" width="20%">
       
        <thead>
            <tr>
                <th style="width:10px">Producto</th>                 
                <th>Dosis</th>
                <th>Frecuencia</th>
                <th>Observaciones</th>
                <th>Fecha creación</th>
                <th>Action</th>
            </tr>
        </thead>
 
  <?php 
 foreach($recomendaciones as $recomendacion){  ?>

 <tr role="row" class="odd">
    <td><?=$recomendacion->producto->producto;?></td>
    <td><?=$recomendacion->cantidad."  ".$recomendacion->um?></td>
    <td><?=$recomendacion->frecuencia?></td>
    <td><?=$recomendacion->observaciones?></td>
    <td><?=$recomendacion->created_at?></td>
    <td><button class="btn  btn-success btn-xs" id="delete" ><i class="fa fa-fw fa-eye"></i>View
    </td>
</tr>

  <?php } ?>    
       
</table>
<br/>
            </div>
            </div>
            </div></div>


@endsection

@section('scripts')

<script>
$(document).ready(function() {
    $('#lista_productos').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>

@endsection









