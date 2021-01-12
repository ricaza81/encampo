/*  
  VISOR DE ALERTAS NACIONALES
  APLICATIVO HECHO POR DAVID PÉREZ PARA IDEAM - 2018
*/
var dt = new Date();
var markers = new Array();
var map;
var layer;
var ciudades = new L.FeatureGroup();
var markers = new L.FeatureGroup();

var i;
var fecha = new Date();
var manana = new Date(); 

//hoy
var mm = fecha.getMonth()+1;
var dd = fecha.getDate();

var fechaActual = fecha.getFullYear() + '-' + (mm<10 ? '0' : '') + mm + '-' + (dd<10 ? '0' : '') + dd;

function nfecha(val){
  
  var newdate = new Date();
  newdate.setDate(manana.getDate()+val);
  var mmm = newdate.getMonth()+1;
  var ddm = newdate.getDate();
  var fechaManana = newdate.getFullYear() + '-' + (mmm<10 ? '0' : '') + mmm  + '-'  + (ddm<10 ? '0' : '') + ddm;
  
  return fechaManana;
}

var imageBounds = [[-9.108531009018389,-88.3571794618717],[18.2780942139803,-51.45600323626909]];
var bounds = L.latLngBounds(imageBounds);
var overlayOpts = {
          opacity:0.6
};


//ARREGLOS PARA LAS ALERTAS QUE ENCUENTRE LA CONSULTA
var aamarilla = new Array();
var anaranja =  new Array();
var aroja =  new Array();





