<div class="box box-primary">

<div class="box-header">
 <h4 class="box-title">Buscar Usuarios</h4>
        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="dato_buscado">
                            <span class="input-group-btn">
                              <button class="btn btn-info btn-flat" type="button" onclick="buscarusuario();" >Buscar!</button>
                            </span>
        </div>
        <div  >
        <select  id="select_filtro_pais"  onchange="buscarusuario();" >
         <?php  if(isset($paissel)){ 
             $listadopais=$paissel->nombre; 
             $optsel= '<option value="'.$paissel->id.'">'.$paissel->nombre.' </option>';
        }else{  
            $listadopais="General";
            $optsel="";
         } ?>

         <?=  $optsel;  ?>
        <option value="0">General </option>
        <?php foreach($paises as $pais){   ?>
        <option value="<?= $pais->id; ?>" > <?= $pais->nombre; ?></option>
        <?php }  ?>
        </select>
       
        <span >  Resultados en  listado <b><?= $listadopais; ?></b></span>
   
        
        </div>

        

                 
</div>

<div class="box-body">              
<?php 

if( count($usuarios) >0){
?>

<table id="tabla_pacientes" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
             <th style="width:10px">Id</th>
                <th>Nombres</th>
                <th>email</th>
                <th>pais</th>
                <th>instituccion</th>
                <th>ocupacion</th>
                <th>tiposa</th>
                <th>Fecha Creado</th>
             
              <th>Acción</th>
            </tr>
        </thead>
 
        
       
<tbody>


<?php 

   foreach($usuarios as $usuario){  
?>

 <tr role="row" class="odd">
    <td class="sorting_1"><?= $usuario->id; ?></td>
    <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="mostrarficha(<?= $usuario->id; ?>,<?= $usuario_actual->tipoUsuario; ?>);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $usuario->nombres." ".$usuario->apellidos;  ?></a></td>
    <td><?= $usuario->email;  ?></td>
    <td><?= $usuario->delpais->nombre;  ?></td>
    <td><?= $usuario->institucion;  ?></td>
    <td><?= $usuario->ocupacion;  ?></td>
    <td><span class="label label-primary "><?= $usuario->tipo($usuario->tipoUsuario);   ?></span></td>
    <td><?= $usuario->created_at;  ?></td>
    <td><button class="btn  btn-success btn-xs" onclick="mostrarficha(<?= $usuario->id; ?>,<?= $usuario_actual->tipoUsuario; ?>);" ><i class="fa fa-fw fa-eye"></i>Ver</button></td>
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


<br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div> 

<?php
}

?>
</div>



