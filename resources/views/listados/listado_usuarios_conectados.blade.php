<html>
    <body>

    @extends('layouts.app')

    @section('htmlheader_title')
      Home
    @endsection

    @section('main-content')

    <div class="box box-primary">
        <div class="box-body">              
            <table id="lista_usuarios_conectados" class="display responsive no-wrap" cellspacing="0" width="100%">
                 
                <thead>
                    <tr>
                        <th>Usuario</th>                  
                        <th>Empresa</th>                 
                        <th>Fecha Ingreso</th>
                        <th>idlog</th>
                    </tr>
                </thead>

                <?php 
                foreach($logs as $log){  ?>

                    <tr role="row" class="odd"  > 
                        <td width="50"><?= $log->user->nombres . " " . $log->user->apellidos ;?></td>
                        <td width="50"><?= $log->user->empresa->nombreempresa;?></td>
                        <td width="50"><?= $log->fecha->diffForHumans(); ?></td>
                        <td width="50"><?= $log->idAcceso ?></td>
                    </tr>
                <?php } ?>      
                   
            </table>
        </div>
    </div>

    @section('scripts')

    <script>
    $(document).ready(function() {
        $('#lista_usuarios_conectados').DataTable( {
            "order": [[ 3, "desc" ]]
        } );
    } );
    </script>

    @stop
    @endsection

    </body>
</html>