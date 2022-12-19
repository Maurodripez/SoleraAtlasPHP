<?php
session_start();    
if (!isset($_SESSION['usuario'])) {
header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../js/fullcalendar/fullcalendar.min.css" />
    <link rel="stylesheet" href="./css/Citas.css" />
    <script src="../js/fullcalendar/lib/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="../js/fullcalendar/lib/moment.min.js"></script>
    <script src="../js/fullcalendar/fullcalendar.min.js"></script>
    <script src="../js/fullcalendar/locale/es.js"></script>

</head>

<body>
    <div class="encabezado">
        <h1>Citas</h1>
    </div>
    <p id="idCitaActual" style="display: none;">El id</p>
    <div id='calendar'></div>
    <!-- Modal -->
    <div class="modal fade" id="ModalEventos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label for="txtFecha" class="form-label">Fecha</label>
                                <input type="text" class="form-control" id="txtFecha">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="txtTitulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control" id="txtTitulo">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label for="txtHoraInicio" class="form-label">Hora de inicio</label>
                                <select id="txtHoraInicio" class="selectpicker" data-live-search="true">
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                </select>

                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="txtHoraFinal" class="form-label">Hora final</label>
                                <select id="txtHoraFinal" class="selectpicker" data-live-search="true">
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="txtInfoAdicional" class="form-label">Informacion adicional</label>
                        <textarea class="form-control" id="txtInfoAdicional" rows="3" value="Ninguna"></textarea>
                    </div>
                    <div class="row">
                        <div class="col mb-2">
                            <label for="txtAsesor" class="form-label">Asesor</label>
                            <select id="txtAsesor" class="form-select mb-3 form-select-sm"
                                aria-label=".form-select-lg example">
                                <option selected>Asesor</option>
                            </select>
                        </div>
                        <div class="col mb-2">
                            <label for="txtColor" class="form-label">Color</label>
                            <div>
                                <select id="txtColor" name="opciones">
                                    <option value="#ff0000" class="rojo">Rojo</option>
                                    <option value="#0066ff" class="azul">azul</option>
                                    <option value="#009900" class="verde">Verde</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <label for="txtSiniestro" class="form-label">Siniestro</label>
                            <input type="text" class="form-control" id="txtSiniestro" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button id="btnGuardarCita" type="button" class="btn btn-primary">Guardar Cita</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalMostrarInfoEvento" tabindex="-1" aria-labelledby="ModalMostrarInfoEventoLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalMostrarInfoEventoLabel">Informacion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label for="txtInfoFecha" class="form-label">Fecha</label>
                                <input type="text" class="form-control" id="txtInfoFecha" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="txtInfoTitulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control" id="txtInfoTitulo" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label for="txtInfoHoraInicio" class="form-label">Hora de inicio</label>
                                <input type="text" class="form-control" id="txtInfoHoraInicio" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="txtInfoHoraFinal" class="form-label">Hora final</label>
                                <input type="text" class="form-control" id="txtInfoHoraFinal" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="txtInfoInfoAdicional" class="form-label">Informacion adicional</label>
                        <textarea class="form-control" id="txtInfoInfoAdicional" rows="3" value="Ninguna" readonly></textarea>
                    </div>
                    <div class="row">
                        <div class="col mb-2">
                            <label for="txtInfoAsesor" class="form-label">Asesor</label>
                                <input type="text" class="form-control" id="txtInfoAsesor" readonly>
                        </div>
                        <div class="col pt-4">
                            <p>
                                <a id="desplegarInfoAdicional" class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#listaInfoAdicional"
                                    role="button" aria-expanded="false" aria-controls="listaInfoAdicional">
                                    Informacion adicional
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="collapse" id="listaInfoAdicional">
                        <div class="card card-body">
                            <ul id="ulListaInfo" class="list-group list-group-flush">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
    <script src="./js/Citas.js"></script>
</body>

</html>