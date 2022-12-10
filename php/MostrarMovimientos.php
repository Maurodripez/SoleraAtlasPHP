<?php
include "./FuncionesSQL.php";
$accion = $_POST['accion'];
switch ($accion) {
    case "filtroMovimientos": {
            include "./FuncionesExportar.php";
            $usuario = $_POST["usuario"];
            $fechaInicio = $_POST["fechaInicio"];
            $fechaFinal = $_POST["fechaFinal"];
            $nombreDia = $_POST["nombreDia"];
            $sql = "select count(usuario) as cantMovimientos,DAYNAME(fechaseguimiento) as dia,usuario from seguimientoprincipal"
                . " where DAYNAME(fechaseguimiento)='$nombreDia' and fechaseguimiento >'$fechaInicio' and fechaseguimiento<='$fechaFinal' and usuario='$usuario'";
            $sqlExportar = "select isin.numSiniestro, poliza, estado, ciudad, region, estatusCliente,"
                . " estatusSeguimiento, usuario, sp.fechaseguimiento, sp.comentarios, marca, tipo, modelo, numSerie, asegurado"
                . " from infosiniestro as isin, infoauto as ia, infocliente as ic, seguimientoprincipal as sp "
                . " where idRegistro=ia.fkIdRegistro and sp.fkIdRegistroSegPrincipal=idRegistro "
                . " and idRegistro=ic.fkIdRegistro and fechaSeguimiento>='2022-10-01' and fechaSeguimiento<='2022-12-10'";
            ConsultasSelect($sql);
            ExportarMovimientos($sqlExportar);
            break;
        }
    case "movsPorDefecto": {
            $restarDias = $_POST["restarDias"];
            if ($restarDias == 0) {
                $signo = '+';
                $menosUno = $restarDias + 1;
            } else {
                $signo = '-';
                $menosUno = $restarDias - 1;
            }
            $usuario = $_POST["usuario"];
            $sql = "select count(usuario) as cantMovimientos from seguimientoprincipal where usuario='$usuario'"
                . " and fechaseguimiento>=curdate() - interval $restarDias day and fechaseguimiento<curdate() $signo interval $menosUno day";
            ConsultasSelect($sql);
            break;
        }
    case "obtenerUsuarios": {
            $sql = "SELECT nombreReal FROM usuarios where privilegios='operador'";
            ConsultasSelect($sql);
            break;
        }
}
