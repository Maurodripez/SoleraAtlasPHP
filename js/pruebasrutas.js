$(document).ready(function () {
  $("#example").DataTable({
    dom: "Bfrtip",
    buttons: ["csv", "excel"],
  });
  $("#convertir").click(function () {
    $("#tablaExportar").DataTable({
      dom: "Bfrtip",
      buttons: ["csv", "excel"],
    });
  });
});
function exportarUsuarios() {
  $.ajax({
    method: "POST",
    url: "ExportarUsuarios",
    data: {
      accion: "ExportarUsuarios",
    },
  });
}
function buscarDatosExportar() {
  $.ajax({
    method: "POST",
    url: "DatosExportar",
    data: {
      accion: "tablaExportar",
    },
  })
    .done(function (result) {
      //funcion para generar talbas en automatico con lo resultados
      let tablaExportar = document.getElementById("tBodyExportar");
      let sinDiagonal = result.split("/-_");
      console.log(sinDiagonal[0]);
      console.log(sinDiagonal[1]);
      console.log(sinDiagonal[2]);
      console.log(sinDiagonal[3]);
      console.log(sinDiagonal[4]);
      console.log(sinDiagonal[5]);
      for (let i = 0; i < sinDiagonal.length - 1; i++) {
        let sinComas = sinDiagonal[i].split("-_/");
        let numSiniestro = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[0]}</td>`;
        let poliza = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[1]}</td>`;
        let afectado = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[2]}</td>`;
        let tipoDeCaso = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[3]}</td>`;
        let cobertura = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[4]}</td>`;
        let fechaSiniestro = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[5]}</td>`;
        let estado = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[6]}</td>`;
        let ciudad = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[7]}</td>`;
        let region = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[8]}</td>`;
        let ubicacionTaller = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[9]}</td>`;
        let regimenFiscal = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[10]}</td>`;
        let estatusCliente = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[11]}</td>`;
        let comentariosCliente = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[12]}</td>`;
        let fechaCarga = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[13]}</td>`;
        let usuarioCarga = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[14]}</td>`;
        let estatusSeguimientoSin = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[15]}</td>`;
        let usuarioAsignadoSin = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[16]}</td>`;
        let fechaAsignacion = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[17]}</td>`;
        let fechaSeguimiento = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[18]}</td>`;
        let comentarios = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[19]}</td>`;
        let marca = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[20]}</td>`;
        let tipo = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[21]}</td>`;
        let modelo = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[22]}</td>`;
        let numSerie = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[23]}</td>`;
        let valorIndemnizacion = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[24]}</td>`;
        let valorComercial = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[25]}</td>`;
        let placas = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[26]}</td>`;
        let telefonoPrincipal = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[27]}</td>`;
        let telefonosecundario = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[28]}</td>`;
        let contacto = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[29]}</td>`;
        let asegurado = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[31]}</td>`;
        let correoContacto = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[32]}</td>`;
        let telContacto = `<td style='font-size: 14px' class='tablaOculta'>${sinComas[33]}</td>`;
        tablaExportar.innerHTML += `<tr class='tablaOculta'>${
          numSiniestro +
          poliza +
          afectado +
          tipoDeCaso +
          cobertura +
          fechaSiniestro +
          estado +
          ciudad +
          region +
          ubicacionTaller +
          regimenFiscal +
          estatusCliente +
          comentariosCliente +
          fechaCarga +
          usuarioCarga +
          estatusSeguimientoSin +
          usuarioAsignadoSin +
          fechaAsignacion +
          fechaSeguimiento +
          comentarios +
          marca +
          tipo +
          modelo +
          numSerie +
          valorIndemnizacion +
          valorComercial +
          placas +
          telefonoPrincipal +
          telefonosecundario +
          contacto +
          asegurado +
          correoContacto +
          telContacto
        }</tr>`;
      }
    })
    .then(() => {
      // $(".botonesTabla").remove();
      let downloadLink;
      let dataType = "application/vnd.ms-excel";
      let tableSelect = document.getElementById("tablaExportar");
      let tableHTML = tableSelect.outerHTML.replace(/ /g, "%20");
      // Specify file name
      let filename = "";
      filename = filename ? filename + ".xls" : "excel_data.xls";

      // Create download link element
      downloadLink = document.createElement("a");

      document.body.appendChild(downloadLink);

      if (navigator.msSaveOrOpenBlob) {
        let blob = new Blob(["ufeff", tableHTML], {
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
      // recargarSiniestros();
    });
}
