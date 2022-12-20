<?php
require "./Conexion.php";
include "./FuncionesSQL.php";
session_start();
$username = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];

$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = $DBcon->prepare("select usuario,contrasena from usuariostemporales where usuario = :u and contrasena = :p");
$sql->bindPAram(":u", $username);
$sql->bindPAram(":p", $password);
$sql->execute();
$usuario = $sql->fetch(PDO::FETCH_ASSOC);
if ($sql->rowCount() == 1) {
    $siniestro = explode("SIN", $username);
    $siniestroLimpio = $siniestro[1];
    echo $siniestroLimpio;
    $_SESSION['usuarioExterno'] = $username;
    $sql = "select idRegistro from infosiniestro where numSiniestro ='$siniestroLimpio'";
    $id = ObtenerValorSql($sql);
    header("Location: ../VistaUsuario.php?id=$id");
} else {
    header('Location: ../LoginUsuarios.html');
}
