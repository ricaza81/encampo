
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120906226-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-120906226-1');
    </script>
    <meta name="description" content="La primera plataforma de visitas técnicas que centraliza y automatiza completamente tu gestión">
    <meta name="keywords" content="Agronielsen, Agro nielsen, agronielsen en campo, visitas, agrícola, integración, automatización">
    <link rel="author" href="https://www.agronielsen.com/encampo" />
    <link rel="canonical" href="https://www.agronielsen.com/encampo"/>
    <!-- FB Meta tags -->
    <meta property="og:title" content="Agronielsen en Campo: Gestor de visitas técnicas"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="https://res.cloudinary.com/cegalvarez/image/upload/v1505242035/landingBgmin_jfooxu.png"/>
    <meta property="og:url" content="https://www.agronielsen.com/encampo"/>
    <meta property="og:description" content="La primera plataforma de visitas técnicas que centraliza y automatiza completamente tu gestión"/>
    <title>Agronielsen en Campo: Gestor de visitas técnicas</title>
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/stylegsuite.css" media="screen">
    <link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/_carousel.scss" media="screen">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>


  <body>



      <div class="newAnnouncement">

        <div>
          
          <a href="register">REGISTRARTE</a>
          <a href="login" class="mainLink mobileHide">ENTRAR</a>
        </div>

      </div>

      <!-- header nav -->
      <section class="content cHeight10 mainBg">
        <div id="header" class="topMenu scrolled">
          <div class="leftMenu">
            <div class="nav-btn nav-slider showMobile hide">
              <i class="material-icons">menu</i>
            </div>
            <div class="logo">
              <a href="https://www.agronielsen.com/encampo"><img  class="logoImg" src="https://www.agronielsen.com/encampo/public/imagenes/icono-agronielsen-campo.png" alt="Agronielsen en Campo" /></a>
            </div>
          </div>
          <div class="rightMenu">
            <ul class="rightMenuOptions">
              <li><a class="scrollNavActive mobileHide" href="">Hecho para Empresas</a></li>
              <li><a class="scrollNavBtnActive" href="login">INGRESAR</a></li>
              <li><a class="scrollNavActive mobileHide" href="register">EMPIEZA AHORA</a></li>
            </ul>
          </div>
        </div>
      </section>



 
                       

      <!-- G Suite End -->
 <div class="box">

              

<div class="box-header">
                                         <h3 class="box-title">Geoposición de Agricultores, Fincas y Visitas Técnicas en Campo</h3>
                                 
<div id="map"style="width:500px;height:300px;margin:auto;margin-top:80px;">Geoposición de Agricultores, Fincas y Visitas Técnicas en Campo</div>
</div>


                    <img class="d-flex no-block align-items-center" src="https://www.agronielsen.com/encampo/public/imagenes/empieza.png" style="width:160px;height:160px;margin:auto">

                <div class="bd-example">
                <div class="endorsed">


                      <h1 class="title_second">La primera plataforma de visitas técnicas que automatiza y centraliza completamente sus productos recomendados en campo.</h1></div><br/>

          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class=""></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                        <div class="carousel-item">
                          <img class="d-block w-100" src="https://www.agronielsen.com/encampo/public/imagenes/registro-agricultores.jpg" alt="Control de Agricultores" data-holder-rendered="true">
                                              
                          <div class="ajuste-caption">
                            <h5>"No importan los formatos,</h5>
                            <p>Lo que importa son los datos que tienen esos formatos."</p>
                          </div>

                          </div>         
                       <div class="carousel-item">
                        <img class="d-block w-100" src="https://www.agronielsen.com/encampo/public/imagenes/nexus.gif" data-holder-rendered="true">
                        <div class="ajuste-caption">
                          <h5 >"Digitaliza tu gestión,</h5>
                          <p> y mejora tus resultados."</p>
                        </div>
                      </div>
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="https://www.agronielsen.com/encampo/public/imagenes/pdtos-agricultores1.jpg" data-holder-rendered="true">
                        <div class="ajuste-caption">
                          <h5>"Consulta tus visitas,</h5>
                          <p>en el momento que lo necesites."</p>
                        </div>
                      </div>
                 </div>
            </div>
        </div>


          <div class="buttons">
             <a class="btn btnGoogle" href="register">REGISTRARSE GRATIS</a>

          </div>

       </div>












</body>


    
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
        zoom: 13,
        center:new google.maps.LatLng(coords.lat,coords.lng),
              });
              
     /*  var goldStar = {
          path: 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
          fillColor: 'yellow',
          fillOpacity: 0.8,
          scale: 0.2,
          strokeColor: 'gold',
          strokeWeight: 14
        };
        
     /*   var markerLabel = {
            text: markerLabel,
            color: "#eb3a44",
            fontSize: "16px",
            fontWeight: "bold"
        };*/
        
     /*   var shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: 'poly'
        };

      */          var infowindow = new google.maps.InfoWindow({
      content: "Información de la Finca: <b>La Gloria</b><br/>Ubicación: La Virginia<br/>Agricultor: Carlos Satizabal<br/>Asesor tecnico: Ing. Carlos Sanabria<br/><a href="">Ver Detalle</a>"
   });
        

      //Creamos el marcador en el mapa con sus propiedades
      //para nuestro obetivo tenemos que poner el atributo draggable en true
      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
        var markerLabel = 'Finca';
        marker = new google.maps.Marker({
        map: map,
       // draggable: yes,
        animation: google.maps.Animation.BOUNCE,
        map: map,
       // shape: shape,
        title: 'Aquí estoy!',
         icon: 'https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png',
       label: {
          text: markerLabel,
          color: "#fff",
          padding:"20px 20px 20px 20px",
          fontSize: "16px",
          fontWeight: "bold",
          background:"#fff",
          width:"100px",
          height:"200px",
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
       
        google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
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

    <script src="https://www.agronielsen.com/encampo/public/plugins/jQuery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="https://www.agronielsen.com/encampo/public/plugins/iCheck/icheck.min.js"></script>  
    <script src="https://www.agronielsen.com/encampo/public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/plugins/fastclick/fastclick.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/js/owl.carousel.min.js"></script>
    <script src="https://www.agronielsen.com/encampo/public/js/jquery.onepagenav.js"></script>

   


    <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
        $.src="//v2.zopim.com/?1hj6nSgRMmQTw1IIAZArYiuchzQzXvjj";z.t=+new Date;$.
        type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>

  







