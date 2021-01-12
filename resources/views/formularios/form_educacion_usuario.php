<div class="row">  

 <div class="col-md-4">

 	    <div class="box box-primary">
                        
            <div class="box-header">
                <h3 class="box-title">Agregar Datos Educación</h3>
            </div><!-- /.box-header -->

            <div id="notificacion_resul_faedu"></div>

            <form  id="f_agregar_educacion"  method="post"  action="agregar_educacion_usuario" class="form-horizontal form_entrada" >                
               
                 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                 <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">   

	             <div class="box-body ">

	             	  <div class="form-group col-xs-12">
                              <label for="pais">Tipo Educación</label>
                               <select id="tipo_educacion" name="tipo_educacion" class="form-control">
                                <?php foreach($tiposeducacion as $tipo){  ?>
                                   <option value="<?= $tipo->id; ?>" > <?= $tipo->titulo; ?> </option>
                                
                                <?php } ?>
                                
                               </select>
                       </div>

                        <div class="form-group col-xs-12">
                              <label for="apellido">Titulo Obtenido</label>
                              <input type="text" class="form-control" id="titulo_educacion" name="titulo_educacion" value="" required>
                         </div>

                           <div class="form-group col-xs-12">
                              <label for="apellido">Institución</label>
                              <input type="text" class="form-control" id="ins_educacion" name="ins_educacion" value="" required>
                         </div>  

                         <div class="form-group col-xs-12">
                              <label for="apellido">Año de Graduacion</label>
                              <input type="text" class="form-control" id="anio_educacion" name="anio_educacion" value="" required>
                         </div>



	             </div>

	             <div class="box-footer">
	             <button type="submit" class="btn btn-primary">Actualizar Datos</button>
	             </div>
             
            </form>
        </div>
        	


 </div>
 
  <div class="col-md-8">

  	    <div class="box box-primary">
                <div class="box-body box-profile">
                	<?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>           
                  <img class="profile-user-img img-responsive img-circle" src="<?=  $usuario->imagenurl;  ?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?= $usuario->nombres." ".$usuario->apellidos; ?></h3>
                  <p class="text-muted text-center"><?= $usuario->ocupacion; ?></p>
                  
                  <div id="notificacion_resul_edu"></div>
                  <ul class="list-group list-group-unbordered">
                  
                  
                  <?php foreach($tiposeducacion as $tipo){  ?>
                  <li class="list-group-item">
                  <i class="fa fa-book margin-r-5"></i><b>--<?= $tipo->titulo; ?></b> <a class="pull-right"></a>
                  
                  <?php foreach($educacion->get() as $info){  ?>
                  <?php  if($info->idTipoeducacion==$tipo->id){   ?>
                        
                   <br/> <i class="fa fa-circle-o text-yellow"></i> <span class="text-light-blue" >-<?=  $info->titulo;  ?></span>
                  <span>-<?=  $info->institucion;  ?></span>  
                   <span>-<?=  $info->anio;  ?></span>
                   <span class="tools pull-right" ><a href="javascript:void(0);" onclick="borrareducacion(<?= $info->id;;  ?> );"  ><i class="fa fa-trash-o"></i></a></span>        
                  <?php } ?>
                  <?php } ?>
                   
                  </li>

                   <?php } ?>

                   
                  </ul>

                  <a href="javascript:void(0);" class="btn btn-primary btn-block"><b>-</b></a>
                </div><!-- /.box-body -->
        </div>
  </div>
	



</div>
