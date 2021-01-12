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
<!--           
<?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>  -->

<div class="box-body col-xs-12">


     <input type="hidden" name="email_agricultor" value="<?=$finca->delagricultor->email?>">
     <input type="hidden" name="id_agricultor" value="<?=$finca->delagricultor->id?>">
     <input type="hidden" name="id_finca" value="<?=$finca->id?>">
     <input type="hidden" name="id_cultivo" value="<?=$finca->cultivo_finca->id?>">

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
                    
                    <div class="form-group">
                        <label for="imagen1">Foto 1 del cultivo:</label>
                            <input accept="image/*"  type="file" capture/>
                    </div>
                    
                    <div class="form-group">
                        <label for="imagen1">Foto 2 del cultivo:</label>
                            <input accept="image/*"  type="file" capture/>
                    </div>






  
     
    


                    <div class="box-footer col-xs-6 ">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </div>
            
               </div>
                 </form>







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