<?php
require('../fpdf/fpdf.php');

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
for ($i = 1; $i <= 40; $i++) {
    $pdf->Cell(0, 10, 'Imprimiendo línea número ' . $i, 0, 1);
}
$pdf->Image('logo.png', 80, 22, 35);
$pdf->Output();
?>