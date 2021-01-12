<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->

   
</head>
 



  <div class="margin"  id="botones_control" >
            
<?php 
           { include('menus/submenu_admin.php'); }   
            ?>                   
                                  
                     
                                 
                      </div>

<div class="box box-primary col-xs-12">
                
                <div class="box-header">
                  <h3 class="box-title">Editar Lead(Prospecto de venta)</h3>
                </div><!-- /.box-header -->

   <div id="notificacion_resul_fanu"></div>
   <div id="notificacion_resul_fapu"></div>



<form  id="f_editar_prospecto"  method="post"  action="editar_prospecto" class="form-horizontal form_entrada" >                
  
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="hidden" name="id_usuario" value="<?= $usuario->idUsuario; ?>">
  <input type="hidden" name="id_prospecto" value="<?= $usuario->id; ?>">
           


       <div class="box-body col-xs-12">
    <div class="form-group col-xs-3">
                      <label for="nombre">Nombres*</label>
                      <input type="text" class="form-control" id="nombres" name="nombres" value="<?= $usuario->nombres; ?>" >
    </div>
    <div class="form-group col-xs-3">
                      <label for="apellido">Apellidos</label>
                      <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $usuario->apellidos; ?>" >
    </div>

    <div class="form-group col-xs-3">
    <label for="pais">Pais:</label>
    <select  name="pais" class="form-control" id="pais" >
       <option value="<?= $usuario->idPais;  ?>" ><?= $usuario->pais->nombre; ?></option>
         <label for="pais">Pais:</label>
           <?php  for($i=0;$i<=count($paises)-1;$i++){  if($paises[$i]->id !=$i){ ?>
       <option value="<?= $paises[$i]->id  ?>" ><?= $paises[$i]->nombre ?></option>
                      <?php   }} ?>
       </select>          
          </div>

        <div class="form-group col-xs-3">
    <label for="cultivo">Cultivo:</label>
    <select  name="cultivo" class="form-control" id="cultivo" >
       <option value="<?= $usuario->idCultivo;  ?>" ><?= $usuario->cultivo->cultivo; ?></option>
         <label for="pais">Cultivo:</label>
           <?php  for($i=0;$i<=count($cultivos)-1;$i++){  if($cultivos[$i]->id !=$i){ ?>
       <option value="<?= $cultivos[$i]->id  ?>" ><?= $cultivos[$i]->cultivo ?></option>
                      <?php   }} ?>
       </select>          
          </div>

    <div class="form-group col-xs-3">
                      <label for="ciudad"># Hectareas</label>
                      <input type="text" class="form-control" id="hectareas" name="hectareas" value="<?= $usuario->numero_hectareas; ?>" >
          </div>


    <div class="form-group col-xs-3">
                      <label for="ciudad">Zona</label>
                      <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?= $usuario->zona->zona; ?>" >
          </div>



    <div class="form-group col-xs-3">
                      <label for="ciudad">Departamento</label>
                      <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?= $usuario->departamento->departamento; ?>" >
          </div>
    <div class="form-group col-xs-3">
                      <label for="email">Email*</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?= $usuario->email; ?>" >
          </div>
        
<div class="form-group col-xs-3">
                        <label for="telefono">Teléfono de Contacto*</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $usuario->telefono; ?>" >
</div>
        

          <div class="form-group col-xs-6">
                      <label for="interesado">Interesado en:</label>
                      <select  name="interesado" class="form-control" id="interesado" >
<option value="<?= $usuario->interesado;  ?>" ><?= $usuario->tipointeres($usuario->interesado); ?></option>
<label for="ciudad">Interest:</label>
<?php  for($i=1;$i<=count($tipointeres)-1;$i++){  if($tipointeres[$i]->id !=$i){ ?>
 <option value="<?= $tipointeres[$i]->id  ?>" ><?= $tipointeres[$i]->nombre ?></option>
                      <?php   }} ?>

                     </select>          
          </div>
 
          <div class="form-group col-xs-6">
                      <label for="stage">Estatus:</label>
                      <select  name="stage" class="form-control" id="stage" >
                        <option value="<?= $usuario->stage;  ?>" ><?= $usuario->tipostatus($usuario->stage); ?></option>
                   <label for="stage">Estatus:</label>
<?php  for($i=0;$i<=count($status)-1;$i++){  if($status[$i]->id !=$i){ ?>
 <option value="<?= $status[$i]->id  ?>" ><?= $status[$i]->nombre ?></option>
                      <?php   }} ?>
                        
                     </select>          
          </div>


<div class="box box-primary col-xs-12"> <br/>


  <div class="form-group col-xs-6">
                      <label for="nombre">Nombre Contacto Secundario</label>
                      <input type="text" class="form-control" id="nombres_secundario" name="nombres_secundario" value="<?= $usuario->nombres_secundario; ?>" >
    </div>
    <div class="form-group col-xs-6">
                      <label for="apellido">Apellidos Secundario</label>
                      <input type="text" class="form-control" id="apellidos_secundario" name="apellidos_secundario" value="<?= $usuario->apellidos_secundario; ?>" >
    </div>
    <div class="form-group col-xs-4">
                      <label for="email">Email Secundario</label>
                      <input type="text" class="form-control" id="email_secundario" name="email_secundario" value="<?= $usuario->email_secundario; ?>" >
          </div>
        
<div class="form-group col-xs-4">
                        <label for="telefono">Teléfono Secundario</label>
                        <input type="text" class="form-control" id="phone_secundario" name="phone_secundario" value="<?= $usuario->phone_secundario; ?>" >
</div>

</div>




<div class="form-group col-xs-12">
      <label for="observaciones">Perfil / Solicitud del Agricultor</label>
                     
<textarea class="form-control" rows="3" id="observaciones" name="observaciones"><?= $usuario->observaciones;?></textarea>


</div>
         
          <div class="box-footer col-xs-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <button class="btn btn-danger" id="delete"href="javascript:void(0);" onclick="borrarprospecto(<?= $usuario->id; ?>);" ><i class="fa fa-fw fa-trash"></i>Borrar</button>
         
<!--<button type="button" class="btn btn-default" onclick="cerrarse()">Cerrar</button> -->
          </div>
</div>

</div>

</form>

</div>


<script> 
function cerrarse(){ 
//window.open(location, '_self', '');
window.close();
} 
</script> 


<script>
 function cargarstage(){
//$('#interesado option:eq(<?= $usuario->interesado; ?>)').prop('selected', true);  
$('#stage option:eq(<?= $usuario->stage; ?>)').prop('selected', true);  
}

cargarstage();

</script>

</div>




