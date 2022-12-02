<?php
include "./FuncionesSQL.php";
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

    case "BusquedaId": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and $columna like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaSiniestro": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and numSiniestro like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaPoliza": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and poliza like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaMarca": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and marca like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaTipo": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and modelo like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaSerie": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and numSerie like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaFecha": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and fechaCarga like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaEstacion": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and estacionProceso like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaEstatus": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and estatusOperativo like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaDocs": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and porcentajeDocs like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaTotal": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and porcentajeTotal like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
    case "BusquedaEstado": {
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
                . " idRegistro= fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and estado like '%$filtro%'";
            ConsultasSelect($sql);
        }
        break;
}
