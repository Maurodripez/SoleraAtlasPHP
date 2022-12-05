<?php
if (!empty($_GET['file'])) {
    $fileName = basename($_GET['file']);
    $filePath = './' . $fileName;
    if (!empty($fileName) && file_exists($filePath)) {
        // Define headers
// redirect output to client browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Siniestros.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

        // Read the file
        readfile($filePath);
        exit;
    } else {
        echo 'The file does not exist.';
    }
}
