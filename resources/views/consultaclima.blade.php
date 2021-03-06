<!DOCTYPE html>
<html>
<head>

    <title>Agronielsen en Campo: Gestor de visitas técnicas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="La primera plataforma de visitas tecnicas que centraliza y automatiza completamente tu gestión" />
    <meta
        name="keywords"
        content="clima, variables meteorologicas,meteorologicas, variables, latitud, longitud, coordenadas, Agronielsen, Agro nielsen, agronielsen en campo, visitas, agrícola, integración, automatización,mercado agrícola,visitas técnicas,gestor de visitas técnicas, fertilizantes foliares, fertilizantes, foliares,abonos"
    />
    <meta property="og:title" content="Agronielsen en Campo: Gestor de visitas técnicas" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://www.agronielsen.com/encampo/public/css/appx/media/banner/posicion-gif.gif" />

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120906226-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "UA-120906226-1");
    </script>

    <link rel="author" href="https://www.agronielsen.com/encampo" />
    <link rel="canonical" href="https://www.agronielsen.com/encampo" />

    <!-- FB Meta tags -->

    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/olympus/app/css/fonts.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/font-awesome/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('css/pe-icon-7-stroke.css')}}" />

    <link rel="stylesheet" href="{{asset('css/appx/dependencies/components-elegant-icons/css/elegant-icons.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/swiper/css/swiper.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/simple-line-icons/css/simple-line-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/wow/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/slick-carousel/css/slick.css')}}" type="text/css}}" />
    <link rel="stylesheet" href="{{asset('css/appx/dependencies/magnific-popup/css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('plugins/iCheck/square/blue.css')}}">
    <link rel="stylesheet" href="{{asset('/css/sistemalaravel.css')}}">

   <!-- <link rel="stylesheet" href="http://www.aplicatics.co/empresas/public/dist/css/AdminLTE.min.css"> -->

    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">

    <link rel="icon" type="image/png" sizes="32x32" href="https://www.agronielsen.com/encampo/public/css/appx/assets/img/favicon/faviconnielsen.png" />

    <!--<link rel="manifest" href="/site.webmanifest">-->
    <link rel="mask-icon" href="https://www.agronielsen.com/encampo/public/css/appx/assets/img/favicon/safari-pinned-tab.svg" color="#454be5" />

    <!-- Dependency Styles -->

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/appx/assets/css/app.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/olympus/app/Bootstrap/dist/css/bootstrap-reboot.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/olympus/app/Bootstrap/dist/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/olympus/app/Bootstrap/dist/css/bootstrap-grid.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/olympus/app/css/main.min.css')}}" />

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700%7CPoppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <!--<link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/css/ionicons.min.css">-->

    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/style.css">
</head>

