@extends('layouts.appaguacate')

@section('htmlheader_title')

  Detalle de la Visita
@stop

@section('main-content')


<div class="row docs-premium-template">
     <div class="col-md-4">
       <div class="box box-primary col-xs-12">
                      <div class="box-header">
                         <h3 class="box-title">SEMANAS DE PRODUCCIÓN</h3>
                      </div>




                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            Datos de la Visita
                        </h4>
                        
                      <div id="notificacion_resul_fanu_semanapdn"></div>

                    <form  id="form1_visita_nueva_semana_pdn"  method="post"  action="agregar_visita_nueva_semana_pdn" class="form-horizontal form_entrada" >
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                              <input type="hidden" name="idvisita" value="<?=$visita->id?>">
                            <?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>
                            

                               
                    <div class="col-md-12">  
                        <div class="form-group">
                                <label for="sempdn">Semana:</label>
                                              <select name="sempdn" class="form-control" id="sempdn" required >
                                               <option> Selecciona </option>
                                                <?php  for($i=0;$i<=count($semanas)-1;$i++){  if($semanas[$i]->id !=$i){ ?>

                                                <option value="<?= $semanas[$i]->id  ?>" ><?= $semanas[$i]->semana ?></option>
                                                <?php   }} ?>
                                                </select>                             
                        </div>
                      </div>
            
                            <div class="form-group">
                                                        <label for="sempdndesde">Desde</label>
                                                        <input type="date" class="form-control" id="sempdndesde" name="sempdndesde" placeholder="Inicio semana" required>
                            </div>
                             <div class="form-group">
                                                        <label for="sempdnhasta">Hasta</label>
                                                        <input type="date" class="form-control" id="sempdnhasta" name="sempdnhasta" placeholder="Semana hasta" required>
                            </div>
                            
                            <div class="form-group">
                                                        <label for="sempdnvol_pdn">Producción estimada en Kg</label>
                                                        <input type="text" class="form-control" id="sempdnvol_pdn" name="sempdnvol_pdn" placeholder="Kilogramos" required>
                            </div>

                          
                                    <div class="box-footer col-xs-12 ">
                                        <button  type="submit" class="btn btn-primary">Agregar Semana</button>
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
              
                 <button type="button" class="btn btn-block btn-primary btn-flat" onclick="window.location.href='/encampo/public/form_editar_visita_finca_aguacate/{{$id}}'">Actualizar</button> <br/> <br/>
            </div>   
                      
                 <ul>
                  <li>Nombre de la finca: <?=$visita->id_finca?></li>
                  <li>Fecha Visita: <?=$visita->created_at?></li>
                 
                </ul>

                </div>

                </div> 

 </div>                   


                            </div>
                        

 <div class="col-md-8">
       <div class="box box-primary col-xs-12">

<table id="lista_semanas_pdn" class="display responsive no-wrap" cellspacing="0" width="20%">
       
        <thead>
            <tr>
                <th style="width:10px">Semana No.</th>                 
                <th>Desde</th>
                <th>Hasta</th>
                <th style="width:30%">Kg Est.</th>
            </tr>
        </thead>
