@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')

     <!--<iframe src="https://agronielsen.clicdata.com/v/7Qrwf4sfjUwE?testempresa=<?=$usuario->idEmpresa?>" margin-top="-140px"width="1251" height="1700" border="0"></iframe>-->
     <iframe width="1100" height="1675" src="https://datastudio.google.com/embed/reporting/07bb65b0-7aff-43ff-994b-908ad186f6d3/page/OtTXB" frameborder="0" style="border:0" allowfullscreen></iframe>

@endsection

@section('scripts')
  <script>
    $(document).ready(function(){
      $("#mostrarmodal").modal("show");
    });
</script>






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
  
