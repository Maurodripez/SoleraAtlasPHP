<?php
function ConsultasSelect($sql)
{
    require "./Conexion.php";
    $stmt = $DBcon->prepare($sql);
    $stmt->execute();

    $datos = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $datos['Siniestros'][] = $row;
        $datosExportar[] = $row;
    }
    echo json_encode($datos);
}
