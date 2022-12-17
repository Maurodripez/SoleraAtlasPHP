let rutaInicial = "../../php/Citas/";
$(document).ready(function () {
  operadoresAtlas();
  deshabilitarAgregar();
  $("#btnGuardarCita").on("click", function () {
    guardarCita();
  });
  $("#desplegarInfoAdicional").on("click", function () {
    infoAdicional();
  });
  var calendar = $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,basicWeek,basicDay",
    },
    editable: true,
    events: rutaInicial + "MostrarEventos.php",
    displayEventTime: true,
    eventRender: function (event, element, view) {
      if (event.allDay === "true") {
        event.allDay = true;
      } else {
        event.allDay = false;
      }
    },
    locale: "es",
    monthNames: [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
    ],
    monthNamesShort: [
      "Ene",
      "Feb",
      "Mar",
      "Abr",
      "May",
      "Jun",
      "Jul",
      "Ago",
      "Sep",
      "Oct",
      "Nov",
      "Dic",
    ],
    dayNames: [
      "Domingo",
      "Lunes",
      "Martes",
      "Miércoles",
      "Jueves",
      "Viernes",
      "Sábado",
    ],
    dayNamesShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
    selectable: true,
    selectHelper: true,
    dayClick: function (date) {
      $("#txtFecha").val(date.format());
      $.ajax({
        url: rutaInicial + "ConsultasCitas.php",
        type: "POST",
        data: {
          accion: "SaberPrivilegios",
        },
      }).done(function (result) {
        if (result == "operadorAtlas") {
          alert("No tienes permitido crear Citas");
          return;
        } else {
          $("#ModalEventos").modal("show");
        }
      });
      // change the day's background color just for fun
      //$(this).css("background-color", "red");
    },
    editable: true,
    eventDrop: function (event, delta) {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      $.ajax({
        url: rutaInicial + "EditarEvento.php",
        data:
          "title=" +
          event.title +
          "&start=" +
          start +
          "&end=" +
          end +
          "&id=" +
          event.id,
        type: "POST",
        success: function (response) {
          displayMessage("Actualizado con exito");
        },
      });
    },
    eventClick: function (event) {
      document.getElementById("idCitaActual").textContent = event.id;
      $("#ModalMostrarInfoEvento").modal("show");
      mostrarInfoCita();
    },
  });
});

function displayMessage(message) {
  $(".response").html("<div class='success'>" + message + "</div>");
  setInterval(function () {
    $(".success").fadeOut();
  }, 1000);
}
function guardarCita() {
  let siniestro = document.getElementById("txtSiniestro").value;
  $.ajax({
    url: rutaInicial + "ConsultasCitas.php",
    type: "POST",
    data: {
      siniestro,
      accion: "ValidarCita",
    },
  }).done(function (result) {
    //se valida si ya se tiene una cita
    if (document.getElementById("txtAsesor").value == "Asesor") {
      alert("Por favor, selecciona un asesor");
      return;
    }
    if (result === "Verdadero") {
      alert("Ya existe una cita, validar por favor");
      return;
    } else {
      let fecha = document.getElementById("txtFecha").value;
      let horaInicio = document.getElementById("txtHoraInicio").value;
      let horaFin = document.getElementById("txtHoraFinal").value;
      let infoAdicional = document.getElementById("txtInfoAdicional").value;
      let asesor = document.getElementById("txtAsesor").value;
      let color = document.getElementById("txtColor").value;
      let start = `${fecha} ${horaInicio}:00`;
      let end = `${fecha} ${horaFin}:00`;
      $.ajax({
        url: rutaInicial + "AgregarEvento.php",
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
          displayMessage("Agregado con exito");
          location.reload();
        },
      });
    }
  });
}
function mostrarInfoCita() {
  let id = document.getElementById("idCitaActual").textContent;
  $.ajax({
    url: rutaInicial + "ConsultasCitas.php",
    type: "POST",
    dataType: "JSON",
    data: {
      accion: "MostrarInfoCita",
      id,
    },
  }).done(function (result) {
    let fecha = result.Cita[0].start.split(" ");
    let fechaFinal = result.Cita[0].end.split(" ");
    document.getElementById("txtInfoFecha").value = fecha[0];
    document.getElementById("txtInfoTitulo").value = result.Cita[0].title;
    document.getElementById("txtInfoHoraInicio").value = fecha[1];
    document.getElementById("txtInfoHoraFinal").value = fechaFinal[1];
    document.getElementById("txtInfoInfoAdicional").value =
      result.Cita[0].infoAdicional;
    document.getElementById("txtInfoAsesor").value = result.Cita[0].asesor;
    //se oculta el collapse para que no muestre informacion erronea
    $("#listaInfoAdicional").collapse("hide");
  });
}
function infoAdicional() {
  let id = document.getElementById("idCitaActual").textContent;
  $.ajax({
    url: rutaInicial + "ConsultasCitas.php",
    type: "POST",
    dataType: "JSON",
    data: {
      accion: "InfoAdicional",
      id,
    },
  }).done(function (response) {
    console.log(response);
    let asegurado = `<li style='font-size: 13px' class="list-group-item">Asegurado: ${response.InfoAdicional[0].asegurado}</li>`;
    let telefonoPrincipal = `<li style='font-size: 13px' class="list-group-item">Telefono: ${response.InfoAdicional[0].telefonoPrincipal}</li>`;
    let marca = `<li style='font-size: 13px' class="list-group-item">Marca: ${response.InfoAdicional[0].marca}</li>`;
    let tipo = `<li style='font-size: 13px' class="list-group-item">Tipo: ${response.InfoAdicional[0].tipo}</li>`;
    let modelo = `<li style='font-size: 13px' class="list-group-item">Modelo: ${response.InfoAdicional[0].modelo}</li>`;
    let numSerie = `<li style='font-size: 13px' class="list-group-item">Serie: ${response.InfoAdicional[0].numSerie}</li>`;
    let contacto = `<li style='font-size: 13px' class="list-group-item">Contacto: ${response.InfoAdicional[0].contacto}</li>`;
    let telContacto = `<li style='font-size: 13px' class="list-group-item">Telefono: ${response.InfoAdicional[0].telContacto}</li>`;
    let ul = document.getElementById("ulListaInfo");
    ul.innerHTML =
      asegurado +
      telefonoPrincipal +
      marca +
      tipo +
      modelo +
      numSerie +
      contacto +
      telContacto;
  });
}
function operadoresAtlas() {
  $.ajax({
    url: rutaInicial + "ConsultasCitas.php",
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
function deshabilitarAgregar() {
  $.ajax({
    url: rutaInicial + "ConsultasCitas.php",
    type: "POST",
    data: {
      accion: "SaberPrivilegios",
    },
  }).done(function (result) {
    console.log(result);
  });
}
