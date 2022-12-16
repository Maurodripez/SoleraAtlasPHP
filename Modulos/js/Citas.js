let rutaInicial = "../../php/Citas/";
$(document).ready(function () {
  $("#btnGuardarCita").on("click", function () {
    guardarCita();
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
    dayClick: function (date, jsEvent, view) {
      $("#txtFecha").val(date.format());
      $("#ModalEventos").modal("show");
      // change the day's background color just for fun
      $(this).css("background-color", "red");
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
  let fecha = document.getElementById("txtFecha").value;
  let horaInicio = document.getElementById("txtHoraInicio").value;
  let horaFin = document.getElementById("txtHoraFinal").value;
  let infoAdicional = document.getElementById("txtInfoAdicional").value;
  let asesor = document.getElementById("txtAsesor").value;
  let color = document.getElementById("txtColor").value;
  let siniestro = document.getElementById("txtSiniestro").value;
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
  }).done(function (data) {
    console.log(data);
  });
}