<body>
    <div class="row full-width" style="padding-top: 39px;">
      <div class="col col-xl-12 m-auto col-lg-12 col-md-12 col-sm-12 col-12" style="margin-right: -16px;">
        <div class="site-logo" style="margin-top: -25px;margin-right: -16px;">
                            <a href="landing" class="main-logo"><img src="https://www.agronielsen.com/encampo/public/css/appx/assets/img/agronielsen.png" alt="Agronielsen en Campo" />
                            </a>
        </div>
        <div class="col col-xl-12 m-auto col-lg-12 col-md-12 col-sm-12 col-12" style="margin-right: -16px;float: left">
              <div id="map_canvas" class="map_canvas" style="height: 850px;margin-right: 0px;overflow: hidden;position: static;">
              </div>         
          <div class="col col-xl-6 m-auto col-lg-6 col-md-6 col-sm-6 col-6 text-right" style="background: #fff;opacity: 0.9">
           <h2 class="presentation-margin text-right" style="letter-spacing:-2px;margin-top:-426px;padding:20px;margin-bottom:-16px">Ingresa las coordenadas: (latitud y longitud)
              </h2>
              <p class="responsive-display-none" style="font-size:18px;letter-spacing:-1px;line-height:18px;color:#000;">
                      Ingresando las variables de Latitud y Longitud de una ubicación, obtendrás los datos climatologicos como Temperatura, Precipitación, Humedad, Presión. Puedes marcar la casilla "consultar mi ubicación" o arrastrar el marcador para una nueva ubicación.
              </p>              
                <div class="ui-block">
                      <div class="ui-block-content" style="padding: 14px 37px 39px 0px;">
                      <form class="" action="{{ url('/newclima') }}" method="post" id="">  
                          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="row">
                                <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                                  <h3 style="margin-top: 8px;margin-bottom: -31px;">Latitud:</h3><br>
                                  <label style="margin-top: 0px;float:right;">(Ej: 3.46)</label>
                                </div>
                                <div class="col col-lg-9 col-md-9 col-sm-12 col-12">
                                <div class="form-group label-floating is-empty">
                                  <label class="control-label"></label>
                                  <input class="form-control" style="padding: 11px 11px 6px 15px;font-size: 20px;color:#fff;border:1px solid #fff;background: #1565C0;" type="text" placeholder="" id="txtLat" name="latitud" required>
                                </div>
                                </div>
                                <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                                  <h3 style="margin-top: 8px;margin-bottom: -31px;letter-spacing: -1px">Longitud:</h3><br>
                                  <label style="margin-top: 0px;float:right;letter-spacing: -1px">(Ej: -75.53)</label>
                                </div>
                                <div class="col col-lg-9 col-md-9 col-sm-12 col-12">
                                <div class="form-group label-floating is-empty">
                                  <label class="control-label"></label>
                                  <input class="form-control" style="padding: 11px 11px 6px 15px;font-size: 20px;color:#fff;border:1px solid #fff;background: #1565C0;" type="text" placeholder="" id="txtLng" name="longitud" required>
                                </div>
                            </div>
                            <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" style="font-size:8px" type="hidden" placeholder="" id="url" name="url">
                            </div>
                          </div>
                         <div class="checkbox checkbox-primary p-t-0">
                                               <input id="checkbox-signup" type="checkbox" name="remember">
                                                <label for="checkbox-signup"> Consultar mi ubicación actual </label>

                                              <div class="col col-xl-6 m-auto col-lg-6 col-md-6 col-sm-6 col-6" style="margin-right: -16px;float: right;">
                                                    <button style="font-size:25px;margin-top:0px;width:272px;padding-left:27px;margin-left: -180px;" class="btn btn-purple btn-lg" type="submit" id="query_1" name="query_1" onclick="ref()">Consultar datos
                                                    </button>
                                              </div style=";margin-bottom: 50px">

                         </div>
                    </form>
                  </div>
                </div>           
          </div>
        </div>
      </div>
    </div>    
<script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/popper.js/popper.min.js"></script>
<script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/swiper/js/swiper.jquery.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/swiperRunner/js/swiperRunner.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/assets/js/TweenMax.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/wavify/jquery.wavify.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/jquery.parallax-scroll/jquery.parallax-scroll.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/countUp.js/countUp.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/jquery.appear/jquery.appear.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/wow/js/wow.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/raindrops/js/raindrops.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/slick-carousel/js/slick.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/css/appx/dependencies/parallax/js/jquery.parallax.min.js"></script>
   <!-- <script src="{{asset('css/olympus/app/js/material.min.js')}}"></script>-->
    <!--<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>-->
    <!--<script src="https://www.agronielsen.com/encampo/public/css/appx/assets/js/SmoothScroll.min.js"></script>-->

    <!-- Site Scripts -->
    <script src="https://www.agronielsen.com/encampo/public/css/appx/assets/js/app.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/plugins/fastclick/fastclick.js"></script>

    <!-- Start of  Zendesk Widget script -->
