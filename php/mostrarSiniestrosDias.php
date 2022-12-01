<?php
require "./Conexion.php";
$mayor = $_POST['mayor'];
$menor = $_POST['menor'];
$accion = $_POST['accion'];
switch ($accion) {
    case "3Checked":
        $sql = "select idRegistro,"
            . " numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusSeguimientoSin from"
            . " infosiniestro, infoauto, estadoproceso,fechasseguimiento as fs where fs.fkidRegistro=idRegistro and idRegistro=infoauto.fkidRegistro "
            . " and idRegistro=fkIdRegistroEstadoProceso and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' "
            . " and datediff(CURDATE(), fechaSeguimiento)<'$menor')";
        $stmt = $DBcon->prepare($sql);
        $stmt->execute();

        $userData = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $userData['Siniestros'][] = $row;
        }

        echo json_encode($userData);
        break;
    case "terminadoSeguimiento":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusSeguimientoSin"
            . " from documentosaprobados, infosiniestro, infoauto, estadoproceso,fechasseguimiento as fs"
            . " where fs.fkidRegistro=idRegistro and idRegistro=fkIdRegistroDocsAprobados and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso "
            . " and (datediff(CURDATE(), fs.fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fs.fechaSeguimiento)<'$menor')"
            . " and (estatusSeguimientoSin='TOTAL DE DOCUMENTOS' or estatusSeguimientoSin='TERMINADO POR PROCESO COMPLETO' or  estatusSeguimientoSin='TERMINADO ENTREGA ORIGINALES EN OFICINA'"
            . " or  estatusSeguimientoSin='CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)'"
            . " or estatusSeguimientoSin='CASO REABIERTO' or  estatusSeguimientoSin='CON CONTACTO SIN DOCUMENTOS' "
            . " or  estatusSeguimientoSin='DE 1 A 3 DOCUMENTOS' or  estatusSeguimientoSin='DE 4 A 6 DOCUMENTOS' or  estatusSeguimientoSin='DE 7 A 10 DOCUMENTOS'"
            . " or  estatusSeguimientoSin='NUEVO' or  estatusSeguimientoSin='SIN CONTACTO')";
        $stmt = $DBcon->prepare($sql);
        $stmt->execute();

        $userData = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $userData['Siniestros'][] = $row;
        }

        echo json_encode($userData);
        break;
    case "terminadoIncorrecto":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusSeguimientoSin"
            . " from fechasseguimiento as fs,documentosaprobados, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro"
            . " and idRegistro=fkIdRegistroDocsAprobados and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusSeguimientoSin='TOTAL DE DOCUMENTOS' or estatusSeguimientoSin='TERMINADO POR PROCESO COMPLETO' or  estatusSeguimientoSin='TERMINADO ENTREGA ORIGINALES EN OFICINA'"
            . " or  estatusSeguimientoSin='CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)' or estatusSeguimientoSin='CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)'"
            . " or  estatusSeguimientoSin='CON CONTACTO SIN COOPERACION DEL CLIENTE' "
            . " or  estatusSeguimientoSin='DATOS INCORRECTOS' or  estatusSeguimientoSin='SIN CONTACTO EN 30 DIAS')";
        $stmt = $DBcon->prepare($sql);
        $stmt->execute();

        $userData = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $userData['Siniestros'][] = $row;
        }

        echo json_encode($userData);
        break;
    case "seguimientoIncorrecto":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusSeguimientoSin"
            . " from fechasseguimiento as fs,documentosaprobados, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro"
            . " and idRegistro=fkIdRegistroDocsAprobados and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusSeguimientoSin='CASO REABIERTO' or  estatusSeguimientoSin='CON CONTACTO SIN DOCUMENTOS' "
            . " or  estatusSeguimientoSin='DE 1 A 3 DOCUMENTOS' or  estatusSeguimientoSin='DE 4 A 6 DOCUMENTOS' or  estatusSeguimientoSin='DE 7 A 10 DOCUMENTOS'"
            . " or  estatusSeguimientoSin='NUEVO' or  estatusSeguimientoSin='SIN CONTACTO' or estatusSeguimientoSin='CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)'"
            . " or  estatusSeguimientoSin='CON CONTACTO SIN COOPERACION DEL CLIENTE' "
            . " or  estatusSeguimientoSin='DATOS INCORRECTOS' or  estatusSeguimientoSin='SIN CONTACTO EN 30 DIAS')";
        $stmt = $DBcon->prepare($sql);
        $stmt->execute();

        $userData = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $userData['Siniestros'][] = $row;
        }

        echo json_encode($userData);
        break;
    case "terminado":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusSeguimientoSin"
            . " from fechasseguimiento as fs,documentosaprobados, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro "
            . " and idRegistro=fkIdRegistroDocsAprobados and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso "
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusSeguimientoSin='TOTAL DE DOCUMENTOS' or estatusSeguimientoSin='TERMINADO POR PROCESO COMPLETO'"
            . " or  estatusSeguimientoSin='TERMINADO ENTREGA ORIGINALES EN OFICINA' "
            . " or  estatusSeguimientoSin='CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)')";
        $stmt = $DBcon->prepare($sql);
        $stmt->execute();

        $userData = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $userData['Siniestros'][] = $row;
        }
        echo json_encode($userData);
        break;
    case "seguimiento":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusSeguimientoSin"
            . " from fechasseguimiento as fs,documentosaprobados, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro "
            . " and idRegistro=fkIdRegistroDocsAprobados and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusSeguimientoSin='CASO REABIERTO' or  estatusSeguimientoSin='CON CONTACTO SIN DOCUMENTOS' "
            . " or  estatusSeguimientoSin='DE 1 A 3 DOCUMENTOS' or  estatusSeguimientoSin='DE 4 A 6 DOCUMENTOS' or  estatusSeguimientoSin='DE 7 A 10 DOCUMENTOS'"
            . " or  estatusSeguimientoSin='NUEVO' or  estatusSeguimientoSin='SIN CONTACTO')";
        $stmt = $DBcon->prepare($sql);
        $stmt->execute();

        $userData = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $userData['Siniestros'][] = $row;
        }

        echo json_encode($userData);
        break;
    case "incorrectos":
        $sql = "select factura, poder, identificacion, situacion, curp, estadoDoc, tenencia, baja, tarjeta, polizaDoc, comprobante,"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusSeguimientoSin"
            . " from fechasseguimiento as fs,documentosaprobados, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro "
            . " and idRegistro=fkIdRegistroDocsAprobados and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusSeguimientoSin='CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)' "
            . " or  estatusSeguimientoSin='CON CONTACTO SIN COOPERACION DEL CLIENTE' "
            . " or  estatusSeguimientoSin='DATOS INCORRECTOS' or  estatusSeguimientoSin='SIN CONTACTO EN 30 DIAS')";
        $stmt = $DBcon->prepare($sql);
        $stmt->execute();

        $userData = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $userData['Siniestros'][] = $row;
        }

        echo json_encode($userData);
        break;
}
