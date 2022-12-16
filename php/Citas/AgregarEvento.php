<?php
require_once "../FuncionesSQL.php";

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$infoAdicional = isset($_POST['infoAdicional']) ? $_POST['infoAdicional'] : "";
$asesor = isset($_POST['asesor']) ? $_POST['asesor'] : "";
$color = isset($_POST['color']) ? $_POST['color'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";
$siniestro = isset($_POST['siniestro']) ? $_POST['siniestro'] : "";
$sql = "select idRegistro from infosiniestro where numSiniestro='$siniestro'";
$id = ObtenerValorCualquiera($sql, "../Conexion.php");
$sql = "INSERT INTO citas (title,start,end,infoAdicional,asesor,color,fkCitas) VALUES ('$title','$start','$end','$infoAdicional','$asesor','$color',$id)";
ActualizarCualquierSiniestro($sql, "../Conexion.php");
