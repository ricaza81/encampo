var OPEN_WEATHER_MAP_API_KEY = "d13eb18064cea8bae2ef7ee7c6478111"; //replace with your own API key
$(function() {
   $.getJSON("https://api.ipdata.co/?api-key=b6f51c8bcc4bc7dca79df021ca932ce08222b2e8dc07a3964ddfc5cc",function(data) { 
    lat = data.latitude;
    lon = data.longitude;
    console.log(lat + "," + lon);
    $.getJSON("https://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + lon + "&appid=" + OPEN_WEATHER_MAP_API_KEY,function(data) {
      
      console.log("Weather: " + (data.weather[0].main));
      console.log("icon: " + (data.weather[0].icon));
      console.log("Ciudad: " + (data.name));
      console.log("Temp Maxima: " + (data.main.temp_max-273.15));
      console.log("Temp Mínima: " + (data.main.temp_min-273.15));
      console.log("Humidity: " + (data.main.humidity));
      console.log("Pressure: " + (data.main.pressure));
      console.log("Temp in F: " + (((data.main.temp-273.15) * 1.8) + 32));
  var icon=data.weather[0].icon;
  var iconurl = "https://openweathermap.org/img/wn/" + icon + ".png";
  $('#ciudad').html(data.name);
  $('#icon').attr('src',iconurl);
  $('#weather').html(data.weather[0].main);
  //$('#tempC').html( (data.main.temp_max-273.15) );
  //$('#temp_min').html( (data.main.temp_min-273.15) );
  $('#humidity').html( (data.main.humidity + 0) );
  $('#pressure').html( (data.main.pressure + 0) );
  $('#tempF').html( (((data.main.temp-273.15) * 1.8) + 32) );
    });
  });
});

$(function() {
  $.getJSON("https://api.ipdata.co/?api-key=b6f51c8bcc4bc7dca79df021ca932ce08222b2e8dc07a3964ddfc5cc",function(data) { 
    lat = data.latitude;
    lon = data.longitude;
    //console.log(lat + "," + lon);
    $.getJSON("https://api.openweathermap.org/data/2.5/forecast?lat=" + lat + "&lon=" + lon + "&units=metric"  + "&appid=" + OPEN_WEATHER_MAP_API_KEY,function(data) {
      var wind=data.list[0].wind;
      //var temp_max=data.list[0].temp_max;
      var temp_max=(data.list[0].main.temp_max);
      var temp_min=(data.list[0].main.temp_min);
      var rain = data.list[0].rain && data.list[0].rain["3h"] || 0
      console.log("Wind: " + data.list[0].wind);
      console.log("MaxTemp: " + temp_max);
      console.log("Rain: " + rain);
    
  
  //const rain = data.rain['1h'];
$('#wind').html(wind.speed);
//$('#temp_max').html(temp_max);
//$('#temp_min').html(temp_min);
 $('#rain').html(rain);

    });
  });
});

$(function() {
  $.getJSON("https://api.ipdata.co/?api-key=b6f51c8bcc4bc7dca79df021ca932ce08222b2e8dc07a3964ddfc5cc",function(data) { 
    lat = data.latitude;
    lon = data.longitude;
    //console.log(lat + "," + lon);
    $.getJSON("https://api.openweathermap.org/data/2.5/onecall?lat=" + lat + "&lon=" + lon + "&units=metric"  + "&appid=" + OPEN_WEATHER_MAP_API_KEY,function(data) {
      //var wind=data.list[0].wind;
      //var temp_max=data.list[0].temp_max;
      var temp=(data.daily[0].temp);
      //var temp_min=(data.list[0].main.temp_min);
      //var rain = data.list[0].rain && data.list[0].rain["3h"] || 0
      //console.log("Wind: " + data.list[0].wind);
      console.log("MaxTempOne: " + temp.max);
      console.log("MinTempOne: " + temp.min);
      //console.log("Rain: " + rain);
    
  
  //const rain = data.rain['1h'];
//$('#wind').html(wind.speed);
$('#temp_max').html(temp.max);
$('#temp_min').html(temp.min);
// $('#rain').html(rain);

    });
  });
});


/*var GOOGLE_MAP_API_KEY = "AIzaSyANpX5o1slGAjIRokzuF_tcMj5OZx36dnE"; 
$(function() {
   $.getJSON("https://ipapi.co/json/",function(data) { 
     lat = data.latitude;
    lon = data.longitude;
  //$.getJSON("https://maps.googleapis.com/maps/api/elevation/json?locations=" + lat + "&lon=" + lon + "&key=" + GOOGLE_MAP_API_KEY,function(results) {
  $.getJSON("https://maps.googleapis.com/maps/api/elevation/json?locations=3.405,-76.532&key=AIzaSyANpX5o1slGAjIRokzuF_tcMj5OZx36dnE",function() {
      console.log("Altitud: " + results[0].elevation);
 $('#altitud').html(results[0].elevation);
     
    });
  });
*/