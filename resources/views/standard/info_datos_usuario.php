

<div class="row">  


 <div class="col-md-12">

    <div class="col-md-6">

        <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title"><b>INFORMACIÓN DEL USUARIO</b></h3>

                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="box-body ">
                      <ul class="nav nav-pills nav-stacked">
                        <li style="line-height: 25px;" ><span><i class="fa fa-circle-o text-red"></i> <label for="nombre" >Nombres:</label><span style="margin-left:15px;"><?= $usuario->nombres; ?></span> </span></li>
                        <li style="line-height: 25px;" ><span><i class="fa fa-circle-o text-yellow"></i> <label for="nombre" >Apellidos:</label><span style="margin-left:15px;"><?= $usuario->apellidos; ?></span></span></li>
                        <li style="line-height: 25px;" ><span><i class="fa fa-circle-o text-light-blue"></i> <label for="nombre" >País:</label><span style="margin-left:15px;"><?= $usuario->delpais->nombre;  ?></span></span></li>
                        <li style="line-height: 25px;" ><span><i class="fa fa-circle-o text-red"></i> <label for="nombre" >Ciudad:</label><span style="margin-left:15px;"><?= $usuario->ciudad; ?></span> </span></li>
                        <li style="line-height: 25px;"><span><i class="fa fa-circle-o text-yellow"></i> <label for="nombre" >Institución:</label><span style="margin-left:15px;"><?= $usuario->institucion; ?></span></span></li>
                        <li style="line-height: 25px;"><span><i class="fa fa-circle-o text-light-blue"></i> <label for="nombre" >Ocupacion:</label><span style="margin-left:15px;"><?= $usuario->ocupacion; ?></span></span></li>
                        <li style="line-height: 25px;"><span><i class="fa fa-circle-o text-red"></i> <label for="nombre" >Tipo Usuario:</label><span style="margin-left:15px;"><?= $usuario->tipo($usuario->tipoUsuario);   ?></span> </span></li>
                        <li style="line-height: 25px;"><span><i class="fa fa-circle-o text-yellow"></i> <label for="nombre" >Email:</label><span style="margin-left:15px;"><?= $usuario->email; ?></span></span></li>
                      </ul>
                    </div>
                    <!-- /.box-body -->

          </div>


    </div >


    <div class="col-md-6">

        <div class="box box-primary">
              <div class="box-body box-profile">

                 <?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>
               <img src="<?=  $usuario->imagenurl;  ?>"  alt="User Imagen"  class="profile-user-img img-responsive img-circle" id="fotografia_usuario" >

                <h3 class="profile-username text-center"><?= $usuario->nombres." ".$usuario->apellidos; ?></h3>

                <p class="text-muted text-center"><?= $usuario->ocupacion; ?></p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Pais</b> <a class="pull-right"><?= $usuario->delpais->nombre;  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Usuario desde</b> <a class="pull-right"><?= $usuario->created_at;  ?></a>
                  </li>
                 
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>-</b></a>
              </div>
              <!-- /.box-body -->
            </div>

    </div>    <!-- end col mod 6 -->
 </div>    <!-- end col mod 12 -->

 
 <div class="col-md-12">
 
    <div class="col-md-6">

          <div class="box box-primary">

           <div class="box-header with-border">
                <h3 class="box-title"><b>EDUCACIÓN DEL USUARIO</b></h3>

                <div class="box-tools">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
          </div>

                  <div class="box-body box-profile">
                   
                    
                  
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


    <div class="col-md-6">


        <div class="box box-primary">


           <div class="box-header with-border">
                <h3 class="box-title"><b>PUBLICACIONES DEL USUARIO</b></h3>

                <div class="box-tools">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
          </div>

                <div class="box-body box-profile">
                  
                  
                  <div id="notificacion_resul_fapu"></div>
                  <ul class="list-group list-group-unbordered">
                  
                  
                  <?php foreach($tipopublicaciones as $tipo){  ?>
                  <li class="list-group-item">
                  <i class="fa fa-file-pdf-o"></i></i><b>--<?= $tipo->titulo; ?></b> <a class="pull-right"></a>
                  
                  <?php foreach($publicaciones->get() as $archivo){  ?>
                  <?php  if($archivo->idTipopublicacion==$tipo->id){   ?>
                        
                   <br/> <i class="fa fa-circle-o text-yellow"></i> <span class="text-light-blue" >-<?=  $archivo->titulo;  ?></span>
                   <br/> <span><b>autores: </b>-<?=  $archivo->autores;  ?></span>    <span class="tools pull-right" ><a href="javascript:void(0);" onclick="borrarpublicacion(<?= $archivo->id;;  ?> );"  ><i class="fa fa-trash-o"></i></a></span>
                   <br/> <span><b>universidad: </b>-<?=  $archivo->universidad;  ?></span>
                    <br/> <span><b>pais: </b>-<?=  $archivo->pais;  ?></span> <span><b>año: </b>-<?=  $archivo->anio;  ?></span>
                   <br/><a href="<?= $rutaarchivos.$archivo->ruta;  ?>" style="display:block;" target="_blank"><button class="btn btn-block btn-success btn-xs">Descargar</button></a>
                  

                         
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



<div class="col-md-12">

  <div class="col-md-6">

        <div class="box box-primary">
                  
           <div class="box-header with-border">
                <h3 class="box-title"><b>PROYECTOS DEL USUARIO</b></h3>

                <div class="box-tools">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
          </div>


                <div class="box-body box-profile">
                  
                  
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
                   <br/><a href="<?= $rutaarchivos2.$archivo->ruta;  ?>" style="display:block;" target="_blank"><button class="btn  btn-success btn-xs">Ver archivo online</button></a>
                                           
                   
                  </li>

                   <?php } ?>

                   
                  </ul>

                  <a href="javascript:void(0);" class="btn btn-primary btn-block"><b>-</b></a>
                </div><!-- /.box-body -->
        </div>
  </div>
</div>



    

</div> <!-- end row -->


<script>
 function cargarpais(){
$('#pais option:eq(<?= $usuario->pais; ?>)').prop('selected', true);	
}

cargarpais();

</script>
