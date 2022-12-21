<?php
$accion = $_POST['accion'];
include "../FuncionesSQL.php";
switch ($accion) {
    case "GenerarPassword":
        $usuario = $_POST['usuario'];
        $password = generarPassword();
        //se valida si esxiste el evento
        $sql = "SELECT count(EVENT_NAME) FROM INFORMATION_SCHEMA.EVENTS "
            . " where EVENT_NAME='$usuario'";
        $existenciaEvento = ObtenerValorCualquiera($sql, "../Conexion.php");
        if ($existenciaEvento == 1) {
            //si existe, ak generarse una nueva contrasena, se resetea el contador eliminando el evento
            $sql = "DROP EVENT $usuario";
            ActualizarCualquierSiniestro($sql, "../Conexion.php");
        }
        //se elimina la contrasena y se crea unp nuevo
        $sql = "DELETE FROM usuariostemporales WHERE usuario = '$usuario'";
        ActualizarCualquierSiniestro($sql, "../Conexion.php");
        $sql = "INSERT INTO usuariostemporales (usuario,contrasena,fechaDeCreacion)"
            . " VALUES ('$usuario', '$password', now())";
        ActualizarCualquierSiniestro($sql, "../Conexion.php");
        //se crea un nuevo evento con la duracion de 2 semanas
        $sql = "CREATE EVENT $password"
            . " ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 20160 MINUTE"
            . " DO DELETE FROM usuariostemporales WHERE contrasena ='$password'";
        ActualizarCualquierSiniestro($sql, "../Conexion.php");
        $diasActiva = diasActiva($usuario);
        echo $password . "//" . $diasActiva;
        break;
    case "ObtenerPassword":
        $siniestro = $_POST['siniestro'];
        $sql = "select count(*) as conteo from usuariostemporales where usuario='$siniestro'";
        $contador = ObtenerValorCualquiera($sql, "../Conexion.php") . "//";
        $sql = "select contrasena from usuariostemporales where usuario='$siniestro'";
        $diasActiva = diasActiva($siniestro);
        $contador = $contador . ObtenerValorCualquiera($sql, "../Conexion.php");
        echo $contador . '//' . $diasActiva;
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
function diasActiva($usuario)
{
    $sql = "select datediff(now(),fechaDeCreacion) as diasTranscurridos from usuariostemporales where usuario='$usuario'";
    return ObtenerValorCualquiera($sql, "../Conexion.php");
}
