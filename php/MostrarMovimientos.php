<?php
include "./FuncionesSQL.php";
$fechaInicio = $_POST["fechaInicio"];
$fechaFinal = $_POST["fechaFinal"];
$sql = "SELECT nombreReal FROM solera.usuarios where privilegios='operador'";
$resultado= ConsultasSelects($sql);
echo $resultado;
