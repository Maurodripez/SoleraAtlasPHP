//se llama a la funcion cundo carga la pagina
//funcion para obtener los siniestros por estdos y cambior los colores en el mapa de la repyublica
window.addEventListener("load", function () {
  mostrarMovimientos();
  $.ajax({
    method: "POST",
    url: "../MostrarDatosMapas",
    data: {
      consulta: "cambioColores",
    },
    success: function (result) {
      let cont = 0;
      let sinComas = result.split(",");
      let sinEspacios;
      sinComas.forEach((element) => {
        cont += 1;
      });
      for (let i = 0; i < cont - 1; i += 2) {
        if (sinComas[i + 1] < 6) {
          sinEspacios = sinComas[i].replace(/\s+/g, "");
          //se quitan los espacios de toda la cadena
          document
            .getElementById(sinEspacios.toLowerCase())
            .setAttribute("fill", "#00FF04");
        } else if (sinComas[i + 1] < 11) {
          sinEspacios = sinComas[i].replace(/\s+/g, "");
          document
            .getElementById(sinEspacios.toLowerCase())
            .setAttribute("fill", "#FDCB00");
        }
      }
    },
  });
});
window.addEventListener("load", function () {
  $.ajax({
    method: "POST",
    url: "../MostrarDatosMapas",
    data: {
      consulta: "resultadosEstacion",
    },
    success: function (result) {},
  });
});
function buscarDatos() {
  txtFechaCarga = document.getElementById("txtFechaCarga").value;
  if (txtFechaCarga == "Selecciona...") {
    txtFechaCarga = "";
  }
  txtEstacion = document.getElementById("txtEstacion").value;
  if (txtEstacion == "Selecciona...") {
    txtEstacion = "";
  }
  txtEstatus = document.getElementById("txtEstatus").value;
  if (txtEstatus == "Selecciona...") {
    txtEstatus = "";
  }
  txtSubEstatus = document.getElementById("txtSubEstatus").value;
  if (txtSubEstatus == "Selecciona...") {
    txtSubEstatus = "";
  }
  txtFechaSeguimiento = document.getElementById("txtFechaSeguimiento").value;
  if (txtFechaSeguimiento == "Selecciona...") {
    txtFechaSeguimiento = "";
  }
  txtRegion = document.getElementById("txtRegion").value;
  if (txtRegion == "Todos-Ninguna") {
    txtRegion = "";
  }
  txtEstado = document.getElementById("txtEstado").value;
  if (txtEstado == "Selecciona...") {
    txtEstado = "";
  }
  txtCobertura = document.getElementById("txtCobertura").value;
  if (txtCobertura == "Selecciona...") {
    txtCobertura = "";
  }
  $.ajax({
    url: "../ControladorMostrarDatos",
    data: {
      fechaCarga: txtFechaCarga,
      estacion: txtEstacion,
      estatus: txtEstatus,
      subEstatus: txtSubEstatus,
      fechaSeguimiento: txtFechaSeguimiento,
      region: txtRegion,
      estado: txtEstado,
      cobertura: txtCobertura,
    },
    success: function (result) {
      $("#mostrarTablaDatos").html(result);
    },
  });
}
window.addEventListener("load", function CartasEstacion() {
  $.ajax({
    method: "POST",
    url: "../DatosReporte",
    data: {
      accion: "InfoCartas",
    },
    success: function (result) {
      let sinComas = result.split(",");
      let cantSiniestro;
      for (let i = 1; i < sinComas.length; i = i + 2) {
        if (sinComas[i - 1] > 0) {
          //se hace para hacer el calculo del procentaje de cada caso
          cantSiniestro = sinComas[i - 1];
          sinComas[i - 1] =
            (sinComas[i - 1] * 100) / sinComas[sinComas.length - 1];
        }
        switch (sinComas[i]) {
          case "Nuevo":
            $("#nuevo").html(sinComas[i - 1] + "%");
            break;
          case "Marcacion":
            $("#marcacion").html(sinComas[i - 1] + "%");
            break;
          case "Proceso":
            $("#proceso").html(sinComas[i - 1] + "%");
            break;
          case "Cancelado":
            $("#cancelado").html(sinComas[i - 1] + "%");
            $("#canceladoTotal").html("Casos: " + cantSiniestro);
            break;
          case "Terminado":
            $("#terminado").html(sinComas[i - 1] + "%");
            $("#canceladoTotal").html("Casos: " + cantSiniestro);
            break;
        }
      }
    },
  });
});
$(document).ready(function () {
  $(".calendario").datepicker({
    timepicker: false,
    datepicker: true,
    format: "yyyy-mm-dd",
    value: "2022-09-14",
    weeks: true,
  });
  //mostrar en tiempo real la grafica de folios//
  $.ajax({
    method: "POST",
    url: "../DatosReporte",
    data: {
      accion: "InfoCartas",
    },
    success: function (result) {
      let sinComas;
      let nuevoP = 0;
      let nuevoC = 0;
      let marcacionP = 0;
      let marcacionC = 0;
      let procesoP = 0;
      let procesoC = 0;
      let terminadoP = 0;
      let terminadoC = 0;
      let canceladoP = 0;
      let canceladoC = 0;
      let porcentaje;
      sinComas = result.split(",");

      for (let i = 1; i < sinComas.length; i = i + 2) {
        //se hace para hacer el calculo del procentaje de cada caso
        porcentaje = (sinComas[i - 1] * 100) / sinComas[sinComas.length - 1];
        switch (sinComas[i]) {
          case "Nuevo":
            nuevoC = sinComas[i - 1];
            $("#nuevo").html("Casos: " + nuevoC);
            nuevoP = porcentaje + "%";
            break;
          case "Marcacion":
            marcacionC = sinComas[i - 1];
            $("#marcacion").html("Casos: " + marcacionC);
            marcacionP = porcentaje + "%";
            break;
          case "Proceso":
            procesoC = sinComas[i - 1];
            $("#proceso").html("Casos: " + procesoC);
            procesoP = porcentaje + "%";
            break;
          case "Cancelado":
            canceladoC = sinComas[i - 1];
            $("#canceladoTotal").html("Casos: " + canceladoC);
            canceladoP = porcentaje + "%";
            break;
          case "Terminado":
            terminadoC = sinComas[i - 1];
            $("#terminado").html("Casos: " + terminadoC);
            terminadoP = porcentaje + "%";
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
            data: [procesoC, nuevoC, marcacionC, terminadoC, canceladoC],
          },
        ],
        labels: [
          "Proceso: " + procesoP + "",
          "Nuevo: " + nuevoP + "",
          "Marcacion: " + marcacionP + "",
          "Facturado: " + terminadoP + "",
          "Cancelado: " + canceladoP + "",
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
    },
  });

  //grafica dona//
  $.ajax({
    method: "POST",
    url: "../DatosReporte",
    data: {
      accion: "InfoCartas",
    },
    success: function (result) {
      let sinComas;
      let nuevoP = 0;
      let nuevoC = 0;
      let marcacionP = 0;
      let marcacionC = 0;
      let procesoP = 0;
      let procesoC = 0;
      let terminadoP = 0;
      let terminadoC = 0;
      let canceladoP = 0;
      let canceladoC = 0;
      let porcentaje;
      sinComas = result.split(",");

      for (let i = 1; i < sinComas.length; i = i + 2) {
        //se hace para hacer el calculo del procentaje de cada caso
        porcentaje = (sinComas[i - 1] * 100) / sinComas[sinComas.length - 1];
        switch (sinComas[i]) {
          case "Nuevo":
            nuevoC = sinComas[i - 1];
            $("#nuevo").html("Casos: " + nuevoC);
            nuevoP = porcentaje;
            break;
          case "Marcacion":
            marcacionC = sinComas[i - 1];
            $("#marcacion").html("Casos: " + marcacionC);
            marcacionP = porcentaje;
            break;
          case "Proceso":
            procesoC = sinComas[i - 1];
            $("#proceso").html("Casos: " + procesoC);
            procesoP = porcentaje;
            break;
          case "Cancelado":
            canceladoC = sinComas[i - 1];
            $("#canceladoTotal").html("Casos: " + canceladoC);
            canceladoP = porcentaje;
            break;
          case "Terminado":
            terminadoC = sinComas[i - 1];
            $("#terminado").html("Casos: " + terminadoC);
            terminadoP = porcentaje;
            break;
        }
      }
      let options = {
        series: [procesoP, nuevoP, marcacionP, terminadoP, canceladoP],
        chart: {
          width: 600,
          type: "donut",
        },
        labels: [
          "Proceso: " + procesoC + "",
          "Nuevo: " + nuevoC + "",
          "Marcacion: " + marcacionC + "",
          "Facturado: " + terminadoC + "",
          "Cancelado: " + canceladoC + "",
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
      };

      let chart = new ApexCharts(document.querySelector("#folioDona"), options);
      chart.render();
    },
  });
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
    document.getElementById("fechaInicioUsuarios").value != '' &&
    document.getElementById("fechaFinalUsuarios").value != ''
  ) {
    $.ajax({
      method: "POST",
      url: "../exportar",
      data: {
        accion: "exportarUsuarios",
        fechaInicio:document.getElementById("fechaInicioUsuarios").value,
        fechaFinal:document.getElementById("fechaFinalUsuarios").value,
      },
    }).done(function (result) {
      console.log(result);
      let descarga = document.getElementById("btnDescargarExcel");
      descarga.click();
    });
  }else{
    alert("Por favor, selecciona fechas correctas");
  }
}
