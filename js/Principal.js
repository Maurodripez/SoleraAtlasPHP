$(document).ready(function () {
  obtenerSesion();
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });
});
function controlIframe(txtIframe) {
  //se controla la pgagina que se muestra en el iframe
  let iframecontrolador = document.getElementById("controladorIframe");
  switch (txtIframe) {
    case "Home":
      iframecontrolador.src = "ModuloPrincipal.php";
      closeNav();
      break;
    case "datos":
      iframecontrolador.src = "./Modulos/Datos.php";
      closeNav();
      break;
    case "Reporte":
      iframecontrolador.src = "./Modulos/Reporte.php";
      closeNav();
      break;
    case "Asignacion":
      iframecontrolador.src = "./Modulos/Asignacion.php";
      closeNav();
      break;
    case "CrearUsuario":
      iframecontrolador.src = "./Modulos/CrearUsuario.php";
      closeNav();
      break;
    case "Agenda":
      iframecontrolador.src = "./Modulos/Citas.php";
      closeNav();
      break;
  }
}
function openNav() {
  document.getElementById("sideNavigation").style.width = "250px";
  document.getElementById("sideNavigation").style.marginTop = "55px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("sideNavigation").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
function obtenerSesion() {
  $.ajax({
    type: "POST",
    url: "../../php/ObtenerSesion.php",
    dataType: "json",
    data: {
      accion: "Privilegios",
    },
  }).done(function (result) {
    if (
      result.Siniestros[0].privilegios != "root" &&
      result.Siniestros[0].privilegios != "supervisor"
    ) {
      document.getElementById("Asignacion").style.display = "none";
      document.getElementById("Reporte").style.display = "none";
      document.getElementById("Encuesta").style.display = "none";
      document.getElementById("CrearUsuario").style.display = "none";
    }
  });
}
