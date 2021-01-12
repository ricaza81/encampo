  <div class="margin"  id="botones_control" >
                                  <!--<button type="button" class="btn btn-primary" onclick="mostrarseccion(1);" >Informacion</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(2);" >Educación</button> -->
                                 <button type="button" class="btn btn-primary" onclick="mostrarprospecto(<?= $usuario->id; ?>);" >Info</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(5);" >Seguimiento</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(6);" >Agenda</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(3);" >DOCS</button>
                                  <!--<button type="button" class="btn btn-primary" onclick="mostrarseccion(4);" >Proyectos</button> --> 
                                 
                      </div>

<div class="row">  

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

 <div class="col-md-6">

      <div class="box box-primary">
                        
            <div class="box-header">
                <h3 class="box-title">Seguimiento</h3>
            </div><!-- /.box-header -->

<div id="notificacion_resul_fap"></div>

<form  id="f_agregar_observacion"  method="post"  action="agregar_observacion_prospecto" class="formarchivo" >                
               
                 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                 <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">   

               <div class="box-body ">

                  <div class="col-xs-12">
                              <label for="pais">Seguimiento</label>
                               <textarea id="observacion" name="observacion" class="form-control" rows="3" placeholder="Update the crew about what’s new on this lead" ></textarea>
                          <br/>
    
                        <label for="pais">Estado</label>   
                       <select id="avance" name="avance" class="form-control">

                           <option value="Ok">Implementar</option>
                           <option value="No">Por Implementar</option>
                        </select>
                        <br/>

                           <button type="submit" class="btn btn-primary">Actualizar</button>      
                             
                       </div>

                    

               </div>
             
            </form>
 </div>
 </div>           

  <div class="col-md-6">

        <div class="box box-primary">
                <div class="box-body box-profile">
                  <?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>           
                  <img class="profile-user-img img-responsive img-circle" src="<?=  $usuario->imagenurl;  ?>" alt="User profile picture">
                  <h3 class="profile-username text-center">Seguimiento a: <?= $usuario->nombres." ".$usuario->apellidos; ?></h3>
                  <p class="text-muted text-center"><?= $usuario->ocupacion; ?></p>
                  
                  <div id="notificacion_resul_fapu"></div>
                  <ul class="list-group list-group-unbordered">

                   <?php foreach($observaciones as $observacion) {  ?>



<?php if ($observacion->estado=="Ok") {   ?>
               <li class="callout callout-success">
               <br/><span type="date" class="label label-primary"></i></i>Date: <?= $observacion->created_at->toFormattedDateString(); ?></span>
               <span class="label label-warning"></i></i>Add by: <?= $observacion->asignado; ?></span>
               <p id="observacion_ok" name="observacion_ok" class="box-header with-border"></i></i><br/> <?= $observacion->observacion; ?> </p>
               <br/><span class="label label-primary" id="implementado_ok" name="implementado_ok">Implemented? <?= $observacion->estado; ?></span>
               <span class="label label-danger" id="borrar" name="borrar"><a href="javascript:void(0);" onclick="borrarobservacion(<?= $observacion->id;;  ?> );"  >Delete <i class="fa fa-trash-o"></i></a></span>
               <br/>               
               
 <?php } ?>                 

<?php if ($observacion->estado!="Ok") {   ?>
                   <li class="callout callout-danger">
                  <br/><span class="label label-primary"></i></i>Date: <?= $observacion->created_at->toFormattedDateString(); ?></span>
                  <span class="label label-warning"></i></i>Add by: <?= $observacion->asignado; ?></span>
                  <div class="box-header with-border"></i></i><br/> <?= $observacion->observacion; ?> </div>
                  <br/><span class="label label-primary" id="implementado_no_ok" name="implementado_no_ok">Implemented? <?= $observacion->estado; ?></span>
                  <span class="label label-danger" id="borrar" name="borrar"><a href="javascript:void(0);" onclick="borrarobservacion(<?= $observacion->id;;  ?> );"  >Delete <i class="fa fa-trash-o"></i></a></span>
                  <br/>
 <?php } ?>



                  <?php } ?> </li>




</div><!-- /.box-body -->
        </div>
  </div>

          </div>
  </div>

    <style type='text/css'>
.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #ACE6C0 !important;
}

.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
    background-color: #f4e1d0 !important;
}

 #borrar {
  background-color: #dd4b39 !important;
 
  }
 
 #implementado_ok {
  background-color: #00a65a !important;
 
  }

  #implementado_no_ok {
  background-color: #dd4b39 !important;
 
  } 


</style>