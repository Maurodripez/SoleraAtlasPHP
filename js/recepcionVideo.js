window.addEventListener("load", function (event) {
  fetch(controlador + "AccionesFolios.php", {
    method: "POST",
    body: data,
  })
    .then((response) => response.text())
    .then((respuesta) => {
      console.log(respuesta);
    });
});
