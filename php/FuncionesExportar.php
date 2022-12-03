<?php
function ConsultaExportar($sql)
{
    require "./Conexion.php";
    $stmt = $DBcon->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $datosExportar[] = $row;
    }
    $resultadosTabla = json_encode($datosExportar);
    header('Content-type: text/plain; charset=UTF-8');
    $fcsv = fopen('../Excels/Siniestros.csv', 'w');
    $array = json_decode($resultadosTabla, true);

    $csv = '';

    $header = false;
    foreach ($array as $line) {
        if (empty($header)) {
            $header = array_keys($line);
            fputcsv($fcsv, $header);
            $csv .= implode(',', $header);
            $header = array_flip($header);
        }

        $line_array = array();

        foreach ($line as $value) {
            array_push($line_array, $value);
        }

        $csv .= "\n" . implode(',', $line_array);

        fputcsv($fcsv, $line_array);
    }

    //output as CSV string
    //echo $csv;

    //close CSV file after write
    fclose($fcsv);
}
