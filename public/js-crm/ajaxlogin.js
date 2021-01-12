$(document).ready(function() {
 
var form = $('#ajaxform').submit(function() {
 
$.ajax({
type: 'post',
cache: false,
dataType: 'json',
url: form.attr('action'),
data: $('#ajaxform').serialize(),
beforeSend: function(){
$(".load").show();
},
 
success: function (data) {
$(".load").hide();
$(".errors").html("");
if(data.success == false){
var errores = "";
for(datos in data.errors){
errores += "<div class='alert alert-danger'>"
+ data.errors[datos] + "</div>";
}
$(form)[0].reset();
$(".errors").html(errores);
 
}else{
 
$(".errors").show().html("
<div class='alert alert-success'>"
+ data.message + "</div>");
 
window.location='admin';
}
 },
error: function(errors){
$(".load").hide();
$(".errors").html("");
$(".errors").html(errors);
}
});
return false;
});
});