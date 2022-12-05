<?php
require "./Conexion.php";
require "./FuncionesSQL.php";
$accion = $_POST["accion"];
$usuario = $_POST["usuario"];
switch ($accion) {
    case "Privilegios": {
            $sql = "select privilegios from usuarios where usuario='$usuario'";
            break;
        }
    case "NombreReal": {
            $sql = "select nombreReal from usuarios where usuario='$usuario'";
        }
}
ConsultasSelect($sql);
