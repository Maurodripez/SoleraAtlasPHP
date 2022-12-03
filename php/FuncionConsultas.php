<?php
require "./FuncionesSQL.php";
$fechaCargaInicio;
$sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
    . " porcentajeDocs,porcentajeTotal,estado from fechasseguimiento as fs,docsaprobadosatlas, infosiniestro, infoauto as ia, estadoproceso where"
    . " idRegistro=ia.fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro and fs.fkidRegistro=idRegistro"
    . " and fkIdRegistroEstadoProceso=idRegistro and fechaCarga>'2022-10-20' and fechaCarga<'2022-11-10' "
    . " and estacionProceso like '%%' and estatusOperativo like '%%' and subEstatusProceso like '%%' and estado like '%%'"
    . " and fechaSeguimiento>='2022-10-20' and fechaSeguimiento<='2022-11-10' and region like '%%' and cobertura like '%%'";
ConsultasSelect($sql);
