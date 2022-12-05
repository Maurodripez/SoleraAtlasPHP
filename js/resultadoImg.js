/*$(document).ready(function () {
  function mostrarimagenServlet() {
    $.ajax({
      method: "post",
      url: "leerImagenes",
      data: {
        accion: "traerImagen64",
      },
      success: function (result) {
        let imagen = document.getElementById("mostrarimagen64");
        imagen.src = result;
      },
    });
  }
  setInterval(mostrarimagenServlet, 500);
});*/

/*function GuardarImagenVideo() {
  $.ajax({
    method: "post",
    url: "leerImagenes",
    data: {
      idRegistro: document.getElementById("idOculto").value,
      guardarImagen: "guardarImagen",
      nombreDocumento: document.getElementById("nombreDocVideo").value,
    },
    success: function (result) {
      alert(result);
    },
  });
}*/
