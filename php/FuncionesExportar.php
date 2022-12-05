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
        "fechaSeguimiento", "fechaTermino", "idRegistro", "numSiniestro", "poliza", "afectado",
        "tipoDeCaso", "cobertura", "fechaSiniestro", "estado", "ciudad", "region", "ubicacionTaller", "financiado",
        "regimenFiscal", "estatusCliente", "comentariosCliente", "fechaCarga", "fechaDecreto", "usuarioCarga", "estatusSeguimientoSin",
        "usuarioAsignadoSin", "fechaAsignacion", "marca", "tipo", "modelo", "numSerie", "valorIndemnizacion", "valorComercial", " placas",
        " estacionProceso", " estatusOperativo", "subEstatusProceso", "usuarioSeguimiento"
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
        $hojaSiniestros->setCellValue("AA" . $numeroDeFila, $siniestros->modelo);
        $hojaSiniestros->setCellValue("AB" . $numeroDeFila, $siniestros->numSerie);
        $hojaSiniestros->setCellValue("AC" . $numeroDeFila, $siniestros->valorIndemnizacion);
        $hojaSiniestros->setCellValue("AD" . $numeroDeFila, $siniestros->valorComercial);
        $hojaSiniestros->setCellValue("AE" . $numeroDeFila, $siniestros->placas);
        $hojaSiniestros->setCellValue("AF" . $numeroDeFila, $siniestros->estacionProceso);
        $hojaSiniestros->setCellValue("AG" . $numeroDeFila, $siniestros->estatusOperativo);
        $hojaSiniestros->setCellValue("AH" . $numeroDeFila, $siniestros->subEstatusProceso);
        $hojaSiniestros->setCellValue("AI" . $numeroDeFila, $siniestros->usuarioSeguimiento);

        $numeroDeFila++;
    }
    # Crear un "escritor"
    $writer = new Xlsx($documento);
    # Le pasamos la ruta de guardado
    $writer->save('../Excels/Siniestros.xlsx');
}
