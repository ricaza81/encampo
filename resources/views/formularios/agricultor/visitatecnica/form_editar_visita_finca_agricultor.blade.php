@extends('layouts.app')

@section('htmlheader_title')

  Mapa de todos los prospectos
@stop

@section('main-content')


<div class="row docs-premium-template">
      <div class="col-md-4">
                    <div class="box box-primary col-xs-4" style="height:450px;overflow-y: scroll;"> 
                          
                               <div class="box-header">
                                     <h4 style="color:#000">Fotos de Visitas Tecnicas</h4>
                              </div>
                               <?php  if($visita->imagen1==!"" && $visita->imagen2==!"") { ?>
                                  <div class="box-widget">
                                      <img class="img-responsive pad" src="https://www.agronielsen.com/encampo/storage/<?=$visita->imagen1?>">
                                  </div>  
                                  <div class="box-widget">
                                      <img class="img-responsive pad" src="https://www.agronielsen.com/encampo/storage/<?=$visita->imagen2?>">
                                  </div>  
                               <?php   } ?>
                                  
                      </div>

                                                                 <style>


.img-responsive:hover {
    transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>

  


                 <div class="box box-primary col-xs-4"><br/>
                  <div class="small-box bg-aqua">
                                                  <div class="inner">
                                                      <p>Tu Número de Productos Creados en tu portafolio es:</p>
                                                          <h3><?=count($productos)?></h3>
                                                  </div>
                                                    <div class="icon">
                                                     <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                   <a href="{{asset('reporteproductos')}}" target="_blank" class="small-box-footer">
                                                          VER MI PORTAFOLIO: <i class="fa fa-arrow-circle-right"></i>
                                                   </a>
                  </div>
   

                </div>

              </div>



    <div class="col-md-4">
       <div class="box box-primary col-xs-12">
                      <div class="box-header">
                         <h3 class="box-title">Productos Recomendados</h3>
                      </div>

        <!--  <img style="width:160px;height:160px;" src="http://localhost/campo/storage/fotografias/<?=$visita->imagen1?>" alt="">-->








                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            INGRESA LOS PRODUCTOS RECOMENDADOS
                        </h4>
                        
                        <div class="callout callout-danger">
                              <p>Por favor recuerda que la dosis es por Hectarea.</p>
                        </div>
                

                       <div id="notificacion_resul_fanu"></div>

                    <form  id="form1_nuevo_producto_visitatecnica_agricultor"  method="post"  action="" class="form-horizontal form_entrada" >
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            
                            <?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>
                            
                             <input type="hidden" class="form-group" id="id_visita" name="id_visita" value="<?= $visita->id; ?>">
                             <input type="hidden" class="form-group" id="precio" name="precio" value="">
                             <input type="hidden" name="hectareas" value="<?=$visita->hectareas ?>">
                        <input type="hidden" name="aplicaciones" value="<?=$visita->aplicaciones ?>">
                               
                            <div class="form-group">
                               <label for="agricultor">Producto:</label>
                                    <select name="producto" class="form-control" id="producto" required >
                                      <option> Selecciona un Producto </option>
                                           <?php  for($i=0;$i<=count($productos)-1;$i++){  if($productos[$i]->id !=$i){ ?>
                    
                                          <option value="<?= $productos[$i]->id  ?>" ><?= $productos[$i]->producto; ?></option>
                                          <?php   }} ?>
                                     </select>      
                            </div>
            
                            <div class="form-group">
                                                        <label for="dosis">Dosis por Hectarea(cc o gr)</label>
                                                        <input type="text" class="form-control" id="dosis" name="dosis" placeholder="Dosis por Hectarea" required>
                            </div>
                                  
                            <div class="form-group">
                                                        <label for="hectareas">Unidad de Medida</label>
                                                        <input type="text" class="form-control" id="un_medida" name="un_medida" placeholder="Unidad de Medida" required>
                            </div>
            
                                    <div class="box-footer col-xs-12 ">
                                        <button  type="submit" class="btn btn-primary">Agregar Producto</button>
                                   </div>
                    </form>
                  </div>
                </div>


@if ($recomendaciones=="")
            <td>
            <span class="label label-danger"><b>No hay recomendacion</span>
            </td>
@else 


      

                    
                    
                           <div class="box box-primary col-xs-12"><br/>
                                <div style="padding: 20px 30px;
                                         background: rgb(243, 156, 18);
                                        z-index: 999999;
                                        font-size: 16px;
                                        font-weight: 600;
                                        color:#fff;">Productos Recomendados en esta visita:
                                       
                                                                                
                                        
                                        <a class="btn btn-default btn-sm" onclick="window.location.href='{{asset('form_editar_visita_finca_agricultor/'.$id)}}'" style="margin-top: -5px; border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255);">Actualizar Productos</a>
                                        
                                </div>
                                <br/>
                                    
                                            
                                            
                                    

    <table id="lista_productos" class="display responsive no-wrap" cellspacing="0" width="100%">
            <thead>
                  <tr>
                      <th style="width:10px">Producto</th>
                      <th style="width:10px">Precio</th> 
                      <th>Dosis/Ha (cc/gr)</th>
                      <th># Aplicaciones</th>
                      <th># Ha</th>
                      <th>Valorizacion</th>
                      <th>Fecha creación</th>
                     <!-- <th>Action</th>-->
                  </tr>
           </thead>
                   <?php
                       $subtotal_valorizacion=0;
                          foreach($recomendaciones as $recomendacion){ $subtotal_valorizacion+=($recomendacion->precio);  ?>
                        <tr role="row" class="odd">
                            <td><?=$recomendacion->producto->producto;?></td>
                            <td>$<?=number_format($recomendacion->producto->precio, 0, ',', '.');?></td>
                            <td><?=$recomendacion->cantidad."  ".$recomendacion->um?></td>
                            <td><?=$recomendacion->visita->aplicaciones?></td>
                            <td><?=$recomendacion->visita->hectareas?></td>
                            <td>$<?=number_format($recomendacion->precio, 0, ',', '.');?></td>
                            <td><?=$recomendacion->created_at?></td>
                          <!--        <td><button class="btn  btn-success btn-xs" id="delete" ><i class="fa fa-fw fa-eye"></i>View
                                  </td>-->
                        </tr>
                    <?php } ?>   
    </table>

                    
     <br/>                  
     <div class="small-box bg-green">
            <div class="inner">
              <h4>Total Valorizacion de esta Visita:<b><h3>$<?php echo number_format($subtotal_valorizacion, 0, ',', '.');?></b></h3></h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            
     </div>
@endif    


  </div>
</div>
</div>

<div class="row docs-premium-template">
            <div class="col-md-3">
                <div class="box box-primary col-xs-12">
                      <div class="box-header">
                         <h3 class="box-title">Informacion Consolidada de esta visita tecnica:</h3>
                      </div><!-- /.box-header -->
                     <div id="msj"><?=$msj?></div>
                  <form id="" method="post" action="{{url('enviar_informe_visitatecnica')}}" class="" >
                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="id_visita" value="<?=$visita->id ?>">
                    <!--<div>id Visita: <td><?=$visita->id ?></td></div>-->
                    <input type="hidden" name="fecha_visita" value="<?=$visita->created_at ?>">
                    <div>Fecha Visita:<span class="label label-success"><?=$visita->created_at ?></span></div>
                    <input type="hidden" name="nombre_asesor" value="<?=$visita->usuario->nombres." ".$visita->usuario->apellidos ?>">
                     <input type="hidden" name="idempresa" value="<?=$visita->usuario->idEmpresa?>">
                    <div>Realizada por: <span class="label label-success"><?=$visita->usuario->nombres." ".$visita->usuario->apellidos ?></span></div>
                    <input type="hidden" name="nombre_agricultor" value="<?=$visita->agricultor->agricultor ?>">
                    <div>Nombre Agricultor: <span class="label label-success"><?=$visita->agricultor->agricultor ?></span></div>
                    <div>Nombre Finca: <span class="label label-success"><?=$visita->finca->finca ?></span></div>
                    <input type="hidden" name="nombre_finca" value="<?=$visita->finca->finca ?>">
                    <div>Cultivo: <span class="label label-success"><?=$visita->cultivo->cultivo ?></span></div>
                    <input type="hidden" name="cultivo_finca" value="<?=$visita->cultivo->cultivo ?>">
                    <div>Número Ha recomendadas: <span class="label label-success"><?=$visita->hectareas ?></span></div>
                    <input type="hidden" name="numero_hectareas" value="<?=$visita->hectareas ?>">
                    <input type="hidden" name="email_agricultor" value="<?=$visita->agricultor->email ?>">
                    <div >Email asesor: <span  class="label label-success"><?=$visita->usuario->email ?></span></div>
                    <input type="hidden" name="email_asesor" value="<?=$visita->usuario->email ?>">
                 
                    <input type="hidden" name="recomendaciones" value="<?=$recomendaciones ?>">
               
                    

                      <div class="box-header">
                         

                         <?php  if ($visita->agricultor->email==NULL){   ?>
                               <h3 class="box-title">Enviarme el reporte por Email solo a mi:</h3>
                         <?php } else {   ?>
                               <h3 class="box-title">Enviarme el reporte por Email:</h3>  
                                <div class="checkbox">
                                          <label>
                                            <input type="checkbox" id="check" name="check" value="0" onchange="javascript:showContent()">Enviar copia al Agricultor
                                          </label>
                                </div>
                                          <div id="agri_email" name="agri_email" style="display: none;">Email Agricultor:
                                            <span class="label label-success"><?=$visita->agricultor->email ?>
                                            </span>
                                          </div>
                          <?php } ?>
                              <div class="box-footer col-xs-12 ">
                                <button  type="submit" class="btn btn-primary">Finalizar y enviar</button>
                              </div>
                      </div>
                </form>
            </div>
          </div>

                            </div>
                        





@endsection
@section('scripts')
<script type="text/javascript">
    function showContent() {
        element = document.getElementById("agri_email");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script>
$(document).ready(function() {
    $('#lista_productos').DataTable( {
        "order": [[ 5, "desc" ]]
    } );
} );
</script>

<script>  
$(document).ready(function() {
$("#producto").change(function(event){
$.get('/encampo/public/precio_producto/'+event.target.value+"",function(response,state) {
$("#precio").empty();
var precio= response[0].precio;
$("#precio").val(precio);
                                                                  });
                                         });
                                  });
</script>

@endsection






