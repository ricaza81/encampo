<body>

   <div class="box box-primary col-xs-12">
    <div class="col-md-12">
                
                <div class="box-header">
                  <h3 class="box-title">Edit Event</h3>
                </div><!-- /.box-header -->

   <div id="notificacion_resul_fanu"></div>
   <div id="notificacion_resul_fapu"></div>
 

       <?php foreach($events as $event){  ?>

	     <li class="list-group-item">
	     <span class="label label-warning">By: <?= $event->por  ?></span>
	     <br/><span class="label label-warning">Title: <?= $event->title  ?></span>
	     <br/><span class="label label-warning">Lead: <?= $event->nombreprospecto  ?></span>
	     <br/><span>Responsable: <?= $event->asesor->nombres  ?></span>
	     <br/><span>Start date: <?= $event->f_inicio  ?></span>
	     <br/><span>Finish date: <?= $event->f_fin  ?></span>
	     <br/><span>Created at: <?= $event->created_at  ?></span>
	    <?php } ?>
	     </li>

       


 		<div class="box box-success" id="success">
			<div class="box-body padding">
				<div class="form-group"> 
				  <form id="f_editar_evento" method="post" action="editar_evento" class="form-horizontal form_entrada" > 
					  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					  <input type="hidden" class="form-control" id="id_evento" name="id_evento" value="<?=$usuario->id; ?>" >
					  <input type="hidden" name="id_usuario" value="<?= $usuario->idUsuario; ?>">  
					  <input type="hidden" class="form-control" id="id_prospecto" name="id_prospecto" value="<?=$usuario->idProspecto; ?>" >
					  <input type="hidden" class="form-control" id="id_asignacion" name="id_asignacion" value="<?=$usuario->idAsignacion; ?>" >
					  <input type="hidden" class="form-control" id="name" name="nombre" value="<?=$usuario->name; ?>" >
					  <input type="hidden" class="form-control" id="title" name="title" value="<?=$usuario->title; ?>" >
					  <input type="hidden" class="form-control" id="start" name="start" value="<?=$usuario->start; ?>" >
					  <input type="hidden" class="form-control" id="horaini" name="horaini" value="<?=$usuario->hora_inicio; ?>" >
					  <input type="hidden" class="form-control" id="end" name="end" value="<?=$usuario->end; ?>" >
					  <input type="hidden" class="form-control" id="horafin" name="horafin" value="<?=$usuario->hora_final; ?>" >
			  
	      <label for="status">Status</label>
	  		<select id="status" name="status" class="form-control">
	  			<option value="0">N/A</option>
	    		<option value="1">Open</option>
	    		<option value="2">In process</option>
	    		<option value="3">Finished</option>
	   	    </select>          
 
   		  <label for="description">Notes</label>
   		  <textarea class="form-control" rows="3" id="description" name="description"><?= $usuario->description;?></textarea>
	
	
	        <div class="box-footer col-xs-12">
       			<button type="submit" class="btn btn-default btn-primary">Update Event</button>
  <button class="btn  btn-danger btn-primary" id="delete"href="javascript:void(0);" onclick="borrareventmodal(<?= $usuario->id; ?>);" ><i class="fa fa-fw fa-trash"></i>Delete</button>      		
            </div>	    
                  
  </form>
</div>
</div>




<style type='text/css'>
  #success {
    background-color: #BCDAB0;
      }
</style>



<script>
 function cargarstatus(){
//$('#interesado option:eq(<?= $usuario->interesado; ?>)').prop('selected', true);  
$('#status option:eq(<?= $usuario->idStatus; ?>)').prop('selected', true);  
}

cargarstatus();

</script>


