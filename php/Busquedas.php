<?php
include "./FuncionesSQL.php";
include "./FuncionesExportar.php";
$filtro = $_POST['filtro'];
$accion = $_POST['accion'];
$columna = $_POST['columna'];
switch ($accion) {
    case "BusquedaGeneral": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from infosiniestro, docsaprobadosatlas, infoauto, estadoproceso where fkDocsAtlas=idRegistro and"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and (idRegistro like '%$filtro%' "
                . " or numSiniestro like '%$filtro%' or poliza like '%$filtro%' or marca like '%$filtro%' or modelo like '%$filtro%'"
                . " or numSerie like '%$filtro%' or fechaCarga like '%$filtro%' or estacionProceso like '%$filtro%' or estatusOperativo like '%$filtro%'"
                . " or porcentajeTotal like '%$filtro%' or porcentajeDocs like '%$filtro%')";
            ConsultasSelect($sql);
        }
        break;

    case "Busqueda": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and $columna like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
}
