@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')
 
<?php header('Access-Control-Allow-Origin: *'); ?>
   
<div class="row docs-premium-template">
 <div class="col-md-6"> 
<div class="box box-primary col-xs-6">
                    <div class="box-header">
                  <div class="alert alert-danger"  data-toggle="tooltip" data-placement="bottom"  title="Si no has creado el agricultor por favor ve al menu de VISITAS y selecciona VISITA GUIADA.">
                      
                  <h3 class="box-title">Por favor recuerda que en esta sección creas una nueva visita tecnica para un agricultor que ya has creado y el cual tiene al menos una finca creada. </h3><h4><a href="https://docs.google.com/presentation/d/e/2PACX-1vTt3pYzhZl0SAZMpeI6j6_qcyFFR-Uzua7t7PC6gx5wlRS6jkpKQDn-Hj0REaVgCdgXU2x3VOJCsClP/pub?start=true&loop=false&delayms=3000&slide=id.g42b0ec76b7_0_5" target="_blank">+INFO</a></h4>
                </div>


                </div>

<style>
    
    .bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
    background: #dd4b39 !important;
    font-size:18px;
}
</style>
                

            <div id="notificacion_resul_fanu"></div>


 

     <form  id=""  method="post"  action="{{ url('/agregar_nueva_visitatecnica_agricultor') }}" class="" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="id" value="<?=$usuario->id;?>">
           
              <?php if( isset($errors) ){ ?>
              <ul>
                   
                    <?php foreach($errors->all() as $error){ ?>
                            <li style="color:#FA206A;" ><?= $error  ?></li>
                    <?php }  ?>

              </ul>

              <?php }  ?>  
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agricultor">Agricultor</label>
                                                  <select name="agricultor" class="form-control" id="agricultor" name="agricultor" required>
                                                   <option> Selecciona un Agricultor </option>
                                            <?php  for($i=0;$i<=count($prospectos)-1;$i++){  if($prospectos[$i]->id !=$i){ ?>

                                                  <option value="<?= $prospectos[$i]->id  ?>" ><?= $prospectos[$i]->agricultor; ?></option>
                                                  <?php   }} ?>
                                                  </select>                   
                                 </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                                        <label for="nombre_finca">Nombre de la Finca*</label>
                                                        <select name="nombre_finca" class="form-control" id="nombre_finca" name="nombre_finca" required>
                                                         <option> Finca </option>
                                                         <option value="">Selecciona:</option>
                                                        </select>  
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                          <label for="cultivo">Cultivo</label>
                                                        <select name="cultivo" class="form-control" id="cultivo" required >
                                                         
                                                  <?php  for($i=0;$i<=count($cultivos)-1;$i++){  if($cultivos[$i]->id !=$i){ ?>

                                                        <option value="<?= $cultivos[$i]->id  ?>" ><?= $cultivos[$i]->cultivo ?></option>
                                                        <?php   }} ?>
                                                        </select>                   
                                  </div>
                                 </div>
                                 
                                      <input type="hidden" class="form-control" id="zona" name="zona" placeholder="Zona" value="">
                                       <input type="hidden" class="form-control" id="email_jz" name="email_jz" placeholder="Zona" value="">
                                      <input type="hidden" class="form-control" id="id_ciudad" name="id_ciudad" placeholder="id_ciudad" value="">

                              <div class="col-md-6">
                              <div class="form-group">
                                                    <label for="hectareas">No. Hectareas</label>
                                                    <input type="text" class="form-control" id="hectareas" name="hectareas" placeholder="Número Hectaréas" required>
                              </div>
                              </div>
                              
                              <div class="col-md-6">
                              <div class="form-group">
                                                    <label>Objetivo de la Aplicación</label>
                                                    <textarea class="form-control" rows="3" id="objetivo" name="objetivo" placeholder="Objetivo de la Aplicación"></textarea>
                              </div>
                              </div>
                               <div class="col-md-6">
                               <div class="form-group">
                                                  <label for="aplicaciones">Número de Aplicaciones</label>
                                                  <input type="text" class="form-control" id="aplicaciones" name="aplicaciones" placeholder="Número de Aplicaciones" required>
                              </div>
                              </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                                  <label for="frecuencia">Frecuencia</label>
                                                  <input type="text" class="form-control" id="frecuencia" name="frecuencia" placeholder="Frecuencia de Aplicaciones" >
                             </div>
                             </div>
                             
                             <div class="col-md-6">
                             <div class="form-group">
                                          <label for="frecuencia">Fecha próxima visita</label>
                                          <input type="date" class="form-control" id="fecha_proxima_visita" name="fecha_proxima_visita" placeholder="Fecha próxima visita" required>
                             </div>
                             </div>

                                             <div class="col-md-12">
                               
                                         <div class="form-group">
                                          <img src="https://www.agronielsen.com/encampo/public/imagenes/avatar.jpg"  alt=""  style="width:60px;height:60px;" id="" >
                                                <label for="foto1">Foto 1 del cultivo:</label>
                                                <input  id="foto1" name="foto1" type="file">
                                        </div>
                                   </div>

                                  <div class="col-md-12">
                                       <div class="form-group">
                                                  <img src="https://www.agronielsen.com/encampo/public/imagenes/avatar.jpg"  alt=""  style="width:60px;height:60px;" id="" >
                                                        <label for="foto2">Foto 2 del cultivo:</label>
                                                        <input  id="foto2" name="foto2" type="file">
                                       </div>
                                    </div>
           
        



                        <div class="col-md-6">

                             <div class="form-group">
                                        <button type="submit" class="nbtn-two">Crear Visita</button>
                                         </div>
                        </div>
            

                              
                           </div> </div>
      
  


 <div class="col-md-6"> 
