<div class="box box-primary col-xs-12">
                
                <div class="box-header">
                  <h3 class="box-title">Edit Lead</h3>
                </div><!-- /.box-header -->

   <div id="notificacion_resul_fanu"></div>
   <div id="notificacion_resul_fapu"></div>



<form  id="f_editar_prospecto"  method="post"  action="editar_prospecto" class="form-horizontal form_entrada" >                
  
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="hidden" name="id_usuario" value="<?= $usuario->idUsuario; ?>">
  <input type="hidden" name="id_prospecto" value="<?= $usuario->id; ?>">
           


       <div class="box-body col-xs-12">
    <div class="form-group col-xs-6">
                      <label for="nombre">Names*</label>
                      <input type="text" class="form-control" id="nombres" name="nombres" value="<?= $usuario->nombres; ?>" >
    </div>
    <div class="form-group col-xs-6">
                      <label for="apellido">Last Name</label>
                      <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $usuario->apellidos; ?>" >
    </div>
    <div class="form-group col-xs-4">
                      <label for="ciudad">City</label>
                      <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?= $usuario->ciudad; ?>" >
          </div>
    <div class="form-group col-xs-4">
                      <label for="email">Email*</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?= $usuario->email; ?>" >
          </div>
        
<div class="form-group col-xs-4">
                        <label for="telefono">Phone Number*</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $usuario->telefono; ?>" >
</div>
        

          <div class="form-group col-xs-6">
                      <label for="interesado">Interest:</label>
                      <select  name="interesado" class="form-control" id="interesado" >
<option value="<?= $usuario->interesado;  ?>" ><?= $usuario->tipointeres($usuario->interesado); ?></option>
<label for="ciudad">Interest:</label>
<?php  for($i=1;$i<=count($tipointeres)-1;$i++){  if($tipointeres[$i]->id !=$i){ ?>
 <option value="<?= $tipointeres[$i]->id  ?>" ><?= $tipointeres[$i]->nombre ?></option>
                      <?php   }} ?>

                     </select>          
          </div>
 
          <div class="form-group col-xs-6">
                      <label for="stage">Status:</label>
                      <select  name="stage" class="form-control" id="stage" >
                        <option value="0">N/A</option>
                        <option value="1">Pre-Approval</option>
                        <option value="2">Sketch APP</option>
                        <option value="3">Find a House</option>
                        <option value="4">Under Contract</option>
                        <option value="5">Final Application</option>
                        <option value="6">Disclose</option>
                        <option value="7">Gather all Necessary Doc</option>
                        <option value="8">Submit</option>
                        <option value="9">Approval</option>
                        <option value="10">Submit Conditions</option>
                        <option value="11">Clear to Close </option> 
                     </select>          
          </div>


<div class="box box-primary col-xs-12"> <br/>


  <div class="form-group col-xs-6">
                      <label for="nombre">Secondary Name*</label>
                      <input type="text" class="form-control" id="nombres_secundario" name="nombres_secundario" value="<?= $usuario->nombres_secundario; ?>" >
    </div>
    <div class="form-group col-xs-6">
                      <label for="apellido">Secondary Last Name</label>
                      <input type="text" class="form-control" id="apellidos_secundario" name="apellidos_secundario" value="<?= $usuario->apellidos_secundario; ?>" >
    </div>
    <div class="form-group col-xs-4">
                      <label for="email">Secondary Email*</label>
                      <input type="text" class="form-control" id="email_secundario" name="email_secundario" value="<?= $usuario->email_secundario; ?>" >
          </div>
        
<div class="form-group col-xs-4">
                        <label for="telefono">Secondary Phone*</label>
                        <input type="text" class="form-control" id="phone_secundario" name="phone_secundario" value="<?= $usuario->phone_secundario; ?>" >
</div>

</div>




<div class="form-group col-xs-12">
      <label for="observaciones">Profile</label>
                     
<textarea class="form-control" rows="3" id="observaciones" name="observaciones"><?= $usuario->observaciones;?></textarea>


</div>
         
          <div class="box-footer col-xs-12">
            <button type="submit" class="btn btn-primary">Update</button>
            <button class="btn btn-danger" id="delete"href="javascript:void(0);" onclick="borrarprospecto(<?= $usuario->id; ?>);" ><i class="fa fa-fw fa-trash"></i>Delete</button>
          </div>
</div>

</div>

</form>

</div>