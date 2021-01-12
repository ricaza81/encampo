@extends('layouts.app')

@section('htmlheader_title')
	Mapa de todos los prospectos
@stop

@section('main-content')
	<div class="box box-primary col-xs-12">
		<div id="map" style="width: 100%; height: 800px" data-url="{{url('/all-prospects')}}" data-token="{{csrf_token()}}"></div>
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
      zoom: 4,
      center: myLatLng
     });

     markers.push(new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Su ubicación!'
     }));

     data.forEach( function(element, index) {

      if (index == 0) {
       console.log(element);
       return;
      }

      myLatLng.lat = element.lat;
      myLatLng.lng = element.lnt;

      markers.push(new google.maps.Marker({
       position: myLatLng,
       map: map,
       title: 'Hello World!'
      }));

                        google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    }); 
      
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