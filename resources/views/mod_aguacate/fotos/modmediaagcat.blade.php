

@extends('layouts.appaguacate')

@section('htmlheader_title')
  Home
@endsection
@section('main-content') 


<div class="content" style="height:500px">

            <?php
           if ($msj==!"") { ?>
                     <div ><label style='background-color: #cce5ff !important;
              border: 1px solid #004085;
              padding: 8px;
              margin-bottom: 10px;
              font-family: Arial;
              font-size: 18px;
              width: 100%;
              color: #004085;
              border-radius: 4px 4px 4px 4px;
              padding: 20px 20px 20px 20px;
              font-weight: 300;'><?php  echo $msj; ?>  </label>  </div>
          <?php } ?>
<div class="row docs-premium-template">
    
    <div class="col-md-12" > 
   <div class="box box-info" style="background:#4267b2 !important">
        <div class="box-header with-border" >
             <div class="col-md-3" >
                      <h3 class="box box-info"><td><span class="label label-info" style="font-size:15px"><img class="aligncenter size-full wp-image-2701" src="https://www.agronielsen.com/encampo/public/imagenes/gif-icons/animat-piechart-color.gif" alt="dato de mercado" width="80" height="80">Dato de Mercado</span></td></h3>
                </div>
       
        <div class="col-md-9 text-left" style="color:#fff;margin:auto">
            <div class="row docs-premium-template">  
                
                           <div class="info-box-text" style="color:#fff;text-align: justify;"><br/>Según el censo agrícola las areas<br/>sembradas de <?=$nombrecultivo;?> en <?=$nombredepto;?>
                          
                          <span class="info-box-number">son: <?php echo number_format($areas_totales_sembradas, 0, ',', '.')." ".'(Hectareas)';?>
                          
                          <a class="btn btn-default btn-sm" href="{{asset('censodane')}}" style="border: 0px; box-shadow: none; color: rgb(243, 156, 18); font-weight: 600; background: rgb(255, 255, 255)">Ver Censo
                            </a>
                          
                          </span>
                          
                          </div>
                         
                            
                </div>
            </div>
            </div>
    </div>
    
  
     

       
                              <div class="col-md-9" >    
                            
                             <div class="box box-primary col-xs-6" style="height:450px;overflow-y: scroll;"> 
                                    
                                           <div class="box-header">
                                                  <h4 style="color:#000">Fotos de Visitas Técnicas Cultivo Aguacate</h4>
                                           </div>

                                      
                                                 @foreach($usuariosempresa as $usuariovisita)
                                                     @foreach($usuariovisita->vtaguacate as $visitatecnica) 
                                                       <?php  if($visitatecnica->imagen1==!"" && $visitatecnica->imagen2==!"") { ?>

                                           <div class="box-widget">                  
                                                  <img class="img-responsive pad" src="https://www.agronielsen.com/encampo/storage/<?=$visitatecnica->imagen1?>" alt="Foto VT" >                                            
                                                    <div class="form-group" style="padding-left:15px">
                                                     
                                                       <li>  Finca: <?=$visitatecnica->finca->finca?> </li>
                                                       <li>  Residualidad: <?=$visitatecnica->residualidad?> </li>
                                                       
                                                    
                                                       <li>  Visita realizada por: <?= $visitatecnica->usuario->nombres." ".$visitatecnica->usuario->apellidos; ?> </li>
                                                       <li>  Fecha Visita: <?=$visitatecnica->created_at?> </li>
                                                    </div>
                                                    
                                            </div>
                                            <div class="box-widget">                 
                                                <img class="img-responsive pad" src="https://www.agronielsen.com/encampo/storage/<?=$visitatecnica->imagen2?>" alt="Photo" >                                            
                                                     <div class="form-group" style="padding-left:15px">
                                                     
                                                       <li>  Finca: <?=$visitatecnica->finca->finca?> </li>
                                                       <li>  Residualidad: <?=$visitatecnica->residualidad?> </li>
                                                       
                                                    
                                                       <li>  Visita realizada por: <?= $visitatecnica->usuario->nombres." ".$visitatecnica->usuario->apellidos; ?> </li>
                                                       <li>  Fecha Visita: <?=$visitatecnica->created_at?> </li>
                                                    </div>
                                           </div>
                                     <?php   } ?>
                                     @endforeach
                                     @endforeach
                                    </div>

                                                     <style>


.img-responsive:hover {
    transform: scale(2.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
                                   
                                   
                           
              </div> 
                             
                           
                    <div class="col-md-3">
                          <div class="box box-primary col-xs-3"><br/>
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
                     </div>

</div>





  <style>

  .horizontal {
    height: 50%;
    float: none;
    width: 100%;}

  #iframewrapper {
  width:100%;
  height:100%;
  -webkit-overflow-scrolling: touch;
  background-color: #ffffff;
  box-shadow:0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

  .nav-pills {
      top: 20px;
      position: fixed;
  }

  #iframe.horizontal {
    height: 100%;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
}

#iframe {
    height: 100%;
    width: 100%;
    padding-bottom: 10px;
    padding-top: 1px;
}

.content {
    min-height: 500px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}
 
.box-widget {

    background-color: #eee;
}



</style>
<style>

.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #4267b2 !important;
}

     .callout-info-gris {
    background-color: #eee !important;
    text-decoration: none;
}

.callout a {
    color: #fff;
    text-decoration: none;
}

    .h4, h4 {
    font-size: 23px;
    letter-spacing: -2px;
}

  .nbtn-two {
    background: #3224af;
    width:100%;
    border-radius: 6px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #fff;
    font-weight: 300;
    font-size: 14px;
    padding: 9px 9px;
}
</style>

@endsection


