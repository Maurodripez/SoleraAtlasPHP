var contador = 0;
var contadorSeg = 0;
window.addEventListener("load", function () {
  valoresSesiones();
  recargarSiniestros();
  //muestra los dias paasados por documentos
});
function buscarDatos() {
  txtFechaCarga = document.getElementById("txtFechaCarga").value;
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
  txtFechaSeguimiento = document.getElementById("txtFechaSeguimiento").value;
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
    url: "../ControladorMostrarDatos",
    data: {
      accion: "mostrarTabla",
      fechaCarga: txtFechaCarga,
      estacion: txtEstacion,
      estatus: txtEstatus,
      subEstatus: txtSubEstatus,
      fechaSeguimiento: txtFechaSeguimiento,
      region: txtRegion,
      estado: txtEstado,
      cobertura: txtCobertura,
    },
    success: function (result) {
      mostrarTabla(result);
      buscarDatosExportar();
    },
  });
}
function cambiarNombre(get) {
  /////se recibe el parametro id
  let inputNombre = document.getElementById("idOculto"); ////se obtiene el input oculto para cambiar el valor del boton y mandar el formulario ya que java trabaja con los valores y no id
  let inputNombreFk = document.getElementById("fkIdOculto");
  inputNombreFk.value = get;
  inputNombre.value = get;
  let idGuardado = get; ///////////se manda el id para hacer la busqueda y mostrar los datos del siniestro
  $.post({
    url: "../MostrarDatosServlet",
    data: {
      idGuardadoEnvio: idGuardado,
    },
    success: function (result) {
      let resultados = "";
      ///////si en java todo sale correcto, se mandan los resultados y se realiza la obtencion de datos y dividirlos para desplegarlos en pantalla
      resultados = result.split(","); ///mandamos los datos por nmedio de , y asi poder dividirlos ymandarlos de manera individual
      //sebuscan los id para poder modificar su contenido
      let fechaCarga = document.getElementById("fechaCarga");
      let numSiniestro = document.getElementById("numSiniestro");
      let poliza = document.getElementById("poliza");
      let afectado = document.getElementById("afectado");
      let tipoDeCaso = document.getElementById("tipoDeCaso");
      let cobertura = document.getElementById("cobertura");
      let fechaSiniestro = document.getElementById("fechaSiniestro");
      let datosAudatex = document.getElementById("datosAudatex");
      let estado = document.getElementById("estado");
      let ciudad = document.getElementById("ciudad");
      let region = document.getElementById("region");
      let ubicacionTaller = document.getElementById("ubicacionTaller");
      let financiado = document.getElementById("financiado");
      let regimenFiscal = document.getElementById("regimenFiscal");
      let passwordExterno = document.getElementById("passwordExterno");
      let estatusCliente = document.getElementById("estatusCliente");
      let comentariosCliente = document.getElementById("comentariosCliente");
      let marca = document.getElementById("marca");
      let tipo = document.getElementById("tipo");
      let modelo = document.getElementById("modelo");
      let placas = document.getElementById("placas");
      let numSerie = document.getElementById("numSerie");
      let valIndemnizacion = document.getElementById("valIndemnizacion");
      let valComercial = document.getElementById("valComercial");
      let asegurado = document.getElementById("asegurado");
      let correo = document.getElementById("correo");
      let telPrincipal = document.getElementById("telPrincipal");
      let telSecundario = document.getElementById("telSecundario");
      let contacto = document.getElementById("contacto");
      let correoContacto = document.getElementById("correoContacto");
      let telContacto = document.getElementById("telContacto");
      //el arreglo que se crea se lo agregagmos a cada boton que hay
      fechaCarga.value = resultados[0];
      numSiniestro.value = resultados[1];
      poliza.value = resultados[2];
      afectado.value = resultados[3];
      tipoDeCaso.value = resultados[4];
      cobertura.value = resultados[5];
      fechaSiniestro.value = resultados[6];
      datosAudatex.value = resultados[7];
      estado.value = resultados[8];
      ciudad.value = resultados[9];
      region.value = resultados[10];
      ubicacionTaller.value = resultados[11];
      financiado.value = resultados[12];
      regimenFiscal.value = resultados[13];
      passwordExterno.value = resultados[14];
      estatusCliente.value = resultados[15];
      comentariosCliente.value = resultados[16];
      marca.value = resultados[17];
      tipo.value = resultados[19];
      modelo.value = resultados[18];
      placas.value = resultados[20];
      numSerie.value = resultados[21];
      valIndemnizacion.value = resultados[22];
      valComercial.value = resultados[23];
      asegurado.value = resultados[24];
      correo.value = resultados[25];
      telPrincipal.value = resultados[26];
      telSecundario.value = resultados[27];
      contacto.value = resultados[28];
      correoContacto.value = resultados[29];
      telContacto.value = resultados[30];
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
  if (
    document.getElementById("fechaCarga").value != "" &&
    document.getElementById("numSiniestro").value != "" &&
    document.getElementById("poliza").value != "" &&
    document.getElementById("afectado").value != "" &&
    document.getElementById("tipoDeCaso").value != "" &&
    document.getElementById("cobertura").value != "" &&
    document.getElementById("fechaSiniestro").value != "" &&
    document.getElementById("datosAudatex").value != "" &&
    document.getElementById("estado").value != "" &&
    document.getElementById("ciudad").value != "" &&
    document.getElementById("region").value != "" &&
    document.getElementById("ubicacionTaller").value != "" &&
    document.getElementById("financiado").value != "" &&
    document.getElementById("regimenFiscal").value != "" &&
    document.getElementById("passwordExterno").value != "" &&
    document.getElementById("estatusCliente").value != "" &&
    document.getElementById("comentariosCliente").value != "" &&
    document.getElementById("marca").value != "" &&
    document.getElementById("tipo").value != "" &&
    document.getElementById("modelo").value != "" &&
    document.getElementById("placas").value != "" &&
    document.getElementById("numSerie").value != "" &&
    document.getElementById("valIndemnizacion").value != "" &&
    document.getElementById("valComercial").value != "" &&
    document.getElementById("asegurado").value != "" &&
    document.getElementById("correo").value != "" &&
    document.getElementById("telPrincipal").value != "" &&
    document.getElementById("telSecundario").value != "" &&
    document.getElementById("contacto").value != "" &&
    document.getElementById("correoContacto").value != "" &&
    document.getElementById("telContacto").value != "" &&
    document.getElementById("idOculto").value != ""
  ) {
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
  } else {
    alert("Por favor, inserta la informacion faltante");
  }
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
      usuario: document.getElementById("UsuarioActivo").textContent,
    },
    success: function (result) {
      alert(result);
      tablaSeguimiento();
    },
  });
}
$(document).ready(function () {
  estaciones();
  controlPaginado();
  //funcion para limpiar el regitro
  $("#limpiarRegistro").click(function () {
    $(".filtrosBusqueda").val($(".filtrosBusqueda option:first").val());
  });
});
function exportTableToExcel(tableID, filename = "") {
  $(".botonesTabla").remove();
  let downloadLink;
  let dataType = "application/vnd.ms-excel";
  let tableSelect = document.getElementById(tableID);
  let tableHTML = tableSelect.outerHTML.replace(/ /g, "%20");

  // Specify file name
  filename = filename ? filename + ".xls" : "excel_data.xls";

  // Create download link element
  downloadLink = document.createElement("a");

  document.body.appendChild(downloadLink);

  if (navigator.msSaveOrOpenBlob) {
    let blob = new Blob(["ufeff", tableHTML], {
      type: dataType,
    });
    navigator.msSaveOrOpenBlob(blob, filename);
  } else {
    // Create a link to the file
    downloadLink.href = "data:" + dataType + ", " + tableHTML;

    // Setting the file name
    downloadLink.download = filename;

    //triggering the function
    downloadLink.click();
  }
  recargarSiniestros();
}
//funcion para buscar en tiempo real los resultados
function busquedaParticular(getId, getValue) {
  let pElement = document.getElementById("paginaActual");
  console.log(pElement.textContent);
  console.log(parseInt(pElement.textContent) * 10);
  $.ajax({
    method: "POST",
    url: "../BusquedaParticularDatos",
    data: {
      id: getId,
      valor: getValue,
    },
    success: function (result) {
      mostrarTabla(result);
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
function valoresSesiones() {
  let sesion = document.getElementById("UsuarioActivo").textContent;
  $.ajax({
    method: "POST",
    url: "../ValidarSesiones",
    data: {
      accion: "ValidarUsuario",
      usuario: sesion,
    },
    success: function (result) {
      if (result === "consulta") {
        document.getElementById("gDatosBtn").disabled = true;
        document.getElementById("insertarSeguimiento").disabled = true;
        document.getElementById("btnAsignarIntegrador").disabled = true;
        document.getElementById("btnDocsAprobados").disabled = true;
        document.getElementById("btnSubirDoc").disabled = true;
        $(".btnEliminarClass").prop("disabled", true);
        // document.getElementsByClassName("btnEliminarClass").disabled = true;
      } else if (result === "operador" || result === "integrador") {
        document.getElementById("fechaCarga").disabled = true;
      }
    },
  });
}
function validarEliminar() {
  let sesion = document.getElementById("UsuarioActivo").textContent;
  $.ajax({
    method: "POST",
    url: "../ValidarSesiones",
    data: {
      accion: "ValidarUsuario",
      usuario: sesion,
    },
    success: function (result) {
      if (result == "root" || result == "supervisor") {
        $(".btnEliminar").show(); //muestro mediante clase
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
function eliminarSiniestro(getId) {
  //funcion para borrar el siniestro
  let sinComas = getId.split(",");
  let idEliminar = sinComas[0];
  let mensaje;
  let opcion = confirm("Confirma para eliminar siniestro");
  if (opcion == true) {
    $.ajax({
      method: "POST",
      url: "../EliminarSiniestro",
      data: {
        idEliminar,
      },
    }).done(function (respuesta) {
      alert(respuesta);
      contador = 0;
      paginaActual.textContent = contador;
      recargarSiniestros();
    });
  } else {
    mensaje = "Movimiento cancelado";
  }
}
function recargarSiniestros() {
  $.ajax({
    method: "POST",
    url: "../ControladorMostrarDatos",
    data: {
      accion: "MostrarSiniestrosNoDocs",
      soloDatos: "SoloDatos",
    },
    success: function (result) {
      mostrarTabla(result);
    },
  }); //
  $.ajax({
    method: "POST",
    url: "../SiniestrosNoDocs",
    data: {
      accion: "SiniestrosEnRespuesta",
      cero: "0",
      tres: "3",
      seis: "6",
      quince: "15",
      treinta: "45",
    },
    success: function (result) {
      let sinComas = result.split("/-_");
      $("#de0a2").html(sinComas[0]);
      $("#de3a5").html(sinComas[1]);
      $("#de6a14").html(sinComas[2]);
      $("#mas15").html(sinComas[3]);
      document.getElementById("terminados0a2").textContent = sinComas[4];
      document.getElementById("seguimiento0a2").textContent = sinComas[5];
      document.getElementById("incorrectos0a2").textContent = sinComas[6];
      document.getElementById("terminados3a5").textContent = sinComas[7];
      document.getElementById("seguimiento3a5").textContent = sinComas[8];
      document.getElementById("incorrectos3a5").textContent = sinComas[9];
      document.getElementById("terminados6a14").textContent = sinComas[10];
      document.getElementById("seguimiento6a14").textContent = sinComas[11];
      document.getElementById("incorrectos6a14").textContent = sinComas[12];
      document.getElementById("terminadosmas15").textContent = sinComas[13];
      document.getElementById("seguimientomas15").textContent = sinComas[14];
      document.getElementById("incorrectosmas15").textContent = sinComas[15];
    },
  });
}
function busquedaGeneral(thisValue) {
  $.ajax({
    method: "POST",
    url: "../BusquedaGeneral",
    data: {
      filtro: thisValue,
    },
    success: function (result) {
      mostrarTabla(result);
    },
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
function mostrarTabla(result) {
  //funcion para generar talbas en automatico con lo resultados
  let tablaDatos = document.getElementById("DatosTabla");
  let sinDiagonal = result.split("/_-");
  $(".tablaActual").remove();
  $(".tBody").remove();
  let resultado = (sinDiagonal.length - 1) / 10;
  let cantidadTablas;
  if (resultado % 1 == 0) {
    cantidadTablas = resultado;
  } else {
    cantidadTablas = Math.trunc((sinDiagonal.length - 1) / 10) + 2;
  }
  let numeroTBody = 0;
  let tblBody = new Array();
  tblBody[numeroTBody] = document.createElement("tbody");
  tblBody[numeroTBody].setAttribute("class", "tBody");
  tblBody[numeroTBody].setAttribute("id", "tBody:" + numeroTBody);
  tablaDatos.appendChild(tblBody[numeroTBody]);
  for (let i = 0; i < sinDiagonal.length - 1; i++) {
    let sinComas = sinDiagonal[i].split("-_/");
    if (i % 9 == 0 && i != 0) {
      // Creando los 'td' que almacenará cada parte de la información del usuario actual
      let btnGrupo = `<td><div class="btn-group tablaActual botonesTabla" role="group">
      <button type='button' id=${
        sinComas[0] + ",Eliminar"
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
        sinComas[0]
      } class='btn btn-primary' data-bs-toggle='modal'
      data-bs-target='#despliegueInfo'  onclick='cambiarNombre(this.id)' value='Editar'><svg xmlns='http://www.w3.org/2000/svg'
      width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
      <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 
      1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
      <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 
      0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
      </svg></button>
    </div></td>`;
      registro = `<td style='font-size: 14px' class='tablaActual'>${sinComas[0]}</td>`;
      siniestro = `<td style='font-size: 14px' class='tablaActual'>${sinComas[1]}</td>`;
      poliza = `<td style='font-size: 14px' class='tablaActual'>${sinComas[2]}</td>`;
      marca = `<td style='font-size: 14px' class='tablaActual'>${sinComas[3]}</td>`;
      tipo = `<td style='font-size: 14px' class='tablaActual'>${sinComas[4]}</td>`;
      serie = `<td style='font-size: 14px' class='tablaActual'>${sinComas[5]}</td>`;
      carga = `<td style='font-size: 14px' class='tablaActual'>${sinComas[6]}</td>`;
      estacion = `<td style='font-size: 14px' class='tablaActual'>${sinComas[7]}</td>`;
      estatus = `<td style='font-size: 14px' class='tablaActual'>${sinComas[8]}</td>`;
      porcentajeDocs = `<td style='font-size: 14px' class='tablaActual'>${sinComas[9]}</td>`;
      porcentajeTotal = `<td style='font-size: 14px' class='tablaActual'>${sinComas[10]}</td>`;
      estado = `<td style='font-size: 14px' class='tablaActual'>${sinComas[11]}</td>`;
      tblBody[numeroTBody].innerHTML += `<tr class='tablaActual'>${
        btnGrupo +
        registro +
        siniestro +
        poliza +
        marca +
        tipo +
        serie +
        carga +
        estacion +
        estatus +
        porcentajeDocs +
        porcentajeTotal +
        estado
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
        sinComas[0] + ",Eliminar"
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
        sinComas[0]
      } class='btn btn-primary' data-bs-toggle='modal'
      data-bs-target='#despliegueInfo'  onclick='cambiarNombre(this.id)' value='Editar'><svg xmlns='http://www.w3.org/2000/svg'
      width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
      <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 
      1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
      <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 
      0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
      </svg></button>
    </div></td>`;
      let registro = `<td style='font-size: 14px' class='tablaActual'>${sinComas[0]}</td>`;
      let siniestro = `<td style='font-size: 14px' class='tablaActual'>${sinComas[1]}</td>`;
      let poliza = `<td style='font-size: 14px' class='tablaActual'>${sinComas[2]}</td>`;
      let marca = `<td style='font-size: 14px' class='tablaActual'>${sinComas[3]}</td>`;
      let tipo = `<td style='font-size: 14px' class='tablaActual'>${sinComas[4]}</td>`;
      let serie = `<td style='font-size: 14px' class='tablaActual'>${sinComas[5]}</td>`;
      let carga = `<td style='font-size: 14px' class='tablaActual'>${sinComas[6]}</td>`;
      let estacion = `<td style='font-size: 14px' class='tablaActual'>${sinComas[7]}</td>`;
      let estatus = `<td style='font-size: 14px' class='tablaActual'>${sinComas[8]}</td>`;
      let porcentajeDocs = `<td style='font-size: 14px' class='tablaActual'>${sinComas[9]}</td>`;
      let porcentajeTotal = `<td style='font-size: 14px' class='tablaActual'>${sinComas[10]}</td>`;
      let estado = `<td style='font-size: 14px' class='tablaActual'>${sinComas[11]}</td>`;
      tblBody[numeroTBody].innerHTML += `<tr class='tablaActual'>${
        btnGrupo +
        registro +
        siniestro +
        poliza +
        marca +
        tipo +
        serie +
        carga +
        estacion +
        estatus +
        porcentajeDocs +
        porcentajeTotal +
        estado
      }</tr>`;
    }
  }
  validarEliminar();
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
      usuario: document.getElementById("UsuarioActivo").textContent,
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
function busquedaConFiltros() {
  let checkTerminados = document.getElementById("terminadosBtn");
  let checkSeguimiento = document.getElementById("enSeguimientoBtn");
  let checkIncorrectos = document.getElementById("datosIncorrectosBtn");
  if (
    checkTerminados.checked == true &&
    checkSeguimiento.checked == true &&
    checkIncorrectos.checked == true
  ) {
    funcionAjaxParaFiltros("3Checked");
  } else if (
    checkTerminados.checked == true &&
    checkSeguimiento.checked == true
  ) {
    funcionAjaxParaFiltros("terminadoSeguimiento");
  } else if (
    checkTerminados.checked == true &&
    checkIncorrectos.checked == true
  ) {
    funcionAjaxParaFiltros("terminadoIncorrecto");
  } else if (
    checkSeguimiento.checked == true &&
    checkIncorrectos.checked == true
  ) {
    funcionAjaxParaFiltros("seguimientoIncorrecto");
  } else if (checkTerminados.checked == true) {
    funcionAjaxParaFiltros("terminado");
  } else if (checkSeguimiento.checked == true) {
    funcionAjaxParaFiltros("seguimiento");
  } else if (checkIncorrectos.checked == true) {
    funcionAjaxParaFiltros("incorrectos");
  }
}
function funcionAjaxParaFiltros(filtro, getId) {
  let sinComas = getId.split(",");
  $.ajax({
    method: "POST",
    url: "../../php/mostrarSiniestrosDias.php",
    data: {
      mayor: sinComas[0],
      menor: sinComas[1],
      accion: filtro,
    },
    success: function (result) {
      console.log(result);
      mostrarTabla(result);
    },
  });
}
function exportarUsuarios() {
  $.ajax({
    method: "POST",
    url: "../ExportarUsuarios",
    data: {},
  });
}
function buscarDatosExportar() {
  if (
    document.getElementById("fechaSegInicio").value != "" &&
    document.getElementById("fechaSegFinal").value != ""
  ) {
    $.ajax({
      method: "POST",
      url: "../exportar",
      data: {
        accion: "exportarGrande",
        fechaInicio: document.getElementById("fechaSegInicio").value,
        fechaFinal: document.getElementById("fechaSegFinal").value,
      },
    }).done(function (result) {
      console.log(result);
    });
  } else {
    alert("Por favor, selecciona fechas correctas");
  }
}
function exportarGrande() {
  let descarga = document.getElementById("btnDescargarExcel");
  descarga.click();
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
