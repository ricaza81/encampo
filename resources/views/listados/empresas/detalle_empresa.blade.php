
@extends('layouts.app')
@section('htmlheader_title')
  Home
@endsection
@section('main-content') 

<body>
<div class="row docs-premium-template">
  <div class="box-body col-xs-12">
     

              

              <h3 class="profile-username text-center"><?=$empresa->nombreempresa;?></h3>

              <p class="text-muted text-center"><?=$empresa->nombreempresa;?></p>

              <ul class="list-group">
                <li class="list-group-item">
                  <b>NIT</b> <a class="pull-right"><?=$empresa->nit;?></a>
                </li>
            
              </ul>

              
            </div>
            
            
            
                         <div class="bg-yellow2">
                 <div class="widget-user-image">
                    <?php  if ($empresa->imglogo==NULL) {   ?>
                          
                                 <a><img class="img-circle" src="https://www.agronielsen.com/encampo/public/imagenes/logo-agronielsen-presentacion.png" style="height: auto; width: auto; max-width: 154px; max-height: 98px;background:#fff;padding:10px"></a>

                    <?php } else {   ?>      
                         
            <a><img class="img-circle" src="<?=$empresa->imglogo?>" alt="<?=$empresa->nombreempresa?>"></a>
             
                        <?php } ?>
             </div>
</body>

    <style>
    .img-circle {
    width: 215px;
    height: auto;
    float: left;
    padding:10px;
                }

    .bg-yellow2 {
    padding: 20px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}

.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #4267b2 !important;
}
</style>

@endsection