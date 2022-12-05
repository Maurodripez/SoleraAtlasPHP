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
    $encabezado = ["fechaSeguimiento", "fechaTermino", "idRegistro", "numSiniestro", "poliza", "afectado",
        "tipoDeCaso", "cobertura", "fechaSiniestro", "estado", "ciudad", "region", "ubicacionTaller", "financiado",
        "regimenFiscal", "estatusCliente", "comentariosCliente", "fechaCarga", "fechaDecreto", "usuarioCarga", "estatusSeguimientoSin",
        "usuarioAsignadoSin", "fechaAsignacion", "marca", "tipo", "modelo", "numSerie", "valorIndemnizacion", "valorComercial", " placas",
        " estacionProceso", " estatusOperativo", "subEstatusProceso", "usuarioSeguimiento"];
    # El último argumento es por defecto A1 pero lo pongo para que se explique mejor
    $hojaSiniestros->fromArray($encabezado, null, 'A1');
    require "./Conexion.php";
    $stmt = $DBcon->prepare($sqlExport, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    $stmt->execute();
    # Comenzamos en la 2 porque la 1 es del encabezado
    $numeroDeFila = 2;
    while ($siniestros = $stmt->fetchObject()) {
        # Escribirlos en el documento
        $hojaSiniestros->setCellValueByColumnAndRow(1, $numeroDeFila, $siniestros->fechaSeguimiento);
        $hojaSiniestros->setCellValueByColumnAndRow(2, $numeroDeFila, $siniestros->fechaTermino);
        $hojaSiniestros->setCellValueByColumnAndRow(3, $numeroDeFila, $siniestros->idRegistro);
        $hojaSiniestros->setCellValueByColumnAndRow(4, $numeroDeFila, $siniestros->numSiniestro);
        $hojaSiniestros->setCellValueByColumnAndRow(5, $numeroDeFila, $siniestros->poliza);
        $hojaSiniestros->setCellValueByColumnAndRow(6, $numeroDeFila, $siniestros->afectado);
        $hojaSiniestros->setCellValueByColumnAndRow(7, $numeroDeFila, $siniestros->tipoDeCaso);
        $hojaSiniestros->setCellValueByColumnAndRow(8, $numeroDeFila, $siniestros->cobertura);
        $hojaSiniestros->setCellValueByColumnAndRow(9, $numeroDeFila, $siniestros->fechaSiniestro);
        $hojaSiniestros->setCellValueByColumnAndRow(10, $numeroDeFila, $siniestros->estado);
        $hojaSiniestros->setCellValueByColumnAndRow(11, $numeroDeFila, $siniestros->ciudad);
        $hojaSiniestros->setCellValueByColumnAndRow(12, $numeroDeFila, $siniestros->region);
        $hojaSiniestros->setCellValueByColumnAndRow(13, $numeroDeFila, $siniestros->ubicacionTaller);
        $hojaSiniestros->setCellValueByColumnAndRow(14, $numeroDeFila, $siniestros->financiado);
        $hojaSiniestros->setCellValueByColumnAndRow(15, $numeroDeFila, $siniestros->regimenFiscal);
        $hojaSiniestros->setCellValueByColumnAndRow(16, $numeroDeFila, $siniestros->estatusCliente);
        $hojaSiniestros->setCellValueByColumnAndRow(17, $numeroDeFila, $siniestros->comentariosCliente);
        $hojaSiniestros->setCellValueByColumnAndRow(18, $numeroDeFila, $siniestros->fechaCarga);
        $hojaSiniestros->setCellValueByColumnAndRow(19, $numeroDeFila, $siniestros->fechaDecreto);
        $hojaSiniestros->setCellValueByColumnAndRow(20, $numeroDeFila, $siniestros->usuarioCarga);
        $hojaSiniestros->setCellValueByColumnAndRow(21, $numeroDeFila, $siniestros->estatusSeguimientoSin);
        $hojaSiniestros->setCellValueByColumnAndRow(22, $numeroDeFila, $siniestros->usuarioAsignadoSin);
        $hojaSiniestros->setCellValueByColumnAndRow(23, $numeroDeFila, $siniestros->fechaAsignacion);
        $hojaSiniestros->setCellValueByColumnAndRow(24, $numeroDeFila, $siniestros->marca);
        $hojaSiniestros->setCellValueByColumnAndRow(25, $numeroDeFila, $siniestros->tipo);
        $hojaSiniestros->setCellValueByColumnAndRow(26, $numeroDeFila, $siniestros->modelo);
        $hojaSiniestros->setCellValueByColumnAndRow(27, $numeroDeFila, $siniestros->numSerie);
        $hojaSiniestros->setCellValueByColumnAndRow(28, $numeroDeFila, $siniestros->valorIndemnizacion);
        $hojaSiniestros->setCellValueByColumnAndRow(29, $numeroDeFila, $siniestros->valorComercial);
        $hojaSiniestros->setCellValueByColumnAndRow(30, $numeroDeFila, $siniestros->placas);
        $hojaSiniestros->setCellValueByColumnAndRow(31, $numeroDeFila, $siniestros->estacionProceso);
        $hojaSiniestros->setCellValueByColumnAndRow(32, $numeroDeFila, $siniestros->estatusOperativo);
        $hojaSiniestros->setCellValueByColumnAndRow(33, $numeroDeFila, $siniestros->subEstatusProceso);
        $hojaSiniestros->setCellValueByColumnAndRow(34, $numeroDeFila, $siniestros->usuarioSeguimiento);

        $numeroDeFila++;
    }
    # Crear un "escritor"
    $writer = new Xlsx($documento);
    # Le pasamos la ruta de guardado
    $writer->save('../Excels/Siniestros.xlsx');

}
