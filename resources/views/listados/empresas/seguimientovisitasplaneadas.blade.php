
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
              <div class="row"> 
              

                     <div class="col-md-12">
                                <div class="box box-primary col-xs-8"><br/>
                                   <div class="alert alert-danger"><h3 class="box-title"><b><?=$usuario->nombres?></b>, tienes <?=count($visitas);?> visitas pendientes por ejecutar:</h3></div>
                                      <table id="lista_productos" class="display responsive" cellspacing="0" width="66%">
               <thead>
                 <tr>
                  <th>Agricultor</th>
                  <th>Finca</th>
                  <th>Cultivo</th>
                  <th># Ha</th>
                  <th>Fecha de Compromiso</th>
           
                  </tr>
              </thead>
                       <?php
                                                       
                      foreach($visitas as $visita){ ?>
                           <tr role="row" class="odd">
                                         <td><?=$visita->agricultor->agricultor; ?></td>
                                         <td><?=$visita->finca->finca; ?></td>
                                         <td><?=$visita->cultivo->cultivo; ?></td>
                                         <td><?=$visita->finca->hectareas; ?></td>
                                         <td><?=$visita->proxima_visita; ?>
                                         </td>
                  
                                    
                            </tr>
                         
                       <?php } ?> 
                                      
                                      <br/>
                                </div>
                             </div>
                           </table>
<style>
    
    .bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
    background: #dd4b39 !important;
    font-size:18px;
}
</style>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#lista_productos').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
                                   } );
                          } );
</script>
@endsection
