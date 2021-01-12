@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')

<?php
if ($msj==!"") { ?>
<div ><label style='background-color: #E9FCFA;
border: 1px dashed #006600;
padding: 8px;
margin-bottom: 10px; font-family: Arial; font-size:12px; width:100%'><?php  echo $msj; ?>  </label>  </div>
<?php } ?>
<div class="box box-primary">



<div class="box-body">              
<?php 

if( count($usuarios) >0){
?>

<table id="tabla_usuarios" class="display responsive no-wrap" cellspacing="0" width="100%">
       
        <thead>
            <tr>
             <th style="width:10px">Id</th>
                <th>Nombres</th>
                <th>Email</th>
                <th>País</th>
                <th>Zona</th>
                <th>Cargo</th>
                <th>Tipo Usuario</th>
                <th>Creado</th>
             
              <th>Ver</th>
            </tr>
        </thead>
 
        
       
<tbody>


<?php 

   foreach($usuarios as $usuario_view){  
?>

 <tr role="row" class="odd">
    <td class="sorting_1"><?= $usuario_view->id; ?></td>
    <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="mostrarficha(<?= $usuario_view->id; ?>,<?= $usuario_actual->tipoUsuario; ?>);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $usuario_view->nombres." ".$usuario_view->apellidos;  ?></a></td>
    <td><?= $usuario_view->email;  ?></td>
    <td><?= $usuario_view->delpais->nombre;  ?></td>
    <td><?= $usuario_view->zona->zona;  ?></td>
    <td><?= $usuario_view->ocupacion;  ?></td>
    <td><span class="label label-primary "><?= $usuario_view->tipo($usuario_view->tipoUsuario);   ?></span></td>
    <td><?= $usuario_view->created_at;  ?></td>
    <td><button class="btn  btn-success btn-xs" onclick="mostrarficha(<?= $usuario_view->id; ?>,<?= $usuario_actual->tipoUsuario; ?>);" ><i class="fa fa-fw fa-eye"></i>Ver</button></td>
</tr>

<?php        
}
?>


  

    </table>








<?php
}

?>
</div>

@section('scripts')

<script>
$(document).ready(function() {
    $('#tabla_usuarios').DataTable( {
        "order": [[ 7, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
                                   } );
         responsive: {
        details: true
    } 
                          } );
</script>
@stop





     
@endsection

