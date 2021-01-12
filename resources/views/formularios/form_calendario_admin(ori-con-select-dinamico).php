<html>
<head>
 <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >
    <!-- timepicker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css" />
    <!--fullcalendar-->
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.css" />
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css" />
    <!--<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" /> -->
   
<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

   <!-- timepicker -->
    <script src="plugins/timepicker/bootstrap-timepicker.js"></script>
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!--fullcalendar-->
    <script src="plugins/fullcalendar/fullcalendar.js"></script>
    <script src="plugins/fullcalendar/fullcalendar.min.js"></script>
     <script src="plugins/fullcalendar/moment.min.js"></script>
  

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
</head>


<body>

   <div class="box box-primary col-xs-12">
    <div class="col-md-3">
                
                <div class="box-header">
                  <h3 class="box-title">Añadir Evento</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>
  

<div class="form-group">
    

  <form id="f_nuevo_evento_prospecto_admin" method="post" action="agregar_nuevo_evento_prospecto_admin" class="form-horizontal form_entrada" >
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
       
                        <div class="form-group">
                          <label for="comercial">Selecciona un Comercial</label>
                             <select name="comercial" class="form-control" id="comercial" >
                               <option> </option>
                               <?php foreach($usuarios as $usuario){   ?>
                                  <option value="<?= $usuario->id; ?>" > <?= strtoupper($usuario->nombres." ".$usuario->apellidos); ?>
                                  </option>
                               <?php }  ?>
                             </select>
                        </div>

                         <div class="form-group">
                          <label for="prospecto">Selecciona un Prospecto</label>
                             <select name="prospecto" class="form-control" id="prospecto" >
                        <option>Debe seleccionar un prospecto primero</option>
                        </select>
                        </div>                              


                       
<div class="form-group">
                      <label for="institucion">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="nombre" >
</div>
<div class="form-group">
                      <label for="institucion">Título</label>
                      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="título" >
</div>

<div class="form-group">
                      <label for="institucion">Descripción</label>
                      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripción del evento" >
</div>


<div class="form-group">
                       <div id="datepicker" class="box-body col-xs-6">
                         <label for="fechainicio">Fecha de inicio Evento</label>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                             <input type="text" class="form-control datepicker" id="fechainicio" name="fechainicio"> 
                              <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                              </div>
                            </div>
                       </div>

<div id="timepicker" class="box-body col-xs-5">
  <div class="input-group bootstrap-timepicker timepicker">
  <label for="horaini">Hora de Inicio</label>
    <div class="input-group time" data-provide="timepicker" data-time-format="HH:mm:ss">
       <input type="text" class="form-control timepicker" id="horaini" name="horaini">
      <!--   <div class="input-group-addon">
            <span class="fa fa-clock-o"></span>
         </div> -->
     </div>
</div>
</div>
</div>

<div class="form-group">

                       <div id="datepicker" class="box-body col-xs-6">
                         <label for="fechafinalizacion">Fecha Finalización</label>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                             <input type="text" class="form-control datepicker" id="fechafin" name="fechafin"> 
                              <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                              </div>
                            </div>
                        </div>    
                       
<div id="timepicker"class="box-body col-xs-5">
  <div class="input-group bootstrap-timepicker timepicker">
  <label for="horafin">Hora de Finalización</label>
    <div class="input-group time" data-provide="timepicker" data-time-format="HH:mm:ss">
       <input type="text" class="form-control timepicker" id="horafin" name="horafin">
      <!--   <div class="input-group-addon">
            <span class="fa fa-clock-o"></span>
         </div> -->
     </div>
</div>
</div>
</div>
                       <div class="box-footer col-xs-12">
                  <button type="submit" class="btn btn-default btn-primary">Guardar</button>
                  </div>


                  
</form>
</div>
    
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <div>  <h4><span class="label label-info col-md-3">Título Evento: </span></h4>    </div>
              <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="notificacion_resul_fapu"></div>
            <div class="modal-body">
            <div><h4><span class="label label-info col-md-4">Detalles: </span></h4> </div>
            <div id="modalBody" class="modal-body"></div>
            <div><h4><span class="label label-info col-md-4">Prospecto: </span></h4> </div>
            <div id="modalProspecto" class="modal-body"></div>



            
           

            <div><h4><span class="label label-info col-md-4">Fecha Inicio: </span></h4> </div>
            <div id="modalfinicio" class="modal-body"></div>
            <div><h4><span class="label label-info col-md-4">Fecha Fin: </span></h4> </div>
            <div id="modalffin" class="modal-body"></div>
            <div><h4><span class="label label-info col-md-4">creación: </span></h4> </div>
            <div id="modalcreated" class="modal-body"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               
            <!--    <button type="submit" id="DELETE" class="btn btn-default"><i class="fa fa-trash-o"></i>Borrar</a></button> -->
            
            </div>
        </div>
    </div>
