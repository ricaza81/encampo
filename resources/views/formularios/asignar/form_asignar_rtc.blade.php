<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

<link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{url('/css/sistemalaravel.css')}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    
    <!-- Latest compiled and minified JavaScript -->
   
    <!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


     <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     
    <!-- Datepicker Files -->

   
</head>
 



  <div class="margin"  id="botones_control" >
                                  <!--<button type="button" class="btn btn-primary" onclick="mostrarseccion(1);" >Informacion</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(2);" >Educación</button> -->
                                  <button type="button" class="btn btn-primary" onclick="mostrarprospecto(<?= $prospecto->id; ?>);" >Info</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(5);" >Seguimiento</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(8);" >Asignar a RTC</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(6);" >Agenda</button>
                                  <button type="button" class="btn btn-primary" onclick="mostrarseccion(3);" >DOCS</button>
                                  
                                  
                                  <!--<button type="button" class="btn btn-primary" onclick="mostrarseccion(4);" >Proyectos</button> --> 
                                 
                      </div>





<div class="box box-primary col-xs-12">
                
                <div class="box-header">
                  <h3 class="box-title">Asignar lead a RTC</h3>
                </div><!-- /.box-header -->

   <div id="notificacion_resul_fanu"> <?php  echo $msj; ?>  </div>




<div class="box-body col-xs-12">

<form  id="f_asignar_rtc"  method="post"  action="asignar_prospecto" class="formarchivo" >                
  
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  <input type="hidden" name="id_usuario" value="<?= $prospecto->idUsuario; ?>">
  <input type="hidden" name="id_prospecto" value="<?= $prospecto->id; ?>">



                        <div class="form-group col-xs-3">
                          <label for="comercial">Selecciona un RTC</label>
                             <select name="comercial" class="form-control" id="comercial" required >
                               <option value="">Selecciona:</option>
                               <?php foreach($usuarios as $usuario_view){   ?>
                                  <option value="<?= $usuario_view->id; ?>" > <?= $usuario_view->email; ?>
                                  </option>
                               <?php }  ?>
                             </select>

        <div class="checkbox">
<label class="form-group has-feedback">
<input type="checkbox" name="remember" id="enviar_email"> Notificar por Email
</label>
</div>

        <div class="form-group col-xs-12">
        <button class="btn btn-primary" type="submit">Asignar Prospecto</button>
        </div>


                        </div>






<div class="box box-primary col-xs-6">
                
                <div class="box-header">
                  <h3 class="box-title">Este lead se ha asignado al siguiente(s) RTC(s):</h3>
<hr>
<?php 

if( count($compartircon) >0){
?>

<div class="box col-xs-6">

<table id="tabla_pacientes" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
             <th style="width:10px">Id</th>
                <th>Nombres</th>
                <th>Email</th>
                <th>Asignado por:</th>
              
                            
      <!--        <th>Acción</th> -->
            </tr>
        </thead>
 
        
       
<tbody>



               

<?php 

   foreach($compartircon as $share){  
?>

 <tr role="row" class="odd">
    <td class="sorting_1"><?= $share->idProspecto; ?></td>
    <td class="sorting_1"><?= $share->compartidocon->nombres." ".$share->compartidocon->apellidos; ?></td>
    <td class="sorting_1"><?= $share->compartidocon->email; ?></td>
    <td class="sorting_1"><?= $share->asignadopor->nombres." ".$share->asignadopor->apellidos; ?></td>
  <!--   <td><button class="btn btn-success btn-xs" onclick="mostrar();" ><i class="fa fa-fw fa-eye"></i>Dejar de Compartir</button></td> -->
 
</tr>

<?php        
}
?>


  

    </table>

    <?php
}

?>
</div>
 </div><!-- /.box-header -->



