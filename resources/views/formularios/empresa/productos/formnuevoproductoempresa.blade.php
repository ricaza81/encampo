




@extends('layouts.app')


@section('htmlheader_title')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/plugins/iCheck/square/blue.css">

   

     <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">

      <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/style.css">

  Mapa de todos los prospectos
@stop

@section('main-content')
<body>
    

    
<div class="row docs-premium-template">
  <div class="col-md-6">
    <div class="box box-primary col-xs-6">                
        <div class="box-header">  
    
          <div class="callout callout-blue" id="paso1" style="background-color:#4267b2">

                    <h2 class="box-title" style="color:#ffffff"><b>Creación de un nuevo Producto:</b></h2>
                                           <div  style="
                                margin: auto;
                                box-shadow: none;
                                color: #76A82B;
                                font-weight: 600;
                                padding:6px;
                                margin-top: 20px;
                                border-radius:6px;
                                border:1px solid #76A82B;                                
                                background:#fff;
                                ">                       
                      
                        <div class="small-box">
                          <div class="inner">
                            <p style="color:#76A82B;">Tu Número de Productos Creados es:</p>
                            <h3 style="color:#76A82B;"><?=count($productos)?></h3>

                            
                          </div>
            <div class="icon">
              <img src="https://www.flaticon.com/premium-icon/icons/svg/257/257590.svg" class="responsive" style="float:right;width:25%;padding-top:20px">
            </div></div>
</div>
                      
</div>
                  </div>
                </div><!-- /.box-header -->

                <div id="notificacion_resul_fanu"></div>
  <div id="agregapdt">
  <?php  if (count($productos)<=0){   ?>
    
  <?php } ?>

        <form  id=""  method="post"  action="{{url('agregarproductoempresa')}}" class="" >
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="idEmpresa" value="<?=$idEmpresa;?>">
          
                      <!--Validación de datos-->
                <?php if( isset($errors) ){ ?>
                            <ul>     
                                  <?php foreach($errors->all() as $error){ ?>
                                          <li style="color:#FA206A;" ><?= $error  ?></li>
                                  <?php }  ?>
                            </ul>
                <?php }  ?>
            <!--Validación de datos-->

                                 
                  <div class="col-md-12">
                        <div class="form-group">
  
                                                <input type="text" class="form-control" id="marca_producto" name="marca_producto" placeholder="Marca del producto" required>
                        </div>
                  </div>

                  <div class="col-md-12">
                        <div class="form-group">
 
                                <select name="productolinea" class="form-control" id="productolinea" required>
                                              <option>Línea de Producto:</option>
                                               
                                        <?php  for($i=0;$i<=count($productoslineas)-1;$i++){  if($productoslineas[$i]->id !=$i){ ?>

                                              <option value="<?= $productoslineas[$i]->id  ?>" ><?= $productoslineas[$i]->linea ?></option>
                                              <?php   }} ?>
                                              </select>   
                        </div>
                  </div>

                               <div class="col-md-12">
                        <div class="form-group">
  
                                                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio del producto" required>
                        </div>
                  </div>

                  <div class="col-md-12">
                        <div class="form-group">
                            <select name="productotipo" class="form-control" id="productotipo" placeholder="Producto Activo para recomendaciones técnicas?" >
                                <option>Tipo:</option>
                                <?php  for($i=0;$i<=count($productostipo)-1;$i++){  if($productostipo[$i]->id !=$i){ ?>
                                  <option value="<?= $productostipo[$i]->id  ?>" ><?= $productostipo[$i]->tipo ?></option>
                                 <?php   }} ?>
                            </select>                   
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">                        
                          <select name="productoactivo" class="form-control" id="productoactivo" placeholder="Producto Activo para recomendaciones técnicas?" >
                                <option>Estado:</option>
                                <option value="1" >Producto Activo</option>
                                <option value="0" >Desactivar Producto</option>
                          </select>  
                        </div>
                    </div>
                           <div class="col-md-12">
                                <div class="form-group ">
                                                            <button type="submit" class="nbtn-two">Crear Producto</button>
                                        </div>
                                </div>

                          
</form>
      </div></div>

                                 <style>