</div> </div>
             <!-- THE CALENDAR -->
              <div class="col-md-8">
              <div class="callout callout-success">
                <h4>Para ver un evento, señalelo con el mouse.</h4>
                <h4>Para eliminar un evento, de clic sobre el evento.</h4>
              </div>
              <div class="box box-primary">
              <div class="box-body no-padding">
              <div id="calendar" class="fc fc-ltr fc-unthemed"> Eventos / Tareas </div>
               </div>
               </div>
</div>          

<style type='text/css'>
  #calendar {
    width: 780px;
    margin: 0 auto;
  }

  #prospecto {
    text-transform:uppercase;
}

/*#f_nuevo_evento_prospecto_admin{
  width:180px;
}*/

  


</style>

    <script type="text/javascript">
            $('#horaini').timepicker();
            $('#horafin').timepicker();
    </script>

    <script>  
    $(document).ready(function() {
/*$("#comercial").click(function(event){
 alert("hola");
});*/
    // page is now ready, initialize the calendar...
  $("#comercial").change(function(event){
  $.get("prospectos/"+event.target.value+"",function(response,state) {
 // $.get("/prospectos/{id}",function(response,state) {  
    $("#prospecto").empty();
  //  $("#calendar").fullCalendar( 'rarenderEvents');
  //  $("#calendar").update();
    for(i=0; i<response.length; i++) {
      $("#prospecto").append("<option value='"+response[i].id+"'>"+response[i].nombres+""+response[i].apellidos+"</option>");
    }
  });
   
 //  $("#calendar").fullCalendar( 'removeEvents' );
  // $("#calendar").update();
 $("#calendar").fullCalendar( 'getEventSources' );
// $("#calendar").fullCalendar( 'removeEvents' );
$("#calendar").fullCalendar( 'updateEvent' );
  
  $("#calendar").fullCalendar( 'rarenderEvents' );
   
   $('#calendar').fullCalendar({
       //events: '/crm/public/events_prospectos/{$id}',
       events: '/crm/public/events_prospectos_admin/'+event.target.value,
      editable: true,
      header: {
        left: 'prev,next today',
        center: 'title',
      //  tmpl_path: 'tmpls/',
        right: 'month,agendaWeek,agendaDay'

               },
 
eventClick: function (event, jsEvent, view) {
        crsfToken = document.getElementsByName("_token")[0].value;
        var con=confirm("Esta seguro que desea eliminar el evento");
        if(con){
            $.ajax({
               url: 'borrar_evento/'+event.id+'',
               data: 'id=' + event.id,
               headers: {
                  "X-CSRF-TOKEN": crsfToken
                },
               type: "POST",
               success: function () {
                    $('#calendar').fullCalendar('removeEvents', event._id);
                    console.log("Evento eliminado");
                }
            });
        }else{
           console.log("Cancelado");
        }
      },
        eventMouseout:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#modalProspecto').html(event.nombreprospecto);
            $('#modalfinicio').html(event.f_inicio);
            $('#modalffin').html(event.f_fin);
            $('#modalcreated').html(event.created_at);
            //$('#eventUrl').attr('href',event.url);
            $('#fullCalModal').modal();
        } ,  



            })

});

//  $("#comercial").change(function(event){
 
       });
//});
     </script>



 <!--   <script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
    </script> -->

<script>
     
</script>



<!--<script>
$("#comercial").change(function(){
    var idclasificacion = $("#comercial option:selected" ).val();
    
    $.ajax({
        url : "/prospectos/{id}",
        type: "POST",
        data : {"comercial":idclasificacion},
        beforeSend:function(){},
        success:function(data, textStatus, jqXHR){
                $("#prospecto").html(data);
            },
        complete:function(){}
    });
   });
</script> -->
  
<!--<script>
  $(document).ready(function(){
    $('#comercial').change(function(){
     $.get("{ url('dropdown')}",
      { option: $(this).val() },
      function(data) {
        $('#prospecto').empty();
        $.each(data, function(key, element) {
          $('#prospecto').append("<option value='" + key + "'>" + element + "</option>");
        });
      });
    });
  });   
</script>-->





<!--<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script> -->



    </section>