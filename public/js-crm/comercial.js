
       $("#comercial").change(function(event){alert("hola");
  $.get("/prospectos/"+event.target.value+"",function(response,state) {
 // $.get("/prospectos/{id}",function(response,state) {  
    $("#prospecto").empty();
    for(i=0; i<response.length; i++) {
      $("#prospecto").append("<option value='"+response[i].id+"'>"+response[i].nombres+"</option>");
    });
  });
});
