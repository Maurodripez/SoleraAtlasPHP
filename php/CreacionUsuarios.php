<?php
$accion = $_POST['accion'];
include "./FuncionesSQL.php";
switch ($accion) {
    case "CrearUsuario":
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $privilegio = $_POST['privilegio'];
        $sql = "SELECT count(usuario) FROM usuarios where usuario='$usuario'";
        if (ObtenerValorCualquiera($sql, "./Conexion.php") == 1) {
            echo "Usuario ya existente";
            return;
        }
        $sql = "INSERT INTO usuarios (usuario, contrasena,privilegios,nombreReal) VALUES ('$usuario', '$password', '$privilegio', '$nombre')";
        ActualizarCualquierSiniestro($sql, "./Conexion.php");
        echo "Usuario creado";
        break;
    case "TablaUsuarios":
        $sql = "Select * from usuarios";
        ConsultasSelectCualquiera($sql, "./Conexion.php", "Usuarios");
        break;
    case "CargarDatos":
        $id = $_POST["id"];
        $sql = "select * from usuarios where idUsuarios=$id";
        ConsultasSelectCualquiera($sql, "./Conexion.php", "Usuario");
        break;
    case "EditarUsuario":
        $id = $_POST["id"];
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $privilegio = $_POST['privilegio'];
        $sql = "UPDATE usuarios SET usuario = '$usuario', contrasena = '$password', privilegios = '$privilegio', nombreReal = '$nombre'"
            . "  WHERE idUsuarios =$id";
        ActualizarCualquierSiniestro($sql, "./Conexion.php");
        echo true;
        break;
    case "EliminarUsuario":
        $id = $_POST["id"];
        $sql = "DELETE FROM usuarios WHERE idUsuarios =$id";
        ActualizarCualquierSiniestro($sql, "./Conexion.php");
        echo "Eliminado con exito";
}
