<?php
use \setasign\Fpdi\Fpdi;

require '../fpdf/fpdf.php';
require "../fpdi/src/autoload.php";
include "./FuncionesSQL.php";
class PDF extends FPDF
{
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Helvetica');
try {
    $id = $_POST['id'];
    $resultado = array();
    $sql = "select nombreImagen,nombreOriginal from imagenes where fkImagen=$id and validada=1";
    $resultado = ObtenerValoresCualquiera($sql, "./Conexion.php");
    foreach ($resultado as $index => $resultado) {
        $nombre = $resultado['nombreImagen'];
        $nombreOriginal = $resultado['nombreOriginal'];
        $extension = pathinfo($nombre, PATHINFO_EXTENSION);
        if ($extension != "pdf") {
            $pdf->AddPage();
            $pdf->Text(10, 10, $nombreOriginal);
            $pdf->Image("../Documentos/Ids/$id/Validados/$nombre", 20, 30, 180);
        }
    }
    $pdf->Output('F', "../Documentos/Ids/$id/Validados/validado.pdf");
    $pdf = new Fpdi();
    $pdf->setFont('Helvetica');
    try {
        $pageCount = $pdf->setSourceFile("../Documentos/Ids/837/Validados/validado.pdf");
        for ($i = 1; $i <= $pageCount; $i++) {
            $pdf->AddPage();
            $template = $pdf->importPage($i);
            $pdf->useImportedPage($template, 0, 0);
        }
        $sql = "select nombreImagen,nombreOriginal from imagenes where fkImagen=837 and validada=1";
        $resultado = ObtenerValoresCualquiera($sql, "./Conexion.php");
        foreach ($resultado as $index => $resultado) {
            $nombre = $resultado['nombreImagen'];
            $nombreOriginal = $resultado['nombreOriginal'];
            $extension = pathinfo($nombre, PATHINFO_EXTENSION);
            if ($extension == "pdf") {
                $pageCount = $pdf->setSourceFile("../Documentos/Ids/837/Validados/$nombre");
                for ($i = 1; $i <= $pageCount; $i++) {
                    $pdf->AddPage();
                    $pdf->Text(10, 10, $nombreOriginal);
                    $template = $pdf->importPage($i);
                    $pdf->useImportedPage($template, 0, 0);
                }
            }
        }
        $pdf->Output('F', "../Documentos/Ids/$id/Validados/documento.pdf");
    } catch (\Throwable$th) {
        echo "error";
    }
} catch (\Throwable$th) {
    echo 'Error: ' . $th->getMessage();
}
