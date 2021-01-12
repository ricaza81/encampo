function irarriba() {
  $("html, body").animate({ scrollTop: 0 }, 300);
}

function cargarformulario(arg) {
  //funcion que carga todos los formularios del sistema

  if (arg == 1) {
    var url = "form_nuevo_usuario_ajax";
  }
  if (arg == 2) {
    var url = "form_cargar_datos_usuarios";
  }
  if (arg == 3) {
    var url = "form_enviar_correo";
  }
  if (arg == 4) {
    var url = "form_nuevo_prospecto";
  }
  if (arg == 5) {
    var url = "form_calendario";
  }
  if (arg == 6) {
    var url = "form_calendario_admin";
  }
  if (arg == 7) {
    var url = "form_nuevo_interest";
  }
  //  if(arg==8){ var url = "form_nuevo_status";  }
  if (arg == 9) {
    var url = "form_nuevo_registro";
  }
  if (arg == 10) {
    var url = "form_nueva_cuenta";
  }
  if (arg == 11) {
    var url = "form_nueva_orden";
  }
  //  if(arg==12){ var url = "form_nuevo_proyecto_suscriptor";  }
  if (arg == 13) {
    var url = "form_asignar_usuario_empresa";
  }
  if (arg == 14) {
    var url = "form_nuevo_usuario_suscriptor";
  }
  if (arg == 15) {
    var url = "form_asignar_empresa_suscriptor";
  }
  if (arg == 16) {
    var url = "form_nueva_empresa_suscriptor";
  }
  if (arg == 17) {
    var url = "form_agregar_usuario_de_suscriptor";
  }
  if (arg == 18) {
    var url = "form_nuevo_proyecto_usuario";
  }
  if (arg == 19) {
    var url = "form_nuevo_empresa_admin";
  }

  $("#contenido_principal").html($("#cargador_empresa").html());
  $.get(url, function(resul) {
    $("#contenido_principal").html(resul);
  });
}

function cargarlistado(listado) {
  //funcion para cargar los diferentes  en general
  if (listado == 1) {
    var url = "listado_usuarios_ajax";
  }
  if (listado == 2) {
    var url = "listado_publicaciones/0";
  }
  if (listado == 3) {
    var url = "reportes";
  }
  if (listado == 4) {
    var url = "listado_graficas";
  }
  if (listado == 5) {
    var url = "listado_comercial";
  }
  if (listado == 6) {
    var url = "listado_prospectos_comercial";
  }
  //if(listado==7){ var url = "listado_todos_prospectos_comercial"; }
  if (listado == 8) {
    var url = "listado_mis_eventos";
  }
  if (listado == 9) {
    var url = "listado_interest";
  }
  if (listado == 10) {
    var url = "listado_status";
  }
  if (listado == 11) {
    var url = "listado_all_cuentas";
  }
  if (listado == 12) {
    var url = "listado_cuentas_cliente";
  }
  if (listado == 13) {
    var url = "listado_seguimientos_pendientes";
  }
  if (listado == 14) {
    var url = "listado_seguimientos_pendientes_usuario";
  }
  if (listado == 15) {
    var url = "listado_balance_proyectos";
  }
  if (listado == 16) {
    var url = "listado_pagos_cliente";
  }
  if (listado == 17) {
    var url = "listado_documentos_conocimiento";
  }
  if (listado == 18) {
    var url = "listado_eventos_user";
  }
  if (listado == 19) {
    var url = "listado_proyectos_suscriptor";
  }
  //if(listado==20){ var url = "listado_suscriptores"; }
  if (listado == 21) {
    var url = "listado_all_empresas";
  }
  if (listado == 22) {
    var url = "listado_usuarios_del_suscriptor";
  }
  if (listado == 23) {
    var url = "listado_proyectos_suscriptor_standard";
  }

  $("#contenido_principal").html($("#cargador_empresa").html());
  $.get(url, function(resul) {
    $("#contenido_principal").html(resul);
  });
}

