<?php
session_start();
require "./Conexion.php";
require "./FuncionesSQL.php";
$accion = $_POST["accion"];
$usuarioActivo = $_SESSION['usuario'];
switch ($accion) {
    case "Privilegios": {
            $sql = "select privilegios from usuarios where usuario='$usuarioActivo'";
            break;
        }
    case "NombreReal": {
            $sql = "select nombreReal from usuarios where usuario='$usuario'";
        }
}
ConsultasSelect($sql);