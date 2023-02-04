<?php
include "../FuncionesSQL.php";
$accion = $_POST['accion'];
$fechaCargaInicio = $_POST['fechaCargaInicio'];
$fechaCargaFinal = $_POST['fechaCargaFinal'];
$fechaSeguimientoInicio = $_POST['fechaSeguimientoInicio'];
$fechaSeguimientoFinal = $_POST['fechaSeguimientoFinal'];
switch ($accion) {
    case "infoMapa":{
            $sql = "select count(estado) as cantidad, estado from infosiniestro,fechasseguimiento where fechaCarga>'$fechaCargaInicio'"
                . " and fechaCarga<'$fechaCargaFinal' and fechaSeguimiento>'$fechaSeguimientoInicio' and fechaSeguimiento<'$fechaSeguimientoFinal'"
                . " and fkidRegistro=idRegistro group by estado";
            ConsultasSelectCualquiera($sql, '../Conexion.php', 'Estados');
            break;
        }
    case "foliosArea":{
            $sql = "select count(estacionProceso) as conteo, estacionProceso from estadoproceso group by estacionProceso";
            ConsultasSelectCualquiera($sql, '../Conexion.php', "Estacion");
            break;
        }
    case "estatusSeguimiento":{
            $fechaCargaInicio = $_POST['fechaCargaInicio'];
            $fechaCargaFinal = $_POST['fechaCargaFinal'];
            $fechaSeguimientoInicio = $_POST['fechaSeguimientoInicio'];
            $fechaSeguimientoFinal = $_POST['fechaSeguimientoFinal'];
            $sql = "select count(estatusSeguimientoSin) as conteo,estatusSeguimientoSin from infosiniestro,fechasseguimiento "
                . " where fechaCarga>='$fechaCargaInicio' and fechaCarga<'$fechaCargaFinal' and fechaSeguimiento>='$fechaSeguimientoInicio' and fechaSeguimiento<'$fechaSeguimientoFinal'  and fkidRegistro=idRegistro group by estatusSeguimientoSin";
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
            //echo "Mes:" . $mesActual - $i . "\n";
            $diasMes = cal_days_in_month(CAL_GREGORIAN, $mesActual - $i, $annoActual);
            if ($mesActual == 1) {
                $mesActual = 13;
                $annoActual -= 1;
            }
            //$fehcaMesActual = new DateTime($fecha);
            //echo $diasMes . "\n";
            $fechaAnterior = $fecha;
            $fecha = date("Y-m-d", strtotime($fecha . "- $diasMes days"));
            $sql = "SELECT count(fechaCarga) as conteo, MONTHNAME('$fechaAnterior') as mes FROM infosiniestro where fechaCarga<='$fechaAnterior' and fechaCarga>'$fecha'";
            echo json_encode(ConsultasSelectCualquieraNoJson($sql, "../Conexion.php", "Asignados")) . "//";
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
            //echo "Mes:" . $mesActual - $i . "\n";
            $diasMes = cal_days_in_month(CAL_GREGORIAN, $mesActual - $i, $annoActual);
            if ($mesActual == 1) {
                $mesActual = 13;
                $annoActual -= 1;
            }
            //$fehcaMesActual = new DateTime($fecha);
            //echo $diasMes . "\n";
            $fechaAnterior = $fecha;
            $fecha = date("Y-m-d", strtotime($fecha . "- $diasMes days"));
            $sql = "select count(estacionProceso) as conteo,MONTHNAME('$fechaAnterior') as mes from estadoproceso,infosiniestro "
                . " where estacionProceso='Terminado' and fechaCarga<='$fechaAnterior' and fechaCarga>'$fecha'"
                . " and fkIdRegistroEstadoProceso=idRegistro";
            echo json_encode(ConsultasSelectCualquieraNoJson($sql, "../Conexion.php", "Entregados")) . "//";
            //echo $fecha . "\n";
        }
        break;
    case "FoliosFechas":
        for ($i = 0; $i < 4; $i++) {
            if ($i == 0) {
                $fechaInicial = 0;
                $fechaFinal = 3;
            }
            if ($i == 1) {
                $fechaInicial = 3;
                $fechaFinal = 6;
            }
            if ($i == 2) {
                $fechaInicial = 6;
                $fechaFinal = 15;
            }
            if ($i == 3) {
                $fechaInicial = 15;
                $fechaFinal = 31;
            }
            $sql = "select count(fechaSeguimiento) as conteo from fechasseguimiento "
                . " where datediff(CURDATE(), fechaSeguimiento)>=$fechaInicial and datediff(CURDATE(), fechaSeguimiento)<$fechaFinal";
            echo json_encode(ConsultasSelectCualquieraNoJson($sql, "../Conexion.php", "FoliosFechas")) . "//";
        }
        break;
    case "ReporteDocumentos":
        $documentos = [
            "factura",
            "secuencia",
            "certificadopropiedad",
            "copiacertificado",
            "pedimento",
            "rfv",
            "verificacion",
            "baja",
            "conoceatucliente",
            "consentimiento",
            "averiguacionprevia",
            "avisopfp",
            "otros",
            "oficioliberacion",
            "oficiocancelacion",
            "facturamotor",
            "llaves",
            "facturaatlas",
            "acreditacion",
            "tenencias",
        ];
        foreach ($documentos as $docs) {
            if ($documentos != "") {
                $sql = "select count($docs) as conteo, $docs from docsaprobadosatlas"
                    . " where $docs='true'";
                echo json_encode(ConsultasSelectCualquieraNoJson($sql, "../Conexion.php", "Documentos")) . "//$docs//";
            }
        }
        break;
    case "PorcentajeDocs":
        $sql = "select count(porcentajeDocs) conteo,porcentajeDocs from docsaprobadosatlas,fechasseguimiento "
            . " where datediff(CURDATE(), fechaSeguimiento)<30 and fkDocsAtlas=fkidRegistro group by porcentajeDocs";
        ConsultasSelectCualquiera($sql, "../Conexion.php", "Documentos");
        break;
    case "PorcentajeTotal":
        $sql = "select count(porcentajeTotal) conteo,porcentajeTotal from docsaprobadosatlas,fechasseguimiento "
            . " where datediff(CURDATE(), fechaSeguimiento)<30 and fkDocsAtlas=fkidRegistro group by porcentajeTotal";
        ConsultasSelectCualquiera($sql, "../Conexion.php", "Documentos");
        break;
    case "ValoresFiltro":
        $sql = "SELECT MONTHNAME(fechaCarga) as mes, SUM(valorComercial) as valorComercial, SUM(valorIndemnizacion) as valorIndemnizacion,"
            . " COUNT(idRegistro) as siniestros FROM infoauto as ia JOIN infosiniestro ON idRegistro = ia.fkIdRegistro"
            . " JOIN fechasseguimiento as fs ON idRegistro = fs.fkIdRegistro WHERE fechaCarga BETWEEN '$fechaCargaInicio' AND '$fechaCargaFinal'"
            . " AND fechaSeguimiento BETWEEN '$fechaSeguimientoInicio' AND '$fechaSeguimientoFinal' GROUP BY MONTH(fechaCarga)";
        ConsultasSelectCualquiera($sql, "../Conexion.php", "Valores");
        break;
}
function ultimoDiaMesActual()
{
    $month = date('m');
    $year = date('Y');
    $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));

    return date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
};
