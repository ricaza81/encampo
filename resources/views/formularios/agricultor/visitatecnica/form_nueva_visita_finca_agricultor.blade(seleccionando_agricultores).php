@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')
 
   
 
<div class="box box-primary col-xs-12">
                
                <div class="box-header">
                  <h3 class="box-title">Nueva Visita Tecnica</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>



<form  id=""  method="post"  action="{{ url('/agregar_nueva_visitatecnica_agricultor') }}" class="" >                
  
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
           
<?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>  

<div class="box-body col-xs-12">

<div class="form-group">
        <label for="agricultor">Agricultor</label>
                      <select name="agricultor" class="form-control" id="agricultor" >
                       <option> Selecciona un Agricultor </option>
                <?php  for($i=0;$i<=count($prospectos)-1;$i++){  if($prospectos[$i]->id !=$i){ ?>

                      <option value="<?= $prospectos[$i]->id  ?>" ><?= $prospectos[$i]->agricultor; ?></option>
                      <?php   }} ?>
                      </select>                   
     </div>


<div class="form-group">
                      <label for="nombre_finca">Nombre de la Finca*</label>
                      <select name="nombre_finca" class="form-control" id="nombre_finca" >
                       <option> Finca </option>
                       <option value="">Selecciona:</option>
                      </select>  
</div>



<div class="form-group">
        <label for="cultivo">Cultivo</label>
                      <select name="cultivo" class="form-control" id="cultivo" >
                       
                <?php  for($i=0;$i<=count($cultivos)-1;$i++){  if($cultivos[$i]->id !=$i){ ?>

                      <option value="<?= $cultivos[$i]->id  ?>" ><?= $cultivos[$i]->cultivo ?></option>
                      <?php   }} ?>
                      </select>                   
     </div>


 
                      
                        <input type="hidden" class="form-control" id="zona" name="zona" placeholder="Zona" value="">
                         <input type="hidden" class="form-control" id="email_jz" name="email_jz" placeholder="Zona" value="">

        <input type="hidden" class="form-control" id="id_ciudad" name="id_ciudad" placeholder="id_ciudad" value="">

    </div>

<!--<div class="form-group col-xs-6" id="datepicker">
      <label for="fechaproximavisita">Fecha próxima visita</label>
                         <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                        <input type="text" class="form-control datepicker" id="fechaproximavisita" name="fechaproximavisita" >
                        
                        <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
</div>-->


                      <div class="form-group">
                                            <label for="hectareas">No. Hectareas</label>
                                            <input type="text" class="form-control" id="hectareas" name="hectareas" placeholder="Número Hectaréas" >
                      </div>

                      <div class="form-group">
                                            <label>Objetivo de la Aplicación</label>
                                            <textarea class="form-control" rows="3" id="objetivo" name="objetivo" placeholder="Objetivo de la Aplicación"></textarea>
                    </div>

                    <div class="form-group">
                                          <label for="aplicaciones">Número de Aplicaciones</label>
                                          <input type="text" class="form-control" id="aplicaciones" name="aplicaciones" placeholder="Número de Aplicaciones" >
                    </div>

                    <div class="form-group">
                                          <label for="frecuencia">Frecuencia</label>
                                          <input type="text" class="form-control" id="frecuencia" name="frecuencia" placeholder="Frecuencia de Aplicaciones" >
                    </div>

                    <div class="box-footer col-xs-6 ">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </div>
              </form>
               </div>
               </div>
               </div>





</div>
</div>




@endsection







@section('scripts')
<script>
$(document).ready(function() {
$("#pais").change(function(event){
$.get("departamentos/"+event.target.value+"",function(response,state) {
$("#departamento").empty();
$("#departamento").append("<option value=''>Selecciona un departamento</option>");
for(i=0; i<response.length; i++) {
$("#departamento").append("<option value='"+response[i].id+"'>"+response[i].departamento+"</option>");
                                   }
                                                                 });
                               });
                               });
</script>

<script>  
$(document).ready(function() {
$("#agricultor").change(function(event){
$.get("id_fincas_agri/"+event.target.value+"",function(response,state) {
$("#nombre_finca").empty();
for(i=0; i<response.length; i++) {
$("#nombre_finca").append("<option value='"+response[i].id+"'>"+response[i].finca+"</option>");
                                   }
                                                                  });
                                         });
                                  });
</script>



<script>  
$(document).ready(function() {
$("#agricultor").change(function(event){
$.get("id_ciudad_agri/"+event.target.value+"",function(response,state) {
$("#id_ciudad").empty();
var id_ciudad= response[0].id_ciudad;
$("#id_ciudad").val(id_ciudad);
                                                                  });
                                         });
                                  });
</script>

<script>  
$(document).ready(function() {
$("#departamento").change(function(event){
$.get("datos_departamento/"+event.target.value+"",function(response,state) {
$("#zona").empty();
var nombre_zona= response[0].idZona;
$("#zona").val(nombre_zona);
                                                                  });
                                         });
                                  });
</script>

<script>  
$(document).ready(function() {
$("#departamento").change(function(event){
$.get("email_jz/Z1",function(response,state) {
$("#email_jz").empty();
var nombre_zona= response[0].mail_jz;
$("#email_jz").val(nombre_zona);
                                                                  });
                                         });
                                  });
</script>
@endsection