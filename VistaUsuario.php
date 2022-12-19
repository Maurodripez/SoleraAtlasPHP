<?php
session_start();    
if (!isset($_SESSION['usuarioExterno'])) {
header('Location: ../LoginUsuarios.html');
}
?>
<!DOCTYPE html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="./Estilos/controlImagenes.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="./js/jquery-3.6.1.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>

<body class="p-2">
    <?php 
    $id = $_GET["id"];
    ?>
    <p id="sesionActual" style="display: none;"><?php echo $id;?></p>
    <div>
        <nav class="navbar bg-light">
            <div class="col container-fluid">
                <span class="navbar-brand mb-0 h1">
                    Centro de control para usuarios
                </span>
            </div>
            <div class="col">
                <button type="button" id="btnModalMensajes" class="btn" data-bs-toggle="modal"
                    data-bs-target="#modalMensajes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#ffffff"
                        class="bi bi-chat-dots" viewBox="0 0 16 16">
                        <path
                            d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        <path
                            d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                    </svg>
                </button>
            </div>
        </nav>
    </div>
    <div class="row pt-3">
        <div class="card text-center text-bg-info">
            <div class="iconos">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-check2"
                    viewBox="0 0 16 16">
                    <path
                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                </svg>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Confirmar Informacion</h5>
                <p class="card-text">Confirma si todos tus datos son correctos</p>
                <!-- Button trigger modal -->
                <button id="traerDatos" class="btn" data-bs-toggle="modal" data-bs-target="#modalConfirmarDocs">
                    Confirmar
                </button>
            </div>
        </div>
        <div class="card text-center text-bg-success">
            <div class="iconos">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                    <path
                        d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z" />
                    <path
                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                </svg>
            </div>
            <div class="card-body">
                <h5 class="card-title">Subir documentos</h5>
                <p class="card-text">Sube tus documentos</p>
                <div class="p-3">
                    <button id="btnCargaDocumentos" type="button" class="btn" data-bs-toggle="modal"
                        data-bs-target="#modalDocumentos">
                        Documentos
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-lg" id="modalMensajes" tabindex="-1" aria-labelledby="modalMensajesLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalMensajesLabel">
                        Centro de mensajes
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="letreroMensaje" class="mb-3 text-center">
                        <label for="comentarios" class="form-label">
                            Escribe el mensaje que quieres enviar
                        </label>
                        <textarea type="text" class="form-control" id="comentarios" rows="3" minlength="5"></textarea>
                    </div>
                    <button id="EnviarComentario" onclick="GuardarComent()" type="button" class="btn">
                        Enviar
                    </button>
                    <label id="EnviarMensError"></label>
                    <table id="DatosTabla"
                        class="table table-striped align-middle table-responsive table-hover col float-end text-center">
                        <thead>
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Comentario</th>
                            </tr>
                        </thead>
                        <tbody id="Tablamensajes"></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-lg" id="modalDocumentos" tabindex="-1" aria-labelledby="modalDocumentosLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDocumentosLabel">
                        Documentos
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="accordion" id="accordionDocumentos">
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" value="factura" id="btnFactura"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#factura"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        Factura
                                    </button>
                                </h2>
                                <div id="factura" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                    <div id="imagenFactura" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputFactura" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gFactura" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgFactura">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulFactura','Factura')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseFactura" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseFactura">
                                                <div class="card card-body">
                                                    <ul id="ulFactura" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameFactura" src="" alt="">

                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button value="secuencia Facturas" id="btnSecuencia"
                                        class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#secuenciaFacturas" aria-expanded="false">
                                        Secuencia de facturas
                                    </button>
                                </h2>
                                <div id="secuenciaFacturas" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo">
                                    <div id="imagenSecuencia" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputSecuencia" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gSecuencia" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgSecuencia">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulSecuencia','Secuencia de facturas')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseSecuencia" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseSecuencia">
                                                <div class="card card-body">
                                                    <ul id="ulSecuencia" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameSecuencia" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Certificado Propiedad" id="btnCertificado"
                                        class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#certificadoPropiedad" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Certificado Propiedad
                                    </button>
                                </h2>
                                <div id="certificadoPropiedad" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree">
                                    <div id="imagenCertificado" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputCertificado" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gCertificado" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm"
                                                    id="imgCertificado">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulCertificado','Certificado Propiedad')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseCertificado" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseCertificado">
                                                <div class="card card-body">
                                                    <ul id="ulCertificado" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameCertificado" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Copia Certificado Propiedad" id="btnCopiaCertificado"
                                        class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#copiaCertificadoPropiedad" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Copia certificado propiedad
                                    </button>
                                </h2>
                                <div id="copiaCertificadoPropiedad" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree">
                                    <div id="imagenCopiaCertificado" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputCopiaCertificado" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gCopiaCertificado"
                                                    type="submit" class="botonGuardar btn btn-success col-2 btn-sm"
                                                    id="imgCopiaCertificado">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulCopiaCertificado','Copia certificado propiedad')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseCopiaCertificado" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseCopiaCertificado">
                                                <div class="card card-body">
                                                    <ul id="ulCopiaCertificado" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameCopiaCertificado" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Pedimento de Importacion" id="btnImportacion"
                                        class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#Importacion" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Pedimento de Importacion
                                    </button>
                                </h2>
                                <div id="Importacion" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree">
                                    <div id="imagenImportacion" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputPedimento" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gFactura" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm"
                                                    id="imgImportacion">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulPedimento','Pedimento de Importacion')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapsePedimento" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapsePedimento">
                                                <div class="card card-body">
                                                    <ul id="ulPedimento" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameImportacion" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Baja de permiso de internacion" id="btnPermiso"
                                        class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#Permiso" aria-expanded="false" aria-controls="collapseThree">
                                        Baja de permiso de internacion
                                    </button>
                                </h2>
                                <div id="Permiso" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                    <div id="imagenPermiso" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputBajaPermiso" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gPermiso" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgPermiso">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulBajaPermiso','Baja de permiso de internacion')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseBajaPermiso" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseBajaPermiso">
                                                <div class="card card-body">
                                                    <ul id="ulBajaPermiso" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFramePermiso" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="R.F.V." id="btnRFV" class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#RFV" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        R.F.V.
                                    </button>
                                </h2>
                                <div id="RFV" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                    <div id="imagenRFV" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file" id="inputRFV"
                                                    multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gRFV" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgRFV">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura" onclick="mostrarImagenFrame('ulRFV','R.F.V.')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseRFV" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseRFV">
                                                <div class="card card-body">
                                                    <ul id="ulRFV" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameRFV" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Verificacion" id="btnVerificacion" class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#verificacion"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Verificacion
                                    </button>
                                </h2>
                                <div id="verificacion" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree">
                                    <div id="imagenVerificacion" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputVerificacion" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gVerificacion"
                                                    type="submit" class="botonGuardar btn btn-success col-2 btn-sm"
                                                    id="imgVerificacion">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulVerificacion','Verificacion')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseVerificacion" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseVerificacion">
                                                <div class="card card-body">
                                                    <ul id="ulVerificacion" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameVerificacion" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Tenencias" id="btnTenencias" class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#tenencias"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Tenencias
                                    </button>
                                </h2>
                                <div id="tenencias" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                    <div id="imagenTenencias" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputTenencias" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gTenencias" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgTenencias">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulTenencias','Tenencias')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseTenencias" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseTenencias">
                                                <div class="card card-body">
                                                    <ul id="ulFactura" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameTenencia" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Baja" id="btnBaja" class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#baja" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Baja de placas
                                    </button>
                                </h2>
                                <div id="baja" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                    <div id="imagenBaja" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file" id="inputPlacas"
                                                    multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gBaja" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgBaja">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulPlacas','Baja de placas')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapsePlacas" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapsePlacas">
                                                <div class="card card-body">
                                                    <ul id="ulPlacas" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameBaja" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="FacturaMotor" id="btnFacturaMotor" class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#FacturaMotor"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Factura del motor
                                    </button>
                                </h2>
                                <div id="FacturaMotor" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree">
                                    <div id="imagenFacturaMotor" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputFacturaMotor" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gFacturaMotor"
                                                    type="submit" class="botonGuardar btn btn-success col-2 btn-sm"
                                                    id="imgFacturaMotor">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulMotor','Factura del motor')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseMotor" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseMotor">
                                                <div class="card card-body">
                                                    <ul id="ulMotor" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameFacturaMotor" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Llaves" id="btnLlaves" class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#Llaves"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Llaves
                                    </button>
                                </h2>
                                <div id="Llaves" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                    <div id="imagenLlaves" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file" id="inputLlaves"
                                                    multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gFacturaMotor"
                                                    type="submit" class="botonGuardar btn btn-success col-2 btn-sm"
                                                    id="imgLlaves">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulLlaves','Llaves')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseLlaves" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseLlaves">
                                                <div class="card card-body">
                                                    <ul id="ulLlaves" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameLlaves" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Formato conoce a tu cliente" id="btnConoce"
                                        class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#Conoce" aria-expanded="false" aria-controls="collapseThree">
                                        Formato conoce a tu cliente
                                    </button>
                                </h2>
                                <div id="Conoce" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                    <div id="imagenConoce" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputFormato" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gConoce" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgConoce">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulConoce','Formato conoce a tu cliente')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseConoce" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseConoce">
                                                <div class="card card-body">
                                                    <ul id="ulConoce" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameConoce" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="LFPDPPP" id="btnLFPDPPP" class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#LFPDPPP"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Consentimiento LFPDPPP
                                    </button>
                                </h2>
                                <div id="LFPDPPP" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                    <div id="imagenLFPDPPP" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputConsentimiento" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gLFPDPPP" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgLFPDPPP">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulLFPDPPP','Consentimiento LFPDPPP')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseLFPDPPP" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseLFPDPPP">
                                                <div class="card card-body">
                                                    <ul id="ulLFPDPPP" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameLFPDPPP" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Averiguacion" id="btnAveriguacion" class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#Averiguacion"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Averiguación previa
                                    </button>
                                </h2>
                                <div id="Averiguacion" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree">
                                    <div id="imagenAveriguacion" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputAveriguacion" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gAveriguacion"
                                                    type="submit" class="botonGuardar btn btn-success col-2 btn-sm"
                                                    id="imgAveriguacion">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulAveriguación','Averiguación previa')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseAveriguación" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseAveriguación">
                                                <div class="card card-body">
                                                    <ul id="ulAveriguación" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameAveriguacion" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Acreditacion" id="btnAcreditacion" class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#Acreditacion"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Acreditacion de propiedad
                                    </button>
                                </h2>
                                <div id="Acreditacion" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree">
                                    <div id="imagenAcreditacion" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputAcreditacion" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gAcreditacion"
                                                    type="submit" class="botonGuardar btn btn-success col-2 btn-sm"
                                                    id="imgAcreditacion">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulAcreditacion','Acreditacion de propiedad')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseAcreditacion" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseAcreditacion">
                                                <div class="card card-body">
                                                    <ul id="ulAcreditacion" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameAcreditacion" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Aviso" id="btnAviso" class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#Aviso" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Aviso a PFP
                                    </button>
                                </h2>
                                <div id="Aviso" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                    <div id="imagenAviso" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file" id="inputAviso"
                                                    multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gAviso" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgAviso">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulPFP','Aviso a PFP')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapsePFP" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapsePFP">
                                                <div class="card card-body">
                                                    <ul id="ulPFP" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameAviso" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Otros" id="btnOtros" class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#Otros" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Otros
                                    </button>
                                </h2>
                                <div id="Otros" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                    <div id="imagenOtros" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file" id="inputOtros"
                                                    multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gOtros" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgOtros">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura" onclick="mostrarImagenFrame('ulOtros','Otros')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseOtros" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseOtros">
                                                <div class="card card-body">
                                                    <ul id="ulOtros" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameOtros" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="Oficio" id="btnOficio" class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#Oficio"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Oficio de liberacion
                                    </button>
                                </h2>
                                <div id="Oficio" class="accordion-collapse collapse" aria-labelledby="headingThree">
                                    <div id="imagenOficio" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputLiberacion" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gOficio" type="submit"
                                                    class="botonGuardar btn btn-success col-2 btn-sm" id="imgOficio">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>
                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulLiberacion','Oficio de liberacion')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseLiberacion" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseLiberacion">
                                                <div class="card card-body">
                                                    <ul id="ulLiberacion" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameOficio" src="" alt="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button value="OficioCancelacion" id="btnOficioCancelacion"
                                        class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#OficioCancelacion" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Oficio de cancelacion del robo
                                    </button>
                                </h2>
                                <div id="OficioCancelacion" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree">
                                    <div id="imagenOficioCancelacion" class="accordion-body">
                                        <div class="row">
                                            <div class="file-select botonCargarDoc col-8">
                                                <input class="form-control form-control-sm" type="file"
                                                    id="inputCancelacion" multiple="" />
                                            </div>
                                            <div class="btn-group col-4" role="group">
                                                <button onclick="subirImagen(this.id)" name="gOficioCancelacion"
                                                    type="submit" class="botonGuardar btn btn-success col-2 btn-sm pr-1"
                                                    id="imgOficioCancelacion">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-cloud-arrow-up"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                                        <path
                                                            d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                                    </svg>

                                                </button>
                                                <a id="btnListaFactura"
                                                    onclick="mostrarImagenFrame('ulCancelacion','Oficio de cancelacion del robo')"
                                                    class="btn btn-primary col-2 btn-sm" data-bs-toggle="collapse"
                                                    href="#collapseCancelacion" role="button" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="collapse" id="collapseCancelacion">
                                                <div class="card card-body">
                                                    <ul id="ulCancelacion" class="list-group">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img id="iFrameOficioCancelacion" src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="modalConfirmarDocs" tabindex="-1" aria-labelledby="modalConfirmarDocsLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalConfirmarDocsLabel">Confirmacion de datos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col p-2 checkinformacion">
                        <div class="row nombreYChecks">
                            <div class="col">
                                <label class="input-group fw-bold">
                                    Siniestro
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group m-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="siniestro" id="sinCorrecto"
                                            value="option1">
                                        <label class="form-check-label" for="inlineRadio1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="siniestro" id="sinIncorrecto"
                                            value="option2">
                                        <label class="form-check-label" for="inlineRadio2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input id="txtSiniestro" readonly type="text" class="form-control"
                                aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div class="col p-2 checkinformacion">
                        <div class="row nombreYChecks">
                            <div class="col">
                                <label class="input-group fw-bold">
                                    Poliza
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group m-1">
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="poliza"
                                                id="polizaCorrecto" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="poliza"
                                                id="polizaIncorrecto" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input id="txtPoliza" readonly type="text" class="form-control"
                                aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div class="col p-2 checkinformacion">
                        <div class="row nombreYChecks">
                            <div class="col">
                                <label class="input-group fw-bold" for="inputGroupSelect01">
                                    Nombre
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group m-1">
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="nombre"
                                                id="nombreCorrecto" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="nombre"
                                                id="nombreIncorrecto" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input id="txtNombre" readonly type="text" class="form-control"
                                aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div class="col p-2 checkinformacion">
                        <div class="row nombreYChecks">
                            <div class="col">
                                <label class="input-group fw-bold" for="inputGroupSelect01">
                                    Telefono
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group m-1">
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="telefono"
                                                id="telefonoCorrecto" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="telefono"
                                                id="telefonoIncorrecto" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input id="txtTelefono" readonly type="text" class="form-control"
                                aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div class="col p-2 checkinformacion">
                        <div class="row nombreYChecks">
                            <div class="col">
                                <label class="input-group fw-bold" for="inputGroupSelect01">
                                    Correo
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group m-1">
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="correo"
                                                id="CorreoCorrecto" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="correo"
                                                id="CorreoIncorrecto" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input id="txtCorreo" readonly type="text" class="form-control"
                                aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div class="col p-2 checkinformacion">
                        <div class="row nombreYChecks">
                            <div class="col">
                                <label class="input-group fw-bold" for="inputGroupSelect01">
                                    Auto
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group m-1">
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="auto" id="AutoCorrecto"
                                                value="option1">
                                            <label class="form-check-label" for="inlineRadio1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="auto" id="AutoIncorrecto"
                                                value="option2">
                                            <label class="form-check-label" for="inlineRadio2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input id="txtAuto" readonly type="text" class="form-control"
                                aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div class="col p-2 checkinformacion">
                        <div class="row nombreYChecks">
                            <div class="col">
                                <label class="input-group fw-bold" for="inputGroupSelect01">
                                    Fecha del Siniestro
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group m-1">
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fechaSin"
                                                id="fechaSinCorrecto" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fechaSin"
                                                id="fechaSinIncorrecto" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input id="txtFecha" readonly type="text" class="form-control"
                                aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div class="col p-2 checkinformacion">
                        <div class="row nombreYChecks">
                            <div class="col">
                                <label class="input-group fw-bold" for="inputGroupSelect01">
                                    Modelo de auto
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group m-1">
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipoAuto"
                                                id="tipoAutoCorrecto" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipoAuto"
                                                id="tipoAutoIncorrecto" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input id="txtTipo" readonly type="text" class="form-control"
                                aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div class="col p-2 checkinformacion">
                        <div class="row nombreYChecks">
                            <div class="col">
                                <label class="input-group fw-bold" for="inputGroupSelect01">
                                    Número de serie
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group m-1">
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="serie" id="serieCorrecto"
                                                value="option1">
                                            <label class="form-check-label" for="inlineRadio1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="serie"
                                                id="serieIncorrecto" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input id="txtSerie" readonly type="text" class="form-control"
                                aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div class="col p-2 checkinformacion">
                        <div class="row nombreYChecks">
                            <div class="col">
                                <label class="input-group fw-bold" for="inputGroupSelect01">
                                    Placas
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group m-1">
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="placasCorrecto" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="placasIncorrecto" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input id="txtPlacas" readonly type="text" class="form-control"
                                aria-label="Text input with checkbox">
                        </div>
                    </div>
                    <div style="text-align: center">
                        <button id="btnConfirmarDatos" class="btn btn-info">
                            Confirmar
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-4 text-center">
        <h2 class="pb-2">Progreso de expediente</h2>
        <div class="col progress" style="height: 20px;">
            <div id="progresoDocs" class="progress-bar bg-success" role="progressbar" style="width: 25%"
                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="./js/DatosUsuario.js"></script>
</body>

</html>