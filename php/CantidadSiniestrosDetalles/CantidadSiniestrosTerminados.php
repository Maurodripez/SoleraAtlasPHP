<?php
include "../FuncionesSQL.php";
$accion = $_POST["accion"];
$mayor = $_POST["mayor"];
$menor = $_POST["menor"];
switch ($accion) {
    case "terminados": {
            $sql = "select count(estatusSeguimientoSin) as contador from fechasseguimiento as fs, infosiniestro where fs.fkidRegistro=idRegistro"
                . " and (estatusSeguimientoSin='TOTAL DE DOCUMENTOS' or estatusSeguimientoSin='TERMINADO POR PROCESO COMPLETO' or estatusSeguimientoSin='TERMINADO ENTREGA ORIGINALES EN OFICINA'"
                . " or estatusSeguimientoSin='CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)')"
                . " and (datediff(CURDATE(), fechaSeguimiento)>=$mayor and datediff(CURDATE(), fechaSeguimiento)<$menor)";
            break;
        }
    case "seguimiento": {
            $sql = "select count(estatusSeguimientoSin) as contador from fechasseguimiento as fs, infosiniestro where fs.fkidRegistro=idRegistro"
                . " and (estatusSeguimientoSin='CASO REABIERTO' or estatusSeguimientoSin='CON CONTACTO SIN DOCUMENTOS' "
                . " or estatusSeguimientoSin='DE 1 A 3 DOCUMENTOS' or estatusSeguimientoSin='DE 4 A 6 DOCUMENTOS' or estatusSeguimientoSin='DE 7 A 10 DOCUMENTOS'"
                . " or estatusSeguimientoSin='NUEVO' or estatusSeguimientoSin='SIN CONTACTO')"
                . " and (datediff(CURDATE(), fechaSeguimiento)>=$mayor and datediff(CURDATE(), fechaSeguimiento)<$menor)";
            break;
        }
    case "incorrectos": {
            $sql = "select count(estatusSeguimientoSin) as contador from fechasseguimiento as fs, infosiniestro where fs.fkidRegistro=idRegistro"
                . " and (estatusSeguimientoSin='CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)'"
                . " or estatusSeguimientoSin='CON CONTACTO SIN COOPERACION DEL CLIENTE' "
                . " or estatusSeguimientoSin='DATOS INCORRECTOS' or estatusSeguimientoSin='SIN CONTACTO EN 30 DIAS')"
                . " and (datediff(CURDATE(), fechaSeguimiento)>=$mayor and datediff(CURDATE(), fechaSeguimiento)<$menor)";
            break;
        }
}
ConsultasNoSiniestros($sql, $accion);
