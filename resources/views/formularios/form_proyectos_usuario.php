<div class="row">  

 <div class="col-md-6">

 	    <div class="box box-primary">
                        
            <div class="box-header">
                <h3 class="box-title">Agregar Proyectos</h3>
            </div><!-- /.box-header -->

            <div id="notificacion_resul_fapr"></div>

            <form  id="f_agregar_proyectos"  method="post"  action="agregar_proyectos_usuario" class="formarchivo"  enctype="multipart/form-data"  >                
               
                 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                 <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">   

	             <div class="box-body ">

	             

                        <div class="form-group col-xs-12">
                              <label for="apellido">Titulo del Proyecto</label>
                              <input type="text" class="form-control" id="titulo_proyecto" name="titulo_proyecto" value="" required>
                         </div>

                           <div class="form-group col-xs-12">
                              <label for="apellido">Integrantes</label>
                              <input type="text" class="form-control" id="integrantes_proyecto" name="integrantes_proyecto" value="" required>
                         </div>  

                       <div class="form-group col-xs-12">
                       <label>Descripción</label>
                       <textarea class="form-control" rows="3" placeholder=" ..."  id="descripcion_proyecto"  name="descripcion_proyecto" ></textarea>
                       </div>


                       <div class="form-group col-xs-12">
                       <label>Objetivo</label>
                       <textarea class="form-control" rows="3" placeholder=" ..."  id="objetivo_proyecto"  name="objetivo_proyecto" ></textarea>
                       </div>


                         <div class="form-group col-xs-6">
                              <label for="apellido">Estado</label>
                              <select id="estado_proyecto" name="estado_proyecto"   class="form-control" >
                               <option value="0" >-</option>
                               <option value="1" >FINALIZADO</option>
                               <option value="2" >EN CURSO</option>
                               <option value="3" >POYECTO FUTURO</option>
                              </select>

                              
                         </div>

                           <div class="form-group col-xs-6">
                              <label for="apellido">Fecha de inicio</label>
                              <input type="date" class="form-control" id="fecha_proyecto" name="fecha_proyecto" value="" >
                         </div>

                          <div class=" col-xs-12">
                              <label for="apellido">Pais</label>
                              <input type="text" class="form-control" id="pais_proyecto" name="pais_proyecto" value="" >
                         </div>

                            <div class=" col-xs-12">
                              <label for="apellido">Financiamiento</label>
                              <input type="text" class="form-control" id="financiamiento_proyecto" name="financiamiento_proyecto" value="" >
                         </div>

                            <div class=" col-xs-12">
                              <label for="apellido">Palabras Clave</label>
                              <input type="text" class="form-control" id="pclave_proyecto" name="pclave_proyecto" value="" >
                         </div>

             
                          
                            <div class=" col-xs-12" style="background-color:rgb(229, 245, 253);" >
                              <label for="apellido">Archivo a subir (Formato: PDF) </label>
                              <input type="file" class="form-control" id="file" name="file" required >
                            </div>



	             </div>

	             <div class="box-footer">
	             <button type="submit" class="btn btn-primary">Agregar Proyecto</button>
	             </div>
             
            </form>
        </div>
        	


 </div>
 
  <div class="col-md-6">

  	    <div class="box box-primary">
                <div class="box-body box-profile">
                	<?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>           
                  <img class="profile-user-img img-responsive img-circle" src="<?=  $usuario->imagenurl;  ?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?= $usuario->nombres." ".$usuario->apellidos; ?></h3>
                  <p class="text-muted text-center"><?= $usuario->ocupacion; ?></p>
                  
                  <div id="notificacion_resul_faprd"></div>
                  <ul class="list-group list-group-unbordered">
                  
                  
                  <?php foreach($proyectos->get() as $archivo){  ?>
                  <li class="list-group-item">
                  <i class="fa fa-file-pdf-o"></i></i><b>-PROYECTO</b> <a class="pull-right"></a>
                  
                        
                   <br/> <i class="fa fa-circle-o text-yellow"></i> <span class="text-light-blue" >-<?=  $archivo->titulo;  ?></span>
                   <br/> <span><b>integrantes: </b>-<?=  $archivo->integrantes;  ?></span>    <span class="tools pull-right" ><a href="javascript:void(0);" onclick="borrarproyecto(<?= $archivo->id;  ?> );"  ><i class="fa fa-trash-o"></i></a></span>
                   <br/> <span><b>Descripcion: </b>-<?=  $archivo->descripcion;  ?></span>
                    <br/> <span><b>Objetivo: </b>-<?=  $archivo->objetivo;  ?></span>
                   
                     <br/>
                     <span><b>año: </b>-<?=  $archivo->fecha;  ?></span>
                   <br/><a href="<?= $rutaarchivos.$archivo->ruta;  ?>" style="display:block;" target="_blank"><button class="btn  btn-success btn-xs">Ver archivo online</button></a>
                                           
                   
                  </li>

                   <?php } ?>

                   
                  </ul>

                  <a href="javascript:void(0);" class="btn btn-primary btn-block"><b>-</b></a>
                </div><!-- /.box-body -->
        </div>
  </div>
	



</div>