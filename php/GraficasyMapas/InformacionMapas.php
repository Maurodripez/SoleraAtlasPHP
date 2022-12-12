<?php
include "../FuncionesSQL.php";
$accion = $_POST['accion'];
switch ($accion) {
    case "infoMapa": {
            $sql = "select count(estado) as cantidad, estado from infosiniestro group by estado";
            ConsultasSelectCualquiera($sql, '../Conexion.php', 'Estados');
            break;
        }
    case "foliosArea": {
            $sql = "select count(estacionProceso) as conteo, estacionProceso from estadoproceso group by estacionProceso";
            ConsultasSelectCualquiera($sql, '../Conexion.php', "Estacion");
            break;
        }
    case "estatusSeguimiento": {
            $sql = "select count(estatusSeguimientoSin) as conteo,estatusSeguimientoSin from infosiniestro,fechasseguimiento "
                . " where datediff(CURDATE(), fechaSeguimiento)<30 and fkidRegistro=idRegistro group by estatusSeguimientoSin";
                ConsultasSelectCualquiera($sql, '../Conexion.php', "Estatus");
            break;
        }
}
