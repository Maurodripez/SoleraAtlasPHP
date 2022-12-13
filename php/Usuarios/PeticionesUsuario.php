<?php
include "../FuncionesSQL.php";
$accion = $_POST['accion'];
$usuario = $_POST['sesionActual'];
switch ($accion) {
    case "MostrarMensajes": {
            $sql = "SELECT fechaMensaje,usuario,mensajes,internoExterno FROM mensajesseguimientos where fkmensgSeguimientos=$usuario order by fechaMensaje desc";
            ConsultasSelectCualquiera($sql, "../Conexion.php", "Mensajes");
            break;
        }
    case "GuardarComentario": {
            $comentario = $_POST["comentario"];
            $sql = "select asegurado from infocliente where fkIdRegistro=$usuario";
            $nombreUsuario = ObtenerValorCualquiera($sql, "../Conexion.php");
            $sql = "INSERT INTO mensajesseguimientos (fkmensgSeguimientos,mensajes,usuario,fechaMensaje,respondido,internoExterno)"
                . " VALUES ($usuario,'$comentario', '$nombreUsuario', now(), 'no', 'Externo')";
            ActualizarCualquierSiniestro($sql, "../Conexion.php");
            echo "Mensaje enviado";
            break;
        }
    case "ValidarDatos": {
            $siniestro = $_POST["siniestro"];
            $poliza = $_POST["poliza"];
            $nombre = $_POST["nombre"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];
            $auto = $_POST["auto"];
            $fechaSin = $_POST["fechaSin"];
            $tipoAuto = $_POST["tipoAuto"];
            $serie = $_POST["serie"];
            $placas = $_POST["placas"];
            $sql = "UPDATE datosvalidados SET siniestro='$siniestro', poliza='$poliza', nombre='$nombre', telefono='$telefono',"
                . " correo='$correo', auto='$auto', fechaSin='$fechaSin', tipoAuto='$tipoAuto', serie='$serie', placas='$placas' WHERE fkIdRegistroValidados =$usuario";
            ActualizarCualquierSiniestro($sql, "../Conexion.php");
            echo "Enviados con éxito";
            break;
        }
    case "TraerInformacion":
        $sql = "select numSiniestro,poliza,asegurado,telefonoprincipal,correo,marca,fechaSiniestro,modelo,numserie,placas"
            . " from infoauto,infosiniestro,infocliente where idRegistro=infoauto.fkIdRegistro"
            . " and infocliente.fkIdRegistro=idRegistro and idRegistro=$usuario";
        ConsultasSelectCualquiera($sql, "../Conexion.php", "Datos");
        break;
    case "ProgresoExpediente":
        $sql = "SELECT porcentajeTotal from docsaprobadosatlas where fkDocsAtlas=$usuario";
        $resultado = ObtenerValorCualquiera($sql, "../Conexion.php");
        echo $resultado;
        break;
}
