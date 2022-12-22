<?php
include "./FuncionesSQL.php";
include "./FuncionesExportar.php";
$accion = $_POST['accion'];
switch ($accion) {
    case "datosPorDefecto": {
            $sql = "select porcentajeDocs,porcentajeTotal,idRegistro, numSiniestro, "
                . " poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusOperativo"
                . " from docsaprobadosatlas, fechasseguimiento as fs, infosiniestro, infoauto, estadoproceso where fs.fkidRegistro=idRegistro "
                . " and idRegistro= infoauto.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro";
            ConsultasSelect($sql);
            break;
        }
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

            $sqlExport = "select fechaSeguimiento, fechaTermino, idRegistro, numSiniestro, poliza, afectado, tipoDeCaso, cobertura, fechaSiniestro, estado, "
                . " ciudad,region, ubicacionTaller, financiado, regimenFiscal, estatusCliente, comentariosCliente, fechaCarga, fechaDecreto, usuarioCarga,"
                . " estatusSeguimientoSin, usuarioAsignadoSin, fechaAsignacion, marca, tipo, modelo, numSerie, valorIndemnizacion, "
                . " valorComercial, placas, estacionProceso, estatusOperativo, subEstatusProceso, usuarioSeguimiento"
                . " from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso where"
                . " idRegistro=ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and fs.fkidRegistro=idRegistro"
                . " and fkIdRegistroEstadoProceso=idRegistro and fechaCarga>='$fechaCargaInicio' and fechaCarga<='$fechaCargaFinal' "
                . " and estacionProceso like '%$txtEstacion%' and estatusOperativo like '%$txtEstatus%' and subEstatusProceso like '%$txtSubEstatus%' and estado like '%$txtEstado%'"
                . " and fechaSeguimiento>='$fechaSegInicio' and fechaSeguimiento<='$fechaSegFinal' and region like '%$txtRegion%' and cobertura like '%$txtCobertura%'";

            ExportarSiniestros($sqlExport);
            ConsultasSelect($sql);
            break;
        }
    case "docsYaCargados": {
            $txtIdRegistro = $_POST["txtIdRegistro"];
            $sql = "SELECT nombreOriginal FROM imagenes where fkImagen=$txtIdRegistro";
            ConsultasSelect($sql);
            break;
        }
    case "imagenesUsuario": {
            $idRegistro = $_POST["idRegistro"];
            $nombreImagen = $_POST["nombreImagen"];
            $sql = "SELECT nombreImagen,nombreOriginal,iframe FROM imagenes where fkImagen=$idRegistro and nombreOriginal='$nombreImagen'";
            ConsultasSelectCualquiera($sql, "./Conexion.php", "Imagen");
            break;
        }
    case "DatosValidados":
        $id = $_POST["id"];
        $sql = "SELECT * FROM datosvalidados where fkIdRegistroValidados=$id";
        ConsultasSelectCualquiera($sql, "./Conexion.php", "Validados");
        break;
}
