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
    case "BusquedaFechasyMas": {
            $fechaCargaInicio = $_POST["fechaCargaInicio"];
            $fechaCargaFinal = $_POST["fechaCargaFinal"];
            $fechaSegInicio = $_POST["fechaSegInicio"];
            $fechaSegFinal = $_POST["fechaSegFinal"];
            $txtEstacion = $_POST["txtEstacion"];
            $txtEstatus = $_POST["txtEstatus"];
            $txtSubEstatus = $_POST["txtSubEstatus"];
            $txtRegion = $_POST["txtRegion"];
            $txtEstado = $_POST["txtEstado"];
            $txtCobertura = $_POST["txtCobertura"];
            $fechaActual = date("Y-m-d");
            if ($fechaCargaInicio == "" && $fechaCargaFinal == "") {
                $fechaCargaInicio = date("Y-m-d", strtotime($fechaActual . "- 14 week"));
                $fechaCargaFinal = date("Y-m-d");
            }
            if ($fechaSegInicio == "" && $fechaSegFinal == "") {
                $fechaSegInicio = date("Y-m-d", strtotime($fechaActual . "- 14 week"));
                $fechaSegFinal = date("Y-m-d");
            }
            $sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
                . " porcentajeDocs,porcentajeTotal,estado from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso where"
                . " idRegistro=ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and fs.fkidRegistro=idRegistro"
                . " and fkIdRegistroEstadoProceso=idRegistro and fechaCarga>='$fechaCargaInicio' and fechaCarga<='$fechaCargaFinal' "
                . " and estacionProceso like '%$txtEstacion%' and estatusOperativo like '%$txtEstatus%' and subEstatusProceso like '%$txtSubEstatus%' and estado like '%$txtEstado%'"
                . " and fechaSeguimiento>='$fechaSegInicio' and fechaSeguimiento<='$fechaSegFinal' and region like '%$txtRegion%' and cobertura like '%$txtCobertura%'";
            ConsultasSelect($sql);

            $sqlExport = "select fechaSeguimiento, fechaTermino, idRegistro, numSiniestro, poliza, afectado, tipoDeCaso, cobertura, fechaSiniestro, estado, "
                . " ciudad,region, ubicacionTaller, financiado, regimenFiscal, estatusCliente, comentariosCliente, fechaCarga, fechaDecreto, usuarioCarga,"
                . " estatusSeguimientoSin, usuarioAsignadoSin, fechaAsignacion, marca, tipo, modelo, numSerie, valorIndemnizacion, "
                . " valorComercial, placas, estacionProceso, estatusOperativo, subEstatusProceso, usuarioSeguimiento"
                . " from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso where"
                . " idRegistro=ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and fs.fkidRegistro=idRegistro"
                . " and fkIdRegistroEstadoProceso=idRegistro and fechaCarga>='$fechaCargaInicio' and fechaCarga<='$fechaCargaFinal' "
                . " and estacionProceso like '%$txtEstacion%' and estatusOperativo like '%$txtEstatus%' and subEstatusProceso like '%$txtSubEstatus%' and estado like '%$txtEstado%'"
                . " and fechaSeguimiento>='$fechaSegInicio' and fechaSeguimiento<='$fechaSegFinal' and region like '%$txtRegion%' and cobertura like '%$txtCobertura%'";
            ConsultaExportar($sqlExport);
            break;
        }
}
