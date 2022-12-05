<?php
include "./FuncionesSQL.php";
include "./FuncionesExportar.php";
$mayor = $_POST['mayor'];
$menor = $_POST['menor'];
$accion = $_POST['accion'];
switch ($accion) {
    case "3Checked":
        $sql = "select idRegistro,"
            . " numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusOperativo,porcentajeDocs,porcentajeTotal from"
            . " docsaprobadosatlas,infosiniestro, infoauto, estadoproceso,fechasseguimiento as fs where fs.fkidRegistro=idRegistro and idRegistro=infoauto.fkidRegistro "
            . " and idRegistro=fkIdRegistroEstadoProceso and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' "
            . " and datediff(CURDATE(), fechaSeguimiento)<'$menor') and fkDocsAtlas=idRegistro";
        $sqlExportar = "select fechaSeguimiento, fechaTermino, idRegistro, numSiniestro, poliza, afectado, tipoDeCaso, cobertura, fechaSiniestro, estado, "
            . " ciudad,region, ubicacionTaller, financiado, regimenFiscal, estatusCliente, comentariosCliente, fechaCarga, fechaDecreto, usuarioCarga,"
            . " estatusSeguimientoSin, usuarioAsignadoSin, fechaAsignacion, marca, tipo, modelo, numSerie, valorIndemnizacion, "
            . " valorComercial, placas, estacionProceso, estatusOperativo, subEstatusProceso, usuarioSeguimiento"
            . " from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso where"
            . " idRegistro=ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and fs.fkidRegistro=idRegistro"
            . " and fkIdRegistroEstadoProceso=idRegistro and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor') and fkDocsAtlas=idRegistro";
        ConsultasSelect($sql);
        ExportarSiniestros($sqlExportar);
        break;
    case "terminadoSeguimiento":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusOperativo,porcentajeDocs,porcentajeTotal"
            . " from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso,fechasseguimiento as fs"
            . " where fs.fkidRegistro=idRegistro and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso "
            . " and (datediff(CURDATE(), fs.fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fs.fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='TOTAL DE DOCUMENTOS' or estatusOperativo='TERMINADO POR PROCESO COMPLETO' or  estatusOperativo='TERMINADO ENTREGA ORIGINALES EN OFICINA'"
            . " or  estatusOperativo='CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)'"
            . " or estatusOperativo='CASO REABIERTO' or  estatusOperativo='CON CONTACTO SIN DOCUMENTOS' "
            . " or  estatusOperativo='DE 1 A 3 DOCUMENTOS' or  estatusOperativo='DE 4 A 6 DOCUMENTOS' or  estatusOperativo='DE 7 A 10 DOCUMENTOS'"
            . " or  estatusOperativo='NUEVO' or  estatusOperativo='SIN CONTACTO') and fkDocsAtlas=idRegistro";
        $sqlExportar = "select fechaSeguimiento, fechaTermino, idRegistro, numSiniestro, poliza, afectado, tipoDeCaso, cobertura, fechaSiniestro, estado, "
            . " ciudad,region, ubicacionTaller, financiado, regimenFiscal, estatusCliente, comentariosCliente, fechaCarga, fechaDecreto, usuarioCarga,"
            . " estatusSeguimientoSin, usuarioAsignadoSin, fechaAsignacion, marca, tipo, modelo, numSerie, valorIndemnizacion, "
            . " valorComercial, placas, estacionProceso, estatusOperativo, subEstatusProceso, usuarioSeguimiento"
            . " from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso "
            . " where fs.fkidRegistro=idRegistro and idRegistro= ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso "
            . " and (datediff(CURDATE(), fs.fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fs.fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='TOTAL DE DOCUMENTOS' or estatusOperativo='TERMINADO POR PROCESO COMPLETO' or  estatusOperativo='TERMINADO ENTREGA ORIGINALES EN OFICINA'"
            . " or  estatusOperativo='CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)'"
            . " or estatusOperativo='CASO REABIERTO' or  estatusOperativo='CON CONTACTO SIN DOCUMENTOS' "
            . " or  estatusOperativo='DE 1 A 3 DOCUMENTOS' or  estatusOperativo='DE 4 A 6 DOCUMENTOS' or  estatusOperativo='DE 7 A 10 DOCUMENTOS'"
            . " or  estatusOperativo='NUEVO' or  estatusOperativo='SIN CONTACTO') and fkDocsAtlas=idRegistro";
        ConsultasSelect($sql);
        ExportarSiniestros($sqlExportar);
        break;
    case "terminadoIncorrecto":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusOperativo,porcentajeDocs,porcentajeTotal"
            . " from docsaprobadosatlas,fechasseguimiento as fs, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro"
            . " and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='TOTAL DE DOCUMENTOS' or estatusOperativo='TERMINADO POR PROCESO COMPLETO' or  estatusOperativo='TERMINADO ENTREGA ORIGINALES EN OFICINA'"
            . " or  estatusOperativo='CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)' or estatusOperativo='CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)'"
            . " or  estatusOperativo='CON CONTACTO SIN COOPERACION DEL CLIENTE' "
            . " or  estatusOperativo='DATOS INCORRECTOS' or  estatusOperativo='SIN CONTACTO EN 30 DIAS') and fkDocsAtlas=idRegistro";
            $sqlExportar = "select fechaSeguimiento, fechaTermino, idRegistro, numSiniestro, poliza, afectado, tipoDeCaso, cobertura, fechaSiniestro, estado, "
            . " ciudad,region, ubicacionTaller, financiado, regimenFiscal, estatusCliente, comentariosCliente, fechaCarga, fechaDecreto, usuarioCarga,"
            . " estatusSeguimientoSin, usuarioAsignadoSin, fechaAsignacion, marca, tipo, modelo, numSerie, valorIndemnizacion, "
            . " valorComercial, placas, estacionProceso, estatusOperativo, subEstatusProceso, usuarioSeguimiento"
            . " from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso "
            . " where fs.fkidRegistro=idRegistro"
            . " and idRegistro= ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='TOTAL DE DOCUMENTOS' or estatusOperativo='TERMINADO POR PROCESO COMPLETO' or  estatusOperativo='TERMINADO ENTREGA ORIGINALES EN OFICINA'"
            . " or  estatusOperativo='CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)' or estatusOperativo='CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)'"
            . " or  estatusOperativo='CON CONTACTO SIN COOPERACION DEL CLIENTE' "
            . " or  estatusOperativo='DATOS INCORRECTOS' or  estatusOperativo='SIN CONTACTO EN 30 DIAS') and fkDocsAtlas=idRegistro";
        ConsultasSelect($sql);
        ExportarSiniestros($sqlExportar);
        break;
    case "seguimientoIncorrecto":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusOperativo,porcentajeDocs,porcentajeTotal"
            . " from docsaprobadosatlas,fechasseguimiento as fs, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro"
            . " and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='CASO REABIERTO' or  estatusOperativo='CON CONTACTO SIN DOCUMENTOS' "
            . " or  estatusOperativo='DE 1 A 3 DOCUMENTOS' or  estatusOperativo='DE 4 A 6 DOCUMENTOS' or  estatusOperativo='DE 7 A 10 DOCUMENTOS'"
            . " or  estatusOperativo='NUEVO' or  estatusOperativo='SIN CONTACTO' or estatusOperativo='CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)'"
            . " or  estatusOperativo='CON CONTACTO SIN COOPERACION DEL CLIENTE' "
            . " or  estatusOperativo='DATOS INCORRECTOS' or  estatusOperativo='SIN CONTACTO EN 30 DIAS') and fkDocsAtlas=idRegistro";
            $sqlExportar = "select fechaSeguimiento, fechaTermino, idRegistro, numSiniestro, poliza, afectado, tipoDeCaso, cobertura, fechaSiniestro, estado, "
            . " ciudad,region, ubicacionTaller, financiado, regimenFiscal, estatusCliente, comentariosCliente, fechaCarga, fechaDecreto, usuarioCarga,"
            . " estatusSeguimientoSin, usuarioAsignadoSin, fechaAsignacion, marca, tipo, modelo, numSerie, valorIndemnizacion, "
            . " valorComercial, placas, estacionProceso, estatusOperativo, subEstatusProceso, usuarioSeguimiento"
            . " from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso "
            . " where fs.fkidRegistro=idRegistro"
            . " and idRegistro= ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='CASO REABIERTO' or  estatusOperativo='CON CONTACTO SIN DOCUMENTOS' "
            . " or  estatusOperativo='DE 1 A 3 DOCUMENTOS' or  estatusOperativo='DE 4 A 6 DOCUMENTOS' or  estatusOperativo='DE 7 A 10 DOCUMENTOS'"
            . " or  estatusOperativo='NUEVO' or  estatusOperativo='SIN CONTACTO' or estatusOperativo='CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)'"
            . " or  estatusOperativo='CON CONTACTO SIN COOPERACION DEL CLIENTE' "
            . " or  estatusOperativo='DATOS INCORRECTOS' or  estatusOperativo='SIN CONTACTO EN 30 DIAS') and fkDocsAtlas=idRegistro";
        ConsultasSelect($sql);
        ExportarSiniestros($sqlExportar);
        break;
    case "terminado":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusOperativo,porcentajeDocs,porcentajeTotal"
            . " from docsaprobadosatlas, fechasseguimiento as fs, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro "
            . " and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso "
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='TOTAL DE DOCUMENTOS' or estatusOperativo='TERMINADO POR PROCESO COMPLETO'"
            . " or  estatusOperativo='TERMINADO ENTREGA ORIGINALES EN OFICINA' "
            . " or  estatusOperativo='CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)') and fkDocsAtlas=idRegistro";
            $sqlExportar = "select fechaSeguimiento, fechaTermino, idRegistro, numSiniestro, poliza, afectado, tipoDeCaso, cobertura, fechaSiniestro, estado, "
            . " ciudad,region, ubicacionTaller, financiado, regimenFiscal, estatusCliente, comentariosCliente, fechaCarga, fechaDecreto, usuarioCarga,"
            . " estatusSeguimientoSin, usuarioAsignadoSin, fechaAsignacion, marca, tipo, modelo, numSerie, valorIndemnizacion, "
            . " valorComercial, placas, estacionProceso, estatusOperativo, subEstatusProceso, usuarioSeguimiento"
            . " from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso "
            . " where fs.fkidRegistro=idRegistro "
            . " and idRegistro= ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso "
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='TOTAL DE DOCUMENTOS' or estatusOperativo='TERMINADO POR PROCESO COMPLETO'"
            . " or  estatusOperativo='TERMINADO ENTREGA ORIGINALES EN OFICINA' "
            . " or  estatusOperativo='CONCLUIDO POR OTRAS VIAS (BARRA, OFICINA, BROKER)') and fkDocsAtlas=idRegistro";
        ConsultasSelect($sql);
        ExportarSiniestros($sqlExportar);
        break;
    case "seguimiento":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusOperativo,porcentajeDocs,porcentajeTotal"
            . " from docsaprobadosatlas, fechasseguimiento as fs, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro "
            . " and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='CASO REABIERTO' or  estatusOperativo='CON CONTACTO SIN DOCUMENTOS' "
            . " or  estatusOperativo='DE 1 A 3 DOCUMENTOS' or  estatusOperativo='DE 4 A 6 DOCUMENTOS' or  estatusOperativo='DE 7 A 10 DOCUMENTOS'"
            . " or  estatusOperativo='NUEVO' or  estatusOperativo='SIN CONTACTO') and fkDocsAtlas=idRegistro";
            $sqlExportar = "select fechaSeguimiento, fechaTermino, idRegistro, numSiniestro, poliza, afectado, tipoDeCaso, cobertura, fechaSiniestro, estado, "
            . " ciudad,region, ubicacionTaller, financiado, regimenFiscal, estatusCliente, comentariosCliente, fechaCarga, fechaDecreto, usuarioCarga,"
            . " estatusSeguimientoSin, usuarioAsignadoSin, fechaAsignacion, marca, tipo, modelo, numSerie, valorIndemnizacion, "
            . " valorComercial, placas, estacionProceso, estatusOperativo, subEstatusProceso, usuarioSeguimiento"
            . " from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso "
            . " where fs.fkidRegistro=idRegistro "
            . " and idRegistro= ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='CASO REABIERTO' or  estatusOperativo='CON CONTACTO SIN DOCUMENTOS' "
            . " or  estatusOperativo='DE 1 A 3 DOCUMENTOS' or  estatusOperativo='DE 4 A 6 DOCUMENTOS' or  estatusOperativo='DE 7 A 10 DOCUMENTOS'"
            . " or  estatusOperativo='NUEVO' or  estatusOperativo='SIN CONTACTO') and fkDocsAtlas=idRegistro";
        ConsultasSelect($sql);
        ExportarSiniestros($sqlExportar);
        break;
    case "incorrectos":
        $sql = "select"
            . " idRegistro, numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusOperativo"
            . " from fechasseguimiento as fs, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro "
            . " and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)' "
            . " or  estatusOperativo='CON CONTACTO SIN COOPERACION DEL CLIENTE' "
            . " or  estatusOperativo='DATOS INCORRECTOS' or  estatusOperativo='SIN CONTACTO EN 30 DIAS')";
            $sqlExportar = "select fechaSeguimiento, fechaTermino, idRegistro, numSiniestro, poliza, afectado, tipoDeCaso, cobertura, fechaSiniestro, estado, "
            . " ciudad,region, ubicacionTaller, financiado, regimenFiscal, estatusCliente, comentariosCliente, fechaCarga, fechaDecreto, usuarioCarga,"
            . " estatusSeguimientoSin, usuarioAsignadoSin, fechaAsignacion, marca, tipo, modelo, numSerie, valorIndemnizacion, "
            . " valorComercial, placas, estacionProceso, estatusOperativo, subEstatusProceso, usuarioSeguimiento"
            . " from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso "
            . " where fs.fkidRegistro=idRegistro "
            . " and idRegistro= ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso"
            . " and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' and datediff(CURDATE(), fechaSeguimiento)<'$menor')"
            . " and (estatusOperativo='CANCELADO POR ASEGURADORA (DESVIO INTERNO, INVESTIGACION, POLIZA NO PAGADA)' "
            . " or  estatusOperativo='CON CONTACTO SIN COOPERACION DEL CLIENTE' "
            . " or  estatusOperativo='DATOS INCORRECTOS' or  estatusOperativo='SIN CONTACTO EN 30 DIAS') and fkDocsAtlas=idRegistro";
        ConsultasSelect($sql);
        ExportarSiniestros($sqlExportar);
        break;
}
