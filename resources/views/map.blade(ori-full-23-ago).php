@extends('layouts.app')


@section('htmlheader_title')
Home
@stop

@section('main-content')



<div style="padding: 20px 30px; background: rgb(243, 156, 18); z-index: 999999; font-size: 16px; font-weight: 600;"><a href="https://themequarry.com" style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">Mapa de ubicaci&oacute;n de tus Visitas T&eacute;cnicas</a></div>

	<div class="box box-primary col-xs-12">
		<div id="map" style="width: 100%; height: 800px" data-url="{{url('ubicacion_fincas_agri')}}" data-token="{{csrf_token()}}"></div>
	</div>
	


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

           var markers = [];

     var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 7,
      center: myLatLng
     });

    /* markers.push(new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Su ubicacion!'
     }));*/

     data.forEach( function(element) {



      myLatLng.lat = element.lat;
      myLatLng.lng = element.lnt;

      var markerLabel = 'Finca';
      markers.push(new google.maps.Marker({
       position: myLatLng,
       map: map,
       title: 'Ubicación finca',
       animation: google.maps.Animation.BOUNCE,
       icon: 'https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png',
          label: {
          text: markerLabel,
          color: "#fff",
          fontSize: "16px",
          fontWeight: "bold",
          background:"#fff",
          width:"100px"
             },
      }));
      
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
@stop