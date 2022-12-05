<?php
require "./Conexion.php";
session_start();
$username = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];

$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = $DBcon->prepare("select * from usuarios where usuario = :u and contrasena = :p");
$sql->bindPAram(":u", $username);
$sql->bindPAram(":p", $password);
$sql->execute();
$usuario = $sql->fetch(PDO::FETCH_ASSOC);
if ($sql->rowCount() == 1) {
    $_SESSION['usuario'] = $username;
    $_SESSION['password'] = $password;
    header('Location: ../Principal.php');
} else {
    header('Location: ../index.html');
}
