<?php
include 'Conexion.php';
// start a session
session_start();
# Las claves de acceso, ahorita las ponemos aquí
# y en otro ejercicio las ponemos en una base de datos
$username = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];
$_SESSION['usuario'] = $username;
$_SESSION['password'] = $password;
//to prevent from mysqli injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql = "select * from usuarios where usuario = '$username' and contrasena = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if ($count == 1) {
    header('Location: ../Principal.html');
    // initialize session variables
    // access session variables
    echo $_SESSION['usuario'];
    echo $_SESSION['password'];
} else {
    echo '<h1> Login failed. Invalid username or password.</h1>';
}
?>
