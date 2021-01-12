@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')

<div class="box box-primary">
<div class="box-body">              

                <div class="box-header">
                  <h3 class="box-title">Mi Perfil</h3>
                </div><!-- /.box-header -->

<table id="tabla_pacientes" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
             <th style="width:10px">Id</th>
                <th>Nombres</th>
                <th>email</th>
                <th>pais</th>
                <th>instituccion</th>
                <th>ocupacion</th>
                <th>tipo</th>
                <th>Fecha Creado</th>
             
              <th>Acción</th>
            </tr>
        </thead>
 
        
       
<tbody>




 <tr role="row" class="odd">
    <td class="sorting_1"><?= $usuario->id; ?></td>
    <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="mostrarficha(<?= $usuario->id; ?>);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $usuario->nombres." ".$usuario->apellidos;  ?></a></td>
    <td><?= $usuario->email;  ?></td>
    <td><?= $usuario->delpais->nombre;  ?></td>
    <td><?= $usuario->institucion;  ?></td>
    <td><?= $usuario->ocupacion;  ?></td>
    <td><span class="label label-primary "><?= $usuario->tipo($usuario->tipoUsuario);   ?></span></td>
    <td><?= $usuario->created_at;  ?></td>
    <td><button class="btn  btn-success btn-xs" onclick="mostrarficha(<?= $usuario->id; ?>,<?= $usuario_actual->tipoUsuario; ?>);" ><i class="fa fa-fw fa-eye"></i>Ver</button></td>
</tr>

  

    </table>



</div>

@endsection

