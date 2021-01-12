             
<?php 
if( count($publicaciones) >0){

   foreach($publicaciones as $archivo){  
?>

<div class="box box-primary">
	<div class="box-header"><i class="fa fa-user text-primary"></i>  <?= $archivo->user->nombres." ".$archivo->user->apellidos ;  ?> <span class="text-light-blue tools pull-right" >-<?=  $archivo->created_at;  ?></span> </div>
	<div class="box-body"> 
                  <i class="fa fa-circle-o text-yellow"></i> <span class="text-light-blue" >-<?=  $archivo->titulo;  ?></span>
                   <br/> <span><b>autores: </b>-<?=  $archivo->autores;  ?></span>    <span class="tools pull-right" ><a href="javascript:void(0);" onclick="borrarpublicacion(<?= $archivo->id;;  ?> );"  ><i class="fa fa-trash-o"></i></a></span> 
                   <br/> <span><b>universidad: </b>-<?=  $archivo->universidad;  ?></span>
                    <br/> <span><b>pais: </b>-<?=  $archivo->pais;  ?></span> <span><b>año: </b>-<?=  $archivo->anio;  ?></span>
                   <br/><a href="<?= $rutaarchivos.$archivo->ruta;  ?>"  target="_blank"><button class="btn  btn-info btn-xs">Ver</button></a>  
                   <a href="descargar_publicacion/<?=  $archivo->id;   ?>"  ><button class="btn  btn-success btn-xs">Descargar</button></a>               
	</div>

</div>

<?php        
}
echo str_replace('/?', '?', $publicaciones->render() )  ;
}
else
{
?>
<br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ninguna publicacion...</label>  </div> 
<?php
}
?>
