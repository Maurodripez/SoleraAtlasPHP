<?php
function ConsultasSelect($sql){
    require "./Conexion.php";
    $stmt = $DBcon->prepare($sql);
    $stmt->execute();

    $userData = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $userData['Siniestros'][] = $row;
    }

    echo json_encode($userData);
}