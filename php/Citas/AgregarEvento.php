<?php
session_start();
$usuario = $_SESSION['usuario'];
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
$sql = "select nombreReal from usuarios where usuario='$usuario'";
$operador = obtenerValorCualquiera($sql, "../Conexion.php");
$sql = "INSERT INTO citas (title,start,end,infoAdicional,asesor,color,fkCitas,siniestro,operador)"
    . " VALUES ('$title','$start','$end','$infoAdicional','$asesor','$color',$id,'$siniestro','$operador')";
ActualizarCualquierSiniestro($sql, "../Conexion.php");
$sql = "INSERT INTO seguimientoprincipal(fkIdRegistroSegPrincipal,usuario,fechaseguimiento,msgInterno,estatusSeguimiento,comentarios)"
    . " VALUES ($id,'$operador',now(),'Interno','Cita creada','$infoAdicional')";
ActualizarCualquierSiniestro($sql, "../Conexion.php");