$(document).on("submit", ".form_entrada", function(e) {
  //funcion para atrapar los formularios y enviar los datos

  e.preventDefault();

  $("html, body").animate({ scrollTop: "0px" }, 200);

  var formu = $(this);
  var quien = $(this).attr("id");
  var rs = false; //leccion 10
  var seccion_sel = $("#seccion_seleccionada").val();

  if (quien == "login") {
    var varurl = "login";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  if (quien == "f_nuevo_usuario_ajax") {
    var varurl = "agregar_nuevo_usuario";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  if (quien == "f_nuevo_prospecto") {
    var varurl = "agregar_nuevo_prospecto";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  if (quien == "f_nuevo_proyecto_usuario") {
    var varurl = "agregar_nuevo_proyecto_usuario";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  //if(quien=="f_nuevo_registro"){ var varurl="register"; var divresul="notificacion_resul_fanu";  rs=true;}
  //    if(quien=="form_asignar_usuario_empresa"){ var varurl="asignar_nuevo_usuario"; var divresul="notificacion_resul_fanu"; rs=true;}
  if (quien == "f_asignar_empresa_suscriptor") {
    var varurl = "asignar_empresa_suscriptor";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  if (quien == "f_nueva_empresa_suscriptor") {
    var varurl = "nueva_empresa_suscriptor";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  if (quien == "f_nuevo_usuario_suscriptor") {
    var varurl = "agregar_nuevo_usuario_suscriptor";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  if (quien == "f_agregar_usuario_de_suscriptor") {
    var varurl = "agregar_usuario_de_suscriptor";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  if (quien == "f_editar_usuario") {
    var varurl = "editar_usuario";
    var divresul = "notificacion_resul_feu";
  }
  if (quien == "f_editar_prospecto") {
    var varurl = "editar_prospecto";
    var divresul = "notificacion_resul_fanu";
  }
  if (quien == "f_compartir_proyecto") {
    var varurl = "compartir_proyecto";
    var divresul = "notificacion_resul_fanu";
  }
  if (quien == "f_editar_evento") {
    var varurl = "editar_evento";
    var divresul = "notificacion_resul_fanu";
  }
  if (quien == "f_cambiar_password") {
    var varurl = "cambiar_password";
    var divresul = "notificacion_resul_fcp";
  }
  if (quien == "f_agregar_educacion") {
    var varurl = "agregar_educacion_usuario";
    var divresul = "notificacion_resul_faedu";
    rs = true;
  } //leccion 10
  if (quien == "f_nuevo_evento_prospecto") {
    var varurl = "agregar_nuevo_evento_prospecto";
    var divresul = "notificacion_resul_fanu";
  }
  if (quien == "f_cronograma_proyecto") {
    var varurl = "nuevo_evento_cronograma_proyecto";
    var divresul = "notificacion_resul_fanu";
  }
  if (quien == "f_nuevo_evento_prospecto_admin") {
    var varurl = "agregar_nuevo_evento_prospecto_admin";
    var divresul = "notificacion_resul_fanu";
  }
  if (quien == "f_buscar_todos_prospecto") {
    var miurl = "buscarprospecto/{dato?}";
    var divresul = "notificacion_resul_fap";
    rs = true;
  }
  if (quien == "f_nuevo_interest") {
    var varurl = "agregar_nuevo_interest";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  if (quien == "f_editar_interest") {
    var varurl = "editar_interest";
    var divresul = "notificacion_resul_fanu";
  }
  //   if(quien=="f_nuevo_status"){ var varurl="agregar_nuevo_status"; var divresul="notificacion_resul_fanu";  rs=true;}
  if (quien == "f_editar_status") {
    var varurl = "editar_status";
    var divresul = "notificacion_resul_fanu";
  }
  if (quien == "f_editar_cuenta") {
    var varurl = "editar_cuenta";
    var divresul = "notificacion_resul_fanu";
  }
  if (quien == "f_nueva_cuenta") {
    var varurl = "agregar_nueva_cuenta";
    var divresul = "notificacion_resul_fanu";
  }
  if (quien == "f_editar_seguimiento_pendiente") {
    var varurl = "editar_seguimiento_pendiente";
    var divresul = "notificacion_resul_fanu";
  }
  if (quien == "f_nueva_orden") {
    var varurl = "agregar_nueva_orden";
    var divresul = "notificacion_resul_fanu";
  }
  //if(quien=="f_agregar_item"){ var varurl="agregar_item"; var divresul="notificacion_resul_fanu";}
  if (quien == "f_editar_orden") {
    var varurl = "editar_orden";
    var divresul = "notificacion_resul_fanu";
  }
  $("#" + divresul + "").html($("#cargador_empresa").html());

  $.ajax({
    type: "POST",
    url: varurl,
    datatype: "json",
    data: formu.serialize(),
    success: function(resul) {
      $("#" + divresul + "").html(resul);
      if (rs) {
        $("#" + quien + "").trigger("reset");
        mostrarseccion(seccion_sel);
      }
    },

    error: function(data) {
      var lista_errores = "";
      var errors = $.parseJSON(data.responseText);
      var titulo =
        "<br/><div class='rechazado'><label style='color:#FA206A'>Existen Errores de Validacion</label><ul>";
      $.each(errors, function(index, value) {
        lista_errores += '<li style="color:#FA206A;" >' + value + "</li>";
      });
      var footer = "</ul></div>";
      var htmlmensaje = titulo + lista_errores + footer;

      $("#" + divresul + "").html(htmlmensaje);
    }
  });
  irarriba();
});

$(document).on("click", ".pagination li a", function(e) {
  //para que la pagina se cargen los elementos
  e.preventDefault();
  var url = $(this).attr("href");
  $("#contenido_principal").html($("#cargador_empresa").html());
  $.get(url, function(resul) {
    $("#contenido_principal").html(resul);
  });
});

$("#f_nuevo_registro_usuario").submit(function(event) {
  event.preventDefault();
  var $form = $(this),
    data = $form.serialize(),
    url = $form.attr("action");
  var posting = $.post(url, { formData: data });
  posting.done(function(data) {
    if (data.fail) {
      $.each(data.errors, function(index, value) {
        var errorDiv = "#" + index + "_error";
        $(errorDiv).addClass("required");
        $(errorDiv)
          .empty()
          .append(value);
      });
      $("#successMessage").empty();
    }
    if (data.success) {
      $(".register").fadeOut(); //hiding Reg form
      var successContent =
        '<div class="message"><h3>Registration Completed Successfully</h3><h4>Please Login With the Following Details</h4><div class="userDetails"><p><span>Email:</span>' +
        data.email +
        "</p><p><span>Password:********</span></p></div></div>";
      $("#successMessage").html(successContent);
    } //success
  }); //done
});

//leccion 7
function mostrarficha(id_usuario, tipo) {
  //funcion para mostrar y etditar la informacion del usuario

  $("#usuario_seleccionado").val(id_usuario); // leccion10
  // $("#capa_modal").show();
  // $("#capa_para_edicion").show();
  $("#Modal_evento").modal("show");
  if (tipo == 1) {
    var url = "form_editar_usuario/" + id_usuario + "";
  } else {
    var url = "form_editar_usuario/" + id_usuario + "";
  }
  //if(tipo==1){var url = "form_editar_prospecto/"+id_usuario+""; }else{ var url = "info_datos_usuario/"+id_usuario+""; }
  $("#contenido_capa_edicion_evento").html($("#cargador_empresa").html()); //leccion 10
  $.get(url, function(resul) {
    $("#contenido_capa_edicion_evento").html(resul); //leccion 10
  });
  irarriba();
}

function mostrarinterest(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario

  $("#usuario_seleccionado").val(id_usuario); // leccion10
  // $("#capa_modal_evento").show();
  // $("#capa_para_edicion_evento").show();
  $("#Modal_evento").modal("show");
  console.log("Se mostro el modal");
  var url = "form_editar_interest/" + id_usuario + "";
  //if(tipo==1){var url = "form_editar_prospecto/"+id_usuario+""; }else{ var url = "info_datos_usuario/"+id_usuario+""; }
  $("#contenido_capa_edicion_evento").html($("#cargador_empresa").html()); //leccion 10
  $.get(url, function(resul) {
    $("#contenido_capa_edicion_evento").html(resul); //leccion 10
    cargarlistado(9, 1);
  });
  irarriba();
}

function mostrarstatus(id_status) {
  //funcion para mostrar y etditar la informacion del usuario

  $("#usuario_seleccionado").val(id_status); // leccion10
  // $("#capa_modal_evento").show();
  // $("#capa_para_edicion_evento").show();
  $("#Modal_evento").modal("show");
  {
    var url = "form_editar_status/" + id_status + "";
  }
  //if(tipo==1){var url = "form_editar_prospecto/"+id_usuario+""; }else{ var url = "info_datos_usuario/"+id_usuario+""; }
  $("#contenido_capa_edicion_evento").html($("#cargador_empresa").html()); //leccion 10
  $.get(url, function(resul) {
    $("#contenido_capa_edicion_evento").html(resul); //leccion 10
    // cargarlistado(10,1);
  });
  irarriba();
}

function mostrarcuenta(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario

  $("#usuario_seleccionado").val(id_usuario); // leccion10
  // $("#capa_modal_evento").show();
  // $("#capa_para_edicion_evento").show();
  $("#Modal_evento").modal("show");
  {
    var url = "form_editar_cuenta/" + id_usuario + "";
  }
  //if(tipo==1){var url = "form_editar_prospecto/"+id_usuario+""; }else{ var url = "info_datos_usuario/"+id_usuario+""; }
  $("#contenido_capa_edicion_evento").html($("#cargador_empresa").html()); //leccion 10
  $.get(url, function(resul) {
    $("#contenido_capa_edicion_evento").html(resul); //leccion 10
    cargarlistado(11, 1);
  });
  irarriba();
}

function mostrarcuentacliente(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario

  $("#usuario_seleccionado").val(id_usuario); // leccion10
  // $("#capa_modal_evento").show();
  // $("#capa_para_edicion_evento").show();
  $("#Modal_evento").modal("show");
  {
    var url = "form_editar_cuenta/" + id_usuario + "";
  }
  //if(tipo==1){var url = "form_editar_prospecto/"+id_usuario+""; }else{ var url = "info_datos_usuario/"+id_usuario+""; }
  $("#contenido_capa_edicion_evento").html($("#cargador_empresa").html()); //leccion 10
  $.get(url, function(resul) {
    $("#contenido_capa_edicion_evento").html(resul); //leccion 10
    cargarlistado(12, 1);
  });
  irarriba();
}

function mostrarevento(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario

  $("#usuario_seleccionado").val(id_usuario); // leccion10
  // $("#capa_modal_evento").show();
  // $("#capa_para_edicion_evento").show();
  $("#Modal_evento").modal("show");
  {
    var url = "form_editar_evento/" + id_usuario + "";
  }
  //if(tipo==1){var url = "form_editar_prospecto/"+id_usuario+""; }else{ var url = "info_datos_usuario/"+id_usuario+""; }
  $("#contenido_capa_edicion_evento").html($("#cargador_empresa").html()); //leccion 10
  $.get(url, function(resul) {
    $("#contenido_capa_edicion_evento").html(resul); //leccion 10
  });
  irarriba();
}

function mostrarempresa(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario

  $("#usuario_seleccionado").val(id_usuario); // leccion10
  // $("#capa_modal_evento").show();
  // $("#capa_para_edicion_evento").show();
  $("#Modal_evento").modal("show");
  {
    var url = "form_asignar_empresa_suscriptor/" + id_usuario + "";
  }
  //if(tipo==1){var url = "form_editar_prospecto/"+id_usuario+""; }else{ var url = "info_datos_usuario/"+id_usuario+""; }
  $("#contenido_capa_edicion_evento").html($("#cargador_empresa").html()); //leccion 10
  $.get(url, function(resul) {
    $("#contenido_capa_edicion_evento").html(resul); //leccion 10
  });
  irarriba();
}

function mostrarseguimientopendiente(id_usuario) {
  //funcion para mostrar y etditar la informacion del usuario

  $("#usuario_seleccionado").val(id_usuario); // leccion10
  // $("#capa_modal_evento").show();
  // $("#capa_para_edicion_evento").show();
  $("#Modal_evento").modal("show");
  {
    var url = "form_editar_seguimiento_pendiente/" + id_usuario + "";
  }
  //if(tipo==1){var url = "form_editar_prospecto/"+id_usuario+""; }else{ var url = "info_datos_usuario/"+id_usuario+""; }
  $("#contenido_capa_edicion_evento").html($("#cargador_empresa").html()); //leccion 10
  $.get(url, function(resul) {
    $("#contenido_capa_edicion_evento").html(resul); //leccion 10
  });
  irarriba();
}

function mostrarprospecto(id_usuario, seccion = "") {
  $("#usuario_seleccionado").val(id_usuario); // leccion10
  // $("#capa_modal").show();
  // $("#capa_para_edicion").show();
  //=================================
  // Se limpia los datos del modal para ser mostrados con los nuevos datos
  $("#tabs").html("");
  $("#contenido-tabs").html("");
  //=================================
  //Se agrega las cabeceras necesarias
  var editar =
    '<li class="active"> ' +
    '<a data-toggle="pill" href="#editar">Info</a>' +
    "</li>";
  var contenido = '<div id="editar" class="tab-pane fade in active"></div>';
  $("#tabs").append(editar);
  $("#contenido-tabs").append(contenido);
  //=========================================

  $("#Modal_contenido").modal("show");
  var url = "form_editar_prospecto/" + id_usuario + "";
  $("#loader").html($("#cargador_empresa").html()); //leccion 10
  $.get(url, function(resul) {
    $("#loader").html("");
    $("#editar").html(resul); //leccion 10
  });
  //pendiente mirar como automatizar o hacer dinamico la seleccion de vistas
  //dependiendo del tipo usuario
  //la idea es obtener el arreglo
  console.log("se va ac argar las secciones");
  if (seccion === "") {
    seccion = [8, 5, 11, 6, 3, 10, 12];
  }
  for (let i = 0; i < seccion.length; i++) {
    mostrarseccion(seccion[i]);
  }
}

function mostrarlead(id_usuario) {
  $("#usuario_seleccionado").val(id_usuario);
  $("#tabs").html("");
  $("#contenido-tabs").html("");
  var editar =
    '<li class="active"> ' +
    '<a data-toggle="pill" href="#13">Informacion</a>' +
    "</li>";
  var contenido = '<div id="13" class="tab-pane fade in active"></div>';

  $("#tabs").append(editar);
  $("#contenido-tabs").append(contenido);

  $("#Modal_contenido").modal("show");
  $("#loader").html($("#cargador_empresa").html());
  var url = getRuta(13, id_usuario).ruta;
  $("#loader").html($("#cargador_empresa").html()); //leccion 10
  $.get(url, function(resul) {
    $("#loader").html("");
    $("#13").html(resul); //leccion 10
  });
  //funcion para mostrar y etditar la informacion del lead consultado
  let seccion = [14, 15];
  for (let i = 0; i < seccion.length; i++) {
    mostrarseccion(seccion[i]);
  }
}

function getRuta(index, id_usuario = "") {
  var urls = [
    { id: 0, alias: "Vacio", ruta: "vacio" },
    { id: 1, alias: "Editar", ruta: "form_editar_usuario/" + id_usuario },
    { id: 2, alais: "Educacion", ruta: "form_educacion_usuario/" + id_usuario },
    {
      id: 3,
      alias: "Publicaciones",
      ruta: "form_publicaciones_usuario/" + id_usuario
    },
    { id: 4, alias: "Proyectos", ruta: "form_proyectos_usuario/" + id_usuario },
    {
      id: 5,
      alias: "Observaciones",
      ruta: "form_observaciones_prospecto/" + id_usuario
    },
    { id: 6, alias: "Eventos", ruta: "form_eventos_prospecto/" + id_usuario },
    { id: 7, alias: "Editar_evento", ruta: "form_editar_evento/" + id_usuario },
    { id: 8, alias: "Cuentas", ruta: "form_cuentas_cliente/" + id_usuario },
    { id: 9, alias: "Pyg", ruta: "form_pyg_proyecto/" + id_usuario },
    { id: 10, alias: "Pagos", ruta: "form_pagos_cliente/" + id_usuario },
    {
      id: 11,
      alias: "Cronograma",
      ruta: "form_cronograma_proyecto/" + id_usuario
    },
    {
      id: 12,
      alias: "Compartir",
      ruta: "form_compartir_proyecto/" + id_usuario
    },
    {
      id: 13,
      tipo: "lead",
      alias: "informacion",
      ruta: "form_editar_lead/" + id_usuario
    },
    {
      id: 14,
      tipo: "lead",
      alias: "seguimientos",
      ruta: "form_seguimiento_lead/" + id_usuario
    },
    {
      id: 15,
      tipo: "lead",
      alias: "asignar a comercial",
      ruta: "form_asignar_comercial/" + id_usuario
    }
  ]; //1 // 2 // 3 // 4 // 5 //6 // 7 //8 //9 //10 //11
  let url = urls.find(url => {
    return url.id === index;
  });
  if (url === undefined) {
    return { alias: "desconocido", ruta: "/" };
  }
  return url;
}
function recargarSeccion(arg) {
  var id_usuario = $("#usuario_seleccionado").val();
  var vista = getRuta(arg, id_usuario);
  console.log(
    "se va recargar la seccion No: " +
      arg +
      " alias: " +
      vista.alias +
      " ruta: " +
      vista.ruta
  );
  $("#loader").html($("#cargador_empresa").html());
  if (vista.ruta !== "/") {
    $.get(vista.ruta, function(resul) {
      $("#loader").html("");
      var res =
        '<div id="' + arg + '" class="tab-pane fade in">' + resul + "</div>";
      $("#" + arg).html(res);
    });
  }
}

function mostrarseccion(arg) {
  var id_usuario = $("#usuario_seleccionado").val();
  var vista = getRuta(arg, id_usuario);
  console.log(
    "se va cargar la seccion No: " +
      arg +
      " alias: " +
      vista.alias +
      " ruta: " +
      vista.ruta
  );
  $("#loader").html($("#cargador_empresa").html());

  $.get(vista.ruta, function(resul) {
    $("#loader").html("");
    var tab =
      '<li id="tab' +
      arg +
      '"><a data-toggle="pill" href="#' +
      arg +
      '">' +
      vista.alias +
      "</a></li>";
    var res =
      '<div id="' + arg + '" class="tab-pane fade in">' + resul + "</div>";
    $("#tabs").append(tab);
    $("#contenido-tabs").append(res);
  });
}

// $(document).on("click",".div_modal",function(e){
//  //funcion para ocultar las capas modales
//  $("#capa_modal").hide();
//  $("#capa_para_edicion").hide();
//  $("#contenido_capa_edicion").html("");
//   $("#capa_modal_evento").hide();
//    $("#capa_para_edicion_evento").hide();
// });

// $(document).on("click",".close-button",function(e){
//  //funcion para ocultar las capas modales
//  $("#capa_modal").hide();
//  $("#capa_para_edicion").hide();
//  $("#contenido_capa_edicion").html("");
//   $("#capa_modal_evento").hide();
//    $("#capa_para_edicion_evento").hide();
//    location.reload(true);
// });

// $(document).on("click",".div_modal_evento",function(e){
//  //funcion para ocultar las capas modales
//  $("#capa_modal").hide();
//  $("#capa_para_edicion").hide();
//  $("#contenido_capa_edicion").html("");
//   $("#capa_modal_evento").hide();
//    $("#capa_para_edicion_evento").hide();
// });

//leccion 8 y 9
$(document).on("submit", ".formarchivo", function(e) {
  e.preventDefault();
  var formu = $(this);
  var nombreform = $(this).attr("id");
  var rs = false; //leccion 10
  var seccion_sel = $("#seccion_seleccionada").val();
  if (nombreform == "f_subir_imagen") {
    var miurl = "subir_imagen_usuario";
    var divresul = "notificacion_resul_fci";
  }
  if (nombreform == "f_cargar_datos_usuarios") {
    var miurl = "cargar_datos_usuarios";
    var divresul = "notificacion_resul_fcdu";
    rs = true;
  }
  if (nombreform == "f_agregar_publicacion") {
    var miurl = "agregar_publicacion_usuario";
    var divresul = "notificacion_resul_fap";
    rs = true;
  }
  if (nombreform == "f_nuevo_proyecto_usuario") {
    var mirurl = "agregar_nuevo_proyecto_usuario";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  if (nombreform == "f_agregar_observacion") {
    var miurl = "agregar_observacion_prospecto";
    var divresul = "notificacion_resul_fap";
    rs = true;
    seccion_sel = 5;
  }
  if (nombreform == "f_cronograma_proyecto") {
    var miurl = "nuevo_evento_cronograma_proyecto";
    var divresul = "notificacion_resul_fanu";
    rs = true;
  }
  if (nombreform == "f_agregar_proyectos") {
    var miurl = "agregar_proyectos_usuario";
    var divresul = "notificacion_resul_fapr";
    rs = true;
  }
  if (nombreform == "f_enviar_correo") {
    var miurl = "enviar_correo";
    var divresul = "contenido_principal";
  }
  if (nombreform == "fullCalModal") {
    var miurl = "vista_evento";
    var divresul = "notificacion_resul_fap";
    rs = true;
  }
  if (nombreform == "f_cuentas_cliente") {
    var miurl = "form_cuentas_cliente";
    var divresul = "notificacion_resul_fap";
  }
  if (nombreform == "f_agregar_item") {
    var miurl = "agregar_item";
    var divresul = "notificacion_resul_fap";
    rs = true;
  }
  if (nombreform == "f_agregar_seguimiento_lead") {
    var miurl = "agregar_seguimiento_lead";
    var divresul = "notificacion_resul_fap";
    rs = true;
    seccion_sel = 14;
  }
  if (nombreform == "f_asignar_comercial") {
    var miurl = "asignar_prospecto";
    var divresul = "notificacion_resul_fap";
    rs = true;
    seccion_sel = 15;
  }
  if (nombreform == "f_editar_lead") {
    var miurl = "editar_lead";
    var divresul = "notificacion_resul_fap";
    rs = true;
    seccion_sel = 13;
  }
  if (nombreform == "f_asignar_comercial") {
    var miurl = "asignar_prospecto";
    var divresul = "notificacion_resul_fap";
    rs = true;
    seccion_sel = 15;
  }

  // if(nombreform=="buscar_todos_prospectos" ){ var miurl="buscar_prospecto/{dato?}";  var divresul="notificacion_resul_fap"; rs=true; }
  //información del formulario
  var formData = new FormData($("#" + nombreform + "")[0]);

  //hacemos la petición ajax
  $.ajax({
    url: miurl,
    type: "POST",

    // Form data
    //datos del formulario
    data: formData,
    //necesario para subir archivos via ajax
    cache: false,
    contentType: false,
    processData: false,
    //mientras enviamos el archivo
    beforeSend: function() {
      $("#" + divresul + "").html($("#cargador_empresa").html());
    },
    //una vez finalizado correctamente
    success: function(data) {
      $("#" + divresul + "").html(data);
      // $("#fotografia_usuario").attr(
      //   "src",
      //   $("#fotografia_usuario").attr("src") + "?" + Math.random()
      // );

      if (rs) {
        $("#" + nombreform + "").trigger("reset");
        recargarSeccion(seccion_sel);
      }
    },
    //si ha ocurrido un error
    error: function(data) {
      alert("ha ocurrido un error");
    }
  });

  irarriba();
});

//leccion  10

//leccion 16
function mostrarseccionSTD(arg) {
  var id_usuario = $("#usuario_seleccionado").val();
  $("#seccion_seleccionada").val(arg);
  if (arg == 1) {
    var url = "info_datos_usuario/" + id_usuario + "";
  }
  $("#contenido_capa_edicion").html($("#cargador_empresa").html());
  $.get(url, function(resul) {
    $("#contenido_capa_edicion").html(resul);
  });
}

function borrareducacion(arg) {
  var url = "borrar_educacion/" + arg + "";
  var divresul = "notificacion_resul_edu";
  $("#" + divresul + "").html($("#cargador_empresa").html());

  $.get(url, function(resul) {
    $("#" + divresul + "").html(resul);
    mostrarseccion(2);
  });
}

function mostrardiv_publicaciones(arg) {
  $("#info_libro").hide();
  $("#info_revista").hide();
  if (arg == 5) {
    $("#info_libro").show();
    $("#info_revista").hide();
  }
  if (arg == 4) {
    $("#info_libro").hide();
    $("#info_revista").show();
  }
}

function borrarpublicacion(arg) {
  var con = confirm("Are you sure to delete this doc?");
  if (con) {
    var url = "borrar_publicacion/" + arg + "";
    var divresul = "notificacion_resul_fapu";
    $("#" + divresul + "").html($("#cargador_empresa").html());

    $.get(url, function(resul) {
      $("#" + divresul + "").html(resul);
      mostrarseccion(3);
    });
  } else {
    console.log("Cancelado");
  }
}

function borrarprospecto(arg) {
  var con = confirm(
    "Estas seguro de querer hacer lo que vas hacer? Reflexiona!"
  );
  if (con) {
    var url = "borrar_prospecto/" + arg + "";
    var divresul = "notificacion_resul_fapu";
    $("#" + divresul + "").html($("#cargador_empresa").html());

    $.get(url, function(resul) {
      $("#" + divresul + "").html(resul);
      $("#capa_modal").hide();
      $("#capa_para_edicion").hide();
      //$("#contenido_capa_edicion").html("");
      $("#capa_modal_evento").hide();
      $("#capa_para_edicion_evento").hide();
      cargarlistado(7, 1);
    });
  } else {
    console.log("Cancelado");
  }
}

function borrareventlist(arg) {
  var con = confirm("Are you sure to delete this event?");
  if (con) {
    var url = "borrar_event_list/" + arg + "";
    var divresul = "notificacion_resul_fapu";
    $("#" + divresul + "").html($("#cargador_empresa").html());

    $.get(url, function(resul) {
      $("#" + divresul + "").html(resul);
      cargarlistado(8, 1);
    });
  } else {
    console.log("Cancelado");
  }
}

function borrareventmodal(arg) {
  var con = confirm("Are you sure to delete this event?");
  if (con) {
    var url = "borrar_event_list/" + arg + "";
    var divresul = "notificacion_resul_fanu";
    $("#" + divresul + "").html($("#cargador_empresa").html());

    $.get(url, function(resul) {
      $("#" + divresul + "").html(resul);
      $("#capa_modal").hide();
      $("#capa_para_edicion").hide();
      //$("#contenido_capa_edicion").html("");
      $("#capa_modal_evento").hide();
      $("#capa_para_edicion_evento").hide();
      cargarlistado(8, 1);
    });
  } else {
    console.log("Cancelado");
  }

  function borrarprospectomodal(arg) {
    var con = confirm("Are you sure to delete this lead?");
    if (con) {
      var url = "borrar_prospecto/" + arg + "";
      var divresul = "notificacion_resul_fapu";
      $("#" + divresul + "").html($("#cargador_empresa").html());

      $.get(url, function(resul) {
        //   $("#"+divresul+"").html(resul);
        $("#capa_modal").hide();
        $("#capa_para_edicion").hide();
        //$("#contenido_capa_edicion").html("");
        $("#capa_modal_evento").hide();
        $("#capa_para_edicion_evento").hide();
        cargarlistado(7, 1);
      });
    } else {
      console.log("Cancelado");
    }
  }
}

function borrarinterestmodal(arg) {
  var con = confirm("Estás seguro(a) de borar este producto de interés?");
  if (con) {
    var url = "borrar_interest/" + arg + "";
    var divresul = "notificacion_resul_fapu";
    $("#" + divresul + "").html($("#cargador_empresa").html());

    $.get(url, function(resul) {
      $("#" + divresul + "").html(resul);
      $("#capa_modal").hide();
      $("#capa_para_edicion").hide();
      //$("#contenido_capa_edicion").html("");
      $("#capa_modal_evento").hide();
      $("#capa_para_edicion_evento").hide();
      cargarlistado(9, 1);
    });
  } else {
    console.log("Cancelado");
  }
}

function borrarstatusmodal(arg) {
  var con = confirm("Estás seguro(a) de borar esta del negocio?");
  if (con) {
    var url = "borrar_status/" + arg + "";
    var divresul = "notificacion_resul_fapu";
    $("#" + divresul + "").html($("#cargador_empresa").html());

    $.get(url, function(resul) {
      $("#" + divresul + "").html(resul);
      $("#capa_modal").hide();
      $("#capa_para_edicion").hide();
      //$("#contenido_capa_edicion").html("");
      $("#capa_modal_evento").hide();
      $("#capa_para_edicion_evento").hide();
      cargarlistado(10);
    });
  } else {
    console.log("Cancelado");
  }
}
function borrarSeguimientoLEAD(arg, seccion = 14) {
  var con = confirm("Are you sure to delete this note?");
  if (con) {
    var url = "borrar_seguimiento_lead/" + arg + "";
    var divresul = "notificacion_resul_fapu";
    $("#" + divresul + "").html($("#cargador_empresa").html());

    $.get(url, function(resul) {
      $("#" + divresul + "").html(resul);
      recargarSeccion(seccion);
    });
  } else {
    console.log("Cancelado");
  }
}

function borrarobservacion(arg, seccion = 5) {
  var con = confirm("Are you sure to delete this note?");
  if (con) {
    var url = "borrar_observacion/" + arg + "";
    var divresul = "notificacion_resul_fapu";
    $("#" + divresul + "").html($("#cargador_empresa").html());

    $.get(url, function(resul) {
      $("#" + divresul + "").html(resul);
      recargarSeccion(seccion);
    });
  } else {
    console.log("Cancelado");
  }
}

function borrarevento(arg) {
  //  var $id->Eventos::find($id)

  var url = "borrar_evento/" + arg + "";
  var divresul = "notificacion_resul_fanu";
  $("#" + divresul + "").html($("#cargador_empresa").html());

  $.get(url, function(resul) {
    $("#" + divresul + "").html(resul);
    mostrarseccion(5);
  });
}

function borrarproyecto(arg) {
  var url = "borrar_proyecto/" + arg + "";
  var divresul = "notificacion_resul_faprd";
  $("#" + divresul + "").html($("#cargador_empresa").html());

  $.get(url, function(resul) {
    $("#" + divresul + "").html(resul);
    mostrarseccion(4);
  });
}

function borrartransaccion(arg) {
  var con = confirm("Seguro que deseas eliminar esta transacción?");
  if (con) {
    var url = "borrar_transaccion/" + arg + "";
    var divresul = "notificacion_resul_fapu";
    $("#" + divresul + "").html($("#cargador_empresa").html());

    $.get(url, function(resul) {
      $("#" + divresul + "").html(resul);
      mostrarseccion(9);
    });
  } else {
    console.log("Cancelado");
  }
}

function buscarusuario() {
  var pais = $("#select_filtro_pais").val();
  var dato = $("#dato_buscado").val();
  if (dato == "") {
    var url = "buscar_usuarios/" + pais + "";
  } else {
    var url = "buscar_usuarios/" + pais + "/" + dato + "";
  }

  $("#contenido_principal").html($("#cargador_empresa").html());
  $.get(url, function(resul) {
    $("#contenido_principal").html(resul);
  });
}

function buscarprospecto() {
  //var pais=$("#select_filtro_pais").val();
  var dato = $("#dato_buscado").val();
  if (dato == "") {
    var url = "buscar_prospecto/" + dato + "";
  } else {
    var url = "buscar_prospecto/" + dato + "";
  }

  $("#contenido_principal").html($("#cargador_empresa").html());
  $.get(url, function(resul) {
    $("#contenido_principal").html(resul);
  });
}

//leccion 13

$(document).on("change", ".email_archivo", function(e) {
  var miurl = "cargar_archivo_correo";
  // var fileup=$("#file").val();
  var divresul = "texto_notificacion";

  var data = new FormData();
  data.append("file", $("#file")[0].files[0]);

  console.log(data);

  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $("#_token").val()
    }
  });

  $.ajax({
    url: miurl,
    type: "POST",

    // Form data
    //datos del formulario
    data: data,
    //necesario para subir archivos via ajax
    cache: false,
    contentType: false,
    processData: false,
    //mientras enviamos el archivo
    beforeSend: function() {
      $("#" + divresul + "").html($("#cargador_empresa").html());
    },
    //una vez finalizado correctamente
    success: function(data) {
      var codigo =
        '<div class="mailbox-attachment-info"><a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>' +
        data +
        '</a><span class="mailbox-attachment-size"> </span></div>';
      $("#" + divresul + "").html(codigo);
    },
    //si ha ocurrido un error
    error: function(data) {
      $("#" + divresul + "").html(data);
    }
  });
});
