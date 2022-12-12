function ocultarIframes() {
  document.getElementById("iFrameFactura").style.display = "none";
  document.getElementById("iFrameSecuencia").style.display = "none";
  document.getElementById("iFrameCertificado").style.display = "none";
  document.getElementById("iFrameCopiaCertificado").style.display = "none";
  document.getElementById("iFrameImportacion").style.display = "none";
  document.getElementById("iFramePermiso").style.display = "none";
  document.getElementById("iFrameRFV").style.display = "none";
  document.getElementById("iFrameVerificacion").style.display = "none";
  document.getElementById("iFrameTenencia").style.display = "none";
  document.getElementById("iFrameBaja").style.display = "none";
  document.getElementById("iFrameFacturaMotor").style.display = "none";
  document.getElementById("iFrameLlaves").style.display = "none";
  document.getElementById("iFrameConoce").style.display = "none";
  document.getElementById("iFrameLFPDPPP").style.display = "none";
  document.getElementById("iFrameAveriguacion").style.display = "none";
  document.getElementById("iFrameAcreditacion").style.display = "none";
  document.getElementById("iFrameAviso").style.display = "none";
  document.getElementById("iFrameOtros").style.display = "none";
  document.getElementById("iFrameOficio").style.display = "none";
  document.getElementById("iFrameOficioCancelacion").style.display = "none";
}
$(document).ready(function (e) {
  subirImagen();
  ocultarIframes();
  mostrarImagenFrame();
  acordeonCerrado();
  let iFrame = document.getElementById("iFrameFactura");
  if (document.querySelector("#btnIdentificacion.collapsed")) {
    iFrame.style.display = "none";
  } else {
    console.log("Se ejecuta si no la tiene");
    iFrame.style.display = "";
  }
  //obtenemos la clasepara saber que boton se esta presionando
  $(".accordion-button").on("click", function () {
    btnAcordeon = $(this).attr("value");
    mortrarImagen(btnAcordeon);
  });
  //funcion para obtneer el boton que se preciona en ese momento
  $(function () {
    $("#traerDatos").click(function () {
      //le agregamos el valor del boton que se apreto con la clase
      traerDatos();
    });
  });
  //file type validation
});
///////////////////////////
//funciones utilizadas
///////////////////////////

