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
      fechaCargaInicio: document.getElementById("fechaCargaInicio").value,
      fechaCargaFinal: document.getElementById("fechaCargaFinal").value,
      estacion: document.getElementById("txtEstacion").value,
      estatus: document.getElementById("txtEstatus").value,
      subEstatus: document.getElementById("txtSubEstatus").value,
      fechaSeguimientoInicio: document.getElementById("fechaSeguimientoInicio")
        .value,
      fechaSeguimientoFinal: document.getElementById("fechaSeguimientoFinal")
        .value,
      region: document.getElementById("txtRegion").value,
      estado: document.getElementById("txtEstado").value,
      cobertura: document.getElementById("txtCobertura").value,
    },
  }).done(function (result) {
    for (let i in result.Estados) {
      if (result.Estados[i].estado === "Ciudad de Mexico") {
        if (result.Estados[i].cantidad <= 4) {
          document.getElementById("cdmx").setAttribute("fill", "#00FF04");
        } else if (result.Estados[i].cantidad >= 5) {
          document.getElementById("cdmx").setAttribute("fill", "#00FF04");
        }
      }
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
      fechaCargaInicio: document.getElementById("fechaCargaInicio").value,
      fechaCargaFinal: document.getElementById("fechaCargaFinal").value,
      estacion: document.getElementById("txtEstacion").value,
      estatus: document.getElementById("txtEstatus").value,
      subEstatus: document.getElementById("txtSubEstatus").value,
      fechaSeguimientoInicio: document.getElementById("fechaSeguimientoInicio")
        .value,
      fechaSeguimientoFinal: document.getElementById("fechaSeguimientoFinal")
        .value,
      region: document.getElementById("txtRegion").value,
      estado: document.getElementById("txtEstado").value,
      cobertura: document.getElementById("txtCobertura").value,
    },
    success: function (result) {
      let primera;
      let segunda;
      let tercera;
      let cuarta;
      let titulo1;
      let titulo2;
      let titulo3;
      let titulo4;
      let totalSiniestros = 0;
      for (let i in result.Estacion) {
        totalSiniestros += parseInt(result.Estacion[i].conteo);
      }
      try {
        document.getElementById("canceladoPorcentaje").textContent =
          ((result.Estacion[0].conteo / totalSiniestros) * 100).toFixed(2) +
          "%";
      } catch (error) {
        document.getElementById("canceladoPorcentaje").textContent = 0;
      }
      try {
        document.getElementById("procesoPorcentaje").textContent =
          ((result.Estacion[1].conteo / totalSiniestros) * 100).toFixed(2) +
          "%";
      } catch (error) {
        document.getElementById("procesoPorcentaje").textContent = 0;
      }
      try {
        document.getElementById("nuevoPorcentaje").textContent =
          ((result.Estacion[2].conteo / totalSiniestros) * 100).toFixed(2) +
          "%";
      } catch (error) {
        document.getElementById("nuevoPorcentaje").textContent = 0;
      }
      try {
        document.getElementById("terminadoPorcentaje").textContent =
          ((result.Estacion[3].conteo / totalSiniestros) * 100).toFixed(2) +
          "%";
      } catch (error) {
        document.getElementById("terminadoPorcentaje").textContent = 0;
      }
      try {
        document.getElementById("nuevo").textContent =
          result.Estacion[2].conteo;
      } catch (error) {
        document.getElementById("nuevo").textContent = 0;
      }
      try {
        document.getElementById("proceso").textContent =
          result.Estacion[1].conteo;
      } catch (error) {
        document.getElementById("proceso").textContent = 0;
      }
      try {
        document.getElementById("cancelado").textContent =
          result.Estacion[0].conteo;
      } catch (error) {
        document.getElementById("cancelado").textContent = 0;
      }
      try {
        document.getElementById("terminado").textContent =
          result.Estacion[3].conteo;
      } catch (error) {
        document.getElementById("terminado").textContent = 0;
      }
      let existeCancelado = false;
      let existeSeguimiento = false;
      let existeNuevo = false;
      let existeTerminado = false;
      for (let i in result.Estacion) {
        if (result.Estacion[i].estacionProceso === "Cancelado") {
          primera = result.Estacion[i].conteo;
          existeCancelado = true;
          titulo1 = result.Estacion[i].estacionProceso;
        } else if (result.Estacion[i].estacionProceso === "En seguimiento") {
          segunda = result.Estacion[i].conteo;
          titulo2 = result.Estacion[i].estacionProceso;
          existeSeguimiento = true;
        } else if (result.Estacion[i].estacionProceso === "Nuevo") {
          tercera = result.Estacion[i].conteo;
          titulo3 = result.Estacion[i].estacionProceso;
          existeNuevo = true;
        } else if (result.Estacion[i].estacionProceso === "Terminado") {
          cuarta = result.Estacion[i].conteo;
          titulo4 = result.Estacion[i].estacionProceso;
          existeTerminado = true;
        }
      }
      if (existeCancelado === false) {
        titulo1 = "Cancelado";
        primera = 0;
      }
      if (existeSeguimiento === false) {
        titulo2 = "En seguimiento";
        segunda = 0;
      }
      if (existeNuevo === false) {
        titulo3 = "Nuevo";
        tercera = 0;
      }
      if (existeTerminado === false) {
        titulo4 = "Terminado";
        cuarta = 0;
      }
      let options = {
        colors: ["#605ca8", "#605ca8", "#605ca8", "#605ca8"],
        chart: {
          type: "bar",
        },
        series: [
          {
            name: "Folios",
            data: [
              parseInt(primera),
              parseInt(segunda),
              parseInt(tercera),
              parseInt(cuarta),
            ],
          },
        ],
        labels: [titulo1, titulo2, titulo3, titulo4],
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
        colors: ["#605ca8", "#605ca8", "#605ca8", "#605ca8"],
        series: [
          parseInt(primera),
          parseInt(segunda),
          parseInt(tercera),
          parseInt(cuarta),
        ],
        chart: {
          width: 600,
          type: "donut",
        },
        labels: [titulo1, titulo2, titulo3, titulo4],
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
function valores() {
  let data = new FormData();
  data.append("accion", "ValoresFiltro");
  data.append(
    "fechaCargaInicio",
    document.getElementById("fechaCargaInicio").value
  );
  data.append(
    "fechaCargaFinal",
    document.getElementById("fechaCargaFinal").value
  );
  data.append(
    "fechaSeguimientoInicio",
    document.getElementById("fechaSeguimientoInicio").value
  );
  data.append(
    "fechaSeguimientoFinal",
    document.getElementById("fechaSeguimientoFinal").value
  );
  fetch(rutaInicial + "InformacionMapas.php", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((result) => {
      console.log(result);
      const meses = new Map([
        ["January", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["February", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["March", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["April", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["May", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["June", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["July", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["August", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["September", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["October", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["November", { valorIndemnizacion: 0, valorComercial: 0 }],
        ["December", { valorIndemnizacion: 0, valorComercial: 0 }],
      ]);
      for (let i in result.Valores) {
        meses.set(result.Valores[i].mes, {
          valorIndemnizacion: result.Valores[i].valorIndemnizacion,
          valorComercial: result.Valores[i].valorComercial,
        });
      }
      console.log(meses);
      options = {
        series: [
          {
            name: "Valor comercial",
            data: [
              meses.get("January").valorComercial,
              meses.get("February").valorComercial,
              meses.get("March").valorComercial,
              meses.get("April").valorComercial,
              meses.get("May").valorComercial,
              meses.get("June").valorComercial,
              meses.get("July").valorComercial,
              meses.get("August").valorComercial,
              meses.get("September").valorComercial,
              meses.get("October").valorComercial,
              meses.get("November").valorComercial,
              meses.get("December").valorComercial,
            ],
          },
          {
            name: "Valor indemnizacion",
            data: [
              meses.get("January").valorIndemnizacion,
              meses.get("February").valorIndemnizacion,
              meses.get("March").valorIndemnizacion,
              meses.get("April").valorIndemnizacion,
              meses.get("May").valorIndemnizacion,
              meses.get("June").valorIndemnizacion,
              meses.get("July").valorIndemnizacion,
              meses.get("August").valorIndemnizacion,
              meses.get("September").valorIndemnizacion,
              meses.get("October").valorIndemnizacion,
              meses.get("November").valorIndemnizacion,
              meses.get("December").valorIndemnizacion,
            ],
          },
        ],
        colors: ["#605ca8", "#605ca8"],
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
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
          ],
        },
      };

      let chart = new ApexCharts(
        document.querySelector("#graficaValores"),
        options
      );
      chart.render();
      chart.render();
    })
    .catch((error) => {
      alert("Ha ocurrido un error");
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
      fechaCargaInicio: document.getElementById("fechaCargaInicio").value,
      fechaCargaFinal: document.getElementById("fechaCargaFinal").value,
      estacion: document.getElementById("txtEstacion").value,
      estatus: document.getElementById("txtEstatus").value,
      subEstatus: document.getElementById("txtSubEstatus").value,
      fechaSeguimientoInicio: document.getElementById("fechaSeguimientoInicio")
        .value,
      fechaSeguimientoFinal: document.getElementById("fechaSeguimientoFinal")
        .value,
      region: document.getElementById("txtRegion").value,
      estado: document.getElementById("txtEstado").value,
      cobertura: document.getElementById("txtCobertura").value,
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
      //console.log(result);
      //quitamos la ultima coma para poder traer los resultados correctos
      let options = {
        colors: [
          "#605ca8",
          "#605ca8",
          "#605ca8",
          "#605ca8",
          "#605ca8",
          "#605ca8",
          "#605ca8",
          "#605ca8",
          "#605ca8",
          "#605ca8",
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
  let data = new FormData();
  data.append("accion", "Asignados");
  data.append(
    "fechaCargaInicio",
    document.getElementById("fechaCargaInicio").value
  );
  data.append(
    "fechaCargaFinal",
    document.getElementById("fechaCargaFinal").value
  );
  data.append(
    "fechaSeguimientoInicio",
    document.getElementById("fechaSeguimientoInicio").value
  );
  data.append(
    "fechaSeguimientoFinal",
    document.getElementById("fechaSeguimientoFinal").value
  );
  fetch(rutaInicial + "InformacionMapas.php", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((result) => {
      //console.log(result);
      const meses = new Map([
        ["January", { asignados: 0, entregados: 0 }],
        ["February", { asignados: 0, entregados: 0 }],
        ["March", { asignados: 0, entregados: 0 }],
        ["April", { asignados: 0, entregados: 0 }],
        ["May", { asignados: 0, entregados: 0 }],
        ["June", { asignados: 0, entregados: 0 }],
        ["July", { asignados: 0, entregados: 0 }],
        ["August", { asignados: 0, entregados: 0 }],
        ["September", { asignados: 0, entregados: 0 }],
        ["October", { asignados: 0, entregados: 0 }],
        ["November", { asignados: 0, entregados: 0 }],
        ["December", { asignados: 0, entregados: 0 }],
      ]);
      for (let i in result.Valores) {
        meses.set(result.Valores[i].mes, {
          asignados: result.Valores[i].asignados,
          entregados: result.Valores[i].entregados,
        });
      }
      //console.log(meses);
      // console.log(meses.get("October").asignados);
      options = {
        series: [
          {
            name: "Asignados",
            data: [
              parseInt(meses.get("January").asignados),
              parseInt(meses.get("February").asignados),
              parseInt(meses.get("March").asignados),
              parseInt(meses.get("April").asignados),
              parseInt(meses.get("May").asignados),
              parseInt(meses.get("June").asignados),
              parseInt(meses.get("July").asignados),
              parseInt(meses.get("August").asignados),
              parseInt(meses.get("September").asignados),
              parseInt(meses.get("October").asignados),
              parseInt(meses.get("November").asignados),
              parseInt(meses.get("December").asignados),
            ],
          },
          {
            name: "Entregados",
            data: [
              parseInt(meses.get("January").entregados),
              parseInt(meses.get("February").entregados),
              parseInt(meses.get("March").entregados),
              parseInt(meses.get("April").entregados),
              parseInt(meses.get("May").entregados),
              parseInt(meses.get("June").entregados),
              parseInt(meses.get("July").entregados),
              parseInt(meses.get("August").entregados),
              parseInt(meses.get("September").entregados),
              parseInt(meses.get("October").entregados),
              parseInt(meses.get("November").entregados),
              parseInt(meses.get("December").entregados),
            ],
          },
        ],
        colors: ["#605ca8", "#605ca8"],
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
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
          ],
        },
      };

      let chart = new ApexCharts(
        document.querySelector("#foliosEntregados"),
        options
      );
      chart.render();
      chart.render();
    })
    .catch((error) => {
      alert("Ha ocurrido un error");
    });
}
function foliosFechas() {
  $.ajax({
    method: "POST",
    url: rutaInicial + "InformacionMapas.php",
    data: {
      accion: "FoliosFechas",
      fechaCargaInicio: document.getElementById("fechaCargaInicio").value,
      fechaCargaFinal: document.getElementById("fechaCargaFinal").value,
      estacion: document.getElementById("txtEstacion").value,
      estatus: document.getElementById("txtEstatus").value,
      subEstatus: document.getElementById("txtSubEstatus").value,
      fechaSeguimientoInicio: document.getElementById("fechaSeguimientoInicio")
        .value,
      fechaSeguimientoFinal: document.getElementById("fechaSeguimientoFinal")
        .value,
      region: document.getElementById("txtRegion").value,
      estado: document.getElementById("txtEstado").value,
      cobertura: document.getElementById("txtCobertura").value,
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
      colors: ["#605ca8"],
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
      fechaCargaInicio: document.getElementById("fechaCargaInicio").value,
      fechaCargaFinal: document.getElementById("fechaCargaFinal").value,
      estacion: document.getElementById("txtEstacion").value,
      estatus: document.getElementById("txtEstatus").value,
      subEstatus: document.getElementById("txtSubEstatus").value,
      fechaSeguimientoInicio: document.getElementById("fechaSeguimientoInicio")
        .value,
      fechaSeguimientoFinal: document.getElementById("fechaSeguimientoFinal")
        .value,
      region: document.getElementById("txtRegion").value,
      estado: document.getElementById("txtEstado").value,
      cobertura: document.getElementById("txtCobertura").value,
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
        colors: ["#605ca8", "#605ca8", "#605ca8", "#605ca8", "#605ca8"],
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
      fechaCargaInicio: document.getElementById("fechaCargaInicio").value,
      fechaCargaFinal: document.getElementById("fechaCargaFinal").value,
      estacion: document.getElementById("txtEstacion").value,
      estatus: document.getElementById("txtEstatus").value,
      subEstatus: document.getElementById("txtSubEstatus").value,
      fechaSeguimientoInicio: document.getElementById("fechaSeguimientoInicio")
        .value,
      fechaSeguimientoFinal: document.getElementById("fechaSeguimientoFinal")
        .value,
      region: document.getElementById("txtRegion").value,
      estado: document.getElementById("txtEstado").value,
      cobertura: document.getElementById("txtCobertura").value,
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
        colors: ["#605ca8", "#605ca8", "#605ca8", "#605ca8", "#605ca8"],
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
      fechaCargaInicio: document.getElementById("fechaCargaInicio").value,
      fechaCargaFinal: document.getElementById("fechaCargaFinal").value,
      estacion: document.getElementById("txtEstacion").value,
      estatus: document.getElementById("txtEstatus").value,
      subEstatus: document.getElementById("txtSubEstatus").value,
      fechaSeguimientoInicio: document.getElementById("fechaSeguimientoInicio")
        .value,
      fechaSeguimientoFinal: document.getElementById("fechaSeguimientoFinal")
        .value,
      region: document.getElementById("txtRegion").value,
      estado: document.getElementById("txtEstado").value,
      cobertura: document.getElementById("txtCobertura").value,
    },
    success: function (result) {
      // console.log(result);
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
        colors: ["#605ca8", "#605ca8", "#605ca8", "#605ca8", "#605ca8"],
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
window.addEventListener("load", (event) => {
  document.querySelector("#btnBuscar").addEventListener("click", function (e) {
    datosMapa();
    estatusSeguimiento();
    valores();
    asignadosEntregados();
  });
  //fechas por defecto
  document.getElementById("fechaCargaInicio").value =
    obtenerFechaConvertida(30);
  document.getElementById("fechaCargaFinal").value = obtenerFechaConvertida(0);
  document.getElementById("fechaSeguimientoInicio").value =
    obtenerFechaConvertida(30);
  document.getElementById("fechaSeguimientoFinal").value =
    obtenerFechaConvertida(0);
  datosMapa();
  foliosArea();
  estatusSeguimiento();
  asignadosEntregados();
  valores();
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
function obtenerFechaConvertida(n) {
  const date = new Date();
  date.setDate(date.getDate() - n);
  const pad = (n) => n.toString().padStart(2, "0");

  const yyyy = date.getFullYear(),
    mm = pad(date.getMonth() + 1),
    dd = pad(date.getDate());

  return `${yyyy}-${mm}-${dd}`;
}
