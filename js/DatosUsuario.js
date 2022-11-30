//inicio de la carga de imagenes por medio del usuario
let botonPresionado;
let btnAcordeon;
$(document).ready(function (e) {
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
function userSubmit() {
  let imagen;
  //obtenemos el form data para guardar la imagen
  switch (botonPresionado) {
    case "imgIdentificacion":
      imagen = new FormData(document.getElementById("cargaIdentificacion"));
      break;
    case "imgComprobante":
      imagen = new FormData(document.getElementById("cargaComprobante"));
      break;
    case "imgInfo":
      imagen = new FormData(document.getElementById("cargaInfo"));
      break;
    case "imgFactura":
      imagen = new FormData(document.getElementById("cargaFactura"));
      break;
    case "imgTenencias":
      imagen = new FormData(document.getElementById("cargaTenencias"));
      break;
    case "imgBaja":
      imagen = new FormData(document.getElementById("cargaBaja"));
      break;
    case "imgEstado":
      imagen = new FormData(document.getElementById("cargaEstado"));
      break;
    case "imgDenuncia":
      imagen = new FormData(document.getElementById("cargaDenuncia"));
      break;
    case "imgAcreditacion":
      imagen = new FormData(document.getElementById("cargaAcreditacion"));
      break;
  }
  alert(imagen.FormData);
  alert(imagen.textContent);
  alert(imagen.value);
  $.ajax({
    url: "GuardarImagenesCliente",
    method: "post",
    data: imagen,
    cache: false,
    processData: false, // Estos tres deben ser falsos
    contentType: false, //
    success: function (data) {
      alert(data);
    },
    error: function () {
      alert("Servidor anormal, intente nuevamente más tarde ...");
    },
  });
  return false;
}
window.addEventListener("load", function () {
  $("#btnConfirmarDatos").on("click", function () {
    validarDatos();
  });
  $("#modalConfirmarDocs").on("click", function () {
    traerDatos();
  });
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
  //funciones para darle a todas las clases ocultas el id del usuario
  const idsOcultos = document.querySelectorAll(".idsOcultos");
  let obtenerInfo = document.getElementById("Valor").textContent;
  let contador = 0;
  idsOcultos.forEach((element) => {
    element.value = obtenerInfo;
  });
  idsOcultos[0].value = idsOcultos[0].value + ",Identificacion oficial";
  idsOcultos[1].value = idsOcultos[1].value + ",Comprobante de domicilio";
  idsOcultos[2].value = idsOcultos[2].value + ",Informacion adicional";
  idsOcultos[3].value = idsOcultos[3].value + ",Factura del vehiculo";
  idsOcultos[4].value = idsOcultos[4].value + ",Tenencias";
  idsOcultos[5].value = idsOcultos[5].value + ",Baja";
  idsOcultos[6].value = idsOcultos[6].value + ",Estado de cuenta";
  idsOcultos[7].value = idsOcultos[7].value + ",Denuncia";
  idsOcultos[8].value = idsOcultos[8].value + ",Acreditacion";
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

let abrirCerrarIdent = true;
let abrirCerrarComp = true;
let abrirCerrarInfo = true;
let abrirCerrarFact = true;
let abrirCerrarTenen = true;
let abrirCerrarBaja = true;
let abrirCerrarEstado = true;
let abrirCerrarDenun = true;
let abrirCerrarAcred = true;
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
  let obtenerId =document.getElementById("Valor").textContent;
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
    document.getElementById("txtSiniestro").value=sinCodificado[0];
    document.getElementById("txtPoliza").value=sinCodificado[1];
    document.getElementById("txtNombre").value=sinCodificado[2];
    document.getElementById("txtTelefono").value=sinCodificado[3];
    document.getElementById("txtCorreo").value=sinCodificado[4];
    document.getElementById("txtAuto").value=sinCodificado[5];
    document.getElementById("txtFecha").value=sinCodificado[6];
    document.getElementById("txtTipo").value=sinCodificado[7];
    document.getElementById("txtSerie").value=sinCodificado[8];
    document.getElementById("txtPlacas").value=sinCodificado[9];
  });
}
function progresoDocs(){
  $.ajax({
    method:"POST",
    url:"ValidarDatos",
    data:{
      accion:"ObtenerAvance"
    }
  })
}