<?php 

 foreach($semanaspdn as $semanapdn){  ?>

 <tr role="row" class="odd">
    <td><?=$semanapdn->id_semana;?></td>
    <td><?=$semanapdn->desde?></td>
    <td><?=$semanapdn->hasta?></td>
     <td><?=$semanapdn->vol_pdn?></td>
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
                         <h3 class="box-title">FECHAS DE COSECHA</h3>
                      </div>




                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            Estimación de Cosecha
                        </h4>
                        
                      <div id="notificacion_resul_fanu_semanacosecha"></div>

                    <form  id="form1_visita_nueva_semana_cosecha"  method=""  action="" class="form-horizontal form_entrada" >
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                              <input type="hidden" name="idvisitacosecha" value="<?=$visita->id?>">
                            <?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>
                            

                              <div class="col-md-12">  
                        <div class="form-group">
                                <label for="semcosecha">Semana:</label>
                                              <select name="semcosecha" class="form-control" id="semcosecha" required >
                                               <option> Selecciona </option>
                                                <?php  for($i=0;$i<=count($semanas)-1;$i++){  if($semanas[$i]->id !=$i){ ?>

                                                <option value="<?= $semanas[$i]->id  ?>" ><?= $semanas[$i]->semana ?></option>
                                                <?php   }} ?>
                                                </select>                             
                        </div>
                      </div>
                            
                            <div class="form-group">
                                                        <label for="semcosechadesde">Desde</label>
                                                        <input type="date" class="form-control" id="semcosechadesde" name="semcosechadesde" placeholder="Inicio semana" required>
                            </div>
                             <div class="form-group">
                                                        <label for="semcosechahasta">Hasta</label>
                                                        <input type="date" class="form-control" id="semcosechahasta" name="semcosechahasta" placeholder="Semana hasta" required>
                            </div>

                                <div class="form-group">
                                <label for="semcosechatipo">Tipo:</label>
                                              <select name="semcosechatipo" class="form-control" id="semcosechatipo" required >
                                                <option value="1">% Primera</option>
                                                <option value="2">% Segunda</option>
                                                <option value="3">% Tercera</option>
                                              </select>                             
                               </div>
                                  <div class="form-group">
                                                        <label for="semcosecha_kg">% Pdn Cosecha</label>
                                                        <input type="text" class="form-control" id="semcosecha_kg" name="semcosecha_kg" placeholder="Ingresar % Estimado" required>
                            </div>

                            <div class="col-md-12">  
            
                                    <div class="box-footer col-xs-12 ">
                                        <button  type="submit" class="btn btn-primary">Agregar</button>
                                   </div>
                           </div> 
                    </form>
                  </div></div>
</div>
</div>

 <div class="col-md-8">
       <div class="box box-primary col-xs-12">

<table id="lista_semanas_cosecha" class="display responsive no-wrap" cellspacing="0" width="20%">
       
        <thead>
            <tr>
                <th style="width:10px">Semana No.</th>                 
                <th>Desde</th>
                <th>Hasta</th>
                <th>Tipo</th>
                <th style="width:30%">Kg Est.</th>
            </tr>
        </thead>
<?php 

 foreach($semanascosecha as $semanacosecha){  ?>

 <tr role="row" class="odd">
    <td><?=$semanacosecha->id_semana;?></td>
    <td><?=$semanacosecha->desde?></td>
    <td><?=$semanacosecha->hasta?></td>
      <td><?=$semanacosecha->tipo?></td>
     <td><?=$semanacosecha->vol_cosecha_kg?></td>
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
                         <h3 class="box-title">Detalle de Producción de Arboles</h3>
                      </div>




                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            ARBOLES POR EDADES EN ESTA VISITA
                        </h4>
                        
                      <div id="notificacion_resul_fanu_pdn_arboles"></div>

                    <form  id="form1_visita_nuevo_pdn_arboles"  method=""  action="" class="form-horizontal form_entrada" >
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                             <input type="hidden" name="idfinca" value="<?=$visita->id_finca?>">
                              <input type="hidden" name="idvisitaarboles" value="<?=$visita->id?>">
                            <?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>
                            

                               
                           <div class="form-group">
                                                        <label for="arboles"># Arboles</label>
                                                        <input type="text" class="form-control" id="numarboles" name="numarboles" placeholder="Número de Arboles" required>
                            </div>
            
                            <div class="form-group">
                                                        <label for="edad">Edad</label>
                                                        <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad (años)" required>
                            </div>
                                  
                            <div class="form-group">
                                                        <label for="kg_arbol">Kg/Arbol estimados</label>
                                                        <input type="text" class="form-control" id="kg_arbol" name="kg_arbol" placeholder="Kg/Arbol estimados" required>
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
       <div class="box box-primary col-xs-12">

<table id="lista_arboles" class="display responsive no-wrap" cellspacing="0" width="20%">
       
        <thead>
            <tr>
                <th style="width:10px">Cant. Arboles</th>                 
                <th>Edad</th>
                <th>Kg/Arbol</th>
                <th>Kg Proyec.</th>
                <th style="width:30%">Fecha creación</th>
            </tr>
        </thead>
<?php 

 foreach($arbolespdn as $arbol){  ?>

 <tr role="row" class="odd">
    <td><?=$arbol->numarboles;?></td>
    <td><?=$arbol->edad?></td>
    <td><?=$arbol->kg_arbol?></td>
     <td><?=$arbol->kg_total?></td>
     <td><?=$arbol->created_at?></td>
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
    $('#lista_semanas_pdn').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#lista_semanas_cosecha').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#lista_arboles').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@endsection






