<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/sistemalaravel.css">

<head>
    <meta charset="UTF-8">
    <title>Notificaci&oacute;n de Eventos</title>
   <style>

   .titulo {
    color: #1e80b6;
    padding-top: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
    }

    .body{
     background-color: #fff;    
    }


    .div_contenido{
    color: #1e80b6;
    padding-top: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
    background-color: #ffffff !important;
   }
   
   .bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #00c0ef !important;
}

   </style>

</head> 

<body class="body">
<hr>

<div class="label label-warning">¡Buen d&iacute;a <b><?=$nombres;?> (<?=$email;?>)</b>!</div>
<br>
<div class="label label-warning">A continuaci&oacute;n encontrar&aacute; el detalle de las visitas planeadas.</div>
<br>
<br>

<div align="center" style="background: #4267b2; color:#fff;
    line-height: 6px;
    padding: 20px 20px 20px 20px;border-radius: 8px 8px 8px 8px;width: 90%;margin: auto;"><h2>Informe de Visitas Planeadas:</h2></div>

    <table align="center"
    style="margin-top: 20px;
    padding: 20px 20px 20px 20px;
    border: 2px solid #fff;
    vertical-align: baseline;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
    border-radius: 8px 8px 8px 8px;
    margin-bottom: 20px;"
    width="80%">
    <thead>
        <tr>
             <th align="center" scope="col" style="width:20px;padding:20px 20px 20px 20px;border-bottom:3px solid #fff">Fecha Planeada</th>
            <th align="center" scope="col" style="width:20px;padding:20px 20px 20px 20px;border-bottom:3px solid #fff">Agricultor</th>
            <th align="center" scope="col" style="width:20px;padding:20px 20px 20px 20px;border-bottom:3px solid #fff">Finca</th>
            <th align="center" scope="col" style="width:20px;padding:20px 20px 20px 20px;border-bottom:3px solid #fff"># Ha</th>

        </tr>

        <?php
            foreach ($visitas as $visita){ ?>
            <tr role="row" class="odd"  >

                 <?php  if  ($visita->proxima_visita==$fecha){   ?>

                <td class="label label-info"><b>PROGRAMADA PARA HOY</b></td>

                  <?php } else {   ?>    
                  <td align="center" style="width:20px;padding:20px 20px 20px 20px;border-bottom:1px solid #4CAF50;background-color: #fff;color:#4CAF50;">{{ $visita->proxima_visita }}</td>
                  <?php } ?>


                <td align="center" style="width:20px;padding:20px 20px 20px 20px;border-bottom:1px solid #4CAF50;background-color: #fff;color:#4CAF50;">{{ $visita->agricultor->agricultor }}</td>
                <td align="center" style="width:20px;padding:20px 20px 20px 20px;border-bottom:1px solid #4CAF50;background-color: #fff;color:#4CAF50;">{{ $visita->finca->finca }}</td>
                <td align="center" style="width:20px;padding:20px 20px 20px 20px;border-bottom:1px solid #4CAF50;background-color: #fff;color:#4CAF50;">{{ $visita->hectareas }}</td>

            </tr>
  </thead>       
        <?php
            }
        ?>

    </table>

</div>

<br/>
<hr>
<div class=".div_contenido" ><br/><b>https://www.agronielsen.com/encampo</b></div>
    
</body>
</html>