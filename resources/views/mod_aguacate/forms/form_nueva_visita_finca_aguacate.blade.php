@extends('layouts.appaguacate')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')
 
   
<div class="row docs-premium-template">
 <div class="col-md-6"> 
<div class="box box-primary col-xs-6">

                

            <div id="notificacion_resul_fanu"></div>


 

     <form  id=""  method="post"  action="{{ url('/agregar_nueva_visitatecnica_finca_aguacate') }}" class="" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="hidden" name="id" value="<?=$usuario->id;?>">
           
              <?php if( isset($errors) ){ ?>
              <ul>
                   
                    <?php foreach($errors->all() as $error){ ?>
                            <li style="color:#FA206A;" ><?= $error  ?></li>
                    <?php }  ?>

              </ul>

              <?php }  ?>  
                             <div class="col-md-12">
                                <div class="form-group">
                                    <label for="agricultor">Finca</label>
                                                  <select name="nombre_finca" class="form-control" id="nombre_finca" name="nombre_finca" required>
                                                   <option> Selecciona una finca </option>
                                            <?php  for($i=0;$i<=count($fincas)-1;$i++){  if($fincas[$i]->id !=$i){ ?>

                                                  <option value="<?= $fincas[$i]->id  ?>" ><?= $fincas[$i]->finca; ?></option>
                                                  <?php   }} ?>
                                                  </select>                   
                                 </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                                        <label for="residualidad">Residualidad*</label>
                                                          <input type="text" class="form-control" id="residualidad" name="residualidad" placeholder="Residualidad" required>
                                  </div>
                                </div>
                              

                              <div class="col-md-6">
                              <div class="form-group">
                                                    <label for="matseca">Materia Seca</label>
                                                    <input type="text" class="form-control" id="matseca" name="matseca" placeholder="Materia Seca" required>
                              </div>
                              </div>
                              
                            
                               <div class="col-md-6">
                               <div class="form-group">
                                                  <label for="porcent_nal">Porcentaje(%) para Nacional</label>
                                                  <input type="text" class="form-control" id="porcent_nal" name="porcent_nal" placeholder="Porcentaje(%) para Nacional" required>
                              </div>
                              </div>
                             <div class="col-md-6">
                              <div class="form-group">
                                                    <label>Razones:</label>
                                                    <textarea class="form-control" rows="3" id="causas_nal" name="causas_nal" placeholder="Causas para el % para Nacional"></textarea>
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
                                          <img src="https://image.flaticon.com/icons/png/512/1038/1038575.png"  alt=""  style="width:60px;height:60px;" id="" >
                                                <label for="foto1">Foto 1 del cultivo:</label>
                                                <input  id="foto1" name="foto1" type="file">
                                        </div>
                                   </div>

                                  <div class="col-md-12">
                                       <div class="form-group">
                                                  <img src="https://image.flaticon.com/icons/png/512/1038/1038575.png"  alt=""  style="width:60px;height:60px;" id="" >
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
                            <input type="hidden" id="coords" name="coords">


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
        zoom: 19,
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
            lat: position.coords.latitude,          									}
        document.getElementById("coords").value = '{"lat":'+position.coords.latitude+',"lnt":'+ position.coords.longitude+'}';
                      })
                      });
    </script>



@endsection