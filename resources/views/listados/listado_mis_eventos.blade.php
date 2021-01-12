

@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')



<div class="box box-primary">

<!--<?=$fecha?> -->

<div class="box-body">              


<table id="lista_eventos" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
                <th style="width:20px">Title</th>                 
                <th>Asigned by</th>
                <th>Lead</th>
                <th>Start Date</th>
                <th>Finish Date</th>
                <th>Created at</th>
                <th>Status</th>
                <th>Action</th>
                
               
            </tr>
        </thead>
 


  <?php 
 foreach($events as $event){  ?>

 <tr role="row" class="odd">
  
                  
    <td><?= $event->title  ?></td>
    <td><?= $event->asignado->nombres." ".$event->asignado->apellidos  ?></td>
    <td><?= $event->all_prospects->nombres." ".$event->all_prospects->apellidos  ?></td>
    <td><?= $event->start  ?></td>
    <td><?= $event->end  ?></td>
    <td><?= $event->created_at  ?></td>
    <td>

  <?php  if($event->status->nombre_status=="N/A"){   ?>      
                       <span class="badge bg-red" ><?= strtoupper($event->status->nombre_status)  ?></span>
                    <?php } ?>
  <?php  if($event->status->nombre_status=="Open"){   ?>      
                       <span class="badge bg-red"><?= strtoupper($event->status->nombre_status)  ?></span>
                    <?php } ?>
  <?php  if($event->status->nombre_status=="Finished"){   ?>      
                       <span class="badge bg-green"><?= strtoupper($event->status->nombre_status)  ?></span>
                    <?php } ?>

 

    </td>


 


       <td>
<div class="col-md-12">
 <button class="btn  btn-success btn-xs" id="delete"href="javascript:void(0);" onclick="mostrarevento(<?= $event->id; ?>);" ><i class="fa fa-fw fa-eye"></i>View</button>
</div> 
 
       </td>
       
        

 
  
</tr>

<?php } ?>      
       
</table>
</div>



@section('scripts')

<script>
$(document).ready(function() {
    $('#lista_eventos').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop

     
@endsection