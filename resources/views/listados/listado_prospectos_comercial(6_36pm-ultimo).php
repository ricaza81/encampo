<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>



<div class="box box-primary">

<div class="box-header">
 <h4 class="box-title">Search Lead</h4>
        <div class="input-group input-group-sm">
                            
                            <input type="text" class="form-control" id="dato_buscado" >
                            <span class="input-group-btn">
                              <button class="btn btn-info btn-flat" id="boton" type="submit" onclick="buscarprospecto();" >Search!</button>
                            </span>

        

                 
</div>

<div class="box-body">              


<table id="example" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
                <th style="width:10px">Alias</th>                 
                <th>Crew Member</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Interest:</th>
                <th>Status</th>
                <th>Date Added</th>
                <th>Action</th>
            </tr>
        </thead>
 


  <?php 
 foreach($usuarios as $usuario){  ?>

 <tr role="row" class="odd">
    <?php  if($usuario->apellidos_secundario==""){   ?>      
    <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="mostrarprospecto(<?= $usuario->id; ?>);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $usuario->apellidos." ".$usuario->nombres;  ?></span></td>
                    <?php } ?>
 <?php  if($usuario->apellidos_secundario!=""){   ?>      
     <td><a href="javascript:void(0);" onclick="mostrarprospecto(<?= $usuario->id; ?>);"  style="display:block"><span class="label label-warning" ></i>&nbsp;&nbsp;<?= strtoupper($usuario->apellidos." ".$usuario->apellidos_secundario);  ?></span></td>
                    <?php } ?>
    <td><?= $usuario->delasesor->nombres." ".$usuario->delasesor->apellidos;  ?></td>
    <td><?= $usuario->email;  ?></td>
    <td><?= $usuario->telefono;  ?></td>
    <td><?= $usuario->interested->nombre ?></td>
    <td><span class="label label-warning"><b><?= strtoupper($usuario->status->nombre) ?></span></td>
    <td><?= $usuario->created_at;  ?></td>

  <td><button class="btn  btn-success btn-xs" href="javascript:void(0);" onclick="mostrarprospecto(<?= $usuario->id; ?>);" ><i class="fa fa-fw fa-eye"></i>View</button></td>
  <td><button class="btn  btn-danger btn-xs" id="delete"href="javascript:void(0);" onclick="borrarprospecto(<?= $usuario->id; ?>);" ><i class="fa fa-fw fa-trash"></i>Delete</button></td>
</tr>

<?php } ?>      
       
</table>
</div>

<?php if( count($usuarios)>0){
?>
    <?php echo str_replace('/?', '?', $usuarios->render()) ;
                    }
        else
     { ?>

<br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun prospecto...</label>  </div> 
<?php } ?>
</div>

<script>
$('dato_buscado').keypress(function (e) {
    if (e.which == 13) {
        alert('enter key is pressed');
    }
});
</script>


<script>

$('dato_buscado').keydown(function (event) {
    var keypressed = event.keyCode || event.which;
    if (keypressed == 13) {
        $(this).closest('form').submit();
    }
});

 $("#dato_buscado").blur (function (){

  //var pais=$("#select_filtro_pais").val();
  var dato=$("#dato_buscado").val();
      if(dato == "")
    {  
      var url="listado_todos_prospectos_comercial";
    }
    else
    {
      var url="buscar_prospecto/"+dato+"";
    }
  
  $("#contenido_principal").html($("#cargador_empresa").html());
 $.get(url,function(resul){
    $("#contenido_principal").html(resul);  

  })
    });
 </script>



<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>



<table id = "foo">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Juan</td>
            <td>25</td>
        </tr>
        <tr>
            <td>María</td>
            <td>38</td>
        </tr>
        <tr>
            <td>Elena</td>
            <td>42</td>
        </tr>
    </tbody>
</table>



<script>
$("#foo").dataTable({
    order: [[0, "asc"], [1, "desc"]]
});
</script>





