<!--<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=c5c1215c-ecf8-44af-b71c-210ea7a83f5a"> </script>-->

 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2O6NRzoS7rpQ4ftOgrrzOdPLHUcb1RJk&callback=initMap" async defer></script>
   

    <script type="text/javascript">
      
      var checkbox = document.querySelector("input[name=remember]");
    checkbox.addEventListener( 'change', function() {
    if(this.checked) {
          navigator.geolocation.getCurrentPosition(
                function (position) {
                    coords = {
                        lng: position.coords.longitude,
                        lat: position.coords.latitude,
                    };
                    document.getElementById("txtLat").value = parseFloat(position.coords.latitude).toFixed(4);
                    document.getElementById("txtLng").value = parseFloat(position.coords.longitude).toFixed(4);
                    document.getElementById("txtLat").style.background="#7c5ac2";
                    document.getElementById("txtLng").style.background="#7c5ac2";
                                        var coords = coords;
                      var lat = document.getElementById("txtLat").value;
                      var lon = document.getElementById("txtLng").value;
                      var params1 = {
                            "ds1.lat": lat,
                            "ds1.lon": lon,
                            "ds8.lat": lat,
                            "ds8.lon": lon,
                            "ds6.lat": lat,
                            "ds6.lon": lon,
                            "ds9.lat": lat,
                            "ds9.lon": lon,
                            "ds116.lat": lat,
                            "ds116.lon": lon,
                            "ds117.lat": lat,
                            "ds117.lon": lon,
                            "ds118.lat": lat,
                            "ds118.lon": lon,
                            "ds119.lat": lat,
                            "ds119.lon": lon,
                            "ds121.lat": lat,
                            "ds121.lon": lon,
                            "ds114.lat": lat,
                            "ds114.lon": lon
                                    };
    var params1AsString = JSON.stringify(params1);
    var encodedParams1 = encodeURIComponent(params1AsString);
    var urlencode=(JSON.stringify(encodedParams1));
    //console.log(JSON.stringify(encodedParams1));
    console.log(lat);
    console.log(lon);
    var URL="https://datastudio.google.com/u/0/reporting/afeb864b-96f8-48bc-9b94-42948cd1d35f/page/SP3gB?params=" + urlencode.replace(/\"/g, "")
                    document.getElementById("url").value=URL;
                    document.getElementById("query_1").style.background="#23d975";
                    })
           google.maps.event.addListener(marker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));

           var map = new google.maps.Map(document.getElementById("map_canvas"), {
                // zoom: 13,
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                center: new google.maps.LatLng(coords.lat, coords.lng),
            });

            var infowindow = new google.maps.InfoWindow({});
             marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.BOUNCE,
                map: map,
                //shape: shape,
                title: "Aquí estoy!",
                icon: "https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png",
                label: {
                    text: "Ubicación",
                    color: "#fff",
                    fontSize: "16px",
                    fontWeight: "bold",
                    background: "#fff",
                    width: "100px",
                },

                position: new google.maps.LatLng(coords.lat, coords.lng),
            });
             infowindow.setContent(
                  
                  "latitud " + coords.lat + "<br>" + "longitud " + coords.lng //+"<br>" + "altitud " + coords.lng
                     
                );
                
            });





    } else {
        //document.getElementById("query").reset();
        //document.getElementById("query_1").style.background="#7c5ac2";

      //  document.getElementById("map_canvas").reset();

 google.maps.event.addListener(marker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));
                document.getElementById("txtLat").style.background="#000000";
                document.getElementById("txtLng").style.background="#000000";

              });

  marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.BOUNCE,
                map: map,
                //shape: shape,
                title: "Arrastra este marcador",
                //icon: "https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png",
                label: {
                    text: "Ubicación",
                    color: "#fff",
                    fontSize: "16px",
                    fontWeight: "bold",
                    background: "#fff",
                    width: "100px",
                },

                position: new google.maps.LatLng(coords.lat, coords.lng),
            });

       /*navigator.geolocation.getCurrentPosition(
                function (position) {
                    coords = {
                        lng: position.coords.longitude,
                        lat: position.coords.latitude,
                    };
                    document.getElementById("txtLat").value = parseFloat(position.coords.latitude).toFixed(4);
                    document.getElementById("txtLng").value = parseFloat(position.coords.longitude).toFixed(4);
                    })
           google.maps.event.addListener(marker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));

           var map = new google.maps.Map(document.getElementById("map_canvas"), {
                // zoom: 13,
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                center: new google.maps.LatLng(coords.lat, coords.lng),
            });

            var infowindow = new google.maps.InfoWindow({});
             marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.BOUNCE,
                map: map,
                //shape: shape,
                title: "Aquí estoy!",
                icon: "https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png",
                label: {
                    text: "Ubicación",
                    color: "#fff",
                    fontSize: "16px",
                    fontWeight: "bold",
                    background: "#fff",
                    width: "100px",
                },

                position: new google.maps.LatLng(coords.lat, coords.lng),
            });
             infowindow.setContent(
                  
                  "latitud " + coords.lat + "<br>" + "longitud " + coords.lng //+"<br>" + "altitud " + coords.lng
                     
                );
                //console.log(coords);

                //map.panTo(evt.latLng);*/
          //  });
         //}
       }
