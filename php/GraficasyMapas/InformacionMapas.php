<?php
include "../FuncionesSQL.php";
$accion = $_POST['accion'];
switch ($accion) {
    case "infoMapa":{
        $sql = "select count(estado) as cantidad, estado from infosiniestro group by estado";
        ConsultasSelectCualquiera($sql,'../Conexion.php','Estados');
        break;
    }
    case "InfoCartas":{
        $sql = "select count(estacionProceso) as conteo, estacionProceso from estadoproceso group by estacionProceso";
        ConsultasSelectCualquiera($sql,'../Conexion.php',"Estacion");
        break;
    }
}