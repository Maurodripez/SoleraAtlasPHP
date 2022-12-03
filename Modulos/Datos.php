<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Datos</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js"
        integrity="sha512-XmZS54be9JGMZjf+zk61JZaLZyjTRgs41JLSmx5QlIP5F+sSGIyzD2eJyxD4K6kGGr7AsVhaitzZ2WTfzpsQzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="../js/jquery-3.6.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    </script>
    <link rel="stylesheet" href="../Desplegables/libs/css/bootstrap-datepicker.css" />
    <script src="../Desplegables/libs/js/bootstrap-datepicker.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/Datos.css">
</head>

<body>
    <?php 
    session_start();
    ?>
    <h1 id="sesionActual" style="display: none"> <?php echo $_SESSION['usuario']; ?></h1>
    <div class="row">
        <div class="col text-left display-6 p-2">
            <nav class="navbar bg-light">
                <div class="container-fluid">
                    <span style="display: none" class="navbar-brand mb-0 h1">Modulo Principal</span>
                </div>
            </nav>
        </div>
        <div class="col-2">
            <form>
                <div class="form-group float-end p-2">
                    <label for="exampleFormControlSelect1">Estado Actual</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Disponible</option>
                        <option>Break</option>
                        <option>Comida</option>
                        <option>Sanitario</option>
                        <option>Supervisor</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <span id="encabezadoDatos" class="navbar-brand mb-0 h1">Seguimiento cedulas seguros Solera</span>
        </div>
    </nav>
    <div class="accordion p-4" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="acordeonPrincipal accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne">
                    Documentos Recibidos
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <div class="mb-3 form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="terminadosBtn" value="terminadosBtn">
                        <label class="form-check-label" for="terminadosBtn">Terminados</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="enSeguimientoBtn" value="enSeguimientoBtn">
                        <label class="form-check-label" for="enSeguimientoBtn">En seguimiento</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="datosIncorrectosBtn"
                            value="datosIncorrectosBtn">
                        <label class="form-check-label" for="datosIncorrectosBtn">datos incorrectos o sin
                            contacto</label>
                    </div>
                    <div class="row">
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne">
                            <div id="card0a2D" class="card 1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="CantidadSiniestros pt-5 col-2">
                                            <h5 style="font-size: 18px" class="card-title">
                                                <div id="de0a2"></div>
                                            </h5>
                                        </div>
                                        <div class="SiniestrosDesglozados col-7">
                                            <ul class="SiniestrosDesglozados list-group">
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    Terminados
                                                    <span id="terminados0a2"
                                                        class="badge bg-primary rounded-pill"></span>
                                                </li>
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    En seguimiento
                                                    <span id="seguimiento0a2"
                                                        class="badge bg-primary rounded-pill">2</span>
                                                </li>
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    Incorrectos / Sin contacto
                                                    <span id="incorrectos0a2"
                                                        class="badge bg-primary rounded-pill">1</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pt-5 col-3">
                                            <!--stroke hace que cambie el color-->
                                            <svg id="svgCardCheck" xmlns="http://www.w3.org/2000/svg" width="60"
                                                height="60" viewBox="0 0 24 24" fill="none" stroke="#605ca8"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-check-square">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="p-0 row">
                                        <p style="text-align:center" class="letrerosDias card-text">
                                            0-2 Dias
                                        </p>
                                    </div>
                                </div>
                                <!--en collapseresultados ligo el boton de la tabla para que al apretar el boton, se muestren los resultados-->
                                <button id="txtBuscar0a2" onclick="busquedaPorDias('0,3')"
                                    class="btnDocumentos btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Documentos</button>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div id="card3a5D" class="card 2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="CantidadSiniestros pt-5 col-2">
                                            <h5 style="font-size: 18px" class="card-title">
                                                <div id="de3a5"></div>
                                            </h5>
                                        </div>
                                        <div class="SiniestrosDesglozados col-7">
                                            <ul class="SiniestrosDesglozados list-group">
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    Terminados
                                                    <span id="terminados3a5"
                                                        class="badge bg-primary rounded-pill">14</span>
                                                </li>
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    En seguimiento
                                                    <span id="seguimiento3a5"
                                                        class="badge bg-primary rounded-pill">2</span>
                                                </li>
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    Incorrectos / Sin contacto
                                                    <span id="incorrectos3a5"
                                                        class="badge bg-primary rounded-pill">1</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pt-5 col-3">
                                            <!--stroke hace que cambie el color-->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                viewBox="0 0 24 24" fill="none" stroke="#605ca8" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-thumbs-up">
                                                <path
                                                    d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="p-0 row">
                                        <p style="text-align:center" class="letrerosDias card-text">
                                            3-5 Dias
                                        </p>
                                    </div>
                                </div>
                                <button id="txtBuscar3a5" onclick="busquedaPorDias('3,6')"
                                    class="btnDocumentos btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Documentos</button>

                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div id="card6a14D" class="card 3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="CantidadSiniestros pt-5 col-2">
                                            <h5 style="font-size: 18px" class="card-title">
                                                <div id="de6a14"></div>
                                            </h5>
                                        </div>
                                        <div class="SiniestrosDesglozados col-7">
                                            <ul class="SiniestrosDesglozados list-group">
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    Terminados
                                                    <span id="terminados6a14"
                                                        class="badge bg-primary rounded-pill"></span>
                                                </li>
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    En seguimiento
                                                    <span id="seguimiento6a14"
                                                        class="badge bg-primary rounded-pill"></span>
                                                </li>
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    Incorrectos / Sin contacto
                                                    <span id="incorrectos6a14"
                                                        class="badge bg-primary rounded-pill"></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pt-5 col-3">
                                            <!--stroke hace que cambie el color-->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                viewBox="0 0 24 24" fill="none" stroke="#605ca8" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-thumbs-down">
                                                <path
                                                    d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17">
                                                </path>
                                            </svg></svg>
                                        </div>
                                    </div>
                                    <div class="p-0 row">
                                        <p style="text-align:center" class="letrerosDias card-text">
                                            6-14 Dias
                                        </p>
                                    </div>
                                </div>
                                <button id="txtBuscar6a14" onclick="busquedaPorDias('6,15')"
                                    class="btnDocumentos btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Documentos</button>

                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div id="cardMas15D" class="card 4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="CantidadSiniestros pt-5 col-2">
                                            <h5 style="font-size: 18px" class="card-title">
                                                <div id="mas15"></div>
                                            </h5>
                                        </div>
                                        <div class="SiniestrosDesglozados col-7">
                                            <ul class="SiniestrosDesglozados list-group">
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    Terminados
                                                    <span id="terminadosmas15"
                                                        class="badge bg-primary rounded-pill"></span>
                                                </li>
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    En seguimiento
                                                    <span id="seguimientomas15"
                                                        class="badge bg-primary rounded-pill"></span>
                                                </li>
                                                <li style="font-size: 13px"
                                                    class="fondodesglozados list-group-item d-flex justify-content-between align-items-center">
                                                    Incorrectos / Sin contacto
                                                    <span id="incorrectosmas15"
                                                        class="badge bg-primary rounded-pill"></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pt-5 col-3">
                                            <!--stroke hace que cambie el color-->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                viewBox="0 0 24 24" fill="none" stroke="#605ca8" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-alert-triangle">
                                                <path
                                                    d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                                </path>
                                                <line x1="12" y1="9" x2="12" y2="13"></line>
                                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="p-0 row">
                                        <p style="text-align:center" class="letrerosDias card-text">
                                            Mas de 15 Dias
                                        </p>
                                    </div>
                                </div>
                                <button id="txtBuscarMas15" onclick="busquedaPorDias('15,60')"
                                    class="btnDocumentos btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Documentos</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="acordeonPrincipal accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseTwo">
                    Formulario de consulta
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <!--inicia el despliegue de opciones-->
                    <div class="row">
                        <div class="col">
                            <div class="btn-group btn-sm dropup-center dropup">
                                <button type="button" class="btn" id="FechaCargaBtn">
                                    <label class="input-group-text fw-bold" for="btnSeleccionaCarga">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="currentColor" class="bi bi-calendar-check p-1" viewBox="0 0 16 16">
                                            <path
                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                        Fecha de Carga
                                    </label>
                                </button>
                                <button id="btnSeleccionaCarga" type="button"
                                    class="btnSeleccionar btn-sm btn dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>Selecciona...</span>
                                </button>
                                <ul id="txtFechaCarga" class="dropdown-menu">
                                    <div class="calendario date col px-md-3">
                                        <label class="input-group-text fw-bold" for="fechaCargaInicio">
                                            Fecha Inicio
                                        </label>
                                        <div class="input-group-sm input-group mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" class="bi bi-calendar-check p-1"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                            <input id="fechaCargaInicio" pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                type="text" class="form-control input-group-append" placeholder="Fecha"
                                                name="txtFechaCarga">
                                        </div>
                                    </div>
                                    <div class="calendario date col px-md-3">
                                        <label class="input-group-text fw-bold" for="fechaCargaFinal">
                                            Fecha Final
                                        </label>
                                        <div class="input-group-sm input-group mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" class="bi bi-calendar-check p-1"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                            <input id="fechaCargaFinal" pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                type="text" class="form-control input-group-append" placeholder="Fecha"
                                                name="txtFechaCarga">
                                        </div>
                                    </div>
                                    <a style="display: none" id="btnDescargarExcel"
                                        href="http://localhost:8080/SoleraWeb/json/siniestros.xls"
                                        download="Reporte.xls">descargar</a>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-plus-square">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                    </svg>
                                    Estacion
                                </label>
                                <select class="filtrosBusqueda form-select" id="txtEstacion">
                                    <option selected>Selecciona...</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Marcacion">Marcacion</option>
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Proceso">Proceso</option>
                                    <option value="Terminado">Terminado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-plus-square">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                    </svg>
                                    Estatus
                                </label>
                                <select class="filtrosBusqueda form-select" id="txtEstatus">
                                    <option selected>Selecciona...</option>
                                    <option value="Con contacto sin documentos">
                                        Con contacto sin documentos
                                    </option>
                                    <option value="Datos incorrectos">Datos incorrectos</option>
                                    <option value="De 1 a 3 documentos">
                                        De 1 a 3 documentos
                                    </option>
                                    <option value="De 4 a 6 documentos">
                                        De 4 a 6 documentos
                                    </option>
                                    <option value="De 7 a 10 documentos">
                                        De 7 a 10 documentos
                                    </option>
                                    <option value="Nuevo2">Nuevo</option>
                                    <option value="Sin Contacto">Sin Contacto</option>
                                    <option value="Sin contacto en 30 dia2">
                                        Sin contacto en 30 dia
                                    </option>
                                    <option value="Total de documentos">
                                        Total de documentos
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-plus-square">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                    </svg>
                                    Subestatus
                                </label>
                                <select class="filtrosBusqueda form-select" id="txtSubEstatus">
                                    <option selected>Selecciona...</option>
                                    <option value="Con contacto. sin documentos, en seguimiento">
                                        Con contacto. sin documentos, en seguimiento
                                    </option>
                                    <option value="Datos incorrectos, Cancelado">
                                        Datos incorrectos, Cancelado
                                    </option>
                                    <option value="De 1 a 3 documento, en seguimiento">
                                        De 1 a 3 documentos, en seguimiento
                                    </option>
                                    <option value="De 4 a 6 documentos en seguimiento">
                                        De 4 a 6 documentos en seguimiento
                                    </option>
                                    <option value="De 7 a 10 documentos en seguimiento">
                                        De 7 a 10 documentos en seguimiento
                                    </option>
                                    <option value="Nuevo, activacion por proceso normal">
                                        Nuevo, activacion por proceso normal
                                    </option>
                                    <option value="Sin Contacto, en seguimiento">
                                        Sin Contacto, en seguimiento
                                    </option>
                                    <option value="Sin contacto en 30 dias, cancelafo">
                                        Sin contacto en 30 dia, cancelado
                                    </option>a
                                    <option value="Total de documentos, terminado">
                                        Total de documentos, terminado
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="btn-group btn-sm dropup-center dropup">
                                <button type="button" class="btn" id="SeleccionaCalendario">
                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="currentColor" class="bi bi-calendar-check p-1" viewBox="0 0 16 16">
                                            <path
                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                        Fecha seguimiento
                                    </label>
                                </button>
                                <button type="button"
                                    class="btnSeleccionar btn-sm btn dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>Selecciona</span>
                                </button>
                                <ul id="txtFechaCarga" class="dropdown-menu">
                                    <div class="calendario date col px-md-3">
                                        <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                            Fecha Inicio
                                        </label>
                                        <div class="input-group-sm input-group mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" class="bi bi-calendar-check p-1"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                            <input id="fechaSegInicio" pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                type="text" class="form-control input-group-append" placeholder="Fecha"
                                                name="txtFechaCarga" readonly>
                                        </div>
                                    </div>
                                    <div class="calendario date col px-md-3">
                                        <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                            Fecha Final
                                        </label>
                                        <div class="input-group-sm input-group mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" class="bi bi-calendar-check p-1"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                            </svg>
                                            <input id="fechaSegFinal" pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                type="text" class="form-control input-group-append" placeholder="Fecha"
                                                name="txtFechaCarga" readonly>
                                        </div>
                                    </div>
                                    <a style="display: none" id="btnDescargarExcel"
                                        href="http://localhost:8080/SoleraWeb/json/siniestros.xls"
                                        download="Reporte.xls">descargar</a>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-plus-square">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                    </svg>
                                    Region
                                </label>
                                <select class="filtrosBusqueda form-select" id="txtRegion">
                                    <option selected>Selecciona...</option>
                                    <option value="Layout ZG A: Guadalajara-Colima-Nayarit">
                                        Layout ZG A: Guadalajara-Colima-Nayarit
                                    </option>
                                    <option value="Layout ZG B: Acapulco-Toluca-Pachuca-Cuernavaca">
                                        Layout ZG B: Acapulco-Toluca-Pachuca-Cuernavaca
                                    </option>
                                    <option value="Layout ZG Layout ZG C: Puebla-Queretaro-Tlaxcala">
                                        Layout ZG Layout ZG C: Puebla-Queretaro-Tlaxcala
                                    </option>
                                    <option value="Layout ZG D: Merida-Cancun-Tuxtla-Villahermosa-Campeche">
                                        Layout ZG D: Merida-Cancun-Tuxtla-Villahermosa-Campeche
                                    </option>
                                    <option
                                        value="Layout ZG E: Leon, San Luis Potosi-Aguascalientes-Morelia-Tamaulipas-Zacatecas">
                                        Layout ZG E: Leon, San Luis
                                        Potosi-Aguascalientes-Morelia-Tamaulipas-Zacatecas
                                    </option>
                                    <option value="Layout ZG F: CDMX-Estado de Mexico">
                                        Layout ZG F: CDMX-Estado de Mexico
                                    </option>
                                    <option value="Layout ZG G: Coatzacualcos-Oaxaca-Veracruz-Xalapa">
                                        Layout ZG G: Coatzacualcos-Oaxaca-Veracruz-Xalapa
                                    </option>
                                    <option value="Layout ZG H: Monterrey">
                                        H: Layout ZG Monterrey
                                    </option>
                                    <option
                                        value="Layout ZG I: Chihuahua-Cd. Juarez-Reynosa-Saltillo-Tampico-Torreon-Nuevo Laredo-Durango">
                                        Layout ZG I: Chihuahua-Cd.
                                        Juarez-Reynosa-Saltillo-Tampico-Torreon-Nuevo
                                        Laredo-Durango
                                    </option>
                                    <option
                                        value="Layout ZG J: Mexicali-Cd. Obregon-Culiacan-Hermosillo-Los Mochis-Tijuana Baja California-Baja California Sur">
                                        Layout ZG J: Mexicali-Cd. Obregon-Culiacan-Hermosillo-Los
                                        Mochis-Tijuana Baja California-Baja California Sur
                                    </option>
                                    <option value="Todos/Ninguno">Todos/Ninguno</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-plus-square">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                    </svg>
                                    Estado
                                </label>
                                <select id="txtEstado" class="filtrosBusqueda form-select" name="txtEstado" required>
                                    <option selected>Selecciona...</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">
                                        Baja California Sur
                                    </option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chiahuahua">Chiahuahua</option>
                                    <option value="Ciudad de Mexico">Ciudad de Mexico</option>
                                    <option value="Coahuila de Zaragoza">
                                        Coahuila de Zaragoza
                                    </option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Guanajato">Guanajato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Estado de Mexico">Estado de Mexico</option>
                                    <option value="Michoacan de Ocampo">
                                        Michoacan de Ocampo
                                    </option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo Leon">Nuevo Leon</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Queretaro">Queretaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis de Potosi<">
                                        San Luis de Potosi
                                    </option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatan">Yucatan</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-plus-square">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <line x1="12" y1="8" x2="12" y2="16"></line>
                                        <line x1="8" y1="12" x2="16" y2="12"></line>
                                    </svg>
                                    Cobertura
                                </label>
                                <select class="filtrosBusqueda form-select" id="txtCobertura">
                                    <option selected>Selecciona...</option>
                                    <option value="DM">DM</option>
                                    <option value="RT">RT</option>
                                    <option value="RC">RC</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnBuscar" onclick="buscarDatos()" type="button" class="btn btn-primary">
                            Buscar
                        </button>
                        <button id="limpiarRegistro" type="button" class="btn btn-primary">
                            Limpiar
                        </button>
                        <a href="../php/descargar.php?file=Siniestros.csv" download="Siniestro.xls" class="btn btn-primary" role="button">Exportar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <!--inicio de la tabla de resultados-->
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="acordeonPrincipal accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree">
                    Tabla de resultados
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse collapseresultados"
                aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                    <!--inicio de acordeon para mostrar tabla de resutlados-->
                    <div class="row">
                        <div class="botoncantidadResultados col-lg-2">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Resultados</option>
                                <option value="1">5</option>
                                <option value="2">10</option>
                                <option value="3">20</option>
                            </select>
                        </div>
                        <div class="col p-2" name="SearchButtonGeneral">
                            <!--se implementa el boton busqueda general-->
                            <form class="form-search float-end">
                                <div class="input-group">
                                    <input id="txtBtnGeneralBuscar"
                                        onkeyup="busquedaFiltro(this.value,'BusquedaGeneral','General')" class="form-control"
                                        placeholder="Buscar" type="text" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <table id="DatosTabla" class="text-center table table-hover col float-end">
                        <thead id="encabezadoTabla">
                            <tr>
                                <th class="encabezadoBtn" scope="col">Editar</th>
                                <th scope="col">Id registro</th>
                                <th scope="col">Siniestro</th>
                                <th scope="col">Poliza</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Numero de Serie</th>
                                <th scope="col">Fecha carga</th>
                                <th scope="col">Estacion</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Estado</th>
                                <th scope="col">% Docs</th>
                                <th scope="col">% Total</th>
                            </tr>
                        </thead>
                        <thead id="seccionBotones">
                            <div class="row">
                                <td>
                                    <div class="col-2" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group"></div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bRegistro" onkeyup="busquedaFiltro(this.value,'Busqueda','idRegistro')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bSiniestro"
                                                    onkeyup="busquedaFiltro(this.value,'Busqueda','numSiniestro')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bPoliza"
                                                    onkeyup="busquedaFiltro(this.value,'Busqueda','poliza')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bMarca" onkeyup="busquedaFiltro(this.value,'Busqueda','marca')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bTipo" onkeyup="busquedaFiltro(this.value,'Busqueda','tipo')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bSerie" onkeyup="busquedaFiltro(this.value,'Busqueda','numSerie')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bCarga" onkeyup="busquedaFiltro(this.value,'Busqueda','fechaCarga')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bEstacion"
                                                    onkeyup="busquedaFiltro(this.value,'Busqueda','estacionProceso')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bEstatus"
                                                    onkeyup="busquedaFiltro(this.value,'Busqueda','estatusOperativo')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bEstado"
                                                    onkeyup="busquedaFiltro(this.value,'Busqueda','estado')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bDocumentos"
                                                    onkeyup="busquedaFiltro(this.value,'Busqueda','porcentajeDocs')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input id="bTotal" onkeyup="busquedaFiltro(this.value,'Busqueda','porcentajeTotal')"
                                                    class="busquedaParticular form-control" maxlength="128"
                                                    placeholder="Buscar" size="15" type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </div>
                        </thead>
                    </table>
                    <p style="display: none" id="paginaActual" name="uno">0</p>
                    <div class="row">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" onclick="cambiarPagina(this.id)" id="botonClickMenos"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" onclick="cambiarPagina()" id="botonClickMas" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Siguiente</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" name="nombreModal" id="despliegueInfo" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Actualiza Cedula SOLERA
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--Botnoes de edtiar-->
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                            checked />
                        <label class="btn" for="btnradio1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>Editar</label>

                        <button type="button" onclick="mostrarDocsAprobados()" id="btnDocsMostrar" class="btn"
                            data-bs-toggle="modal" data-bs-target="#cargaDocumentos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                        </button>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" />
                        <label class="btn btn-outline-primary" for="btnradio3"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                            </svg>Encuesta</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" />
                        <label class="btn btn-outline-primary" for="btnradio4"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg></label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" />
                        <label class="btn btn-outline-primary" for="btnradio5"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                                <path
                                    d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
                                <path
                                    d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                            </svg></label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off" />
                        <label class="btn btn-outline-primary" for="btnradio6">Radio 3</label>
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Estatus historico
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne">
                                <div class="accordion-body">
                                    <!--se crea la tabla para el historico-->
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha de Carga</th>
                                                <th scope="col">Estatus</th>
                                                <th scope="col">Usuario</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ResultadoHistorico">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Expediente
                                </button>
                            </h2>

                            <div id="flush-collapseTwo" class="accordion-collapse collapse show"
                                aria-labelledby="flush-headingTwo">
                                <div class="accordion-body">
                                    <div class="row mx-md-n5">
                                        <div class="calendario date col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Fecha Carga
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-calendar-check p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path
                                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                </svg>
                                                <input id="fechaCarga" pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                    type="text" class="form-control input-group-append"
                                                    placeholder="Fecha" name="txtFechaCarga" readonly>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Siniestro:
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="numSiniestro" type="text" class="form-control"
                                                    name="txtNumSiniestro" readonly>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Poliza:
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="poliza" type="text" class="form-control" name="txtNumPoliza"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Afectado:
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="afectado" type="text" class="form-control"
                                                    name="txtAfectado">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-md-n5">
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Tipo caso:
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <select id="tipoDeCaso" class="form-select" name="txtTipoCaso" required>
                                                    <option selected>
                                                        Selecciona...
                                                    </option>
                                                    <option value="Colision">
                                                        Colision
                                                    </option>
                                                    <option value="Incendio">
                                                        Incendio
                                                    </option>
                                                    <option value="Inundacion">
                                                        Inundacion</option>
                                                    <option value="Robo">Robo
                                                    </option>
                                                    <option value="Otro">Otro
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Cobertura:
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <select id="cobertura" class="form-select" name="txtCobertura" required>
                                                    <option selected>
                                                        Selecciona...
                                                    </option>
                                                    <option value="DM">DM
                                                    </option>
                                                    <option value="RC">RC
                                                    </option>
                                                    <option value="RT">RT
                                                    </option>
                                                    <option value="Otro">Otro
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="calendario date col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Fecha Siniestro
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-calendar-check p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                    <path
                                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                </svg>
                                                <input class="form-control input-group-append" id="fechaSiniestro"
                                                    pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]" name="txtFechaSiniestro"
                                                    type="text" placeholder="Fecha" readonly>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Datos Audatex
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="datosAudatex" type="text" class="form-control"
                                                    name="txtDatosAudatex" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-md-n5">
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Estado
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <select id="estado" class="form-select" name="txtEstado" required>
                                                    <option selected>
                                                        Selecciona...
                                                    </option>
                                                    <option value="Aguascalientes">
                                                        Aguascalientes</option>
                                                    <option value="Baja California">
                                                        Baja
                                                        California</option>
                                                    <option value="Baja California Sur">
                                                        Baja California Sur
                                                    </option>
                                                    <option value="Campeche">
                                                        Campeche
                                                    </option>
                                                    <option value="Chiapas">
                                                        Chiapas
                                                    </option>
                                                    <option value="Chiahuahua">
                                                        Chiahuahua</option>
                                                    <option value="Ciudad de Mexico">
                                                        Ciudad de Mexico
                                                    </option>
                                                    <option value="Coahuila">
                                                        Coahuila
                                                    </option>
                                                    <option value="Colima">
                                                        Colima
                                                    </option>
                                                    <option value="Durango">
                                                        Durango
                                                    </option>
                                                    <option value="Guanajato">
                                                        Guanajato
                                                    </option>
                                                    <option value="Guerrero">
                                                        Guerrero
                                                    </option>
                                                    <option value="Hidalgo">
                                                        Hidalgo
                                                    </option>
                                                    <option value="Jalisco">
                                                        Jalisco
                                                    </option>
                                                    <option value="Estado de Mexico">
                                                        Estado de Mexico
                                                    </option>
                                                    <option value="Michoacan">
                                                        Michoacan
                                                    </option>
                                                    <option value="Morelos">
                                                        Morelos
                                                    </option>
                                                    <option value="Nayarit">
                                                        Nayarit
                                                    </option>
                                                    <option value="Nuevo Leon">
                                                        Nuevo
                                                        Leon</option>
                                                    <option value="Oaxaca">
                                                        Oaxaca
                                                    </option>
                                                    <option value="Puebla">
                                                        Puebla
                                                    </option>
                                                    <option value="Queretaro">
                                                        Queretaro
                                                    </option>
                                                    <option value="Quintana Roo">
                                                        Quintana Roo</option>
                                                    <option value="San Luis Potosi">
                                                        San Luis Potosi
                                                    </option>
                                                    <option value="Sinaloa">
                                                        Sinaloa
                                                    </option>
                                                    <option value="Sonora">
                                                        Sonora
                                                    </option>
                                                    <option value="Tabasco">
                                                        Tabasco
                                                    </option>
                                                    <option value="Tamaulipas">
                                                        Tamaulipas</option>
                                                    <option value="Tlaxcala">
                                                        Tlaxcala
                                                    </option>
                                                    <option value="Veracruz">
                                                        Veracruz
                                                    </option>
                                                    <option value="Yucatan">
                                                        Yucatan
                                                    </option>
                                                    <option value="Zacatecas">
                                                        Zacatecas
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Ciudad:
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <select id="ciudad" class="form-select" name="txtCiudad" required>
                                                    <option selected>
                                                        Selecciona...
                                                    </option>
                                                    <option value="Todos-Ninguna">
                                                        Todos-Ninguna</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Region:
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <select class="form-select" id="region" required>
                                                    <option selected>
                                                        Todos-Ninguna
                                                    </option>
                                                    <option value="Layout ZG A: Guadalajara-Colima-Nayarit">
                                                        Layout ZG A:
                                                        Guadalajara-Colima-Nayarit
                                                    </option>
                                                    <option value="Layout ZG B: Acapulco-Toluca-Pachuca-Cuernavaca">
                                                        Layout ZG B:
                                                        Acapulco-Toluca-Pachuca-Cuernavaca
                                                    </option>
                                                    <option value="Layout ZG Layout ZG C: Puebla-Queretaro-Tlaxcala">
                                                        Layout ZG Layout ZG C:
                                                        Puebla-Queretaro-Tlaxcala
                                                    </option>
                                                    <option
                                                        value="Layout ZG D: Merida-Cancun-Tuxtla-Villahermosa-Campeche">
                                                        Layout ZG D:
                                                        Merida-Cancun-Tuxtla-Villahermosa-Campeche
                                                    </option>
                                                    <option
                                                        value="Layout ZG E: Leon, San Luis Potosi-Aguascalientes-Morelia-Tamaulipas-Zacatecas">
                                                        Layout ZG E: Leon, San Luis
                                                        Potosi-Aguascalientes-Morelia-Tamaulipas-Zacatecas
                                                    </option>
                                                    <option value="Layout ZG F: CDMX-Estado de Mexico">
                                                        Layout ZG F: CDMX-Estado de
                                                        Mexico
                                                    </option>
                                                    <option value="Layout ZG G: Coatzacualcos-Oaxaca-Veracruz-Xalapa">
                                                        Layout ZG G:
                                                        Coatzacualcos-Oaxaca-Veracruz-Xalapa
                                                    </option>
                                                    <option value="Layout ZG H: Monterrey">
                                                        H:
                                                        Layout ZG Monterrey</option>
                                                    <option
                                                        value="Layout ZG I: Chihuahua-Cd. Juarez-Reynosa-Saltillo-Tampico-Torreon-Nuevo Laredo-Durango">
                                                        Layout ZG I: Chihuahua-Cd.
                                                        Juarez-Reynosa-Saltillo-Tampico-Torreon-Nuevo
                                                        Laredo-Durango
                                                    </option>
                                                    <option
                                                        value="Layout ZG J: Mexicali-Cd. Obregon-Culiacan-Hermosillo-Los Mochis-Tijuana Baja California-Baja California Sur">
                                                        Layout ZG J: Mexicali-Cd.
                                                        Obregon-Culiacan-Hermosillo-Los
                                                        Mochis-Tijuana Baja
                                                        California-Baja California Sur
                                                    </option>
                                                    <option value="Todos/Ninguno">
                                                        Todos/Ninguno</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Taller
                                            </label>
                                            <select id="ubicacionTaller" class="form-select" name="txtUbicacionTaller"
                                                required>
                                                <option selected>
                                                    Selecciona...
                                                </option>
                                                <option value="Taller">Taller
                                                </option>
                                                <option value="Auto online">Auto online
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row  mx-md-n5">
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Financiado
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <select id="financiado" class="form-select" name="txtFinanciado"
                                                    required>
                                                    <option selected>
                                                        Selecciona...
                                                    </option>
                                                    <option value="Si">Si
                                                    </option>
                                                    <option value="No">No
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Regimen
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <select id="regimenFiscal" class="form-select" name="txtRegimen"
                                                    required>
                                                    <option selected>
                                                        Selecciona...
                                                    </option>
                                                    <option value="Persona fisica">
                                                        Persona fisica</option>
                                                    <option value="Persona fisica con actividad empresarial">
                                                        Persona fisica con
                                                        actividad empresarial
                                                    </option>
                                                    <option value="Persona moral">
                                                        Persona moral</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Password Externo:
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="passwordExterno" type="text" class="form-control"
                                                    name="txtPassExterno" required>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Estatus
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <select id="estatusCliente" class="form-select" name="txtEstatus"
                                                    required>
                                                    <option selected>
                                                        Selecciona...
                                                    </option>
                                                    <option value="Documento incorrecto">
                                                        Documento incorrecto
                                                    </option>
                                                    <option value="Revision">
                                                        Revision
                                                    </option>
                                                    <option value="Enviado">
                                                        Enviado
                                                    </option>
                                                    <option value="Expediente aprobado">
                                                        Expediente aprobado
                                                    </option>
                                                    <option value="Pendiente">
                                                        Pendiente
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  mx-md-n5">
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="valorComercial">
                                                Valor comercial
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="valorComercial" type="text" class="form-control"
                                                    name="txtValorComercial" required>
                                            </div>
                                        </div>Agente
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="valorIndemnizacion">
                                                Valor indemnización
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="valorIndemnizacion" type="text" class="form-control"
                                                    name="txtValorIndemnizacion" required>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="agente">
                                                Agente
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <input id="agente" type="text" class="form-control" name="txtAgente"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="comentariosCliente">
                                                Comentarios cliente
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <input id="comentariosCliente" type="text" class="form-control"
                                                    name="txtComentariosCliente" id="exampleFormControlInput1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Vehiculo
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse show"
                                aria-labelledby="flush-headingThree">
                                <div class="accordion-body">
                                    <div class="row ">
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Marca
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="marca" type="text" class="form-control"
                                                    name="txtMarcaVehiculo" required />
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Tipo
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="tipo" type="text" class="form-control" name="txtTipoVehiculo"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Año
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="modelo" type="text" class="form-control" name="txtAño" />
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Placas
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="placas" type="text" class="form-control" name="txtPlacas"
                                                    required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                No. Serie
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="numSerie" type="text" class="form-control" name="txtNumSerie"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Valor indemnizacion
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="valIndemnizacion" type="text" class="form-control"
                                                    name="txtValorIndemnizacion" required />
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Valor comercial
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="valComercial" type="text" class="form-control"
                                                    name="txtValorComercial" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFour" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Asegurado
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse show"
                                aria-labelledby="flush-headingFour">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Asegurado
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="asegurado" type="text" class="form-control"
                                                    name="txtAsegurado" required />
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Correo
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="correo" type="text" class="form-control" name="txtCorreo"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Telefono Principal
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="telPrincipal" type="text" class="form-control"
                                                    name="txtTelefono" required />
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Telefono Secundario
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="telSecundario" type="text" class="form-control"
                                                    name="txtTelSecundario" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Contacto
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="contacto" type="text" class="form-control" name="txtContacto"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Correo Contacto
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="correoContacto" type="text" class="form-control"
                                                    name="txtCorreoContato" required />
                                            </div>
                                        </div>
                                        <div class="col px-md-3">
                                            <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                Telefono Contacto
                                            </label>
                                            <div class="input-group-sm input-group mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                </svg>
                                                <input id="telContacto" type="text" class="form-control"
                                                    name="txtTelContacto" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="idOculto" name="idEditableActual" value="" />
                        <!--centrar texto con esta funcion-->
                        <div style="text-align: center">
                            <button id="gDatosBtn" onclick="GuardarRegistros()" class="btn btn-info pt-2 pb-2">
                                Guardar Datos
                            </button>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="txtSegEstatus">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFive" aria-expanded="false"
                                        aria-controls="flush-collapseFive">
                                        Seguimiento estatus
                                    </button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse collapse "
                                    aria-labelledby="flush-headingFive">
                                    <div class="accordion-body">
                                        <table id="tablaSeguimientos"
                                            class="table table-hover col float-end text-center">
                                            <thead>
                                                <tr>
                                                    <th class="col">Usuario</th>
                                                    <th class="col">fecha</th>
                                                    <th class="col">Tipo</th>
                                                    <th class="col-6">Comentario</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <div class="row">
                                            <p style="display: none" id="paginaActualSeg" name="uno">0</p>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li id="btnMenosSeg" class="page-item"><a
                                                            class="page-link">Anterior</a>
                                                    </li>
                                                    <li id="btnMasSeg" class="page-item"><a
                                                            class="page-link">Siguiente</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <div id="datosSeguimiento">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">C</span>
                                                <input id="txtComentSeguimiento" type="text" class="form-control"
                                                    placeholder="Comentarios" aria-label="Username"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            <div class="row">
                                                <div class="col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Estacion
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        <input id="txtEstacionSoloLectura" type="text"
                                                            class="form-control" value="22" readonly>
                                                    </div>
                                                </div>
                                                <div class="col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Estatus Seguimiento
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        <select class="form-select" id="txtEstatusSeguimiento">
                                                            <option selected>Selecciona...
                                                            </option>
                                                            <option
                                                                value="CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)">
                                                                CANCELADO POR ASEGURADORA (DESVIO INTERNO,
                                                                INVESTIGACION,
                                                                POLIZA NO PAGADA)</option>
                                                            <option value="CASO REABIERTO">CASO REABIERTO</option>
                                                            <option value="CON CONTACTO SIN COOPERACION DEL CLIENTE">CON
                                                                CONTACTO SIN COOPERACION DEL CLIENTE</option>
                                                            <option value="CON CONTACTO SIN DOCUMENTOS">CON CONTACTO SIN
                                                                DOCUMENTOS</option>
                                                            <option
                                                                value="CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)">
                                                                CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)
                                                            </option>
                                                            <option value="DATOS INCORRECTOS">DATOS INCORRECTOS</option>
                                                            <option value="DE 1 A 3 DOCUMENTOS">DE 1 A 3 DOCUMENTOS
                                                            </option>
                                                            <option value="DE 4 A 6 DOCUMENTOS">DE 4 A 6 DOCUMENTOS
                                                            </option>
                                                            <option value="DE 7 A 10 DOCUMENTOS">DE 7 A 10 DOCUMENTOS
                                                            </option>
                                                            <option value="NUEVO">NUEVO</option>
                                                            <option value="SIN CONTACTO">SIN CONTACTO</option>
                                                            <option value="SIN CONTACTO EN 30 DIAS">SIN CONTACTO EN 30
                                                                DIAS
                                                            </option>
                                                            <option value="TERMINADO ENTREGA ORIGINALES EN OFICINA">
                                                                TERMINADO ENTREGA ORIGINALES EN OFICINA</option>
                                                            <option value="TERMINADO POR PROCESO COMPLETO">TERMINADO POR
                                                                PROCESO COMPLETO</option>
                                                            <option value="TOTAL DE DOCUMENTOS">TOTAL DE DOCUMENTOS
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Sub estatus
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        <select class="form-select" id="txtSubEstacion">
                                                            <option selected>Selecciona...
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Respuesta Solera
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        <select class="form-select" id="txtRespSolera">
                                                            <option selected>Selecciona...</option>
                                                            <option value="Atendido">Atendido
                                                            </option>
                                                            <option value="No atendido">No atendido
                                                            </option>
                                                            <option value="Visto">Visto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Persona contactada
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        <input id="txtPersContactada" type="text" class="form-control"
                                                            placeholder="Mensaje" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Tipo persona
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        <select class="form-select" id="txtTipoPersona">
                                                            <option selected>Selecciona...</option>
                                                            <option value="Asegurado">Asegurado
                                                            </option>
                                                            <option value="Conocido">Conocido
                                                            </option>
                                                            <option value="Familiar">Familiar
                                                            </option>
                                                            <option value="Sin respuesta">Sin
                                                                respuesta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Contacto
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        <select class="form-select" id="txTipoContacto">
                                                            <option selected>Selecciona...</option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="calendario date col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Primer envio de docs
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-calendar-check p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        <input class="form-control input-group-append"
                                                            id="txtFechaPrimEnvDocs"
                                                            pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                            name="txtFechaTermino" type="text" placeholder="Fecha">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="calendario date col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Integracion de expediente
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-calendar-check p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        <input class="form-control input-group-append"
                                                            id="txtFechaIntExp" pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                            name="txtFechaTermino" type="text" placeholder="Fecha">
                                                    </div>
                                                </div>
                                                <div class="calendario date col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Facturacion de servicio
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-calendar-check p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        <input class="form-control input-group-append"
                                                            id="txtFechaFactServ"
                                                            pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                            name="txtFechaTermino" type="text" placeholder="Fecha">
                                                    </div>
                                                </div>
                                                <div class="calendario date col px-md-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        Fecha Termino
                                                    </label>
                                                    <div class="input-group-sm input-group mb-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-calendar-check p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        <input class="form-control input-group-append"
                                                            id="txtFechaTermino"
                                                            pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                            name="txtFechaTermino" type="text" placeholder="Fecha">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3" style="text-align: center">
                                            <button id="insertarSeguimiento" onclick="InsertarSeguimiento()"
                                                class="btn btn-info">
                                                Insertar seguimiento
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="input-group mb-3 col">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Contacto
                                                    </label>
                                                    <select class="form-select" id="txtIntegrador">
                                                        <option selected>Selecciona...
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <button onclick="asignarIntegrador()" id="btnAsignarIntegrador"
                                                    class="btn btn-primary">
                                                    Asignar integrador
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="cargaDocumentos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            Carga de Documentos
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="progress">
                                <div id="progresoDocsAprobados" class="progress-bar" role="progressbar"
                                    aria-label="Example with label" style="width: 50%; height: 20px" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    100%
                                </div>
                            </div>
                        </div>
                        <div class="accordion p-2" id="documentosAprobadosPanel">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelPFisicas">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelPFisicas-collapseOne" aria-expanded="true"
                                        aria-controls="panelPFisicas-collapseOne">
                                        Documentos aprobados
                                    </button>
                                </h2>
                                <div id="panelPFisicas-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="panelPFisicas-headingOne">
                                    <div class="accordion-body">

                                        <ul class="list-group list-group-flush">
                                            <div class="row">
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxFactura">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Factura original
                                                    </label>
                                                </li>
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxPoder">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Poder notarial
                                                    </label>
                                                </li>
                                            </div>
                                        </ul>
                                        <ul class="list-group list-group-flush">
                                            <div class="row">
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxIdentificacion">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Identificacion oficial
                                                    </label>
                                                </li>
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxSituacion">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Situacion fiscal
                                                    </label>
                                                </li>
                                            </div>
                                        </ul>
                                        <ul class="list-group list-group-flush">
                                            <div class="row">
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxCurp">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Curp
                                                    </label>
                                                </li>
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxEstado">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Estado de cuenta
                                                    </label>
                                                </li>
                                            </div>
                                        </ul>
                                        <ul class="list-group list-group-flush">
                                            <div class="row">
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxTenencia">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Tenencia
                                                    </label>
                                                </li>
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxBaja">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Baja de placas
                                                    </label>
                                                </li>
                                            </div>
                                        </ul>
                                        <ul class="list-group list-group-flush">
                                            <div class="row">
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxTarjeta">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Tarjeta circulacion
                                                    </label>
                                                </li>
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxPoliza">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Poliza
                                                    </label>
                                                </li>
                                            </div>
                                        </ul>
                                        <ul class="list-group list-group-flush">
                                            <div class="row">
                                                <li class="col list-group-item list-group-item-sm">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkboxComprobante">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Comprobante domicilio
                                                    </label>
                                                </li>
                                            </div>
                                            <div class="col-12" style="text-align: center">
                                                <button id="btnDocsAprobados" onclick="guardarDocsAprobados(this.id)"
                                                    type="button" class="mb-3 mt-3 btn btn-primary">Guardar</button>
                                            </div>
                                        </ul>
                                        <div class="col">
                                            <form method="post" enctype="multipart/form-data"
                                                onsubmit="return enviarImagenes()" id="archivoCargado">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <select name="tipoArchivo" class="form-select form-select-sm"
                                                            aria-label="Default select example">
                                                            <option selected>Selecciona...</option>
                                                            <option id="selectFactura" value="Factura original">Factura
                                                                original</option>
                                                            <option id="selectPoder" value="Poder notarial">Poder
                                                                notarial
                                                            </option>
                                                            <option id="selectIdenti" value="Identificacion oficial">
                                                                Identificacion oficial
                                                            </option>
                                                            <option id="selectConstancia" value="Constancia SF">
                                                                Constancia
                                                                SF</option>
                                                            <option id="selectCurp" value="Curp">Curp</option>
                                                            <option id="selectEstado" value="Estado de cuenta">Estado de
                                                                cuenta</option>
                                                            <option id="selectTenencia" value="Tenencias">Tenencias
                                                            </option>
                                                            <option id="selectbaja" value="Baja de placas">Baja de
                                                                placas
                                                            </option>
                                                            <option id="selectTarjeta" value="Tarjeta de circulacion">
                                                                Tarjeta de circulacion
                                                            </option>
                                                            <option id="selectPoliza" value="Poliza">Poliza</option>
                                                            <option id="selectCompro" value="Comprobante de domicilio">
                                                                Comprobante de
                                                                domicilio</option>
                                                            <option id="selectTarjeta" value="RFC">
                                                                RFC
                                                            </option>
                                                            <option id="selectTarjeta" value="Documentos adicionales">
                                                                Documentos adicionales
                                                            </option>

                                                        </select>
                                                    </div>

                                                    <div class="col-6">
                                                        <input id="nombreArchivo" name="imagen"
                                                            class="form-control form-control-sm" type="file">
                                                    </div>
                                                </div>
                                                <input name="fkImagenes" id="fkIdOculto" type="hidden"
                                                    value="idGenerico">
                                                <div class="row">
                                                    <div class="col-12 p-2" style="text-align: center">
                                                        <button id="btnSubirDoc" type="submit" name="accion"
                                                            value="agregar" class="btn btn-warning">Subir
                                                            Documento</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Tabla de Documentos
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <table class="table table-hover col float-end text-center">
                                            <thead>
                                                <tr>
                                                    <td>Botones</td>
                                                    <th>Archivo</th>
                                                    <th>Fecha de carga</th>
                                                </tr>
                                            </thead>
                                            <tbody id="mostrarTablaImagenes">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        Visualizar imagen
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <iframe id="iFrameIdentificacion" src="" width="100%" height="500px"
                                            frameborder="0"></iframe>
                                        <img id="docSeleccionado" src="" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-target="#cargaDocumentos"
                            data-bs-toggle="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(".calendario").datepicker({
            timepicker: false,
            datepicker: true,
            format: "yyyy-mm-dd",
            value: "2022-09-14",
            weeks: true,
        });
    </script>
    <script src="./js/datos.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
    </script>
</body>

</html>