//})
});

    </script>


   <script>
       var marker; //variable del marcador
       var map;
        var coords = {};
         var data = {};//coordenadas obtenidas con la geolocalización
        //var map, infowindow;
        //Funcion principal
         function initMap () {
            //usamos la API para geolocalizar el usuario
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    coords = {
                        lng: position.coords.longitude,
                        lat: position.coords.latitude,
                    };
                    setMapa(coords);

                      google.maps.event.addListener(marker, 'dragend', function (evt) {
                $("#txtLat").val(evt.latLng.lat().toFixed(6));
                $("#txtLng").val(evt.latLng.lng().toFixed(6));
                                document.getElementById("txtLat").style.background="#000000";
                document.getElementById("txtLng").style.background="#000000";
                //console.log(coords);

                //map.panTo(evt.latLng);
            });
                    });


          }

          function setMapa(coords) {
            //Se crea una nueva instancia del objeto mapa
            var map = new google.maps.Map(document.getElementById("map_canvas"), {
                // zoom: 13,
                zoom: 3.8,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                center: new google.maps.LatLng(coords.lat, coords.lng),
            });

            var infowindow = new google.maps.InfoWindow({});

                      

            //Creamos el marcador en el mapa con sus propiedades
            //para nuestro obetivo tenemos que poner el atributo draggable en true
            //position pondremos las mismas coordenas que obtuvimos en la geolocalización
            // var markerLabel = 'YO!';
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.BOUNCE,
                map: map,
                //shape: shape,
                title: "Aquí estoy!",
                icon: "https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png",
                label: {
                    text: "Ubicación",
                    color: "#fff",
                    fontSize: "16px",
                    fontWeight: "bold",
                    background: "#fff",
                    width: "100px",
                },

                position: new google.maps.LatLng(coords.lat, coords.lng),
            });
             infowindow.setContent(
                  
                  "latitud " + coords.lat + "<br>" + "longitud " + coords.lng //+"<br>" + "altitud " + coords.lng
                     
                );
      infowindow.open(map,marker);

           
        }
    </script>

<script>
    var latitud;
    var longitud;
    //var status = null;

function ref(){

    var lat = document.getElementById("txtLat").value;
    var lon = document.getElementById("txtLng").value;
    if(
      document.getElementById("txtLat").value != "" &&
      document.getElementById("txtLng").value != ""
      //&& document.getElementById("email").value != ""
       ) {
  
    var params1 = {
                            "ds1.lat": lat,
                            "ds1.lon": lon,
                            "ds8.lat": lat,
                            "ds8.lon": lon,
                            "ds6.lat": lat,
                            "ds6.lon": lon,
                            "ds9.lat": lat,
                            "ds9.lon": lon,
                            "ds116.lat": lat,
                            "ds116.lon": lon,
                            "ds117.lat": lat,
                            "ds117.lon": lon,
                            "ds118.lat": lat,
                            "ds118.lon": lon,
                            "ds119.lat": lat,
                            "ds119.lon": lon,
                            "ds121.lat": lat,
                            "ds121.lon": lon,
                            "ds114.lat": lat,
                            "ds114.lon": lon
                                    };
    var params1AsString = JSON.stringify(params1);
    var encodedParams1 = encodeURIComponent(params1AsString);
    var urlencode=(JSON.stringify(encodedParams1));
    //console.log(JSON.stringify(encodedParams1));
    console.log(lat);
    console.log(lon);
  var URL="https://datastudio.google.com/u/0/reporting/afeb864b-96f8-48bc-9b94-42948cd1d35f/page/SP3gB?params=" + urlencode.replace(/\"/g, "")
  //document.getElementById("enlace3").setAttribute('href',URL);

  console.log(URL);
  document.getElementById("url").value=URL; 
//  window.open(URL)
//  window.location(URL); 
}
}
</script>

<style>
  /*body {
    background: #fff;
    font-family: "Poppins", sans-serif;
    margin: 0;
    overflow-x: hidden;
    color: #99abb4;
    font-weight: 300;
    /*margin-right: -120px;
}*/

.map_canvas
{
  position: unset;
  overflow: visible;
}

.full-width {
    width: 132%;
}

.col-6 {
    flex: 0 0 50%;
    max-width: 65%;
    padding-right: 92px;
}

</style>

</body>
</html>