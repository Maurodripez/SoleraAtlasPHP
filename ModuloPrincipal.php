<!DOCTYPE html>
<html lang="en">

<head>
    <script src="./js/jquery-3.6.1.js"></script>
    <script src="./js/ModuloPrincipal.js"></script>
    <script src="./js/resultadoImg.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="./Desplegables/libs/css/bootstrap-datepicker.min.css">
    <script src="./Desplegables/libs/js/bootstrap-datepicker.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="./js/jspdf.min.js"></script>
    <link rel="stylesheet" href="./Estilos/ModuloPrincipal.css">
</head>

<body>
    <?php 
    session_start();
    ?>
  <h1 id="titulo" style="display: none"> <?php echo $_SESSION['usuario']; ?></h1> 

    <div class="row">
        <div class="col text-left display-6 p-2">
            <nav class="navbar bg-light">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">Modulo Principal</span>
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
    <div class="accordion p-4" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="acordeonPrincipal accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapseOne">
                    Documentos enviados
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <div class="row">
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne">
                            <div id="card0a2D" class="card 1" style="width: 18rem">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 id="de0a2" class="card-title">
                                        </h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="card-text">
                                                0-2 Dias
                                            </p>
                                        </div>
                                        <div class="col-5">
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
                                </div>
                                <!--en collapseresultados ligo el boton de la tabla para que al apretar el boton, se muestren los resultados-->
                                <button id="txtBuscar0a2" class="btnDocumentos btn btn-primary" type="button"
                                    data-bs-toggle="collapse" data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Documentos</button>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div id="card3a5D" class="card 2" style="width: 18rem">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 id="de3a5" class="card-title">
                                        </h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="card-text">
                                                3-5 Dias
                                            </p>
                                        </div>
                                        <div class="col-5">
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
                                </div>
                                <button id="txtBuscar3a5" class="btnDocumentos btn btn-primary" type="button"
                                    data-bs-toggle="collapse" data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Documentos</button>

                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div id="card6a14D" class="card 3" style="width: 18rem">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 id="de6a14" class="card-title">

                                        </h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="card-text">
                                                6-14 Dias
                                            </p>
                                        </div>
                                        <div class="col-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                viewBox="0 0 24 24" fill="none" stroke="#605ca8" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-thumbs-down">
                                                <path
                                                    d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <button id="txtBuscar6a14" class="btnDocumentos btn btn-primary" type="button"
                                    data-bs-toggle="collapse" data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Documentos</button>

                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div id="cardMas15D" class="card 4" style="width: 18rem">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 id="mas15" class="card-title">
                                        </h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="card-text">
                                                Mas de 15 Dias
                                            </p>
                                        </div>
                                        <div class="col-5">
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
                                </div>
                                <button id="txtBuscarMas15" class="btnDocumentos btn btn-primary" type="button"
                                    data-bs-toggle="collapse" data-bs-target=".collapseresultados" aria-expanded="false"
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
                    Mensajes sin leer
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <div class="row">
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div id="card0a2M" class="card 1" style="width: 18rem">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 id="txt0a2" class="card-title"></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="card-text">
                                                0 a 2 dias
                                            </p>
                                        </div>
                                        <div class="col-5">
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
                                </div>
                                <button id="btnMsg0a2" onclick="MostrarMensajes(this.id)"
                                    class="btnDocumentos btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Mensajes</button>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div id="card3a5M" class="card 1" style="width: 18rem">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 id="txt3a5" class="card-title"></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="card-text">
                                                3 a 5 dias
                                            </p>
                                        </div>
                                        <div class="col-5">
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
                                </div>
                                <button id="btnMsg3a5" onclick="MostrarMensajes(this.id)"
                                    class="btnDocumentos btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Mensajes</button>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div id="card6a14M" class="card 1" style="width: 18rem">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 id="txt6a14" class="card-title"></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="card-text">
                                                6 a 14 dias</p>
                                        </div>
                                        <div class="col-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"
                                                viewBox="0 0 24 24" fill="none" stroke="#605ca8" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-thumbs-down">
                                                <path
                                                    d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <button id="btnMsg6a14" onclick="MostrarMensajes(this.id)"
                                    class="btnDocumentos btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Mensajes</button>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show col-3"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div id="cardMas15M" class="card 1" style="width: 18rem">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 id="txtmas15" class="card-title"></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="card-text">
                                                mas de 15 dias</p>
                                        </div>
                                        <div class="col-5">
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
                                </div>
                                <button id="btnMsgMas15" onclick="MostrarMensajes(this.id)"
                                    class="btnDocumentos btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target=".collapseresultados" aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">Mostrar
                                    Mensajes</button>
                            </div>
                        </div>
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
            <!--se agrega "collapseresultados" para vincyularla con el boton y se muestre cuando se aprieta-->
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
                                    <input id="txtBtnGeneralBuscar" onkeyup="busquedaGeneral(this.value)"
                                        class="form-control" placeholder="Buscar" type="text" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <table id="DatosTabla" class="tablasPrincipales table table-hover col float-end text-center">
                        <thead id="encabezadoTabla">
                            <tr>
                                <th scope="col">Editar</th>
                                <th scope="col">Id registro</th>
                                <th scope="col">Dias sin responder</th>
                                <th scope="col">Fecha cliente</th>
                                <th scope="col">Siniestro</th>
                                <th scope="col">Poliza</th>
                                <th scope="col">Asegurado</th>
                                <th scope="col">Estatus caso</th>
                            </tr>
                        </thead>

                        <thead id="seccionBotones">
                            <div class="row">
                                <td>
                                    <div class="col-2" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonId">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <p class="card-text">
                                                    <input class="form-control" maxlength="128" id="txtBuscarIdRegistro"
                                                        onkeyup="buscarId()" placeholder="Buscar" size="15"
                                                        type="text" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonDias">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <form class="form-search float-end">
                                                    <div class="input-group">
                                                        <p class="card-text">
                                                            <input class="form-control" maxlength="128"
                                                                id="txtBuscarDiasTranscurridos"
                                                                onkeyup="buscarDiasTranscurridos()" placeholder="Buscar"
                                                                size="15" type="text" />
                                                        </p>
                                                    </div>
                                                </form>
                                            </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input class="form-control" pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                    maxlength="128" placeholder="Buscar" size="15" type="text"
                                                    id="txtBuscarFechaInicio" onkeyup="buscarFechaInicio()" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonFechas">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input class="form-control" maxlength="128" placeholder="Buscar"
                                                    size="15" type="text" id="txtBuscarSiniestro"
                                                    onkeyup="buscarSiniestro()" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input class="form-control" maxlength="128" placeholder="Buscar"
                                                    size="15" type="text" onkeyup="buscarPoliza()"
                                                    id="txtBuscarPoliza" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input class="form-control" maxlength="128" placeholder="Buscar"
                                                    size="15" type="text" onkeyup="buscarAsegurado()"
                                                    id="txtBuscarAsegurado" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="col" name="SearchButtonGeneral">
                                        <!--se implementa el boton busqueda general-->
                                        <form class="form-search float-end">
                                            <div class="input-group">
                                                <input class="form-control" maxlength="128" placeholder="Buscar"
                                                    size="15" type="text" onkeyup="buscarEstatusCaso()"
                                                    id="txtBuscarEstatusCaso" />
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </div>
                            </tr>

                    </table>
                    <!--se recupera el id para llenar resultados de la tabla-->
                    <div>
                        <table
                            class="tablasPrincipales text-center table table-striped align-middle table-responsive table-hover col float-end text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Id registro</th>
                                    <th scope="col">Dias sin responder</th>
                                    <th scope="col">Fecha cliente</th>
                                    <th scope="col">Siniestro</th>
                                    <th scope="col">Poliza</th>
                                    <th scope="col">Asegurado</th>
                                    <th scope="col">Estatus caso</th>
                                </tr>
                            </thead>
                            <tbody id="TablaPGeneral">
                                <div id="ResultadoAjax" class="row p-2">

                                </div>

                            </tbody>
                        </table>
                    </div>

                    <!--final del llendo e la tabla con ajax-->
                    <p style="display: none" id="paginaActual" name="uno">1</p>
                    <div class="row">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" id="botonClickMenos" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" id="botonClickMas" href="#" aria-label="Next">
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

    <!-- Modal para actualizacion de datos -->
    <div class="modal fade" name="nombreModal" id="despliegueInfo" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="letreroCedula modal-header">
                    <h5 class="col-9 modal-title" id="staticBackdropLabel">Actualiza
                        Cedula SOLERA
                    </h5>
                    <div class="col-2 imgSoleraTitulo">
                        <img src="./Imagenes Solera/solera_white.png" alt="ImagenSolera" width="130px" height="32">
                    </div>
                    <button type="button" class="col-1 btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--Botnoes de edtiar-->
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn " for="btnradio1">Editar</label>

                        <button type="button" onclick="mostrarDocsAprobados()" id="btnDocsMostrar" class="btn"
                            data-bs-toggle="modal" data-bs-target="#cargaDocumentos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                        </button>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label id="encuestaBtn" class="btn btn-outline-primary" for="btnradio3"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-journal" viewBox="0 0 16 16">
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                            </svg></label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio4"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg></label>

                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalVideo">
                            Camara
                        </button>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off">
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
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
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
                        <form id="GuardarDatosAsegurado">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        Expediente
                                    </button>
                                </h2>

                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row mx-md-n5">
                                            <div class="col px-md-5">
                                                <div class="calendario date" id="datepicker2">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-calendar-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        Fecha Carga
                                                    </label>
                                                    <input class="input-group-append" id="fechaCarga"
                                                        pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]" name="txtFechaCarga"
                                                        type="text" placeholder="Fecha">
                                                </div>
                                            </div>
                                            <div class="col px-md-5">
                                                <div class="input-group-sm input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Siniestro:
                                                    </label>
                                                    <input id="numSiniestro" pattern="[SIN]{3}[0-8]{8}" type="text"
                                                        class="form-control" name="txtNumSiniestro">
                                                </div>
                                            </div>
                                            <div class="col px-md-5">
                                                <div class="input-group-sm input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Poliza:
                                                    </label>
                                                    <input id="poliza" type="text" class="form-control"
                                                        name="txtNumPoliza">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mx-md-n5">
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Afectado
                                                    </label>
                                                    <select id="afectado" class="form-select" name="txtAfectado">
                                                        <option selected>
                                                            Selecciona...
                                                        </option>
                                                        <option value="A">A</option>
                                                        <option value="T">T</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Tipo caso:
                                                    </label>
                                                    <select id="tipoDeCaso" class="form-select" name="txtTipoCaso">
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
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Cobertura:

                                                    </label>
                                                    <select id="cobertura" class="form-select" name="txtCobertura">
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
                                        </div>
                                        <div class="row mx-md-n5">
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 calendario date" id="datepicker2">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-calendar-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        Fecha Siniestro
                                                    </label>
                                                    <input class="input-group-append" id="fechaSiniestro"
                                                        pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]"
                                                        name="txtFechaSiniestro" type="text" placeholder="Fecha">
                                                </div>
                                            </div>
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Datos Audatex

                                                    </label>
                                                    <input id="datosAudatex" type="text" class="form-control"
                                                        name="txtDatosAudatex">
                                                </div>
                                            </div>
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Estado
                                                    </label>
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
                                        </div>
                                        <div class="row mx-md-n5">
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Ciudad

                                                    </label>
                                                    <select id="ciudad" class="form-select" name="txtCiudad" required>
                                                        <option selected>
                                                            Selecciona...
                                                        </option>
                                                        <option value="Todos-Ninguna">
                                                            Todos-Ninguna</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Region
                                                    </label>
                                                    <select class="form-select" id="region">
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
                                                        <option
                                                            value="Layout ZG Layout ZG C: Puebla-Queretaro-Tlaxcala">
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
                                                        <option
                                                            value="Layout ZG G: Coatzacualcos-Oaxaca-Veracruz-Xalapa">
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
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Taller

                                                    </label>
                                                    <input id="ubicacionTaller" type="text" class="form-control"
                                                        name="txtUbicacionTaller">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  mx-md-n5">
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Financiado
                                                    </label>
                                                    <select id="financiado" class="form-select" name="txtFinanciado">
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
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Regimen

                                                    </label>
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
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Password Externo:

                                                    </label>
                                                    <input id="passwordExterno" type="text" class="form-control"
                                                        name="txtPassExterno">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mx-md-n5">
                                            <div class="col px-md-5">
                                                <div class="input-group-sm mb-3 input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Estatus:

                                                    </label>
                                                    <select id="estatusCliente" class="form-select" name="txtEstatus"
                                                        required>
                                                        <option selected>
                                                            Selecciona...
                                                        </option>
                                                        <option value="Documento incorrecto">
                                                            Documento incorrecto
                                                        </option>
                                                        <option value="revision">
                                                            revision
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
                                            <div class="col px-md-5">
                                                <input id="comentariosCliente" type="text" class="form-control"
                                                    name="txtComentariosCliente" id="exampleFormControlInput1"
                                                    placeholder="Comentarios">
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
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row 1">
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Marca:
                                                </label>
                                                <input id="marca" type="text" class="form-control"
                                                    name="txtMarcaVehiculo">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Tipo:
                                                </label>
                                                <input id="tipo" type="text" class="form-control"
                                                    name="txtTipoVehiculo">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Año:
                                                </label>
                                                <input id="modelo" type="text" class="form-control" name="txtAño">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Placas:
                                                </label>
                                                <input id="placas" type="text" class="form-control" name="txtPlacas">
                                            </div>
                                        </div>
                                        <div class="row 2">
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    No. Serie:
                                                </label>
                                                <input id="numSerie" type="text" class="form-control"
                                                    name="txtNumSerie">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Valor indemnizacion:
                                                </label>
                                                <input id="valIndemnizacion" type="text" class="form-control"
                                                    name="txtValorIndemnizacion">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Valor comercial:
                                                </label>
                                                <input id="valComercial" type="text" class="form-control"
                                                    name="txtValorComercial">
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
                                <div id="flush-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row 1">
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Asegurado:
                                                </label>
                                                <input id="asegurado" type="text" class="form-control"
                                                    name="txtAsegurado">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Correo:
                                                </label>
                                                <input id="correo" type="text" class="form-control" name="txtCorreo">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Telefono Principal:
                                                </label>
                                                <input id="telPrincipal" type="text" class="form-control"
                                                    name="txtTelefono">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Telefono Secundario:
                                                </label>
                                                <input id="telSecundario" type="text" class="form-control"
                                                    name="txtTelSecundario">
                                            </div>
                                        </div>
                                        <div class="row 2">
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Contacto:
                                                </label>
                                                <input id="contacto" type="text" class="form-control"
                                                    name="txtContacto">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Correo Contacto:
                                                </label>
                                                <input id="correoContacto" type="text" class="form-control"
                                                    name="txtCorreoContato">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Telefono Contacto:
                                                </label>
                                                <input id="telContacto" type="text" class="form-control"
                                                    name="txtTelContacto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="idOculto" name="idEditableActual" value="">
                            <!--centrar texto con esta funcion-->
                            <div style="text-align: center">
                                <button id="gDatosBtn" onclick="GuardarRegistros()" class="m-2 btn btn-info">
                                    Guardar Datos
                                </button>
                            </div>
                        </form>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="txtSegEstatus">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFive" aria-expanded="false"
                                    aria-controls="flush-collapseFive">
                                    Seguimiento estatus
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <table class="table table-hover col float-end text-center">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>fecha</th>
                                                <th>Tipo</th>
                                                <th>Comentario</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaSegEstatus">

                                        </tbody>
                                    </table>
                                    <div id="datosSeguimiento">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">C</span>
                                            <input id="txtComentSeguimiento" type="text" class="form-control"
                                                placeholder="Comentarios" aria-label="Username"
                                                aria-describedby="basic-addon1">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Estacion
                                                    </label>
                                                    <select class="form-select" id="txtEstacion">
                                                        <option selected>Selecciona...
                                                        </option>
                                                        <option value="Cancelado">Cancelado
                                                        </option>
                                                        <option value="Marcacion">Marcacion
                                                        </option>
                                                        <option value="Nuevo">Nuevo</option>
                                                        <option value="Proceso">Proceso
                                                        </option>
                                                        <option value="Terminado">Terminado
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                            fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        Estatus Seguimiento
                                                    </label>
                                                    <select class="form-select" id="txtEstatusSeguimiento">
                                                        <option selected>Selecciona...
                                                        </option>
                                                        <option value="Con contacto sin documentos">
                                                            Con contacto sin documentos
                                                        </option>
                                                        <option value="Datos incorrectos">
                                                            Datos incorrectos</option>
                                                        <option value="De 1 a 3 documentos">
                                                            De 1 a 3 documentos</option>
                                                        <option value="De 4 a 6 documentos">
                                                            De 4 a 6 documentos</option>
                                                        <option value="De 7 a 10 documentos">De
                                                            7 a 10 documentos</option>
                                                        <option value="Nuevo2">Nuevo
                                                        </option>
                                                        <option value="Sin Contacto">Sin
                                                            Contacto</option>
                                                        <option value="Sin contacto en 30 dia2">
                                                            Sin contacto en 30 dia</option>
                                                        <option value="Total de documentos">
                                                            Total de documentos</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Sub Estatus
                                                </label>
                                                <select class="form-select" id="txtSubEstatus">
                                                    <option selected>Selecciona...</option>
                                                    <option value="En seguimiento">En seguimiento
                                                    </option>
                                                    <option value="Cancelado">Cancelado
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Respuesta
                                                </label>
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
                                        <div class="row">
                                            <div class="col input-group mb-3">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Persona contactada</label>
                                                <input id="txtPersContactada" type="text" class="form-control"
                                                    placeholder="Mensaje" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group mb-3 col">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                        fill="currentColor" class="bi bi-plus-square-fill p-1"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Tipo persona
                                                </label>
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
                                                <select class="form-select" id="txTipoContacto">
                                                    <option selected>Selecciona...</option>
                                                    <option value="Si">Si</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="calendario date" id="datepicker2">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-calendar-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        Primer envio de documentos
                                                    </label>
                                                    <input class="input-group-append" id="txtFechaPrimEnvDocs"
                                                        pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]" name="txtFechaTermino"
                                                        type="text" placeholder="Fecha" disabled>
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <div class="calendario date" id="datepicker2">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-calendar-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        Integracion de expediente
                                                    </label>
                                                    <input class="input-group-append" id="txtFechaIntExp"
                                                        pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]" name="txtFechaTermino"
                                                        type="text" placeholder="Fecha">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="calendario date" id="datepicker2">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-calendar-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        Facturacion de servicio
                                                    </label>
                                                    <input class="input-group-append" id="txtFechaFactServ"
                                                        pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]" name="txtFechaTermino"
                                                        type="text" placeholder="Fecha">
                                                </div>
                                            </div>
                                            <div class="col mb-3">
                                                <div class="calendario date" id="datepicker2">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-calendar-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        Termino
                                                    </label>
                                                    <input class="input-group-append" id="txtFechaTermino"
                                                        pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]" name="txtFechaTermino"
                                                        type="text" placeholder="Fecha">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="fSeguimientoClass col mb-3">
                                                <div class="calendario date" id="datepicker2">
                                                    <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                            fill="currentColor" class="bi bi-calendar-check"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                        </svg>
                                                        Seguimiento
                                                    </label>
                                                    <input class="input-group-append" id="txtFechaSeguimiento"
                                                        pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]" name="txtFechaTermino"
                                                        type="text" placeholder="Fecha">
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
                                                <select class="form-select" id="txtEstatus">
                                                    <option selected>Selecciona...
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="fSeguimientoClass col mb-3">
                                            <div class="calendario date" id="datepicker2">
                                                <label class="input-group-text fw-bold" for="inputGroupSelect01">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-calendar-check"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                        <path
                                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                    </svg>
                                                    Fecha asignacion
                                                </label>
                                                <input class="input-group-append" id="fechaContactoCliente"
                                                    pattern="[0-9]{4}[-][0-9]{2}[-][0-9][2]" name="txtFechaTermino"
                                                    type="text" placeholder="Fecha">
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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

    <!-- Modal Documentos-->
    <div class="modal fade" id="cargaDocumentos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Carga de Documentos
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="progress">
                            <div id="progresoDocsAprobados" class="progress-bar" role="progressbar"
                                aria-label="Example with label" style="width: 50%; height: 20px;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div>
                    </div>

                    <div class="accordion" id="documentosAprobadosPanel">
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
                                                        <option id="selectPoder" value="Poder notarial">Poder notarial
                                                        </option>
                                                        <option id="selectIdenti" value="Identificacion oficial">
                                                            Identificacion oficial
                                                        </option>
                                                        <option id="selectConstancia" value="Constancia SF">Constancia
                                                            SF</option>
                                                        <option id="selectCurp" value="Curp">Curp</option>
                                                        <option id="selectEstado" value="Estado de cuenta">Estado de
                                                            cuenta</option>
                                                        <option id="selectTenencia" value="Tenencias">Tenencias</option>
                                                        <option id="selectbaja" value="Baja de placas">Baja de placas
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
                                            <input name="fkImagenes" id="fkIdOculto" type="hidden" value="idGenerico">
                                            <div class="row">
                                                <div class="col-12 p-2" style="text-align: center">
                                                    <button id="btnSubirDoc" type="submit" name="accion" value="agregar"
                                                        class="btn btn-warning">Subir
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
                                    <img id="docSeleccionado" src="" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-target="#staticBackdrop"
                        data-bs-toggle="modal">Cerrar</button>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Camara</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div>
                            <img name="falseVideo" id="mostrarimagen64" src="" alt="">
                        </div>
                        <div>
                            <select name="tipoArchivo" id="nombreDocVideo" class="form-select form-select-sm"
                                aria-label="Default select example">
                                <option selected>Selecciona...</option>
                                <option value="Factura original">Factura original</option>
                                <option value="Poder notarial">Poder notarial</option>
                                <option value="Identificacion oficial">Identificacion oficial</option>
                                <option value="Constancia SF">Constancia SF</option>
                                <option value="Curp">Curp</option>
                                <option value="Estado de cuenta">Estado de cuenta</option>
                                <option value="Tenencias">Tenencias</option>
                                <option value="Baja de placas">Baja de placas</option>
                                <option value="Tarjeta de circulacion">Tarjeta de circulacion</option>
                                <option value="Poliza">Poliza</option>
                                <option value="Comprobante de domicilio">Comprobante de domicilio</option>
                            </select>
                            <button onclick="">
                                guardar Imagen
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>