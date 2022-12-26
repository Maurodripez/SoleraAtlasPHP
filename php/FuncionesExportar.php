<?php
require_once "../vendor/autoload.php";

# Nuestra base de datos

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function ExportarSiniestros($sqlExport)
{
    $documento = new Spreadsheet();
    $documento
        ->getProperties()
        ->setCreator("SEAS")
        ->setLastModifiedBy('SEAS')
        ->setTitle('Archivo exportado desde MySQL')
        ->setDescription('Un archivo de Excel exportado desde MySQL');

    # Como ya hay una hoja por defecto, la obtenemos, no la creamos
    $hojaSiniestros = $documento->getActiveSheet();
    $hojaSiniestros->setTitle("Siniestros");

    # Escribir encabezado de los productos
    $encabezado = [
        "FECHA SEGUIMIENTO", "FECHATERMINO", "ID", "SINIESTRO", "POLIZA", "AFECTADO",
        "TIPO DE CASO", "COBERTURA", "FECHA SINIESTRO", "ESTADO", "CIUDAD", "REGION", "UBICACION TALLER", "FINANCIADO",
        "REGIMEN FISCAL", "ESTATUS CLIENTE", "COMENTARIOS", "FECHA CARGA", "FECHA DECRETO", "USUARIO DE CARGA", "ESTATUS SEGUIMIENTO",
        "USUARIO ASIGNADO", "FECHA ASIGNACION", "MARCA", "TIPO", "MODELO", "NUMERO SERIE", "VALOR INDEMNIZACION", "VALOR COMERCIAL", "PLACAS",
        "ESTACION", " ESTATUS", "SUB ESTATUS", "USUARIO EN SEGUIMIENTO"
    ];
    # El último argumento es por defecto A1 pero lo pongo para que se explique mejor
    $hojaSiniestros->fromArray($encabezado, null, 'A1');
    require "./Conexion.php";
    $stmt = $DBcon->prepare($sqlExport, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    $stmt->execute();
    # Comenzamos en la 2 porque la 1 es del encabezado
    $numeroDeFila = 2;
    while ($siniestros = $stmt->fetchObject()) {
        # Escribirlos en el documento
        $hojaSiniestros->setCellValue("A" . $numeroDeFila, $siniestros->fechaSeguimiento);
        $hojaSiniestros->setCellValue("B" . $numeroDeFila, $siniestros->fechaTermino);
        $hojaSiniestros->setCellValue("C" . $numeroDeFila, $siniestros->idRegistro);
        $hojaSiniestros->setCellValue("D" . $numeroDeFila, $siniestros->numSiniestro);
        $hojaSiniestros->setCellValue("E" . $numeroDeFila, $siniestros->poliza);
        $hojaSiniestros->setCellValue("F" . $numeroDeFila, $siniestros->afectado);
        $hojaSiniestros->setCellValue("G" . $numeroDeFila, $siniestros->tipoDeCaso);
        $hojaSiniestros->setCellValue("H" . $numeroDeFila, $siniestros->cobertura);
        $hojaSiniestros->setCellValue("I" . $numeroDeFila, $siniestros->fechaSiniestro);
        $hojaSiniestros->setCellValue("J" . $numeroDeFila, $siniestros->estado);
        $hojaSiniestros->setCellValue("K" . $numeroDeFila, $siniestros->ciudad);
        $hojaSiniestros->setCellValue("L" . $numeroDeFila, $siniestros->region);
        $hojaSiniestros->setCellValue("M" . $numeroDeFila, $siniestros->ubicacionTaller);
        $hojaSiniestros->setCellValue("N" . $numeroDeFila, $siniestros->financiado);
        $hojaSiniestros->setCellValue("O" . $numeroDeFila, $siniestros->regimenFiscal);
        $hojaSiniestros->setCellValue("P" . $numeroDeFila, $siniestros->estatusCliente);
        $hojaSiniestros->setCellValue("Q" . $numeroDeFila, $siniestros->comentariosCliente);
        $hojaSiniestros->setCellValue("R" . $numeroDeFila, $siniestros->fechaCarga);
        $hojaSiniestros->setCellValue("S" . $numeroDeFila, $siniestros->fechaDecreto);
        $hojaSiniestros->setCellValue("T" . $numeroDeFila, $siniestros->usuarioCarga);
        $hojaSiniestros->setCellValue("U" . $numeroDeFila, $siniestros->estatusSeguimientoSin);
        $hojaSiniestros->setCellValue("V" . $numeroDeFila, $siniestros->usuarioAsignadoSin);
        $hojaSiniestros->setCellValue("W" . $numeroDeFila, $siniestros->fechaAsignacion);
        $hojaSiniestros->setCellValue("X" . $numeroDeFila, $siniestros->marca);
        $hojaSiniestros->setCellValue("Y" . $numeroDeFila, $siniestros->tipo);
        $hojaSiniestros->setCellValue("Z" . $numeroDeFila, $siniestros->modelo);
        $hojaSiniestros->setCellValue("AA" . $numeroDeFila, $siniestros->numSerie);
        $hojaSiniestros->setCellValue("AB" . $numeroDeFila, $siniestros->valorIndemnizacion);
        $hojaSiniestros->setCellValue("AC" . $numeroDeFila, $siniestros->valorComercial);
        $hojaSiniestros->setCellValue("AD" . $numeroDeFila, $siniestros->placas);
        $hojaSiniestros->setCellValue("AE" . $numeroDeFila, $siniestros->estacionProceso);
        $hojaSiniestros->setCellValue("AF" . $numeroDeFila, $siniestros->estatusOperativo);
        $hojaSiniestros->setCellValue("AG" . $numeroDeFila, $siniestros->subEstatusProceso);
        $hojaSiniestros->setCellValue("AH" . $numeroDeFila, $siniestros->usuarioSeguimiento);

        $numeroDeFila++;
    }
    # Crear un "escritor"
    $writer = new Xlsx($documento);
    # Le pasamos la ruta de guardado
    $writer->save('../Excels/Siniestros.xlsx');
}
function ExportarMovimientos($sqlExport)
{
    $documento = new Spreadsheet();
    $documento
        ->getProperties()
        ->setCreator("SEAS")
        ->setLastModifiedBy('SEAS')
        ->setTitle('Archivo exportado desde MySQL')
        ->setDescription('Movimientos de usuarios');

    # Como ya hay una hoja por defecto, la obtenemos, no la creamos
    $hojaSiniestros = $documento->getActiveSheet();
    $hojaSiniestros->setTitle("Movimientos");

    # Escribir encabezado de los productos
    $encabezado = [
        "numSiniestro", "poliza", " estado", "ciudad", "region", "estatusCliente", "estatusSeguimiento",
        "usuario", "fechaseguimiento", "comentarios", "marca", "tipo", "modelo", "numSerie", "asegurado"
    ];
    # El último argumento es por defecto A1 pero lo pongo para que se explique mejor
    $hojaSiniestros->fromArray($encabezado, null, 'A1');
    require "./Conexion.php";
    $stmt = $DBcon->prepare($sqlExport, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    $stmt->execute();
    # Comenzamos en la 2 porque la 1 es del encabezado
    $numeroDeFila = 2;
    while ($siniestros = $stmt->fetchObject()) {
        # Escribirlos en el documento
        $hojaSiniestros->setCellValue("A" . $numeroDeFila, $siniestros->numSiniestro);
        $hojaSiniestros->setCellValue("B" . $numeroDeFila, $siniestros->poliza);
        $hojaSiniestros->setCellValue("C" . $numeroDeFila, $siniestros->estado);
        $hojaSiniestros->setCellValue("D" . $numeroDeFila, $siniestros->ciudad);
        $hojaSiniestros->setCellValue("E" . $numeroDeFila, $siniestros->region);
        $hojaSiniestros->setCellValue("F" . $numeroDeFila, $siniestros->estatusCliente);
        $hojaSiniestros->setCellValue("G" . $numeroDeFila, $siniestros->estatusSeguimiento);
        $hojaSiniestros->setCellValue("H" . $numeroDeFila, $siniestros->usuario);
        $hojaSiniestros->setCellValue("I" . $numeroDeFila, $siniestros->fechaseguimiento);
        $hojaSiniestros->setCellValue("J" . $numeroDeFila, $siniestros->comentarios);
        $hojaSiniestros->setCellValue("K" . $numeroDeFila, $siniestros->marca);
        $hojaSiniestros->setCellValue("L" . $numeroDeFila, $siniestros->tipo);
        $hojaSiniestros->setCellValue("M" . $numeroDeFila, $siniestros->modelo);
        $hojaSiniestros->setCellValue("N" . $numeroDeFila, $siniestros->numSerie);
        $hojaSiniestros->setCellValue("O" . $numeroDeFila, $siniestros->asegurado);
        $numeroDeFila++;
    }
    # Crear un "escritor"
    $writer = new Xlsx($documento);
    # Le pasamos la ruta de guardado
    $writer->save('../Excels/Movimientos.xlsx');
}
