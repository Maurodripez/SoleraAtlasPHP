<?php
include 'Conexion.php';
$mayor = $_POST['mayor'];
$menor = $_POST['menor'];
$accion = $_POST['accion'];
switch ($accion) {
    case "3Checked":
        $sql = "select factura, poder, identificacion, situacion, curp, estadoDoc, tenencia, baja, tarjeta, polizaDoc, comprobante,idRegistro,"
        . " numSiniestro, poliza, marca, modelo, numSerie,estado, fechaCarga, estacionProceso,estatusSeguimientoSin from documentosaprobados,"
        ." infosiniestro, infoauto, estadoproceso,fechasseguimiento as fs where fs.fkidRegistro=idRegistro and idRegistro=infoauto.fkidRegistro "
        ." and idRegistro=fkIdRegistroEstadoProceso and fkIdRegistroDocsAprobados=idRegistro and (datediff(CURDATE(), fechaSeguimiento)>='$mayor' "
        ." and datediff(CURDATE(), fechaSeguimiento)<'$menor')";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["factura"] . " - Name: " . $row["poder"] . " " . $row["identificacion"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        break;
}
