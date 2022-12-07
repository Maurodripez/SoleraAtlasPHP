<?php
function ConsultasSelect($sql){
    require "./Conexion.php";
    $stmt = $DBcon->prepare($sql);
    $stmt->execute();

    $datos = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $datos['Siniestros'][] = $row;
    }
    echo json_encode($datos);
}
function ConsultasNoSiniestros($sql, $tabla){
    require "../Conexion.php";
    $stmt = $DBcon->prepare($sql);
    $stmt->execute();

    $datos = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $datos[$tabla][] = $row;
    }
    echo json_encode($datos);
}
function EliminarSiniestro($sql){
    require "./Conexion.php";
    $stmt = $DBcon->prepare($sql);
    $stmt->execute();
}
function ActualizarSiniestro($sql){
    require "./Conexion.php";
    $stmt = $DBcon->prepare($sql);
    $stmt->execute();
}
function ObtenerValorSql($sql){
    require "./Conexion.php";
    $stmt = $DBcon->query($sql);
    while ($row = $stmt->fetch()) {
        return $row[0];
      }
}
