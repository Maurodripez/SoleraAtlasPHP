<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../js/jquery-3.6.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="./css/graficas.css" />
    <script src="../js/jquery-3.6.1.js"></script>
    <script src="../Desplegables/libs/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="../Desplegables/libs/css/bootstrap-datepicker.css" />
    <script src="./js/reporte.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="row">
        <div id="navPrincipal" class="col p-3">
            <nav class="navbar bg-light">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">Analisis estadistico de movimientos Seguros SOLERA</span>
                </div>
            </nav>
        </div>
    </div>
    <div class="accordion p-3" id="formularioConsulta">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne">
                    Formulario de consulta
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <!--inicia el despliegue de opciones-->
                    <div class="row">
                        <div class="col pb-3 input-group btn-group btn-sm dropup">
                            <label class="input-group-text fw-bold" for="btnSeleccionaCarga">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-calendar-check p-1" viewBox="0 0 16 16">
                                    <path
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg>
                                Fecha de Carga
                            </label>
                            <button id="btnSeleccionaCarga" type="button"
                                class="btnSeleccionar input-group-text btn-sm btn dropdown-toggle dropdown-toggle-split"
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
                                            fill="currentColor" class="bi bi-calendar-check p-1" viewBox="0 0 16 16">
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
                                            fill="currentColor" class="bi bi-calendar-check p-1" viewBox="0 0 16 16">
                                            <path
                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                        <input id="fechaCargaFinal" pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]" type="text"
                                            class="form-control input-group-append" placeholder="Fecha"
                                            name="txtFechaCarga">
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-plus-square-fill p-1" viewBox="0 0 16 16">
                                        <path
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                    </svg>
                                    Estacion
                                </label>
                                <select class="form-select" id="txtEstacion">
                                    <option selected>Selecciona...</option>
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="En seguimiento">En seguimiento</option>
                                    <option value="Cancelado">Cancelado</option>
                                    <option value="Terminado">Terminado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-plus-square-fill p-1" viewBox="0 0 16 16">
                                        <path
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                    </svg>
                                    Estatus
                                </label>
                                <select class="form-select" id="txtEstatus">
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
                                    <option value="Sin contacto en 30 dias">
                                        Sin contacto en 30 dias
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-plus-square-fill p-1" viewBox="0 0 16 16">
                                        <path
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                    </svg>
                                    Subestatus
                                </label>
                                <select class="form-select" id="txtSubEstatus">
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
                                    <option value="Nuevo2, activacion por proceso normal">
                                        Nuevo, activacion por proceso normal
                                    </option>
                                    <option value="Sin Contacto, en seguimiento">
                                        Sin Contacto, en seguimiento
                                    </option>
                                    <option value="Sin contacto en 30 dias, cancelafo">
                                        Sin contacto en 30 dia, cancelado
                                    </option>
                                    <option value="Total de documentos, terminado">
                                        Total de documentos, terminado
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row 2">
                        <div class="col pb-3 input-group btn-group btn-sm dropup">
                            <label class="input-group-text fw-bold" for="btnSeleccionaSeguimiento">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-calendar-check p-1" viewBox="0 0 16 16">
                                    <path
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg>
                                Fecha seguimiento
                            </label>
                            <button id="btnSeleccionaSeguimiento" type="button"
                                class="btnSeleccionar input-group-text btn-sm btn dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span>Selecciona...</span>
                            </button>
                            <ul id="txtFechaSeguimiento" class="dropdown-menu">
                                <div class="calendario date col px-md-3">
                                    <label class="input-group-text fw-bold" for="fechaSeguimientoInicio">
                                        Fecha Inicio
                                    </label>
                                    <div class="input-group-sm input-group mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="currentColor" class="bi bi-calendar-check p-1" viewBox="0 0 16 16">
                                            <path
                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                        <input id="fechaSeguimientoInicio" pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                            type="text" class="form-control input-group-append" placeholder="Fecha"
                                            name="txtFechaSeguimiento">
                                    </div>
                                </div>
                                <div class="calendario date col px-md-3">
                                    <label class="input-group-text fw-bold" for="fechaSeguimientoFinal">
                                        Fecha Final
                                    </label>
                                    <div class="input-group-sm input-group mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="currentColor" class="bi bi-calendar-check p-1" viewBox="0 0 16 16">
                                            <path
                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg>
                                        <input id="fechaSeguimientoFinal" pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                            type="text" class="form-control input-group-append" placeholder="Fecha"
                                            name="txtFechaSeguimiento">
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-globe p-1">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                        </path>
                                    </svg>
                                    Region
                                </label>
                                <select class="form-select" id="txtRegion">
                                    <option selected>Selecciona...</option>
                                    <option value="Layout ZG A: Guadalajara-Colima-Nayarit">
                                        Layout ZG A: Guadalajara-Colima-Nayarit
                                    </option>
                                    <option value="Layout ZG B: Acapulco-Toluca-Pachuca-Cuernavaca">
                                        Layout ZG B: Acapulco-Toluca-Pachuca-Cuernavaca
                                    </option>
                                    <option value="Layout ZG C: Puebla-Queretaro-Tlaxcala">
                                        Layout ZG C: Puebla-Queretaro-Tlaxcala
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-plus-square-fill p-1" viewBox="0 0 16 16">
                                        <path
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                    </svg>
                                    Estado
                                </label>
                                <select id="txtEstado" class="form-select" name="txtEstado" required>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-plus-square-fill p-1" viewBox="0 0 16 16">
                                        <path
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                    </svg>
                                    Cobertura
                                </label>
                                <select class="form-select" id="txtCobertura">
                                    <option selected>Selecciona...</option>
                                    <option value="DM">DM</option>
                                    <option value="RT">RT</option>
                                    <option value="RC">RC</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group" role="group">
                        <button id="btnBuscar" type="button" class="btn btn-primary">
                            Buscar
                        </button>
                        <button type="button" class="btn btn-primary">Limpiar</button>
                        <button type="button" class="btn btn-primary">Exportar</button>
                        <button class="btn btn-primary" id="btnGraficaValores" type="button" data-bs-toggle="collapse"
                            data-bs-target="#graficaValores-collapse" aria-expanded="false" aria-controls="graficaValores-collapse">
                            Valores
                        </button>
                    </div>
                    </p>
                    <div class="collapse" id="graficaValores-collapse">
                        <div class="card card-body">
                            <div id="graficaValores">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="mapaRepublica">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseTwo">
                    Casos por region
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <div class="row">
                        <div class="divMapaMexico col-8">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1000px" height="700px"
                                viewBox="0 0 975.537 654.82" enable-background="new 0 0 975.537 654.82"
                                xml:space="preserve">
                                <g id="BASE_MAPA" inkscape:output_extension="org.inkscape.output.svg.inkscape"
                                    xmlns:dc="http://purl.org/dc/elements/1.1/"
                                    xmlns:cc="http://creativecommons.org/ns#"
                                    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                    xmlns:svg="http://www.w3.org/2000/svg"
                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" sodipodi:version="0.32"
                                    inkscape:version="0.46" sodipodi:docname="Blank map of Mexico.svg">

                                    <sodipodi:namedview id="base" inkscape:cy="401.39839" inkscape:cx="724.31607"
                                        pagecolor="#ffffff" bordercolor="#666666" inkscape:zoom="0.70710678"
                                        borderopacity="1.0" objecttolerance="10.0" gridtolerance="10.0"
                                        guidetolerance="10.0" borderlayer="true" showgrid="false"
                                        inkscape:current-layer="layer4" inkscape:window-y="-4" inkscape:window-x="-4"
                                        inkscape:showpageshadow="false" inkscape:window-width="1280"
                                        inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:window-height="744">
                                    </sodipodi:namedview>
                                    <defs>

                                        <inkscape:perspective id="perspective47" inkscape:vp_z="974.72998 : 326.815 : 1"
                                            inkscape:vp_y="0 : 1000 : 0" inkscape:vp_x="0 : 326.815 : 1"
                                            sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="487.36499 : 217.87667 : 1">
                                        </inkscape:perspective>

                                        <inkscape:perspective id="perspective26882"
                                            inkscape:vp_z="744.09448 : 526.18109 : 1" inkscape:vp_y="0 : 1000 : 0"
                                            inkscape:vp_x="0 : 526.18109 : 1" sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="372.04724 : 350.78739 : 1">
                                        </inkscape:perspective>

                                        <inkscape:perspective id="perspective76809"
                                            inkscape:vp_z="454.1705 : 224.86328 : 1" inkscape:vp_y="0 : 1000 : 0"
                                            inkscape:vp_x="0 : 224.86328 : 1" sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="227.08525 : 149.90885 : 1">
                                        </inkscape:perspective>

                                        <inkscape:perspective id="perspective76559"
                                            inkscape:vp_z="744.09448 : 526.18109 : 1" inkscape:vp_y="0 : 1000 : 0"
                                            inkscape:vp_x="0 : 526.18109 : 1" sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="372.04724 : 350.78739 : 1">
                                        </inkscape:perspective>

                                        <inkscape:perspective id="perspective67867"
                                            inkscape:vp_z="744.09448 : 526.18109 : 1" inkscape:vp_y="0 : 1000 : 0"
                                            inkscape:vp_x="0 : 526.18109 : 1" sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="372.04724 : 350.78739 : 1">
                                        </inkscape:perspective>

                                        <inkscape:perspective id="perspective2450"
                                            inkscape:vp_z="744.09448 : 526.18109 : 1" inkscape:vp_y="0 : 1000 : 0"
                                            inkscape:vp_x="0 : 526.18109 : 1" sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="372.04724 : 350.78739 : 1">
                                        </inkscape:perspective>

                                        <inkscape:perspective id="perspective6125"
                                            inkscape:vp_z="744.09448 : 526.18109 : 1" inkscape:vp_y="0 : 1000 : 0"
                                            inkscape:vp_x="0 : 526.18109 : 1" sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="372.04724 : 350.78739 : 1">
                                        </inkscape:perspective>

                                        <inkscape:perspective id="perspective6123"
                                            inkscape:vp_z="454.1705 : 224.86328 : 1" inkscape:vp_y="0 : 1000 : 0"
                                            inkscape:vp_x="0 : 224.86328 : 1" sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="227.08525 : 149.90885 : 1">
                                        </inkscape:perspective>

                                        <inkscape:perspective id="perspective6121"
                                            inkscape:vp_z="744.09448 : 526.18109 : 1" inkscape:vp_y="0 : 1000 : 0"
                                            inkscape:vp_x="0 : 526.18109 : 1" sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="372.04724 : 350.78739 : 1">
                                        </inkscape:perspective>

                                        <inkscape:perspective id="perspective6119"
                                            inkscape:vp_z="744.09448 : 526.18109 : 1" inkscape:vp_y="0 : 1000 : 0"
                                            inkscape:vp_x="0 : 526.18109 : 1" sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="372.04724 : 350.78739 : 1">
                                        </inkscape:perspective>

                                        <inkscape:perspective id="perspective6117"
                                            inkscape:vp_z="744.09448 : 526.18109 : 1" inkscape:vp_y="0 : 1000 : 0"
                                            inkscape:vp_x="0 : 526.18109 : 1" sodipodi:type="inkscape:persp3d"
                                            inkscape:persp3d-origin="372.04724 : 350.78739 : 1">
                                        </inkscape:perspective>
                                    </defs>
                                    <g id="layer1" transform="translate(0.1250195,0.4949951)" inkscape:label="water"
                                        inkscape:groupmode="layer">
                                    </g>
                                    <g id="layer2" transform="translate(0.1250195,0.4949951)" inkscape:label="america"
                                        inkscape:groupmode="layer">
                                        <g id="g2862" transform="matrix(0.7155925,0,0,-0.7155925,1448.0618,288.44848)">
                                            <path id="path2864" fill="#DCDCDC" d="M0,0h0.24H0" />
                                        </g>
                                        <g id="g2870" transform="matrix(0.7155925,0,0,-0.7155925,1446.3444,288.62022)">
                                            <path id="path2872" fill="#DCDCDC" d="M0,0h0.24H0" />
                                        </g>
                                        <g id="g2942" transform="matrix(0.7155925,0,0,-0.7155925,1454.0728,294.6312)">
                                            <path id="path2944" fill="#DCDCDC" d="M0,0v-0.24V0" />
                                        </g>
                                        <g id="g3006" transform="matrix(0.7155925,0,0,-0.7155925,1454.2445,294.45946)">
                                            <path id="path3008" fill="#DCDCDC" d="M0,0h0.24H0" />
                                        </g>
                                        <g id="g3046" transform="matrix(0.7155925,0,0,-0.7155925,1454.0728,302.70308)">
                                            <path id="path3048" fill="#DCDCDC" d="M0,0v-0.24V0" />
                                        </g>
                                        <g id="g3050" transform="matrix(0.7155925,0,0,-0.7155925,1454.2445,302.70308)">
                                            <path id="path3052" fill="#DCDCDC" d="M0.001,0h-0.24H0.001" />
                                        </g>
                                        <g id="g3162" transform="matrix(0.7155925,0,0,-0.7155925,1466.9535,306.99664)">
                                            <path id="path3164" fill="#DCDCDC" d="M0.001,0.001v-0.24V0.001" />
                                        </g>
                                        <g id="g3256" transform="matrix(0.7155925,0,0,-0.7155925,1469.7013,325.71654)">
                                            <path id="path3258" fill="#DCDCDC" d="M0.001-0.001h-0.24H0.001" />
                                        </g>
                                        <g id="g3276" transform="matrix(0.7155925,0,0,-0.7155925,1468.6709,325.71654)">
                                            <path id="path3278" fill="#DCDCDC" d="M0.002-0.001v0.24V-0.001" />
                                        </g>
                                        <g id="g3802" transform="matrix(0.7155925,0,0,-0.7155925,1485.3299,288.62022)">
                                            <path id="path3804" fill="#DCDCDC" d="M0.001,0h-0.719H0.001" />
                                        </g>
                                        <g id="g3870" transform="matrix(0.7155925,0,0,-0.7155925,1439.8182,289.13545)">
                                            <path id="path3872" fill="#DCDCDC" d="M0.001,0h-0.24H0.001" />
                                        </g>
                                        <g id="g3882" transform="matrix(0.7155925,0,0,-0.7155925,1441.3639,288.96371)">
                                            <path id="path3884" fill="#DCDCDC" d="M0.001,0h-0.24H0.001" />
                                        </g>
                                        <g id="g3970" transform="matrix(0.7155925,0,0,-0.7155925,1426.2506,290.33764)">
                                            <path id="path3972" fill="#DCDCDC" d="M0.001,0h0.24H0.001" />
                                        </g>
                                        <g id="g4510" transform="matrix(0.7155925,0,0,-0.7155925,1460.7707,337.73849)">
                                            <path id="path4512" fill="#DCDCDC" d="M0.002-0.001v-0.24V-0.001" />
                                        </g>
                                        <g id="g6006" transform="matrix(0.7155925,0,0,-0.7155925,1486.1886,332.071)">
                                            <path id="path6008" fill="#DCDCDC" d="M0.002,0h0.24H0.002" />
                                        </g>
                                        <g id="g6018" transform="matrix(0.7155925,0,0,-0.7155925,1479.6624,340.48637)">
                                            <path id="path6020" fill="#DCDCDC" d="M0.002-0.001h-0.24H0.002" />
                                        </g>
                                        <g id="g6394" transform="matrix(0.7155925,0,0,-0.7155925,1489.9669,322.10995)">
                                            <path id="path6396" fill="#DCDCDC" d="M0.003,0.001h-0.24H0.003" />
                                        </g>
                                        <g id="g6826" transform="matrix(0.7155925,0,0,-0.7155925,1405.8132,288.44848)">
                                            <path id="path6828" fill="#DCDCDC" d="M0.002,0h0.24H0.002" />
                                        </g>
                                        <g id="g7010" transform="matrix(0.7155925,0,0,-0.7155925,1426.2506,290.33764)">
                                            <path id="path7012" fill="#DCDCDC" d="M0.002,0v-0.24V0" />
                                        </g>
                                        <g id="g7218" transform="matrix(0.7155925,0,0,-0.7155925,1429.3419,302.53134)">
                                            <path id="path7220" fill="#DCDCDC" d="M0.003,0h0.239H0.003" />
                                        </g>
                                        <g id="g7650" transform="matrix(0.7155925,0,0,-0.7155925,1455.6185,345.46689)">
                                            <path id="path7652" fill="#DCDCDC" d="M0.003-0.001h0.24H0.003" />
                                        </g>
                                        <g id="g7898" transform="matrix(0.7155925,0,0,-0.7155925,1460.0838,346.15386)">
                                            <path id="path7900" fill="#DCDCDC" d="M0.002,0.001v0.237V0.001" />
                                        </g>
                                        <g id="g7916" transform="matrix(0.7155925,0,0,-0.7155925,1459.0533,357.48884)">
                                            <path id="path7918" fill="#DCDCDC" d="M0.003,0v0.48V0" />
                                        </g>
                                        <g id="g8188" transform="matrix(0.7155925,0,0,-0.7155925,1475.0253,345.46689)">
                                            <path id="path8190" fill="#DCDCDC" d="M0.003-0.001h-0.24H0.003" />
                                        </g>
                                        <g id="g8584" transform="matrix(0.7155925,0,0,-0.7155925,1523.9719,328.12093)">
                                            <path id="path8586" fill="#FFFFFF" d="M0.004-0.001h0.24H0.004" />
                                        </g>
                                        <g id="g8904" transform="matrix(0.7155925,0,0,-0.7155925,1405.985,288.44848)">
                                            <path id="path8906" fill="#FFFFFF" d="M0.003,0h-0.24H0.003" />
                                        </g>
                                        <g id="g8908" transform="matrix(0.7155925,0,0,-0.7155925,1394.9935,293.08552)">
                                            <path id="path8910" fill="#FFFFFF" d="M0.004,0h0.24H0.004" />
                                        </g>
                                        <g id="g8956" transform="matrix(0.7155925,0,0,-0.7155925,1402.5501,286.9028)">
                                            <path id="path8958" fill="#FFFFFF" d="M0.004,0h-0.961H0.004" />
                                        </g>
                                        <g id="g9072" transform="matrix(0.7155925,0,0,-0.7155925,1402.5501,286.9028)">
                                            <path id="path9074" fill="#FFFFFF" d="M0.004,0h-0.961H0.004" />
                                        </g>
                                        <g id="g9504" transform="matrix(0.7155925,0,0,-0.7155925,1406.1567,292.05507)">
                                            <path id="path9506" fill="#DCDCDC" d="M0.004,0v-0.24V0" />
                                        </g>
                                        <g id="g9932" transform="matrix(0.7155925,0,0,-0.7155925,1388.9825,313.00761)">
                                            <path id="path9934" fill="#DCDCDC" d="M0.005,0h0.239H0.005" />
                                        </g>
                                        <g id="g9992" transform="matrix(0.7155925,0,0,-0.7155925,1414.0569,316.95769)">
                                            <path id="path9994" fill="#DCDCDC" d="M0.005-0.001h-0.24H0.005" />
                                        </g>
                                        <g id="g9996" transform="matrix(0.7155925,0,0,-0.7155925,1413.8851,316.78594)">
                                            <path id="path9998" fill="#DCDCDC" d="M0.004,0h0.24H0.004" />
                                        </g>
                                        <g id="g10024" transform="matrix(0.7155925,0,0,-0.7155925,1432.7768,356.63013)">
                                            <path id="path10026" fill="#DCDCDC" d="M0.004,0.001h-0.48H0.004" />
                                        </g>
                                        <g id="g10664" transform="matrix(0.7155925,0,0,-0.7155925,1483.6125,388.40244)">
                                            <path id="path10666" fill="#DCDCDC" d="M0.005-0.001h-0.24H0.005" />
                                        </g>
                                        <g id="g10848" transform="matrix(0.7155925,0,0,-0.7155925,1512.8086,354.91271)">
                                            <path id="path10850" fill="#FFFFFF" d="M0.004,0h-0.239H0.004" />
                                        </g>
                                        <g id="g10988" transform="matrix(0.7155925,0,0,-0.7155925,1529.2959,367.79338)">
                                            <path id="path10990" fill="#FFFFFF" d="M0.006,0v0.24V0" />
                                        </g>
                                        <g id="g10992" transform="matrix(0.7155925,0,0,-0.7155925,1528.6089,368.3086)">
                                            <path id="path10994" fill="#FFFFFF" d="M0.005-0.001v0.24V-0.001" />
                                        </g>
                                        <g id="g11028" transform="matrix(0.7155925,0,0,-0.7155925,1512.8086,354.91271)">
                                            <path id="path11030" fill="#DCDCDC" d="M0.005,0h0.24H0.005" />
                                        </g>
                                        <g id="g11368" transform="matrix(0.7155925,0,0,-0.7155925,1543.894,304.07702)">
                                            <path id="path11370" fill="#FFFFFF" d="M0.005,0v-0.24V0" />
                                        </g>
                                        <g id="g12232" transform="matrix(0.7155925,0,0,-0.7155925,1474.3384,390.11986)">
                                            <path id="path12234" fill="#DCDCDC" d="M0.005,0v-0.48V0" />
                                        </g>
                                        <g id="g12248" transform="matrix(0.7155925,0,0,-0.7155925,1465.923,390.11986)">
                                            <path id="path12250" fill="#DCDCDC" d="M0.006,0h0.24H0.006" />
                                        </g>
                                        <g id="g12748" transform="matrix(0.7155925,0,0,-0.7155925,1510.7477,384.45237)">
                                            <path id="path12750" fill="#FFFFFF" d="M0.006,0.001v-0.24V0.001" />
                                        </g>
                                        <g id="g13024" transform="matrix(0.7155925,0,0,-0.7155925,1580.1316,317.64465)">
                                            <path id="path13026" fill="#FFFFFF" d="M0.006,0h-0.24H0.006" />
                                        </g>
                                        <g id="g13572" transform="matrix(0.7155925,0,0,-0.7155925,1346.2187,286.9028)">
                                        </g>
                                        <g id="g13764" transform="matrix(0.7155925,0,0,-0.7155925,1535.4786,393.38296)">
                                            <path id="path13766" fill="#FFFFFF" d="M0.007-0.001h0.239H0.007" />
                                        </g>
                                    </g>
                                    <g id="layer3" transform="translate(0.1250195,0.4949951)" inkscape:label="mexico"
                                        inkscape:groupmode="layer">
                                    </g>

                                    <rect id="FONDO_AZUL" x="0.13" y="0.957" fill="#D2EFF9" stroke="#717171"
                                        stroke-width="0.25" stroke-opacity="0.7186" width="974.755" height="653.189" />
                                    <g id="ESTADOS">
                                        <path id="campeche" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="
                                    M822.007,501.451c-0.969,0.807-1.662,1.074-2.633,1.822c-1.136,0.873-1.218,1.139-2.634,1.215
                                    c-1.326,0.07-3.182,1.023-4.253,1.619c-0.572,0.316-0.821,1.043-1.013,1.619c-0.354,1.063,7.035-1.234,7.494-1.619
                                    c1.203-1.012,2.538-0.664,3.646-2.023C822.967,503.648,823.159,502.261,822.007,501.451z M803.982,457.128
                                    c-0.078-0.338,0-0.732-0.203-1.012c-0.079-0.109-0.29,0.07-0.405,0c-0.114-0.072-0.107-0.299-0.202-0.203l-0.202,0.203v0.605
                                    c0,0.078-0.353-0.053-0.405,0.406c-0.023,0.207,0.063,0.648,0,0.809c-0.136,0.346-0.935,0.029-0.607,0.607
                                    c0.141,0.25,0.491,0.289,0.607,0.404c0.176,0.176-0.183,0.279,0.405,0.203c0.133-0.018,0.075-0.156,0.202-0.203
                                    c0.28-0.1,0.811,0.096,0.811-0.201v-0.203h0.202C804.379,458.544,804.386,458.232,803.982,457.128L803.982,457.128z
                                     M791.626,433.449l0.608-1.012c0.183-0.305-0.258-0.203-0.405-0.203c-0.337,0-0.677,0.021-1.013,0
                                    c-0.573-0.037,0.247-0.67-0.203-0.404c-0.063,0.037-0.381,0.547-0.404,0.607c-0.013,0.031-0.014,0.584,0,0.607
                                    c0.07,0.113,0.067,0.201,0.202,0.201h0.202c0.249,0-0.182,0.279,0.406,0.203C791.457,433.392,790.984,433.392,791.626,433.449
                                    L791.626,433.449z M894.209,530.505v-52.369l-15.293-16.793l-0.6-10.195l-2.398,0.6l-1.499,2.1l-2.699-3.299h-1.5l-0.6-5.697
                                    l-10.495,0.6v-4.199l-3.898-0.299h-2.398l-0.601-10.496l-1.934-0.09c-2.133,5.555-2.595,13.828-2.595,17.561
                                    c0,2.766,3.307,6.223,3.045,10.768c-0.135,2.342-3.395,7.869-4.451,10.301c-3.404,7.842-0.108,12.555-6.56,17.793
                                    c-3.614,2.936-11.595,12.516-15.93,12.875c0.448,1.193,0.144,1.639,1.171,1.639c0.888,0,1.789-0.467,2.343-0.467
                                    c0.5,0,0.504,1.283,0.703,1.639c0.576,1.023,4.958,0.701,6.091,0.701c-2.454,0-6.574,0.104-4.686,3.98
                                    c0.025,0.049,1.175,0,2.108,0c1.754,0-2.248,0.426-2.577,0.469c-0.911,0.117-1.926,3.76-3.748,3.043
                                    c-4.398-1.732-2.379,4.492-6.325,3.979c-0.419-0.055-1.795-1.336-2.812-0.701c-1.024,0.639-0.708,3.277-1.64,3.277h-2.811
                                    c-1.734,0-1.313,0.211-1.406-1.404c-0.045-0.787-0.359-0.646,0.938-0.703c0.005,0,1.562,0.156,1.171-0.469
                                    c-0.36-0.576-0.938-0.814-0.938-1.639c0-2.355-1.078,0.805-1.874-0.467c-1.542-2.467-2.118,1.018-3.748,0
                                    c-0.7-0.438-0.007-0.049-1.171-0.469c-0.243-0.088-0.922-1.143-1.172-1.17c-1.256-0.145-1.11,0.465-1.64,1.17
                                    c-0.479,0.08-2.432,0.475-3.045,0.234c-0.773-0.305-1.078-0.469-0.234-0.703c0.388-0.107,1.208,0,1.64,0
                                    c0.466,0,1.4,0.273,1.171-0.469c-0.154-0.5-0.42-0.836-0.468-1.404c-0.046-0.525-0.076-0.496,0.233-0.701
                                    c1.794,0,3.37-0.092,4.92,0.467c0.738,0.268,1.47-0.701,2.577-0.701c0.562,0,1.231-0.643,0.703-1.17
                                    c-0.513-0.512-3.313-0.438-4.217-1.172c-1.696-1.377-4.614,0.668-6.092,1.404c-0.999,0.5-3.467,0.063-4.685,0.469
                                    c-1.49,0.496-2.525,0.221-3.54,0.527l-0.013,1.424l2.806,0.75v2.896l1.658-0.203c0.199,0.398,0.325,0.777,0.406,1.217
                                    c0.067,0.365,1.597,0.203,2.028,0.203h0.608c0.43,0,1.502-1.016,1.623-0.406c0.189,0.945,0.61,0.025,1.218,0.406
                                    c0.284,0.176-0.29,0.201,0.406,0.201h1.014v7.502c1.463,0.121,0.818,3.852,1.826,3.852c1.024,0,1.494,0.129,2.029-0.404
                                    c0.5-0.5,3.34,1.566,4.058,1.824c0.296,0.105,1.563-0.121,1.826,0.203c0.734,0.904-0.976,1.824,0.812,1.824
                                    c0.829,0,3.562-0.012,4.058,0.609c0.906,1.131,2.259,1.215,3.854,1.215v-7.525l3.044,0.023c1.343,0.012,2.25,0.982,3.651,1.42
                                    c2.362,0.738,2.429-0.775,4.667,1.014c1.862,1.488,6.113-0.395,8.46,1.717l0.033,4.316
                                    C859.584,532.82,875.678,531.802,894.209,530.505z" />
                                        <path id="chiapas" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M745.807,598.478
                                    c-0.044-0.756-0.092-1.516-0.13-2.289c-0.066-1.352,0.646-1.238,0.646-2.26c0-1.734-0.427-1.494,1.292-1.613
                                    c0.644-0.045,0.323-1.906,0.323-2.584v-3.227c0-2.057-1.872-2.154-4.2-2.26l7.105-21.949c0.817-0.27,1.57-0.322,2.048-0.818
                                    c0.456-0.473-0.687-1.354,0.255-2.293c0.836-0.836,3.146,0.082,3.569-1.02c0.138-0.357,0.199-0.709,0.239-0.98
                                    c0.846-1.84,2.414,1.234,2.66-2.563c0.093-1.426,1.323-0.928,1.579-1.576c0.564-1.436,0.849-2.43,1.228-4.033
                                    c0.328-1.389,0.591-0.766,1.229-1.402c0.837-0.836-0.274-1.377,1.052-2.455c0.333-0.268,0.931-0.51,1.229-0.875
                                    c1.097-1.35,0.991-3.332-1.229-3.332l-0.175-3.154l1.053-3.682c1.375-0.59,1.312,0.402,1.754-0.701
                                    c0.162-0.406,0.834-0.215,1.053-0.352c0.457-0.285,1.075-0.088,1.755-0.176c0.396-0.051,0.02-0.701,0.701-0.701
                                    c0.626,0,2.356,0.84,1.229,1.402c-0.211,0.105-0.973-0.244-0.702,0.352c0.407,0.896,0.436,0.23,1.053,0.877
                                    c0.169,0.176,0.386,0.875,0.526,0.875c0.499,0,0.932-0.35,1.579-0.35c0.845,0,0.525,0.609,0.525,1.402
                                    c0,0.553,0.357,0.832,0,1.402c-0.412,0.66,1.416,0.674,1.579,0.701v6.311c0.517,0,1.403,0.705,1.403,1.229
                                    c0,1.416-0.431,1.578,1.229,1.578c0.828,0,1.628-0.176,2.456-0.176c2.389,0,0.884,0.076,1.93,1.227
                                    c0.199,0.219,0.511,0.096,0.351,0.352c-0.209,0.334-1.223,2.195-0.175,1.928c0.307-0.078,1.544-0.096,1.579,0.176
                                    c0.088,0.68-0.871,0.752-0.352,1.051c1.14,0.656,0.629,0.701,2.281,0.701c0.108-0.326,0.404-0.115,0.526-0.525
                                    c0.079-0.264,0.235-0.582,0.175-1.051c-0.058-0.449-0.117,0.098-0.175-0.352c-0.073-0.566,0.543-1.674,1.052-1.928
                                    c0.173-0.086,0.4-0.098,0.527-0.352c0.149-0.299,0.079-1.861,0.175-2.279c0.599,0,2.632-0.01,2.632-0.701
                                    c0-1.217,0.621-1.033,1.578-1.402c1.939-0.744,3.396,0.32,4.387-2.104c0.594-1.453-0.966-2.279,1.403-2.279
                                    c0.78,0-0.923,0.857,0.176-0.525c0.479-0.604,1.537-0.588,1.93-1.053c0.823-0.977,3.157-1.699,3.157-2.629
                                    c0-1.039-0.012-0.9,1.053-1.227c0.768-0.256,1.754,0.002,1.754-1.229c0-1.408,0.829-3.84,1.579-1.402
                                    c0.2,0.652,0.526,0.057,0.526,1.053c0,1.416,1.189,0.949,1.229,0.35c0.063-0.965,0.063-0.701,1.053-0.701
                                    c1.039,0,1.131,0.4,2.104,0.701c0.38,0.117,0.953,0.17,1.053,0.527c0.188,0.666-0.005,1.184,0.352,1.752
                                    c0.412,0.662-0.111,0.971-0.176,1.754c0.306,0.229,0.348,0.686,0.526,0.701c0.526,0.047,0.506,0.049,0.877,0.35
                                    c0.888,0.721,0.457,0.285,1.403,0.176c1.279-0.146,0.862,0.014,1.053,1.053c0.179,0.975,0.526-0.5,0.526,0.877
                                    c0,1.283,1.095,0.242,1.229,1.402c0.093,0.814-0.881,1.275-0.352,1.928c0.266,0.328,0.238,1.031,0,1.227
                                    c-0.563,0.465-1.26,0.42-0.526,0.877c0.22,0.137,0.176,0.684,0.176,1.053c-0.557,0.184,0.002,0.842,0.702,0.525
                                    c0.419-0.191,0.683-0.352,1.578-0.352c1.38,0,0.91,1.053,1.755,1.053c0.331,0,2.22-0.441,2.28,0
                                    c0.089,0.641,0.296,2.391,1.053,0.877c0.415-0.832,0.379-0.674,0.701-0.352c0.243,0.244,0.877,0.217,0.877,0.701
                                    c0,1.277-0.701,0.434-0.701,1.754c0,0.553-0.213,1.289-0.176,1.578c0.064,0.5,1.388-0.18,1.728,0.467l-0.893,0.018
                                    c0.393,0.771,0.47,0.873,1.2,1.273c0.186,0.104,0.082,0.068,0.278,0.141c0.702,0.254,0.166,0.369,0.556,0.973
                                    c0.251,0.387,0.595,0.693,0.974,0.693c0.407,0,0.908-0.064,1.112,0.141c0.291,0.291,0.974,0.264,0.974,0.832
                                    c0.188,0.609,0.129,0.902,0.695,1.113c1.104,0.408,1.669-0.203,1.669,0.973c0,1.305,1.107,0.828,1.252,2.223
                                    c0.066,0.645,4.235-0.682,3.198,0.834c-0.262,0.383-0.496-0.223-0.417,0.695c0.063,0.746,0.977,2.084,1.668,2.084
                                    c0.605,0,1.06-0.416,1.809-0.416c0,2.359,0.549,2.084,2.642,2.084c2.656,0,6.121,2.762,6.258,5.143
                                    c0.042,0.727,0.842,2.693,1.252,2.777c2.055,0.428,1.315,3.887,3.615,3.197c1.385-0.346,1.824-0.871,3.06,0.416
                                    c0.32,0.336,0.579,0.73,0.974,0.973c0.207,0.129,1.188-0.277,1.669-0.277v1.668c0,1.016-1.009,0.174-1.112,0.973
                                    c-0.151,1.162-1.096,1.807-0.835,3.057c0.192,0.924,0.626,5.305,1.391,5.559l-40.606,1.807l-15.158,29.738l4.729,3.893
                                    c0,4.307-2.086,6.887-2.086,10.979c0,1.904-0.557,2.621-0.557,4.445c0,1.906-0.96,2.689-1.746,3.637
                                    c-4.202-3.408-7.544-6.424-8.163-7.322c-7.504-10.887-20.103-16.896-30.018-26.172c-4.598-4.301-12.755-6.58-17.729-10.871
                                    C750.317,599.54,748.1,598.986,745.807,598.478z" />
                                        <path id="tabasco" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M740.928,527.285l1.256,2.348
                                    c0,1.201,0.255,2.143,0.255,3.311c0,1.594,0.492,0.596,1.02,1.529c0.22,0.389-1.525,2.184-0.51,3.566
                                    c0.231,0.316,2.581-0.27,3.06,0c1.535,0.867-0.888,1.41,2.039,2.549c1.24,0.928,1.614,2.705,3.314,2.803
                                    c1.592,0.09,3.981,1.066,3.569,2.547c-0.478,1.719,2.007,1.563,2.295,2.293c0.025,0.064,0.51,4.434-0.255,4.84
                                    c-1.354,0.723,0.017,2.227-0.016,4.115c0.846-1.84,2.414,1.234,2.66-2.563c0.093-1.426,1.323-0.928,1.579-1.576
                                    c0.564-1.436,0.849-2.43,1.228-4.033c0.328-1.389,0.591-0.766,1.229-1.402c0.837-0.836-0.274-1.377,1.052-2.455
                                    c0.333-0.268,0.931-0.51,1.229-0.875c1.097-1.35,0.991-3.332-1.229-3.332l-0.175-3.154l1.053-3.682
                                    c1.375-0.59,1.312,0.402,1.754-0.701c0.162-0.406,0.834-0.215,1.053-0.352c0.457-0.285,1.075-0.088,1.755-0.176
                                    c0.396-0.051,0.02-0.701,0.701-0.701c0.626,0,2.356,0.84,1.229,1.402c-0.211,0.105-0.973-0.244-0.702,0.352
                                    c0.407,0.896,0.436,0.23,1.053,0.877c0.169,0.176,0.386,0.875,0.526,0.875c0.499,0,0.932-0.35,1.579-0.35
                                    c0.845,0,0.525,0.609,0.525,1.402c0,0.553,0.357,0.832,0,1.402c-0.412,0.66,1.416,0.674,1.579,0.701v6.311
                                    c0.517,0,1.403,0.705,1.403,1.229c0,1.416-0.431,1.578,1.229,1.578c0.828,0,1.628-0.176,2.456-0.176
                                    c2.389,0,0.884,0.076,1.93,1.227c0.199,0.219,0.511,0.096,0.351,0.352c-0.209,0.334-1.223,2.195-0.175,1.928
                                    c0.307-0.078,1.544-0.096,1.579,0.176c0.088,0.68-0.871,0.752-0.352,1.051c1.14,0.656,0.629,0.701,2.281,0.701
                                    c0.108-0.326,0.404-0.115,0.526-0.525c0.079-0.264,0.235-0.582,0.175-1.051c-0.058-0.449-0.117,0.098-0.175-0.352
                                    c-0.073-0.566,0.543-1.674,1.052-1.928c0.173-0.086,0.4-0.098,0.527-0.352c0.149-0.299,0.079-1.861,0.175-2.279
                                    c0.599,0,2.632-0.01,2.632-0.701c0-1.217,0.621-1.033,1.578-1.402c1.939-0.744,3.396,0.32,4.387-2.104
                                    c0.594-1.453-0.966-2.279,1.403-2.279c0.78,0-0.923,0.857,0.176-0.525c0.479-0.604,1.537-0.588,1.93-1.053
                                    c0.823-0.977,3.157-1.699,3.157-2.629c0-1.039-0.012-0.9,1.053-1.227c0.768-0.256,1.754,0.002,1.754-1.229
                                    c0-1.408,0.829-3.84,1.579-1.402c0.2,0.652,0.526,0.057,0.526,1.053c0,1.416,1.189,0.949,1.229,0.35
                                    c0.063-0.965,0.063-0.701,1.053-0.701c1.039,0,1.131,0.4,2.104,0.701c0.38,0.117,0.953,0.17,1.053,0.527
                                    c0.188,0.666-0.005,1.184,0.352,1.752c0.412,0.662-0.111,0.971-0.176,1.754c0.306,0.229,0.348,0.686,0.526,0.701
                                    c0.526,0.047,0.506,0.049,0.877,0.35c0.888,0.721,0.457,0.285,1.403,0.176c1.279-0.146,0.862,0.014,1.053,1.053
                                    c0.179,0.975,0.526-0.5,0.526,0.877c0,1.283,1.095,0.242,1.229,1.402c0.093,0.814-0.881,1.275-0.352,1.928
                                    c0.266,0.328,0.238,1.031,0,1.227c-0.563,0.465-1.26,0.42-0.526,0.877c0.22,0.137,0.176,0.684,0.176,1.053
                                    c-0.557,0.184,0.002,0.842,0.702,0.525c0.419-0.191,0.683-0.352,1.578-0.352c1.38,0,0.91,1.053,1.755,1.053
                                    c0.331,0,2.22-0.441,2.28,0c0.089,0.641,0.296,2.391,1.053,0.877c0.415-0.832,0.379-0.674,0.701-0.352
                                    c0.243,0.244,0.877,0.217,0.877,0.701c0,1.277-0.701,0.434-0.701,1.754c0,0.553-0.213,1.289-0.176,1.578
                                    c0.064,0.5,1.388-0.18,1.695,0.469l10.968-0.223l-0.082-6.965l-0.18-17.713c-2.347-2.111-6.598-0.229-8.46-1.717
                                    c-2.238-1.789-2.305-0.275-4.667-1.014c-1.401-0.438-2.309-1.408-3.651-1.42l-3.044-0.023v7.525c-1.596,0-2.948-0.084-3.854-1.215
                                    c-0.496-0.621-3.229-0.609-4.058-0.609c-1.787,0-0.077-0.92-0.812-1.824c-0.264-0.324-1.53-0.098-1.826-0.203
                                    c-0.718-0.258-3.558-2.324-4.058-1.824c-0.535,0.533-1.005,0.404-2.029,0.404c-1.008,0-0.363-3.73-1.826-3.852v-7.502h-1.014
                                    c-0.696,0-0.122-0.025-0.406-0.201c-0.607-0.381-1.028,0.539-1.218-0.406c-0.121-0.609-1.193,0.406-1.623,0.406h-0.608
                                    c-0.432,0-1.961,0.162-2.028-0.203c-0.081-0.439-0.207-0.818-0.406-1.217l-1.658,0.203v-2.896l-2.806-0.75v-1.42
                                    c-0.443,0.139-0.886,0.393-1.367,0.873c-1.874,0.625-3.168,1.309-4.686,2.107c-1.087,0.572-1.831,0.426-2.812,1.404
                                    c-2.071,2.07-5.047,4.563-7.965,4.682c-0.829,0.035-1.485,0.213-1.405,1.172c0.103,1.234-0.851,3.988-2.577,2.809
                                    c-2.064-1.412,2.32-2.809,1.171-2.809c-0.817,0-2.248,0.328-2.342,0.234c-0.652-0.652-2.531-0.703-3.749-0.703
                                    c-2.173,0-5.93,0.02-7.027,1.17c-3.424,3.592-10.455,1.906-12.885,5.854c-0.09,0.145-2.098,0.617-2.344,0.701
                                    C742.025,526.599,741.446,526.929,740.928,527.285z" />
                                        <path id="oaxaca" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M599.129,593.103
                                    c0.14-0.049,0.328-0.094,0.597-0.135c0.696-0.104,0.057-0.463,1.269-0.508c2.477-0.088,3.724,1.143,6.094,0.254
                                    c0-0.355-0.055-0.986,0-1.268c0.135-0.695,0.896-0.348,1.016-0.508c0.244-0.328,0.564-1.277,0.508-1.775
                                    c-0.101-0.875-1.016-1.758-1.016-2.537c0-1.369,0.659-1.016,2.031-1.016c0.561,0,0.614-0.055,0.761,0.508
                                    c0.141,0.537,1.474,0.254,2.031,0.254c1.385,0,0.748-4.037,3.047-4.566c2.519-0.58,1.523-6.602,1.523-8.879
                                    c0-1.563,1.507-2.25,3.046-2.537c-0.165-0.498-0.897-0.096-1.27-0.508c-1.112-1.236-1.44-0.533-2.792-0.762
                                    c-1.521-0.258-1.016-0.121-1.016-1.521c0-0.896-0.551-0.297-1.016-0.762c-0.817-0.816-1.223,0.068-2.539-0.762
                                    c-0.762-0.48-0.829-1.4-1.016-2.283l0.254-6.85c0.505-0.168,0.726-1.146,0.508-1.775c-0.607-1.762-1.022-0.869-3.046-1.27
                                    c-1.966-0.387,0.517-2.283-1.777-2.283c-0.617,0-1.523-0.979-1.523-1.268c0-0.35,0.345-0.338,0.508-0.762
                                    c0.541-1.406-2.043-2.053-0.508-3.299c0.256-0.207,0.973-0.18,1.016-0.506c0.15-1.156,0.462-1.533,0.508-2.283
                                    c0.006-0.098,0.009-0.189,0.016-0.277c0.633-0.084,1.23-0.766,1.923-0.676c0.375,0.049,5.787,1.959,4.889,0.162
                                    c-0.646-1.289,1.244-1.682,2.118-2.441c0.395-0.344,2.049-0.316,3.096,0.162c0.525,0.238,1.038-0.857,1.793-0.326
                                    c5.07,3.572,3.632-0.814,6.192-0.814c0.489,0,0.985,0.082,1.467,0c0.106-0.018,0.078-0.096,0.163-0.162
                                    c0.102-0.082,0.13-0.199,0.162-0.326c0.102-0.387,0.114,0.055,0.163-0.326c0.072-0.555,0.002-0.066,0.163-0.324
                                    c0.203-0.324-0.18-0.789-0.488-0.814c-0.187-0.016-0.618-0.035-0.815,0c-0.368,0.066-0.396,0.066-0.488,0.326
                                    c-0.073,0.203-0.041,0.309-0.163,0.488c-0.062,0.09-0.069,0.109-0.163,0.162c-0.242,0.137-0.167,0.205-0.489,0.162
                                    c-0.275-0.033-0.162-0.217-0.162-0.488c0-0.82,0.378-1.086-0.163-1.627c-0.686-0.686-2.437-0.842-2.771-1.467
                                    c-0.54-1.01,0.013-1.574,0.326-2.279c0.264-0.594,0.292-1.492,0.814-1.629c0.933-0.242,1.168-0.738,1.271-1.529
                                    c0.044-0.34,3.342-0.588,4.433-0.588v1.793c0,0.764-0.197,1.92,0.652,2.115c1.271,0.295,2.46,1.279,2.933,2.443
                                    c0.063,0.156-0.072,0.508,0,0.65c0.059,0.117,1.011,1.824,1.011,1.824c0.979,0.129,2.64,0.264,2.64-0.781
                                    c0-0.9,0.433-1.758,1.498-1.758c2.031-0.855,1.767-2.02,3.911-2.02c1.032,0,2.103-1.268,3.259-0.326
                                    c1.464,1.193,3.172-0.148,4.205-0.391c1.784-0.418,0.966-1.922,2.933-1.922c0.983-0.195,1.547,0.086,2.542-0.162
                                    c1.606-0.4,0.593-2.553,1.531-2.834c0.561-0.168-0.268-1.543,0.1-1.727c0.756-0.377,1.792-0.342,1.785-1.307
                                    c0.689-0.279,1.513-0.934,1.528-1.313c0.059-1.467-0.193-3.08,0.195-4.496c0.376-1.375,0.074-2.047-0.977-2.672
                                    c-0.747-0.443-0.23-1.182-0.131-1.891h2.409l7.42,6.777c0.46,0.461,0.741,1.68,1.106,2.215c0.208,0.307,0.684,0.148,0.911,0.588
                                    c0.134,0.258-0.059,1.26,0,1.563c0.11,0.564,2.474,1.266,2.474,2.15c0,1.291,0.681,1.648,0.846,2.672
                                    c0.176,1.088,1.248,0.092,1.302,1.238c0.058,0.016,0.561,0.744,0.847,0.912c0.674,0.396,2.285-0.215,3.124,0.393
                                    c0.675,0.486,2.018,0.371,2.669-0.131c0.933-0.721,1.405-0.43,2.277-0.912c0.555-0.309,1.503-0.795,2.083,0
                                    c0.377,0.514,1.692,3.285,1.692,3.584c0,1.676,0.651,1.281,0.651,2.736c0,0.438,0.13,0.691,0.13,1.174
                                    c-1.192,0.596,0.28,1.654-1.952,2.02c-1.256,0.207,0.611,2.803-0.781,3.389c-3.246,1.365,3.332,3.629,3.84,4.822
                                    c0.726,1.701,2.081,2.693,3.971,2.477c2.079-0.24,1.008,0.467,2.668,0.717c0.591-0.443,0.714-1.145,1.563-1.369
                                    c0.947-0.25,0.365-1.41,0.977-2.02c0.05-0.051,1.26-0.225,1.627-0.521c0.351-0.283,1.253-1.625,1.628-1.76
                                    c1.586-0.572,0.348-2.48,2.018-2.803c0.669-0.129,1.313,0,1.888-0.326c2.179-1.23,1.839,3.105,1.562,4.172
                                    c-0.311,1.199-1.242,0.535-2.232,0.885c0,1.59,2.104,1.143,3.553,1.291c0.689,0.07,0.646,2.199,0.323,3.229
                                    c-0.414,1.326,1.04,3.102,1.292,2.26c0.063-0.205,0.108-0.322,0.323-0.322c0.216,0,0.386,0.117,0.323,0.322
                                    c-0.075,0.248-0.562,0.543-0.323,0.645c0.396,0.172,0.864-0.049,1.293,0c0.52,0.061,0.012-0.066,0.323,0.646
                                    c0.349,0.805,3.8,0.895,4.839,0.957l0.376,5.281l32.582-0.75l-7.107,21.953c2.328,0.105,4.2,0.203,4.2,2.26v3.227
                                    c0,0.678,0.32,2.539-0.323,2.584c-1.719,0.119-1.292-0.121-1.292,1.613c0,1.021-0.713,0.908-0.646,2.26
                                    c0.038,0.773,0.082,1.531,0.126,2.287c-2.615-0.58-5.332-1.098-7.133-2.518c-3.321-0.275-6.628-2.453-9.67-1.006
                                    c-0.677,0.322-5.409,0.332-6.044-0.201c-1.317-1.109,2.469-0.789,2.619-0.807c0.327-0.037,2.36-2.156,2.618-2.416
                                    c1.199-1.197-0.47-3.555-2.216-1.811c-0.798,0.797-0.337,0.297-1.611,0.402c-0.999,0.082-0.585,1.902-1.612,2.617
                                    c-0.898,0.625,0.086,0.881-1.813-0.805c0.99-0.33,0.402-1.012,0.402-2.014c0-0.182,0.017-0.992,0-1.008
                                    c-0.547-0.521-1.388,0.227-1.813-0.402c-0.294-0.436,0.084-0.816-1.209-0.201c-0.121,0.059-0.1,0.115-0.201,0.201
                                    c-0.966,0.813-0.566,0.563-0.201,1.611c0.353,1.014-0.422,1.391-1.008,0.805c-0.305-0.305-1.396-0.227-2.015-0.201
                                    c-0.482,0.021-1.339,0.332-1.611,0.604c-0.86,0.859,0.595,0.527,1.611,0.605c1.067,0.08,0.402-0.195,0.402,0.402
                                    c0,1.338,5.175,1.387,6.447,1.811c0,0.686-2.565,0.807-3.224,0.807c-1.428,0-2.423-0.574-3.626-0.807
                                    c-1.714-0.328-3.148,0.416-4.835,0.807c-1.427,0.33-1.014,1.113-1.209,2.818c-0.036,0.313-1.082,0.801-1.382,1.084
                                    c-4.188,4.357-12.272,6.943-19.381,8.824c-1.74,0.461-2.737,2.809-5.996,3.686c-5.085,1.367-11.701,3.547-14.979,3.547
                                    c-8.806,0-14.644-4.863-22.815-6.496c-6.153-0.367-12.021-0.404-12.389,0.246c-1.705,3.016-5.854-4.32-9.444-5.395
                                    c-2.946-0.881-17.422-4.918-19.504-6.742C602.055,595.73,600.657,594.425,599.129,593.103z" />
                                        <path id="guerrero" opacity="0.75" fill="#e8e8b1" stroke="#717171"
                                            stroke-width="0.25" d="M488.821,543.622
                                    c-0.069-0.104-0.15-0.199-0.262-0.281c-1.067-0.777-0.83-0.615-1.663-1.762c-0.797-1.1-0.339-3.287,0.099-4.604
                                    c0.51-1.533,2.016-1.076,3.423-1.076c0.641,0,2.256-2.182,3.326-2.449c0.557-0.139,4.304,0.377,4.304-0.881
                                    c0-0.516-0.831-1.195-1.174-1.469c-0.514-0.412-0.489-1.535-0.489-2.252c0-1.383-0.391-3.035-0.391-4.211
                                    c0-0.586,0.442-0.768,0.587-1.273c0.195-0.686,0.122-1.617,0-2.352c-0.124,0,1.537,0.283,2.054,0.295
                                    c0.712,0.016,1.442,0.023,2.152,0c0.619-0.021,1.371-0.869,1.663-0.686c0.877,0.549,1.807,1.111,3.032,1.371
                                    c0,0.953,1.382,2.547,2.445,2.547c0.952,0,4.231-0.027,4.598-0.785c0.558-1.154,9.014-1.074,10.467-0.979
                                    c0.172,0.43,1.473,2.881,1.565,2.938c0.707,0.443,2.298-0.283,3.13-0.391c0.321-0.043,0.651-0.686,1.37-0.686
                                    c2.008,0,1.762,0.037,2.348,1.469c0.705,1.723,2.354,1.734,4.011,2.84c0.81,0,0.68-3.764,0.488-3.918
                                    c-1.001-0.803-1.134-0.363-2.445-1.174c-1.746-1.082-1.858-1.035-1.858-2.939c0-1.313-0.778-1.078-1.076-2.154
                                    c-0.099-0.357,0.681-2.023,0.27-2.264c-1.598-0.457-2.301-3.592,0.11-3.416c0.58,0.041,2.099,1.049,2.555,0.393
                                    c0.615-0.887-0.331-1.078,1.174-1.078c1.164,0,0.206-1.162,1.482-1.445c-0.097,0.422-0.182,0.805-0.142,1.469
                                    c0.172,2.834,2.414,0.912,3.499,1.59c0.464,0.289-0.771,0.252-0.795,0.635c-0.116,1.756,1.265,0.846,2.226,0.477
                                    c0.432-0.166,1.515,0.215,1.113,0.795c-0.331,0.48-1.472,0.395-1.59,0.637c-0.39,0.793-0.159,2.773-0.159,3.654
                                    c0,0.707,3.231,0.533,2.386,2.225c-0.212,0.424-1.596,0.773-1.113,1.59c0.899,1.523,1.164,1.004,2.227,2.066
                                    c0.781,0.779,0.713,2.279,2.067,2.859c1.909,0.881,0.545-0.766,1.272-1.271c0.914-0.637,2.648-0.262,3.181-1.111
                                    c0.702-1.123-1.091-2.438,0.954-3.18c1.899-0.689,0.897-0.545,1.749-1.906c0.596-0.953-0.028-1.518,1.59-0.318
                                    c1.33,0.986,1.926,1.498,2.386-0.158c0.367-1.322,4.857-1.262,6.202-1.43v-2.543c0-1.357,2.939,0.576,2.386-1.748
                                    c-0.103-0.432-0.596-2.436,0.318-2.225c1.95,0.447,0.739,0.311,1.908,0.953c0.081,0.043-0.084,1.146,0.636,1.588
                                    c0.896,0.551,2.222,1.59,3.335,1.588c0.232,0.613,0.224,1.176,0.509,1.803c0.566,1.242,1.82,0.59,2.302,1.709
                                    c0.056,0.129,0.399,1.09,0.446,1.115c0.427,0.238-0.535,0.912-0.298,1.338c0.796,1.434,0.334,0.893,3.118,0.893
                                    c0,1.602,1.246,0.893,2.599,0.893c0.572,0,0.393,0.342,0.816,0.371c0.991,0.068,1.298,0.166,2.079,0.594
                                    c0.071,0.039,0.159,0.168,0.223,0.225c0.248,0.219,0.194,0.232,0.371,0.52c0.167,0.271,0.877-0.182,1.113-0.148
                                    c0.086,0.012,0.104,1.262,0.149,1.486c0.129-0.031,0.257-0.059,0.403-0.086c-0.058,0.156-0.111,0.314-0.131,0.48
                                    c-0.058,0.5,0.166,1.359,0,1.791c-0.558,1.449,2.395-0.018,1.467,1.467c-0.815,1.303,1.4,0.469,1.466,0.977
                                    c0.027,0.211,2.097,0.846,2.771,2.117c0.23,0.434-0.245,2.387-0.163,2.441c0.775,0.531,2.681-0.414,3.423,0.326
                                    c0,0.797-0.049,1.648,0,2.443c0.018,0.307,0.682,0.162,0.978,0.162c1.183,0-0.039,1.141,1.466,1.141c0.747,0,1.772,0.404,2.607,0
                                    c0.123-0.061-0.172-0.814,0.163-0.977c0.685-0.332,0.53-0.49,1.304-0.49c1.536,1.844,1.264-0.488,2.607-0.488
                                    c1.828,0,0.92,2.5,1.955,3.584c0.298,0.311,0.578,0.389,0.848,0.35c-0.007,0.088-0.01,0.18-0.016,0.277
                                    c-0.046,0.75-0.357,1.127-0.508,2.283c-0.043,0.326-0.76,0.299-1.016,0.506c-1.535,1.246,1.049,1.893,0.508,3.299
                                    c-0.163,0.424-0.508,0.412-0.508,0.762c0,0.289,0.906,1.268,1.523,1.268c2.294,0-0.188,1.896,1.777,2.283
                                    c2.023,0.4,2.438-0.492,3.046,1.27c0.218,0.629-0.003,1.607-0.508,1.775l-0.254,6.85c0.187,0.883,0.254,1.803,1.016,2.283
                                    c1.316,0.83,1.722-0.055,2.539,0.762c0.465,0.465,1.016-0.135,1.016,0.762c0,1.4-0.505,1.264,1.016,1.521
                                    c1.352,0.229,1.68-0.475,2.792,0.762c0.372,0.412,1.104,0.01,1.27,0.508c-1.539,0.287-3.046,0.975-3.046,2.537
                                    c0,2.277,0.995,8.299-1.523,8.879c-2.299,0.529-1.662,4.566-3.047,4.566c-0.558,0-1.891,0.283-2.031-0.254
                                    c-0.146-0.563-0.2-0.508-0.761-0.508c-1.372,0-2.031-0.354-2.031,1.016c0,0.779,0.915,1.662,1.016,2.537
                                    c0.057,0.498-0.264,1.447-0.508,1.775c-0.119,0.16-0.881-0.188-1.016,0.508c-0.055,0.281,0,0.912,0,1.268
                                    c-2.37,0.889-3.617-0.342-6.094-0.254c-1.212,0.045-0.572,0.404-1.269,0.508c-0.269,0.041-0.462,0.082-0.602,0.131
                                    c-2.443-2.111-5.231-4.277-6.953-4.541l-7.236-1.104c-0.288-0.043-0.063-1.82-1.104-1.348c-0.905,0.412-10.469-1.594-15.577-1.594
                                    c-2.519,0-3.063-1.008-4.784-2.082c-3.684-2.303-5.506-3.65-9.445-4.904c-8.129-2.588-15.675-7.842-26.862-8.213
                                    c-2.794-0.092-11.875-9.799-17.418-11.645c-7.992-2.66-9.677-13.699-15.895-15.338
                                    C491.736,542.331,490.11,542.955,488.821,543.622z" />
                                        <path id="veracruz" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M640.152,426.654
                                    c-0.122-0.006-0.093-0.199-0.152-0.307c-0.05-0.088-0.085-0.076-0.153-0.152c-0.151-0.166-0.062-0.406-0.153-0.611
                                    c-0.05-0.111-0.235-0.053-0.306-0.152c-0.07-0.102-0.121-0.188-0.153-0.307c-0.056-0.209,0.132-0.229,0.153-0.459
                                    c0.036-0.391,0-0.824,0-1.223c0-0.102-0.097-0.273,0-0.305c0.233-0.078,0.93-0.033,1.224,0c0.296,0.033,0.242,0.057,0.307,0.305
                                    c0.093,0.361,0.128-0.049,0.152,0.307c0.023,0.34,0,0.725,0,1.07c0,0.463,0.036,0.354-0.459,1.223
                                    C640.627,426.361,640.274,426.492,640.152,426.654z M628.833,422.068h-0.153v-0.152h-0.152c-0.123,0-0.144-0.184-0.153-0.307
                                    c-0.021-0.264-0.097-0.58,0.153-0.611c0.451-0.059,0.165,0.066,0.306,0.152c0.086,0.055,0.204,0,0.306,0
                                    c0.559,0,0.076,0.09,0.459,0.307c0.088,0.049,0.234-0.072,0.306,0c0.162,0.162-0.077,0.281,0,0.764
                                    C629.564,422.058,629.187,422.119,628.833,422.068z M750.844,562.296l-32.58,0.746l-0.376-5.281
                                    c-1.039-0.063-4.49-0.152-4.839-0.957c-0.312-0.713,0.196-0.586-0.323-0.646c-0.429-0.049-0.897,0.172-1.293,0
                                    c-0.238-0.102,0.248-0.396,0.323-0.645c0.063-0.205-0.107-0.322-0.323-0.322c-0.215,0-0.261,0.117-0.323,0.322
                                    c-0.252,0.842-1.706-0.934-1.292-2.26c0.322-1.029,0.366-3.158-0.323-3.229c-1.449-0.148-3.553,0.299-3.553-1.291
                                    c0.99-0.35,1.922,0.314,2.232-0.885c0.277-1.066,0.617-5.402-1.562-4.172c-0.575,0.326-1.219,0.197-1.888,0.326
                                    c-1.67,0.322-0.432,2.23-2.018,2.803c-0.375,0.135-1.277,1.477-1.628,1.76c-0.367,0.297-1.577,0.471-1.627,0.521
                                    c-0.611,0.609-0.029,1.77-0.977,2.02c-0.849,0.225-0.972,0.926-1.563,1.369c-1.66-0.25-0.589-0.957-2.668-0.717
                                    c-1.89,0.217-3.245-0.775-3.971-2.477c-0.508-1.193-7.086-3.457-3.84-4.822c1.393-0.586-0.475-3.182,0.781-3.389
                                    c2.232-0.365,0.76-1.424,1.952-2.02c0-0.482-0.13-0.736-0.13-1.174c0-1.455-0.651-1.061-0.651-2.736
                                    c0-0.299-1.315-3.07-1.692-3.584c-0.58-0.795-1.528-0.309-2.083,0c-0.872,0.482-1.345,0.191-2.277,0.912
                                    c-0.651,0.502-1.994,0.617-2.669,0.131c-0.839-0.607-2.45,0.004-3.124-0.393c-0.286-0.168-0.789-0.896-0.847-0.912
                                    c-0.054-1.146-1.126-0.15-1.302-1.238c-0.165-1.023-0.846-1.381-0.846-2.672c0-0.885-2.363-1.586-2.474-2.15
                                    c-0.059-0.303,0.134-1.305,0-1.563c-0.228-0.439-0.703-0.281-0.911-0.588c-0.365-0.535-0.646-1.754-1.106-2.215l-7.42-6.777
                                    h-2.409c-0.1,0.709-0.616,1.447,0.131,1.891c1.051,0.625,1.353,1.297,0.977,2.672c-0.389,1.416-0.137,3.029-0.195,4.496
                                    c-0.016,0.379-0.839,1.033-1.528,1.313c-0.739-0.244-1.007-0.457-1.134-1.299c-0.04-0.266,0.034-0.549,0-0.814
                                    c-0.107-0.822-0.313,0.543-0.326,0.652c-0.022,0.207-0.624,0.385-0.651,0.326c-0.296-0.639,0.085-0.961-0.326-1.467
                                    c-0.391-0.48-0.062-0.977-0.978-0.977c-1.258,0-0.761-0.045-1.141-0.65c-0.454-0.727-1.439-0.746-2.444-0.652
                                    c-0.458,0.043-1.862,0.277-1.956,0.652c-1.049,1.514-0.236,0.977-2.118,1.303c-0.45,0.076,0.271,1.719-0.814,0.977
                                    c-1.007-0.689-0.651-2.154-0.651-3.258c0-0.205,0.025-0.449,0-0.65c-0.072-0.561-0.435,0.469-0.978,0.162
                                    c-0.541-0.305,0.288-2.117-0.979-2.117c-0.521,0-0.985,0.049-1.467,0.164c-0.822,0.195-0.432,0.488-1.304,0.488
                                    c0-0.762,0.128-0.613-0.162-0.814c-0.221-0.152-0.269-0.268-0.326-0.488c-0.095-0.365-0.737-0.816-1.141-0.977
                                    c-0.474-0.189-0.489-3.471-0.489-4.234c1.142,0,1.467,0.252,1.467-0.977c0-0.592-0.347-0.938,0.163-1.303
                                    c0.236-0.17,0.643-0.305,0.814-0.326c0.061-0.008,0.463,0.025,0.489,0c0.018-0.018,0.174-0.564,0.163-0.652
                                    c-0.032-0.246-0.338-0.41-0.652-0.488c-0.902-0.977-1.131-2.197-0.651-3.582c0.272-0.789,1.792,0.176,1.792-0.977
                                    c0-0.459-0.309-0.566-0.325-0.814c-0.076-1.086,0.42-0.76,1.304-0.814c0.5-0.029-0.18-1.373,0.325-1.465
                                    c2.949-0.541,2.031,1.465,4.563,1.465c-0.038-0.699-0.059-1.135-0.325-1.791c-0.307-0.756-0.216-0.924,0.163-1.303l0.162-0.162
                                    c0.442-0.441,0.576-0.191,0.815-0.814c0.15-0.393,0-1.508,0-1.955c0-0.539-0.39-0.268-0.489-0.65
                                    c-0.116-0.445-0.163-0.77-0.163-1.303c-1.289,0.098-0.322,0.242-1.466,0.65c-0.608,0.219-1.259,0.164-1.956,0.164h-1.304h-1.792
                                    l-0.326-1.791l-4.236-0.652c-0.124-0.533-0.163-0.668-0.163-1.139c0-0.248-0.07-0.594,0-0.814c0.039-0.125,0.052-0.043,0-0.164
                                    c-0.053-0.119-0.032-0.324-0.163-0.324h-0.163v-0.164c0-0.295-1.294,0-1.63,0c0-2.014-0.239-2.602,0.326-4.07
                                    c0.206-0.535-1.223-0.887,0.163-1.141c1.879-0.344,2.933,1.008,2.933-1.465c0-1.896-0.786-2.881,0.163-4.561
                                    c0.652-1.152,0.161-1.006,0.326-2.441c0.055-0.473,0.976-1.352,1.467-1.629c0.431-0.244,0.573-2.666,0.814-3.094
                                    c0.106-0.189,1.167-0.244,1.63-0.814c0.494-0.607,0.488-0.727,0.488-1.791c-2.111-0.904-1.206-0.324-2.444-1.791
                                    c-0.383-0.455-3.719,0.354-4.399-0.326c-0.528-0.527-0.317-1.156-1.304-1.465c-1.096-0.346-2.343,1.498-2.444,2.279
                                    c-0.176,1.35,0.69,1.064-1.141,1.303c-0.509,0.066-0.375,1.289-0.814,1.629c-0.608,0.467-0.716-1.791-1.793-1.791
                                    c-0.288,0-1.934,0.139-1.955-0.164c-0.109-1.578-0.475-0.977-2.281-0.977c-1.035-1.68,1.225-0.85,0.814-1.791
                                    c-0.133-0.307-0.234-0.725-0.326-0.814c-0.806-0.781-0.978-0.057-0.978-1.465c0-1.904-1.942-7.191,2.118-4.072
                                    c0.642,0.492,1.797,1.807,2.771,1.141c0.072-0.049,0.012-1.803,0.489-2.279c0.355-0.355,1.466-0.965,1.466-1.467v-1.139
                                    c0-0.479-0.926-0.463-1.304-0.488c-1.254-0.088-3.405-0.102-4.399-0.814c-0.964-0.693-1.304-0.646-1.304-1.791
                                    c1.553-1.553,0.736-1.297,0.489-2.932c-0.126-0.832,0.351-3.365-0.163-3.908c-0.275-0.293-2.713-0.445-3.096-0.326
                                    c-0.972,0.303-1.205,1.346-1.63,2.279c-0.224,0.492-1.141,1.725-1.141,2.279c0,0.852,0.488,0.789,0.488,1.955
                                    c0,0.955-0.576,2.693-1.141,3.258c-0.219,0.219-0.938,0.289-1.668,0.34c-0.021-0.053-0.025-0.1-0.03-0.148
                                    c-0.06-0.52-0.214-0.252-0.42-0.418c-0.391-0.318,0.119-0.271-0.631-0.42c-0.094-0.02-0.746-0.379-0.84-0.631
                                    c-1.084-2.928-4.077,1.914-5.25,3.357c-1.548,1.906-4.689,1.633-5.881,3.568c-0.438,0.713-0.818,1.107-1.26,1.889
                                    c-0.25,0.441-2.235-0.166-2.94-0.209c-0.597-0.035-0.421-2.201-0.421-2.939c0-1.621-0.586-2.029-0.049-3.059
                                    c0.689-1.32,0.805-0.916,1.52-1.348c0.601-0.361,1.273-1.91,1.68-2.518c1.334-1.129,2.311-0.725,2.311-1.471v-0.84h-1.891
                                    c-1.063,0-0.89,0.127-1.47,0.84c-0.494,0.609-1.393,0.42-2.31,0.42c-0.719,0-0.568-0.299-0.631-1.049
                                    c0.612-0.203,0.465-1.221,1.261-1.469c0.929-0.291,1.979-0.09,2.729-0.84c0.474-0.475,0.191-1.195,0.631-1.68
                                    c0.504-0.553,1.212-0.42,2.31-0.42c1.432,0,0.21,2.029,0.21,2.1c0,0.717,1.051,0.266,1.051,1.049c0,0.342-0.141,0.385,0.21,0.42
                                    c0.218,0.023,1.043,0.012,1.05,0c0.08-0.141,0.292-1.799,0.42-2.098c-0.21,0,1.051,0.221,1.051-1.471
                                    c0-1.289-0.397-1.885,0.261-2.563c0.945-0.975,1.556-2.607,2.038-3.453c0.641-1.121-1.442-7.91-4.189-4.477
                                    c-0.468,0.584-2.021,0-2.311,0c-0.386,0-1.781-0.188-2.202-0.463c-0.588-0.383,0.167-1.346-2.117-2.906l0.959-4.396l-1.633-0.094
                                    l-0.818-3.781h-1.22c-0.61,0-0.518,0.166-0.542-0.406c-0.033-0.773-0.136-1.018-0.136-1.76c0-0.404-0.213-0.26-0.271-0.406
                                    c-0.164-0.416-0.146-0.916-0.271-1.354c-0.093-0.328-0.271-0.822-0.271-1.084l4.606-2.301l-0.136-1.896
                                    c-0.388-1.744-1.083-1.193-2.71-1.625c-0.229-0.061,1.017-0.02,1.22-0.676c0.907-2.93-0.171-4.412,2.304-6.229
                                    c1.402-1.031,3.253-7.313,0.677-7.313c-1.397,0-4.253-0.377-4.606-1.625c-0.072-0.258-0.112-0.561-0.123-0.904
                                    c1.222-4.234,3.71-0.012,5.633-1.938c0.353-0.354,1.158-0.033,1.233-0.686c0.161-1.406,1.318-1.688,2.738-1.645
                                    c4.378,0.133,2.464,5.584,7.258,6.033c0.482,0.045,2.425,0.76,4.481,1.299c-0.63,0-2.878,0-2.153,0h0.15v0.15
                                    c0,0.465,0.905,0.189,1.354,0.301c0.426,0.107,0.903,0.137,0.903,0.602v0.15c0,0.174,1.092,0.275,1.203,0.301
                                    c0,4.564,2.253,7.012,4.214,10.525c0.875,1.57,2.766,4.711,4.213,5.564c2.128,1.256,4.631,1.83,4.966,4.512
                                    c0.641,1.922-0.301,5.045-0.301,6.615c0,1.014-0.042,1.383-0.301,1.955c-0.207,0.455,1.339,2.406,0.752,2.557
                                    c-2.392,0.613-2.558-2.68-2.558-4.211c0-2.047,0.301-3.355,0.301-5.414c0-1.199-1.806-0.268-1.806-1.652
                                    c0-0.938-1.663-2.309-2.709-2.707c-2.021-0.77-2.017-2.057-2.708-3.76c-0.726-1.787,1.324-1.883-1.797-2.404
                                    c0,3.299,1.083,3.357,1.768,5.549c0.633,2.023,1.209,6.395,3.534,6.561c1.497,0.105,1.096,3.574,1.767,4.541
                                    c1.334,1.916,2.319,4.189,3.282,6.307c0.839,1.842-0.703,2.018,2.02,4.289c0.968,3.865,8.172,15.619,10.604,17.658
                                    c5.307,4.449,16.062,15.537,19.266,23.557c2.826,7.076,3.26,15.16,6.989,15.799c1.961,0.336,5.629,4.77,7.321,6.307
                                    c5.265,4.785-2.897,5.531,7.825,8.98c1.812,2.262,3.222,1.639,6.794,1.639c5.321,0,9.342-0.471,14.759,0.234
                                    c1.22,0.158,4.19,4.213,4.217,4.213c5.378,0,4.216-0.611,6.794,3.746c1.307,2.209,3.353,1.875,3.982,3.512
                                    c1.231,3.201,2.296,7.123,6.793,6.086c0-1.385,5.15-0.432,6.794-0.936c1.602-0.49,2.471-1.359,3.563-2.107l1.264,2.344
                                    c0,1.201,0.255,2.143,0.255,3.311c0,1.594,0.492,0.596,1.02,1.529c0.22,0.389-1.525,2.184-0.51,3.566
                                    c0.231,0.316,2.581-0.27,3.06,0c1.535,0.867-0.888,1.41,2.039,2.549c1.24,0.928,1.614,2.705,3.314,2.803
                                    c1.592,0.09,3.981,1.066,3.569,2.547c-0.478,1.719,2.007,1.563,2.295,2.293c0.025,0.064,0.51,4.434-0.255,4.84
                                    c-1.607,0.857,0.623,2.814-0.255,5.096c-0.424,1.102-2.733,0.184-3.569,1.02c-0.941,0.939,0.201,1.82-0.255,2.293
                                    C752.414,561.974,751.663,562.023,750.844,562.296z" />
                                        <path id="puebla" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M585.582,527.896
                                    c0.301-0.055,0.594-0.094,0.933-0.137c0.405-0.053,0.39-0.605,0.594-0.893c0.049-0.068,0.326-0.574,0.371-0.668
                                    c0.202-0.426-0.133-0.428,0.371-0.447c0.225-0.008,0.446-0.043,0.669-0.074c0.176-0.527,2.301-0.295,2.301-1.189
                                    c0-1.344-0.071-1.506,1.263-1.709c0.532-0.08,1.379-0.375,1.188,0.148c-0.295,0.809,0.68,0.125,1.039,0.371
                                    c0.354,0.242-0.332,0.521,0.521,0.521c0.531,0,0.807,0.273,1.039,0.594c0.564,0.777,0.044,0.336,1.039,0.148
                                    c0.186-1.861,0.409-1.752-0.668-3.492c-0.957-1.549,0.985-3.473-1.41-3.568c-0.759-0.029,0.507-2.688,0.371-2.824
                                    c-0.205-0.205-0.656,0.092-0.595-0.445c0.134-1.166,1.437-1.953,1.188-2.824c-0.217-0.768,1.108-0.691,1.855-1.189v-4.58
                                    l0.187-0.211l0.318-2.066l-0.636-0.477c-0.203-0.152-0.415,0.266-0.478-0.158c-0.046-0.313,0.075,0.002,0.159-0.318
                                    c0.095-0.367,0.159-0.523,0.159-0.953c0-0.316-0.162-0.766,0.159-0.795c0.306-0.027,0.456,0.137,0.477-0.158
                                    c0.014-0.213,0.107-0.453,0-0.637c-0.064-0.109-0.238-0.059-0.318-0.158c-0.116-0.146-0.346-0.68,0-0.795
                                    c0.261-0.559,0.611-1.098,0.478-1.748c-0.018-0.084-0.28-0.613-0.318-0.637c-0.045-0.027-0.407,0.002-0.477,0
                                    c-0.765-0.016-2.673-0.158-1.909-0.158h0.159c0.262,0-0.212-0.158,0.318-0.158h0.636l0.455-5.682l2.194,0.074l3.19,2.35
                                    l1.334,3.836l3.522,2.207l1.46,1.955c0.896,0,1.434-0.369,1.434,0.453c0,0.318,0.063,0.424,0.075,0.68
                                    c0.034,0.729,0.644-0.129,0.83,0.68c0.146,0.631-0.135,0.66,0.604,0.68c0.516,0.014,0.734-0.09,1.132-0.15
                                    c0.497-0.076,0.604-0.336,0.604-0.832l0.075-0.377c0.026-0.133,0.652-0.393,0.755-0.529l3.696-3.398
                                    c0.459,0.035,0.825,0.736,0.755,1.057c-0.104,0.477,1.056,0.316,1.434,0.379c0.483,0.08,0.658,0.123,0.679-0.379
                                    c0.052-1.213,1.887,0.609,1.887-1.434c0-3.07,0.474-2.268,3.093-2.268c1.232,0,1.964,0.227,3.169,0.227
                                    c1.294,0,0.98-0.627,1.585-0.83c-0.047-0.1-3.194-2.531-2.942-2.266c0.578,0.611-1.172-0.109-1.736-0.303
                                    c-1.366-0.467-0.272-1.738-0.829-2.189c-0.575-0.469-1.7-1.074-2.414-1.135c-1.578-0.131-0.854-2.318-2.264-2.719
                                    c-0.529-0.15-1.256,0.313-1.434-0.15c-0.252-0.654,0.232-1.73-0.302-2.266l-4.301-1.209c-0.05,0.908-0.263,0.861-1.056,0.982
                                    c-0.239,0.035,0.13,0.51-0.303,0.301c-0.75-0.361-1.109-0.771-1.961-0.98l-0.888-0.557c0.755-1.424-0.935-2.465-1.666-3.289
                                    c-1.041-1.176-0.681-2.918,0.42-3.568c2.41-1.422,2.585-5.693,4.411-7.977c0.857-1.07,0.207-0.842-0.841-1.889
                                    c-0.859,0-0.112-0.707-1.26-0.838c-0.47-0.055,0.099-1.637-0.84-1.051c-0.914,0.57,0.134,1.848-1.891,1.68
                                    c-0.979-0.08-1.763-0.613-1.26-1.889c0.524-1.332,2.901-0.604,3.99-0.84c0.68-0.146,1.808-2.283,2.101-2.938
                                    c0.233-0.521,0.517-2.014,0.84-2.1c1.697-0.449,1.262,0.207,2.311-1.469c0-0.76,0.449-1.252,0.45-1.951
                                    c0.729-0.051,1.449-0.121,1.668-0.34c0.564-0.564,1.141-2.303,1.141-3.258c0-1.166-0.488-1.104-0.488-1.955
                                    c0-0.555,0.917-1.787,1.141-2.279c0.425-0.934,0.658-1.977,1.63-2.279c0.383-0.119,2.82,0.033,3.096,0.326
                                    c0.514,0.543,0.037,3.076,0.163,3.908c0.247,1.635,1.063,1.379-0.489,2.932c0,1.145,0.34,1.098,1.304,1.791
                                    c0.994,0.713,3.146,0.727,4.399,0.814c0.378,0.025,1.304,0.01,1.304,0.488v1.139c0,0.502-1.11,1.111-1.466,1.467
                                    c-0.478,0.477-0.417,2.23-0.489,2.279c-0.974,0.666-2.129-0.648-2.771-1.141c-4.061-3.119-2.118,2.168-2.118,4.072
                                    c0,1.408,0.172,0.684,0.978,1.465c0.092,0.09,0.193,0.508,0.326,0.814c0.41,0.941-1.85,0.111-0.814,1.791
                                    c1.807,0,2.172-0.602,2.281,0.977c0.021,0.303,1.667,0.164,1.955,0.164c1.077,0,1.185,2.258,1.793,1.791
                                    c0.439-0.34,0.306-1.563,0.814-1.629c1.831-0.238,0.965,0.047,1.141-1.303c0.102-0.781,1.349-2.625,2.444-2.279
                                    c0.986,0.309,0.775,0.938,1.304,1.465c0.681,0.68,4.017-0.129,4.399,0.326c1.238,1.467,0.333,0.887,2.444,1.791
                                    c0,1.064,0.006,1.184-0.488,1.791c-0.463,0.57-1.523,0.625-1.63,0.814c-0.241,0.428-0.384,2.85-0.814,3.094
                                    c-0.491,0.277-1.412,1.156-1.467,1.629c-0.165,1.436,0.326,1.289-0.326,2.441c-0.949,1.68-0.163,2.664-0.163,4.561
                                    c0,2.473-1.054,1.121-2.933,1.465c-1.386,0.254,0.043,0.605-0.163,1.141c-0.565,1.469-0.326,2.057-0.326,4.07
                                    c0.336,0,1.63-0.295,1.63,0v0.164h0.163c0.131,0,0.11,0.205,0.163,0.324c0.052,0.121,0.039,0.039,0,0.164
                                    c-0.07,0.221,0,0.566,0,0.814c0,0.471,0.039,0.605,0.163,1.139l4.236,0.652l0.326,1.791h1.792h1.304
                                    c0.697,0,1.348,0.055,1.956-0.164c1.144-0.408,0.177-0.553,1.466-0.65c0,0.533,0.047,0.857,0.163,1.303
                                    c0.1,0.383,0.489,0.111,0.489,0.65c0,0.447,0.15,1.563,0,1.955c-0.239,0.623-0.373,0.373-0.815,0.814l-0.162,0.162
                                    c-0.379,0.379-0.47,0.547-0.163,1.303c0.267,0.656,0.287,1.092,0.325,1.791c-2.531,0-1.613-2.006-4.563-1.465
                                    c-0.505,0.092,0.175,1.436-0.325,1.465c-0.884,0.055-1.38-0.271-1.304,0.814c0.017,0.248,0.325,0.355,0.325,0.814
                                    c0,1.152-1.52,0.188-1.792,0.977c-0.479,1.385-0.251,2.605,0.651,3.582c0.314,0.078,0.62,0.242,0.652,0.488
                                    c0.011,0.088-0.146,0.635-0.163,0.652c-0.026,0.025-0.429-0.008-0.489,0c-0.172,0.021-0.578,0.156-0.814,0.326
                                    c-0.51,0.365-0.163,0.711-0.163,1.303c0,1.229-0.325,0.977-1.467,0.977c0,0.764,0.016,4.045,0.489,4.234
                                    c0.403,0.16,1.046,0.611,1.141,0.977c0.058,0.221,0.105,0.336,0.326,0.488c0.29,0.201,0.162,0.053,0.162,0.814
                                    c0.872,0,0.481-0.293,1.304-0.488c0.481-0.115,0.946-0.164,1.467-0.164c1.267,0,0.438,1.813,0.979,2.117
                                    c0.543,0.307,0.905-0.723,0.978-0.162c0.025,0.201,0,0.445,0,0.65c0,1.104-0.355,2.568,0.651,3.258
                                    c1.085,0.742,0.364-0.9,0.814-0.977c1.882-0.326,1.069,0.211,2.118-1.303c0.094-0.375,1.498-0.609,1.956-0.652
                                    c1.005-0.094,1.99-0.074,2.444,0.652c0.38,0.605-0.117,0.65,1.141,0.65c0.916,0,0.587,0.496,0.978,0.977
                                    c0.411,0.506,0.03,0.828,0.326,1.467c0.027,0.059,0.629-0.119,0.651-0.326c0.013-0.109,0.219-1.475,0.326-0.652
                                    c0.034,0.266-0.04,0.549,0,0.814c0.127,0.842,0.395,1.055,1.141,1.303c0,0.961-1.036,0.926-1.792,1.303
                                    c-0.367,0.184,0.461,1.559-0.1,1.727c-0.938,0.281,0.075,2.434-1.531,2.834c-0.995,0.248-1.559-0.033-2.542,0.162
                                    c-1.967,0-1.148,1.504-2.933,1.922c-1.033,0.242-2.741,1.584-4.205,0.391c-1.156-0.941-2.227,0.326-3.259,0.326
                                    c-2.145,0-1.88,1.164-3.911,2.02c-1.065,0-1.498,0.857-1.498,1.758c0,1.045-1.66,0.91-2.64,0.781c0,0-0.952-1.707-1.011-1.824
                                    c-0.072-0.143,0.063-0.494,0-0.65c-0.473-1.164-1.662-2.148-2.933-2.443c-0.85-0.195-0.652-1.352-0.652-2.115v-1.793
                                    c-1.091,0-4.389,0.248-4.433,0.588c-0.103,0.791-0.338,1.287-1.271,1.529c-0.522,0.137-0.551,1.035-0.814,1.629
                                    c-0.313,0.705-0.866,1.27-0.326,2.279c0.334,0.625,2.085,0.781,2.771,1.467c0.541,0.541,0.163,0.807,0.163,1.627
                                    c0,0.271-0.113,0.455,0.162,0.488c0.322,0.043,0.247-0.025,0.489-0.162c0.094-0.053,0.102-0.072,0.163-0.162
                                    c0.122-0.18,0.09-0.285,0.163-0.488c0.093-0.26,0.12-0.26,0.488-0.326c0.197-0.035,0.629-0.016,0.815,0
                                    c0.309,0.025,0.691,0.49,0.488,0.814c-0.161,0.258-0.091-0.23-0.163,0.324c-0.049,0.381-0.062-0.061-0.163,0.326
                                    c-0.032,0.127-0.061,0.244-0.162,0.326c-0.085,0.066-0.057,0.145-0.163,0.162c-0.481,0.082-0.978,0-1.467,0
                                    c-2.561,0-1.122,4.387-6.192,0.814c-0.755-0.531-1.268,0.564-1.793,0.326c-1.047-0.479-2.701-0.506-3.096-0.162
                                    c-0.874,0.76-2.764,1.152-2.118,2.441c0.898,1.797-4.514-0.113-4.889-0.162c-0.996-0.131-1.797,1.342-2.771,0.326
                                    c-1.035-1.084-0.127-3.584-1.955-3.584c-1.344,0-1.071,2.332-2.607,0.488c-0.773,0-0.619,0.158-1.304,0.49
                                    c-0.335,0.162-0.04,0.916-0.163,0.977c-0.835,0.404-1.86,0-2.607,0c-1.505,0-0.283-1.141-1.466-1.141
                                    c-0.296,0-0.96,0.145-0.978-0.162c-0.049-0.795,0-1.646,0-2.443c-0.742-0.74-2.647,0.205-3.423-0.326
                                    c-0.082-0.055,0.394-2.008,0.163-2.441c-0.674-1.271-2.743-1.906-2.771-2.117c-0.065-0.508-2.281,0.326-1.466-0.977
                                    c0.928-1.484-2.024-0.018-1.467-1.467c0.166-0.432-0.058-1.291,0-1.791C585.471,528.21,585.509,528.054,585.582,527.896z" />
                                        <path id="tlaxcala" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M597.02,490.529l2.194,0.074l3.19,2.35
                                    l1.334,3.836l3.522,2.207l1.46,1.955c0.896,0,1.434-0.369,1.434,0.453c0,0.318,0.063,0.424,0.075,0.68
                                    c0.034,0.729,0.644-0.129,0.83,0.68c0.146,0.631-0.135,0.66,0.604,0.68c0.516,0.014,0.734-0.09,1.132-0.15
                                    c0.497-0.076,0.604-0.336,0.604-0.832l0.075-0.377c0.026-0.133,0.652-0.393,0.755-0.529l3.696-3.398
                                    c0.459,0.035,0.825,0.736,0.755,1.057c-0.104,0.477,1.056,0.316,1.434,0.379c0.483,0.08,0.658,0.123,0.679-0.379
                                    c0.052-1.213,1.887,0.609,1.887-1.434c0-3.07,0.474-2.268,3.093-2.268c1.232,0,1.964,0.227,3.169,0.227
                                    c1.294,0,0.98-0.627,1.585-0.83c-0.047-0.1-3.194-2.531-2.942-2.266c0.578,0.611-1.172-0.109-1.736-0.303
                                    c-1.366-0.467-0.272-1.738-0.829-2.189c-0.575-0.469-1.7-1.074-2.414-1.135c-1.578-0.131-0.854-2.318-2.264-2.719
                                    c-0.529-0.15-1.256,0.313-1.434-0.15c-0.252-0.654,0.232-1.73-0.302-2.266l-4.301-1.209c-0.05,0.908-0.263,0.861-1.056,0.982
                                    c-0.239,0.035,0.13,0.51-0.303,0.301c-0.75-0.361-1.109-0.771-1.961-0.98l-0.888-0.557c-0.063,0.09-0.124,0.184-0.195,0.277
                                    c-1.267-0.422-3.001-0.813-3.15,0.84c-0.031,0.338-0.602,0.438-0.841,0.631c-0.021,0.018-1.11,2.07-1.26,0.418
                                    c-0.098-1.078-0.66,0.061-1.05,0.211c-0.355,0.137-0.618-0.059-0.841,0.209c-0.151,0.186-0.733,0.941-1.05,1.051
                                    c-0.758,0.262-2.482,0-3.386-0.023c-0.268,0.289-0.574,0.412-0.805,0.645c-0.148,0.146-0.149,0.457-0.478,0.477
                                    c-0.59,0.033-1.205-0.045-1.272,0.477c-0.077,0.6-0.238,0.967-0.159,1.748c0.04,0.387,1.183,0.703,1.432,0.795L597.02,490.529z" />
                                        <path id="morelos" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M571.754,517.185
                                    c0.237,0.615,0.221,1.176,0.506,1.803c0.566,1.242,1.82,0.59,2.302,1.709c0.056,0.129,0.399,1.09,0.446,1.115
                                    c0.427,0.238-0.535,0.912-0.298,1.338c0.796,1.434,0.334,0.893,3.118,0.893c0,1.602,1.246,0.893,2.599,0.893
                                    c0.572,0,0.393,0.342,0.816,0.371c0.991,0.068,1.298,0.166,2.079,0.594c0.071,0.039,0.159,0.168,0.223,0.225
                                    c0.248,0.219,0.194,0.232,0.371,0.52c0.167,0.271,0.877-0.182,1.113-0.148c0.086,0.012,0.104,1.262,0.149,1.486
                                    c0.426-0.107,0.85-0.16,1.336-0.223c0.405-0.053,0.39-0.605,0.594-0.893c0.049-0.068,0.326-0.574,0.371-0.668
                                    c0.202-0.426-0.133-0.428,0.371-0.447c0.225-0.008,0.446-0.043,0.669-0.074c0.176-0.527,2.301-0.295,2.301-1.189
                                    c0-1.344-0.071-1.506,1.263-1.709c0.532-0.08,1.379-0.375,1.188,0.148c-0.295,0.809,0.68,0.125,1.039,0.371
                                    c0.354,0.242-0.332,0.521,0.521,0.521c0.531,0,0.807,0.273,1.039,0.594c0.564,0.777,0.044,0.336,1.039,0.148
                                    c0.186-1.861,0.409-1.752-0.668-3.492c-0.957-1.549,0.985-3.473-1.41-3.568c-0.759-0.029,0.507-2.688,0.371-2.824
                                    c-0.205-0.205-0.656,0.092-0.595-0.445c0.134-1.166,1.437-1.953,1.188-2.824c-0.217-0.768,1.108-0.691,1.855-1.189l0.094-4.686
                                    l-1.975,2.119l-2.862,0.158l-2.386-2.225l-0.795-1.906l-1.226-0.02l-0.337,0.713l-0.4-0.334l-1.534,0.135l-1.333,0.932
                                    l-1.332-0.998l-4.401-0.266l-2.358-1.732l-0.119,5.225c0,0.529-0.04,0.549,0.318,0.953c0.105,0.119,0.504,0.768,0.318,0.955
                                    c-0.213,0.213-0.175-0.189-0.318,0.158c-0.147,0.355-0.636,0.57-0.636,0.953v0.16c0,0.127-0.19-0.16-0.318-0.16h-0.478
                                    l-0.954-0.477l-2.862,2.385L571.754,517.185z" />
                                        <path id="cdmx" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M576.805,502.109l0.052-1.686
                                    c-0.369-0.207-1.082-0.482-1.113-0.795c-0.038-0.371,0.256-0.863,0.159-1.111c-0.15-0.383-0.902,0.137-1.272-0.158
                                    c-0.283-0.227-0.318-0.418-0.318-0.795c0-0.35-0.172-1.557,0.159-1.59c0.119-0.012,0.89,0.064,0.954,0
                                    c0.088-0.088,0.039-0.832,0.159-0.953c0.015-0.016,0.436-0.004,0.478,0c0.995,0.068,0.078-0.027,0.636,0.158l3.127-3.266
                                    l-0.978-0.242l0.318-1.883l1.514,0.082l-0.131-1.547l0.75-2.762l1.431,1.271l-1.112,2.361l2.703,0.816l0.636,1.748l-0.158,1.59
                                    l3.657,2.066l-0.159,3.02l1.113,0.988l-1.113,0.441l0.206,3.795l-0.337,0.713l-0.4-0.334l-1.534,0.135l-1.333,0.932l-1.332-0.998
                                    l-4.401-0.266L576.805,502.109z" />
                                        <path id="hidalgo" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M600.077,426.566l1.633,0.094l-0.959,4.396
                                    c2.284,1.561,1.529,2.523,2.117,2.906c0.421,0.275,1.816,0.463,2.202,0.463c0.289,0,1.843,0.584,2.311,0
                                    c2.747-3.434,4.83,3.355,4.189,4.477c-0.482,0.846-1.093,2.479-2.038,3.453c-0.658,0.678-0.261,1.273-0.261,2.563
                                    c0,1.691-1.261,1.471-1.051,1.471c-0.128,0.299-0.34,1.957-0.42,2.098c-0.007,0.012-0.832,0.023-1.05,0
                                    c-0.351-0.035-0.21-0.078-0.21-0.42c0-0.783-1.051-0.332-1.051-1.049c0-0.07,1.222-2.1-0.21-2.1c-1.098,0-1.806-0.133-2.31,0.42
                                    c-0.439,0.484-0.157,1.205-0.631,1.68c-0.751,0.75-1.801,0.549-2.729,0.84c-0.796,0.248-0.648,1.266-1.261,1.469
                                    c0.063,0.75-0.088,1.049,0.631,1.049c0.917,0,1.815,0.189,2.31-0.42c0.58-0.713,0.406-0.84,1.47-0.84h1.891v0.84
                                    c0,0.746-0.977,0.342-2.311,1.471c-0.406,0.607-1.079,2.156-1.68,2.518c-0.715,0.432-0.83,0.027-1.52,1.348
                                    c-0.537,1.029,0.049,1.438,0.049,3.059c0,0.738-0.176,2.904,0.421,2.939c0.705,0.043,2.69,0.65,2.94,0.209
                                    c0.441-0.781,0.821-1.176,1.26-1.889c1.191-1.936,4.333-1.662,5.881-3.568c1.173-1.443,4.166-6.285,5.25-3.357
                                    c0.094,0.252,0.746,0.611,0.84,0.631c0.75,0.148,0.24,0.102,0.631,0.42c0.206,0.166,0.36-0.102,0.42,0.418
                                    c0.09,0.785-0.42,1.291-0.42,2.1c-1.049,1.676-0.613,1.02-2.311,1.469c-0.323,0.086-0.606,1.578-0.84,2.1
                                    c-0.293,0.654-1.421,2.791-2.101,2.938c-1.089,0.236-3.466-0.492-3.99,0.84c-0.503,1.275,0.281,1.809,1.26,1.889
                                    c2.024,0.168,0.977-1.109,1.891-1.68c0.938-0.586,0.37,0.996,0.84,1.051c1.147,0.131,0.4,0.838,1.26,0.838
                                    c1.048,1.047,1.698,0.818,0.841,1.889c-1.826,2.283-2.001,6.555-4.411,7.977c-1.101,0.65-1.461,2.393-0.42,3.568
                                    c0.778,0.879,2.645,2.002,1.471,3.566c-1.267-0.422-3.001-0.813-3.15,0.84c-0.031,0.338-0.602,0.438-0.841,0.631
                                    c-0.021,0.018-1.11,2.07-1.26,0.418c-0.098-1.078-0.66,0.061-1.05,0.211c-0.355,0.137-0.618-0.059-0.841,0.209
                                    c-0.151,0.186-0.733,0.941-1.05,1.051c-0.758,0.262-2.482,0-3.36,0c0-0.74,0.173-1.582-0.42-1.889
                                    c-0.781-0.406-2.045,0.111-2.94-0.211c-0.158-0.057,0.084-0.309,0.21-0.42c0.422-0.373,0.717-0.002,1.05-0.42
                                    c0.404-0.504,1.148-0.479,1.471-1.049c0.041-0.072,0.612-0.813,0.42-1.049c-0.201-0.248-0.553-0.254-0.63-0.631
                                    c-0.068-0.33-0.113-0.734-0.21-1.049c-0.186-0.6-0.294-1.758-0.63-1.889c-0.414-0.162-1.785-0.107-1.891,0.209
                                    c-2.439-0.162-0.887,0-4.83,0c-1.506,0-1.16,0.512-1.681,0.631c-0.233,0.053-3.444,3.816-3.15,1.258
                                    c0.061-0.52-0.716-1.014-0.63-1.678c0.046-0.357,0.981-0.141,1.26-0.42c0.536-0.535,1.471-1.008,1.471-2.1
                                    c0-1.768-3.826-0.725-3.36-1.469c0.477-0.762-1.885,0.377-1.891,0.42c-0.125,0.969,0.665-0.02-0.21,1.26
                                    c-0.415,0.607-0.844,4.197-1.47,4.197c-1.031,0-1.937,0.123-2.94,0.209c-0.606,0.053-0.933,0.375-1.26,1.051
                                    c-0.25,0.514-1.08-0.014-1.261,0.209c-0.272,0.336-0.63,2.379-0.63,0.631c0-1.057-2.041-3.76-2.73-3.988
                                    c-1.878-1.096-0.112-1.236,0-2.1c0.246-1.891,0.602-1.322-0.84-1.889c-0.409-0.16-1.038-3.766-1.47-4.197
                                    c-0.329-0.328-1.856-1.881-1.891-1.889c-1.16-0.307-3.892,1.148-4.41,0.629c-0.297-0.297-0.115-1.215-0.841-1.258
                                    c-1.772-0.109-1.717-1.377-3.115-2.408l0.568-8.686c0.727,0.336,2.619,0.76,3.196,0c0.789-1.039-0.619-0.512,0.71-0.887
                                    c0.899-0.254,2.37-0.35,2.486-1.242c0.063-0.488,1.588,0.238,1.953-0.711c0.638-1.656,1.775-0.715,1.775-2.838
                                    c0-0.885-1.543-7.041,1.066-5.855c0.872,0.395,2.308-0.326,2.308-1.42c0-1.512,0.982-0.732,1.243-1.775l0.178-0.887
                                    c0.054-0.271-1.907-0.799-1.953-1.242c-0.074-0.723,0.178-1.127,0.178-1.775c0-1.752-0.156-1.332,1.598-1.242
                                    c1.46,0.076,1.786,0.449,2.664,0.711c0.697,0.209,1.251,0.545,1.598-0.355c0.385-1.002,2.265-0.742,3.374-0.887
                                    c0.618-0.08,1.146-1.73,1.555-1.73l-0.258-2.531c0.263-0.457,1.35-1.832,2.027-1.441c0.916,0.527,1.079,1.211,2.168,1.354
                                    c0.201,0.025,0.313,1.5,0.406,1.76c0.152,0.422,1.541,0.947,2.168,0.947c1.126,0,3.306,0.854,4.2,0.406
                                    c0.316-0.158,0.618-0.617,0.813-0.813c0.03-0.031,0.103-0.217,0.135-0.27c0.105-0.176,0.387-0.217,0.542-0.406
                                    c0.172-0.211,0.427-0.604,0.678-0.678c0.235-0.07,1.084-0.428,1.084-0.678c-0.061-0.787-0.213-0.947-0.948-0.947
                                    c-0.23,0-0.515-0.004-0.678-0.135c-0.282-0.229-0.384-0.131-0.813-0.271c-0.269-0.088-0.543-0.557-0.543-0.813
                                    c0-0.537-0.135-0.941-0.135-1.488L600.077,426.566z" />
                                        <path id="_estadodemexico" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M598.324,486.031
                                    c-0.241,0.313-0.574,0.412-0.805,0.645c-0.148,0.146-0.149,0.457-0.478,0.477c-0.59,0.033-1.205-0.045-1.272,0.477
                                    c-0.077,0.6-0.238,0.967-0.159,1.748c0.04,0.387,1.183,0.703,1.432,0.795l-0.478,6.039h-0.636c-0.53,0-0.057,0.158-0.318,0.158
                                    h-0.159c-0.764,0,1.145,0.143,1.909,0.158c0.069,0.002,0.432-0.027,0.477,0c0.038,0.023,0.301,0.553,0.318,0.637
                                    c0.134,0.65-0.217,1.189-0.478,1.748c-0.346,0.115-0.116,0.648,0,0.795c0.08,0.1,0.254,0.049,0.318,0.158
                                    c0.107,0.184,0.014,0.424,0,0.637c-0.021,0.295-0.171,0.131-0.477,0.158c-0.321,0.029-0.159,0.479-0.159,0.795
                                    c0,0.43-0.064,0.586-0.159,0.953c-0.084,0.32-0.205,0.006-0.159,0.318c0.063,0.424,0.274,0.006,0.478,0.158l0.636,0.477
                                    l-0.318,2.066l-2.067,2.225l-2.862,0.158l-2.386-2.225l-0.795-1.906h-1.272l-0.159-3.814l1.113-0.441l-1.113-0.988l0.159-3.02
                                    l-3.657-2.066l0.158-1.59l-0.636-1.748l-2.703-0.816l1.112-2.361l-1.431-1.271l-0.75,2.762l0.131,1.547l-1.514-0.082l-0.318,1.883
                                    l0.978,0.242l-3.127,3.266c-0.558-0.186,0.359-0.09-0.636-0.158c-0.042-0.004-0.463-0.016-0.478,0
                                    c-0.12,0.121-0.071,0.865-0.159,0.953c-0.064,0.064-0.835-0.012-0.954,0c-0.331,0.033-0.159,1.24-0.159,1.59
                                    c0,0.377,0.035,0.568,0.318,0.795c0.37,0.295,1.122-0.225,1.272,0.158c0.097,0.248-0.197,0.74-0.159,1.111
                                    c0.031,0.313,0.744,0.588,1.113,0.795l-0.171,6.91c0,0.529-0.04,0.549,0.318,0.953c0.105,0.119,0.504,0.768,0.318,0.955
                                    c-0.213,0.213-0.175-0.189-0.318,0.158c-0.147,0.355-0.636,0.57-0.636,0.953v0.16c0,0.127-0.19-0.16-0.318-0.16h-0.478
                                    l-0.954-0.477l-2.862,2.385v4.926c-1.118,0-2.444-1.039-3.34-1.59c-0.72-0.441-0.555-1.545-0.636-1.588
                                    c-1.169-0.643,0.042-0.506-1.908-0.953c-0.914-0.211-0.421,1.793-0.318,2.225c0.554,2.324-2.386,0.391-2.386,1.748v2.543
                                    c-1.345,0.168-5.835,0.107-6.202,1.43c-0.46,1.656-1.056,1.145-2.386,0.158c-1.618-1.199-0.994-0.635-1.59,0.318
                                    c-0.852,1.361,0.15,1.217-1.749,1.906c-2.045,0.742-0.252,2.057-0.954,3.18c-0.532,0.85-2.267,0.475-3.181,1.111
                                    c-0.728,0.506,0.637,2.152-1.272,1.271c-1.354-0.58-1.286-2.08-2.067-2.859c-1.063-1.063-1.327-0.543-2.227-2.066
                                    c-0.482-0.816,0.901-1.166,1.113-1.59c0.846-1.691-2.386-1.518-2.386-2.225c0-0.881-0.23-2.861,0.159-3.654
                                    c0.118-0.242,1.259-0.156,1.59-0.637c0.401-0.58-0.682-0.961-1.113-0.795c-0.961,0.369-2.342,1.279-2.226-0.477
                                    c0.024-0.383,1.259-0.346,0.795-0.635c-1.085-0.678-3.327,1.244-3.499-1.59c-0.04-0.664,0.045-1.07,0.229-1.496l6.646-7.832
                                    c3.52-1.174,1.957-3.674,1.957-6.463c0-0.674,2.842-3.715,3.912-3.818c2.074-0.201,1.078-3.719,0.686-3.623
                                    c-1.766,0.42-0.72,0.154-1.272-1.273c-0.469-1.217-2.532-0.521-1.467-2.547c0.619-1.176,0.089-1.371,1.956-1.371
                                    c1.9,0,1.957-0.912,1.957-2.645c0-1.734,2.055-1.211,2.055-3.33c-0.267-1.064-2.02-1.223-2.153-2.252
                                    c-0.02-0.15-0.156-0.996-0.184-1.646c1.858,0.041,1.009-0.047,1.892-1.193c0.29-0.375,0.45-0.271,0.711-0.531
                                    c0.641-0.641,0.312,0.537,1.243-0.178c0.766-0.59,0.15-0.623,1.421-0.711c0.486-0.033,0.354-1.148,0.354-1.596
                                    c0-1.408-1.637-0.85-0.71-1.775c0.113-0.113,0.412-1.498,0.532-1.773c0.139-0.318-0.606-1.127,0-0.889
                                    c0.152,0.061,1.065,0.352,1.065,0c0-0.201-0.959-0.887,0.178-0.887c0.771,0,1.231,0.178,1.918,0.168
                                    c1.398,1.031,1.343,2.299,3.115,2.408c0.726,0.043,0.544,0.961,0.841,1.258c0.519,0.52,3.25-0.936,4.41-0.629
                                    c0.034,0.008,1.562,1.561,1.891,1.889c0.432,0.432,1.061,4.037,1.47,4.197c1.441,0.566,1.086-0.002,0.84,1.889
                                    c-0.112,0.863-1.878,1.004,0,2.1c0.689,0.229,2.73,2.932,2.73,3.988c0,1.748,0.357-0.295,0.63-0.631
                                    c0.181-0.223,1.011,0.305,1.261-0.209c0.327-0.676,0.653-0.998,1.26-1.051c1.004-0.086,1.909-0.209,2.94-0.209
                                    c0.626,0,1.055-3.59,1.47-4.197c0.875-1.279,0.085-0.291,0.21-1.26c0.006-0.043,2.367-1.182,1.891-0.42
                                    c-0.466,0.744,3.36-0.299,3.36,1.469c0,1.092-0.935,1.564-1.471,2.1c-0.278,0.279-1.214,0.063-1.26,0.42
                                    c-0.086,0.664,0.69,1.158,0.63,1.678c-0.294,2.559,2.917-1.205,3.15-1.258c0.521-0.119,0.175-0.631,1.681-0.631
                                    c3.943,0,2.391-0.162,4.83,0c0.105-0.316,1.477-0.371,1.891-0.209c0.336,0.131,0.444,1.289,0.63,1.889
                                    c0.097,0.314,0.142,0.719,0.21,1.049c0.077,0.377,0.429,0.383,0.63,0.631c0.192,0.236-0.379,0.977-0.42,1.049
                                    c-0.322,0.57-1.066,0.545-1.471,1.049c-0.333,0.418-0.628,0.047-1.05,0.42c-0.126,0.111-0.368,0.363-0.21,0.42
                                    c0.896,0.322,2.159-0.195,2.94,0.211C598.523,484.472,598.324,485.29,598.324,486.031z" />
                                        <path id="bajacaliforniasur" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M132.884,195.298L132.884,195.298
                                    c-0.265,0.025-0.531,0.059-0.803,0.106c-1.551,0.268-1.031,1.718-2.188,1.85c-0.683,0.078-2.76-1.326-3.703-1.514
                                    c0.637,0.811,2.303,3.679,3.198,4.037c0.151-0.264,0.272-0.416,0.337-0.673c0.635-0.158,0.795-1.009,1.514-1.009
                                    c2.934,0,0.337,3.563,0.337,5.045c0.88,0,0.757-0.084,1.515-0.336c0.15,0.601,0.509,1.362,0.673,2.018
                                    c0.276-0.069,0.288-0.12,0.505-0.336c0.264-0.792,0.36-0.575,0.505-1.009c1,0,1.044,0.534,1.347,1.345
                                    c0.209,0.563,1.29,0.336,1.851,0.336c0,0.797,0.184,1.514-0.842,1.514h-1.346c-0.658,0-0.776,0.255-1.346,0.336v0.336h-1.852
                                    c0-0.907-0.842-1.59-0.842-2.523c-0.528-0.132-1.028-0.954-1.514-1.009c-0.639-0.073-1.372,0-2.02,0
                                    c-0.073-0.66-0.505-0.981-0.505-1.514v-1.345c-0.78-0.54-0.425-0.505-1.01-0.505c-0.081,0.245-0.7,0.443-0.841,1.009
                                    c-1.31,0.327-0.696,2.187-2.524,2.187c-1.29,0-1.74-0.346-2.693-0.504c-0.142-0.568-1.261-0.67-1.515-1.177
                                    c-0.459,0-1.705-0.594-1.851-1.178c-1.192-0.198-1.552-1.345-3.703-1.345c-2.065,0-3.569-0.673-5.386-0.673
                                    c-0.207-0.62-2.172-0.792-2.356-1.345c-0.744,0-1.666-0.168-2.524-0.168v0.505c0.298,0.099,0.841,0.346,0.841,0.84
                                    c0.225,0.075,0.267,0.223,0.337,0.505h0.673c2.753,1.204,4.208,2.215,4.208,5.382c2.096,0,5.049-0.438,5.049,1.85
                                    c0,7.151,7.911,3.942,7.911,11.941c0,3.776,0.797,4.541,4.712,4.541c2.856,0,1.109,2.127,2.861,2.354
                                    c0.695,0.09,2.524-1.964,2.524,0.168c0,2.621,2.525,1.215,2.525,3.868c0,2.247,4.727,0.336,5.722,0.336
                                    c1.798,0.798-0.64,4.373,1.683,4.373c0.343,1.027,1.683,0.554,1.851,2.019c0.042,0.369,1.763,2.437,2.02,2.522
                                    c0,0.615,0.337,0.648,0.337,1.177c0.76,0,1.088,0.415,1.851,0.336c0.583-0.06,0.55-0.856,1.01-1.009
                                    c0-0.561,0.505-1.194,0.505-1.85c0.566-0.142,1.845-0.504,2.356-0.504c0.087-0.35,0.339-0.421,0.673-0.505
                                    c0-0.643,0.292-0.504,0.841-0.504c0.215,0.861,0.337,2.472,0.337,3.363c1.504,0,2.734,0.168,4.039,0.168
                                    c0-0.662,0.168-1.27,0.168-2.018h0.673c0.111,0.333,1.014,0.841,1.515,0.841c0-0.614,0.557-2.057-0.337-2.354v-2.691
                                    c0.26-0.086,0.168,0.005,0.168-0.336c0.208-0.069,0.268-0.129,0.336-0.336h0.673c0,1.531-0.274,3.887,0.336,5.045
                                    c0.44,0.833,0.863,1.429,0.168,2.187c-0.339,0.371-1.345,1.961-1.515,2.018c0,3.879,1.078,1.514,2.524,1.514
                                    c2.574,0,0.707,2.449,2.02,3.532c2.722,2.247,3.576,2.41,5.217,5.382c0.299,0.541,1.61,1.385,2.188,1.85
                                    c0.704,0.566,0.329,4.46,2.861,3.196c6.592-3.291,6.884,4.624,8.833,7.354h-0.513v-0.171h-0.171c-0.364,0-0.04-0.342-0.342-0.513
                                    c-0.205-0.115-0.727,0.001-0.514,0.342c0.084,0.134,0.251,0.373,0.514,0.513c0.25,0.133,0.342-0.151,0.342,0.171v0.342
                                    c0,0.113,0.057,0.171,0.171,0.171h0.171v0.171c0,0.222,0.38,0.298,0.856,0.342c-0.093-0.277-0.251-0.407-0.343-0.684l-0.171-0.513
                                    v-0.17c0.39,0.545,0.846,0.885,1.432,0.885c0,4.083,2.372,5.733,3.872,8.578c0.996,1.889,0.336,4.847,0.336,7.063
                                    c0,2.328,0.599,5.642-1.009,7.064c-0.719,0.635-1.356,3.634-1.683,4.541c-0.811,2.246,0.673,3.06,0.673,4.877
                                    c0,2.532-1.796,2.608-0.673,5.718c0.811,2.247-0.584,3.285,1.346,5.214c3.489-4.649-0.144,0.841,4.04,0.841
                                    c0-1.598,0.841,0.613,0.841,1.346h-0.336l-0.168,0.168c0,2.494,2.524,0.98,2.524,4.205c1.06,0,0.264-1.205,0.168-1.682h0.673
                                    c0,0.659,0.337,1.021,0.337,1.682c0.801,0.267,1.079,2.018,2.693,2.018c0.125-0.499,0.394-0.508,0.505-0.84
                                    c0.58,0,1.021,0.168,1.515,0.168c0,1.397,0.845,4.372,2.356,4.372c0.852,3.405,9.762,7.064,9.762,7.4
                                    c2.914,0.971,9.323,9.418,11.95,9.418c0.117,0.588,0.813,1.887,1.346,2.02c0,4.439,7.742,7.357,7.742,7.904
                                    c1.365,0,4.881,0.51,4.881,2.018c1.175,0.391,2.861,6.488,2.861,7.4c1.239,0.412,1.683,1.656,1.683,3.195
                                    c-0.597,0.199,1.417,5.764,0.673,6.561c-0.934,0.998-0.601,3.465,0.336,3.699c0.115,0.459,0.408,0.863,0.505,1.346h0.336
                                    c0,8.883,10.168-1.447,11.781-1.85v-0.338c0.882,0,1.122-0.84,2.02-0.84c0.134-0.537,0.921-0.666,1.178-1.178
                                    c4.928-8.207,7.462-4.734,2.761-16.184c-0.583-1.422-3.903-1.621-4.612-5.176c-0.448-2.246-0.417-2.854-2.356-4.205
                                    c-1.445-1.006-2.574-2.492-2.693-3.531c-0.311-2.715-3.176-1.615-4.881-6.727c-2.436-2.029-4.335-1.477-4.881-5.719
                                    c-0.089-0.696-1.16-0.402-1.851-0.505c-3.24-0.48-2.638,0.411-2.02,0.842c1.308,0.909,1.888,3.296-0.168,3.531
                                    c-0.672,0.078-0.505,0.727-0.505,1.346c0,2.299,1.379,0.27,2.188,0.674c0.682,0.34-1.685,3.332-2.356,3.027
                                    c-2.377-1.08-1.398-3.014-2.02-4.879c-6.177-3.602-8.161-12.885-9.149-12.885c-3.158,0,3.712-6.712,1.647-10.427
                                    c-1.786-3.211-3.118-5.423-5.491-8.505c-4.003-5.2-0.018-12.355-6.041-15.365c-2.444-1.221-3.596-9.371-4.942-11.523
                                    c-2.471-3.951,4.562-7.957,1.098-7.133c-2.216,0.526-2.954-12.755-5.491-14.816c-0.908-0.737-2.495-5.031-3.295-6.311
                                    c-0.919-1.471-5.13-4.954-5.217-5.213c-1.058-0.488-2.196-1.556-2.196,0c0,2.406,0.201,1.739,1.647,2.744
                                    c2.294,1.595-2.706,5.255,2.197,5.762c3.22,0.333,3.333,3.844,0,3.567c-1.688-0.141-2.554-2.553-3.57-3.841
                                    c-0.986-1.251-2.746-0.804-2.746-3.018c0-0.771-0.226-2.179,0.275-2.744c0.897-1.014,0.623-2.672,0-3.567
                                    c-1.254-1.801-1.647-1.093-1.647-3.841c-0.494-2.14-3.433-3.868-4.942-6.036c-1.021-1.466-2.367-11.371-3.844-11.524
                                    c-9.449-0.976-8.629-10.258-10.219-16.666L132.884,195.298L132.884,195.298z M255.998,334.408c-0.405,0-4.004-0.496-3.572-1.361
                                    c1.059-2.117-1.049-2.631-2.211-3.576c-0.49-0.398,0-4.012,0-4.768c0-0.377-0.143-0.807,0.34-0.852
                                    c1.948-0.182,1.951,1.556,2.551,2.896c0.257,0.574,0.812,0.646,1.19,1.873c0.434,1.404,0.269,2.537,1.531,2.725
                                    c0.438,0.066,0.34,0.521,0.34,1.021C256.169,333.503,256.051,333.128,255.998,334.408L255.998,334.408z M240.01,324.021
                                    c0.129-0.561,0.17-0.582,0.17-1.021c0-0.415,0.462-0.463,0.85-0.682c0.342-0.193,0.17-0.881,0.17-1.362
                                    c0-0.589,0.211-0.598,0.34-1.192c0.053-0.243-0.269-0.471-0.17-0.851c0.07-0.272,1.271-0.377,0.68-0.171
                                    c-1.066,0.373-0.997-0.55-1.36-0.681c-0.642-0.232-0.585,0.225-0.681-0.511c-0.059-0.451-1.234-1.192-1.871-1.192
                                    c-1.073,0-0.68,0.746-0.68,1.703c0,0.316,0.039,0.319,0.17,0.511c0.214,0.314,0.207,1.135,0.17,1.703
                                    c-0.045,0.701-0.289,0.561-0.34,1.362c-0.013,0.19,0.104,0.474,0.17,0.511c0.425,0.236,0.631,0.007,0.68,0.34
                                    C238.46,323.495,239.28,323.681,240.01,324.021L240.01,324.021z M228.832,301.863c0.436,0.665,0.84,0.714,1.421,1.034
                                    c0.019,0.01,0.616,1.852,0.646,1.939c0.281,0.85,1.979,1.371,0.517,2.198c-0.377,0.214-0.775,1.278-0.775,1.811
                                    c0,0.331,0.112,2.087,0.259,2.069c1.029-0.125,1.184-1.37,1.291-2.198c0.047-0.366,1.177-0.896,1.55-1.034
                                    c1.288-0.48,0.904-1.839,0.904-3.233c0-0.631-0.581-0.768-0.646-1.681c-0.078-1.109,0.414-1.624-1.033-1.811
                                    c-1.582-0.205-1.854-0.693-2.971-1.94C228.508,297.36,227.245,299.441,228.832,301.863L228.832,301.863z M230.253,295.655
                                    c-0.115,0.043-0.891,0.402-1.163,0.259c-0.024-0.013-0.896-0.875-1.034-1.034c-0.365-0.427,0.247-1.153,0.129-1.423
                                    c-0.142-0.328-0.642,0.058-0.904-0.388c-0.04-0.067-0.211-0.226-0.129-0.518c0.097-0.346,2.148-0.905,2.583-0.905
                                    c0.424,0,0.103,1.308,0.259,1.422c0.355,0.261,0.794-0.091,1.033,0.517c0.123,0.314-0.23,0.841-0.388,1.035
                                    c-0.054,0.066-0.169,0.054-0.129,0.129C230.682,295.069,230.367,295.193,230.253,295.655L230.253,295.655z M227.281,278.974
                                    c-0.176,0.53-0.476,1.16-0.904,1.293c-0.255,0.079-0.887,0.477-0.904,0.646c-0.031,0.308-0.018,0.412,0.129,0.646
                                    c0.23,0.37-0.375,0.221,0.129,0.388c0.571,0.19,1.162-0.413,1.162,0.388c0,0.604-0.077,0.642,0.388,1.035
                                    c0.184,0.155,0.134,0.439,0.258,0.518c0.388,0.242,1.034-0.238,1.034-0.518c0-0.438-0.4-1.119-0.129-1.552
                                    c0.063-0.103,0.259-0.88,0.129-1.164c-0.166-0.363-0.476-0.599-0.646-0.905C227.647,279.243,227.557,279.507,227.281,278.974
                                    L227.281,278.974z M221.339,278.585c-0.546-0.294-0.619-0.646-1.163-0.646c-0.556,0-0.85-0.091-1.163,0.258
                                    c-0.225,0.251-0.371,0.861-0.387,1.165c-0.017,0.29-0.073,1.271,0.258,1.293c0.525,0.033,0.593,0.038,1.034,0.129
                                    c0.625,0.13-0.142,0.876,0.904,1.034c0.612,0.093,0.865,0.096,0.904-0.517c0.032-0.501,0.326-0.95,0.258-1.682
                                    c-0.043-0.458-0.34-0.092-0.517-0.388C221.288,278.93,221.267,279.095,221.339,278.585L221.339,278.585z M216.689,275.999
                                    c-0.38-1.65,0.674-0.988,2.067-1.293c0.781-0.171,0.179-2.039,0.517-2.715c0.189-0.379,0.457-0.239,0.646-0.518
                                    c0.635-0.93,0.998-2.298,0.258-3.362c-0.324-0.467,0.16-0.601-0.646-0.647c-1.852-0.106-1.651-0.478-1.808,1.423
                                    c-0.078,0.939-1.093,1.491-1.163,2.328c-0.07,0.854-0.167,1.409-0.258,2.069c-0.019,0.138-0.332,0.542-0.388,0.647
                                    C215.623,274.484,215.409,277.67,216.689,275.999L216.689,275.999z M202.934,322.784c-0.033-0.404-0.077-0.886-0.549-1.031
                                    c-0.397-0.122-0.632-0.206-1.03-0.206h-1.58c-0.712,0-0.383,0.366-0.206,0.687c0.246,0.443-0.111,0.161,0.343,0.345
                                    c0.109,0.044,0.893,0.403,0.893,0.412c0.042,0.474,1.016,0.465,1.511,0.481C203.228,323.502,203.071,323.586,202.934,322.784z
                                     M196.547,317.009c0-0.497,0.158-1.192-0.274-1.514c-0.073-0.054-0.124-0.031-0.206-0.068c-0.407-0.186-0.324,0.769-0.344,0.963
                                    c-0.004,0.045-0.033,0.04-0.068,0.068c-0.127,0.102,0.002,0.125-0.138,0.138c-0.291,0.025,0.099,0.206-0.206,0.206h-0.068
                                    c-0.307,0,0.046,0.963,0.412,0.963c0.298,0,0.381,0.164,0.549-0.068C196.377,317.454,196.341,317.295,196.547,317.009
                                    L196.547,317.009z M186.136,296.191c0,3.166-3.793,14.379,1.177,14.844c0.788,0.073-0.181,0.151-0.181,1.267
                                    c0,3.977,4.527,1.938,5.072,3.892c0.611,2.193,6.25,2.433,6.25,7.422c-0.553,0-2.485-0.514-2.265-1.086
                                    c0.326-0.846-0.179-0.945-0.905-1.177c-1.026-0.327-0.988-1.769-1.721-2.354c-0.452-0.36-1.976-1.037-2.627-1.267
                                    c-1.093-0.387-1.803-0.365-2.807-1.177c-0.405-0.327-2.604-2.016-2.808-2.625c-0.213-0.07-0.837-0.203-0.996-0.361
                                    c-0.263-0.264,0.689-0.541,0.634-0.996c-0.039-0.315-0.372-0.371-0.453-0.725c-0.14-0.604-0.277-1.076-0.453-1.719
                                    c-0.208-0.76-0.77-1.019-0.815-1.72c-0.04-0.611,0.23-0.849-0.543-0.634c-0.239,0.066-0.377,0.139-0.634,0.091
                                    c-0.363-0.069-0.376-0.312-1.086-0.453c-1.119-0.602-0.098-1.226,0.453-1.81c1.245-1.32,1.209-4.046,1.993-5.793
                                    C183.875,298.796,184.741,296.45,186.136,296.191L186.136,296.191z" />
                                        <path id="bajacalifornia" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M171.23,171.972
                                    c-0.325,0.074-0.656,0.285-0.977,0.195c-0.125-0.035-0.127-0.085-0.196-0.195c-0.068-0.11,0.092-0.299,0-0.391
                                    c-0.092-0.092-0.28,0.068-0.391,0c-0.11-0.069-0.195-0.065-0.195-0.196v-0.195l-0.195-0.195h-0.195V170.8
                                    c0-0.248-0.336,0.093-0.391-0.391c-0.038-0.333-0.075-0.761,0.196-0.976c0.219-0.175,0.438-0.355,0.781,0
                                    c0.125,0.128,0.376,0.47,0.391,0.585c0.015,0.11-0.022,0.977,0,0.977h0.586c0.13,0,0.317-0.107,0.391,0
                                    C171.106,171.1,171.035,172.195,171.23,171.972L171.23,171.972z M183.541,178.024l-0.196,0.977H181
                                    c-0.552,0-0.677-0.156-0.782,0.195c-0.066,0.224-0.179,0.375-0.391,0c-0.156-0.276-0.007-0.16-0.195-0.391
                                    c-0.036-0.044-0.196-0.483-0.196-0.585c0-0.633,0.691-0.21,0.977-0.781c0.246-0.491-0.092-1.297,0.196-1.757
                                    c0.025-0.041,0.906-0.576,0.977-0.585c0.228-0.029,0.562,0,0.782,0c0.13,0,0.281-0.069,0.391,0
                                    c0.088,0.055,0.359,0.262,0.586,0.391c0.532,0.3-0.123-0.242,0.782,0.195c0.125,0.06,0.195,0.914,0.195,0.976
                                    c0,0.471-0.333,0.037-0.586,0.196C183.488,177.008,183.541,177.6,183.541,178.024L183.541,178.024z M177.092,180.758l-0.586,1.367
                                    c-1.963,0-1.911-0.006-2.931-1.757c-0.378-0.649-0.342-0.852-0.391-1.563c-0.005-0.067-0.913-0.761-0.978-0.781
                                    c-0.511-0.152-1.084-0.601-1.172-1.367c-0.039-0.338-0.629-1.519-0.391-1.757c0.393-0.393,1.974,0.543,2.736,0.586
                                    c1.282,0.072,0.136,1.039,0.977,1.367c0.343,0.134,0.71,0.01,0.978,0.195c0.182,0.127,0.038,0.429,0.195,0.586
                                    c0.498,0.497,0.875-0.009,0.977,0.976c0.076,0.743,0.324,0.586,0.977,0.781c0.124,0.037-0.179,0.066-0.196,0.195
                                    C177.222,180.091,177.412,180.332,177.092,180.758L177.092,180.758z M166.54,164.161l0.196,1.367
                                    c-0.935-0.063-2.019-0.197-2.931-0.391c-0.936-0.199-0.581-1.483-0.782-2.148c-0.093-0.309-0.484-1.008-0.586-1.172
                                    c-0.146-0.233-0.294-1.084-0.391-1.367c-0.43-1.258-0.841-0.662-1.758-1.757c-0.343-0.41-0.564-1.402-0.978-1.953
                                    c-0.608-0.608-1.092-1.137-1.563-1.757c-0.99-1.305-1.434-2.715-2.736-4.101c-0.563-0.601-0.087-3.038,0-3.71
                                    c0.181-1.391,0.468-1.33,1.954-0.977c0.076,0.018,1.349-0.057,1.368,0l0.195,0.586c0.447,1.338,1.488,2.447,1.759,3.319
                                    c0.243,0.786,1.057,0.717,1.172,1.953c0.077,0.819,0,1.709,0,2.539c0.711,0.059,1.857,0.682,2.345,0.195
                                    c0.108-0.108,0.571-0.781,0.782-0.781c0.329,0,0.078-0.448,0.391,0.195c0.521,1.074,0.117,2.24,0.195,3.905
                                    c0.056,1.191,0.487,0.638,0,1.757C164.612,161.151,165.424,164.161,166.54,164.161L166.54,164.161z M17.294,156.98
                                    c0.225-0.841,0.681-1.305,0.979-2.078c0.146-0.381,0.075-0.635,0.244-1.1c0.272-0.745,0.883-0.259,0.979-1.1
                                    c0.12-1.048,0.122-2.105,0.122-3.178c0-1.083-2.108-1.275-1.834-1.711c0.553-0.883-0.474-3.616-1.957-2.688
                                    c-0.507,0.317-0.412,1.057-0.734,1.589c-0.519,0.858-1.257,1.121-1.59,2.2c-0.262,0.848,0.204,1.874,1.101,1.589
                                    c0.89-0.283,0.641,3.817,0.856,4.033c0.651,0.651,0.229,0.343,0.611,1.222C16.187,156.023,16.763,157.048,17.294,156.98
                                    L17.294,156.98z M105.261,193.183c-0.999,0-2.073,0.451-2.073-0.366v-0.122c0-0.135-0.451-0.242-0.488-0.366
                                    c-0.029-0.097-0.418-0.925-0.61-1.097c-0.319-0.286-0.503-0.199-0.854-0.244c-0.414-0.054,0.256-0.215-0.244-0.488
                                    c-0.335-0.182-1.062-0.122-1.463-0.122c-0.507,0-2.032-0.364-1.098-0.731c0.697-0.274,2.685-0.603,3.171-1.462
                                    c0.565-1,0.854-3.043,0.854-4.265c0-0.383-0.167-2.3,0.122-2.559c0.847-0.762,1.465-2.261,2.683,0
                                    c0.555,1.031-0.021,1.586,1.219,2.437c0.818,0.563,0.38,3.969,0,4.752C105.822,189.91,105.627,190.914,105.261,193.183
                                    L105.261,193.183z M94.042,183.8l0.61-0.244c-0.054,0.085-0.45,1.105-0.854,0.853c-0.069-0.042-0.109-0.221-0.123-0.365
                                    c-0.045-0.512-0.409-0.155-0.854-0.244l-0.609-0.122l-0.732-0.488c-0.395-0.264-0.488,0.105-0.488-0.487
                                    c0-0.722,0.569-0.812,1.22-0.731c0.248,0.031,0.266,0.251,0.487,0.366c0.46,0.238,0.775-0.362,1.098,0.122
                                    C93.965,182.708,93.943,183.471,94.042,183.8L94.042,183.8z M64.381,37.412l66.959,0.015l-0.001,3.115c0,0.593,0.593,1.78,0,1.78
                                    h-0.446c-0.832,0-0.831,0.226-0.891,0.89c-0.05,0.553,0,1.211-0.002,1.734c-0.625,0.058-1.35-0.007-2.224-0.007
                                    c-0.184,0-4.378,3.197-5.152,3.677c-0.601,0.373-0.785,0.937-1.227,1.716c-0.386,0.684-0.606,1.363-0.981,1.961
                                    c-1.32,2.11,2.41,2.415,2.208,4.167c-0.154,1.34-1.007,1.23-0.491,2.942c0.27,0.89,0.093,3.762,0.282,5.783
                                    c-0.687-0.584-1.45-1.168-2.366-1.806c-1.018-0.708,0-0.75,0,1.372c0,0.989,1.24,1.419,1.647,1.92
                                    c0.505,0.622-0.439,2.936,0.549,3.567c1.209,0.772,3.569-1.23,3.569,1.098c0,0.948-0.549,4.621-0.549,2.195
                                    c0-1.33,2.263,0.254,3.011,0.545l-0.102-0.181c-0.929,0.428-1.49,0.331-0.712-0.913c0.199-0.318,0.279-0.623,0.273-0.905
                                    c-0.133-0.373-0.308-0.738-0.517-1.093c-1.065-1.016-3.275-0.894-1.678,1.998c0.417,0.755,1.581,1.059,2.768,1.15l-0.025-0.045
                                    c-1.31,3.909-5.214,4.129-5.214,11.241c0,3.119-1.349,9.901,1.098,12.347c0.656,0.655,2.196-3.155,2.196-0.549
                                    c0,12.03,0.549,14.61,0.549,25.516c0,1.799,3.185,1.482,2.471,1.92c-5.292,3.255,0.549,3.735,0.549,6.311
                                    c0,4.421,2.63-1.826,2.746-0.549c0.196,2.166-0.801,3.033-0.549,5.213c0.241,2.091,3.477,0.182,4.942,1.646
                                    c1.375,1.374,2.889,2.748,4.667,3.841c2.521,1.551,8.307,11.109,11.532,13.993c0,7.106,3.844,4.221,3.844,5.762
                                    c0,2.928-4.391,2.746-1.922,5.213c3.868,3.866-1.165-2.323,3.02,0c2.195,1.218,3.02,7.435,3.02,5.488
                                    c0-2.414,3.295-0.186,3.295,5.213c0,6.943,7.414,6.961,7.414,9.603c0,2.838,0.543,6.576,1.922,8.779
                                    c0.596,0.953,1,2.103,1.313,3.363l-42.292-3.142c0.561-0.052,1.117-0.062,1.722-0.062v-2.691l0.168-0.168h0.336
                                    c0.092-0.366,0.625-0.504,1.01-0.504c0.287-1.147,0.505-1.726,0.505-3.027c-0.861,0-1.164,0.164-1.683,0.336
                                    c0,0.333,0.032,0.237-0.168,0.505c-0.377-0.283-0.545-0.911-0.841-1.009v-1.514h0.336c0.127-0.381,0.703-0.595,0.841-1.009
                                    c0.61,0,0.653-0.542,1.178-0.673c0-0.742-0.183-2.018,0.841-2.018c0.275-0.824,0.808,0.079,1.178-1.682
                                    c0-2.047-1.851-3.242-1.851-5.045c0-3.44-1.794-2.046-3.366-3.028c-1.26-0.787-0.341-2.19-1.178-3.027
                                    c-1.249-1.249-3.197,0.028-3.197-3.7c0-2.907-4.881-1.228-4.881-4.541c0-4.88-6.9-6.583-6.9-11.773
                                    c-0.993,0-1.194-1.682-2.525-1.682c-1.327,0-2.069-0.276-3.366-0.505c-1.807,0-1.937-1.43-2.692-1.682
                                    c0-0.333,0.113-0.579-0.168-0.673c0-0.763-2.474-2.107-3.03-2.186c-0.101-0.306-2.238-1.699-2.692-1.851
                                    c0-0.66,0.14-0.346-0.336-0.504v-0.673c-0.208-0.069-0.268-0.128-0.337-0.336c-1.879,0-1.06-3.195-2.693-3.195
                                    c-0.427-1.281-1.899-1.328-2.693-0.336c-3.534-0.706-0.336-4.248-0.336-5.213c-1.822-0.364-0.02-2.85-1.178-3.364
                                    c-1.076-0.478-2.344-0.336-3.535-0.336c-0.07-0.282-0.112-0.43-0.336-0.505v-2.018h0.673c0.425-1.274,1.476-3.246,1.683-5.046
                                    c0.265-2.306-1.413-2.326-1.178-4.373c0.241-2.095,0.269-1.558-1.178-2.859c-0.952,0-0.504-0.125-0.504-1.009
                                    c0-1.141-0.62-0.574-0.842-1.682c0,0.831,0.61,2.522-0.673,2.522c-1.048,0,0.249-1.888-1.01-2.69
                                    c-0.795-0.508-1.01-1.032-1.01-1.85c0-1.351,0.338-1.123,1.346-1.85c2.362-1.704-0.742-1.255-0.841-2.354
                                    c-0.122-1.348-0.127-1.423,0.841-2.019c1.101-0.677,0.28-2.747-0.336-3.363c-0.92-0.92-1.992-1.086-2.861-2.355
                                    c-0.541-0.791-0.27-1.888-1.178-2.691c-0.702-0.62-3.198-0.066-3.198-1.009c0-0.62,0.274-0.106,0.505-0.336
                                    c0.218-0.218,0.294-2.184,0.336-2.859c0.005-0.086,0.168-0.266,0.168-0.504c0-0.43,0.043-0.922,0-1.346
                                    c-0.086-0.835-0.505-1.313-0.505-2.354c0-2.079-2.525-2.383-2.525-4.205c0-1.132-0.064-2.303-1.178-2.859
                                    c0-1.073-2.613-2.114-2.861-2.859c-0.893,0-1.526-1.125-2.188-1.346c0-2.697,2.02-2.555,2.02-3.363
                                    c-0.589-0.147-0.808-0.336-1.515-0.336c0-0.584,0.475-1.65,0-2.187c-0.813-0.919-2.063-0.894-2.356-2.354
                                    c-0.8-0.2-1.517-1.066-1.852-1.177v-1.009c0.631-0.473,1.835,0.114,2.356,0.505v0.336c0.329,0.109,0.009,0.059,0.337,0.168v0.336
                                    h1.515l0.168,0.168c0.077,0.309,0.027,0.259,0.336,0.336c0.054,0.216,0.115,0.289,0.168,0.505h1.01
                                    c0.214-0.643,0.673-0.706,0.673-1.682c0-0.49,0.115-1.136-0.168-1.514c-1.182,0-2.203-0.78-3.198-1.177v-3.195h-0.505
                                    c-0.2,0.267-0.168,0.171-0.168,0.504l-0.168,0.168h-1.683c0-1.207,0.168-2.184,0.168-3.364c-0.436-0.218-0.673-0.65-0.673-1.177
                                    c-1.833-0.366-1.683-2.05-1.683-3.532c0-1.108-0.336-2.281-0.336-3.195l-0.337-0.168c-0.541,0-0.805-0.006-1.346-0.168
                                    c-0.268,0.2-0.171,0.168-0.505,0.168c-0.296,0.296-0.416,0.42-0.841,0.504c-0.377-0.628-0.18-1.259,0.168-1.85
                                    c0.368-0.624,0.505-1.26,0.505-2.018l0.336-0.168v-0.504c-0.436-0.349-1.122-0.56-1.346-1.009l-0.168-0.168
                                    c-0.334,0-0.238,0.032-0.505-0.168v-3.7l0.337-0.336h0.505l0.168-0.336c0.328-0.109,0.008-0.059,0.336-0.168
                                    C64.306,37.783,64.345,37.603,64.381,37.412z" />
                                        <path id="sonora" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M191.161,177.244
                                    c-0.043,0.839,0.273,1.592-0.781,1.367c-0.977-0.209-0.893-1.02-0.977-1.757c-0.027-0.233-0.885-1.108-1.172-1.367
                                    c-0.939-0.845-0.184-1.304-2.149-1.563c-0.258-0.034-0.521,0-0.782,0c-0.987,0-0.197-1.461-0.977-1.562
                                    c-0.825-0.107-0.833,0.376-0.977-0.586c-0.159-1.063-0.712-0.479,0.586-1.367c0.75-0.513,2.149-0.088,2.149-1.367
                                    c-0.734-1.258-0.411-0.812-0.782-2.148c-0.329-1.184,0.171-0.898,0.586-1.563c0.312-0.497-0.704-2.701-0.195-3.515
                                    c0.611-0.977,5.667-1.892,5.667,0.586c0,1.104-0.019,2.125,0.195,3.125c0.081,0.376,0.791,1.18,0.977,1.367
                                    c0.406,0.405-0.093,1.531,0,2.343c0.083,0.714,0.198,1.365-0.39,1.953c-1.138,1.136,0.333,1.673,0,2.539
                                    c-0.307,0.797-0.782-0.084-0.782,0.976C191.357,175.303,191.161,175.947,191.161,177.244L191.161,177.244z M130.001,44.97
                                    l102.435,48.088l62.641,3.474l0.7,22.575c1.876,0,3.874-0.655,4.461,1.049c0.276,0.798-0.114,2.265,0,3.147
                                    c0.082,0.632,0.788,0.44,0.788,1.312c0,2.649,0.524,5.357,0.524,8.13c0,0.954-2.58,14.686-0.524,14.686
                                    c0.305,0.965-0.897,8.386-1.837,8.917c-0.836,0.473-0.433,1.915-0.787,2.623c-0.293,0.585-1.789,0.989-1.837,1.835
                                    c-0.074,1.292,1.531,3.409-0.788,3.409c-1.805,0,0,8.951,0,9.966c0,5.899,3.674,1.388,3.674,6.818
                                    c2.433,3.199,2.624,3.947,2.624,7.605c0,2.048,0.263,3.224,0.263,5.245c0,2.086-0.573,2.334-2.625,2.099
                                    c-1.471-0.168-4.403-0.736-4.986,1.049c-0.99,3.032-8.373-2.49-10.498,1.049c1.972,3.502,2.156,10.168,5.512,12.063
                                    c1.392,0.786,0.227,2.944,1.049,3.409c2.751,1.553,3.674,0.309,3.674,4.721c0,2.133,3.706,7.666,1.837,9.965
                                    c-0.377,0.464-1.6,5.219-0.787,6.032c2.072,2.07,0.41-0.159,1.574,3.409l2.157,1.4l-5.016,11.696l-7.245,3.898v2.228l-7.245,2.785
                                    l-3.482-0.949c-0.337-1.399-3.123-6.968-4.376-7.929c-0.496-0.38-1.484-2.358-1.922-1.92c-2.539,2.537,2.764,1.408-1.922-1.372
                                    c-1.833-1.088-1.775,2.357-2.746,2.469c-0.813,0.093-2.799-0.891-3.494-1.319c-4.948-3.042,1.792-4.698-2.546-6.913
                                    c-3.087-1.577-3.062-7.999-5.491-7.682c-2.002,0.261-2.6,0.714-5.491-1.372c-1.228-0.887-4.609-3.522-5.812-4.558
                                    c-2.436-2.095-1.007-5.799-2.699-9.161c-3.383-6.721,3.136-2.774-1.647-5.762c-1.547-0.966,0.691-3.786,1.647-4.115
                                    c2.194-0.756-0.94-0.097-4.119-2.744c-0.46,0.46-10.158-8.871-4.118-0.274c5.737-1.458-8.144,0.921-14.003-10.7
                                    c-0.575-1.141-2.506-2.426-3.02-3.566c-2.119-4.707-8.512-1.984-8.512-8.505c0-3.655-5.258-3.117-4.118-4.939
                                    c2.75-4.398,0.021-3.018-1.374-3.018c-1.608,0-5.439-7.531-6.04-9.054c-1.298-3.294,2.294-9.054-2.196-9.054
                                    c-1.187,0-4.119,0.613-4.119-0.274c0-6.168,0.952-2.28,1.098-2.195c0-6.839-2.696-8.68-5.766-14.816
                                    c-2.635-5.267-6.03-15.157-5.766-19.206c0.26-3.989-5.217-7.96-5.217-10.975c0-6.502,2.746-10.437,2.746-15.914
                                    c0-6.16-16.748-1.116-16.748-8.231c0-6.252-2.913-4.652-6.315-8.231c-4.942-5.2-0.762,10.737-8.786,3.292
                                    c0-3.118-2.577-0.849-4.119-1.921c-1.377-0.957-4.503-3.674-5.766-5.487c-1.285-1.845-2.114,0.75-2.746,0.823
                                    c-0.594,0.068-1.49,0.122-2.381,0.059l-0.035-0.321c1.92-0.963,5.063-3.853,1.868-3.853c-0.915,0-0.214,1.037-0.549,1.372
                                    c-1.721,1.72-3.7-2.545-4.118-3.018c-1.051-1.188-1.967-2.142-3.104-3.114c-0.211-2.04-0.034-4.912-0.304-5.802
                                    c-0.517-1.711,0.337-1.602,0.491-2.942c0.202-1.752-3.528-2.058-2.208-4.167c0.375-0.598,0.595-1.278,0.981-1.961
                                    c0.441-0.779,0.626-1.343,1.227-1.716c0.774-0.48,4.968-3.677,5.152-3.677C128.65,44.939,129.377,45.028,130.001,44.97z" />
                                        <path id="chihuahua" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M295.076,96.531l0.7,22.575
                                    c1.876,0,3.874-0.655,4.461,1.049c0.276,0.798-0.114,2.265,0,3.147c0.082,0.632,0.788,0.44,0.788,1.312
                                    c0,2.649,0.524,5.357,0.524,8.13c0,0.954-2.58,14.686-0.524,14.686c0.305,0.965-0.897,8.386-1.837,8.917
                                    c-0.836,0.473-0.433,1.915-0.787,2.623c-0.293,0.585-1.789,0.989-1.837,1.835c-0.074,1.292,1.531,3.409-0.788,3.409
                                    c-1.805,0,0,8.951,0,9.966c0,5.899,3.674,1.388,3.674,6.818c2.433,3.199,2.624,3.947,2.624,7.605c0,2.048,0.263,3.224,0.263,5.245
                                    c0,2.086-0.573,2.334-2.625,2.099c-1.471-0.168-4.403-0.736-4.986,1.049c-0.99,3.032-8.373-2.49-10.498,1.049
                                    c1.972,3.502,2.156,10.168,5.512,12.063c1.392,0.786,0.227,2.944,1.049,3.409c2.751,1.553,3.674,0.309,3.674,4.721
                                    c0,2.133,3.706,7.666,1.837,9.965c-0.377,0.464-1.6,5.219-0.787,6.032c2.072,2.07,0.41-0.159,1.574,3.409l2.119,1.4l1.054-0.398
                                    l8.189-0.037c-0.054,0.969-0.211,2.086-0.517,2.759c-0.54,1.189,2.341,2.203,3.101,2.415c0.433,0.121,0.857,0.29,1.206,0.518
                                    c1.417,0.924-0.646,0.395,1.034,0.862c0.759,0.211,0.689,1.127,0.689,2.069c0,0.61-0.346,1.55-0.172,1.725
                                    c0.542,0.543-0.433,0.488-0.689,0.69c-0.158,0.125-0.143,1.081-0.344,1.207c-0.417,0.26-1.095-0.145-0.861,0.862
                                    c0.167,0.717,1.881,0.12,2.412,0.518l0.517,9.485l4.824,6.726h6.382c0.638,1.577,3.58-0.555,3.953,1.034
                                    c0.515,2.192,1.4,1.119,3.101,1.379c0.387,0.06,0.126,2.29,0.172,2.759c0.024,0.252,1.019,2.426,1.206,2.76
                                    c1.202,2.147,0.812,1.928,2.584,1.724c1.793-0.206,1.045,2.932,3.1,2.932l0.862,1.035v0.517c0,0.334,0.838,0.135,0.861,0.518
                                    c0.018,0.3-0.037,2.561,0,2.587c0.189,0.129,0.689-0.229,0.689,0v0.172c0,0.504,0.345-0.086,0.345,0.69
                                    c1.4,0.5,1.784,0.899,3.101,1.034c1.073,0.111,1.461,1.553,2.239,1.553c3.379,0-0.09,2.125,2.755,0.254
                                    c8.628-5.672,4.181-3.7,6.03-12.154c0.577-2.637,2.412-1.233,2.412-4.829c0-4.569,2.627-7.8,5.34-10.52
                                    c1.8-1.805-0.819-7.07,2.067-8.278c1.79-0.75,1.881-0.593,2.584-2.069c0.569-1.198,2.411-1.939,2.411-3.104
                                    c4.91-1.474,1.518,1.426,4.307,1.552c3.956,0.18,5.188,4.403,7.579,5.346c1.404,0.554,0.763-0.15,1.55-0.689
                                    c1.543-1.058,1.517,2.036,1.895,2.414c0.164,0.165,2.351,1.181,2.929,1.208c2.591,0.117,8.613,7.073,8.613,4.312
                                    c0-1.54-0.664-2.488,0.517-3.449c0.409-0.333,1.279,0.399,1.378,0.689c0.693,2.028,1.449,1.633,3.273,0.518
                                    c1.464-0.895,2.161-0.778,3.962-1.38c2.32,1.007,2.944,0.897,3.79,2.76c0.62,1.363,2.675,3.025,4.307,2.932
                                    c2.521-0.145,1.125-4.365,2.067-6.036c0.138-0.243,1.312-1.041,1.551-1.208c0.216-0.15,1.292-1.121,1.377-1.379l6.368-4.853
                                    l13.791,1.253l-5.851-40.925l16.688-33.393c-1.518-0.975-2.594-3.096-4.031-3.77c-1.237-0.581-1.465-0.69-2.945-0.841
                                    c-3.875-0.395-4.591-3.119-7.363-5.676c-7.7,0-7.006-4.268-13.464-6.517c-2.527-0.88-8.008-9.112-8.626-12.403
                                    c-0.813-4.332,0.487-8.076-2.104-11.773c-0.448-0.896-0.482-1.892-1.473-1.892h-0.21c-1.206,0-1.258-1.79-1.683-2.313
                                    c-0.273-0.336-0.264-0.278-0.42-0.63c-1.016-2.295,0.039-4.421-1.894-5.676c-1.044-0.679,0.085-1.201-2.104-1.892
                                    c-1.467-4.397-3.936-7.725-9.046-9.25c-7.3-2.18-7.088-7.837-13.253-10.301c-2.346-0.938-6.439-8.218-8.415-9.881
                                    c-2.493-2.098-4.09-4.717-6.101-6.727c-2.541-2.539-3.899-2.373-6.764-4.854l-47.653-1.78L312.6,97.508L295.076,96.531z" />
                                        <path id="coahuila" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M441.084,252.422l9.92,4.48l1.598,5.245
                                    l2.282,4.789l-2.967,3.192c0,1.279,0.406,4.08-0.685,4.789c-0.796,0.518-0.811-0.08-0.685,1.14c0.041,0.4,0.177,0.187,0.229,0.912
                                    c0.021,0.315,0.026,0.669,0.228,0.913c0.313,0.379,0.726,0.516,1.142,1.14c0.375,2.628,0.926,5.991-0.229,8.209
                                    c-0.314,0.604-0.854,1.668-1.369,2.28c-0.582,0.691-1.489,0.134-1.825,1.14c0,0.554,0.212,0.644,0.456,1.141
                                    c0.272,0.555-0.043,3.128,0.456,3.192c0.775,0.101,0.912-0.31,1.142,0.685c0.069,0.3,0.59,0.548-0.229,0.684
                                    c-0.63,0.104-1.147,0.14-1.825,0.228c-0.724,0.094-0.457,1.476-0.457,2.28c-2.089,7.308,2.738,1.445,2.738,5.701
                                    c0,3.906,2.47,7.522,5.705,9.35c1.052,0.594,5.151,0.697,5.249,0.913c0.837,1.839,1.714,3.192,4.108,3.192l1.369-0.912
                                    c0.216-0.145,0.385-0.715,0.456-1.141l1.598-5.017l2.245-2.693l1.178-1.412l6.618,2.509l-0.229-3.648l6.847-0.456l10.497,3.192
                                    l3.88,5.245l1.598-0.912h2.738l0.228,4.333l5.934-1.141c0,1.641,1.338,2.084,2.282,1.141c0.611-0.612,1.735-0.504,2.967-0.456
                                    c3.422,0.131,0.394,1.243,1.369,3.192c0.157,0.314,1.555,1.141,1.825,1.141c0.983,0,1.829,3.846,4.336,2.28
                                    c0.909-0.568,4.877,1.157,5.934,1.368c-0.206-0.481-0.462-1.146-0.685-1.368c-0.107-0.107-0.209-0.078-0.228-0.229
                                    c-0.059-0.451-0.02-1.165,0-1.596c0.04-0.891,0.24-0.819,0.456-1.597c0.02-0.069-0.031-0.668,0-0.685
                                    c0.407-0.216,1.35-0.02,0.685-0.684l-0.229-0.229c-0.568-0.568,0.355-0.912-0.456-0.912l-2.054-2.28l2.054-5.245l-1.825,0.228
                                    l-0.229-4.332l5.933-5.701c1.296,0.597,1.025,0.753,1.598,1.824c0.496,0.926,0.982-0.062,2.054,0
                                    c1.442,0.083,1.491,0.177,2.282,1.14c0.722,0.879,3.437,0.37,4.108-0.456c0.71-0.874,2.915,0.381,3.423-1.14
                                    c-1.484-0.123-1.407-0.364-1.598-1.824c-0.227-1.739-1.881-0.685-3.194-0.685c-1.134,0-0.953-0.555-1.599-1.14
                                    c-0.363-0.331-1.935-0.456-2.738-0.456c-0.186-0.403-0.389-1.035-0.685-1.368c-0.289-0.327-0.649-0.642-0.685-0.913
                                    c-0.097-0.75-0.685-0.754-0.685-1.824v-1.14c0-0.476,0.163-1.01-0.228-1.14c-1.488-1.189-1.479-0.913-3.424-0.913
                                    c-2.312,0-0.068-1.977-0.228-2.736c-0.09-0.428-2.923,0.6-3.423-0.228c-0.287-0.473-0.627-2.708-1.142-2.965
                                    c-0.692-0.345-2.169-0.028-2.054-0.912c0.056-0.429,0.685-0.353,0.685-1.14c0-0.413-0.164-1.991,0-2.28
                                    c0.344-0.608,1.598-0.873,1.598-1.824c-0.832-0.192-1.645-0.34-2.511-0.228c-0.266,0.034-0.423,0.552-0.456,0
                                    c-0.031-0.522,0-1.072,0-1.597c0-0.151-0.081-0.327,0-0.456c0.08-0.128,0.142-0.104,0.228-0.228
                                    c0.159-0.228,0.566-0.447,0.685-0.684c0.339-0.677-0.539-0.456-0.912-0.456l-8.443-10.034l13.235-12.543
                                    c0.397,0.682,1.15,1.522,0.913,2.281c-0.49,1.569,0.056,1.368,1.369,1.368c0.2,0,1.067-0.188,1.141-0.229
                                    c0.318-0.168-0.494-3.151,0.685-3.876c0.646-0.397,1.038-0.375,1.826-0.456c0.715-0.074,0.456-1.026,0.456-1.597v-7.297
                                    l-5.248-2.508c-0.454,3.398,0,0.179,0,1.368c0,0.261-0.603,0.301-0.913,0.456c-0.411,0.206-1.022,0.926-1.369,1.368
                                    c-0.724,0.925-0.529,1.584-0.685,0.229c-0.062-0.529-0.457-0.348-0.457-0.457v-0.684h-0.228c-0.595,0-0.3-1.245,0.228-1.596
                                    c0.339-0.226,0.855-0.415,0.913-0.912c0.133-1.151,0-2.481,0-3.649c1.46-0.208,3.154-0.269,4.564-0.684
                                    c0.132-0.039,0.215-0.627,0.228-0.912c0.065-1.373,0.553-0.647,1.142-1.824c0.529-1.059,0.313-1.261,1.825-1.368
                                    c0.757-0.054,3.3-0.54,3.423-0.912c0.843-2.666,0.457-5.858,0.457-8.666l5.934-3.877l0.456,0.912
                                    c0.273,0.546,0.229-0.172,0.229,0.456v0.229h0.685c0.115,0,0.32,0.274,0.685,0.456c0.282,0.141,2.107,0.913,2.282,1.14
                                    c0.667,0.868,0.546,0.944,1.369,1.825c0.248,0.265,0.378,0.447,0.456,0.684l2.791-3.692c-1.17-1.434-1.958-3.291-1.958-6
                                    c0-1.186-10.368-12.811-11.571-16.818c-1.962-6.538-7.38-10.542-10.519-16.188c-1.337-2.406-0.585-6.669-2.735-8.199
                                    c-0.833-0.593-5.574-4.625-5.68-5.887c-0.607-0.809-2.724-1.024-4.065-1.847l0.024-0.133c-0.076-0.695-2.457-0.115-2.949-0.185
                                    c-0.938-0.132-0.504-0.491-0.921-0.677c-0.631-0.281-4.748,0.593-4.916,0.308c-0.201-0.344,0.328-2.327,0.369-2.891
                                    c0.038-0.525,1.396-1.208,0.983-1.661c-0.48-0.527-0.86,0.087-0.86-1.045c0-0.642-0.395-2.097,0.307-2.091
                                    c0.692,0.006,2.022,3.354,2.15,3.998c0.939,0.563,1.853,0.166,2.766,0.8c0.096,0.067,0.18-0.003,0.248-0.121
                                    c-1.07-1.141-1.766-2.626-2.813-3.915c-2.72-3.346-6.195-5.383-11.149-4.205c-3.954,0.94-4.104-1.472-6.522-1.472
                                    c-3.14,0-6.216,0.183-9.888,0c-1.459-0.243-1.174-1.177-2.945-1.051c-0.835,0.059-0.902,0.523-1.262,0.631
                                    c-0.734,0.22-1.491,0.878-1.894,1.682c-0.273,0.547-5.573,2.143-6.312,2.313c-1.474,0.339-1.22,2.971-1.684,3.995
                                    c-0.568,1.258-2.096,0.554-2.944,1.472c-0.343,0.37-0.946,2.214-1.052,2.312c-1.656,1.545-0.491,7.462,0,9.671
                                    c0,0.328,0.141,0.399-0.211,0.42c-0.42,0.025-0.842-0.014-1.262,0c-0.994,0.033-1.025,0.064-1.894,0.42
                                    c-0.621,0.254-1.14,0.659-1.684,1.051c-1.404,0-1.459,3.158-2.104,4.205c-0.891,1.446-5.361,0.961-6.942,0.21
                                    c-0.139-0.066-0.274-0.143-0.387-0.225l-16.688,33.393L441.084,252.422z" />
                                        <path id="tamaulipas" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M557.082,221.694l-3.802,3.833
                                    c0.943,0.331,2.177,0.428,2.177,1.365c0,1.432,2.242,1.376,3.149,1.376c0.935,0,0.666,0.745,0.394,1.18
                                    c-0.584,0.935-0.246,2.258-0.394,3.541c-0.034,0.304-1.046,0.725-0.984,0.983c0.3,1.243,1.692,0.983,2.953,0.983
                                    c-0.104,0.545-0.685,2.504-0.394,3.147c0.152,0.337,0.585,0.476,0.787,0.787c0.435,0.666-0.057,1.291,0.983,1.376
                                    c1.102,0.091,0.064,0.942-0.394,0.984c-1.676,0.151-1.361,0.721-1.574,2.36c-0.068,0.522-0.118,0.025-0.394,0.197
                                    c-0.466,0.291-0.394,1.754-0.394,2.557l4.921,0.197l-1.772,6.491h4.134l2.756,4.327l-1.575,5.311l8.857,5.114v5.718l0.591,0.183
                                    h0.591l0.59,0.197c0.873,0.291,0.817,0.731,1.575,0.983c-0.985-5.084,1.521-2.72,2.756,0.197c0.057,0.135,2.707,0.766,2.755,0.394
                                    c0.204-1.565-0.162-1.181,1.969-1.181c0.845,0,0.84,0.451,0.983,0.197c0.323-0.571,0.548-1.243,1.378-0.984
                                    c0.718,0.224,1.901-0.007,2.559,0.394c1.503,0.915,1.004,0.787,2.953,0.787v16.326h4.74c-0.091,0.39-0.498,1.429-0.017,1.573
                                    c0.154,0.046,0.382,0.405,0.197,0.59c-0.058,0.057-0.489,0.095-0.591,0.197c-0.117,0.117-0.105,0.23-0.394,0.393
                                    c-0.13,0.073-0.394,0.129-0.394,0.393v0.59h-0.197c-0.13,0,0.07,0.283,0,0.394c-0.03,0.049-0.125,0.518-0.196,0.59
                                    c-0.006,0.005-0.575,0.01-0.591,0c-0.152-0.095-0.173-0.771-0.197-0.787c-0.13-0.089-1.271,0-1.574,0l-11.613,11.014h-2.755
                                    c0-0.556,0.07-1.548,0-2.163c-0.056-0.488-0.505-0.136-0.591,0.196c-0.077,0.297-0.148,0.461-0.197,0.983
                                    c-0.147,1.586-2.165,0.696-2.165,2.164c0,0.643,0.14,0.542-0.394,0.59c-0.556,0.05-0.467,0.572-0.59,0.983
                                    c-0.132,0.44-1.409,0.196-1.969,0.196c0,1.073-0.403,1.76,0.591,1.968c0.848,0.177-0.433-0.255,0.394-0.197
                                    c0.885,0.063,1.13,0.62,1.771,0.983c0.313,0.178,0.586-0.317,0.787,0.197c0.212,0.541-0.481,0.384-0.591,0.59
                                    c-0.286,0.546,0.227,1.498,0,1.573c-0.975,0.324-2.361-0.488-2.361,0.787c0,1.573-3.406,1.605-3.543,0
                                    c-0.08-0.939-0.018-1.359-0.787-0.59c-0.339,0.338,0.047,1.427-0.394,1.573c0,0.09,0.134,1.77,0,1.77h-0.197
                                    c-1.028,0,0.3-0.253-0.394,0.787c-0.032,0.048-1.378,0.383-1.378,0.197v-0.197c0-0.203-0.464-1.224-0.59-0.59
                                    c-0.135,0.672-0.19,0.212-0.591,0.787c-0.045,0.064-0.157,0.354-0.197,0.394c-0.093,0.092-0.139,0.079-0.196,0.196
                                    c-0.147,0.295-0.362,0.571-0.395,0.787c-0.061,0.407-0.055,0.87-0.394,0.983h-5.314l-0.196,5.311l2.756,2.361l0.59,12.391
                                    l4.134,3.934c-0.169,0.564-0.299,0.855-0.394,1.377c-0.029,0.162-0.11,0.369-0.197,0.59c-0.219,0.557-1.136,0.844-1.771,0.984
                                    c-0.531,0.117-0.718-0.217-0.787,0.393c-0.046,0.4,0.147,0.279-0.196,0.395h-9.055c-2.002,2.77-1.574,7.092-1.574,10.621
                                    c0,3.977-1.669,1.125-4.134,1.572c-2.685,0.488-0.124,5.861-3.168,6.584l-0.007,1.719c0,0.352,0.607,0.461,0.958,0.549
                                    c1.037,0.258,0.821-0.102,0.821,1.234c0,1.199-0.11,0.959,1.097,0.959h1.779c0,1.531,0.069,1.561-0.958,2.193
                                    c-0.453,0.279-0.982,0.525-1.369,0.686c-1.439,0.594-0.959,0.139-0.959,2.057c0,0.877-0.235,2.721,0,3.428
                                    c0.165,0.498,1.62-1.211,1.644-1.234c0.376-0.377,0.78,1.799,0.548,2.193c-0.081,0.137-0.658,0.137-0.822,0.137
                                    c-0.889,0-0.255,1.363,0.138,1.646c0.188,0.135,0.699-0.332,0.958-0.412c1.32-0.408,3.036-0.273,4.656-0.273
                                    c1.387,0,1.081,0.215,1.369,1.371c0,0.633-0.137,1.191-0.137,1.781c0,0.895-0.396,1.547,0.685,1.508
                                    c1.039-0.037,1.494-0.404,2.055-0.684c0.974-0.488,0.37,0.055,0.958,0.273c1.305,0.484,1.387-1.236,2.328-0.961
                                    c1.701,0.502,2.605,1.654,4.245,1.92c0.912,0.148,0-2.434,0-2.879c0-1.621,1.713-0.99,2.054-0.137
                                    c0.628,1.014,1.62,2.6,2.739,3.152c0.539,0.268,3.061-0.359,3.15,0.139c0.109,0.605,0.141,0.912,0,1.508
                                    c-0.05,0.207-0.138,0.381-0.138,0.686c0,0.922-0.162,0.779,0.822,0.822c1.026,0.043,0.383,0.402,0.273,0.822
                                    c-0.082,0.318-0.299,2.705-0.411,2.742c1.17,0.811,5.084-0.936,7.259-0.822c0.435,0.021,1.653,0.365,1.779,0.686
                                    c1.006,2.535-0.379,1.096,2.055,1.096c0.751,0,4.395,0.811,4.93-0.137c0.381-0.676,0.406-1.508,1.37-1.508
                                    c2.613,0,2.473,1.342,3.971,1.508c1.203-4.217,3.691,0.006,5.614-1.92c0.353-0.354,1.158-0.033,1.233-0.686
                                    c0.161-1.406,1.318-1.688,2.738-1.645c4.378,0.133,2.464,5.584,7.258,6.033c0.482,0.045,2.425,0.76,4.377,1.301l0,0h0.21h0.451
                                    c0.407,0,0.9,0.459,1.054-0.15c-0.793-2.605,1.085-2.018-1.829-3.635c-1.153-0.641-0.694-5.08-0.813-7.041
                                    c-0.118-1.924-0.344-3.012,0.406-4.875c0.602-1.492,3.454-11.713,1.897-13.27c0-0.738-0.2-2.393,0-3.113
                                    c0.114-0.412,0.497-1.973,0.136-2.303c-0.425-0.385-1.098,0.027-1.355-0.27c-0.399-0.463,0.678-0.887,0.678-1.49
                                    c0-2.98,0.542-5.664,0.542-8.666c0-0.686-0.4-2.627-0.949-2.844c-0.425-0.166-0.327-0.475-0.271-1.082
                                    c0.089-0.949-0.745-0.543-0.542-0.543c-1.287,0-1.033,0.051-1.084,0c-0.519-0.518,1.327-0.588,0.136-0.676
                                    c-1.011-0.076-1.803,0.352-1.49-1.084c0.106-0.49,0.139,0.004-0.136-0.27c-0.05-0.051-0.017-0.67,0-0.678
                                    c0.53-0.256,1.196,0.25,1.49,0.271c0.23,0.016,0.563-0.693,0.813-0.813c0.744-0.355,0.902,0.029,1.491,0.406
                                    c1.114,0.713,0.271-2.436,0.271-2.844c-0.595-0.199-0.522-0.115-0.271-0.678c0.28-0.625,0.271-0.52,0.271-1.084
                                    c0-0.877-1.896,0.506-1.896-0.811c0-0.441,0.039-0.918,0-1.355c-0.033-0.365-0.283,0.025-0.406-0.135
                                    c-0.345-0.447,0.617-0.381,0.813-0.406c0.604-0.078,0.515-1.307,0.406-1.76c-0.153-0.645,0.02-0.904,0.542-1.084
                                    c0.259-0.088,0.678-0.211,0.678-0.541c0-1.336,0.109-1.311-0.678-2.303c-0.954-1.201-0.163-2.047-0.406-2.438
                                    c-0.703-1.123-0.107-5.068-2.304-3.384c-0.53,0.406-1.052-0.019-1.084-0.542c-0.075-1.242-1.638,0.558-0.948-0.947
                                    c0.254-0.555,0.329-2.708,0.678-2.708c2.043,0,1.813,2.2,2.304,3.927c0.017,0.062,0.25-0.509,0.271-0.542
                                    c0.579-0.926-0.722-1.31,0.542-2.572c3.034,0.298,0.568,2.944,0.871,4.035c0.331,1.193,0.435,1.354,0.567,2.648
                                    c0.028,0.271,0.19,0.268,0.19,0.756c0,1.506,0.757,0.92,0.757,2.082c0,2.334,0.638,5.848,0.947,1.514
                                    c0.167-2.348-1.326-3.77-1.326-6.434c0-0.758,0.694-0.426,0.947-1.324c0.712-2.535-0.475-4.654,0.757-6.622
                                    c0.14-0.223,0.758-2.656,0.758-3.027c0-1.236-0.554-1.733-1.704-0.946c-0.5,0.342-0.637,3.993-0.758,4.92
                                    c-0.123,0.948-1.325,0.323-1.325-1.136c0-2.453,1.325-1.643,1.325-3.595c0-0.469-1.073-1.243,0.379-1.514
                                    c0.66-0.124,1.325-0.74,1.325-1.514c-0.762-0.048-1.02,0.263-1.136-0.379c-0.043-0.238-0.146-0.677-0.189-0.188
                                    c-0.012,0.128,0.027,1.112,0,1.135c-0.342,0.291-0.598,0.041-0.757-0.378c-0.164-0.433-0.572-1.394-0.379-1.893
                                    c0.313-0.811,0.603-0.878,1.325-0.946c1.131-0.106,1.035-0.358,0.946-1.514c-0.051-0.661-0.387-0.306-0.946-0.378
                                    c-0.282-0.036-0.262-0.189-0.758-0.189c-0.444,0-0.55-0.137-0.757,0.189c-0.3,0.47-0.549,0.649-1.325,0.757
                                    c-1.048,0.145-0.472-0.229-0.379-0.379c0.202-0.324-0.276-0.602,0.189-0.757c0.313-0.144,0.612-0.293,0.946-0.378
                                    c0.342-0.088,0.298-0.026,0.379-0.379c0.029-0.127,0.13-0.482,0.189-0.567c0.347-0.501,0.674-0.777,0.946-1.324
                                    c0.13-0.26,0.199-0.529,0.379-0.757c0.813-1.029,1.158-0.946,0-0.946c-0.879,0-1.773,0.03-2.65,0
                                    c-0.448-0.016-0.085-0.839,0-0.946c0.245-0.307,0.764-0.188,1.136-0.188c1.389,0,1.325,0.342,1.325-0.757
                                    c0-1.36,0.142-0.361,1.137-0.946c0.012-0.007,0-0.521,0-0.567c0-0.37,0.137-0.534-0.189-0.568c-0.401-0.04-0.925-0.023-1.326,0
                                    c-0.53,0.032,0.136,1.081-0.379,0.568c-0.242-0.243-0.248-0.373-0.378-0.568c-1.987-2.978-0.568-0.127-0.568-1.135
                                    c0-0.328-0.466-0.189-0.757-0.189c-0.697,0-0.104,0.224-0.568,0.379c0.176-0.327,0.444-0.597,0.568-0.946
                                    c0.063-0.178-0.174-0.493,0-0.568c0.437-0.189,1.091,0.679,1.325,0c0.14-0.403-0.189-0.658-0.189-1.135
                                    c0-0.878,0.213-0.946,0.946-0.946c0.298,0,1.109-0.097,1.326,0c0.387,0.173,0.466,0.799,0.567,1.135
                                    c0.258,0.848,0.327,0.761,0.947,0.946c0.372,0.112,0,0.477,0,0.947c0.045,0.021,0.975,0.722,1.136,0.188
                                    c0.189-0.627-0.674-1.324,0.189-1.324c0.381,0,1.695,0.135,1.894,0c0.104-0.071,0-0.252,0-0.378c0-0.378,0.119-0.777,0-1.135
                                    c-0.032-0.099-0.521,0.201-0.568-0.378c-0.108-1.306,1.659-0.362,2.083,0.189c0.23,0.301-0.774,1.417-0.947,1.514
                                    c-0.22,0.124-0.378,0.411-0.378,0.757c0,0.469,0.188,0.375,0.188,0.946c-0.065,1.183-0.253,3.987-0.946,4.541
                                    c-0.508,0.405-0.379,0.969-0.379,1.703c0,1.229-1.141,2.818-1.894,3.784c-0.648,0.831-0.378,4.789-0.378,6.243
                                    c0.877-0.877,1.084-1.023,0.378-1.892c-0.196-0.242,0.179-0.65,0.189-0.757c0.059-0.57-0.226-1.965,0-2.46
                                    c0.289-0.637,0.924-1.56,1.326-2.271c0.516-0.913,0.929-1.11,1.515-1.892c2.389-2.899,4.923-10.373,4.923-12.677
                                    c0-6.193,5.301-8.598,5.301-14.19c0-2.023-0.018-3.771-0.106-5.337c-2.085,0.309-4.514,1.233-5.047,2.098
                                    c-0.622,1.011-2.383-0.05-2.945,0.63c-2.044,2.473-4.104,1.208-5.68-1.051c-1.904-2.73-7.289-1.98-10.94-2.102
                                    c-1.938,0-4.292,0.546-5.68,0.631c-3.881,0.237-3.403-0.921-6.102-3.364c-0.761-0.69-3.622,0.113-3.996-0.841
                                    c-0.96-2.442-0.381-1.074-2.314-2.103c-2.378-1.265-3.938-3.25-7.153-2.943c-2.34-0.26-6.044-1.597-8.865-3.37
                                    c-0.071,0.135-0.275,0.064-0.761,0.078c-1.639,0.046-2.087-2.007-3.593-2.551c-0.724-0.26-0.598-1.333-0.719-2.027
                                    c-0.317-1.814-2.221,0.433-2.221-1.57c0.282,0,1.176-0.687,1.176-1.112c0-1.348-0.719-0.995-0.719-2.289
                                    c0-0.489-0.76-1.177-1.307-1.177c-0.917,0-0.041,1.029-1.241,0.785c-1.234-0.251,0.101-1.254,0.131-1.897
                                    c0.053-1.125-0.55-0.329-0.85-1.439c-0.187-0.691,0.181-1.152-0.262-1.832c-0.521-0.8-0.782-1.601-0.849-2.682
                                    c-1.122-4.388-2.494-10.52-2.853-15.708C562.892,224.959,559.818,223.557,557.082,221.694z" />
                                        <path id="nuevoleon" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M557.082,221.694
                                    c-1.482-0.923-2.71-2.294-2.876-2.463l-2.791,3.692c-0.078-0.236-0.208-0.418-0.456-0.684c-0.823-0.88-0.702-0.957-1.369-1.825
                                    c-0.175-0.228-2-0.999-2.282-1.14c-0.364-0.182-0.569-0.456-0.685-0.456h-0.685v-0.229c0-0.628,0.045,0.09-0.229-0.456
                                    l-0.456-0.912l-5.934,3.877c0,2.808,0.386,6-0.457,8.666c-0.123,0.372-2.666,0.858-3.423,0.912
                                    c-1.513,0.107-1.296,0.31-1.825,1.368c-0.589,1.177-1.076,0.451-1.142,1.824c-0.013,0.285-0.096,0.874-0.228,0.912
                                    c-1.41,0.416-3.104,0.476-4.564,0.684c0,1.168,0.133,2.498,0,3.649c-0.058,0.497-0.574,0.687-0.913,0.912
                                    c-0.527,0.351-0.822,1.596-0.228,1.596h0.228v0.684c0,0.109,0.396-0.072,0.457,0.457c0.155,1.356-0.039,0.696,0.685-0.229
                                    c0.347-0.442,0.958-1.163,1.369-1.368c0.311-0.155,0.913-0.195,0.913-0.456c0-1.189-0.454,2.03,0-1.368l5.248,2.508v7.297
                                    c0,0.571,0.259,1.523-0.456,1.597c-0.788,0.081-1.18,0.059-1.826,0.456c-1.179,0.725-0.366,3.708-0.685,3.876
                                    c-0.073,0.04-0.94,0.229-1.141,0.229c-1.313,0-1.859,0.201-1.369-1.368c0.237-0.759-0.516-1.599-0.913-2.281l-13.235,12.543
                                    l8.443,10.034c0.373,0,1.251-0.221,0.912,0.456c-0.118,0.237-0.525,0.456-0.685,0.684c-0.086,0.125-0.147,0.1-0.228,0.228
                                    c-0.081,0.129,0,0.305,0,0.456c0,0.524-0.031,1.074,0,1.597c0.033,0.552,0.19,0.034,0.456,0c0.866-0.112,1.679,0.036,2.511,0.228
                                    c0,0.952-1.254,1.216-1.598,1.824c-0.164,0.289,0,1.867,0,2.28c0,0.787-0.629,0.711-0.685,1.14
                                    c-0.115,0.884,1.361,0.567,2.054,0.912c0.515,0.257,0.854,2.492,1.142,2.965c0.5,0.828,3.333-0.2,3.423,0.228
                                    c0.159,0.759-2.084,2.736,0.228,2.736c1.945,0,1.936-0.276,3.424,0.913c0.391,0.13,0.228,0.664,0.228,1.14v1.14
                                    c0,1.07,0.588,1.075,0.685,1.824c0.035,0.271,0.396,0.586,0.685,0.913c0.296,0.333,0.499,0.965,0.685,1.368
                                    c0.804,0,2.375,0.125,2.738,0.456c0.646,0.585,0.465,1.14,1.599,1.14c1.313,0,2.968-1.055,3.194,0.685
                                    c0.19,1.46,0.113,1.701,1.598,1.824c-0.508,1.521-2.713,0.266-3.423,1.14c-0.672,0.826-3.387,1.335-4.108,0.456
                                    c-0.791-0.963-0.84-1.057-2.282-1.14c-1.071-0.062-1.558,0.926-2.054,0c-0.572-1.071-0.302-1.228-1.598-1.824l-5.933,5.701
                                    l0.229,4.332l1.825-0.228l-2.054,5.245l2.054,2.28c0.812,0-0.112,0.344,0.456,0.912l0.229,0.229
                                    c0.665,0.664-0.277,0.468-0.685,0.684c-0.031,0.017,0.02,0.615,0,0.685c-0.216,0.777-0.416,0.706-0.456,1.597
                                    c-0.02,0.431-0.059,1.145,0,1.596c0.019,0.15,0.12,0.121,0.228,0.229c0.223,0.222,0.479,0.887,0.667,1.355l0.546,0.617
                                    c0,0.429,0.889,0.984,1.378,1.18c0.447,0.179,0.61,1.573,0.983,1.573c0.242,0,0.929-0.645,1.378,0
                                    c0.166,0.24-0.28,0.283-0.196,0.592c0.146,0.547,0.766,0.811,0.983,1.18c0.068,0.115,0.031,1.109,0,1.377
                                    c-0.077,0.674-0.545,0.436-0.59,0.785c-0.072,0.557,0,1.207,0,1.771c0,0.99-0.157,0.512,0.394,0.787
                                    c1.146,1.432,0.183,1.857,1.771,1.967c0.298,0.02,0.304,0.703,0.196,0.982c-0.416,1.082-0.394,2.092-0.394,3.541
                                    c0,2.781,0.541,4.176,1.181,6.295c0.679,2.244,1.378-0.363,1.378,3.146c0,1.592,0.314,1.35,1.575,1.77
                                    c0.118,0.355,1.147,1.35,0.59,2.164c-0.185,0.271-3.521-0.611-3.936-0.197c-0.04,0.039-0.197,6.311-0.197,6.688
                                    c0,3.498,1.378,0.736,1.378,2.361c0,1.49-1.309,3.363-0.984,4.916c0.266,1.273,4.123,0.086,3.543,1.377
                                    c-0.328,0.729-0.685-0.371-0.591,0.984c0.052,0.75,3.527-0.088,3.937-0.197c-0.681-0.227,0.083-4.852,0.197-4.916
                                    c1.768-1.018,1.145,2.162,2.952,2.162c4.223,0,1.053-6.164,3.937-6.688c2.465-0.447,4.134,2.404,4.134-1.572
                                    c0-3.529-0.428-7.852,1.574-10.621h9.055c0.344-0.115,0.15,0.006,0.196-0.395c0.069-0.609,0.256-0.275,0.787-0.393
                                    c0.636-0.141,1.553-0.428,1.771-0.984c0.087-0.221,0.168-0.428,0.197-0.59c0.095-0.521,0.225-0.813,0.394-1.377l-4.134-3.934
                                    l-0.59-12.391l-2.756-2.361l0.196-5.311h5.314c0.339-0.113,0.333-0.576,0.394-0.983c0.032-0.216,0.247-0.492,0.395-0.787
                                    c0.058-0.117,0.104-0.104,0.196-0.196c0.04-0.04,0.152-0.329,0.197-0.394c0.4-0.575,0.456-0.115,0.591-0.787
                                    c0.126-0.634,0.59,0.387,0.59,0.59v0.197c0,0.186,1.346-0.149,1.378-0.197c0.693-1.04-0.635-0.787,0.394-0.787h0.197
                                    c0.134,0,0-1.68,0-1.77c0.44-0.146,0.055-1.235,0.394-1.573c0.77-0.77,0.707-0.35,0.787,0.59c0.137,1.605,3.543,1.573,3.543,0
                                    c0-1.275,1.387-0.463,2.361-0.787c0.227-0.075-0.286-1.027,0-1.573c0.109-0.206,0.803-0.049,0.591-0.59
                                    c-0.201-0.515-0.475-0.02-0.787-0.197c-0.642-0.363-0.887-0.92-1.771-0.983c-0.826-0.058,0.454,0.374-0.394,0.197
                                    c-0.994-0.208-0.591-0.895-0.591-1.968c0.56,0,1.837,0.244,1.969-0.196c0.123-0.411,0.034-0.934,0.59-0.983
                                    c0.533-0.048,0.394,0.053,0.394-0.59c0-1.468,2.018-0.578,2.165-2.164c0.049-0.522,0.12-0.687,0.197-0.983
                                    c0.086-0.332,0.535-0.685,0.591-0.196c0.07,0.615,0,1.607,0,2.163h2.755l11.613-11.014c0.304,0,1.444-0.089,1.574,0
                                    c0.024,0.016,0.045,0.692,0.197,0.787c0.016,0.01,0.585,0.005,0.591,0c0.071-0.072,0.166-0.541,0.196-0.59
                                    c0.07-0.111-0.13-0.394,0-0.394h0.197v-0.59c0-0.264,0.264-0.32,0.394-0.393c0.288-0.163,0.276-0.276,0.394-0.393
                                    c0.102-0.102,0.533-0.14,0.591-0.197c0.185-0.185-0.043-0.543-0.197-0.59c-0.481-0.144-0.074-1.183,0.017-1.573h-4.74v-16.326
                                    c-1.949,0-1.45,0.128-2.953-0.787c-0.657-0.4-1.841-0.169-2.559-0.394c-0.83-0.259-1.055,0.413-1.378,0.984
                                    c-0.144,0.254-0.139-0.197-0.983-0.197c-2.131,0-1.765-0.385-1.969,1.181c-0.048,0.373-2.698-0.259-2.755-0.394
                                    c-1.234-2.917-3.741-5.281-2.756-0.197c-0.758-0.252-0.702-0.693-1.575-0.983l-0.59-0.197h-0.591l-0.591-0.183v-5.718
                                    l-8.857-5.114l1.575-5.311l-2.756-4.327h-4.134l1.772-6.491l-4.921-0.197c0-0.803-0.072-2.266,0.394-2.557
                                    c0.275-0.172,0.325,0.326,0.394-0.197c0.213-1.639-0.102-2.209,1.574-2.36c0.458-0.042,1.495-0.893,0.394-0.984
                                    c-1.04-0.085-0.549-0.71-0.983-1.376c-0.202-0.311-0.635-0.449-0.787-0.787c-0.291-0.643,0.289-2.603,0.394-3.147
                                    c-1.261,0-2.653,0.26-2.953-0.983c-0.062-0.259,0.95-0.68,0.984-0.983c0.147-1.283-0.19-2.606,0.394-3.541
                                    c0.272-0.436,0.541-1.18-0.394-1.18c-0.907,0-3.149,0.056-3.149-1.376c0-0.938-1.233-1.035-2.177-1.365L557.082,221.694z" />
                                        <path id="sinaloa" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M327.138,332.71
                                    c-0.499,0.035-0.932-0.275-1.292-0.584c-0.091-0.412-0.536-0.723-0.48-1.16c0.05-0.375-0.17-0.744-0.479-0.945
                                    c-0.243-0.275-0.699-0.584-1.055-0.463c-0.219,0.285-0.376,0.809-0.042,1.072c0.297,0.238,0.49,0.713,0.953,0.52
                                    c0.397-0.078,0.798,0.035,1.195,0.074c0.569-0.049,0.304,0.723,0.663,0.957C326.87,332.257,326.97,332.515,327.138,332.71z
                                     M276.258,258.704c0.038,0.156,0.046,0.262,0.017,0.301c0,2.048-0.312,1.92,1.647,1.92c3.086,0,1.373,1.788,1.373,3.292
                                    c0,1.309,1.248,3.175,1.922,4.39c0.276,0.495-3.335,0.074-3.569-2.195c-0.099-0.956,0.32-2.58-0.274-3.292
                                    c-1.574-1.888-1.922-1.244-1.922,0.823c0,1.136-1.033,1.103-1.647,1.646c-1.848,1.633-0.449,3.299-2.196,4.39
                                    c-1.019,0.637-2.024,0.102-3.02,1.097c-1.479,1.478-1.188,4.652,0.823,3.019c1.052-0.854,0.317,2.014,0,2.469
                                    c-0.351,0.505-1.521,0.866-2.196,1.372c1.046,0.788,1.62,0.598,2.464,1.5c1.349,1.442-3.474,1.628-0.664,3.756
                                    c0.812,0.614,2.265,1.058,2.432-0.221c0.09-0.694,1.25,1.419,1.769,1.546c3.856,0.943,7.788,4.403,11.275,5.964
                                    c1.631,0.73,1.096,2.315,2.874,2.43c0.817,0.053-1.327-3.278-1.327-4.418c0-3.752,2.829,0.476,3.316,1.547
                                    c1.651,3.632-1.761,5.522,3.979,5.522c1.8,0,5.063,2.073,5.527,3.094c0.711,1.563,0.213,3.826,1.989,4.418
                                    c3.24,0.747-0.585-1.704-0.442-2.651c0.578-3.815,1.647-1.473,2.874,0.663c0.453,0.789,1.493,4.791,1.99,4.86
                                    c1.543,0.215-1.022,2.071,0.663,3.755c0.288,0.288,1.323,1.977,1.326,1.989c0.469,1.512,1.723,2.426,2.874,3.977
                                    c1.956,2.632,6.474,3.506,7.075,6.627c0.298,1.55,3.453,6.408,4.864,6.408c2.46-2.625-1.598-3.971,1.326-6.628
                                    c1.238-1.124,3.718,5.9,3.758,6.185c1.006,7.039,5.268,3.783,7.517,6.85c2.125,2.896,0.663,8.055,5.748,8.836
                                    c3.178,0.488,4.509,14.584,11.496,17.012c5.292,1.838,2.108,4.172,5.085,6.848c3.236,2.912,4.165,3.846,6.853,7.07
                                    c0.321,1.924,0.646,1.785,1.105,2.871c0.501,1.184,2.493,2.357,3.537,2.432c1.542,0.105,0.9,0.379,1.548,1.324
                                    c0.416,0.607-0.032-0.359,0.221,1.326c0.097,0.65,2.627,3.176,3.095,4.859c0.479,1.725,1.769,1.328,1.769,3.756
                                    c0,0.844,0,2.518,0.221,3.314c0.062,0.223,3.095,0.781,3.095-0.441c0-3.08-0.884-5.785-0.884-9.279
                                    c0-1.912-0.586-3.541,1.769-2.209c1.232,0.695,1.257,2.969,0.999,5.457c0.819-0.021,1.636,0.027,1.938,0.377
                                    c0.742,0.857,1.366,1.592,2.689,1.641c3.12,0.119,1.04-3.191,0.896-4.777c-0.042-0.461-1.73-0.826-1.644-1.791
                                    c0.127-1.406,0.392-3.621,1.046-4.777c0.571-1.012-1.324-4.928,0.896-4.928c0.747,0,2.558-1.223,2.988-1.939
                                    c-0.371-0.744-0.544-1.021-0.597-1.941c-0.023-0.398-0.025-0.449-0.448-0.449c-1.012,0-1.746-0.596-2.839-0.596
                                    c-0.894,0-1.046-0.143-1.046,0.746c0,0.264-1.176,0.764-1.494,0.598c-0.374-0.197,0.047-1.658-0.15-1.793
                                    c-0.344-0.234-0.828,0.234-0.896-0.297c-0.042-0.326,0-0.715,0-1.047c0-2.131,0.173-1.939,2.241-1.939
                                    c0-0.6-4.794-0.363-5.08-1.793c-0.135-0.674-0.988-0.834-0.598-2.238c0.419-1.51,1.456-4.061-0.747-4.928
                                    c-0.417-0.164-0.277-1.035-0.299-1.492c-0.045-0.965-0.427-0.006-1.046-0.896c-0.169-0.242-1.189-1.227-1.494-0.447
                                    c-0.265,0.678-0.448,0.672-0.448,1.492c0,1.891-0.753-0.605-1.195-1.193c0-2.912,0.692-6.777-0.299-8.361
                                    c-0.796-1.273,5.77-1.988,1.792-3.285c-2.365-0.771-3.436-6.514-3.436-8.957c0-2.295-6.775-3.371-7.321-5.823
                                    c-0.966,0.579-0.265,1.358-1.494,1.641c-0.807,0.188-1.643-0.016-1.643,0.896c0,0.209,0.012,1.039,0,1.045
                                    c-0.36,0.191-0.99,0.373-1.345,0.598c-0.04,0.025,0.044,0.881,0,0.746c-0.405-1.221-0.517-0.711-1.793-0.746
                                    c-0.384-0.01-1.25-0.092-1.345-0.447c-0.308-1.162-0.069-0.896-1.345-0.896c-0.62,0-1.36-0.479-1.643-1.045
                                    c-0.401-0.803,0-4.563,0-5.524c0-1.186-0.838-0.271-1.345-0.149c-0.859,0.203-0.761-1.45-0.598-1.941
                                    c0.671-2.016-1.494-1.909-1.494-2.837c0-1.068-0.8-2.531-0.896-3.882c-0.051-0.727-1.025-0.412-1.344-0.746
                                    c-0.846-0.884-1.813,0.206-2.092-1.94c-0.196-1.506-2.54-1.621-2.54-2.986c0-1.074-1.998-0.896-2.988-0.896
                                    c-1.735,0-1.494-2.032-1.494-3.435v-6.419h-1.195c-1.299,0-0.735,0.069-2.333-0.932c0-2.945,0.556-1.016,2.313-2.696
                                    c1.762-1.684-1.105-4.463-0.386-6.548c0.623-1.806,1.916-1.079,3.854-1.156c1.027-0.041,1.729-0.291,2.29-0.649
                                    c0.017-0.728-0.328-0.137-0.328-0.641v-0.172c0-0.229-0.5,0.129-0.689,0c-0.037-0.026,0.018-2.287,0-2.587
                                    c-0.023-0.382-0.861-0.183-0.861-0.518v-0.517l-0.862-1.035c-2.055,0-1.307-3.138-3.1-2.932c-1.772,0.204-1.382,0.423-2.584-1.724
                                    c-0.187-0.333-1.181-2.508-1.206-2.76c-0.046-0.469,0.214-2.7-0.172-2.759c-1.701-0.261-2.585,0.813-3.101-1.379
                                    c-0.373-1.589-3.315,0.542-3.953-1.034h-6.382l-4.824-6.726l-0.517-9.485c-0.53-0.398-2.245,0.2-2.412-0.518
                                    c-0.234-1.007,0.444-0.602,0.861-0.862c0.201-0.126,0.186-1.082,0.344-1.207c0.256-0.202,1.231-0.146,0.689-0.69
                                    c-0.174-0.174,0.172-1.115,0.172-1.725c0-0.942,0.07-1.858-0.689-2.069c-1.68-0.467,0.383,0.062-1.034-0.862
                                    c-0.349-0.228-0.773-0.397-1.206-0.518c-0.76-0.212-3.641-1.225-3.101-2.415c0.305-0.673,0.463-1.79,0.517-2.759l-8.189,0.037
                                    l-1.054,0.398l-4.977,11.696l-7.245,3.898v2.228l-7.245,2.785L276.258,258.704z" />
                                        <path id="durango" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M389.147,371.999
                                    c0.186,0.092,0.327,0.23,0.369,0.414c0.14,0.609,0.858,1.348,0.603,2.01c-0.291,0.756-0.468,0.205-0.201,1.006h10.056v2.611
                                    c0,0.631-0.153,0.664,0.201,0.805c0.947,0.377,0.094,0.361,0.402,1.205c0.233,0.641,3.555,1.791,2.011,3.016
                                    c-1.189,0.941-5.284-0.27-5.028,2.211c0.16,1.545,0.919,1.205,2.212,1.205c1.537,0,1.81,0.002,1.81,1.607
                                    c-0.425,1.094-0.677,1.146-0.604,2.211c0.049,0.697,2.025-0.07,2.212-0.402c0.433-0.766,1.793-0.574,2.011-1.205
                                    c0.09-0.262,0-0.93,0-1.205c0-0.396,0.122-1.584,0.402-1.609c0.568-0.051,1.443-0.098,1.609,0.402
                                    c0,2.395,0.215,3.666,2.413,3.818c0.764,0.053-0.104,4.02,2.614,4.02l9.252-0.01c-0.003-1.137-0.014-2.109-0.014-3.252v-2.234
                                    c0-0.633,0.651-0.51,1.059-0.822c1.103-0.844-0.38-4.449,0.706-5.174c0.826-0.551,1.007-0.479,1.766-0.824
                                    c0.957-0.434,1.812,0.33,2.589-0.705c0-0.271-0.116-2.813,0-2.939c0.732-0.805-1.53-0.111-1.53-1.529
                                    c0-0.682,0.118-1.223,0.118-1.998c0-0.857-1.06-1.326-1.06-1.529c0-2.654-0.778-3.998,2.472-3.998c0-1.367-0.493-2.242,0.47-3.057
                                    c0.938-0.791-0.361-4.25,1.06-4.939c0.492-0.238,1.047-1.197,1.412-1.645c1.188-1.463,3.133-0.646,4.118-3.293
                                    c0.41-1.102,2.706-1.451,2.706-2.705c0-1.184-0.588-1.91-0.588-2.939c0-0.732,0.117-1.461,0.117-2.117
                                    c0-1.434-0.941-2.076-0.941-3.645c0-1.027,0.354-2.061,0.354-3.174c1.345-0.336,2.474-0.516,2.824-1.883
                                    c0.354-1.381,0.075-1.41,1.883-1.41c0.766,0,3.294-0.227,3.294-1.176c0-2.127,0.143-1.713,0.824-2.939
                                    c0.304-0.549,0.283-1.027,0.706-1.412c0.119-0.107,2.082-0.6,2.471-0.705c2.748-0.742,0.648-4.645,2.589-5.292
                                    c0.967,0.828,2.622,0.827,3.647,1.528c0.662,0.453,1.854,1.023,2.589,1.178c0.647,0.133,0.836-0.063,1.295-0.236
                                    c1.279-0.48,1.346-0.539,1.412-1.999c0.078-1.726,5.907,0.555,6.942,1.176c1.764,1.484,0.4,1.998,2.941,1.998
                                    c1.359,0,1.205-0.049,2.235,0.824c1.955,1.652,1.013-0.893,1.53-1.764c0.626-1.055,3.646-0.471,4.824-1.178
                                    c0.777-0.905,0.117-2.894,0.117-4.115c0-1.079-1.658-3.645-2.588-3.645c-1.005,0,0.588-1.242,0.588-2.353
                                    c0-1.265-0.726-6.063-1.177-6.114c-2.144-0.247-2.924-2.214-3.492-3.817l-2.272,2.693l-1.598,5.017
                                    c-0.071,0.426-0.24,0.996-0.456,1.141l-1.369,0.912c-2.395,0-3.271-1.354-4.108-3.192c-0.098-0.216-4.197-0.319-5.249-0.913
                                    c-3.235-1.827-5.705-5.443-5.705-9.35c0-4.256-4.827,1.606-2.738-5.701c0-0.805-0.267-2.187,0.457-2.28
                                    c0.678-0.088,1.195-0.124,1.825-0.228c0.818-0.136,0.298-0.384,0.229-0.684c-0.229-0.995-0.366-0.584-1.142-0.685
                                    c-0.499-0.064-0.184-2.637-0.456-3.192c-0.244-0.497-0.456-0.586-0.456-1.141c0.336-1.006,1.243-0.449,1.825-1.14
                                    c0.516-0.612,1.055-1.676,1.369-2.28c1.154-2.218,0.604-5.582,0.229-8.209c-0.416-0.624-0.828-0.761-1.142-1.14
                                    c-0.201-0.244-0.206-0.597-0.228-0.913c-0.052-0.726-0.188-0.512-0.229-0.912c-0.126-1.22-0.111-0.622,0.685-1.14
                                    c1.091-0.709,0.685-3.51,0.685-4.789l2.967-3.192l-2.282-4.789l-1.598-5.245l-9.92-4.48l-13.78-1.248l-6.368,4.853
                                    c-0.086,0.259-1.161,1.229-1.377,1.379c-0.239,0.167-1.413,0.964-1.551,1.208c-0.941,1.671,0.454,5.891-2.067,6.036
                                    c-1.631,0.094-3.687-1.568-4.307-2.932c-0.845-1.863-1.469-1.753-3.79-2.76c-1.801,0.602-2.498,0.485-3.962,1.38
                                    c-1.824,1.115-2.58,1.511-3.273-0.518c-0.099-0.291-0.969-1.023-1.378-0.689c-1.181,0.961-0.517,1.91-0.517,3.449
                                    c0,2.761-6.021-4.194-8.613-4.312c-0.578-0.026-2.765-1.042-2.929-1.208c-0.378-0.378-0.352-3.472-1.895-2.414
                                    c-0.788,0.539-0.146,1.244-1.55,0.689c-2.392-0.943-3.623-5.167-7.579-5.346c-2.789-0.126,0.603-3.026-4.307-1.552
                                    c0,1.165-1.842,1.907-2.411,3.104c-0.703,1.476-0.794,1.32-2.584,2.069c-2.886,1.208-0.267,6.473-2.067,8.278
                                    c-2.713,2.719-5.34,5.95-5.34,10.52c0,3.596-1.834,2.192-2.412,4.829c-1.849,8.454,2.598,6.481-6.03,12.154
                                    c-2.845,1.871,0.625-0.254-2.755-0.254c-0.778,0-1.166-1.442-2.239-1.553c-1.317-0.135-1.7-0.534-3.118-1.083
                                    c-0.561,0.358-1.262,0.608-2.29,0.649c-1.939,0.077-3.231-0.65-3.854,1.156c-0.72,2.085,2.147,4.864,0.386,6.548
                                    c-1.757,1.68-2.313-0.249-2.313,2.696c1.598,1.001,1.034,0.932,2.333,0.932h1.195v6.419c0,1.402-0.241,3.435,1.494,3.435
                                    c0.991,0,2.988-0.179,2.988,0.896c0,1.365,2.344,1.48,2.54,2.986c0.278,2.146,1.246,1.057,2.092,1.94
                                    c0.319,0.334,1.293,0.02,1.344,0.746c0.096,1.351,0.896,2.813,0.896,3.882c0,0.928,2.166,0.821,1.494,2.837
                                    c-0.163,0.491-0.261,2.145,0.598,1.941c0.506-0.121,1.345-1.036,1.345,0.149c0,0.961-0.401,4.721,0,5.524
                                    c0.283,0.566,1.023,1.045,1.643,1.045c1.276,0,1.037-0.266,1.345,0.896c0.094,0.355,0.961,0.438,1.345,0.447
                                    c1.276,0.035,1.388-0.475,1.793,0.746c0.044,0.135-0.04-0.721,0-0.746c0.355-0.225,0.985-0.406,1.345-0.598
                                    c0.012-0.006,0-0.836,0-1.045c0-0.912,0.836-0.709,1.643-0.896c1.229-0.283,0.528-1.063,1.494-1.641
                                    c0.545,2.452,7.321,3.528,7.321,5.823c0,2.443,1.071,8.186,3.436,8.957c3.977,1.297-2.589,2.012-1.792,3.285
                                    c0.991,1.584,0.299,5.449,0.299,8.361c0.442,0.588,1.195,3.084,1.195,1.193c0-0.82,0.183-0.814,0.448-1.492
                                    c0.305-0.779,1.324,0.205,1.494,0.447c0.619,0.891,1-0.068,1.046,0.896c0.021,0.457-0.119,1.328,0.299,1.492
                                    c2.203,0.867,1.167,3.418,0.747,4.928c-0.39,1.404,0.463,1.564,0.598,2.238c0.285,1.43,5.08,1.193,5.08,1.793
                                    c-2.068,0-2.241-0.191-2.241,1.939c0,0.332-0.042,0.721,0,1.047c0.069,0.531,0.553,0.063,0.896,0.297
                                    c0.197,0.135-0.224,1.596,0.15,1.793c0.318,0.166,1.494-0.334,1.494-0.598c0-0.889,0.152-0.746,1.046-0.746
                                    c1.093,0,1.827,0.596,2.839,0.596c0.423,0,0.425,0.051,0.448,0.449C388.596,371.068,388.776,371.255,389.147,371.999z" />
                                        <path id="nayalit" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M362.174,430.665
                                    c-0.117,0.42-0.311,0.977-0.82,1.023c-0.517-0.033-1.148-0.186-1.566,0.215c-0.144,0.545-0.902,0.191-0.523-0.254
                                    c0.269-0.408,0.119-1.229-0.518-0.93c-0.428,0.182-1.068,0.395-1.36-0.115c-0.173-0.152-0.345-0.621,0.076-0.488
                                    c0.456-0.143,1.259-0.416,1.144-1.004c-0.14-0.369,0.07-0.656,0.385-0.74c0.256-0.348,0.804-0.688,1.193-0.34
                                    c0.28,0.416,0.005,1.137,0.562,1.406c0.376,0.422,0.971,0.547,1.378,0.898C362.184,430.435,362.203,430.554,362.174,430.665z
                                     M353.711,422.994c0.769,0,2.756-0.35,2.756,0.59c0,0.764-0.075,0.648,0.197,0.984c0.46,0.566-0.153,0.195,0.59,0.195h0.59
                                    c0.705,0,1.079-0.229,0.984,0.592c-0.083,0.725-0.27,0.387-0.787,0.59c-0.122,0.047-0.069,0.17-0.197,0.195
                                    c-0.192,0.039-0.241,0.074-0.394,0.197c-0.101,0.082-0.104,0.104-0.197,0.197c-0.137,0.137-1.067,0.445-1.378,0.59
                                    c-0.162,0.484-0.601,0.291-0.787,0.59c-0.098,0.156,0.104,1.396-0.394,1.18c-0.342-0.148-1.378-1.426-1.378-1.77
                                    c0-1.949,0.56-1.078-0.984-0.984c-1.679,0.102-2.076-0.141-1.378-1.377c0.489-0.863-0.91-2.842-2.165-2.359
                                    c-2.237,0.859-2.165-2.322-2.165-3.934c0-2.006,5.074-2.484,5.708-1.574c0.194,0.279,0.359,1.5,0.394,1.77
                                    c0.055,0.428,0,0.947,0,1.377c0,1.072,0.649-0.273,1.378-0.393c1.011-0.164,0.619,0.346,0.196,0.393
                                    C353.283,420.16,353.317,421.197,353.711,422.994L353.711,422.994z M371.425,413.749c0.295-0.383,0.71-0.723,0.787-1.229
                                    c0.04-0.334,0.039-0.674-0.017-1.008c-0.135-0.215-0.416-0.156-0.625-0.129c-0.289,0.039-0.625-0.102-0.874,0.105
                                    c-0.269,0.113-0.184,0.434-0.044,0.596c0.011,0.223-0.071,0.5,0.129,0.664C371.09,413.005,371.246,413.398,371.425,413.749z
                                     M346.428,415.716c0.528-0.051,1.046-0.279,1.583-0.184c0.306-0.15,0.265-0.533,0.348-0.811c0.086-0.299,0.237-0.734-0.066-0.955
                                    c-0.301-0.15-0.317-0.609-0.672-0.686c-0.299-0.137-0.561-0.432-0.924-0.33c-0.32,0.066-0.676,0.266-0.798,0.582
                                    c-0.089,0.309,0.182,0.549,0.156,0.854c0.025,0.371,0.074,0.742,0.209,1.09C346.313,415.425,346.368,415.572,346.428,415.716z
                                     M380.332,388.283c0.819-0.021,1.635,0.029,1.937,0.379c0.742,0.857,1.366,1.592,2.689,1.641c3.12,0.119,1.04-3.191,0.896-4.777
                                    c-0.042-0.461-1.73-0.826-1.644-1.791c0.127-1.406,0.392-3.621,1.046-4.777c0.571-1.012-1.324-4.928,0.896-4.928
                                    c0.747,0,2.558-1.223,2.995-1.986c0.192,0.049,0.327,0.188,0.369,0.371c0.14,0.609,0.858,1.348,0.603,2.01
                                    c-0.291,0.756-0.468,0.205-0.201,1.006h10.056v2.611c0,0.631-0.153,0.664,0.201,0.805c0.947,0.377,0.094,0.361,0.402,1.205
                                    c0.233,0.641,3.555,1.791,2.011,3.016c-1.189,0.941-5.284-0.27-5.028,2.211c0.16,1.545,0.919,1.205,2.212,1.205
                                    c1.537,0,1.81,0.002,1.81,1.607c-0.425,1.094-0.677,1.146-0.604,2.211c0.049,0.697,2.025-0.07,2.212-0.402
                                    c0.433-0.766,1.793-0.574,2.011-1.205c0.09-0.262,0-0.93,0-1.205c0-0.396,0.122-1.584,0.402-1.609
                                    c0.568-0.051,1.443-0.098,1.609,0.402c0,2.395,0.215,3.666,2.413,3.818c0.764,0.053-0.104,4.02,2.614,4.02h9.251
                                    c-0.042,0.674-0.197,2.551-0.402,3.215c-0.041,0.131-0.752,0.205-0.804,0.604c-0.152,1.168,0.082,1.32-0.604,2.211
                                    c-0.326,0.424-0.201,1.057-0.201,1.607c0,1.025-1.207,0.34-1.207,1.809c0,1.305,0.125,3.041-0.201,4.02
                                    c1.981,0.914,2.263-0.309,4.022-0.201c0.074,0.004,1.509,0.311,2.011,0.402c1.05,0.189,1.729,2.477,0.805,3.215
                                    c-1.003,0.801-0.537,4.352,1.81,3.217c0.727-0.354,1.701-0.223,2.615,0.4c0.813,0.557,0.236,1.408,1.81,1.408
                                    c0.358,1.791-0.067,1.033,1.005,1.809c0.896,0.646-0.489,5.338,0.201,6.027c0.031,0.031,0.531-0.008,0.604,0
                                    c0.16,0.02,0.244,0.172,0.402,0.201c4.391,0.803,1.609,2.486,1.609,5.428c0,1.816-0.009,2.844-1.207,3.816
                                    c-1.153,0.938-1.855-1.52-3.218-0.803c-0.086,0.045-0.201,0.375-0.201,0.604c0,1.281-0.802,0.988-1.005,2.209
                                    c-0.69-0.158-0.965-0.201-1.609-0.201c-0.319,0-0.687,0.029-1.006,0c-0.737-0.066-0.14,0.063-0.603-0.4
                                    c-0.114-0.115-0.243-0.184-0.402-0.201c-0.563-0.064-0.215,0.16-0.604,0.201c-0.707,0.072-1.497,0-2.212,0v8.041l-3.419,3.414
                                    l2.414,3.014l0.402,5.627c-0.63-1.049-0.367-1.307-0.604-2.412c-0.28-1.307-1.947-0.627-2.614-1.809
                                    c-0.301-0.531-0.737-1.926-1.207-2.611c-0.759-1.109-5.88-2.295-6.033-3.617c-0.193-1.682-1.176-1.609-2.815-1.609
                                    c-0.38,0-0.709-1.428-0.805-1.809c-1.773-0.787-6.534-1.67-7.039,0.805c-0.536,2.627-2.882,0.52-4.224,1.607
                                    c-1.067,0.867-2.137,0.811-2.815,2.01c-0.756,1.338-3.448,1.447-3.821,3.016c-0.276,1.158-0.34,1.816-0.777,2.496
                                    c-0.246-0.52-0.761-0.85-1.811-0.889c-1.717-0.063-3.385-0.221-5.085-0.221c0.203-2.645,2.351-3.426,2.874-4.859
                                    c0.981-2.686,5.141-2.791,5.748-5.082c0.816-3.074-1.851-5.854-0.663-9.277c1.049-3.025,1.653-4.82-1.547-7.07
                                    c-1.142-0.803-3.668-6.791-5.527-7.07c-1.573-0.234-4.771-7.666-4.863-9.057c-0.191-0.957-0.491-0.74-0.442-1.768
                                    c0.037-0.768,0.607-1.338,0.663-1.768c0.151-1.156-1.326-3.846-1.326-5.301c0-0.482-0.207-1.988,0.221-1.988
                                    c1.33,0,0.285,0.055,0.664,0.662c0.537,0.857,0.884,2.24,0.884,3.535c0,1.811-0.073,1.141,0.884,1.988
                                    c0.428,0.377,0.376,2.502,0,2.65c-1.515,0.596,0.152,1.191,0.221,1.105c0.605-0.77,1.013-1.176,1.769-1.547
                                    c1.055-0.518,0.523,0.494,0.663,0.883c0.073,0.203,0.655,0.65,0.663,0.664c0.818,1.307,1.433,0.887,2.874-0.221
                                    c0-2.154-3.349-1.387-5.084-3.314c-0.691-0.768-1.145-6.023-1.547-7.07C379.294,394.613,380.02,391.29,380.332,388.283z" />
                                        <path id="sanluispotosi" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M507.37,414.076
                                    c3.739,0.996,8.654,0.428,12.863,0.941c3.478,0.426,10.135,6.063,12.36,8.717c2.172,2.588,9.916-5.516,12.06-6.229
                                    c1.659,0.383,3.171,0.428,3.387,2.301c0.309,2.678,4.251,3.389,6.233,4.197c0.895,0.365,1.646,0.406,2.846,0.406
                                    c1.271,0,1.706,0.406,2.845,0.406l2.168-3.656h2.168l4.607,5.281c0.561-1.201,1.586-0.908,2.438-1.76
                                    c0.211-0.211,1.546-0.504,1.626-0.813c0.148-0.568,0.542-1.006,0.542-1.625c0-2.693,3.794,0.479,3.794-1.896
                                    c0-0.965,0.397-1.479,1.084-2.166c0.549-0.549,2.522,0.135,1.626,0.135c0.331,0.994,0.271,1.807,0.271,2.844
                                    c0,0.721-0.099,0.717,0.542,0.813c0.813,0.123,0.469,3.092,0.135,3.656c-0.393,0.664-0.406,1.078-0.406,2.031
                                    c0,1.781,1.646,2.168,2.574,3.791c0.269-0.504,1.355-1.879,2.033-1.488c0.916,0.527,1.079,1.211,2.168,1.354
                                    c0.201,0.025,0.313,1.5,0.406,1.76c0.152,0.422,1.541,0.947,2.168,0.947c1.126,0,3.306,0.854,4.2,0.406
                                    c0.316-0.158,0.618-0.617,0.813-0.813c0.03-0.031,0.103-0.217,0.135-0.27c0.105-0.176,0.387-0.217,0.542-0.406
                                    c0.172-0.211,0.427-0.604,0.678-0.678c0.235-0.07,1.084-0.428,1.084-0.678c-0.061-0.787-0.213-0.947-0.948-0.947
                                    c-0.23,0-0.515-0.004-0.678-0.135c-0.282-0.229-0.384-0.131-0.813-0.271c-0.269-0.088-0.543-0.557-0.543-0.813
                                    c0-0.537-0.135-0.941-0.135-1.488l5.826-1.355l-0.813-3.791h-1.22c-0.61,0-0.518,0.166-0.542-0.406
                                    c-0.033-0.773-0.136-1.018-0.136-1.76c0-0.404-0.213-0.26-0.271-0.406c-0.164-0.416-0.146-0.916-0.271-1.354
                                    c-0.093-0.328-0.271-0.822-0.271-1.084l4.606-2.301l-0.136-1.896c-0.388-1.744-1.083-1.193-2.71-1.625
                                    c-0.229-0.061,1.017-0.02,1.22-0.676c0.907-2.93-0.171-4.412,2.304-6.229c1.402-1.031,3.253-7.313,0.677-7.313
                                    c-1.397,0-4.253-0.377-4.606-1.625c-0.072-0.258-0.112-0.561-0.123-0.904c-1.479-0.184-1.339-1.525-3.952-1.525
                                    c-0.964,0-0.989,0.832-1.37,1.508c-0.535,0.947-4.179,0.137-4.93,0.137c-2.434,0-1.049,1.439-2.055-1.096
                                    c-0.126-0.32-1.345-0.664-1.779-0.686c-2.175-0.113-6.089,1.633-7.259,0.822c0.112-0.037,0.329-2.424,0.411-2.742
                                    c0.109-0.42,0.753-0.779-0.273-0.822c-0.984-0.043-0.822,0.1-0.822-0.822c0-0.305,0.088-0.479,0.138-0.686
                                    c0.141-0.596,0.109-0.902,0-1.508c-0.09-0.498-2.611,0.129-3.15-0.139c-1.119-0.553-2.111-2.139-2.739-3.152
                                    c-0.341-0.854-2.054-1.484-2.054,0.137c0,0.445,0.912,3.027,0,2.879c-1.64-0.266-2.544-1.418-4.245-1.92
                                    c-0.941-0.275-1.023,1.445-2.328,0.961c-0.588-0.219,0.016-0.762-0.958-0.273c-0.561,0.279-1.016,0.646-2.055,0.684
                                    c-1.08,0.039-0.685-0.613-0.685-1.508c0-0.59,0.137-1.148,0.137-1.781c-0.288-1.156,0.018-1.371-1.369-1.371
                                    c-1.62,0-3.336-0.135-4.656,0.273c-0.259,0.08-0.771,0.547-0.958,0.412c-0.393-0.283-1.026-1.646-0.138-1.646
                                    c0.164,0,0.741,0,0.822-0.137c0.232-0.395-0.172-2.57-0.548-2.193c-0.023,0.023-1.479,1.732-1.644,1.234
                                    c-0.235-0.707,0-2.551,0-3.428c0-1.918-0.48-1.463,0.959-2.057c0.387-0.16,0.916-0.406,1.369-0.686
                                    c1.027-0.633,0.958-0.662,0.958-2.193h-1.779c-1.207,0-1.097,0.24-1.097-0.959c0-1.336,0.216-0.977-0.821-1.234
                                    c-0.351-0.088-0.958-0.197-0.958-0.549l0.007-1.719c-0.22,0.074-0.477,0.104-0.769,0.104c-1.808,0-1.185-3.18-2.952-2.162
                                    c-0.114,0.064-0.878,4.689-0.197,4.916c-0.409,0.109-3.885,0.947-3.937,0.197c-0.094-1.355,0.263-0.256,0.591-0.984
                                    c0.58-1.291-3.277-0.104-3.543-1.377c-0.324-1.553,0.984-3.426,0.984-4.916c0-1.625-1.378,1.137-1.378-2.361
                                    c0-0.377,0.157-6.648,0.197-6.688c0.415-0.414,3.751,0.469,3.936,0.197c0.558-0.814-0.472-1.809-0.59-2.164
                                    c-1.261-0.42-1.575-0.178-1.575-1.77c0-3.51-0.699-0.902-1.378-3.146c-0.64-2.119-1.181-3.514-1.181-6.295
                                    c0-1.449-0.022-2.459,0.394-3.541c0.107-0.279,0.102-0.963-0.196-0.982c-1.589-0.109-0.625-0.535-1.771-1.967
                                    c-0.551-0.275-0.394,0.203-0.394-0.787c0-0.564-0.072-1.215,0-1.771c0.045-0.35,0.513-0.111,0.59-0.785
                                    c0.031-0.268,0.068-1.262,0-1.377c-0.218-0.369-0.837-0.633-0.983-1.18c-0.084-0.309,0.362-0.352,0.196-0.592
                                    c-0.449-0.645-1.136,0-1.378,0c-0.373,0-0.536-1.394-0.983-1.573c-0.489-0.195-1.378-0.751-1.378-1.18l-0.563-0.63l-0.89-0.237
                                    l-8.072,13.713h-1.615c-0.835,0-0.843-0.508-2.018-0.402c-1.039,0.094-0.067,0.27-0.403,0.807
                                    c-0.404,0.645-0.812,0.156-0.404,0.807c0.143,0.229,0.369,0.137,0.404,0.404c0.047,0.369,0,0.832,0,1.209
                                    c0,0.936-0.314,1.777,0.403,2.018l-17.356,16.537c-2.422-2.018-1.878-1.982-2.019-2.018c-2.845-0.709-0.448,0.285-1.211,0.807
                                    c-0.739,0.506-2.314-0.545-2.422,1.211c-0.072,1.184-0.813,2.166-0.813,3.359c-1.491-0.039-3.995,1.691-6.05,1.416
                                    c-2.371-1.668-4.893-3.984-4.893-1.631c0,0.561-1.14,14.223,2.067,17.426c1.007,1.006,2.721,1.926,4.036,2.824
                                    c1.53,1.047,1.543,4.861,4.031,4.861c3.33,0,4.163,0.697,6.061,1.867c2.153,1.328,1.08,1.34,3.229,1.34
                                    c1.681,0,3.026,0.553,3.229-1.211c0.051-0.443,0.052-1.846,0.403-2.018c2.147-1.039,0.237-0.287,1.211-0.807
                                    c3.104-1.654,0.202,0.807,1.211-0.807c0.143-0.227,0.214-0.213,0.404-0.402c0.094-0.096,0.608-0.352,0.807-0.404
                                    c0.688-0.178,0.824-0.402,1.615-0.402c2.979,0.248,1.835,1.047,2.018,4.033c0.071,1.168,0.807,2.076,0.807,4.033
                                    c0,1.77-2.018,1.611-2.018,4.033c0,3.395,1.569,5.371,0.808,8.875c-0.248,1.141-2.2,2.781-2.826,4.033
                                    C509.034,410.687,508.259,412.996,507.37,414.076z" />
                                        <path id="queretaro" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M550.3,474.16
                                    c-0.048-0.496-0.098-0.945-0.016-1.035c0.085-0.094,0.88-1.945,0.881-1.957c0.075-1.098-1.183-0.279-1.272-1.273
                                    c-0.031-0.35-1.276-0.377-1.467-0.49c-0.058-0.035-0.368-0.924-0.587-1.078c-0.535-0.373-1.521-0.445-2.054-0.979
                                    c-0.474-0.473-0.724-1.457-1.077-2.252c-0.325,0.045-0.602,0.232-0.802,0.525c-0.606-1.002-1.287-2.211-1.307-2.451
                                    c-0.027-0.328,0.153-1.021-0.178-1.064c-0.667-0.086-2.845,0.279-3.196,0c-0.321-0.254,0.248-3.436,0-4.082
                                    c-0.299-0.775-0.218-4.221-0.711-4.258c-0.577-0.045-1.775,0.309-1.775-0.355c0-2.934,4.501-2.459-0.178-2.662
                                    c-2.355-0.102-1.47-3.115,0-4.08c0.985-0.648,1.907-2.58,2.486-3.904c0.63,0.629,1.031,1.775,2.309,1.775
                                    c1.56,0,3.491,0.426,3.906-1.066c0.355-1.277-1.493-1.951,0.888-1.951c0.547,0,0.393,0.414,0.355,0.533
                                    c-0.417,1.311,0.91,0.939,1.775,0.887c0.291-0.018,1.117-0.971,1.243,0c0.053,0.404,1.175,0.236,1.243-0.355
                                    c0.207-1.805,0.156-1.598,2.131-1.598l-0.533-7.098c0.221-0.146,1.709-0.697,1.599-0.178c-0.199,0.941-0.181,0.836,1.065,0.889
                                    c1.404,0.057,0.334-1.844,2.486-0.889c0.759,0.338,1.283,0.256,0.888,0.889c-0.452,0.721,0.41,0.887,0.888,0.887
                                    c0.908,0,0.781-0.004,1.421-0.533c0.898-0.74,1.26-1.16,1.775-2.129c0.147-0.275,2.177-0.471,2.486-0.531
                                    c-0.133-0.4-0.129,0.049-0.355-0.178c-0.028-0.029,0.008-0.467,0-0.533c-0.015-0.117-0.114-0.076-0.178-0.178
                                    c-0.063-0.1,0.042-0.244,0-0.354c-0.096-0.248-0.274-0.275-0.355-0.355c-0.268-0.27,0.053-0.303-0.532-0.355
                                    c-0.753-0.066-0.537,0.053-1.421-0.354l-1.065,0.887l-1.16-6.045l2.226-3.67h2.168l4.607,5.281
                                    c0.561-1.201,1.586-0.908,2.438-1.76c0.211-0.211,1.546-0.504,1.626-0.813c0.148-0.568,0.542-1.006,0.542-1.625
                                    c0-2.693,3.794,0.479,3.794-1.896c0-0.965,0.397-1.479,1.084-2.166c0.549-0.549,2.522,0.135,1.626,0.135
                                    c0.331,0.994,0.271,1.807,0.271,2.844c0,0.721-0.099,0.717,0.542,0.813c0.813,0.123,0.469,3.092,0.135,3.656
                                    c-0.393,0.664-0.406,1.078-0.406,2.031c0,1.781,1.646,2.168,2.58,3.744l0.258,2.531c-0.409,0-0.937,1.65-1.555,1.73
                                    c-1.109,0.145-2.989-0.115-3.374,0.887c-0.347,0.9-0.9,0.564-1.598,0.355c-0.878-0.262-1.204-0.635-2.664-0.711
                                    c-1.754-0.09-1.598-0.51-1.598,1.242c0,0.648-0.252,1.053-0.178,1.775c0.046,0.443,2.007,0.971,1.953,1.242l-0.178,0.887
                                    c-0.261,1.043-1.243,0.264-1.243,1.775c0,1.094-1.436,1.814-2.308,1.42c-2.609-1.186-1.066,4.971-1.066,5.855
                                    c0,2.123-1.138,1.182-1.775,2.838c-0.365,0.949-1.89,0.223-1.953,0.711c-0.116,0.893-1.587,0.988-2.486,1.242
                                    c-1.329,0.375,0.079-0.152-0.71,0.887c-0.577,0.76-2.47,0.336-3.196,0l-0.533,8.695c-0.722,0-1.182-0.178-1.953-0.178
                                    c-1.137,0-0.178,0.686-0.178,0.887c0,0.352-0.913,0.061-1.065,0c-0.606-0.238,0.139,0.57,0,0.889
                                    c-0.12,0.275-0.419,1.66-0.532,1.773c-0.927,0.926,0.71,0.367,0.71,1.775c0,0.447,0.132,1.563-0.354,1.596
                                    c-1.271,0.088-0.655,0.121-1.421,0.711c-0.932,0.715-0.603-0.463-1.243,0.178c-0.261,0.26-0.421,0.156-0.711,0.531
                                    C551.305,474.076,552.121,474.152,550.3,474.16z" />
                                        <path id="zacatecas" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M507.371,414.119l-7.759-7h-3.648
                                    l-0.654-0.463c-0.129-1.541,0.364-1.684-1.211-2.018c-0.417-0.088-0.756,1.922-1.614,0.404c-0.133-0.234,0.034-0.541,0-0.807
                                    c-0.094-0.719-0.82-0.195-1.211-1.211c-0.343-0.891,1.438-3.631,0.403-3.631h-0.403c-0.954,0-1.255-1.498-2.019-1.613
                                    c-2.355-0.352-1.786-0.979-3.229-2.42c-0.921-0.92-2.366-1.043-2.825-2.42c-1.393,0.465-3.633,0.336-3.633,1.613
                                    c0,2.842,0.463,3.227-2.422,3.227c-6.633,0-5.247-0.035-5.247,4.842c0,0.9-0.735,1.002-1.614,1.613
                                    c-0.546,0.379-1.615,2.918-1.615,4.033c0,1.559-1.024,0.986-1.211,2.42c-0.569,4.373-0.106,5.514,3.109,6.295
                                    c-0.117,0.326-2.033,0.035-2.331,0.049c0.15,0.607,0.213,1.617,0.248,2.127c0.038,0.549-0.251,0.768-0.251,1.379
                                    c0,1.174,1.097,1.213,1.632,1.881c0.284,0.355,0.633,1.104,1.255,0.754c0.398-0.225,0.453-0.006,1.005,0.375l0.125,5.77
                                    c-1.732,0-2.197,0.627-3.515,0.627c-0.276,0-1.186,1.354-1.632,1.631c-0.981,0.615-1.81-0.805-2.008,1.129
                                    c-0.06,0.582-0.001,2.191-1.004,1.506c-0.418-0.285,0.616-1.004-0.628-1.004c-1.396,0-2.626-0.02-4.017-0.25l0.251,6.27
                                    l-5.021,0.629c-0.441,0.109-0.026,0.236-0.627,0.375c-0.4,0.092-0.763,0.119-1.13,0.252c-0.182,0.064-1.088,0.434-1.13,0.502
                                    c-0.223,0.355-0.131,0.25-0.753,0.25c-0.417,0-0.56,0.096-0.753-0.25c-0.316-0.568-0.563-0.527-0.879-0.879
                                    c-0.166-0.186-0.26-0.877-0.376-1.129c-0.308-0.672-0.411-1.111-0.754-1.881c0-0.85-2.005-0.977-2.761-0.879
                                    c-0.599,0.078-0.138,1.004-1.13,1.254c-0.211,0.055-0.985,0.604-1.129,0.127c-0.205-0.678-0.126-1.424-0.126-2.133
                                    c0-1.662,0.123-1.619-1.381-1.004c-1.756,0.721,0.129-1.754-0.879-2.383c-0.257-0.16-0.728-0.783-0.878-1.129
                                    c-0.246-0.564-0.226-0.793-0.879-0.877c-0.634-0.082-0.453,0.004-0.502-0.879c0-1.154-0.217-2.133,1.13-2.133
                                    c1.402,0-0.234,1.004,1.632,1.004c0.859,0,0.996,0.156,1.506-0.377c0.865-0.902,1.381,0.676,1.381-1.504
                                    c0-0.83-1.52,0.119-2.134-0.125c-0.303-0.121-1.312-1.217-1.883-0.502c-0.148,0.184-0.351,0.602-0.502,0.752
                                    c-0.075,0.074-0.502,0.035-0.502-0.125c0-0.354,0.969-0.258,0.502-1.004c-0.568-0.908,0.349-1.57,0.878-1.631
                                    c0.463-0.053,0.537-1.074,0.628-1.504c1.193-0.398,2.003-0.627,3.264-0.627c0.394,0,0.761-0.893,1.004-1.381
                                    c0.169-0.338-0.162-1.156,0-1.504c0.062-0.133,0.957-1.693,0.628-1.883c-0.86-0.496-2.405-0.459-1.507-1.756
                                    c-0.504,0-0.441-0.627,0.502-0.627c0.674,0,1.281-0.086,1.758-0.25c0.818-0.283,0.369-2.043,1.883-2.258
                                    c1.033-0.148,1.397-0.553,1.631-1.254c0.324-0.973,1.433-0.33,1.883-1.004c0.361-0.543,0.224-0.598,1.005-0.879
                                    c0.802-0.287,0.456,0.186,1.255,0.252c1.208-0.322,2.853-0.344,3.766-1.254c0.032-0.033,0-1.076,0-1.129
                                    c0-1.352-0.044-0.838-1.13-1.381c-0.401-0.199,0.205-0.863,0-1.254c-0.303-0.572-0.194-1.311,0.251-1.756
                                    c0.374-0.375,0.459-1.494,0.502-2.133c0-1.172-0.377-1.527-0.377-2.633c0-0.764-0.616-0.855-1.255-1.254
                                    c-0.888-0.555-0.613-0.439-0.878-1.129c-0.148-0.385-0.271-0.145-0.628-0.377c-0.925-0.602-0.009-0.502-1.381-0.502
                                    c-0.39,0.52-1.434,0.957-1.757,1.506c-0.207,0.348-0.75,0.711-0.753,0.752c-0.087,1.248-0.57,1.928-0.126,2.885
                                    c0.212,0.457,0.588,0.42,0.753,0.879c0.097,0.266-1.078,1.189-1.38,1.379c-0.188,0.117-1.125-0.131-1.256,0
                                    c-0.285,0.285,0.002,1.262-0.125,1.631c-0.301,0.873-0.271-0.744-0.628,1.129l-8.033-0.127c-0.741-2.225,0.89-0.426,1.256-2.006
                                    c0.358-1.549,0.545-2.719,1.381-3.637c0.026-0.029,0.339-0.967,0.627-1.129c0.555-0.313,0.368-1.93,0.628-2.51
                                    c0.29-0.646,0.674-0.324,0.878-1.002c0.384-1.271-0.502-0.219-0.502-1.381c0-1.217-1.004,0.219-1.004-1.004
                                    c0-1.764,0.002-1.756-1.506-1.756h-3.766l-3.389,13.547l-1.255-11.539c0-0.514,0.251-0.541,0.251-1.129
                                    c0-0.287-0.125-1.799,0.125-1.881c0.615-0.201,3.515,0,3.64-0.127c0.8-0.799-0.639-1.439,1.004-2.006
                                    c0.385-0.133,0.367-0.25-0.125-0.25c-0.968,0-0.628-1.588-0.628-2.385l-6.024-0.5c-1.146-0.287-2.504,1.385-1.632,2.256
                                    c0.722,0.723,1.219,1.309,1.13,2.385c-0.021,0.258-0.222,0.242-0.251,0.5c-0.054,0.467-0.162,0.035-0.251,0.377
                                    c-0.088,0.338,0.501,0.492,0.753,0.627c0.251,0.252,0.199,3.068,0.126,3.639c-0.088,0.674-1.507,0.414-1.507,1.254
                                    c0,1.063-0.204,0.977-1.129,1.379c-1.514,0.658-0.844-0.539-1.13-1.254c-0.495-1.238-0.751-0.805-0.502-2.133
                                    c0-0.385-0.344-0.357-0.628-0.752c-0.085-0.119-0.118-0.852-0.125-1.004c-0.036-0.758-0.774-0.801-1.507-0.627
                                    c-0.825,0.197-0.879,1.5-0.879,2.508c0,1.602-1.019,0.625-1.631,1.381c-0.127,0.156-0.132,0.553-0.251,0.627
                                    c-0.057,0.035-0.49,0.025-0.84,0.014l0.038-0.49c-0.004-1.127-0.014-2.1-0.014-3.242v-2.234c0-0.633,0.651-0.51,1.059-0.822
                                    c1.103-0.844-0.38-4.449,0.706-5.174c0.826-0.551,1.007-0.479,1.766-0.824c0.957-0.434,1.812,0.33,2.589-0.705
                                    c0-0.271-0.116-2.813,0-2.939c0.732-0.805-1.53-0.111-1.53-1.529c0-0.682,0.118-1.223,0.118-1.998c0-0.857-1.06-1.326-1.06-1.529
                                    c0-2.654-0.778-3.998,2.472-3.998c0-1.367-0.493-2.242,0.47-3.057c0.938-0.791-0.361-4.25,1.06-4.939
                                    c0.492-0.238,1.047-1.197,1.412-1.645c1.188-1.463,3.133-0.646,4.118-3.293c0.41-1.102,2.706-1.451,2.706-2.705
                                    c0-1.184-0.588-1.91-0.588-2.939c0-0.732,0.117-1.461,0.117-2.117c0-1.434-0.941-2.076-0.941-3.645
                                    c0-1.027,0.354-2.061,0.354-3.174c1.345-0.336,2.474-0.516,2.824-1.883c0.354-1.381,0.075-1.41,1.883-1.41
                                    c0.766,0,3.294-0.227,3.294-1.176c0-2.127,0.143-1.713,0.824-2.939c0.304-0.549,0.283-1.027,0.706-1.412
                                    c0.119-0.107,2.082-0.6,2.471-0.705c2.748-0.742,0.648-4.645,2.589-5.292c0.967,0.828,2.622,0.827,3.647,1.528
                                    c0.662,0.453,1.854,1.023,2.589,1.178c0.647,0.133,0.836-0.063,1.295-0.236c1.279-0.48,1.346-0.539,1.412-1.999
                                    c0.078-1.726,5.907,0.555,6.942,1.176c1.764,1.484,0.4,1.998,2.941,1.998c1.359,0,1.205-0.049,2.235,0.824
                                    c1.955,1.652,1.013-0.893,1.53-1.764c0.626-1.055,3.646-0.471,4.824-1.178c0.777-0.905,0.117-2.894,0.117-4.115
                                    c0-1.079-1.658-3.645-2.588-3.645c-1.005,0,0.588-1.242,0.588-2.353c0-1.265-0.726-6.063-1.177-6.114
                                    c-2.144-0.247-2.924-2.214-3.492-3.817l1.15-1.412l6.618,2.509l-0.229-3.648l6.847-0.456l10.497,3.192l3.88,5.245l1.598-0.912
                                    h2.738l0.228,4.333l5.934-1.141c0,1.641,1.338,2.084,2.282,1.141c0.611-0.612,1.735-0.504,2.967-0.456
                                    c3.422,0.131,0.394,1.243,1.369,3.192c0.157,0.314,1.555,1.141,1.825,1.141c0.983,0,1.829,3.846,4.336,2.28
                                    c0.732-0.457,3.448,0.572,5.021,1.104l-8.083,13.715h-1.615c-0.835,0-0.843-0.508-2.018-0.402
                                    c-1.039,0.094-0.067,0.27-0.403,0.807c-0.404,0.645-0.812,0.156-0.404,0.807c0.143,0.229,0.369,0.137,0.404,0.404
                                    c0.047,0.369,0,0.832,0,1.209c0,0.936-0.314,1.777,0.403,2.018l-17.356,16.537c-2.422-2.018-1.878-1.982-2.019-2.018
                                    c-2.845-0.709-0.448,0.285-1.211,0.807c-0.739,0.506-2.314-0.545-2.422,1.211c-0.072,1.184-0.813,2.166-0.813,3.359
                                    c-1.491-0.039-3.995,1.691-6.05,1.416c-2.371-1.668-4.893-3.984-4.893-1.631c0,0.561-1.14,14.223,2.067,17.426
                                    c1.007,1.006,2.721,1.926,4.036,2.824c1.53,1.047,1.543,4.861,4.031,4.861c3.33,0,4.163,0.697,6.061,1.867
                                    c2.153,1.328,1.08,1.34,3.229,1.34c1.681,0,3.026,0.553,3.229-1.211c0.051-0.443,0.052-1.846,0.403-2.018
                                    c2.147-1.039,0.237-0.287,1.211-0.807c3.104-1.654,0.202,0.807,1.211-0.807c0.143-0.227,0.214-0.213,0.404-0.402
                                    c0.094-0.096,0.608-0.352,0.807-0.404c0.688-0.178,0.824-0.402,1.615-0.402c2.979,0.248,1.835,1.047,2.018,4.033
                                    c0.071,1.168,0.807,2.076,0.807,4.033c0,1.77-2.018,1.611-2.018,4.033c0,3.395,1.569,5.371,0.808,8.875
                                    c-0.248,1.141-2.2,2.781-2.826,4.033C509.034,410.687,508.26,413.039,507.371,414.119z" />
                                        <path id="aguascalientes" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M495.964,407.119
                                    c-0.347,0.117-0.808,3.041-0.996,3.762c-0.538,2.066-0.965,2.158-2.636,3.137l-7.279,4.264c-2.622,1.535,0.304,3.334-4.77,2.383
                                    c-0.796,0-0.925-0.973-1.13-1.504c-0.099-0.256-2.114-1.131-2.636-1.256c-0.705-0.166-0.367-0.492-0.753-0.877
                                    c-0.635-0.635-2.524,0.563-3.013-0.752c-0.11-0.301,0.184-0.662-0.251-0.754c-0.071-0.014-0.872,0.318-1.255,0.377
                                    c-1.087,0.168-0.398,0.406-0.653,1.045c-3.241-0.74-3.704-1.881-3.135-6.254c0.187-1.434,1.211-0.861,1.211-2.42
                                    c0-1.115,1.069-3.654,1.615-4.033c0.879-0.611,1.614-0.713,1.614-1.613c0-4.877-1.386-4.842,5.247-4.842
                                    c2.885,0,2.422-0.385,2.422-3.227c0-1.277,2.24-1.148,3.633-1.613c0.459,1.377,1.904,1.5,2.825,2.42
                                    c1.443,1.441,0.874,2.068,3.229,2.42c0.764,0.115,1.064,1.613,2.019,1.613h0.403c1.035,0-0.746,2.74-0.403,3.631
                                    c0.391,1.016,1.117,0.492,1.211,1.211c0.034,0.266-0.133,0.572,0,0.807c0.858,1.518,1.197-0.492,1.614-0.404
                                    c1.575,0.334,1.082,0.477,1.211,2.018L495.964,407.119z" />
                                        <path id="guanajuato" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M489.943,462.435
                                    c0-3.355,0.269-3.973,1.511-6.4c0.324-0.635,0.55-0.172,0.754-0.502c1.25-2.031,1.588-1.174,0.125-3.512
                                    c-0.177-0.283,0.3-1.17,0.126-1.256c-2.202-1.07-2.637,1.043-2.637-1.756c1.669,0,1.523-3.559,2.009-4.641
                                    c0.899-2.006,3.624-3.369,5.146-4.891c1.91-1.91,2.93-6.689,4.77-7.65c2.604-1.361,1.661-3.107,3.012-5.27
                                    c-1.697-0.424-0.376-2.564-0.376-3.762c0-1.365,0.446-2.561,0.878-3.764c0.224-0.621,0.79-0.945,0.879-1.881
                                    c0.095-0.996,0.293-2.582,1.238-3.047c3.724,0.961,8.647,0.398,12.856,0.912c3.478,0.426,10.135,6.063,12.36,8.717
                                    c2.172,2.588,9.916-5.516,12.06-6.229c1.659,0.383,3.171,0.428,3.387,2.301c0.309,2.678,4.251,3.389,6.233,4.197
                                    c0.895,0.365,1.646,0.406,2.846,0.406c1.271,0,1.706,0.406,2.818,0.42l1.129,6.045l1.065-0.887
                                    c0.884,0.406,0.668,0.287,1.421,0.354c0.585,0.053,0.265,0.086,0.532,0.355c0.081,0.08,0.26,0.107,0.355,0.355
                                    c0.042,0.109-0.063,0.254,0,0.354c0.063,0.102,0.163,0.061,0.178,0.178c0.008,0.066-0.028,0.504,0,0.533
                                    c0.227,0.227,0.223-0.223,0.355,0.178c-0.31,0.061-2.339,0.256-2.486,0.531c-0.516,0.969-0.877,1.389-1.775,2.129
                                    c-0.64,0.529-0.513,0.533-1.421,0.533c-0.478,0-1.34-0.166-0.888-0.887c0.396-0.633-0.129-0.551-0.888-0.889
                                    c-2.152-0.955-1.082,0.945-2.486,0.889c-1.246-0.053-1.265,0.053-1.065-0.889c0.11-0.52-1.378,0.031-1.599,0.178l0.533,7.098
                                    c-1.975,0-1.924-0.207-2.131,1.598c-0.068,0.592-1.19,0.76-1.243,0.355c-0.126-0.971-0.952-0.018-1.243,0
                                    c-0.865,0.053-2.192,0.424-1.775-0.887c0.037-0.119,0.191-0.533-0.355-0.533c-2.381,0-0.532,0.674-0.888,1.951
                                    c-0.415,1.492-2.347,1.066-3.906,1.066c-1.277,0-1.679-1.146-2.309-1.775c-0.579,1.324-1.501,3.256-2.486,3.904
                                    c-1.47,0.965-2.355,3.979,0,4.08c4.679,0.203,0.178-0.271,0.178,2.662c0,0.664,1.198,0.311,1.775,0.355
                                    c0.493,0.037,0.412,3.482,0.711,4.258c0.248,0.646-0.321,3.828,0,4.082c0.352,0.279,2.529-0.086,3.196,0
                                    c0.331,0.043,0.15,0.736,0.178,1.064c0.02,0.24,0.716,1.449,1.322,2.451c-0.252,0.332-0.387,0.836-0.387,1.334
                                    c0,0.768-0.719,1.568-0.686,1.861c0.132,1.145,0.274,0.686-0.685,1.273c-0.325,0.199,0.849,2.123,1.076,2.35
                                    c1.521,1.521-1.238,1.01-1.565,1.861c-0.316,0.824,0.358,0.617-0.586,1.273c-0.238,0.164-0.269,0.346-0.588,0.393
                                    c-0.643,0.09-1.433,0.008-1.956,0.293c-0.168-0.506-2.371-0.293-2.935-0.293c-0.722,0-1.492,0.494-2.152,0.586
                                    c-0.404,0.057-0.144,0.346-0.587,0.49c-0.729,0.238-0.39,0.49-1.271,0.49c-1.131,0-2.029-0.98-2.935-0.98
                                    c-1.62,0-2.249-0.086-3.13-1.174c-0.515-0.635-1.231,0.098-1.663-0.686c-0.652-1.184-0.365-1.391-0.783-2.645
                                    c-0.588-1.766-2.823-1.059-4.499-0.686c-0.68,0-0.386,0.363-0.783,0.783c-0.197,0.209-0.566,0.594-0.685,0.783
                                    c-0.106,0.172-0.311,0.508-0.391,0.686c-0.56,1.234-2.453,1.283-3.62,0.49c-0.107-0.074-1.235-0.162-1.369-0.197
                                    c-0.398-0.104-0.782-1.25-0.782-1.762c0-1.527-0.128-0.627-0.686-1.371c-0.292-0.391-0.195-0.895-0.195-1.371
                                    c0-0.658,2.537-0.371,1.174-2.35c-0.457-0.666-1.448-3.146-1.761-3.232c-1.949-0.541-7.271,0.896-7.532,3.035
                                    c-0.148,1.225-3.578,0.881-4.891,0.881c-4.871,0-1.504-3.975-4.793-4.994C491.191,462.408,490.708,462.564,489.943,462.435z" />
                                        <path id="jalisco" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M389.543,450.872
                                    c0.334,0.695,0.18,1.73,0.18,2.871c0,1.617-0.303,2.754-1.547,3.314c-1.759,0.791-5.221-0.174-5.969,0.221
                                    c-1.379,0.725-1.995-0.621-3.538,0.883c-1.005,0.982-0.102,1.988-1.989,1.988c0.837,5.303,1.363,7.363,3.758,12.15
                                    c0.511,1.021,2.05,6.395,2.432,6.629c5.689,3.467,9.905,5.207,11.717,10.162c2.59,7.084,8.675,9.227,14.704,11.543
                                    c0.151-0.127,0.267-0.199,0.328-0.199c1.388,0,3.732-1.539,4.77-2.51c2.524-2.355,7.374-0.824,10.292-2.131
                                    c3.218-1.441,0.328-3.559,3.263-4.893c1.448-0.361,0.956,0.43,2.009,0.627c1.357,0.256,1.433-0.713,2.134,0.754
                                    c0.44,0.922,2.56-0.021,3.263,0.752c0.238,0.262,0.005,0.984,0.251,1.129c1.217,0.717,2.196-1.816,2.385-2.383
                                    c0.604-1.813,1.799-0.279,3.264-1.631c1.967-0.654,1.09,3.42,2.762,3.637c1.021,0.133,0.585,1.43,1.255,1.506
                                    c0.322,0.037,1.766-0.168,2.009,0.125c0.445,0.541-0.956,0.35-1.13,0.377c-0.842,0.133-0.949,3.453-0.628,4.139
                                    c0.165,0.352,0.87,0.188,0.502,1.254c-0.112,0.326-1.759,0.41-2.26,0.752c-0.089,0.063,1.13,2.844,1.13,4.014
                                    c0,1.633,1.005,0.264,1.005,1.631c0,0.355,0.038,0.416,0.125,0.879c0.01-0.031,3.493,0.668,4.393,0
                                    c0.649-0.484,1.066-1.824,2.009-1.254c1.532,0.924,0.8,0.443,1.632,0.125c1.393-0.535,1.381,1.117,1.381,2.006
                                    c0,2.246,1.942,1.166,2.259-0.375c0.392-1.91,0.711-1.928,2.385-2.635c0.99-0.418,1.109-1.316,1.255-2.383
                                    c0.174-0.693,0.371-1.234,0.753-1.756c0.359-0.49,3.051,0.152,3.641-0.252c0.313-0.213,0.414-0.785,0.502-1.254
                                    c1.236-0.123,0.848-0.877,2.385-0.877c1.331,0,0.136,1.121,1.255,1.254c2.907,0.346,1.333-0.455,2.134-1.254
                                    c0.637-0.637,0.638-1.461,1.13-2.635c0.376-0.896,0.484-0.951,0.878-1.379c0.6-0.652,0.528-0.809,0.753-1.631
                                    c0.191-0.697,0.332-0.951,0.503-1.631c0.364-0.121,0.251-1.938,0.251-2.383c0-1.182-1.702-0.568-2.636-0.752
                                    c-2.658-0.523-0.881,2.713-3.264,1.629c-0.522-0.236,0.063-1.461-0.502-1.629c-1.648-0.494-0.319-2.615-1.632-2.885
                                    c-1.279-0.264-1.198-0.086-1.004-1.381c0.168-1.125,0.336-2.555,0.125-3.889c-0.506-0.168,0.22-0.479,0.252-0.5
                                    c0.287-0.197,0.918-0.148,1.38-0.252c0.938-0.209,1.758,0.012,1.758-1.129c0-0.818-0.257-1.617-0.628-2.508
                                    c-0.738-0.246-1.769-0.377-2.762-0.377c-1.318,0-1.963-1.598-3.264-1.254c-0.471,0.125-1.832,0.184-2.008,0.627
                                    c-0.101,0.256-0.003,1.098-0.502,1.129c-1.785,0.115,0.101-1.131-2.008-1.004c-0.504,0.031,0.036,0.889-0.628-0.25l2.887-6.898
                                    c1.022-0.766,0.147-1.004,2.134-1.004c0.977,0,1.326-0.377,1.757-0.377c0.82,0,0.353,0.438,0.754,0.629
                                    c1.488,0.707,2.129,1.273,3.891,1.129c1.002-0.084,0.788-0.822,1.255-1.506c0.171-0.25,0.939-0.336,1.004-0.502
                                    c0.172-0.441,0.085-0.752,0.754-0.752h1.38c0.186-0.555,0.809-0.889,0.879-1.883c0.055-0.775,1.546-1.717,2.008-2.006
                                    c0.368-0.229,0.237,0.551,0.377,0.752c0.479,0.693,2.556,0.088,3.013,0c0.299-0.057,3.919-0.674,4.017-0.627
                                    c0.151,0.074-0.261,1.209,0.25,1.254c0.986,0.09,2.169-0.98,2.511-1.629c0.413-0.785,2.106-0.006,2.887,0.125
                                    c0-3.355,0.264-3.969,1.506-6.396c0.324-0.635,0.55-0.172,0.754-0.502c1.25-2.031,1.588-1.174,0.125-3.512
                                    c-0.177-0.283,0.3-1.17,0.126-1.256c-2.202-1.07-2.637,1.043-2.637-1.756c1.669,0,1.523-3.559,2.009-4.641
                                    c0.899-2.006,3.624-3.369,5.146-4.891c1.91-1.91,2.93-6.689,4.77-7.65c2.604-1.361,1.661-3.107,3.012-5.27
                                    c-1.697-0.424-0.376-2.564-0.376-3.762c0-1.365,0.446-2.561,0.878-3.764c0.224-0.621,0.79-0.945,0.879-1.881
                                    c0.095-0.996,0.293-2.582,1.255-3.01l-7.781-7.023h-3.641c-0.347,0.115-0.815,3.041-1.004,3.762
                                    c-0.538,2.066-0.965,2.158-2.636,3.137l-7.279,4.264c-2.622,1.535,0.304,3.334-4.77,2.383c-0.796,0-0.925-0.973-1.13-1.504
                                    c-0.099-0.256-2.114-1.131-2.636-1.256c-0.705-0.166-0.367-0.492-0.753-0.877c-0.635-0.635-2.524,0.563-3.013-0.752
                                    c-0.11-0.301,0.184-0.662-0.251-0.754c-0.071-0.014-0.872,0.318-1.255,0.377c-1.087,0.168-0.398,0.406-0.628,1.004
                                    c-0.176,0.457-1.887,0.125-2.385,0.125c0.153,0.613,0.216,1.623,0.251,2.133c0.038,0.549-0.251,0.768-0.251,1.379
                                    c0,1.174,1.097,1.213,1.632,1.881c0.284,0.355,0.633,1.104,1.255,0.754c0.398-0.225,0.453-0.006,1.005,0.375l0.125,5.77
                                    c-1.732,0-2.197,0.627-3.515,0.627c-0.276,0-1.186,1.354-1.632,1.631c-0.981,0.615-1.81-0.805-2.008,1.129
                                    c-0.06,0.582-0.001,2.191-1.004,1.506c-0.418-0.285,0.616-1.004-0.628-1.004c-1.396,0-2.626-0.02-4.017-0.25l0.251,6.27
                                    l-5.021,0.629c-0.441,0.109-0.026,0.236-0.627,0.375c-0.4,0.092-0.763,0.119-1.13,0.252c-0.182,0.064-1.088,0.434-1.13,0.502
                                    c-0.223,0.355-0.131,0.25-0.753,0.25c-0.417,0-0.56,0.096-0.753-0.25c-0.316-0.568-0.563-0.527-0.879-0.879
                                    c-0.166-0.186-0.26-0.877-0.376-1.129c-0.308-0.672-0.411-1.111-0.754-1.881c0-0.85-2.005-0.977-2.761-0.879
                                    c-0.599,0.078-0.138,1.004-1.13,1.254c-0.211,0.055-0.985,0.604-1.129,0.127c-0.205-0.678-0.126-1.424-0.126-2.133
                                    c0-1.662,0.123-1.619-1.381-1.004c-1.756,0.721,0.129-1.754-0.879-2.383c-0.257-0.16-0.728-0.783-0.878-1.129
                                    c-0.246-0.564-0.226-0.793-0.879-0.877c-0.634-0.082-0.453,0.004-0.502-0.879c0-1.154-0.217-2.133,1.13-2.133
                                    c1.402,0-0.234,1.004,1.632,1.004c0.859,0,0.996,0.156,1.506-0.377c0.865-0.902,1.381,0.676,1.381-1.504
                                    c0-0.83-1.52,0.119-2.134-0.125c-0.303-0.121-1.312-1.217-1.883-0.502c-0.148,0.184-0.351,0.602-0.502,0.752
                                    c-0.075,0.074-0.502,0.035-0.502-0.125c0-0.354,0.969-0.258,0.502-1.004c-0.568-0.908,0.349-1.57,0.878-1.631
                                    c0.463-0.053,0.537-1.074,0.628-1.504c1.193-0.398,2.003-0.627,3.264-0.627c0.394,0,0.761-0.893,1.004-1.381
                                    c0.169-0.338-0.162-1.156,0-1.504c0.062-0.133,0.957-1.693,0.628-1.883c-0.86-0.496-2.405-0.459-1.507-1.756
                                    c-0.504,0-0.441-0.627,0.502-0.627c0.674,0,1.281-0.086,1.758-0.25c0.818-0.283,0.369-2.043,1.883-2.258
                                    c1.033-0.148,1.397-0.553,1.631-1.254c0.324-0.973,1.433-0.33,1.883-1.004c0.361-0.543,0.224-0.598,1.005-0.879
                                    c0.802-0.287,0.456,0.186,1.255,0.252c1.208-0.322,2.853-0.344,3.766-1.254c0.032-0.033,0-1.076,0-1.129
                                    c0-1.352-0.044-0.838-1.13-1.381c-0.401-0.199,0.205-0.863,0-1.254c-0.303-0.572-0.194-1.311,0.251-1.756
                                    c0.374-0.375,0.459-1.494,0.502-2.133c0-1.172-0.377-1.527-0.377-2.633c0-0.764-0.616-0.855-1.255-1.254
                                    c-0.888-0.555-0.613-0.439-0.878-1.129c-0.148-0.385-0.271-0.145-0.628-0.377c-0.925-0.602-0.009-0.502-1.381-0.502
                                    c-0.39,0.52-1.434,0.957-1.757,1.506c-0.207,0.348-0.75,0.711-0.753,0.752c-0.087,1.248-0.57,1.928-0.126,2.885
                                    c0.212,0.457,0.588,0.42,0.753,0.879c0.097,0.266-1.078,1.189-1.38,1.379c-0.188,0.117-1.125-0.131-1.256,0
                                    c-0.285,0.285,0.002,1.262-0.125,1.631c-0.301,0.873-0.271-0.744-0.628,1.129l-8.033-0.127c-0.741-2.225,0.89-0.426,1.256-2.006
                                    c0.358-1.549,0.545-2.719,1.381-3.637c0.026-0.029,0.339-0.967,0.627-1.129c0.555-0.313,0.368-1.93,0.628-2.51
                                    c0.29-0.646,0.674-0.324,0.878-1.002c0.384-1.271-0.502-0.219-0.502-1.381c0-1.217-1.004,0.219-1.004-1.004
                                    c0-1.764,0.002-1.756-1.506-1.756h-3.766l-3.389,13.547l-1.255-11.539c0-0.514,0.251-0.541,0.251-1.129
                                    c0-0.287-0.125-1.799,0.125-1.881c0.615-0.201,3.515,0,3.64-0.127c0.8-0.799-0.639-1.439,1.004-2.006
                                    c0.385-0.133,0.367-0.25-0.125-0.25c-0.968,0-0.628-1.588-0.628-2.385l-6.024-0.5c-1.146-0.287-2.504,1.385-1.632,2.256
                                    c0.722,0.723,1.219,1.309,1.13,2.385c-0.021,0.258-0.222,0.242-0.251,0.5c-0.054,0.467-0.162,0.035-0.251,0.377
                                    c-0.088,0.338,0.501,0.492,0.753,0.627c0.251,0.252,0.199,3.068,0.126,3.639c-0.088,0.674-1.507,0.414-1.507,1.254
                                    c0,1.063-0.204,0.977-1.129,1.379c-1.514,0.658-0.844-0.539-1.13-1.254c-0.495-1.238-0.751-0.805-0.502-2.133
                                    c0-0.385-0.344-0.357-0.628-0.752c-0.085-0.119-0.118-0.852-0.125-1.004c-0.036-0.758-0.774-0.801-1.507-0.627
                                    c-0.825,0.197-0.879,1.5-0.879,2.508c0,1.602-1.019,0.625-1.631,1.381c-0.127,0.156-0.132,0.553-0.251,0.627
                                    c-0.057,0.035-0.537,0.025-0.861,0.004c-0.04,0.832-0.175,2.205-0.345,2.754c-0.04,0.131-0.752,0.205-0.804,0.604
                                    c-0.152,1.168,0.082,1.32-0.604,2.211c-0.326,0.424-0.201,1.057-0.201,1.607c0,1.025-1.207,0.34-1.207,1.809
                                    c0,1.305,0.125,3.041-0.201,4.02c1.981,0.914,2.263-0.309,4.022-0.201c0.074,0.004,1.509,0.311,2.011,0.402
                                    c1.05,0.189,1.729,2.477,0.805,3.215c-1.003,0.801-0.537,4.352,1.81,3.217c0.727-0.354,1.701-0.223,2.615,0.4
                                    c0.813,0.557,0.236,1.408,1.81,1.408c0.358,1.791-0.067,1.033,1.005,1.809c0.896,0.646-0.489,5.338,0.201,6.027
                                    c0.031,0.031,0.531-0.008,0.604,0c0.16,0.02,0.244,0.172,0.402,0.201c4.391,0.803,1.609,2.486,1.609,5.428
                                    c0,1.816-0.009,2.844-1.207,3.816c-1.153,0.938-1.855-1.52-3.218-0.803c-0.086,0.045-0.201,0.375-0.201,0.604
                                    c0,1.281-0.802,0.988-1.005,2.209c-0.69-0.158-0.965-0.201-1.609-0.201c-0.319,0-0.687,0.029-1.006,0
                                    c-0.737-0.066-0.14,0.063-0.603-0.4c-0.114-0.115-0.243-0.184-0.402-0.201c-0.563-0.064-0.215,0.16-0.604,0.201
                                    c-0.707,0.072-1.497,0-2.212,0v8.041l-3.419,3.414l2.414,3.014l0.402,5.627c-0.63-1.049-0.367-1.307-0.604-2.412
                                    c-0.28-1.307-1.947-0.627-2.614-1.809c-0.301-0.531-0.737-1.926-1.207-2.611c-0.759-1.109-5.88-2.295-6.033-3.617
                                    c-0.193-1.682-1.176-1.609-2.815-1.609c-0.38,0-0.709-1.428-0.805-1.809c-1.773-0.787-6.534-1.67-7.039,0.805
                                    c-0.536,2.627-2.882,0.52-4.224,1.607c-1.067,0.867-2.137,0.811-2.815,2.01c-0.756,1.338-3.448,1.447-3.821,3.016
                                    C390.045,449.539,389.98,450.195,389.543,450.872z" />
                                        <path id="michoacan" fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="M446.922,508.593
                                    c-0.001,0.229-0.022,0.441-0.124,0.605c-0.411,0.658-0.798,0.564-1.191,1.588c-0.292,0.758-1.309,0.211-1.788,0.594
                                    c-1.897,1.518-5.954,1.262-6.156,4.367c-0.093,1.422-0.389,0.232-0.993,1.191c-0.105,0.166-0.206,0.404-0.298,0.68
                                    c3.859,2.52,3.667,9.451,7.958,11.9c7.085,4.047,16.037,6.316,24.981,8.836c4.475,1.262,12.728,6.531,16.139,6.85
                                    c0.788,0.074,1.837-0.787,3.378-1.584c-0.069-0.105-0.156-0.197-0.268-0.279c-1.067-0.777-0.83-0.615-1.663-1.762
                                    c-0.797-1.1-0.339-3.287,0.099-4.604c0.51-1.533,2.016-1.076,3.423-1.076c0.641,0,2.256-2.182,3.326-2.449
                                    c0.557-0.139,4.304,0.377,4.304-0.881c0-0.516-0.831-1.195-1.174-1.469c-0.514-0.412-0.489-1.535-0.489-2.252
                                    c0-1.383-0.391-3.035-0.391-4.211c0-0.586,0.442-0.768,0.587-1.273c0.195-0.686,0.122-1.617,0-2.352
                                    c-0.124,0,1.537,0.283,2.054,0.295c0.712,0.016,1.442,0.023,2.152,0c0.619-0.021,1.371-0.869,1.663-0.686
                                    c0.877,0.549,1.807,1.111,3.032,1.371c0,0.953,1.382,2.547,2.445,2.547c0.952,0,4.231-0.027,4.598-0.785
                                    c0.558-1.154,9.014-1.074,10.467-0.979c0.172,0.43,1.473,2.881,1.565,2.938c0.707,0.443,2.298-0.283,3.13-0.391
                                    c0.321-0.043,0.651-0.686,1.37-0.686c2.008,0,1.762,0.037,2.348,1.469c0.705,1.723,2.354,1.734,4.011,2.84
                                    c0.81,0,0.68-3.764,0.488-3.918c-1.001-0.803-1.134-0.363-2.445-1.174c-1.746-1.082-1.858-1.035-1.858-2.939
                                    c0-1.313-0.778-1.078-1.076-2.154c-0.099-0.357,0.681-2.023,0.27-2.264c-1.598-0.457-2.301-3.592,0.11-3.416
                                    c0.58,0.041,2.099,1.049,2.555,0.393c0.615-0.887-0.331-1.078,1.174-1.078c1.213,0,0.026-1.264,1.569-1.469l6.647-7.836
                                    c3.52-1.174,1.957-3.674,1.957-6.463c0-0.674,2.842-3.715,3.912-3.818c2.074-0.201,1.078-3.719,0.686-3.623
                                    c-1.766,0.42-0.72,0.154-1.272-1.273c-0.469-1.217-2.532-0.521-1.467-2.547c0.619-1.176,0.089-1.371,1.956-1.371
                                    c1.9,0,1.957-0.912,1.957-2.645c0-1.734,2.055-1.211,2.055-3.33c-0.267-1.064-2.02-1.223-2.153-2.252
                                    c-0.032-0.252-0.391-2.43-0.195-2.645c0.086-0.094,0.88-1.945,0.881-1.957c0.075-1.098-1.183-0.279-1.272-1.273
                                    c-0.031-0.35-1.276-0.377-1.467-0.49c-0.058-0.035-0.368-0.924-0.587-1.078c-0.535-0.373-1.521-0.445-2.054-0.979
                                    c-0.474-0.473-0.724-1.457-1.077-2.252c-0.764,0.107-1.173,0.992-1.173,1.859c0,0.768-0.719,1.568-0.686,1.861
                                    c0.132,1.145,0.274,0.686-0.685,1.273c-0.325,0.199,0.849,2.123,1.076,2.35c1.521,1.521-1.238,1.01-1.565,1.861
                                    c-0.316,0.824,0.358,0.617-0.586,1.273c-0.238,0.164-0.269,0.346-0.588,0.393c-0.643,0.09-1.433,0.008-1.956,0.293
                                    c-0.168-0.506-2.371-0.293-2.935-0.293c-0.722,0-1.492,0.494-2.152,0.586c-0.404,0.057-0.144,0.346-0.587,0.49
                                    c-0.729,0.238-0.39,0.49-1.271,0.49c-1.131,0-2.029-0.98-2.935-0.98c-1.62,0-2.249-0.086-3.13-1.174
                                    c-0.515-0.635-1.231,0.098-1.663-0.686c-0.652-1.184-0.365-1.391-0.783-2.645c-0.588-1.766-2.823-1.059-4.499-0.686
                                    c-0.68,0-0.386,0.363-0.783,0.783c-0.197,0.209-0.566,0.594-0.685,0.783c-0.106,0.172-0.311,0.508-0.391,0.686
                                    c-0.56,1.234-2.453,1.283-3.62,0.49c-0.107-0.074-1.235-0.162-1.369-0.197c-0.398-0.104-0.782-1.25-0.782-1.762
                                    c0-1.527-0.128-0.627-0.686-1.371c-0.292-0.391-0.195-0.895-0.195-1.371c0-0.658,2.537-0.371,1.174-2.35
                                    c-0.457-0.666-1.448-3.146-1.761-3.232c-1.949-0.541-7.271,0.896-7.532,3.035c-0.148,1.225-3.578,0.881-4.891,0.881
                                    c-4.871,0-1.504-3.975-4.793-4.994c-1.087-0.336-1.574-0.176-2.335-0.309c-0.775-0.135-2.469-0.914-2.882-0.129
                                    c-0.342,0.648-1.524,1.719-2.511,1.629c-0.511-0.045-0.099-1.18-0.25-1.254c-0.098-0.047-3.718,0.57-4.017,0.627
                                    c-0.457,0.088-2.534,0.693-3.013,0c-0.14-0.201-0.009-0.98-0.377-0.752c-0.462,0.289-1.953,1.23-2.008,2.006
                                    c-0.07,0.994-0.693,1.328-0.879,1.883h-1.38c-0.669,0-0.582,0.311-0.754,0.752c-0.064,0.166-0.833,0.252-1.004,0.502
                                    c-0.467,0.684-0.253,1.422-1.255,1.506c-1.762,0.145-2.402-0.422-3.891-1.129c-0.401-0.191,0.066-0.629-0.754-0.629
                                    c-0.431,0-0.78,0.377-1.757,0.377c-1.986,0-1.111,0.238-2.134,1.004l-2.887,6.898c0.664,1.139,0.124,0.281,0.628,0.25
                                    c2.108-0.127,0.223,1.119,2.008,1.004c0.499-0.031,0.401-0.873,0.502-1.129c0.176-0.443,1.537-0.502,2.008-0.627
                                    c1.301-0.344,1.945,1.254,3.264,1.254c0.993,0,2.023,0.131,2.762,0.377c0.371,0.891,0.628,1.689,0.628,2.508
                                    c0,1.141-0.82,0.92-1.758,1.129c-0.462,0.104-1.093,0.055-1.38,0.252c-0.032,0.021-0.758,0.332-0.252,0.5
                                    c0.211,1.334,0.043,2.764-0.125,3.889c-0.194,1.295-0.275,1.117,1.004,1.381c1.313,0.27-0.017,2.391,1.632,2.885
                                    c0.565,0.168-0.021,1.393,0.502,1.629c2.383,1.084,0.605-2.152,3.264-1.629c0.934,0.184,2.636-0.43,2.636,0.752
                                    c0,0.445,0.113,2.262-0.251,2.383c-0.171,0.68-0.312,0.934-0.503,1.631c-0.225,0.822-0.153,0.979-0.753,1.631
                                    c-0.394,0.428-0.502,0.482-0.878,1.379c-0.492,1.174-0.493,1.998-1.13,2.635c-0.801,0.799,0.773,1.6-2.134,1.254
                                    c-1.119-0.133,0.076-1.254-1.255-1.254c-1.537,0-1.148,0.754-2.385,0.877c-0.088,0.469-0.189,1.041-0.502,1.254
                                    c-0.59,0.404-3.281-0.238-3.641,0.252c-0.382,0.521-0.579,1.063-0.753,1.756c-0.146,1.066-0.265,1.965-1.255,2.383
                                    c-1.674,0.707-1.993,0.725-2.385,2.635c-0.316,1.541-2.259,2.621-2.259,0.375c0-0.889,0.012-2.541-1.381-2.006
                                    c-0.832,0.318-0.1,0.799-1.632-0.125c-0.942-0.57-1.359,0.77-2.009,1.254C449.803,508.914,448.021,508.744,446.922,508.593z" />
                                        <path id="colima" fill="#e8e8b1" stroke="#717171" stroke-width="0.25" d="M214.959,490.695
                                    c-0.704,0.324-1.36,0.729-2.125,0.85c-0.419,0.066-0.905,0.209-1.275,0c-0.458-0.258-0.127-0.594,0.425-1.273
                                    c0.073-0.09,0.348-1.148,0.425-1.275c0.124-0.199,1.075-1.174,1.275-1.273c0.253-0.127,0.569-0.037,0.85,0
                                    c0.705,0.092,0.425,0.137,0.425,0.85C214.959,489.677,215.128,490.527,214.959,490.695L214.959,490.695z M210.709,508.958
                                    c-0.707,0.164-1.401,0.377-2.125,0.426c-1.239,0.082-1.275,0.24-1.275-0.85c0-0.803,0.365-1.699-0.425-1.699h-1.275v-0.426h-0.425
                                    v-0.424v-0.426h0.425v-0.424h0.425h0.425v-0.424h0.425c0.4,0,0.622-0.521,0.85-0.85c0.455-0.654,0.554-0.426,1.7-0.426
                                    c0.713,0,0.758-0.277,0.85,0.426c0.11,0.842-0.737,2.973,0,2.973h0.425v0.424C210.709,508.093,210.923,507.843,210.709,508.958
                                    L210.709,508.958z M175.431,500.464c-1.535-1.279-1.914-0.908-1.7-2.549c0.074-0.57-0.254-0.424,0.425-0.85
                                    c0.24-0.148,0.65-0.199,0.85,0l0.425,0.426h0.425c0.283,0,0,0.566,0,0.85C175.856,499.183,175.938,498.939,175.431,500.464z
                                     M89.999,512.357c1.676-1.396,1.783-0.678,1.701-2.123c-0.036-0.621-0.004-3.395-0.851-2.549l-0.425,0.424
                                    c-0.241,0.242-0.339,0.52-0.425,0.85c-0.205,0.785-0.48,0.322-1.275,0.426c-0.198,0.025-0.762,0.336-0.85,0.424
                                    c-0.03,0.031-0.395,0.82-0.425,0.85l0,0v0.426h0.425l0.425,0.424C88.985,512.193,88.793,511.933,89.999,512.357L89.999,512.357z
                                     M409.297,500.636c0.151-0.127,0.261-0.201,0.322-0.201c1.388,0,3.732-1.539,4.77-2.51c2.524-2.355,7.374-0.824,10.292-2.131
                                    c3.218-1.441,0.328-3.559,3.263-4.893c1.448-0.361,0.956,0.43,2.009,0.627c1.357,0.256,1.433-0.713,2.134,0.754
                                    c0.44,0.922,2.56-0.021,3.263,0.752c0.238,0.262,0.005,0.984,0.251,1.129c1.217,0.717,2.196-1.816,2.385-2.383
                                    c0.604-1.813,1.799-0.279,3.264-1.631c1.967-0.654,1.09,3.42,2.762,3.637c1.021,0.133,0.585,1.43,1.255,1.506
                                    c0.322,0.037,1.766-0.168,2.009,0.125c0.445,0.541-0.956,0.35-1.13,0.377c-0.842,0.133-0.949,3.453-0.628,4.139
                                    c0.165,0.352,0.87,0.188,0.502,1.254c-0.112,0.326-1.759,0.41-2.26,0.752c-0.089,0.063,1.13,2.844,1.13,4.014
                                    c0,1.633,1.005,0.264,1.005,1.631c0,0.355,0.037,0.436,0.125,0.879c0.002,0.01,0.372,0.057,0.904,0.131
                                    c0.003,0.23-0.022,0.441-0.124,0.605c-0.411,0.658-0.798,0.564-1.191,1.588c-0.292,0.758-1.309,0.211-1.788,0.594
                                    c-1.897,1.518-5.954,1.262-6.156,4.367c-0.093,1.422-0.389,0.232-0.993,1.191c-0.105,0.166-0.206,0.404-0.3,0.676
                                    c-0.454-0.295-0.965-0.531-1.546-0.689c-4.323-1.186-1.849-3.516-4.201-5.303c-1.897-1.441-9.265-1.365-9.506-3.535
                                    C418.157,504.146,413.74,502.343,409.297,500.636z" />

                                        <path id="quintanaroo"
                                            sodipodi:nodetypes="cccssssscssssssccsssssssssssssssssssssscccccccccccccccccccccccccccccccssssssssssccccssssssssssccccsssssccsssccccsccsc"
                                            fill="#e8e8b1" stroke="#e8e8b1" stroke-width="0.25" d="
                                    M894.209,530.507c0.349-0.025,4.434-0.273,4.781-0.299l-0.717-5.74c0.032,0,2.129-1.156,2.628-1.314
                                    c1.411-0.451,3.172-0.24,4.659-0.24c3.12,0,1.865-1.545,3.823-2.033c2.834-0.707,3.839-7.902,3.703-10.764
                                    c-0.071-1.508,2.002-1.088,2.748-2.512c1.88-3.594,3.04-2.822,5.961-2.756c0.546-1.537,3.934-2.838,3.934-3.42
                                    c0-2.047,2.245,0.26,0.739-3.447c-0.851-2.092,2.633-1.332,2.464-3.201c-0.003-0.025-1.584-3.201-0.493-3.201
                                    c2.018,0,4.903,4.457,2.957,6.402c-1.286,1.285-2.157,3.162-1.232,5.416c1.606,3.916,7.957,3.297,6.2,9.219l0.457,0.213
                                    c3.532,0.398,1.07-3.391,1.979-6.607c0.833-2.949,0.742-6.363,1.37-9.434c0.28-1.377-0.711-4.461,0.761-5.021
                                    c1.734-0.658,3.654-12.682,3.654-15.367c0-2.453-1.121-1.314-2.131-0.305c-0.771,0.771-2.62,1.6-1.219,1.066
                                    c3.725-1.418-5.125-1.316-1.065-2.283c1.034-0.246,0.297-2.443,1.827-3.348c1.372-0.809,4.86-1.563,5.785-3.043
                                    c0.47-0.75-0.563-1.801-0.304-2.891c0.544-2.287-4.329,0.104-4.416,0.152c-1.918,1.084-0.735,0.334-1.37,2.436
                                    c-0.357,1.18-3.088-0.309-1.218-1.521c1.167-0.76-0.77-1.219-1.675-1.219c-0.94,0,0.496-4.184,1.37-4.867
                                    c0.893-0.701,2.893-0.209,2.893-1.521c0-1.994,2.132-1.795,2.132-4.717c0-2.064-1.522-2.936-1.522-5.326
                                    c0-9.533,5.981-9.363,9.287-17.496c1.159-2.852,6.118-4.959,6.243-8.521c0.176-5.012,3.618-10.672,1.145-14.689
                                    c-0.628-1.02-2.388-3.373-3.581-5.699c-0.944-1.838-5.302-4.867-5.938-4.867c-1.213,3.818-5.91,4.945-11.986,5.072l-0.252,8.152
                                    h-2.399l-0.3,5.697l7.197-0.6h2.099v2.998h-6.297l-2.999,8.396h2.699l-0.3,6.297l-4.198,0.6v4.498h1.799v1.801l-5.098-0.602
                                    v-2.098l-1.799,0.299l-3.599,3.299l0.6,2.699l-8.097,0.301v2.098h-6.297v3.299h-4.198l0.6,3.6l-18.25,19.705l4.456,4.885
                                    L894.209,530.507z M963.647,429.728c-0.067,1.082-1.168,0.92-2.095,0.992c-1.233,0.098-1.561,0.994-2.757,0.994
                                    c-0.713,0-2.037,0.172-2.979,0.221c-0.133,0.008-0.065,1.936-0.33,2.318c-0.435,0.625-0.404,2.051-0.331,2.982
                                    c0.119,1.52,2.028,2.576,2.095,3.311c0.207,2.271,1.756,0.688,2.206-0.109c0.617-1.096,0.321-2.75,0.993-3.422
                                    c0.952-0.955,0.354-1.254,1.874-2.1c0.673-0.373,0.679-1.869,0.883-2.539C963.437,431.615,964.884,431.271,963.647,429.728
                                    L963.647,429.728z M962.434,407.205l-0.551-0.223c-0.834-0.277-0.252,0.064-0.441-0.551c-0.045-0.146-0.148-0.197-0.221-0.332
                                    c-0.14-0.262-0.243-0.326-0.331-0.662c-0.037-0.143,0.094-0.328,0-0.441c-0.258-0.311-0.325,0.168-0.44-0.221
                                    c-0.171-0.57-0.79-0.037-0.662,0.551c0.026,0.123,0.283,0.396,0.331,0.441c0.255,0.246,0.288,0.662,0.331,0.994
                                    c0.005,0.045,0.258,0.545,0.33,0.553c0.37,0.041,0.73,0.064,1.104,0.109C962.201,407.462,962.362,407.492,962.434,407.205
                                    L962.434,407.205z M959.567,400.689l0.661,0.332c0,0.215-0.028,0.953-0.22,0.992c-0.144,0.031-0.295-0.006-0.441,0
                                    c-0.662,0.027-0.771,0.393-0.771-0.33c0-0.539,0.062-0.322-0.221-0.553c-0.057-0.045-0.059-0.059-0.11-0.109
                                    c-0.307-0.307-0.11-0.369-0.11-0.883v-0.773c0-0.635,0.047-0.449,0.441-0.332c0.23,0.07,0.11,0.514,0.11,0.773
                                    c0,0.324-0.011,0.479,0.22,0.662C959.258,400.574,959.337,400.689,959.567,400.689L959.567,400.689z M938.909,400.853l0.025-0.949
                                    c2.212-0.119,4.124-0.729,6.346-1.281c1.291-0.322,3.438-1.721,4.062-0.119l0,0c-2.104,0.402-2.732,1.465-4.54,1.789
                                    C942.87,400.64,940.934,400.792,938.909,400.853z" />

                                        <path id="yucatan"
                                            sodipodi:nodetypes="ccsssccccccccccccccccccccccccccccssccccccccccccccccscsccssssssscssssssssssccccccsssccscc"
                                            fill="#e8e8b1" stroke="#717171" stroke-width="0.25"
                                            d="
                                    M938.905,400.851l0.026-0.955c-0.265,0.031-0.539,0.039-0.818,0.039c-0.723,0-2.513-0.252-3.106,0.119
                                    c-1.325,0.828,0.116,0.836,1.434,0.836C937.283,400.89,938.098,400.874,938.905,400.851z M889.754,473.251l18.25-19.705l-0.6-3.6
                                    h4.198v-3.299h6.297v-2.098l8.097-0.301l-0.6-2.699l3.599-3.299l1.799-0.299v2.098l5.098,0.602v-1.801h-1.799v-4.498l4.198-0.6
                                    l0.3-6.297h-2.699l2.999-8.396h6.297v-2.998h-2.099l-7.197,0.6l0.3-5.697h2.399l0.252-8.152
                                    c-11.949,0.242-29.248-3.406-35.858,1.91c-8.271,6.648-16.526,6.975-27.165,10.146c-12.7,3.789-12.218,1.682-20.564,10.021
                                    c-2.245,0.332-3.842,2.52-4.961,5.477l1.934,0.09l0.601,10.496h2.398l3.898,0.299v4.199l10.495-0.6l0.6,5.697h1.5l2.699,3.299
                                    l1.499-2.1l2.398-0.6l0.6,10.195L889.754,473.251z M869.971,379.595c-0.108,0.404-0.307,0.738-0.687,0.842
                                    c-0.51,0.137-0.58-0.543-0.69-1.021c0.423,0.09,0.82,0.158,0.973,0.174C869.725,379.605,869.858,379.605,869.971,379.595z
                                     M867.869,379.244c-0.17,0.123-0.429,0.254-0.848,0.346c-0.686,0.148-3.715,0.148-3.958-0.283c-0.236-0.416,1.422-1.92,0.282-2.26
                                    c-0.283-0.086-0.99-1.654-0.849-1.979c0.196-0.447,0.962-0.576,1.132-0.848c0.146-0.234-0.045-1.355,0-1.695
                                    c0.063-0.496,2.123-1.57,2.827-1.131c0.18,0.113,0.403,0.57,0.611,1.02c-0.385-0.068-1.076,0.066-1.46,0.111
                                    c-0.502,0.057-0.955,0.391-1.131,0.848c-0.254,0.66,0.273,0.686-0.282,1.131c-0.178,0.141-0.226,0.346-0.283,0.564
                                    c-0.141,0.541-0.573,1.123,0,1.695c0.059,0.059,0.434,0.266,0.565,0.283c1.032,0.133,0.45,0.211,0.849,0.848
                                    c0.086,0.137,0.518,0.281,0.849,0.281c0.176,0,0.7-0.057,0.848,0c0.351,0.139,0.01,0.59,0.283,0.848
                                    C867.375,379.091,867.594,379.169,867.869,379.244L867.869,379.244z M867.308,372.923l0.041,0.086
                                    C867.3,372.98,867.296,372.955,867.308,372.923z M868.749,373.73c0.351,0.07,0.672,0.131,0.817,0.207
                                    c0.676,0.355,1.654-0.549,1.979,0.283c0.513,1.313-0.708,1.164-0.849,1.412c-0.624,1.105,0.482,1.313-0.047,2.045l-0.801-1.762
                                    c-0.077-0.93-0.023-1.152-0.565-1.695C869.123,374.06,868.945,373.89,868.749,373.73L868.749,373.73z" />
                                    </g>
                                    <g id="g6134" transform="matrix(1.25,0,0,-1.25,1814.29,217.74306)">
                                        <path id="path6136" fill="#DCDCDC" d="M0.104-0.396h0.24H0.104" />
                                    </g>
                                    <g id="g6138" transform="matrix(1.25,0,0,-1.25,1811.29,218.04306)">
                                        <path id="path6140" fill="#DCDCDC" d="M0.104-0.396h0.24H0.104" />
                                    </g>
                                    <g id="g6142" transform="matrix(1.25,0,0,-1.25,1824.79,228.54306)">
                                        <path id="path6144" fill="#DCDCDC" d="M0.104-0.396v-0.24V-0.396" />
                                    </g>
                                    <g id="g6146" transform="matrix(1.25,0,0,-1.25,1825.09,228.24306)">
                                        <path id="path6148" fill="#DCDCDC" d="M0.104-0.396h0.24H0.104" />
                                    </g>
                                    <g id="g6150" transform="matrix(1.25,0,0,-1.25,1824.79,242.64306)">
                                        <path id="path6152" fill="#DCDCDC" d="M0.104-0.396v-0.24V-0.396" />
                                    </g>
                                    <g id="g6154" transform="matrix(1.25,0,0,-1.25,1825.09,242.64306)">
                                        <path id="path6156" fill="#DCDCDC" d="M0.104-0.396h-0.241H0.104" />
                                    </g>
                                    <g id="g6158" transform="matrix(1.25,0,0,-1.25,1847.29,250.14306)">
                                        <path id="path6160" fill="#DCDCDC" d="M0.104-0.396v-0.24V-0.396" />
                                    </g>
                                    <g id="g6162" transform="matrix(1.25,0,0,-1.25,1852.09,282.84306)">
                                        <path id="path6164" fill="#DCDCDC" d="M0.104-0.396h-0.241H0.104" />
                                    </g>
                                    <g id="g6166" transform="matrix(1.25,0,0,-1.25,1850.29,282.84306)">
                                        <path id="path6168" fill="#DCDCDC" d="M0.104-0.396v0.24V-0.396" />
                                    </g>
                                    <g id="g6170" transform="matrix(1.25,0,0,-1.25,1879.39,218.04306)">
                                        <path id="path6172" fill="#DCDCDC" d="M0.103-0.396h-0.72H0.103" />
                                    </g>
                                    <g id="g6174" transform="matrix(1.25,0,0,-1.25,1799.89,218.94306)">
                                        <path id="path6176" fill="#DCDCDC" d="M0.103-0.396h-0.24H0.103" />
                                    </g>
                                    <g id="g6178" transform="matrix(1.25,0,0,-1.25,1802.59,218.64306)">
                                        <path id="path6180" fill="#DCDCDC" d="M0.104-0.396h-0.241H0.104" />
                                    </g>
                                    <g id="g6182" transform="matrix(1.25,0,0,-1.25,1776.19,221.04306)">
                                        <path id="path6184" fill="#DCDCDC" d="M0.103-0.396h0.24H0.103" />
                                    </g>
                                    <g id="g6186" transform="matrix(1.25,0,0,-1.25,1836.49,303.84306)">
                                        <path id="path6188" fill="#DCDCDC" d="M0.103-0.396v-0.24V-0.396" />
                                    </g>
                                    <g id="g6190" transform="matrix(1.25,0,0,-1.25,1880.89,293.94306)">
                                        <path id="path6192" fill="#DCDCDC" d="M0.103-0.396h0.24H0.103" />
                                    </g>
                                    <g id="g6194" transform="matrix(1.25,0,0,-1.25,1869.49,308.64306)">
                                        <path id="path6196" fill="#DCDCDC" d="M0.103-0.396h-0.24H0.103" />
                                    </g>
                                    <g id="g6198" transform="matrix(1.25,0,0,-1.25,1887.49,276.54306)">
                                        <path id="path6200" fill="#DCDCDC" d="M0.103-0.396h-0.24H0.103" />
                                    </g>
                                    <g id="g6202" transform="matrix(1.25,0,0,-1.25,1740.49,217.74306)">
                                        <path id="path6204" fill="#DCDCDC" d="M0.103-0.396h0.241H0.103" />
                                    </g>
                                    <g id="g6206" transform="matrix(1.25,0,0,-1.25,1776.19,221.04306)">
                                        <path id="path6208" fill="#DCDCDC" d="M0.103-0.396v-0.24V-0.396" />
                                    </g>
                                    <g id="g6210" transform="matrix(1.25,0,0,-1.25,1781.59,242.34306)">
                                        <path id="path6212" fill="#DCDCDC" d="M0.103-0.396h0.24H0.103" />
                                    </g>
                                    <g id="g6214" transform="matrix(1.25,0,0,-1.25,1827.49,317.34306)">
                                        <path id="path6216" fill="#DCDCDC" d="M0.103-0.396h0.241H0.103" />
                                    </g>
                                    <g id="g6218" transform="matrix(1.25,0,0,-1.25,1835.29,318.54306)">
                                        <path id="path6220" fill="#DCDCDC" d="M0.103-0.396v0.24V-0.396" />
                                    </g>
                                    <g id="g6222" transform="matrix(1.25,0,0,-1.25,1833.49,338.34306)">
                                        <path id="path6224" fill="#DCDCDC" d="M0.103-0.395v0.48V-0.395" />
                                    </g>
                                    <g id="g6226" transform="matrix(1.25,0,0,-1.25,1861.39,317.34306)">
                                        <path id="path6228" fill="#DCDCDC" d="M0.103-0.396h-0.24H0.103" />
                                    </g>
                                    <g id="g6230" transform="matrix(1.25,0,0,-1.25,1946.89,287.04306)">
                                        <path id="path6232" fill="#FFFFFF" d="M0.103-0.396h0.24H0.103" />
                                    </g>
                                    <g id="g6234" transform="matrix(1.25,0,0,-1.25,1740.79,217.74306)">
                                        <path id="path6236" fill="#FFFFFF" d="M0.103-0.396h-0.241H0.103" />
                                    </g>
                                    <g id="g6238" transform="matrix(1.25,0,0,-1.25,1721.59,225.84306)">
                                        <path id="path6240" fill="#FFFFFF" d="M0.103-0.396h0.24H0.103" />
                                    </g>
                                    <g id="g6242" transform="matrix(1.25,0,0,-1.25,1734.79,215.04306)">
                                        <path id="path6244" fill="#FFFFFF" d="M0.103-0.396h-0.96H0.103" />
                                    </g>
                                    <g id="g6246" transform="matrix(1.25,0,0,-1.25,1734.79,215.04306)">
                                        <path id="path6248" fill="#FFFFFF" d="M0.103-0.396h-0.96H0.103" />
                                    </g>
                                    <g id="g6250" transform="matrix(1.25,0,0,-1.25,1741.09,224.04306)">
                                        <path id="path6252" fill="#DCDCDC" d="M0.103-0.396v-0.24V-0.396" />
                                    </g>
                                    <g id="g6254" transform="matrix(1.25,0,0,-1.25,1711.09,260.64306)">
                                        <path id="path6256" fill="#DCDCDC" d="M0.103-0.396h0.24H0.103" />
                                    </g>
                                    <g id="g6258" transform="matrix(1.25,0,0,-1.25,1754.89,267.54306)">
                                        <path id="path6260" fill="#DCDCDC" d="M0.103-0.396h-0.24H0.103" />
                                    </g>
                                    <g id="g6262" transform="matrix(1.25,0,0,-1.25,1754.59,267.24306)">
                                        <path id="path6264" fill="#DCDCDC" d="M0.103-0.396h0.24H0.103" />
                                    </g>
                                    <g id="g6266" transform="matrix(1.25,0,0,-1.25,1787.59,336.84306)">
                                        <path id="path6268" fill="#DCDCDC" d="M0.103-0.395h-0.48H0.103" />
                                    </g>
                                    <g id="g6270" transform="matrix(1.25,0,0,-1.25,1876.39,392.34306)">
                                        <path id="path6272" fill="#DCDCDC" d="M0.103-0.395h-0.24H0.103" />
                                    </g>
                                    <g id="g6274" transform="matrix(1.25,0,0,-1.25,1927.39,333.84306)">
                                        <path id="path6276" fill="#FFFFFF" d="M0.103-0.395h-0.24H0.103" />
                                    </g>
                                    <g id="g6278" transform="matrix(1.25,0,0,-1.25,1956.19,356.34306)">
                                        <path id="path6280" fill="#FFFFFF" d="M0.103-0.395v0.239V-0.395" />
                                    </g>
                                    <g id="g6282" transform="matrix(1.25,0,0,-1.25,1954.99,357.24306)">
                                        <path id="path6284" fill="#FFFFFF" d="M0.102-0.396v0.239V-0.396" />
                                    </g>
                                    <g id="g6286" transform="matrix(1.25,0,0,-1.25,1927.39,333.84306)">
                                        <path id="path6288" fill="#DCDCDC" d="M0.103-0.395h0.24H0.103" />
                                    </g>
                                    <g id="g6290" transform="matrix(1.25,0,0,-1.25,1981.69,245.04306)">
                                        <path id="path6292" fill="#FFFFFF" d="M0.103-0.396v-0.24V-0.396" />
                                    </g>
                                    <g id="g6294" transform="matrix(1.25,0,0,-1.25,1860.19,395.34306)">
                                        <path id="path6296" fill="#DCDCDC" d="M0.102-0.395v-0.481V-0.395" />
                                    </g>
                                    <g id="g6298" transform="matrix(1.25,0,0,-1.25,1845.49,395.34306)">
                                        <path id="path6300" fill="#DCDCDC" d="M0.102-0.395h0.241H0.102" />
                                    </g>
                                    <g id="g6302" transform="matrix(1.25,0,0,-1.25,1923.79,385.44306)">
                                        <path id="path6304" fill="#FFFFFF" d="M0.103-0.397v-0.239V-0.397" />
                                    </g>
                                    <g id="g6306" transform="matrix(1.25,0,0,-1.25,2044.99,268.74306)">
                                        <path id="path6308" fill="#FFFFFF" d="M0.102-0.396h-0.24H0.102" />
                                    </g>
                                    <g id="g6310" transform="matrix(1.25,0,0,-1.25,1636.39,215.04306)">
                                    </g>
                                    <g id="g6312" transform="matrix(1.25,0,0,-1.25,1966.99,401.04306)">
                                        <path id="path6314" fill="#FFFFFF" d="M0.102-0.396h0.241H0.102" />
                                    </g>
                                    <g id="LÍNEAS_GLOBO"
                                        transform="matrix(4.6292732,0,0,-4.6292732,-535.75071,-248.17154)">
                                        <path id="path16298" fill="none" stroke="#FFFFFF" stroke-width="0.0275"
                                            d="M0.028-0.107h216" />
                                        <path id="path16302" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M7.468-56.027
                                    c69.498,18.72,138.988,37.474,208.56,55.92" />
                                        <path id="path16306" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M29.068-108.107
                                    c62.203,36.201,124.611,72.051,186.96,108" />
                                        <path id="path16310" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M63.388-152.747
                                    c50.88,50.88,101.76,101.76,152.64,152.64" />
                                        <path id="path16314" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M108.028-187.067
                                    c36.201,62.203,72.051,124.611,108,186.96" />
                                        <path id="path16318" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M160.108-208.667
                                    c18.717,69.499,37.464,138.991,55.92,208.56" />
                                        <path id="path16322" fill="none" stroke="#FFFFFF" stroke-width="0.0275"
                                            d="M216.028-216.107c0,72,0,144,0,216" />
                                        <path id="path16326" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M271.948-208.667
                                    c-18.717,69.499-37.464,138.991-55.92,208.56" />
                                        <path id="path16330" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M324.028-187.067
                                    c-36.202,62.203-72.051,124.611-108,186.96" />
                                        <path id="path16334" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M368.668-152.747
                                    c-50.88,50.88-101.76,101.76-152.64,152.64" />
                                        <path id="path16338" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M402.988-108.107
                                    c-62.204,36.201-124.611,72.051-186.96,108" />
                                        <path id="path16342" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M424.588-56.027
                                    c-69.499,18.72-138.988,37.474-208.56,55.92" />
                                        <path id="path16346" fill="none" stroke="#FFFFFF" stroke-width="0.0275"
                                            d="M432.028-0.107c-72,0-144,0-216,0" />
                                        <path id="path16350" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M0.028-0.107c-0.223-47.8,16.411-95.392,45.84-133.2
                                    c28.756-36.547,69.534-63.827,114.96-75.6c60.248-16.212,125.546-4.698,176.88,30.24c42.271,28.841,74.166,73.262,87.12,123.36
                                    c4.791,17.93,7.193,36.522,7.2,55.2" />
                                        <path id="path16354" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M37.708-0.107
                                    c-0.044-45.849,18.111-91.086,50.054-123.735c20.044-21.11,46.755-37.716,74.506-46.185
                                    c34.126-11.039,72.012-11.144,106.329-0.438c31.863,9.639,60.805,28.904,82.446,53.852c28.045,32.622,43.206,73.77,43.306,116.506
                                    " />
                                        <path id="path16358" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M71.788-0.107c0.369-27.952,7.73-53.473,22.08-76.56
                                    c16.49-26.429,42.854-47.992,71.04-58.08c25.793-10.318,57.739-12.426,85.44-5.28c24.166,5.769,46.677,17.914,65.76,36.24
                                    c19.452,18.746,32.752,42.047,39.12,66.48c3.368,11.989,4.723,24.361,5.04,37.2" />
                                        <path id="path16362" fill="none" stroke="#FFFFFF" stroke-width="0.0275"
                                            d="M103.468-0.107
                                    c-0.575-44.487,27.912-87.357,69.36-103.92c39.466-17.13,88.717-8.323,120,21.6c22.543,20.754,36.046,51.549,35.76,82.32" />
                                        <path id="path16366" fill="none" stroke="#FFFFFF" stroke-width="0.0275"
                                            d="M132.988-0.107c0.097-21.321,8.413-41.946,23.28-57.6
                                    c18.913-19.511,47.037-29.132,74.16-24c28.14,4.41,53.679,25.564,63.36,52.8c3.423,9.03,5.056,18.718,5.28,28.8" />
                                        <path id="path16370" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M161.308-0.107c0.095-21.099,12.555-40.597,31.2-49.2
                                    c16.24-8.498,38.99-6.614,54,3.84c15.132,10.243,24.035,27.277,24.24,45.36" />
                                        <path id="path16374" fill="none" stroke="#FFFFFF" stroke-width="0.0275" d="M188.908-0.107c0.386-10.625,5.178-17.952,12.48-22.8
                                    c9.167-6.63,25.224-5.185,32.64,2.64c5.078,4.273,9.02,11.515,9.12,20.16" />
                                    </g>
                                </g>
                                <g id="CAPITALES">
                                    <g id="PUNTOS">
                                        <circle fill="#C1272D" cx="519.915" cy="294.003" r="2.333" />
                                        <circle fill="#C1272D" cx="376.678" cy="196.664" r="2.333" />
                                        <circle fill="#C1272D" cx="234.271" cy="170.909" r="2.333" />
                                        <circle fill="#C1272D" cx="242.1" cy="334.818" r="2.333" />
                                        <circle fill="#C1272D" cx="107.66" cy="41.605" r="2.333" />
                                        <circle fill="#C1272D" cx="580.837" cy="350.409" r="2.333" />
                                        <circle fill="#C1272D" cx="473.938" cy="383.379" r="2.334" />
                                        <circle fill="#C1272D" cx="482.145" cy="414.557" r="2.333" />
                                        <circle fill="#C1272D" cx="523.248" cy="400.771" r="2.334" />
                                        <circle fill="#C1272D" cx="513.48" cy="435.64" r="2.333" />
                                        <circle fill="#C1272D" cx="401.937" cy="426.024" r="2.333" />
                                        <circle fill="#C1272D" cx="456.299" cy="453.035" r="2.333" />
                                        <circle fill="#C1272D" cx="336.146" cy="322.069" r="2.333" />
                                        <circle fill="#C1272D" cx="412.418" cy="341.483" r="2.333" />
                                        <circle fill="#C1272D" cx="582.837" cy="507.856" r="2.333" />
                                        <circle fill="#C1272D" cx="436.369" cy="498.665" r="2.333" />
                                        <circle fill="#C1272D" cx="566.159" cy="498.59" r="2.333" />
                                        <circle fill="#C1272D" cx="592.436" cy="468.904" r="2.333" />
                                        <circle fill="#C1272D" cx="544.374" cy="453.035" r="2.333" />
                                        <circle fill="#C1272D" cx="522.248" cy="486.169" r="2.334" />
                                        <circle fill="#C1272D" cx="650.937" cy="483.66" r="2.333" />
                                        <circle fill="#C1272D" cx="878.258" cy="423.27" r="2.333" />
                                        <circle fill="#C1272D" cx="849.27" cy="465.122" r="2.333" />
                                        <circle fill="#C1272D" cx="923.414" cy="502.62" r="2.333" />
                                        <circle fill="#C1272D" cx="784.269" cy="568.659" r="2.333" />
                                        <circle fill="#C1272D" cx="779.548" cy="535.02" r="2.333" />
                                        <circle fill="#C1272D" cx="666.105" cy="569.93" r="2.334" />
                                        <circle fill="#C1272D" cx="609.23" cy="497.894" r="2.334" />
                                        <circle fill="#C1272D" cx="570.752" cy="551.024" r="2.334" />
                                        <circle fill="#C1272D" cx="610.23" cy="505.522" r="2.334" />
                                        <circle fill="#C1272D" cx="541.609" cy="285.192" r="2.334" />
                                    </g>
                                </g>
                                <g id="NOMBRES_ESTADOS">
                                    <text transform="matrix(1 0 0 1 460.594 409.8002)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="7">AGUASCALIENTES</text>
                                    <path fill="none"
                                        d="M93.321,59.89c0,0,8.118,60.969,21.257,77.484s32.639,34.332,34.139,48.674" />
                                    <text transform="matrix(0.1705 0.9854 -0.9854 0.1705 95.1409 71.8574)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Roman'" font-size="10">B</tspan>
                                        <tspan x="7.824" y="-0.008" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-0.875">A</tspan>
                                        <tspan x="15.267" y="-0.133" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-1.735">J</tspan>
                                        <tspan x="21.438" y="-0.322" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-2.726">A</tspan>
                                        <tspan x="28.862" y="-0.697" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-3.674"> </tspan>
                                        <tspan x="32.626" y="-0.923" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-4.89">C</tspan>
                                        <tspan x="40.736" y="-1.633" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-6.932">A</tspan>
                                        <tspan x="48.333" y="-2.584" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-9.623">L</tspan>
                                        <tspan x="55.031" y="-3.781" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-12.522">I</tspan>
                                        <tspan x="58.914" y="-4.616" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-17.191">F</tspan>
                                        <tspan x="66.19" y="-7.03" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-29.306">O</tspan>
                                        <tspan x="73.613" y="-11.239" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-31.015">R</tspan>
                                        <tspan x="80.328" y="-15.295" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-31.44">N</tspan>
                                        <tspan x="87.339" y="-19.574" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-31.036">I</tspan>
                                        <tspan x="90.398" y="-21.429" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-30.068">A</tspan>
                                    </text>
                                    <path fill="none"
                                        d="M149.771,207.568c0,0,44.25,49,52.25,82s21.75,45.5,33.5,53.25s12.056,16.346,19,20" />
                                    <text transform="matrix(0.649 0.7608 -0.7608 0.649 152.012 210.0854)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Roman'" font-size="10">B</tspan>
                                        <tspan x="7.827" y="0.012" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="1.043">A</tspan>
                                        <tspan x="15.265" y="0.16" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="1.926">J</tspan>
                                        <tspan x="21.438" y="0.37" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="2.834">A</tspan>
                                        <tspan x="28.881" y="0.757" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="3.624"> </tspan>
                                        <tspan x="32.633" y="0.985" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="4.529">C</tspan>
                                        <tspan x="40.769" y="1.642" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="5.841">A</tspan>
                                        <tspan x="48.171" y="2.414" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="7.188">L</tspan>
                                        <tspan x="54.632" y="3.252" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="8.292">I</tspan>
                                        <tspan x="58.167" y="3.759" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="9.569">F</tspan>
                                        <tspan x="64.72" y="4.857" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="11.811">O</tspan>
                                        <tspan x="73.043" y="6.623" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="14.911">R</tspan>
                                        <tspan x="80.502" y="8.618" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="19.021">N</tspan>
                                        <tspan x="88.122" y="11.355" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="23.144">I</tspan>
                                        <tspan x="91.323" y="12.757" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="26.331">A</tspan>
                                        <tspan x="98.209" y="16.103" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="24.125"> </tspan>
                                        <tspan x="101.831" y="17.744" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="21.597">S</tspan>
                                        <tspan x="109.1" y="20.594" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="17.413">U</tspan>
                                        <tspan x="117.367" y="23.123" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="12.152">R</tspan>
                                    </text>
                                    <text transform="matrix(1 0 0 1 214.3191 158.748)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="3">SONORA</text>

                                    <text transform="matrix(0.9227 -0.3855 0.3855 0.9227 830.3607 519.5893)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="1">CAMPECHE</text>
                                    <text transform="matrix(1 0 0 1 874.2708 434.559)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="1">YUCATÁN</text>
                                    <text transform="matrix(1 0 0 1 893.1351 476.1596)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Roman'" font-size="10">QUINTANA
                                        </tspan>
                                        <tspan x="14.249" y="12" font-family="'HelveticaNeue-Roman'" font-size="10">ROO
                                        </tspan>
                                    </text>
                                    <text transform="matrix(1 0 0 1 775.511 581.9096)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="2">CHIAPAS</text>
                                    <text transform="matrix(1 0 0 1 639.2542 580.8344)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="3">OAXACA</text>
                                    <text transform="matrix(1 0 0 1 756.179 530.5073)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10">TABASCO</text>
                                    <path fill="none" d="M615.417,454.748c0,0,69.661,89.055,135.933,102.117" />
                                    <text transform="matrix(0.7263 0.6874 -0.6874 0.7263 653.5989 496.2602)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Roman'" font-size="10">V</tspan>
                                        <tspan x="10.068" y="-0.046" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-1.403">E</tspan>
                                        <tspan x="20.117" y="-0.339" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-2.983">R</tspan>
                                        <tspan x="30.909" y="-0.964" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-4.762">A</tspan>
                                        <tspan x="41.289" y="-1.887" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-6.788">C</tspan>
                                        <tspan x="52.359" y="-3.283" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-9.135">R</tspan>
                                        <tspan x="62.958" y="-5.072" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-11.839">U</tspan>
                                        <tspan x="73.852" y="-7.47" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-14.903">Z</tspan>
                                    </text>

                                    <text transform="matrix(0.8773 0.4799 -0.4799 0.8773 517.6038 540.2661)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="2">GUERRERO</text>
                                    <path fill="none" d="M474.836,537.888c0,0,13.733-38.989,64.867-38.323" />
                                    <text transform="matrix(0.4871 -0.8734 0.8734 0.4871 475.3509 536.1557)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Roman'" font-size="10">M</tspan>
                                        <tspan x="10.471" y="0.307" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="7.098">I</tspan>
                                        <tspan x="14.832" y="0.824" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="13.211">C</tspan>
                                        <tspan x="23.537" y="2.995" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="21.407">H</tspan>
                                        <tspan x="31.844" y="6.375" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="29.774">O</tspan>
                                        <tspan x="39.882" y="11.16" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="37.597">A</tspan>
                                        <tspan x="46.371" y="16.279" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="44.825">C</tspan>
                                        <tspan x="52.667" y="22.725" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="51.427">Á</tspan>
                                        <tspan x="57.773" y="29.263" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="57.329">N</tspan>
                                    </text>
                                    <text transform="matrix(1 0 0 1 326.6438 207.5678)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="3">CHIHUAHUA</text>

                                    <text transform="matrix(0.6607 0.7507 -0.7507 0.6607 290.5042 268.9443)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="3">SINALOA</text>
                                    <text transform="matrix(1 0 0 1 364.2703 315.9843)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="4">DURANGO</text>

                                    <text transform="matrix(0.576 0.8175 -0.8175 0.576 392.763 395.0795)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="1">NAYARIT</text>
                                    <text transform="matrix(1 0 0 1 396.513 469.7289)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10"
                                        letter-spacing="3">JALISCO</text>
                                    <path fill="none" d="M468.114,381.41c0,0-13.646-29.334,37.331-54" />
                                    <text transform="matrix(-0.2441 -0.9698 0.9698 -0.2441 467.992 381.728)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Roman'" font-size="10">Z</tspan>
                                        <tspan x="6.684" y="0.079" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="14.45">A</tspan>
                                        <tspan x="13.519" y="1.884" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="28.199">C</tspan>
                                        <tspan x="20.374" y="5.705" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="40.345">A</tspan>
                                        <tspan x="25.799" y="10.453" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="49.619">T</tspan>
                                        <tspan x="29.973" y="15.442" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="57.027">E</tspan>
                                        <tspan x="33.717" y="21.269" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="63.661">C</tspan>
                                        <tspan x="37.222" y="28.508" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="69.06">A</tspan>
                                        <tspan x="39.813" y="35.391" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="73.227">S</tspan>
                                    </text>
                                    <text transform="matrix(1 0 0 1 601.0394 525.937)"
                                        font-family="'HelveticaNeue-Roman'" font-size="10">PUEBLA</text>
                                    <text transform="matrix(1 0 0 1 598.3548 489.5034)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="8">TLAXCALA</text>
                                    <text transform="matrix(1 0 0 1 569.7523 523.2055)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="7">MORELOS</text>
                                    <text transform="matrix(1 0 0 1 576.9173 495.561)">
                                        <tspan x="2.912" y="6.4" font-family="'HelveticaNeue-MediumCond'" font-size="7">
                                            CDMX</tspan>
                                    </text>
                                    <path fill="none" d="M550.605,501.5c0,0,22.221-22.534,31.108-16.062" />
                                    <text transform="matrix(0.7466 -0.6653 0.6653 0.7466 551.9915 500.0571)">
                                        <tspan x="2.912" y="6.4" font-family="'HelveticaNeue-MediumCond'" font-size="7">
                                            Edo. Méx</tspan>
                                    </text>
                                    <path fill="none" d="M494.421,456.051c0,0,12.339,15.577,58.31-32.042" />
                                    <text transform="matrix(0.9911 -0.1332 0.1332 0.9911 501.3626 458.6723)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Condensed'" font-size="10.0943">G
                                        </tspan>
                                        <tspan x="6.996" y="-0.277" font-family="'HelveticaNeue-Condensed'"
                                            font-size="10.0943" rotate="-13.295">U
                                        </tspan>
                                        <tspan x="13.112" y="-1.825" font-family="'HelveticaNeue-Condensed'"
                                            font-size="10.0943" rotate="-20.293">A
                                        </tspan>
                                        <tspan x="18.67" y="-3.923" font-family="'HelveticaNeue-Condensed'"
                                            font-size="10.0943" rotate="-25.031">N
                                        </tspan>
                                        <tspan x="24.423" y="-6.653" font-family="'HelveticaNeue-Condensed'"
                                            font-size="10.0943" rotate="-28.414">A
                                        </tspan>
                                        <tspan x="29.479" y="-9.418" font-family="'HelveticaNeue-Condensed'"
                                            font-size="10.0943" rotate="-30.756">J
                                        </tspan>
                                        <tspan x="33.727" y="-11.953" font-family="'HelveticaNeue-Condensed'"
                                            font-size="10.0943" rotate="-32.682">U
                                        </tspan>
                                        <tspan x="38.539" y="-15.052" font-family="'HelveticaNeue-Condensed'"
                                            font-size="10.0943" rotate="-34.353">A
                                        </tspan>
                                        <tspan x="43.07" y="-18.162" font-family="'HelveticaNeue-Condensed'"
                                            font-size="10.0943" rotate="-35.697">T
                                        </tspan>
                                        <tspan x="47.249" y="-21.166" font-family="'HelveticaNeue-Condensed'"
                                            font-size="10.0943" rotate="-36.925">O
                                        </tspan>
                                    </text>
                                    <path fill="none" d="M523.576,345.949c0,0-27.033,72.044,65.831,65.336" />
                                    <text transform="matrix(-0.2194 0.9756 -0.9756 -0.2194 522.3421 349.6645)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Roman'" font-size="10">S</tspan>
                                        <tspan x="8.001" y="-0.08" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-6.38">A</tspan>
                                        <tspan x="16.05" y="-1.047" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-14.121">N</tspan>
                                        <tspan x="24.503" y="-3.407" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-21.318"> </tspan>
                                        <tspan x="28.596" y="-5.009" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-28.733">L</tspan>
                                        <tspan x="35.199" y="-8.755" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-41.246">U</tspan>
                                        <tspan x="41.748" y="-15.022" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-52.168">I</tspan>
                                        <tspan x="44.459" y="-18.508" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-62.189">S</tspan>
                                        <tspan x="48.028" y="-25.904" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-71.262"> </tspan>
                                        <tspan x="49.443" y="-30.068" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-78.856">P</tspan>
                                        <tspan x="50.91" y="-38.094" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-87.346">O</tspan>
                                        <tspan x="51.185" y="-47.168" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-93.45">T</tspan>
                                        <tspan x="50.725" y="-54.27" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-98.178">O</tspan>
                                        <tspan x="49.384" y="-63.077" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-102.087">S</tspan>
                                        <tspan x="47.713" y="-70.574" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-104.329">Í</tspan>
                                    </text>
                                    <path fill="none" d="M589.22,380.104c0,0,29.229-67.05,22.453-95.319" />
                                    <text transform="matrix(0.3758 -0.9267 0.9267 0.3758 590.6683 376.6987)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Roman'" font-size="10">T</tspan>
                                        <tspan x="8.712" y="-0.028" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-1.173">A</tspan>
                                        <tspan x="18.141" y="-0.242" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-2.507">M</tspan>
                                        <tspan x="29.803" y="-0.802" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-3.988">A</tspan>
                                        <tspan x="39.214" y="-1.49" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-5.605">U</tspan>
                                        <tspan x="49.303" y="-2.536" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-7.486">L</tspan>
                                        <tspan x="57.742" y="-3.71" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-9.244">I</tspan>
                                        <tspan x="63.329" y="-4.637" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-11.639">P</tspan>
                                        <tspan x="72.934" y="-6.717" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-15.994">A</tspan>
                                        <tspan x="82.567" y="-9.654" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-23.413">S</tspan>
                                    </text>
                                    <text transform="matrix(0.6452 -0.764 0.764 0.6452 548.2689 465.4135)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="10">QUERÉTARO</text>
                                    <path fill="none" d="M547.951,345.949c0,0,27.68-72.618,0-108.662" />
                                    <text transform="matrix(0.2635 -0.9647 0.9647 0.2635 552.0921 333.2836)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Roman'" font-size="10">N</tspan>
                                        <tspan x="9.152" y="-0.037" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-2.238">U</tspan>
                                        <tspan x="18.297" y="-0.442" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-4.469">E</tspan>
                                        <tspan x="26.332" y="-1.106" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-6.765">V</tspan>
                                        <tspan x="34.475" y="-2.101" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-9.646">O</tspan>
                                        <tspan x="44.157" y="-3.855" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-12.394"> </tspan>
                                        <tspan x="49.026" y="-4.94" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-15.081">L</tspan>
                                        <tspan x="56.605" y="-7.048" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-19.077">E</tspan>
                                        <tspan x="64.674" y="-9.909" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-24.643">Ó</tspan>
                                        <tspan x="73.89" y="-14.31" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-32.192">N</tspan>
                                    </text>
                                    <path fill="none" d="M471.604,286.02c0,0,24.666-32.777,30-108.777" />
                                    <text transform="matrix(0.3824 -0.924 0.924 0.3824 481.5779 267.5834)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Roman'" font-size="10">C</tspan>
                                        <tspan x="10.121" y="-0.079" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-3.043">O</tspan>
                                        <tspan x="20.627" y="-0.714" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-5.7">H</tspan>
                                        <tspan x="30.721" y="-1.791" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-7.959">A</tspan>
                                        <tspan x="40.062" y="-3.147" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-10.033">U</tspan>
                                        <tspan x="50.067" y="-4.991" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-11.58">I</tspan>
                                        <tspan x="55.515" y="-6.124" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-12.892">L</tspan>
                                        <tspan x="63.801" y="-8.057" font-family="'HelveticaNeue-Roman'" font-size="10"
                                            rotate="-14.473">A</tspan>
                                    </text>

                                    <text transform="matrix(1 0.0081 -0.0081 1 563.4485 465.1674)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="10"
                                        letter-spacing="1">HIDALGO</text>

                                    <text transform="matrix(0.9995 0.0305 -0.0305 0.9995 417.0374 510.5395)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="10">COLIMA</text>
                                    <text transform="matrix(1 0 0 1 516.9818 481.6489)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="5">Morelia</text>
                                    <text transform="matrix(1 0 0 1 395.7708 433.4096)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="5">Tepic</text>
                                    <text transform="matrix(1 0 0 1 465.9573 421.2973)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="5">Aguascalientes</text>
                                    <text transform="matrix(1 0 0 1 464.1287 390.4096)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="5">Zacatecas</text>
                                    <text transform="matrix(1 0 0 1 573.8226 339.5463)">
                                        <tspan x="0" y="0" font-family="'HelveticaNeue-Condensed'" font-size="5">Ciudad
                                        </tspan>
                                        <tspan x="-0.708" y="6" font-family="'HelveticaNeue-Condensed'" font-size="5">
                                            Victoria</tspan>
                                    </text>
                                    <text transform="matrix(1 0 0 1 528.1312 281.1596)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="5">Monterrey</text>
                                    <text transform="matrix(1 0 0 1 507.9886 301.4096)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="5">Saltillo</text>
                                    <text transform="matrix(1 0 0 1 365.9558 190.9096)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="5">Chihuahua</text>
                                    <text transform="matrix(1 0 0 1 246.9651 336.228)"
                                        font-family="'HelveticaNeue-Condensed'" font-size="5">La
                                        Paz</text>
                                </g>
                            </svg>
                        </div>
                        <div name="tarjetasEstacion" class="col-4">
                            <div class=" card mb-3 border-success" style="background-color: #00c0ef">
                                <div class="row g-0">
                                    <div class="col-md-4 p" style="background-color: #009abf">
                                        <svg style="display: block; margin: auto;" xmlns="http://www.w3.org/2000/svg"
                                            width="70" height="70" fill="#ffffff"
                                            class="pt-2 img-fluid rounded-start bi bi-archive" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title">Nuevo</h5>
                                                    <h4 class="card-text" id="nuevo">0</h4>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-title">Porcentaje</h5>
                                                    <h4 class="card-text" id="nuevoPorcentaje">0%</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" card mb-3 border-success" style="background-color: #00a65a">
                                <div class="row g-0">
                                    <div class="col-md-4 p" style="background-color: #008548">
                                        <svg class="pt-2 img-fluid rounded-start"
                                            style="display: block; margin: auto;  " xmlns="http://www.w3.org/2000/svg"
                                            width="70" height="70" fill="#ffffff" class="bi bi-telephone-forward"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title">En Proceso</h5>
                                                    <h4 class="card-text" id="proceso">0</h4>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-title">Porcentaje</h5>
                                                    <h4 class="card-text" id="procesoPorcentaje">0%</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" card mb-3 border-success" style="background-color: #dd4b39">
                                <div class="row g-0">
                                    <div class="col-md-4 p" style="background-color: #b13c2e">
                                        <svg style="display: block; margin: auto;  " xmlns="http://www.w3.org/2000/svg"
                                            width="70" height="70" fill="#ffffff"
                                            class="pt-2 img-fluid rounded-start bi bi-x-square" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title">Cancelado</h5>
                                                    <h4 class="card-text" id="cancelado">0</h4>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-title">Porcentaje</h5>
                                                    <h4 class="card-text" id="canceladoPorcentaje">0%</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" card mb-3 border-success" style="background-color: #d2d6de ">
                                <div class="row g-0">
                                    <div class="col-md-4 p" style="background-color: #a8abb2">
                                        <svg style="display: block; margin: auto;  " xmlns="http://www.w3.org/2000/svg"
                                            width="70" height="70" fill="#ffffff"
                                            class="pt-2 img-fluid rounded-start bi bi-cash-coin" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                            <path
                                                d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                            <path
                                                d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                            <path
                                                d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                        </svg>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title">Terminado</h5>
                                                    <h4 class="card-text" id="terminado">0</h4>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-title">Porcentaje</h5>
                                                    <h4 class="card-text" id="terminadoPorcentaje">0%</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree">
                    Graficas
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                    <!--acordeon de graficas-->
                    <div class="accordion" id="acordionGraficas">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="graficas1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#infoGrafica1" aria-expanded="true" aria-controls="infoGrafica1">
                                    Estatus y Folios
                                </button>
                            </h2>
                            <div id="infoGrafica1" class="accordion-collapse collapse show"
                                aria-labelledby="infoGrafica1">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-7" id="foliosGrafica"></div>
                                        <div class="col-5 text-center pt-xl-5" id="folioDona"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="graficas2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#infoGrafica2" aria-expanded="false" aria-controls="infoGrafica2">
                                    Estaciones
                                </button>
                            </h2>
                            <div id="infoGrafica2" class="accordion-collapse collapse" aria-labelledby="infoGrafica2">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-6" id="seguimientosGrafica"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="graficas3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#infoGrafica3" aria-expanded="false" aria-controls="infoGrafica3">
                                    Entregados
                                </button>
                            </h2>
                            <div id="infoGrafica3" class="accordion-collapse collapse" aria-labelledby="infoGrafica3">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div>
                                            <div id="foliosEntregados"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="graficas4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#infoGrafica4" aria-expanded="false" aria-controls="infoGrafica4">
                                    Por dias y regiones
                                </button>
                            </h2>
                            <div id="infoGrafica4" class="accordion-collapse collapse" aria-labelledby="infoGrafica4">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col" id="disPorDias"></div>
                                        <div class="col" id="regionesGrafica"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="graficas6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#infoGrafica6" aria-expanded="false" aria-controls="infoGrafica6">
                                    Porcentaje de Documentos
                                </button>
                            </h2>
                            <div id="infoGrafica6" class="accordion-collapse collapse" aria-labelledby="infoGrafica6">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col" id="porcentajeDocs"></div>
                                        <div class="col" id="porcentajeTotal"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="graficas7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#infoGrafica7" aria-expanded="false" aria-controls="infoGrafica7">
                                    Folios por Area
                                </button>
                            </h2>
                            <div id="infoGrafica7" class="accordion-collapse collapse" aria-labelledby="infoGrafica7">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div id="docsGrafica"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>