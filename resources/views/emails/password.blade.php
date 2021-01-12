<!-- resources/views/emails/password.blade.php -->

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="css/sistemalaravel.css">

<head>
	<meta charset="UTF-8">
	<title>correo</title>
   <style>

   .titulo {
    color: #1e80b6;
    padding-top: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
    }

    .body{
     background-color: #fff;	
    }


    .div_contenido{
    color: #1e80b6;
    padding-top: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
    background-color: #ffffff !important;
   }

.btn {
    border-radius: 3px;
    -webkit-box-shadow: none;
    box-shadow: none;
    border: 1px solid transparent;
}


   .btn-primary {
    background-color: #3c8dbc;
    border-color: #367fa9;
}

   </style>

</head> 

<body class="body">

<div class="titulo"> <img src="{{url('/imagenes/logo-agronielsen-presentacion.png')}}" style="height: auto; width: auto; max-width: 300px; max-height: 300px;">
<br/> <br/>
Has solicitado el cambio de contraseña. Por favor haz clic <a href="{{ url('password/reset/'.$token) }}">AQUÍ</a> para continuar con el proceso: 



</body>
</html>