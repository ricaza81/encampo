@extends('layouts.appaguacate')

@section('htmlheader_title')

  Detalle de la finca
@stop

@section('main-content')


<div class="row docs-premium-template">
     <div class="col-md-4">
       <div class="box box-primary col-xs-12">
                      <div class="box-header">
                         <h3 class="box-title">Detalle de Arboles</h3>
                      </div>




                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            ARBOLES POR EDADES
                        </h4>
                        
                      <div id="notificacion_resul_fanu"></div>

                    <form  id="form1_nuevo_fincas_arboles"  method="post"  action="agregar_nuevo_arboles_finca_aguacate" class="form-horizontal form_entrada" >
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                              <input type="hidden" name="idfinca" value="<?=$finca->id?>">
                            <?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>
                            

                               
                           <div class="form-group">
                                                        <label for="dosis"># Arboles</label>
                                                        <input type="text" class="form-control" id="numarboles" name="numarboles" placeholder="Número de Arboles" required>
                            </div>
            
                            <div class="form-group">
                                                        <label for="dosis">Edad</label>
                                                        <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad (años)" required>
                            </div>
                                  
                              <div class="form-group">
                                                  <label>Observaciones</label>
                                                  <textarea class="form-control" rows="3" name="observaciones" placeholder="Comentarios adicionales"></textarea>
                          </div>
            
                                    <div class="box-footer col-xs-12 ">
                                        <button  type="submit" class="btn btn-primary">Agregar Registro</button>
                                   </div>
                    </form>
                  </div>
</div>
</div>
</div>

 <div class="col-md-8">     

 <div class="box box-primary col-xs-8">
                    <div class="box-header">
                  <div class="callout callout-success"  data-toggle="tooltip" data-placement="bottom"  title="Información General de la Finca">                  <div class="col-md-4">
              <br/>
              
                 <button type="button" class="btn btn-block btn-primary btn-flat" onclick="window.location.href='/encampo/public/form_editar_finca_aguacate/{{$id}}'">Actualizar</button> <br/> <br/>
            </div>   
                      
                 <ul>
                  <li>Nombre de la finca: <?=$finca->finca?></li>
                  <li>Registro ICA: <?=$finca->regica?></li>
                  <li>Registro GLOBAL GAP: <?=$finca->regglobal?></li>
                  <li>Total de Arboles: <?=$finca->cantarboles?></li>
                </ul>

                </div>

                </div> 

 </div>                   


                            </div>
                        

 <div class="col-md-8">
       <div class="box box-primary col-xs-12">

<table id="lista_arboles" class="display responsive no-wrap" cellspacing="0" width="20%">
       
        <thead>
            <tr>
                <th style="width:10px">Cant. Arboles</th>                 
                <th>Edad</th>
                <th>Observaciones</th>
                <th style="width:30%">Fecha creación</th>
            </tr>
        </thead>
<?php 

 foreach($arboles as $arbol){  ?>

 <tr role="row" class="odd">
    <td><?=$arbol->numarboles;?></td>
    <td><?=$arbol->edad?></td>
    <td><?=$arbol->observaciones?></td>
     <td><?=$arbol->created_at?></td>
</tr>

  <?php } ?>    
       
</table>
<br/>
            </div>
            </div>
            </div>


<div class="row docs-premium-template">
     <div class="col-md-4">
       <div class="box box-primary col-xs-12">
                      <div class="box-header">
                         <h3 class="box-title">CLIENTES</h3>
                      </div>




                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            DETALLE DE CLIENTES
                        </h4>
                        
                      <div id="notificacion_resul_fanu_cliente"></div>

                    <form  id="form1_nuevo_fincas_clientes"  method=""  action="" class="form-horizontal form_entrada" >
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                              <input type="hidden" name="idfincacliente" value="<?=$finca->id?>">
                            <?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>
                            

                           <div class="col-md-12">
                           <div class="form-group">
                                                        <label for="dosis">Nombre</label>
                                                        <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Nombre del cliente" required>
                            </div>
                            </div>
            
                            <div class="col-md-5">
                            <div class="form-group">
                                                        <label for="dosis">Teléfono</label>
                                                        <input type="text" class="form-control" id="telefonocliente" name="telefonocliente" placeholder="Teléfono del Cliente" required>
                            </div>
                            </div> 
                            <div class="col-md-6">      
                            <div class="form-group">
                                                        <label for="dosis">Email</label>
                                                        <input type="text" class="form-control" id="emailcliente" name="emailcliente" placeholder="Email del Cliente" required>
                            </div>
                            </div>
                            <div class="col-md-12">  
            
                                    <div class="box-footer col-xs-12 ">
                                        <button  type="submit" class="btn btn-primary">Agregar Cliente</button>
                                   </div>
                           </div> 
                    </form>
                  </div></div>
