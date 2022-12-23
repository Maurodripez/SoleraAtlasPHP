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
$(document).ready(() => {
  datosMapa();
  foliosArea();
  estatusSeguimiento();
  asignadosEntregados();
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
function asignadosEntregados() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "InformacionMapas.php",
    data: {
      accion: "Asignados",
    },
    success: function (result) {
      console.log(result);
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
          console.log(data);
          let sinDiagonal2 = data.split("//");
          console.log(sinDiagonal2[0]);
          let mes012 = JSON.parse(sinDiagonal2[0]);
          let mes22 = JSON.parse(sinDiagonal2[1]);
          let mes32 = JSON.parse(sinDiagonal2[2]);
          let mes42 = JSON.parse(sinDiagonal2[3]);
          let mes52 = JSON.parse(sinDiagonal2[4]);
          let mes62 = JSON.parse(sinDiagonal2[5]);
          let mes72 = JSON.parse(sinDiagonal2[6]);
          let mes82 = JSON.parse(sinDiagonal2[7]);
          let mes92 = JSON.parse(sinDiagonal2[8]);
          let mes102 = JSON.parse(sinDiagonal2[9]);
          let mes112 = JSON.parse(sinDiagonal2[10]);
          let mes122 = JSON.parse(sinDiagonal2[11]);
          let options = {
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
                  mes12.Siniestros[0].conteo,
                  mes11.Siniestros[0].conteo,
                  mes10.Siniestros[0].conteo,
                  mes9.Siniestros[0].conteo,
                  mes8.Siniestros[0].conteo,
                  mes7.Siniestros[0].conteo,
                  mes6.Siniestros[0].conteo,
                  mes5.Siniestros[0].conteo,
                  mes4.Siniestros[0].conteo,
                  mes3.Siniestros[0].conteo,
                  mes2.Siniestros[0].conteo,
                  mes1.Siniestros[0].conteo,
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
                mes12.Siniestros[0].mes,
                mes11.Siniestros[0].mes,
                mes10.Siniestros[0].mes,
                mes9.Siniestros[0].mes,
                mes8.Siniestros[0].mes,
                mes7.Siniestros[0].mes,
                mes6.Siniestros[0].mes,
                mes5.Siniestros[0].mes,
                mes4.Siniestros[0].mes,
                mes3.Siniestros[0].mes,
                mes2.Siniestros[0].mes,
                mes1.Siniestros[0].mes,
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
$(document).ready(function () {
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
