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
                . " where datediff(CURDATE(), fechaSeguimiento)<=30 and fkidRegistro=idRegistro group by estatusSeguimientoSin";
            ConsultasSelectCualquiera($sql, '../Conexion.php', "Estatus");
            break;
        }
    case "Asignados":
        $mesActual = date("n");
        $fecha = (ultimoDiaMesActual());
        $annoActual = date("Y");
        //echo $mesActual-1;
        //generar reporte por mes
        for ($i = 0; $i <= 11; $i++) {
            if ($mesActual == 0) {
                $mesActual = 12;
                $annoActual -= 1;
            }
            //echo "Mes:" . $mesActual - $i . "\n";
            $diasMes = cal_days_in_month(CAL_GREGORIAN, $mesActual - $i, $annoActual);
            //$fehcaMesActual = new DateTime($fecha);
            //echo $diasMes . "\n";
            $fechaAnterior = $fecha;
            $fecha = date("Y-m-d", strtotime($fecha . "- $diasMes days"));
            $sql = "SELECT count(fechaCarga) as conteo, MONTHNAME('$fechaAnterior') as mes FROM infosiniestro where fechaCarga<='$fechaAnterior' and fechaCarga>'$fecha'";
            echo json_encode(ConsultasSelectCualquiera2($sql, "../Conexion.php", "Asignados")) . "//";
            //echo $fecha . "\n";
        }
        break;
    case "Entregados":
        $mesActual = date("n");
        $fecha = (ultimoDiaMesActual());
        $annoActual = date("Y");
        //echo $mesActual-1;
        //generar reporte por mes
        for ($i = 0; $i <= 11; $i++) {
            if ($mesActual == 0) {
                $mesActual = 12;
                $annoActual -= 1;
            }
            //echo "Mes:" . $mesActual - $i . "\n";
            $diasMes = cal_days_in_month(CAL_GREGORIAN, $mesActual - $i, $annoActual);
            //$fehcaMesActual = new DateTime($fecha);
            //echo $diasMes . "\n";
            $fechaAnterior = $fecha;
            $fecha = date("Y-m-d", strtotime($fecha . "- $diasMes days"));
            $sql = "SELECT count(fechaCarga) as conteo, MONTHNAME('$fechaAnterior') as mes FROM infosiniestro where fechaCarga<='$fechaAnterior' and fechaCarga>'$fecha'";
            $sql = "select count(estacionProceso) from estadoproceso,infosiniestro "
                . " where estacionProceso='Terminado' and fechaCarga<='$fechaAnterior' and fechaCarga>'$fecha'"
                . " and fkIdRegistroEstadoProceso=idRegistro group by estacionProceso";
            echo json_encode(ConsultasSelectCualquiera2($sql, "../Conexion.php", "Entregados")) . "//";
            //echo $fecha . "\n";
        }
        break;
}
function ultimoDiaMesActual()
{
    $month = date('m');
    $year = date('Y');
    $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));

    return date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
};
