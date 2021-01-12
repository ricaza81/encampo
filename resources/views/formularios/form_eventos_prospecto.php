 <div class="margin"  id="botones_control" >
                                  <!--<button type="button" class="btn btn-primary" onclick="mostrarseccion(1);" >Informacion</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(2);" >Educación</button> -->
                              <button type="button" class="btn btn-primary" onclick="mostrarprospecto(<?= $usuario->id; ?>);" >Info</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(5);" >Seguimiento</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(6);" >Agenda</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(3);" >DOCS</button>
                                  <!--<button type="button" class="btn btn-primary" onclick="mostrarseccion(4);" >Proyectos</button> --> 
                                 
                      </div>

        


 
  <div class="col-xs-6" id="lista">

        <div class="box box-primary">
                <div class="box-body box-profile">
                  <?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>           
                  <img class="profile-user-img img-responsive img-circle" src="<?=  $usuario->imagenurl;  ?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?= $usuario->nombres." ".$usuario->apellidos; ?></h3>
                  <p class="text-muted text-center"><?= $usuario->ocupacion; ?></p>
                  
                  <div id="notificacion_resul_fapu"></div>
                  <ul class="list-group list-group-unbordered">
                  
                  
                  <?php foreach($tipopublicaciones as $tipo){  ?>
                  
                  <li class="list-group-item">
                  <i ></i></i><b>idProspecto: <?= $tipo->idProspecto; ?></b> <a class="pull-right"></a>
                  <br/><i ></i></i><b>Event: <?= $tipo->name; ?></b> <a class="pull-right"></a>
                  <br/> <span >By: <?=$tipo->asignado->nombres." ".$tipo->asignado->apellidos;?></span>
                  
                  <br/> <span >Responsable: <?=$tipo->asesor->nombres." ".$tipo->asignado->apellidos;?></span>
                  

            
                  <br/> <span >Start date: <?= $tipo->start; ?></span>
                  <br/> <span >Finish date: <?= $tipo->end; ?></span>
                  <br/> <span >Status: </span>
                   <?php  if($tipo->status->nombre_status=="N/A"){   ?>      
                          <span class="badge bg-red"><button type="submit" href="javascript:void(0);" onclick="mostrarevento(<?= $tipo->id; ?>);" class="btn btn-block btn-danger"><?= strtoupper($tipo->status->nombre_status)  ?></button></span>
                    <?php } ?>
                    <?php  if($tipo->status->nombre_status=="Open"){   ?>      
                                            <span class="badge bg-red"><button type="submit" href="javascript:void(0);" onclick="mostrarevento(<?= $tipo->id; ?>);" class="btn btn-block btn-danger"><?= strtoupper($tipo->status->nombre_status)  ?></button></span>
                                      <?php } ?>
                    
                    <?php  if($tipo->status->nombre_status=="Finished"){   ?>   
                                         <span class="badge bg-green"><button type="submit" href="javascript:void(0);" onclick="mostrarevento(<?= $tipo->id; ?>);" class="btn btn-block btn-success"><?= strtoupper($tipo->status->nombre_status)  ?></button></span>
                                      <?php } ?>



                  <br/> <span >Date: <?= $fecha; ?></span>
                  <br/> <br/> <textarea class="form-control" rows="3" id="observaciones" name="observaciones" disabled><?= $tipo->description;?></textarea>
                   
                            


                   <?php } ?>

                   
                  </ul>

                  <!--<a href="javascript:void(0);" class="btn btn-primary btn-block"><b>-</b></a> -->
                </div><!-- /.box-body -->
        </div>
  </div>
  


</div>

<style type='text/css'>
  #lista {
margin-left: 300px;
  margin-right: auto;

      }
</style>