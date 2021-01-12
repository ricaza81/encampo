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
<?php 

if( count($usuarios) >0){
?>

<table id="tabla_pacientes" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
                <th style="width:10px">Alias</th>
                              
                <th>Crew Member</th>
              <!--  <th>Ciudad</th> -->
                <th>Email</th>
                <th>Phone</th>
                <th>Interest:</th>
              <!--  <th>Comentarios</th> -->
                <th>Status</th>
                <th>Date Added</th>
             <!--   <th>Fecha Actualización</th> -->
                <th>Action</th>
            </tr>
        </thead>
 
        
       
<tbody>


<?php 

   foreach($usuarios as $usuario){  
?>

 <tr role="row" class="odd">
    <?php  if($usuario->apellidos_secundario==""){   ?>      
    <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="mostrarprospecto(<?= $usuario->id; ?>);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $usuario->apellidos." ".$usuario->nombres;  ?></a></td>
                    <?php } ?>
 <?php  if($usuario->apellidos_secundario!=""){   ?>      
     <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="mostrarprospecto(<?= $usuario->id; ?>);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= strtoupper($usuario->apellidos." ".$usuario->apellidos_secundario);  ?></a></td>
                    <?php } ?>
  
    
    
    <td><?= $usuario->delasesor->nombres." ".$usuario->delasesor->apellidos;  ?></td>

  <!--  <td><?= $usuario->ciudad;  ?></td> -->
    <td><?= $usuario->email;  ?></td>
    <td><?= $usuario->telefono;  ?></td>
    <td><?= $usuario->interested->nombre ?></td>
    <td><span class="label label-warning"><b><?= strtoupper($usuario->status->nombre) ?></span></td>
  <!--  <td><?= $usuario->observaciones;  ?></td> -->
    <td><?= $usuario->created_at;  ?></td>
 <!--   <td><?= $usuario->updated_at;  ?></td>-->
  <td><button class="btn  btn-success btn-xs" href="javascript:void(0);" onclick="mostrarprospecto(<?= $usuario->id; ?>);" ><i class="fa fa-fw fa-eye"></i>View</button></td>
  <td><button class="btn  btn-danger btn-xs" id="delete"href="javascript:void(0);" onclick="borrarprospecto(<?= $usuario->id; ?>);" ><i class="fa fa-fw fa-trash"></i>Delete</button></td>
</tr>

<?php        
}
?>


  

    </table>



    <?php


echo str_replace('/?', '?', $usuarios->render() )  ;

}
else
{

?>


<br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun prospecto...</label>  </div> 

<?php
}

?>
</div>




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