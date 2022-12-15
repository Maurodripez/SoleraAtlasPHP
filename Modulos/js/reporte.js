//se llama a la funcion cundo carga la pagina
//funcion para obtener los siniestros por estdos y cambior los colores en el mapa de la repyublica
let rutaInicial = "../../php/GraficasyMapas/";

//funcion para generar mapa y sus cambios de colores
function datosMapa() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "InformacionMapas.php",
    dataType: "json",
    data: {
      accion: "infoMapa",
    },
  }).done(function (result) {
    for (let i in result.Estados) {
      if (
        result.Estados[i].cantidad <= 4 &&
        document.getElementById(
          result.Estados[i].estado.toLowerCase().replace(/\s+/g, "")
        )
      ) {
        document
          .getElementById(
            result.Estados[i].estado.toLowerCase().replace(/\s+/g, "")
          )
          .setAttribute("fill", "#00FF04");
      } else if (
        result.Estados[i].cantidad >= 5 &&
        document.getElementById(
          result.Estados[i].estado.toLowerCase().replace(/\s+/g, "")
        )
      ) {
        document
          .getElementById(
            result.Estados[i].estado.toLowerCase().replace(/\s+/g, "")
          )
          .setAttribute("fill", "#FDCB00");
      }
    }
  });
}
//////grafica de folios por area
function foliosArea() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "InformacionMapas.php",
    dataType: "json",
    data: {
      accion: "foliosArea",
    },
    success: function (result) {
      let conteoTotal = 0;
      let porcentajeNuevo;
      let porcentajeProceso;
      let porcentajeCancelado;
      let porcentajeTerminado;
      for (let i in result.Estacion) {
        conteoTotal = conteoTotal + result.Estacion[i].conteo;
      }
      for (let i in result.Estacion) {
        let porcentaje = (result.Estacion[i].conteo / conteoTotal) * 100;
        decimal = +porcentaje.toString().replace(/^[^\.]+/, "0");
        if (decimal > 0.5) {
          porcentaje = Math.ceil(porcentaje);
        } else {
          porcentaje = Math.floor(porcentaje);
        }
        if (i == 0) {
          porcentajeNuevo = porcentaje;
        } else if (i == 1) {
          porcentajeProceso = porcentaje;
        } else if (i == 2) {
          porcentajeCancelado = porcentaje;
        } else if (i == 3) {
          porcentajeTerminado = porcentaje;
        }
        switch (result.Estacion[i].estacionProceso) {
          case "Nuevo":
            $("#nuevo").html(result.Estacion[i].conteo);
            $("#nuevoPorcentaje").html(porcentaje + "%");
            break;
          case "En seguimiento":
            $("#proceso").html(result.Estacion[i].conteo);
            $("#procesoPorcentaje").html(porcentaje + "%");
            break;
          case "Cancelado":
            $("#cancelado").html(result.Estacion[i].conteo);
            $("#canceladoPorcentaje").html(porcentaje + "%");
            break;
          case "Terminado":
            $("#terminado").html(result.Estacion[i].conteo);
            $("#terminadoPorcentaje").html(porcentaje + "%");
            break;
        }
      }
      let options = {
        chart: {
          type: "bar",
        },
        series: [
          {
            name: "Folios",
            data: [
              result.Estacion[0].conteo,
              result.Estacion[1].conteo,
              result.Estacion[2].conteo,
              result.Estacion[3].conteo,
            ],
          },
        ],
        labels: [
          "Nuevo: " + porcentajeNuevo + "%",
          "En proceso: " + porcentajeProceso + "%",
          "Cancelado: " + porcentajeCancelado + "%",
          "Terminado" + porcentajeTerminado + "%",
        ],
        title: {
          text: "Distribucion de folios por area",
          style: {
            fontSize: "30px",
            align: "center",
          },
        },
      };
      let chart = new ApexCharts(
        document.querySelector("#foliosGrafica"),
        options
      );
      chart.render();
      //dona
      options = {
        series: [
          result.Estacion[0].conteo,
          result.Estacion[1].conteo,
          result.Estacion[2].conteo,
          result.Estacion[3].conteo,
        ],
        chart: {
          width: 600,
          type: "donut",
        },
        labels: [
          "Nuevo: " + porcentajeNuevo + "%",
          "En proceso: " + porcentajeProceso + "%",
          "Cancelado: " + porcentajeCancelado + "%",
          "Terminado" + porcentajeTerminado + "%",
        ],
        title: {
          text: "Distribucion de folios",
          style: {
            fontSize: "30px",
            align: "center",
          },
        },
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 200,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      };
      chart = new ApexCharts(document.querySelector("#folioDona"), options);
      chart.render();
    },
  });
}
async function estatusSeguimiento() {
  // en el objeto “datos” tenemos los datos que vamos a enviar al servidor
  // en este ejemplo tenemos dos datos; un título y un array de números
  var datos = { accion: "estatusSeguimiento" };
  // en el objeto init tenemos los parámetros de la petición AJAX
  var init = {
    // el método de envío de la información será POST
    method: "POST",
    headers: {
      // cabeceras HTTP
      // vamos a enviar los datos en formato JSON
      "Content-Type": "application/json",
    },
    // el cuerpo de la petición es una cadena de texto
    // con los datos en formato JSON
    body: JSON.stringify(datos), // convertimos el objeto a texto
  };
  // realizamos la petición AJAX usando fetch
  // el primer parámetro es el recurso del servidor al que queremos acceder
  // en este ejemplo, es un fichero php llamado media.php que se encuentra
  // dentro de la carpeta ./php y con el código PHP que hay arriba.
  // el segundo parámetro es el objeto init con la información sobre los
  // datos que queremos enviar, el método de envio, etc.
  var response = await fetch(rutaInicial + "InformacionMapas.php", init);
  if (response.ok) {
    // si la petición se ha resuelto correctamente,
    // intentamos resolver otra promesa que convierta
    // lo que nos ha respondido el servidor en un objeto de JavaScript.
    // si el servidor no ha enviado correctamente la información
    // en formato JSON, no se podrán convertir correctamente
    // los datos a un objeto, por lo que la promesa fallará
    // y esto provocará un error.
    var respuesta = await response.json();
    // en este ejemplo, el servidor nos devuelve un objeto con dos datos,
    // la media de los números enviados, y un fragmento de HTML
    // con un el título y una lista con los números
    alert(respuesta.media);
  } else {
    throw new Error(response.statusText);
  }
}
$(document).ready(() => {
  datosMapa();
  foliosArea();
  estatusSeguimiento();
  $(".calendario").datepicker({
    timepicker: false,
    datepicker: true,
    format: "yyyy-mm-dd",
    value: "2022-09-14",
    weeks: true,
  });
});
////////////////////////////////
//funciones utilizadas
////////////////////////////////
$(document).ready(function () {
  //mostrar en tiempo real la grafica de folios//

  //grafica dona//
  //termina la grafica de folios

  //inicia grafica de seguimiento
  $.ajax({
    method: "POST",
    url: "../DatosReporte",
    data: {
      accion: "seguimiento",
    },
    success: function (result) {
      let csDocumentosC = 0;
      let csDocumentosP;
      let dIncorrectosC = 0;
      let dIncorrectosP;
      let d1a3DocsC = 0;
      let d1a3DocsP;
      let d4a6DocsC = 0;
      let d4a6DocsP;
      let d7a10DocsC = 0;
      let d7a10DocsP;
      let nuevoC = 0;
      let nuevoP;
      let sContactoC = 0;
      let sContactoP;
      let sc30DiasC = 0;
      let sc30DiasP;
      let tDocsC = 0;
      let tDocsP;
      let sinComas = result.split(",");
      for (let i = 1; i < sinComas.length; i = i + 2) {
        //se hace para hacer el calculo del procentaje de cada caso
        porcentaje = (sinComas[i - 1] * 100) / sinComas[sinComas.length - 1];
        switch (sinComas[i]) {
          case "Con contacto sin documentos":
            csDocumentosC = sinComas[i - 1];
            csDocumentosP = porcentaje + "%";
            break;
          case "Datos incorrectos":
            dIncorrectosC = sinComas[i - 1];
            dIncorrectosP = porcentaje + "%";
            break;
          case "De 1 a 3 documentos":
            d1a3DocsC = sinComas[i - 1];
            d1a3DocsP = porcentaje + "%";
            break;
          case "De 4 a 6 documentos":
            d4a6DocsC = sinComas[i - 1];
            d4a6DocsP = porcentaje + "%";
            break;
          case "De 7 a 10 documentos":
            d7a10DocsC = sinComas[i - 1];
            d7a10DocsP = porcentaje + "%";
            break;
          case "Nuevo":
            nuevoC = sinComas[i - 1];
            nuevoP = porcentaje + "%";
            break;
          case "Sin Contacto":
            sContactoC = sinComas[i - 1];
            sContactoP = porcentaje + "%";
            break;
          case "Sin contacto en 30 dias":
            sc30DiasC = sinComas[i - 1];
            sc30DiasP = porcentaje + "%";
            break;
          case "Total de documentos":
            tDocsC = sinComas[i - 1];
            tDocsP = porcentaje + "%";
            break;
        }
      }

      //quitamos la ultima coma para poder traer los resultados correctos
      let options = {
        colors: [
          "#F44336",
          "#E91E63",
          "#9C27B0",
          "#F5BF07",
          "#D1F507",
          "#77F507",
          "#07F589",
          "#9407F5",
          "#0707F5",
        ],
        series: [
          Number(csDocumentosC),
          Number(dIncorrectosC),
          Number(d1a3DocsC),
          Number(d4a6DocsC),
          Number(d7a10DocsC),
          Number(nuevoC),
          Number(sContactoC),
          Number(sc30DiasC),
          Number(tDocsC),
        ],
        chart: {
          width: 650,
          type: "pie",
        },
        labels: [
          "Con contacto sin documentos",
          "Datos incorrectos",
          "De 1 a 3 documentos",
          "De 4 a 6 documentos",
          "De 7 a 10 documentos",
          "Nuevo",
          "Sin Contacto",
          "Sin contacto en 30 dias",
          "Total de documentos",
        ],
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 200,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
        title: {
          text: "Analisis de estatus",
          style: {
            fontSize: "27px",
            align: "center",
          },
        },
      };

      let chart = new ApexCharts(
        document.querySelector("#seguimientosGrafica"),
        options
      );
      chart.render();
    },
  });

  $.ajax({
    method: "POST",
    url: "../DatosReporte",
    data: {
      accion: "AsignadosEntregados",
    },
    success: function (result) {
      let sinUltima = result.substring(0, result.length - 1);
      let sinComas = sinUltima.split(",");
      // obtener fecha
      let hoy = new Date();
      const meses = [
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
      ];
      let options = {
        series: [
          {
            name: "series1",
            data: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
          },
          {
            name: "series2",
            data: [12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1],
          },
        ],
        chart: {
          height: 350,
          type: "area",
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: "smooth",
        },
        xaxis: {
          type: "text",
          categories: [
            meses[hoy.getMonth() - 10],
            meses[hoy.getMonth() - 9],
            meses[hoy.getMonth() - 8],
            meses[hoy.getMonth() - 7],
            meses[hoy.getMonth() - 6],
            meses[hoy.getMonth() - 5],
            meses[hoy.getMonth() - 4],
            meses[hoy.getMonth() - 3],
            meses[hoy.getMonth() - 2],
            meses[hoy.getMonth() - 1],
            meses[hoy.getMonth()],
            meses[hoy.getMonth() + 1],
          ],
        },
      };

      let chart = new ApexCharts(
        document.querySelector("#foliosEntregados"),
        options
      );
      chart.render();
    },
  });

  //grafica folios por fecha//
  $.ajax({
    method: "POST",
    url: "../DatosReporte",
    data: {
      accion: "FoliosFechas",
    },
    success: function (result) {
      let sinComas = result.split(",");
      let options = {
        chart: {
          height: 280,
          type: "area",
        },
        dataLabels: {
          enabled: false,
        },
        title: {
          text: "Folios por fechas",
          style: {
            fontSize: "27px",
            align: "center",
          },
        },
        series: [
          {
            name: "Folios",
            data: [sinComas[0], sinComas[1], sinComas[2], sinComas[3]],
          },
        ],
        fill: {
          type: "gradient",
          gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 90, 100],
          },
        },
        xaxis: {
          categories: [
            "0 a 2 Dias",
            "3 a 5 Dias",
            "6 a 14 Dias",
            "Mas de 15 Dias",
          ],
        },
      };

      let chart = new ApexCharts(
        document.querySelector("#disPorDias"),
        options
      );

      chart.render();
    },
  });
  //grafica de regiones//
  $.ajax({
    method: "POST",
    url: "../DatosReporte",
    data: {
      accion: "porRegiones",
    },
    success: function (result) {
      let aC = 0;
      let bC = 0;
      let cC = 0;
      let dC = 0;
      let eC = 0;
      let fC = 0;
      let gC = 0;
      let hC = 0;
      let iC = 0;
      let jC = 0;
      let sinComas = result.split(",");
      for (let i = 0; i < sinComas.length; i = i + 2) {
        //se hace para hacer el calculo del procentaje de cada caso
        porcentaje = (sinComas[i - 1] * 100) / sinComas[sinComas.length - 1];
        switch (sinComas[i]) {
          case "Layout ZG A: Guadalajara-Colima-Nayarit":
            aC = sinComas[i + 1];
            break;
          case "Layout ZG B: Acapulco-Toluca-Pachuca-Cuernavaca":
            bC = sinComas[i + 1];
            break;
          case "Layout ZG C: Puebla-Queretaro-Tlaxcala":
            cC = sinComas[i + 1];
            break;
          case "Layout ZG D: Merida-Cancun-Tuxtla-Villahermosa-Campeche":
            dC = sinComas[i + 1];
            break;
          case "Layout ZG E: Leon, San Luis Potosi-Aguascalientes-Morelia-Tamaulipas-Zacatecas":
            eC = sinComas[i + 1];
            break;
          case "NLayout ZG F: CDMX-Estado de Mexico":
            fC = sinComas[i + 1];
            break;
          case "SLayout ZG G: Coatzacualcos-Oaxaca-Veracruz-Xalapa":
            gC = sinComas[i + 1];
            break;
          case "Layout ZG H: Monterrey":
            hC = sinComas[i + 1];
            break;
          case "Layout ZG I: Chihuahua-Cd. Juarez-Reynosa-Saltillo-Tampico-Torreon-Nuevo Laredo-Durango":
            iC = sinComas[i + 1];
            break;
          case "Layout ZG J: Mexicali-Cd. Obregon-Culiacan-Hermosillo-Los Mochis-Tijuana Baja California-Baja California Sur":
            jC = sinComas[i + 1];
            break;
        }
      }

      //quitamos la ultima coma para poder traer los resultados correctos
      let options = {
        colors: [
          "#F44336",
          "#E91E63",
          "#9C27B0",
          "#F5BF07",
          "#D1F507",
          "#77F507",
          "#07F589",
          "#9407F5",
          "#0707F5",
        ],
        series: [
          Number(aC),
          Number(bC),
          Number(cC),
          Number(dC),
          Number(eC),
          Number(fC),
          Number(gC),
          Number(hC),
          Number(iC),
          Number(jC),
        ],
        chart: {
          width: 650,
          type: "pie",
        },
        labels: [
          "Layout ZG A",
          "Layout ZG B",
          "Layout ZG C",
          "Layout ZG D",
          "Layout ZG E",
          "Layout ZG F",
          "Layout ZG G",
          "Layout ZG H",
          "Layout ZG I",
          "Layout ZG J",
        ],
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 200,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
        title: {
          text: "folios por region",
          style: {
            fontSize: "27px",
            align: "center",
          },
        },
      };

      let chart = new ApexCharts(
        document.querySelector("#regionesGrafica"),
        options
      );
      chart.render();
    },
  });
  $.ajax({
    method: "POST",
    url: "../DatosReporte",
    data: {
      accion: "reporteDocumentos",
    },
    success: function (result) {
      let sinComas;
      let iOficialC = 0;
      let iOficialP = 0;
      let cDomicilioC = 0;
      let cDomicilioP = 0;
      let iAdicionalC = 0;
      let iAdicionalP = 0;
      let fVehiculoC = 0;
      let fVehiculoP = 0;
      let tenenciasC = 0;
      let tenenciasP = 0;
      let bajaC = 0;
      let bajaP = 0;
      let eCuentaC = 0;
      let eCuentaP = 0;
      let denunciaC = 0;
      let denunciaP = 0;
      let acreditacionP = 0;
      let acreditacionC = 0;
      let porcentaje;
      sinComas = result.split(",");

      for (let i = 0; i < sinComas.length; i = i + 2) {
        //se hace para hacer el calculo del procentaje de cada caso
        porcentaje = (sinComas[i + 1] * 100) / sinComas[sinComas.length - 1];
        switch (sinComas[i]) {
          case "Identificacion oficial":
            iOficialC = sinComas[i + 1];
            iOficialP = porcentaje;
            break;
          case "Comprobante de domicilio":
            cDomicilioC = sinComas[i + 1];
            cDomicilioP = porcentaje;
            break;
          case "Informacion adicional":
            iAdicionalC = sinComas[i + 1];
            iAdicionalP = porcentaje;
            break;
          case "Factura del vehiculo":
            fVehiculoC = sinComas[i + 1];
            fVehiculoP = porcentaje;
            break;
          case "Tenencias":
            tenenciasC = sinComas[i + 1];
            tenenciasP = porcentaje;
            break;
          case "Baja":
            bajaC = sinComas[i + 1];
            bajaP = porcentaje;
            break;
          case "Estado de cuenta":
            eCuentaC = sinComas[i + 1];
            eCuentaP = porcentaje;
            break;
          case "Denuncia":
            denunciaC = sinComas[i + 1];
            denunciaP = porcentaje;
            break;
          case "Acreditacion":
            acreditacionC = sinComas[i + 1];
            acreditacionP = porcentaje;
            break;
        }
      }
      let options = {
        chart: {
          width: "750px",
          type: "bar",
        },
        series: [
          {
            name: "Folios",
            data: [
              iOficialC,
              cDomicilioC,
              iAdicionalC,
              fVehiculoC,
              tenenciasC,
              bajaC,
              eCuentaC,
              denunciaC,
              acreditacionC,
            ],
          },
        ],
        labels: [
          "Identificacion oficial: " + Math.round(iOficialP) + "%",
          "Comprobante de domicilio: " + Math.round(cDomicilioP) + "%",
          "Informacion adicional: " + Math.round(iAdicionalP) + "%",
          "Factura del vehiculo: " + Math.round(fVehiculoP) + "%",
          "Tenencias: " + Math.round(tenenciasP) + "%",
          "Baja: " + Math.round(bajaP) + "%",
          "Estado de cuenta: " + Math.round(eCuentaP) + "%",
          "Denuncia: " + Math.round(denunciaP) + "%",
          "Acreditacion: " + Math.round(acreditacionP) + "%",
        ],
        title: {
          text: "Distribucion de folios por area",
          style: {
            fontSize: "30px",
            align: "center",
          },
        },
      };

      let chart = new ApexCharts(
        document.querySelector("#docsGrafica"),
        options
      );

      chart.render();
    },
  });

  //grqafica porcentajes//
  $.ajax({
    method: "post",
    url: "../ControladorMostrarDatos",
    data: {
      accion: "MostrarSiniestrosNoDocs",
      porcentajes: "Solo%",
    },
    success: function (result) {
      let contPTotal = 0;
      let contPDocs = 0;
      let de0a20D = 0;
      let de20a40D = 0;
      let de40a60D = 0;
      let de60a80D = 0;
      let de80a100D = 0;
      let de0a20T = 0;
      let de20a40T = 0;
      let de40a60T = 0;
      let de60a80T = 0;
      let de80a100T = 0;
      let sinComas = result.split(",");
      for (let i = 0; i < sinComas.length; i = i + 2) {
        let enteros = parseInt(sinComas[i]);
        if (enteros >= 0 && enteros < 21) {
          de0a20D += 1;
        } else if (enteros >= 21 && enteros < 41) {
          de20a40D += 1;
        } else if (enteros >= 41 && enteros < 61) {
          de40a60D += 1;
        } else if (enteros >= 61 && enteros < 81) {
          de60a80D += 1;
        } else if (enteros >= 81 && enteros < 101) {
          de80a100D += 1;
        }

        enteros = parseInt(sinComas[i + 1]);
        if (enteros >= 0 && enteros < 21) {
          de0a20T += 1;
        } else if (enteros >= 21 && enteros < 41) {
          de20a40T += 1;
        } else if (enteros >= 41 && enteros < 61) {
          de40a60T += 1;
        } else if (enteros >= 61 && enteros < 81) {
          de60a80T += 1;
        } else if (enteros >= 81 && enteros < 101) {
          de80a100T += 1;
        }
      }
      let options = {
        chart: {
          width: "650px",
          type: "bar",
        },
        series: [
          {
            name: "Documentos",
            data: [de0a20D, de20a40D, de40a60D, de60a80D, de80a100D],
          },
        ],
        labels: ["0 a 20%", "20 a 40%", "40 a 60%", "60 a 80%", "80 a 100%"],
        title: {
          text: "Porcentaje de documentos",
          style: {
            fontSize: "30px",
            align: "center",
          },
        },
      };

      let chart = new ApexCharts(
        document.querySelector("#porcentajeDocs"),
        options
      );

      chart.render();

      let options2 = {
        chart: {
          width: "650px",
          type: "bar",
        },
        series: [
          {
            name: "Documentos",
            data: [de0a20D, de20a40D, de40a60D, de60a80D, de80a100D],
          },
        ],
        labels: ["0 a 20%", "20 a 40%", "40 a 60%", "60 a 80%", "80 a 100%"],
        title: {
          text: "Porcentaje total",
          style: {
            fontSize: "30px",
            align: "center",
          },
        },
      };

      let chart2 = new ApexCharts(
        document.querySelector("#porcentajeTotal"),
        options2
      );

      chart2.render();
    },
  });
});
function mostrarMovimientos() {
  $.ajax({
    method: "POST",
    url: "../ExportarUsuarios",
    data: {
      accion: "MostrarMov",
    },
  }).done(function (result) {
    tablaReporte(result);
  });
}
function busquedaReporte() {
  $.ajax({
    method: "POST",
    url: "../ExportarUsuarios",
    data: {
      accion: "buscarFechas",
      fechaInicio: document.getElementById("fechaInicioUsuarios").value,
      fechaFinal: document.getElementById("fechaFinalUsuarios").value,
    },
  }).done(function (result) {
    tablaReporte(result);
  });
}
function tablaReporte(result) {
  $(".tablaActualReporte").remove();
  let tabla = document.getElementById("TablaReporte");
  let sinCodificado = result.split("/-_");
  for (let i = 0; i < sinCodificado.length - 1; i++) {
    let sinCodificado2 = sinCodificado[i].split("-_/");
    let usuario = `<td class='tablaActualReporte'>${sinCodificado2[0]}</td>`;
    let total = `<td class='tablaActualReporte'>${sinCodificado2[8]}</td>`;
    let lunes = `<td class='tablaActualReporte'>${sinCodificado2[1]}</td>`;
    let martes = `<td class='tablaActualReporte'>${sinCodificado2[2]}</td>`;
    let miercoles = `<td class='tablaActualReporte'>${sinCodificado2[3]}</td>`;
    let jueves = `<td class='tablaActualReporte'>${sinCodificado2[4]}</td>`;
    let viernes = `<td class='tablaActualReporte'>${sinCodificado2[5]}</td>`;
    let sabado = `<td class='tablaActualReporte'>${sinCodificado2[6]}</td>`;
    let domingo = `<td class='tablaActualReporte'>${sinCodificado2[7]}</td>`;
    tabla.innerHTML += `<tr class='tablaActualReporte'>${
      usuario +
      domingo +
      lunes +
      martes +
      miercoles +
      jueves +
      viernes +
      sabado +
      total
    }</tr>`;
  }
}
function exportTableToExcel(tableID, filename = "") {
  let downloadLink;
  let dataType = "application/vnd.ms-excel";
  let tableSelect = document.getElementById(tableID);
  let tableHTML = tableSelect.outerHTML.replace(/ /g, "%20");

  // Specify file name
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
}
function exportarMovimientosGrande() {
  $.ajax({
    method: "POST",
    url: "../ExportarUsuarios",
    data: {
      accion: "buscarGrandeFechas",
      fechaInicio: document.getElementById("fechaInicioUsuarios").value,
      fechaFinal: document.getElementById("fechaFinalUsuarios").value,
    },
  }).done(function (result) {
    tablaReporteGrande(result);
  });
}
function tablaReporteGrande(result) {
  $(".TablaReporteGrande").remove();
  let tabla = document.getElementById("TablaReporteGrande");
  let sinCodificado = result.split("/-_");
  for (let i = 0; i < sinCodificado.length - 1; i++) {
    let sinCodificado2 = sinCodificado[i].split("-_/");
    let usuario = `<td class='TablaReporteGrande'>${sinCodificado2[0]}</td>`;
    let fechaSeguimiento = `<td class='TablaReporteGrande'>${sinCodificado2[8]}</td>`;
    let estatus = `<td class='TablaReporteGrande'>${sinCodificado2[1]}</td>`;
    let comentarios = `<td class='TablaReporteGrande'>${sinCodificado2[2]}</td>`;
    let siniestro = `<td class='TablaReporteGrande'>${sinCodificado2[3]}</td>`;
    let poliza = `<td class='TablaReporteGrande'>${sinCodificado2[4]}</td>`;
    let asegurado = `<td class='TablaReporteGrande'>${sinCodificado2[5]}</td>`;
    let marca = `<td class='TablaReporteGrande'>${sinCodificado2[6]}</td>`;
    let tipo = `<td class='TablaReporteGrande'>${sinCodificado2[7]}</td>`;
    let modelo = `<td class='TablaReporteGrande'>${sinCodificado2[8]}</td>`;
    let serie = `<td class='TablaReporteGrande'>${sinCodificado2[9]}</td>`;
    let estado = `<td class='TablaReporteGrande'>${sinCodificado2[10]}</td>`;
    let region = `<td class='TablaReporteGrande'>${sinCodificado2[11]}</td>`;
    tabla.innerHTML += `<tr class='TablaReporteGrande'>${
      usuario +
      fechaSeguimiento +
      estatus +
      comentarios +
      siniestro +
      poliza +
      asegurado +
      marca +
      tipo +
      modelo +
      serie +
      estado +
      region
    }</tr>`;
  }
}
function ExportarExcelJava() {
  if (
    document.getElementById("fechaInicioUsuarios").value != "" &&
    document.getElementById("fechaFinalUsuarios").value != ""
  ) {
    $.ajax({
      method: "POST",
      url: "../exportar",
      data: {
        accion: "exportarUsuarios",
        fechaInicio: document.getElementById("fechaInicioUsuarios").value,
        fechaFinal: document.getElementById("fechaFinalUsuarios").value,
      },
    }).done(function (result) {
      console.log(result);
      let descarga = document.getElementById("btnDescargarExcel");
      descarga.click();
    });
  } else {
    alert("Por favor, selecciona fechas correctas");
  }
}
