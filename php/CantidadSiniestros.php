<?php
include "FuncionesSQL.php";
$mayor = $_POST["mayor"];
$menor = $_POST["menor"];
$sql = "select count(fechaSeguimiento) as conteo from fechasseguimiento where datediff(CURDATE(), fechaSeguimiento)>=$mayor and datediff(CURDATE(), fechaSeguimiento)<$menor";

ConsultasSelect($sql);
