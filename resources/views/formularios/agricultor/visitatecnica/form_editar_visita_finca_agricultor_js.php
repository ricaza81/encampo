
 
   
 


<div class="row docs-premium-template">

              <div class="col-md-4">
                     <div class="box box-primary col-xs-12">
                                    <div class="box-header">
                                       <h3 class="box-title">Detalles de la Visita</h3>
                                    </div><!-- /.box-header -->

                                          <input type="hidden" name="id_visita" value="<?=$visita->id ?>">
                                          <div>id Visita: <td><?=$visita->id ?></td></div>
                                          <input type="hidden" name="fecha_visita" value="<?=$visita->created_at ?>">
                                          <div>Fecha Visita: <td><?=$visita->created_at ?></td></div>
                                          <input type="hidden" name="id_agricultor" value="<?=$visita->id_agricultor ?>">
                                          <div>id Agricultor: <td><?=$visita->id_agricultor ?></td></div>
                                          <input type="hidden" name="nombre_agricultor" value="<?=$visita->agricultor->agricultor ?>">
                                          <div>Nombre Agricultor: <td><?=$visita->agricultor->agricultor ?></td></div>
                                          <div>Nombre Finca: <td><?=$visita->finca->finca ?></td></div>
                                          <input type="hidden" name="nombre_finca" value="<?=$visita->finca->finca ?>">
                                          <div>Cultivo Finca: <td><?=$visita->cultivo->cultivo ?></td></div>
                                          <input type="hidden" name="cultivo_finca" value="<?=$visita->cultivo->cultivo ?>">

                                          <div>email Agricultor: <td><?=$visita->agricultor->email ?></td></div>
                                          <input type="hidden" name="email_agricultor" value="<?=$visita->agricultor->email ?>">
                                          <div>email asesor: <td><?=$visita->usuario->email ?></td></div>
                                          <input type="hidden" name="email_asesor" value="<?=$visita->usuario->email ?>">
                                          <br/>
                    </div>
                    
                                      <div class="box box-primary col-xs-4" style="height:250px;overflow-y: scroll;"> 
                          
                               <div class="box-header">
                                     <h4 style="color:#000">Fotos de de la Visita</h4>
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
              </div>

            <div class="col-md-8">
                        <?php if ($recomendaciones=="")  { ?>

                        <td><span class="label label-danger"><b>No hay recomendacion</b></span></td>  }

                         else  { <?php } ?>
            </div>


 <div class="col-md-8">
                            <div class="box box-primary col-xs-12">
                                    <div class="box-header">
                                       <h3 class="box-title">Productos Recomendados</h3>
                                    </div><!-- /.box-header -->




<table id="lista_productos" class="display responsive no-wrap" cellspacing="0" width="100%">
       
        <thead>
            <tr>
                <th style="width:10px">Producto</th>
                <th># Ha</th>               
                <th>Dosis(um)/Ha</th>
                <th># Aplicaciones</th>
                <th>Valorización</th>
                <th>Precio</th>                
                <th>Fecha Recomendación</th>
            </tr>
        </thead>
 

  <?php
 $subtotal_valorizacion=0;
 foreach($recomendaciones as $recomendacion){ 
 $subtotal_valorizacion+=$recomendacion->precio; 
  ?>

 <tr role="row" class="odd">
    <td><?=$recomendacion->producto->producto;?></td>
    <td><?=$recomendacion->visita->hectareas?></td>
    <td><?=$recomendacion->cantidad."  ".$recomendacion->um?></td>
    <td><?=$recomendacion->visita->aplicaciones?></td>
    <td>$<?php echo number_format(($recomendacion->precio), 0, ',', '.');?></td>
    <td>$<?php echo number_format(($recomendacion->producto->precio), 0, ',', '.');?></td>
    <td><?=$recomendacion->created_at?></td>
</tr>

<?php } ?>

       </table>
 
 <br/>
          <div class="small-box bg-aqua">
            <div class="inner">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
              

              <p>Valorización Total de esta visita:</p>
              <h3>$<?php echo number_format(($subtotal_valorizacion), 0, ',', '.');?></h3>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="" class="small-box-footer">
              <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
 </div>
</div>
</div>
      
      


     
   














<script>
$(document).ready(function() {
    $('#lista_productos').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>



</div>











