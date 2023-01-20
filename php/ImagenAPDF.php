<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../Documentos/Ids/839/639b71b98b464_0.jpg', 50, 50, 100);
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();

$pdf->Output('F', 'ficha.pdf');