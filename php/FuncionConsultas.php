<?php
require "./FuncionesSQL.php";
$sql = "select idRegistro, numSiniestro, poliza, marca, modelo, numSerie, fechaCarga, estacionProceso,estatusOperativo,"
    . " porcentajeDocs,porcentajeTotal,estado from docsaprobadosatlas, infosiniestro, infoauto, estadoproceso where"
    . " idRegistro=fkIdRegistro and idRegistro=fkIdRegistroEstadoProceso and fkDocsAtlas=idRegistro "
    . " and fkIdRegistroEstadoProceso=idRegistro";
ConsultasSelect($sql);
