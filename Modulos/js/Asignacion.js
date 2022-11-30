function leerArchivo(e) {
    let archivo = e.target.files[0];
    if (!archivo) {
      return;
    }
    let lector = new FileReader();
    lector.onload = function (e) {
      let contenido = e.target.result;
      let contenidoJson = JSON.parse(contenido);
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
  document
    .getElementById("file-input")
    .addEventListener("change", leerArchivo, false);
    alert("wer");
  const excelInput = document.getElementById("LeerExcel");
  excelInput.addEventListener("change", async function () {
    const contenido = await readXlsxFile(excelInput.files[0]);
    if (!contenido) {
      return;
    }
    let sesion = document.getElementById("UsuarioActivo").textContent;
    for (let x = 1; x < contenido.length; x++) {
      let miYear = contenido[x][1].getUTCFullYear();
      let miMes = contenido[x][1].getUTCMonth() + 1;
      let miDia = contenido[x][1].getUTCDate();
      if (miMes <= 9) {
        miMes = "0" + miMes;
      }
      if (miDia <= 9) {
        miDia = "0" + miDia;
      }
      let nFechaSin = miYear + "-" + miMes + "-" + miDia;
      miYear = contenido[x][15].getUTCFullYear();
      miMes = contenido[x][15].getUTCMonth() + 1;
      miDia = contenido[x][15].getUTCDate();
      if (miMes <= 9) {
        miMes = "0" + miMes;
      }
      if (miDia <= 9) {
        miDia = "0" + miDia;
      }
      let nFechaDec = miYear + "-" + miMes + "-" + miDia;
      $.ajax({
        method: "POST",
        url: "../CargarSiniestro",
        data: {
          numSiniestro: contenido[x][0],
          fechaSiniestro: nFechaSin,
          numPoliza: contenido[x][2],
          cobertura: contenido[x][3],
          afectado: contenido[x][4],
          nomAsegurado: contenido[x][5],
          regimen: contenido[x][6],
          telefonoPrincipal: contenido[x][7],
          telefonoSec: contenido[x][8],
          correo: contenido[x][9],
          marca: contenido[x][10],
          tipo: contenido[x][11],
          modelo: contenido[x][12],
          numSerie: contenido[x][13],
          ciudad: contenido[x][14],
          fechaDecreto: nFechaDec,
          taller: contenido[x][16],
          sesion,
        },
        success: function (result) {
          console.log(result);
        },
      });
  
    }
  });
  window.addEventListener("load", function () {
    valoresSesiones();
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
  