let rutaInicial = "../php/Usuarios/";
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
function acordeonCerrado() {
  let img;
  let iFrame;
  $("#btnFactura").on("click", function () {
    img = document.getElementById("iFrameFactura");
    iFrame = document.getElementById("iFrameIFrameIdentificacion");
    if (document.querySelector("#btnFactura.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnSecuencia").on("click", function () {
    img = document.getElementById("iFrameSecuencia");
    iFrame = document.getElementById("iFrameIFrameSecuencia");
    if (document.querySelector("#btnSecuencia.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnCertificado").on("click", function () {
    img = document.getElementById("iFrameCertificado");
    iFrame = document.getElementById("iFrameIFrameCertificado");
    if (document.querySelector("#btnCertificado.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnCopiaCertificado").on("click", function () {
    img = document.getElementById("iFrameCopiaCertificado");
    iFrame = document.getElementById("iFrameIFrameCopiaCertificado");
    if (document.querySelector("#btnCopiaCertificado.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnImportacion").on("click", function () {
    img = document.getElementById("iFrameImportacion");
    iFrame = document.getElementById("iFrameIFrameImportacion");
    if (document.querySelector("#btnImportacion.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnPermiso").on("click", function () {
    img = document.getElementById("iFramePermiso");
    iFrame = document.getElementById("iFrameIFramePermiso");
    if (document.querySelector("#btnPermiso.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnRFV").on("click", function () {
    img = document.getElementById("iFrameRFV");
    iFrame = document.getElementById("iFrameIFrameRFV");
    if (document.querySelector("#btnRFV.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnVerificacion").on("click", function () {
    img = document.getElementById("iFrameVerificacion");
    iFrame = document.getElementById("iFrameIFrameVerificacion");
    if (document.querySelector("#btnVerificacion.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnTenencias").on("click", function () {
    img = document.getElementById("iFrameTenencia");
    iFrame = document.getElementById("iFrameIFrameTenencia");
    if (document.querySelector("#btnTenencias.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnBaja").on("click", function () {
    img = document.getElementById("iFrameBaja");
    iFrame = document.getElementById("iFrameIFrameBaja");
    if (document.querySelector("#btnBaja.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnLlaves").on("click", function () {
    img = document.getElementById("iFrameLlaves");
    iFrame = document.getElementById("iFrameIFrameLlaves");
    if (document.querySelector("#btnLlaves.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnFacturaMotor").on("click", function () {
    img = document.getElementById("iFrameFacturaMotor");
    iFrame = document.getElementById("iFrameIFrameFacturaMotor");
    if (document.querySelector("#btnFacturaMotor.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnConoce").on("click", function () {
    img = document.getElementById("iFrameConoce");
    iFrame = document.getElementById("iFrameIFrameConoce");
    if (document.querySelector("#btnConoce.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnLFPDPPP").on("click", function () {
    img = document.getElementById("iFrameLFPDPPP");
    iFrame = document.getElementById("iFrameIFrameLFPDPPP");
    if (document.querySelector("#btnLFPDPPP.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnAveriguacion").on("click", function () {
    img = document.getElementById("iFrameAveriguacion");
    iFrame = document.getElementById("iFrameIFrameAveriguacion");
    if (document.querySelector("#btnAveriguacion.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnAcreditacion").on("click", function () {
    img = document.getElementById("iFrameAcreditacion");
    iFrame = document.getElementById("iFrameIFrameAcreditacion");
    if (document.querySelector("#btnAcreditacion.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnAviso").on("click", function () {
    img = document.getElementById("iFrameAviso");
    iFrame = document.getElementById("iFrameIFrameAviso");
    if (document.querySelector("#btnAviso.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnOtros").on("click", function () {
    img = document.getElementById("iFrameOficioCancelacion");
    iFrame = document.getElementById("iFrameIframeOficioCancelacion");
    if (document.querySelector("#btnOtros.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnOficio").on("click", function () {
    img = document.getElementById("iFrameFactura");
    iFrame = document.getElementById("iFrameIFrameIdentificacion");
    if (document.querySelector("#btnOficio.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
  $("#btnOficioCancelacion").on("click", function () {
    img = document.getElementById("iFrameFactura");
    iFrame = document.getElementById("iFrameIFrameIdentificacion");
    if (document.querySelector("#btnOficioCancelacion.collapsed")) {
      iFrame.style.display = "none";
      img.style.display = "none";
    }
  });
}
function mostrarImagenFrame(getIdUl, nombreImagen) {
  let idRegistro = document.getElementById("sesionActual").textContent;
  $.ajax({
    method: "post",
    url: "../php/BusquedaSinFiltro.php",
    dataType: "json",
    data: {
      idRegistro,
      accion: "imagenesUsuario",
      nombreImagen,
    },
  }).done(function (result) {
    console.log(result);
    $(`.${getIdUl}`).remove();
    let ul = document.getElementById(getIdUl);
    for (let i in result.Imagen) {
      let btnListaImagen = `<li class="${getIdUl} list-group-item">
        <input class="${getIdUl} form-check-input me-1" type="radio"
          name="${result.Imagen[i].nombreOriginal}" value="" id="${result.Imagen[i].nombreImagen}" checked>
        <label class="${getIdUl} form-check-label" for="${result.Imagen[i].nombreImagen}">${result.Imagen[i].nombreImagen}</label>
        </li>`;
      ul.innerHTML += `${btnListaImagen}`;
    }
  });
}
function cargarImagenIframe(getId, getImg, getIframe) {
  let activo = document.getElementById(getId);
  let iFrame = document.getElementById(getIframe);
  let idRegistro = document.getElementById("sesionActual").textContent;
  let img = document.getElementById(getImg);
  if (activo != null) {
    if (activo.checked == true) {
      let extension = getId.split(".");
      if (extension[1] === "pdf") {
        console.log(extension[1]);
        iFrame.src = `http://bestcontact.mx/Solera/Atlas/Documentos/Ids/${idRegistro}/${getId}`;
        iFrame.style.display = "";
        img.style.display = "none";
      } else {
        console.log(activo.id);
        img.src = `http://bestcontact.mx/Solera/Atlas/Documentos/Ids/${idRegistro}/${getId}`;
        iFrame.style.display = "none";
        img.style.display = "";
      }
    }
  }
}
function imagenSeleccionada() {
  $(document).on("click", ".ulFactura", function () {
    cargarImagenIframe(this.id, "iFrameFactura", "iFrameIFrameIdentificacion");
  });
  $(document).on("click", ".ulSecuencia", function () {
    cargarImagenIframe(this.id, "iFrameSecuencia", "iFrameIFrameSecuencia");
  });
  $(document).on("click", ".ulCertificado", function () {
    cargarImagenIframe(this.id, "iFrameCertificado", "iFrameIFrameCertificado");
  });
  $(document).on("click", ".ulCopiaCertificado", function () {
    cargarImagenIframe(
      this.id,
      "iFrameCopiaCertificado",
      "iFrameIFrameCopiaCertificado"
    );
  });
  $(document).on("click", ".ulPedimento", function () {
    cargarImagenIframe(this.id, "iFrameImportacion", "iFrameIFrameImportacion");
  });
  $(document).on("click", ".ulBajaPermiso", function () {
    cargarImagenIframe(this.id, "iFramePermiso", "iFrameIFramePermiso");
  });
  $(document).on("click", ".ulRFV", function () {
    cargarImagenIframe(this.id, "iFrameRFV", "iFrameIFrameRFV");
  });
  $(document).on("click", ".ulVerificacion", function () {
    cargarImagenIframe(
      this.id,
      "iFrameVerificacion",
      "iFrameIFrameVerificacion"
    );
  });
  $(document).on("click", ".ulTenencias", function () {
    cargarImagenIframe(this.id, "iFrameTenencia", "iFrameIFrameTenencia");
  });
  $(document).on("click", ".ulPlacas", function () {
    cargarImagenIframe(this.id, "iFrameBaja", "iFrameIFrameBaja");
  });
  $(document).on("click", ".ulMotor", function () {
    cargarImagenIframe(
      this.id,
      "iFrameFacturaMotor",
      "iFrameIFrameFacturaMotor"
    );
  });
  $(document).on("click", ".ulLlaves", function () {
    cargarImagenIframe(this.id, "iFrameLlaves", "iFrameIFrameLlaves");
  });
  $(document).on("click", ".ulConoce", function () {
    cargarImagenIframe(this.id, "iFrameConoce", "iFrameIFrameConoce");
  });
  $(document).on("click", ".ulLFPDPPP", function () {
    cargarImagenIframe(this.id, "iFrameLFPDPPP", "iFrameIFrameLFPDPPP");
  });
  $(document).on("click", ".ulAveriguación", function () {
    cargarImagenIframe(
      this.id,
      "iFrameAveriguacion",
      "iFrameIFrameAveriguacion"
    );
  });
  $(document).on("click", ".ulAcreditacion", function () {
    cargarImagenIframe(
      this.id,
      "iFrameAcreditacion",
      "iFrameIFrameAcreditacion"
    );
  });
  $(document).on("click", ".ulPFP", function () {
    cargarImagenIframe(this.id, "iFrameAviso", "iFrameIFrameAviso");
  });
  $(document).on("click", ".ulOtros", function () {
    cargarImagenIframe(this.id, "iFrameOtros", "iFrameIFrameOtros");
  });
  $(document).on("click", ".ulLiberacion", function () {
    cargarImagenIframe(this.id, "iFrameOficio", "iFrameIFrameOficio");
  });
  $(document).on("click", ".ulCancelacion", function () {
    cargarImagenIframe(
      this.id,
      "iFrameOficioCancelacion",
      "iFrameIframeOficioCancelacion"
    );
  });
}
async function subirImagen(getId) {
  let id = getId;
  let documento;
  let files;
  let $inputArchivos;
  if (id === "imgFactura") {
    documento = "Factura";
    $inputArchivos = document.querySelector("#inputFactura");
    iFrame = "iFrameFactura";
  }
  if (id === "imgSecuencia") {
    documento = "Secuencia de facturas";
    $inputArchivos = document.querySelector("#inputSecuencia");
    iFrame = "iFrameSecuencia";
  }
  if (id === "imgCertificado") {
    documento = "Certificado Propiedad";
    $inputArchivos = document.querySelector("#inputCertificado");
    iFrame = "iFrameCertificado";
  }
  if (id === "imgCopiaCertificado") {
    documento = "Copia certificado propiedad";
    $inputArchivos = document.querySelector("#inputCopiaCertificado");
    iFrame = "iFrameCopiaCertificado";
  }
  if (id === "imgImportacion") {
    documento = "Pedimento de Importacion";
    $inputArchivos = document.querySelector("#inputPedimento");
    iFrame = "iFrameImportacion";
  }
  if (id === "imgPermiso") {
    documento = "Baja de permiso de internacion";
    $inputArchivos = document.querySelector("#inputBajaPermiso");
    iFrame = "iFramePermiso";
  }
  if (id === "imgRFV") {
    documento = "R.F.V.";
    $inputArchivos = document.querySelector("#inputRFV");
    iFrame = "iFrameRFV";
  }
  if (id === "imgVerificacion") {
    documento = "Verificacion";
    $inputArchivos = document.querySelector("#inputVerificacion");
    iFrame = "iFrameVerificacion";
  }
  if (id === "imgTenencias") {
    documento = "Tenencias";
    $inputArchivos = document.querySelector("#inputTenencias");
    iFrame = "iFrameTenencia";
  }
  if (id === "imgBaja") {
    documento = "Baja de placas";
    $inputArchivos = document.querySelector("#inputPlacas");
    iFrame = "iFrameBaja";
  }
  if (id === "imgFacturaMotor") {
    documento = "Factura del motor";
    $inputArchivos = document.querySelector("#inputFacturaMotor");
    iFrame = "iFrameFacturaMotor";
  }
  if (id === "imgLlaves") {
    documento = "Llaves";
    $inputArchivos = document.querySelector("#inputLlaves");
    files = $("#inputLlaves")[0].files[0];
    iFrame = "iFrameLlaves";
  }
  if (id === "imgConoce") {
    documento = "Formato conoce a tu cliente";
    $inputArchivos = document.querySelector("#inputFormato");
    iFrame = "iFrameConoce";
  }
  if (id === "imgLFPDPPP") {
    documento = "Consentimiento LFPDPPP";
    $inputArchivos = document.querySelector("#inputConsentimiento");
    iFrame = "iFrameLFPDPPP";
  }
  if (id === "imgAveriguacion") {
    documento = "Averiguación previa";
    $inputArchivos = document.querySelector("#inputAveriguacion");
    iFrame = "iFrameAveriguacion";
  }
  if (id === "imgAcreditacion") {
    documento = "Acreditacion de propiedad";
    $inputArchivos = document.querySelector("#inputAcreditacion");
    iFrame = "iFrameAcreditacion";
  }
  if (id === "imgAviso") {
    documento = "Aviso a PFP";
    $inputArchivos = document.querySelector("#inputAviso");
    iFrame = "iFrameAviso";
  }
  if (id === "imgOtros") {
    documento = "Otros";
    $inputArchivos = document.querySelector("#inputOtros");
    iFrame = "iFrameOtros";
  }
  if (id === "imgOficio") {
    documento = "Oficio de liberacion";
    $inputArchivos = document.querySelector("#inputLiberacion");
    iFrame = "iFrameOficio";
  }
  if (id === "imgOficioCancelacion") {
    documento = "Oficio de cancelacion del robo";
    $inputArchivos = document.querySelector("#inputCancelacion");
    iFrame = "iFrameOficioCancelacion";
  }
  let sesionActual = document.getElementById("sesionActual").textContent;
  const archivosParaSubir = $inputArchivos.files;
  if (archivosParaSubir.length <= 0) {
    // Si no hay archivos, no continuamos
    return;
  }
  // Preparamos el formdata
  const formData = new FormData();
  // Agregamos cada archivo a "archivos[]". Los corchetes son importantes
  for (const archivo of archivosParaSubir) {
    formData.append("archivos[]", archivo);
  }
  // Los enviamos
  const respuestaRaw = await fetch(
    `../php/upload.php?idRegistro=${sesionActual}&nombreArchivo=${documento}&iFrame=${iFrame}`,
    {
      method: "POST",
      body: formData,
    }
  );
  const respuesta = await respuestaRaw.json();
  if (respuesta === true) {
    mostrarImagenFrame();
    document.getElementById("iFrameTenencia").style.display = "";
    //validarSiExiste();
    alert("Éxito al subir");
  } else {
    alert("Error al subir");
  }
}
function TablaMensajes() {
  let sesionActual = document.getElementById("sesionActual").textContent;
  $.ajax({
    method: "POST",
    url: rutaInicial + "PeticionesUsuario.php",
    dataType: "json",
    data: {
      accion: "MostrarMensajes",
      sesionActual,
    },
    success: function (result) {
      console.log(result);
      $(".tablaMensajes").remove();
      let tablaMensajes = document.getElementById("Tablamensajes");
      for (let i in result.Mensajes) {
        let usuario;
        let fecha;
        let comentario;
        // Creando los 'td' que almacenará cada parte de la información del usuario actual
        if (result.Mensajes[i].internoExterno === "Interno") {
          usuario = `<td style='font-size: 11px' class='table-success tablaMensajes'>${result.Mensajes[i].usuario}</td>`;
          fecha = `<td style='font-size: 11px' class='table-success tablaMensajes'>${result.Mensajes[i].fechaMensaje}</td>`;
          comentario = `<td style='font-size: 11px' class='table-success tablaMensajes'>${result.Mensajes[i].mensajes}</td>`;
        } else {
          fecha = `<td style='font-size: 11px' class='table-info tablaMensajes'>${result.Mensajes[i].fechaMensaje}</td>`;
          comentario = `<td style='font-size: 11px' class='table-info tablaMensajes'>${result.Mensajes[i].mensajes}</td>`;
          usuario = `<td style='font-size: 11px' class='table-info tablaMensajes'>${result.Mensajes[i].usuario}</td>`;
        }

        tablaMensajes.innerHTML += `<tr>${usuario + fecha + comentario}</tr>`;
      }
      $("#DatosTabla").DataTable({
        language: {
          decimal: "",
          emptyTable: "No hay información",
          info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
          infoFiltered: "(Filtrado de _MAX_ total entradas)",
          infoPostFix: "",
          thousands: ",",
          lengthMenu: "Mostrar _MENU_ Entradas",
          loadingRecords: "Cargando...",
          processing: "Procesando...",
          search: "Buscar:",
          zeroRecords: "Sin resultados encontrados",
          paginate: {
            first: "Primero",
            last: "Ultimo",
            next: "Siguiente",
            previous: "Anterior",
          },
        },
        retrieve: true,
        searching: false,
        lengthChange: false,
        ordering: false,
        info: false,
      });
    },
  });
}
$(document).ready(function (e) {
  imagenSeleccionada();
  progresoExpediente();
  //  ocultarIframes();
  mostrarImagenFrame();
  $("#btnModalMensajes").on("click", function () {
    TablaMensajes();
  });
  acordeonCerrado();
  $("#btnConfirmarDatos").on("click", function () {
    validarDatos();
  });
  $("#traerDatos").on("click", function () {
    traerInfo();
  });
  //file type validation
});
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
                      let sesionActual =
                        document.getElementById("sesionActual").textContent;
                      $.ajax({
                        method: "POST",
                        url: rutaInicial + "PeticionesUsuario.php",
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
                          sesionActual,
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
function GuardarComent() {
  //funcion para guardar los mensajes del cliente
  let sesionActual = document.getElementById("sesionActual").textContent;
  let comentario = document.getElementById("comentarios").value;
  $.ajax({
    method: "post",
    url: rutaInicial + "PeticionesUsuario.php",
    data: {
      accion: "GuardarComentario",
      comentario,
      sesionActual,
    },
    success: function (result) {
      alert(result);
      TablaMensajes();
    },
  });
}
function traerInfo() {
  let sesionActual = document.getElementById("sesionActual").textContent;
  $.ajax({
    method: "POST",
    url: rutaInicial + "PeticionesUsuario.php",
    dataType: "json",
    data: {
      accion: "TraerInformacion",
      sesionActual,
    },
  }).done(function (result) {
    console.log(result);
    document.getElementById("txtSiniestro").value =
      result.Datos[0].numSiniestro;
    document.getElementById("txtPoliza").value = result.Datos[0].poliza;
    document.getElementById("txtNombre").value = result.Datos[0].asegurado;
    document.getElementById("txtTelefono").value =
      result.Datos[0].telefonoprincipal;
    document.getElementById("txtCorreo").value = result.Datos[0].correo;
    document.getElementById("txtAuto").value = result.Datos[0].marca;
    document.getElementById("txtFecha").value = result.Datos[0].fechaSiniestro;
    document.getElementById("txtTipo").value = result.Datos[0].modelo;
    document.getElementById("txtSerie").value = result.Datos[0].numserie;
    document.getElementById("txtPlacas").value = result.Datos[0].placas;
  });
}
function progresoExpediente() {
  let sesionActual = document.getElementById("sesionActual").textContent;
  $.ajax({
    method: "POST",
    url: rutaInicial + "PeticionesUsuario.php",
    data: {
      accion: "ProgresoExpediente",
      sesionActual,
    },
  }).done(function (result) {
    let porcentajeBarra = document.getElementById("progresoDocs");
    porcentajeBarra.style.width = result + "%";
    porcentajeBarra.innerHTML = result + "%";
    console.log(result);
  });
}
function eliminarImagen(getId) {
  if (confirm("Eliminar imagen?") == true) {
    let imagenEliminar;
    let iFrame;
    if (getId === "dltFactura") {
      imagenEliminar = "Factura";
      iFrame = "iFrameFactura";
    } else if (getId === "dltSecuencia") {
      imagenEliminar = "Secuencia de facturas";
      iFrame = "iFrameSecuencia";
    } else if (getId === "dltCertificado") {
      imagenEliminar = "Certificado Propiedad";
      iFrame = "iFrameCertificado";
    } else if (getId === "dltCopiaCertificado") {
      iFrame = "iFrameCopiaCertificado";
      imagenEliminar = "Copia certificado propiedad";
    } else if (getId === "dltImportacion") {
      iFrame = "iFrameImportacion";
      imagenEliminar = "Pedimento de Importacion";
    } else if (getId === "dltPermiso") {
      iFrame = "iFramePermiso";
      imagenEliminar = "Baja de permiso de internacion";
    } else if (getId === "dltRFV") {
      iFrame = "iFrameRFV";
      imagenEliminar = "R.F.V.";
    } else if (getId === "dltVerificacion") {
      iFrame = "iFrameVerificacion";
      imagenEliminar = "Verificacion";
    } else if (getId === "dltTenencias") {
      iFrame = "iFrameTenencia";
      imagenEliminar = "Tenencias";
    } else if (getId === "dltBaja") {
      iFrame = "iFrameBaja";
      imagenEliminar = "Baja de placas";
    } else if (getId === "dltMotor") {
      iFrame = "iFrameFacturaMotor";
      imagenEliminar = "Factura del motor";
    } else if (getId === "dltLlaves") {
      iFrame = "iFrameLlavesv";
      imagenEliminar = "Llaves";
    } else if (getId === "dltConoce") {
      iFrame = "iFrameConoce";
      imagenEliminar = "Formato conoce a tu cliente";
    } else if (getId === "dltLFPDPPP") {
      iFrame = "iFrameLFPDPPP";
      imagenEliminar = "Consentimiento LFPDPPP";
    } else if (getId === "dltAveriguacion") {
      iFrame = "iFrameAveriguacion";
      imagenEliminar = "Averiguación previa";
    } else if (getId === "dltAcreditacion") {
      iFrame = "iFrameAcreditacion";
      imagenEliminar = "Acreditacion de propiedad";
    } else if (getId === "dltAviso") {
      iFrame = "iFrameAviso";
      imagenEliminar = "Aviso a PFP";
    } else if (getId === "dltOtros") {
      iFrame = "iFrameOtros";
      imagenEliminar = "Otros";
    } else if (getId === "dltOficio") {
      iFrame = "iFrameOficio";
      imagenEliminar = "Oficio de liberacion";
    } else if (getId === "dltOficioCancelacion") {
      iFrame = "iFrameOficioCancelacion";
      imagenEliminar = "Oficio de cancelacion del robo";
    }
    let sesionActual = document.getElementById("sesionActual").textContent;
    $.ajax({
      method: "POST",
      url: rutaInicial + "PeticionesUsuario.php",
      data: {
        accion: "EliminarImagen",
        imagenEliminar,
        sesionActual,
      },
    }).done(function (result) {
      if (result === "Imagen eliminada con éxito") {
        document.getElementById(iFrame).style.display = "none";
        alert(result);
        validarSiExiste();
      }
    });
  }
}

///////////////////////////
//funciones utilizadas
///////////////////////////
function subirImagenback() {
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
      iFrame = "iFrameSecuencia";
    }
    if (id === "imgCertificado") {
      documento = "Certificado Propiedad";
      files = $("#inputCertificado")[0].files[0];
      iFrame = "iFrameCertificado";
    }
    if (id === "imgCopiaCertificado") {
      documento = "Copia certificado propiedad";
      files = $("#inputCopiaCertificado")[0].files[0];
      iFrame = "iFrameCopiaCertificado";
    }
    if (id === "imgImportacion") {
      documento = "Pedimento de Importacion";
      files = $("#inputPedimento")[0].files[0];
      iFrame = "iFrameImportacion";
    }
    if (id === "imgPermiso") {
      documento = "Baja de permiso de internacion";
      files = $("#inputBajaPermiso")[0].files[0];
      iFrame = "iFramePermiso";
    }
    if (id === "imgRFV") {
      documento = "R.F.V.";
      files = $("#inputRFV")[0].files[0];
      iFrame = "iFrameRFV";
    }
    if (id === "imgVerificacion") {
      documento = "Verificacion";
      files = $("#inputVerificacion")[0].files[0];
      iFrame = "iFrameVerificacion";
    }
    if (id === "imgTenencias") {
      documento = "Tenencias";
      files = $("#inputTenencias")[0].files[0];
      iFrame = "iFrameTenencia";
    }
    if (id === "imgBaja") {
      documento = "Baja de placas";
      files = $("#inputPlacas")[0].files[0];
      iFrame = "iFrameBaja";
    }
    if (id === "imgFacturaMotor") {
      documento = "Factura del motor";
      files = $("#inputFacturaMotor")[0].files[0];
      iFrame = "iFrameFacturaMotor";
    }
    if (id === "imgLlaves") {
      documento = "Llaves";
      files = $("#inputLlaves")[0].files[0];
      iFrame = "iFrameLlaves";
    }
    if (id === "imgConoce") {
      documento = "Formato conoce a tu cliente";
      files = $("#inputFormato")[0].files[0];
      iFrame = "iFrameConoce";
    }
    if (id === "imgLFPDPPP") {
      documento = "Consentimiento LFPDPPP";
      files = $("#inputConsentimiento")[0].files[0];
      iFrame = "iFrameLFPDPPP";
    }
    if (id === "imgAveriguacion") {
      documento = "Averiguación previa";
      files = $("#inputAveriguacion")[0].files[0];
      iFrame = "iFrameAveriguacion";
    }
    if (id === "imgAcreditacion") {
      documento = "Acreditacion de propiedad";
      files = $("#inputAcreditacion")[0].files[0];
      iFrame = "iFrameAcreditacion";
    }
    if (id === "imgAviso") {
      documento = "Aviso a PFP";
      files = $("#inputAviso")[0].files[0];
      iFrame = "iFrameAviso";
    }
    if (id === "imgOtros") {
      documento = "Otros";
      files = $("#inputOtros")[0].files[0];
      iFrame = "iFrameOtros";
    }
    if (id === "imgOficio") {
      documento = "Oficio de liberacion";
      files = $("#inputLiberacion")[0].files[0];
      iFrame = "iFrameOficio";
    }
    if (id === "imgOficioCancelacion") {
      documento = "Oficio de cancelacion del robo";
      files = $("#inputCancelacion")[0].files[0];
      iFrame = "iFrameOficioCancelacion";
    }
    let sesionActual = document.getElementById("sesionActual").textContent;
    let formData = new FormData();
    formData.append("file", files);
    $.ajax({
      url: `../php/upload.php?idRegistro=${sesionActual}&nombreArchivo=${documento}&iFrame=${iFrame}`,
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        alert(response);
        if (response === "Subido con éxito") {
          mostrarImagenFrame();
          document.getElementById("iFrameTenencia").style.display = "";
          validarSiExiste();
        }
      },
    });
    return false;
  });
}
