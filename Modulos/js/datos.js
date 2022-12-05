var contador = 0;
var contadorSeg = 0;
$(document).ready(function () {
  //alert(document.getElementById("sesionActual").textContent);
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
  //funcion para limpiar el regitro
  $("#limpiarRegistro").click(function () {
    $(".filtrosBusqueda").val($(".filtrosBusqueda option:first").val());
  });
});
//funcion para sesiones
function obtenerSesion() {
  let usuario = document.getElementById("sesionActual").textContent;
  $.ajax({
    type: "POST",
    url: "../../php/ObtenerSesion.php",
    dataType: "json",
    data: {
      accion: "Privilegios",
      usuario,
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
    url: "../../php/CantidadSiniestros.php",
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
    url: "../../php/CantidadSiniestrosDetalles/CantidadSiniestrosTerminados.php",
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
function busquedaFiltro(thisValue, accion, columna) {
  $.ajax({
    method: "POST",
    url: "../../php/Busquedas.php",
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
    if (i % 9 == 0 && i != 0) {
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
      numeroTBody += 1;
      tblBody[numeroTBody] = document.createElement("tbody");
      tblBody[numeroTBody].setAttribute("class", "tBody");
      tblBody[numeroTBody].setAttribute("id", "tBody:" + numeroTBody);
      tblBody[numeroTBody].style.display = "none";
      tablaDatos.appendChild(tblBody[numeroTBody]);
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
    url: "../../php/BusquedaSinFiltro.php",
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
    url: "../../php/BusquedaSinFiltro.php",
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
    url: "../../php/descargar.php",
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
    url: "../../php/mostrarSiniestrosDias.php",
    dataType: "json",
    data: {
      mayor: sinComas[0],
      menor: sinComas[1],
      accion: filtro,
    },
  }).done(function (result) {
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
      url: "../../php/EliminarSiniestro.php",
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
  console.log(idGuardado);
  $.post({
    url: "../../php/mostrarDatosSiniestro.php",
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
      document.getElementById("telPrincipal").value =
        result.Siniestros[0].telefonoPrincipal;
      document.getElementById("telSecundario").value =
        result.Siniestros[0].telefonosecundario;
      document.getElementById("contacto").value = result.Siniestros[0].contacto;
      document.getElementById("correoContacto").value =
        result.Siniestros[0].correoContacto;
      document.getElementById("telContacto").value =
        result.Siniestros[0].telContacto;
      //el arreglo que se crea se lo agregagmos a cada boton que hay
    },
  });
  mostrarHistorico();
  let iframe = document.getElementById("iFrameIdentificacion");
  iframe.style.display = "none";
  tablaSeguimiento();
  consultausuarios();
  let txtIdRegistro = document.getElementById("idOculto").value;
  docsYaCargados(txtIdRegistro);
  document.getElementById("txtComentSeguimiento").value = "";
}
////////////////////////////
function mostrarDocsAprobados() {
  let porcentaje = 0;
  let txtIdRegistro = document.getElementById("idOculto").value;
  let mostrarDocs = "mostrarDocsAprobados";
  $.ajax({
    url: "../DocumentosAprobados",
    data: {
      idRegistro: txtIdRegistro,
      funcARealizar: mostrarDocs,
    },
    success: function (result) {
      resultados = result.split(",");
      if (resultados[0] == "true") {
        document.getElementById("checkboxFactura").checked = true;
        porcentaje += 9;
      } else {
        document.getElementById("checkboxFactura").checked = false;
      }
      if (resultados[1] == "true") {
        document.getElementById("checkboxPoder").checked = true;
        porcentaje += 9;
      } else {
        document.getElementById("checkboxPoder").checked = false;
      }
      if (resultados[2] == "true") {
        document.getElementById("checkboxIdentificacion").checked = true;
        porcentaje += 10;
      } else {
        document.getElementById("checkboxIdentificacion").checked = false;
      }
      if (resultados[3] == "true") {
        document.getElementById("checkboxSituacion").checked = true;
        porcentaje += 9;
      } else {
        document.getElementById("checkboxSituacion").checked = false;
      }
      if (resultados[4] == "true") {
        document.getElementById("checkboxCurp").checked = true;
        porcentaje += 9;
      } else {
        document.getElementById("checkboxCurp").checked = false;
      }
      if (resultados[5] == "true") {
        document.getElementById("checkboxEstado").checked = true;
        porcentaje += 9;
      } else {
        document.getElementById("checkboxEstado").checked = false;
      }
      if (resultados[6] == "true") {
        document.getElementById("checkboxTenencia").checked = true;
        porcentaje += 9;
      } else {
        document.getElementById("checkboxTenencia").checked = false;
      }
      if (resultados[7] == "true") {
        document.getElementById("checkboxBaja").checked = true;
        porcentaje += 9;
      } else {
        document.getElementById("checkboxBaja").checked = false;
      }
      if (resultados[8] == "true") {
        document.getElementById("checkboxTarjeta").checked = true;
        porcentaje += 9;
      } else {
        document.getElementById("checkboxTarjeta").checked = false;
      }
      if (resultados[8] == "true") {
        document.getElementById("checkboxPoliza").checked = true;
        porcentaje += 9;
      } else {
        document.getElementById("checkboxPoliza").checked = false;
      }
      if (resultados[8] == "true") {
        document.getElementById("checkboxComprobante").checked = true;
        porcentaje += 9;
      } else {
        document.getElementById("checkboxComprobante").checked = false;
      }
      porcentajeBarra = document.getElementById("progresoDocsAprobados");
      porcentajeBarra.style.width = porcentaje + "%";
      porcentajeBarra.innerHTML = porcentaje + "%";
    },
  });
  tablaImagenes(txtIdRegistro);
  docsYaCargados(txtIdRegistro);
}
function tablaImagenes(txtIdRegistro) {
  $.ajax({
    url: "../DocumentosAprobados",
    data: {
      funcARealizar: "mostrarTabla",
      idRegistro: txtIdRegistro,
    },
    success: function (result) {
      $(".tablaImagenes").remove();
      let sinCodificado = result.split("/_-");
      for (let i = 0; i < sinCodificado.length - 1; i++) {
        let sinCodificado2 = sinCodificado[i].split("-_/");
        let tablaImagenes = document.getElementById("mostrarTablaImagenes");
        let btnGrupo = `<td><div class='btn-group tablaActual botonesTabla' role='group'>
        <button id='Ver,${sinCodificado2[0]},${sinCodificado2[3]}'
        onclick='funcionesBoton(this.id)' type='button' class='btn btn-primary'>Ver</button>
        <button id='Pdf,${sinCodificado2[0]},${sinCodificado2[3]},${sinCodificado2[4]}'
        onclick='convertirPDF(this.id)' type='button' class='btn btn-primary'>Pdf</button>
        <a href='./documentos/${sinCodificado2[4]}/${sinCodificado2[3]}' download='cute.jpg'>
        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none'
        stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'
        class='feather feather-download'>
        <path d='M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4'></path>
        <polyline points='7 10 12 15 17 10'></polyline>
        <line x1='12' y1='15' x2='12' y2='3'></line>
        </svg></a>
        <button id='Eliminar,${sinCodificado2[0]},${sinCodificado2[3]},${sinCodificado2[4]}'
        onclick='funcionesBoton(this.id)' type='button' class='btnEliminarClass btn btn-danger'>Eliminar</button>
        </div></td>`;
        let archivo = `<td>${sinCodificado2[1]}</td>`;
        let fechaCarga = `<td>${sinCodificado2[2]}</td>`;
        tablaImagenes.innerHTML += `<tr class='tablaImagenes'>${
          btnGrupo + archivo + fechaCarga
        }</tr>`;
      }
    },
  });
}
function funcionesBoton(getId) {
  let sinComas = getId.split(",");
  let sinPuntos = getId.split(".");
  let iframe = document.getElementById("iFrameIdentificacion");
  switch (sinComas[0]) {
    case "Ver":
      iframe.style.display = "none";
      $.ajax({
        method: "POST",
        url: "../FuncionesBtnDocs",
        data: {
          accion: "Ver",
        },
        success: function (result) {
          mostrarImagenSelect(result, sinPuntos, sinComas, iframe);
        },
      });
      break;
    case "Eliminar":
      $.ajax({
        method: "POST",
        url: "../FuncionesBtnDocs",
        data: {
          accion: "Eliminar",
          fkId: sinComas[3],
          nombreArchivo: sinComas[2],
          idImagen: sinComas[1],
        },
        success: function (result) {
          alert(result);
          $(".tablaImagenes").remove();
          let txtIdRegistro = document.getElementById("idOculto").value;
          tablaImagenes(txtIdRegistro); //se manda de nueva la funcion para actualizar las imagene que estan borradas
          Limpiarimagen(iframe);
        },
      });
      break;
  }
}
function mostrarImagenSelect(result, sinPuntos, sinComas, iframe) {
  let direccionId = document.getElementById("idOculto").value;
  if (sinPuntos[1] === "txt") {
    let imagen = document.getElementById("docSeleccionado");
    $.ajax({
      method: "POST",
      url: "../leerImagenes",
      data: {
        accion: "traerImagen64",
      },
      success: function (result) {
        iframe.style.display = "none";
        imagen.src = result;
      },
    });
  } else if (sinPuntos[1] === "pdf" || sinPuntos[1] === "docx") {
    iframe.src = "../documentos/" + direccionId + "/" + sinComas[2] + "";
    iframe.style.display = "";
  } else {
    let imagen = document.getElementById("docSeleccionado");
    iframe.style.display = "none";
    imagen.setAttribute(
      "src",
      "../documentos/" + direccionId + "/" + sinComas[2] + ""
    );
  }
}
function Limpiarimagen(iframe) {
  iframe.src = "";
  iframe.style.display = "none";
  let imagen = document.getElementById("docSeleccionado");
  iframe.style.display = "none";
  imagen.setAttribute("src", "");
}
function GuardarRegistros() {
  if (document.getElementById("valIndemnizacion").value.length > 0) {
    alert("Contact ");
  }
  $.ajax({
    type: "POST",
    url: "../ObtenerInfoDesplegableServlet",
    data: {
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
      valIndemnizacion: document.getElementById("valIndemnizacion").value,
      valComercial: document.getElementById("valComercial").value,
      asegurado: document.getElementById("asegurado").value,
      correo: document.getElementById("correo").value,
      telPrincipal: document.getElementById("telPrincipal").value,
      telSecundario: document.getElementById("telSecundario").value,
      contacto: document.getElementById("contacto").value,
      correoContacto: document.getElementById("correoContacto").value,
      telContacto: document.getElementById("telContacto").value,
      idEditableActual: document.getElementById("idOculto").value,
    },
  }).done(function (respuesta) {
    alert("Guardado con exito");
  });
  /*} else {
    alert("Por favor, inserta la informacion faltante");
  }*/
}
function InsertarSeguimiento() {
  $.ajax({
    url: "../GuardarSeguimiento",
    data: {
      accion: "guardarSeguimiento",
      estacion: document.getElementById("txtEstacionSoloLectura").value,
      comentSeguimiento: document.getElementById("txtComentSeguimiento").value,
      estatusSeguimiento: document.getElementById("txtEstatusSeguimiento")
        .value,
      subEstatus: document.getElementById("txtSubEstacion").value,
      respSolera: document.getElementById("txtRespSolera").value,
      persContactada: document.getElementById("txtPersContactada").value,
      tipoPersona: document.getElementById("txtTipoPersona").value,
      tipoContacto: document.getElementById("txTipoContacto").value,
      fechaPrimEnvDocs: document.getElementById("txtFechaPrimEnvDocs").value,
      fechaIntExp: document.getElementById("txtFechaIntExp").value,
      fechaFactServ: document.getElementById("txtFechaFactServ").value,
      fechaTermino: document.getElementById("txtFechaTermino").value,
      idRegistro: document.getElementById("idOculto").value,
      //usuario: document.getElementById("UsuarioActivo").textContent,
    },
    success: function (result) {
      alert(result);
      tablaSeguimiento();
    },
  });
}
function guardarDocsAprobados(id) {
  let txtFactura = document.getElementById("checkboxFactura");
  let txtPoder = document.getElementById("checkboxPoder");
  let txtIdentificacion = document.getElementById("checkboxIdentificacion");
  let txtSituacion = document.getElementById("checkboxSituacion");
  let txtCurp = document.getElementById("checkboxCurp");
  let txtEstado = document.getElementById("checkboxEstado");
  let txtTenencia = document.getElementById("checkboxTenencia");
  let txtBaja = document.getElementById("checkboxBaja");
  let txtTarjeta = document.getElementById("checkboxTarjeta");
  let txtPoliza = document.getElementById("checkboxPoliza");
  let txtComprobante = document.getElementById("checkboxComprobante");
  let txtIdRegistro = document.getElementById("idOculto");
  let guardarDocs = "guardarDocsAprobados";
  $.ajax({
    url: "../DocumentosAprobados",
    data: {
      factura: txtFactura.checked,
      poder: txtPoder.checked,
      identificacion: txtIdentificacion.checked,
      situacion: txtSituacion.checked,
      curp: txtCurp.checked,
      estado: txtEstado.checked,
      tenencia: txtTenencia.checked,
      baja: txtBaja.checked,
      tarjeta: txtTarjeta.checked,
      poliza: txtPoliza.checked,
      comprobante: txtComprobante.checked,
      idRegistro: txtIdRegistro.value,
      funcARealizar: guardarDocs,
    },
    success: function (resultado) {
      alert(resultado);
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
function enviarImagenes() {
  let imagen;
  imagen = new FormData(document.getElementById("archivoCargado"));
  $.ajax({
    url: "../GuardadoImagenesServlet",
    method: "post",
    data: imagen,
    cache: false,
    processData: false,
    contentType: false,
    success: function (result) {
      $(".tablaImagenes").remove();
      mostrarDocsAprobados();
      alert(result);
    },
    error: function () {
      alert("Servidor anormal, intente nuevamente más tarde ...");
    },
  });
  return false;
}
function mostrarHistorico() {
  let inputNombreFk = document.getElementById("fkIdOculto").value;
  let tabla = document.getElementById("ResultadoHistorico");
  $.ajax({
    method: "POST",
    url: "../TablasInteracciones",
    data: {
      accion: "TablaHistorica",
      inputNombreFk,
    },
  }).done(function (respuesta) {
    $(".historicoTablaDatos").remove();
    let sinCodificar = respuesta.split("-_/");
    let fechaCarga = `<td class='historicoTablaDatos'>${sinCodificar[0]}</td>`;
    let estatus = `<td class='historicoTablaDatos'>${sinCodificar[1]}</td>`;
    let usuario = `<td class='historicoTablaDatos'>${sinCodificar[2]}</td>`;
    tabla.innerHTML += `<tr>${fechaCarga + estatus + usuario}</tr>`;
  });
}
function tablaSeguimiento() {
  $.ajax({
    method: "post",
    url: "../TablasInteracciones",
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
    let sinCodificado = result.split("/_-");
    for (let i = 0; i < sinCodificado.length - 1; i++) {
      //console.log("entra");
      if (i % 5 == 0 && i != 0) {
        let sinCodificado2 = sinCodificado[i].split("-_/");
        usuario = `<td style='font-size: 12px'>${sinCodificado2[12]}</td>`;
        fecha = `<td style='font-size: 12px'>${sinCodificado2[11]}</td>`;
        estatus = `<td style='font-size: 12px'>${sinCodificado2[2]}</td>`;
        comentario = `<td style='font-size: 12px'>${sinCodificado2[0]}</td>`;
        tblBody[numeroTBody].innerHTML += `<tr class='claseTablaSeguimiento'>${
          usuario + fecha + estatus + comentario
        }</tr>`;
        tablaseguimiento.appendChild(tblBody[numeroTBody]);
        numeroTBody += 1;
        tblBody[numeroTBody] = document.createElement("tbody");
        tblBody[numeroTBody].setAttribute("class", "tBodySeg");
        tblBody[numeroTBody].setAttribute("id", "tBodySeg:" + numeroTBody);
        tblBody[numeroTBody].style.display = "none";
        tablaseguimiento.appendChild(tblBody[numeroTBody]);
      } else {
        let sinCodificado2 = sinCodificado[i].split("-_/");
        usuario = `<td style='font-size: 12px'>${sinCodificado2[12]}</td>`;
        fecha = `<td style='font-size: 12px'>${sinCodificado2[11]}</td>`;
        estatus = `<td style='font-size: 12px'>${sinCodificado2[2]}</td>`;
        comentario = `<td style='font-size: 12px'>${sinCodificado2[0]}</td>`;
        tblBody[numeroTBody].innerHTML += `<tr class='claseTablaSeguimiento'>${
          usuario + fecha + estatus + comentario
        }</tr>`;
      }
    }
  });
}
function docsYaCargados(txtIdRegistro) {
  selectaOcultar = document.getElementById("selectFactura");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectPoder");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectIdenti");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectConstancia");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectCurp");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectEstado");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectTenencia");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectbaja");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectTarjeta");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectPoliza");
  selectaOcultar.disabled = false;
  selectaOcultar = document.getElementById("selectCompro");
  selectaOcultar.disabled = false;
  $.ajax({
    method: "POST",
    url: "../DocumentosAprobados",
    data: {
      txtIdRegistro,
      funcARealizar: "docsYaCargados",
    },
  }).done(function (result) {
    let sinCodificado = result.split("-_/");
    let selectaOcultar;
    for (let i = 0; i < sinCodificado.length - 1; i++) {
      if (sinCodificado[i] === "Factura original") {
        selectaOcultar = document.getElementById("selectFactura");
        selectaOcultar.disabled = true;
      } else if (sinCodificado[i] === "Poder notarial") {
        selectaOcultar = document.getElementById("selectPoder");
        selectaOcultar.disabled = true;
      } else if (sinCodificado[i] === "Identificacion oficial") {
        selectaOcultar = document.getElementById("selectIdenti");
        selectaOcultar.disabled = true;
      } else if (sinCodificado[i] === "Constancia SF") {
        selectaOcultar = document.getElementById("selectConstancia");
        selectaOcultar.disabled = true;
      } else if (sinCodificado[i] === "Curp") {
        selectaOcultar = document.getElementById("selectCurp");
        selectaOcultar.disabled = true;
      } else if (sinCodificado[i] === "Estado de cuenta") {
        selectaOcultar = document.getElementById("selectEstado");
        selectaOcultar.disabled = true;
      } else if (sinCodificado[i] === "Tenencias") {
        selectaOcultar = document.getElementById("selectTenencia");
        selectaOcultar.disabled = true;
      } else if (sinCodificado[i] === "Baja de placas") {
        selectaOcultar = document.getElementById("selectbaja");
        selectaOcultar.disabled = true;
      } else if (sinCodificado[i] === "Tarjeta de circulacion") {
        selectaOcultar = document.getElementById("selectTarjeta");
        selectaOcultar.disabled = true;
      } else if (sinCodificado[i] === "Poliza") {
        selectaOcultar = document.getElementById("selectPoliza");
        selectaOcultar.disabled = true;
      } else if (sinCodificado[i] === "Comprobante de domicilio") {
        selectaOcultar = document.getElementById("selectCompro");
        selectaOcultar.disabled = true;
      }
    }
  });
}
//https://datatables.net/
function asignarIntegrador() {
  $.ajax({
    method: "POST",
    url: "../GuardarSeguimiento",
    data: {
      accion: "AsignarIntegrador",
      integrador: document.getElementById("txtIntegrador").value,
      idRegistro: document.getElementById("idOculto").value,
      // usuario: document.getElementById("UsuarioActivo").textContent,
    },
  }).done(function (result) {
    alert(result);
    tablaSeguimiento();
  });
}
function consultausuarios() {
  $.ajax({
    method: "POST",
    url: "../ConsultaUsuarios",
    data: {
      accion: "consultaUsuarios",
    },
  }).done(function (response) {
    let sinCodificado = response.split("/-_");
    for (let i = 0; i < sinCodificado.length - 1; i++) {
      let selectIntegradores = document.getElementById("txtIntegrador");
      let option = document.createElement("option");
      option.text = sinCodificado[i];
      selectIntegradores.add(option);
    }
  });
}
function exportarUsuarios() {
  $.ajax({
    method: "POST",
    url: "../ExportarUsuarios",
    data: {},
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
}
