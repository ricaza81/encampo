<div class="box box-primary">

<div class="box-header">
 <h4 class="box-title">Buscar Prospecto(s)</h4>

                         <form id="buscar_todos_prospectos" class="form-horizontal form_entrada" action="buscarprospecto" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">     
                            <div class="box-body col-xs-12">
                            
                                  <div class="box-body col-xs-8">
                                  <input type="text" class="form-control" id="dato_buscado">
                                  </div>
                            
                                  <div class="box-body col-xs-4">
                              <!--    <button class="btn btn-info btn-flat" onclick="buscarprospecto();" >Buscar!</button> -->
                                  <button class="btn btn-info btn-flat" type="submit" >Buscar!</button>
                                  </div>

                            </div>
                            </form>

        

                 


<div class="box-body">              
<?php 

if( count($usuarios) >0){
?>

<table id="tabla_pacientes" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
                <th style="width:10px">Id</th>
                <th>Nombres</th>                
                <th>Asesor</th>
                <th>Ciudad</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Interesado en:</th>
                <th>Comentarios</th>
                <th>Fecha Creado</th>
                <th>Fecha Actualización</th>
                <th>Acción</th>
            </tr>
        </thead>
 
        
       
<tbody>


<?php 

   foreach($usuarios as $usuario){  
?>

 <tr role="row" class="odd">
    <td class="sorting_1"><?= $usuario->id; ?></td>
    <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="mostrarprospecto(<?= $usuario->id; ?>);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $usuario->nombres." ".$usuario->apellidos;  ?></a></td>
    
    <td><?= $usuario->delasesor->nombres." ".$usuario->delasesor->apellidos;  ?></td>

    <td><?= $usuario->ciudad;  ?></td>
    <td><?= $usuario->email;  ?></td>
    <td><?= $usuario->telefono;  ?></td>
    <td><?= $usuario->interested->nombre ?></td>
    <td><?= $usuario->observaciones;  ?></td>
    <td><?= $usuario->created_at;  ?></td>
    <td><?= $usuario->updated_at;  ?></td>
  <td><button class="btn  btn-success btn-xs" href="javascript:void(0);" onclick="mostrarprospecto(<?= $usuario->id; ?>);" ><i class="fa fa-fw fa-eye"></i>Ver</button></td>
  <td><button class="btn  btn-danger btn-xs" href="javascript:void(0);" onclick="borrarprospecto(<?= $usuario->id; ?>);" ><i class="fa fa-fw fa-trash"></i>Borrar</button></td>
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

<!--<script>
  $(document).ready(function() {
 $("#dato_buscado").click(function(event){
 alert("hola");
//}
})
 </script> -->