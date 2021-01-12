<html>
<head>
    <title>Datepicker</title>
 
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
 
</head>

<div class="box box-primary col-xs-12">
                
                <div class="box-header">
                  <h3 class="box-title">Nuevo Prospecto de Venta</h3>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>
<body><form  id="f_nuevo_prospecto"  method="post"  action="agregar_nuevo_prospecto" class="form-horizontal form_entrada" >                
  
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
           


<div class="box-body col-xs-12">
<div class="form-group col-xs-6">
                      <label for="nombre">Nombres*</label>
                      <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" >
</div>
<div class="form-group col-xs-6">
                      <label for="apellido">Apellidos</label>
                      <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" >
</div>


<div class="form-group col-xs-4">
                      <label for="ciudad">Ciudad</label>
                      <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad" >
</div>

        <div class="form-group col-xs-4">
                        <label for="email">Email*</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email" >
        </div>

<div class="form-group col-xs-4">
                        <label for="telefono">Teléfono*</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="teléfono" >
        </div>        

<div class="form-group col-xs-6">
        <label for="interesado">Interesado en:</label>
                       <select id="interesado" name="interesado" class="form-control">
                          <option value="0">N/A</option>
                        <option value="1">Purchase</option>
                        <option value="2">Perm Life Insurance</option>
                        <option value="3">Term Life Insurance</option>
                        <option value="4">Health Insurance</option>
                        <option value="5">P/C Insurance</option>
                        <option value="6">Credit Counseling</option> 
                     </select>          
          </div>            
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="fechaproximavisita">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            
<div class="form-group col-xs-8">
                        <label>Comentarios Adicionales</label>
                        <textarea class="form-control" rows="3" name="observaciones" placeholder="Observaciones"></textarea>
        
       <!-- <input type="textarea" class="form-control" rows="3" id="observaciones" name="observaciones" placeholder="Observaciones">
        </div>  -->


</div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-default btn-primary">Enviar</button>
                    </form>
 
                </div>
            </div>
        </div>
    </div>


</div>
 
<script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>
</body>
</html>