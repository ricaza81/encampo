
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
                     <div class="col-md-8">
                                <div class="box box-primary col-xs-8"><br/>
                                   <div class="callout callout-info"><h3 class="box-title">Reporte de tus Agricultores:</h3></div>
                                      <table id="lista_prospectos" class="display responsive" cellspacing="0" width="66%">
                                                          <thead>
                                                              <tr>
                                                                  <th>Agricultor</th>
                                                                  <th>Telefono</th>
                                                                  <th>Email</th>
                                                                  <th>Creado el</th>                
                                                                  <th># Fincas</th>
                                                                  <th># Hectareas</th>
                                                                  <th># Visitas Técnicas</th>
                                                                  <th>Id</th>
                                                              </tr>
                                                          </thead>
                                                              <?php
                                                              $subtotal_numero_hectareas=0;
                                                                foreach($agricultores as $agricultor){ 
                                                              $subtotal_numero_hectareas+=$agricultor->suma_hectareas_fincas($agricultor->id);  ?>
                                                                       <tr role="row" class="odd">
                                                                               <td><?=$agricultor->agricultor; ?></td>
                                                                               <td><a href="tel://+1<?= $agricultor->telefono_cont;?>"   style="display:block"><?= $agricultor->telefono_cont;  ?></td>
                                                                               <td><a href="mailto:<?= $agricultor->email;?>?subject=Contacto"   style="display:block"><h5><span class="" ><?= $agricultor->email;  ?></span></h5></td></td>
                                                                               <td><?=$agricultor->created_at->diffForHumans(); ?></td>
                                                                               <td><?= $agricultor->cuenta_fincas($agricultor->id);?></td>  
                                                                               <td><?= $agricultor->suma_hectareas_fincas($agricultor->id);?></td>
                                                                               <td><?= $agricultor->cant_visitas_fincas($agricultor->id);?></td>
                                                                        <td><?= $agricultor->id;  ?></td>
                                                                      </tr>
                                                            <?php } ?> 
                                      </table>
                                      <br/>
                                </div>
                             </div>
          <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="tipear()" aria-hidden="true">&times;</button>
          <h3 style="color:#fff">Un Nuevo Servicio</h3>
        </div>
        <div class="modal-body" align="center">
          <h4>Administra tus LEADS y conviertelos hasta la venta</h4>
          <br/>
          <center>
            <a href="form_nuevo_lead">
              <img src="{{ url('/imagenes/lead.JPG')}}"  width="399">
            </a>
          </center>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" onclick="tipear()" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>
 
                        <div class="col-md-4">
                          <div class="box box-primary col-xs-4"><br/>
                                        <div class="info-box bg-green">
                                                 <span class="info-box-icon"><i class="glyphicon glyphicon-scale"></i></span>
                                          <div class="info-box-content">
                                                 <span class="info-box-text">Hectareas Agricultores Registrados</span>
                                            <?php
                                              $subtotal_numero_hectareas=0;
                                              foreach($agricultores as $agricultor){ 
                                              $subtotal_numero_hectareas+=$agricultor->suma_hectareas_fincas($agricultor->id);
                                              ?>
                                            <?php } ?>   
                                                <span class="info-box-number"><?php echo number_format($subtotal_numero_hectareas, 0, ',', '.');?></span>
                                                    <div class="progress">
                                                      <div class="progress-bar" style=""></div>
                                                    </div>                  
                                          </div>
                                        </div>
                                          <div class="info-box">
                                                 <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-user"></i></span>
                                            <div class="info-box-content">
                                                 <span class="info-box-text">Número de <br/>Agricultores</span>
                                                 <span class="info-box-number"><?=$cant_agricultores;?></small></span>
                                            </div>
                                          </div>
                                          <div class="info-box">
                                            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-leaf"></i></span>
                                                  <div class="info-box-content">
                                                    <span class="info-box-text">Número de Fincas</span>
                                                    <span class="info-box-number"><?=$cant_fincas;?></span>
                                                  </div>
                                          </div>
                                          <div class="info-box">
                                            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-calendar"></i></span>
                                            <div class="info-box-content">
                                              <span class="info-box-text">Número de <br/> Visitas Técnicas</span>
                                              <span class="info-box-number"><?=$cant_visitas;?></span>            
                                            </div>
                                          </div>

                        </div>
                     </div></div>


@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#lista_prospectos').DataTable( {
        "order": [[ 7, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
                 ]
                                   } );
                          } );
</script>
<!--
 <script>
    $(document).ready(function(){
      $("#mostrarmodal").modal("show");
    });
</script> 
-->
@endsection
