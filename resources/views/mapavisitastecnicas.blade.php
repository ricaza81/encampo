@extends('layouts.app')


@section('htmlheader_title')
Home
@stop

@section('main-content')



<div class="col-md-8">

<div class="callout callout-info"><h3 class="box-title">Geoposici&oacute;n Visitas T&eacute;cnicas</h3>

                    <div id="map" style="width: 100%; height: 500px" data-url="ubicacion_visitas" data-token="{{csrf_token()}}">      
                    </div>
</div>

</div>

	
        <div class="col-md-4">
                          <div class="callout callout-info"><h3 class="box-title">Reporte:</h3>
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
                                            <div class="info-box-content" style="color:#000">
                                                 <span class="info-box-text">Número de <br/>Agricultores</span>
                                                 <span class="info-box-number"><?=$cant_agricultores;?></small></span>
                                            </div>
                                          </div>
                                          <div class="info-box">
                                            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-leaf"></i></span>
                                                  <div class="info-box-content" style="color:#000">
                                                    <span class="info-box-text">Número de Fincas</span>
                                                    <span class="info-box-number"><?=$cant_fincas;?></span>
                                                  </div>
                                          </div>
                                          <div class="info-box">
                                            <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-calendar"></i></span>
                                            <div class="info-box-content" style="color:#000">
                                              <span class="info-box-text">Número de <br/> Visitas Técnicas</span>
                                              <span class="info-box-number"><?=$cant_visitas;?></span>            
                                            </div>
                                          </div>
                                        </div>
</div>
            <div class="col-md-4">
                

             
                
             <div class="info-box">
              <a href="{{asset('reportevisitastecnicas')}}"  class="nbtn-two">Ver Informe</a>
            </div>
</div>
                                         

          
            

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


.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #4267b2 !important;
}

</style>

<script type="text/javascript">
function initMap() {
        // Create a map object and specify the DOM element for display.

        window.onload = () => {
         $.ajax({
          url: $('#map').attr('data-url'),
          type: 'POST',
          data:{
           _token: $('#map').attr('data-token')
          },
          success: (data) => {
            var myLatLng = {lat: data[0].lat, lng: data[0].lnt};
         //  var myLatLng = {lat: data[0].lat, lng: data[0].lnt, finca: data[0].finca};

           var markers = [];

     var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 6,
      center: myLatLng,
      mapTypeId: google.maps.MapTypeId.HYBRID
     });
   /*   var WindCollection=[
               {name: 'Place 1', lat: 37.55,  lng:-90 , wind_speed:50, direction:'NW', temperature:'60'},
               {name: 'Place 2', lat: 36.15,  lng:-94 , wind_speed:45, direction:'N', temperature:'62'},
               {name: 'Place 3', lat: 36.12,  lng:-89 , wind_speed:55, direction:'SE', temperature:'59'}
              ]
      ;

    /* markers.push(new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Su ubicacion!'
     }));*/

     data.forEach( function(element) {



      myLatLng.lat = element.lat;
      myLatLng.lng = element.lnt;

      var markerLabel = 'Visita';
      var marker=new google.maps.Marker({
       position: myLatLng,
       map: map,
       title: 'Ubicaci車n finca',
       animation: google.maps.Animation.BOUNCE,
       icon: 'https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen-visitas.png',
          label: {
          text: markerLabel,
          color: "#fff",
          fontSize: "16px",
          fontWeight: "bold",
          background:"#fff",
          width:"100px"
             },
                                         })

      
       google.maps.event.addListener(marker,'click',function() {
      var infowindow = new google.maps.InfoWindow();
      var infolist=jQuery('<ul></ul>');
      for (attribute in element) {
        infolist.append('<li><b>'+attribute+'</b>: '+element[attribute]+'</li>');
      }
      infowindow.setContent('<div class="infowindow" style="color:#000">'+infolist.html()+'</div>');
      infowindow.open(map, marker);
      map.panTo(marker.getPosition());
      });
   // });


                                      });
     
          },
          error: (err) => {
           console.log(data.responseText);
          },
         });
        }



      }

    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2O6NRzoS7rpQ4ftOgrrzOdPLHUcb1RJk&callback=initMap" async defer></script>
@endsection