@extends('layouts.app')

@section('htmlheader_title')
  Home
  <?=$usuario->idEmpresa?>
@endsection


@section('main-content')

     <!--<iframe src="https://agronielsen.clicdata.com/v/7Qrwf4sfjUwE?testempresa=<?=$usuario->idEmpresa?>" margin-top="-140px"width="1251" height="1700" border="0"></iframe>-->


<!--<div class="box box-primary col-xs-8"><br/>
                                   <div class="callout callout-info"><h3 class="box-title">Reporte: <?=$usuario->empresa->nombreempresa;?></h3>
                                   Identificador: <?=$usuario->idEmpresa?>
                                   </div>
</div>-->
          <!--<iframe width="1200" height="450" src="https://datastudio.google.com/embed/reporting/0c59c96a-7d93-4f3e-9c05-eeea8e946d39/page/mM3VB" frameborder="0" style="border:0" allowfullscreen></iframe>-->                            

     
          <!--<iframe width="1200" height="1000" src="https://datastudio.google.com/embed/reporting/0c59c96a-7d93-4f3e-9c05-eeea8e946d39/page/mM3VB?nombreempresa='Agronielsen'" frameborder="0" style="border:0" allowfullscreen></iframe>-->
          
          <!--<iframe width="1200" height="1000" src="https://datastudio.google.com/u/0/reporting/0c59c96a-7d93-4f3e-9c05-eeea8e946d39/page/mM3VB?fbclid=IwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc&params=%7B%22df9%22:%22include%25EE%2580%25800%25EE%2580%2580IN%25EE%2580%2580<usuario->empresa->nombreempresa>%22%7D" frameborder="0" style="border:0" allowfullscreen></iframe>-->
          
          <!--https://datastudio.google.com/embed/reporting/0c59c96a-7d93-4f3e-9c05-eeea8e946d39/page/mM3VB-->
          
          <!--<iframe class="embedly-embed" src="//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fdatastudio.google.com%2Fembed%2Freporting%2F0c59c96a-7d93-4f3e-9c05-eeea8e946d39%2Fpage%2FmM3VB%3Ffbclid%3DIwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc%26params%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580<?=$usuario->empresa->nombreempresa;?>%2522%257D%26feature%3Doembed&dntp=1&display_name=Google+Data+Studio&url=https%3A%2F%2Fdatastudio.google.com%2Freporting%2F0c59c96a-7d93-4f3e-9c05-eeea8e946d39%2Fpage%2FmM3VB%3Ffbclid%3DIwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc%26params%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580<?=$usuario->empresa->nombreempresa;?>%2522%257D&image=https%3A%2F%2Fdatastudio.google.com%2Freporting%2F0c59c96a-7d93-4f3e-9c05-eeea8e946d39%2Fpage%2FmM3VB%2Fthumbnail%3Fsz%3Dw1200-h900-p-nu%26feature%3Doembed&key=internal&type=text%2Fhtml&schema=google" width="1200" height="1000" scrolling="no" title="Google Data Studio embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>-->
          
          <iframe width="1000" height="1200" src="https://datastudio.google.com/embed/reporting/1f307fb4-0581-4df3-bc8b-d523d3d5ed3d/page/FaZWB" frameborder="0" style="border:0" allowfullscreen></iframe>
          
          <!--<iframe width="1200" height="1000" src="https://datastudio.google.com/u/0/reporting/0c59c96a-7d93-4f3e-9c05-eeea8e946d39/page/mM3VB?fbclid=IwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc&params=%7B%22df9%22:%22include%25EE%2580%25800%25EE%2580%2580IN%25EE%2580%2580Agronielsen%22%7D" frameborder="0" style="border:0" allowfullscreen></iframe>
          
<iframe width="1200" height="1000" src="https://datastudio.google.com/u/0/reporting/0c59c96a-7d93-4f3e-9c05-eeea8e946d39/page/mM3VB?fbclid=IwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc&params=%7B%22df9%22:%22include%25EE%2580%25800%25EE%2580%2580IN%25EE%2580%2580Agronielsen%22%7D" frameborder="0" style="border:0" allowfullscreen></iframe>-->

@endsection

@section('scripts')
<!--  <script>
    $(document).ready(function(){
      $("#mostrarmodal").modal("show");
    });
</script>-->






  <style>
  .dark{
      border:0px;
      background:#fff;
  }
  
  iframe {
    border-width: 0px;
    border-style: inset;
    border-color: initial;
    border-image: initial;
}

.content {
    min-height: 250px;
    padding: 15px;
    margin-right: auto;
    margin-left: 0;
    padding-left: 0px;
    padding-right: 15px;
    margin-top: -66px;
}

.content-header {
    margin-top: -42px;
}


#toolbar .toolbar-logo {
    display: inline-block;
    padding: 2px;
    width: 100%;
    height: 0;
    float: left;
    overflow: hidden;
     margin-top: -420px;
}



.dark{
    background: #fff;
    color: rgb(255, 255, 255);
    top: 0px;
    width: 1000px;
}
  
  #positionContainer {border:4px solid #fff;}
  </style>

  @stop
  