<div class="box box-primary col-xs-6">
  <h3 class="box-title">Tu ubicación actual</h3>


                            <div id="map"style="width:100%;height:80%;"></div>
                            <input type="text" id="coords" name="coords">
<!--<div class="container-fluid text-white text-center">
  <p class="bg-dark">Altura: <span id="altitud"> m</span></p>
  <p class="bg-dark">Clima: <span id="weather"></span></p>
  <p class="bg-dark">Temperatura: <span id="tempC"></span> &#8451;</p>
  <p class="bg-dark">Humedad relativa: <span id="humidity"></span> %</p>
  <p class="bg-dark">Presión: <span id="pressure"></span> hPa</p>
  <p class="bg-dark">Viento: <span id="wind"></span> m/s</p>
  <p class="bg-dark">Precipitacion: <span id="rain"></span> mm</p>-->
  <!--<p class="bg-dark">Temperature in Fahrenheit: <span id="tempF"></span> &#8457;</p>-->
  <!--</div>-->

<!-- Scripts -->
<!-- jQuery Library -->

</body>
</html>

                           <style>
.nbtn-two {
    background: #3224af;
    border-radius: 6px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #fff;
    font-weight: 600;
    font-size: 18px;
    padding: 9px 28px;
    border: 1px solid transparent;
    
}
</style>
              </div>
              
     </form>  

  </div>
@endsection



<script>
var marker;          //variable del marcador
var coords = {};
var altitud=0;    //coordenadas obtenidas con la geolocalización
//var map, infoWindow;
//Funcion principal
function initMap(){
    //usamos la API para geolocalizar el usuario
    
    //const elevator = new google.maps.ElevationService();
        navigator.geolocation.getCurrentPosition(
          function (location){
            coords =  {
              lng: location.coords.longitude,
              lat: location.coords.latitude,
            };
            //latitud=results[0].elevation;
              document.getElementById("coords").value = '{"lat":'+location.coords.latitude+',"lnt":'+ location.coords.longitude+'}';
              
            var coords= coords;
            var location= coords;
            //var elevator=  results[0].elevation;
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el
          },
          function(error){console.log(error);});

//document.getElementById("altitud").value ='3';
}





   
  

var coords = coords;
function setMapa (coords)
{   
      //Se crea una nueva instancia del objeto mapa
      var map = new google.maps.Map(document.getElementById('map'),
      {
        zoom: 19,
        //mapTypeId: google.maps.MapTypeId.HYBRID,
        mapTypeId: 'terrain',
        center:new google.maps.LatLng(coords.lat,coords.lng),
            
              });

      var elevator = new google.maps.ElevationService();
        var infowindow = new google.maps.InfoWindow({});
        infowindow.open(map); // Add a listener for the click event. Display the elevation for the LatLng of
        // the click inside the infowindow.

        map.addListener("click", function(event) {
          displayLocationElevation(event.latLng, elevator, infowindow);
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
            color: "#eb3a44",
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
        //document.getElementById("altitud").value = this.getPosition().alt();
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


    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANpX5o1slGAjIRokzuF_tcMj5OZx36dnE&callback=initMap" async defer></script>


@section('scripts')

<script>
   
         //document.getElementById("altitud").value=3;
   
    </script>
<!--<script>
var elevator = new google.maps.ElevationService;
 $(document).ready(function(elevator,results) {
  // Initiate the location request
   
  //document.getElementById("altitud").value = 3;

  if (status === "OK") {
           //$('#altitud').html(results[0].elevation);
           document.getElementById("altitud").value =(results[0].elevation);
         }
    
  });

</script>-->




      
  <script src="https://www.agronielsen.com/encampo/public/js/openweathermap.js"></script>
  <!--<script src="{{url('/js/openweathermap.js')}}"></script>-->


<script>
$(document).ready(function() {
$("#pais").change(function(event){
$.get("departamentos/"+event.target.value+"",function(response,state) {
$("#departamento").empty();
$("#departamento").append("<option value=''>Selecciona un departamento</option>");
for(i=0; i<response.length; i++) {
$("#departamento").append("<option value='"+response[i].id+"'>"+response[i].departamento+"</option>");
                                   }
                                                                 });
                               });
                               });
</script>
<script>  
$(document).ready(function() {
$("#agricultor").change(function(event){
$.get("id_fincas_agri/"+event.target.value+"",function(response,state) {
$("#nombre_finca").empty();
for(i=0; i<response.length; i++) {
$("#nombre_finca").append("<option value='"+response[i].id+"'>"+response[i].finca+"</option>");
                                   }
                                                                  });
                                         });
                                  });
</script>
<script>  
$(document).ready(function() {
$("#agricultor").change(function(event){
$.get("id_ciudad_agri/"+event.target.value+"",function(response,state) {
$("#id_ciudad").empty();
var id_ciudad= response[0].id_ciudad;
$("#id_ciudad").val(id_ciudad);
                                                                  });
                                         });
                                  });
</script>
<script>  
$(document).ready(function() {
$("#departamento").change(function(event){
$.get("datos_departamento/"+event.target.value+"",function(response,state) {
$("#zona").empty();
var nombre_zona= response[0].idZona;
$("#zona").val(nombre_zona);
                                                                  });
                                         });
                                  });
</script>
<script>  
$(document).ready(function() {
$("#departamento").change(function(event){
$.get("email_jz/Z1",function(response,state) {
$("#email_jz").empty();
var nombre_zona= response[0].mail_jz;
$("#email_jz").val(nombre_zona);
                                                                  });
                                         });
                                  });
</script>
@endsection