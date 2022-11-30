// Definir formDate
function userSubmit() {
  let imagen = new FormData(document.getElementById("userForm"));

  $.ajax({
    url: "detener",
    type: "post",
    data: imagen,
    cache: false,
    processData: false, // Estos tres deben ser falsos
    contentType: false, //
    //mimeType: "multipart/form-data",
    success: function (data) {
      alert(data);
    },
    error: function () {
      alert("Servidor anormal, intente nuevamente más tarde ...");
    },
  });
  return false;
}
$(document).ready(function (e) {
  $(function () {
    var buttonpressed;
    $(".botonGuardar").click(function () {
      buttonpressed = $(this).attr("name");
    });
    $("#myForm").on("submit", function (e) {
      e.preventDefault();
      alert("El botón presionado fue " + buttonpressed);
      // Aquí el resto del código
    });
  });
  //file type validation
});
