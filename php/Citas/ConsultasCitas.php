<?php
session_start();
include "../FuncionesSQL.php";
$accion = $_POST['accion'];
switch ($accion) {
    case "MostrarInfoCita":
        $id = $_POST['id'];
        $sql = "select * from citas where id=$id";
        ConsultasSelectCualquiera($sql, "../Conexion.php", "Cita");
        break;
    case "InfoAdicional":
        $id = $_POST['id'];
        $fk = ObtenerId($id);
        $sql = "select asegurado,telefonoPrincipal,contacto,telContacto,marca,tipo,modelo,numSerie from infosiniestro, infoauto,infocliente"
            . " where idRegistro=infoauto.fkIdRegistro and idRegistro = infocliente.fkIdRegistro and idRegistro=$fk";
        ConsultasSelectCualquiera($sql, "../Conexion.php", "InfoAdicional");
        break;
    case "ValidarCita":
        $siniestro = $_POST["siniestro"];
        $sql = "select if(siniestro='$siniestro','Verdadero','Falso') as validar from citas";
        $resultado = ObtenerValorCualquiera($sql, "../Conexion.php");
        echo $resultado;
        break;
    case "MostrarOperadores":
        $sql = "select nombreReal from usuarios where privilegios='operadorAtlas'";
        ConsultasSelectCualquiera($sql, "../Conexion.php", "Operadores");
        break;
    case "SaberPrivilegios":
        $usuario = $_SESSION['usuario'];
        $sql = "select privilegios from usuarios where usuario= '$usuario'";
        $resultado = ObtenerValorCualquiera($sql, "../Conexion.php");
        echo $resultado;
        break;
    case "ObtenerCitaActiva":
        $id = $_POST['id'];
        $sql = "select * from citas where fkCitas=$id";
        ConsultasSelectCualquiera($sql, "../Conexion.php", "Cita");
        break;
}
function ObtenerId($id)
{
    $sql = "select fkCitas from citas where id=$id";
    $fk = ObtenerValorCualquiera($sql, "../Conexion.php", "Adicional");
    return $fk;
}
