@extends('layouts.appaguacate')

@section('htmlheader_title')

  Mapa de todos los prospectos
@stop

@section('main-content')
<body>
    

    
<div class="row docs-premium-template">
  <div class="col-md-6">
    <div class="box box-primary col-xs-6">                
        <div class="box-header">
         
                  <div class="callout callout-info">
                    <h3 class="box-title">Sección para crear una nueva finca</h3>
                    <img src="https://image.flaticon.com/icons/png/512/1038/1038575.png" style="width:20%">
                  </div>
                </div><!-- /.box-header -->

                <div id="notificacion_resul_fanu"></div>
        <form  id="f_nueva_finca_aguacate"  method="post"  action="{{ url('/agregar_nueva_finca_aguacate') }}" class="" >         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                      <div class="col-md-6">                             
                        <div class="form-group">
                                                <label for="nombre">Nombre de la Finca*</label>
                                                <input type="text" class="form-control" id="nombre_finca" name="nombre_finca" placeholder="Nombre de la Finca" required>
                        </div>
                      </div>
                       
                        <div class="col-md-6">  
                        <div class="form-group">
                                              <label for="hectareas">No. Hectareas</label>
                                              <input type="text" class="form-control" id="hectareas" name="hectareas" placeholder="Número Hectaréas" required>
                        </div>
                         </div>
                
                      <div class="col-md-6">  
                        <div class="form-group">
                                <label for="departamento">Departamento</label>
                                              <select name="departamento" class="form-control" id="departamento" required >
                                               <option> Departamento </option>
                                                <?php  for($i=0;$i<=count($departamentos)-1;$i++){  if($departamentos[$i]->id !=$i){ ?>

                                                <option value="<?= $departamentos[$i]->id  ?>" ><?= $departamentos[$i]->departamento ?></option>
                                                <?php   }} ?>
                                                </select>                             
                        </div>
                      </div>
                       <div class="col-md-6">  
                        <div class="form-group">
                                <label for="ciudad">Ciudad</label>
                                              <select name="ciudad" class="form-control" id="ciudad" required >
                                               <option> Ciudad </option>
                                               <option value="">Selecciona:</option>
                                              </select>                     
                        </div>
                      </div>

                        <div class="col-md-6"> 
                        <div class="form-group">
                                              <label for="hectareas">Vereda</label>
                                              <input type="text" class="form-control" id="vereda" name="vereda" placeholder="Vereda" required>
                        </div>
                        </div>
                          <div class="col-md-6"> 
                        <div class="form-group">
                                              <label for="hectareas">ASNM</label>
                                              <input type="text" class="form-control" id="asnm" name="asnm" placeholder="ASNM" required>
                        </div>
                      </div>
                      
                         <div class="col-md-12"> 
                        <div class="form-group">
                                              <label for="hectareas">Total de Árboles</label>
                                              <input type="text" class="form-control" id="cantarboles" name="cantarboles" placeholder="Número total de árboles" required>
                        </div>
                        </div>
                           <div class="col-md-6"> 
                        <div class="form-group">
                                              <label for="hectareas">Registro ICA</label>
                                              <input type="text" class="form-control" id="regica" name="regica" placeholder="Registro ICA" required>
                        </div>
                        </div>
                          <div class="col-md-6"> 
                        <div class="form-group">
                                              <label for="hectareas">Registro Global GAP</label>
                                              <input type="text" class="form-control" id="regglobal" name="regglobal" placeholder="Registro Global" required>
                        </div>
                      </div>
                 
                 <div class="col-md-12">                                         
                 <div class="form-group ">
                      <button type="submit" class="nbtn-two">Crear Finca</button>
                  </div>
                </div>
   </div>
                
                      </div>
         <div class="col-md-6">

                <div class="box box-primary col-xs-6">

                                  <div class="box-header">
                                         <h3 class="box-title"></h3>
                                 </div>


                            <div id="map"style="width:100%;height:80%;"></div>
                            <input type="text" id="coords" name="coords">
                            
          
              </div>
        </form>
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
        mapTypeId: google.maps.MapTypeId.HYBRID,
        center:new google.maps.LatLng(coords.lat,coords.lng),
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

@section('scripts')
<script>
    $(document).ready(function(){
          navigator.geolocation.getCurrentPosition(
          function (position){
            coords =  {
            lng: position.coords.longitude,
            lat: position.coords.latitude,                            }
        document.getElementById("coords").value = '{"lat":'+position.coords.latitude+',"lnt":'+ position.coords.longitude+'}';
                      })
                      });
    </script>






<script>
$(document).ready(function() {
$("#departamento").change(function(event){
$.get("ciudades/"+event.target.value+"",function(response,state) {
$("#ciudad").empty();
$("#ciudad").append("<option value=''>Selecciona un municipio</option>");
for(i=0; i<response.length; i++) {
$("#ciudad").append("<option value='"+response[i].id+"'>"+response[i].ciudad+"</option>");
                                   }
                                                                 });
                               });
                               });
</script>

@endsection


    



