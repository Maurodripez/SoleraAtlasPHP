<?php
session_start();
$usuario = $_SESSION['usuario'];
require_once "../FuncionesSQL.php";
$sql = "select privilegios from usuarios where usuario='$usuario'";
$privilegios = ObtenerValorCualquiera($sql, "../Conexion.php");
if ($privilegios == "operadorAtlas") {
    $sql = "select nombreReal from usuarios where usuario='$usuario'";
    $operador = obtenerValorCualquiera($sql, "../Conexion.php");
    $sql = "SELECT * FROM citas where asesor='$operador' ORDER BY id";
    SelectSinNombreJson($sql, "../Conexion.php");
} else {
    $sql = "SELECT * FROM citas ORDER BY id";
    SelectSinNombreJson($sql, "../Conexion.php");
}