.nbtn-two {
    background: #3224af;
    border-radius: 6px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #fff;
    font-weight: 600;
    font-size: 20px;
    padding: 9px 28px;
    border: 1px solid transparent;
    
}
</style>




         <div class="col-md-6">

                <div class="box box-primary col-xs-6">

                                  <div class="box-header">
                                         <h3 class="box-title"></h3>
                                 </div>


                            <div id="map"style="width:100%;height:80%;"></div>
                            <input type="hidden" id="coords">

              </div>
              
          </div>   



      </div>

</body>
@endsection


<script>
var marker;          //variable del marcador
var coords = {};    //coordenadas obtenidas con la geolocalización
//var map, infoWindow;
//Funcion principal
initMap = function (){
    //usamos la API para geolocalizar el usuario
        navigator.geolocation.getCurrentPosition(
          function (position){
            coords =  {
              lng: position.coords.longitude,
              lat: position.coords.latitude,
            };
            var coords= coords;
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el
          },
          function(error){console.log(error);});
}




var coords = coords;
function setMapa (coords)
{   
      //Se crea una nueva instancia del objeto mapa
      var map = new google.maps.Map(document.getElementById('map'),
      {
                   zoom: 8,
        center:new google.maps.LatLng(coords.lat,coords.lng),
        mapTypeId: google.maps.MapTypeId.HYBRID,
              });
              
       var goldStar = {
          path: 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
          fillColor: 'yellow',
          fillOpacity: 0.8,
          scale: 0.2,
          strokeColor: 'gold',
          strokeWeight: 14
        };
        
        var markerLabel = {
            text: markerLabel,
            color: "#fff",
            fontSize: "16px",
            fontWeight: "bold"
        };
        
        var shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: 'poly'
        };
        

      //Creamos el marcador en el mapa con sus propiedades
      //para nuestro obetivo tenemos que poner el atributo draggable en true
      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
        var markerLabel = 'Aquí estoy';
        marker = new google.maps.Marker({
        map: map,
        draggable: false,
        animation: google.maps.Animation.BOUNCE,
        map: map,
        shape: shape,
        title: 'Aquí estoy!',
         icon: 'https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png',
       label: {
          text: markerLabel,
          color: "#fff",
          fontSize: "16px",
          fontWeight: "bold",
          background:"#fff",
          width:"100px"
             },
       
        position: new google.maps.LatLng(coords.lat,coords.lng),
        
       
      });
      
    //  google.maps.event.addDomListener(window, 'load', initMap);
      
      //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
      //cuando el usuario a soltado el marcador
   //   marker.addListener('click', toggleBounce);
      
     /*       google.maps.event.addDomListener(window, 'load', function (event)
      {
              document.getElementById("coords").value = this.getPosition().lat()+","+ this.getPosition().lng();
        });*/
        
                 
      
      marker.addListener( 'mouseover', function (event)
      {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
        document.getElementById("coords").value = this.getPosition().lat()+","+ this.getPosition().lng();
      });

}
//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
// Carga de la libreria de google maps 
    </script>
    


    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2O6NRzoS7rpQ4ftOgrrzOdPLHUcb1RJk&callback=initMap" async defer></script>


<!--html<script>
    $(document).ready(function(){
          navigator.geolocation.getCurrentPosition(
          function (position){
            coords =  {
            lng: position.coords.longitude,
            lat: position.coords.latitude,                            }
        document.getElementById("coords").value = '{"lat":'+position.coords.latitude+',"lnt":'+ position.coords.longitude+'}';
                      })
                      });
    </script>-->



@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
  var tour = new Tour({
     backdrop: true,
  steps: [
  {
    element: "#paso1",
    title: "El primer paso",
    content: "es tener al menos 1 producto para recomendar"
  },
    {
    element: "#agregapdt",
    title: "Para iniciar, por favor",
    content: "Ingresa los siguientes datos para crear tu primer producto"
  },
      {
    element: "#map",
    title: "Esta es tu ubicación",
    content: "en este momento"
  }/*
    {
    element: "#news",
    title: "Cada vez que publicas una nueva oferta",
    content: "Se muestra en este bloque"
  },
      {
    element: "#contacto",
    title: "Contacto Directo",
    content: "Podrás ponerte en contacto directo con el agricultor, al presionar este botón"
  },
      {
    element: "#edit_user",
    title: "Cada vez que publicas una nueva oferta",
    content: "Se muestra en este bloque"
   // path: "localhost/directo/public/sidebar"
  }*/

]});

// Initialize the tour
tour.init();

// Start the tour
tour.start();
//tour.restart();
  });
</script>

@stop





    



