function leerArchivo(e) {
  let archivo = e.target.files[0];
  if (!archivo) {
    return;
  }
  let lector = new FileReader();
  lector.onload = function (e) {
    let contenido = e.target.result;
    let contenidoJson = JSON.parse(contenido);
    console.log(contenidoJson);
    for (let i of contenidoJson) {
      console.log(i.numPoliza);
    }
    for (let i of contenidoJson) {
      $.ajax({
        method: "POST",
        url: "../CargarSiniestro",
        data: {
          numSiniestro: i.numSiniestro,
          fechaSiniestro: i.fechaSiniestro,
          numPoliza: i.numPoliza,
          cobertura: i.cobertura,
          afectado: i.afectado,
          nomAsegurado: i.nomAsegurado,
          regimen: i.regimen,
          telefonoPrincipal: i.telefonoPrincipal,
          telefonoSec: i.telefonoSec,
          correo: i.correo,
          marca: i.marca,
          tipo: i.tipo,
          modelo: i.modelo,
          numSerie: i.numSerie,
          ciudad: i.ciudad,
          fechaDecreto: i.fechaDecreto,
          taller: i.taller,
        },
        success: function (result) {
          console.log(result);
        },
      });
    }
    mostrarContenido(contenido);
  };
  lector.readAsText(archivo);
}

window.addEventListener("load", function () {
  //valoresSesiones();
  $("#btnCargarExcel").click(function () {
    cargarExcel();
  });
});
function valoresSesiones() {
  //si el usuario es solo de consulta, se deshabilitan todos los biotones para modificar
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
        document.getElementById("file-input").disabled = true;
        document.getElementById("LeerExcel").disabled = true;
      }
    },
  });
}
async function cargarExcel() {
  const excelInput = document.getElementById("LeerExcel");
  const contenido = await readXlsxFile(excelInput.files[0]);
  if (!contenido) {
    alert("Por favor, selecciona un archivo Excel");
    return;
  }
  for (let x = 1; x < contenido.length; x++) {
    let fechaSiniestro = contenido[x][1].toISOString().split("T")[0];
    let fechaDecretacion = contenido[x][15].toISOString().split("T")[0];
    $.ajax({
      method: "POST",
      url: "../../php/AgregarSiniestro.php",
      data: {
        numSiniestro: contenido[x][0],
        fechaSiniestro,
        poliza: contenido[x][2],
        cobertura: contenido[x][3],
        afectado: contenido[x][4],
        asegurado: contenido[x][5],
        regimen: contenido[x][6],
        telefono: contenido[x][7],
        telefonoAlt: contenido[x][8],
        correo: contenido[x][9],
        marca: contenido[x][10],
        tipo: contenido[x][11],
        modelo: contenido[x][12],
        numSerie: contenido[x][13],
        ciudad: contenido[x][14],
        fechaDecretacion,
        ubicacion: contenido[x][16],
        agente: contenido[x][17],
        valComercial: contenido[x][18],
        valIndemnizacion: contenido[x][19],
      },
      success: function (result) {
        console.log(result);
      },
    });
  }
  alert("Carga con exito");
}
