@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')

  <?php
 if ($msj==!"") { ?>
           <div ><label style='background-color: #E9FCFA;
border: 1px dashed #006600;
padding: 8px;
margin-bottom: 10px; font-family: Arial; font-size:12px; width:100%'><?php  echo $msj; ?>  </label>  </div>
<?php } ?>

    <div class="box box-primary col-xs-12">
                
                <div class="box-header">
                  <h3 class="box-title">All Events for <b><?=$usuario->nombres. " ".$usuario->apellidos?></b></h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>
  


    

  


             <!-- THE CALENDAR -->
             

              
              <div class="box-body no-padding">
              <div class="callout callout-success">
                <h4>To see a event, click on the event.</h4>
            <!--    <h4>To delete a event, click on the event.</h4> -->
              </div>
              <div id="calendar" class="fc fc-ltr fc-unthemed"> Events / Milestones </div>
               
               </div> </div>
              
<style type='text/css'>
  #calendar {
    width: 900px;
    margin: 0 auto;
  }

</style>

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

@section('scripts')


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