//OPCIONES DEL INPUT - AUTOCOMPLETAR
$(document).ready(function(){

  selectCapas();  
  buscaPronoCapitales();
  $('#pronosticoDetalle').hide();
  //$('#screenLoad').css("display","none");  

    var busca = {

      url: "http://mipronostico.ideam.gov.co/IdeamWebApp2/Ideam/getCiudades",

      getValue: "name",
      list: { 
        match: {
          enabled: true
        },
        onSelectItemEvent: function() {
          
        }
      },

      template: {
        type: "custom",
        method: function(value, item) {

          var valor = '\''+item.id+'\''; 
          return "<a id='valorCiudad' href='#' onclick=buscaPronostico("+valor+");return false;><span>"+ item.name +"</span> - <span class='depto'>"+item.departamento+"</span></a>";

        }
      }
      
    };

    $("#buscadorMunicipios").easyAutocomplete(busca);

    $("#buscadorMunicipios").keypress(function(e) {

      if (e.keyCode == 13) {

        var script = $('#valorCiudad').attr("onclick");
        var id = script.substring(17,25);  
        buscaPronostico(id);

      }

    });



    $('#dias').on('change', function() {

     var lugar = localStorage.getItem("lugar");     
     
      $('#pronoTotal').css("display","flex");
      $('#head2d').html("");  
      $('#head3d').html("");  
      $('#head4d').html("");
      $('#head5d').html("");
      $('#2d').html("");  
      $('#3d').html("");  
      $('#4d').html("");
      $('#5d').html("");


      var url = "http://mipronostico.ideam.gov.co/IdeamWebApp2/Ideam/es/getPronostico/"+lugar;
      

      $.ajax({
        url: url,
        type: 'GET',
        dataType: 'jsonp',
      })
      .done(function(data) {  

        var name = data.ciudad.name;
        var departamento = data.ciudad.departamento;
        var region = data.ciudad.region;
        //var pronostico = data.pronostico; 
        
        $('#nombrePron').html(name); 
        $('#depPron').html(departamento);
      

        
        $.each(data.pronostico, function(index, element) {

            var f = element.fecha;
            var hora =  element.hora;
            var temperatura =  element.temperature;
            var url =  element.url;
            var hora = element.hora;
            var time = element.time;

           
            if($('#dias').val() == ""){
              $('.pronoTotal').css("display","none");
              $('#2d').css("display","none");
              $('#3d').css("display","none");
              $('#4d').css("display","none");
              $('#5d').css("display","none");
            }           
           
            if($('#dias').val() == 2){              

              $('#2d').css("display","flex");
              $('#3d').css("display","none");
              $('#4d').css("display","none");
              $('#5d').css("display","none");

              if(nfecha(1) == f){
                

                $('#head2d').html(f);
                var item =  '<div class="itemProno">'+
                            '<div class="horaProno">'+hora+'</div>'+
                            '<div class="icono"><img src="'+url+'"/></div>'+
                            '<div class="temperatura">'+temperatura+'°C</div>'+
                            '<div class="dirViento"></div>'+
                            '</div>';

                $('#2d').append(item);        

              }
              
            }
            if($('#dias').val() == 3){
             
              $('#2d').css("display","flex");
              $('#3d').css("display","flex");

              $('#4d').css("display","none");
              $('#5d').css("display","none"); 

              $('#portlet_ideam_WAR_ideamportlet').css("height","585px");                  
             
              if(nfecha(1) == f){

                $('#head2d').html(f);
                var item =  '<div class="itemProno">'+
                            '<div class="horaProno">'+hora+'</div>'+
                            '<div class="icono"><img src="'+url+'"/></div>'+
                            '<div class="temperatura">'+temperatura+'°C</div>'+
                            '<div class="dirViento"></div>'+
                            '</div>';

                $('#2d').append(item);        

              }
            
              if(nfecha(2) == f){

                $('#head3d').html(f);
                var item =  '<div class="itemProno">'+
                            '<div class="horaProno">'+hora+'</div>'+
                            '<div class="icono"><img src="'+url+'"/></div>'+
                            '<div class="temperatura">'+temperatura+'°C</div>'+
                            '<div class="dirViento"></div>'+
                            '</div>';

                $('#3d').append(item);        

              }
              
            }
            if($('#dias').val() == 4){
           
              $('#2d').css("display","flex");
              $('#3d').css("display","flex");
              $('#4d').css("display","flex");
              $('#5d').css("display","none");

              $('#portlet_ideam_WAR_ideamportlet').css("height","727px");     
             
              if(nfecha(1) == f){

                $('#head2d').html(f);
                var item =  '<div class="itemProno">'+
                            '<div class="horaProno">'+hora+'</div>'+
                            '<div class="icono"><img src="'+url+'"/></div>'+
                            '<div class="temperatura">'+temperatura+'°C</div>'+
                            '<div class="dirViento"></div>'+
                            '</div>';

                $('#2d').append(item);        

              }
            
              if(nfecha(2) == f){

                $('#head3d').html(f);
                var item =  '<div class="itemProno">'+
                            '<div class="horaProno">'+hora+'</div>'+
                            '<div class="icono"><img src="'+url+'"/></div>'+
                            '<div class="temperatura">'+temperatura+'°C</div>'+
                            '<div class="dirViento"></div>'+
                            '</div>';

                $('#3d').append(item);        

              }
              if(nfecha(3) == f){

                $('#head4d').html(f);
                var item =  '<div class="itemProno">'+
                            '<div class="horaProno">'+hora+'</div>'+
                            '<div class="icono"><img src="'+url+'"/></div>'+
                            '<div class="temperatura">'+temperatura+'°C</div>'+
                            '<div class="dirViento"></div>'+
                            '</div>';

                $('#4d').append(item);        

              }
              
            } 
            if($('#dias').val() == 5){               
             
                        
              

              $('#2d').css("display","flex");
              $('#2d').css("display","flex");
              $('#3d').css("display","flex");
              $('#4d').css("display","flex"); 
              $('#5d').css("display","flex");  

                
              
             
              if(nfecha(1) == f){

                $('#head2d').html(f);
                var item =  '<div class="itemProno">'+
                            '<div class="horaProno">'+hora+'</div>'+
                            '<div class="icono"><img src="'+url+'"/></div>'+
                            '<div class="temperatura">'+temperatura+'°C</div>'+
                            '<div class="dirViento"></div>'+
                            '</div>';

                $('#2d').append(item);        

              }
            
              if(nfecha(2) == f){

                $('#head3d').html(f);
                var item =  '<div class="itemProno">'+
                            '<div class="horaProno">'+hora+'</div>'+
                            '<div class="icono"><img src="'+url+'"/></div>'+
                            '<div class="temperatura">'+temperatura+'°C</div>'+
                            '<div class="dirViento"></div>'+
                            '</div>';

                $('#3d').append(item);        

              }
              if(nfecha(3) == f){

                $('#head4d').html(f);
                var item =  '<div class="itemProno">'+
                            '<div class="horaProno">'+hora+'</div>'+
                            '<div class="icono"><img src="'+url+'"/></div>'+
                            '<div class="temperatura">'+temperatura+'°C</div>'+
                            '<div class="dirViento"></div>'+
                            '</div>';

                $('#4d').append(item);        

              }
              if(nfecha(4) == f){

                $('#head5d').html(f);
                var item =  '<div class="itemProno">'+
                            '<div class="horaProno">'+hora+'</div>'+
                            '<div class="icono"><img src="'+url+'"/></div>'+
                            '<div class="temperatura">'+temperatura+'°C</div>'+
                            '<div class="dirViento"></div>'+
                            '</div>';

                $('#5d').append(item);        

              }
              
            }
      })  
      })
      .fail(function() {
        console.log("No se pudieron obtener datos del servicio web");
      })
      
    })

    $('#diasMarino').on('change', function() {
      
      var lugar = localStorage.getItem("lugar");

      $('#pronoTotalMarino').css("display","flex");
      $('#head2dMarino').html("");            
      $('#2dMarino').html("");  
      
      var dia = $('#diasMarino').val();     

      $.ajax({
        url: 'http://mipronostico.ideam.gov.co/IdeamWebApp2/Ideam/getData/pronoMarino/pronoMarino.json',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(data) {

      $.each(data, function(index, element) {

            var zona = element.ZNMR_CODIGO_PK;
            var f = element.PMRN_FECHA_PRONOSTICO;    
             
            ff = f.substring(0, 10);
          
            var fActual = fechaActual+" 00:00:00";
            var sinoptico = element.PMRN_SINOPTICO;           
            var viento = element.PMRN_INT_VIENTO;
            var dirViento = element.PMRN_DIR_VIENTO;
            var oleaje = element.PMRN_PER_OLEAJE;
            var observaciones = element.PMRN_OBSERVACIONES;            
            var conMeteo = element.PMRN_CON_METEOROLOGICAS;
            var altOleajeLit = element.PMRN_ALT_OLEAJE_LITORAL;
            var altOleajeAlt = element.PMRN_ALT_OLEAJE_ALTAMAR;
            var dirOleajeLit = element.PMRN_DIR_OLEAJE_LITORAL;
            var dirOleajeAlt = element.PMRN_DIR_OLEAJE_ALTAMAR;

            if(zona == lugar){

            if($('#diasMarino').val() == ""){
              $('.pronoTotal').css("display","none");
              $('#2dMarino').css("display","none");
             
             
            }           
           
            if($('#diasMarino').val() == 2){              

              $('#2dMarino').css("display","flex");
             
             

              if(nfecha(1) == ff){
                

                $('#head2dMarino').html(f);
                var item = "<div class='datoProno'>"+                                              
                                              "<div class='fecha'><br>"+
                                              "<b>Dirección del viento:</b> "+dirViento+"<br>"+
                                              "<b>Sinopsis:</b> "+sinoptico+"<br><br>"+                                              
                                              "<b>Periodo Oleaje:</b> "+oleaje+"<br>"+
                                              "<b>Dirección del Viento:</b> "+dirViento+"<br>"+
                                              "<b>Altura Oleaje Litoral:</b> "+altOleajeLit+"<br>"+
                                              "<b>Altura Oleaje Altamar:</b> "+altOleajeAlt+"<br>"+
                                              "<b>Direccion Oleaje Litoral:</b> "+dirOleajeLit+"<br>"+
                                              "<b>Direccion Oleaje Altamar:</b> "+dirOleajeAlt+"<br><br>"+
                                              "<b>Observaciones:</b> "+observaciones+"<br>"+
                                              "</div>"+
                                            "</div>";

                $('#2dMarino').append(item);        

              }
              
            }

            }

        });
      })
      .fail(function() {
              console.log("No se pudieron obtener datos")
      })
      
      
        
      console.log(dia);
    });

});


//CONSULTAR LAS ALERTAS A NIVEL NACIONAL
function buscaPronoCapitales(){
  $("#h1Load").html("Cargando Pronóstico de las principales ciudades");
  $("#pronosticos").html("");
 
  $.ajax({
        url: 'http://mipronostico.ideam.gov.co/IdeamWebApp2/Ideam/getCiudades',
        type: 'GET',
        dataType: 'json',
  })
  .done(function(data) {
    
    $.each(data, function(index, element) {
      
        var nombre = element.name;
        var id = element.id;
        var latitud = element.latitud;
        var longitud = element.longitud;
        var departamento = element.departamento;
        var region = element.region;

        if (id == "11000000" || 
            id == "91001000" ||
            id == "05001000" || 
            id == "81001000" || 
            id == "08001000" || 
            id == "08001000" || 
            id == "15001000" ||
            id == "17001000" ||
            id == "18001000" ||
            id == "85001000" ||
            id == "19001000" ||
            id == "20001000" ||
            id == "27001000" ||
            id == "23001000" ||
            id == "94001000" ||
            id == "95001000" ||
            id == "41001000" ||
            id == "44001000" ||
            id == "47001000" ||
            id == "50001000" ||
            id == "52001000" ||
            id == "54001000" ||
            id == "86001000" ||
            id == "63001000" ||
            id == "66001000" ||
            id == "88000000" ||
            id == "68001000" ||
            id == "70001000" ||
            id == "73001000" ||
            id == "76001000" ||
            id == "97001000" ||
            id == "99001" ||
            id =="13001000" 
            ){
          
          
            $.ajax({
            url: 'http://mipronostico.ideam.gov.co/IdeamWebApp2/Ideam/es/getPronostico/'+id,
            type: 'GET',
            dataType: 'jsonp',
            })
            .done(function(data) {

              var nombre =  data.ciudad.name;
              var departamento = data.ciudad.departamento;
              var hora = data.pronostico[0].hora;
              var pronostico = data.pronostico[0].nombre;
              var img = data.pronostico[0].url;
              var temp = String(data.pronostico[0].temperature);
              var grad = "°C";
              var contentString = '<div id="content">'+nombre+'</div>'; 
              var html = '<img class="ciudad" src='+img+' alt="">'; 
              var icon = L.divIcon({
                className: 'conteCiudadICO',
                html: html,
                
                
              });  
              

              var marc = L.marker([latitud, longitud],{icon: icon});
              ciudades.addLayer(marc);
              map.addLayer(ciudades);             
              marc.bindPopup(contentString);
              marc.on('mouseover', function(event) {
                this.openPopup();
              });
              marc.on('click', function() {
                $('.itemsPronoHoy').css("display","flex");
                $('.pronoHeader').css("display","flex");  
                setMapOnAll()
                buscaPronostico(id); 
                $('#dias').val("");               
              });  
           
          })
          .fail(function() {
              console.log("No se pudieron obtener datos")
          })

        }if(id =="CC" || id =="CO" || id =="CE" || id =="PC" || id =="PN" || id =="PS" ){
          var contentString = '<div id="content">'+nombre+'</div>'; 
          var mar = {             
              fillColor: '#00374a',
              color: "#00374a",
              weight: 1,
              opacity: 1,
              fillOpacity: 0.3
            };

                    
          

          var geoJson = 'http://mipronostico.ideam.gov.co/IdeamWebApp2/Ideam/getGeoJsonMunicipio/'+id+'.json';
          $.getJSON(geoJson, function(data) { 

            window['zona' + id] = L.geoJson(data, {
                  style: mar
              });
            window['zona' + id].addTo(map);
            window['zona' + id].bindPopup(contentString);
            window['zona' + id].on('mouseover', function(event) {
              this.openPopup();
              this.setStyle({
                      weight: 1,
                      color: '#FFF',
                      
                  });
             
            });
            window['zona' + id].on('mouseout', function(event) {
            
                this.setStyle({
                        weight: 1,                        
                        color: '#00374a'
                    });
                
              });
            window['zona'+id].on('click', function(event) {
               
             setMapOnAll();
             var marc = L.marker([latitud, longitud]);
              markers.addLayer(marc);
              map.addLayer(markers); 
             $('#diasMarino').val("");  
             $('#head2dMarino').html("");            
             $('#2dMarino').html(""); 
             buscaPronostico(id);
           
          }); 

          });
         
        }

    });
    time = 1000;    
    setTimeout('ocultarScreen()',time);
  })
  .fail(function() {
      console.log("No se pudieron obtener datos")
  })
  
} 

function buscaPronostico(valor){
$("#dias").val("");  
$("#diasMarino").val("");
$(".fecha").html("");
$(".pronostico").css("overflow-y","scroll");
valida = "');ret";
valor = valor.replace(valida,"");



$('.pronosticoDiasMarino').css("display","none");
$('.pronosticoDias').css("display","block");
localStorage.setItem("lugar", valor);

  $("#pronoHeader").html("");
  $("#itemsPronoHoy").html("");
  $('#head2d').html("");
  $('#head3d').html("");
  $('#head4d').html("");
  $('#head5d').html("");
  $('#2d').html("");
  $('#3d').html("");
  $('#4d').html("");
  $('#5d').html("");
  $('#pronoTotal').css("display","none");

if(valor =="CC" || valor =="CO" || valor =="CE" || valor =="PC" || valor =="PN" || valor =="PS" ){
 $('.pronosticoDias').css("display","none");
 $('.itemsPronoHoy').css("display","none");
 $('.pronoHeader').css("display","none");
 $('.pronosticoDiasMarino').css("display","block");
  $.ajax({
        url: 'http://mipronostico.ideam.gov.co/IdeamWebApp2/Ideam/getData/pronoMarino/pronoMarino.json',
        type: 'GET',
        dataType: 'json',
  })
  .done(function(data) {

    $.each(data, function(index, element) {

      var zona = element.ZNMR_CODIGO_PK;
      var f = element.PMRN_FECHA_PRONOSTICO;        
      var fActual = fechaActual+" 00:00:00";
      var sinoptico = element.PMRN_SINOPTICO;           
      var viento = element.PMRN_INT_VIENTO;
      var dirViento = element.PMRN_DIR_VIENTO;
      var oleaje = element.PMRN_PER_OLEAJE;
      var observaciones = element.PMRN_OBSERVACIONES;            
      var conMeteo = element.PMRN_CON_METEOROLOGICAS;
      var altOleajeLit = element.PMRN_ALT_OLEAJE_LITORAL;
      var altOleajeAlt = element.PMRN_ALT_OLEAJE_ALTAMAR;
      var dirOleajeLit = element.PMRN_DIR_OLEAJE_LITORAL;
      var dirOleajeAlt = element.PMRN_DIR_OLEAJE_ALTAMAR;

      if(zona == valor){

         if(zona == "CC"){
              zona = "Caribe Centro";
         }
         if(zona == "CE"){
              zona = "Caribe Oriente";
         }
         if(zona == "CO"){
              zona = "Caribe Occidente";
         }
         if(zona == "PN"){
              zona = "Pacifico Norte";
         }
         if(zona == "PC"){
              zona = "Pacifico Centro";
         }
         if(zona == "PS"){
              zona = "Pacifico Sur";
         }

        if (fActual == f ){

            $("#contePronostico").hide("fast");
            $("#pronosticoDetalle").show("fast");
            $("#tituloPronosticoDetalle").html(zona);
            $("#infoPronosticoDetalle").html("<div class='datoProno'>"+                                              
                                              "<div class='fecha'>"+f+"<br><br>"+
                                              "<b>Dirección del viento:</b> "+dirViento+"<br>"+
                                              "<b>Sinopsis:</b> "+sinoptico+"<br><br>"+                                              
                                              "<b>Periodo Oleaje:</b> "+oleaje+"<br>"+
                                              "<b>Dirección del Viento:</b> "+dirViento+"<br>"+
                                              "<b>Altura Oleaje Litoral:</b> "+altOleajeLit+"<br>"+
                                              "<b>Altura Oleaje Altamar:</b> "+altOleajeAlt+"<br>"+
                                              "<b>Direccion Oleaje Litoral:</b> "+dirOleajeLit+"<br>"+
                                              "<b>Direccion Oleaje Altamar:</b> "+dirOleajeAlt+"<br><br>"+
                                              "<b>Observaciones:</b> "+observaciones+"<br>"+
                                              "</div>"+
                                            "</div>");

            
        }

      }
      
    });
    
  })
    .fail(function() {
        console.log("No se pudieron obtener datos");
  })


}else{

  

   $.ajax({
        url: 'http://mipronostico.ideam.gov.co/IdeamWebApp2/Ideam/es/getPronostico/'+valor,
        type: 'GET',
        dataType: 'jsonp',
  })
  .done(function(data) {
            
    var lugar =  data.ciudad.name;
    var ubicacion = data.ciudad.departamento;
    var hora = data.pronostico[0].hora;
    var pronostico = data.pronostico[0].nombre;
    var img = data.pronostico[0].url;
    var temp = String(data.pronostico[0].temperature);
    var grad = "°C";

    var fecha = data.pronostico[0].fecha;
    var hora = data.pronostico[0].hora;
    var tempf = temp.concat(grad);

    var lat= data.ciudad.latitud;
    var long = data.ciudad.longitud;
    var latlong = L.latLng(lat,long);  

    
               
  
    

    var ubicacion = lugar+" - "+ubicacion;
    $("#contePronostico").hide("fast");
    $("#pronosticoDetalle").show("fast");
    $("#tituloPronosticoDetalle").html("Pronóstico para "+ubicacion);
    $("#infoPronosticoDetalle").html("<div class='datoProno'>"+
                                      "<div class='icon'><img src="+img+" alt="+pronostico+"></div>"+
                                      "<div class='fecha'><b>Hora:</b> "+hora+"<br>"+
                                        "<b>Pronóstico:</b> "+pronostico+"<br>"+
                                        "<b>Temperatura:</b> "+tempf+
                                      "</div>"+
                                    "</div>");

    var marc = L.marker([lat, long]);
    markers.addLayer(marc);
    map.addLayer(markers);
    

    $.each(data.pronostico, function(index, element) {

      if(index == 0){

      }else{

        var fecha = element.fecha;
        var hora =  element.hora;
        var temperatura =  element.temperature;
        var url =  element.url;
        var hora = element.hora;
        var time = element.time;
        
        if(fecha == fechaActual){
          
          $('#pronoHeader').html(fecha);
         
          var item =  '<div class="itemProno">'+
                    '<div class="horaProno">'+hora+'</div>'+
                    '<div class="icono"><img src="'+url+'"/></div>'+
                    '<div class="temperatura">'+temperatura+'°C</div>'+
                    '<div class="dirViento"></div>'+
                    '</div>';

          $('.itemsPronoHoy').append(item);  


        }else{
          

        }

      }

    })
    var tamano = $(".itemProno").length; 
    if (tamano > 10){
      $('#itemsPronoHoy').css("overflow-x","scroll");
    }


    })
    .fail(function() {
        console.log("No se pudieron obtener datos")
  })
  }
}



function setMapOnAll() {

  markers.clearLayers();
}


// EVENTOS DEL BOTON DE RETROCEDER AL CONSULTAR UN MUNICIPIO
function cerrarDetalleProno(){
  
  $('#buscadorMunicipios').val("");
  $('#pronosticoDetalle').hide();
  $('#contePronostico').show("fast");
  $('#titulopronosticoDetalle').html();
  $('#infopronosticoDetalle').html();
  

  setMapOnAll();
}




//ESTADOS DE LA VENTANA DE CARGA
function mostrarScreen(){
  
  $("#screenLoad").show("fast");
 
}
function ocultarScreen(){  
  
  $("#screenLoad").hide("fast");
}

function selectCapas(){

  var mm = dt.getMonth()+1;
  var dd = dt.getDate();
  var aa = dt.getFullYear();

  var hh = dt.getHours();

 
  if(hh > 5 && hh < 19 ){
    $("#listaCapa").append('<option value="Infrarojo">Infrarojo</option>'+
                            '<option value="Vapor">Vapor</option>'+
                            '<option value="Visible">Visible</option>'
    );  
  }else{
    $("#listaCapa").append('<option value="Infrarojo">Infrarojo</option>'+
                            '<option value="Vapor">Vapor</option>'
    );  
  }
  
}


// PINTAR LOS PINES DEL MUNICIPIO AL HACER CLICK


function buscaCapa(){

  var capa = $("#listaCapa").val();
  
  if (capa == ""){

  }
  else if(capa =="Infrarojo"){
    
    var src = 'http://bart.ideam.gov.co/geotiff/satelite/gif/colombia/G16B13COLAVH_CURRENT.gif';
    
  }
  else if(capa =="Vapor"){
    
    var src = 'http://bart.ideam.gov.co/geotiff/satelite/gif/colombia/G16B08COLWVCOLOR35_CURRENT.gif';
  }
  else if(capa =="Visible"){
    
    var src = 'http://bart.ideam.gov.co/geotiff/satelite/gif/colombia/G16B02COLVISENHANCEMENT_CURRENT.gif';
  }

  if(src != undefined){
    pintaCapa(src);
  }else{
    map.removeLayer(layer);  
  }

}

function pintaCapa(src){

  if(layer == undefined){

  }else{
    borrarCapa();
  }
  layer = L.imageOverlay(src, bounds, overlayOpts);
  layer.addTo(map);
  

}

function borrarCapa() {
  map.removeLayer(layer);
}

