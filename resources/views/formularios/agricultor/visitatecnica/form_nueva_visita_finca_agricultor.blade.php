@extends('layouts.app')

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
                    <h3 class="box-title">Estas listo(a) para iniciar la digitalización:</h3>
                    <i class="ion ion-person-add"></i>
<style>
                    .ion {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: 18px;
    right: 30px;
    z-index: 0;
    font-size: 90px;
    color: rgba(0,0,0,0.15);
}
</style>
                       <div  style="
                                margin: auto;
                                box-shadow: none;
                                color: #76A82B;
                                font-weight: 600;
                                padding:6px;
                                padding-top: 5px;
                                border-radius:6px;
                                border:1px solid #76A82B; 
                                background:#fff;
                                "><h2>Crear Visita Técnica para: </h2><b style="font-size:16px">Agricultor: </b><?=$agricultor->agricultor;?><br/>
                                <b>Finca: </b> <?=$finca->finca;?>                    
                      </div>

                  </div>
                </div><!-- /.box-header -->

<div id="notificacion_resul_fanu"></div>



<form  id=""  method="post"  action="{{ url('/agregar_nueva_visitatecnica_agricultor') }}" class="" enctype="multipart/form-data" >
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="id" value="<?=$id ?>">
      
<?php if( isset($errors) ){ ?>
<ul>
     
      <?php foreach($errors->all() as $error){ ?>
              <li style="color:#FA206A;" ><?= $error  ?></li>
      <?php }  ?>

</ul>

<?php }  ?>



     <input type="hidden" name="email_agricultor" value="<?=$finca->delagricultor->email;?>">
     <input type="hidden" name="agricultor" value="<?=$finca->delagricultor->id?>">
     
     <input type="hidden" name="nombre_finca" value="<?=$finca->id?>">
     <input type="hidden" name="cultivo" value="<?=$finca->cultivo_finca->id;?>">
              

    <div class="row docs-premium-template">

          <div class="col-md-6">
             <div class="form-group">
                                            <label for="hectareas">No. Hectareas Visitadas y con Asesoría Técnica</label>
                                            <input type="text" class="form-control" id="hectareas" name="hectareas" placeholder="Número Hectaréas" >
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
                                          <input type="text" class="form-control" id="aplicaciones" name="aplicaciones" placeholder="Número de Aplicaciones" >
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
                                          <label for="fecha_proxima_visita">Fecha próxima visita</label>
                                          <input type="date" class="form-control" id="fecha_proxima_visita" name="fecha_proxima_visita" placeholder="Fecha próxima visita" >
                                          
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
                                        <button type="submit" class="nbtn-two">Guardar</button>
                                         </div>
                        </div>
         </div>

 </div>
  </div>


<div class="col-md-6">
    <div class="box box-primary col-xs-6">
                                          <div class="box-header">
                                         <h3 class="box-title">Ubicación de la Visita</h3>
                                 </div>


                            <div id="map"style="width:100%;height:80%;"></div>
                            <input type="text" id="coords" name="coords">

                            

    </div>
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
        var markerLabel = 'Visita Técnica';
        marker = new google.maps.Marker({
        map: map,
        draggable: false,
        animation: google.maps.Animation.BOUNCE,
        map: map,
        shape: shape,
        title: 'Aquí estoy!',
         icon: 'https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen-visitas.png',
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