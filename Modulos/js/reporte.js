//se llama a la funcion cundo carga la pagina
//funcion para obtener los siniestros por estdos y cambior los colores en el mapa de la repyublica
let rutaInicial = "../php/GraficasyMapas/";

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
        labels: ["Nuevo:", "En proceso:", "Cancelado:", "Terminado"],
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
      console.log(result.Estacion[0].conteo);
      options = {
        series: [
          parseInt(result.Estacion[0].conteo),
          parseInt(result.Estacion[1].conteo),
          parseInt(result.Estacion[2].conteo),
          parseInt(result.Estacion[3].conteo),
        ],
        chart: {
          width: 600,
          type: "donut",
        },
        labels: ["Nuevo:", "En proceso:", "Cancelado:", "Terminado"],
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

function estatusSeguimiento() {
  //inicia grafica de seguimiento
  $.ajax({
    method: "POST",
    url: rutaInicial + "InformacionMapas.php",
    dataType: "json",
    data: {
      accion: "estatusSeguimiento",
    },
    success: function (result) {
      let csDocumentosC = 0;
      let dIncorrectosC = 0;
      let d1a3DocsC = 0;
      let d4a6DocsC = 0;
      let d7a10DocsC = 0;
      let nuevoC = 0;
      let sContactoC = 0;
      let sc30DiasC = 0;
      let tProcesoC = 0;
      let cOtrasViasC = 0;
      let conteoTotal = 0;
      let decimal = 0;
      for (let i in result.Estatus) {
        conteoTotal += result.Estatus[i].conteo;
      }
      for (let i in result.Estatus) {
        let porcentaje = (result.Estatus[i].conteo / conteoTotal) * 100;
        decimal = +porcentaje.toString().replace(/^[^\.]+/, "0");
        if (decimal > 0.5) {
          porcentaje = Math.ceil(porcentaje);
        } else {
          porcentaje = Math.floor(porcentaje);
        }
        switch (result.Estatus[i].estatusSeguimientoSin) {
          case "CON CONTACTO SIN DOCUMENTOS":
            csDocumentosC = result.Estatus[i].conteo;
            break;
          case "DATOS INCORRECTOS":
            dIncorrectosC = result.Estatus[i].conteo;
            break;
          case "DE 1 A 3 DOCUMENTOS":
            d1a3DocsC = result.Estatus[i].conteo;
            break;
          case "DE 4 A 6 DOCUMENTOS":
            d4a6DocsC = result.Estatus[i].conteo;
            break;
          case "DE 7 A 10 DOCUMENTOS":
            d7a10DocsC = result.Estatus[i].conteo;
            break;
          case "NUEVO":
            nuevoC = result.Estatus[i].conteo;
            break;
          case "SIN CONTACTO":
            sContactoC = result.Estatus[i].conteo;
            break;
          case "SIN CONTACTO EN 30 DIAS":
            sc30DiasC = result.Estatus[i].conteo;
            break;
          case "TERMINADO POR PROCESO COMPLETO":
            tProcesoC = result.Estatus[i].conteo;
            break;
          case "CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER) ":
            cOtrasViasC = result.Estatus[i].conteo;
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
          "#bb91f4",
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
          Number(tProcesoC),
          Number(cOtrasViasC),
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
          "Terminado por proceso completo",
          "Concluido por otras vias(Barra,Oficina,Broker)",
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
}
function asignadosEntregados() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "InformacionMapas.php",
    data: {
      accion: "Asignados",
    },
    success: function (result) {
      let sinDiagonal = result.split("//");
      let mes1 = JSON.parse(sinDiagonal[0]);
      let mes2 = JSON.parse(sinDiagonal[1]);
      let mes3 = JSON.parse(sinDiagonal[2]);
      let mes4 = JSON.parse(sinDiagonal[3]);
      let mes5 = JSON.parse(sinDiagonal[4]);
      let mes6 = JSON.parse(sinDiagonal[5]);
      let mes7 = JSON.parse(sinDiagonal[6]);
      let mes8 = JSON.parse(sinDiagonal[7]);
      let mes9 = JSON.parse(sinDiagonal[8]);
      let mes10 = JSON.parse(sinDiagonal[9]);
      let mes11 = JSON.parse(sinDiagonal[10]);
      let mes12 = JSON.parse(sinDiagonal[11]);
      $.ajax({
        method: "POST",
        url: rutaInicial + "InformacionMapas.php",
        data: {
          accion: "Entregados",
        },
        success: function (data) {
          let sinDiagonal2 = data.split("//");
          options = {
            series: [
              {
                name: "Asignados",
                data: [
                  mes12.Asignados[0].conteo,
                  mes11.Asignados[0].conteo,
                  mes10.Asignados[0].conteo,
                  mes9.Asignados[0].conteo,
                  mes8.Asignados[0].conteo,
                  mes7.Asignados[0].conteo,
                  mes6.Asignados[0].conteo,
                  mes5.Asignados[0].conteo,
                  mes4.Asignados[0].conteo,
                  mes3.Asignados[0].conteo,
                  mes2.Asignados[0].conteo,
                  mes1.Asignados[0].conteo,
                ],
              },
              {
                name: "Entregados",
                data: [
                  JSON.parse(sinDiagonal2[11]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[10]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[9]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[8]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[7]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[6]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[5]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[4]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[3]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[2]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[1]).Entregados[0].conteo,
                  JSON.parse(sinDiagonal2[0]).Entregados[0].conteo,
                ],
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
                mes12.Asignados[0].mes,
                mes11.Asignados[0].mes,
                mes10.Asignados[0].mes,
                mes9.Asignados[0].mes,
                mes8.Asignados[0].mes,
                mes7.Asignados[0].mes,
                mes6.Asignados[0].mes,
                mes5.Asignados[0].mes,
                mes4.Asignados[0].mes,
                mes3.Asignados[0].mes,
                mes2.Asignados[0].mes,
                mes1.Asignados[0].mes,
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
    },
  });
}
function foliosFechas() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "InformacionMapas.php",
    data: {
      accion: "FoliosFechas",
    },
  }).done(function (result) {
    let sinDiagonal = result.split("//");
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
          data: [
            JSON.parse(sinDiagonal[0]).FoliosFechas[0].conteo,
            JSON.parse(sinDiagonal[1]).FoliosFechas[0].conteo,
            JSON.parse(sinDiagonal[2]).FoliosFechas[0].conteo,
            JSON.parse(sinDiagonal[3]).FoliosFechas[0].conteo,
          ],
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

    let chart = new ApexCharts(document.querySelector("#disPorDias"), options);

    chart.render();
  });
}

function reporteDocumentos() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "InformacionMapas.php",
    data: {
      accion: "ReporteDocumentos",
    },
    success: function (result) {
      let sinDiagonal = result.split("//");
      let options = {
        chart: {
          width: "750px",
          type: "bar",
        },
        series: [
          {
            name: "Folios",
            data: [
              JSON.parse(sinDiagonal[0]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[2]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[4]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[6]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[8]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[10]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[12]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[14]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[16]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[18]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[20]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[22]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[24]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[26]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[28]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[30]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[32]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[34]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[36]).Documentos[0].conteo,
              JSON.parse(sinDiagonal[38]).Documentos[0].conteo,
            ],
          },
        ],
        labels: [
          sinDiagonal[1],
          sinDiagonal[3],
          sinDiagonal[5],
          sinDiagonal[7],
          sinDiagonal[9],
          sinDiagonal[11],
          sinDiagonal[13],
          sinDiagonal[15],
          sinDiagonal[17],
          sinDiagonal[19],
          sinDiagonal[21],
          sinDiagonal[23],
          sinDiagonal[25],
          sinDiagonal[27],
          sinDiagonal[29],
          sinDiagonal[31],
          sinDiagonal[33],
          sinDiagonal[35],
          sinDiagonal[37],
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
}
function porcentajeDocs() {
  $.ajax({
    method: "post",
    url: rutaInicial + "InformacionMapas.php",
    dataType: "json",
    data: {
      accion: "PorcentajeDocs",
    },
    success: function (result) {
      let de0A20Conteo = 0;
      let de20A40Conteo = 0;
      let de40A60Conteo = 0;
      let de60A80Conteo = 0;
      let de80A100Conteo = 0;
      for (let i in result.Documentos) {
        if (
          result.Documentos[i].porcentajeDocs >= 0 &&
          result.Documentos[i].porcentajeDocs < 20
        ) {
          de0A20Conteo = result.Documentos[i].conteo;
        } else if (
          result.Documentos[i].porcentajeDocs >= 20 &&
          result.Documentos[i].porcentajeDocs < 40
        ) {
          de20A40Conteo = result.Documentos[i].conteo;
        } else if (
          result.Documentos[i].porcentajeDocs >= 40 &&
          result.Documentos[i].porcentajeDocs < 60
        ) {
          de40A60Conteo = result.Documentos[i].conteo;
        } else if (
          result.Documentos[i].porcentajeDocs >= 60 &&
          result.Documentos[i].porcentajeDocs < 80
        ) {
          de60A80Conteo = result.Documentos[i].conteo;
        } else if (
          result.Documentos[i].porcentajeDocs >= 80 &&
          result.Documentos[i].porcentajeDocs <= 100
        ) {
          de80A100Conteo = result.Documentos[i].conteo;
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
            data: [
              de0A20Conteo,
              de20A40Conteo,
              de40A60Conteo,
              de60A80Conteo,
              de80A100Conteo,
            ],
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
    },
  });
}
function porcentajeTotal() {
  $.ajax({
    method: "post",
    url: rutaInicial + "InformacionMapas.php",
    dataType: "json",
    data: {
      accion: "PorcentajeTotal",
    },
    success: function (result) {
      console.log(result);
      let de0A20Conteo = 0;
      let de20A40Conteo = 0;
      let de40A60Conteo = 0;
      let de60A80Conteo = 0;
      let de80A100Conteo = 0;
      for (let i in result.Documentos) {
        console.log(result.Documentos[i].conteo);
        if (
          result.Documentos[i].porcentajeTotal >= 0 &&
          result.Documentos[i].porcentajeTotal < 20
        ) {
          de0A20Conteo = result.Documentos[i].conteo;
        } else if (
          result.Documentos[i].porcentajeTotal >= 20 &&
          result.Documentos[i].porcentajeTotal < 40
        ) {
          de20A40Conteo = result.Documentos[i].conteo;
        } else if (
          result.Documentos[i].porcentajeTotal >= 40 &&
          result.Documentos[i].porcentajeTotal < 60
        ) {
          de40A60Conteo = result.Documentos[i].conteo;
        } else if (
          result.Documentos[i].porcentajeTotal >= 60 &&
          result.Documentos[i].porcentajeTotal < 80
        ) {
          de60A80Conteo = result.Documentos[i].conteo;
        } else if (
          result.Documentos[i].porcentajeTotal >= 80 &&
          result.Documentos[i].porcentajeTotal <= 100
        ) {
          de80A100Conteo = result.Documentos[i].conteo;
        }
      }
      let options = {
        chart: {
          width: "650px",
          type: "bar",
        },
        series: [
          {
            name: "Procentaje Total",
            data: [
              de0A20Conteo,
              de20A40Conteo,
              de40A60Conteo,
              de60A80Conteo,
              de80A100Conteo,
            ],
          },
        ],
        labels: ["0 a 20%", "20 a 40%", "40 a 60%", "60 a 80%", "80 a 100%"],
        title: {
          text: "Porcentaje Total",
          style: {
            fontSize: "30px",
            align: "center",
          },
        },
      };

      let chart = new ApexCharts(
        document.querySelector("#porcentajeTotal"),
        options
      );

      chart.render();
    },
  });
}
$(document).ready(() => {
  datosMapa();
  foliosArea();
  estatusSeguimiento();
  asignadosEntregados();
  foliosFechas();
  reporteDocumentos();
  porcentajeDocs();
  porcentajeTotal();
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

function casosRegiones() {
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
}