</div>
</div>

 <div class="col-md-8">
       <div class="box box-primary col-xs-12">

<table id="lista_clientes" class="display responsive no-wrap" cellspacing="0" width="20%">
       
        <thead>
            <tr>
                <th style="width:10px">Cliente</th>                 
                <th>Teléfono</th>
                <th>Email</th>
                <th style="width:30%">Fecha creación</th>
            </tr>
        </thead>
<?php 

 foreach($clientes as $cliente){  ?>

 <tr role="row" class="odd">
    <td><?=$cliente->cliente;?></td>
    <td><?=$cliente->telefono?></td>
    <td><?=$cliente->email?></td>
     <td><?=$cliente->created_at?></td>
</tr>

  <?php } ?>    
       
</table>
<br/>
            </div>
            </div>
            </div>

<div class="row docs-premium-template">
     <div class="col-md-4">
       <div class="box box-primary col-xs-12">
                      <div class="box-header">
                         <h3 class="box-title">CONTACTOS DE LA FINCA</h3>
                      </div>




                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            DETALLE DEL CONTACTO
                        </h4>
                        
                      <div id="notificacion_resul_fanu_contacto"></div>

                    <form  id="form1_nuevo_fincas_contactos"  method=""  action="" class="form-horizontal form_entrada" >
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                              <input type="hidden" name="idfincacontacto" value="<?=$finca->id?>">
                            <?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>
                            

                               
                           <div class="form-group">
                                                        <label for="nombrescontacto">Nombres</label>
                                                        <input type="text" class="form-control" id="nombrescontacto" name="nombrescontacto" placeholder="Nombre(s)" required>
                            </div>
            
                            <div class="form-group">
                                                        <label for="apellidoscontacto">Apellidos</label>
                                                        <input type="text" class="form-control" id="apellidoscontacto" name="apellidoscontacto" placeholder="Apellido(s)" required>
                            </div>
                               <div class="form-group">
                                                        <label for="telcontacto">Teléfono</label>
                                                        <input type="text" class="form-control" id="telcontacto" name="telcontacto" placeholder="Teléfono del Contacto" required>
                            </div>
                       
                            
                            <div class="form-group">
                                                        <label for="emailcontacto">Email</label>
                                                        <input type="text" class="form-control" id="emailcontacto" name="emailcontacto" placeholder="Email del Contacto" required>
                            </div>
                    
                         
            
                                    <div class="box-footer col-xs-12 ">
                                        <button  type="submit" class="btn btn-primary">Agregar Contacto</button>
                                   </div>
                    </form>
                  </div>
</div>
</div>
</div>
<div class="col-md-8">
       <div class="box box-primary col-xs-12">

<table id="lista_contactos" class="display responsive no-wrap" cellspacing="0" width="20%">
       
    <thead>
            <tr>
                <th style="width:10px">Contacto</th>                 
                <th>Teléfono</th>
                <th>Email</th>
                <th style="width:30%">Fecha creación</th>
            </tr>
        </thead>
<?php 

 foreach($contactos as $contacto){  ?>

 <tr role="row" class="odd">
    <td><?=$contacto->nombres;?></td>
    <td><?=$contacto->telefono?></td>
    <td><?=$contacto->email?></td>
     <td><?=$contacto->created_at?></td>
</tr>

  <?php } ?>    
       
</table>
<br/>
            </div>
            </div>
            </div>

</div>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#lista_arboles').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#lista_clientes').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#lista_contactos').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@endsection






