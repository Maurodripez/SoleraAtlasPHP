<?php
$accion = $_POST['accion'];
include "../FuncionesSQL.php";
switch ($accion) {
    case "GenerarPassword":
        $usuario = $_POST['usuario'];
        $password = generarPassword();
        $sql = "DROP EVENT eliminarPassword'$usuario'";
        ActualizarCualquierSiniestro($sql, "../Conexion.php");
        $sql = "DELETE FROM usuariostemporales WHERE usuario = '$usuario'";
        ActualizarCualquierSiniestro($sql, "../Conexion.php");
        $sql = "INSERT INTO usuariostemporales (usuario,contrasena,fechaDeCreacion)"
            . " VALUES ('$usuario', '$password', now())";
        ActualizarCualquierSiniestro($sql, "../Conexion.php");
        $sql = "CREATE EVENT eliminarPassword.'$usuario'"
            . " ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 20160 MINUTE"
            . " DO DELETE FROM usuariostemporales WHERE usuario ='$usuario'";
        ActualizarCualquierSiniestro($sql, "../Conexion.php");
        $sql = "select datediff(now(),fechaDeCreacion) as diasTranscurridos from usuariostemporales where usuario='$usuario'";
        $diasTranscurridos = ObtenerValorCualquiera($sql, "../Conexion.php");
        echo $password . "//" . $diasTranscurridos;
        break;
    case "ObtenerPassword":
        $siniestro = $_POST['siniestro'];
        $sql = "select count(*) as conteo from usuariostemporales where usuario='$siniestro'";
        $contador = ObtenerValorCualquiera($sql, "../Conexion.php") . "//";
        $sql = "select contrasena from usuariostemporales where usuario='$siniestro'";
        $contador = $contador . ObtenerValorCualquiera($sql, "../Conexion.php");
        echo $contador;
        break;
}
function generarPassword()
{
    $key = "";
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
    $max = strlen($pattern) - 1;
    for ($i = 0; $i < 10; $i++) {
        $key .= substr($pattern, mt_rand(0, $max), 1);
    }
    return $key;
}
