<?php
require "./Conexion.php";
include "./FuncionesSQL.php";
session_start();
$username = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];

$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = $DBcon->prepare("select numSiniestro from infoSiniestro where numSiniestro = :u and numSiniestro = :p");
$sql->bindPAram(":u", $username);
$sql->bindPAram(":p", $password);
$sql->execute();
$usuario = $sql->fetch(PDO::FETCH_ASSOC);
if ($sql->rowCount() == 1) {
    $_SESSION['usuario'] = $username;
    $sql = "select idRegistro from infosiniestro where numSiniestro ='$username'";
    $id = ObtenerValorSql($sql);
    header("Location: ../VistaUsuario.php?id=839");
} else {
    header('Location: ../LoginUsuarios.html');
}
