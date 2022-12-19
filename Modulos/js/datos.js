var contador = 0;
var contadorSeg = 0;
let rutaInicial = "../../php/";
$(document).ready(function () {
  obtenerSesion();
  datosPorDefecto();
  cantidadSiniestros(0, 3, "de0a2");
  cantidadSiniestros(3, 6, "de3a5");
  cantidadSiniestros(6, 15, "de6a14");
  cantidadSiniestros(15, 35, "mas15");
  cantidadSiniestrosDetalles(0, 3, "terminados", "de0a2");
  cantidadSiniestrosDetalles(0, 3, "seguimiento", "de0a2");
  cantidadSiniestrosDetalles(0, 3, "incorrectos", "de0a2");
  cantidadSiniestrosDetalles(3, 6, "terminados", "de3a5");
  cantidadSiniestrosDetalles(3, 6, "seguimiento", "de3a5");
  cantidadSiniestrosDetalles(3, 6, "incorrectos", "de3a5");
  cantidadSiniestrosDetalles(6, 15, "terminados", "de6a14");
  cantidadSiniestrosDetalles(6, 15, "seguimiento", "de6a14");
  cantidadSiniestrosDetalles(6, 15, "incorrectos", "de6a14");
  cantidadSiniestrosDetalles(15, 35, "terminados", "mas15");
  cantidadSiniestrosDetalles(15, 35, "seguimiento", "mas15");
  cantidadSiniestrosDetalles(15, 35, "incorrectos", "mas15");
  estaciones();
  controlPaginado();
  enviarImagenes();
  consultaUsuarios();
  descargarEnZip();
  mostrarDivsModal();
  $("#generarPassword").click(function () {
    generarPassword();
  });
  $("#btnCopiaLink").click(function () {
    let codigoACopiar = document.getElementById("linkCliente");
    navigator.clipboard.writeText(codigoACopiar.innerHTML);
  });
  $("#btnCopiaUsuario").click(function () {
    let codigoACopiar = document.getElementById("txtUsuario");
    navigator.clipboard.writeText(codigoACopiar.innerHTML);
  });
  $("#btnCopiaPassword").click(function () {
    let codigoACopiar = document.getElementById("passwordGenerada");
    navigator.clipboard.writeText(codigoACopiar.innerHTML);
  });
  $("#btnOffCanvasCita").click(function () {
    obtenerCitaActiva();
    operadoresAtlas();
    $("#txtSiniestro").val($("#numSiniestro").val());
  });
  $("#btnGuardarCita").click(function () {
    guardarCita();
  });
  //funcion para limpiar el regitro
  $("#limpiarRegistro").click(function () {
    $(".filtrosBusqueda").val($(".filtrosBusqueda option:first").val());
  });
  $("#btnEliminarCita").click(function () {
    eliminarCita();
  });
});
//funcion para sesiones
function obtenerSesion() {
  $.ajax({
    type: "POST",
    url: rutaInicial + "ObtenerSesion.php",
    dataType: "json",
    data: {
      accion: "Privilegios",
    },
  }).done(function (result) {
    if (
      result.Siniestros[0].privilegios === "root" ||
      result.Siniestros[0].privilegios === "supervisor"
    ) {
      $(".btnEliminar").show(); //muestro mediante clase
    }
  });
}
//funcion para mostrar la cantidad de siniestros
function cantidadSiniestros(mayor, menor, idCantidad) {
  $.ajax({
    method: "POST",
    url: rutaInicial + "CantidadSiniestros.php",
    dataType: "json",
    data: {
      accion: "SiniestrosEnRespuesta",
      mayor,
      menor,
    },
    success: function (result) {
      // console.log(result);
      $("#" + idCantidad).html(result.Siniestros[0].conteo);
    },
  });
}
//funcion para mostrar a detalle el esttus de los siniestros
function cantidadSiniestrosDetalles(mayor, menor, accion, dias) {
  $.ajax({
    method: "POST",
    url:
      rutaInicial +
      "CantidadSiniestrosDetalles/CantidadSiniestrosTerminados.php",
    dataType: "json",
    data: {
      accion,
      mayor,
      menor,
    },
    success: function (result) {
      if (accion === "terminados") {
        document.getElementById(accion + "" + dias).textContent =
          result.terminados[0].contador;
      } else if (accion === "seguimiento") {
        document.getElementById(accion + "" + dias).textContent =
          result.seguimiento[0].contador;
      } else if (accion === "incorrectos") {
        document.getElementById(accion + "" + dias).textContent =
          result.incorrectos[0].contador;
      }
    },
  });
}
function estaciones() {
  $("#txtEstatusSeguimiento").change(function () {
    let estatus = $("#txtEstatusSeguimiento").val();
    if (
      estatus ===
        "CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)" ||
      estatus === "CON CONTACTO SIN COOPERACION DEL CLIENTE" ||
      estatus === "CASO REABIERTO" ||
      estatus === "CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)" ||
      estatus === "TERMINADO ENTREGA ORIGINALES EN OFICINA" ||
      estatus === "TERMINADO POR PROCESO COMPLETO" ||
      estatus === "TOTAL DE DOCUMENTOS"
    ) {
      $("#txtSubEstacion").empty();
      $("#txtSubEstacion").append(
        "<option value='Terminado' >Terminado</option>"
      );
      document.getElementById("txtEstacionSoloLectura").value = "Terminado";
    } else if (
      estatus === "CON CONTACTO SIN DOCUMENTOS" ||
      estatus === "DE 1 A 3 DOCUMENTOS" ||
      estatus === "DE 4 A 6 DOCUMENTOS" ||
      estatus === "DE 7 A 10 DOCUMENTOS" ||
      estatus === "SIN CONTACTO"
    ) {
      $("#txtSubEstacion").empty();
      $("#txtSubEstacion").append(
        "<option value='En seguimiento'>En seguimiento</option>"
      );
      document.getElementById("txtEstacionSoloLectura").value =
        "En seguimiento";
    } else if (
      estatus === "DATOS INCORRECTOS" ||
      estatus === "SIN CONTACTO EN 30 DIAS"
    ) {
      $("#txtSubEstacion").empty();
      $("#txtSubEstacion").append(
        "<option value='Cancelado'>Cancelado</option>"
      );
      document.getElementById("txtEstacionSoloLectura").value = "Cancelado";
    }
  });
  let estatus = $("#txtEstatusSeguimiento").val();
  if (
    estatus ===
      "CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)" ||
    estatus === "CON CONTACTO SIN COOPERACION DEL CLIENTE" ||
    estatus === "CASO REABIERTO" ||
    estatus === "CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)" ||
    estatus === "TERMINADO ENTREGA ORIGINALES EN OFICINA" ||
    estatus === "TERMINADO POR PROCESO COMPLETO" ||
    estatus === "TOTAL DE DOCUMENTOS"
  ) {
    $("#txtSubEstacion").empty();
    $("#txtSubEstacion").append(
      "<option value='Terminado' >Terminado</option>"
    );
    document.getElementById("txtEstacionSoloLectura").value = "Terminado";
  } else if (
    estatus === "CON CONTACTO SIN DOCUMENTOS" ||
    estatus === "DE 1 A 3 DOCUMENTOS" ||
    estatus === "DE 4 A 6 DOCUMENTOS" ||
    estatus === "DE 7 A 10 DOCUMENTOS" ||
    estatus === "SIN CONTACTO"
  ) {
    $("#txtSubEstacion").empty();
    $("#txtSubEstacion").append(
      "<option value='En seguimiento'>En seguimiento</option>"
    );
    document.getElementById("txtEstacionSoloLectura").value = "En seguimiento";
  } else if (
    estatus === "DATOS INCORRECTOS" ||
    estatus === "SIN CONTACTO EN 30 DIAS"
  ) {
    $("#txtSubEstacion").empty();
    $("#txtSubEstacion").append("<option value='Cancelado'>Cancelado</option>");
    document.getElementById("txtEstacionSoloLectura").value = "Cancelado";
  }
}
function busquedaFiltro(thisValue, accion, columna) {
  $.ajax({
    method: "POST",
    url: rutaInicial + "Busquedas.php",
    dataType: "json",
    data: {
      filtro: thisValue,
      columna,
      accion,
    },
    success: function (result) {
      mostrarTabla(result);
    },
  });
}
function mostrarTabla(result) {
  //funcion para generar talbas en automatico con lo resultados
  let tablaDatos = document.getElementById("DatosTabla");
  $(".tablaActual").remove();
  $(".tBody").remove();
  let numeroTBody = 0;
  let tblBody = new Array();
  tblBody[numeroTBody] = document.createElement("tbody");
  tblBody[numeroTBody].setAttribute("class", "tBody");
  tblBody[numeroTBody].setAttribute("id", "tBody:" + numeroTBody);
  tablaDatos.appendChild(tblBody[numeroTBody]);

  for (let i in result.Siniestros) {
    if (i % 10 == 0 && i != 0) {
      numeroTBody += 1;
      tblBody[numeroTBody] = document.createElement("tbody");
      tblBody[numeroTBody].setAttribute("class", "tBody");
      tblBody[numeroTBody].setAttribute("id", "tBody:" + numeroTBody);
      tblBody[numeroTBody].style.display = "none";
      tablaDatos.appendChild(tblBody[numeroTBody]);
      // Creando los 'td' que almacenará cada parte de la información del usuario actual
      let btnGrupo = `<td><div class="btn-group tablaActual botonesTabla" role="group">
      <button type='button' id=${
        result.Siniestros[i].idRegistro + ",Eliminar"
      } class='btnEliminar btn btn-danger'
      onclick='eliminarSiniestro(this.id)' style='display:none'>
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
      stroke-linejoin="round" class="feather feather-trash-2">
      <polyline points="3 6 5 6 21 6"></polyline>
      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
      <line x1="10" y1="11" x2="10" y2="17"></line>
      <line x1="14" y1="11" x2="14" y2="17"></line>
      </svg></button>
      <button type='button' id=${
        result.Siniestros[i].idRegistro
      } class='btn btn-primary' data-bs-toggle='modal'
      data-bs-target='#despliegueInfo'  onclick='mostrarInfoSiniestro(this.id)' value='Editar'><svg xmlns='http://www.w3.org/2000/svg'
      width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
      <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 
      1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
      <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 
      0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
      </svg></button>
    </div></td>`;
      registro = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].idRegistro}</td>`;
      siniestro = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].numSiniestro}</td>`;
      poliza = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].poliza}</td>`;
      marca = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].marca}</td>`;
      modelo = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].modelo}</td>`;
      serie = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].numSerie}</td>`;
      carga = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].fechaCarga}</td>`;
      estacion = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].estacionProceso}</td>`;
      estatus = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].estatusOperativo}</td>`;
      porcentajeDocs = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].porcentajeDocs}</td>`;
      porcentajeTotal = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].porcentajeTotal}</td>`;
      estado = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].estado}</td>`;
      tblBody[numeroTBody].innerHTML += `<tr class='tablaActual'>${
        btnGrupo +
        registro +
        siniestro +
        poliza +
        marca +
        modelo +
        serie +
        carga +
        estacion +
        estatus +
        estado +
        porcentajeDocs +
        porcentajeTotal
      }</tr>`;
    } else {
      // Creando los 'td' que almacenará cada parte de la información del usuario actual
      let btnGrupo = `<td><div class="btn-group tablaActual botonesTabla" role="group">
      <button type='button' id=${
        result.Siniestros[i].idRegistro + ",Eliminar"
      } class='btnEliminar btn btn-danger'
      onclick='eliminarSiniestro(this.id)' style='display:none'>
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
      stroke-linejoin="round" class="feather feather-trash-2">
      <polyline points="3 6 5 6 21 6"></polyline>
      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
      <line x1="10" y1="11" x2="10" y2="17"></line>
      <line x1="14" y1="11" x2="14" y2="17"></line>
      </svg></button>
      <button type='button' id=${
        result.Siniestros[i].idRegistro
      } class='btn btn-primary' data-bs-toggle='modal'
      data-bs-target='#despliegueInfo'  onclick='mostrarInfoSiniestro(this.id)' value='Editar'><svg xmlns='http://www.w3.org/2000/svg'
      width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
      <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 
      1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
      <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 
      0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
      </svg></button>
    </div></td>`;
      registro = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].idRegistro}</td>`;
      siniestro = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].numSiniestro}</td>`;
      poliza = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].poliza}</td>`;
      marca = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].marca}</td>`;
      modelo = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].modelo}</td>`;
      serie = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].numSerie}</td>`;
      carga = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].fechaCarga}</td>`;
      estacion = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].estacionProceso}</td>`;
      estatus = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].estatusOperativo}</td>`;
      porcentajeDocs = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].porcentajeDocs}%</td>`;
      porcentajeTotal = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].porcentajeTotal}%</td>`;
      estado = `<td style='font-size: 13px' class='tablaActual'>${result.Siniestros[i].estado}</td>`;
      tblBody[numeroTBody].innerHTML += `<tr class='tablaActual'>${
        btnGrupo +
        registro +
        siniestro +
        poliza +
        marca +
        modelo +
        serie +
        carga +
        estacion +
        estatus +
        estado +
        porcentajeDocs +
        porcentajeTotal
      }</tr>`;
    }
  }
  obtenerSesion();
}
function datosPorDefecto() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "BusquedaSinFiltro.php",
    dataType: "json",
    data: {
      accion: "datosPorDefecto",
    },
  }).done(function (result) {
    mostrarTabla(result);
  });
}
function busquedaPorDias(getId) {
  let checkTerminados = document.getElementById("terminadosBtn");
  let checkSeguimiento = document.getElementById("enSeguimientoBtn");
  let checkIncorrectos = document.getElementById("datosIncorrectosBtn");
  if (
    checkTerminados.checked == true &&
    checkSeguimiento.checked == true &&
    checkIncorrectos.checked == true
  ) {
    funcionAjaxParaFiltros("3Checked", getId);
  } else if (
    checkTerminados.checked == true &&
    checkSeguimiento.checked == true
  ) {
    funcionAjaxParaFiltros("terminadoSeguimiento", getId);
  } else if (
    checkTerminados.checked == true &&
    checkIncorrectos.checked == true
  ) {
    funcionAjaxParaFiltros("terminadoIncorrecto", getId);
  } else if (
    checkSeguimiento.checked == true &&
    checkIncorrectos.checked == true
  ) {
    funcionAjaxParaFiltros("seguimientoIncorrecto", getId);
  } else if (checkTerminados.checked == true) {
    funcionAjaxParaFiltros("terminado", getId);
  } else if (checkSeguimiento.checked == true) {
    funcionAjaxParaFiltros("seguimiento", getId);
  } else if (checkIncorrectos.checked == true) {
    funcionAjaxParaFiltros("incorrectos", getId);
  } else if (
    checkTerminados.checked == false &&
    checkSeguimiento.checked == false &&
    checkIncorrectos.checked == false
  ) {
    funcionAjaxParaFiltros("3Checked", getId);
  }
}
function buscarDatos() {
  let fechaCargaInicio = document.getElementById("fechaCargaInicio").value;
  let fechaCargaFinal = document.getElementById("fechaCargaFinal").value;
  let fechaSegInicio = document.getElementById("fechaSegInicio").value;
  let fechaSegFinal = document.getElementById("fechaSegFinal").value;
  txtEstacion = document.getElementById("txtEstacion").value;
  if (txtEstacion == "Selecciona...") {
    txtEstacion = "";
  }
  txtEstatus = document.getElementById("txtEstatus").value;
  if (txtEstatus == "Selecciona...") {
    txtEstatus = "";
  }
  txtSubEstatus = document.getElementById("txtSubEstatus").value;
  if (txtSubEstatus == "Selecciona...") {
    txtSubEstatus = "";
  }
  txtRegion = document.getElementById("txtRegion").value;
  if (txtRegion == "Selecciona...") {
    txtRegion = "";
  }
  txtEstado = document.getElementById("txtEstado").value;
  if (txtEstado == "Selecciona...") {
    txtEstado = "";
  }
  txtCobertura = document.getElementById("txtCobertura").value;
  if (txtCobertura == "Selecciona...") {
    txtCobertura = "";
  }
  $.ajax({
    method: "POST",
    url: rutaInicial + "BusquedaSinFiltro.php",
    dataType: "json",
    data: {
      accion: "BusquedaFechasyMas",
      fechaCargaInicio,
      fechaCargaFinal,
      fechaSegInicio,
      fechaSegFinal,
      txtEstacion,
      txtEstatus,
      txtSubEstatus,
      txtRegion,
      txtEstado,
      txtCobertura,
    },
    success: function (result) {
      console.log(result);
      mostrarTabla(result);
    },
  });
}
function descargar() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "descargar.php",
    data: {
      accion: "Descargar",
    },
  }).done(function (result) {
    console.log(result);
  });
}
function funcionAjaxParaFiltros(filtro, getId) {
  let sinComas = getId.split(",");

  $.ajax({
    method: "POST",
    url: rutaInicial + "mostrarSiniestrosDias.php",
    dataType: "json",
    data: {
      mayor: sinComas[0],
      menor: sinComas[1],
      accion: filtro,
    },
  }).done(function (result) {
    console.log(result);
    mostrarTabla(result);
  });
}
function eliminarSiniestro(getId) {
  console.log(getId);
  //funcion para borrar el siniestro
  let sinComas = getId.split(",");
  let idEliminar = sinComas[0];
  let mensaje;
  let opcion = confirm("Confirma para eliminar siniestro");
  if (opcion == true) {
    $.ajax({
      method: "POST",
      url: rutaInicial + "EliminarSiniestro.php",
      data: {
        idEliminar,
      },
    }).done(function (respuesta) {
      alert(respuesta);
      contador = 0;
      paginaActual.textContent = contador;
      datosPorDefecto();
    });
  } else {
    mensaje = "Movimiento cancelado";
  }
}
function mostrarInfoSiniestro(get) {
  /////se recibe el parametro id
  let inputNombre = document.getElementById("idOculto"); ////se obtiene el input oculto para cambiar el valor del boton y mandar el formulario ya que java trabaja con los valores y no id
  let inputNombreFk = document.getElementById("fkIdOculto");
  inputNombreFk.value = get;

  inputNombre.value = get;
  let idGuardado = get; ///////////se manda el id para hacer la busqueda y mostrar los datos del siniestro
  $.post({
    url: rutaInicial + "MostrarDatosSiniestro.php",
    dataType: "json",
    data: {
      idGuardado,
    },
    success: function (result) {
      ///////si en java todo sale correcto, se mandan los resultados y se realiza la obtencion de datos y dividirlos para desplegarlos en pantalla///mandamos los datos por nmedio de , y asi poder dividirlos ymandarlos de manera individual
      //sebuscan los id para poder modificar su contenido
      document.getElementById("fechaCarga").value =
        result.Siniestros[0].fechaCarga;
      document.getElementById("numSiniestro").value =
        result.Siniestros[0].numSiniestro;
      document.getElementById("poliza").value = result.Siniestros[0].poliza;
      document.getElementById("afectado").value = result.Siniestros[0].afectado;
      document.getElementById("tipoDeCaso").value =
        result.Siniestros[0].tipoDeCaso;
      document.getElementById("cobertura").value =
        result.Siniestros[0].cobertura;
      document.getElementById("fechaSiniestro").value =
        result.Siniestros[0].fechaSiniestro;
      document.getElementById("datosAudatex").value =
        result.Siniestros[0].datosAudatex;
      document.getElementById("estado").value = result.Siniestros[0].estado;
      document.getElementById("ciudad").value = result.Siniestros[0].ciudad;
      document.getElementById("region").value = result.Siniestros[0].region;
      document.getElementById("ubicacionTaller").value =
        result.Siniestros[0].ubicacionTaller;
      document.getElementById("financiado").value =
        result.Siniestros[0].financiado;
      document.getElementById("regimenFiscal").value =
        result.Siniestros[0].regimenFiscal;
      document.getElementById("passwordExterno").value =
        result.Siniestros[0].passwordExterno;
      document.getElementById("estatusCliente").value =
        result.Siniestros[0].estatusCliente;
      document.getElementById("comentariosCliente").value =
        result.Siniestros[0].comentariosCliente;
      document.getElementById("marca").value = result.Siniestros[0].marca;
      document.getElementById("tipo").value = result.Siniestros[0].tipo;
      document.getElementById("modelo").value = result.Siniestros[0].modelo;
      document.getElementById("placas").value = result.Siniestros[0].placas;
      document.getElementById("numSerie").value = result.Siniestros[0].numSerie;
      document.getElementById("valorIndemnizacion").value =
        result.Siniestros[0].valorIndemnizacion;
      document.getElementById("valorComercial").value =
        result.Siniestros[0].valorComercial;
      document.getElementById("asegurado").value =
        result.Siniestros[0].asegurado;
      document.getElementById("correo").value = result.Siniestros[0].correo;
      document.getElementById("telefonoPrincipal").value =
        result.Siniestros[0].telefonoPrincipal;
      document.getElementById("telefonosecundario").value =
        result.Siniestros[0].telefonosecundario;
      document.getElementById("contacto").value = result.Siniestros[0].contacto;
      document.getElementById("correoContacto").value =
        result.Siniestros[0].correoContacto;
      document.getElementById("telContacto").value =
        result.Siniestros[0].telContacto;
      document.getElementById("txtEstatusSeguimiento").value =
        result.Siniestros[0].estatusSeguimientoSin;
      estaciones();
      document.getElementById("divSeguimiento").style.display = "";
      document.getElementById("divGuardarImagenes").style.display = "none";
      //el arreglo que se crea se lo agregagmos a cada boton que hay
    },
  });
  tablaSeguimiento();
  let iframe = document.getElementById("iFrameIdentificacion");
  iframe.style.display = "none";
  let txtIdRegistro = document.getElementById("idOculto").value;
  tablaImagenes(txtIdRegistro);
  docsYaCargados(txtIdRegistro);
  document.getElementById("txtComentSeguimiento").value = "";
}
function GuardarRegistros() {
  $.ajax({
    type: "POST",
    url: rutaInicial + "GuardarSeguimiento.php",
    data: {
      accion: "GuardarSeguimiento",
      fechaCarga: document.getElementById("fechaCarga").value,
      numSiniestro: document.getElementById("numSiniestro").value,
      poliza: document.getElementById("poliza").value,
      afectado: document.getElementById("afectado").value,
      tipoDeCaso: document.getElementById("tipoDeCaso").value,
      cobertura: document.getElementById("cobertura").value,
      fechaSiniestro: document.getElementById("fechaSiniestro").value,
      datosAudatex: document.getElementById("datosAudatex").value,
      estado: document.getElementById("estado").value,
      ciudad: document.getElementById("ciudad").value,
      region: document.getElementById("region").value,
      ubicacionTaller: document.getElementById("ubicacionTaller").value,
      financiado: document.getElementById("financiado").value,
      regimenFiscal: document.getElementById("regimenFiscal").value,
      passwordExterno: document.getElementById("passwordExterno").value,
      estatusCliente: document.getElementById("estatusCliente").value,
      comentariosCliente: document.getElementById("comentariosCliente").value,
      marca: document.getElementById("marca").value,
      tipo: document.getElementById("tipo").value,
      modelo: document.getElementById("modelo").value,
      placas: document.getElementById("placas").value,
      numSerie: document.getElementById("numSerie").value,
      valorIndemnizacion: document.getElementById("valorIndemnizacion").value,
      valorComercial: document.getElementById("valorComercial").value,
      asegurado: document.getElementById("asegurado").value,
      correo: document.getElementById("correo").value,
      telefonoPrincipal: document.getElementById("telefonoPrincipal").value,
      telefonosecundario: document.getElementById("telefonosecundario").value,
      contacto: document.getElementById("contacto").value,
      correoContacto: document.getElementById("correoContacto").value,
      telContacto: document.getElementById("telContacto").value,
      idEditableActual: document.getElementById("idOculto").value,
    },
  }).done(function (respuesta) {
    alert(respuesta);
  });
}
function InsertarSeguimiento() {
  $.ajax({
    type: "POST",
    url: rutaInicial + "GuardarSeguimiento.php",
    data: {
      accion: "InsertarSeguimiento",
      estacion: document.getElementById("txtEstacionSoloLectura").value,
      comentSeguimiento: document.getElementById("txtComentSeguimiento").value,
      estatusSeguimiento: document.getElementById("txtEstatusSeguimiento")
        .value,
      subEstatus: document.getElementById("txtSubEstacion").value,
      respSolera: document.getElementById("txtRespSolera").value,
      persContactada: document.getElementById("txtPersContactada").value,
      tipoPersona: document.getElementById("txtTipoPersona").value,
      tipoContacto: document.getElementById("txTipoContacto").value,
      fechaIntExp: document.getElementById("txtFechaIntExp").value,
      fechaFactServ: document.getElementById("txtFechaFactServ").value,
      fechaTermino: document.getElementById("txtFechaTermino").value,
      idEditableActual: document.getElementById("idOculto").value,
      tipoMensaje: document.getElementById("txtTipoMensaje").value,
    },
    success: function (result) {
      alert(result);
      tablaSeguimiento();
    },
  });
}
function consultaUsuarios() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "DatosAlCargarPagina.php",
    dataType: "json",
    data: {
      accion: "consultaUsuarios",
    },
  }).done(function (result) {
    for (let i in result.Siniestros) {
      let selectIntegradores = document.getElementById("txtIntegrador");
      let option = document.createElement("option");
      option.text = result.Siniestros[i].nombreReal;
      selectIntegradores.add(option);
    }
  });
}
function asignarIntegrador() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "GuardarSeguimiento.php",
    data: {
      accion: "AsignarIntegrador",
      integrador: document.getElementById("txtIntegrador").value,
      idRegistro: document.getElementById("idOculto").value,
      usuario: document.getElementById("sesionActual").textContent,
    },
  }).done(function (result) {
    alert(result);
    tablaSeguimiento();
  });
}
function guardarDocsAprobados() {
  let checkboxFactura = document.getElementById("checkboxFactura").checked;
  let checkboxFacturaAtlas = document.getElementById(
    "checkboxFacturaAtlas"
  ).checked;
  let checkboxSecuencia = document.getElementById("checkboxSecuencia").checked;
  let checkboxPropiedad = document.getElementById("checkboxPropiedad").checked;
  let checkboxCopiaPropiedad = document.getElementById(
    "checkboxCopiaPropiedad"
  ).checked;
  let checkboxPedimento = document.getElementById("checkboxPedimento").checked;
  let checkboxBajadePermiso = document.getElementById(
    "checkboxBajadePermiso"
  ).checked;
  let checkboxRFV = document.getElementById("checkboxRFV").checked;
  let checkboxVerificacion = document.getElementById(
    "checkboxVerificacion"
  ).checked;
  let checkboxTenencias = document.getElementById("checkboxTenencias").checked;
  let checkboxFacturaMotor = document.getElementById(
    "checkboxFacturaMotor"
  ).checked;
  let checkboxLlaves = document.getElementById("checkboxLlaves").checked;
  let checkboxFormatoCliente = document.getElementById(
    "checkboxFormatoCliente"
  ).checked;
  let checkboxLFPDPPP = document.getElementById("checkboxLFPDPPP").checked;
  let checkboxAveriguacion = document.getElementById(
    "checkboxAveriguacion"
  ).checked;
  let checkboxAcreditacion = document.getElementById(
    "checkboxAcreditacion"
  ).checked;
  let checkboxPFP = document.getElementById("checkboxPFP").checked;
  let checkboxOtros = document.getElementById("checkboxOtros").checked;
  let checkboxLiberacion =
    document.getElementById("checkboxLiberacion").checked;
  let checkboxCancelacion = document.getElementById(
    "checkboxCancelacion"
  ).checked;
  let idEditableActual = document.getElementById("idOculto").value;
  $.ajax({
    method: "POST",
    url: rutaInicial + "GuardarSeguimiento.php",
    data: {
      checkboxFactura,
      checkboxFacturaAtlas,
      checkboxSecuencia,
      checkboxPropiedad,
      checkboxCopiaPropiedad,
      checkboxPedimento,
      checkboxBajadePermiso,
      checkboxRFV,
      checkboxVerificacion,
      checkboxTenencias,
      checkboxFacturaMotor,
      checkboxLlaves,
      checkboxFormatoCliente,
      checkboxLFPDPPP,
      checkboxAveriguacion,
      checkboxAcreditacion,
      checkboxPFP,
      checkboxOtros,
      checkboxLiberacion,
      checkboxCancelacion,
      idEditableActual,
      accion: "ValidarDocs",
    },
    success: function (resultado) {
      alert(resultado);
      mostrarDocsAprobados();
    },
  });
}
function mostrarDocsAprobados() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "MensajesSeguimiento.php",
    dataType: "json",
    data: {
      idRegistro: document.getElementById("idOculto").value,
      accion: "DocsAprobados",
    },
    success: function (result) {
      if (result.Siniestros[0].factura === "true") {
        document.getElementById("checkboxFactura").checked = true;
      } else {
        document.getElementById("checkboxFactura").checked = false;
      }
      if (result.Siniestros[0].facturaatlas === "true") {
        document.getElementById("checkboxFacturaAtlas").checked = true;
      } else {
        document.getElementById("checkboxFacturaAtlas").checked = false;
      }
      if (result.Siniestros[0].secuencia === "true") {
        document.getElementById("checkboxSecuencia").checked = true;
      } else {
        document.getElementById("checkboxSecuencia").checked = false;
      }
      if (result.Siniestros[0].certificadopropiedad === "true") {
        document.getElementById("checkboxPropiedad").checked = true;
      } else {
        document.getElementById("checkboxPropiedad").checked = false;
      }
      if (result.Siniestros[0].copiacertificado === "true") {
        document.getElementById("checkboxCopiaPropiedad").checked = true;
      } else {
        document.getElementById("checkboxCopiaPropiedad").checked = false;
      }
      if (result.Siniestros[0].pedimento === "true") {
        document.getElementById("checkboxPedimento").checked = true;
      } else {
        document.getElementById("checkboxPedimento").checked = false;
      }
      if (result.Siniestros[0].baja === "true") {
        document.getElementById("checkboxBajadePermiso").checked = true;
      } else {
        document.getElementById("checkboxBajadePermiso").checked = false;
      }
      if (result.Siniestros[0].rfv === "true") {
        document.getElementById("checkboxRFV").checked = true;
      } else {
        document.getElementById("checkboxRFV").checked = false;
      }
      if (result.Siniestros[0].verificacion === "true") {
        document.getElementById("checkboxVerificacion").checked = true;
      } else {
        document.getElementById("checkboxVerificacion").checked = false;
      }
      if (result.Siniestros[0].tenencias === "true") {
        document.getElementById("checkboxTenencias").checked = true;
      } else {
        document.getElementById("checkboxTenencias").checked = false;
      }
      if (result.Siniestros[0].facturamotor === "true") {
        document.getElementById("checkboxFacturaMotor").checked = true;
      } else {
        document.getElementById("checkboxFacturaMotor").checked = false;
      }
      if (result.Siniestros[0].llaves === "true") {
        document.getElementById("checkboxLlaves").checked = true;
      } else {
        document.getElementById("checkboxLlaves").checked = false;
      }
      if (result.Siniestros[0].conoceatucliente === "true") {
        document.getElementById("checkboxFormatoCliente").checked = true;
      } else {
        document.getElementById("checkboxFormatoCliente").checked = false;
      }
      if (result.Siniestros[0].consentimiento === "true") {
        document.getElementById("checkboxLFPDPPP").checked = true;
      } else {
        document.getElementById("checkboxLFPDPPP").checked = false;
      }
      if (result.Siniestros[0].averiguacionprevia === "true") {
        document.getElementById("checkboxAveriguacion").checked = true;
      } else {
        document.getElementById("checkboxAveriguacion").checked = false;
      }
      if (result.Siniestros[0].acreditacion === "true") {
        document.getElementById("checkboxAcreditacion").checked = true;
      } else {
        document.getElementById("checkboxAcreditacion").checked = false;
      }
      if (result.Siniestros[0].otros === "true") {
        document.getElementById("checkboxOtros").checked = true;
      } else {
        document.getElementById("checkboxOtros").checked = false;
      }
      if (result.Siniestros[0].oficioliberacion === "true") {
        document.getElementById("checkboxLiberacion").checked = true;
      } else {
        document.getElementById("checkboxLiberacion").checked = false;
      }
      if (result.Siniestros[0].avisopfp === "true") {
        document.getElementById("checkboxPFP").checked = true;
      } else {
        document.getElementById("checkboxPFP").checked = false;
      }
      if (result.Siniestros[0].oficiocancelacion === "true") {
        document.getElementById("checkboxCancelacion").checked = true;
      } else {
        document.getElementById("checkboxCancelacion").checked = false;
      }
      let porcentajeBarra = document.getElementById("progresoDocsAprobados");
      porcentajeBarra.style.width = result.Siniestros[0].porcentajeDocs + "%";
      porcentajeBarra.innerHTML = result.Siniestros[0].porcentajeDocs + "%";
    },
  });
  let txtIdRegistro = document.getElementById("idOculto").value;
  docsYaCargados(txtIdRegistro);
}
function tablaSeguimiento() {
  $.ajax({
    method: "post",
    url: rutaInicial + "MensajesSeguimiento.php",
    dataType: "json",
    data: {
      accion: "tablaSeguimiento",
      idRegistro: document.getElementById("idOculto").value,
    },
  }).done(function (result) {
    $(".claseTablaSeguimiento").remove();
    let numeroTBody = 0;
    let tblBody = new Array();
    tblBody[numeroTBody] = document.createElement("tbody");
    tblBody[numeroTBody].setAttribute("class", "tBodySeg");
    tblBody[numeroTBody].setAttribute("id", "tBodySeg:" + numeroTBody);
    let tablaseguimiento = document.getElementById("tablaSeguimientos");
    tablaseguimiento.appendChild(tblBody[numeroTBody]);
    for (let i in result.Siniestros) {
      if (i % 5 == 0 && i != 0) {
        numeroTBody += 1;
        tblBody[numeroTBody] = document.createElement("tbody");
        tblBody[numeroTBody].setAttribute("class", "tBodySeg");
        tblBody[numeroTBody].setAttribute("id", "tBodySeg:" + numeroTBody);
        tblBody[numeroTBody].style.display = "none";
        tablaseguimiento.appendChild(tblBody[numeroTBody]);
        usuario = `<td class='col-1' style='font-size: 11px'>${result.Siniestros[i].usuario}</td>`;
        tipoMensaje = `<td class='col' style='font-size: 11px'>${result.Siniestros[i].msgInterno}</td>`;
        fecha = `<td class='col' style='font-size: 11px'>${result.Siniestros[i].fechaseguimiento}</td>`;
        estatus = `<td class='col' style='font-size: 11px'>${result.Siniestros[i].estatusSeguimiento}</td>`;
        comentario = `<td class='col' style='font-size: 11px'>${result.Siniestros[i].comentarios}</td>`;
        tblBody[numeroTBody].innerHTML += `<tr class='claseTablaSeguimiento'>${
          usuario + tipoMensaje + fecha + estatus + comentario
        }</tr>`;
      } else {
        usuario = `<td class='col-1' style='font-size: 11px'>${result.Siniestros[i].usuario}</td>`;
        tipoMensaje = `<td class='col' style='font-size: 11px'>${result.Siniestros[i].msgInterno}</td>`;
        fecha = `<td class='col-2' style='font-size: 11px'>${result.Siniestros[i].fechaseguimiento}</td>`;
        estatus = `<td class='col' style='font-size: 11px'>${result.Siniestros[i].estatusSeguimiento}</td>`;
        comentario = `<td class='col' style='font-size: 11px'>${result.Siniestros[i].comentarios}</td>`;
        tblBody[numeroTBody].innerHTML += `<tr class='claseTablaSeguimiento'>${
          usuario + tipoMensaje + fecha + estatus + comentario
        }</tr>`;
      }
    }
  });
}
function mostrarDivsModal() {
  document
    .getElementById("btnDocsMostrar")
    .addEventListener("click", function () {
      document.getElementById("divSeguimiento").style.display = "none";
      document.getElementById("divGuardarImagenes").style.display = "";
      document.getElementById("divLink").style.display = "none";
      mostrarDocsAprobados();
    });
  document
    .getElementById("btnSeguimiento")
    .addEventListener("click", function () {
      document.getElementById("divSeguimiento").style.display = "";
      document.getElementById("divGuardarImagenes").style.display = "none";
      document.getElementById("divLink").style.display = "none";
    });
  document.getElementById("btnLink").addEventListener("click", function () {
    document.getElementById("txtUsuario").textContent = `SIN-${
      document.getElementById("numSiniestro").value
    }`;
    obtenerPassword();
    document.getElementById("divSeguimiento").style.display = "none";
    document.getElementById("divGuardarImagenes").style.display = "none";
    document.getElementById("divLink").style.display = "";
  });
}
function enviarImagenes() {
  $("#btnSubirDoc").on("click", function () {
    let idRegistro = document.getElementById("idOculto").value;
    let nombreArchivo = document.getElementById("tipoArchivoCargado").value;
    let iFrame = document.getElementById("tipoArchivoCargado").name;
    let formData = new FormData();
    let files = $("#archivoCargado")[0].files[0];
    formData.append("file", files);
    $.ajax({
      url:
        rutaInicial +
        `SubirImagen.php?idRegistro=${idRegistro}&nombreArchivo=${nombreArchivo}&iFrame=${iFrame}`,
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        alert(response);
        let txtIdRegistro = document.getElementById("idOculto").value;
        tablaImagenes(txtIdRegistro);
      },
    });
    return false;
  });
}
function mostrarImagenSelect(getId) {
  let sinComas = getId.split(",");
  let iframe = document.getElementById("iFrameIdentificacion");
  let direccionId = document.getElementById("idOculto").value;
  iframe.src = "../../Documentos/Ids/" + direccionId + "/" + sinComas[2] + "";
  iframe.style.display = "";
}
function eliminarImagen(getId) {
  if (window.confirm("Eliminar imagen?")) {
    let sinComas = getId.split(",");
    $.ajax({
      method: "POST",
      url: rutaInicial + "ConsultaImagenes.php",
      data: {
        accion: "EliminarImagenes",
        idRegistro: sinComas[1],
        nombreArchivo: sinComas[2],
      },
    })
      .done(function (result) {
        alert(result);
        let txtIdRegistro = document.getElementById("idOculto").value;
        tablaImagenes(txtIdRegistro);
        let iframe = document.getElementById("iFrameIdentificacion");
        iframe.src = "";
        iframe.style.display = "";
      })
      .fail(function () {
        alert("Error al eliminar imagen");
      });
  }
}
function descargarEnZip() {
  let btnDescargaZip = document.getElementById("btnDescargarEnZip");
  btnDescargaZip.addEventListener("click", function (event) {
    event.preventDefault();
    let idRegistro = document.getElementById("idOculto").value;
    $.ajax({
      method: "POST",
      url: "../../Documentos/Ids/DescargarDocumentos.php",
      data: {
        idRegistro,
      },
    }).done(function () {
      let btnDescargar = document.getElementById("linkDescargarZip");
      btnDescargar.click();
      console.log("entra");
    });
  });
}
function convertirPDF(getId) {
  let sinComas = getId.split(",");
  let extension = sinComas[2];
  if (extension.split(".").pop() === "pdf") {
    alert("No se puede convertir, ya es un archivo PDF");
    return;
  }
  var pdf = new jsPDF();
  /// Codigo para agregar una imagen
  var image1 = new Image();
  image1.src = `../Documentos/Ids/${sinComas[1]}/${sinComas[2]}`; /// URL de la imagen
  pdf.addImage(image1, "", 25, 30, 170, 180); // Agregar la imagen al PDF (X, Y, Width, Height)
  /////
  pdf.save("descarga.pdf");
}
function tablaImagenes(txtIdRegistro) {
  $.ajax({
    method: "POST",
    url: rutaInicial + "ConsultaImagenes.php",
    dataType: "json",
    data: {
      accion: "TablaImagenes",
      idRegistro: txtIdRegistro,
    },
    success: function (result) {
      $(".tablaImagenes").remove();
      for (let i in result.Siniestros) {
        let tablaImagenes = document.getElementById("mostrarTablaImagenes");
        let btnGrupo = `<td><div class='btn-group tablaActual botonesTabla' role='group'>
        <button id='Ver,${result.Siniestros[i].fkImagen},${result.Siniestros[i].nombreImagen}'
        onclick='mostrarImagenSelect(this.id)' type='button' class='btn btn-primary'>Ver</button>
        <button id='Pdf,${result.Siniestros[i].fkImagen},${result.Siniestros[i].nombreImagen}'
        onclick='convertirPDF(this.id)' type='button' class='btn btn-primary'>Pdf</button>
        <a class='btn btn-success' href='../../Documentos/Ids/${result.Siniestros[i].fkImagen}/${result.Siniestros[i].nombreImagen}' download='${result.Siniestros[i].nombreImagen}'>
        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none'
        stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'
        class='feather feather-download'>
        <path d='M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4'></path>
        <polyline points='7 10 12 15 17 10'></polyline>
        <line x1='12' y1='15' x2='12' y2='3'></line>
        </svg></a>
        <button id='Eliminar,${result.Siniestros[i].fkImagen},${result.Siniestros[i].nombreImagen}'
        onclick='eliminarImagen(this.id)' type='button' class='btnEliminarClass btn btn-danger'>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0
        0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59
        0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 
        .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1
        .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
        </svg>
        </button>
        </div></td>`;
        let archivo = `<td>${result.Siniestros[i].nombreOriginal}</td>`;
        let fechaCarga = `<td>${result.Siniestros[i].fechaCarga}</td>`;
        tablaImagenes.innerHTML += `<tr class='tablaImagenes'>${
          btnGrupo + archivo + fechaCarga
        }</tr>`;
      }
    },
  });
}
function controlPaginado() {
  //funcion para controlar el pagina de los resultados
  let paginaMas = document.getElementById("botonClickMas");
  let paginaMenos = document.getElementById("botonClickMenos");
  let paginaMasSeg = document.getElementById("btnMasSeg");
  let paginaMenosSeg = document.getElementById("btnMenosSeg");
  let paginaActual = document.getElementById("paginaActual");
  let paginaActualSeg = document.getElementById("paginaActualSeg");
  paginaMas.onclick = function () {
    //saber el tamano de la cantidad de tbodys para no dar error
    let tBodys = document.getElementsByClassName("tBody").length;
    let tBodyActual = document.getElementById("tBody:" + contador);
    if (contador < tBodys - 1) {
      tBodyActual.style.display = "none";
      contador++;
      paginaActual.textContent = contador;
      tBodyActual = document.getElementById("tBody:" + contador);
      tBodyActual.style.removeProperty("display");
    }
  };
  paginaMenos.onclick = function () {
    if (contador > 0) {
      let tBodyActual = document.getElementById("tBody:" + contador);
      tBodyActual.style.display = "none";
      contador--;
      paginaActual.textContent = contador;
      tBodyActual = document.getElementById("tBody:" + contador);
      tBodyActual.style.removeProperty("display");
    }
  };
  paginaMasSeg.onclick = function () {
    let tBodysSeg = document.getElementsByClassName("tBodySeg").length;
    let tBodyActualSeg = document.getElementById("tBodySeg:" + contadorSeg);
    if (contadorSeg < tBodysSeg - 1) {
      tBodyActualSeg.style.display = "none";
      contadorSeg++;
      paginaActualSeg.textContent = contadorSeg;
      tBodyActualSeg = document.getElementById("tBodySeg:" + contadorSeg);
      tBodyActualSeg.style.removeProperty("display");
    }
  };
  paginaMenosSeg.onclick = function () {
    if (contadorSeg > 0) {
      let tBodyActualSeg = document.getElementById("tBodySeg:" + contadorSeg);
      tBodyActualSeg.style.display = "none";
      contadorSeg--;
      paginaActualSeg.textContent = contadorSeg;
      tBodyActualSeg = document.getElementById("tBodySeg:" + contadorSeg);
      tBodyActualSeg.style.removeProperty("display");
    }
  };
}
function docsYaCargados(txtIdRegistro) {
  selectaOcultar = document.getElementById("selectFactura");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectfacturaAtlas");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectSecuencia");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectCertificado");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectCertificadoCopia");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectPedimento");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectBajaPermiso");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectR.F.V.");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectVerificacion");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectTenencias");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectMotor");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectLlaves");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectConoce");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectLFPDPPP");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectAveriguacion");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectPFP");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectOficioLiberacion");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectOficioCancelacion");
  selectaOcultar.disabled = false;
  $.ajax({
    method: "POST",
    url: rutaInicial + "BusquedaSinFiltro.php",
    dataType: "json",
    data: {
      txtIdRegistro,
      accion: "docsYaCargados",
    },
  }).done(function (result) {
    let selectaOcultar;
    for (let i in result.Siniestros) {
      if (result.Siniestros[i].nombreOriginal === "Factura") {
        selectaOcultar = document.getElementById("selectFactura");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal ===
        "Factura a favor de Seguros Atlas"
      ) {
        selectaOcultar = document.getElementById("selectfacturaAtlas");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Secuencia de facturas"
      ) {
        selectaOcultar = document.getElementById("selectSecuencia");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Certificado Propiedad"
      ) {
        selectaOcultar = document.getElementById("selectCertificado");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Copia certificado propiedad"
      ) {
        selectaOcultar = document.getElementById("selectCertificadoCopia");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Pedimento de Importacion"
      ) {
        selectaOcultar = document.getElementById("selectPedimento");
        selectaOcultar.disabled = true;
      } else if (result.Siniestros[i].nombreOriginal === "R.F.V.") {
        selectaOcultar = document.getElementById("selectR.F.V.");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Baja de permiso de internacion"
      ) {
        selectaOcultar = document.getElementById("selectBajaPermiso");
        selectaOcultar.disabled = true;
      } else if (result.Siniestros[i].nombreOriginal === "Verificacion") {
        selectaOcultar = document.getElementById("selectVerificacion");
        selectaOcultar.disabled = true;
      } else if (result.Siniestros[i].nombreOriginal === "Tenencias") {
        selectaOcultar = document.getElementById("selectTenencias");
        selectaOcultar.disabled = true;
      } else if (result.Siniestros[i].nombreOriginal === "Factura del motor") {
        selectaOcultar = document.getElementById("selectMotor");
        selectaOcultar.disabled = true;
      } else if (result.Siniestros[i].nombreOriginal === "Llaves") {
        selectaOcultar = document.getElementById("selectLlaves");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Formato conoce a tu cliente"
      ) {
        selectaOcultar = document.getElementById("selectConoce");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Consentimiento LFPDPPP"
      ) {
        selectaOcultar = document.getElementById("selectLFPDPPP");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Averiguación previa"
      ) {
        selectaOcultar = document.getElementById("selectAveriguacion");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Acreditacion de propiedad"
      ) {
        selectaOcultar = document.getElementById("selectAcreditacion");
        selectaOcultar.disabled = true;
      } else if (result.Siniestros[i].nombreOriginal === "Aviso a PFP") {
        selectaOcultar = document.getElementById("selectPFP");
        selectaOcultar.disabled = true;
      } else if (result.Siniestros[i].nombreOriginal === "Otros") {
        selectaOcultar = document.getElementById("selectOtros");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Oficio de liberacion"
      ) {
        selectaOcultar = document.getElementById("selectOficioLiberacion");
        selectaOcultar.disabled = true;
      } else if (
        result.Siniestros[i].nombreOriginal === "Oficio de cancelacion del robo"
      ) {
        selectaOcultar = document.getElementById("selectOficioCancelacion");
        selectaOcultar.disabled = true;
      }
    }
  });
}
function agregarSiniestro() {
  let addNumSiniestro = document.getElementById("addNumSiniestro").value;
  let addFechaSiniestro = document.getElementById("addFechaSiniestro").value;
  let addPoliza = document.getElementById("addPoliza").value;
  let addCobertura = document.getElementById("addCobertura").value;
  let addAfectado = document.getElementById("addAfectado").value;
  let addAsegurado = document.getElementById("addAsegurado").value;
  let addRegimen = document.getElementById("addRegimen").value;
  let addAgente = document.getElementById("addAgente").value;
  let addTelefono = document.getElementById("addTelefono").value;
  let addTelefonoAlt = document.getElementById("addTelefonoAlt").value;
  let addCorreo = document.getElementById("addCorreo").value;
  let addMarca = document.getElementById("addMarca").value;
  let addTipo = document.getElementById("addTipo").value;
  let addModelo = document.getElementById("addModelo").value;
  let addNumSerie = document.getElementById("addNumSerie").value;
  let addCiudad = document.getElementById("addCiudad").value;
  let addFechaDecretacion = document.getElementById(
    "addFechaDecretacion"
  ).value;
  let addUbicacion = document.getElementById("addUbicacion").value;
  let addValComercial = document.getElementById("addValComercial").value;
  let addValIndemnizacion = document.getElementById(
    "addValIndemnizacion"
  ).value;
  $.ajax({
    type: "POST",
    url: rutaInicial + "AgregarSiniestro.php",
    data: {
      numSiniestro: addNumSiniestro,
      fechaSiniestro: addFechaSiniestro,
      poliza: addPoliza,
      cobertura: addCobertura,
      afectado: addAfectado,
      asegurado: addAsegurado,
      regimen: addRegimen,
      agente: addAgente,
      telefono: addTelefono,
      telefonoAlt: addTelefonoAlt,
      correo: addCorreo,
      marca: addMarca,
      tipo: addTipo,
      modelo: addModelo,
      numSerie: addNumSerie,
      ciudad: addCiudad,
      fechaDecretacion: addFechaDecretacion,
      ubicacion: addUbicacion,
      valComercial: addValComercial,
      valIndemnizacion: addValIndemnizacion,
    },
  }).done(function (result) {
    alert(result);
  });
}
function mostrarMovimientos() {
  let fechaInicio = document.getElementById("fechaInicioUsuarios").value;
  let fechaFinal = document.getElementById("fechaFinalUsuarios").value;
  $(".theadDias").remove();
  $(".tablaMovimientos  ").remove();
  let tablaReporte = document.getElementById("TablaReporte");
  let theadDias = document.getElementById("theadDias");
  $.ajax({
    type: "POST",
    url: rutaInicial + "MostrarMovimientos.php",
    dataType: "json",
    data: {
      accion: "obtenerUsuarios",
    },
  }).done(function (result) {
    for (let x in result.Siniestros) {
      //console.log(result.Siniestros[x].nombreReal);
      let totalMovs = 0;
      let contadorParaDias = 1;
      let nombre = `<td>${result.Siniestros[x].nombreReal}</td>`;
      let cadenaMovs = "";
      let soloDias = "";
      let menosDias = 0;
      let diasSemana = 7;
      let i = 0;
      for (i; i < diasSemana; i++) {
        const dias = [
          "domingo",
          "lunes",
          "martes",
          "miercoles",
          "jueves",
          "viernes",
          "sabado",
        ];
        //obtengo los dias con su nombre
        let numeroDia = new Date().getDay() - i;
        switch (numeroDia) {
          case -1:
            numeroDia = 6;
            break;
          case -2:
            numeroDia = 5;
            break;
          case -3:
            numeroDia = 4;
            break;
          case -4:
            numeroDia = 3;
            break;
          case -5:
            numeroDia = 2;
            break;
          case -6:
            numeroDia = 1;
            break;
        }
        let nombreDia = dias[numeroDia];
        console.log(nombreDia);
        $.ajax({
          type: "POST",
          url: rutaInicial + "MostrarMovimientos.php",
          dataType: "json",
          data: {
            nombreDia,
            fechaInicio,
            fechaFinal,
            usuario: result.Siniestros[x].nombreReal,
            accion: "filtroMovimientos",
          },
        }).done(function (result) {
          console.log(result);
          soloDias = `<th>${nombreDia}</th>` + soloDias;
          cadenaMovs =
            `<td>${result.Siniestros[0].cantMovimientos}</td>` + cadenaMovs;
          totalMovs += result.Siniestros[0].cantMovimientos;
          if (menosDias == 6) {
            //en el ultimo dia entra para asignar a la tabla
            contadorParaDias += 1;
            totalMovsformato = `<td>${totalMovs}</td>`;
            tablaReporte.innerHTML += `<tr class='tablaMovimientos'>${
              nombre + cadenaMovs + totalMovsformato
            }</tr>`;
          }
          if (contadorParaDias == 2) {
            $(".theadDias").remove();
            soloDias = `<th>Usuario</th>` + soloDias + "<th>Total</th>";
            theadDias.innerHTML += `<tr class='theadDias'>${soloDias}</tr>`;
          }
          menosDias += 1;
        });
      }
    }
  });
}
function mostrarMovsPorDefecto() {
  $(".theadDias").remove();
  $(".tablaMovimientos  ").remove();
  let tablaReporte = document.getElementById("TablaReporte");
  let theadDias = document.getElementById("theadDias");
  $.ajax({
    type: "POST",
    url: rutaInicial + "MostrarMovimientos.php",
    dataType: "json",
    data: {
      accion: "obtenerUsuarios",
    },
  }).done(function (result) {
    for (let x in result.Siniestros) {
      let totalMovs = 0;
      let contadorParaDias = 1;
      let nombre = `<td>${result.Siniestros[x].nombreReal}</td>`;
      let cadenaMovs = "";
      let soloDias = "";
      let menosDias = 0;
      let diasSemana = 7;
      let i = 0;
      for (i; i < diasSemana; i++) {
        $.ajax({
          type: "POST",
          url: rutaInicial + "MostrarMovimientos.php",
          dataType: "json",
          data: {
            restarDias: i,
            usuario: result.Siniestros[x].nombreReal,
            accion: "movsPorDefecto",
          },
        }).done(function (result) {
          const dias = [
            "domingo",
            "lunes",
            "martes",
            "miércoles",
            "jueves",
            "viernes",
            "sábado",
          ];

          //obtengo los dias con su nombre
          let numeroDia = new Date().getDay() - menosDias;
          switch (numeroDia) {
            case -1:
              numeroDia = 6;
              break;
            case -2:
              numeroDia = 5;
              break;
            case -3:
              numeroDia = 4;
              break;
            case -4:
              numeroDia = 3;
              break;
            case -5:
              numeroDia = 2;
              break;
            case -6:
              numeroDia = 1;
              break;
          }
          const nombreDia = dias[numeroDia];
          soloDias = `<th>${nombreDia}</th>` + soloDias;
          cadenaMovs =
            `<td>${result.Siniestros[0].cantMovimientos}</td>` + cadenaMovs;
          totalMovs += result.Siniestros[0].cantMovimientos;
          if (menosDias == 6) {
            //en el ultimo dia entra para asignar a la tabla
            contadorParaDias += 1;
            totalMovsformato = `<td>${totalMovs}</td>`;
            tablaReporte.innerHTML += `<tr class='tablaMovimientos'>${
              nombre + cadenaMovs + totalMovsformato
            }</tr>`;
          }
          if (contadorParaDias == 2) {
            $(".theadDias").remove();
            soloDias = `<th>Usuario</th>` + soloDias + "<th>Total</th>";
            theadDias.innerHTML += `<tr class='theadDias'>${soloDias}</tr>`;
          }
          menosDias += 1;
        });
      }
    }
  });
}
function exportarMovimientos() {
  let fechaInicio = document.getElementById("fechaInicioUsuarios").value;
  let fechaFinal = document.getElementById("fechaFinalUsuarios").value;
  $.ajax({
    type: "POST",
    url: rutaInicial + "MostrarMovimientos.php",
    data: {
      accion: "ExportarMovimientos",
      fechaInicio,
      fechaFinal,
    },
  })
    .done(function (result) {
      console.log(result);
    })
    .then(() => {
      let btnDescargar = document.getElementById("btnDescargarMovs");
      btnDescargar.click();
    });
}
function operadoresAtlas() {
  $.ajax({
    url: "../../php/Citas/ConsultasCitas.php",
    type: "POST",
    dataType: "JSON",
    data: {
      accion: "MostrarOperadores",
    },
  }).done(function (result) {
    console.log(result);
    $(".operadores").remove();
    let selectIntegradores = document.getElementById("txtAsesor");
    for (let i in result.Operadores) {
      let option = document.createElement("option");
      option.setAttribute("class", "operadores");
      option.text = result.Operadores[i].nombreReal;
      selectIntegradores.add(option);
    }
  });
}
function guardarCita() {
  let siniestro = document.getElementById("txtSiniestro").value;
  $.ajax({
    url: "../../php/Citas/ConsultasCitas.php",
    type: "POST",
    data: {
      siniestro,
      accion: "ValidarCita",
    },
  }).done(function (result) {
    if (document.getElementById("txtAsesor").value == "Asesor") {
      alert("Por favor, selecciona un asesor");
      return;
    }
    //se valida si ya se tiene una cita
    if (result === "Verdadero") {
      alert("Ya existe una cita, validar por favor");
      return;
    } else {
      let fecha = document.getElementById("txtFechaDatos").value;
      let horaInicio = document.getElementById("txtHoraInicio").value;
      let horaFin = document.getElementById("txtHoraFinal").value;
      let infoAdicional = document.getElementById("txtInfoAdicional").value;
      let asesor = document.getElementById("txtAsesor").value;
      let color = document.getElementById("txtColor").value;
      let start = `${fecha} ${horaInicio}:00`;
      let end = `${fecha} ${horaFin}:00`;
      $.ajax({
        url: "../../php/citas/AgregarEvento.php",
        data: {
          title: document.getElementById("txtTitulo").value,
          start,
          end,
          infoAdicional,
          asesor,
          color,
          siniestro,
        },
        type: "POST",
        success: function (data) {
          alert("Cita creada");
          obtenerCitaActiva();
        },
      });
    }
  });
}
function obtenerCitaActiva() {
  let id = document.getElementById("idOculto").value;
  $.ajax({
    url: "../../php/Citas/ConsultasCitas.php",
    type: "POST",
    dataType: "json",
    data: {
      accion: "ObtenerCitaActiva",
      id,
    },
  }).done(function (response) {
    console.log(response);
    try {
      let horaFinal = response.Cita[0].end.split(" ");
      let horaInicio = response.Cita[0].start.split(" ");
      let title = `<li style='font-size: 13px' class="cita list-group-item">Cita: ${response.Cita[0].title}</li>`;
      let siniestro = `<li style='font-size: 13px' class="cita list-group-item">Siniestro: ${response.Cita[0].siniestro}</li>`;
      let asesor = `<li style='font-size: 13px' class="cita list-group-item">Asesor: ${response.Cita[0].asesor}</li>`;
      let end = `<li style='font-size: 13px' class="cita list-group-item">Hora final: ${horaFinal[1]}</li>`;
      let infoAdicional = `<li style='font-size: 13px' class="cita list-group-item">Informacion adicional: ${response.Cita[0].infoAdicional}</li>`;
      let operador = `<li style='font-size: 13px' class="cita list-group-item">Operador: ${response.Cita[0].operador}</li>`;
      let start = `<li style='font-size: 13px' class="cita list-group-item">Hora inicial: ${horaInicio[1]}</li>`;
      let fecha = `<li style='font-size: 13px' class="cita list-group-item">Fecha: ${horaFinal[0]}</li>`;
      let ul = document.getElementById("ulCitaActiva");
      ul.innerHTML =
        title +
        siniestro +
        fecha +
        start +
        end +
        infoAdicional +
        asesor +
        operador;
      console.log("final");
      $("#btnEliminarCita").attr("disabled", false);
      document.getElementById("ulCitas").style.backgroundColor = "#00b360";
    } catch (error) {
      $(".cita").remove();
      document.getElementById("ulCitas").style.backgroundColor = "#B1B1B2";
    }
  });
}
function eliminarCita() {
  let opcion = confirm("Eliminar siniestro?");
  let id = document.getElementById("idOculto").value;
  if (opcion == true) {
    $.ajax({
      method: "POST",
      url: "../../php/Citas/ConsultasCitas.php",
      data: {
        accion: "EliminarCita",
        id,
      },
    }).done(function (result) {
      alert("Eliminado con exito");
      obtenerCitaActiva();
    });
    mensaje = "Has clickado OK";
  }
}
/////////////////////////////
//funciones todavia no utilizadas
////////////////////////////
function generarPassword() {
  let opcion = confirm("Generar nueva password?");
  if (opcion) {
    $.ajax({
      method: "POST",
      url: "../../php/Usuarios/GeneradorPassword.php",
      data: {
        accion: "GenerarPassword",
        usuario: document.getElementById("txtUsuario").textContent,
      },
    }).done(function (result) {
      let sinDiagonal = result.split("//");
      console.log(result);
      document.getElementById("passwordGenerada").textContent = sinDiagonal[0];
      document.getElementById("diasParaExpirar").textContent =
        14 - parseInt(sinDiagonal[1]);
    });
  }
}
function obtenerPassword() {
  let siniestro = document.getElementById("txtUsuario").textContent;
  $.ajax({
    method: "POST",
    url: "../../php/Usuarios/GeneradorPassword.php",
    data: {
      accion: "ObtenerPassword",
      siniestro,
    },
  }).done(function (result) {
    let resultado = result.split("//");
    if (resultado[0] == 1) {
      document.getElementById("passwordGenerada").textContent = resultado[1];
    } else {
      document.getElementById("passwordGenerada").textContent = "Sin Password";
    }
    console.log(result);
  });
}
