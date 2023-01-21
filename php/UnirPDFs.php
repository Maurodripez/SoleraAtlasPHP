<?php
use \setasign\Fpdi\Fpdi;
require "../fpdf/fpdf.php";
require "../fpdi/src/autoload.php";
include "./FuncionesSQL.php";
$pdf = new Fpdi();
try {
    $pageCount = $pdf->setSourceFile("../Documentos/Ids/837/Validados/validado.pdf");
    for ($i = 1; $i <= $pageCount; $i++) {
        $pdf->AddPage();
        $template = $pdf->importPage($i);
        $pdf->useImportedPage($template, 0, 0);
    }
    $sql = "select nombreImagen from imagenes where fkImagen=837 and validada=1";
    $resultado = ObtenerValoresCualquiera($sql, "./Conexion.php");
    foreach ($resultado as $index => $resultado) {
        $nombre = $resultado['nombreImagen'];
        $extension = pathinfo($nombre, PATHINFO_EXTENSION);
        if ($extension == "pdf") {
            $pageCount = $pdf->setSourceFile("../Documentos/Ids/837/Validados/$nombre");
            for ($i = 1; $i <= $pageCount; $i++) {
                $pdf->AddPage();
                $template = $pdf->importPage($i);
                $pdf->useImportedPage($template, 0, 0);
            }
        }
    }
    $pdf->Output();
} catch (\Throwable$th) {
    echo "error";
}
