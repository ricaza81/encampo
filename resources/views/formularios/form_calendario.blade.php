@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')

    <div class="box box-primary col-xs-12">
                
                <div class="box-header">
                  <h3 class="box-title">Add New Event</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>
  

<div class="box-body col-xs-12">
    

  <form id="f_nuevo_evento_prospecto" method="post" action="{{url('/agregar_nuevo_evento_prospecto')}}">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
       
                        <div class="box-body col-xs-3">
                          <label for="prospecto">Select Lead</label>
                             <select name="prospecto" class="prospecto" id="prospecto" >
                               <option>Select </option>
                               <?php foreach($paises as $pais){   ?>
                                  <option value="<?= $pais->id; ?>" > <?= strtoupper($pais->nombres." ".$pais->apellidos); ?>
                                  </option>
                               <?php }  ?>
                             </select>
                        </div>               


                       
<div class="box-body col-xs-3">
                      <label for="institucion">Event Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="nombre" >
</div>
<div class="box-body col-xs-3">
                      <label for="institucion">Event Title</label>
                      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="título" >
</div>

<div class="box-body col-xs-3">
                      <label for="institucion">Event Description</label>
                      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripción del evento" >
</div>
                       <div id="datepicker" class="box-body col-xs-3">
                         <label for="fechainicio">Start date</label>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                             <input type="text" class="form-control datepicker" id="fechainicio" name="fechainicio"> 
                              <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                              </div>
                            </div>
                       </div>

<div id="timepicker" class="box-body col-xs-3">
  <div class="input-group bootstrap-timepicker timepicker">
  <label for="horaini">Start hour</label>
    <div class="input-group time" data-provide="timepicker" data-time-format="HH:mm:ss">
       <input type="text" class="form-control timepicker" id="horaini" name="horaini">
         <div class="input-group-addon">
            <span class="fa fa-clock-o"></span>
         </div>
     </div>
</div>
</div>

                       <div id="datepicker" class="box-body col-xs-3">
                         <label for="fechafinalizacion">Finish date</label>
                            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                             <input type="text" class="form-control datepicker" id="fechafin" name="fechafin"> 
                              <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                              </div>
                            </div>
                        </div>    
                       
<div id="timepicker"class="box-body col-xs-3">
  <div class="input-group bootstrap-timepicker timepicker">
  <label for="horafin">Finish hour</label>
    <div class="input-group time" data-provide="timepicker" data-time-format="HH:mm:ss">
       <input type="text" class="form-control timepicker" id="horafin" name="horafin">
         <div class="input-group-addon">
            <span class="fa fa-clock-o"></span>
         </div>
     </div>
</div>
</div>
                       <div class="box-footer col-xs-12">
                  <button type="submit" class="btn btn-default btn-primary">Save</button>
                  </div>

                  
</form>
</div>
    
 
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <div>  <h4><span class="label label-info col-md-3">Title: </span></h4>    </div>
              <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="notificacion_resul_fapu"></div>
            <div class="modal-body">
            <div><h4><span class="label label-info col-md-4">Details: </span></h4> </div>
            <div id="modalBody" class="modal-body"></div>
            <div><h4><span class="label label-info col-md-4">Lead: </span></h4> </div>
            <div id="modalProspecto" class="modal-body"></div>



            
           

            <div><h4><span class="label label-info col-md-4">Start date: </span></h4> </div>
            <div id="modalfinicio" class="modal-body"></div>
            <div><h4><span class="label label-info col-md-4">Finish date: </span></h4> </div>
            <div id="modalffin" class="modal-body"></div>
            <div><h4><span class="label label-info col-md-4">Created at: </span></h4> </div>
            <div id="modalcreated" class="modal-body"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               
            <!--    <button type="submit" id="DELETE" class="btn btn-default"><i class="fa fa-trash-o"></i>Borrar</a></button> -->
            
            </div>
        </div>
    </div>
</div>
</div>


             <!-- THE CALENDAR -->
             
              <div class="box box-primary col-xs-12"> <br/>
              <div class="box box-primary">
              <div class="box-body no-padding">
              <div class="callout callout-success">
                <h4>To see a event, click on the event.</h4>
             <!--   <h4>To delete a event, click on the event.</h4> -->
              </div>
              <div id="calendar" class="fc fc-ltr fc-unthemed"> Events / Milestones </div>
               
               </div> </div>
              
<style type='text/css'>
  #calendar {
    width: 900px;
    margin: 0 auto;
  }

</style>

@section('scripts')

<script type="text/javascript">
$(document).ready(function() {
  $(".prospecto").select2();
});
</script>

    <script type="text/javascript">
            $('#horaini').timepicker();
            $('#horafin').timepicker();
    </script>


    <script>  
    $(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
       events: '/crm_blade/public/events_prospectos/{$id}',
editable: true,
  droppable: true,
      header: {
        left: 'prev,next today',
        center: 'title',
       // tmpl_path: 'tmpls/',
        right: 'month,agendaWeek,agendaDay'
               },
          
    

        eventClick:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#modalProspecto').html(event.nombreprospecto);
            $('#modalfinicio').html(event.f_inicio);
            $('#modalffin').html(event.f_fin);
            $('#modalcreated').html(event.created_at);
            //$('#eventUrl').attr('href',event.url);
            $('#fullCalModal').modal();
        } ,  

  /*         eventClick: function (event, jsEvent, view) {
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
      }, */




            })
       });
     </script>


<script>  
        $('#DELETE').on('click', function (event, jsEvent, view) {
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
     
            });
      </script>


@stop
@endsection    





<!--     <script>  
        $('#DELETE').on('click', function (event, jsEvent, view) {
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
      }
            });
      </script> -->

  <!--      <script>
 $(document).ready(function() {
 $("#calendar").click(function(event){
 alert("hola");
  }) 

    </script> -->


<!--    <script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
    </script> -->






<!--<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script> -->