//inicio de la carga de imagenes por medio del usuario
let botonPresionado;
let btnAcordeon;
window.addEventListener("load", function () {
  $("#btnConfirmarDatos").on("click", function () {
    validarDatos();
  });
  $("#modalConfirmarDocs").on("click", function () {
    traerDatos();
  });
  //////////////////////////////////////////////
});
function GuardarComent() {
  //funcion para guardar los mensajes del cliente
  let obtenerInfo = document.getElementById("Valor").textContent;
  let infoTexto = document.getElementById("comentarios");
  $.ajax({
    method: "post",
    url: "Comentarios",
    data: {
      accion: "GuardarComents",
      comentario: infoTexto.value,
      idRegistro: obtenerInfo,
    },
    success: function (result) {
      alert(result);
    },
  });
}
function TablaMensajes() {
  let obtenerInfo = document.getElementById("Valor").textContent;
  $.ajax({
    method: "post",
    url: "Comentarios",
    data: {
      accion: "MostrarTabla",
      idRegistro: obtenerInfo,
    },
    success: function (result) {
      console.log(result);
      let tablaMensajes = document.getElementById("Tablamensajes");
      let sinDiagonal = result.split("/");
      console.log(sinDiagonal.length);
      for (let i = 0; i < sinDiagonal.length - 1; i++) {
        let sinComas = sinDiagonal[i].split(",");
        // Creando los 'td' que almacenará cada parte de la información del usuario actual
        let usuario = `<td>${sinComas[0]}</td>`;
        let fecha = `<td>${sinComas[1]}</td>`;
        let comentario = `<td>${sinComas[2]}</td>`;

        tablaMensajes.innerHTML += `<tr>${usuario + fecha + comentario}</tr>`;
      }
    },
  });
}
function acordeonCerrado() {
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnFactura.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnSecuencia").on("click", function () {
    let iFrame = document.getElementById("iFrameSecuencia");
    if (document.querySelector("#btnSecuencia.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
  $("#btnFactura").on("click", function () {
    let iFrame = document.getElementById("iFrameFactura");
    if (document.querySelector("#btnIdentificacion.collapsed")) {
      iFrame.style.display = "none";
    } else {
      iFrame.style.display = "";
    }
  });
}
let abrirCerrarIdent = true;
let abrirCerrarComp = true;
let abrirCerrarInfo = true;
let abrirCerrarFact = true;
let abrirCerrarTenen = true;
let abrirCerrarBaja = true;
let abrirCerrarEstado = true;
let abrirCerrarDenun = true;
let abrirCerrarAcred = true;
function mostrarImagenFrame() {
  let idRegistro = document.getElementById("sesionActual").textContent;
  $.ajax({
    method: "post",
    url: "../php/BusquedaSinFiltro.php",
    dataType: "json",
    data: {
      idRegistro,
      accion: "imagenesUsuario",
    },
  }).done(function (result) {
    console.log(result);
    let iFrame;
    for (let i in result.Imagen) {
        iFrame = document.getElementById(result.Imagen[i].iframe);
        iFrame.style.display = "none";
        iFrame.src = `../Documentos/Ids/${idRegistro}/${result.Imagen[i].nombreImagen}`;
    }
  });
}
function mortrarImagen(valor) {
  let obtenerInfo = document.getElementById("Valor").textContent;
  $.ajax({
    method: "post",
    url: "ImagenesUsuario",
    data: {
      id: obtenerInfo,
      nombreDoc: btnAcordeon,
    },
    success: function (result) {
      let sinCodificado = result.split("=/=");
      for (let i = 0; i < sinCodificado.length - 1; i = i + 3) {
        console.log(sinCodificado[i]);
        switch (sinCodificado[i]) {
          case "Identificacion oficial":
            alert("entra");
            if (abrirCerrarIdent == false) {
              let imagenSrc = document.getElementById("imgIdentificacionVer");
              let iframe = document.getElementById("iFrameIdentificacion");
              iframe.style.display = "none";
              imagenSrc.src = "";
              abrirCerrarIdent = true;
            } else {
              let imagenSrc = document.getElementById("imgIdentificacionVer");
              let saberExt = sinCodificado[i + 2].slice(
                ((sinCodificado[i + 2].lastIndexOf(".") - 1) >>> 0) + 2
              );
              if (saberExt === "pdf") {
                let iframe = document.getElementById("iFrameIdentificacion");
                iframe.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                iframe.style.display = "";
                abrirCerrarIdent = false;
              } else {
                imagenSrc.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                abrirCerrarIdent = false;
              }
            }
            break;

          case "Comprobante de domicilio":
            if (abrirCerrarComp == false) {
              let imagenSrc = document.getElementById("imgComprobanteVer");
              let iframe = document.getElementById("iFrameComprobante");
              iframe.style.display = "none";
              imagenSrc.src = "";
              abrirCerrarComp = true;
            } else {
              let imagenSrc = document.getElementById("imgComprobanteVer");
              let saberExt = sinCodificado[i + 2].slice(
                ((sinCodificado[i + 2].lastIndexOf(".") - 1) >>> 0) + 2
              );
              if (saberExt === "pdf") {
                let iframe = document.getElementById("iFrameComprobante");
                iframe.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                iframe.style.display = "";
                abrirCerrarComp = false;
              } else {
                imagenSrc.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                abrirCerrarComp = false;
              }
            }
            break;

          case "Informacion adicional":
            if (abrirCerrarInfo == false) {
              let imagenSrc = document.getElementById("imgInfoVer");
              let iframe = document.getElementById("iFrameInfo");
              iframe.style.display = "none";
              imagenSrc.src = "";
              abrirCerrarInfo = true;
            } else {
              let imagenSrc = document.getElementById("imgInfoVer");
              let saberExt = sinCodificado[i + 2].slice(
                ((sinCodificado[i + 2].lastIndexOf(".") - 1) >>> 0) + 2
              );
              if (saberExt === "pdf") {
                let iframe = document.getElementById("iFrameInfo");
                iframe.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                iframe.style.display = "";
                abrirCerrarInfo = false;
              } else {
                imagenSrc.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                abrirCerrarInfo = false;
              }
            }
            break;

          case "Factura del vehiculo":
            if (abrirCerrarFact == false) {
              let imagenSrc = document.getElementById("imgFacturaVer");
              let iframe = document.getElementById("iFrameFactura");
              iframe.style.display = "none";
              imagenSrc.src = "";
              abrirCerrarFact = true;
            } else {
              let imagenSrc = document.getElementById("imgFacturaVer");
              let saberExt = sinCodificado[i + 2].slice(
                ((sinCodificado[i + 2].lastIndexOf(".") - 1) >>> 0) + 2
              );
              if (saberExt === "pdf") {
                let iframe = document.getElementById("iFrameFactura");
                iframe.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                iframe.style.display = "";
                abrirCerrarFact = false;
              } else {
                imagenSrc.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                abrirCerrarFact = false;
              }
            }
            break;

          case "Tenencias":
            console.log("aqui entra");
            if (abrirCerrarTenen == false) {
              let imagenSrc = document.getElementById("imgTenenciasVer");
              let iframe = document.getElementById("iFrameTenencia");
              iframe.style.display = "none";
              imagenSrc.src = "";
              abrirCerrarTenen = true;
            } else {
              let imagenSrc = document.getElementById("imgTenenciasVer");
              let saberExt = sinCodificado[i + 2].slice(
                ((sinCodificado[i + 2].lastIndexOf(".") - 1) >>> 0) + 2
              );
              if (saberExt === "pdf") {
                let iframe = document.getElementById("iFrameTenencia");
                iframe.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                iframe.style.display = "";
                abrirCerrarTenen = false;
              } else {
                console.log(obtenerInfo);
                console.log(sinCodificado[i + 2]);
                console.log(
                  "./documentos/" +
                    obtenerInfo +
                    "/" +
                    sinCodificado[i + 2] +
                    ""
                );
                imagenSrc.src = "./documentos/100/cutez-1.jpg";
                //imagenSrc.src="./documentos/100/cute (1).jpg";
                abrirCerrarTenen = false;
              }
            }
            break;

          case "Baja":
            if (abrirCerrarBaja == false) {
              let imagenSrc = document.getElementById("imgBajaVer");
              let iframe = document.getElementById("iFrameBaja");
              iframe.style.display = "none";
              imagenSrc.src = "";
              abrirCerrarBaja = true;
            } else {
              let imagenSrc = document.getElementById("imgBajaVer");
              let saberExt = sinCodificado[i + 2].slice(
                ((sinCodificado[i + 2].lastIndexOf(".") - 1) >>> 0) + 2
              );
              if (saberExt === "pdf") {
                let iframe = document.getElementById("iFrameBaja");
                iframe.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                iframe.style.display = "";
                abrirCerrarBaja = false;
              } else {
                imagenSrc.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                abrirCerrarBaja = false;
              }
            }
            break;

          case "Estado de cuenta":
            if (abrirCerrarEstado == false) {
              let imagenSrc = document.getElementById("imgEstadoVer");
              let iframe = document.getElementById("iFrameEstado");
              iframe.style.display = "none";
              imagenSrc.src = "";
              abrirCerrarEstado = true;
            } else {
              let imagenSrc = document.getElementById("imgEstadoVer");
              let saberExt = sinCodificado[i + 2].slice(
                ((sinCodificado[i + 2].lastIndexOf(".") - 1) >>> 0) + 2
              );
              if (saberExt === "pdf") {
                let iframe = document.getElementById("iFrameEstado");
                iframe.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                iframe.style.display = "";
                abrirCerrarEstado = false;
              } else {
                imagenSrc.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                abrirCerrarEstado = false;
              }
            }
            break;

          case "Denuncia":
            if (abrirCerrarDenun == false) {
              let imagenSrc = document.getElementById("imgDenunciaVer");
              let iframe = document.getElementById("iFrameDenuncia");
              iframe.style.display = "none";
              imagenSrc.src = "";
              abrirCerrarDenun = true;
            } else {
              let imagenSrc = document.getElementById("imgDenunciaVer");
              let saberExt = sinCodificado[i + 2].slice(
                ((sinCodificado[i + 2].lastIndexOf(".") - 1) >>> 0) + 2
              );
              if (saberExt === "pdf") {
                let iframe = document.getElementById("iFrameDenuncia");
                iframe.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                iframe.style.display = "";
                abrirCerrarDenun = false;
              } else {
                imagenSrc.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                abrirCerrarDenun = false;
              }
            }
            break;

          case "Acreditacion":
            if (abrirCerrarAcred == false) {
              let imagenSrc = document.getElementById("imgAcreditacionVer");
              let iframe = document.getElementById("iFrameAcreditacion");
              iframe.style.display = "none";
              imagenSrc.src = "";
              abrirCerrarAcred = true;
            } else {
              let imagenSrc = document.getElementById("imgAcreditacionVer");
              let saberExt = sinCodificado[i + 2].slice(
                ((sinCodificado[i + 2].lastIndexOf(".") - 1) >>> 0) + 2
              );
              if (saberExt === "pdf") {
                let iframe = document.getElementById("iFrameAcreditacion");
                iframe.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                iframe.style.display = "";
                abrirCerrarAcred = false;
              } else {
                imagenSrc.src =
                  "./documentos/" +
                  obtenerInfo +
                  "/" +
                  sinCodificado[i + 2] +
                  "";
                abrirCerrarAcred = false;
              }
            }
            break;
        }
      }
    },
  });
}
function exportTableToExcel(tableID, filename = "") {
  var downloadLink;
  var dataType = "application/vnd.ms-excel";
  var tableSelect = document.getElementById(tableID);
  var tableHTML = tableSelect.outerHTML.replace(/ /g, "%20");

  // Specify file name
  filename = filename ? filename + ".xls" : "excel_data.xls";

  // Create download link element
  downloadLink = document.createElement("a");

  document.body.appendChild(downloadLink);

  if (navigator.msSaveOrOpenBlob) {
    var blob = new Blob(["ufeff", tableHTML], {
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
}
function validarDatos() {
  let auto = false;
  let fechaSin = false;
  let tipoAuto = false;
  let serie = false;
  let placas = false;
  let correo = false;
  let nombre = false;
  let telefono = false;
  let siniestro = false;
  let poliza = false;
  if (
    document.getElementById("AutoCorrecto").checked == true ||
    document.getElementById("AutoIncorrecto").checked == true
  ) {
    if (document.getElementById("AutoCorrecto").checked == true) {
      auto = true;
    } else if (document.getElementById("AutoIncorrecto").checked == true) {
      auto = false;
    }
    if (
      document.getElementById("fechaSinCorrecto").checked == true ||
      document.getElementById("fechaSinIncorrecto").checked == true
    ) {
      if (document.getElementById("fechaSinCorrecto").checked == true) {
        fechaSin = true;
      } else if (
        document.getElementById("fechaSinIncorrecto").checked == true
      ) {
        fechaSin = false;
      }
      if (
        document.getElementById("tipoAutoCorrecto").checked == true ||
        document.getElementById("tipoAutoIncorrecto").checked == true
      ) {
        if (document.getElementById("tipoAutoCorrecto").checked == true) {
          tipoAuto = true;
        } else if (
          document.getElementById("tipoAutoIncorrecto").checked == true
        ) {
          tipoAuto = false;
        }
        if (
          document.getElementById("serieCorrecto").checked == true ||
          document.getElementById("serieIncorrecto").checked == true
        ) {
          if (document.getElementById("serieCorrecto").checked == true) {
            serie = true;
          } else if (
            document.getElementById("serieIncorrecto").checked == true
          ) {
            serie = false;
          }
          if (
            document.getElementById("placasCorrecto").checked == true ||
            document.getElementById("placasIncorrecto").checked == true
          ) {
            if (document.getElementById("placasCorrecto").checked == true) {
              placas = true;
            } else if (
              document.getElementById("placasIncorrecto").checked == true
            ) {
              placas = false;
            }
            if (
              document.getElementById("CorreoCorrecto").checked == true ||
              document.getElementById("CorreoIncorrecto").checked == true
            ) {
              if (document.getElementById("CorreoCorrecto").checked == true) {
                correo = true;
              } else if (
                document.getElementById("CorreoIncorrecto").checked == true
              ) {
                correo = false;
              }
              if (
                document.getElementById("nombreCorrecto").checked == true ||
                document.getElementById("nombreIncorrecto").checked == true
              ) {
                if (document.getElementById("nombreCorrecto").checked == true) {
                  nombre = true;
                } else if (
                  document.getElementById("nombreIncorrecto").checked == true
                ) {
                  nombre = false;
                }
                if (
                  document.getElementById("telefonoCorrecto").checked == true ||
                  document.getElementById("telefonoIncorrecto").checked == true
                ) {
                  if (
                    document.getElementById("telefonoCorrecto").checked == true
                  ) {
                    telefono = true;
                  } else if (
                    document.getElementById("telefonoIncorrecto").checked ==
                    true
                  ) {
                    telefono = false;
                  }
                  if (
                    document.getElementById("sinCorrecto").checked == true ||
                    document.getElementById("sinIncorrecto").checked == true
                  ) {
                    if (
                      document.getElementById("sinCorrecto").checked == true
                    ) {
                      siniestro = true;
                    } else if (
                      document.getElementById("sinIncorrecto").checked == true
                    ) {
                      siniestro = false;
                    }
                    if (
                      document.getElementById("polizaCorrecto").checked ==
                        true ||
                      document.getElementById("polizaIncorrecto").checked ==
                        true
                    ) {
                      if (
                        document.getElementById("polizaCorrecto").checked ==
                        true
                      ) {
                        poliza = true;
                      } else if (
                        document.getElementById("polizaIncorrecto").checked ==
                        true
                      ) {
                        poliza = false;
                      }
                      let obtenerId =
                        document.getElementById("Valor").textContent;
                      $.ajax({
                        method: "POST",
                        url: "ValidarDatos",
                        data: {
                          accion: "ValidarDatos",
                          siniestro,
                          poliza,
                          nombre,
                          telefono,
                          correo,
                          auto,
                          fechaSin,
                          tipoAuto,
                          serie,
                          placas,
                          obtenerId,
                        },
                      }).done(function (result) {
                        alert(result);
                      });
                    } else {
                      alert("Por favor, valida todos tus datos");
                    }
                  } else {
                    alert("Por favor, valida todos tus datos");
                  }
                } else {
                  alert("Por favor, valida todos tus datos");
                }
              } else {
                alert("Por favor, valida todos tus datos");
              }
            } else {
              alert("Por favor, valida todos tus datos");
            }
          } else {
            alert("Por favor, valida todos tus datos");
          }
        } else {
          alert("Por favor, valida todos tus datos");
        }
      } else {
        alert("Por favor, valida todos tus datos");
      }
    } else {
      alert("Por favor, valida todos tus datos");
    }
  } else {
    alert("Por favor, valida todos tus datos");
  }
}
function traerDatos() {
  let obtenerId = document.getElementById("Valor").textContent;
  $.ajax({
    method: "POST",
    url: "ValidarDatos",
    data: {
      accion: "TraerDatos",
      obtenerId,
    },
  }).done(function (result) {
    //console.log(result);
    let sinCodificado = result.split("-_/");
    //sinCodificado.forEach((element) => console.log(element));
    document.getElementById("txtSiniestro").value = sinCodificado[0];
    document.getElementById("txtPoliza").value = sinCodificado[1];
    document.getElementById("txtNombre").value = sinCodificado[2];
    document.getElementById("txtTelefono").value = sinCodificado[3];
    document.getElementById("txtCorreo").value = sinCodificado[4];
    document.getElementById("txtAuto").value = sinCodificado[5];
    document.getElementById("txtFecha").value = sinCodificado[6];
    document.getElementById("txtTipo").value = sinCodificado[7];
    document.getElementById("txtSerie").value = sinCodificado[8];
    document.getElementById("txtPlacas").value = sinCodificado[9];
  });
}
function progresoDocs() {
  $.ajax({
    method: "POST",
    url: "ValidarDatos",
    data: {
      accion: "ObtenerAvance",
    },
  });
}
function subirImagen() {
  $(".botonGuardar").on("click", function () {
    let id = this.id;
    let documento;
    let files;
    if (id === "imgFactura") {
      documento = "Factura";
      files = $("#inputFactura")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgSecuencia") {
      documento = "Secuencia de facturas";
      files = $("#inputSecuencia")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgCertificado") {
      documento = "Certificado Propiedad";
      files = $("#inputCertificado")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgCopiaCertificado") {
      documento = "Copia certificado propiedad";
      files = $("#inputCopiaCertificado")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgImportacion") {
      documento = "Pedimento de Importacion";
      files = $("#inputPedimento")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgPermiso") {
      documento = "Baja de permiso de internacion";
      files = $("#inputBajaPermiso")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgRFV") {
      documento = "R.F.V.";
      files = $("#inputRFV")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgVerificacion") {
      documento = "Verificacion";
      files = $("#inputVerificacion")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgTenencias") {
      documento = "Tenencias";
      files = $("#inputTenencias")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgBaja") {
      documento = "Baja de placas";
      files = $("#inputPlacas")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgFacturaMotor") {
      documento = "Factura del motor";
      files = $("#inputFacturaMotor")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgLlaves") {
      documento = "Llaves";
      files = $("#inputLlaves")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgConoce") {
      documento = "Formato conoce a tu cliente";
      files = $("#inputFormato")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgLFPDPPP") {
      documento = "Consentimiento LFPDPPP";
      files = $("#inputConsentimiento")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgAveriguacion") {
      documento = "Averiguación previa";
      files = $("#inputAveriguacion")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgAcreditacion") {
      documento = "Acreditacion de propiedad";
      files = $("#inputAcreditacion")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgAviso") {
      documento = "Aviso a PFP";
      files = $("#inputAviso")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgOtros") {
      documento = "Otros";
      files = $("#inputOtros")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgOficio") {
      documento = "Oficio de liberacion";
      files = $("#inputLiberacion")[0].files[0];
      iFrame = "iFrameFactura";
    }
    if (id === "imgOficioCancelacion") {
      documento = "Oficio de cancelacion del robo";
      files = $("#inputCancelacion")[0].files[0];
      iFrame = "iFrameFactura";
    }
    let sesionActual = document.getElementById("sesionActual").textContent;
    alert(sesionActual);
    let formData = new FormData();
    formData.append("file", files);
    $.ajax({
      url: `../php/upload.php?idRegistro=${sesionActual}&nombreArchivo=${documento}&iFrame=${iFrame}`,
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
      },
    });
    return false;
  });
}
